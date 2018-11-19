<?php include 'mediator/towar-mediator.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dodawanie nowego towaru</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
    </head>
    <body>
      
      <!-- navbar start -->
        <?php include 'include/header.php' ?>
     <!--Navbar end -->
      
      
       <section>
        <h1>Dodawanie nowego towaru</h1>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Firma</label>
    <input type="text" class="form-control" name="firma" placeholder="Przykład: Zara">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Rodzaj towaru</label>
    <select class="form-control" name="rodzaj">
      <option value="koszulka_d">Koszulka Damska</option>
      <option value="Koszulka_m">Koszulka Męska</option>
      <option value="spodnie">Spodnie</option>
      <option value="akcesoria">Akcesoria</option>
      <option value="inne">Inne</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Ilość</label>
    <input type="text" class="form-control" name="ilosc" placeholder="Ilość towaru">
  </div>
  <button type="submit" name='dodaj' class="btn btn-primary mb-2">Dodaj towar</button>
</form>
        <?php
           if(isset($_POST['dodaj']))
                addTowar(setRodzaj($_POST['rodzaj']),setFirma($_POST['firma']),setIlosc($_POST['ilosc']));
           ?>
        
        
        </section>
        
    </body>
</html>