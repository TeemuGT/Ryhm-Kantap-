<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <h2>Kirjautuminen</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="inputBox <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" placeholder="Käyttäjänimi" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="inputBox  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" placeholder="Salasana" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Kirjaudu">
            </div>
            <p> Ei käyttäjätiliä? <a href="Register.php">Rekisteröidy</a></p>
        </form>
    </div>    
</body>
</html>

<?php
session_start();
 
// Onko jo kirjautunut? Ohjaa welcome sivulle (vaihda etusivuun)
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: etusivu.php");
    exit;
}
 
require_once "config/config.php";
 
$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Onko käyttäjänimikenttä tyhjä
    if(empty(trim($_POST["username"]))){
        $username_err = "Syötä käyttäjänimi.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Onko salsana syötetty
    if(empty(trim($_POST["password"]))){
        $password_err = "Syötä salasana.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
    
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                // Tiedot kantaan
                mysqli_stmt_store_result($stmt);
                
                // Vahvista salasana jos käyttäjänimi on olemassa
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Etusivulle
                            header("location: Etusivu.html");
                        } else{
                            $password_err = "Syöttämäsi salasana on virheellinen.";
                        }
                    }
                } else{
                    $username_err = "Käyttäjänimellä ei löydy tiliä.";
                }
            } else{
                echo "Oops! Jotain meni vikaan! Yritä myöhemmin uudelleen.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>