<?php
ob_start ();
error_reporting(0);
include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/kampfrichter_pads.php';


$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

if($KR_numb== 1)  $KR_numb='';       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss

$Art = $_SESSION['KrArt' . $KR_numb];
$Id = $_SESSION['KrId' . $KR_numb];
$Versuch= $_SESSION['KrV' . $KR_numb];
$Hgw = $_SESSION['KrHGw' . $KR_numb];
$TWert = 0;                      //By default

if($KR_numb== '')  $KR_numb=1;       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss

$bridge = $_SESSION['KR' . $KR_numb . '_Bridge'];
$_SESSION['Zeitnehmer_bridge']= $bridge;                                            //Für GetTime also aktuelle Heber Zeitabfrage

$heber = dbBefehl("SELECT * FROM heber WHERE IdHeber = '$Id' ");
$dsatz = mysqli_fetch_assoc($heber);

$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dataStamm = mysqli_fetch_assoc($dbstamm);
$_SESSION['KrAnzahl']=$dataStamm['Kampfrichter'];

$Wk_numb=$data_a_db['S_Db'];
$Wk_Art=$dataStamm['Wk_Art'];


if($dataStamm['Kampfrichter']>1)$G_art='G_' . $Art . '_' . $KR_numb;
if($dataStamm['Kampfrichter']>1)$T_art='T_' . $Art . '_' . $KR_numb;


       if($dataStamm['Wk_Art']=='M_m_T'){
         echo'<p class="krtext">';
           echo '<br>Sie werteten gültig: ' . $_SESSION['GueltigK' . $KR_numb] . '<br>T-Wert: ' . $_SESSION['T-WertK' . $KR_numb];
         echo'</p>';
       }else{
         echo'<p class="krtext">';
           echo '<br>Sie werteten gültig: ' . $_SESSION['GueltigK' . $KR_numb];
         echo'</p>';
       }
// echo 'Test', $KR_numb;


echo'<div id="variablen_reload"></div>';
echo '<div id="newkr' . $KR_numb . '"></div>';
// echo'<div id="variablen_reload"></div>';

?>
