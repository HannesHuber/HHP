<?php
session_start();
if (empty($_SESSION['Steigerung'])) {
    $_SESSION['Steigerung'] = 0;
}
if (empty($_SESSION['IdHeber'])) {
    $_SESSION['IdHeber'] = 0;
}
if (empty($_SESSION['WkStart'])) {
    $_SESSION['WkStart'] = 0;
}
if (empty($_SESSION['NHeber'])) {
    $_SESSION['NHeber'] = 0;
}
if (empty($_SESSION['NHHgw'])) {
    $_SESSION['NHHgw'] = 0;
}
if (empty($_SESSION['NHVersuch'])) {
    $_SESSION['NHVersuch'] = 0;
}
if (empty($_SESSION['HeberNow'])) {
    $_SESSION['HeberNow'] = 0;
}
if (empty($_SESSION['VNow'])) {
    $_SESSION['VNow'] = 0;
}
if (empty($_SESSION['HWkBridge'])) {
    $_SESSION['HWkBridge'] = 0;
}
if (empty($_SESSION['ssAnsager'])) {
    $_SESSION['ssAnsager'] = 0;
}
if (empty($_SESSION['ssHR'])) {
    $_SESSION['ssHR'] = 0;
}
if (empty($_SESSION['GLIdHeber'])) {
    $_SESSION['GLIdHeber'] = 0;
}
if (empty($_SESSION['GLVersuch'])) {
    $_SESSION['GLVersuch'] = 0;
}
if (empty($_SESSION['Wk_Art_ZK_usw'])) {
    $_SESSION['Wk_Art_ZK_usw'] = '';
}
if (empty($_SESSION['Pad-Reset-Variable-1'])) {
    $_SESSION['Pad-Reset-Variable-1'] = 0;
}
if (empty($_SESSION['Pad-Reset-Variable-2'])) {
    $_SESSION['Pad-Reset-Variable-2'] = 0;
}

if (empty($_SESSION['ZeitAnweisung'])) {
    $_SESSION['ZeitAnweisung'] = 0;
}
if (empty($_SESSION['ZeitWert'])) {
    $_SESSION['ZeitWert'] = 60;
}
if (empty($_SESSION['Zeitstempel'])) {
    $_SESSION['Zeitstempel'] = 0;
}
if (empty($_SESSION['CheckNull'])) {
    $_SESSION['CheckNull'] = 0;
}
if (empty($_SESSION['Check'])) {
    $_SESSION['Check'] = 0;
}
if (empty($_SESSION['ErsterAufrufZeit'])) {
    $_SESSION['ErsterAufrufZeit'] = 0;
}

if (empty($_SESSION['ReloadIterationWkLeiter'])) {
    $_SESSION['ReloadIterationWkLeiter'] = 0;
}


header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">
<link rel="stylesheet" type="text/css" href="CSS/anzeige_wk.css">
<link rel="stylesheet" type="text/css" href="CSS/ButtonNumpad_Anzeige_Wk.css">



<script type='text/javascript' src="jquery-2.2.1.min.js"></script>
<script type='text/javascript' src="JS/wk_funktionen.js"></script>
<script type='text/javascript' src="JS/zeitnehmer_funktionen.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    $("#showTime").load("JQuery/getTime.php");
    var refreshId = setInterval(function() {
       $("#showTime").load("JQuery/getTime.php?" + 1*new Date());
    }, 300);
 });

  $(document).ready(function() {
    $("#refresh").load("JQuery/technik.php");
    var refreshId = setInterval(function() {
       $("#refresh").load('JQuery/technik.php?' + 1*new Date());
    }, 1000);
 });

  $(document).ready(function() {
    $("#r_gueltig").load("JQuery/gueltig.php");
    var refreshId = setInterval(function() {
       $("#r_gueltig").load('JQuery/gueltig.php?' + 1*new Date());
    }, 1000);
 });

  $(document).ready(function() {
    $("#Heber_Safe").load("JQuery/wk_loop.php");
    var refreshId = setInterval(function() {
       $("#Heber_Safe").load('JQuery/wk_loop.php?' + 1*new Date());
    }, 2000);
 });

  $(document).ready(function() {
    $("#NH_Gerd").load("JQuery/naechster_Heber_Button.php");
    var refreshId = setInterval(function() {
       $("#NH_Gerd").load('JQuery/naechster_Heber_Button.php?' + 1*new Date());
    }, 2000);
 });

  $(document).ready(function() {
    $("#tmp_aktu").load("JQuery/tmp_aktuallisierung.php");
    var refreshId = setInterval(function() {
       $("#tmp_aktu").load('JQuery/tmp_aktuallisierung.php?' + 1*new Date());
    }, 2000);
 });

  $(document).ready(function() {
    $("#tmp_aktu").load("JQuery/variablen_reload_anzeigeWK.php");
    var refreshId = setInterval(function() {
       $("#variablen_reload").load('JQuery/variablen_reload_anzeigeWK.php?' + 1*new Date());
    }, 20000);
 });

  $(document).ready(function() {
      $("#zeitRefresh").load("JQuery/zeitLoop1.php");
      var refreshId = setInterval(function() {
         $("#zeitRefresh").load('JQuery/zeitLoop1.php?' + 1*new Date());
      }, 250);
   });

  function GenerateSafeButton(Id) {
	    var x = document.getElementById("SafeButton" + Id);
	    x.style.display = "inline";
	}

  function GenerateButton(Id) {
	    var x = document.getElementById(Id);
	    x.style.display = "inline";
	}

  function DeGenerateButton(Id) {
	    var x = document.getElementById(Id);
	    x.style.display = "none";
	}


  $(document).ready(function() {
      $("#new_load_Wk_Leiter").load("JQuery/new_load_Button.php");
      var refreshId = setInterval(function() {
         $("#new_load_Wk_Leiter").load('JQuery/new_load_Button.php?' + 1*new Date());
      }, 1000);
   });

</script>
</head>



<body>

<span id="redirekt_to_start"></span>
<span id="ajaxtest"></span>
<span id="verzicht"></span>
<span id="variablen_reload"></span>
<span id="Heber_Safe"></span>

<span id="zeitRefresh"></span>



<form method="post" action="anzeige_wettkampf_m_t.php">


