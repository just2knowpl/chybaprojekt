<?php
include 'general-mediator.php';

//Dodawanie towaru.

//settery

function setRodzaj($rodzaj) {
    if(isset($rodzaj)) 
        return mysqli_real_escape_string(dbConn(),$rodzaj);
    echo " Proszę podać towar. ";
    return null;
}
function setFirma($producent) {
    if(isset($producent))
        return mysqli_real_escape_string(dbConn(),$producent);
    echo " Proszę wybrać firmę. ";
    return null;
}
function setIlosc() {
    if(isset($ilosc)) {
        if($ilosc > 0) {
            return mysqli_real_escape_string(dbConn(),$ilosc);
        }
        else {
            echo "Ilość nie może być mniejsza od 1";
            return null;
        }
    }
    echo "Błędna ilość.";
    return null;
}

//funkcja wykonawcza

function addTowar($rodzaj, $producent, $ilosc) {
    if($rodzaj != null && $producent != null && $ilosc != null) {
        $check_sql = mysqli_query(dbConn(),"SELECT * FROM towar WHERE rodzaj = '".$rodzaj."' AND firma = '".$firma."'");
         if(mysqli_num_rows($check_sql) > 0) {
             echo "Taki rekord istnieje już w bazie danych.";
             return null;
         }
        $query = mysqli_query(dbConn(),"INSERT INTO towar (rodzaj,firma,ilosc) VALUES ('".$rodzaj."','".$producent."','".$ilosc."')"); 
    }
}

?>