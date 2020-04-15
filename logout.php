  
<?php
session_start();
 
$_SESSION = array();
 
session_destroy();
 
// Ohjaa kirjautumissivulle
header("location: login.php");
exit;
?>