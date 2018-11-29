<?php
include 'general-mediator.php';

//Dodawanie towaru.

//settery

function setRodzaj($rodzaj) {
    if(isset($rodzaj)) 
        return mysqli_real_escape_string(dbConn(),$rodzaj);
    echo " Proszę podać towar. ";
    return null;
}
function setFirma($producent) {
    if(isset($producent))
        return mysqli_real_escape_string(dbConn(),$producent);
    echo " Proszę wybrać firmę. ";
    return null;
}
function setIlosc($ilosc) {
    if(isset($ilosc)) {
        if($ilosc > 0) {
            return mysqli_real_escape_string(dbConn(),$ilosc);
        }
        else {
            echo "Ilość nie może być mniejsza od 1";
            return null;
        }
    }
    echo "Błędna ilość.";
    return null;
}

function rodzajTranslate($rodzaj) {
    $translateRodzajQuery = mysqli_query(dbConn(),"SELECT * FROM rodzaje WHERE value='".$rodzaj."'");
    if(mysqli_num_rows($translateRodzajQuery) > 0) {
        $r = mysqli_fetch_assoc($translateRodzajQuery);
        return str_replace("_"," ",strtoupper($r['value']));
    }
    else {
        echo "niezidentyfikowany typ towaru";
    }
    
    
    
    switch($rodzaj) {
        case 'spodnie':
            return "Spodnie";
            break;
        case 'koszulka_d':
            return "Koszulka damska";
            break;
        case 'koszulka_m':
            return "Koszulka męska";
            break;
        case 'akcesoria':
            return "Akcesoria";
            break;
        case 'inne':
            return "Inne";
            break;
        default:
            return "Niezdefiniowany typ towaru";
    }
}

function nowaFirmaValid($firma) {
    if(!empty($firma) && $firma != null) {
        $chcqr = mysqli_query(dbConn(),"SELECT * FROM firmy WHERE nazwa = '".$firma."'");
        if(mysqli_num_rows($chcqr) == 0) {
            return mysqli_real_escape_string(dbConn(),$firma);
        }
        else {
            echo '<div class="alert alert-danger" role="alert">
                   Taka firma istnieje już w bazie.
                  </div>';
            return null;
        }
        
    }
    else {
        echo '<div class="alert alert-danger" role="alert">
                Pole "firma" nie może pozostac puste!
              </div>';
        return null;
    }
}

function nowyRodzajValid($rodzaj) {
    if(!empty($rodzaj) && $rodzaj != null) {
        $chcqr = mysqli_query(dbConn(),"SELECT * FROM rodzaje WHERE rodzaj = '".$rodzaj."'");
        if(mysqli_num_rows($chcqr) == 0) {
            return mysqli_real_escape_string(dbConn(),$rodzaj);
        }
        else {
            echo '<div class="alert alert-danger" role="alert">
                   Taki rodzaj towaru istnieje już w bazie.
                  </div>';
            return null;
        }
        
    }
    else {
        echo '<div class="alert alert-danger" role="alert">
                Pole "rodzaj towaru" nie może pozostać puste!
              </div>';
        return null;
    }
}

//czyszczenie informacji o edycji pola
function wyczyscDaneEdycji() {
    unset($_SESSION['firma']);
    unset($_SESSION['rodzaj']);
    unset($_SESSION['edit']);
    unset($_SESSION['wysz']); 
}

//funkcja wykonawcza

function addTowar($rodzaj, $producent, $ilosc) {
    if($rodzaj != null && $producent != null && $ilosc != null) {
        $check_sql = mysqli_query(dbConn(),"SELECT * FROM towar WHERE rodzaj = '".$rodzaj."' AND firma = '".$producent."'");
         if(mysqli_num_rows($check_sql) > 0) {
             $nowa_ilosc;
                $r = mysqli_fetch_assoc($check_sql);
                $nowa_ilosc = $r['ilosc'] + $ilosc;
                $nowa_ilosc_ogolna = $r['ilosc_ogolna'] + $ilosc;
                mysqli_query(dbConn(),"UPDATE towar SET ilosc = '".$nowa_ilosc."' WHERE rodzaj = '".$rodzaj."' AND firma = '".$producent."'");
                mysqli_query(dbConn(),"UPDATE towar SET ilosc_ogolna = '".$nowa_ilosc_ogolna."' WHERE rodzaj = '".$rodzaj."' AND firma = '".$producent."'");
         }
        else {
        mysqli_query(dbConn(),"INSERT INTO towar (rodzaj,firma,ilosc,ilosc_ogolna) VALUES ('".$rodzaj."','".$producent."','".$ilosc."','".$ilosc."')"); 
        }
    }
    exit(header("Location: lista-towarow"));
}



//wyswietlanie wyników