<p class="kopf" align="center"><b><font size="10">Wettkampf</font></b></p>

<a href="wettkampf_anzeige.php" title="Link zur Wettkampf-Anzeige" id="range-logo">Wettkampf</a>

<button type="submit" name="Button-Pad-Reset" class="button-Pad-Reset">Pad<br>Reset</button>
<button type="submit" name="Button-Anzeigen-Reload" class="button-Anzeigen-Reload">Anzeigen<br>Reload</button>

<br><br>
<?php
/*

 */
ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
include 'funktionen/auswertung_funktionen.php';

$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$wk_name=$data_a_db['S_Db'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);


$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

$Grp = $_SESSION['Wk_Grp'];
$Art = $_SESSION['Wk_SoR'];

//Für Reload von Dezentraler Steigerung ausgehend
$Reload_Variable=0;
$DataReload = dbBefehl("SELECT * FROM wk_reload_$wk_name");
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['ReloadIterationWkLeiter']=$ReloadIteration['Grp'];

//var_dump($wk_name);
//var_dump($ReloadIteration['Grp']);
//var_dump($_SESSION['ReloadIterationWkLeiter']);

//F�r Reihenfolge in Bundesliga�bersicht
$ReihenfolgeArray=array();
$ReihenfolgeZaehler=0;
//Einzel_Heber_Auswertung('334');




if($stammdaten['Zeitnehmer']=='1')
    echo'<p class="showTimeBox">Zeit: <span id="showTime"></span></p>';

if($stammdaten['Zeitnehmer']=='2'){


echo '<div class="ZeitTable">';
    echo'<table class="ttable">';
    echo'<tr>';
    echo'<td colspan="2" align="center"><span id="showTime"></span></td>';
    echo'</tr>';
    echo'<tr>';
    echo'<td><button class="myButton" type="button" onclick="Play()">Play</button></td>';                //type="button" unerl�sslich sonst reload!!
    echo'<td><button class="myButton" type="button" onclick="Paus()">Pause</button></td>';
    echo'</tr>';
    echo'<tr>';
    echo'<td><button class="myButton" type="button" onclick="Add(60)">+60</button></td>';
    echo'<td><button class="myButton" type="button" onclick="Reset()">Reset</button></td>';
    echo'</tr>';
    echo'</table>';
echo '</div>';

}

if($stammdaten['Wk_Art']=='BL'){
    $DataVereinsAuswahl = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
    $VereinsAuswahl = mysqli_fetch_assoc($DataVereinsAuswahl);

    $NameVerein1 = returnNameVerein($VereinsAuswahl['Verein1']);
    $NameVerein2 = returnNameVerein($VereinsAuswahl['Verein2']);

    if($stammdaten['Verein_Anzahl']=='3')
        $NameVerein3 = returnNameVerein($VereinsAuswahl['Verein3']);

    echo '<div class="Punkte_Uebersicht">';
    echo'<table class="tabellePunkteUebersicht">';

    echo'<tr >';
    echo'<th>Verein</th>';
    echo'<th>R</th>';
    echo'<th>S</th>';
    echo'<th>Ges</th>';       // . '('.$VereinsAuswahl[Hochrechnung_V1].')'
    echo'</tr>';

    echo'<tr >';
    echo'<th>' . $NameVerein1 . '</th>';
    echo'<th>' . $VereinsAuswahl['R_Pt_V1'] . '</th>';
    echo'<th>' . $VereinsAuswahl['S_Pt_V1'] . '</th>';
    echo'<th>' . $VereinsAuswahl['RuS_Pt_V1'].'</th>';       // . '('.$VereinsAuswahl[Hochrechnung_V1].')'
    echo'</tr>';

    echo'<tr>';
    echo'<th>' . $NameVerein2 . '</th>';
    echo'<th>' . $VereinsAuswahl['R_Pt_V2'] . '</th>';
    echo'<th>' . $VereinsAuswahl['S_Pt_V2'] . '</th>';
    echo'<th>' . $VereinsAuswahl['RuS_Pt_V2'] .'</th>';     //. '('.$VereinsAuswahl[Hochrechnung_V2].')'
    echo'</tr>';

    if($stammdaten['Verein_Anzahl']==3){
        echo'<tr>';
        echo'<th>' . $NameVerein3 . '</th>';
        echo'<th>' . $VereinsAuswahl['R_Pt_V3'] . '</th>';
        echo'<th>' . $VereinsAuswahl['S_Pt_V3'] . '</th>';
        echo'<th>' . $VereinsAuswahl['RuS_Pt_V3'] .'</th>';     // . '('.$VereinsAuswahl[Hochrechnung_V3].')'
        echo'</tr>';
    }

    echo'</table>';
    echo '</div>';

}
//Folgendes ist f�r Speicherung der Grp in tmp_wk_korrektur_block und bridgen ermittlung


$WettKaArt=$stammdaten['Wk_Art'];

if($WettKaArt=='BL'){
  $bridge=1;
}else{

  if($WettKaArt=='M_m_T'){
     $b_conn = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']."
                            WHERE Gruppen = '$Grp'
                            ");
  }else{
     $b_conn = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']."
                            WHERE Gruppen = '$Grp'
                            ");
  }
  $dbridge = mysqli_fetch_assoc($b_conn);
  $bridge=$dbridge['Bridge'];

}
    $_SESSION['Zeitnehmer_bridge']=$bridge;
  $_SESSION['HWkBridge']=$bridge;
  $_SESSION['Zeitnehmer_bridge']= $bridge;                        //F�r GetTime also aktuelle Heber Zeitabfrage
//Ende Bridgen ermittlung





$WettKaArt=$stammdaten['Wk_Art'];
$_SESSION['Wk_Art_ZK_usw']= $WettKaArt;
echo "
  <script type=\"text/javascript\">
    var WkArt = \"".$WettKaArt."\";
    var WkAnlage = \"".$stammdaten['Gerd']."\";
  </script>
";



// $s1 = microtime(true);            //Zeit in Sekunden! für optiemierungen


//Differenzermittelung zu vorherigen Versuchen
//Jetzt auf Die Zeit umgestellt an der gehoben wurde! => Keine Differenz
// Derjenige der zuerst gehoben hat wird den kleineren Wert erhalten (Time stemp vom Zeitpunkt der hebung)


