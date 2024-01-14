<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl.css" />
<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl_print.css" media="print" />

</head>

<body>

<form method="post" action="zk_gwkl.php">



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

if($stammdaten['Wk_Art']=='M_o_T' || $stammdaten['Wk_Art']=='M_m_T') echo '<a href="m_o_t_gruppe.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>';
else	echo '<a href="zk_ausw_gruppe.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>';

if($stammdaten['Wk_Art']=='M_o_T' || $stammdaten['Wk_Art']=='M_m_T') $stammdaten['Wk_Art']='ZK';

if($_SESSION['AuswertungMitZeit']==1)    $mitZeit=1;
else                                     $mitZeit=0;



$Verein = dbBefehl("SELECT * FROM verein");
$Grp=$_SESSION['Aus_L_Grp'];

if($Grp!=0 && $Grp!='' && $Grp!=-1)
    $GrpString=" Gruppe: $Grp";

$StringDate=mysqlDateToDate($stammdaten['Datum']);
echo "<p class=\"kopf\"><b>$stammdaten[Meisterschaft] in $stammdaten[Ort] am $StringDate $GrpString</b></p>";

$time=getdate();

$auswerte_Gruppe=0;											//Damit in Auswertung �ber alle Gruppen Ausgewertet wird
include 'funktionen/auswertung.php';                          //Keine Funktion sondern einfach php einschub
include 'funktionen/platzierung.php';


$AlKl=$_SESSION['Aus_L_AlKl'];
$Grp=$_SESSION['Aus_L_Grp'];



if($_SESSION['alleGrp'] == 0){

         if($_SESSION['Aus_AlKl']==0)            $arrayWkGrp[]=$Grp;
         else                                    $arrayWkGrp[]=$AlKl;

}else                                            $arrayWkGrp[]=0;


