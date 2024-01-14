<?php
session_start();
if (empty($_SESSION['wk_protokoll_grp'])) {
	$_SESSION['wk_protokoll_grp'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl.css" />
<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl_print.css" media="print" />

</head>

<body>

<form method="post" action="wk_protokoll.php">



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


$Grp=$_SESSION['wk_protokoll_grp'];



if ($stammdaten['Wk_Art']=='BL') {

    $DataVereinsAuswahl = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
    $VereinsAuswahl = mysqli_fetch_assoc($DataVereinsAuswahl);

    $Vereine_Array=array();

    $Vereine_Array[]='' . $VereinsAuswahl['Verein1'];
    $Vereine_Array[]='' . $VereinsAuswahl['Verein2'];

    if($stammdaten['Verein_Anzahl']==3){
        $Vereine_Array[]='' . $VereinsAuswahl['Verein3'];
    }

    $arrayWkGrp=$Vereine_Array;


}else{

    if($Grp != 0)
        $arrayWkGrp[]=$Grp;
        else{
            $Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

            while($dataAuswahl = mysqli_fetch_assoc($Gruppen)){
                $Grp=$dataAuswahl['Gruppen'];
                $arrayWkGrp[]=$Grp;
            }

        }
}


$count=0;

foreach ($arrayWkGrp as &$Grp) {

	$count++;

	if($count!=1)
		echo '<div id="page-break"></div>';




$time=getdate();

if ($stammdaten['Wk_Art']=='BL') {

    $heber = dbBefehl("SELECT * FROM heber, heber_".$data_a_db['S_Db'].", staaten, verein
                               WHERE heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdVerein = '$Grp'
                               AND heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber.IdStaat = staaten.IdStaat
                               AND heber.IdVerein=verein.IdVerein
                               ORDER BY verein.verein ASC, heber.Gewicht ASC
                               ");

}else{
         $heber = dbBefehl("SELECT * FROM heber, heber_".$data_a_db['S_Db'].", staaten, verein
                               WHERE heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               AND heber.IdStaat = staaten.IdStaat
							   AND heber.IdVerein = verein.IdVerein
                               ORDER BY verein.verein ASC, heber.Gewicht ASC
                               ");
}

$num_rows=mysqli_num_rows($heber);


$x=0;




echo"<div id=\"divid1\" class=\"examplediv\">";

$db_gruppen_zeit = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']." WHERE Gruppen = '$Grp' ");
$data_grp_zeit = mysqli_fetch_assoc($db_gruppen_zeit);




echo "

<table class=\"tabelle\" width=\"100%\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"280\">
    <col width=\"280\">
    <col width=\"110\"> ";
if($stammdaten['International'] == 1)
	echo "<col width=\"110\">";

echo"
    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">

    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">";




echo"
  </colgroup>


<thead>";

if ($stammdaten['Wk_Art']=='BL') {

    $DataVerein = dbBefehl("SELECT * FROM verein WHERE IdVerein = '$Grp' ");
    $dataAktuellerVerein = mysqli_fetch_assoc($DataVerein);

    $VereinName=$dataAktuellerVerein['Verein'];

    echo"
    <tr>
	   <th colspan=\"9\"><b>Wettkampf Protokoll Mannschaft: ".$VereinName." </b></th>
    </tr>";
}else{
    echo"
    <tr>
	   <th colspan=\"9\"><b>Wettkampf Protokoll Gruppe: $Grp</b></th>
    </tr>";
}

echo"
 <tr>
  <th>Name</th>
  <th>Verein</th>";
if($stammdaten['International'] == 1)
	echo "<th>Staat</th>";

  echo "<th>KöGw</th>";



   echo"<th colspan=\"3\">Reissen</th>";

   echo"<th colspan=\"3\">Stossen</th>";



echo"</tr>";


echo"</thead>";






$time=getdate();

$i = 0;



while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

$i = $i+1;


     $Id="Id" . $i;
     $Löschen="Löschen" . $i;
     $Ausserkonkurrenz="Ausserkonkurrenz" . $i;
     $Konkurrenz="Konkurrenz" . $i;
     $Gewicht="Gewicht" . $i;




echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"".$dsatz['IdHeber']."\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}



echo "<tr align=\"center\" >";

     echo "<td>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo  $dsatz['Vorname'];
     echo "</td>";

     echo "<td>";                                                                                                // Spalte (Mit drop down bar)
          echo $dsatz['Verein'];
     echo "</td>";


     if($stammdaten['International'] == 1){
     	echo "<td>";
     		echo $dsatz['Staat'];
     	echo "</td>";
     }
     echo "<td>";
          echo $dsatz['Gewicht'] . " Kg";
     echo "</td>";

                                                                                                             //farben f�r Rei�en Sto�en
$R_bg_1='#DEFFD4';
$R_bg_2='#C9FFB9';
$R_bg_3='#AFFF97';
$R_bg_1_ng='#FFC7C7';
$R_bg_2_ng='#FFB0B0';
$R_bg_3_ng='#FF9A9A';


LeereZeile();
LeereZeile();
LeereZeile();

LeereZeile();
LeereZeile();
LeereZeile();



echo "</tr>";





}


echo "</tbody>";
echo "</table>";




echo'

<br><br>
<br><br>
<table width="100%" border="0" cellpadding="0" cellspacing="2">
<tr>
<td><hr id="un" class="linie"></td>
<td><hr id="un" class="linie"></td>
<td><hr id="un" class="linie"></td>
</tr>
</table>';

}		//Ende for each schleife


echo'<br>';
echo '<form>
  <textarea rows="5" cols="130"></textarea>
</form>';

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

function LeereZeile() {
	global $stammdaten;

	echo "<td>";
		echo " ";
	echo "</td>";

}

?>

</form>

</body>
</html>
