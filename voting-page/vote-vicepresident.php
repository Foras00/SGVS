<?php
include "../config.php";
$vpres = $con->query("SELECT * FROM VICEPRESIDENT_TABLE");
$fb = $_SESSION['ppr'];

# Vice President
$vpcn = "";
$vpname = "";
$vpsection = "";



# Vice President
if (isset($_POST['vbtn'])) {
    $vpre = $_POST['vselection'];
    $vpres = $con->query("SELECT * FROM VICEPRESIDENT_TABLE WHERE ID = '$vpre'");

 
    if ($spv = mysqli_fetch_assoc($vpres)) {
        $vpcn = $spv['id'];
        $vpname = "" . $spv['first_name'] . " " . $spv['last_name'] . "";
        $vpsection = $spv['section'];
    }
}
if (isset($_POST['vbtn1'])) {
    $vpre = $_POST['vpres'];
    if ($vpre != "") {
        session_start();
        # next page 
        $_SESSION['scc'] = $vpre;
        header('Location: secretary.php');
    } else {
        echo "<script> alert('Please Select a Candidate') </script>";
        # code...
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
            <h1 class="card-title">Vice Presidents
            <?php
            echo $vpname;
            ?>
            </h1>
            <form method="POST">
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($spv['candidate_image']); ?>" alt="Please select Candidate" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                            <div class="card-content">

                                <h5>Select Vice President Candidate</h5>
                                <ul>
                                    <li>
                                        <h1>Candidate NO.:
                                            <input type="text" name="vpres" value="<?php echo $vpcn; ?>" class="presi" readonly>
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Name: <input type="text" name="vprname" readonly value="<?php echo $vpname; ?>" class="presi">
                                        </h1>
                                    </li>
                                    <li>
                                        <h1>Section: <input type="text" name="vprname" readonly value="<?php echo $vpsection; ?>" class="presi">
                                        </h1>
                                    </li>
                                </ul>
                            </div>
                            <div class="selection-container">
                                <h6>Select</h6>
                                <select name="vselection" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($vpres_row = mysqli_fetch_array($vpres)) {
                                    ?>
                                        <option name="vpress" value="<?php echo $vpres_row['id']; ?>"><?php echo $vpres_row['id']; ?> <?php echo $vpres_row['last_name']; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="submit" name="vbtn" class="subb">
                            </div>
                        </div>

                    </div>
                </div>

                <input type="submit" name="vbtn1" class="sub1" value="NEXT">
            </form>
        </div>

    </div>
</body>

<!-- these are the script tags for jQuery, note: jQuery will not work offline because of this -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</html>