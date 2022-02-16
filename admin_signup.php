<?php
session_start();
require_once('connection.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];
    $admin_name = $_POST["admin_name"];
    $admin_phone_number = $_POST["admin_phone_number"];
    $rank = 'admin';
    $pwd = password_hash($admin_password,PASSWORD_DEFAULT);
    $statement = $pdo->prepare("INSERT INTO login(LOGIN_NAME,LOGIN_PASSWORD,LOGIN_RANK) VALUES
    (:LOGIN_NAME,:LOGIN_PASSWORD,:LOGIN_RANK)");
    $statement->bindValue(":LOGIN_NAME",$admin_username);
    $statement->bindValue(":LOGIN_PASSWORD",$pwd);
    $statement->bindValue(":LOGIN_RANK",$rank);
    $statement->execute();
    $last_ins = $pdo->lastInsertId();
    unset($statement);
    $statement = $pdo->prepare("INSERT INTO admin(ADMIN_NAME,ADMIN_PHONE_NUMBER,ADMIN_LOGIN_ID) VALUES
    (:ADMIN_NAME,:ADMIN_PHONE_NUMBER,:ADMIN_LOGIN_ID)");
    $statement->bindValue(":ADMIN_NAME",$admin_name);
    $statement->bindValue(":ADMIN_PHONE_NUMBER",$admin_phone_number);
    $statement->bindValue(":ADMIN_LOGIN_ID",$last_ins);
    $statement->execute();
    header("Location: login.php");
    
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Sign Up</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

    <form class="well form-horizontal" action="admin_signup.php" method="post"  id="contact_form">
<fieldset>
<!-- Form Name -->
<legend><center><h2><b>Registration Form</b></h2></center></legend><br>

<!-- Text input-->
	
<!--<label for="agent_name">Agent Name</label>
        <input type="text" id="agent_name" placeholder = "Enter your Name" name="agent_name" required>
-->
<div class="form-group">
  <label class="col-md-4 control-label" for="admin_username">Admin Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="admin_username" id="admin_username" placeholder="Enter username" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="admin_password" >Admin Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="admin_password" placeholder="Enter Password" class="form-control"  type="password" required>
    </div>
  </div>
</div>
	
<!--Text input-->
	
<div class="form-group">
  <label class="col-md-4 control-label" for="admin_name">Admin Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="admin_name" id="admin_name" placeholder="Enter name" class="form-control"  type="text" required>
    </div>
  </div>
</div>
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="admin_phone_number">Admin Phone Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="admin_phone_number" placeholder="Enter Phone Number" class="form-control"  type="text">
    </div>
		<br>
		<p class="col-md-offset-1 col-md-11">&nbsp;Already have an account? <a href="login.php">Login</a></p>
  </div>
</div>
	
<!-- Select Basic -->

<!-- Success message -->


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script><script  src="./script.js"></script>

</body>
</html>
