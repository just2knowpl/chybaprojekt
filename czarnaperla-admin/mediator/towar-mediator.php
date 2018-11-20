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
                if($_SESSION['edit'])
                    unset($_SESSION['edit']);
                    exit(header("Location: lista-towarow"));
         }
        else {
        mysqli_query(dbConn(),"INSERT INTO towar (rodzaj,firma,ilosc,ilosc_ogolna) VALUES ('".$rodzaj."','".$producent."','".$ilosc."','".$ilosc."')"); 
        }
    }
}



//wyswietlanie wyników

function wyswietlTowar() {
    $sql = mysqli_query(dbConn(),"SELECT * FROM towar ORDER BY ilosc desc");
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
                  <th scope="col" style="color: red;">Odejmij<span style="color:black;">/</span><spamn style="color:green;">Dodaj</span></th>
                </tr>
              </thead>
              <tbody>
            ';
            
            while($r=mysqli_fetch_assoc($sql)) {
                echo '
                
                <tr>
                  <td>'.$r['firma'].'</td>
                  <td>'.rodzajTranslate($r['rodzaj']).'</td>
                  <td>'.$r['ilosc'].'</td>
                  
                <td> '.$r['ilosc_ogolna'].' </td>
                
                <td> '.$r['ilosc_usunietych'].' </td>
                ';
                 if($r['ilosc'] <= 0)
                    echo '<td> </td>';
                else
                  echo '<td><a href="odejmij.php?id='.$r['id'].'"><button type="button" class="btn btn-danger"><i class="fas fa-minus"></i></button></a>
                  
                  <a href="dodaj.php?id='.$r['id'].'"><button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button></a>
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
                <td><strong>Strata towaru: '.$strata.' szt.</strong></td>
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
}

?>



