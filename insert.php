<?php
require_once ("require/loggedin.php");
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
        <a class="tm-text-color-white nav-link" href="Etusivu.html">Etusivu</a>
      </li>
      <li class="nav-item">
        <a class=" tm-text-color-white nav-link" href="#">Profiili</a>
      </li>
      <li class="nav-item">
        <a class="tm-text-color-white nav-link" href="Harjoitustiedot.php"><u>Harjotustiedot</u></a>
      </li>
      <li class="nav-item">
        <a class="tm-text-color-white nav-link" href="#">Asetukset</a>
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
        <h2 class="tm-text-color-primary mb-4"></h2>
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
    <input type="submit" value="Päivitä" class="btn btn-primary"></a>
    <a href="profiili.php" class="btn btn-primary">Palaa</a>
</form>
      </div>
    </div>
  </div>
    </div>
  </div>
  </section>
  
  <!-- 3rd Section -->
  <section class="row tm-section tm-mb-30">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0 text-center">
      <img src="img/image-01.jpg" alt="Image" class="img-fluid">
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <div class="tm-flex-center p-5">
        <div class="tm-flex-center tm-flex-col">
          <h2 class="tm-align-left">Loerm ipsum dolor sit amet</h2>
          <p>This is one-page HTML5 template that you can use for any purpose. Please tell your friends about <a href="https://www.facebook.com/templatemo" target="_parent">TemplateMo</a> website. Thank you.</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
  </section>
  
  <!-- 4th Section -->
  <section class="row tm-section tm-mb-30">
   <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
    <div class="tm-flex-center pl-5 pr-5 pt-5 pb-5">
      <div class="tm-md-flex-center">
       <h2 class="mb-4 tm-text-color-primary">Meidän sovellus</h2>
       <p>Voisimme tarinoda tähän jotakin?</p>
       <p class="mb-4">Ja vähän lisää tarinaa?</p>
       <p class="mb-4">Ja sitten veilä vähän lisää?</p>
       <a href="#" class="btn btn-primary float-lg-right tm-md-align-center">Read More</a>
     </div>
   </div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 text-xl-right text-md-center text-center mt-5 mt-lg-0 pr-lg-0">
   <img src="img/image-02.jpg" alt="Image" class="img-fluid">
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
$leposyke = mysqli_real_escape_string($link, $_REQUEST['lepo_syke']);
$makssyke = mysqli_real_escape_string($link, $_REQUEST['maks_syke']);

 
// Tiedot kantaan
//id = " . $_SESSION["id"]; <--- päivittää kirjautuneen käyttäjän tiedot käyttäjän id:n perusteella (käyttäjänimi toimisi myyös)
// https://stackoverflow.com/questions/27665285/how-to-update-user-database-for-current-user-login-in-php apuna
//https://www.siteground.com/tutorials/php-mysql/display-table-data/
$sql = "UPDATE users SET Etunimi = '$etunimi', Sukunimi = '$sukunimi', Sukupuoli = '$sukupuoli', ika = '$ika', paino = '$paino', pituus = '$pituus', leposyke = '$leposyke', makssyke = '$makssyke', sahkoposti = '$sahkoposti' WHERE id = " . $_SESSION["id"];
if(mysqli_query($link, $sql)){
    header("location: profiili.php");
} else{
    echo "Virhe. Tietoja ei pystytty päivittää $sql. " . mysqli_error($link);
}
 
mysqli_close($link);

}
?>

<?php
session_start();
 
// Kirjautuneena sisään?
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

