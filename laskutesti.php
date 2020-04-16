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
$query = "SELECT * FROM users WHERE id = $id";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  while($rivi = mysqli_fetch_assoc($result)) {   
        $makssyke = $rivi["makssyke"];
        $leposyke = $rivi["leposyke"];             
  }
      ?>

<?php
$query = "SELECT * FROM Harjoitustiedot WHERE id_user = $id";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  while($row = mysqli_fetch_assoc($result)) {   
        $tulos = $row["syke"];
        $pisteet = $row["pisteet"];

  }
  $kevyt_ala = ($makssyke - $leposyke) * (50/100) + $leposyke ;
  $kevyt_yla = ($makssyke - $leposyke) * (60/100) + $leposyke ;
  $reipas_ala = ($makssyke - $leposyke) * (61/100) + $leposyke ;
  $reipas_yla = ($makssyke - $leposyke) * (70/100) + $leposyke ;
  $raskas_ala = ($makssyke - $leposyke) * (71/100) + $leposyke ;
  $raskas_yla = ($makssyke - $leposyke) + $leposyke ;
  if( $tulos < $kevyt_yla && $tulos < $reipas_ala ){

    $piste_yksi = $pisteet + 1 ;

    $direct_text = 'Ansaitut pisteet = ';
     
    print ($direct_text . $piste_yksi); 

  } else if ($reipas_ala < $tulos && $tulos < $raskas_ala){

    $piste_kaksi = $pisteet + 2;

    $direct_text = 'Ansaitut pisteet = ';
    
    print ($direct_text . $piste_kaksi); 

  } else if ($raskas_ala < $tulos){
      
    $piste_kolme = $pisteet + 3 ;

    $direct_text = 'Ansaitut pisteet = ';
     
    print ($direct_text . $piste_kolme); 

  } else {

    $direct_text = 'Ei lisättyjä pisteitä ';
     
    print ($direct_text); 

  }
      ?>

<?php
$query = "UPDATE Harjoitustiedot SET pisteet = '$lisaa_pisteet' WHERE id_user = $id ";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  while($rivi = mysql_fetch_assoc($result)) {  
    $pisteet = $row["pisteet"];          

    $lisaa_pisteet = $pisteet + ($piste_kolme + $piste_kaksi + $piste_yksi);  
  }

      ?>