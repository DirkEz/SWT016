<?php 
include_once 'config.php';

// DEBUG
// function debug_to_console($data) {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(',', $output)
//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }
// DEBUG

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}
$admin = 0;
// debug_to_console("1");

if ($stmt = $con->prepare("SELECT id, password, is_admin FROM accounts WHERE username = ?")) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
    // debug_to_console("2");
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $admin);
        $stmt->fetch();
        if ($_POST['password'] === $password) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            $_SESSION['is_admin'] = $admin;
            // debug_to_console("3");
            if ($_SESSION['is_admin'] === 1){
                echo 'Welcome ' . $_SESSION['name'] . '!';
                header('Location: ../admin.php');
            } else {
                echo 'Welcome ' . $_SESSION['name'] . '!';
                header('Location: ../user.php');
            }
        } else {
            echo 'Incorrect username and/or password!';
        }
    } else {
        echo 'Incorrect username and/or password!';
    }

	$stmt->close();
}
?>