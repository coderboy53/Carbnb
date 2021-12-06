<?php
session_Start();
require_once "../config/pdo.php";
if(!isset($_SESSION['R_ID']))
{
    header('location:../login-error.php');
    die("Please login to access this page.");
}
else
{
  $rid = $_SESSION['R_ID'];
  $con=mysqli_connect("localhost","root","","carbnb");
  $sql1 = "SELECT * FROM renter WHERE R_ID = '$rid'";
  $exc = mysqli_query($con, $sql1);
  $row = mysqli_fetch_array($exc);
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
      <?php include('../assets/navbar2.php') ?>
      <!-- Page content begins here -->
      <div class = "row justify-content-center">
        <div class = "center">
        <h1>Choose that car you dreamed about.</h1>
        <br><br>
          <div class = "container">
            <!-- This acts as the search form to retrieve a list of cars according to their liking -->
            <form action = "" method = "post">
              <div class="dropdown">
                <!-- Dropdown list for location (4 cities) -->
                <select name = "location" id="locat">
                  <option value="select" selected disabled hidden>Location</option>
                  <option value="Kolkata">Kolkata</option>
                  <option value="Chennai">Chennai</option>
                  <option value="Mumbai">Mumbai</option>
                  <option value="Delhi">Delhi</option>
                </select>
                <!-- Search company or model names here -->
                <input type = "text" id = "searchbox" name = "names" placeholder="Search Car">
                <!-- Available from date: -->
                <input class = "dates" id="f_date" name = "fdate" type = "text" placeholder = "From date" onfocus = "(this.type='date')" onblur= "(this.type='text')">
                <!-- Available to date: -->
                <input class = "dates" id="t_date" name = "tdate" type = "text" placeholder = "To date" onfocus = "(this.type='date')" onblur= "(this.type='text')">
              </div>
              <div class = 'search'>
                <input type="submit" name = "submit" value="Find a car">
              </div>
            </form>
          </div>
        </div>
        <br>
        <br>
        <div class = "container">
        <?php
          // If the 'Find a car' button is pressed
          if(isset($_POST['submit']))
          {
            //Connecting to the database
            $conn = mysqli_connect('localhost','root','','carbnb');
            //Collecting the values from the form using POST method
            $names = $_POST['names'];
            $location = $_POST['location'];
            $from_date = $_POST['fdate'];
            $to_date = $_POST['tdate'];
            //SQL query to filter out the data according to the search
            $sql = "SELECT c.VEHICLE_NO, c.COMPANY, c.MODEL, c.NO_OF_SEATS, c.RATE, o.NAME FROM car c INNER JOIN owner o ON c.O_ID = o.O_ID WHERE (c.COMPANY LIKE '%$names%' OR c.MODEL LIKE '%$names%') AND c.location LIKE '%$location%'";
            //Executing SQL query
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        ?>
        <br><br>
        <?php
          //This loops runs as many number of times as the total number of search results
          while ($row1 = mysqli_fetch_array($res))
          {
        ?>
        <div class = "container">
          <div class = "column">
            <!-- Each search result (car) will be displayed as a separate card -->
            <div class="card">
              <!-- Model of the car is the heading -->
              <h3 class="card-header bg-secondary text-white"><?php echo $row1['MODEL'] ?></h3>
              <!-- Other details of the car such as Company, Owner Name and Rate per day is displayed here -->
              <div class="card-body">
                <form id = "cardetails" name = "cardetails" action = "" method = "post">
                  <dl class="row">
                  <dt class="col-6">Brand</dt>
                  <dd name = "brand" class="col-6"><?php echo $row1['COMPANY'] ?></dd>
                  <dt class="col-6">No. of seats</dt>
                  <dd name = "no_of_seats" class="col-6"><?php echo $row1['NO_OF_SEATS'] ?></dd>
                  <dt class="col-6">Owner</dt>
                  <dd name = "owner_name" class="col-6"><?php echo $row1['NAME'] ?></dd>
                  <dt class="col-6">Rate</dt>
                  <dd name = "rate" class="col-6">Rs. <?php echo $row1['RATE'] ?> per day</dd>
                  </dl>
                  <a href="book-confirm.php?id=<?=$row1['VEHICLE_NO']?>"><button type = "button" name = "book" type = "submit" class = "btn btn-dark float-right">Book this Car </button></a>
                </form>
                <!-- Action taken when Book this Car button is clicked -->
                <?php
                  if(isset($_POST['book']))
                  {
                    $_SESSION['brand'] = $_POST['brandin'];
                    header('location:book-confirm.php');
                  }
                ?>
              </div>
            </div>
            <br>
          </div>
        </div>
        <!-- Ending the loop -->
        <?php
          }
          }
        ?>
        </div>
      </div>  
    </main>
  </body>
</html>
<!-- END OF DOCUMENT -->