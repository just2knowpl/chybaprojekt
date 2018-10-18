<?php

include 'mediators/globalFunctions.php';

//settery

function setTytul($title) {
    if(isset($title) && !empty($title) && $title != null) {
        return mysqli_real_escape_string(dbConn(),$title);
    }
    else 
        echo "Tytuł nie może być pusty!";
        return null; 
}
function setBudzet($budzetOd,$budzetDo) {
    if(isset($budzetOd) && !empty($budzetOd) && $budzetOd != null && isset($budzetDo) && !empty($budzetDo) && $budzetDo != null) {
        $budzet = ($budzetOd + $budzetDo) / 2;
        return mysqli_real_escape_string(dbConn(),$budzet);
    }
    else {
        echo "Budżet nie może pozostać pusty";
        return null;
    }
}
function setWaluta($waluta) {
    
}
function setCzasWyk($czasOd,$czasDo) {
    
}
function setOpis($opis) {
    
}

function potwierdzZlecenie() {
    
}


function addZlecenie() {
    
}

?>