<?php
function logout(){
    session_destroy();
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin-page.css">
    <title>Document</title>
</head>

<body>
    <div class="background">
        <div class="blur" />

        <div class="main-container">
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

        <div class="side-nav" id="side-nav">
            <div class="side-nav-container">
                <nav>
                    <div class="register-tab" id="register-tab"">
                        <h2>Register</h2>
                        <h2 class="reg">Register a Candidate</h2>
                        <h2 class="reg">Register a Voter</h2>
                        <h2 class="reg">Remove a candidate</h2>
                        <h2 class="reg">Remove a Voter</h2>
                    </div>
                    <div class="account-tab" id="account-tab"">
                        <h2>Account</h2>
                        <h2 class="acc">Change Password</h2>
                        <h2 class="acc" name="logout" onclick="logOutPressed()">Log out</h2>
                    </div>
                </nav>
            </div>
        </div>

        <!--logout-->
        <div class="logout-container" id="logout-container">
            <div class="logout-confirmation" name="logout-confirmation" id="logout-confirmation">

                <div>
                    <form method="POST" action="">
                        <h1>Log out?</h1>
                        <input type="submit" name="confirm" value="Yes" class="logout-decision-buttons"
                            onclick="goBack()">
                        <input type="submit" name="confirm" value="No" class="logout-decision-buttons"
                            onclick="logOutNoPressed()">
                    </form>
                </div>

            </div>
        </div>

    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="../script/admin-page.js"></script>
</body>

</html>