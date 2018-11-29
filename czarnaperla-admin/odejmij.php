<?php

include 'mediator/general-mediator.php';

$id = $_GET['id'];
$il = $_GET['ilosc'];

$zap = mysqli_query(dbConn(),"SELECT * FROM towar WHERE id=".$id);

if(mysqli_num_rows($zap) > 0) {
    $r = mysqli_fetch_assoc($zap);
    $ilosc = $r['ilosc'] - $il;
    if($il > $r['ilosc']) {
        $_SESSION['czyIloscPrawidlowa'] = false;
        exit(header("Location: lista-towarow"));
    }
    $ilosc_usunietych = $r['ilosc_usunietych'] + $il;
    mysqli_query(dbConn(),"UPDATE towar SET ilosc = ".$ilosc.", ilosc_usunietych = ".$ilosc_usunietych." WHERE id = ".$id);
        //mysqli_query(dbConn(),"UPDATE towar SET ilosc_usunietych = ".$ilosc_usunietych." WHERE id=".$id);
}

    exit(header("Location: lista-towarow"));
?>