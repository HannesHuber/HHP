<?php
session_start();
if (empty($_SESSION['Wiege_Verein'])) {
    $_SESSION['Wiege_Verein'] = '';
}
if (empty($_SESSION['Wiege_Grp'])) {
    $_SESSION['Wiege_Grp'] = 0;
}
if (empty($_SESSION['MitAllem'])) {
    $_SESSION['MitAllem'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">

<script type="text/javascript">
function popup (url) {


 var w = "screen.width";
 var h = "screen.height";



 fenster = window.open(url,"windowname4", "width=900, height=700, toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1");

 fenster.focus();
 return false;
}
</script>


</head>



<body>



<form method="post" action="wiegelisten_gruppe_druck_wk.php">

<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>


<?php



ob_start ();
error_reporting(1);


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

if($stammdaten['Wk_Art']!='BL') $Verein = dbBefehl("SELECT * FROM verein Order By Verein");
if($stammdaten['Wk_Art']!='BL') $Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


if($stammdaten['Wk_Art']=='BL'){
         $DataBlVerein=dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
         $Verein = mysqli_fetch_assoc($DataBlVerein);
}



echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Wiegelisten-Auswahl</font></b></p>";

echo"
<br>
";


echo"
<br>
<br>
<br>";




if((isset($_POST['GrpSend']) || isset($_POST['GrpSendOhneAlles']))&&($_POST['Grp_Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}

         echo"<p class=\"unter\">Nach Gruppe:</p>";

         echo "<select STYLE=\"$style; $stylezwei;\" name=\"Grp_Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

           echo "<option value=\"\" selected>Wählen...</option>";
             if($stammdaten['Wk_Art']!='BL'){
                 while($dataGrpAuswahl = mysqli_fetch_assoc($Gruppen))
                 {
                         $merke=str_replace(' ','_,_',$dataGrpAuswahl['Gruppen']);
                         echo "<option value=".$merke."> " . $dataGrpAuswahl['Gruppen'] . " </option>";
                 }
             }else
             	for($x=1;$x<=3;$x++) //$stammdaten['Verein_Anzahl']
                           echo "<option value=$x>$x</option>";

         echo "</select>";


         echo"<input type=\"submit\" name=\"GrpSendOhneAlles\" value=\"ohne Daten\">";
         echo"<input type=\"submit\" name=\"GrpSend\" value=\"mit Daten\">";




if( (isset($_POST['GrpSend']) || isset($_POST['GrpSendOhneAlles']))&&($_POST['Grp_Auswahl']!=''))
{
	if(isset($_POST['GrpSend']))
		$_SESSION['MitAllem'] = 1;
	else
		$_SESSION['MitAllem'] = 0;

$_SESSION['Wiege_Verein']='';
$_SESSION['Wiege_Grp']=$_POST['Grp_Auswahl'];

echo"
 <script>
 setTimeout(function(){
     location = 'wiegeliste_druck_wk.php'
   },0)
 </script>
";


}




?>










</body>
</html>