$time_a=time();

$wk_num = $data_a_db['S_Db'];  // This should be dynamically set based on your application logic

$columns_to_select = "
    heber.IdHeber,
    heber_wk_{$wk_num}.time_Stossen,
    heber_wk_{$wk_num}.Versuch,
    heber_wk_{$wk_num}.Gueltig_Reissen,
    heber_wk_{$wk_num}.Div_Wert_R,
    heber_wk_{$wk_num}.time_Reissen,
    heber_wk_{$wk_num}.Gueltig_Stossen,
    heber_wk_{$wk_num}.Div_Wert_S
";

$columns_to_select = " * ";

$Update2 = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db']."
                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                       AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                       ORDER BY heber_wk_".$data_a_db['S_Db'].".IdHeber ASC,
                       heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                       ");

$DivWertReissenV2=0;
$DivWertStossenV2=0;

while($d_update = mysqli_fetch_assoc($Update2))
{

    if($d_update['Versuch'] == "1")                                                //Differnez ermittlung Versuch 2
    {
      //Nur Zeit vorhanden wenn erste Gueltig!
      if($d_update['Gueltig_Reissen'] != NULL){
        $R1=$d_update['time_Reissen'];
      }else{
        $R1 = 9999999999999;
      }
      if($d_update['Gueltig_Stossen'] != NULL){
        $S1=$d_update['time_Stossen'];
      }else{
        $S1 = 9999999999999;
      }

    }

    if($d_update['Versuch'] == "2")                                                //Differnez ermittlung Versuch 2
    {
    	//Sorgt dafür das wenn noch kein 2.Versuch zur Verfügung steht, die Zeit des ersten Versuches auch ausschlaggebend ist
    	if($d_update['Gueltig_Reissen'] != NULL){
    		$R2=$d_update['time_Reissen'];
    	}else{
    		$R2=$R1 + 9999999999999;
    	}
    	if($d_update['Gueltig_Stossen'] != NULL){
    		$S2=$d_update['time_Stossen'];
    	}else{
    		$S2=$S1 + 9999999999999;
    	}

        //Es ist nur die Zeit der ersten Hebung wichtig für den Zweiten Versuch
        $Diverens_R = $R1;
        $Diverens_S = $S1;

        $DivWertReissenV2 = $Diverens_R;
        $DivWertStossenV2 = $Diverens_S;

        $IdHeber = $d_update['IdHeber'];

        if($d_update['Div_Wert_R']!=$Diverens_R){

            dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                                  SET Div_Wert_R= '$Diverens_R'
                                  WHERE IdHeber ='$IdHeber'
                                  AND Versuch = '2'
                                  ");
        }

        if($d_update['Div_Wert_S']!=$Diverens_S){


            dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                                  SET Div_Wert_S= '$Diverens_S'
                                  WHERE IdHeber ='$IdHeber'
                                  AND Versuch = '2'
                                  ");

        }

    }



    if($d_update['Versuch'] == "3")                                                //Differnez ermittlung Versuch 3
    {
    	//$d_update['time_Reissen'] - $R2

    		$Diverens_R = $R2;
    		$Diverens_S = $S2;

    	/*
    	if($d_update['time_Stossen'] != NULL){
    		$Diverens_S = $d_update['time_Stossen'] - $S2;
    	}else{ //F�r vorhersage der richtigen Versuchsreihenfolge wenn 2.Versuch noch nicht durchgef�hrt wurde
    		$Diverens_S=$DivWertStossenV2;
    	}
    	*/

    	$DivWertReissenV2=0;
    	$DivWertStossenV2=0;

      $IdHeber = $d_update['IdHeber'];

        if($d_update['Div_Wert_R']!=$Diverens_R){

            dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                                  SET Div_Wert_R= '$Diverens_R'
                                  WHERE IdHeber ='$IdHeber'
                                  AND Versuch = '3' ");
        }

        if($d_update['Div_Wert_S']!=$Diverens_S){

            dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                                  SET Div_Wert_S= '$Diverens_S'
                                  WHERE IdHeber ='$IdHeber'
                                  AND Versuch = '3' ");
        }

    }

}

 // Differenzermittlung der Zeit Ende

if($Art=="Reissen"){
$Kurz="R";

}else{
$Kurz="S";
}


$columns_to_select = "
    heber.IdHeber,
    heber.Name,
    heber.Vorname,
    heber.Gewicht,
    heber_{$wk_num}.Gruppe,
    heber_wk_{$wk_num}.Versuch,
    verein.Verein,
    heber_wk_{$wk_num}.Reissen,
    heber_wk_{$wk_num}.Stossen
";

$columns_to_select = " * ";


