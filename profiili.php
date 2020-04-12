<?php
require_once ("loggedin.php");
require_once ("config/config.php");

function getUsersData($id){
    $query = mysql_query("SELECT * FROM 'users" WHERE '$id' =" . $_SESSION["id"]);
    while ($row = mysql_fetch_assoc($query))
}
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
        <h1>Käyttäjän <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> profiilitiedot</h1>
        <p><a href="insert.php">Päivitä</a></p>
        <br>
        <p><a href="etusivu.php">Etusivu</a></p>
</div>
</form>
</body>
</html>
