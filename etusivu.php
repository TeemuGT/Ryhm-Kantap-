
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <p>
        <a href="logout.php" class="btn btn-danger">Kirjaudu ulos</a>
    </p>  
</div> 
</body>
</html>


<?php
session_start();
 
// Kirjautuneena sisään?
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 