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
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="register.css" type="text/css">
        <link rel="stylesheet" href="main_page.css" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body>
        
    <!-- navbar start -->
    <?php include 'include/header.php' ?>
    <!--Navbar end -->
    
    <h1>Menadżer dostaw</h1>
    
    <h2>Najbliższa dostawa za: x dni</h2>
    
    <form>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="forma_dostawa">Firma dostarczająca</label>
      <input type="text" class="form-control" id="firma_dostawa" placeholder="Nazwa firmy" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="cena_dostawa">Cena dostawy</label>
      <input type="number" class="form-control" id="cena_dostawa" placeholder="Cena dostawy" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="data_dostawa">Data</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3"><i class="far fa-calendar"></i></span>
        </div>
        <input type="date" class="form-control" id="data_dostawa" aria-describedby="data_dostawa" required>
      </div>
    </div>
  </div>
  
  <button class="btn btn-primary" type="submit">Wyślij</button>
</form>
    
       <?php

        ?>
        
    </body>
    
    
</html>