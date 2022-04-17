<?php
include "../config.php";
$process = $_POST['action'];
if ($process == "edit") {
    $cid = $_POST['id'];
    $cfn = $_POST['fn'];
    $cln = $_POST['ln'];
    $cs = $_POST['sec'];
    $cp = $_POST['p'];
    $cpos = $_POST['cpos'];
    $canid = $_POST['candid'];
    $cand_p = $_POST['oldp'];
    if ($cp == "select") {
        $cp = $cand_p;
    } else {
        $cp = $_POST['cand_party'];
    }
    if ($cid != "" && $cfn != "" && $cln != "") {
        $cand_query = "UPDATE " . $cpos . "_TABLE SET ID = '" . $cid . "', FIRST_NAME = '" . $cfn . "', LAST_NAME = '" . $cln . "', PARTY_ID = '" . $cp . "', SECTION = '" . $cs . "' WHERE ID = '" . $canid . "'";
        if (mysqli_query($con, $cand_query)) {
            echo "success";
        } else {
            echo "failed";
        }
    }
    mysqli_close($con);
} else if ($process == "Delete") {
    $canid = $_POST['candid'];
    $cpos = $_POST['cpos'];
    $del_query = "DELETE FROM " . $cpos . "_TABLE WHERE ID ='" . $canid . "'";
    if (mysqli_query($con, $del_query)) {
        echo "success";
    } else {
        echo "failed";
    }
}
