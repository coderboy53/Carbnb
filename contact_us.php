<!-- DOCUMENTS BEGINS HERE -->
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <!-- Stylesheet can be edited at css/contact_style.css -->
    <link href="css/contact_style.css" rel="stylesheet" type="text/css" />
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
           <!-- Form to get complaints or feedback or queries begins here -->
            <form action = "" method = "post">
              <!-- Entering Full Name -->
              <input type = "text" name = "fullname" id = "name" placeholder="Name"><br>
              <!-- Entering Email ID -->
              <input type = "email" name = "email" id="email" placeholder="Email"><br>
              <!-- Entering Phone Number -->
              <input type = "text" name = "phno" id="phno" placeholder="Phone No"><br>
              <!-- Entering Location -->
              <select name="location" id = "location">
                <option value="select" selected disabled hidden>Location</option>
                <option value="klk">Kolkata</option>
                <option value="chn">Chennai</option>
                <option value="mmb">Mumbai</option>
                <option value="dlh">Delhi</option>
              </select><br>
              <!-- Entering Review Type -->
              <select name="reviewType" id = "reviewType">
                <option value="select" selected disabled hidden>Review Type</option>
                <option value="query">Query</option>
                <option value="suggestions">Suggestions</option>
                <option value="Complaint">Complaint</option>
              </select><br><br>
              <!-- Entering Description of their Feedback -->
              <textarea placeholder="Enter your Review" name = "reviewdesc" id="textarea" rows='10' cols='40'></textarea>
              <br><br>
              <!-- Submitting the form -->
              <input type="submit" name = "submit" value="Submit">
            </form>
            <!-- Form ends here -->
          <br><br>
          <p>2021 © Carbnb. All rights reserved.<br><br></p>
          </div>
       </div>
     </main>
     <!-- Page content ends here -->
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
    //SQL Query to insert all these data as a row into the feedback table
    $sql = "INSERT INTO feedback(NAME, EMAIL, PHONENUMBER, LOCATION, REVIEW_TYPE, DESCRIPTION, STATUS, A_ID) VALUES ('$fullname','$email','$phone','$location','$reviewType','$reviewDesc','$status','$a_id')";
    //Executing the Query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    //Message displayed when the process is successful
    if($res == TRUE)
    {
      echo '<script>alert("Your feedback has been submitted successfully!")</script>';
    }
  }
?>
<!-- END OF DOCUMENT -->