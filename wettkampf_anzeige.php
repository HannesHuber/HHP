<?php
session_start();
if (empty($_SESSION['Wk_Grp']))				$_SESSION['Wk_Grp'] = 0;
if (empty($_SESSION['Wk_SoR']))				$_SESSION['Wk_SoR'] = '';
if (empty($_SESSION['Ueb_Bridge']))			$_SESSION['Ueb_Bridge'] = 0;
if (empty($_SESSION['Ans_Bridge'])) 		$_SESSION['Ans_Bridge'] = 0;
if (empty($_SESSION['HR_Bridge']))			$_SESSION['HR_Bridge'] = 0;
if (empty($_SESSION['KR1_Bridge'])) 		$_SESSION['KR1_Bridge'] = 0;
if (empty($_SESSION['KR2_Bridge'])) 		$_SESSION['KR2_Bridge'] = 0;
if (empty($_SESSION['KR3_Bridge'])) 		$_SESSION['KR3_Bridge'] = 0;
if (empty($_SESSION['Alt_Ueb']))			$_SESSION['Alt_Ueb'] = 0;
if (empty($_SESSION['Zeitnehmer_bridge']))	$_SESSION['Zeitnehmer_bridge'] = 0;
if (empty($_SESSION['ZeitAnzeige_bridge'])) $_SESSION['ZeitAnzeige_bridge'] = 0;
if (empty($_SESSION['Alt_Ueb_mk']))			$_SESSION['Alt_Ueb_mk'] = 0;
if (empty($_SESSION['Grp_Ueb_mk'])) 		$_SESSION['Grp_Ueb_mk'] = 0;
if (empty($_SESSION['Jury_Bridge']))		$_SESSION['Jury_Bridge'] = 0;
if (empty($_SESSION['HeberRaumSolo']))		$_SESSION['HeberRaumSolo'] = 0;

if (empty($_SESSION['EinzelGruppenUebersicht']))	$_SESSION['EinzelGruppenUebersicht'] = 0;
if (empty($_SESSION['ReloadIterationWkLeiter']))	$_SESSION['ReloadIterationWkLeiter'] = 0;

$_SESSION['Steigerung']  = 0;
$_SESSION['IdHeber']     = 0;
$_SESSION['WkStart']     = 0;
$_SESSION['NHeber']      = 0;
$_SESSION['NHVersuch']   = 0;
$_SESSION['Undo']        = 0;
$_SESSION['NHHgw']       = 0;
$_SESSION['ReloadIterationWkLeiter']=0;
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Wettkampf Anzeige</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">

<script type="text/javascript">
function popup (url)
{

 var w = "screen.width";
 var h = "screen.height";

 fenster = window.open(url,"windowname4", "width=900, height=700, toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1");

 fenster.focus();
 return false;
}
</script>

<script type='text/javascript' src="JS/nuetzliches.js"></script>

</head>

<body>
<form method="post" action="wettkampf_anzeige.php"><a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>
<?php

ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];


$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dsatz = mysqli_fetch_assoc($datenbank);

if($dsatz['Wk_Art']!='BL') $Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

$stringGrp=ArrayWiegelistenGruppen();

echo"<p class=\"kopf\" align=\"left\"><font size=\"10\"><b>Wettkampf Anzeige</font></b></p>";

