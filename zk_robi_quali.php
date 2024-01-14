<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>

<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl.css" />
<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl_print.css" media="print" />

</head>


<body>

<form method="post" action="zk_robi.php">

<a href="zk_ausw_gruppe.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>

<?php

ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

$Verein = dbBefehl("SELECT * FROM verein");

$A_Kl = dbBefehl("SELECT * FROM alters_klassen");

$Grp=$_SESSION['Aus_Grp'];

$time=getdate();

$StringDate=mysqlDateToDate($stammdaten['Datum']);
echo "<p class=\"kopf\"><b>" . $stammdaten['Meisterschaft'] . "in" . $stammdaten['Ort'] . "am" . $StringDate . "</b></p>";

$auswerte_Gruppe=0;						//Damit in Auswertung �ber alle Gruppen Ausgewertet wird
include 'funktionen/auswertung.php';   //Keine Funktion sondern einfach php einschub
include 'funktionen/platzierung.php';

$AlKl=$_SESSION['Aus_L_AlKl'];
$Grp=$_SESSION['Aus_R_Grp'];



	$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber.IdVerein = verein.IdVerein
            AND auswertung_".$data_a_db['S_Db'].".Platz_Robi_Quali  IS NOT NULL
			ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
			auswertung_".$data_a_db['S_Db'].".Platz_Robi_Quali = 0, auswertung_".$data_a_db['S_Db'].".Platz_Robi_Quali ASC
			");


echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"250\">";
  if($stammdaten['International']=='0') echo "<col width=\"200\">";
  else echo "<col width=\"200\">";
  if($stammdaten['International']=='0') echo "<col width=\"50\">";
  //<col width=\"100\">
    echo "<col width=\"50\">
    <col width=\"50\">

    <col width=\"100\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">

  </colgroup>


<thead>

 <tr>
  <th>Name</th>";
  if($stammdaten['International']=='0') echo '<th>Verein</th>';
  else echo '<th>Staat</th>';
  if($stammdaten['International']=='0') echo '<th>Land</th>';
  echo "<th>W/M</th>
  <th>JG</th>
  <th>Kö-Gw</th>";
  //<th>Rl-Gw</th>
  echo"<th colspan=\"3\">Reissen</th>
  <th colspan=\"3\">Stossen</th>
  <th>ZK</th>
  <th>Quali Pkt</th>
  <th>Platz</th>

 </tr>
</thead>
";

echo"<tbody>";




$Al_Kl='';
$Platz=0;
$Relativ_P=0;
$z=0;
$Geschlecht='Männlich';
$ZK_ueber_AlKl_einzeln=1;

if($stammdaten['Wk_Art']=='ZK')
  if($stammdaten['Rel_Sin_AlKl']=='0') $ZK_ueber_AlKl_einzeln=0;

