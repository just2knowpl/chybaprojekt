<?php
include 'mediators/login-mediator.php';
?>
<form style="display: <?php if(checkSession(@$_SESSION['user'])) echo "block;"; else echo "none;";?>" action="" method="post">
<input type="submit" name="destroy" value="wyloguj">
</form>
<?php
    if(isset($_REQUEST['destroy'])) {
        if(checkSession(@$_SESSION['user'])) {
        session_destroy();
        echo "<script>location.reload();</script>";
        }
    }
if(checkSession(@$_SESSION['user'])) {
    echo "Użytkownik jest juz zalogowany. [Przechodze na strone główną]";
    return;
}
?>
   <form action="" method="post">
    
    <p><input type="text" name="login" placeholder='Login' required></p>
    <p><input type="password" name="password" placeholder='Hasło' required></p>
    
    <p><input type="submit" name='log' value="Zaloguj się"></p>
</form>
<p>Nie masz konta? <a href="register">Zarejestruj sie!</a></p>
<?php
if(isset($_REQUEST['log'])) {
    if(loginUser(mysqli_real_escape_string(dbConn(),$_REQUEST['login']),md5(mysqli_real_escape_string(dbConn(),$_REQUEST['password']))))
        echo "Przechodzę na stronę główną..";
    echo "<script>location.reload();</script>";
}
?>