if($_SESSION['user']==1 || $dsatz['passwort']=='')
{

	if(((isset($_POST['Reissen']))||(isset($_POST['Stossen'])))&&($_POST['Auswahl']==''))
	{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
	}

	if($dsatz['Wk_Art']!='BL')
	{
		echo"<p class=\"unter\">Start Gewichtheben nach Gruppe:";
		echo" ";
		echo "<select id=\"Auswahl\" name=\"Auswahl\" STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";
		echo "<option value=\"\" selected>Wählen...</option>";
		
		if($dsatz['Wk_Art']!='BL')
		{
			while($dataAuswahl = mysqli_fetch_assoc($Gruppen))
			{
				$merke=str_replace(' ','_,_',$dataAuswahl['Gruppen']);
				echo "<option value=$merke>".$dataAuswahl['Gruppen']."</option>";
			}
		}else
		for($x=1;$x<=$dsatz['Verein_Anzahl'];$x++)
			
		echo "<option value=$x>$x</option>";
		echo "</select>";
	}
	else
	{
		echo"<p class=\"unter\">Start Gewichtheben:";
		echo" ";
		echo "<select id=\"Auswahl\" name=\"Auswahl\" style=\"display: none;\"  class=\"Auswahl\">";
		echo "<option style=\"display: none;\" value=1></option>";
		echo "</select>";
	}

    $GruppenB1=ArrayBridgenErrorGruppe(1);     //Aus funktionen/nuetzliches.php
    $GruppenB2=ArrayBridgenErrorGruppe(2);

	$query="SELECT * FROM user_blocker_".$data_a_db['S_Db'];
    $DataStartError=dbBefehl($query);
    $StartStand=mysqli_fetch_assoc($DataStartError);
	
		
	echo" ";	
    echo "<button type=\"button\" id=\"Reissen\"
         onclick=\"weiterleitungRoS('Auswahl',this.value,0,'$stringGrp','".$data_a_db['S_Db']."','$GruppenB1','$GruppenB2',".$StartStand['WkBridge1'].",".$StartStand['WkBridge2'].")\"
         value=\"anzeige_wettkampf_m_t.php\">Reissen</button>&nbsp";
         
	echo "<button type=\"button\" id=\"Stossen\"
         onclick=\"weiterleitungRoS('Auswahl',this.value,1,'$stringGrp','".$data_a_db['S_Db']."','$GruppenB1','$GruppenB2',".$StartStand['WkBridge1'].",".$StartStand['WkBridge2'].")\"
         value=\"anzeige_wettkampf_m_t.php\">Stossen</button></p>";
	echo"<br>";
	
}
else
{
      echo 'Bevor der Wettkampf gestartet werden kann bitte einloggen!';
}

if((isset($_POST['HR']))&&($_POST['Auswahl_HR']==''))
{
    $sB1="border: 1px solid #FF0000";
    $sB2="background-color: #FAFFAD";
}

echo"<p class=\"unter\">Anzeige Aufwärm-Raum:";
echo"  ";
echo "<select name=\"Auswahl_HR\" STYLE=\"$sB1; $sB2;\" size=\"1\" class=\"Auswahl\"><br>";

echo "<option value=\"\" selected>Bridge wählen</option>";

for($ue=1;$ue<=2;$ue++)
{
	echo "<option value=$ue>$ue</option>";
}

echo "</select>";
echo"<input type=\"submit\" name=\"HR\" value=\"Aufwärm-Raum\">";
echo"<input type=\"submit\" name=\"HR_solo\" value=\"Nur aktuelle Grp und Art\">";


if((isset($_POST['Ansager']))&&($_POST['Auswahl_Ansager']==''))
{
	$sC1="border: 2px solid #FF0000";
	$sC2="background-color: #FAFFAD";
}
	
echo"<p class=\"unter\">Anzeige  Hallensprecher :";
echo"  ";
echo "<select name=\"Auswahl_Ansager\" STYLE=\"$sC1; $sC2;\" size=\"1\" class=\"Auswahl\"><br>";
echo "<option value=\"\" selected>Bridge wählen</option>";

for($ue=1;$ue<=2;$ue++)
{
	echo "<option value=$ue>$ue</option>";
}
	
echo "</select>";
echo"<input type=\"submit\" name=\"Ansager\" value=\"Ansager\">";
echo"<br>";


if( ( isset($_POST['Uebersicht'])  || isset($_POST['Alt_Uebersicht']) 
		|| isset($_POST['Uebersicht2'])|| isset($_POST['Alt_Uebersicht2']) )&&($_POST['Auswahl_Uebersicht']==''))
{
         $sD1="border: 2px solid #FF0000";
         $sD2="background-color: #FAFFAD";
}

