<?php
include 'mediator/towar-mediator.php';
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
        
        
        <form method="post">
  <div class="form-group">
    <label for="rodzajTowaru">Podaj nowy rodzaj towaru</label>
    <input type="text" class="form-control" name="nRodzaj" id="rodzajTowaru"  placeholder="Rodzaj towaru">
  </div>
  <button type="submit" name="akc_rodz" class="btn btn-primary">Dodaj</button>
</form>
    <?php 
    
    if(isset($_POST['akc_rodz'])) {
        dodajRodzaj(nowyRodzajValid($_POST['nRodzaj']));
    }
    
    ?>    
    </body>
    
    
</html>