<?php
/*
*mediator dla rejestracji/logowania.
*/

include 'globalFunctions.php';


/*
*settery
*/

function setUsername($name) {
    if(isset($name) && !empty($name))
        $nameValid = mysqli_real_escape_string(dbConn(),$name);
        $nameCheck = mysqli_query(dbConn(),"SELECT * FROM users WHERE nickname = '".$nameValid."'");
        if(mysqli_num_rows($nameCheck) == 0) {
            return mysqli_real_escape_string(dbConn(),$name);
        }
        echo "Podany nazwa użytkownika już istnieje. ";
        return null;
}
function setPassword($pass,$pass2) {
    if(isset($pass) && isset($pass2) && !empty($pass) && !empty($pass2) && $pass == $pass2) {
         return md5(mysqli_real_escape_string(dbConn(),$pass));
    }
    echo "Hasła nie są indentyczne ";
    return null;
}

function setEmail($mail) {
    if(isset($mail) && !empty($mail)) {
        $mailValid = mysqli_real_escape_string(dbConn(),$mail);
        $mailCheck = mysqli_query(dbConn(),"SELECT * FROM users WHERE nickname = '".$mailValid."'");
        if(mysqli_num_rows($mailCheck) == 0) {
            return mysqli_real_escape_string(dbConn(),$mail);
        }
        echo "Podany mail został już wykorzystany. ";
        return null;
    }
}

//finishery

function registerUser($usr,$pass,$mai) {
    if(!empty($usr) && !empty($pass) && !empty($mai) && $usr != null && $pass != null && $mai != null) {
        mysqli_query(dbConn(),"INSERT INTO users (nickname,password,email) VALUES('".$usr."','".$pass."','".$mai."');");

        echo "<br>dodano. Sprawdzanie..";
        //Sprawdzanie czy rekord został dodany prawidłowo
        $resCheck = mysqli_query(dbConn(),"SELECT * FROM users WHERE nickname = '".$usr."'");
        if(mysqli_num_rows($resCheck) != 0) {
            echo "<br>dodano, sprawdzono";
            return true;
        }
        else {
            echo "operacja nie powiodła się";
            return false;
        }
    return true;
    }
    else {
        echo "Operacja rejestracji przerwana";
        return false;
    }
}

function loginUser() {
    
}
?>