echo"<br>";	
echo"<p class=\"unter\">Anzeige Übersicht ges:";
echo"  ";
echo "<select name=\"Auswahl_Uebersicht\" STYLE=\"$sD1; $sD2;\" size=\"1\" class=\"Auswahl\"><br>";
echo "<option value=\"\" selected>Bridge wählen</option>";

for($ue=1;$ue<=2;$ue++)
{
	echo "<option value=$ue>$ue</option>";
}
echo "</select>";
echo"<input type=\"submit\" name=\"Uebersicht\" value=\"Übersicht\">";
echo"<input type=\"submit\" name=\"Alt_Uebersicht\" value=\"Alternative Übersicht\">";
echo"<br>";
		
//Weil in BL kann Übersicht über alle Gruppen gehen
if($dsatz['Wk_Art']=='BL')
{
	echo"<p class=\"unter\">Anzeige Gruppe aktuell:";
	echo"  ";
	echo"<input type=\"submit\" name=\"Uebersicht2\" value=\"Übersicht\">";
	echo"<input type=\"submit\" name=\"Alt_Uebersicht2\" value=\"Alternative Übersicht\">";
	echo"<br>";
}

if($dsatz['Wk_Art']=='M_m_T' || $dsatz['Wk_Art']=='M_o_T')
{
	if((isset($_POST['Uebersicht_mk']) || isset($_POST['Alt_Uebersicht_mk']))&&($_POST['Auswahl_Uebersicht_mk']==''))
	{
		$sD1_mk="border: 2px solid #FF0000";
		$sD2_mk="background-color: #FAFFAD";
	}

	$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

	echo"<p class=\"unter\">Übersicht Mehrkampf :";
	echo"  ";
	echo "<select id=\"Auswahl_Uebersicht_mk\" name=\"Auswahl_Uebersicht_mk\" STYLE=\"$sD1_mk; $sD2_mk;\" size=\"1\" class=\"Auswahl\"><br>";
	echo"  ";
	echo "<option value=\"\" selected>Gruppe...</option>";
	
	while($dataAuswahl = mysqli_fetch_assoc($Gruppen))
	{
		$merke=str_replace(' ','_,_',$dataAuswahl['Gruppen']);
		echo "<option value=$merke>".$dataAuswahl['Gruppen']."</option>";
	}
	
	echo"<input type=\"submit\" name=\"Uebersicht_mk\" value=\"Übersicht Mk\">";
	echo"<input type=\"submit\" name=\"Alt_Uebersicht_mk\" value=\"Alternative Übersicht Mk\">";
	echo"<br>";
}

if((isset($_POST['Anzeige']))&&($_POST['Auswahl_Anzeige']==''))
{
	$AnzCou="border: 2px solid #FF0000";
    $AnzCou2="background-color: #FAFFAD";
}

echo"<br>";

echo"<p class=\"unter\">Anzeige aktueller Heber:";
echo"  ";
echo "<select name=\"Auswahl_Anzeige\" STYLE=\"$AnzCou; $AnzCou2;\" size=\"1\" class=\"Auswahl\"><br>";
echo "<option value=\"\" selected>Bridge wählen</option>";

for($ue=1;$ue<=2;$ue++)
{
	echo "<option value=$ue>$ue</option>";
}

echo "</select>";
echo"<input type=\"submit\" name=\"Anzeige\" value=\"Anzeige\">";

if((isset($_POST['hantelbeladung']))&&($_POST['Auswahl_hantelbeladung']==''))
{
    $HnCou="border: 2px solid #FF0000";
    $HnCou2="background-color: #FAFFAD";
}

echo"<p class=\"unter\">Anzeige Hantelbeladung:";
echo"  ";
echo "<select name=\"Auswahl_hantelbeladung\" STYLE=\"$HnCou; $HnCou2;\" size=\"1\" class=\"Auswahl\"><br>";
echo "<option value=\"\" selected>Bridge wählen</option>";

