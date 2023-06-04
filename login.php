<?php 
include_once 'layout/header.php';
// include_once 'config\config.php';
?> <p class="loggedin"> <?php if ($_SESSION['loggedin'] == TRUE ){
	if ($_SESSION['is_admin'] === 0){
		echo 'Welcome admin, ' . $_SESSION['name'] . '!';
		header('Location: ./admin.php');
	} else {
		echo 'Welcome user, ' . $_SESSION['name'] . '!';
		header('Location: ./user.php');
	}
} ?> </p>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css\style.css">
        <link rel="stylesheet" href="css\login.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="config\authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
			
		</div>
		<p><a class="register-txt" href="register.php">Dont have a account?</a></p>
	</body>
</html>