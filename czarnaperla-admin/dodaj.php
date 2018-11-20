<?php

include 'mediator/general-mediator.php';

$id = $_GET['id'];

$query = mysqli_query(dbConn(),"SELECT * FROM towar WHERE id = ".$id);

if(mysqli_num_rows($query) > 0) {
    $r = mysqli_fetch_assoc($query);
    
    $_SESSION['rodzaj'] = $r['rodzaj'];
    $_SESSION['firma'] = $r['firma'];
    $_SESSION['edit'] = true;
    
    exit(header("Location: dodaj-towar"));
}
else {
    exit(header("Location: lista-towarow"));
}
?>