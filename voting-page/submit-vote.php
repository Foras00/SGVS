<?php

include "../config.php";

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



$pvote_count = number_format($get_pres['vote_count']) + 1;
$vpvote_count = number_format($get_vpres['vote_count']) + 1;
$tvote_count = number_format($get_tres['vote_count']) + 1;
$svote_count = number_format($get_sec['vote_count']) + 1;
$avote_count = number_format($get_aud['vote_count']) + 1;
$c1vote_count = number_format($get_c1['vote_count']) + 1;
$c2vote_count = number_format($get_c2['vote_count']) + 1;
$c3vote_count = number_format($get_c3['vote_count']) + 1;
$c4vote_count = number_format($get_c4['vote_count']) + 1;
$c5vote_count = number_format($get_c5['vote_count']) + 1;
mysqli_query($con, "UPDATE PRESIDENT_TABLE SET vote_count = $pvote_count  WHERE ID = '$pres'");
mysqli_query($con, "UPDATE VICEPRESIDENT_TABLE SET vote_count = $vpvote_count WHERE ID = '$vpres'");
mysqli_query($con, "UPDATE TREASURER_TABLE SET vote_count = $tvote_count WHERE ID = '$tres'");
mysqli_query($con, "UPDATE SECRETARY_TABLE SET vote_count = $svote_count WHERE ID = '$sec'");
mysqli_query($con, "UPDATE AUDITOR_TABLE SET vote_count = $avote_count WHERE ID = '$aud'");
mysqli_query($con, "UPDATE COUNCILOR_TABLE SET vote_count = $c1vote_count WHERE ID = '$c1'");
mysqli_query($con, "UPDATE COUNCILOR_TABLE SET vote_count = $c2vote_count WHERE ID = '$c2'");
mysqli_query($con, "UPDATE COUNCILOR_TABLE SET vote_count = $c3vote_count WHERE ID = '$c3'");
mysqli_query($con, "UPDATE COUNCILOR_TABLE SET vote_count = $c4vote_count WHERE ID = '$c4'");
mysqli_query($con, "UPDATE COUNCILOR_TABLE SET vote_count = $c5vote_count WHERE ID = '$c5'");
mysqli_query($con, "UPDATE VOTER_TABLE SET vote_status = '1' WHERE VOTER_ID = '$voter'");

echo "success";
session_destroy();
