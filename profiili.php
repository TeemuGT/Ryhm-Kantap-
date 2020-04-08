<?php

require_once ("config/config.php");

function getUseraData($id)
{    //käyttäjän tiedot kannasta
    $q = mysql_query ("SELECT * FROM 'users' WHERE 'id'=".$id);
}

?>
