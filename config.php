<?php
session_start();
$host = "localhost";
$user = "root";
$password = "jQSCJuR7qQ48rF6g";
$db = "sgvs";
$con = mysqli_connect($host,$user,$password,$db);
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}

?>