for($ue=1;$ue<=2;$ue++)
{
    echo "<option value=$ue>$ue</option>";
}

echo "</select>";
echo"<input type=\"submit\" name=\"hantelbeladung\" value=\"Hantelbeladung\">";


if($dsatz['Zeitnehmer']=='1')
{
	if((isset($_POST['zeitnehmer']))&&($_POST['Auswahl_zeitnehmer']==''))
	{
		$srN1="border: 2px solid #FF0000";
		$srN2="background-color: #FAFFAD";
	}
    //echo"<p class=\"unter\">Anzeige Zeitnehmer-Pad :</p>";
	echo"<p class=\"unter\">Zeitnehmer-Pad:";
	echo"  ";
    echo "<select name=\"Auswahl_zeitnehmer\" STYLE=\"srN1; $srN2;\" size=\"1\" class=\"Auswahl\"><br>";
	echo "<option value=\"\" selected>Bridge wählen</option>";
	
	for($ue=1;$ue<=2;$ue++)
	{
		echo "<option value=$ue>$ue</option>";
    }
    echo "</select>";
	echo"<input type=\"submit\" name=\"zeitnehmer\" value=\"Zeitnehmer-Pad\">";	
}

if((isset($_POST['zeit_anzeige']))&&($_POST['Auswahl_zeit_anzeige']==''))
{
		$srNZ1="border: 2px solid #FF0000";
		$srNZ2="background-color: #FAFFAD";
}
echo"<br>";
echo"<p class=\"unter\">Zeit-Anzeige";
echo"  ";
echo "<select name=\"Auswahl_zeit_anzeige\" STYLE=\"srNZ1; $srNZ2;\" size=\"1\" class=\"Auswahl\"><br>";
echo "<option value=\"\" selected>Bridge wählen</option>";

for($ue=1;$ue<=2;$ue++)
{
	echo "<option value=$ue>$ue</option>";
}

echo "</select>";
echo"<input type=\"submit\" name=\"zeit_anzeige\" value=\"Zeit-Anzeige\">";

if($dsatz['Gerd']==1 && $dsatz['HHP_Hardware']==0)
{
	if(((isset($_POST['KR1']))||(isset($_POST['KR2']))||(isset($_POST['KR3'])))&&($_POST['Auswahl_KR']==''))
	{
         $sE1="border: 2px solid #FF0000";
         $sE2="background-color: #FAFFAD";
	}
    echo"<p class=\"unter\">Kampfrichter-Pads</p>";
    echo "<select name=\"Auswahl_KR\" STYLE=\"$sE1; $sE2;\" size=\"1\" class=\"Auswahl\"><br>";
    echo "<option value=\"\" selected>Bridge wählen</option>";

    for($ue=1;$ue<=2;$ue++)
	{
		echo "<option value=$ue>$ue</option>";
    }
	echo "</select>";

    for($kr_vari=1;$kr_vari<=$dsatz['Kampfrichter'];$kr_vari++)
	{
        $Kr="KR" . $kr_vari;
        echo"<input type=\"submit\" name=\"$Kr\" value=\"Kampfrichter $kr_vari\">";
    }
}

if($dsatz['Gerd']==1)
{
	if(((isset($_POST['KR1']))||(isset($_POST['KR2']))||(isset($_POST['KR3'])))&&($_POST['Auswahl_KR']==''))
	{
		$sJ1="border: 2px solid #FF0000";
		$sJ2="background-color: #FAFFAD";
	}

	echo"<p class=\"unter\">Jury-Pad</p>";
	echo "<select name=\"Auswahl_J\" STYLE=\"$sJ1; $sJ2;\" size=\"1\" class=\"Auswahl\"><br>";
	echo "<option value=\"\" selected>Bridge wählen</option>";

	for($ue=1;$ue<=2;$ue++)
	{
		echo "<option value=$ue>$ue</option>";
	}

	echo "</select>";
	echo"<input type=\"submit\" name=\"Button_Jury\" value=\"Jury\">";
}

