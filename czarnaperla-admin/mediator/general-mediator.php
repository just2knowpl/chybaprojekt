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
	mysqli_select_db($conn,$db);
	mysqli_set_charset($conn,'utf8');
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
function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}
function ostatnieMiejscePobytu() {
    unset($_SESSION['ostatniaStrona']);
    $_SESSION['ostatniaStrona'] = basename($_SERVER['REQUEST_URI']);
    echo "<script>console.log('".$_SESSION['ostatniaStrona']."');</script>";
}
?>