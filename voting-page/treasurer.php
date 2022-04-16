<?php
include "../config.php";
$treasurer = $con->query("SELECT * FROM TREASURER_TABLE");
$tts = $_SESSION['trt'];


# Treasurer
$tcn = "";
$tname = "";
$tsection = "";

# Treasurer
if (isset($_POST['btn'])) {
    $tra = $_POST['selection'];
    $teas = $con->query("SELECT * FROM TREASURER_TABLE WHERE ID = '$tra'");


    if ($spt = mysqli_fetch_assoc($teas)) {
        $tcn = $spt['id'];
        $tname = "" . $spt['first_name'] . " " . $spt['last_name'] . "";
        $tsection = $spt['section'];
    }
}
if (isset($_POST['btn1'])) {
    $tre = $_POST['tpres'];

    if ($tre != "") {
        session_start();
        $_SESSION['auu'] = $tre;
        header('Location: auditor.php');
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
    <title>Treasurer</title>

</head>

<body>
    <?php include "vote-nav.php" ?>
    <div class="content_container">
        <div class="dashboard-container">
            <h1 class="card-title">Treasurer
            <?php
            echo $tname;
            ?>
            </h1>
            <form method="POST">
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($spt['candidate_image']); ?>" alt="Please select Candidate" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                            <div class="card-content">

                                <h5>Select Treasurer Candidate</h5>
                                <ul>
                                    <li>
                                        <h1>Candidate NO.:
                                            <input type="text" name="tpres" value="<?php echo $tcn; ?>" class="presi" readonly>
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Name: <input type="text" name="prname" readonly value="<?php echo $tname; ?>" class="presi">
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Section: <input type="text" name="prname" readonly value="<?php echo $tsection; ?>" class="presi">
                                        </h1>
                                    </li>
                                </ul>
                            </div>
                            <div class="selection-container">
                                <h6>Select</h6>
                                <select name="selection" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($treasurer_row = mysqli_fetch_array($treasurer)) {
                                    ?>
                                        <option name="press" value="<?php echo $treasurer_row['id']; ?>"><?php echo $treasurer_row['id']; ?> <?php echo $treasurer_row['last_name']; ?></option>
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


</html>