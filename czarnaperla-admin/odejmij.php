<?php

include 'mediator/general-mediator.php';
include 'mediator/powiadomienia-mediator.php';

$id = $_GET['id'];
$il = $_GET['ilosc'];

$zap = mysqli_query(dbConn(),"SELECT * FROM towar WHERE id=".$id);

if(mysqli_num_rows($zap) > 0) {
    $r = mysqli_fetch_assoc($zap);
    $ilosc = $r['ilosc'] - $il;
    $firma = $r['firma'];
    $rodzaj = $r['rodzaj'];
    if($il > $r['ilosc']) {
        $_SESSION['czyIloscPrawidlowa'] = false;
        exit(header("Location: lista-towarow"));
    }
    $ilosc_usunietych = $r['ilosc_usunietych'] + $il;
    mysqli_query(dbConn(),"UPDATE towar SET ilosc = ".$ilosc.", ilosc_usunietych = ".$ilosc_usunietych." WHERE id = ".$id);
    
    //@TODO
    //Zrobić parametr dla progu ilosci
    if($ilosc < 3) 
    executeMaloTowaruNaStanie($firma,$rodzaj,$ilosc);
        //mysqli_query(dbConn(),"UPDATE towar SET ilosc_usunietych = ".$ilosc_usunietych." WHERE id=".$id);
}

    exit(header("Location: lista-towarow"));
?>