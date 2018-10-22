<?php
include 'mediators/login-mediator.php';
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

<body>

	<?php include 'include/header.php'; ?>
	
<main>

<div class="container">
	<div class="content">
	<div class="row">
		<div class="col-auto mx-auto">
		   <form class="form" action="" class="mx-auto mt-5" method="post">
			
			<p><input type="text" name="login" placeholder='Login' required></p>
			<p><input type="password" name="password" placeholder='Hasło' required></p>
			
			<p><input type="submit" name='log' value="Zaloguj się" class="login mx-auto"></p>
		</form>
		<div class="w-100"></div>
		<p class="register">Nie masz konta? <a href="register">Zarejestruj sie!</a></p>
		<?php
		if(isset($_REQUEST['log'])) {
			if(loginUser(mysqli_real_escape_string(dbConn(),$_REQUEST['login']),md5(mysqli_real_escape_string(dbConn(),$_REQUEST['password'])))) {
                if(isset( $_SESSION['lastPage'])) {
                    exit(header("Location:". $_SESSION['lastPage']));
                    session_unset("lastPage");
                }
            exit(header("Location:index"));
            }
				
			
		}
		?>
		
		</div>
		</div>
		</div>
</div>
</main>
	
<?php include 'include/footer.php'; ?>



<script src=""></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>