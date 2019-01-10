<?php
include 'mediator/general-mediator.php';
include 'mediator/powiadomienia-mediator.php';
?>
<!DOCTYPE html>
<html>
    <head lang="pl">
        <title>Panel administracyjny - Czarna Perła</title>
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
        
    <!-- navbar start -->
    <?php include 'include/header.php' ?>
    <!--Navbar end -->
        
<div class="card text-center">
  <div class="card-body">
    <h5 class="card-title"><strong>Lista firm</strong></h5>
    <p class="card-text">Zarządzanie listą firm do których można przypisać towar.</p>
    <a href="lista-firm" class="btn btn-primary">Przejdź</a>
  </div>
</div>
        <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title"><strong>Lista rodzajów towarów</strong></h5>
    <p class="card-text">Zarządzanie rodzajami towarów.</p>
    <a href="lista-rodzajow" class="btn btn-primary">Przejdź</a>
  </div>
</div>
         <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title"><strong>Lista zmian w aplikacji</strong></h5>
    <p class="card-text">Change log - lista ostatnich zmian</p>
    <a href="lista-zmian" class="btn btn-primary">Przejdź</a>
  </div>
</div>
         <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title"><strong>Wywoływanie niestandardowego powiadomienia</strong></h5>
    <p class="card-text">Narzędzie wykorzystywane do wysłania globalnego powiadomienia (dzwoneczek)</p>
    <a href="wyslij-powiadomienie" class="btn btn-primary">Przejdź</a>
  </div>
</div>
         <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title"><strong>Napraw dane - ceny</strong></h5>
    <p class="card-text">Narzędzie automatyczne. Naprawianie danych przy cenie związanych z napisem "null"</p>
    <a href="skrypty/ilosc-naprawa.php" class="btn btn-primary">Użyj</a>
  </div>
</div>

        
    </body>
    
    
</html>