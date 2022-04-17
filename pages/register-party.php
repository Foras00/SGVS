<?php
include "../config.php";
if (!isset($_SESSION['adminId'])) {
    header('Location: ../err.php');
} else {
    $errmsg = "";
    if (isset($_POST['register'])) {

        $id = mysqli_real_escape_string($con, $_POST['party_id']);
        $pname = mysqli_real_escape_string($con, $_POST['party_name']);
        if ($id != "" && $pname != "") {
            $chk = "SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '$id'";
            $q = mysqli_fetch_array(mysqli_query($con, $chk));
            error_reporting(E_ERROR | E_PARSE);
            $res = $q['party_id'];  
            if ($res > 0) {
                $errmsg = "Party Already exists!!";
            } else {
                $query = "INSERT INTO  PARTY_TABLE (PARTY_ID, PARTY_NAME) 
                VALUES('$id', '$pname')";
                if (mysqli_query($con, $query)) {
                    $errmsg = "Party has been added successfully!";
                }
            }
        } else {
            $errmsg = "One or more field is empty";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/reg-party.css">
        <title>Register Party</title>
    </head>

    <body>
        <?php include "../nav.php" ?>
        <div class="main-content">
            <div class="forms-container">
                <ul class="forms-list">
                    <form method="POST" action="" enctype="application/x-www-form-urlencoded" class="reg-form">
                        <h4>Register A New Party</h4>
                        <p name="errmsg" id="errmsg"><?php echo ($errmsg) ?></p>
                        <h4>Party ID/Number: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" id="forms" name="party_id" autocomplete="off">
                        </li>
                        <h4>Party Name: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" id="forms" name="party_name" autocomplete="off">
                        </li>

                        <div class="reg-btn-container">
                            <input type="submit" value="Register" name="register" class="reg-btn">
                        </div>
                    </form>
                </ul>

            </div>
        </div>
        <!--logout-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="../script/global-nav.js"></script>
        <script type="text/javascript" src="../script/reg-party.js"></script>
        </div>
    </body>

    </html>
<?php } ?>