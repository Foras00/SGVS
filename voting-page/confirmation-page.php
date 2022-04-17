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
    $pparty_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '".$get_pres['party_id']."'");
    $get_pparty = mysqli_fetch_assoc($pparty_query);

    $vpres_query = $con->query("SELECT * FROM VICEPRESIDENT_TABLE WHERE ID = '$vpres'");
    $get_vpres = mysqli_fetch_assoc($vpres_query);
    $vpparty_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '".$get_vpres['party_id']."'");
    $get_vpparty = mysqli_fetch_assoc($vpparty_query);

    $sec_query = $con->query("SELECT * FROM SECRETARY_TABLE WHERE ID = '$sec'");
    $get_sec = mysqli_fetch_assoc($sec_query);
    $sparty_query = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = '".$get_sec['party_id']."'");
    $get_sparty = mysqli_fetch_assoc($sparty_query);

    $tres_query = $con->query("SELECT * FROM TREASURER_TABLE WHERE ID = '$tres'");
    $get_tres = mysqli_fetch_assoc($tres_query);

    $aud_query = $con->query("SELECT * FROM AUDITOR_TABLE WHERE ID = '$aud'");
    $get_aud = mysqli_fetch_assoc($aud_query);

    $c1_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c1'");
    $get_c1 = mysqli_fetch_assoc($c1_query);

    $c2_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c2'");
    $get_c2 = mysqli_fetch_assoc($c2_query);

    $c3_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c3'");
    $get_c3 = mysqli_fetch_assoc($c3_query);

    $c4_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c4'");
    $get_c4 = mysqli_fetch_assoc($c4_query);

    $c5_query = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$c5'");
    $get_c5 = mysqli_fetch_assoc($c5_query);



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
                <div class="vote-list">
                    <div class="candidate">
                        <div class="infos">
                            <img src="" alt="">
                            <h5>Candidate Number: <?php echo $get_pres['id'];?></h5>
                            <h5>Party Number: <?php echo $get_pparty['party_ID'];?> <?php echo $get_pparty['party_NAME'];?></h5>

                            <h5><?php echo $get_pres['first_name'];?> <?php echo $get_pres['last_name']; ?></h5>
                            <h5><?php echo $get_pres['first_name'];?> <?php echo $get_pres['last_name']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>






            <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <script type="text/javascript" src="../script/global-nav.js"></script>
            <script type="text/javascript" src="../script/"></script>
        </div>
    </body>

    </html>

<?php } ?>