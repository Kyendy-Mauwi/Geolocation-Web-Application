<?php
require_once("connection.php");
session_start();
$uid = $_SESSION["uid"];
$input_name = $_POST["new_admin_name"];
$input_phone_number = $_POST["new_admin_phone_number"];

if(isset($_POST["new_admin_name"]) && isset($_POST["new_admin_phone_number"])){
	
	$statement = $pdo->prepare("UPDATE ADMIN
								SET ADMIN_NAME=:ADMIN_NAME,ADMIN_PHONE_NUMBER=:ADMIN_PHONE_NUMBER
								WHERE ADMIN_LOGIN_ID=:uid");
	$statement->bindValue(":ADMIN_NAME",$input_name);
	$statement->bindValue(":ADMIN_PHONE_NUMBER",$input_phone_number);
	$statement->bindValue(":uid",$uid);
	$statement->execute();
	echo '<script>alert("Personal Information Changed Successfully");</script>';
	header("Location: admin_personal_info.php");
	exit;
}
	else{
		echo "Enter Infomation to Update";
	}