<?php
include 'mediators/login-mediator.php';

    if(checkSession(@$_SESSION['user'])) {
        exit(header("Location:index"));
    }
    ?>
<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="KS">
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="register.css" type="text/css">

</head>
<!--TODO: Zrób walidacje w js
* Nick na minimum 4 znaki,
* email ma wbudowana walidacje w required,
* hasło minimum 5 znaków, musi zawierać chociaż jedną cyfre..
* zrób funkcje w js która wyswietla okienko. W argumencie funkcji ma byc tresc komunikatu 
* opraw ładnie graficznie strone :)

!* NIE RUSZAJ PHP'A-->
<body>

<header>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-custom">
  <a class="navbar-brand" href="#">Spoko Sale</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

</header>	

<main>
	<div class="row">
		<div class="col-auto mx-auto">
			<div class="container pt-5">
				<form class="mb-5" action="" method="post">
				<p class="txt nick">Nick:</p><input type="text" name='nick' placeholder="Nazwa użytkownika" required>
				<p class="txt">Mail:</p><input type="email" name="mail" placeholder="Adres Email" required>
				<p class="txt">Hasło:</p><input type="password" name="pass" placeholder="Hasło" required>
				<p class="txt">Potwórz hasło:</p><input type="password" name="pass2" placeholder="Potwórz hasło" required>
				<div class="w-100"></div>
				<label><p class="txt chbox"><input type="checkbox" required>Wyrażam zgode na..   </p></label>
				<p class="txt"><input type="submit" name='sub' value="Stwórz konto" required></p>
				</form>
			</div>	
		</div>
	</div>
</main>	

<?php
    if(isset($_REQUEST['sub'])) {     registerUser(setUsername($_REQUEST['nick']),setPassword($_REQUEST['pass'],$_REQUEST['pass2']),setEmail($_REQUEST['mail']));

        
    }
?>


<footer>

	<div class="row">
		<div class="col-auto mx-auto">
			<h5 class="info">Informacje</h5>
			<p>Lorem ipsum dolor sit amet, consectetur</p>
			<p>Curabitur facilisis tortor et facilisis placerat</p>
			<p>Fusce a tristique arcu, et fermentum nunc</p>
			<p>Aliquam luctus mollis mauri</p>
		</div>
		<div class="col-auto mx-auto">
			<a href=""><img class="img-fluid app" src="img/andoridapp.png" alt="AnroidApp" ></a>
		</div>
		<div class="col-auto mx-auto">
			
		</div>
	</div>

</footer>


<script src=""></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>