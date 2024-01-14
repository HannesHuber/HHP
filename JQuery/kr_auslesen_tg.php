<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();


$IdHeber=$_SESSION['krIdH'];
$Versuch=$_SESSION['krV'];
$Wk_name=$_SESSION['WeK'];
$Art=$_SESSION['krArt'];

         $dbHeber = dbBefehl("SELECT * FROM heber_wk_$Wk_name
                               WHERE heber_wk_$Wk_name.IdHeber = '$IdHeber'
                               AND heber_wk_$Wk_name.Versuch= '$Versuch'
                               ");

$dHeber = mysqli_fetch_assoc($dbHeber);

$auslesen='Gueltig_' . $Art;
$Tauslesen='Technik_' . $Art;

if($dHeber[$auslesen]=='Ja')echo '<p>' . $dHeber[$Tauslesen] . '</p>';
elseif($dHeber[$auslesen]=='Nein')echo '<p>0</p>';
else echo '<p>&nbsp;</p>';
?>