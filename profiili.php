<?php
require_once ("loggedin.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profiilitiedot</title>
</head>
<body>
<form action="insert.php" method="post">
<div class="tm-flex-center p-5">
        <h1><?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
        <h1><?php echo htmlspecialchars($_SESSION["Etunimi"]); ?></h1>
        <p><a href="insert.php">Päivitä</a></p>
        <br>
        <p><a href="etusivu.php">Etusivu</a></p>
</div>
<p><a href="insert.php">Päivitä</a></p>
        <br>
        <p><a href="etusivu.php">Etusivu</a></p>
</form>
</body>
</html>