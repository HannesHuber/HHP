<?php
session_start();

if (empty($_SESSION['Aus_L_Grp'])) {
    $_SESSION['Aus_L_Grp'] = 0;
}
if (empty($_SESSION['Aus_R_Grp'])) {
    $_SESSION['Aus_R_Grp'] = 0;
}
if (empty($_SESSION['Aus_S_Grp'])) {
    $_SESSION['Aus_S_Grp'] = 0;
}
if (empty($_SESSION['alleGrp'])) {
    $_SESSION['alleGrp'] = 0;
}
if (empty($_SESSION['Aus_AlKl'])) {
    $_SESSION['Aus_AlKl'] = 0;
}
if (empty($_SESSION['GesGrp'])) {
    $_SESSION['GesGrp'] = 0;
}

if (empty($_SESSION['Aus_GrpUndAlKl'])) {
    $_SESSION['Aus_GrpUndAlKl'] = 0;
}

if (empty($_SESSION['AuswertungMitZeit'])) {
    $_SESSION['AuswertungMitZeit'] = 0;
}

if (empty($_SESSION['Auswahl_Relativ_pro_JG'])) {
	$_SESSION['Auswahl_Relativ_pro_JG'] = '';
}

if (empty($_SESSION['MitNorm'])) {
	$_SESSION['MitNorm'] = 0;
}

$_SESSION['MitNorm'] = 0;
$_SESSION['Auswahl_Relativ_pro_JG'] = '';
$_SESSION['AuswertungMitZeit'] = 0;
$_SESSION['Aus_GrpUndAlKl'] = 0;
$_SESSION['GesGrp'] = 0;
$_SESSION['Aus_AlKl'] = 0;
$_SESSION['alleGrp'] = 0;
$_SESSION['Aus_GrpUndAlKl'] = 0;
$_SESSION['Aus_R_Grp'] = 0;
$_SESSION['Aus_S_Grp'] = 0;
$_SESSION['Aus_L_Grp'] = 0;



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

<form method="post" action="zk_ausw_gruppe.php">

<a href="auswertung.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>

<?php

ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dsatz = mysqli_fetch_assoc($datenbank);

$dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


$An_G=mysqli_num_rows($dbGruppen);


echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>ZK Auswertung</font></b></p>";

echo"
<br>";

         echo"<p class=\"unter\">Alle Gruppen:</p>";
         echo"<input type=\"submit\" name=\"AlL\" value=\"ZK nach GwKl\">";
         echo"<input type=\"submit\" name=\"AlR\" value=\"ZK nach Relativgewicht\">";
         echo"<input type=\"submit\" name=\"AlS\" value=\"ZK nach Sinclair\">";
         echo"<input type=\"submit\" name=\"AllRobi\" value=\"ZK nach Robi\">";
         echo"<input type=\"submit\" name=\"AllRobiQuali\" value=\"ZK nach Olympia-Quali-Pkt\">";
         echo"<input type=\"submit\" name=\"AlleUndZeit\" value=\"ZK nach GwKl mit Zeit\">";


echo"
<br><br>";

