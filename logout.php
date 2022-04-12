<?php
if (isset($_POST['y-button'])) {
    session_destroy();
    header('location: index.php');
}
?>

<div class="logout-container" id="logout-container">
    <div class="logout-confirmation" name="logout-confirmation" id="logout-confirmation">
        <h1>Log out?</h1>
        <form action="POST">
        <input type="submit" name="confirm" value="Yes" class="logout-decision-buttons" id="y-button">

        </form>
        <input type="submit" name="confirm" value="No" class="logout-decision-buttons" id="n-button">
    </div>
</div>




</div>