/*
if($dsatz['RelativArt']!=1){
    echo"<p class=\"unter\">Wk-Übersicht</p>";
    echo"<input type=\"submit\" name=\"Wk-Uebersicht\" value=\"Wk-Übersicht\">";
}
if(isset($_POST['Wk-Uebersicht']))
{
    echo"
 <script>
 setTimeout(function(){
     location = 'gesamt_wk_pkt.php'
   },0)
 </script>
";
}
*/

if((isset($_POST['Reissen']))&&($_POST['Auswahl']!=''))
{
         $_SESSION['Wk_Grp']=$_POST['Auswahl'];
         $_SESSION['Wk_SoR']=$_POST['Reissen'];

	echo"
	<script>
	setTimeout(function()
	{
		location = 'anzeige_wettkampf_m_t.php'
	},0)
	</script>";
}

if((isset($_POST['Stossen']))&&($_POST['Auswahl']!=''))
{

         $_SESSION['Wk_Grp']=$_POST['Auswahl'];
         $_SESSION['Wk_SoR']=$_POST['Stossen'];
	
	echo"
	<script>
	setTimeout(function()
	{
     location = 'anzeige_wettkampf_m_t.php'
	},0)
	</script>
	";
}

if((isset($_POST['Uebersicht']) || isset($_POST['Uebersicht2']))&&($_POST['Auswahl_Uebersicht']!=''))
{
$_SESSION['Alt_Ueb']=0;

if($_POST['Auswahl_Uebersicht']==1)$U_bridge='';
else $U_bridge='2';

if(isset($_POST['Uebersicht2'])){
    $_SESSION['EinzelGruppenUebersicht']=1;
}else{
    $_SESSION['EinzelGruppenUebersicht']=0;
}

echo"
 <script>
 setTimeout(function(){
     location = 'uebersicht$U_bridge.php'
   },0)
 </script>
";
}


if((isset($_POST['Alt_Uebersicht']) || isset($_POST['Alt_Uebersicht2']))&&($_POST['Auswahl_Uebersicht']!=''))
{
$_SESSION['Alt_Ueb']=1;

if($_POST['Auswahl_Uebersicht']==1)$U_bridge='';
else $U_bridge='2';

if(isset($_POST['Alt_Uebersicht2'])){
    $_SESSION['EinzelGruppenUebersicht']=1;
}else{
    $_SESSION['EinzelGruppenUebersicht']=0;
}

echo"
 <script>
 setTimeout(function(){
     location = 'uebersicht$U_bridge.php'
   },0)
 </script>
";
}


if((isset($_POST['Uebersicht_mk']))&&($_POST['Auswahl_Uebersicht_mk']!=''))
{
	$_SESSION['Alt_Ueb_mk']=0;

	$_SESSION['Grp_Ueb_mk']=$_POST['Auswahl_Uebersicht_mk'];

	echo"
	<script>
	setTimeout(function(){
	location = 'uebersicht_mk.php'
	},0)
	</script>
	";
}

if((isset($_POST['Alt_Uebersicht_mk']))&&($_POST['Auswahl_Uebersicht_mk']!=''))
{
	$_SESSION['Alt_Ueb_mk']=1;

	$_SESSION['Grp_Ueb_mk']=$_POST['Auswahl_Uebersicht_mk'];

	echo"
	<script>
	setTimeout(function(){
	location = 'uebersicht_mk.php'
},0)
</script>
";
}



if((isset($_POST['Ansager']))&&($_POST['Auswahl_Ansager']!=''))
{

if($_POST['Auswahl_Ansager']==1)$A_bridge='';
else $A_bridge='2';

echo"
 <script>
 setTimeout(function(){
     location = 'ansager$A_bridge.php'
   },0)
 </script>
";
}

