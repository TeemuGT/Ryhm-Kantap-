<?php
session_start();
require_once ("config/config.php");
require_once ("loggedin.php");
//yhteyden tarkistaminen
if($link === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

$ID = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Magazee HTML5 Template Mo</title>
<!-- 
Magazee Template 
http://www.templatemo.com/tm-514-magazee
-->
  <!-- load CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">    <!-- Google web font "Open Sans" -->
  <link rel="stylesheet" href="css/bootstrap.min.css">                                        <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">                                     <!-- Templatemo style -->

  <script>
    var renderPage = true;

    if(navigator.userAgent.indexOf('MSIE')!==-1
      || navigator.appVersion.indexOf('Trident/') > 0){
        /* Microsoft Internet Explorer detected in. */
        alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
        renderPage = false;
    }
  </script>

</head>

<body>
  <!-- Loader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
<!-- Navigointi taulukko sivun yläosaan -->
  <nav>
    <ul class="tm-bg-color-primary nav nav-pills nav-fill">
      <li class="nav-item">
        <a class="tm-text-color-white nav-link" href="Etusivu.php">Etusivu</a>
      </li>
      <li class="nav-item">
        <a class=" tm-text-color-white nav-link" href="Profiili.php">Profiili</a>
      </li>
      <li class="nav-item">
        <a class="tm-text-color-white nav-link" href="Harjoitustiedot.php"><u>Harjotustiedot</u></a>
      </li>
      <li class="nav-item">
        <a class="tm-text-color-white nav-link" href="yhteistiedot.php">Yhteistiedot</a>
      </li>
      <li class="nav-item">
        <a class="tm-text-color-white nav-link" href="logout.php">Kirjaudu ulos</a>
      </li>
    </ul>
    </nav>
  
    
  <div class="container">

    <!-- 1st section -->
    <section class="row tm-section colo">
     <div class="col-sm-12 col-md-18 col-lg-6 col-xl-6 p-0">
      
      <div class="tm-flex-center p-5 tm-bg-color-primary tm-section-min-h">
        
        <h1 class="tm-text-color-white tm-site-name">Harjoitustieto</h1>
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
    
      <div class="tm-flex-center p-5">
        <q class="tm-quote tm-text-color-gray">Tervetuloa käyttämään harjoitus ohjelmaamme!!! Tähän voi kirjoitella vaikka mitä.
        </q>
      </div>
    </div>
  </section>
 
  
  <!-- 2nd section  
        Taulukko minne voi lisätä urheilusuorituksia -->
  <section class="row tm-section tm-col-md-reverse">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <div class="tm-flex-center p-5">
      <div class="tm-md-flex-center">
        <h2 class="tm-text-color-primary mb-4">Kuinka paljon olet liikkunut?</h2>
        <form method = "POST">
            <div class="form-group">
                <input type="number" min="1" max="40000" name="Askel_Input" class="form-control" id="AskelInput" placeholder="Askeleet (kpl)">
            </div>      
            <div class="form-group">
                <input type="number" min="0.1" max="500" step="0.1" name="Matka_Input" class="form-control" id="MatkaInput" placeholder="Matka (km)">
            </div> 
            <div class="form-group">
                <input type="number" min=30 max="250" name="Syke_Input" class="form-control" id="SykeInput" placeholder="Syke (min)">
            </div> 
            <div class="form-group">
                <input type="number" min=0.1 max="200" step="0.1" name="Min_Input" class="form-control" id="MinInput" placeholder="Harjoituksen kesto (min)">
            </div> 
            <input class="btn-primary" type="submit" value="Lähetä">
         </form>
         <?php



if($_SERVER["REQUEST_METHOD"] == "POST") {
  
       
// Yksikoiden määritys sekä taulukkoon annettujen arvojen hakeminen
$AskelInput = mysqli_real_escape_string($link, $_REQUEST['Askel_Input']);
$MatkaInput = mysqli_real_escape_string($link, $_REQUEST['Matka_Input']);
$SykeInput = mysqli_real_escape_string($link, $_REQUEST['Syke_Input']);
$MinInput = mysqli_real_escape_string($link, $_REQUEST['Min_Input']);

$tulos = $SykeInput;
$minuutit = $MinInput;
$askeleet = $AskelInput;
$makssyke;
$leposyke;



// Heataan kannasta henkilön maksimi ja leposyke
$query = "SELECT Leposyke, Makssyke FROM users WHERE id = $ID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
while($row = mysqli_fetch_assoc($result)) {
  $leposyke = $row['Leposyke'];
  $makssyke = $row['Makssyke'];
  }
  

  // laskukaavat perustuvat UKK:n liikuntasuosituksiin + sykerajasuosituksiin
  // jos ei syötä minuutteja ja syketietoja niin pisteyttää pelkät askeleet
  // Kannasta haetut henk.koht syketiedot sykerajojen määritystä varten. 
  //Kolme rajaa; kevyt, reipas, raska -> vastaavat UKK:n liikuntasuositusten tasoja
  
  //http://www.fitlandia.fi/sykerajat-ja-harjoittelu/
  //https://sydan.fi/liiku-oikealla-sykkeella/
  //https://www.terveyskirjasto.fi/terveyskirjasto/tk.koti?p_artikkeli=dlk01005
  $kevyt_yla = ($makssyke - $leposyke) * (60/100) + $leposyke ;
  $reipas_ala = ($makssyke - $leposyke) * (61/100) + $leposyke ;
  $raskas_ala = ($makssyke - $leposyke) * (71/100) + $leposyke ;

  //Ei syketietoja = pisteeet askelista
    // 10 000 askelta päivässä = "täydet" pisteet
  if( $tulos == 0){

    $Pisteytys = $askeleet * 0.0015 ;
    //Ei syketietoja = pisteeet askelista
    // 10 000 askelta päivässä = "täydet" pisteet

  } else if (0 < $tulos && $tulos < $reipas_ala){

    $Pisteytys = $minuutit * 0.32 ;
    //Itse määritetty. N. puolet enemmän kevyttä kuin reipasta liikuntaa
    //Raskas taso = 100p = 100/300min = 0,333...=0,32p/min 


  } else if ($reipas_ala < $tulos && $tulos < $raskas_ala){

    $Pisteytys = $minuutit * 0.67 ; 
    //Reipas taso = 100p = 100/150min = 0,666666...=0,67p/min 

  } else {

    $Pisteytys = $minuutit * 1.35 ; 
     //Raskas taso = 100p = 100/75min = 1,3333...=1.35p/min 
  }






// Haetaan kannasta käyttäjän tämänhetkinen piste määrä ja lisätään siihen uudet pisteet mitä on tullut edellisestä harjoitteesta

 $query = "SELECT Pisteytys FROM users WHERE id = $ID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
while($row = mysqli_fetch_assoc($result)) {
  $Pisteytys += $row['Pisteytys'];
  }
  

// Lähetetään harjoitustiedot kantaan ja jos se onnistuu niin päivitetään uusi piste luku kantaan.
$sql = "INSERT INTO Harjoitustiedot (askeleet, matka, syke, minuutit, id_user) VALUES ('$AskelInput', '$MatkaInput', '$SykeInput', '$MinInput', '$ID')";
if(mysqli_query($link, $sql)){
  $sql = "UPDATE users SET Pisteytys='$Pisteytys' WHERE id = $ID";
  if(mysqli_query($link, $sql)){

  
  header("location: Harjoitustiedot.php");
}} else{
    echo "Virhe. Tietoja ei pystytty päivittää $sql. " . mysqli_error($link);
}
 
mysqli_close($link);

}


?>
<!-- Haetaan kannasta kaikki harjoitukset ja lasketaan niistä keskiarvoja ja kokonaismääriä -->
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
    <div class="tm-flex-center p-5 tm-bg-color-primary">
      
      <div class="row tm-max-w-400 tm-flex-center tm-flex-col tm-text-color-white">
      <p class = tm-text-color-white> Harjoittelusi kokonaismäärä ja sykkeen keskiarvo </p>
      <?php
      $query = "SELECT id_mittaus, askeleet, matka, syke FROM Harjoitustiedot WHERE id_user = $ID";
      $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $kaskel = 0;
        $kmatka = 0;
        $ksyke = 0;
        $mittaus = 0;
        $asyke = 0;
      while($row = mysqli_fetch_assoc($result)) {   
            
            $kaskel+=$row['askeleet']; 
            $kmatka+=$row['matka'];
            $ksyke+=$row['syke'];
            $mittaus+=1;

      }
        if($ksyke > 0){
        $asyke = $ksyke/$mittaus;
        }

        // tulostetaan taulukkoon lasketut keskiarvot ja kokonaismäärät.
        echo "<table style='width:100%; height:75%;  border: solid 4px white;'><tr><th>Harjoite </th><th> Määrä </th></tr>";
        echo "<tr style='border: solid 1px'><td>Askelten määrä</td><td>" . $kaskel . " kpl</td></tr>";
        echo "<tr><td>Kuljettu matka</td><td>" . $kmatka . " km</td></tr>";
        echo "<tr style='border: solid 1px'><td>Sykkeen keskiarvo</td><td>" . $asyke . "/min</td></tr>";
        
        echo "</table>";
          ?>
      </div>
    </div>
  </div>
  </section>
  
 
          
  
  <!-- 4th Section  Haetaan kaikki harjoitukset kannasta  -->
  <section class="row tm-section tm-mb-30">
   <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12 tm-bg-color-primary tm-text-color-white">
    
   <p>
      <?php
      $maara;
  $query = "SELECT id_mittaus, aika, askeleet, matka, syke, minuutit FROM Harjoitustiedot WHERE id_user = $ID";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
    echo "<table style='width:100%;border: solid 4px white;'><tr><th>Kirjaus Aika </th><th>Harjoitus</th><th>Tuloksesi</th></tr>";
        //tulostetaan kaikki harjoitukset taulukkoon erillisinä harjoitteina.
    while($row = mysqli_fetch_assoc($result)) {   
        $maara+=1;
        echo "<tr style='border: solid 1px ;'><td><br></td><td></td><td></td></tr>";
        echo "<tr><td>". $row["aika"] . "</td><td>Mittaus </td><td>" . $maara . "</td></tr>";
        echo "<tr><td>". " " . "<td>Askeleet </td><td>" . $row["askeleet"] . " kpl</td></tr>";
        echo "<tr><td>". " " . "<td>Matka (km) </td><td>" . $row["matka"] . " km</td></tr>";
        echo "<tr><td>". " " . "<td>Syke </td><td>" . $row["syke"] . "/min</td></tr>";
        echo "<tr><td>". " " . "<td>Kesto </td><td>" . $row["minuutit"] . " min</td></tr>";
  }
  echo "</table>";
      ?>
    </p>

  </div>
  </section>
  
        
  
  
  
  <!-- Footer -->
  <div class="row">
    <div class="col-lg-12">
      <p class="text-center small tm-copyright-text mb-0">Copyright &copy; <span class="tm-current-year">2020</span> Ryhmä Kantapää Oy | Designed by Template Mo</p>
    </div>
  </div>
  </div>
  <!-- load JS -->
  <script src="js/jquery-3.2.1.slim.min.js"></script>         <!-- https://jquery.com/ -->
  <script>
  
    /* DOM is ready
    ------------------------------------------------*/
    $(function(){
  
      if(renderPage) {
        $('body').addClass('loaded');
      }
  
      $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright
    });
  
  </script>
  
  </body>
  </html>
  