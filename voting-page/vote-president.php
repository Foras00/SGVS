<?php
include "../config.php";
if (isset($_GET['back'])) {
    session_destroy();
    header('Location: ../index.php');
} else {

    $pres = $con->query("SELECT * FROM PRESIDENT_TABLE");



    # President
    $pcn = "";
    $pname = "";
    $psection = "";

    # President
    if (isset($_POST['btn'])) {
        $pre = mysqli_real_escape_string($con, $_POST['pparty']);
        $ppres = $con->query("SELECT * FROM PRESIDENT_TABLE WHERE ID = '$pre'");


        if ($sp = mysqli_fetch_assoc($ppres)) {
            $pcn = $sp['id'];
            $pname = "" . $sp['first_name'] . " " . $sp['last_name'] . "";
            $psection = $sp['section'];
            
        }
    }

    if (isset($_POST['btn1'])) {
        $dat = $_POST['president'];

        session_start();
        $_SESSION['ppr'] = $dat;
        //header('Location: vote-vicepresident.php');
        echo '<script>alert ('.$_POST['pparty'].') </script>';

        //exit;
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
        <title>Document</title>

    </head>

    <body>
        <?php include "vote-nav.php" ?>
        <div class="content_container">
            <div class="dashboard-container">
                <h1 class="card-title">Presidents</h1>
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($sp['candidate_image']); ?>" alt="Please select Candidate" class="candidate-image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1>Candidate NO.:
                                        <input type="text" name="president" readonly value="<?php echo $pcn; ?>" class="presi">
                                    </h1>
                                </li>
                                <li>
                                    <h1>Name: <input type="text" name="prname" readonly value="<?php echo $pname; ?>" class="presi">
                                    </h1>
                                </li>
                                <li>
                                    <h1>Section: <input type="text" name="prname" readonly value="<?php echo $psection; ?>" class="presi">
                                    </h1>
                                </li>
                            </ul>
                            <form method="POST">
                                <select name="pparty" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($pres_row = mysqli_fetch_array($pres)) {
                                    ?>
                                        <option name="press" value="<?php echo $pres_row['id']; ?>"><?php echo $pres_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="submit" name="btn" class="subb">
                            </form>
                        </div>

                    </div>
                </div>
                <form method="POST" action="" >
                <input type="submit" name="btn1" class="sub1" value="NEXT">
                </form>
            </div>

        </div>
    </body>

    <!-- these are the script tags for jQuery, note: jQuery will not work offline because of this -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="../script/voting-page.js"></script>



    </html>


<?php } ?>