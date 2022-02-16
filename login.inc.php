<?php
require_once "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $login_name = $_POST["login_name"];
    $login_password = $_POST["login_password"];

    $statement = $pdo->prepare("SELECT * FROM login WHERE LOGIN_NAME = :login_name");
    $statement->bindValue(":login_name",$login_name);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $test = password_verify($login_password,$user["LOGIN_PASSWORD"]);
    
    if($test){
        $u_sql = $pdo->prepare("UPDATE login SET LOGIN_STATUS=1 WHERE LOGIN_ID=:ID");
        $u_sql->bindValue(":ID",$user["LOGIN_ID"]);
        $u_sql->execute();
        if($user["LOGIN_RANK"] =="admin"){
            session_start();
            $_SESSION["username"] = $user["LOGIN_NAME"] ;
            $_SESSION["pwd"] = $user["LOGIN_PASSWORD"];
            $_SESSION["rank"] = $user["LOGIN_RANK"];
			$_SESSION["uid"] = $user["LOGIN_ID"];
			
            header("Location: admin/");
            echo "Welcome " . $_SESSION["username"];
        }
        else{
			$sql=$pdo->prepare("select AGENTS.AGENT_ID from AGENTS where AGENT_LOGIN_ID=:id");
			$sql->bindValue(":id",$user["LOGIN_ID"]);
			$sql->execute();
			$agent_id = $sql->fetch(PDO::FETCH_ASSOC);
            session_start();
			$_SESSION["aid"]=$agent_id["AGENT_ID"];
            $_SESSION["username"] = $user["LOGIN_NAME"] ;
            $_SESSION["pwd"] = $user["LOGIN_PASSWORD"];
            $_SESSION["rank"] = $user["LOGIN_RANK"];
			$_SESSION["uid"] = $user["LOGIN_ID"];
			
            header("Location: agent.php");
            echo "Welcome " . $_SESSION["username"];
        }
    }

    else{
        header("Location: login.php?mess=wrongpwd");
        exit;
    }

}

?>