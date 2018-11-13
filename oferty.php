<?php
include 'mediators/zlecenia-mediator.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista zleceń</title>
    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="register.css" type="text/css">
    <link rel="stylesheet" href="main_page.css" />
    <link rel="stylesheet" href="css/oferty.css" />
</head>

    <?php include 'include/header.php'; ?>

<body>
<main>    
    <h2 class="text-center mt-4 mb-4 headzl">Lista zleceń</h2>

    <div class="container x">
    <table class="table">
  <thead class="thead-custom">
    <tr>
      <th scope="col scope"><h5><b>#</b></h5></th>
      <th scope="col scope"><h5><b>Tytuł</b></h5></th>
      <th scope="col scope"><h5><b>Skrócony opis</b></h5></th>
      <th scope="col scope"><h5><b>Budżet</b></h5></th>
      <th scope="col scope">Czas wykonania</th>
      <th scope="col scope">Liczba chętych</th>
      <th scope="col scope"><th>
    </tr>
  </thead>
  <tbody>
   <?php
      showZlecenia();
      ?>
<!--
    <tr>
      <th scope="row">1</th>
      <td>Layout sklepu internetowego</td>
      <td>Poszukuję osobę do zrobienia layout'u sklepu </td>
      <td>3000zł</td>
      <td>7 dni</td>
      <td>32</td>
      <td><a href="#" class="btn btn-custom btn-lg">
          <span class="glyphicon glyphicon-arrow-right"></span>Zobacz</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Stała wspołpraca</td>
      <td>Poszukuję front-end developera do stałej wspłółpracy</td>
      <td>4000 - 7000zł</td>
      <td>Stała praca</td>
      <td>2</td>
      <td><a href="#" class="btn btn-custom btn-lg">
          <span class="glyphicon glyphicon-arrow-right"></span>Zobacz</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Import bazy danych</td>
      <td>Poszukuje osoby, która zrobi import bazy danych</td>
      <td>200zł</td>
      <td>2h</td>
      <td>124</td>
      <td><a href="#" class="btn btn-custom btn-lg">
          <span class="glyphicon glyphicon-arrow-right"></span>Zobacz</td>
    </tr>
-->
  </tbody>
</table>
</div>




        <!--<div class="tabela-zlecen">
            
            <div class="row-main">
                
                <div>Numer</div>
                <div>Tytuł</div>
                <div class="opis">Skrócony opis</div>
                <div>Średni budżet</div>
                <div>Średni czas wykonania</div>
                <div>Chętni</div>
                
            </div>
            <div class="wiersz">
                <div>1</div>
                <div>Tytuł testowy</div>
                <div class="opis">Krótki opis test test test test lorem costam</div>
                <div>~3.000 zł</div>
                <div>~3 dni</div>
                <div>32</div>
                
            </div>
            
        </div>-->
</main>


<script src=""></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>