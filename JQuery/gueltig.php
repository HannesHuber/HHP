<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();


$NHeber=$_SESSION['NHeber'];
$NHVersuch=$_SESSION['NHVersuch'];
$Wk_name=$_SESSION['WeK'];

         $NachH = dbBefehl("SELECT * FROM heber_$Wk_name, heber, heber_wk_$Wk_name
                               WHERE heber_$Wk_name.IdHeber = '$NHeber'
                               AND heber_wk_$Wk_name.IdHeber = '$NHeber'
                               AND heber.IdHeber = '$NHeber'
                               AND heber_wk_$Wk_name.Versuch= '$NHVersuch'
                               ");

$dtest = mysqli_fetch_assoc($NachH);

echo 'Gueltig= ' . $dtest['Gueltig_' . $_SESSION['Wk_SoR']];
?>