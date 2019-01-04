<?php 
include 'mediator/general-mediator.php';

$id = $_GET['id'];

mysqli_query(dbConn(),"DELETE FROM powiadomienia WHERE id = ".$id);
$path = $_SESSION['ostatniaStrona'];
//echo "<script>window.location.href = '".$_SESSION['ostatniaStrona']."';</script>"
exit(header("Location: ".$_SESSION['ostatniaStrona']));
?>