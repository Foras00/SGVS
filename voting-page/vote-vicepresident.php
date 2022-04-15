<?php
include "../config.php";
$vpres = $con->query("SELECT * FROM VICEPRESIDENT_TABLE");
$fb = $_SESSION['ppr'];

# Vice President
$vpcn = "";
$vpname = "";
$vpsection = "";

# Vice President
if (isset($_POST['vpress'])) {
    $vpre = mysqli_real_escape_string($con, $_POST['party']);
    $vpres = $con->query("SELECT * FROM VICEPRESIDENT_TABLE WHERE ID = $vpre");


    if ($spv = mysqli_fetch_assoc($vpres)) {
        $vcn = $sp['id'];
        $vname = $sp['first_name'] + " " + $sp['last_name'];
        $vsection = $sp['section'];
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
            echo $fb;
            ?>
            </h1> 
            <div class="cards-container">
                <div class="cards">
                    <div class="card" name="card" id="card">
                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($sp['candidate_image']); ?>" alt="Please select Candidate" class="candidate-image" id="image">
                        <ul class="card-content">
                            <li>
                                <h1>Candidate NO.:
                                    <input type="text" name="president" readonly value="<?php echo $vpcn; ?>" class="presi">
                                </h1>
                            </li>
                            <li>
                                <h1>Name: <input type="text" name="prname" readonly value="<?php echo $vpname; ?>" class="presi">
                                </h1>
                            </li>
                            <li>
                                <h1>Section: <input type="text" name="prname" readonly value="<?php echo $vpsection; ?>" class="presi">
                                </h1>
                            </li>
                        </ul>
                        <form method="POST">
                            <select name="pparty" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($vpres_row = mysqli_fetch_array($vpres)) {
                                ?>
                                    <option name="press" value="<?php echo $vpres_row['id']; ?>"><?php echo $vpres_row['id']; ?></option>
                                <?php } ?>
                            </select>
                            <input type="submit" name="btn" class="subb">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>