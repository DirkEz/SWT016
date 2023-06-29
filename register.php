<?php 

include_once 'layout/header.php';
// include_once 'config/config.php';
?> <p class="loggedin"> <?php if ($_SESSION['loggedin'] == TRUE ){
	header('Location: user.php');
	exit;
} ?> </p>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>Register</h1>
			<form action="./user-creation/register-redirect.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				
				<label for="email">
				<i class="fa-sharp fa-regular fa-envelope" style="color: #ffffff;"></i>
				</label>
				<input type="text" name="email" placeholder="Email" id="email" required>
				<input type="submit" value="Register" name="register">
		</form>
		</div>
		<script src="https://kit.fontawesome.com/b72f5a32f8.js" crossorigin="anonymous"></script>
	</body>
</html>