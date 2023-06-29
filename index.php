<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>016 | Home</title>
</head>
<body>
    <div class="panels">
        <div class="panels__container">
            <a href="submit.php" class="panel">
                <div class="panel__content" style="background-image: url(https://cdn.discordapp.com/attachments/1115057844048375929/1117930629418459166/25F985FE-ED40-418A-8B35-0ED1F9AB1B3E.png);">
                    <h3 class="panel__title">SUBMIT</h3>
                </div>
            </a>
            <a href="login.php" class="panel">
                <div class="panel__content" style="background-image: url(https://cdn.discordapp.com/attachments/1115057844048375929/1117930630366376138/E6D832B2-0881-4A5C-85DD-6FEE2AD520F7.png)">
                    <h3 class="panel__title">    
                    <?php   
                        if (!isset($_SESSION['loggedin'])){
                            echo "Login";
                        } else {
                            echo $_SESSION['name'];
                        }
                    ?>
                    </h3>
                </div>
            </a>
        </div>
    </div>  
    <!-- Made by Dirk Schaafstra https://dirkschaafstra.nl -->
</body>
</html>

