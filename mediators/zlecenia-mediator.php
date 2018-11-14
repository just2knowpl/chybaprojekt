<?php

include 'mediators/globalFunctions.php';

//settery

function setTytul($title) {
    if(isset($title) && !empty($title) && $title != null) {
        return mysqli_real_escape_string(dbConn(),$title);
    }
    else 
        echo "Tytuł nie może być pusty!";
        return null; 
}
function setBudzet($budzetOd,$budzetDo) {
    if(isset($budzetOd) && !empty($budzetOd) && $budzetOd != null && isset($budzetDo) && !empty($budzetDo) && $budzetDo != null) {
        $budzet = ($budzetOd + $budzetDo) / 2;
        return mysqli_real_escape_string(dbConn(),$budzet);
    }
    else if($budzetOd == 0 && $budzetDo == 0) 
        return mysqli_real_escape_string(dbConn(),"Bezpłatne");
    else {
        echo "Budżet nie może pozostać pusty";
        return null;
    }
}
function setWaluta($waluta) {
    if(isset($waluta) && !empty($waluta) && $waluta != null)
        return mysqli_real_escape_string(dbConn(),$waluta);
    else 
        echo "Waluta nie może być pusta";
    return null;
}
function setCzasWyk($czasOd,$czasDo) {
    if(isset($czasOd) && !empty($czasOd) && $czasOd != null && isset($czasDo) && !empty($czasDo) && $czasDo != null) {
        $srCzas = ($czasOd + $czasDo) / 2;
        return mysqli_real_escape_string(dbConn(),$srCzas);
    }
            else 
        echo "Czas nie został podany prawidłowo.";
    return null;
}
function setOpis($opis) {
    if(isset($opis) && !empty($opis) && $opis != null)
        return mysqli_real_escape_string(dbConn(),$opis);
    else 
        echo "Opis nie został podany.";
    return null;
}
    
function potwierdzZlecenie($potwierdzenie) {
    return $potwierdzenie;
}

//dodawanie zlecenia. Funkcja sumująca

function addZlecenie($tytul,$budzet,$waluta,$czasWyk,$opis,$potw) {
    if($tytul != null && $budzet != null && $waluta != null && $czasWyk != null && $opis != null && $potw != null) {
        //sprawdzanie czy uzytkownik dodal juz zgloszenie o takim samym tytule. Mikro zabbezpieczenie anty-spamowe.
        $query = mysqli_query(dbConn(),"SELECT * FROM zlecenia WHERE user_owner = '".$_SESSION['user']."' AND oferta_tytul = '".$tytul."'");
        if(mysqli_num_rows($query) > 0) {
            echo 'Przepraszamy, nie możesz stworzyć drugi raz tego samego zgłoszenia.';
            return;
        }
        //zapytanie dodajace zlecenie
        mysqli_query(dbConn(),"INSERT INTO zlecenia (user_owner,oferta_tytul,srBudzet,waluta,srCzas,opis)
        VALUES ('".$_SESSION['user']."','".$tytul."','".$budzet."','".$waluta."','".$czasWyk."','".$opis."');");
        //sprawdzanie, czy zlecenie zostalo dodane prawidlowo
        $zlecCheck = mysqli_query(dbConn(),"SELECT * FROM zlecenia WHERE user_owner = '".$_SESSION['user']."' AND oferta_tytul = '".$tytul."'");
        if(mysqli_num_rows($zlecCheck) == 1) {
            echo "Zlecenie zostało dodane prawidłowo. Przechodzę do zlecenia.";
            $nrZlec = mysqli_query(dbConn(),"SELECT id FROM zlecenia WHERE user_owner = '".$_SESSION['user']."' AND tytul = '".$tytul."';"); 
            $idZ = mysqli_fetch_array(dbConn(),$nrZlec);
            exit(header("Location:oferty/"));
            return true;
        }
    }
    else {
        echo " Błąd aplikacji.";
    }
}

//Wyświetlanie zlecenia

function showZlecenia(/*$ilosc_zlecen, $order*/) {
    $sql = mysqli_query(dbConn(),"SELECT * FROM zlecenia ORDER BY id_zamowienia DESC");
    if(mysqli_num_rows($sql) > 0) {
        $licznik = 1;
        while($r = mysqli_fetch_assoc($sql)) {
            echo '
      <tr>
      <th scope="row">'.$licznik.'</th>
      <td><a href="szczegoly?id="'.$r['id_zamowienia'].'">'.$r['oferta_tytul'].'</a></td>
      <td>'.$r['opis'].'</td>
      <td>~'.$r['srBudzet'].' '.$r['waluta'].'</td>
      <td>~'.$r['srCzas'].' dni</td>
      <td>[niekatywne]</td>
      <td><a href="#" class="btn btn-custom btn-lg">
      <span class="glyphicon glyphicon-arrow-right"></span><a href="szczegoly?id='.$r['id_zamowienia'].'">Zobacz</a></td>
      </tr>
            ';
            $licznik++;
    }
}
}


function showSzczegolyZlecenia($id,$geti) {
    if(isset($id)) {
        $_getInfo;
        if(isset($geti)) {
            switch($geti) {
                case 'id':
                    $_getInfo = 'id_zamowienia';
                    break;
                case 'tytul':
                    $_getInfo = 'oferta_tytul';
                    break;
                case 'opis':
                    $_getInfo = 'opis';
                    break;
                case 'budzet':
                    $_getInfo = 'srBudzet';
                    break;
                case 'czas':
                    $_getInfo = 'srCzas';
                    break;
            }
        }
        if($_getInfo) {
            $find_szczegoly = mysqli_query(dbConn(),"SELECT * FROM zlecenia WHERE id_zamowienia = '".$id."'");
            if(mysqli_num_rows($find_szczegoly) > 0) {
                while($r = mysqli_fetch_assoc($find_szczegoly)) {
                    return $r[$_getInfo];
                }
            }
        }
        
    }
}
//function test() {
//    try {
//        $error = "test";
//        throw new Exception($error);
//    }
//    catch(Exception $error) {
//        echo 'Caught exception: '.$error;
//}}
?>