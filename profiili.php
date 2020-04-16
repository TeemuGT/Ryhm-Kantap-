<?php
    require_once ("require/loggedin.php");
    require_once ("config/config.php");
?>

<?php
//kirjautuneen käyttäjän tietoja 
//https://www.php.net/manual/en/function.print-r.php
//mysql_fetch_assoc doesm't print out a numeric index (0, 1, 2, ..) +  associative key.
//https://stackoverflow.com/questions/2970936/how-to-echo-out-table-rows-from-the-db-php
$query = "SELECT * FROM users WHERE id = " . $_SESSION["id"]; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));
while($row = mysqli_fetch_assoc($result)) { ?>
    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profiili</title>
<link rel="stylesheet" href="#">
</head>
<body>
    <div clas="box">
        <div class=" tm-text-color-white nav-link" >
            <h2><?php echo $row["Etunimi"]; ?></h2>
            <h2><?php echo $row["Sukunimi"]; ?></h2>
            <h2><?php echo $row["Sukupuoli"]; ?></h2>
            <h2><?php echo $row["ika"]; ?></h2>
            <h2><?php echo $row["sahkoposti"]; ?></h2>
            <h2><?php echo $row["paino"]; ?></h2>
            <h2><?php echo $row["pituus"]; ?></h2>
            <h2><?php echo $row["makssyke"]; ?></h2>
            <h2><?php echo $row["leposyke"]; ?></h2>
        </div>
        <a class=" tm-text-color-white nav-link" href="insert.php">Asetukset</a>
        <a class=" tm-text-color-white nav-link" href="etusivu.php">Etusivu</a>
    </div>
</body>
</html>
<?php } ?>



