<?php
include 'mediator/towar-mediator.php';

$id = $_GET['id'];

$get_dane = mysqli_query(dbConn(),"SELECT * FROM towar WHERE id = ".$id);
if(mysqli_num_rows($get_dane) == 0) {
    exit(header("Location: lista-towarow"));
}
$r=mysqli_fetch_assoc($get_dane);
$aktualna_cena = $r['cena'];

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Szczegóły</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body>
    <p>Aktualna cena: <?php echo "<strong>".$aktualna_cena." zł</strong>"; ?></p>
<form action="" method="post">
    <div class="form-group">
    <label for="exampleFormControlInput1">Zmiana ceny towaru za sztukę</label>
    <input type="text" class="form-control" name="nowa_ilosc" placeholder="Nowa cena" <?php if(!isset($_SESSION['edit'])) echo "required"; ?>>
    </div>
    <a href="lista-towarow"><button type="button" class="btn btn-secondary" data-dismiss="modal" >Wyjdź</button></a>
        <input type="submit" name="zmien_cene" class="btn btn-primary" value="Zmień">
</form>
   <?php
        if(isset($_POST['zmien_cene'])) {
            zmianaCenyTowaru(setNowaCenaTowaru($_POST['nowa_ilosc'],$id),$id); 
        }
        ?>
    <h2>Historia zmian towaru "."</h2>
    </body>
</html>