// Wenn änderungen an der Sortierung durchgeführt werden müssen diese auch unter JQuery/tmp_aktuallisierung.php durchgeführt werden!
// Und bei Outsorst/.. ansager_code,heber_raum_code,
if($stammdaten['Wk_Art']=='BL'){


	if($stammdaten['Block_Heben']=='0'){

/* Alte Heberreihenfolge mit Differenze statt wer mehr Pause hat muss Heben => Jetzt mit Diff ermittlung der Zeit
 	    $StringOrderBy=" ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC,
                                heber_wk_".$data_a_db['S_Db'].".$Art ASC,
								heber_wk_".$data_a_db['S_Db'].".Versuch ASC,
								heber_wk_".$data_a_db['S_Db'].".time_$Art DESC,
								heber_".$data_a_db['S_Db'].".LosNr ASC";
*/
    //Div_Wert_ ist nicht Div Wert sondern Zeitpunkt der letzten Hebung!
    //Daher die wer bei selben Versuch zuerst gehoben hat ist als erstes dran
		$StringOrderBy=" ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC,
                                heber_wk_".$data_a_db['S_Db'].".$Art ASC,
								heber_wk_".$data_a_db['S_Db'].".Versuch ASC,
								heber_wk_".$data_a_db['S_Db'].".Div_Wert_$Kurz ASC,
								heber_".$data_a_db['S_Db'].".LosNr ASC";

	}elseif($stammdaten['Block_Heben']=='1'){


		$StringOrderBy=" ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC,
                                heber_wk_".$data_a_db['S_Db'].".Versuch ASC,
								heber_wk_".$data_a_db['S_Db'].".$Art ASC,
								heber_wk_".$data_a_db['S_Db'].".Div_Wert_$Kurz ASC,
								heber.Gewicht ASC";

	}

    if($stammdaten['Gerd']==0){

         if($Art=="Reissen"){       //Da nicht alle f�r Reissen und Stossen starten

             //In der leeren Zeile war AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp' damit nur eine Gruppe ausgew�hlt wurde
            $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdVerein = verein.IdVerein
                               AND heber_".$data_a_db['S_Db'].".Gruppe != '0'
                               AND (heber_wk_".$data_a_db['S_Db'].".Gueltig_$Art = '' OR heber_wk_".$data_a_db['S_Db'].".Gueltig_$Art IS NULL)
                               AND (heber_".$data_a_db['S_Db'].".R_uo_S = '0' OR heber_".$data_a_db['S_Db'].".R_uo_S = '1')
                               ".$StringOrderBy);
         }else{     //F�r Stossen

            $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdVerein = verein.IdVerein
                               AND heber_".$data_a_db['S_Db'].".Gruppe != '0'
                               AND (heber_wk_".$data_a_db['S_Db'].".Gueltig_$Art = '' OR heber_wk_".$data_a_db['S_Db'].".Gueltig_$Art IS NULL)
                               AND (heber_".$data_a_db['S_Db'].".R_uo_S = '0' OR heber_".$data_a_db['S_Db'].".R_uo_S = '2')
                               ".$StringOrderBy);
         }



    }else{   //Gerd==1

         if($Art=="Reissen"){       //Da nicht alle f�r Reissen und Stossen starten

             //In der leeren Zeile war AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp' damit nur eine Gruppe ausgew�hlt wurde
            $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdVerein = verein.IdVerein
                               AND heber_".$data_a_db['S_Db'].".Gruppe != '0'
                               AND (heber_wk_".$data_a_db['S_Db'].".NH_$Art = '' OR heber_wk_".$data_a_db['S_Db'].".NH_$Art IS NULL
                               AND (heber_".$data_a_db['S_Db'].".R_uo_S = '0' OR heber_".$data_a_db['S_Db'].".R_uo_S = '1')
                               OR heber_wk_".$data_a_db['S_Db'].".NH_$Art = '0')
                               ".$StringOrderBy);

          }else{

            $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdVerein = verein.IdVerein
                               AND heber_".$data_a_db['S_Db'].".Gruppe != '0'
                               AND (heber_wk_".$data_a_db['S_Db'].".NH_$Art = '' OR heber_wk_".$data_a_db['S_Db'].".NH_$Art IS NULL
                               AND (heber_".$data_a_db['S_Db'].".R_uo_S = '0' OR heber_".$data_a_db['S_Db'].".R_uo_S = '2')
                               OR heber_wk_".$data_a_db['S_Db'].".NH_$Art = '0')
                               ".$StringOrderBy);
          }

   }




}else{ //Für wenn nicht BL
    //Auch hier wurde alles von Div Wert zu "heber_wk_".$data_a_db['S_Db'].".time_$Art ASC," umgestellt
    //Div Wert ist jetzt = der Zeit an der gehoben wurde => Der mit der kleinereren Zeit war zu erst dran!
    // Wenn änderungen an der Sortierung durchgeführt werden müssen diese auch unter JQuery/tmp_aktuallisierung.php durchgeführt werden!

	//Vor einführung der Blockheben funktion für alle Wks
	/*
	 $StringOrderBy=" ORDER BY   heber_wk_".$data_a_db['S_Db'].".$Art ASC,
	 heber_wk_".$data_a_db['S_Db'].".Versuch ASC,
	 heber_wk_".$data_a_db['S_Db'].".Div_Wert_$Kurz ASC,
	 heber_".$data_a_db['S_Db'].".LosNr ASC";

	 */

	if($stammdaten['Block_Heben']=='0'){

		/* Alte Heberreihenfolge mit Differenze statt wer mehr Pause hat muss Heben => Jetzt mit Diff ermittlung der Zeit
		 $StringOrderBy=" ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC,
		 heber_wk_".$data_a_db['S_Db'].".$Art ASC,
		 heber_wk_".$data_a_db['S_Db'].".Versuch ASC,
		 heber_wk_".$data_a_db['S_Db'].".time_$Art DESC,
		 heber_".$data_a_db['S_Db'].".LosNr ASC";
		 */

		$StringOrderBy=" ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC,
		heber_wk_".$data_a_db['S_Db'].".$Art ASC,
		heber_wk_".$data_a_db['S_Db'].".Versuch ASC,
		heber_wk_".$data_a_db['S_Db'].".Div_Wert_$Kurz ASC,
		heber_".$data_a_db['S_Db'].".LosNr ASC";

	}elseif($stammdaten['Block_Heben']=='1'){


		$StringOrderBy=" ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC,
		heber_wk_".$data_a_db['S_Db'].".Versuch ASC,
		heber_wk_".$data_a_db['S_Db'].".$Art ASC,
		heber_wk_".$data_a_db['S_Db'].".Div_Wert_$Kurz ASC,
		heber.Gewicht ASC";

	}



    if($stammdaten['Gerd']==0){

         $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdVerein = verein.IdVerein
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               AND (heber_wk_".$data_a_db['S_Db'].".Gueltig_$Art = '' OR heber_wk_".$data_a_db['S_Db'].".Gueltig_$Art IS NULL)
                               " . $StringOrderBy);

    }else{

         $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdVerein = verein.IdVerein
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               AND (heber_wk_".$data_a_db['S_Db'].".NH_$Art = '' OR heber_wk_".$data_a_db['S_Db'].".NH_$Art IS NULL
                               OR heber_wk_".$data_a_db['S_Db'].".NH_$Art = '0')
                               " . $StringOrderBy);

   }

}        //Ende else BL

if(mysqli_num_rows($heber)==0){     //Wegen User Blocker (Bridgen Block)

    $DataGruppen=dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']." WHERE Gruppen = '$Grp'");
    $Bridge=mysqli_fetch_assoc($DataGruppen);

    $UpdateB="WkBridge" . $Bridge['Bridge'];

    $UpdateQuery="UPDATE user_blocker_".$data_a_db['S_Db']." SET $UpdateB= 0";
    dbBefehl($UpdateQuery);

}

