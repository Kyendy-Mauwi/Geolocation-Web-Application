<?php
require_once("connection.php");
session_start();
$uid = $_SESSION["uid"];
$input_pwd = $_POST["new_admin_password"];
$con_pwd = $_POST["confirm_new_admin_password"];
if($input_pwd==$con_pwd){
	$pwd = password_hash($input_pwd,PASSWORD_DEFAULT);

	$statement = $pdo->prepare("UPDATE LOGIN
								SET LOGIN_PASSWORD=:pwd 
								WHERE LOGIN_ID=:uid");
	$statement->bindValue(":pwd",$pwd);
	$statement->bindValue(":uid",$uid);
	$statement->execute();
	echo '<script>alert("Password Changed Successfully");</script>';
	header("Location: admin_credentials.php");
	exit;
}
else{
	echo "Passwords do not match";
}


