<?php
ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/kampfrichter_pads.php';



$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

if($KR_numb== 1)  $KR_numb='';       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss

$Art = $_SESSION['JuryArt'];
$Id = $_SESSION['JuryId'];
$Versuch= $_SESSION['JuryV'];
$TWert = 0;                      //By default

if($KR_numb== '')  $KR_numb=1;       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss

$bridge = $_SESSION['Jury_Bridge'];
$_SESSION['Zeitnehmer_bridge']= $bridge;                           //F�r GetTime also aktuelle Heber Zeitabfrage
$KR_numb=1;

$heber = dbBefehl("SELECT * FROM heber, heber_wk_".$data_a_db['S_Db']."
					WHERE heber.IdHeber = '$Id'
					AND heber.IdHeber = heber_wk_".$data_a_db['S_Db'].".IdHeber
					AND heber_wk_".$data_a_db['S_Db'].".Versuch = '$Versuch'
						");
$dsatz = mysqli_fetch_assoc($heber);

$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dataStamm = mysqli_fetch_assoc($dbstamm);
$_SESSION['KrAnzahl']=$dataStamm['Kampfrichter'];

$Wk_numb=$data_a_db['S_Db'];
$Wk_Art=$dataStamm['Wk_Art'];
$IdHeber=$Id;



	echo'<p class="krtext">';
	echo '<br>Sie werteten gültig: ' . $_SESSION['JuryGueltig'];
	echo'</p>';



echo'<div id="newKR' . $KR_numb . '"></div>';
echo'<div id="variablen_reload"></div>';

?>
