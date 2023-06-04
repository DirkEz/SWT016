<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'] )) {
	if ($_SESSION['is_admin'] != 1 | $_SESSION['is_admin'] != 2) {
		header('Location: index.php');
		exit;
	} 
}
include_once('config/config.php');

$stmt = $connect->query("SELECT * FROM submits");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome, <?=$_SESSION['name']?>!</title>
        <link rel="stylesheet" href="css/style.css">
		<link href="css\user.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
            <h1><a href="index.php">Home</a></h1>
                <?php 
                if ($_SESSION['is_admin'] == 1){
                    ?><a href="../admin.php"><i class="fa-solid fa-user"></i>Admin page</a> <?php
                }
                ?>
				<a href="../user.php"><i class="fa-solid fa-user"></i> User page</a>
				<a href="user/profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="../user\logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Submits Page</h2>	
            <?php  while ($row = $stmt->fetch()) { ?>
            <div class="submit">
            <h2>
                <small> Titel: <?php echo $row["titel"]; ?></small>  <br>
                <small> Artiest: <?php echo $row["artist"]; ?></small>  <br>
            </h2>
            <h4><?php echo $row["date"]; ?></h4>
            <h3>
            <a class="updel" href="submit-info.php?view=<?php echo $row['id']; ?>" class="btn"> <i class="fa-solid fa-circle-info"></i> View </a>
            </h3>
    </div> 
    <?php } ?>
		</div>
	</body>
</html>