while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{

if($ZK_ueber_AlKl_einzeln==1){

if($dsatz_aus['Al_Kl'] != $Al_Kl && $_SESSION['GesGrp']==0)
{

if($stammdaten['EineKlasse']==0){     //Nur f�r ohne eine Klasse


echo "<tr Id=\"Klasse\">";
  if($stammdaten['International']=='0')
     echo "<td colspan=\"6\">";
  else
     echo "<td colspan=\"5\">";

         echo $dsatz_aus['Al_Kl'];

     echo "</td>";

     echo "<td>";

         echo"R1";

     echo "</td>";

     echo "<td>";

         echo"R2";

     echo "</td>";

     echo "<td>";

         echo"R3";

     echo "</td>";

     echo "<td>";

         echo"S1";

     echo "</td>";

     echo "<td>";

         echo"S2";

     echo "</td>";

     echo "<td>";

         echo"S3";

     echo "</td>";

     echo "<td>";
     echo "</td>";

     echo "<td>";
     echo "</td>";

     echo "<td>";
     echo "</td>";


echo "</tr>";

}                //Ende ohne Eine Klasse

}else{


if($dsatz_aus['Geschlecht'] != $Geschlecht){


echo "<tr id=\"zwischenraum\">";
   if($stammdaten['International']=='0')
     echo "<td colspan=\"15\">";
   else
     echo "<td colspan=\"14\">";

     echo "</td>";


echo "</tr>";
}                 //Ende Geschlecht

}             //Ende zwischenzeile

}               //Ende $ZK_ueber_AlKl_einzeln


if($_SESSION['Auswahl_Relativ_pro_JG']!=''){	//Speziell f�r Relativ pro JG
	if($dsatz_aus['Jahrgang'] != $Jahrgang)
	{
		echo "<tr Id=\"Klasse\">";
		if($stammdaten['International']=='0')
			echo "<td colspan=\"6\">";
			else
				echo "<td colspan=\"5\">";

				echo $dsatz_aus['Jahrgang'];

				echo "</td>";

				echo "<td>";

				echo"R1";

				echo "</td>";

				echo "<td>";

				echo"R2";

				echo "</td>";

				echo "<td>";

				echo"R3";

				echo "</td>";

				echo "<td>";

				echo"S1";

				echo "</td>";

				echo "<td>";

				echo"S2";

				echo "</td>";

				echo "<td>";

				echo"S3";

				echo "</td>";

				echo "<td>";
				echo "</td>";

				echo "<td>";
				echo "</td>";

				echo "<td>";
				echo "</td>";


				echo "</tr>";
	}else{


		if($dsatz_aus['Geschlecht'] != $Geschlecht){


			echo "<tr id=\"zwischenraum\">";
			if($stammdaten['International']=='0')
				echo "<td colspan=\"15\">";
				else
					echo "<td colspan=\"14\">";

					echo "</td>";


					echo "</tr>";
		}                 //Ende Geschlecht
	}
}

echo "<tr>";




     echo "<td>";



                 echo "<span style=\"width:80px;display:block;float:left;\"> ".$dsatz_aus['Name']." </span>";

                 echo $dsatz_aus['Vorname'];




     echo "</td>";




     echo "<td>";                                                                                                // Spalte (Mit drop down bar)
          if($stammdaten['International']=='0') echo $dsatz_aus['Verein'];
          else echo IdStaatzuStaat ($dsatz_aus['IdStaat']);
     echo "</td>";

     $Verein=dbBefehl("SELECT * FROM verein WHERE IdVerein='" . $dsatz_aus['IdVerein']. "' ");
     $dataVerein = mysqli_fetch_assoc($Verein);
     $Land=dbBefehl("SELECT * FROM laender WHERE Idlaender='" . $dataVerein['IdLaender']. "' ");
     $dataLand= mysqli_fetch_assoc($Land);

     if($stammdaten['International']==0)      echo '<td>' . $dataLand['laender'] . '</td>';


     echo "<td>";
          if($dsatz_aus['Geschlecht']=='Weiblich') $MW='W';
          else $MW='M';
          echo $MW;
     echo "</td>";



     echo "<td>";
         echo $dsatz_aus['Jahrgang'];
     echo "</td>";



     echo "<td>";
         echo $dsatz_aus['K_Gewicht'] . " Kg";
     echo "</td>";

/*
     echo "<td>";
         echo "$dsatz_aus[R_Gewicht] Kg";
     echo "</td>";
*/

     $mitZeit=0;

     if($dsatz_aus['R_1_Ver']==0){

     	if($dsatz_aus['R_1_G'] == "Ja")
     	{
     		echo "<td>";
     	}else{
     		echo "<td class=\"durchstrich\">";
     	}
     	echo $dsatz_aus['R_1'];
     }else
     	echo "<td>Ver";

     	echo "</td>";

     	if($mitZeit=='1'){
     		echo "<td>";
     		echo Uhrzeit($dsatz_aus['R_1_t']);
     		echo "</td>";
     	}


     	if($dsatz_aus['R_2_Ver']==0){
     		if($dsatz_aus['R_2_G'] == "Ja")
     		{
     			echo "<td>";
     		}else{

     			echo "<td class=\"durchstrich\">";
     		}
     		echo $dsatz_aus['R_2'];
     	}else
     		echo "<td>Ver";

     		echo "</td>";

     		if($mitZeit=='1'){
     			echo "<td>";
     			echo Uhrzeit($dsatz_aus['R_2_t']);
     			echo "</td>";
     		}

     		if($dsatz_aus['R_3_Ver']==0){
     			if($dsatz_aus['R_3_G'] == "Ja")
     			{
     				echo "<td>";
     			}else{

     				echo "<td class=\"durchstrich\">";
     			}


     			echo $dsatz_aus['R_3'];
     		}else
     			echo "<td>Ver";

     			echo "</td>";

     			if($mitZeit=='1'){
     				echo "<td>";
     				echo Uhrzeit($dsatz_aus['R_3_t']);
     				echo "</td>";
     			}

     			if($dsatz_aus['S_1_Ver']==0){
     				if($dsatz_aus['S_1_G'] == "Ja")
     				{
     					echo "<td>";
     				}else{

     					echo "<td class=\"durchstrich\">";
     				}


     				echo $dsatz_aus['S_1'];
     			}else
     				echo "<td>Ver";

     				echo "</td>";

     				if($mitZeit=='1'){
     					echo "<td>";
     					echo Uhrzeit($dsatz_aus['S_1_t']);
     					echo "</td>";
     				}

     				if($dsatz_aus['S_2_Ver']==0){
     					if($dsatz_aus['S_2_G'] == "Ja")
     					{
     						echo "<td>";
     					}else{

     						echo "<td class=\"durchstrich\">";
     					}


     					echo $dsatz_aus['S_2'];
     				}else
     					echo "<td>Ver";

     					echo "</td>";

     					if($mitZeit=='1'){
     						echo "<td>";
     						echo Uhrzeit($dsatz_aus['S_2_t']);
     						echo "</td>";
     					}

     					if($dsatz_aus['S_3_Ver']==0){
     						if($dsatz_aus['S_3_G'] == "Ja")
     						{
     							echo "<td>";
     						}else{

     							echo "<td class=\"durchstrich\">";
     						}


     						echo $dsatz_aus['S_3'];
     					}else
     						echo "<td>Ver";

     						echo "</td>";

     						if($mitZeit=='1'){
     							echo "<td>";
     							echo Uhrzeit($dsatz_aus['S_3_t']);
     							echo "</td>";
     						}




     echo "<td>";

         echo $dsatz_aus['Z_K'] . " Kg";

     echo "</td>";




     echo "<td>";

     	echo $dsatz_aus['Robbi_Quali_P'] . " Pkt";

     echo "</td>";


     $Platz_Name='Platz_Robi_Quali';

     echo "<td>";
     	echo $dsatz_aus[$Platz_Name];
     echo "</td>";


  echo "</tr>";




$Al_Kl = $dsatz_aus['Al_Kl'];
$Gw_Kl = $dsatz_aus['Gw_Kl'];
$Geschlecht = $dsatz_aus['Geschlecht'];
$Jahrgang = $dsatz_aus['Jahrgang'];

$Relativ_P = $dsatz_aus['Relativ_P'];

echo "</tbody>";

}







echo "</tbody>";
echo "</table>";


?>


</form>
</body>
</html>
