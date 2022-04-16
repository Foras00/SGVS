<?php
include "../config.php";
$secretary = $con->query("SELECT * FROM SECRETARY_TABLE");
$sc = $_SESSION['scc'];

# Secretary
$scn = "";
$sname = "";
$ssection = "";

# Secretary
if (isset($_POST['btn'])) {
    $spre = $_POST['selection'];
    $sec = $con->query("SELECT * FROM SECRETARY_TABLE WHERE ID = $spre");


    if ($sps = mysqli_fetch_assoc($sec)) {
        $scn = $sps['id'];
        $sname = "" . $sps['first_name'] . " " . $sps['last_name'] . "";
        $ssection = $sps['section'];
    }
}
if (isset($_POST['btn1'])) {
    $st = $_POST['spres'];
    if ($st != "") {
        session_start();
        $_SESSION['trt'] = $st;
        header('Location: treasurer.php');
        # code...
    } else {
        echo "<script> alert('Please Select a Candidate') </script>";
    }
    
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
    <title>Document</title>

</head>

<body>
    <?php include "vote-nav.php" ?>
    <div class="content_container">
        <div class="dashboard-container">
            <h1 class="card-title">Secretary
            <?php
            echo $sc;
            ?>
            </h1>
            <form method="POST">
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($sps['candidate_image']); ?>" alt="Please select Candidate" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                            <div class="card-content">

                                <h5>Select Secretary Candidate</h5>
                                <ul>
                                    <li>
                                        <h1>Candidate NO.:
                                            <input type="text" name="spres" value="<?php echo $scn; ?>" class="presi" readonly>
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Name: <input type="text" name="sprname" readonly value="<?php echo $sname; ?>" class="presi">
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Section: <input type="text" name="sprname" readonly value="<?php echo $ssection; ?>" class="presi">
                                        </h1>
                                    </li>
                                </ul>
                            </div>
                            <div class="selection-container">
                                <h6>Select</h6>
                            <select name="selection" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($secretary_row = mysqli_fetch_array($secretary)) {
                                ?>
                                    <option name="press" value="<?php echo $secretary_row['id']; ?>"><?php echo $secretary_row['id']; ?> <?php echo $secretary_row['last_name']; ?></option>
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

    <!-- these are the script tags for jQuery, note: jQuery will not work offline because of this -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</html>