<?php
include "../config.php";
$councilor3 = $con->query("SELECT * FROM COUNCILOR_TABLE");
if(!isset($_SESSION['barcode'])){
    session_destroy();
    header('Location: ../index.php');
}else if(!isset($_SESSION['councilor2'])){
    header('Location: councilor2.php');
}else{

# Councilor3
$c3cn = "";
$c3name = "";
$c3section = "";

# Councilor3
if (isset($_POST['btn'])) {
    $ccl3 = $_POST['c2selection'];
    $coun = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$ccl3'");


    if ($spc3 = mysqli_fetch_assoc($coun)) {
        $c3cn = $spc3['id'];
        $c3name = "" . $spc3['first_name'] . " " . $spc3['last_name'] . "";
        $c3section = $spc3['section'];
    }
}




if (isset($_POST['btn1'])) {
    $c2tre = $_POST['c3pres'];

    if ($c2tre != "") {
        session_start();
        $_SESSION['councilor3'] = $c2tre;
        header('Location: councilor4.php');
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
    <title>Councilor3</title>

</head>

<body>
    <?php include "vote-nav.php" ?>
    <div class="content_container">
        <div class="dashboard-container">
            <h1 class="card-title">Councilor
                <?php
                echo $c3name;
                ?>
            </h1>
            <form method="POST">
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($spc3['candidate_image']); ?>" alt="Please select Candidate" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                            <div class="card-content">

                                <h5>Select 3rd Councilor Candidate</h5>
                                <ul>
                                    <li>
                                        <h1>Candidate NO.:
                                            <input type="text" name="c3pres" value="<?php echo $c3cn; ?>" class="presi" readonly>
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Name: <input type="text" name="prname" readonly value="<?php echo $c3name; ?>" class="presi">
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Section: <input type="text" name="prname" readonly value="<?php echo $c3section; ?>" class="presi">
                                        </h1>
                                    </li>
                                </ul>
                            </div>
                            <div class="selection-container">
                                <h6>Select</h6>
                                <select name="c2selection" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($councilor3_row = mysqli_fetch_array($councilor3)) {
                                    ?>
                                        <option name="press" value="<?php echo $councilor3_row['id']; ?>"><?php echo $councilor3_row['id']; ?> <?php echo $councilor3_row['last_name']; ?></option>
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