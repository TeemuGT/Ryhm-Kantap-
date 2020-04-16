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

  <nav>
    <ul class="tm-bg-color-primary nav nav-pills nav-fill">
      <li class="nav-item">
        <a class="tm-text-color-white nav-link" href="Etusivu.php">Etusivu</a>
      </li>
      <li class="nav-item">
        <a class=" tm-text-color-white nav-link" href="#">Profiili</a>
      </li>
      <li class="nav-item">
        <a class="tm-text-color-white nav-link" href="Harjoitustiedot.php"><u>Harjotustiedot</u></a>
      </li>
      <li class="nav-item">
        <a class="tm-text-color-white nav-link" href="Pisteytys.php">Asetukset</a>
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
 
  
  <!-- 2nd section -->
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
                <input type="number" min=30 max="200" name="Syke_Input" class="form-control" id="SykeInput" placeholder="Syke (min)">
            </div> 
            <input class="btn-primary" type="submit" value="submit">
         </form>
         <?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
 

 
// määritys
$AskelInput = mysqli_real_escape_string($link, $_REQUEST['Askel_Input']);
$MatkaInput = mysqli_real_escape_string($link, $_REQUEST['Matka_Input']);
$SykeInput = mysqli_real_escape_string($link, $_REQUEST['Syke_Input']);


 
// Tiedot kantaan
$sql = "INSERT INTO Harjoitustiedot (askeleet, matka, syke, id_user) VALUES ('$AskelInput', '$MatkaInput', '$SykeInput', '$ID')";
if(mysqli_query($link, $sql)){
    header("location: Harjoitustiedot.php");
} else{
    echo "Virhe. Tietoja ei pystytty päivittää $sql. " . mysqli_error($link);
}
 
mysqli_close($link);

}
?>
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
        $ksyke;
        $mittaus;
        $asyke;
      while($row = mysqli_fetch_assoc($result)) {   
            
            $kaskel+=$row['askeleet']; 
            $kmatka+=$row['matka'];
            $ksyke+=$row['syke'];
            $mittaus+=1;

      }
        
        $asyke = $ksyke/$mittaus;
        echo "<table style='width:100%; height:75%;  border: solid 4px white;'><tr><th>Harjoite </th><th> Määrä </th></tr>";
        echo "<tr style='border: solid 1px'><td>Askelten määrä</td><td  style='border: solid 1px';>" . $kaskel . " kpl</td></tr>";
        echo "<tr><td>Kuljettu matka</td><td>" . $kmatka . " km</td></tr>";
        echo "<tr style='border: solid 1px'><td>Sykkeen keskiarvo</td><td>" . $asyke . "</td></tr>";
        
        echo "</table>";
          ?>
      </div>
    </div>
  </div>
  </section>
  
 
          
  
  <!-- 4th Section -->
  <section class="row tm-section tm-mb-30">
   <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12 tm-bg-color-primary tm-text-color-white">
    
   <p>
      <?php
      
  $query = "SELECT id_mittaus, aika, askeleet, matka, syke FROM Harjoitustiedot WHERE id_user = $ID";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
    echo "<table style='width:100%;border: solid 4px white;'><tr><th>Kirjaus Aika </th><th>Harjoitus</th><th>Tuloksesi</th></tr>";
  while($row = mysqli_fetch_assoc($result)) {   
        
        echo "<tr style='border: solid 1px ;'><td><br></td><td></td><td></td></tr>";
        echo "<tr><td>". $row["aika"] . "</td><td>Mittaus </td><td>" . $row["id_mittaus"] . "</td></tr>";
        echo "<tr><td>". " " . "<td>Askeleet </td><td>" . $row["askeleet"] . "</td></tr>";
        echo "<tr><td>". " " . "<td>Matka (km) </td><td>" . $row["matka"] . "</td></tr>";
        echo "<tr><td>". " " . "<td>Syke </td><td>" . $row["syke"] . "</td></tr>";
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

  