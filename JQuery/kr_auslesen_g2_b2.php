<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$Feld_numb=2;

$bridge=2;

include 'Outsorst/kr_auslesen_code.php';


?>