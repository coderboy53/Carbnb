<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <link href="contact_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <main class ='main'>
    <!-- Edit NavBar at assets/navbar.php -->
    <?php include('assets/navbar.php') ?>
     <!-- Page content begins here -->
       <div class = 'center'>
         <div id= "carform">
           <br>
           <br>
           <h1 class = "formhead">Contact Us</h1>
           <br>
           <br>
            <form action = "" method = "post">
              <input type = "text" name = "fullname" id = "name" placeholder="Name"><br>
              <input type = "email" name = "email" id="email" placeholder="Email"><br>
              <input type = "text" name = "phno" id="phno" placeholder="Phone No"><br>
              <select name="location" id = "location">
                <option value="select" selected disabled hidden>Location</option>
                <option value="klk">Kolkata</option>
                <option value="chn">Chennai</option>
                <option value="mmb">Mumbai</option>
                <option value="dlh">Delhi</option>
              </select><br>
              <select name="reviewType" id = "reviewType">
                <option value="select" selected disabled hidden>Review Type</option>
                <option value="query">Query</option>
                <option value="suggestions">Suggestions</option>
                <option value="Complaint">Complaint</option>
              </select><br><br>
              <textarea placeholder="Enter your Review" name = "reviewdesc" id="textarea" rows='10' cols='40'></textarea>
              <br><br>
              <input type="submit" name = "submit" value="Submit">
            </form>
          <br><br>
          <p>2021 © Carbnb. All rights reserved.<br><br></p>
          </div>
       </div>
     </main>
  </body>
</html>
<?php
  $conn = mysqli_connect('localhost','root','','carbnb');
  if(isset($_POST['submit']))
  {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phno'];
    $location = $_POST['location'];
    $reviewType = $_POST['reviewType'];
    $reviewDesc = $_POST['reviewdesc'];
    $status = "OPEN";
    if($reviewType == 'Query')
    {
      $a_id = "1";
    }
    elseif($reviewType == 'Suggestions')
    {
      $a_id = "2";
    }
    else
    {
      $a_id = "3";
    }

    $sql = "INSERT INTO feedback(NAME, EMAIL, PHONENUMBER, LOCATION, REVIEW_TYPE, DESCRIPTION, STATUS, A_ID) VALUES ('$fullname','$email','$phone','$location','$reviewType','$reviewDesc','$status','$a_id')";
    
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    if($res == TRUE)
    {
      echo '<script>alert("Your feedback has been submitted successfully!")</script>';
    }
  }
?>
