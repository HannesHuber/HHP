<?php
session_start();
if (empty($_SESSION['Filter_orginal']))	$_SESSION['Filter_orginal'] = "";
if (empty($_SESSION['Filter_gruppe']))	$_SESSION['Filter_gruppe'] = "";
if (empty($_SESSION['Filter_isset']))	$_SESSION['Filter_isset'] = 0;
if (empty($_SESSION['Auswahl_Land']))	$_SESSION['Auswahl_Land'] = "";

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Steigerung</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">
<style>
.tabelle td{font: bold 12px Verdana;}

#ReloadButton {
    background-color: #2f97ff;
    display:block;
    overflow:hidden;
    white-space:nowrap;
    position:fixed;
    top: 5cm;
    left:1cm;
    box-shadow: 8px 8px 8px #666;
    border-radius: 12px;
    border: 4px solid #000000;

        font: bold 30px Verdana;
        color: #ff2626;
        /* text-transform: uppercase; */
        text-align: center;
        text-decoration:none;
        padding: 3mm 4mm;
}
</style>

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>
<script type='text/javascript' src="JS/wk_funktionen.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    $("#Heber_Safe").load("JQuery/wk_loop.php");
    var refreshId = setInterval(function() {
       $("#Heber_Safe").load('JQuery/wk_loop.php?' + 1*new Date());
    }, 2000);
 });


function GenerateSafeButton(ArtPlusV,Id) {
	//alert(ArtPlusV);
    var x = document.getElementById(ArtPlusV+"Id"+Id);
    x.style.display = "inline";
}

$(document).ready(function() {
        $("#new_load_dez_steig").load("JQuery/new_load_button_dezentrale_steigerung.php");
        var refreshId = setInterval(function() {
            $("#new_load_dez_steig").load('JQuery/new_load_button_dezentrale_steigerung.php?' + 1*new Date());
        }, 1000);
    });
</script>
</head>

<body>
<span id="save"></span>

<form method="post" action="steigerung.php">
<p class="kopf"><b>Heber</b></p>
<a href="steigerung_grp.php" title="Link zum Wettkampf" id="range-logo">Gruppenauswahl</a>


<?php

ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/filter.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();

$data_a_db['S_Db']=$_SESSION['WeK'];
$wk_name=$data_a_db['S_Db'];

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

loginCheck($stammdaten);

$Verein = dbBefehl("SELECT * FROM verein");

$Grp=$_SESSION['Kor_Grp'];


$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

$stammdaten = mysqli_fetch_assoc($datenbank);

$auswerte_Gruppe=$_SESSION['Kor_Grp'];
include 'funktionen/auswertung.php';

$Grp=$_SESSION['Kor_Grp'];      //Da Auswertung auch die Variabel $Grp benutzt

//Ermittlung Reload funktion von WK-Leiter sicht:
$Reload_Variable=0;
$DataReload = dbBefehl("SELECT * FROM wk_reload_$wk_name");
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['WkLeitungIteration']=$ReloadIteration['WkLeitungIteration'];

//Bridgen ermittlung
if($WettKaArt=='BL')
    $bridge=1;
else
{
    if($WettKaArt=='M_m_T')
        $b_conn = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']."
                            WHERE Gruppen = '$Grp'
                            ");
	else
        $b_conn = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']."
                            WHERE Gruppen = '$Grp'
                            ");

	
    $dbridge = mysqli_fetch_assoc($b_conn);
    $bridge=$dbridge['Bridge'];

}
$_SESSION['HWkBridge']=$bridge;

$time=getdate();

If($stammdaten['StartNr']==1)
{
	$StringSortStartNr= "heber_".$data_a_db['S_Db']."StartNr ASC,";
}
    
$heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                   WHERE heber.IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                   AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                   AND heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                   AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
				   AND heber.IdVerein = verein.IdVerein
                   ORDER BY $StringSortStartNr heber.Name ASC
                   ");

$num_rows=mysqli_num_rows($heber);
$x=0;

filter(3);

echo"<div id=\"divid1\" class=\"examplediv\">";

$db_gruppen_zeit = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']." WHERE Gruppen = '$Grp' ");
$data_grp_zeit = mysqli_fetch_assoc($db_gruppen_zeit);

//echo "<br>";
echo "
	<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
	<colgroup>";
	if($stammdaten['StartNr']==1)
		echo "<col width=\"50\">";
	
echo"
    <col width=\"240\">
	<col width=\"280\">
    <col width=\"110\"> ";

echo"
    <col width=\"130\">
    <col width=\"130\">
    <col width=\"130\">
    <col width=\"130\">
    <col width=\"130\">
    <col width=\"130\">";

echo"
	</colgroup>
	<thead>
	 <tr><th colspan=\"3\"></th>";
	echo"<th colspan=\"3\">Reissen</th>";
	echo"<th colspan=\"3\">Stossen</th>";
	echo"</tr>";

