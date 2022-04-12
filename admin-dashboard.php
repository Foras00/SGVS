<?php
include "./config.php";
$id = $_SESSION['adminId'];
if (!isset($id)) {

    header('Location: ./err.php');
    exit;
}


$result = $con->query("SELECT * FROM ADMIN_TABLE WHERE ADMIN_ID = '$id'");
$row = $result->fetch_assoc();

$pres = $con->query("SELECT * FROM PRESIDENT_TABLE");
$vpres = $con->query("SELECT * FROM VICEPRESIDENT_TABLE");
$councilor = $con->query("SELECT * FROM COUNCILOR_TABLE");
$secretary = $con->query("SELECT * FROM SECRETARY_TABLE");
$auditor = $con->query("SELECT * FROM AUDITOR_TABLE");
$treasurer = $con->query("SELECT * FROM TREASURER_TABLE");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./style/admin-page.css">

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
                <div class="register-tab" id="register-tab">
                    <h2>Register</h2>
                    <h2 class=" reg" id="reg-cand-button">Register a Candidate</h2>
                    <h2 class="reg" id="reg-voter-button">Register a Voter</h2>
                </div>

                <div class="remove-tab" id="remove-tab">
                    <h2>Remove</h2>
                    <h2 class="rem" id="rem-cand-button">Remove a candidate</h2>
                    <h2 class="rem" id="rem-voter-button">Remove a Voter</h2>
                </div>
                <div class="account-tab" id="account-tab"">
                        <h2>Account</h2>
                        <h2 class=" acc" id="view-profile-button">View Profile</h2>
                    <h2 class="acc" name="logout" id="logout-button">Log out</h2>
                </div>

            </div>
        </div>

        <div class="content_container">
            <div class="dashboard-container">
                <h1 class="card-title">Presidents</h1>
                <div class="cards-container">
                    <div class="cards">
                        <?php
                        while ($pres_row = mysqli_fetch_assoc($pres)) {
                        ?>
                            <div class="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($pres_row['candidate_image']); ?>" alt="./res/placeholder.png" class="candidate-image">
                                <ul class="card-content">
                                    <li>
                                        <h1>Candidate NO.: <?php echo $pres_row['id']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Name: <?php echo $pres_row['first_name']; ?> <?php echo $pres_row['last_name']; ?> </h1>
                                    </li>
                                    <li>
                                        <h1>Section: <?php echo $pres_row['section']; ?> </h1>
                                    </li>
                                    <li>
                                        <h1>Votes: <?php echo $pres_row['vote_count']; ?></h1>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <h1 class="card-title">Vice Presidents</h1>
                <div class="cards-container">
                    <div class="cards">
                        <?php
                        while ($vpres_row  = mysqli_fetch_assoc($vpres)) {
                        ?>
                            <div class="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($vpres_row['candidate_image']); ?>" alt="./res/placeholder.png" class="candidate-image">
                                <ul class="card-content">
                                    <li>
                                        <h1>Candidate NO.: <?php echo $vpres_row['id']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Name: <?php echo $vpres_row['first_name']; ?> <?php echo $vpres_row['last_name']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Section: <?php echo $vpres_row['section']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Votes: <?php echo $vpres_row['vote_count']; ?> </h1>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <h1 class="card-title">Councilor</h1>
                <div class="cards-container">
                    <div class="cards">
                        <?php
                        while ($councilor_row  = mysqli_fetch_assoc($councilor)) {
                        ?>
                            <div class="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($councilor_row['candidate_image']); ?>" alt="./res/placeholder.png" class="candidate-image">
                                <ul class="card-content">
                                    <li>
                                        <h1>Candidate NO.: <?php echo $councilor_row['id']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Name: <?php echo $councilor_row['first_name']; ?> <?php echo $councilor_row['last_name']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Section: <?php echo $councilor_row['section']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Votes: <?php echo $councilor_row['vote_count']; ?> </h1>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <h1 class="card-title">Secretary</h1>
                <div class="cards-container">
                    <div class="cards">
                        <?php
                        while ($secretary_row  = mysqli_fetch_assoc($secretary)) {
                        ?>
                            <div class="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($secretary_row['candidate_image']); ?>" alt="./res/placeholder.png" class="candidate-image">
                                <ul class="card-content">
                                    <li>
                                        <h1>Candidate NO.: <?php echo $secretary_row['id']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Name:<?php echo $secretary_row['first_name']; ?> <?php echo $secretary_row['last_name']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Section: <?php echo $councilor_row['section']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Votes: <?php echo $councilor_row['vote_count']; ?></h1>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <h1 class="card-title">Treasurer</h1>
                <div class="cards-container">
                    <div class="cards">
                        <?php
                        while ($treasurer_row  = mysqli_fetch_assoc($treasurer)) {
                        ?>
                            <div class="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($treasurer_row['candidate_image']); ?>" alt="./res/placeholder.png" class="candidate-image">
                                <ul class="card-content">
                                    <li>
                                        <h1>Candidate NO.: <?php echo $treasurer_row['id']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Name: <?php echo $treasurer_row['first_name']; ?> <?php echo $treasurer_row['last_name']; ?> </h1>
                                    </li>
                                    <li>
                                        <h1>Section: <?php echo $treasurer_row['section']; ?> </h1>
                                    </li>
                                    <li>
                                        <h1>Votes: <?php echo $treasurer_row['vote_count']; ?> </h1>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <h1 class="card-title">Auditor</h1>
                <div class="cards-container">
                    <div class="cards">
                        <?php
                        while ($auditor_row = mysqli_fetch_assoc($auditor)) {
                        ?>
                            <div class="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($auditor_row['candidate_image']); ?>" alt="./res/placeholder.png" class="candidate-image">
                                <ul class="card-content">
                                    <li>
                                        <h1>Candidate NO.: <?php echo $auditor_row['id']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Name: <?php echo $auditor_row['first_name']; ?> <?php echo $auditor_row['last_name']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Section: <?php echo $auditor_row['section']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Votes: <?php echo $auditor_row['vote_count']; ?></h1>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>




        <!--logout-->
        <?php include "./logout.php" ?>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="./script/global-nav.js"></script>
        <script type="text/javascript" src="./script/admin-dashboard.js"></script>
    </div>

</body>

</html>