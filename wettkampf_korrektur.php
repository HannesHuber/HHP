<?php
session_start();
if (empty($_SESSION['Filter_orginal'])) {
    $_SESSION['Filter_orginal'] = "";
}
if (empty($_SESSION['Filter_gruppe'])) {
    $_SESSION['Filter_gruppe'] = "";
}
if (empty($_SESSION['Filter_isset'])) {
    $_SESSION['Filter_isset'] = 0;
}
if (empty($_SESSION['Auswahl_Land'])) {
	$_SESSION['Auswahl_Land'] = "";
}
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">

</head>

<body>

<form method="post" action="wettkampf_korrektur.php">

<p class="kopf"><b>Heber</b></p>


<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>


<?php

ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/filter.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
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



$time=getdate();


         $heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                               WHERE heber.IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                               ORDER BY heber.Name ASC
                               ");


$num_rows=mysqli_num_rows($heber);


$x=0;


filter(3);



echo"<div id=\"divid1\" class=\"examplediv\">";

$db_gruppen_zeit = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']." WHERE Gruppen = '$Grp' ");
$data_grp_zeit = mysqli_fetch_assoc($db_gruppen_zeit);

echo "<br>";
echo "Datum der Hebungen: " . "<input type=\"date\" step=\"1\" size=\"1\" name='date' value='".$data_grp_zeit['Datum']."' >";
echo "<br>";



echo "

<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"280\">
    <col width=\"175\">
    <col width=\"110\"> ";

if($stammdaten['Wk_Art']!='ZK'){
echo"

    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">
    <col width=\"35\">";
}else{
echo"
    <col width=\"160\">
    <col width=\"35\">
    <col width=\"160\">
    <col width=\"35\">
    <col width=\"160\">
    <col width=\"35\">
    <col width=\"160\">
    <col width=\"35\">
    <col width=\"160\">
    <col width=\"35\">
    <col width=\"160\">
    <col width=\"35\">";
}

if($stammdaten['Wk_Art']=='M_m_T'){

    echo"
    <col width=\"45\">
    <col width=\"45\">
    <col width=\"45\">
    <col width=\"45\">
    <col width=\"45\">
    <col width=\"45\">
    ";
}

echo"
  </colgroup>


<thead>

 <tr>
  <th>Name</th>
  <th>Verein</th>
  <th>KöGw</th>

";

if($stammdaten['Wk_Art']=='M_m_T'){

   echo"<th colspan=\"9\">Reissen</th>";

}else{

   echo"<th colspan=\"6\">Reissen</th>";

}



if($stammdaten['Wk_Art']=='M_m_T'){

   echo"<th colspan=\"9\">Stossen</th>";

}else{

   echo"<th colspan=\"6\">Stossen</th>";

}

echo"</tr>";


if($stammdaten['Wk_Art']=='M_m_T'){

echo"


 <tr>
  <th> </th>
  <th> </th>
  <th> </th>
  <th colspan=\"2\">R1[Kg]</th>
  <th>R1T</th>
  <th colspan=\"2\">R2[Kg]</th>
  <th>R2T</th>
  <th colspan=\"2\">R3[Kg]</th>
  <th>R3T</th>
  <th colspan=\"2\">S1[Kg]</th>
  <th>S1T</th>
  <th colspan=\"2\">S2[Kg]</th>
  <th>S2T</th>
  <th colspan=\"2\">S3[Kg]</th>
  <th>S3T</th>


 </tr>

";

}

echo"</thead>";






$time=getdate();

$i = 0;



while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

$i = $i+1;


     $Id="Id" . $i;
     $L�schen="L�schen" . $i;
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


echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"".$dsatz['IdHeber']."\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}



echo "<tr align=\"center\" >";

     echo "<td>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];  //echo $dsatz[IdHeber];
     echo "</td>";

     echo "<td>";                                                                                                // Spalte (Mit drop down bar)
          echo $dsatz['Verein'];
     echo "</td>";

     echo "<td>";
          echo "<input type=\"text\" name=$Gewicht size=\"2\" value=\"".$dsatz['Gewicht']."\"> Kg";
     echo "</td>";

                                                                                                             //farben f�r Reissen Stossen
$R_bg_1='#DEFFD4';
$R_bg_2='#C9FFB9';
$R_bg_3='#AFFF97';
$R_bg_1_ng='#FFC7C7';
$R_bg_2_ng='#FFB0B0';
$R_bg_3_ng='#FF9A9A';


