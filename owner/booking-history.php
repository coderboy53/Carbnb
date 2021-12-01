<?php
session_Start();
require_once "../config/pdo.php";
if(!isset($_SESSION['O_ID']))
{
    header('location:../login-error.php');
    die("Please login to access this page.");
}
else
{
  $oid = $_SESSION['O_ID'];
  $con=mysqli_connect("localhost","root","","carbnb");
  $sql1 = "SELECT r.NAME, b.BOOKING_ID,b.AMOUNT,b.FROM_DATE,b.TO_DATE,c.COMPANY,c.LOCATION,c.MODEL FROM owner o INNER JOIN booking b INNER JOIN car c INNER JOIN renter r ON r.R_ID = b.RENTER_ID AND b.C_VEHICLENO = c.VEHICLE_NO AND c.O_ID = o.O_ID WHERE o.O_ID = '$oid' ORDER BY b.BOOKING_ID;";
  $exc = mysqli_query($con, $sql1);
}
?>
<!-- HTML Code begins -->
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/rent_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <main class ='main'>
      <!-- Edit NavBar at assets/navbar2.php -->
      <?php include('../assets/navbar3.php') ?>
      <!-- Page content begins here -->
      <br><br><br>
      <div class = "row justify-content-center">
        <h1>Your Booking History</h1>
        <br><br>
        </div>
        <br><br>
        <?php
          //This loops runs as many number of times as the total number of search results
          while ($row1 = mysqli_fetch_array($exc))
          {
        ?>
        <div class = "container">
          <div class = "column">
            <!-- Each search result (car) will be displayed as a separate card -->
            <div class="card">
              <!-- Model of the car is the heading -->
              <h3 class="card-header bg-secondary text-white">Booking ID: <?php echo $row1['BOOKING_ID'] ?></h3>
              <!-- Other details of the car such as Company, Owner Name and Rate per day is displayed here -->
              <div class="card-body">
                  <dl class="row">
                  <dt class="col-6">Car</dt>
                  <dd name = "brand" class="col-6"><?php echo $row1['COMPANY'] ?> - <?php echo $row1['MODEL'] ?></dd>
                  <dt class="col-6">City</dt>
                  <dd name = "no_of_seats" class="col-6"><?php echo $row1['LOCATION'] ?></dd>
                  <dt class="col-6">Renter</dt>
                  <dd name = "renter_name" class="col-6"><?php echo $row1['NAME'] ?></dd>
                  <dt class="col-6">Rate</dt>
                  <dd name = "rate" class="col-6">Rs. <?php echo $row1['AMOUNT'] ?></dd>
                  <dt class="col-6">From</dt>
                  <dd name = "rate" class="col-6"><?php echo $row1['FROM_DATE'] ?></dd>
                  <dt class="col-6">To</dt>
                  <dd name = "rate" class="col-6"><?php echo $row1['TO_DATE'] ?></dd>
                  </dl>
              </div>
            </div>
            <br>
          </div>
        </div>
        <!-- Ending the loop -->
        <?php
          }
        ?>
        </div>
      </div>  
    </main>
  </body>
</html>
<!-- END OF DOCUMENT -->