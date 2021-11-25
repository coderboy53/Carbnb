
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <link href="register_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
     <div id = "div1">
       <div class ='title'>
         <a href = "./index.php"><h1 class = 'sitehead'>Carbnb</h1></a>
       </div>
       <form action = "" method = "post">
       <div class = 'textbox'>
          <input type = "text" name = "fullname" class = "email" placeholder="Full Name">
          <input type = "password" name = "password" id = "password" placeholder="Password">
          <input type = "email" id = "email1" name = "email" placeholder="Email">
          <input type = "text" id = "phno" name = "phone" placeholder="Phone Number">
          <input type = "text" id = "dlno" name = "dlno" placeholder="Driving License Number">
      </div>
        <input type="submit" name = "submit" value="Register">
      </form>
        <br><br>
     </div>
  </body>
</html>
<?php
  $conn = mysqli_connect('localhost','root','','carbnb');
  if(isset($_POST['submit']))
  {
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dlno = $_POST['dlno'];

    $sql = "INSERT INTO renter(EMAIL,NAME,PHONE_NO,DRIVING_LICENSE_NO,PASSWORD) VALUES ('$email','$fullname','$phone','$dlno','$password')";
    
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($res == TRUE)
    {
      echo '<script>alert("An account has been created successfully!")</script>';
    }
  }
?>
