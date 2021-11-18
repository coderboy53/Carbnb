<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <link href="login_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
     <div id = "div1">
       <div class ='title'>
         <a href = "./index.html"><h1 class = 'sitehead'>Carbnb</h1></a>
       </div>
       <div class = 'textbox'>
          <input type = "email" name = "email" class = "email" placeholder="Email">
          <input type = "password" name = "password" id = "password" placeholder="Password">
        </div>
        <input type="submit" name = "submit" value="Sign in">
        <br><br>
        <a id = 'create' href = './register.php'>Don't have an account? Create one.</a>
     </div>
  </body>
</html>
<?php
session_start();
error_reporting(0);
$conn = mysqli_connect('localhost','root','','carbnb');
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM renter WHERE EMAIL ='".$_POST['username']."' and PASSWORD ='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['login']=$_POST['username'];
header("location:dashboard.php");
exit();
}
else
{
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$errormsg="Invalid username or password";
$extra="login.php";
}
}