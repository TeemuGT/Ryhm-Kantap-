<?php
require_once ("loggedin.php");
require_once ("config/config.php");

function getUsersData($id){

    $array = array ();
    $q = mysql_query("SELECT * FROM users WHERE $id =" . $_SESSION["id"]);
    while ($r = mysql_fetch_array($q))
    {
        $array['id'] = $r ['id'];
        $array['username'] = $r ['username'];
        $array['password'] = $r ['password'];
        $array['Etunimi'] = $r ['Etunimi'];
        $array['Sukunimi'] = $r ['Sukunimi'];
        $array['Sukupuoli'] = $r ['Sukupuoli'];
        $array['ika'] = $r ['ika'];
        $array['sahkoposti'] = $r['sahkoposti'];
        $array['paino'] = $r['paino'];
        $array['pituus'] = $r['pituus'];
        $array['leposyke'] = $r['leposyke'];
        $array['makssyke'] = $r['makssyke'];
    }

    return $array;
}

function getID($username)
{
    $q = "SELECT 'id' FROM 'users' WHERE 'username' =" . $_SESSION['username'];
    while($r = mysql_fetch_array ($q))
    {
        return $r['id'];
    }
}
?>
