<?php
require_once ("config/config.php");
require_once ("loggedin.php");

//if($_SERVER["REQUEST_METHOD"] == "POST") {
 
//yhteyden tarkistaminen
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// määritys
$AskelInput =30;// mysqli_real_escape_string($link, $_REQUEST['Askel_Input']);
$MatkaInput =30;// mysqli_real_escape_string($link, $_REQUEST['Matka_Input']);
$SykeInput =30;// mysqli_real_escape_string($link, $_REQUEST['Syke_Input']);


 
// Tiedot kantaan
// https://stackoverflow.com/questions/27665285/how-to-update-user-database-for-current-user-login-in-php apuna
$sql = "INSERT INTO Harjoitustiedot (askeleet, matka, syke, id_user) VALUES ('20', '20', '20', '3')";
echo "rivi22".$sql;
if(mysqli_query($link, $sql)){
    header("location: Harjoitustiedot.php");
} else{
    echo "Virhe. Tietoja ei pystytty päivittää $sql. " . mysqli_error($link);
}
 
mysqli_close($link);

//}

?>