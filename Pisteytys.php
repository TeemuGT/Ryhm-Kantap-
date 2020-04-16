<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pisteytys</title>

  </head>

<body>


<?php
 $query = "SELECT askeleet FROM Harjoitustiedot WHERE id_user = $ID";
      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      $paskel;
      $pisteet;
      while($row = mysqli_fetch_assoc($result)) {
        $paskel+=$row['askeleet'];
      }
      $pisteet=$paskel / 1000;
      

        



//if($pisteet >= 10.0){
    //$pisteet-10;
    //echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
    //myFunction();
//}else{
  //  return;
//}


   // myFunction(){
 //"<div class="popup" onclick="myFunction()">Click me!
  //<span class="popuptext" id="myPopup">Popup text...</span>
//</div>"
  //  }



?>

    </body>
    </html>
