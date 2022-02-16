<?php
require_once "connection.php";
session_start();
$u_sql = $pdo->prepare("UPDATE login SET LOGIN_STATUS=0 WHERE LOGIN_ID=:ID");
$u_sql->bindValue(":ID",$_SESSION["uid"]);
$u_sql->execute();
unset($_SESSION["uid"]);
unset($_SESSION["username"]);
header("Location: login.php");
?>