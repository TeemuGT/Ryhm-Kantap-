<?php
require_once ("loggedin.php");
require_once ("config/config.php");

function getUsersData($id){

    $array = array ();
    $query = mysql_query("SELECT * FROM users WHERE $id =" . $_SESSION["id"]);
    while ($row = mysql_fetch_assoc($query))
    {
    {
        $array['id'] = $row ['id'];
        $array['username'] = $row ['username'];
        $array['password'] = $row ['password'];
        $array['Etunimi'] = $row ['Etunimi'];
        $array['Sukunimi'] = $row ['Sukunimi'];
        $array['Sukupuoli'] = $row ['Sukupuoli'];
        $array['ika'] = $row ['ika'];
        $array['sahkoposti'] = $row ['sahkoposti'];
        $array['paino'] = $row ['paino'];
        $array['pituus'] = $row ['pituus'];
        $array['leposyke'] = $row ['leposyke'];
        $array['makssyke'] = $row ['makssyke'];
    }

    return $array;
}

function getID($username)
{
    $query = mysql_query("SELECT id FROM users WHERE username= " . $_SESSION["username"]);
    while($row = mysql_fetch_assoc ($query))
    {
        return $row['id'];
    }
}
?>