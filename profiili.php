<?php
    require_once ("require/loggedin.php");
    require_once ("config/config.php");
?>

<?php
//kirjautuneen käyttäjän tietoja 
//https://www.php.net/manual/en/function.print-r.php
//mysql_fetch_assoc doesm't print out a numeric index (0, 1, 2, ..) +  associative key.
//https://stackoverflow.com/questions/2970936/how-to-echo-out-table-rows-from-the-db-php
$query = "SELECT Etunimi, Sukunimi, Sukupuoli, ika, sahkoposti, paino, pituus, leposyke, makssyke FROM users WHERE id = " . $_SESSION["id"]; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_assoc($result);
print "<pre>";
print_r($row);
print "<pre>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profiili</title>
<link rel="stylesheet" href="#">
</head>
<body>
    <div clas="box">
        <a class=" tm-text-color-white nav-link" href="insert.php">Asetukset</a>
        <a class=" tm-text-color-white nav-link" href="etusivu.php">Etusivu</a>
</div>
</body>
</html>

