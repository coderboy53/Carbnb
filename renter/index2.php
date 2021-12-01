<!-- DOCUMENT BEGINS HERE -->
<?php
  session_start();
  require_once "../config/pdo.php";
  //Message to display if the user is not logged in
  if(!isset($_SESSION['R_ID'])){
      header("location:../login-error.php");
}
else
{
  //Collecting details of the login session to display info accordingly
  $rid = $_SESSION['R_ID'];
  //Connecting to the database
  $con=mysqli_connect("localhost","root","","carbnb");
  //SQL query to retrieve user info as per login session
  $sql1 = "SELECT name FROM renter WHERE R_ID = '$rid'";
  //Executing the SQL query
  $exc = mysqli_query($con, $sql1);
  $row = mysqli_fetch_array($exc);
}
?>
<!-- HTML Code begins here -->
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <!-- Edit Stylesheet at css/style.css -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <main class ='main'>
      <!-- Edit NavBar at assets/navbar2.php -->
      <?php include('../assets/navbar2.php') ?>
      <!-- Page content begins here -->
      <div class = "body">
        <div class = "about">
          <h1>Welcome, <?php echo $row['name']; ?></h1>
          <br>
          <h3>You are in the right place.</h3>
          <br><br>
          <p id = "para_main"> Choose Rent A Car option in the NavBar to start booking.</p>
          <br>
          <br>
          <br>
        </div> 
      </div>
    </main>
  </body>
</html>
<!-- END OF DOCUMENT -->