foreach ($arrayWkGrp as &$Grp) {


include 'Outsorst/heber_auswahl_zk.php';

echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"220\">";
  if($stammdaten['International']=='0') echo "<col width=\"200\">";
  else echo "<col width=\"100\">";
    echo "<col width=\"55\">";
    echo "<col width=\"55\">";
    if($stammdaten['International']==0) echo "<col width=\"55\">";
    echo"<col width=\"100\">
    <col width=\"105\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">";

if($mitZeit=='1'){
echo "
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">";
}
//Eins der folgenden  <col width=\"100\"> ist f�r Relativ Punkte Erg
echo"
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"60\">

  </colgroup>


<thead>

 <tr>
  <th>Name</th>";
  if($stammdaten['International']=='0') echo '<th>Verein</th>';
  else echo '<th>Staat</th>';
  if($stammdaten['International']==0) echo "<th>Land</th>";
  echo "<th>W/M</th>";
  echo"<th>JG</th>
  <th>Kö-Gw</th>
  <th>Gw-Kl</th>";

if($mitZeit=='0'){
echo"
  <th colspan=\"3\">Reissen</th>
  <th colspan=\"3\">Stossen</th>";
}else{
echo"
  <th colspan=\"6\">Reissen</th>
  <th colspan=\"6\">Stossen</th>";
}
if($stammdaten['Masters']==1){
    echo "<th>Sinclair</th>";
}else{
	if($stammdaten['RelativArt']=='0'){
		echo "<th>Robi</th>";
	}elseif($stammdaten['RelativArt']=='3'){
		echo "<th>IAT Punkte</th>";
	}else{
		echo "<th>Relativ</th>";
	}
}
echo"

  <th>ZK</th>
  <th>Platz</th>

 </tr>
</thead>
";

echo"<tbody>";

$Al_Kl='';
$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$Z_K=0;
$K_Gewicht=0;
$zaehler=0;

while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{
$zaehler++;
$i_zaheler++;
if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz'){
 if($dsatz_aus['Z_K']==0) $Platz=0;
 else{
   if(($dsatz_aus['Z_K'] != $Z_K) || ($dsatz_aus['K_Gewicht'] != $K_Gewicht)){$Platz+= 1 + $z; $z=0;}
   else $z++;
 }
}else $Platz='AK';

$Umbruch++;



if($stammdaten['EineKlasse']==0 && $_SESSION['GesGrp']==0 && $_SESSION['MitNorm']==0){                  //Nur falls eine Klasse aus ist

if($dsatz_aus['Al_Kl'] != $Al_Kl ){

if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
         if($dsatz_aus['Z_K']==0) $Platz=0;
         else $Platz =1;
else $Platz ='AK';

$z=0;

echo "<tr Id=\"Klasse\">";
  if($stammdaten['International']==0)
     echo "<td Id=\"Al_Kl\" colspan=\"7\">";
  else
     echo "<td Id=\"Al_Kl\" colspan=\"6\">";

         echo "$dsatz_aus[Al_Kl]";

     echo "</td>";

     echo "<td Id=\"RuS\">";

         echo"R1";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"R2";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"R3";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"S1";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"S2";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"S3";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";
     echo "</td>";

     echo "<td Id=\"RuS\">";
     echo "</td>";


     echo "<td Id=\"RuS\">";    //Wegen Relativ
     echo "</td>";


echo "</tr>";

}else{                              //Damit beide events nicht gleichzeitig getriggerd werden

if($dsatz_aus['Geschlecht'] != $Geschlecht){

if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
         if($dsatz_aus['Z_K']==0) $Platz=0;
         else $Platz =1;
else $Platz ='AK';

$z=0;

echo "<tr id=\"zwischenraum\">";
   if($stammdaten['International']==0)
         if($mitZeit=='1') echo "<td colspan=\"22\">";
         else              echo "<td colspan=\"16\">";
   else
         if($mitZeit=='1') echo "<td colspan=\"21\">";
         else              echo "<td colspan=\"15\">";

     echo "</td>";


echo "</tr>";
}else{

if($dsatz_aus['Gw_Kl'] != $Gw_Kl)
{
if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
         if($dsatz_aus['Z_K']==0) $Platz=0;
         else $Platz =1;
else $Platz ='AK';

$z=0;

echo "<tr id=\"zwischenraum\">";
   if($stammdaten['International']==0)
         if($mitZeit=='1') echo "<td colspan=\"22\">";
         else              echo "<td colspan=\"16\">";
   else
         if($mitZeit=='1') echo "<td colspan=\"21\">";
         else              echo "<td colspan=\"15\">";

     echo "</td>";


echo "</tr>";
}
}
}

}elseif($zaehler!=1){                                       // ohne EineKlasse Ende und ohne Norm ende

if($dsatz_aus['Geschlecht'] != $Geschlecht){

if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
         if($dsatz_aus['Z_K']==0) $Platz=0;
         else $Platz =1;
else $Platz ='AK';

$z=0;

echo "<tr id=\"zwischenraum\">";
   if($stammdaten['International']==0)
         if($mitZeit=='1') echo "<td colspan=\"22\">";
         else              echo "<td colspan=\"16\">";
   else
         if($mitZeit=='1') echo "<td colspan=\"21\">";
         else              echo "<td colspan=\"15\">";

     echo "</td>";


echo "</tr>";
}else{

if($dsatz_aus['Gw_Kl'] != $Gw_Kl)
{
if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
         if($dsatz_aus['Z_K']==0) $Platz=0;
         else $Platz =1;
else $Platz ='AK';

$z=0;

echo "<tr id=\"zwischenraum\">";
   if($stammdaten['International']==0)
         if($mitZeit=='1') echo "<td colspan=\"22\">";
         else              echo "<td colspan=\"16\">";
   else
         if($mitZeit=='1') echo "<td colspan=\"21\">";
         else              echo "<td colspan=\"15\">";

     echo "</td>";


echo "</tr>";
}
}
}

if($Umbruch=="24")                               //F�r Seitenumbr�che!
{
         echo "</tbody>";
         echo "</table>";

echo "
<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\" style=\"page-break-before:always\">
  <colgroup>
    <col width=\"220\">";
  if($stammdaten['International']=='0') echo "<col width=\"200\">";
  else echo "<col width=\"100\">";
    echo "<col width=\"55\">";
    echo "<col width=\"55\">";
    if($stammdaten['International']==0) echo "<col width=\"55\">";
    echo"<col width=\"100\">
    <col width=\"105\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">";

if($mitZeit=='1'){
echo "
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">";
}

echo"<col width=\"100\">
     <col width=\"100\">
    <col width=\"60\">

  </colgroup>

<thead class=\"noScreen\">

 <tr>
  <th>Name</th>";
  if($stammdaten['International']=='0') echo '<th>Verein</th>';
  else echo '<th>Staat</th>';
  if($stammdaten['International']==0) echo "<th>Land</th>";
  echo "<th>W/M</th>";
  echo"<th>JG</th>
  <th>Kö-Gw</th>
  <th>Gw-Kl</th>";

if($mitZeit=='0'){
echo"
  <th colspan=\"3\">Reissen</th>
  <th colspan=\"3\">Stossen</th>";
}else{
echo"
  <th colspan=\"6\">Reissen</th>
  <th colspan=\"6\">Stossen</th>";
}
if($stammdaten['Masters']==1){
    echo "<th>Sinclair</th>";
}else{
	if($stammdaten['RelativArt']=='0'){
		echo "<th>Robi</th>";
	}else{
		echo "<th>Relativ</th>";
	}
}
echo"

  <th>ZK</th>
  <th>Platz</th>

 </tr>
</thead>
";

echo "<tbody>";

if($stammdaten['EineKlasse']==0 && $_SESSION['GesGrp']==0 && $_SESSION['MitNorm']==0){                      //Nur falls eine Klasse aus ist

echo "<tr class=\"noScreen\" Id=\"Klasse\">";

   if($stammdaten['International']==0)
     echo "<td Id=\"Al_Kl\" colspan=\"7\">";
   else
     echo "<td Id=\"Al_Kl\" colspan=\"6\">";

         echo "$dsatz_aus[Al_Kl]";

     echo "</td>";

     echo "<td Id=\"RuS\">";

         echo"R1";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"R2";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"R3";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"S1";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"S2";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"S3";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";
     echo "</td>";

     echo "<td Id=\"RuS\">";
     echo "</td>";


echo "</tr>";

}                                //Ende Eine Klasse

$Umbruch=0;
}else{

if($_SESSION['GesGrp']==1  && $i_zaheler==1 ){                          //F�r GesGrp

echo "<tr id=\"zwischenraum\">";
   if($stammdaten['International']==0)
         if($mitZeit=='1') echo "<td colspan=\"13\">";
         else              echo "<td colspan=\"7\">";
   else
         if($mitZeit=='1') echo "<td colspan=\"12\">";
         else              echo "<td colspan=\"6\">";

     echo "</td>";

     echo "<td Id=\"RuS\">";

         echo"R1";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"R2";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"R3";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"S1";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"S2";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";

         echo"S3";

     echo "</td>";

if($mitZeit=='1') echo "<td Id=\"RuS\"></td>";

     echo "<td Id=\"RuS\">";
     echo "</td>";

     echo "<td Id=\"RuS\">";
     echo "</td>";


echo "</tr>";

}


echo "<tr>";

}


     echo "<td>";

                 echo "<span style=\"width:120px;display:block;float:left;\"> ".$dsatz_aus['Name']." </span>";
                 echo $dsatz_aus['Vorname'];

     echo "</td>";




     echo "<td>";                                                                                                // Spalte (Mit drop down bar)

         if($stammdaten['International']==0)      echo $dsatz_aus['Verein'];
         else                                   echo IdStaatzuStaat ($dsatz_aus['IdStaat']);

     echo "</td>";

     $Verein=dbBefehl("SELECT * FROM verein WHERE IdVerein='" . $dsatz_aus['IdVerein']. "' ");
     $dataVerein = mysqli_fetch_assoc($Verein);
     $Land=dbBefehl("SELECT * FROM laender WHERE Idlaender='" . $dataVerein['IdLaender']. "' ");
     $dataLand= mysqli_fetch_assoc($Land);

     if($stammdaten['International']==0)      echo '<td>' . $dataLand['laender'] . '</td>';


     echo "<td>";


          if($dsatz_aus['Geschlecht'] == "Männlich")
          {
                 echo"M";
          }else{
                 echo"W";
          }

     echo "</td>";


    echo "<td>";
         echo $dsatz_aus['Jahrgang'];
    echo "</td>";

     echo "<td>";
         echo $dsatz_aus['K_Gewicht'] . " Kg";
     echo "</td>";



     echo "<td>";

     if($_SESSION['MitNorm']==0){
     	if($dsatz_aus['Gw_Kl'] < "0")
     	{
     		echo $dsatz_aus['Gw_Kl'] ." Kg";
     	}else{
     		echo "+" . $dsatz_aus['Gw_Kl'] . " Kg";
     	}
     }else{
     	if($dsatz_aus['Gw_Kl_Norm'] < "0")
     	{
     		echo $dsatz_aus['Gw_Kl_Norm'] . " Kg";
     	}else{
     		echo "+" . $dsatz_aus['Gw_Kl_Norm'] . " Kg";
     	}
     }
     echo "</td>";

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

if($stammdaten['Masters']==1){
    echo "<td>";
    echo $dsatz_aus['Sinclair_P_Malone_Meltzer'] . " Pkt";
    echo "</td>";
}else{
    echo "<td>";
   		if($stammdaten['RelativArt']=='0'){
   			echo $dsatz_aus['Robbi_P']."Pkt";
    	}else{
    		echo $dsatz_aus['Relativ_P']."Pkt";
    	}

    echo "</td>";
}


     echo "<td>";
     	echo $dsatz_aus['Z_K']. " Kg";
     echo "</td>";



     echo "<td>";
     if($_SESSION['MitNorm']==1) 	$Platz=$dsatz_aus['Platz_Norm'];
     else							$Platz=$dsatz_aus['Platz_GwKl'];

         if($Platz == '0'){
         	$PlatzString='AK';
         }else{
         	$PlatzString=$Platz;
         }

         echo $PlatzString;

     echo "</td>";


  echo "</tr>";




$Al_Kl = $dsatz_aus['Al_Kl'];

if($_SESSION['MitNorm']==0)
	$Gw_Kl = $dsatz_aus['Gw_Kl'];
else
	$Gw_Kl = $dsatz_aus['Gw_Kl_Norm'];

$Geschlecht = $dsatz_aus['Geschlecht'];
$Z_K = $dsatz_aus['Z_K'];
$K_Gewicht = $dsatz_aus['K_Gewicht'];




echo "</tbody>";

}


} //Ende foreach �ber Gruppen





echo "</tbody>";
echo "</table>";



?>

<br><br>
<br><br>
<br><br>
<table width="100%" border="0" cellpadding="0" cellspacing="2">
 <tr>
  <td><hr id="un" class="linie"></td>
  <td><hr id="un" class="linie"></td>
  <td><hr id="un" class="linie"></td>
 </tr>
</table>

</form>
</body>
</html>
