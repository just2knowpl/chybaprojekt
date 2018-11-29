<?php
include 'mediator/general-mediator.php';
?>
<!DOCTYPE html>
<html>
    <head lang="pl">
        <title>Panel administracyjny - Czarna Perła</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="register.css" type="text/css">
        <link rel="stylesheet" href="main_page.css" type="text/css">
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

        
    </body>
    
    
</html>