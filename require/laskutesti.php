<?php
session_start();
require_once ("config/config.php");
require_once ("require/loggedin.php");
//yhteyden tarkistaminen
if($link === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id = $_SESSION['id'];
?>

<?php
// laskukaavat perustuvat UKK:n liikuntasuosituksiin + sykerajasuosituksiin
// jos ei syötä minuutteja ja syketietoja niin pisteyttää pelkät askeleet
$query = "SELECT * FROM users WHERE id = $id";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  while($rivi = mysqli_fetch_assoc($result)) {   
        $makssyke = $rivi["makssyke"];
        $leposyke = $rivi["leposyke"];             
  }
      ?>

<?php
//$sql = "UPDATE Harjoitustiedot SET pisteet = '$uudetpisteet' WHERE id = '$id' ORDER BY aika DESC LIMIT 1"; (pisteet kantaan)
//Hae rivin tiedot kannasta
$query = "SELECT * FROM Harjoitustiedot WHERE id_user = $id";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  while($row = mysqli_fetch_assoc($result)) {   
        $tulos = $row["syke"];
        $pisteet = $row["pisteet"];
        $minuutit = $row["minuutit"];
        $askeleet = $row["askeleet"];
        
  }
  // Kannasta haetut henk.koht syketiedot sykerajojen määritystä varten. 
  //Kolme rajaa; kevyt, reipas, raska -> vastaavat UKK:n liikuntasuositusten tasoja
  //http://www.fitlandia.fi/sykerajat-ja-harjoittelu/
  //https://sydan.fi/liiku-oikealla-sykkeella/
  //https://www.terveyskirjasto.fi/terveyskirjasto/tk.koti?p_artikkeli=dlk01005

  $kevyt_yla = ($makssyke - $leposyke) * (60/100) + $leposyke ;
  $reipas_ala = ($makssyke - $leposyke) * (61/100) + $leposyke ;
  $raskas_ala = ($makssyke - $leposyke) * (71/100) + $leposyke ;

  if( $tulos == 0){

    //Ei syketietoja = pisteeet askelista
    // 10 000 askelta päivässä = "täydet" pisteet

    $lasku = $askeleet * 0.0015 ;
    $piste = $pisteet + $lasku ;

    $direct_text = 'Ansaitut pisteet: ';
     
    print ($direct_text . $piste); 

  } else if (0 < $tulos && $tulos < $reipas_ala){

    $lasku1 = $minuutit * 0.32 ;

    //Itse määritetty. N. puolet enemmän kevyttä kuin reipasta liikuntaa
    //Raskas taso = 100p = 100/300min = 0,333...=0,32p/min 

    $piste_yksi = $pisteet + $lasku1 ;

    $direct_text = 'Ansaitut pisteet: ';
     
    print ($direct_text . $piste_yksi); 

  } else if ($reipas_ala < $tulos && $tulos < $raskas_ala){

    //Reipas taso = 100p = 100/150min = 0,666666...=0,67p/min 

    $lasku2 = $minuutit * 0.67 ;
    $piste_kaksi = $pisteet + $lasku2;

    $direct_text = 'Ansaitut pisteet: ';
    
    print ($direct_text . $piste_kaksi); 

  } else {

    //Raskas taso = 100p = 100/75min = 1,3333...=1.35p/min 

    $lasku3 = $minuutit * 1.35 ;  
    $piste_kolme = $pisteet + $lasku3 ;

    $direct_text = 'Ansaitut pisteet: ';
     
    print ($direct_text . $piste_kolme); 
  }

      ?>
