<?php
include '../mediator/general-mediator.php';

mysqli_query(dbConn(),"UPDATE `towar` SET `cena` = '0' WHERE `cena` IS NULL;");

exit(header("Location: ../lista-towarow.php"));
?>