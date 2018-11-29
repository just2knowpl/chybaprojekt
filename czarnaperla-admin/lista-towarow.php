<?php include 'mediator/towar-mediator.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lista towarów</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script>
        var id;
        var ilosc;
        
            function setId(_id) {
                this.id = _id;
            }
            function setIlosc(_ilosc) {
                this.ilosc = _ilosc;
            }
            
            function przejdz(il=null) {
            setIlosc(il);
            if(ilosc == null) {
                alert("Ilość nie może być pusta.");
                return;
            }
            var ilosc = document.getElementById('ilosc_do_usuniecia').value;
            console.log('odejmij.php?id='+id+'&ilosc='+ilosc);
           window.location.href = 'odejmij.php?id='+id+'&ilosc='+ilosc;
           //window.location.href = 'odejmij';
            
            }
        </script>

    </head>
    <body>
      
      <!-- navbar start -->
        <?php include 'include/header.php' ?>
     <!--Navbar end -->
       
       <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Usuwanie towaru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Proces odejmowania towaru. Ile sztuk towaru chcesz usunąć?
        <form method="get">
  <div class="form-group">
    <input type="number" class="form-control" name="ilosc_usun" id="ilosc_do_usuniecia" placeholder="Wpisz ilość">
  </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Wyjdź</button>
        <button type="button" name="usun_zapisz" class="btn btn-primary" onClick="przejdz(getElementById('ilosc_do_usuniecia').value)">Usuń</button>
        <?php
//            if(isset($_GET['usun_zapisz'])) {
//                if(isset($_GET['ilosc_do_usuniecia']) && $_GET['ilosc_do_usuniecia'] > 0) {
//                    echo "<script>window.location.href = 'odejmij.php?id='+id;</script>";
//                    header("Location: odejmij.php?id=+");//"&ilosc=".$_GET['ilosc_do_usuniecia']);
//                }
//            }
        ?>
      </div>
    </div>
  </div>
</div>
       
       
       
<ul class="nav justify-content-end">
<!--
  <li>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
   </li>
-->
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Szukana fraza" aria-label="Search" value="<?php if(isset($_SESSION['wysz'])) echo $_SESSION['wysz']; ?>" name="wyszukiwarka">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="wyszukaj">Wyszukaj</button>
    </form>
</ul>
       
        <?php 
        if(isset($_POST['wyszukaj']))
        wyswietlTowar(wyszukiwanieTowaru($_POST['wyszukiwarka'])); 
        else 
            wyswietlTowar();?>
    </body>
</html>