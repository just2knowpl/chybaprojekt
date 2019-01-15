     <?php ostatnieMiejscePobytu(); ?> 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Czarna Perła</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index">Strona Główna</a>
      </li>
        <?php
        if(!isset($_SESSION['edit']) || !$_SESSION['edit'])
            echo '
      <li class="nav-item">
        <a class="nav-link" href="dodaj-towar">Dodaj nowy towar</a>
      </li>';
          ?>
    <li class="nav-item">
        <a class="nav-link" href="lista-towarow">Zobacz wszystkie towary</a>
    </li>
    <div class="dropdown">
  <button class="btn btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Inne
  </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="nav-link" href="statystyka">Statystyki</a>
        <a class="nav-link" href="lista-towarow">Raporty</a>
        <a class="nav-link" href="dostawy">Dostawy</a>
        <a class="nav-link" href="historia">Historia zmian</a>
      </div>
    </div>
      </ul>
       <div class="dropdown">
        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell fa-lg"></i> <span style="display: <?php if(!licznikPowiadomien()) echo 'none'; else echo 'block'; ?>" class="button__badge"><?php licznikPowiadomien() ?></span></button>
          <div class="dropdown-menu p-4 text-muted" style="max-width: 300px;">
        <?php showPowiadomienia(); ?>
        </div>
        </div>
        
    <a href="panel-konfiguracyjny"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Panel konfiguracyjny</button></a>

  </div>
</nav>
     