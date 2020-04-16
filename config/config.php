<?php
//tietokanta
define('DB_SERVER', 'mysql.metropolia.fi');
define('DB_USERNAME', '  ');
define('DB_PASSWORD', 'Hilppa123');
define('DB_NAME', 'lauraemi');
 
//yhdistäminen kantaan
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
//yhteyden tarkistaminen
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
