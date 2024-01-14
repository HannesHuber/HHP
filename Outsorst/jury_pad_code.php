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


if(isset($_POST['Gueltig']) && $_SESSION['BJury']==0 && $_SESSION['reloadJury']==0){                                         //Ab Hier Speicherung in Tabelle! wird in new_load_KR1.php ausgef�hrt
	$Kr_Gueltig='Ja';

	$_SESSION['JuryGueltig']='Ja';
	$_SESSION['BJury']=1;

	echo"
 <script>
 setTimeout(function(){
     location = 'jury_wertung.php'
   },0)
 </script>
";

}

if(isset($_POST['Ungueltig']) && $_SESSION['BJury']==0 && $_SESSION['reloadJury']==0){
	//$_SESSION['Lampe_Signal' . $KR_numb] = 1;
	$Kr_Gueltig='Nein';
	//JurySafeHeber($Wk_numb, $Wk_Art, $Art, $Kr_Gueltig, $IdHeber, $Versuch, $TWert);
	//tmp_Jury_Status_Update($bridge);

	$_SESSION['BJury']=1;
	$_SESSION['JuryGueltig']='Nein';
	$_SESSION['T-WertJury']=0;


	echo"
 <script>
 setTimeout(function(){
     location = 'jury_wertung.php'
   },0)
 </script>
";

}
//------------------------------------------------------------------------------------------------------------------------


//$_SESSION['Lampe_Signal1'] = 0;

if($dataStamm['Zeitnehmer']=='1')
	echo '<p class="showTimeBox">Heber Zeit<br> <span id="showTime"></span></p>';       //HEBER ZEIT ANZEIGE

	$query="Gueltig_" . $Art;
	$KrWertung=$dsatz[$query];
	if($KrWertung=="Ja") 	$KrWertung="Gültig";
	else if($KrWertung=="Nein")	$KrWertung="Ungültig";
	else $KrWertung="-";

 echo'<table class="tg">';
  echo'<tr>';
    echo'<th class="tg-yw4l" colspan="2">';
         echo '<p class="kopf"><b>' . $dsatz['Name'] . ' ' . $dsatz['Vorname'] . '</b></p>';
         echo '<p class="unter"><b>Ver: ' . $Versuch . ' | Kr-Wertung: ' . $KrWertung. '</b></p>';
    echo'</th>';
  echo'</tr>';
  echo'<tr>';

    echo'<td class="tg-u722">
                 <div id="container">
                         <button type="submit" name="Gueltig" class="buttonGueltigUngueltig" Id="Gueltig">
                              Ja
                         </button>
                 </div>
         </td>';
    echo'<td class="tg-q9qv">
                 <div id="container">
                         <button type="submit" name="Ungueltig" class="buttonGueltigUngueltig" Id="Ungueltig">
                              Nein
                         </button>
                 </div>
         </td>';
  echo'</tr>';

echo'</table>';





//---------------------------------------------------------------------------------------------------------------



echo'<div id="newKR' . $KR_numb . '"></div>';
echo'<div id="variablen_reload"></div>';

?>
