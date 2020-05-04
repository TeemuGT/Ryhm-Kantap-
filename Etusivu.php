<?php
session_start();
 
// Kirjautuneena sisään?
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
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
      <a class="tm-text-color-white nav-link" href="Etusivu.php"><u>Etusivu</u></a>
    </li>
    <li class="nav-item">
      <a class=" tm-text-color-white nav-link" href="Profiili.php">Profiili</a>
    </li>
    <li class="nav-item">
      <a class="tm-text-color-white nav-link" href="Harjoitustiedot.php">Harjoitustiedot</a>
    </li>
    <li class="nav-item">
      <a class="tm-text-color-white nav-link" href="yhteistiedot.php">Yhteystiedot</a>
    </li>
    <li class="nav-item">
      <a href="logout.php" class="tm-text-color-white nav-link">Kirjaudu ulos</a>
    </li>
  </ul>
  </nav>
  <?php
 include 'Pisteytys.php'
 ?>
 


 <div class="container">

  <!-- 1st section -->
  <section class="row tm-section colo">
   <div class="col-sm-12 col-md-18 col-lg-6 col-xl-6 p-0">
    
    <div class="tm-flex-center p-5 tm-bg-color-primary tm-section-min-h">
      
      <h1 class="tm-text-color-white tm-site-name">FITLYFE</h1>
    </div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
  <p class="tm-quote tm-text-color-gray">Pisteesi on tällähetkellä: <?php echo $Piste ?> </p>
    <div class="tm-flex-center p-5">
    </div>
  </div>
</section>

<!-- 2nd section -->
<section class="row tm-section tm-col-md-reverse">
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
  <div class="tm-flex-center p-5">
    <div class="tm-text-color-primary small tm-font-thin mb-0">
      <h2>Mikä on Fitlyfe?</h2>
      <br>
      <p class="tm-text-color-primary small tm-font-thin mb-0">Fitlyfe on kolmen hyvinvointi – ja terveysteknologian opiskelijan kehittämä sovellus, jonka tarkoituksena on motivoida erityisesti opiskelijoita, mutta myös muita, lisäämään arkiaktiivisuuttaan. Pitkät työ – ja opiskelupäivät passivoivat ihmistä ja tätä ongelmaa tahdoimme lähteä ratkaisemaan. Arjen pienet teot kuten aikaisemmalla pysäkillä bussista jääminen tai luentojen ja työpäivän säännöllinen tauottaminen tekevät yllättävän suuren eron aktiivisuuteen ja vireystilaan. Kun veri kiertää, toimii mielikin paremmin. Omaan terveyteen panostaminen onkin paras investointi minkä voit tehdä! </p>

    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
  <div class="tm-flex-center p-5 tm-bg-color-primary">
    <div class="tm-text-color-white small tm-font-thin mb-0">
    <h2>Pisteytyksestä</h2>
    <br>
      <p class="tm-text-color-white small tm-font-thin mb-0">Syöttämällä profiiliisi lepo – sekä maksimisykkeesi, pystymme määrittämään sinulle henkilökohtaiset sykerajat, joita sovelluksemme käyttää hyödykseen antaessaan sinulle pisteitä niin arkiaktiivisuudesta kuin tehdyistä harjoituksistakin. Aivan kuten UKK : n suosituksissakin, on Fitlyfella kolme tasoa: kevyt, reipas ja raskas liikunta. Mitä reippaammin liikut, sitä enemmän keräät pisteitä! Ja, koska arjen aktiivisuus näyttelee suurta osaa ihmisen hyvinvoinnissa, voit syöttää harjoitustietoihisi pelkät otetut askeleet ja kerryttää pisteitä myös tätä kautta. </p>
    </div>
  </div>
</div>
</section>

<!-- //http://www.fitlandia.fi/sykerajat-ja-harjoittelu/
//https://sydan.fi/liiku-oikealla-sykkeella/
//https://www.terveyskirjasto.fi/terveyskirjasto/tk.koti?p_artikkeli=dlk01005
//https://www.ukkinstituutti.fi/liikkumisensuositus/aikuisten-liikkumisen-suositus
//https://kuntoplus.fi/treeni/kunto/loyda-henkilokohtaiset-sykerajasi
 -->
<section class="row tm-section tm-col-md-reverse">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
        <div class="tm-flex-center p-5 tm-bg-color-primary">
          <div class="tm-text-color-white small tm-font-thin mb-0">
          <h2>Kaikki liike lasketaan</h2>
          <br>
          <p>UKK - instituutti julkaisi lokakuussa 2019 seuraavat, uudistetut liikuntasuositukset aikuisille.</p>
          <br>
          <p>LIHASKUNTOA JA LIIKEHALLINTAA</p>
          <p class="tm-text-color-white small tm-font-thin mb-0">Ihmisen tulisi kuormittaa suuria lihaksia ja kehittää liikkuvuutta vähintään kahdesti viikossa. Tähän sopivat esimerkiksi kuntosaliharjoitukset ja ryhmäliikunta. </p>
          <br>
          <p>REIPASTA JA RASITTAVAA LIIKUNTAA</p>
          <p class="tm-text-color-white small tm-font-thin mb-0">Sydämen sykettä nostattavaa liikuntaa kuten uintia tai tanssia tulisi kertyä viikossa vähintään 2h ja 30min tai rasittavampaa urheilua, kuten juoksua tai pyöräilyä 1h ja 15min. </p>
          <br>
          <p>KEVYTTÄ LIIKUNTAA JA TAUKOJA</p>
          <p class="tm-text-color-white small tm-font-thin mb-0">Monen aikuisen arkielämä on nykyään passiivista. Paikallaoloja tulisikin tauottaa mahdollisimman usein lihasten aktivoisemiseksi. Kaikki kevyt liikunta on kotiinpäin ja mm. pihatyöt ja arkiaskareet pitävät nivelet vetreänä ja verenkierron vilkkaana.  </p>
          <br>
          <p>UNTA</h3>
            <br>
            <p class="tm-text-color-white small tm-font-thin mb-0">Vaikka liike on tärkeää, on myös levolla paikkansa. Mistä tietää siis saaneensa tarpeeksi palauttavaa unta? Se on yksinkertaista: kun heräät virkeänä, tiedät saaneesi unta tarpeeksi!  </p>
        </div>
        </div>
      </div>
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <div class="tm-flex-center p-5">
      <div class="tm-flex-center tm-flex-col">
        <img src="img/4203-aikuisten-liikkumisen_suositus-kuva-web.jpg" alt="UKK" class="img-fluid">
        <a href="https://www.ukkinstituutti.fi/liikkumisensuositus" class="btn btn-primary">Lue lisää</a>
      </div>
    </div>
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