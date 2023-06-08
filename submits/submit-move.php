<?php 

if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
} 
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
}
$if = FALSE;

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'] )) {
	if ($_SESSION['is_admin'] != 1 | $_SESSION['is_admin'] != 2) {
		header('Location: ../index.php');
		exit;
	} 
}
include_once('config/config.php');

$stmt = $connect->query("SELECT * FROM submits");

if (isset($_GET['accept'])) {
        $stmt = $connect->prepare("INSERT INTO submit_a (sub_id) VALUES (:id)");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->fetch();
        $if = TRUE;
        if ($if === TRUE) {
            $view=1;
            $stmt = $connect->query("UPDATE submits SET view='$view' WHERE id = '$id'");  
            $stmt->execute();
            $stmt->fetch();
        }
        $_SESSION['condition'] = "Accepted"; 
        $_SESSION['popup'] = TRUE; 
        header("Location: submits.php");

} 
if (isset($_GET['reject'])){
        $stmt = $connect->prepare("INSERT INTO submit_r (sub_id) VALUES (:id)");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->fetch();
        $if = TRUE;
        if ($if === TRUE) {
            $view=1;
            $stmt = $connect->query("UPDATE submits SET view='$view' WHERE id = '$id'");  
            $stmt->execute();
            $stmt->fetch();
        }
        // echo 2
        $_SESSION['condition'] = "Rejected"; 
        $_SESSION['popup'] = TRUE; 
        header("Location: submits.php");
        
}



?>