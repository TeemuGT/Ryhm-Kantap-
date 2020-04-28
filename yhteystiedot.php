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
  
  <title>Yhteystiedot</title>
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
      <a class=" tm-text-color-white nav-link" href="Profiili.php">Profiili</a>
    </li>
    <li class="nav-item">
      <a class="tm-text-color-white nav-link" href="Harjoitustiedot.php">Harjotustiedot</a>
    </li>
    <li class="nav-item">
      <a class="tm-text-color-white nav-link" href="yhteystiedot.php"><u>Yhteystiedot</u></a>
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
      
      <h1 class="tm-text-color-white tm-site-name">Yhteystiedot sekä asiakaspalvelu</h1>
    </div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <p class="tm-quote tm-text-color-gray"></p>
    <div class="tm-flex-center p-5">
      <p class="tm-quote tm-text-color-gray">Sivustolta löydät tietoa sovelluksen tekijöistä sekä asiakaspalvelun yhteystiedot.
      </p>
      
    </div>
    
  </div>
</section>

<!-- 2nd section -->
<section class="row tm-section tm-col-md-reverse">
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
  <div class="tm-flex-center p-5">
    <div class="tm-md-flex-center">
      <h2 class="tm-text-color-primary mb-4">Laura Mikluha</h2>
      <p class="mb-4">Metropolia ammattikorkeakoulu<br> Tieto- ja viestintätekniikka, opiskelija <br>Toimii projektissa Product ownerina. 
      </p>
    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
  <div class="tm-flex-center p-5 tm-bg-color-primary">
    <div class="tm-max-w-400 tm-flex-center tm-flex-col">
      <img src="img/Laurankuva.jpeg" alt="Image" class="rounded-circle mb-4">
  </div>
</div>
</section>

<!-- 3rd Section -->
<section class="row tm-section tm-mb-30">
<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
  <div class="tm-flex-center p-5 tm-bg-color-primary">
    <div class="tm-max-w-400 tm-flex-center tm-flex-col">
    <img src="img/Emiliankuva.jpeg" alt="Image" class="rounded-circle mb-4">
  </div>
      </div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
  <div class="tm-flex-center p-5">
    <div class="tm-md-flex-center">
    <h2 class="tm-text-color-primary mb-4">Emilia Larmala</h2>
      <p>Metropolia ammattikorkeakoulu <br>Tieto- ja viestintätekniikka, opiskelija<br>Toimii projektissa Skrum masterina.</p>
  </div>
</div>
</section>

<!-- 2nd Section again -->
<section class="row tm-section tm-col-md-reverse">
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
  <div class="tm-flex-center p-5">
    <div class="tm-md-flex-center">
      <h2 class="tm-text-color-primary mb-4">Teemu Tähkä</h2>
      <p class="mb-4">Metropolia ammattikorkeakoulu<br> Tieto- ja viestintätekniikka, opiskelija <br>Toimii projektissa Code masterina. 
      </p>
    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
  <div class="tm-flex-center p-5 tm-bg-color-primary">
    <div class="tm-max-w-400 tm-flex-center tm-flex-col">
      <img src="img/Teemunkuva.jpeg" alt="Image" class="rounded-circle mb-4">
  </div>
</div>
</section>

<!-- 4th Section -->
<section class="row tm-section tm-mb-30">
 <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
  <div class="tm-flex-center pl-5 pr-5 pt-5 pb-5">
    <div class="tm-md-flex-center">
     <h2 class="mb-4 tm-text-color-primary">Kysyttävää? Ota yhteyttä!</h2>
     <form method = "POST">
            <div class="form-group">
                <input type="alphabet" min="1" max="50" name="Nimi_Input" class="form-control" id="NimiInput" placeholder="Koko nimi">
            </div>      
            <div class="form-group">
                <input type="alphabet" min="1" max="50" name="Puhnum_Input" class="form-control" id="PuhnumInput" placeholder="Puhelinnumero">
            </div> 
            <div class="form-group">
                <input type="alphabet" min="1" max="50" name="Sapo_Input" class="form-control" id="SapoInput" placeholder="Sähköpostiosoite">
            </div> 
            <div class="form-group">
                <input type="alphabet" min="1" max="500" name="Selitys_Input" class="form-control" id="SelitysInput" placeholder="Yhteydenoton syy">
            </div>
         </form>
     <a href="#" class="btn btn-primary float-lg-right tm-md-align-center">Lähetä</a>
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
