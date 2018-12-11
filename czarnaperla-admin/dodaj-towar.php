<?php include 'mediator/towar-mediator.php'; 
?>
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
      
        <section class="<?php if(dodajWidoczny()) echo "visible"; else echo "invisible"; ?>">
            
            
        <div class="alert alert-warning" role="alert">
          Wystąpił błąd. Nie możesz dodać nowego towaru ponieważ nie posiadasz w swojej bazie żadnej firmy. <a href='lista-firm'>Dodaj nową firmę</a>, aby uzyskać dostęp do utworzenia nowego towaru.
        </div>
            
        </section>
        
        <section style="display:<?php if(dodajWidocznyRodzaj()) echo "block"; else echo "none"; ?>">
            
            
        <div class="alert alert-warning" role="alert">
          Wystąpił błąd. Nie możesz dodać nowego towaru ponieważ nie posiadasz w swojej bazie żadnego <strong>rodzaju towaru.</strong> <a href='lista-rodzajow'>Dodaj nowy rodzaj towaru</a>, aby uzyskać dostęp do utworzenia nowego towaru.
        </div>
            
        </section>
        
       <section class="<?php if(!dodajWidoczny() && !dodajWidocznyRodzaj()) echo "visible"; else echo "invisible"; ?>">
        <h1>Dodawanie nowego towaru</h1>
           <?php 
    if(isset($_SESSION['edit']) && $_SESSION['edit'] == true)
    echo '<div class="alert alert-warning" role="alert">
          Tryb edycji aktywny
          </div>'; 
           ?>
<form action="" method="post">

<div class="form-group">
    <label for="exampleFormControlSelect1">Firma</label>
    <select class="form-control" name="firma" <?php if(isset($_SESSION['edit']) && $_SESSION['edit']) echo "readonly"; ?> required>
        <?php
        if(isset($_SESSION['rodzaj']))
            wypiszFirmySelect($_SESSION['firma']);
        wypiszFirmySelect(null); ?>
    </select>
  </div>

  <div class="form-group">
    <label>Rodzaj towaru</label>
    <select class="form-control" name="rodzaj" <?php if(isset($_SESSION['edit']) && $_SESSION['edit']) echo "readonly"; ?> required>
     <?php
        if(isset($_SESSION['rodzaj']))
            wypiszRodzajeSelect($_SESSION['rodzaj']);
        wypiszRodzajeSelect(null); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Ilość</label>
    <input type="text" class="form-control" name="ilosc" placeholder="Ilość towaru" required>
  </div>
  <button type="submit" name='dodaj' class="btn btn-primary mb-2">Dodaj towar</button>
</form>
        <?php
        wyczyscDaneEdycji();
           if(isset($_POST['dodaj'])) {
                addTowar(setRodzaj($_POST['rodzaj']),setFirma($_POST['firma']),setIlosc($_POST['ilosc']));
               
           }
           ?>
        
        
        </section>
        
    </body>
</html>