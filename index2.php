<?php
session_Start();
require_once "pdo.php";
if(!isset($_SESSION['R_ID'])){
    die("No user logged in.");
}
else
{
  $rid = $_SESSION['R_ID'];
  $con=mysqli_connect("localhost","root","","carbnb");
  $sql1 = "SELECT name FROM renter WHERE R_ID = '$rid'";
  $exc = mysqli_query($con, $sql1);
  $row = mysqli_fetch_array($exc);
}
?>
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
   <main class ='main'>
   <!-- Edit NavBar at assets/navbar.php -->
   <?php include('assets/navbar2.php') ?>
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