function wyswietlTowar($wyszukiwarka = null) {
    $sql;
    if($wyszukiwarka != null) {
        $sql = $wyszukiwarka; 
    }
    else
        $sql = mysqli_query(dbConn(),"SELECT * FROM towar");
        if(mysqli_num_rows($sql) > 0) {
            
            $ilosc_ogolna = 0;
            $ilosc_stan = 0;
            $ilosc_usunietych = 0;
            
            echo '
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Firma</th>
                  <th scope="col">Rodzaj towaru</th>
                  <th scope="col">Ilość</th>
                  <th scope="col">Stan całościowy</th>
                  <th scope="col">Ilość usuniętego towaru</th>
                  <th scope="col" style="color: red;">Odejmij</th>
                  <th><spam style="color:green;">Dodaj</span></th>
                </tr>
              </thead>
              <tbody>
            ';
            
            while($r=mysqli_fetch_assoc($sql)) {
                echo '
                
                <tr>
                  <td>'.str_replace("_"," ",strtoupper($r['firma'])).'</td>
                  <td>'.rodzajTranslate($r['rodzaj']).'</td>
                  <td>'.$r['ilosc'].'</td>
                  
                <td> '.$r['ilosc_ogolna'].' </td>
                
                <td> '.$r['ilosc_usunietych'].' </td>
                ';
                 if($r['ilosc'] <= 0)
                    echo '<td> </td>';
                else
                  echo '<td><button type="button" class="btn btn-danger" id="'.$r['id'].'" data-toggle="modal" data-target="#exampleModalCenter" onClick="setId(this.id)"><i class="fas fa-minus"></i></button></td>';
                echo '
                  <td><a href="dodaj.php?id='.$r['id'].'"><button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button></a>
                  </td>';
                echo '
                </tr>
                
                
                ';
                $ilosc_stan += $r['ilosc'];
                $ilosc_ogolna += $r['ilosc_ogolna'];
                $ilosc_usunietych += $r['ilosc_usunietych'];
            }
            $strata = $ilosc_ogolna - ($ilosc_stan + $ilosc_usunietych);
            echo '
            <tr>
                <td><strong>Podsumowanie:</td>
                <td></td>
                <td><strong>'.$ilosc_stan.' szt.</strong></td>
                <td><strong>'.$ilosc_ogolna.' szt.</strong></td>
                <td><strong>'.$ilosc_usunietych.' szt.</strong></td>
                <td><strong> </strong></td>
                <td><strong> </strong></td>
              </tbody>
            </table>
            ';
        }
    else 
        echo " Nie znaleziono rekordów. <a href='dodaj-towar'>Dodaj nowy towar</a>";
        return null;
}

//Wysweitlanie aktualnej listy frim

function wyswietlFirmy() {
    $sq = mysqli_query(dbConn(),"SELECT * FROM firmy");
    if(mysqli_num_rows($sq) > 0) {
        while($r = mysqli_fetch_assoc($sq)) {
    echo '<div class="shadow p-3 mb-5 bg-white rounded">'.$r['nazwa'].'</div>';
        }
    }
    else {
        echo '<div class="alert alert-primary" role="alert">
                Nie posiadasz firm w bazie danych. Dodaj nową za pomocą formularza znajdującego się poniżej.
              </div>';
    }
}

function dodajFirmy($firma) {
    if($firma != null) {
        //$value = strtolower(str_replace(" ","_",$firma));
        $value = strtolower(str_replace(" ","_",$firma));
        mysqli_query(dbConn(),"INSERT INTO firmy(nazwa,value,data_dodania) VALUES('".$firma."','".$value."','".date("Y-m-d")."')");
        $qr = mysqli_query(dbConn(),"SELECT * FROM firmy WHERE nazwa = '".$firma."'");
        if(mysqli_num_rows($qr) > 0) {
            echo '<div class="alert alert-success" role="alert">
                    Pomyślnie dodano nową firmę '.$firma.' do bazy danych.
                  </div> ';
            exit(header("Location: lista-firm"));
        }
    }
}
function wypiszFirmySelect() {
    $pobierz = mysqli_query(dbConn(),"SELECT * FROM firmy");
    if(mysqli_num_rows($pobierz) > 0) {
        while($r = mysqli_fetch_assoc($pobierz)) {
            echo '
            <option value="'.$r['value'].'">'.$r['nazwa'].'</option>
            ';
        }
    }
}
function dodajWidoczny() {
    $pobierz = mysqli_query(dbConn(),"SELECT * FROM firmy");
    if(mysqli_num_rows($pobierz) > 0)
        return false;
    return true;
}
function dodajWidocznyRodzaj() {
    $pobierz = mysqli_query(dbConn(),"SELECT * FROM rodzaje");
    if(mysqli_num_rows($pobierz) > 0)
        return false;
    return true;
}

function dodajRodzaj($rodzaj) {
    if($rodzaj != null) {
        //$value = strtolower(str_replace(" ","_",$firma));
        $values = strtolower(str_replace(" ","_",$rodzaj));
        mysqli_query(dbConn(),"INSERT INTO rodzaje(rodzaj,value) VALUES('".$rodzaj."','".$values."')");
        $qry = mysqli_query(dbConn(),"SELECT * FROM rodzaje WHERE rodzaj = '".$rodzaj."'");
        if(mysqli_num_rows($qry) > 0) {
            echo '<div class="alert alert-success" role="alert">
                    Pomyślnie dodano nowy rodzaj '.$rodzaj.' do bazy danych.
                  </div> ';
        }
        else {
        }
    }
    
}
function wypiszRodzajeSelect() {
    $pobierz = mysqli_query(dbConn(),"SELECT * FROM rodzaje");
    if(mysqli_num_rows($pobierz) > 0) {
        while($r = mysqli_fetch_assoc($pobierz)) {
            echo '
            <option value="'.$r['value'].'">'.$r['rodzaj'].'</option>
            ';
        }
    }
}
function wyszukiwanieTowaru($fraza) {
    $_SESSION['wysz'] = $fraza;
    return mysqli_query(dbConn(),"SELECT * FROM towar WHERE rodzaj LIKE '%".$fraza."%' OR firma LIKE '%".$fraza."%'");
}

?>



