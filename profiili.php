<?php
    require_once ("require/loggedin.php");
    require_once ("config/config.php");
?>

<?php

//kirjautuneen käyttäjän tietoja 
//https://www.php.net/manual/en/function.print-r.php
//mysql_fetch_assoc doesm't print out a numeric index (0, 1, 2, ..) +  associative key.
//https://stackoverflow.com/questions/2970936/how-to-echo-out-table-rows-from-the-db-php
//https://stackoverflow.com/questions/27431601/how-to-echo-the-row-into-my-html

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
            <h2>Käyttäjän <?php echo $row["username"]; ?> tiedot</h2>
            <h3>Etunimi: <?php echo $row["Etunimi"]; ?></h3>
            <h3>Sukunimi: <?php echo $row["Sukunimi"]; ?></h3>
            <h3>Sukupuoli: <?php echo $row["Sukupuoli"]; ?></h3>
            <h3>Ikä: <?php echo $row["ika"]; ?></h3>
            <h3>Sähköpostiosoite: <br> 
            <br>
            <?php echo $row["sahkoposti"]; ?></h3>
            <h3>Paino: <?php echo $row["paino"]; ?></h3>
            <h3>Pituus: <?php echo $row["pituus"]; ?></h3>
            <h3>Maksimisyke <?php echo $row["makssyke"]; ?></h3>
            <h3>Leposyke <?php echo $row["leposyke"]; ?></h3>
        </div>
        <a class=" tm-text-color-white nav-link" href="insert.php">Asetukset</a>
        <a class=" tm-text-color-white nav-link" href="etusivu.php">Etusivu</a>
    </div>
</body>
</html>
<?php } ?>



