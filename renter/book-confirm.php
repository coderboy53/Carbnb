<?php
session_Start();
require_once "../config/pdo.php";
if(!isset($_SESSION['R_ID'])){
    header('location:rent-error.php');
    die("Please login to access this page.");
}
else
{
    if(isset($_GET['id']))
    {
      $vehicleno = $_GET['id'];
      $conn = mysqli_connect('localhost','root','','carbnb');
      $sql = "SELECT c.*, o.* from car c INNER JOIN owner o ON c.O_ID = o.O_ID WHERE c.VEHICLE_NO = '$vehicleno'";
      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      $row1 = mysqli_fetch_array($res);
    }
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
          <h1> Confirm Rental </h1><br>
          <p>We need to you carefully check the details below regarding your rental booking. Confirm the details, and please re-enter the dates of your booking. When you're done, click Confirm.</p>
        </div>
        </div>
          <div class = "row">
            <div class = "col col-12 col-sm-4">
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
            <div class = "col col-12 col-sm-4">
              <div class="card">
                <!-- Model of the car is the heading -->
                <h3 class="card-header bg-secondary text-white">Owner Details</h3>
                <!-- Other details of the car such as Company, Owner Name and Rate per day is displayed here -->
                <div class="card-body">
                    <dl class="row">
                    <dt class="col-6">Owner Name</dt>
                    <dd name = "brand" class="col-6"><?php echo $row1['NAME'] ?></dd>
                    <dt class="col-6">Email</dt>
                    <dd name = "no_of_seats" class="col-6"><?php echo $row1['EMAIL'] ?></dd>
                    <dt class="col-6">Phone Number</dt>
                    <dd name = "owner_name" class="col-6"><?php echo $row1['PHONE_NO'] ?></dd>
                    <dt class="col-6">Location</dt>
                    <dd name = "rate" class="col-6"><?php echo $row1['LOCATION'] ?></dd>
                    </dl>
                </div>
              </div>
            </div>
            <div class = "col col-12 col-sm-4">
              <div class="card">
                <!-- Model of the car is the heading -->
                <h3 class="card-header bg-secondary text-white">Booking Details</h3>
                <!-- Other details of the car such as Company, Owner Name and Rate per day is displayed here -->
                <div class="card-body">
                  <br>
                  <form id = "cardetails" name = "cardetails" action = "" method = "post">
                    <!-- Available from date: -->
                    <input class = "dates" id="f_date" name = "fdate" type = "text" placeholder = "From date" onfocus = "(this.type='date')" onblur= "(this.type='text')">
                    <!-- Available to date: -->
                  <br><br>
                    <input class = "dates" id="t_date" name = "tdate" type = "text" placeholder = "To date" onfocus = "(this.type='date')" onblur= "(this.type='text')">
                  <br><br>
                </div>
              </div>
            </div>
          </div>
          <div class = "row">
              <div class = "col-12">
                <br>
              <a href = "final.php?id=<?$row1['VEHICLE_NO']?>"><button type="submit" name = "submit" class="btn btn-secondary btn-lg btn-block"> Confirm </button></a>
              <br>
              </div>
            </div>
            </form>
      </div>
    </main>
  </body>
</html>
<?php
  //Connecting to the database
  $conn = mysqli_connect('localhost','root','','carbnb');
  //Action when 'Submit' button is clicked
  if(isset($_POST['submit']))
  {
    //Getting values from the input fields
    $fromdate = $_POST['fdate'];
    $todate = $_POST['tdate'];
    $vehicleno = $_GET['id'];
    $r_email = $_SESSION['R_ID'];
    $status = "O";
    $date1 = date_create($fromdate);
    $date2 = date_create($todate);
    $diff = date_diff($date1, $date2);
    $day = $diff->days;
    $amount = $row1['RATE']*$day;
    //SQL Query to insert all these data as a row into the feedback table
    $sql = "INSERT INTO booking(FROM_DATE, AMOUNT, TO_DATE, STATUS, RENTER_ID, C_VEHICLENO) VALUES ('$fromdate','$amount','$todate','$status','$r_email','$vehicleno')";
    //Executing the Query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    //Message displayed when the process is successful
    if($res == TRUE)
    {
      $_SESSION['VEHICLE_NO'] = $row1['VEHICLE_NO'];
      ?>
      <script type="text/javascript">
      window.location.href = 'final.php';
      </script>
      <?php
    }
  }
?>