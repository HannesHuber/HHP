<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();


$IdHeber=$_SESSION['KrIdHAn1'];
$Versuch=$_SESSION['KrVAn1'];
$Art=$_SESSION['KrArtAn1'];
$Wk_name=$_SESSION['WeK'];

         $dbHeber = dbBefehl("SELECT * FROM heber_wk_$Wk_name
                               WHERE heber_wk_$Wk_name.IdHeber = '$IdHeber'
                               AND heber_wk_$Wk_name.Versuch= '$Versuch'
                               ");

$dHeber = mysqli_fetch_assoc($dbHeber);

$auslesen='Gueltig_' . $Art;
$Tauslesen='Technik_' . $Art;

if($dHeber[$auslesen]=='Ja')echo '<p>' . $dHeber[$Tauslesen] . ' Pkt</p>';
elseif($dHeber[$auslesen]=='Nein')echo '<p>0 Pkt</p>';
else echo '<p>&nbsp;</p>';
?>