<?php
require_once("connection.php");
session_start();
$uid = $_SESSION["uid"];
$input_latitude = $_POST["new_agent_latitude"];
$input_longitude = $_POST["new_agent_longitude"];


if(isset($_POST["new_agent_latitude"]) && isset($_POST["new_agent_longitude"])){
	
	$statement = $pdo->prepare("UPDATE AGENTS 
								SET AGENT_LATITUDE=:AGENT_LATITUDE, AGENT_LONGITUDE=:AGENT_LONGITUDE 
								WHERE AGENT_LOGIN_ID=:uid");
	$statement->bindValue(":AGENT_LATITUDE",$input_latitude);
	$statement->bindValue(":AGENT_LONGITUDE",$input_longitude);
	$statement->bindValue(":uid",$uid);
	$statement->execute();
	unset($statement);
	
	$statement = $pdo->prepare("INSERT INTO AGENTS_LOCATION_CHANGE(AGENT_LOCATION_CHANGE_LATITUDE,														
									AGENT_LOCATION_CHANGE_LONGITUDE,AGENT_LOCATION_CHANGE_AGENT_ID) VALUES 																				
									(:AGENT_LOCATION_CHANGE_LATITUDE,:AGENT_LOCATION_CHANGE_LONGITUDE,:aid)");
	$statement->bindValue(":AGENT_LOCATION_CHANGE_LATITUDE",$input_latitude);
	$statement->bindValue(":AGENT_LOCATION_CHANGE_LONGITUDE",$input_longitude);
	$statement->bindValue(":aid",$_SESSION["aid"]);
	$statement->execute();
	
	
	echo '<script>alert("Location Changed Successfully");</script>';
	header("Location: agent_location_change.php");
}
	else{
		echo "Enter Infomation to Update";
	}