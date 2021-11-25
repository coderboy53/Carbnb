<?php
session_Start();
require_once "pdo.php";
if(!isset($_SESSION['R_ID'])){
    header('location:rent-error.php');
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
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="rent_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
   <main class ='main'>
   <!-- Edit NavBar at assets/navbar.php -->
   <?php include('assets/navbar2.php') ?>
     <!-- Page content begins here -->
     <div class = "row justify-content-center">
     <div class = "center">
       <h1>Choose that car you dreamed about.</h1>
       <br><br>
       <div class = "container">
       <form action = "" method = "post">
       <div class="dropdown">
          <select name = "location" id="locat">
            <option value="select" selected disabled hidden>Location</option>
            <option value="Kolkata">Kolkata</option>
            <option value="Chennai">Chennai</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Delhi">Delhi</option>
          </select>
          <input type = "text" id = "searchbox" name = "names" placeholder="Search Car">
          <input class = "dates" id="f_date" name = "fdate" type = "text" placeholder = "From date" onfocus = "(this.type='date')" onblur= "(this.type='text')">
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
        if(isset($_POST['submit'])){
          $conn = mysqli_connect('localhost','root','','carbnb');
          $names = $_POST['names'];
          $location = $_POST['location'];
          $from_date = $_POST['fdate'];
          $to_date = $_POST['tdate'];
            $sql = "SELECT c.VEHICLE_NO, c.COMPANY, c.MODEL, c.NO_OF_SEATS, c.RATE, o.NAME FROM car c INNER JOIN owner o ON c.O_EMAIL = o.EMAIL WHERE (c.COMPANY LIKE '%$names%' OR c.MODEL LIKE '%$names%') AND c.location LIKE '%$location%'";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      ?>
      <br><br>
        <?php
            while ($row1 = mysqli_fetch_array($res)){
        ?>
        <div class = "container">
          <div class = "column">
                    <div class="card">
                        <h3 class="card-header bg-secondary text-white"><?php echo $row1['MODEL'] ?></h3>
                        <div class="card-body">
                        <?php
                          if(isset($_POST['book']))
                          {
                            $_SESSION['brand'] = $_POST['brandin'];
                            header('location:book-confirm.php');
                          }
                        ?>
                          <form id = "cardetails" name = "cardetails" action = "" method = "post">
                            <dl class="row">
                                <dt class="col-6">Brand</dt>
                                <dd name = "brand" class="col-6"><input type = "hidden" name = "brandin" value = "<?php echo $row1['COMPANY'] ?>"></dd>
                                <dt class="col-6">No. of seats</dt>
                                <dd name = "no_of_seats" class="col-6"><?php echo $row1['NO_OF_SEATS'] ?></dd>
                                <dt class="col-6">Owner</dt>
                                <dd name = "owner_name" class="col-6"><?php echo $row1['NAME'] ?></dd>
                                <dt class="col-6">Rate</dt>
                                <dd name = "rate" class="col-6">Rs. <?php echo $row1['RATE'] ?> per day</dd>
                            </dl>
                            <button type = "button" name = "book" type = "submit" class = "btn btn-dark float-right">Book this Car </button>
                            </form>
                          </div>
                    </div>
            </div>
            </div>
        <!--
         <tr>
            <td style="width:30%"><?php // echo $row1['MODEL'] ?></td>
            <td style="width:60%"><?php // echo $row1['COMPANY'] ?><br><?php // echo $row1['NO_OF_SEATS'] ?> <br> Owner: A<br>Rate: 1000 per day</td>
            <td style="width:10%"> <input type="button" value="Book"></td>
        </tr>
        -->
        <?php
            }
          }
        ?>
        </div>
     </div>  
   </main>
  </body>
</html>