if(((isset($_POST['Last']))||(isset($_POST['Relativ']))||(isset($_POST['Sinclair'])))&&($_POST['Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}


         echo"<p class=\"unter\"> Gruppen:</p>";

         echo "<select name=\"Auswahl\" STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

                 for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

         echo "</select>";


         echo"<input type=\"submit\" name=\"Last\" value=\"ZK nach Last\">";
         echo"<input type=\"submit\" name=\"Relativ\" value=\"ZK nach Relativgewicht\">";
         echo"<input type=\"submit\" name=\"Sinclair\" value=\"ZK nach Sinclair\">";


echo"
<br><br>";







if(((isset($_POST['LastAlKl']))||(isset($_POST['RelativAlKl']))||(isset($_POST['SinclairAlKl'])))&&($_POST['AuswahlAlKl']==''))
{
         $styleAlKl="border: 2px solid #FF0000";
         $stylezweiAlKl="background-color: #FAFFAD";
}


         echo"<p class=\"unter\"> Altersklassen:</p>";

         echo "<select name=\"AuswahlAlKl\" STYLE=\"$styleAlKl; $stylezweiAlKl;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";


          if($dsatz['Wk_Art']=='ZK' && $dsatz['Masters']!='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);

          elseif($dsatz['Wk_Art']=='M_m_T' || $dsatz['Wk_Art']=='M_o_T')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen");

          elseif($dsatz['Wk_Art']=='ZK' && $dsatz['Masters']=='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_masters");


                       while($dataAus_AlKl = mysqli_fetch_assoc($DataAlKl))
                       {
                             $Safe_AlKl=$dataAus_AlKl['Klasse'];
                             echo "<option value=$Safe_AlKl>".$dataAus_AlKl['Klasse']."</option>";
                        }
                  echo "</select>";


         echo"<input type=\"submit\" name=\"LastAlKl\" value=\"ZK nach Last\">";
         echo"<input type=\"submit\" name=\"RelativAlKl\" value=\"ZK nach Relativgewicht\">";
         echo"<input type=\"submit\" name=\"SinclairAlKl\" value=\"ZK nach Sinclair\">";


echo"
<br><br>";
if($dsatz['MitNorm']==1){
	echo"<p class=\"unter\">Auswertung mit Norm nach Gruppen:</p>";


	if(isset($_POST['LastNorm'])	&& 	$_POST['Auswahl_Norm']=='')
	{
		$style_Norm="border: 2px solid #FF0000";
		$stylezwei_Norm="background-color: #FAFFAD";
	}

	echo "<select name=\"Auswahl_Norm\" STYLE=\"$style_Norm; $stylezwei_Norm;\" size=\"1\" class=\"Auswahl\"><br>";

	echo "<option value=\"\" selected>Wählen...</option>";

	echo "<option value=\"-1\">Alle</option>";

	for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

	echo "</select>";


	echo"<input type=\"submit\" name=\"LastNorm\" value=\"ZK nach Last\">";


	echo"
<br><br>";
}

if(isset($_POST['LastNorm']) && $_POST['Auswahl_Norm']!='')
{
	$_SESSION['MitNorm']=1;
	$_SESSION['Aus_L_Grp']=$_POST['Auswahl_Norm'];
	echo"
         <script>
          setTimeout(function(){
          location = 'zk_gwkl.php'
          },0)
         </script>
         ";
}





if(((isset($_POST['LastGrpUndAlKl']))||(isset($_POST['RelativGrpUndAlKl']))||(isset($_POST['SinclairGrpUndAlKl'])))&&(($_POST['AuswahlGrpUndA']=='')||($_POST['AuswahlGUndAlKl']=='')))
{
         $styleGrpUndAlKl="border: 2px solid #FF0000";
         $stylezweiGrpUndAlKl="background-color: #FAFFAD";
}


         echo"<p class=\"unter\"> Gruppen und Altersklassen:</p>";

         echo "<select name=\"AuswahlGrpUndA\" STYLE=\"$styleGrpUndAlKl; $stylezweiGrpUndAlKl;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

                 for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

         echo "</select>";

         echo " und ";

         echo "<select name=\"AuswahlGUndAlKl\" STYLE=\"$styleGrpUndAlKl; $stylezweiGrpUndAlKl;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";


          if($dsatz['Wk_Art']=='ZK' && $dsatz['Masters']=='0')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);

          elseif($dsatz['Wk_Art']=='ZK' && $dsatz['Masters']=='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_masters");


                       while($dataAus_AlKl = mysqli_fetch_assoc($DataAlKl))
                       {
                             $Safe_AlKl=$dataAus_AlKl['Klasse'];
                             echo "<option value=$Safe_AlKl>".$dataAus_AlKl['Klasse']."</option>";
                        }
          echo "</select>";


         echo"<input type=\"submit\" name=\"LastGrpUndAlKl\" value=\"ZK nach Last\">";
      //   echo"<input type=\"submit\" name=\"RelativGrpUndAlKl\" value=\"ZK nach Relativgewicht\">";  Fertig aber Vorsicht wegen Pl�tzen!
      //   echo"<input type=\"submit\" name=\"SinclairGrpUndAlKl\" value=\"ZK nach Sinclair\">";       Nicht fertig!


echo"
<br>";



if($dsatz['Wk_Art']=='ZK' && $dsatz['Masters']=='0'){

echo"<p class=\"unter\">Relativauswertung pro Jahrgang:</p>";

echo "<select name=\"Auswahl_Relativ_pro_JG\" STYLE=\"$styleGrpUndAlKl; $stylezweiGrpUndAlKl;\" size=\"1\" class=\"Auswahl\"><br>";

echo "<option value=\"alle\" selected>Über alle</option>";


$DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);


	while($dataAus_AlKl = mysqli_fetch_assoc($DataAlKl))
	{
		$Safe_AlKl=$dataAus_AlKl['Klasse'];
		echo "<option value=$Safe_AlKl>".$dataAus_AlKl['Klasse']."</option>";
	}
	echo "</select>";

echo"<input type=\"submit\" name=\"RelativProJahrgang\" value=\"ZK nach Relativ\">";

}

if(isset($_POST['RelativProJahrgang']))
{
	$_SESSION['Auswahl_Relativ_pro_JG']= $_POST['Auswahl_Relativ_pro_JG'];
	echo"
 <script>
 setTimeout(function(){
     location = 'zk_relativ.php'
   },0)
 </script>
";
}

/*

if(((isset($_POST['Last_GesGrp_Grp']))||(isset($_POST['Relativ_GesGrp_Grp']))||(isset($_POST['Sinclair_GesGrp_Grp'])))&&($_POST['Auswahl_GesGrp_Grp']==''))
{
         $style_GesGrp_Grp="border: 2px solid #FF0000";
         $stylezwei_GesGrp_Grp="background-color: #FAFFAD";
}


         echo"<p class=\"unter\">Gesamt Gruppe nach Gruppen:</p>";

         echo "<select name=\"Auswahl_GesGrp_Grp\" STYLE=\"$style_GesGrp_Grp; $stylezwei_GesGrp_Grp;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>W�hlen...</option>";

                 for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

         echo "</select>";


         echo"<input type=\"submit\" name=\"Last_GesGrp_Grp\" value=\"ZK nach Last\">";
         echo"<input type=\"submit\" name=\"Relativ_GesGrp_Grp\" value=\"ZK nach Relativgewicht\">";
         echo"<input type=\"submit\" name=\"Sinclair_GesGrp_Grp\" value=\"ZK nach Sinclair\">";

echo"
<br>";


         echo"<p class=\"unter\">Gesamt Gruppe:</p>";


         echo"<input type=\"submit\" name=\"ZK_GesGrp\" value=\"ZK nach Last\">";
         echo"<input type=\"submit\" name=\"Relativ_GesGrp\" value=\"ZK nach Relativgewicht\">";
         echo"<input type=\"submit\" name=\"Sinclair_GesGrp\" value=\"ZK nach Sinclair\">";


*/

if((isset($_POST['Last']))&&($_POST['Auswahl']!=''))
{
$_SESSION['Aus_L_Grp']=$_POST['Auswahl'];
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_gwkl.php'
          },0)
         </script>
         ";
}

if((isset($_POST['Relativ']))&&($_POST['Auswahl']!=''))
{
$_SESSION['Aus_R_Grp'] =$_POST['Auswahl'];
echo"
 <script>
 setTimeout(function(){
     location = 'zk_relativ.php'
   },0)
 </script>
";
}

if((isset($_POST['Sinclair']))&&($_POST['Auswahl']!=''))
{
$_SESSION['Aus_S_Grp'] =$_POST['Auswahl'];
echo"
 <script>
 setTimeout(function(){
     location = 'zk_sinclair.php'
   },0)
 </script>
";
}

if((isset($_POST['LastAlKl']))&&($_POST['AuswahlAlKl']!=''))
{
$_SESSION['Aus_AlKl'] = 1;
$_SESSION['Aus_L_AlKl']=$_POST['AuswahlAlKl'];
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_gwkl.php'
          },0)
         </script>
         ";
}

