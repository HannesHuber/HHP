<?php
session_start();
if (empty($_SESSION['Quittung_Verein'])) {
	$_SESSION['Quittung_Verein'] = '0';
}
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



<form method="post" action="quittung_verein.php">

<?php

ob_start ();
error_reporting(0);


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$Verein = dbBefehl("SELECT * FROM verein ORDER BY verein ASC");

$datenbank = dbBefehl("SELECT * FROM startgebuehren_".$data_a_db['S_Db'].", stammdaten_wk_".$data_a_db['S_Db']);

$dsatz = mysqli_fetch_assoc($datenbank);


echo"<p class=\"kopf\"><b>Quittung</b></p>";

echo "<a href=\"planung.php\" title=\"Link zur Planung\" id=\"range-logo\">Planung</a>";


echo"
<br>
<br>
<br>
<br>";



if((isset($_POST['bestaetigen']))&&($_POST['AuswahlSend']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}



         echo "<select name=\"AuswahlSend\" STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"0\" selected>Alle</option>";

         $ArrayVorhandeneVereine = ReturnArrayGemeldeteVereine();		//function in nuetzliches

         foreach ($ArrayVorhandeneVereine as &$Verein) {
         	$get=str_replace(' ','_,_',$Verein);

         	echo "<option value=$get>$Verein</option>";
         }


         echo "</select>";

         echo"<input type=\"submit\" name=\"bestaetigen\" value=\"Bestätigen\">";


         if((isset($_POST['bestaetigen']))&&($_POST['AuswahlSend']!=''))
         {
         	$_SESSION['Quittung_Verein']=$_POST['AuswahlSend'];



         	echo"
 				<script>
 					setTimeout(function(){
     					location = 'quittung.php'
   					},0)
 				</script>
			";

         }





?>








</form>

</body>
</html>
