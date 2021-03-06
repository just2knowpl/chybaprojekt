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
<link rel="stylesheet" href="main_page.css" type="text/css">

</head>
<!--TODO: Zrób walidacje w js
* Nick na minimum 4 znaki,
* email ma wbudowana walidacje w required,
* hasło minimum 5 znaków, musi zawierać chociaż jedną cyfre..
* zrób funkcje w js która wyswietla okienko. W argumencie funkcji ma byc tresc komunikatu 
* opraw ładnie graficznie strone :)

!* NIE RUSZAJ PHP'A-->
<body>

<?php include 'include/header.php'; ?>

<main>
<div class="container">
	<div class="row">
		<div class="col-auto mx-auto">
			<div class="content">
				<form class="mb-5 form_reg" action="" method="post">
				<p class="txt nick">Nick:</p><input type="text" name='nick' placeholder="Nazwa użytkownika" required>
				<p class="txt">Mail:</p><input type="email" name="mail" placeholder="Adres Email" required>
				<p class="txt">Hasło:</p><input type="password" name="pass" placeholder="Hasło" required>
				<p class="txt">Potwórz hasło:</p><input type="password" name="pass2" placeholder="Potwórz hasło" required>
				<div class="w-100"></div>
				<label><p class="txt chbox"><input type="checkbox" required>Wyrażam zgode na oddanie wszystkich moich pieniędzy oraz dożywotnie przelewy na nasze konto bankowe w wysokości 34 tyś. złotych   </p></label>
				<p class="txt"><input type="submit" name='sub' value="Stwórz konto" required></p>
				</form>
			</div>	
		</div>
	</div>
</div>	
</main>	

<?php
    if(isset($_REQUEST['sub'])) {     registerUser(setUsername($_REQUEST['nick']),setPassword($_REQUEST['pass'],$_REQUEST['pass2']),setEmail($_REQUEST['mail']));

        
    }
?>


<?php include 'include/footer.php'; ?>


<script src=""></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>