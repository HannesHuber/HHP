<?php
ob_start ();
error_reporting(0);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/kampfrichter_pads.php';

$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);



if($KR_nummer== 1)  $KR_nummer='';       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss



$Art = $_SESSION['KrArt' . $KR_nummer];
$Id = $_SESSION['KrId' . $KR_nummer];
$Versuch= $_SESSION['KrV' . $KR_nummer];
$Hgw = $_SESSION['KrHGw' . $KR_nummer];
$TWert = 0;                      //By default

$KR_nummer=$KR_nummer2;       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss


$bridge = $_SESSION['KR' . $KR_nummer. '_Bridge'];
$_SESSION['Zeitnehmer_bridge']= $bridge;                                            //F�r GetTime also aktuelle Heber Zeitabfrage

$heber = dbBefehl("SELECT * FROM heber WHERE IdHeber = '$Id' ");
$dsatz = mysqli_fetch_assoc($heber);

$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dataStamm = mysqli_fetch_assoc($dbstamm);
$_SESSION['KrAnzahl']=$dataStamm['Kampfrichter'];

$Wk_numb=$data_a_db['S_Db'];
$Wk_Art=$dataStamm['Wk_Art'];

if($dataStamm['Kampfrichter']>1)$G_art='G_' . $Art . '_' . $KR_nummer;
if($dataStamm['Kampfrichter']>1)$T_art='T_' . $Art . '_' . $KR_nummer;

if(isset($_POST['Gueltig'])){                                         //Ab Hier Speicherung in Tabelle! wird in new_load_KR1.php ausgef�hrt
	//Als erstes Save to absignal (Zeit kritisch wegen Absignal)
	Save_to_Absignal($bridge,$KR_nummer);

	$Kr_Gueltig='Ja';

	//$_SESSION['Lampe_Signal' . $KR_nummer] = 1;

   if($dataStamm['Wk_Art']!='M_m_T'){
   	$_SESSION['GueltigK' . $KR_nummer]='Ja';

         if($dataStamm['Kampfrichter']>1){                                 //Synchronisation der KR �ber tmp_kr_check table

         	KR_Singel_Safe_To_heber_wk($Wk_numb, $Wk_Art, $KR_nummer, $Art, $Id, $Versuch, $Kr_Gueltig, $TWert);

         	dbBefehl("UPDATE tmp_kr_check_$bridge
         			SET K$KR_nummer= '1'");

         }else
         	KR_Singel_Safe_To_heber_wk($Wk_numb, $Wk_Art, $KR_nummer, $Art, $Id, $Versuch, $Kr_Gueltig, $TWert);

         	$_SESSION['B' . $KR_nummer]=1;
         echo"
           <script>
             setTimeout(function(){
                 location = 'kampfrichter_wertung" . $KR_nummer. ".php'
             },0)
           </script>
         ";
   }else{		//Für M_m_T


         if($dataStamm['Kampfrichter']>1){

         	KR_Singel_Safe_To_heber_wk($Wk_numb, $Wk_Art, $KR_nummer, $Art, $Id, $Versuch, $Kr_Gueltig, $TWert);

                 dbBefehl("UPDATE tmp_kr_check_$bridge
                 		SET K$KR_nummer= '2'");

          }else
          	KR_Singel_Safe_To_heber_wk($Wk_numb, $Wk_Art, $KR_nummer, $Art, $Id, $Versuch, $Kr_Gueltig, $TWert);

          	$_SESSION['B' . $KR_nummer]=2;
         echo"
           <script>
             setTimeout(function(){
                 location = 't-wert" . $KR_nummer. ".php'
             },0)
           </script>
         ";

   }
   exit();
}elseif(isset($_POST['Ungueltig'])){

	//Als erstes Save to absignal (Zeit kritisch wegen Absignal)
	Save_to_Absignal($bridge,$KR_nummer);

	//$_SESSION['Lampe_Signal' . $KR_nummer] = 1;

    $Kr_Gueltig='Nein';

         if($dataStamm['Kampfrichter']>1){

          
         	KR_Singel_Safe_To_heber_wk($Wk_numb, $Wk_Art, $KR_nummer, $Art, $Id, $Versuch, $Kr_Gueltig, $TWert);

                 dbBefehl("UPDATE tmp_kr_check_$bridge
                 		SET K$KR_nummer= '1'");

         }else{
          KR_Singel_Safe_To_heber_wk($Wk_numb, $Wk_Art, $KR_nummer, $Art, $Id, $Versuch, $Kr_Gueltig, $TWert);
         }

         if($dataStamm['Wk_Art']=='M_m_T')$_SESSION['T-WertK' . $KR_nummer]=0;
         $_SESSION['B' . $KR_nummer]=1;
         $_SESSION['GueltigK' . $KR_nummer]='Nein';
         $_SESSION['T-WertK' . $KR_nummer]=0;

         echo"
           <script>
             setTimeout(function(){
                 location = 'kampfrichter_wertung" . $KR_nummer. ".php'
             },0)
           </script>
         ";

         exit();
}

//------------------------------------------------------------------------------------------------------------------------



//$_SESSION['Lampe_Signal1'] = 0;

if($dataStamm['Zeitnehmer']=='1')
	echo '<p class="showTimeBox">Heber Zeit<br> <span id="showTime"></span></p>';       //HEBER ZEIT ANZEIGE

 echo'<table class="tg">';
  echo'<tr>';
    echo'<th class="tg-yw4l" colspan="2">';
         echo '<p class="kopf"><b>' . $dsatz['Name'] . ' ' . $dsatz['Vorname'] . '</b></p>';
         echo '<p class="unter"><b>Ver: ' . $Versuch . ' | HGw: ' . $Hgw . '</b></p>';
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

 /*
  echo'<tr>';
    echo'<td class="tg-u722">
                 <div class="containerZeit">
                 </div>
         </td>';
    echo'<td class="tg-q9qv">
                 <div class="containerZeit">
                 </div>
         </td>';
  echo'</tr>';
*/
echo'</table>';


// echo "xxcyjclakjdlkaj", $KR_nummer;
echo'<div id="newKR' . $KR_nummer. '"></div>';
echo'<div id="variablen_reload"></div>';

?>
