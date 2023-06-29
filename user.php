<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include_once('user-creation/config.php');
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}


$id = $_SESSION['id'];

$stmt = $connect->query("SELECT * FROM submits WHERE userID='$id'");

// echo $id;

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
			<?php 
			if ($_SESSION['is_admin'] == 1){
                ?><a href="admin.php"><i class="fa-solid fa-user"></i>Admin page</a> <?php
            }
			?>
				<a href="user/profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="user/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
			
			
				<?php 
					if ($_SESSION['is_admin'] == 1 |$_SESSION['is_admin'] == 2 ){
						?>
						<div>					
							<a href="submits/submits.php"><i class="fa-solid fa-inbox"></i> Submits</a> 
						</div>
						
						<?php
					}
				?>

				<?php 
					if ($_SESSION['is_admin'] != 1 |$_SESSION['is_admin'] != 2 ){
						?>
							<h2>Your Submits</h2>
						<?php
					} else {
						
					}
				?>
			
				<?php  while ($row = $stmt->fetch()) {
					?>
					<div>
						<h2>
							<small> Artist: <?php echo $row["artists"]; ?></small>  <br>
							<p style="margin-left: -5px;">Track Name: <?php echo $row["public_title"]; ?></p>
						</h2>
						<div class="info-id">
							<label><b> ID Info</b></label>
							<p> Genre: <b><?php echo $row["genre"]; ?></b></p>
							<p> bpm: <b><?php echo $row["bpm"]; ?></b></p>
							<p><a href="<?php echo $row["link"]; ?>">Link</a></p>
							<p><b>Comment:</b><br><?php echo $row["comment"]; ?></p>
						</div>
						<div class="flex">
							<?php 
								if ($row['aod'] === 1) {
									?> <div class="accepted"><p>Accepted</p></div> <?php
								} elseif ($row['aod'] === 2) {
									?> <div class="rejected"><p>Rejected</p></div> <?php
								} else {
									?> <div class="no-review"><p>No Review Yet</p></div> <?php
								}
							?>
						</div>
					</div>
				<?php } ?>
		</div>
	</body>
</html>