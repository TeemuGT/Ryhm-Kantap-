<?php
    include_once("config/chttps.php");
    include_once("config/cconfig.php");
    include_once("includes/iheader.php");
    include_once("includes/inavIndex.php");
?>

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
            <h2>Kirjautuminen</h2>
            <form mwethod="post">
                <div class="inputBox">
                    <input type="text" name="givenEmail" required="" placeholder="Sähköpostiosoite" maxlength="40">
                </div>
                <div class="inputBox">
                    <input type="password" name="givenPassword" required="" placeholder="Salasana" maxlength="40">
                </div>
                <input type="submit" name="submitUser" value="Kirjaudu sisään">
                <br>
                <br>
                <a href="https://users.metropolia.fi/~emililar/Hyteproj/Ryhm-Kantap-/Register.php" class="button">Luo uusi tili</a>
            </form>
        </div>
    </body>
</html>


<?php
//Lomakkeen submit painettu?
if(isset($_POST['submitUser'])){
  //***Tarkistetaan email myös palvelimella
  if(!filter_var($_POST['givenEmail'], FILTER_VALIDATE_EMAIL)){
   $_SESSION['swarningInput']="Illegal email";
  }else{
    unset($_SESSION['swarningInput']);  
     try {
      //Tiedot kannasta, hakuehto
      $data['xxx'] = $_POST['givenEmail'];
      $STH = $DBH->prepare("SELECT userName, userEmail, userPwd FROM wsk6_user WHERE userEmail = :email;");
      $STH->execute($data);
      $STH->setFetchMode(PDO::FETCH_OBJ);
      $tulosOlio=$STH->fetch();
      //lomakkeelle annettu salasana + suola
      $givenPasswordAdded = $_POST['givenPassword'].$added; //$added löytyy cconfig.php
 
       //Löytyikö email kannasta?   
       if($tulosOlio!=NULL){
          //email löytyi
         // var_dump($tulosOlio);
          if(password_verify($givenPasswordAdded,$tulosOlio->xxx)){
              $_SESSION['sloggedIn']="xxx";
              $_SESSION['suserName']=$tulosOlio->userName;
              $_SESSION['suserEmail']=$tulosOlio->userEmail;
              header("Location: index.php"); //Palataan pääsivulle kirjautuneena
          }else{
            $_SESSION['swarningInput']="Wrong password";
          }
      }else{
        $_SESSION['swarningInput']="Wrong email";
      }
     } catch(PDOException $e) {
        file_put_contents('log/DBErrors.txt', 'signInUser.php: '.$e->getMessage()."\n", FILE_APPEND);
        $_SESSION['swarningInput'] = 'Database problem';
    }
  }
}
?>

<?php
//***Luovutetaanko ja palataan takaisin pääsivulle alkutilanteeseen
//ilma  rekisteröintiä?
if(isset($_POST['submitBack'])){
  session_unset();
  session_destroy();
  header("Location: index.php");
}
?>

<?php
  //***Näytetäänkö lomakesyötteen aiheuttama varoitus?
if(isset($_SESSION['swarningInput'])){
  echo("<p class=\"warning\">ILLEGAL INPUT: ". $_SESSION['swarningInput']."</p>");
}
?>
