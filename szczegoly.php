<?php

include 'mediators/zlecenia-mediator.php';
if(!isset($_GET['id']) || $_GET['id'] == null || empty($_GET['id'])) {
    echo "Nieautoryzowany dostęp do strony.";
    return;
}
$id = $_GET['id'];
?>


Szczegóły zlecenia.
<div>Tytuł: <?php showSzczegolyZlecenia($id,'tytul'); ?></div>


<?php //test(); ?>