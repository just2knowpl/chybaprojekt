<?php
/*
*Mediator globalny. Nie ruszać.
*/
session_start();

function setUser($nick) {
    if(!empty($nick)) {
        $_SESSION['user'] = $nick;
        return true;
    }
    else
        return false;
}

function getUser($user) {
    if(isset($user)) 
        return $user;
    else 
        return "tester";
}

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
?>