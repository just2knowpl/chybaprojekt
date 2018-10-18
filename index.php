<?php
include "mediators/index-mediator.php";
?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>


<h2>TUTAJ BĘDZIE STRONA GŁÓWNA DLA UŻYTKOWNIKA</h2> 
<div style="display: <?php if(checkSession(@$_SESSION['user'])) echo "none"; else echo "block";?>"><a href="register">Zarejestruj sie</a></div>
<div style="display: <?php if(checkSession(@$_SESSION['user'])) echo "none"; else echo "block";?>"><a href="login">Zaloguj sie</a></div>

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

</body>
</html>