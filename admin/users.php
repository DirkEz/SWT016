<?php 

session_start();

include_once('config/config.php') ;

$stmt = $connect->query("SELECT * FROM accounts");
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'] )) {
	if ($_SESSION['is_admin'] != 1) {
		header('Location: index.php');
		exit;
	}
	
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Users | <?=$_SESSION['name']?>!</title>
        <link rel="stylesheet" href="css/style.css">
		<link href="css/users.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
            <h1><a href="../index.php">Home</a></h1>
                <a href="../admin.php"><i class="fa-solid fa-backward"></i>Back</a>
				<a href="../user/profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="../user/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>ADMIN Page</h2>
			
			<p><?=$_SESSION['name']?>, Which user do you wanna change?</p>
			<div>
            <?php  while ($row = $stmt->fetch()) { ?>
            <div class="user">
            <h2>
            
            <?php if($row['is_admin'] == 1) {
                echo "Admin"; 
                } else {
                    ?><div class="fill"></div><?php
            }?>

            
            <div class="fill"></div>
                <small> Username: <?php echo $row["username"]; ?></small>  <br>
                <div class="main_knopje">
                <div class="knopje">
                <a class="updel" href="admin-update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
            </div>
        </div>
        </h2>
    </div> 
    <?php } ?>
            </div>
				
		</div>
	</body>
</html>