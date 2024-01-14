<?php

session_start();
header('Content-Type: text/html; charset=utf-8'); // sorgt für die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

include '../funktionen/db_verbindung.php';
include '../funktionen/nuetzliches.php';

$db=dbVerbindung();

$data_a_db['S_Db']=$_SESSION['WeK'];
$IdHeber = $_POST['value'];


HeberLoeschen($IdHeber); //funktionen/nuetzliches



