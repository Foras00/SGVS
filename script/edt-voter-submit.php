<?php
include "../config.php";
$vprocess = $_POST['action'];
if ($vprocess == "edit") {
    $vid = $_POST['id'];
    $vfn = $_POST['fn'];
    $vln = $_POST['ln'];
    $vs = $_POST['sec'];
    $sy = $_POST['sy'];
    $oldid = $_POST['candid'];
    if ($vid != "" && $vfn != "" && $vln != "" && $vs != "" && $sy != "") {
        $cand_query = "UPDATE VOTER_TABLE SET VOTER_ID = '" . $vid . "', VOTER_FNAME = '" . $vfn . "', VOTER_LNAME = '" . $vln . "', SECTION = '" . $vs . "', SCHOOL_YEAR = '" . $sy . "' WHERE VOTER_ID = '" . $oldid . "'";
        if (mysqli_query($con, $cand_query)) {
            echo "success";
        } else {
            echo "failed";
        }
    }
    mysqli_close($con);
} else if ($vprocess == "Delete") {
    $voterId = $_POST['id'];

    $del_query = "DELETE FROM VOTER_TABLE WHERE ID ='" . $voterId . "'";
    if (mysqli_query($con, $del_query)) {
        echo "success";
    } else {
        echo "failed";
    }
}
