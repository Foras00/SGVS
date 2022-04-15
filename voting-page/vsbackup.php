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

    $pp = mysqli_fetch_assoc($pres);

    $ppp = "";
if(isset($_POST['submit-btn'])){
    $selected = $_POST['pres-select'];
    session_start();
    $_SESSION['president'] = $selected;
    header('Location: vp.php');
}
if(isset($_POST['pres-select'])){
    $ppp = $selected;
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
    <form method="POST" action="">
        <input type="text" name="testP"    value="<?php echo $ppp ?>">
        <select name="pres-select" id="">
            <?php while ($p = mysqli_fetch_assoc($pres)) { ?>
                <option value="<?php echo $p['id'] ?>"><?php echo $p['first_name'] ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="submit Vote" name="submit-btn">
        </form>




    </body>





    <!-- these are the script tags for jQuery, note: jQuery will not work offline because of this -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="../script/voting-page.js"></script>








    </html>
<?php } ?>