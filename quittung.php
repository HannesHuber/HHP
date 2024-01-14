<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/selfhtml.css" media="print" />


</head>



<body>



<form method="post" action="quittung.php">

<?php

ob_start ();
error_reporting(0);


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$Verein = dbBefehl("SELECT * FROM verein ORDER BY verein ASC");

$datenbank = dbBefehl("SELECT * FROM startgebuehren_".$data_a_db['S_Db'].", stammdaten_wk_".$data_a_db['S_Db']."");

$dsatz = mysqli_fetch_assoc($datenbank);

$Verein_Quittung=$_SESSION['Quittung_Verein'];

if($Verein_Quittung!='0') $arrayQuittung[]=$Verein_Quittung;
else{
	$ArrayVorhandeneVereine = ReturnArrayGemeldeteVereine();
	foreach ($ArrayVorhandeneVereine as &$Verein) {
		$get=str_replace(' ','_,_',$Verein);
		$arrayQuittung[]=$get;
	}
}

$i=0;

foreach ($arrayQuittung as &$Verein_Quittung) {


$i++;
if($i!=1) echo '<div id="page-break"></div>';

echo "<a href=\"planung.php\" title=\"Link zur Planung\" id=\"range-logo\">Planung</a>";

$Verein_Quittung=str_replace('_,_',' ',$Verein_Quittung);                      //Str_replace funktion weil $_Post[] keine Leerzeichen �bertragen kann!


                                                                                   //�ber Tabelle
echo "
<table align=\"center\" width=\"100%\ border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"50%\">
    <col width=\"50%\">


  </colgroup>
";
echo"<tr>";
echo"<td>";


echo"<p class=\"kopf\" align=\"center\"><b>".$dsatz['Meisterschaft']."</b></p>";

echo"<p class=\"kopf\" align=\"center\"><b>in ".$dsatz['Ort']."</b></p>";

echo"<p class=\"kopf\" align=\"center\"><b>Am ".$dsatz['Datum']."</b></p>";

echo"<p class=\"kopf\" align=\"center\"><b>Quittung</b></p>";

echo"
<br>
";

$Verein=dbBefehl("SELECT * FROM verein WHERE Verein='" .$Verein_Quittung. "' ");
$dataVerein= mysqli_fetch_assoc($Verein);

$mannschaft = dbBefehl("SELECT * FROM mannschaften_".$data_a_db['S_Db']."
							WHERE IdVerein='" . $dataVerein['IdVerein']. "'");
$d_m = mysqli_fetch_assoc($mannschaft);


$heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                      WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
					  AND heber.IdVerein = verein.IdVerein
                      AND verein.Verein ='" . $Verein_Quittung . "'
					  AND (heber_".$data_a_db['S_Db'].".Nach_Meldung IS NULL
                            OR heber_".$data_a_db['S_Db'].".Nach_Meldung NOT IN ('1'))");
$row=mysqli_num_rows($heber);



$heberNachMeldung = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
		WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
		AND heber.IdVerein = verein.IdVerein
		AND Verein ='" . $Verein_Quittung . "'
		AND Nach_Meldung IN ('1') ");
$rowNachMeldung=mysqli_num_rows($heberNachMeldung);

$timestamp = time();
$datum = date("d.m.y", $timestamp);

$Anzeige=$Verein_Quittung;

      $Kosten_H = $dsatz['E_Erw'] * $row;


      $Kosten_Nach = $dsatz['Nach_Meldung_Euro'] * $rowNachMeldung;


      if($d_m['Anzahl_M']!="0" && $d_m['Anzahl_M']!="")
      	$Kosten_M = $dsatz['M_Erw'];
      else
      	$Kosten_M = "0";




      	$Kosten_Gesamt = $Kosten_M + $Kosten_H + $Kosten_Nach;


      echo "<p class=\"kopf\" align=\"center\"><b>$Anzeige</b></p>";


echo"
<br>
<br>
";





echo "

<table class=\"table\" width=\"430\" align=\"center\"  border=\"0\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"58%\">
    <col width=\"14%\">
    <col width=\"14%\">
    <col width=\"14%\">

  </colgroup>

";
 echo"<tr>";


      echo"<td>";


                 echo "<p align=\"center\"><font size=\"4\"><b>Anzahl Atlethen</font></b></p>";

      echo"</td>";



      echo"<td>";

                 echo "<input type=\"text\" name=\"Anzahl\" size=\"1\" value=\"$row\" readonly> x";

      echo"</td>";



      echo"<td>";

                 echo "<input type=\"text\" name=\"Kosten\" size=\"1\" value=\"".$dsatz['E_Erw']."\" readonly> &euro;";

      echo"</td>";


      echo"<td>";

                 echo "<input type=\"text\" name=\"Zusammen\" size=\"1\" value=\"$Kosten_H\" readonly> &euro;";


      echo"</td>";




 echo"</tr>";


 echo"<tr>";


 echo"<td>";


 echo "<p align=\"center\"><font size=\"4\"><b>Anzahl Nachmeldungen</font></b></p>";

 echo"</td>";

 echo"<td>";
 	echo "<input type=\"text\" name=\"Anzahl\" size=\"1\" value=\"$rowNachMeldung\" readonly> x";
 echo"</td>";

 echo"<td>";
 	echo "<input type=\"text\" name=\"Kosten\" size=\"1\" value=\"".$dsatz['Nach_Meldung_Euro']."\" readonly> &euro;";
 echo"</td>";


 echo"<td>";
 	echo "<input type=\"text\" name=\"Zusammen\" size=\"1\" value=\"$Kosten_Nach\" readonly> &euro;";
 echo"</td>";

 echo"</tr>";



  echo"<tr>";


      echo"<td>";


                 echo "<p align=\"center\"><font size=\"4\"><b>Mannschaft/en</font></b></p>";

      echo"</td>";



      echo"<td>";



      echo"</td>";



      echo"<td>";

                 echo "<input type=\"text\" name=\"Kosten\" size=\"1\" value=\"$Kosten_M\" readonly> &euro;";

      echo"</td>";


      echo"<td>";

                 echo "<input type=\"text\" name=\"Zusammen\" size=\"1\" value=\"$Kosten_M\" readonly> &euro;";




      echo"</td>";




 echo"</tr>";


echo"<tr>";


      echo"<td colspan=\"4\">";

         echo"<hr id=\"strich\" noshade width=\"70\" size=\"1\" align=\"right\">";        // Summen Strich

      echo"</td>";



echo"</tr>";




 echo"</tr>";


  echo"<tr>";


      echo"<td>";

      echo"</td>";



      echo"<td colspan=\"2\" align=\"right\">";

                 echo"Summe =&nbsp;";

      echo"</td>";


      echo"<td>";

                 echo "<input type=\"text\" name=\"Zusammen\" size=\"1\" value=\"$Kosten_Gesamt\" readonly> &euro;";


      echo"</td>";




 echo"</tr>";






echo"</table>";


echo"
<br>
<br>
<br>
";



  echo "<p align=\"center\"><font size=\"4\"><b>Betrag erhalten</font></b></p>";






   echo "<p align=\"center\">Datum <input type=\"text\" name=\"Datum\" size=\"10\" value=\"$datum\"></p>";

echo'
   <form>
   <textarea rows="3" cols="130"></textarea>
   </form>';

echo"
<br>
<br>
<br>
<br>
";




echo"</td>";

echo"<td>";
echo"</td>";


echo"</tr>";
echo"</table>";


 //  echo"<input type=\"submit\" class=\"hide\" name=\"Drucken\" value=\"Drucken\" onClick=\"javascript:window.print()\">";



}

       //  echo"<input type=\"submit\" class=\"hide\" name=\"reload\" value=\"Zur�ck\">";



if(isset($_POST['reload']))
{
echo"
 <script>
 setTimeout(function(){
     location = 'http://htp-test1.de/quittung.php'
   },0)
 </script>
";
}

?>








</form>

</body>
</html>
