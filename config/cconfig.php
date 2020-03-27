<?php
//Tietokanta
$user = 'emililar';		//Käytäjänimi 
$pass = 'obscurus123';		//Salasana, ei OMAn vaan phpAdminin
$host = 'mysql.metropolia.fi';  //Tietokantapalvelin
$dbname = 'emililar';		//Tietokanta
$added='#â‚¬%&&/';  //suola
// Muodostetaan yhteys tietokantaan
try {     //Avataan yhteys tietokantaan ($DBH on nyt  yhteysolio, nimi vapaasti valittavissa)
// $DBH yhteysolio on kahva tietokantaan data base handle
	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
           // virheenkäsittely: virheet aiheuttavat poikkeuksen
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	// käytetään  merkistöä utf8
	//echo "Yhteys OK.";   //Kommentoi pois validoitavassa versiossa
} catch(PDOException $e) {
           echo "Yhteysvirhe: " . $e->getMessage(); 
            //Kirjoitetaan mahdollinen virheviesti tiedostoon
	file_put_contents('log/DBErrors.txt', 'Connection: '.$e->getMessage()."\n", FILE_APPEND);
} 
?>
<!DOCTYPE html>
