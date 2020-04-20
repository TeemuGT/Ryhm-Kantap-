<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pisteytys</title>

  </head>

<body>
<?php
$query = "SELECT Pisteytys FROM users WHERE id = $ID";
      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      while($row = mysqli_fetch_assoc($result)) {
      $Piste += $row['Pisteytys'];
      }
      
/*
 $query = "SELECT askeleet FROM Harjoitustiedot WHERE id_user = $ID";
      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      $paskel;
      $pisteet;
      while($row = mysqli_fetch_assoc($result)) {
        $paskel+=$row['askeleet'];
      }
      $pisteet=$paskel / 1000;
      

        



if($pisteet >= 10.0){
    $pisteet-=10;
    //echo '<script>alert("POPUP") .</script>'; 
    //myFunction();
    
}else{
    return;
}


/*$que = mysql_query("select picture from pictures");
while ($row = mysql_fetch_array($que)) {
  $picture = $row['picture'];
  echo '<input type="checkbox" id="check" style="display:none;">
<label for="check">
    <img src="Memet/projektiMeme.jpeg/'.$picture.
  '" style="width:50px; height: 50px"/>
    </label>
<label for="check">
    <div id="cover">
    <div id="box">
    <img src="Memet/projektiMeme.jpeg/'.$picture.
  '" style="width:380px; height: 380px"/>
    </div>
    </div>
    </label>';
} ?> */


   // myFunction(){
 //"<div class="popup" onclick="myFunction()">Click me!
  //<span class="popuptext" id="myPopup">Popup text...</span>
//</div>"
  //  }



?>

    </body>
    </html>
