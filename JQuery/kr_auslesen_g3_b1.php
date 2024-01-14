<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$Feld_numb=3;

$bridge=1;

include 'Outsorst/kr_auslesen_code.php';


?>