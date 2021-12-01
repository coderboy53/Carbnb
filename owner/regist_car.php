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
  $sql1 = "SELECT * FROM owner WHERE O_ID = '$oid'";
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
    <link href="../css/regist_car_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
   <main class ='main'>
     <!-- Edit NavBar at assets/navbar.php -->
     <?php include('../assets/navbar3.php') ?>
     <!-- Page content begins here -->
     <div class = 'center'>
       <div id= "carform">
         <br>
         <br>
         <h1 class = "formhead">Car Details</h1>
         <br>
         <br>
         <form action="" method="post">
           <input type="text" name="vehicleno" id = "vehicleno" pattern="^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$" placeholder="Vehicle Registration Number" title=" Eg: TN 22 BM 0919"><br>
           <select id="seats" name="seats">
             <option id="defopt" selected disabled hidden>No of seats</option>
             <option value="4" class="opt" id="four">Four seater</option>
             <option value="5" class="opt" id="five">Five seater</option>
             <option value="6" class="opt" id="six">Six seater</option>
             <option value="7" class="opt" id="seven">Seven seater</option>
             <option value="9" class="opt" id="nine">Nine seater</option>
           </select><br>
           <select id="company" name="company">
             <option id="defopt" selected disabled hidden>Company</option> 
             <option value="Hyundai" class="opt">Hyundai</option>
             <option value="Maruti Suzuki" class="opt">Maruti Suzuki</option>
             <option value="Tata" class="opt">Tata</option>
             <option value="Honda" class="opt">Honda</option>
             <option value="Toyota" class="opt">Toyota</option>
             <option value="Mahindra" class="opt">Mahindra</option>
             <option value="Mercedes" class="opt">Mercedes</option>
             <option value="Tata" class="opt">Tata</option>
             <option value="Volkswagen" class="opt">Volkswagen</option>
           </select><br>
           <input type = "text" name="model" id = "model" placeholder="Enter Car model"><br>
           <input type = "text" name="age" id = "age" pattern="^[0-9]?[1-9]" placeholder="Enter Car age"><br>
           <input type = "text" name="rate" id = "rate" placeholder="Enter Car rate"><br>
           <select name="location" id="locat">
            <option value="select" selected disabled hidden>Location</option>
            <option value="Kolkata">Kolkata</option>
            <option value="Chennai">Chennai</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Delhi">Delhi</option>
          </select><br><br>
          <input name="submit" type="submit" value="Register">
         </form>
         <br>
         <br>
         <p>2021 © Carbnb. All rights reserved.<br><br></p>
       </div>
     </div>  
   </main>
  </body>
</html>
<!-- HTML Content ends here -->
<!-- PHP Code begins -->
<?php
  //Connecting to the database
  $conn = mysqli_connect('localhost','root','','carbnb');
  //Action when 'Submit' button is clicked
  if(isset($_POST['submit']))
  {
    //Getting values from the input fields
    $vehicleno = $_POST['vehicleno'];
    $seats = $_POST['seats'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $model = $_POST['model'];
    $age = $_POST['age'];
    $rate = $_POST['rate'];
    $oid = $_SESSION['O_ID'];
    //SQL Query to insert all these data as a row into the feedback table
    $sql = "INSERT INTO car(VEHICLE_NO, COMPANY, MODEL, AGE, RATE, LOCATION, NO_OF_SEATS, O_ID) VALUES ('$vehicleno','$company','$model','$age','$rate','$location','$seats','$oid');";
    //Executing the Query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    //Message displayed when the process is successful
    if($res == TRUE)
    {
      echo '<script>alert("Your car has been registered successfully!")</script>';
    }
  }
?>
<!-- END OF DOCUMENT -->