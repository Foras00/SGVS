<?php
include "../config.php";
if (isset($_GET['back'])) {
    session_destroy();
    header('Location: ../index.php');
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

    
    



    if (isset($_POST['press'])) {
        $pre = mysqli_real_escape_string($con, $_POST['party']);
        $pres = $con->query("SELECT * FROM PRESIDENT_TABLE WHERE ID = $pre");
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
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($pres_row = mysqli_fetch_array($pres)) {
                                ?>
                                    <option name="press" value="<?php echo $pres_row['id']; ?>"><?php echo $pres_row['id']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <h1 class="card-title">Vice Presidents</h1>

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
                                <li>
                                    <h1>Votes: </h1>
                                </li>
                            </ul>
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($vpres_row = mysqli_fetch_array($vpres)) {
                                ?>
                                    <option name="vpress" value="<?php echo $vpres_row['id']; ?>"><?php echo $vpres_row['id']; ?></option>
                                <?php } ?>
                            </select>
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
                                <li>
                                    <h1>Votes: </h1>
                                </li>
                            </ul>
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($secretary_row = mysqli_fetch_array($secretary)) {
                                ?>
                                    <option name="sect" value="<?php echo $secretary_row['id']; ?>"><?php echo $secretary_row['id']; ?></option>
                                <?php } ?>
                            </select>
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
                                <li>
                                    <h1>Votes: </h1>
                                </li>
                            </ul>
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($treasurer_row = mysqli_fetch_array($treasurer)) {
                                ?>
                                    <option name="press" value="<?php echo $treasurer_row['id']; ?>"><?php echo $treasurer_row['id']; ?></option>
                                <?php } ?>
                            </select>
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
                                <li>
                                    <h1>Votes: </h1>
                                </li>
                            </ul>
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($auditor_row = mysqli_fetch_array($auditor)) {
                                ?>
                                    <option name="auditor" value="<?php echo $auditor_row['id']; ?>"><?php echo $auditor_row['id']; ?></option>
                                <?php } ?>
                            </select>
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
                                <li>
                                    <h1>Votes: </h1>
                                </li>
                            </ul>
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($councilor1_row = mysqli_fetch_array($councilor1)) {
                                ?>
                                    <option name="count1" value="<?php echo $councilor1_row['id']; ?>"><?php echo $councilor1_row['id']; ?></option>
                                <?php } ?>
                            </select>
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
                                <li>
                                    <h1>Votes: </h1>
                                </li>
                            </ul>
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($councilor2_row = mysqli_fetch_array($councilor2)) {
                                ?>
                                    <option name="count2" value="<?php echo $councilor2_row['id']; ?>"><?php echo $councilor2_row['id']; ?></option>
                                <?php } ?>
                            </select>
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
                                <li>
                                    <h1>Votes: </h1>
                                </li>
                            </ul>
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($councilor3_row = mysqli_fetch_array($councilor3)) {
                                ?>
                                    <option name="count3" value="<?php echo $councilor3_row['id']; ?>"><?php echo $councilor3_row['id']; ?></option>
                                <?php } ?>
                            </select>
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
                                <li>
                                    <h1>Votes: </h1>
                                </li>
                            </ul>
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($councilor4_row = mysqli_fetch_array($councilor4)) {
                                ?>
                                    <option name="count4" value="<?php echo $councilor4_row['id']; ?>"><?php echo $councilor4_row['id']; ?></option>
                                <?php } ?>
                            </select>
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
                                <li>
                                    <h1>Votes: </h1>
                                </li>
                            </ul>
                            <select name="party" id="party" class="forms select-forms">
                                <option value="none">none</option>
                                <?php
                                while ($councilor5_row = mysqli_fetch_array($councilor5)) {
                                ?>
                                    <option name="count5" value="<?php echo $councilor5_row['id']; ?>"><?php echo $councilor5_row['id']; ?></option>
                                <?php } ?>
                            </select>
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