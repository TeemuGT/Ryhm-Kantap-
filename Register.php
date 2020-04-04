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
        <h2>Uuden tilin luonti</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="inputBox <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" placeholder="Käyttäjänimi" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="inputBox <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" placeholder="Salasana"name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="inputBox <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" placeholder="Vahvista salasana"name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="button">
                <input type="submit" class="btn btn-primary" value="Luo tili">
                <input type="reset" class="btn btn-default" value="Nollaa">
            </div>
            <p><a href="login.php">Palaa</a></p>
        </form>
    </div> 
    </body>
</html>

<?php
require_once "config/config.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Käyttäjänimen vahvistus
    if(empty(trim($_POST["username"]))){
        $username_err = "Syötä käyttäjänimi.";
    } else{
        // ehto
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Käyttäjänimi on jo käytössä.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Jotain meni vikaan. Yritä myöhemmin uudelleen.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    // Salasanan vahvistus
    if(empty(trim($_POST["password"]))){
        $password_err = "Syötä salasana.";     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Salasanassa tulee olla vähintään kahdeksan kirjainta.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Salasanan vahvistuksen vahvistaminen
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Vahvista salasana.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Salasanat eivät vastanneet toisiaan.";
        }
    }
    
    // Löytyykö virheitä tietojen syöttämisessa?
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // muuttuja
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            // suoritus
            if(mysqli_stmt_execute($stmt)){
                // ohjaa käyttäjän takaisin kirjautumiseen
                header("location: login.php");
            } else{
                echo "Jotain meni vikaan. Ole hyvä ja yritä myöhemmin uudestaan.";
            }

            // lopeta
            mysqli_stmt_close($stmt);
        }
    }
    
    // sulje yhteys
    mysqli_close($link);
}
?>
 