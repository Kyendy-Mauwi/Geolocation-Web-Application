<?php
session_start();


?>
<?php
require_once('config.php');

if($_SERVER["REQUEST_METHOD"] =="POST"){
    
    $agent_latitude = $_POST["agent_latitude"];
    $agent_longitude = $_POST["agent_longitude"];
    
    $statement = $pdo->prepare("INSERT INTO latlong(agent_latitude,agent_longitude) VALUES
    (:AGENT_LATITUDE,:AGENT_LONGITUDE)");
    
    $statement->bindValue(":AGENT_LATITUDE",$agent_latitude);
    $statement->bindValue(":AGENT_LONGITUDE",$agent_longitude);
    $statement->execute();
    header("Location: login.php");
    
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Agent Update</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

    <form class="well form-horizontal" action="latlong.php" method="post"  id="contact_form">
<fieldset>
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="agent_latitude">Agent Latitude</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="agent_latitude" id="agent_latitude" placeholder="Enter Latitude" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="agent_longitude">Agent Longitude</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="agent_longitude" id="agent_longitude" placeholder="Enter Longitude" class="form-control"  type="text" required>
    </div>
  </div>
</div>


<!-- Text input-->
       

<!-- Select Basic -->

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

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
