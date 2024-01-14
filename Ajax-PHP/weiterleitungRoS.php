<?php
session_start();

header('Content-Type: text/html; charset=utf-8'); // sorgt für die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$art = $_POST['art'];
$auswahl = $_POST['auswahl'];
$WkId = $_POST['WkId'];

if($art==0)$art='Reissen';
if($art==1)$art='Stossen';

$_SESSION['Wk_Grp']=$auswahl;
$_SESSION['Wk_SoR']=$art;

$query="SELECT * FROM gruppen_zeit_$WkId WHERE Gruppen = '$auswahl'";

$DataBridge=dbBefehl($query);

$Bridge=mysqli_fetch_assoc($DataBridge);

$UpdateB="WkBridge" . $Bridge['Bridge'];

$UpdateQuery="UPDATE user_blocker_$WkId SET $UpdateB= 1";
dbBefehl($UpdateQuery);



?>