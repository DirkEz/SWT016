<?php 
// include_once 'config/config.php';
session_start();
?>

<!DOCTYPE html>
<!-- <link rel="stylesheet" href="../css/style.css"> -->
<link rel="icon" type="image/x-icon" href="img\icon.png">
<header class="site-header">
      <div class="wrapper site-header__wrapper">
        <a href="index.php" class="brand">016</a>
        <nav class="nav">
          <ul class="nav__wrapper">
            <ul class="nav__item"><a href="#">Home</a></ul>
            <ul class="nav__item"><a href="#">Info</a></ul>
            <ul class="nav__item"><a href="submit.php">Submit</a></ul>
            <ul class="nav__item"><a href="#">Contact</a></ul>
            <ul class="nav__item"><button type="submit" ><a href="./login.php">

            <?php 
            
              if (!isset($_SESSION['loggedin'])){
                echo "Login";
              } else {
                echo "<p>Ingelogd als: </p>" . " " . $_SESSION['name'];
              }
            
            ?>

            </a></button></ul>
            
          </ul>
        </nav>
      </div>
    </header>
    <script src="../js/index.js"></script>