if($dsatz['R_1_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_1\">";
}else{

     echo "<td bgcolor=\"$R_bg_1_ng\">";
}

         echo "<input type=\"text\" name=$V1R size=\"2\" value=\"".$dsatz['R_1']."\"> ";

         if($stammdaten['Wk_Art']=='ZK')
                 echo " <input type=\"time\" step=\"1\" size=\"1\" name=$V1RT value=\"$V1RTimeStamp\" >";

     echo "</td>";

if($dsatz['R_1_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_1\">";
}else{

     echo "<td bgcolor=\"$R_bg_1_ng\">";
}


if($dsatz['R_1_G'] == "Ja")
{
     echo "<input type=\"submit\" name=$V1RUG value=\"Nein?\">";
}else{
     echo "<input type=\"submit\" name=$V1RG value=\"Ja?\">";
}
     echo "</td>";


if($stammdaten['Wk_Art']=='M_m_T'){

  if($dsatz['R_1_G'] == "Ja")
  {
         echo "<td bgcolor=\"$R_bg_1\">";
  }else{

         echo "<td bgcolor=\"$R_bg_1_ng\">";
  }

    echo "<input type=\"text\" size=\"1\" name=$V1RT value=\"".$dsatz['R_1_Te']."\">";

  echo "</td>";

}



if($dsatz['R_2_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_2\">";
}else{

     echo "<td bgcolor=\"$R_bg_2_ng\">";
}



         echo "<input type=\"text\" name=$V2R size=\"2\" value=\"".$dsatz['R_2']."\">";

         if($stammdaten['Wk_Art']=='ZK')
                 echo " <input type=\"time\" step=\"1\" size=\"1\" name=$V2RT value=\"$V2RTimeStamp\" >";

     echo "</td>";

if($dsatz['R_2_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_2\">";
}else{

     echo "<td bgcolor=\"$R_bg_2_ng\">";
}


if($dsatz['R_2_G'] == "Ja")
{
     echo "<input type=\"submit\" name=$V2RUG value=\"Nein?\">";

}else{

     echo "<input type=\"submit\" name=$V2RG value=\"Ja?\">";
}

     echo "</td>";

if($stammdaten['Wk_Art']=='M_m_T'){

  if($dsatz['R_2_G'] == "Ja")
  {
         echo "<td bgcolor=\"$R_bg_2\">";
  }else{

         echo "<td bgcolor=\"$R_bg_2_ng\">";
  }

    echo "<input type=\"text\" size=\"1\" name=$V2RT value=\"".$dsatz['R_2_Te']."\">";

  echo "</td>";

}

if($dsatz['R_3_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_3\">";
}else{

     echo "<td bgcolor=\"$R_bg_3_ng\">";
}



         echo "<input type=\"text\" name=$V3R size=\"2\" value=\"".$dsatz['R_3']."\">";

         if($stammdaten['Wk_Art']=='ZK')
                 echo " <input type=\"time\" step=\"1\" size=\"1\" name=$V3RT value=\"$V3RTimeStamp\" >";

     echo "</td>";

if($dsatz['R_3_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_3\">";
}else{

     echo "<td bgcolor=\"$R_bg_3_ng\">";
}


if($dsatz['R_3_G'] == "Ja")
{
     echo "<input type=\"submit\" name=$V3RUG value=\"Nein?\">";

}else{

     echo "<input type=\"submit\" name=$V3RG value=\"Ja?\">";
}



     echo "</td>";



if($stammdaten['Wk_Art']=='M_m_T'){

  if($dsatz['R_3_G'] == "Ja")
  {
         echo "<td bgcolor=\"$R_bg_3\">";
  }else{

         echo "<td bgcolor=\"$R_bg_3_ng\">";
  }

    echo "<input type=\"text\" size=\"1\" name=$V3RT value=\"".$dsatz['R_3_Te']."\">";

  echo "</td>";

}



if($dsatz['S_1_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_1\">";
}else{

     echo "<td bgcolor=\"$R_bg_1_ng\">";
}



         echo "<input type=\"text\" name=$V1S size=\"2\" value=\"$dsatz[S_1]\">";

         if($stammdaten['Wk_Art']=='ZK')
                 echo " <input type=\"time\" step=\"1\" size=\"1\" name=$V1ST value=\"$V1STimeStamp\" >";

     echo "</td>";

if($dsatz['S_1_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_1\">";
}else{

     echo "<td bgcolor=\"$R_bg_1_ng\">";
}


if($dsatz['S_1_G'] == "Ja")
{
     echo "<input type=\"submit\" name=$V1SUG value=\"Nein?\">";

}else{

     echo "<input type=\"submit\" name=$V1SG value=\"Ja?\">";
}



     echo "</td>";

if($stammdaten['Wk_Art']=='M_m_T'){

  if($dsatz['S_1_G'] == "Ja")
  {
         echo "<td bgcolor=\"$R_bg_1\">";
  }else{

         echo "<td bgcolor=\"$R_bg_1_ng\">";
  }

    echo "<input type=\"text\" size=\"1\" name=$V1ST value=\"".$dsatz['S_1_Te']."\">";

  echo "</td>";

}



if($dsatz['S_2_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_2\">";
}else{

     echo "<td bgcolor=\"$R_bg_2_ng\">";
}



         echo "<input type=\"text\" name=$V2S size=\"2\" value=\"".$dsatz['S_2']."\">";

         if($stammdaten['Wk_Art']=='ZK')
                 echo " <input type=\"time\" step=\"1\" size=\"1\" name=$V2ST value=\"$V2STimeStamp\" >";

     echo "</td>";

if($dsatz['S_2_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_2\">";
}else{

     echo "<td bgcolor=\"$R_bg_2_ng\">";
}


if($dsatz['S_2_G'] == "Ja")
{
     echo "<input type=\"submit\" name=$V2SUG value=\"Nein?\">";

}else{

     echo "<input type=\"submit\" name=$V2SG value=\"Ja?\">";
}



     echo "</td>";

if($stammdaten['Wk_Art']=='M_m_T'){

  if($dsatz['S_2_G'] == "Ja")
  {
         echo "<td bgcolor=\"$R_bg_2\">";
  }else{

         echo "<td bgcolor=\"$R_bg_2_ng\">";
  }

    echo "<input type=\"text\" size=\"1\" name=$V2ST value=\"".$dsatz['S_2_Te']."\">";

  echo "</td>";

}



if($dsatz['S_3_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_3\">";
}else{

     echo "<td bgcolor=\"$R_bg_3_ng\">";
}



         echo "<input type=\"text\" name=$V3S size=\"2\" value=\"".$dsatz['S_3']."\">";

         if($stammdaten['Wk_Art']=='ZK')
                 echo " <input type=\"time\" step=\"1\" size=\"1\" name=$V3ST value=\"$V3STimeStamp\" >";

     echo "</td>";

if($dsatz['S_3_G'] == "Ja")
{
     echo "<td bgcolor=\"$R_bg_3\">";
}else{

     echo "<td bgcolor=\"$R_bg_3_ng\">";
}


if($dsatz['S_3_G'] == "Ja")
{
     echo "<input type=\"submit\" name=$V3SUG value=\"Nein?\">";

}else{

     echo "<input type=\"submit\" name=$V3SG value=\"Ja?\">";
}

     echo "</td>";



if($stammdaten['Wk_Art']=='M_m_T'){

  if($dsatz['S_3_G'] == "Ja")
  {
         echo "<td bgcolor=\"$R_bg_3\">";
  }else{

         echo "<td bgcolor=\"$R_bg_3_ng\">";
  }

    echo "<input type=\"text\" size=\"1\" name=$V3ST value=\"".$dsatz['S_3_Te']."\">";


  echo "</td>";

}


echo "</tr>";



if((isset($_POST['V1SG' . $i])) || (isset($_POST['V2SG' . $i])) || (isset($_POST['V3SG' . $i])) || (isset($_POST['V1RG' . $i])) ||
 (isset($_POST['V2RG' . $i])) || (isset($_POST['V3RG' . $i])) || (isset($_POST['V1SUG' . $i])) || (isset($_POST['V2SUG' . $i])) ||
 (isset($_POST['V3SUG' . $i])) || (isset($_POST['V1RUG' . $i])) || (isset($_POST['V2RUG' . $i])) || (isset($_POST['V3RUG' . $i])) )
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
        if($stammdaten['Wk_Art']=='M_m_T'){
                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V' . $Ver . 'R' . $i] . "', Stossen= '" . $_POST['V' . $Ver . 'S' . $i] . "',
                              Technik_Reissen= '" . $_POST['V' . $Ver . 'RT' . $i] . "', Technik_Stossen= '" . $_POST['V' . $Ver . 'ST' . $i] . "',
                              Gueltig_$Art='$Guel', ".$Art."_Verzicht='NULL'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '$Ver'
                              ");
        }else{
                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V' . $Ver . 'R' . $i] . "', Stossen= '" . $_POST['V' . $Ver . 'S' . $i] . "',
                              Gueltig_$Art='$Guel', ".$Art."_Verzicht='NULL'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '$Ver'
                              ");
        }
}



if(isset($_POST['speichern']))
{
             $x=1;

             $number=htmlspecialchars($_POST['Gewicht' . $i]);

                 $gewicht=str_replace(",",".", $number);
              if($dsatz['Gewicht'] != $gewicht){
                 dbBefehl("UPDATE heber
                              SET Gewicht= '$gewicht'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
              }

            if($stammdaten['Wk_Art']=='M_m_T'){

                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V1R' . $i] . "', Stossen= '" . $_POST['V1S' . $i] . "',
                              Technik_Reissen= '" . $_POST['V1RT' . $i] . "', Technik_Stossen= '" . $_POST['V1ST' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '1'
                              ");

                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V2R' . $i] . "', Stossen= '" . $_POST['V2S' . $i] . "',
                              Technik_Reissen= '" . $_POST['V2RT' . $i] . "', Technik_Stossen= '" . $_POST['V2ST' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '2'
                              ");


                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V3R' . $i] . "', Stossen= '" . $_POST['V3S' . $i] . "',
                              Technik_Reissen= '" . $_POST['V3RT' . $i] . "', Technik_Stossen= '" . $_POST['V3ST' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '3'
                              ");


            }elseif($stammdaten['Wk_Art']=='ZK'){       // Da es beim ZK auf die Zeit ankommt! TimestampFromDateTime aus nuetzliches

             if(($dsatz['R_1'] != $_POST['V1R' . $i]) || ($dsatz['S_1'] != $_POST['V1S' . $i]) ||
                ($dsatz['time_Reissen'] != TimestampFromDateTime($_POST['date'], $_POST['V1RT' . $i])) ||
                ($dsatz['time_Stossen'] != TimestampFromDateTime($_POST['date'], $_POST['V1ST' . $i]))){

                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V1R' . $i] . "', Stossen= '" . $_POST['V1S' . $i] . "',
                                  time_Reissen= '" . TimestampFromDateTime($_POST['date'], $_POST['V1RT' . $i]) . "',
                                  time_Stossen= '" . TimestampFromDateTime($_POST['date'], $_POST['V1ST' . $i]) . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '1'
                              ");
             }
             if(($dsatz['R_2'] != $_POST['V2R' . $i]) || ($dsatz['S_2'] != $_POST['V2S' . $i]) ||
                ($dsatz['time_Reissen'] != TimestampFromDateTime($_POST['date'], $_POST['V2RT' . $i])) ||
                ($dsatz['time_Stossen'] != TimestampFromDateTime($_POST['date'], $_POST['V2ST' . $i]))){

                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V2R' . $i] . "', Stossen= '" . $_POST['V2S' . $i] . "',
                                  time_Reissen= '" . TimestampFromDateTime($_POST['date'], $_POST['V2RT' . $i]) . "',
                                  time_Stossen= '" . TimestampFromDateTime($_POST['date'], $_POST['V2ST' . $i]) . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '2'
                              ");
             }
             if(($dsatz['R_3'] != $_POST['V3R' . $i]) || ($dsatz['S_3'] != $_POST['V3S' . $i]) ||
                ($dsatz['time_Reissen'] != TimestampFromDateTime($_POST['date'], $_POST['V3RT' . $i])) ||
                ($dsatz['time_Stossen'] != TimestampFromDateTime($_POST['date'], $_POST['V3ST' . $i]))){

                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V3R' . $i] . "', Stossen= '" . $_POST['V3S' . $i] . "',
                                  time_Reissen= '" . TimestampFromDateTime($_POST['date'], $_POST['V3RT' . $i]) . "',
                                  time_Stossen= '" . TimestampFromDateTime($_POST['date'], $_POST['V3ST' . $i]) . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '3'
                              ");
             }
           }else{      //F�r alle anderen Arten ohne Zeit

             if(($dsatz['R_1'] != $_POST['V1R' . $i]) || ($dsatz['S_1'] != $_POST['V1S' . $i])){
                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V1R' . $i] . "', Stossen= '" . $_POST['V1S' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '1'
                              ");
             }
             if(($dsatz['R_2'] != $_POST['V2R' . $i]) || ($dsatz['S_2'] != $_POST['V2S' . $i])){
                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V2R' . $i] . "', Stossen= '" . $_POST['V2S' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '2'
                              ");
             }
             if(($dsatz['R_3'] != $_POST['V3R' . $i]) || ($dsatz['S_3'] != $_POST['V3S' . $i])){
                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $_POST['V3R' . $i] . "', Stossen= '" . $_POST['V3S' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '3'
                              ");
             }
           }

         if($data_grp_zeit['Datum'] != $_POST['date']){
            dbBefehl("UPDATE gruppen_zeit_".$data_a_db['S_Db']."
                              SET datum= '" . $_POST['date'] . "'
                              WHERE Gruppen = '$Grp'
                              ");
         }


}     //ENDE Speichern



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



?>


<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">




</form>

</body>
</html>
