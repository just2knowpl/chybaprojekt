<?php include 'mediator/towar-mediator.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dodawanie nowego towaru.</title>
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
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Czarna Perła</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Strona Główna <span class="sr-only">(aktualnie)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Dodaj nowy towar</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Zobacz wszystkie towary</a>
    </li>
      </ul>
  </div>
</nav>
     
     <!--Navbar end -->
      
      
       <section>
        Powrót
        <h1>Dodawanie nowego towaru</h1>
<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Firma</label>
    <input type="email" class="form-control" id="firma" placeholder="Przykład: Zara">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Rodzaj towaru</label>
    <select class="form-control" name="rodzaj">
      <option value="koszulka_d">Koszulka Damska</option>
      <option value="Koszulka_m">Koszulka Męska</option>
      <option valu="spodnie">Spodnie</option>
      <option value="akcesoria">Akcesoria</option>
      <option value="inne">Inne</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Ilość</label>
    <input type="email" class="form-control" id="ilosc" placeholder="Ilość towaru">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Dodaj towar</button>
</form>
        <?php
           addTowar(setRodzaj($_POST['rodzaj']),)
           ?>
        
        
        </section>
        
    </body>
</html>