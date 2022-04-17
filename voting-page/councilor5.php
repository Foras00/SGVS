<?php
include "../config.php";
$c5query = $con->query("SELECT * FROM COUNCILOR_TABLE");
if (!isset($_SESSION['barcode'])) {
    session_destroy();
    header('Location: ../index.php');
} else if (!isset($_SESSION['councilor4'])) {
    header('Location: councilor4.php');
} else {



    # Councilor5
    $c5cn = "";
    $c5name = "";
    $c5section = "";

    # Councilor4
    if (isset($_POST['btn'])) {
        $ccl5 = $_POST['c2selection'];
        $coun5 = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = '$ccl5'");


        if ($spc5 = mysqli_fetch_assoc($coun5)) {
            $c5cn = $spc5['id'];
            $c5name = "" . $spc5['first_name'] . " " . $spc5['last_name'] . "";
            $c5section = $spc5['section'];
        }
    }


    if (isset($_POST['btn1'])) {
        $c2tre = $_POST['c5pres'];
        echo "test";

        if ($c2tre != "") {
            session_start();
            $_SESSION['councilor5'] = $c2tre;
            header('Location: confirmation-page.php');
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
        <title>Councilor5</title>

    </head>

    <body>
        <?php include "vote-nav.php" ?>
        <div class="content_container">
            <div class="dashboard-container">
                <h1 class="card-title">Councilor
                    <?php
                    echo $c5name;
                    ?>
                </h1>
                <form method="POST">
                    <div class="cards-container">
                        <div class="cards">
                            <div class="card" name="card" id="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($spc5['candidate_image']); ?>" alt="Please select Candidate" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                                <div class="card-content">

                                    <h5>Select 5ft Councilor Candidate</h5>
                                    <ul>
                                        <li>
                                            <h1>Candidate NO.:
                                                <input type="text" name="c5pres" value="<?php echo $c5cn; ?>" class="presi" readonly>
                                            </h1>
                                        </li>
                                        <li>
                                            <h1>Name: <input type="text" name="prname" readonly value="<?php echo $c5name; ?>" class="presi">
                                            </h1>
                                        </li>
                                        <li>
                                            <h1>Section: <input type="text" name="prname" readonly value="<?php echo $c5section; ?>" class="presi">
                                            </h1>
                                        </li>
                                    </ul>
                                </div>
                                <div class="selection-container">
                                    <h6>Select</h6>
                                    <select name="c2selection" id="party" class="forms select-forms">
                                        <option value="none">none</option>
                                        <?php
                                        while ($councilor5_row = mysqli_fetch_array($c5query)) {
                                        ?>
                                            <option name="press" value="<?php echo $councilor5_row['id']; ?>"><?php echo $councilor5_row['id']; ?> <?php echo $councilor5_row['last_name']; ?></option>
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