if((isset($_POST['HR']) || isset($_POST['HR_solo']))&&($_POST['Auswahl_HR']!=''))
{
    if(isset($_POST['HR_solo'])) $_SESSION['HeberRaumSolo']=1;
    else $_SESSION['HeberRaumSolo']=0;


	if($_POST['Auswahl_HR']==1){
		$HR_bridge='';
		dbBefehl("UPDATE tmp_anzeige_wk_1
					SET Wk_Nummer= '" . $data_a_db['S_Db']. "'
					");
	}else{
		$HR_bridge='2';
		dbBefehl("UPDATE tmp_anzeige_wk_2
					SET Wk_Nummer= '" . $data_a_db['S_Db']. "'
					");
	}

echo"
 <script>
 setTimeout(function(){
     location = 'heber_raum$HR_bridge.php'
   },0)
 </script>
";
}



if((isset($_POST['Anzeige']))&&($_POST['Auswahl_Anzeige']!=''))
{

if($_POST['Auswahl_Anzeige']==1)$Anzeige_bridge='1';
else $Anzeige_bridge='2';

echo"
 <script>
 setTimeout(function(){
     location = 'heber_anzeige_$Anzeige_bridge.php'
   },0)
 </script>
";
}


if((isset($_POST['hantelbeladung']))&&($_POST['Auswahl_hantelbeladung']!=''))
{

    if($_POST['Auswahl_hantelbeladung']==1)$hantelbeladung_bridge='1';
    else $hantelbeladung_bridge='2';

    echo"Hallo";


    echo"
 <script>
 setTimeout(function(){
     location = 'hantelbeladung".$hantelbeladung_bridge.".php'
   },0)
 </script>
";
}



if((isset($_POST['KR1']))&&($_POST['Auswahl_KR']!=''))
{
    $_SESSION['KR1_Bridge']=$_POST['Auswahl_KR'];

echo"
 <script>
 setTimeout(function(){
     location = 'kampfrichter1.php'
   },0)
 </script>
";
}
if((isset($_POST['KR2']))&&($_POST['Auswahl_KR']!=''))
{
    $_SESSION['KR2_Bridge']=$_POST['Auswahl_KR'];

echo"
 <script>
 setTimeout(function(){
     location = 'kampfrichter2.php'
   },0)
 </script>
";
}
if((isset($_POST['KR3']))&&($_POST['Auswahl_KR']!=''))
{
    $_SESSION['KR3_Bridge']=$_POST['Auswahl_KR'];

echo"
 <script>
 setTimeout(function(){
     location = 'kampfrichter3.php'
   },0)
 </script>
";
}

if((isset($_POST['Kr_A_Senden']))&&($_POST['AnzeigeKR']!=''))
{
    $_SESSION['KR_A_Bridge']=$_POST['AnzeigeKR'];

echo"
 <script>
 setTimeout(function(){
     location = 'kr_anzeige.php'
   },0)
 </script>
";
}

if((isset($_POST['Button_Jury']))&&($_POST['Auswahl_J']!=''))
{
	$_SESSION['Jury_Bridge']=$_POST['Auswahl_J'];

	echo"
 <script>
 setTimeout(function(){
     location = 'jury.php'
   },0)
 </script>
";
}

if((isset($_POST['zeitnehmer']))&&($_POST['Auswahl_zeitnehmer']!=''))
{
    $_SESSION['Zeitnehmer_bridge']=$_POST['Auswahl_zeitnehmer'];

echo"
 <script>
 setTimeout(function(){
     location = 'zeitnehmer.php'
   },0)
 </script>
";
}




if((isset($_POST['zeit_anzeige']))&&($_POST['Auswahl_zeit_anzeige']!=''))
{
	$_SESSION['ZeitAnzeige_bridge']=$_POST['Auswahl_zeit_anzeige'];

	echo"
 <script>
 setTimeout(function(){
     location = 'zeit_anzeige.php'
   },0)
 </script>
";
}


?>


<span id="weiterleitung"></span>

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
