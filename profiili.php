<?php
    require_once ("require/loggedin.php");
    require_once ("config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profiili</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div clas="box">
        <a class=" tm-text-color-white nav-link" href="insert.php">Asetukset</a>
        <a class=" tm-text-color-white nav-link" href="etusivu.php">Etusivu</a>
</div>
</body>
</html>

<?php
//kirjautuneen käyttäjän tietoja 
//https://www.php.net/manual/en/function.print-r.php
$query = "SELECT Etunimi, Sukunimi, paino, pituus FROM users WHERE id = " . $_SESSION["id"]; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_row($result);
print "<pre>";
print_r($row);
print "<pre>";
?>