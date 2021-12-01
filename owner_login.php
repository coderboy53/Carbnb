<?php
  session_start();
  require_once "config/pdo.php";
  $msg="";
  if(isset($_POST['email']) && isset($_POST['psw']))
  {
    $psw= hash('md5',$_POST['psw']);
    echo "<script>console.log('$psw'); </script>";
    $sql="SELECT * FROM owner where EMAIL = :e AND PASSWORD = :p";
    $stmt=$pdo->prepare($sql);
      $stmt->execute(array(
          ':e' => $_POST['email'],
          ':p' => $psw,
      ));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($row!==FALSE)
      {
        $_SESSION['O_ID']=$row['O_ID'];
        header("Location: owner/index3.php");
      }
      else
      {
        $msg="No user exists with this email and password.";
      }
  }
?>

<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In</title>
    <link href="css/login_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
     <div id = "div1">
       <div class ='title'>
         <a href = "./index.php"><h1 class = 'sitehead'>Carbnb</h1></a>
       </div>
       <form action="owner_login.php" method = "POST">
       <div class = 'textbox'>
          <input type = "email" name = "email" class = "email" placeholder="Email">
          <input type = "password" name = "psw" id = "password" placeholder="Password">
       </div>
       <input type="submit" value = "Sign in">
       </form>
       <br><br>
       <a id = 'create' href = './owner_register.php'>Don't have an account? Create one.</a>
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
  </body>
</html>
