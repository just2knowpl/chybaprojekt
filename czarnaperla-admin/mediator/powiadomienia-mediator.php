<?php


function checkCzySaPowiadomienia() {
    $sql_chk = mysqli_query(dbConn(),"SELECT * FROM powiadomienia");
    if(mysqli_num_rows($sql_chk) > 0) {
        return true;
    }
    else {
        return false;
    }
}

function showPowiadomienia() {
    if(checkCzySaPowiadomienia()) {
        $sql_chk = mysqli_query(dbConn(),"SELECT * FROM powiadomienia");
        $counter = 0;
        while($r=mysqli_fetch_assoc($sql_chk)) {
            echo '<a class="powiadomienie" href="deletePowiadomienie.php?id='.$r['id'].'"<p class="align-middle"> <i class="fas fa-'.decodeTypPowiadomienia($r['typ']).'-circle icon_'.decodeTypPowiadomienia($r['typ']).'"></i>'.$r['tresc'].'</p></a>';
            if(++$counter != mysqli_num_rows($sql_chk))
                echo '<div class="dropdown-divider"></div>';
        }
    }
            else {
        echo "Brak powiadomień.";
    }
    
}

function licznikPowiadomien() {
    if(checkCzySaPowiadomienia()) {
        $sql_chk = mysqli_query(dbConn(),"SELECT * FROM powiadomienia");
        echo mysqli_num_rows($sql_chk);
        return true;
    }
    return false;
}

function decodeTypPowiadomienia($typ) {
//    0 - info
//    1 - uwaga
//    2 - blad
    switch($typ) {
        case 0:
            return "info";
            break;
        case 1:
            return "question";
            break;
        case 2:
            return "exclamation";
            break;
    }
}

function dodajPowiadomienie() {
    
}

//Wywoływanie powiadomień

function executeMaloTowaruNaStanie($firma,$towar,$ilosc) {
    echo "<script>console.log('test');</script>";
    $tresc = "Wykryto małą ilość towaru ".$firma." - ".$towar."(".$ilosc.") na magazynie.";
    mysqli_query(dbConn(),"INSERT INTO powiadomienia (typ,tresc) VALUES ('1','".$tresc."')");
}

function executeUtworzonoNowyRodzajTowaru() {
    
}

function executeUtworzonoNowaFirme() {
    
}

function executeRandomMessage($text,$typ) {
    
}


?>