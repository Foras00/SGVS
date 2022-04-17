<?php
include "../config.php";
$pprocess = $_POST['action'];
if ($pprocess == "edit") {
    $pid = $_POST['id'];
    $pn = $_POST['n'];
    $oldid = $_POST['oldpid'];
    if ($pid != "" && $pn != "" && $oldid != "" ) {
        $cand_query = "UPDATE PARTY_TABLE SET PARTY_ID = '" . $pid . "', PARTY_NAME = '" . $pn . "' WHERE PARTY_ID = '" . $oldid . "'";
        if (mysqli_query($con, $cand_query)) {
            echo "success";
        } else {
            echo "failed";
        }
    }
    mysqli_close($con);
} else if ($pprocess == "delete") {
    $partyId = $_POST['id'];

    $del_query = "DELETE FROM PARTY_TABLE WHERE PARTY_ID ='" . $partyId . "'";
    if (mysqli_query($con, $del_query)) {
        echo "success";
    } else {
        echo "failed";
    }
}