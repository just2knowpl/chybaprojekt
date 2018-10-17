<?php
/*
*Mediator globalny. Nie ruszać.
*/
session_start();

function dbConn() {
    $dbuser = "root";
    $dbhost = "localhost";
    $dbpass = "";
    $db = "projekt";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    if($conn) {
        return $conn;
    }
        
}
function checkSession($session) {
    if(isset($session) && !empty($session) && ($session != null))
        return true;
    return false;
}
?>