echo"<tr>";
if($stammdaten['StartNr']==1)
{
    echo "<th>StrNr</th>";
}
echo"
	<th>Name</th>
	<th>Verein</th>
	<th>KöGw</th>";
echo"
	<th>V1</th>
	<th>V2</th>
	<th>V3</th>";
echo"
	<th>V1</th>
	<th>V2</th>
	<th>V3</th>";
echo"</tr>";
echo"</thead>";

$time=getdate();

$i = 0;

echo"<br>";

while($dsatz = mysqli_fetch_assoc($heber))     // Anlegen der Tabelle(IdHeber muss ai sein)
{
	$i = $i+1;

    $Id="Id" . $i;
    $Loeschen="Loeschen" . $i;
    $Ausserkonkurrenz="Ausserkonkurrenz" . $i;
    $Konkurrenz="Konkurrenz" . $i;
    $Gewicht="Gewicht" . $i;
    $V1R="V1R" . $i;
    $V1S="V1S" . $i;
    $V2R="V2R" . $i;
    $V2S="V2S" . $i;
    $V3R="V3R" . $i;
    $V3S="V3S" . $i;

    $V1RT="V1RT" . $i;
    $V1ST="V1ST" . $i;
    $V2RT="V2RT" . $i;
    $V2ST="V2ST" . $i;
    $V3RT="V3RT" . $i;
    $V3ST="V3ST" . $i;

    $V1RG="V1RG" . $i;
    $V1SG="V1SG" . $i;
    $V2RG="V2RG" . $i;
    $V2SG="V2SG" . $i;
    $V3RG="V3RG" . $i;
    $V3SG="V3SG" . $i;

    $V1RUG="V1RUG" . $i;
    $V1SUG="V1SUG" . $i;
    $V2RUG="V2RUG" . $i;
    $V2SUG="V2SUG" . $i;
    $V3RUG="V3RUG" . $i;
    $V3SUG="V3SUG" . $i;

    $V1RT="V1RT" . $i;
    $V1ST="V1ST" . $i;
    $V2RT="V2RT" . $i;
    $V2ST="V2ST" . $i;
    $V3RT="V3RT" . $i;
    $V3ST="V3ST" . $i;

    $V1RTimeStamp = Uhrzeit($dsatz['R_1_t']);
    $V1STimeStamp = Uhrzeit($dsatz['S_1_t']);
    $V2RTimeStamp = Uhrzeit($dsatz['R_2_t']);
    $V2STimeStamp = Uhrzeit($dsatz['S_2_t']);
    $V3RTimeStamp = Uhrzeit($dsatz['R_3_t']);
    $V3STimeStamp = Uhrzeit($dsatz['S_3_t']);

    $Safe="Safe" . $i;
    $SafeButton="SafeButton" . $i;
    $Steigern="Steigern" . $i;

	//echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"$dsatz[IdHeber]\"readonly>";
	echo "<input type=\"text\" name=$Id id=\"$Id\" size=\"0\" style=\" display: none; \" value=\"$dsatz[IdHeber]\"readonly>";

	//ungerades und gerades i indikator
	if ($i % 2 != 0) 
		echo "<tbody class=\"ungerade\">";
	else
		echo "<tbody class=\"gerade\">";

	echo "<tr align=\"center\" >";

	if($stammdaten['StartNr']==1)
	{
		echo "<td>";
		echo $dsatz['StartNr'] ;
		echo "</td>";
	}

    echo "<td>";
    echo $dsatz['Vorname'].' ';
    echo $dsatz['Name'].' '; //"<span style=\"width:100px;display:block;float:left;\"> </span>";
    // echo $dsatz[IdHeber];
    echo "</td>";
 
    echo "<td>";                                                                                                // Spalte (Mit drop down bar)
    echo $dsatz['Verein'];
	echo "</td>";
	
	echo "<td>";
    echo $dsatz['Gewicht']. " Kg";
    echo "</td>";

	//farben f�r Reissen Stossen
	$R_bg_1='#DEFFD4';
	$R_bg_2='#C9FFB9';
	$R_bg_3='#AFFF97';

	$R_bg_1_ng='#FFC7C7';
	$R_bg_2_ng='#FFB0B0';
	$R_bg_3_ng='#FF9A9A';


	for($k=1;$k<3;$k++)
	{
		if($k==1) $Art='R';
		else $Art='S';

		for($z=1;$z<4;$z++)
	{
        $V=$z;
        $ArtPlusV=$Art.'_'.$V;
        $ArtPlusVId=$Art.'_'.$V.'Id'.$i;
        $ArtPlusVIdInput='Input'.$Art.'_'.$V.'Id'.$i;

        $HebungAbsolviert=$Art.'_'.$V.'_'."G";
        $Hgw=$dsatz[$ArtPlusV];

        if($dsatz[$HebungAbsolviert]=='Ja')
		{
            $R_bg='#AFFF97';
            $ReadonlyString="Readonly";
        }
		else
		if($dsatz[$HebungAbsolviert]=='Nein')
		{
            $R_bg='#FF9A9A';
            $ReadonlyString="Readonly";
        }
		else
		{
            $R_bg="";
            $ReadonlyString="";
        }

        $BgColourString='bgcolor="'.$R_bg.'"';

        echo "<td $BgColourString>";
        echo "<input type=\"text\" id=\"$ArtPlusVIdInput\" name=\"$ArtPlusV\" size=\"5\" value=\"$Hgw\" oninput=\"GenerateSafeButton('".$ArtPlusV."',".$i.")\" $ReadonlyString> ";
        echo "<button type=\"button\" id=\"$ArtPlusVId\"  style=\"display: none; \" onclick=\"Steigerung_safe(this.value,'".$Art."',".$V.")\" value=\"$i\">&nbsp&nbsp&nbspSafe&nbsp&nbsp&nbsp</button>";
        echo "</td>";

    }

	}

		echo "</tr>";

		if(	(isset($_POST['V1SG' . $i])) || (isset($_POST['V2SG' . $i])) || (isset($_POST['V3SG' . $i])) || 
		(isset($_POST['V1RG' . $i])) ||	(isset($_POST['V2RG' . $i])) || (isset($_POST['V3RG' . $i])) ||
		(isset($_POST['V1SUG' . $i])) || (isset($_POST['V2SUG' . $i])) ||(isset($_POST['V3SUG' . $i])) || 
		(isset($_POST['V1RUG' . $i])) || (isset($_POST['V2RUG' . $i])) || (isset($_POST['V3RUG' . $i])) )
	{

		$x=1;

		if(isset($_POST['V1SG' . $i]))
		{
			$Ver=1;
			$Guel='Ja';
			$Art='Stossen';
		}

		if(isset($_POST['V2SG' . $i]))
		{
			$Ver=2;
			$Guel='Ja';
			$Art='Stossen';
		}

		if(isset($_POST['V3SG' . $i]))
		{
			$Ver=3;
			$Guel='Ja';
			$Art='Stossen';
		}

		if(isset($_POST['V1RG' . $i]))
		{
			$Ver=1;
			$Guel='Ja';
			$Art='Reissen';
		}

		if(isset($_POST['V2RG' . $i]))
		{
			$Ver=2;
			$Guel='Ja';
			$Art='Reissen';
		}

		if(isset($_POST['V3RG' . $i]))
		{
			$Ver=3;
			$Guel='Ja';
			$Art='Reissen';
		}

		if(isset($_POST['V1SUG' . $i]))
		{
			$Ver=1;
			$Guel='Nein';
			$Art='Stossen';
		}

		if(isset($_POST['V2SUG' . $i]))
		{
			$Ver=2;
			$Guel='Nein';
			$Art='Stossen';
		}

		if(isset($_POST['V3SUG' . $i]))
		{
			$Ver=3;
			$Guel='Nein';
			$Art='Stossen';
		}

		if(isset($_POST['V1RUG' . $i]))
		{
			$Ver=1;
			$Guel='Nein';
			$Art='Reissen';
		}

		if(isset($_POST['V2RUG' . $i]))
		{
			$Ver=2;
			$Guel='Nein';
			$Art='Reissen';
		}

		if(isset($_POST['V3RUG' . $i]))
		{
			$Ver=3;
			$Guel='Nein';
			$Art='Reissen';
		}
  
		if($stammdaten['Wk_Art']=='M_m_T')
		{
                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V' . $Ver . 'R' . $i] . "', Stossen= '" . $_POST['V' . $Ver . 'S' . $i] . "',
                              Technik_Reissen= '" . $_POST['V' . $Ver . 'RT' . $i] . "', Technik_Stossen= '" . $_POST['V' . $Ver . 'ST' . $i] . "',
                              Gueltig_$Art='$Guel'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '$Ver'
                              ");
		}
		else
		{
                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V' . $Ver . 'R' . $i] . "', Stossen= '" . $_POST['V' . $Ver . 'S' . $i] . "',
                              Gueltig_$Art='$Guel'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '$Ver'
                              ");
		}
	}

}

echo "</tbody>";
echo "</table>";

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'wettkampf_korrektur.php'
   },0)
 </script>
";
}

//Für Reload:
$Reload_Variable=0;
$DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
$ReloadIteration = mysqli_fetch_assoc($DataReload);

//Ende Reload

echo'<div id="new_load_dez_steig"></div>';

sleep(1);
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
