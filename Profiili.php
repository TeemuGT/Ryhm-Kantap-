<?php
require_once ("loggedin.php");
require_once ("config/config.php")
?>


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
      <a class="tm-text-color-white nav-link" href="Etusivu.php">Etusivu</a>
    </li>
    <li class="nav-item">
      <a class=" tm-text-color-white nav-link" href="Profiili.php">Profiili</a>
    </li>
    <li class="nav-item">
      <a class="tm-text-color-white nav-link" href="Harjoitustiedot.php">Harjoitustiedot</a>
    </li>
    <li class="nav-item">
      <a class="tm-text-color-white nav-link" href="#">Yhteystiedot</a>
    </li>
    <li class="nav-item">
      <a href="logout.php" class="tm-text-color-white nav-link">Kirjaudu ulos</a>>
    </li>
  </ul>
  </nav>
 


 <div class="container">

  <!-- 1st section -->
  <section class="row tm-section colo">
   <div class="col-sm-12 col-md-18 col-lg-6 col-xl-6 p-0">
    
    <div class="tm-flex-center p-5 tm-bg-color-primary tm-section-min-h">
      
      <h1 class="tm-text-color-white tm-site-name">Ryhmä Kantapää Projekti</h1>
    </div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
    
    <div class="tm-flex-center p-5">
        <h1>Hei, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! Tervetuloa sisään.</h1>
    </div>
  </div>
</section>

<!-- 2nd section -->

<?php

//kirjautuneen käyttäjän tietoja 
//https://www.php.net/manual/en/function.print-r.php
//mysql_fetch_assoc doesm't print out a numeric index (0, 1, 2, ..) +  associative key.
//https://stackoverflow.com/questions/2970936/how-to-echo-out-table-rows-from-the-db-php
//https://stackoverflow.com/questions/27431601/how-to-echo-the-row-into-my-html


$query = "SELECT * FROM users WHERE id = " . $_SESSION["id"]; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));
while($row = mysqli_fetch_assoc($result)) { ?>
<section class="row tm-section tm-col-md-reverse">
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
  <div class="tm-flex-center p-5">
    <div class="tm-md-flex-center">
    <h1 class="tm-text-color-white tm-site-name"><h1><?php echo htmlspecialchars($_SESSION["username"]); //kirjautunut käyttäjä ?></h1>
      <p class="mb-4">Etunimi: <?php echo $row["Etunimi"];  ?></p>
      <p class="mb-4">Sukunimi: <?php echo $row["Sukunimi"]; ?></p>
      <p class="mb-4">Sukupuoli: <?php echo $row["Sukupuoli"]; ?></p>
      <p class="mb-4">Ikä: <?php echo $row["Ika"]; ?></p>
      <a href="insert.php" class="btn btn-primary float-lg-right tm-md-align-center">Päivitä tietoja</a>
    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
  <div class="tm-flex-center p-5 tm-bg-color-primary">
    <div class="tm-md-flex-center">
      <p class="tm-text-color-white">Paino: <?php echo $row["Paino"]; ?></p>
      <p class="tm-text-color-white">Pituus: <?php echo $row["Pituus"]; ?></p>
      <p class="tm-text-color-white">Leposyke: <?php echo $row["Leposyke"]; ?></p>
      <p class="tm-text-color-white">Maksimisyke: <?php echo $row["Makssyke"]; ?></p>
    </div>
  </div>
</div>
</section>
<?php } ?>

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