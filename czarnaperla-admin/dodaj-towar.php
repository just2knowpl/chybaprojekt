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
    <div class="form-group" style="display:<?php if(isset($_SESSION['edit'])) echo "none"; else echo "block"; ?>">
    <label for="exampleFormControlInput1">Cena (za sztuke)</label>
    <input type="text" class="form-control" name="cena" placeholder="Cena za 1 sztuke" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Ilość</label>
    <input type="text" class="form-control" name="ilosc" placeholder="Ilość towaru" <?php if(!isset($_SESSION['edit'])) echo "required"; ?>>
  </div>
  <button type="submit" name='dodaj' class="btn btn-primary mb-2">Dodaj towar</button>
</form>
        <?php
        wyczyscDaneEdycji();
           if(isset($_POST['dodaj'])) {
                addTowar(setRodzaj($_POST['rodzaj']),setFirma($_POST['firma']),setIlosc($_POST['ilosc']),setCena($_POST['cena']));
               
           }
           ?>
        </section>
        	
    </body>
</html>