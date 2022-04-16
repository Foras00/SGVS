<?php
include "../config.php";
if (!isset($_SESSION['adminId'])) {
    header('Location: ../err.php');
} else {
    $errmsg = "";
    $party = $con->query("SELECT * FROM PARTY_TABLE");
    if (isset($_POST['register'])) {
        $id = mysqli_real_escape_string($con, $_POST['cand_id']);
        $fname = mysqli_real_escape_string($con, $_POST['f_name']);
        $lname =  mysqli_real_escape_string($con, $_POST['l_name']);
        $sec = mysqli_real_escape_string($con, $_POST['section']);
        $prty = mysqli_real_escape_string($con, $_POST['party']);
        $pos = mysqli_real_escape_string($con, $_POST['position']);

        if ($_FILES['f1']['name']) {
            if ($id != "" && $fname != "" && $lname != "" && $sec != "") {
                $chk = "SELECT * FROM ".$pos."_TABLE WHERE ID = '$id'";
                $q = mysqli_fetch_assoc(mysqli_query($con, $chk));
                error_reporting(E_ERROR | E_PARSE);
                $res = $q['id'];
                if ($res > 0) {
                    $errmsg = "Candidate Already exists!!";
                } else {

                    $img = "image/" . $_FILES['f1']['name'];
                    $imgData = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
                    $query = "INSERT INTO " . $pos . "_table (id, first_name, last_name, party_id, section, candidate_image) 
                    VALUES('$id','$fname','$lname','$prty','$sec','$imgData')";
                    if (mysqli_query($con, $query)) {
                        $errmsg = "Candidate has been added successfully!";
                    } else {
                        $errmsg = "Candidate already exists!!";
                    }
                }
            } else {
                $errmsg = "one or more field is empty";
            }
        } else {
            $errmsg = "Please provide an image";
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
        <link rel="stylesheet" href="../style/reg-candidate.css">
        <title>Register Candidate</title>
    </head>

    <body>
        <?php include "../nav.php" ?>
        <div class="main-content">
            <div class="forms-container">
                <ul class="forms-list">
                    <form method="POST" action="" enctype="multipart/form-data" class="reg-form">
                        <h4>Register a Candidate</h4>
                        <div class="img-container">
                            <input type="file" name="f1" accept="image/png, image/jpeg" id="img_selector" class="img-selector" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0]); document.getElementById('errmsg').innerHTML = ''">
                            <label for="img_selector">
                                <img src="../res/placeholder.png" alt="" class="image" id="image">
                                <p>Click to change</p>
                                <p name="errmsg" id="errmsg"><?php echo ($errmsg) ?></p>

                            </label>
                        </div>


                        <h4>Candidate ID: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" id="forms" name="cand_id" autocomplete="off">
                        </li>
                        <h4>First Name: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" id="forms" name="f_name" autocomplete="off">
                        </li>
                        <h4>Last Name: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" id="forms" name="l_name" autocomplete="off">
                        </li>
                        <h4>Section: </h4>
                        <li class="register-forms">
                            <input type="text" class="forms" id="forms" name="section" autocomplete="off">
                        </li>
                        <h4>Position</h4>
                        <li class="register-forms">

                            <select name="position" id="position" class="forms select-forms">
                                <option value="President">President</option>
                                <option value="VicePresident"> Vice President</option>
                                <option value="Councilor">Councilor</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Auditor">Auditor</option>
                                <option value="Treasurer">Treasurer</option>
                            </select>
                        </li>
                        <h4>Party ID: </h4>
                        <li class="register-forms">
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($party_row = mysqli_fetch_array($party)) {
                                ?>
                                    <option value="<?php echo $party_row['party_id']; ?>"><?php echo $party_row['party_name']; ?></option>
                                <?php } ?>
                            </select>
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
        <script type="text/javascript" src="../script/reg-candidate.js"></script>
        </div>
    </body>

    </html>
<?php } ?>