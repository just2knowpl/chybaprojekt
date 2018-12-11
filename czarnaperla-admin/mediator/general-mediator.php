<?php
/*
*Mediator globalny.
*/
session_start();
ob_start();
function dbConn() {
    $dbuser = "root";
    $dbhost = "localhost";
    $dbpass = "";
    $db = "czarna-perla";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    if($conn) {
        return $conn;
    }
    return "Problem połączenia z bazą danych.";
        
}
function checkSession($session) {
    if(isset($session) && !empty($session) && ($session != null))
        return true;
    return false;
}
?>