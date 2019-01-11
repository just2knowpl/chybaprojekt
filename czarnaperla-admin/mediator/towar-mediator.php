<?php
include 'general-mediator.php';
include 'powiadomienia-mediator.php';

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
function setCena($cena) {
    if(isset($cena)) {
        return mysqli_real_escape_string(dbConn(),$cena);
    }
    if(!isset($_SESSION['edit'])) {
        echo "Proszę podać cenę";
        return null;
    }
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
function setNowaCenaTowaru($cena,$id) {
    if(isset($cena)) {
        $spr_cen = mysqli_query(dbConn(),"SELECT * FROM towar WHERE id = ".$id);
        if(mysqli_num_rows($spr_cen) > 0) {
            $r = mysqli_fetch_assoc($spr_cen);
            if($r != $cena)
                return round(mysqli_real_escape_string(dbConn(),str_replace(",",".",$cena)),2);
            else
                echo "Podałeś taką samą cenę.";
        }
    }
    else {
        echo "Pole 'nowa cena' nie może pozostać puste.";
        return null;
    }
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

function changeChars($echo) {
    $znaki[0] = "ą";
    $znaki[1] = "ś";
    $znaki[2] = "ć";
    $znaki[3] = "ł";
    $znaki[4] = "ó";
    $znaki[5] = "ż";
    $znaki[6] = "ź";
    $znaki[7] = "ć";
    $znaki[8] = "ń";
    $znaki[8] = " ";
//    
//    $alternator[0] = "&#x0105;";
//    $alternator[1] = "&#x015A;";
//    $alternator[2] = "";
//    $alternator[3] = "";
//    $alternator[4] = "";
//    $alternator[5] = "";
//    $alternator[6] = "";
//    $alternator[7] = "";
//    $alternator[8] = "_";
        
    for($i=0;$i<=count($znaki);$i++) {
//        str_replace("_"," ",strtoupper($r['firma'])).
    }
    
}
//funkcja wykonawcza

function addTowar($rodzaj, $producent, $ilosc, $cena) {
    if($rodzaj != null && $producent != null && $ilosc != null && $cena) {
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
        mysqli_query(dbConn(),"INSERT INTO towar (rodzaj,firma,ilosc,ilosc_ogolna,cena) VALUES ('".$rodzaj."','".$producent."','".$ilosc."','".$ilosc."','".$cena."')"); 
//        mysqli_query(dbConn(),"INSERT INTO historia (data,firma,rodzaj,czynnosc) VALUES ('".
//                     $date = date('Y-m-d');."','".$producent."','".$ilosc."','".$ilosc."')"); 
        }
    }
    exit(header("Location: lista-towarow"));
}

function zmianaCenyTowaru($nowa_cena,$id) {
    if($nowa_cena != null) {
        mysqli_query(dbConn(),"UPDATE towar SET cena='".$nowa_cena."' WHERE id=".$id);
        echo "Zmieniono cene";
    }
}

//wyswietlanie wyników

function wyswietlTowar($wyszukiwarka = null) {
    $sql;
    if($wyszukiwarka != null) {
        $sql = $wyszukiwarka; 
    }
    else
        $sql = mysqli_query(dbConn(),"SELECT * FROM towar ORDER BY firma");
        if(mysqli_num_rows($sql) > 0) {
            
            $ilosc_ogolna = 0;
            $ilosc_stan = 0;
            $ilosc_usunietych = 0;
            $wartosc_towaru = 0;
            
            echo '
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Firma</th>
                  <th scope="col">Rodzaj towaru</th>
                  <th scope="col">Ilość</th>
                  <th scope="col">Stan całościowy</th>
                  <th scope="col">Ilość usuniętego towaru</th>
                  <th scope="col">Cena towaru</th>
                  <th scope="col" style="color: red;">Odejmij</th>
                  <th><spam style="color:green;">Dodaj</span></th>
                  <th><spam style="color:#3b7fed;">Szczegóły</span></th>
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
                $wylicz_cene = $r['cena'] * $r['ilosc'];
                echo '<td> <strong>'.$wylicz_cene.' zł </strong> ('.$r['cena'].' zł/szt)</td>
                ';
                 if($r['ilosc'] <= 0)
                    echo '<td> </td>';
                else
                  echo '<td><button type="button" class="btn btn-danger" id="'.$r['id'].'" data-toggle="modal" data-target="#exampleModalCenter" onClick="setId(this.id)"><i class="fas fa-minus"></i></button></td>';
                echo '
                  <td><a href="dodaj.php?id='.$r['id'].'"><button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button></a>
                  </td>';
                echo '
                <td><a href="szczegoly.php?id='.$r['id'].'"><button type="button" class="btn btn-primary"><i class="fas fa-info"></i></button></a>
                  </td>';
                echo '
                </tr>
                
                
                ';
                $ilosc_stan += $r['ilosc'];
                $ilosc_ogolna += $r['ilosc_ogolna'];
                $ilosc_usunietych += $r['ilosc_usunietych'];
                $wartosc_towaru += $r['cena'] * $r['ilosc'];
            }
            $strata = $ilosc_ogolna - ($ilosc_stan + $ilosc_usunietych);
            echo '
            <tr>
                <td><strong>Podsumowanie:</td>
                <td></td>
                <td><strong>'.$ilosc_stan.' szt.</strong></td>
                <td><strong>'.$ilosc_ogolna.' szt.</strong></td>
                <td><strong>'.$ilosc_usunietych.' szt.</strong></td>
                <td><strong> Wartość towaru: '.$wartosc_towaru.' zł</strong></td>
                <td><strong> </strong></td>
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
function wypiszFirmySelect($edit_firmy) {
    $pobierz = mysqli_query(dbConn(),"SELECT * FROM firmy");
    if(mysqli_num_rows($pobierz) > 0) {
        while($r = mysqli_fetch_assoc($pobierz)) {
            if($edit_firmy == $r['value']) {
                echo '<option value="'.$r['value'].'" selected>'.$r['nazwa'].'</option>
            ';
            }
            else {
            echo '
            <option value="'.$r['value'].'">'.$r['nazwa'].'</option>
            ';
            }
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
function wypiszRodzajeSelect($edit_rodzaj) {
    $pobierz = mysqli_query(dbConn(),"SELECT * FROM rodzaje");
    if(mysqli_num_rows($pobierz) > 0) {
        while($r = mysqli_fetch_assoc($pobierz)) {
            if($edit_rodzaj == $r['value']) {
            echo '<option value="'.$r['value'].'" selected>'.$r['rodzaj'].'</option>';
            }
            else {
            echo '
            <option value="'.$r['value'].'">'.$r['rodzaj'].'</option>
            ';
            }
        }
    }
}
function wyszukiwanieTowaru($fraza) {
    $_SESSION['wysz'] = $fraza;
    return mysqli_query(dbConn(),"SELECT * FROM towar WHERE rodzaj LIKE '%".$fraza."%' OR firma LIKE '%".$fraza."%'");
}

?>



