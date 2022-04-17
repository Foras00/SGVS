<?php
include "../config.php";
$action = $_POST['action'];
if ($action == "reset") {
    mysqli_query($con, "TRUNCATE TABLE PRESIDENT_TABLE");
    mysqli_query($con, "TRUNCATE TABLE VICEPRESIDENT_TABLE");
    mysqli_query($con, "TRUNCATE TABLE SECRETARY_TABLE");
    mysqli_query($con, "TRUNCATE TABLE TREASURER_TABLE");
    mysqli_query($con, "TRUNCATE TABLE AUDITOR_TABLE");
    mysqli_query($con, "TRUNCATE TABLE COUNCILOR_TABLE");
    echo "success";
}
