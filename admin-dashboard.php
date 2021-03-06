<?php
include "./config.php";


//checks if the Session "adminId" has been initiated in index.php
if (!isset($_SESSION['adminId']) && !isset($_SESSION['passwrd'])) {
    header('Location: err.php');
} else {
    $id = $_SESSION['adminId'];
    $pss = $_SESSION['passwrd'];

    //Gets the values of each table for the cards in the dashboard 
    $pres = $con->query("SELECT * FROM PRESIDENT_TABLE");
    $vpres = $con->query("SELECT * FROM VICEPRESIDENT_TABLE");
    $councilor = $con->query("SELECT * FROM COUNCILOR_TABLE");
    $secretary = $con->query("SELECT * FROM SECRETARY_TABLE");
    $auditor = $con->query("SELECT * FROM AUDITOR_TABLE");
    $treasurer = $con->query("SELECT * FROM TREASURER_TABLE");

    $p = mysqli_fetch_assoc($con->query("SELECT * FROM PRESIDENT_TABLE WHERE VOTE_COUNT = (SELECT MAX(vote_count) FROM PRESIDENT_TABLE)"));
    $v = mysqli_fetch_assoc($con->query("SELECT * FROM VICEPRESIDENT_TABLE WHERE VOTE_COUNT = (SELECT MAX(vote_count) FROM VICEPRESIDENT_TABLE)"));
    $c = mysqli_fetch_assoc($con->query("SELECT * FROM COUNCILOR_TABLE WHERE VOTE_COUNT = (SELECT MAX(vote_count) FROM COUNCILOR_TABLE)"));
    $s = mysqli_fetch_assoc($con->query("SELECT * FROM SECRETARY_TABLE WHERE VOTE_COUNT = (SELECT MAX(vote_count) FROM SECRETARY_TABLE)"));
    $a = mysqli_fetch_assoc($con->query("SELECT * FROM AUDITOR_TABLE WHERE VOTE_COUNT = (SELECT MAX(vote_count) FROM AUDITOR_TABLE)"));
    $t = mysqli_fetch_assoc($con->query("SELECT * FROM TREASURER_TABLE WHERE VOTE_COUNT = (SELECT MAX(vote_count) FROM TREASURER_TABLE)"));
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
        <?php include "./nav.php" ?>
        <div class="content_container">
            <div class="dashboard-container">

                <h1 class="card-title">Presidents</h1>
                <h1 class="winning-cand">Winning Candidate: <?php echo $p['first_name'] ?> <?php echo $p['last_name'] ?>, <?php echo $p['vote_count'] ?> votes</h1>
                <div class="cards-container">
                    <div class="cards">
                        <?php
                        //while $pres_row returns a value, it will continously create a card containing the values
                        while ($pres_row = mysqli_fetch_assoc($pres)) {
                        ?>
                            <div class="card" name="card" id="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($pres_row['candidate_image']); ?>" alt="./res/placeholder.png" class="candidate-image">
                                <ul class="card-content">
                                    <li>
                                        <h1 id="cand">Candidate NO.: <?php echo $pres_row['id']; ?></h1>
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
                            <!-- this closing bracket ends the while loop -->
                        <?php } ?>
                    </div>
                </div>
                <br>
                <h1 class="card-title">Vice Presidents</h1>
                <h1 class="winning-cand">Winning Candidate: <?php echo $v['first_name'] ?> <?php echo $v['last_name'] ?>, <?php echo $v['vote_count'] ?> votes</h1>
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
                <br>
                <h1 class="card-title">Councilor</h1>
                <h1 class="winning-cand">Winning Candidate: <?php echo $c['first_name'] ?> <?php echo $c['last_name'] ?>, <?php echo $c['vote_count'] ?> votes</h1>
                <div class="cards-container">
                    <div class="cards">
                        <?php
                        while ($councilor_row  = mysqli_fetch_assoc($councilor)) {
                        ?>
                            <div class="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($councilor_row['candidate_image']); ?>" alt="./res/placeholder.png" class="candidate-image">
                                <ul class="card-content">
                                    <li>
                                        <h1 id="cand">Candidate NO.: <?php echo $councilor_row['id']; ?></h1>
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
                <br>
                <h1 class="card-title">Secretary</h1>
                <h1 class="winning-cand">Winning Candidate: <?php echo $s['first_name'] ?> <?php echo $s['last_name'] ?>, <?php echo $s['vote_count'] ?> votes</h1>
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
                                        <h1>Section: <?php echo $secretary_row['section']; ?></h1>
                                    </li>
                                    <li>
                                        <h1>Votes: <?php echo $secretary_row['vote_count']; ?></h1>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <br>
                <h1 class="card-title">Treasurer</h1>
                <h1 class="winning-cand">Winning Candidate: <?php echo $t['first_name'] ?> <?php echo $t['last_name'] ?>, <?php echo $t['vote_count'] ?> votes</h1>
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
                <br>
                <h1 class="card-title">Auditor</h1>
                <h1 class="winning-cand">Winning Candidate: <?php echo $a['first_name'] ?> <?php echo $a['last_name'] ?>, <?php echo $a['vote_count'] ?> votes</h1>
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

            <div class="opt-btn-container">
                <input type="submit" id="reset" class="reset-opt-btn" value="Reset Database">
                <input type="submit" id="print" class="print-opt-btn" value="Print Winning Candidates">
            </div>

        </div>
        <div class="confirmation" id="conf">

            <div class="inputs">
                <h5 style="font-family: 'roboto'; color: white;">Confirm Identity</h5>
                <h5 id="conf-err" class="conf-err"></h5>
                <input type="text" name="input-id" id="input-id" placeholder="Admin ID" class="field aid">
                <input type="password" name="input-pass" id="input-pass" placeholder="Password" class="field">
                <input type="submit" name="submit-cofirmation" id="confirm" value="Confirm" class="conf-btn">
                <input type="submit" name="cancel-confirmation" id="cancel" value="Cancel" class="conf-btn">
            </div>
        </div>
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <div>
                                            <input type="hidden" data-value="<?php echo $id ?>" id="si">
                                            <input type="hidden" data-value="<?php echo $pss ?>" id="sp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- these are the script tags for jQuery, note: jQuery will not work offline because of this -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

        <!-- these are the script tags for the local scripts located at the script folder-->
        <script type="text/javascript" src="./script/global-nav.js"></script>
        <script type="text/javascript" src="./script/admin-dashboard.js"></script>



        </div>
    </body>

    </html>
<?php } ?>