if((isset($_POST['RelativAlKl']))&&($_POST['AuswahlAlKl']!=''))
{
$_SESSION['Aus_AlKl'] = 1;
$_SESSION['Aus_L_AlKl'] =$_POST['AuswahlAlKl'];
echo"
 <script>
 setTimeout(function(){
     location = 'zk_relativ.php'
   },0)
 </script>
";
}

if((isset($_POST['SinclairAlKl']))&&($_POST['AuswahlAlKl']!=''))
{
$_SESSION['Aus_AlKl'] = 1;
$_SESSION['Aus_L_AlKl'] =$_POST['AuswahlAlKl'];
echo"
 <script>
 setTimeout(function(){
     location = 'zk_sinclair.php'
   },0)
 </script>
";
}


if(isset($_POST['AlL']))
{
$_SESSION['alleGrp']='1';
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_gwkl.php'
          },0)
         </script>
         ";
}

if(isset($_POST['AllRobi']))
{
	$_SESSION['alleGrp']='1';
	echo"
         <script>
          setTimeout(function(){
          location = 'zk_robi.php'
          },0)
         </script>
         ";
}

if(isset($_POST['AllRobiQuali']))
{
	$_SESSION['alleGrp']='1';
	echo"
         <script>
          setTimeout(function(){
          location = 'zk_robi_quali.php'
          },0)
         </script>
         ";
}

