<?php
include "../config.php";
if (!isset($_SESSION['adminId'])) {
    header('Location: ../err.php');
} else {
    $search_errmsg = "";
    $getparties = $con->query("SELECT * FROM PARTY_TABLE");
    $cand_id = "";
    $cand_fn = "";
    $cand_ln = "";
    $cand_sec = "";
    $cand_p = "";
    $cand_pos = "";

    if (isset($_POST['cand_searchbar'])) {
        $input = mysqli_real_escape_string($con, $_POST['cand_searchbar']);
        $pos = mysqli_real_escape_string($con, $_POST['position']);
        if ($pos == "select") {
            $search_errmsg = "Please Select Position";
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
                }else{
                    $search_errmsg = "candidate ID not found";
                }
            } else {
                $search_errmsg = "Search bar is empty";
            }
        }
    }


    if (isset($_POST['submit-btn'])) {
        $cid = $_POST['cand_id'];
        $cfn = $_POST['cand_fname'];
        $cln = $_POST['cand_lname'];
        $cs = $_POST['cand_section'];
        $cp = $_POST['cand_party'];
        $cpos = $_POST['selected_pos'];
        $canid = $_POST['candidateid'];
        if ($cp == "select") {
            $cp = $cand_p;
        } else {
            $cp = $_POST['cand_party'];
        }
        if ($cid != "" && $cfn != "" && $cln != "") {
            $cand_query = "UPDATE " . $cpos . "_TABLE SET ID = '" . $cid . "', FIRST_NAME = '" . $cfn . "', LAST_NAME = '" . $cln . "', PARTY_ID = '" . $cp . "', SECTION = '" . $cs . "' WHERE ID = '" . $canid . "'";
            if (mysqli_query($con, $cand_query)) {
                echo "<script> alert('Candidate has been updated successfully! $canid') </script>";
            } else {
                echo "<script> alert('Error Updating!') </script>";
            }
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
                <div class="search">
                    <h5 style="color: white; font-family:'roboto';">Select Candidate Position</h5>
                    <form method="POST" action="">
                        <select name="position" id="position" class="search-cand">
                            <option value="select">Select</option>
                            <option value="PRESIDENT">President</option>
                            <option value="VICEPRESIDENT">Vice President</option>
                            <option value="COUNCILOR">Councilor</option>
                            <option value="SECRETARY">Secretary</option>
                            <option value="TREASURER">Treasurer</option>
                            <option value="AUDITOR">Auditor</option>
                        </select>

                        <input type="text" name="cand_searchbar" id="cand_sb" class="search-cand" placeholder="Search by ID">
                        <input type="submit" value="Search">
                    </form>
                    <p name="search_erremg" id="search_erremg" style="color: white;"><?php echo $search_errmsg ?></p>
                </div>
                <div class="form-container">
                    <div class="form-contents">
                        <img src="../res/placeholder.png" alt="" id="cand_img" class="cand-img">
                        <form method="POST" action="">
                            <h4>Position:  
                                <input type="text" name="selected_pos" value="<?php echo $cand_pos ?>" class="cand-pos" readonly>
                            </h4>
                           

                            <h4>Candidate ID:  <input type="text" name="candidateid" value="<?php echo $cand_id ?>" class="cand-pos" readonly></h4>
                            <input type="text" name="cand_id" id="cand_id" class="candidate-infos" value="<?php echo $cand_id ?>">
                            <h4>First Name: <?php echo $cand_fn ?></h4>
                            <input type="text" name="cand_fname" id="cand_fn" class="candidate-infos" value="<?php echo $cand_fn ?>">
                            <h4>Last Name: <?php echo $cand_ln ?></h4>
                            <input type="text" name="cand_lname" id="cand_ln" class="candidate-infos" value="<?php echo $cand_ln ?>">
                            <h4>Section: <?php echo $cand_sec ?></h4>
                            <input type="text" name="cand_section" id="cand_sec" class="candidate-infos" value="<?php echo $cand_sec ?>">
                            <h4>Party: <?php echo $cand_p ?></h4>
                            <select name="cand_party" id="cand_p" class="candidate-infos" style="width: 10em; cursor: pointer;">
                                <option value="select">Select</option>
                                <?php while ($prtyrows = mysqli_fetch_assoc($getparties)) { ?>
                                    <option value="<?php echo $prtyrows['party_id']; ?>"><?php echo $prtyrows['party_id']; ?>
                                        <?php echo $prtyrows['party_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="submit-btn">
                                <input type="submit" name="submit-btn" value="Submit" class="candidate-infos">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Voter form-->
            <div class=" voter-form">
                <div class="search">
                    <form method="GET" action="">
                    <h5 style="color: white; font-family:'roboto';">Search Voter</h5>
                        <input type="text" name="voter_searchbar" id="voter_sb" class="search-cand" placeholder="Search">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <div class="form-container">
                    <div class="form-contents">
                        <img src="../res/placeholder.png" alt="" id="voter_img" class="cand-img">
                        <form action="">
                            <h4>Voter ID:</h4>
                            <input type="text" name="id" id="voter_id" class="candidate-infos">
                            <h4>First Name:</h4>
                            <input type="text" name="fname" id="voter_fn" class="candidate-infos">
                            <h4>Last Name</h4>
                            <input type="text" name="lname" id="voter_ln" class="candidate-infos">
                            <div class="submit-btn">
                                <button class="candidate-submit candidate-infos"">Submit</button>
                                </div> 
                             </form>
                        </div>
                    </div>

                            </div>
                            <script type=" text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
                                    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
                                    <script type="text/javascript" src="../script/global-nav.js"></script>
                                    <script type="text/javascript" src="../script/edt-candidate.js"></script>
                                    <script type="text/javascript" src="../plugin/bootstable.js"></script>
    </body>

    </html>
<?php } ?>