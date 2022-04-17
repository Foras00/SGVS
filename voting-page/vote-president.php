<?php
include "../config.php";
if (!isset($_SESSION['barcode'])) {
    session_destroy();
    header('Location: ../index.php');
} else {
    //gamit lang to para maka generate ng <option> don sa baba yung may while loop
    $pres = $con->query("SELECT * FROM PRESIDENT_TABLE");

    # President
    $pcn = "";
    $pname = "";
    $psection = "";

    # President

    if (isset($_POST['btn'])) {
        //new variable $pid pang kuha nung selected sa <selection> para magamit sa query
        $pid = $_POST['selection'];
        $ppres = $con->query("SELECT * FROM PRESIDENT_TABLE WHERE ID = '$pid'");

        //kapag tumuloy yung query (walang error)
        if ($sp = mysqli_fetch_assoc($ppres)) {
            //iinitialize nito yung mga pre declared variable sa taas na walang value (="") with value na galing sa sql
            $pcn = $sp['id'];
            $pname = "" . $sp['first_name'] . " " . $sp['last_name'] . "";
            $psection = $sp['section'];
        }
    }
    if (isset($_POST['btn1'])) {
        //$pre bagong variable getting value nung <input> sa Candidate NO
        $pre = $_POST['pres'];

        //kapag may laman(!="") yung $pre means naka select si user ng candidate
        if ($pre != "") {
            //since may laman yung variable na $pre 
            //mag start ng bagong session tapos mag dedeclare ng $_SESSION variable
            //yung $_SESSION variable yung gagamitin para makuha yung user choices na candidates
            session_start();
            $_SESSION['president'] = $pre;
            header('Location: vote-vicepresident.php');
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
                <h1 class="card-title">Presidents
                <?php echo $pname; ?>
                </h1>
                <form method="POST">
                    <div class="cards-container">
                        <div class="cards">
                            <div class="card" name="card" id="card">
                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($sp['candidate_image']); ?>" alt="Please select Candidate" onerror=this.src="../res/placeholder.png" class="candidate-image" id="image">
                                <div class="card-content">

                                    <h5>Select President Candidate</h5>
                                    <ul>
                                        <li>
                                            <h1>Candidate NO.:
                                                <input type="text" name="pres" value="<?php echo $pcn; ?>" class="presi" readonly>
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
                                </div>
                                <div class="selection-container">
                                    <h6>Select</h6>
                                <select name="selection" id="party" class="forms select-forms">
                                    <option value="none">none</option>
                                    <?php
                                    while ($pres_row = mysqli_fetch_array($pres)) {
                                    ?>
                                        <option name="press" value="<?php echo $pres_row['id']; ?>"><?php echo $pres_row['id']; ?> <?php echo $pres_row['last_name']; ?></option>
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
    <script type="text/javascript" src="../script/voting-page.js"></script>



    </html>


<?php } ?>