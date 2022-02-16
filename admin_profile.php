<?php
session_start();
require_once "connection.php";

$uid = $_SESSION["uid"];
$statement = $pdo->prepare("SELECT ADMIN_NAME,ADMIN_PHONE_NUMBER 
							FROM ADMIN 
							WHERE ADMIN_LOGIN_ID=:uid");
$statement->bindValue(":uid",$uid);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
$_SESSION["name"] = $user["ADMIN_NAME"] ;
$_SESSION["phonenumber"] = $user["ADMIN_PHONE_NUMBER"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Profile</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> <a class="nav-link" href="admin.php">Home <span class="sr-only"></span></a> </li>
          <li class="nav-item"> </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="admin_credentials.php">Change Credentials</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="admin_personal_info.php">Change Personal Information</a> 
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        </form>
      </div>
      <span class="nav-item active"><a class="nav-link" href="logout.php">Logout<span class="sr-only"></span></a></span></nav>
    <header>
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-12">
				<h1 class="text-center">Hi, <?php echo $_SESSION["name"]; ?></h1>
              <h3 class="text-center">Welcome to your Admin profile</h3>
              <p class="text-center">These are Your Details</p>
				<br>
				<p class="text-center"><b>Admin Name: </b><?php echo $_SESSION["name"]; ?></p>
				<p class="text-center"><b>Admin Phone Number: </b><?php echo $_SESSION["phonenumber"]; ?></p>
              <p>&nbsp;</p>
				<br>
				<br>
				<p class="text-center">To change your details, click on <strong>Settings UP TOP</strong></p>
				<p class="text-center">&nbsp; </p>
            </div>
          </div>
        </div>
      </div>
    </header>
<div class="container"> </div>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © RYAN KIBET. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.3.1.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>