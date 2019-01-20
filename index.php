<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Shortener</title>
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <div class="container">
        <center>
        <h1 class="title">Shorten A Url </h1>

        <p>
        <?php 
        if(isset($_SESSION["feedback"])){
            $feedback = $_SESSION["feedback"];
            echo "<p>{$feedback}</p>";
            unset($_SESSION["feedback"]);
        }    
        ?>
        </p>
        <form action="shorten.php" method="post">
            <input class="text-input" type="url" name="url" placeholder="Enter Url" autocomplete="off"/>
            <input type="submit" value="Shorten" class="submit-bt"/>
        </form>
        </center>
    </div>
</body>
</html>