<?php
/*
session_start();

//check if the agent is logged in, otherwise redirect to login page
if(!isset($_SESSION["btnlogin"]) || $_SESSION["btnlogin"] !== true){
	header("Location: login.php");
	exit;
}

//include connection file
require_once("connection.php");

//Define variables and initialze with empty values
$new_agent_password = $confirm_new_agent_password = "";
$new_agent_password_err = $confirm_new_agent_password_err = "";
$new_agent_username = "";
$new_agent_username_err = "";

//Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	//validate new agent username
	if(empty(trim($_POST["new_agent_username"]))){
		$new_agent_username_err = "Please enter the new username";
	}
	else{
		$new_agent_username = trim($_POST["new_agent_username"]);
	}
	//Validate new agent password
	if(empty(trim($_POST["new_agent_password"]))){
		$new_agent_password_err = "Please enter the new password";
	}
	elseif(strlen(trim($_POST["new_agent_password"])) < 6){
		$new_agent_password_err = "Password must be atleast 6 characters";
	}
	else{
		$new_agent_password = trim($_POST["new_agent_password"]);
	}
	
	//validate confirm new agent password
	if(empty(trim($_POST["confirm_new_agent_password"]))){
		$confirm_new_agent_password_err = "Please confirm the password";
	}
	else{
		$confirm_new_agent_password = trim($_POST["confirm_new_agent_password"]);
		if(empty($new_agent_password) && ($new_agent_password != $confirm_new_agent_password)){
			$confirm_new_agent_password_err = "Password did not match ";
		}
	}
}
*/
?>
<?php
require_once("connection.php");
session_start();
$uid = $_SESSION["uid"];
$input_pwd = $_POST["new_agent_password"];
$con_pwd = $_POST["confirm_new_agent_password"];
if($input_pwd==$con_pwd){
	$pwd = password_hash($input_pwd,PASSWORD_DEFAULT);

	$statement = $pdo->prepare("UPDATE LOGIN SET LOGIN_PASSWORD=:pwd WHERE LOGIN_ID=:uid");
	$statement->bindValue(":pwd",$pwd);
	$statement->bindValue(":uid",$uid);
	$statement->execute();
	echo '<script>alert("Password Changed Successfully");</script>';
	header("Location: agent_credentials.php");
	exit;
	}
	else{
		echo "Passwords do not match";
	}
