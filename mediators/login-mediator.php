<?php
/*
*mediator dla rejestracji/logowania.
*/

include 'globalFunctions.php';

$_username;
$_password;
$_mail;

/*
*settery
*/

function setUsername($name) {
    if(!empty($name))
        $_username = $name;
}
function setPassword($pass,$pass2) {
    if($pass == $pass2) {
        $_password = $pass;
    }
}
function setemail($mail) {
    $_mail = $pass;
}


function registerUser() {
    if(!empty($_username) && !empty($_password) && !empty($_mail)) {
        
    }
}

function loginUser() {
    
}
?>