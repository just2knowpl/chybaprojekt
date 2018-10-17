<?php
include 'mediators/login-mediator.php';
?>
<!--TODO: Zrób walidacje w js
* Nick na minimum 4 znaki,
* email ma wbudowana walidacje w required,
* hasło minimum 5 znaków, musi zawierać chociaż jedną cyfre..
* zrób funkcje w js która wyswietla okienko. W argumencie funkcji ma byc tresc komunikatu 
* opraw ładnie graficznie strone :)

!* NIE RUSZAJ PHP'A-->
<form action="" method="post">
<p>Nick:</p><input type="text" name='nick' placeholder="Nazwa użytkownika" required>
<p>Mail:</p><input type="email" name="mail" placeholder="Adres Email" required>
<p>Hasło:</p><input type="password" name="pass" placeholder="Hasło" required>
<p>Potwórz hasło:</p><input type="password" name="pass2" placeholder="Potwórz hasło" required>
<p><input type="checkbox" required>Wyrażam zgode na..   </p>
<p><input type="submit" name='sub' value="Stwórz konto" required></p>
</form>
<?php
    if(isset($_REQUEST['sub'])) {     registerUser(setUsername($_REQUEST['nick']),setPassword($_REQUEST['pass'],$_REQUEST['pass2']),setEmail($_REQUEST['mail']));

        
    }
?>