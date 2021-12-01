<?php
  session_start();
  require_once "config/pdo.php";
  $msg=""; 
  if (isset($_POST['fullname']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['email']) && isset($_POST['phone_no']))
  {
    if($_POST['password1']==$_POST['password2'] && strlen($_POST['password1'])>=7)
	  {
      $psw=hash('md5',$_POST['password1']);
      $sql= "INSERT INTO owner(email, name, phone_no,password) values(:e,:f,:ph,:p)";
      $stmt= $pdo->prepare($sql);
      $stmt->execute(array(
        ':e' => $_POST['email'],
        ':f' => $_POST['fullname'],
        ':ph' => $_POST['phone_no'],
        ':p' => $psw,
      ));
      echo '<script>alert("An account has been created successfully!")</script>';
      header("Location: index.php");
    }
    else
    {
      $msg="Passwords dont match";
    }
    if(strlen($_POST['password1'])<7)
    {
      $msg="Password too short";
    }
  }
?>  
<!-- HTML Code begins -->
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Register</title>
    <!-- Edit Stylesheet at css/register_style.css -->
    <link href="css/register_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
     <div id = "div1">
       <!-- Title to act as link to return to homepage -->
       <div class ='title'>
         <a href = "./index.php"><h1 class = 'sitehead'>Carbnb</h1></a>
       </div>
       <!-- Form to collect details of the account -->
       <form action = "owner_register.php" method = "POST">
       <div class = 'textbox'>
          <!-- Field to enter Full Name -->
          <input type = "text" name = "fullname" class = "email" placeholder="Full Name">
          <!-- Field to enter Password -->
          <input type = "password" name = "password1" id = "password" placeholder="Password">
          <!-- Field to retype Password -->
          <input type = "password" name = "password2" id = "password" placeholder="Retype Password">
          <!-- Field to enter Email ID -->
          <input type = "email" id = "email1" name = "email" placeholder="Email">
          <!-- Field to enter Phone Number -->
          <input type = "text" id = "phno" name = "phone_no" placeholder="Phone Number">
      </div>
        <!-- Button to submit form and register -->
        <input type="submit" value = "Register">
      </form>
      <br>
      <a id = 'create' href = './owner_login.php'>Already have an account? Sign in here</a>
      <br>
      <br>
      <p>
        <?php
         if ($msg!="")
        {
            echo($msg);
            $msg="";
        }
        ?>
        </p>
      </div>
      <!-- Page Content ends here --> 
  </body>
</html>
<!-- END OF DOCUMENT -->

