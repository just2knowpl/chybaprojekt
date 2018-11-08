<?php
include "mediators/index-mediator.php";
?>
<!DOCTYPE html>
<html>
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
<body>

<?php include 'include/header_main_page.php'; ?>

<h2>TUTAJ BĘDZIE STRONA GŁÓWNA DLA UŻYTKOWNIKA</h2> 
<!--<div style="display: <?php if(checkSession(@$_SESSION['user'])) echo "none"; else echo "block";?>"><a href="register">Zarejestruj sie</a></div>
<div style="display: <?php if(checkSession(@$_SESSION['user'])) echo "none"; else echo "block";?>"><a href="login">Zaloguj sie</a></div>-->

<form style="display: <?php if(checkSession(@$_SESSION['user'])) echo "block;"; else echo "none;";?>" action="" method="post">
		<input type="submit" name="destroy" value="wyloguj">
		</form>
		<?php
			if(isset($_REQUEST['destroy'])) {
				if(checkSession(@$_SESSION['user'])) {
				unset($_SESSION['user']);
                exit(header("Location:index"));
				}
			}
    ?>
<!--<div><a href="oferty">Lista zleceń</a></div>
<div><a href="create">Dodaj nową ofertę</a></div>-->




<!--<?php include 'include/footer.php'; ?>-->


<script src=""></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>