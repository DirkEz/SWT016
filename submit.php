<?php


include_once 'layout/header.php';
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
include_once 'user-creation/config.php';

$name = $_SESSION['name'];

$stmt2 = $connect->query("SELECT id FROM accounts WHERE username='$name'");
$id = $_SESSION['id'];

if(isset($_POST['submitID'])){
    

    $sql = "INSERT INTO submits(email, artists, public_title, discord, genre, bpm, instagram, link, comment, userid)
    VALUES (:submit_email, :submit_artists, :submit_publicname, :submit_discord, :submit_genre, :submit_bpm, :submit_insta, :submit_link, :submit_comment, :userid)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":submit_email", $_POST['submit_email']);
    $stmt->bindParam(":submit_artists", $_POST['submit_artists']);
    $stmt->bindParam(":submit_genre", $_POST['submit_genre']);
    $stmt->bindParam(":submit_link", $_POST['submit_link']);
    $stmt->bindParam(":submit_bpm", $_POST['submit_bpm']);
    $stmt->bindParam(":submit_publicname", $_POST['submit_publicname']);
    $stmt->bindParam(":submit_insta", $_POST['submit_insta']);
    $stmt->bindParam(":submit_discord", $_POST['submit_discord']);
    $stmt->bindParam(":submit_comment", $_POST['submit_comment']);
    $stmt->bindParam(":userid", $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->fetch();
    header('Location: submits/submit-add.php'); 
};





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/submit.css">
    <!-- <link rel="icon" type="image/x-icon" href="img/icon.png">     -->
    <title>016 | Submit</title>
</head>
<body>

    <div class="flex">
    <div class="submit-box">
        <form action="#" method="POST">
            <p style="margin-left: 35px; ">* = Required</p> <br>

            <label>Email*</label>
            <input required class="inp" type="email" name="submit_email" placeholder="Email">
            <label>Artist(s)*</label>
            <input required class="inp" type="text" name="submit_artists" placeholder="Artist(s) (Artist1, Artist2, ...)">
            <label>Genre*</label>
            <input required class="inp" type="text" name="submit_genre" placeholder="Genre">
            <label>Link*</label>
            <input required class="inp" type="text" name="submit_link" placeholder="Link">
            <label class="label-bpm">BPM*</label>
            <select class="inp-select" name="submit_bpm">
                <option value="128">128</option>
                <option value="126">126</option>
                <option value="130">130</option>
            </select>
            <label class="label-bpm">Public ID Name*</label>
            <select class="inp-select" name="submit_publicname">
                <option value="ID - ID">ID - ID</option>
                <option value="Artist(s) - ID">Artist(s) - ID</option>
            </select><br>
            <label>Instagram</label>
            <input class="inp" type="text" name="submit_insta" placeholder="Instagram">
            <label>Discord</label>
            <input class="inp" type="text" name="submit_discord" placeholder="Discord (Dirk.#4339)">
            <label>Comments?</label>
            <input class="inp" type="text" name="submit_comment" placeholder="Enter Comment">
            <div class="flex">
                <input class="sub" type="submit" value="Submit ID" name="submitID">
            </div>
        </form>
    </div>
    </div>
    <?php 
    
    // echo $id;
    
    ?>
</body>
</html>