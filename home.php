<?php 
  session_start();
  if(!isset($_SESSION["login_details"])){
    header("location:login.php");
  }
?>
<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <h2>Welcome : <?php echo $_SESSION["login_details"]["UNAME"]; ?></h2>
  </body>
</html>