if($stammdaten['Wk_Art']!='BL'){

    if(mysqli_num_rows($heber)==0 && $_SESSION['Wk_SoR']=='Reissen'){
        echo"<input type=\"submit\" class=\"weiterleitung\" name=\"Weiterleitung\" value=\"Weiter mit Stossen?\"> ";
    }
    if(isset($_POST['Weiterleitung']))
    {

        $_SESSION['Wk_SoR']='Stossen';
        $x=1;
    }
}else{
    /*
    if(mysqli_num_rows($heber)==0 && $_SESSION['Wk_SoR']=='Reissen' && $Grp==1){
        echo"<input type=\"submit\" class=\"weiterleitung\" name=\"WeiterleitungBL1\" value=\"Weiter mit Grp2 Reissen?\"> ";
    }
    */

   // if($stammdaten['Verein_Anzahl']==2){
        if(mysqli_num_rows($heber)==0 && $_SESSION['Wk_SoR']=='Reissen'){
            echo"<input type=\"submit\" class=\"weiterleitung\" name=\"WeiterleitungBL2\" value=\"Weiter mit Stossen?\"> ";
        }
   // }
    /*
    else{
        if(mysqli_num_rows($heber)==0 && $_SESSION['Wk_SoR']=='Reissen' )
            echo"<input type=\"submit\" class=\"weiterleitung\" name=\"WeiterleitungBL4\" value=\"Weiter mit Reissen?\"> ";
    }
    */


    /*
    if(mysqli_num_rows($heber)==0 && $_SESSION['Wk_SoR']=='Reissen'){
        echo"<input type=\"submit\" class=\"weiterleitung\" name=\"WeiterleitungBL2\" value=\"Weiter mit Grp1 Stossen?\"> ";
    }

    if(mysqli_num_rows($heber)==0 && $_SESSION['Wk_SoR']=='Stossen' && $Grp==1){
        echo"<input type=\"submit\" class=\"weiterleitung\" name=\"WeiterleitungBL3\" value=\"Weiter mit Grp2 Stossen?\"> ";
    }

    if($stammdaten['Verein_Anzahl']==3)
    if(mysqli_num_rows($heber)==0 && $_SESSION['Wk_SoR']=='Stossen' && $Grp==2){
        echo"<input type=\"submit\" class=\"weiterleitung\" name=\"WeiterleitungBL4\" value=\"Weiter mit Grp3 Stossen?\"> ";
    }
    */

    if(isset($_POST['WeiterleitungBL1']))
    {

        $_SESSION['Wk_Grp']=2;
        $x=1;
    }

    if(isset($_POST['WeiterleitungBL2']))
    {

        $_SESSION['Wk_SoR']='Stossen';
        $_SESSION['Wk_Grp']=1;
        $x=1;
    }

    if(isset($_POST['WeiterleitungBL3']))
    {

        $_SESSION['Wk_Grp']=2;
        $x=1;
    }

    if(isset($_POST['WeiterleitungBL4']))
    {
    	ReloadVariableWkLeiterErhoehung($bridge);
        $_SESSION['Wk_Grp']=3;
        $x=1;
    }
}

if(isset($_POST['Weiterleitung'])||isset($_POST['WeiterleitungBL1'])||isset($_POST['WeiterleitungBL2'])||isset($_POST['WeiterleitungBL3'])){
    $_SESSION['NHeber']=0;
    $_SESSION['NHVersuch']=0;
    $_SESSION['NHHgw']=0;
    ReloadVariableWkLeiterErhoehung($bridge);
    clearTmpLetzterHeber($bridge);
    KampfrichterSpeicherLoeschenfuerAktuellerHeber($bridge, $wk_name, $Art, $Id, $V);
    $_SESSION['Pad-Reset-Variable-' . $bridge]=1;          //KampfrichterPadResetOrder($bridge);
    //soll erst am Ende den Befehl geben
}


$NHeber=$_SESSION['NHeber'];
$NHVersuch=$_SESSION['NHVersuch'];
$NHHgw=$_SESSION['NHHgw'];

