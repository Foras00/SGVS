<?php
function logout(){
    session_destroy();
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/admin-page.css">
    <title>Admin Page</title>
</head>

<body>
    <div class="nav-container">
        <header class="main-header">
            <nav class="nav" id="nav">
                <div class="hamburger-button" id="hamburger-button">
                    <img src="../res/hamburg-btn.png" alt="" id="hamburger-button-icon">
                </div>

                <div class="logo">
                    <span style="--i:1">S</span>
                    <span style="--i:2">G</span>
                    <span style="--i:3">V</span>
                    <span style="--i:4">S</span>
                </div>
            </nav>
        </header>
    </div>

    <div class="content-container">


        <div class="side-nav" id="side-nav">
            <div class="side-nav-container">

                <div class="home-tab" id="home-tab">
                    <h2>Home</h2>
                </div>
                <div class="register-tab" id="register-tab"">
                        <h2>Register</h2>
                        <h2 class=" reg">Register a Candidate</h2>
                    <h2 class="reg">Register a Voter</h2>
                    <h2 class="reg">Remove a candidate</h2>
                    <h2 class="reg">Remove a Voter</h2>
                </div>
                <div class="account-tab" id="account-tab"">
                        <h2>Account</h2>
                        <h2 class=" acc">Change Password</h2>
                    <h2 class="acc" name="logout" id="logout-button">Log out</h2>
                </div>

            </div>
        </div>





        <!--logout-->
        <div class="logout-container" id="logout-container">
            <div class="logout-confirmation" name="logout-confirmation" id="logout-confirmation">
                <h1>Log out?</h1>
                <input type="submit" name="confirm" value="Yes" class="logout-decision-buttons" id="y-button">
                <input type="submit" name="confirm" value="No" class="logout-decision-buttons" id="n-button">
            </div>
        </div>




        <div class="table-responsive">
            <!--this is used for responsive display in mobile and other devices-->
            <table class="table table-bordered table-hover table-striped" style="table-layout: fixed; color: white;">
                <thead>

                    <tr>

                        <th>User Id</th>
                        <th>User Name</th>
                        <th>User E-mail</th>
                        <th>User Pass</th>
                        <th>Delete User</th>
                    </tr>
                </thead>

                <?php  
        include("../config.php");  
        $view_users_query="select * from VOTER_TABLE";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $voter_id=$row[0];  
            $voter_fname=$row[1];  
            $voter_lname=$row[2];  
            $section=$row[3];  
  
        ?>

                <tr>
                    <!--here showing results in the table -->
                    <td><?php echo $voter_id;  ?></td>
                    <td><?php echo $voter_fname;  ?></td>
                    <td><?php echo $voter_lname;  ?></td>
                    <td><?php echo $section;  ?></td>
                    <td><a href="delete.php?del=<?php echo $user_id ?>"><button
                                class="btn btn-danger">Delete</button></a></td>
                    <!--btn btn-danger is a bootstrap button to show danger-->
                </tr>

                <?php } ?>

            </table>
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <script type="text/javascript" src="../script/admin-page.js"></script>
        </div>

</body>

</html>