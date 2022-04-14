<?php
include "../config.php";
if (!isset($_SESSION['adminId'])) {
    header('Location: ../err.php');
}else{
$adminID = $_SESSION['adminId'];
$result = $con->query("SELECT * FROM ADMIN_TABLE WHERE ADMIN_ID = '$adminID'");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/profile-page.css">
    <title>Profile</title>
</head>

<body>
<?php include "../nav.php" ?>
        <div class="profile-page-container">
            <div class="profile-content">
                <div>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['user_image']); ?>" alt="../res/placeholder.png" class="profile-image">
                </div>

                <ul class="profile-content-components">

                    <li>
                        <h4>ID: <?php echo $adminID ?></h4>
                    </li>
                    <li>
                        <label for="First Name">First Name</label>
                        <input class="profile-infos" type="text" value="<?php echo $row['admin_fname'] ?>" disabled="disabled" id="first_name">
                    </li>
                    <li>
                        <label for="Last Name">Last Name</label>
                        <input class="profile-infos" type="text" value="<?php echo $row['admin_lname'] ?>" disabled="disabled" id="last_name">
                    </li>
                    <li><label for="Password">Password</label>
                        <input class="profile-infos" type="password" value="<?php echo $row['admin_password'] ?>" disabled="disabled" id="password">
                    </li>
                    <li><input type="submit" value="Edit" id="edit-btn" class="edit-btn"></li>
                </ul>

            </div>
        </div>



        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="../script/global-nav.js"></script>
        <script type="text/javascript" src="../script/profile.js"></script>

    </div>

</body>

</html>
<?php } ?>