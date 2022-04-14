<?php
include "./config.php";
session_start();
if(!isset($_SESSION['barcode'])){
    header('Location: ./index.php');
}

if(isset($_POST['back'])){
    session_destroy();
    header('Location: ../index.php');
}
$userCode = $_SESSION['barcode'];
if(isset($_POST['output'])){
    echo '<script>console.log("'.$userCode.'")</script>';
}

$query = "SELECT * FROM VOTER_TABLE WHERE VOTER_ID = '".$userCode."'";
$execQuery = mysqli_query($con,$query);
$resultSet = mysqli_fetch_array($execQuery);
echo '<script>console.log("ID: '.$resultSet['voter_id'].' \nFirst Name: '.$resultSet['voter_fname'].' \nLast Name: '.$resultSet['voter_lname'].'")</script>';



?>

<html lang="en">

<head>
    <link rel="shortcut icon" href="#">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="vote-screen-div" id="vote-screen-divv">
        <h1>$userCode</h1>

    </div>

    <form method="POST" action="">
        <input type="submit" name="back">
        <input type="submit" name="output">
    </form>
</body>

</html>