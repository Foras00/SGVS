<?php
include "../config.php";
$councilor2 = $con->query("SELECT * FROM COUNCILOR_TABLE");
if (!isset($_SESSION['barcode'])) {
    session_destroy();
    header('Location: ../index.php');
} else if (!isset($_SESSION['councilor5'])) {
    header('Location: Councilor5.php');
} else {
    $voter = $_SESSION['barcode'];
    $pres = $_SESSION['president'];
    $vpres = $_SESSION['vice_president'];
    $sec = $_SESSION['secretary'];
    $tres = $_SESSION['treasurer'];
    $aud = $_SESSION['auditor'];
    $c1 = $_SESSION['councilor1'];
    $c2 = $_SESSION['councilor2'];
    $c3 = $_SESSION['councilor3'];
    $c4 = $_SESSION['councilor4'];
    $c5 = $_SESSION['councilor5'];
    echo '<script> console.log("President: ' . $pres . '\nVice President: ' . $vpres . '\nSecretary: ' . $sec . '\nTreasurer: ' . $tres . '\nAuditor: ' . $aud . '\nCouncilor 1: ' . $c1 . '\nCouncilor 2: ' . $c2 . '\nCouncilor 3: ' . $c3 . '\nCouncilor 4: ' . $c4 . '" \nCouncilor 5: ' . $c5 . '); </script>';

    $pres_query = $con->query("SELECT * FROM PRESIDENT_TABLE WHERE ID = '$pres'");
    $get_pres = mysqli_fetch_assoc($pres_query);
    $pparty_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_pres['party_id'] . "'");
    $get_pparty = mysqli_fetch_assoc($pparty_query);

    $vpres_query = $con->query("SELECT * FROM VICEPRESIDENT_TABLE WHERE ID = '$vpres'");
    $get_vpres = mysqli_fetch_assoc($vpres_query);
    $vpparty_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_vpres['party_id'] . "'");
    $get_vpparty = mysqli_fetch_assoc($vpparty_query);

    $sec_query = $con->query("SELECT * FROM SECRETARY_TABLE WHERE ID = '$sec'");
    $get_sec = mysqli_fetch_assoc($sec_query);
    $sparty_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_sec['party_id'] . "'");
    $get_sparty = mysqli_fetch_assoc($sparty_query);

    $tres_query = $con->query("SELECT * FROM TREASURER_TABLE WHERE ID = '$tres'");
    $get_tres = mysqli_fetch_assoc($tres_query);
    $tparty_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_tres['party_id'] . "'");
    $get_tparty = mysqli_fetch_assoc($tparty_query);

    $aud_query = $con->query("SELECT * FROM AUDITOR_TABLE WHERE ID = '$aud'");
    $get_aud = mysqli_fetch_assoc($aud_query);
    $aparty_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_aud['party_id'] . "'");
    $get_aparty = mysqli_fetch_assoc($aparty_query);

    $c1_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c1'");
    $get_c1 = mysqli_fetch_assoc($c1_query);
    $c1party_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_c1['party_id'] . "'");
    $get_c1party = mysqli_fetch_assoc($c1party_query);

    $c2_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c2'");
    $get_c2 = mysqli_fetch_assoc($c2_query);
    $c2party_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_c2['party_id'] . "'");
    $get_c2party = mysqli_fetch_assoc($c2party_query);

    $c3_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c3'");
    $get_c3 = mysqli_fetch_assoc($c3_query);
    $c3party_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_c3['party_id'] . "'");
    $get_c3party = mysqli_fetch_assoc($c3party_query);

    $c4_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c4'");
    $get_c4 = mysqli_fetch_assoc($c4_query);
    $c4party_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_c4['party_id'] . "'");
    $get_c4party = mysqli_fetch_assoc($c4party_query);

    $c5_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c5'");
    $get_c5 = mysqli_fetch_assoc($c5_query);
    $c5party_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '" . $get_c5['party_id'] . "'");
    $get_c5party = mysqli_fetch_assoc($c5party_query);


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="confirmation-page.css">
        <title>Profile</title>
    </head>

    <body>

        <div class="content-container">

            <div class="vote-list-container">
                <h1>Your Votes</h1>
                <div class="vote-list">
                    <div class="infos">
                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_pres['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>President</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_pres['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_pres['first_name']; ?> <?php echo $get_pres['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_pres['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_pparty['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_pparty['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="infos">

                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_vpres['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>Vice President</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_vpres['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_vpres['first_name']; ?> <?php echo $get_vpres['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_vpres['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_vpparty['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_vpparty['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="infos">

                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_sec['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>Secretary</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_sec['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_sec['first_name']; ?> <?php echo $get_sec['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_sec['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_sparty['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_sparty['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="infos">

                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_tres['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>Treasurer</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_tres['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_tres['first_name']; ?> <?php echo $get_tres['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_tres['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_tparty['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_tparty['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="infos">

                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_aud['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>Auditor</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_aud['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_aud['first_name']; ?> <?php echo $get_aud['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_aud['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_aparty['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_aparty['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="infos">

                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_c1['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>Councilor Vote 1</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_c1['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_c1['first_name']; ?> <?php echo $get_c1['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_c1['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_c1party['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_c1party['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="infos">

                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_c2['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>Councilor Vote 2</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_c2['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_c2['first_name']; ?> <?php echo $get_c2['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_c2['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_c2party['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_c2party['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="infos">

                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_c3['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>Councilor Vote 3</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_c3['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_c3['first_name']; ?> <?php echo $get_c3['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_c3['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_c3party['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_c3party['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="infos">

                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_c4['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>Coucilor Vote 4</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_c4['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_c4['first_name']; ?> <?php echo $get_c4['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_c4['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_c4party['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_c4party['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="infos">

                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($get_c5['candidate_image']); ?>" alt="No image available" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                        <ul>
                            <li>
                                <h4>Councilor Vote 5</h4>
                            </li>
                            <li>
                                <h5><strong>Candidate Number:</strong> <?php echo $get_c5['id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Name:</strong> <?php echo $get_c5['first_name']; ?> <?php echo $get_c5['last_name']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Section:</strong> <?php echo $get_c5['section']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Number:</strong> <?php echo $get_c5party['party_id']; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Party Name:</strong> <?php echo $get_c5party['party_name']; ?></h5>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-container">
                        <input type="submit" class="conf-btn" value="Confirm" id="submit" style="margin-right:.5em;">
                        <input type="submit" class="cancel-btn" value="Start Over" id="cancel" style="margin-left:.5em;">
                    </div>
                </div>
            </div>






            <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <script type="text/javascript" src="../script/global-nav.js"></script>
            <script type="text/javascript" src="submit-vote.js"></script>
        </div>
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
    </body>

    </html>

<?php } ?>