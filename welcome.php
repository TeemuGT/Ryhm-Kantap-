<?php
require_once ("logout.php");
?>

<?php
session_start();
 
// Onko kirjautunut sisään? os ei ohjaa kirjautumissivulle
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>