<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
session_start();
require_once('connection.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $agent_username = $_POST["agent_username"];
    $agent_password = $_POST["agent_password"];
    $agent_name = $_POST["agent_name"];
	  $agent_email = $_POST["agent_email"];
    $agent_phone_number = $_POST["agent_phone_number"];
	  $agent_latitude = $_POST["agent_latitude"];
	  $agent_longitude = $_POST["agent_longitude"];
    $rank = 'agent';
    $pwd = password_hash($agent_password,PASSWORD_DEFAULT);
    $statement = $pdo->prepare("INSERT INTO login(LOGIN_NAME,LOGIN_PASSWORD,LOGIN_RANK) VALUES
    (:LOGIN_NAME,:LOGIN_PASSWORD,:LOGIN_RANK)");
    $statement->bindValue(":LOGIN_NAME",$agent_username);
    $statement->bindValue(":LOGIN_PASSWORD",$pwd);
    $statement->bindValue(":LOGIN_RANK",$rank);
    $statement->execute();
    $last_ins = $pdo->lastInsertId();
    unset($statement);
    $statement = $pdo->prepare("INSERT INTO agents(AGENT_NAME,AGENT_EMAIL,AGENT_PHONE_NUMBER,AGENT_LATITUDE,AGENT_LONGITUDE,AGENT_LOGIN_ID) VALUES
    (:AGENT_NAME,:AGENT_EMAIL,:AGENT_PHONE_NUMBER,:AGENT_LATITUDE,:AGENT_LONGITUDE,:AGENT_LOGIN_ID)");
    $statement->bindValue(":AGENT_NAME",$agent_name);
	  $statement->bindValue(":AGENT_EMAIL",$agent_email);
    $statement->bindValue(":AGENT_PHONE_NUMBER",$agent_phone_number);
	  $statement->bindValue(":AGENT_LATITUDE",$agent_latitude);
	  $statement->bindValue(":AGENT_LONGITUDE",$agent_longitude);
    $statement->bindValue(":AGENT_LOGIN_ID",$last_ins);
    $statement->execute();
    header("Location: login.php");
    
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Agent Sign Up</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

    <form class="well form-horizontal" action="agent_signup.php" method="post"  id="contact_form">
<fieldset>
<!-- Form Name -->
<legend><center><h2><b>Registration Form</b></h2></center></legend><br>

<!-- Text input-->
	
<!--<label for="agent_name">Agent Name</label>
        <input type="text" id="agent_name" placeholder = "Enter your Name" name="agent_name" required>
-->
<div class="form-group">
  <label class="col-md-4 control-label" for="agent_username">Agent Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="agent_username" id="agent_username" placeholder="Enter username" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="agent_password" >Agent Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="agent_password" placeholder="Enter Password" class="form-control"  type="password" required>
    </div>
  </div>
</div>
	
<!--Text input-->
	
<div class="form-group">
  <label class="col-md-4 control-label" for="agent_name">Agent Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="agent_name" id="agent_name" placeholder="Enter name" class="form-control"  type="text" required>
    </div>
  </div>
</div>
  
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="agent_email">Agent Email</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="agent_email" id="agent_email" placeholder="Enter email" class="form-control"  type="text" required>
    </div>
  </div>
</div>
  
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="agent_phone_number">Agent Phone Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="agent_phone_number" placeholder="Enter Phone Number" class="form-control"  type="text">
    </div>
  </div>
</div>

<!--TEXT INPUT-->
<div class="form-group">
  <label class="col-md-4 control-label" for="agent_latitude">Agent Latitude</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="agent_latitude" id="agent_latitude" placeholder="Enter latitude" class="form-control"  type="text" required>
    </div>
  </div>
</div>
	
<!--TEXT INPUT-->
<div class="form-group">
  <label class="col-md-4 control-label" for="agent_longitude">Agent Longitude</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="agent_longitude" id="agent_longitude" placeholder="Enter longitude" class="form-control"  type="text" required>
    </div>
	  <br>
	  <p class="col-md-offset-1 col-md-11">&nbsp;Already have an account? <a href="login.php">Login</a></p>
  </div>
</div>
  
<!-- Text input-->
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


</head>

<body>
</body>
</html>