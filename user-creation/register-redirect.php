<?php 
    require_once('config.php');
    
    if (isset($_POST['register'])){
        $sql = "INSERT INTO accounts (username, password, email)
        VALUES (:username,:password, :email)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":username", $_POST['username']);
        $stmt->bindParam(":password", $_POST['password']);
        $stmt->bindParam(":email", $_POST['email']);
        $stmt->execute();
        $result = $stmt->fetch();
        header("Location: ../login.php");
    } else {
        header("Location: ../register.php");
    }
?>