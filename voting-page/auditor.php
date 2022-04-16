<?php
include "../config.php";
$auditor = $con->query("SELECT * FROM AUDITOR_TABLE");
$aus = $_SESSION['auu'];

# Auditor
$acn = "";
$aname = "";
$asection = "";

# Auditor
if (isset($_POST['btn'])) {
    $aud = $_POST['selection'];
    $teas = $con->query("SELECT * FROM AUDITOR_TABLE WHERE ID = '$aud'");


    if ($spa = mysqli_fetch_assoc($teas)) {
        $acn = $spa['id'];
        $aname = "" . $spa['first_name'] . " " . $spa['last_name'] . "";
        $asection = $spa['section'];
    }
}
if (isset($_POST['btn1'])) {
    $tre = $_POST['apres'];

    if ($tre != "") {
        session_start();
        $_SESSION['cc1'] = $tre;
        header('Location: Councilor1.php');
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
            <h1 class="card-title">Auditor
                <?php
                echo $aus;
                ?>
            </h1>
            <form method="POST">
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($spa['candidate_image']); ?>" alt="Please select Candidate" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                            <div class="card-content">

                                <h5>Select Auditor Candidate</h5>
                                <ul>
                                    <li>
                                        <h1>Candidate NO.:
                                            <input type="text" name="apres" value="<?php echo $acn; ?>" class="presi" readonly>
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Name: <input type="text" name="prname" readonly value="<?php echo $aname; ?>" class="presi">
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Section: <input type="text" name="prname" readonly value="<?php echo $asection; ?>" class="presi">
                                        </h1>
                                    </li>
                                </ul>
                            </div>
                            <div class="selection-container">
                                <h6>Select</h6>
                                <select name="selection" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($auditor_row = mysqli_fetch_array($auditor)) {
                                    ?>
                                        <option name="press" value="<?php echo $auditor_row['id']; ?>"><?php echo $auditor_row['id']; ?> <?php echo $auditor_row['last_name']; ?></option>
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