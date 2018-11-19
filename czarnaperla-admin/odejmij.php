<?php

include 'mediator/general-mediator.php';

$id = $_GET['id'];

$zap = mysqli_query(dbConn(),"SELECT ilosc FROM towar WHERE id=".$id);

if(mysqli_num_rows($zap) > 0) {
    $r = mysqli_fetch_assoc($zap);
    $ilosc = $r['ilosc'] - 1;
    mysqli_query(dbConn(),"UPDATE towar SET ilosc = ".$ilosc." WHERE id = ".$id);
    exit(header("Location: lista-towarow"));
}
?>