<?php
include "../config.php";
if (!isset($_SESSION['adminId'])) {
    header('Location: ../err.php');
} else {
    $errmsg = "";
    if (isset($_POST['register'])) {

        $id = mysqli_real_escape_string($con, $_POST['voter_id']);
        $fname = mysqli_real_escape_string($con, $_POST['f_name']);
        $lname =  mysqli_real_escape_string($con, $_POST['l_name']);
        $sec = mysqli_real_escape_string($con, $_POST['section']);
        $sy = mysqli_real_escape_string($con, $_POST['school_year']);

        if ($_FILES['f1']['name']) {
            if ($id != "" && $fname != "" && $lname != "" && $sec != "" && $sy != "") {
                $img = "image/" . $_FILES['f1']['name'];
                $imgData = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
                $query = "INSERT INTO  VOTER_TABLE (VOTER_ID, VOTER_FNAME, VOTER_LNAME, section, school_year, voter_image) 
                    VALUES('$id','$fname','$lname', '$sec','$sy', '$imgData')";
                if (mysqli_query($con, $query)) {
                    echo ("<script> alert('Voter has been added successfully!'); </script>");
                } else {
                    $errmsg = "Voter already exists!!";
                }
            }else{
                $errmsg = "One or more field is empty";
            }
        } else {
            $errmsg = "Please Provide an image";
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
        <link rel="stylesheet" href="../style/reg-voter.css">
        <title>Register a Voter</title>
    </head>

    <body>
        <?php include "../nav.php" ?>
        <div class="main-content">
            <div class="forms-container">
                <ul class="forms-list">
                    <form method="POST" action="" enctype="multipart/form-data" class="reg-form">
                        <h4>Register a Voter</h4>
                        <div class="img-container">
                            <input type="file" name="f1" accept="image/png, image/jpeg" id="img_selector" class="img-selector" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0]); document.getElementById('errmsg').innerHTML = ''">
                            <label for="img_selector">
                                <img src="../res/placeholder.png" alt="" class="image" id="image">
                                <p>Click to change</p>
                                <p name="errmsg" id="errmsg"><?php echo ($errmsg) ?></p>

                            </label>
                        </div>
                        <h4>Voter Barcode/ID: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" name="voter_id" autocomplete="off">
                        </li>
                        <h4>First Name: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" name="f_name" autocomplete="off">
                        </li>
                        <h4>Last Name: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" name="l_name" autocomplete="off">
                        </li>
                        <h4>Section: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" name="section" autocomplete="off">
                        </li>
                        <h4>School Year: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" name="school_year" autocomplete="off">
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
        <script type="text/javascript" src="../script/reg-voter.js"></script>
        </div>
    </body>

    </html>
<?php } ?>