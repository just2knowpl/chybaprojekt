<?php

include 'mediator/general-mediator.php';

$id = $_GET['id'];

$zap = mysqli_query(dbConn(),"SELECT * FROM towar WHERE id=".$id);

if(mysqli_num_rows($zap) > 0) {
    $r = mysqli_fetch_assoc($zap);
    $ilosc = $r['ilosc'] - 1;
    $ilosc_usunietych = $r['ilosc_usunietych'] + 1;
    mysqli_query(dbConn(),"UPDATE towar SET ilosc = ".$ilosc.", ilosc_usunietych = ".$ilosc_usunietych." WHERE id = ".$id);
    //mysqli_query(dbConn(),"UPDATE towar SET ilosc_usunietych = ".$ilosc_usunietych." WHERE id=".$id);
    exit(header("Location: lista-towarow"));
}
?>