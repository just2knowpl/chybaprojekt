<?php 
include 'mediators/zlecenia-mediator.php';

if(!checkSession(@$_SESSION['user'])) {
    echo "Aby dodać nową ofertę, musisz posiadać konto na naszym portalu. <a href='login'>Zaloguj się</a>";
    $_SESSION['lastPage'] = basename(__FILE__);
    return;
}

?>
<h2>Tworzenie nowego zlecenia</h2>
<form action="" method="post">
    <p><input type="text" name="zlecenieTytul" placeholder="Tytuł oferty"></p>
    <p><input type="text" name="zlecenieBudzetOd" placeholder="Twój budżet od.."> <!-- Walidacja - cyfry -->
    <input type="text" name="zlecenieBudzetDo" placeholder="Twój budżet do.."></p> <!-- Walidacja - cyfry -->
    <p>Waluta: <select name='waluta'>
        <option value="zl">zł</option>
        <option value="usd">$</option>
        <option value="eur">€</option>
    </select></p> 
    <p><input type="text" name="czasWykonaniaOd" placeholder="Czas wykonania od.."> <!-- Walidacja - cyfry -->
    <input type="text" name="czasWykonaniaDo" placeholder="Czas wykonania do.."> dni</p>  <!-- Walidacja - cyfry -->
    <p><textarea name="opisZlecenia" placeholder="Opis zlecenia"></textarea></p>
    <input type="submit" value="opublikuj zlecenie">
</form>
<?php
    
?>