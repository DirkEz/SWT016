<?php
session_start();

include_once('config/config.php');

$id = $_GET['edit'];

if(isset($_POST['update_gebruiker'])){

   $name = $_POST['username'];
   $admin = $_POST['is_admin'];

   $stmt = $connect->query("UPDATE accounts SET  is_admin='$admin' WHERE id = '$id'");  
   header('Location: users.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      $stmt = $connect->query("SELECT * FROM accounts WHERE id = '$id'");
      while ($row = $stmt->fetch()){
   ?> 
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Update de User</h3>
         <p><?php echo $row['username']?></p>
         <input type="number" min="0" max="1" placeholder="<?php echo $row['is_admin']?>" name="is_admin" class="box" value="<?php echo $row['is_admin']?>">
         <input type="submit" name="update_gebruiker" value="Update Gebruiker">
      <a href="users.php" class="btn">Terug</a>
   </form>
   <?php }; ?>

   

</div>

</div>

</body>
</html>