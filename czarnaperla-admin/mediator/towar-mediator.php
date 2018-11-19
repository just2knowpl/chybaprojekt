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
                mysqli_query(dbConn(),"UPDATE towar SET ilosc = '".$nowa_ilosc."' WHERE rodzaj = '".$rodzaj."' AND firma = '".$producent."'");
         }
        else {
        mysqli_query(dbConn(),"INSERT INTO towar (rodzaj,firma,ilosc) VALUES ('".$rodzaj."','".$producent."','".$ilosc."')"); 
        }
    }
}



//wyswietlanie wyników

function wyswietlTowar() {
    $sql = mysqli_query(dbConn(),"SELECT * FROM towar");
        if(mysqli_num_rows($sql) > 0) {
            
            echo '
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Firma</th>
                  <th scope="col">Rodzaj towaru</th>
                  <th scope="col">Ilość</th>
                  <th scope="col" style="color: red;">Odejmij</th>
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
                  <td><a href="odejmij.php?id='.$r['id'].'"><button type="button" class="btn btn-danger"><i class="fas fa-minus"></i></button></a></td>
                </tr>
                
                ';
            }
            echo '
              </tbody>
            </table>
            ';
        }
    else 
        return " Nie znaleziono rekordów. ";
}



?>



