<?php
include "../config.php";
$councilor1 = $con->query("SELECT * FROM COUNCILOR_TABLE");
if(!isset($_SESSION['barcode'])){
    session_destroy();
    header('Location: ../index.php');
}else if(!isset($_SESSION['auditor'])){
    header('Location: auditor.php');
}else{
# Councilor1
$c1cn = "";
$c1name = "";
$c1section = "";

# Councilor1
if (isset($_POST['btn'])) {
    $ccl1 = $_POST['selection'];
    $coun = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$ccl1'");


    if ($spc = mysqli_fetch_assoc($coun)) {
        $c1cn = $spc['id'];
        $c1name = "" . $spc['first_name'] . " " . $spc['last_name'] . "";
        $c1section = $spc['section'];
    }
}

if (isset($_POST['btn1'])) {
    $ctre = $_POST['c1pres'];

    if ($ctre != "") {
        session_start();
        $_SESSION['councilor1'] = $ctre;
        header('Location: councilor2.php');
        # code...
    } else {
        echo "<script> alert('Please Select a Candidate') </script>";

    }
    # code...
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="vote-screen.css">
    <meta charset="UTF-8">
    <title>Councilor1</title>

</head>

<body class="bac">
    <?php include "vote-nav.php" ?>
    <div class="content_container">
        <div class="dashboard-container">
            <h1 class="card-title">Councilor
                <?php
                echo $c1name;
                ?>
            </h1>
            <form method="POST">
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($spc['candidate_image']); ?>" alt="Please select Candidate" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                            <div class="card-content">

                                <h5>Select 1st Councilor Candidate</h5>
                                <ul>
                                    <li>
                                        <h1>Candidate NO.:
                                            <input type="text" name="c1pres" value="<?php echo $c1cn; ?>" class="presi" readonly>
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Name: <input type="text" name="prname" readonly value="<?php echo $c1name; ?>" class="presi">
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Section: <input type="text" name="prname" readonly value="<?php echo $c1section; ?>" class="presi">
                                        </h1>
                                    </li>
                                </ul>
                            </div>
                            <div class="selection-container">
                                <h6>Select</h6>
                                <select name="selection" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($councilor1_row = mysqli_fetch_array($councilor1)) {
                                    ?>
                                        <option name="press" value="<?php echo $councilor1_row['id']; ?>"><?php echo $councilor1_row['id']; ?> <?php echo $councilor1_row['last_name']; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="submit" name="btn" class="subb">
                            </div>
                        </div>

                    </div>
                </div>

                <input type="submit" name="btn1" class="sub1" value="NEXT">
            </form>
        </div>

    </div>
</body>
<?php } ?>