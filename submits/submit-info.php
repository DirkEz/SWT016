<?php
session_start();

include_once('config/config.php');

$id = $_GET['view'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link href="css/user.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="css/info-user.css">
   <link rel="stylesheet" href="css/buttons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body class="loggedin">
		<nav class="navtop">
			<div>
            <h1><a href="../index.php">Home</a></h1>
            <a href="submits.php"><i class="fa-solid fa-backward"></i>Back</a>
                <?php 
                if ($_SESSION['is_admin'] == 1){
                    ?><a href="../admin.php"><i class="fa-solid fa-user"></i>Admin page</a> <?php
                }
                ?>
				<a href="../user.php"><i class="fa-solid fa-user"></i> User page</a>
				<a href="user/profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="../user/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
            <?php
                $stmt = $connect->query("SELECT * FROM submits WHERE id = '$id'");
                while ($row = $stmt->fetch()){
            ?> 
                <div>
                    <h2>
                        <small> Artist: <?php echo $row["artists"]; ?></small>  <br>
                        <p style="margin-left: -5px;">Track Name: <?php echo $row["public_title"]; ?></p>
                    </h2>
                    <div class="info-artist">
                        <label><b>Artist Info</b></label>
                        <p> Discord: <b><?php echo $row["discord"]; ?></b></p>
                        <p> Instagram: <b><?php echo $row["instagram"]; ?></b></p>
                    </div>
                    <div class="info-id">
                        <label><b>ID Info</b></label>
                        <p> Genre: <b><?php echo $row["genre"]; ?></b></p>
                        <p> bpm: <b><?php echo $row["bpm"]; ?></b></p>
                        <p><a href="<?php echo $row["link"]; ?>">Link</a></p>
                        <p><b>Comment:</b><br><?php echo $row["comment"]; ?></p>
                    </div>
                    <div class="buttons">
                    <a class="button" href="submit-move.php?accept=<?php echo $row['id']; ?>" style="--color: #6eff3e;">
                        Accept
                    </a>
                    <a class="button" href="submit-move.php?reject=<?php echo $row['id']; ?>" style="--color: #ff1867;">
                        Reject
                    </a>
                    </div>
                </div>


            <?php }; ?>
		</div>
	</body>


  

   

</html>