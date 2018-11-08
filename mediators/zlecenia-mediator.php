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
    if(isset($waluta) && !empty($waluta) && $waluta != null)
        return mysqli_real_escape_string(dbConn(),$waluta);
    else 
        echo "Waluta nie może być pusta";
    return null;
}
function setCzasWyk($czasOd,$czasDo) {
    if(isset($czasOd) && !empty($czasOd) && $czasOd != null && isset($czasDo) && !empty($czasDo) && $czasDo != null) {
        $srCzas = ($czasOd + $czasDo) / 2;
        return mysqli_real_escape_string(dbConn(),$srCzas);
    }
            else 
        echo "Czas nie został podany prawidłowo.";
    return null
}
function setOpis($opis) {
    if(isset($opis) && !empty($opis) && $opis != null)
        return mysqli_real_escape_string(dbConn(),$opis);
    else 
        echo "Opis nie został podany.";
    return null;
}

function potwierdzZlecenie() {
    return true;
}


function addZlecenie($tytul,$budzet,$waluta,$czasWyk,$opis,$potw) {
    if($tytul != null && $budzet != null && $waluta != null && $czasWyk != null && $opis != null && $potw != null) {
        echo "Danie podane prawidłowo.";
    }
    else {
        echo "Błąd aplikacji.";
    }
}

?>