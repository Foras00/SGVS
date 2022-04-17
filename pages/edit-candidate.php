<?php
include "../config.php";
if (!isset($_SESSION['adminId']) && !isset($_SESSION['passwrd'])) {
    header('Location: ../err.php');
} else {
    $id = $_SESSION['adminId'];
    $pss = $_SESSION['passwrd'];
    $csearch_errmsg = "";
    $vsearch_errmsg = "";
    $psearch_errmsg = "";
    $getparties = $con->query("SELECT * FROM PARTY_TABLE");
    $cand_id = "";
    $cand_fn = "";
    $cand_ln = "";
    $cand_sec = "";
    $cand_p = "";
    $cand_pos = "";

    $voter_id = "";
    $voter_fn = "";
    $voter_ln = "";
    $voter_sec = "";
    $voter_sy = "";

    $party_id = "";
    $party_n = "";

    if (isset($_POST['cand_searchbar'])) {
        $input = mysqli_real_escape_string($con, $_POST['cand_searchbar']);
        $pos = mysqli_real_escape_string($con, $_POST['position']);
        if ($pos == "select") {
            $csearch_errmsg = "Please Select Position";
        } else {
            if (!"" == $input) {
                $sq = $con->query("SELECT * FROM " . $pos . "_TABLE WHERE ID = $input");
                if ($res = mysqli_fetch_assoc($sq)) {
                    $cand_id = $res['id'];
                    $cand_fn = $res['first_name'];
                    $cand_ln = $res['last_name'];
                    $cand_sec = $res['section'];
                    $cand_p = $res['party_id'];
                    $cand_pos = $pos;
                } else {
                    $csearch_errmsg = "candidate ID not found";
                }
            } else {
                $csearch_errmsg = "Search bar is empty";
            }
        }
    }
    if (isset($_POST['voter_searchbar'])) {
        $input = mysqli_real_escape_string($con, $_POST['voter_searchbar']);

        if (!"" == $input) {
            $sq = $con->query("SELECT * FROM VOTER_TABLE WHERE VOTER_ID = $input");
            if ($res = mysqli_fetch_assoc($sq)) {
                $voter_id = $res['voter_id'];
                $voter_fn = $res['voter_fname'];
                $voter_ln = $res['voter_lname'];
                $voter_sec = $res['section'];
                $voter_sy = $res['school_year'];
            } else {
                $vsearch_errmsg = "Voter ID not found";
            }
        } else {
            $vsearch_errmsg = "Search bar is empty";
        }
    }

    if (isset($_POST['party_searchbar'])) {
        $input = mysqli_real_escape_string($con, $_POST['party_searchbar']);

        if (!"" == $input) {
            $sq = $con->query("SELECT * FROM PARTY_TABLE WHERE PARTY_ID = $input");
            if ($res = mysqli_fetch_assoc($sq)) {
                $party_id = $res['party_id'];
                $party_n = $res['party_name'];
            } else {
                $psearch_errmsg = "Party ID not found";
            }
        } else {
            $psearch_errmsg = "Party bar is empty";
        }
    }



?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="../style/edt-candidate.css">
        <title>Edit</title>
    </head>

    <body>
        <?php include "../nav.php" ?>
        <div class="confirmation" id="conf">
            <div class="input-container">
                <div class="inputs">
                    <h5 style="font-family: 'roboto'; color: white;">Confirm Identity</h5>
                    <h5 id="conf-err" class="conf-err"></h5>
                    <input type="text" name="input-id" id="input-id" placeholder="Admin ID" class="field aid">
                    <input type="password" name="input-pass" id="input-pass" placeholder="Password" class="field">
                    <input type="submit" name="submit-cofirmation" id="submit-confirmation" value="Confirm" class="conf-btn">
                    <input type="submit" name="cancel-confirmation" id="cancel-confirmation" value="Cancel" class="conf-btn">
                </div>

            </div>
        </div>


        <div class="main-content">

            <div class="selection-container">

                <select name="selections" id="selections" class="selections">
                    <option value="">Choose what to edit</option>
                    <option value="candidate">Candidate</option>
                    <option value="voter">Voter</option>
                    <option value="party">Party</option>
                </select>
            </div>

            <!--Candidate Form-->
            <div class="candidate-form">
                <div class="search-container">
                    <h5 style="color: white; font-family:'roboto';">Select Candidate Position</h5>
                    <form method="POST" action="">
                        <select name="position" id="position" class="search">
                            <option value="select">Select</option>
                            <option value="PRESIDENT">President</option>
                            <option value="VICEPRESIDENT">Vice President</option>
                            <option value="COUNCILOR">Councilor</option>
                            <option value="SECRETARY">Secretary</option>
                            <option value="TREASURER">Treasurer</option>
                            <option value="AUDITOR">Auditor</option>
                        </select>

                        <input type="text" name="cand_searchbar" id="cand_sb" class="search" placeholder="Search by ID">
                        <input type="submit" value="Search" class="conf-btn">
                    </form>
                    <p name="search_erremg" id="search_erremg" style="color: white;"> <?php echo $csearch_errmsg ?> </p>
                </div>
                <div class="form-container">
                    <div class="form-contents">
                        <img src="../res/placeholder.png" alt="" id="cand_img" class="cand-img">
                        <div class="contents">
                            <h4>Position:
                                <input type="text" name="selected_pos" id="selected_pos" value="<?php echo $cand_pos ?>" class="cand-pos" readonly>
                            </h4>


                            <h4>Candidate ID: <input type="text" name="candidateid" id="getid" value="<?php echo $cand_id ?>" class="cand-pos" readonly></h4>
                            <input type="text" name="cand_id" id="cand_id" class="candidate-infos" value="<?php echo $cand_id ?>" disabled="true">

                            <h4>First Name: <?php echo $cand_fn ?></h4>
                            <input type="text" name="cand_fname" id="cand_fn" class="candidate-infos" value="<?php echo $cand_fn ?>" disabled="true">

                            <h4>Last Name: <?php echo $cand_ln ?></h4>
                            <input type="text" name="cand_lname" id="cand_ln" class="candidate-infos" value="<?php echo $cand_ln ?>" disabled="true">

                            <h4>Section: <?php echo $cand_sec ?></h4>
                            <input type="text" name="cand_section" id="cand_sec" class="candidate-infos" value="<?php echo $cand_sec ?>" disabled="true">

                            <h4>Party: <input type="text" name="candidateid" id="getprty" value="<?php echo $cand_p ?>" class="cand-pos" readonly></h4>
                            <select name="cand_party" id="cand_p" class="candidate-infos" style="width: 10em; cursor: pointer;" disabled="true">
                                <option value="select">Select</option>
                                <?php while ($prtyrows = mysqli_fetch_assoc($getparties)) { ?>
                                    <option value="<?php echo $prtyrows['party_id']; ?>"><?php echo $prtyrows['party_id']; ?>
                                        <?php echo $prtyrows['party_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>

                            <div class="submit-btn">
                                <input type="submit" name="submit-btn" id="submit-btn" value="edit" class="edt-btns" disabled="true">
                                <input type="submit" name="del-btn" id="del-btn" value="delete" class="edt-btns" disabled="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Voter form-->
            <div class=" voter-form">
                <div class="search-container">
                    <form method="POST" action="">
                        <h5 style="color: white; font-family:'roboto';">Search Voter</h5>
                        <input type="text" name="voter_searchbar" id="voter_sb" class="search" placeholder="Search">
                        <input type="submit" value="Search" class="conf-btn">
                    </form>
                    <p name="search_erremg" id="search_erremg" style="color: white;"><?php echo $vsearch_errmsg ?></p>
                </div>
                <div class="form-container">
                    <div class="form-contents">
                        <img src="../res/placeholder.png" alt="" id="voter_img" class="cand-img">
                        <div class="contents">
                            <h4>Voter ID: <input type="text" name="voterid" id="getvid" value="<?php echo $voter_id ?>" class="cand-pos" readonly></h4>
                            <input type="text" name="id" id="voter_id" class="candidate-infos" value="<?php echo $voter_id ?>" disabled="true">
                            <h4>First Name: <?php echo $voter_fn ?></h4>
                            <input type="text" name="fname" id="voter_fn" class="candidate-infos" value="<?php echo $voter_fn ?>" disabled="true">
                            <h4>Last Name: <?php echo $voter_ln ?></h4>
                            <input type="text" name="lname" id="voter_ln" class="candidate-infos" value="<?php echo $voter_ln ?>" disabled="true">
                            <h4>Section: <?php echo $voter_sec ?></h4>
                            <input type="text" name="lname" id="voter_sec" class="candidate-infos" value="<?php echo $voter_sec ?>" disabled="true">
                            <h4>School Year: <?php echo $voter_sy ?></h4>
                            <input type="text" name="lname" id="voter_sy" class="candidate-infos" value="<?php echo $voter_sy ?>" disabled="true">
                            <div class="submit-btn">
                                <input type="submit" name="vsubmit-btn" id="vsubmit-btn" value="edit" class="edt-btns" disabled="true">
                                <input type="submit" name="vdel-btn" id="vdel-btn" value="delete" class="edt-btns" disabled="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--party form-->
            <div class="party-form">
                <div class="search-container">
                    <form method="POST" action="">
                        <h5 style="color: white; font-family:'roboto';">Search Voter</h5>
                        <input type="text" name="party_searchbar" id="party_sb" class="search" placeholder="Search">
                        <input type="submit" value="Search" class="conf-btn">
                    </form>
                    <p name="psearch_erremg" id="psearch_erremg" style="color: white;"><?php echo $psearch_errmsg ?></p>
                </div>
                <div class="form-container">
                    <div class="form-contents">
                        <div class="contents">
                            <h4>Party ID: <input type="text" name="partyid" id="getpid" value="<?php echo $party_id ?>" class="cand-pos" readonly></h4>
                            <input type="text" name="id" id="party_id" class="candidate-infos" value="<?php echo $party_id ?>" disabled="true">
                            <h4>Party Name: <?php echo $party_n ?></h4>
                            <input type="text" name="pname" id="party_n" class="candidate-infos" value="<?php echo $party_n ?>" disabled="true">
                            <div class="submit-btn">
                                <input type="submit" name="psubmit-btn" id="psubmit-btn" value="edit" class="edt-btns" disabled="true">
                                <input type="submit" name="pdel-btn" id="pdel-btn" value="delete" class="edt-btns" disabled="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div>
                                        <div>
                                            <div>
                                                <input type="hidden" data-value="<?php echo $id ?>" id="si">
                                                <input type="hidden" data-value="<?php echo $pss ?>" id="sp">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type=" text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="../script/global-nav.js"></script>
        <script type="text/javascript" src="../script/edt-candidate.js"></script>
        <script type="text/javascript" src="../plugin/bootstable.js"></script>
        </div>
    </body>

    </html>
<?php } ?>