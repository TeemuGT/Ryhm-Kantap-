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
        <label for="ika">Ikä</label>
        <input type="text" name="nyk_ika" id="ika">
    </p>
    <p>
        <label for="sahkoposti">Sähköposti:</label>
        <input type="text" name="sapo" id="sahkoposti">
    </p>
    <p>
        <label for="paino">Paino</label>
        <input type="text" name="nyk_paino" id="paino">
    </p>
<p>
        <label for="pituus">Pituus</label>
        <input type="text" name="nyk_pituus" id="pituus">
    </p>
<p>
        <label for="leposyke">Leposyke</label>
        <input type="text" name="lepo_syke" id="leposyke">
    </p>

<p>
        <label for="makssyke">Maksimisyke</label>
        <input type="text" name="maks_syke" id="makssyke">
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
$ika = mysqli_real_escape_string($link, $_REQUEST['nyk_ika']);
$sahkoposti = mysqli_real_escape_string($link, $_REQUEST['sapo']);
$sukupuoli = mysqli_real_escape_string($link, $_REQUEST['suku_puoli']);
$paino = mysqli_real_escape_string($link, $_REQUEST['nyk_paino']);
$pituus = mysqli_real_escape_string($link, $_REQUEST['nyk_pituus']);
$leposyke = mysqli_real_escape_string($link, $_REQUEST['leposyke']);
$makssyke = mysqli_real_escape_string($link, $_REQUEST['makssyke']);

 
// Tiedot kantaan
$sql = "UPDATE users SET Etunimi = '$etunimi', Sukunimi = '$sukunimi', Sukupuoli = '$sukupuoli', ika = '$ika', paino = '$paino', pituus = '$pituus', leposyke = '$leposyke', makssyke = '$makssyke', sahkoposti = '$sahkoposti' WHERE id = " . $_SESSION["id"];
if(mysqli_query($link, $sql)){
    echo "<br>Tiedot lisätty.";
} else{
    echo "Virhe. Tietoja ei pystytty päivittää $sql. " . mysqli_error($link);
}
 
mysqli_close($link);

}
?>

 
>
