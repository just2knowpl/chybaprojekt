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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
        
    <!-- navbar start -->
    <?php include 'include/header.php' ?>
    <!--Navbar end -->
        <h1>Lista posiadanych firm w bazie</h1>
<?php wyswietlFirmy() ?>
        
        
        <h2>Dodaj nową firme</h2>

        <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nazwa firmy</label>
    <input type="text" class="form-control" name='firmaNowa' placeholder="Wpisz nazwę nowej firmy" required>
  </div>
  <button type="submit" class="btn btn-primary btn btn-success">Dodaj</button>
</form>           
<?php
    if(isset($_POST['firmaNowa'])) {
        dodajFirmy(nowaFirmaValid($_POST['firmaNowa']));
    }
    ?>
    
    </body>
    
    
</html>