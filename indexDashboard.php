<?php
include 'mediators/admin-dashboard-mediator.php';
if(@!checkSession($_SESSION['user'])) {
    echo "Nie jesteś zalogowany. Nie masz prawa przeglądać tej strony"; 
    echo "<a href='login'>Zaloguj sie</a>";
    return;
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css" type="text/css">

</head>

<body>
<main>
    
	<header>
		<nav class="navbar navbar-dark bg-dark">
					<i class="fas fa-2x x5 fa-bars open" style="cursor: pointer; color: #efefef; margin-bottom: 2px"></i>
			<h6><?php echo getUser(@$_SESSION['user']);?><i class="fas fa-caret-down arrow" style="margin-top: 5px"></i></h6> 
		</nav>
	</header>

	
	<div id="mySidenav" class="sidenav">
		<div class="ranga">
			<h5>Admin/Moderator</h5>
		</div>
		  <i class="fas fa-times closebtn"></i>
		  <a href="#">About<i class="fas fa-angle-left" style="float: right; line-height: 25px; margin-right: 10px;"></i></a>
		  <a href="#">Services<i class="fas fa-angle-left" style="float: right; line-height: 25px; margin-right: 10px;"></i></a>
		  <a href="#">Clients<i class="fas fa-angle-left" style="float: right; line-height: 25px; margin-right: 10px;"></i></a>
		  <a href="#">Contact<i class="fas fa-angle-left" style="float: right; line-height: 25px; margin-right: 10px;"></i></a>
		  <div style="clear: both;"></div>
	</div>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>





</main>


<script src="jquery-3.3.1.min.js"></script>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</body>
</html>