if(isset($_POST['AlleUndZeit']))
{
$_SESSION['alleGrp']='1';
$_SESSION['AuswertungMitZeit']='1';
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_gwkl.php'
          },0)
         </script>
         ";
}

if(isset($_POST['AlR']))
{
$_SESSION['alleGrp']='1';
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_relativ.php'
          },0)
         </script>
         ";
}

if(isset($_POST['AlS']))
{
$_SESSION['alleGrp']='1';
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_sinclair.php'
          },0)
         </script>
         ";
}

if(isset($_POST['ZK_GesGrp']))
{
$_SESSION['GesGrp'] = 1;
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_gwkl.php'
          },0)
         </script>
         ";
}

if(isset($_POST['Relativ_GesGrp']))
{
$_SESSION['GesGrp'] = 1;
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_relativ.php'
          },0)
         </script>
         ";
}

if(isset($_POST['Sinclair_GesGrp']))
{
$_SESSION['GesGrp'] = 1;
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_sinclair.php'
          },0)
         </script>
         ";
}





if((isset($_POST['Last_GesGrp_Grp']))&&($_POST['Auswahl_GesGrp_Grp']!=''))
{
$_SESSION['Aus_L_Grp']=$_POST['Auswahl_GesGrp_Grp'];
$_SESSION['GesGrp'] = 1;
         echo"
         <script>
          setTimeout(function(){
          location = 'zk_gwkl.php'
          },0)
         </script>
         ";
}

if((isset($_POST['Relativ_GesGrp_Grp']))&&($_POST['Auswahl_GesGrp_Grp']!=''))
{
$_SESSION['Aus_R_Grp'] =$_POST['Auswahl_GesGrp_Grp'];
$_SESSION['GesGrp'] = 1;
echo"
 <script>
 setTimeout(function(){
     location = 'zk_relativ.php'
   },0)
 </script>
";
}

if((isset($_POST['Sinclair_GesGrp_Grp']))&&($_POST['Auswahl_GesGrp_Grp']!=''))
{
$_SESSION['Aus_S_Grp'] =$_POST['Auswahl_GesGrp_Grp'];
$_SESSION['GesGrp'] = 1;
echo"
 <script>
 setTimeout(function(){
     location = 'zk_sinclair.php'
   },0)
 </script>
";
}



if((isset($_POST['LastGrpUndAlKl']))&&(($_POST['AuswahlGrpUndA']!='')&&($_POST['AuswahlGUndAlKl']!='')))
{
$_SESSION['Aus_GrpUndAlKl'] = 1;
$_SESSION['Aus_L_Grp']=$_POST['AuswahlGrpUndA'];
$_SESSION['Aus_L_AlKl'] =$_POST['AuswahlGUndAlKl'];

         echo"
         <script>
          setTimeout(function(){
          location = 'zk_gwkl.php'
          },0)
         </script>
         ";
}

if((isset($_POST['RelativGrpUndAlKl']))&&(($_POST['AuswahlGrpUndA']!='')&&($_POST['AuswahlGUndAlKl']!='')))
{
$_SESSION['Aus_GrpUndAlKl'] = 1;
$_SESSION['Aus_R_Grp']=$_POST['AuswahlGrpUndA'];
$_SESSION['Aus_L_AlKl'] =$_POST['AuswahlGUndAlKl'];
echo"
 <script>
 setTimeout(function(){
     location = 'zk_relativ.php'
   },0)
 </script>
";
}

if((isset($_POST['SinclairGrpUndAlKl']))&&(($_POST['AuswahlGrpUndA']!='')&&($_POST['AuswahlGUndAlKl']!='')))
{
$_SESSION['Aus_GrpUndAlKl'] = 1;
$_SESSION['Aus_S_Grp']=$_POST['AuswahlGrpUndA'];
$_SESSION['Aus_L_AlKl'] =$_POST['AuswahlGUndAlKl'];
echo"
 <script>
 setTimeout(function(){
     location = 'zk_sinclair.php'
   },0)
 </script>
";
}



?>
</form>
</body>
</html>
