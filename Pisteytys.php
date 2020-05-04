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
  <title>Pisteytys</title>

  </head>

<body>
<?php
$query = "SELECT 	Pisteytys FROM users WHERE id = $ID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
while($row = mysqli_fetch_assoc($result)) {
      $Piste += $row['Pisteytys'];
      }


?>

    </body>
    </html>
