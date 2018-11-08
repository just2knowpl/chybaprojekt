<header>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-custom">
  <a class="navbar-brand" href="#">Spoko Sale</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item" style="display: <?php if(checkSession(@$_SESSION['user'])) echo "none"; else echo "block";?>">
        <a class="nav-link" href="login">Zaloguj sie</a>
      </li>
      <li class="nav-item" style="display: <?php if(checkSession(@$_SESSION['user'])) echo "none"; else echo "block";?>">
        <a class="nav-link" href="register">Zarejestruj sie</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="oferty">Lista zleceń</a>
      </li>

      <li class="nav-item">
        <a class="nav-link zlecenie" href="create">Dodaj zlecenie</a>
      </li>
    </ul>
  </div>
</nav>

</header>