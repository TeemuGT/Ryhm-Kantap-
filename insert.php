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
        <h1>Käyttäjän <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> profiilitiedot</h1>
    </div>
    <p>
        <label for="etunimi">Etunimi</label>
        <input type="text" name="etu_nimi" id="etunimi">
    </p>
    <p>
        <label for="sukunimi">Sukunimi</label>
        <input type="text" name="suku_nimi" id="sukunimi">
    </p>
    <p>
        <label for="sukupuoli">Sukupuoli:</label>
        <input type="text" name="suku_puoli" id="sukupuoli">
    </p>
    <p>
        <label for="sahkoposti">Sähköposti:</label>
        <input type="text" name="sapo" id="sahkoposti">
    </p>
    <br>
    <input type="submit" value="Submit">
</form>
</body>
</html>


<?php
require_once ("config/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
//yhteyden tarkistaminen
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// määritys
$etunimi = mysqli_real_escape_string($link, $_REQUEST['etu_nimi']);
$sukunimi = mysqli_real_escape_string($link, $_REQUEST['suku_nimi']);
$sahkoposti = mysqli_real_escape_string($link, $_REQUEST['sapo']);
$sukupuoli = mysqli_real_escape_string($link, $_REQUEST['suku_puoli']);
 
// Tiedot kantaan
$sql = "UPDATE users SET Etunimi = '$etunimi', Sukunimi = '$sukunimi', Sukupuoli = '$sukupuoli', sahkoposti = '$sahkoposti' WHERE id = " . $_SESSION["id"];
if(mysqli_query($link, $sql)){
    echo "<br>Tiedot lisätty.";
} else{
    echo "Virhe. Tietoja ei pystytty päivittää $sql. " . mysqli_error($link);
}
 
mysqli_close($link);

}
?>
