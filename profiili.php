<?php
    require_once ("loggedin.php");
    require_once ("rprofiili.php");
?>

<?php if(isset($_SESSION['id']))
{
    $usersData= getUsersData (getId($_SESSION['id']));
}
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
        <div id="container">
            <?php echo ($usersData['Etunimi']) ?>{sukunimi} Profiilitiedot
        </div>
        <div id="aboutme">
            Something something
        </div>
        <div id="next">
            Tietoa
        </div>
        <a class=" tm-text-color-white nav-link" href="insert.php">Asetukset</a>
        <a class=" tm-text-color-white nav-link" href="etusivu.php">Etusivu</a>
</div>
</body>
</html>