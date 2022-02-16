<?php
require_once("connection.php");
session_start();
$uid = $_SESSION["uid"];
$input_name = $_POST["new_agent_name"];
$input_email = $_POST["new_agent_email"];
$input_phone_number = $_POST["new_agent_phone_number"];

if(isset($_POST["new_agent_name"]) && isset($_POST["new_agent_email"]) && isset($_POST["new_agent_phone_number"])){
	
	$statement = $pdo->prepare("UPDATE agents
								SET AGENT_NAME=:AGENT_NAME,AGENT_EMAIL=:AGENT_EMAIL,AGENT_PHONE_NUMBER=:AGENT_PHONE_NUMBER WHERE AGENT_LOGIN_ID=:uid");
	$statement->bindValue(":AGENT_NAME",$input_name);
	$statement->bindValue(":AGENT_EMAIL",$input_email);
	$statement->bindValue(":AGENT_PHONE_NUMBER",$input_phone_number);
	$statement->bindValue(":uid",$uid);
	$statement->execute();
	echo '<script>alert("Personal Information Changed Successfully");</script>';
	header("Location: agent_personal_info.php");
	exit;
}
	else{
		echo "Enter Infomation to Update";
	}