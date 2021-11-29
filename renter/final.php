<?php
session_Start();
require_once "../config/pdo.php";
if(!isset($_SESSION['R_ID'])){
    header('location:rent-error.php');
    die("Please login to access this page.");
}
else
{
    
      $vehicleno = $_SESSION['VEHICLE_NO'];
      $conn = mysqli_connect('localhost','root','','carbnb');
      $sql = "SELECT c.*, o.* from car c INNER JOIN owner o ON c.O_EMAIL = o.EMAIL WHERE c.VEHICLE_NO = '$vehicleno'";
      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      $row1 = mysqli_fetch_array($res);
}
?>
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/book_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <main class ='main'>
    <!-- Edit NavBar at assets/navbar.php -->
    <?php include('../assets/navbar2.php') ?>
      <!-- Page content begins here -->
      <div class = "body">
        <div class = "row justify-content-center">
        <div class = "about">
          <h1> You're all set! </h1><br>
          <p>Your rental order has been confirmed! Find the details below, and contact the owner to discuss more details. Happy Renting! :) </p>
        </div>
        </div>
          <div class = "row">
            <div class = "col col-12 col-sm-6">
              <div class="card">
                <!-- Model of the car is the heading -->
                <h3 class="card-header bg-secondary text-white">Vehicle Details</h3>
                <!-- Other details of the car such as Company, Owner Name and Rate per day is displayed here -->
                <div class="card-body">
                  <form id = "cardetails" name = "cardetails" action = "" method = "post">
                    <dl class="row">
                    <dt class="col-6">Brand</dt>
                    <dd name = "brand" class="col-6"><?php echo $row1['COMPANY'] ?></dd>
                    <dt class="col-6">Model</dt>
                    <dd name = "brand" class="col-6"><?php echo $row1['MODEL'] ?></dd>
                    <dt class="col-6">No. of seats</dt>
                    <dd name = "no_of_seats" class="col-6"><?php echo $row1['NO_OF_SEATS'] ?></dd>
                    <dt class="col-6">Rate</dt>
                    <dd name = "rate" class="col-6">Rs. <?php echo $row1['RATE'] ?> per day</dd>
                    </dl>
                  </form>
                </div>
              </div>
            </div>
            <div class = "col col-12 col-sm-6">
              <div class="card">
                <!-- Model of the car is the heading -->
                <h3 class="card-header bg-secondary text-white">Owner Details</h3>
                <!-- Other details of the car such as Company, Owner Name and Rate per day is displayed here -->
                <div class="card-body">
                    <dl class="row">
                    <dt class="col-6">Owner Name</dt>
                    <dd name = "brand" class="col-6"><?php echo $row1['NAME'] ?></dd>
                    <dt class="col-6">Email</dt>
                    <dd name = "no_of_seats" class="col-6"><?php echo $row1['O_EMAIL'] ?></dd>
                    <dt class="col-6">Phone Number</dt>
                    <dd name = "owner_name" class="col-6"><?php echo $row1['PHONE_NO'] ?></dd>
                    <dt class="col-6">Location</dt>
                    <dd name = "rate" class="col-6"><?php echo $row1['location'] ?></dd>
                    </dl>
                </div>
              </div>
            </div>
      </div>
      <div class = "row">
          <br><br>
      <p id = "tac">*The final costs is subject to the state of the vehicle after rental period. Please check the main features of the car and note the dents/fixes that was already in place. The final rate is to be negotiated with the owner from here on out, according to the Owner's discretion in providing add-on packages. Inform us regarding any suspicious activity as and when it applies. We will guide you to the nearest help center.</p>
        </div>
    </main>
  </body>
</html>
