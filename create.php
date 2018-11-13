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
    <p><input type="text" name="zlecenieTytul" placeholder="Tytuł oferty" required></p>
    <p><input type="text" name="zlecenieBudzetOd" placeholder="Twój budżet od.. required"> <!-- Walidacja - cyfry -->
    <input type="text" name="zlecenieBudzetDo" placeholder="Twój budżet do.." required></p> <!-- Walidacja - cyfry -->
    <p>Waluta: <select name='waluta' required>
        <option value="zl">zł</option>
        <option value="usd">$</option>
        <option value="eur">€</option>
    </select></p> 
    <p><input type="text" name="czasWykonaniaOd" placeholder="Czas wykonania od.." required> <!-- Walidacja - cyfry -->
    <input type="text" name="czasWykonaniaDo" placeholder="Czas wykonania do.." required> dni</p>  <!-- Walidacja - cyfry -->
    <p><textarea name="opisZlecenia" placeholder="Opis zlecenia" required></textarea></p>
    <p>Regulamin jakiśtam<input type="checkbox" name="regulamin" required></p>
    <p>Wysyłaj informację dotyczące tego zgłoszenia na mojego maila. <input type="checkbox" name="infMailZlec"></p>
    <input type="submit" name="crZlec" value="opublikuj zlecenie">
    
</form>
<?php
if(isset($_REQUEST['crZlec']))
    addZlecenie(setTytul($_REQUEST['zlecenieTytul']),setBudzet($_REQUEST['zlecenieBudzetOd'],$_REQUEST['zlecenieBudzetDo']),setWaluta($_REQUEST['waluta']),setCzasWyk($_REQUEST['czasWykonaniaOd'],$_REQUEST['czasWykonaniaDo']),setOpis($_REQUEST['opisZlecenia']),potwierdzZlecenie($_REQUEST['regulamin']));
        
?>