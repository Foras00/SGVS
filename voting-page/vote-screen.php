<?php
include "../config.php";
if (isset($_GET['back'])) {
    session_destroy();
    header('Location:');
} else {

    $pres = $con->query("SELECT * FROM PRESIDENT_TABLE");
    $vpres = $con->query("SELECT * FROM VICEPRESIDENT_TABLE");
    $councilor1 = $con->query("SELECT * FROM COUNCILOR_TABLE");
    $councilor2 = $con->query("SELECT * FROM COUNCILOR_TABLE");
    $councilor3 = $con->query("SELECT * FROM COUNCILOR_TABLE");
    $councilor4 = $con->query("SELECT * FROM COUNCILOR_TABLE");
    $councilor5 = $con->query("SELECT * FROM COUNCILOR_TABLE");
    $secretary = $con->query("SELECT * FROM SECRETARY_TABLE");
    $auditor = $con->query("SELECT * FROM AUDITOR_TABLE");
    $treasurer = $con->query("SELECT * FROM TREASURER_TABLE");


    # President
    $pcn = "";
    $pname = "";
    $psection = "";
    # Vice President
    $vpcn = "";
    $vpname = "";
    $vpsection = "";
    # Secretary
    $scn = "";
    $sname = "";
    $ssection = "";
    # Treasurer
    $tcn = "";  
    $tname = "";
    $tsection = "";
    # Auditor
    $acn = "";
    $aname = "";
    $asection = "";
    # Councilor1
    $c1cn = "";
    $c1name = "";
    $c1section = "";

    # Councilor2
    $c2cn = "";
    $c2name = "";
    $c2section = "";

    # Councilor3
    $c3cn = "";
    $c3name = "";
    $c3section = "";

    # Councilor4
    $c4cn = "";
    $c4name = "";
    $c4section = "";

    # Councilor5
    $c5cn = "";
    $c5name = "";
    $c5section = "";


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

    # Secretary
    if (isset($_POST['sparty'])) {
        $pre = mysqli_real_escape_string($con, $_POST['party']);
        $secretary = $con->query("SELECT * FROM SECRETARY_TABLE WHERE ID = $pre");


        if ($sp = mysqli_fetch_assoc($secretary)) {
            $scn = $sp['id'];
            $sname = $sp['first_name'] + " " + $sp['last_name'];
            $ssection = $sp['section'];
        }
    }

    # Treasurer
    if (isset($_POST['tparty'])) {
        $pre = mysqli_real_escape_string($con, $_POST['party']);
        $treasurer = $con->query("SELECT * FROM TREASURER_TABLE WHERE ID = $pre");


        if ($sp = mysqli_fetch_assoc($treasurer)) {
            $tcn = $sp['id'];
            $tname = $sp['first_name'] + " " + $sp['last_name'];
            $tsection = $sp['section'];
        }
    }

    # Auditor
    if (isset($_POST['aparty'])) {
        $pre = mysqli_real_escape_string($con, $_POST['party']);
        $auditor = $con->query("SELECT * FROM AUDITOR_TABLE WHERE ID = $pre");


        if ($sp = mysqli_fetch_assoc($auditor)) {
            $acn = $sp['id'];
            $aname = $sp['first_name'] + " " + $sp['last_name'];
            $asection = $sp['section'];
        }
    }

    # Councilor1
    if (isset($_POST['c1party'])) {
        $pre = mysqli_real_escape_string($con, $_POST['party']);
        $councilor1 = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = $pre");


        if ($sp = mysqli_fetch_assoc($councilor1)) {
            $c1cn = $sp['id'];
            $c1name = $sp['first_name'] + " " + $sp['last_name'];
            $c1section = $sp['section'];
        }
    }

    # Councilor2
    if (isset($_POST['c2party'])) {
        $pre = mysqli_real_escape_string($con, $_POST['party']);
        $councilor2 = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = $pre");


        if ($sp = mysqli_fetch_assoc($councilor2)) {
            $c2cn = $sp['id'];
            $c2name = $sp['first_name'] + " " + $sp['last_name'];
            $c2section = $sp['section'];
        }
    }
    # Councilor3
    if (isset($_POST['c3party'])) {
        $pre = mysqli_real_escape_string($con, $_POST['party']);
        $councilor3 = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = $pre");


        if ($sp = mysqli_fetch_assoc($councilor3)) {
            $c3cn = $sp['id'];
            $c3name = $sp['first_name'] + " " + $sp['last_name'];
            $c3section = $sp['section'];
        }
    }

    # Councilor4
    if (isset($_POST['c4party'])) {
        $pre = mysqli_real_escape_string($con, $_POST['party']);
        $councilor4 = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = $pre");


        if ($sp = mysqli_fetch_assoc($councilor4)) {
            $c4cn = $sp['id'];
            $c4name = $sp['first_name'] + " " + $sp['last_name'];
            $c4section = $sp['section'];
        }
    }

    # Councilor5
    if (isset($_POST['c5party'])) {
        $pre = mysqli_real_escape_string($con, $_POST['party']);
        $councilor5 = $con->query("SELECT * FROM COUNCILOR_TABLE WHERE ID = $pre");


        if ($sp = mysqli_fetch_assoc($councilor5)) {
            $c5cn = $sp['id'];
            $c5name = $sp['first_name'] + " " + $sp['last_name'];
            $c5section = $sp['section'];
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
                <h1 class="card-title">Vice Presidents</h1>

                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card1" id="card">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($spv['candidate_image']); ?>" alt="Please select Candidate" class="candidate-image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1 id="cand">Candidate NO.:
                                        <input type="text" name="president" readonly value="<?php echo $vpcn; ?>" class="presi">
                                    </h1>
                                <li>
                                    <h1>Name:
                                        <input type="text" name="president" readonly value="<?php echo $vpname; ?>" class="presi">
                                    </h1>
                                </li>
                                <li>
                                    <h1>Section:
                                        <input type="text" name="president" readonly value="<?php echo $vpsection; ?>" class="presi">
                                    </h1>
                                </li>
                            </ul>
                            <form method="POST">
                                <select name="vparty" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($vpres_row = mysqli_fetch_array($vpres)) {
                                    ?>
                                        <option name="vpress" value="<?php echo $vpres_row['id']; ?>"><?php echo $vpres_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="submit" name="btn" class="subb">

                            </form>
                        </div>
                    </div>
                </div>
                <h1 class="card-title">Secretary</h1>

                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="../res/placeholder.png" alt="" class="image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1 id="cand">Candidate NO.: </h1>
                                <li>
                                    <h1>Name: </h1>
                                </li>
                                <li>
                                    <h1>Section: </h1>
                                </li>
                            </ul>
                            <form method="POST">

                                <select name="sparty" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($secretary_row = mysqli_fetch_array($secretary)) {
                                    ?>
                                        <option name="sect" value="<?php echo $secretary_row['id']; ?>"><?php echo $secretary_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <h1 class="card-title">Treasurer</h1>
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="../res/placeholder.png" alt="" class="image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1 id="cand">Candidate NO.: </h1>
                                <li>
                                    <h1>Name: </h1>
                                </li>
                                <li>
                                    <h1>Section: </h1>
                                </li>
                            </ul>
                            <form method="POST">
                                <select name="tparty" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($treasurer_row = mysqli_fetch_array($treasurer)) {
                                    ?>
                                        <option name="treasurer" value="<?php echo $treasurer_row['id']; ?>"><?php echo $treasurer_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <h1 class="card-title">Auditor</h1>
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="../res/placeholder.png" alt="" class="image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1 id="cand">Candidate NO.: </h1>
                                <li>
                                    <h1>Name: </h1>
                                </li>
                                <li>
                                    <h1>Section: </h1>
                                </li>
                            </ul>
                            <form method="POST">
                                <select name="aparty" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($auditor_row = mysqli_fetch_array($auditor)) {
                                    ?>
                                        <option name="auditor" value="<?php echo $auditor_row['id']; ?>"><?php echo $auditor_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <h1 class="card-title">Councilor</h1>
                <div class="cards-container">
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="../res/placeholder.png" alt="" class="image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1 id="cand">Candidate NO.: </h1>
                                <li>
                                    <h1>Name: </h1>
                                </li>
                                <li>
                                    <h1>Section: </h1>
                                </li>
                            </ul>
                            <form method="POST">
                                <select name="c1party" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($councilor1_row = mysqli_fetch_array($councilor1)) {
                                    ?>
                                        <option name="count1" value="<?php echo $councilor1_row['id']; ?>"><?php echo $councilor1_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="../res/placeholder.png" alt="" class="image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1 id="cand">Candidate NO.: </h1>
                                <li>
                                    <h1>Name: </h1>
                                </li>
                                <li>
                                    <h1>Section: </h1>
                                </li>
                            </ul>
                            <form method="POST">
                                <select name="c2party" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($councilor2_row = mysqli_fetch_array($councilor2)) {
                                    ?>
                                        <option name="count2" value="<?php echo $councilor2_row['id']; ?>"><?php echo $councilor2_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="../res/placeholder.png" alt="" class="image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1 id="cand">Candidate NO.: </h1>
                                <li>
                                    <h1>Name: </h1>
                                </li>
                                <li>
                                    <h1>Section: </h1>
                                </li>
                            </ul>
                            <form method="POST">
                                <select name="c3party" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($councilor3_row = mysqli_fetch_array($councilor3)) {
                                    ?>
                                        <option name="count3" value="<?php echo $councilor3_row['id']; ?>"><?php echo $councilor3_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="../res/placeholder.png" alt="" class="image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1 id="cand">Candidate NO.: </h1>
                                <li>
                                    <h1>Name: </h1>
                                </li>
                                <li>
                                    <h1>Section: </h1>
                                </li>
                            </ul>
                            <form method="POST">
                                <select name="c4party" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($councilor4_row = mysqli_fetch_array($councilor4)) {
                                    ?>
                                        <option name="count4" value="<?php echo $councilor4_row['id']; ?>"><?php echo $councilor4_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="cards">
                        <div class="card" name="card" id="card">
                            <img src="../res/placeholder.png" alt="" class="image" id="image">
                            <ul class="card-content">
                                <li>
                                    <h1 id="cand">Candidate NO.: </h1>
                                <li>
                                    <h1>Name: </h1>
                                </li>
                                <li>
                                    <h1>Section: </h1>
                                </li>
                            </ul>
                            <form method="POST">
                                <select name="c5party" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($councilor5_row = mysqli_fetch_array($councilor5)) {
                                    ?>
                                        <option name="count5" value="<?php echo $councilor5_row['id']; ?>"><?php echo $councilor5_row['id']; ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </body>





    <!-- these are the script tags for jQuery, note: jQuery will not work offline because of this -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="../script/voting-page.js"></script>








    </html>
<?php } ?>