dbBefehl("DELETE FROM tmp_letzter_heber_$bridge");
dbBefehl("INSERT INTO tmp_letzter_heber_$bridge (IdHeber,Art,V)
		Values ('$NHeber','$Art','$NHVersuch')
		");

         $NachH = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db']."
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = '$NHeber'
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = '$NHeber'
                               AND heber.IdHeber = '$NHeber'
                               AND heber_wk_".$data_a_db['S_Db'].".Versuch= '$NHVersuch'
                               ");

echo"<div id=\"divid1\" class=\"examplediv\">";




if($stammdaten['Gerd']==0){

echo "

<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"25\">
    <col width=\"250\">
    <col width=\"250\">
    <col width=\"120\">
    <col width=\"50\">
    <col width=\"75\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">";

 if($WettKaArt=='M_m_T') {
     echo "<col width=\"150\">";
 }                   //Spalte f�r Technikwertung

echo "</colgroup>";

//Da f�r BL Gruppen in while schleife bestimmt werden (Da Bl �ber alle Gruppen)
if($WettKaArt!='BL') {
echo"
<thead>

<tr>
  <th align=\"left\" colspan=\"2\"><font size=\"5\">Gruppe $Grp</font></th>
  <th align=\"left\" colspan=\"8\"><font size=\"4\">$Art</font></th>

</tr>";
}


}else{

echo "

<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"25\">
    <col width=\"250\">
    <col width=\"250\">
    <col width=\"75\">
    <col width=\"50\">
    <col width=\"75\">
    <col width=\"150\">
    <col width=\"150\">
    ";

  if($WettKaArt=='M_m_T') echo '<col width=\"150\">';

echo "</colgroup>";

echo"
<thead>

<tr>
  <th align=\"left\" colspan=\"2\"><font size=\"5\">Gruppe $Grp</font></th>
  <th align=\"left\" colspan=\"6\"><font size=\"5\">$Art</font></th>

</tr>";



echo"
 <tr>
  <th>Id</th>
  <th>Heber</th>
  <th>Verein</th>
  <th>KöGw</th>
  <th>V</th>
  <th>Last</th>
  <th>Steigerung</th>
  <th>Nächster Heber</th>
  <th>Verzicht</th>
 </tr>
</thead>
";

}




$i = 0;

$num_rows_heber=mysqli_num_rows($heber);


if($num_rows_heber==0){
  dbBefehl("UPDATE tmp_wk_korrektur_block
            SET Grp_Bridge_$bridge= '0'
            WHERE Id ='1'
            ");

  dbBefehl("DELETE FROM tmp_reload_$bridge");

  dbBefehl("INSERT INTO tmp_reload_$bridge (IdHeber,V,HGw,Art,Gruppe)
  		Values ('0','-1','-1','$Art','$Grp')");

}
//Ende tmp_wk_korrektur_block speicherung



while(($dsatz = mysqli_fetch_assoc($heber)))
{

$i++;

     $Id="Id" . $i;
     $Löschen="Löschen" . $i;
     $Ausserkonkurrenz="Ausserkonkurrenz" . $i;
     $Konkurrenz="Konkurrenz" . $i;
     $Mannschaft="Mannschaft" . $i;
     $Gewicht="Gewicht" . $i;
     $Ja="Ja" . $i;
     $Nein="Nein" . $i;
     $Safe="Safe" . $i;
     $SafeButton="SafeButton" . $i;
     $Steigern="Steigern" . $i;
     $Ok="Ok" . $i;
     $Last="Last" . $i;
     $t="t" . $i;
     $technik="technik" . $i;
     $NH="NH" . $i;
     $V="V" . $i;

     //Speicherung für tmp_gerd


     if($i==1 && $WettKaArt=='BL'){

//Folgendes ist f�r speicherung der Grp in tmp_wk_korrektur_block

dbBefehl("UPDATE tmp_wk_korrektur_block
          SET Grp_Bridge_$bridge= '$Grp'
          WHERE Id ='1'
          ");

//Ende tmp_wk_korrektur_block speicherung


   if($_SESSION['WkStart']=='0'){

         $_SESSION['WkStart']=1;
         $_SESSION['NHHgw']=0;   //Damit kein safe Fehler auftritt

   }




}      //schliest if(i==1)

     //Gerd Speicherung ende
     //Wk_Start_Button Anfang


if($Grp!=$dsatz['Gruppe'] && $i==1){
    $Grp=$dsatz['Gruppe'];
    $_SESSION['Wk_Grp']=$Grp;
    $x=1;
}

if( $i==1 || $Grp!=$dsatz['Gruppe']){
    $GGGGGrp=$dsatz['Gruppe'];
    echo"
<thead>

<tr>
  <th align=\"left\" colspan=\"2\"><font size=\"5\">Gruppe $GGGGGrp </font></th>
  <th align=\"left\" colspan=\"12\"><font size=\"4\">$Art</font></th>

</tr>";
}


if(($i==1)&&($_SESSION['NHeber']!='0')){        //Lezter-Heber Spalte!     Bzw.Spalte �ber allen anderen Hebern


echo "<tbody class=\"first_lifter\">";

while($d = mysqli_fetch_assoc($NachH))
{
echo "<tr align=\"center\" >";

echo "<td>";

     echo "0";

echo "</td>";


     echo "<td>";

                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$d['Name']."</span>";

                 echo $d['Vorname'];

     echo "</td>";


     echo "<td>";
     echo "</td>";

     echo "<td>";                                                                       // Spalte (Mit drop down bar)
          echo $d['Gewicht']. " Kg";
     echo "</td>";




     echo "<td>";
          echo $d['Versuch'];
     echo "</td>";



     echo "<td>";
         echo $d[$Art] . " Kg";           //$Art ist deffiniert als Reissen/Stossen
     echo "</td>";



     $TA='Technik_' . $Art;
     $GA='Gueltig_' . $Art;
     $NaHeA='NH_' . $Art;

if($WettKaArt=='M_m_T'){
     echo "<td>";
         if($stammdaten['Gerd']!=1){
                 echo'<div id="refresh"></div>';                      //JQuery Script zum st�ndigen Aktuallisieren
         }
     echo "</td>";

}


   if($WettKaArt=='M_m_T'){
     echo "<td>";

          if($stammdaten['Gerd']!=1){
                 echo'<div id="r_gueltig"></div>';                      //JQuery Script zum st�ndigen Aktuallisieren
          }else{
                 echo $d[$GA];
          }

     echo "</td>";
   }else echo "<td>&nbsp;</td>";


    if($WettKaArt=='M_m_T'){
     echo "<td>";

          echo $d[$TA];
          echo"<input type=\"submit\" style=\"float:right\" name=\"Undo\" value=\"Undo\"> ";


     echo "</td>";
//VORSICHT ES GIBT " UNDO ISSETS!!!!!!-----------------------
         if(isset($_POST['Undo']))
         {
             $x=1;
             $_SESSION['NHeber']=0;
             $_SESSION['NHVersuch']=0;
             $_SESSION['NHHgw']=0;



             $UndoKrWertung1="G_".$Art."_1";
             $UndoKrWertung2="G_".$Art."_2";
             $UndoKrWertung3="G_".$Art."_3";

             $TimeArt="time_".$Art;

             dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                          SET $TA= NULL, $GA= NULL, $NaHeA= NULL, $UndoKrWertung1= NULL, $UndoKrWertung2= NULL, $UndoKrWertung3= NULL, $TimeArt= NULL
                          WHERE IdHeber='$d[IdHeber]'
                          AND Versuch='$d[Versuch]'");
                                                                    //Damit die darauf folgenden Versuche die richtige Last haben
                                                                    //Befindet sich in nuetzliches
             einKiloSteigerungProVersuch($data_a_db['S_Db'],$d['IdHeber'],$d['Versuch'],$d[$Art],$Art);

             Einzel_Heber_Auswertung($d['IdHeber']);	//Korrigiert Auswertung //in funktionen/auswertung_funktionen.php

             clearTmpLetzterHeber($bridge);



             KampfrichterSpeicherLoeschenfuerAktuellerHeber($bridge, $wk_name, $Art, $Id, $V);
             $_SESSION['Pad-Reset-Variable-' . $bridge]=1;          //KampfrichterPadResetOrder($bridge);
                                                                    //soll erst am Ende den Befehl geben
             //F�r neuen Reload:

             ReloadVariableWkLeiterErhoehung($bridge);    //In funktionen/nuetzliches
             //Ende Reload

             
            //Für Dezentralen Steigerungs Reload:
            dez_steigerung_reload_increase_couter();

         }
     }else{  //Ende if =M_m_T

     echo "<td>";
                 //echo'<div id="r_gueltig"></div>';                      //JQuery Script zum st�ndigen Aktuallisieren
                 echo $d[$GA];
                 echo"<input type=\"submit\" style=\"float:right\" name=\"Undo\" value=\"Undo\"> ";

     echo "</td>";

         if(isset($_POST['Undo']))
         {
             $x=1;
             $_SESSION['NHeber']=0;
             $_SESSION['NHVersuch']=0;
             $_SESSION['NHHgw']=0;

             $UndoKrWertung1="G_".$Art."_1";
             $UndoKrWertung2="G_".$Art."_2";
             $UndoKrWertung3="G_".$Art."_3";

             $TimeArt="time_".$Art;


             dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                          SET $GA= NULL, $NaHeA= NULL, $UndoKrWertung1= NULL, $UndoKrWertung2= NULL, $UndoKrWertung3= NULL, $TimeArt= NULL
                          WHERE IdHeber='".$d['IdHeber']."'
                          AND Versuch='".$d['Versuch']."'");


             clearTmpLetzterHeber($bridge);

             //Damit die darauf folgenden Versuche die richtige Last haben
             //Befindet sich in nuetzliches
             einKiloSteigerungProVersuch($data_a_db['S_Db'],$d['IdHeber'],$d['Versuch'],$d[$Art],$Art);

             Einzel_Heber_Auswertung($d['IdHeber']);	//Korrigiert Auswertung

              KampfrichterSpeicherLoeschenfuerAktuellerHeber($bridge, $wk_name, $Art, $Id, $V);
             $_SESSION['Pad-Reset-Variable-' . $bridge]=1;       // KampfrichterPadResetOrder($bridge);

             //F�r neuen Reload:

             ReloadVariableWkLeiterErhoehung($bridge);    //In funktionen/nuetzliches
             //Ende Reload

             
            //Für Dezentralen Steigerungs Reload:
            dez_steigerung_reload_increase_couter();

         }

     }  //Ende if !=M_m_T

//   }   If Gerd == 0

  //F�r Reihenfolge (Order in �bersicht) damit letzter Heber wenn er fertig ist Reihenfolge 0 hat
     if($WettKaArt=='BL' && $d['Versuch']==3){
         dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                    SET Reihenfolge= '0'
                    WHERE IdHeber ='".$d['IdHeber']."'
                 ");
    }
} //while ENDE

echo "<td>";
	echo "&nbsp;";
echo "</td>";

echo "</tr>";

echo "</tbody>";

}   //Ende Letzte heber Spalte!!!!!!


if($i==1){

echo"
 <tr>
 <thead>
  <th>Id</th>
  <th>Heber</th>
  <th>Verein</th>
  <th>KöGw</th>
  <th>V</th>
  <th>Last</th>
  <th>Steigerung</th>
  <th>Gültig</th> ";

  if($WettKaArt=='M_m_T') echo '<th>Technik_Wert</th>';

echo'
  <th>Verzicht</th>
  </tr>
</thead>';

}

echo "<input type=\"text\" name=$Id id=\"$Id\" size=\"0\" style=\" display: none; \" value=\"$dsatz[IdHeber]\"readonly>";
echo "<input type=\"text\" name=$V id=\"$V\" size=\"0\" style=\" display: none; \" value=\"$dsatz[Versuch]\"readonly>";

//Reihenfolge der Heber-------------------------------------------------------------------------------------------------------------------
if($i==1){
         dbBefehl("DELETE FROM tmp_reload_$bridge");

         dbBefehl("INSERT INTO tmp_reload_$bridge (IdHeber,V,HGw,Art,Gruppe)
                      Values ('$dsatz[IdHeber]','$dsatz[Versuch]','$dsatz[$Art]','$Art','$Grp')");

         $_SESSION['GLIdHeber']=$dsatz['IdHeber'];
         $_SESSION['GLVersuch']=$dsatz['Versuch'];

}else if($i==2){
	dbBefehl("DELETE FROM tmp_uebernaechster_heber_$bridge");

	dbBefehl("INSERT INTO tmp_uebernaechster_heber_$bridge (IdHeber)
				Values ('$dsatz[IdHeber]')");
}


if($stammdaten['Wk_Art']=='BL' && $stammdaten['Block_Heben']){

    if($ReihenfolgeArray[$dsatz['IdHeber']] == NULL ){

        $ReihenfolgeArray[$dsatz['IdHeber']]=1;

        $ReihenfolgeZaehler++;

        if($ReihenfolgeZaehler<207) $UpdateReihenfolge=$ReihenfolgeZaehler;
        else $UpdateReihenfolge=0;

        dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                  SET Reihenfolge= '$UpdateReihenfolge'
                  WHERE IdHeber ='$dsatz[IdHeber]'
                 ");
    }

}




if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}


echo "<tr align=\"center\" >";


     echo "<td>";
        echo "$i";
     echo "</td>";


     echo "<td>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Name']."</span>";
                 echo $dsatz['Vorname'];

     echo "</td>";

     echo "<td>";
     echo $dsatz['Verein'];
     echo "</td>";

     echo "<td>";                                                                                                // Spalte (Mit drop down bar)
          echo $dsatz['Gewicht']." Kg";
     echo "</td>";


     echo "<td>";
          echo $dsatz['Versuch'];
     echo "</td>";


     echo "<td>";
         echo $dsatz[$Art] . " Kg";           //$Art ist deffiniert als Reissen/Stossen
     echo "</td>";


     //WkArt==0 f�r nicht BL(Wk_Art)
     //		 0 f�r BL ohne Block_Heben
     //		 1 f�r BL mit Block_Heben

     if($WettKaArt=='BL'){
     	if($stammdaten['Block_Heben']==1)
     		$WkArtNumber=1;
     	else
     		$WkArtNumber=0;
     }
     else
     	$WkArtNumber=0;


     	//GenerateSafeButton ist JS und weiter oben definiert f�hrt zu display:inline von Safe Button
     echo "<td>";
     echo"<input type=\"text\" id=\"$Steigern\" name=\"$Steigern\" size=\"2\" value=\"$dsatz[$Art]\" oninput=\"GenerateSafeButton($i)\"> ";
         echo "<button type=\"button\" id=\"$SafeButton\"  style=\"display: none; \" onclick=\"safe(this.value, " . $_SESSION['NHHgw'] . ",".$WkArtNumber.")\" value=\"$i\">Save</button>";
     echo "</td>";



     if($i== "1")
     {


     echo "<td>";

         if($stammdaten['Gerd']==1){
            echo'<div id="NH_Gerd"></div> <br>';          //Dort ist auch nheber funktion
         }

         //Leitet weiter zu ~/JS/wk_funktionen zu ~/wk_funktionen
         echo "<button type=\"button\" onclick=\"gueltig(this.value , 'Ja')\" value=\"$i\">Ja</button>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
         echo "<button type=\"button\" onclick=\"gueltig(this.value , 'Nein')\" value=\"$i\">Nein</button>";

     echo "</td>";


     }else{

         echo "<td>";
         echo "</td>";

     }

if($WettKaArt=='M_m_T'){

                                                                          //Pr�fe ob Technik enigabe nicht leer
     if((isset($_POST['Ja' . $i]))&& ( $_POST['technik' . '1'] == '' ) )
     {
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
     }



     if($i== "1")
     {

     echo "<td>";
         echo "<input type=\"text\" STYLE=\"$style; $stylezwei;\" id=\"$technik\" name=\"$technik\" size=\"6\" value=\"\">";
     echo "</td>";


     }else{

         echo "<td>";
         echo "</td>";

     }

}
echo '<td>';
         echo "<button type=\"button\" onclick=\"verzicht(this.value,0)\" value=\"$i\">Versuch</button>";
         echo "<button type=\"button\" style=\"float: right;\" onclick=\"verzicht(this.value,1)\" value=\"$i\">$Art</button>";
echo '</td>';

echo "</tr>";




$Grp=$dsatz['Gruppe'];

}   //While-Schleife zu ende
echo "</tbody>";
echo "</table>";

echo "<span id=\"tmp_aktu\"></span>";



if (isset($_POST['Button-Pad-Reset'])){

   KampfrichterPadResetOrder($bridge);
}

if (isset($_POST['Button-Anzeigen-Reload'])){

    //F�r neuen Reload:

    ReloadVariableWkLeiterErhoehung($bridge);    //In funktionen/nuetzliches
    //Ende Reload
}


if($_SESSION['Pad-Reset-Variable-' . $bridge] == 1){
   $_SESSION['Pad-Reset-Variable-' . $bridge]=0;
   KampfrichterPadResetOrder($bridge);
}



if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'anzeige_wettkampf_m_t.php'
   },0)
 </script>
";
}


echo'<div id="new_load_Wk_Leiter"></div>';

//echo "<input type=\"text\" id=\"ReloadGenerator\" name=\"ReloadGenerator\" size=\"2\" value=\"1\" oninput=\"GenerateButton('ReloadButton')\"> ";



//Auswertung von aktuellem stand:

if($stammdaten['Wk_Art'] == "M_o_T" || $stammdaten['Wk_Art'] == "M_m_T"){
    include 'funktionen/platzierungmk.php';
}else{
    include 'funktionen/platzierung.php';
}

//Um die Heber in Auswertung zu übertragen
include 'funktionen/auswertung_heber_einfügen_v02.php'; 




//Gesamt berechnung der Hochrechnung f�r Bundesliga unter funktionen/auswertung_funktionen
if($stammdaten['Wk_Art']=='BL')
    Gesamt_BL_Hochrechnung();



if(isset($_POST['ReloadButton'])){
    $x=1;
}

if($x==1){
    echo"
 <script>
 setTimeout(function(){
     location = 'anzeige_wettkampf_m_t.php'
   },0)
 </script>
";
}


// $e1 = microtime(true);

// $lauf1=$e1-$s1;
// echo 'lauf1=' . $lauf1 . '|';

// sleep(1);
// //Für neuen Reload:
// $Reload_Variable=0;
// $DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
// $ReloadIteration = mysqli_fetch_assoc($DataReload);
// $Reload_Variable=$ReloadIteration['WkLeitungIteration']+1;
// dbBefehl("UPDATE wk_reload_".$data_a_db['S_Db']."
//                                 SET WkLeitungIteration = '$Reload_Variable'
//                                 WHERE Id_Iteration ='1'
//                                 ");

    // if($bridge==1){
    //     $Reload_Variable=$ReloadIteration['Bridge1']+1;

    //     dbBefehl("UPDATE wk_reload_".$data_a_db['S_Db']."
    //                               SET Bridge1= '$Reload_Variable'
    //                               WHERE Id_Iteration ='1'
    //                               ");
    // }else{
    //     $Reload_Variable=$ReloadIteration['Bridge2']+1;

    //     dbBefehl("UPDATE wk_reload_".$data_a_db['S_Db']."
    //                               SET Bridge2= '$Reload_Variable'
    //                               WHERE Id_Iteration ='1'
    //                               ");
    // }


//Ende Reload


/*
//F�r neuen Reload:
sleep(1);
ReloadVariableWkLeiterErh�hung($bridge);    //In funktionen/nuetzliches

//Ende Reload
*/

?>

<div id="modal">
 <div class="sk-circle">
  <div class="sk-circle1 sk-child"></div>
  <div class="sk-circle2 sk-child"></div>
  <div class="sk-circle3 sk-child"></div>
  <div class="sk-circle4 sk-child"></div>
  <div class="sk-circle5 sk-child"></div>
  <div class="sk-circle6 sk-child"></div>
  <div class="sk-circle7 sk-child"></div>
  <div class="sk-circle8 sk-child"></div>
  <div class="sk-circle9 sk-child"></div>
  <div class="sk-circle10 sk-child"></div>
  <div class="sk-circle11 sk-child"></div>
  <div class="sk-circle12 sk-child"></div>
 </div>
</div>

</form>

</body>
</html>
