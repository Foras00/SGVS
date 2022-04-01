<?php
include "../config.php";
$adminID = $_SESSION['adminId'];
$result = $con -> query("SELECT * FROM ADMIN_TABLE WHERE ADMIN_ID = '$adminID'");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/profile-page.css">
    <title>Admin Page</title>
</head>

<body>
    <div class="nav-container">
        <header class="main-header">
            <nav class="nav" id="nav">
                <div class="hamburger-button" id="hamburger-button">
                    <img src="../res/hamburg-btn.png" alt="" id="hamburger-button-icon">
                </div>

                <div class="logo">
                    <span style="--i:1">S</span>
                    <span style="--i:2">G</span>
                    <span style="--i:3">V</span>
                    <span style="--i:4">S</span>
                </div>
            </nav>
        </header>
    </div>

    <div class="content-container">


        <div class="side-nav" id="side-nav">
            <div class="side-nav-container">

                <div class="home-tab" id="home-tab">
                    <h2 id="home-button">Home</h2>
                </div>
                <div class="register-tab" id="register-tab"">
                        <h2>Register</h2>
                        <h2 class=" reg">Register a Candidate</h2>
                    <h2 class="reg">Register a Voter</h2>
                    <h2 class="reg">Remove a candidate</h2>
                    <h2 class="reg">Remove a Voter</h2>
                </div>
                <div class="account-tab" id="account-tab"">
                        <h2>Account</h2>
                        <h2 class=" acc" id="view-profile-button">View Profile</h2>
                    <h2 class=" acc">Change Password</h2>
                    <h2 class="acc" name="logout" id="logout-button">Log out</h2>
                </div>

            </div>
        </div>

        <div class="profile-page-container">
            <div class="profile-content">
                <ul class="profile-content-components">
                    <li><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['user_image']); ?>"
                            alt="../res/placeholder.png" class="profile-image"></li>
                    <li>
                        <h4>ID: <?php echo $adminID ?></h4>
                    </li>
                    <li>
                        <label for="First Name">First Name</label>
                        <input class="profile-infos" type="text" value="<?php echo $row['admin_fname']?>">
                    </li>
                    <li>
                    <label for="Last Name">Last Name</label>
                        <input class="profile-infos" type="text" value="<?php echo $row['admin_lname']?>">
                    </li>
                    <li><label for="Password">Password</label>
                        <input class="profile-infos" type="password" value="<?php echo $row['admin_password']?>">
                    </li>
                </ul>

                < </div>
            </div>


            <!--logout-->
            <div class="logout-container" id="logout-container">
                <div class="logout-confirmation" name="logout-confirmation" id="logout-confirmation">
                    <h1>Log out?</h1>
                    <input type="submit" name="confirm" value="Yes" class="logout-decision-buttons" id="y-button">
                    <input type="submit" name="confirm" value="No" class="logout-decision-buttons" id="n-button">
                </div>
            </div>

            <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <script type="text/javascript" src="../script/global-nav.js"></script>
            <script type="text/javascript" src="../script/profile.js"></script>

        </div>

</body>

</html>