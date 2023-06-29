<?php 
    require_once('config.php');
    
    if (isset($_POST['register'])){
        $wachtwoord = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO accounts (username, password, email)
        VALUES (:username,:password, :email)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":username", $_POST['username']);
        $stmt->bindParam(":password", $wachtwoord);
        $stmt->bindParam(":email", $_POST['email']);
        $stmt->execute();
        $result = $stmt->fetch();
        header("Location: ../login.php");
    } else {
        header("Location: ../register.php");
    }
?>