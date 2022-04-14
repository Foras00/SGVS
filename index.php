<?php
include "config.php";
if (!isset($_SESSION['adminId'])) {
    session_destroy();
}
if (isset($_POST['submitbtn'])) {
    $barcode = mysqli_real_escape_string($con, $_POST['barcode-input']);
    if (!"" == $barcode) {
        $sql = "SELECT * FROM voter_table WHERE voter_id = '" . $barcode . "'";
        $retrieval = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($retrieval);
        error_reporting(E_ERROR | E_PARSE);
        $count = $row['voter_id'];

        if ($count > 0) {
            session_start();
            $_SESSION['barcode'] = $barcode;
            header('Location: ./voting-page/vote-screen.php');
            exit;
        }
    }
}
if (isset($_POST['admin-submit'])) {
    $adminID = mysqli_real_escape_string($con, $_POST['admin-id']);
    $adminPass = mysqli_real_escape_string($con, $_POST['admin-pass']);
    if (!"" == $adminID && !"" == $adminPass) {
        $sqlQ = "SELECT * FROM admin_table WHERE admin_id = '" . $adminID . "'AND admin_password = '" . $adminPass . "'";
        $resultSet = mysqli_query($con, $sqlQ);
        $getRs = mysqli_fetch_array($resultSet);
        error_reporting(E_ERROR | E_PARSE);
        $rows = $getRs['admin_id'];
        if ($rows > 0) {
            session_start();
            $_SESSION['adminLoginSession'] = TRUE;
            $_SESSION['adminId'] = $adminID;
            header('Location: ./admin-dashboard.php');
            exit;
        }else{
            header("Location: index.php?error=Incorect User name or password");

            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="#">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style/index.css" />
    <title>SGVS</title>
</head>

<body>

    <div class="main-container">
        <header class="main-header">
            <nav class="nav">
                <div class="logo">
                    <span style="--i:1">S</span>
                    <span style="--i:2">G</span>
                    <span style="--i:3">V</span>
                    <span style="--i:4">S</span>
                </div>

                <h2 class="admin-login" id="admin-login">Admin Login</h2>
            </nav>
        </header>
    </div>


    <div class="admin-login-screen" id="admin-login-screen">
        <a href="javascript:void(0)" class="closebtn" id="closebtn">&times;</a>
        <form method="POST" action="" id="admin-form">
            <h1>Admin Login</h1>
            <?php if (isset($_GET['error'])) { ?>

                <p class="error" ><?php echo $_GET['error']; ?></p>

            <?php } ?>
            <div>
                <p class="admin-form-error" id="admin-form-error"></p>
                <input type="text" class="admin-creds" id="admin-id" name="admin-id" placeholder="Admin ID" autocomplete="off">
            </div>
            <div>
                <input type="password" class="admin-creds" id="admin-pass" name="admin-pass" placeholder="password" autocomplete="off">
            </div>
            <div>
                <input type="submit" class="admin-submit" id="admin-submit" name="admin-submit" value="Log in">
            </div>
        </form>
    </div>



    <div class="barcode-form">
        <div class="form-container">
            <br>
            <h3>Please Scan Your Barcode!</h3>
            <form METHOD="POST" id="barcode-form">
                <div class="barcode-input-holder">
                    <input type="password" placeholder="Barcode" id="barcode-input" name="barcode-input" class="barcode-input" autofocus autocomplete="off" />
                </div>
                <div>
                    <input type="submit" value="Proceed" name="submitbtn" class="submitbtn" id="submitbtn" />
                    <div><a class="help-button" href="">Ask for help</a></div>
                </div>
            </form>
        </div>
    </div>

    <!-- eto yung bilog bilog na nalutang Reference: https://codepen.io/mohaiman/pen/MQqMyo -->
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!---------------------------------------------------------------------------------------->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="./script/index.js"></script>
</body>

</html>