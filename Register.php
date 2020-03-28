<!DOCTYPE html>
<html>
    <head>
        <html lang="en">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div class="box">
            <h2>Luo uusi tili</h2>
            <form>
                <div class="inputBox">
                    <input type="text" name="" required="" placeholder="Käyttäjänimi">
                </div>
                <div class="inputBox">
                    <input type="text" name="givenEmail" required="" placeholder="Sähköpostiosoite">
                </div>
                <div class="inputBox">
                    <input type="password" name="givenPassword" required="" placeholder="Salasana">
                </div>
                <div class="inputBox">
                    <input type="password" name="" required="" placeholder="Vahvista salasana">
                </div>
                <input type="submit" name="" value="Luo tili">
                <input type="button" name="" value="Palaa">
            </form>
        </div>
    </body>
</html>


<?php
//Lomakkeen submit painettu?
if(isset($_POST['submitUser'])){
  //Tarkistetaan syötteet myös palvelimella
  if(strlen($_POST['givenUsername'])<4){
   $_SESSION['swarningInput']="Illegal username (min 4 chars)";
  }else if(!filter_var($_POST['givenEmail'], FILTER_VALIDATE_EMAIL)){
   $_SESSION['swarningInput']="Illegal email";
  }else if(strlen($_POST['givenPassword'])<8){
  $_SESSION['swarningInput']="Illegal password (min 8 chars)";
  }else if($_POST['givenPassword'] != $_POST['givenPasswordVerify']){
  $_SESSION['swarningInput']="Given password and verified not same";
  }else{
  unset($_SESSION['swarningInput']);
  //1. Tiedot sessioon
  $_SESSION['suserName']=$_POST['givenUsername'];
  $_SESSION['sloggedIn']="yes";
  $_SESSION['suserEmail']= $_POST['givenEmail'];
  //2. Tiedot kantaan - kesken
  //Testataan pääsivulle paluu

  //Palataan pääsivulle jos tallennus onnistui -kesken
    header("Location: index.php");
    
 }
}
?>

<?php
//Luovutetaanko ja palataan takaisin pääsivulle alkutilanteeseen
if(isset($_POST['submitBack'])){
  session_unset();
  session_destroy();
  header("Location: xxx.php");
}
?>

<?php
  //Näytetäänkö lomakesyötteen aiheuttama varoitus?
if(isset($_SESSION['swarningInput'])){
  echo("<p class=\"warning\">ILLEGAL INPUT: ". $_SESSION['xx']."</p>");
}
?>
<?php
 $data['name'] = $_POST['givenUsername'];
  $data['email'] = $_POST['givenEmail'];
  $added='#â‚¬%&&/'; //suolataan annettu salasana
  $data['pwd'] = password_hash($_POST['givenPassword'].$added, PASSWORD_BCRYPT);
  try {
    //***Email ei saa olla käytetty aiemmin
    $sql = "SELECT COUNT(*) FROM wsk6_user where userEmail  =  " . "'".$_POST['givenEmail']."'"  ;
    $kysely=$DBH->prepare($sql);
    $kysely->execute();				
    $tulos=$kysely->fetch();
    if($tulos[0] == 0){ //email ei ole käytössä
     $STH = $DBH->prepare("INSERT INTO wsk6_user (userName, userEmail, userPwd) VALUES (:name, :email, :pwd);");
     $STH->execute($data);
     header("Location: index.php"); //Palataan pääsivulle kirjautuneena
    }else{
      $_SESSION['swarningInput']="Email is reserved";
    }
  } catch(PDOException $e) {
    file_put_contents('log/DBErrors.txt', 'signInUser.php: '.$e->getMessage()."\n", FILE_APPEND);
    $_SESSION['swarningInput'] = 'Database problem';
    
  }
?>
