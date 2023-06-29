<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'] )) {
	header('Location: index.php');
	exit;
}
if ($_SESSION['is_admin'] != 1) {
	header('Location: index.php');
	exit;
} 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome, <?=$_SESSION['name']?>!</title>
        <link rel="stylesheet" href="css/style.css">
		<link href="css/user.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
            <h1><a href="index.php">Home</a></h1>
				<a href="user.php"><i class="fa-solid fa-user"></i> User page</a>
				<a href="user/profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="user/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>ADMIN Page</h2>
			
			<p>Welcome, Admin <?=$_SESSION['name']?></p>
			
			<div>
				<a href="submits/submits.php"><i class="fa-solid fa-inbox"></i> Submits</a>
			</div>

			<div class="edit">
				<a href="admin/users.php"><i class="fa-solid fa-users-gear"></i> Edit Users</a>
			</div>

				
		</div>
	</body>
</html>