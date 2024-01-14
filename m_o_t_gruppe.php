<?php
session_start();
$Wk_Nummer=$_SESSION['WeK'];

if (empty($_SESSION['Aus_Grp'])) {
    $_SESSION['Aus_Grp'] = 0;
}
$_SESSION['Aus_Grp'] = 0;

if (empty($_SESSION['Aus_n_Grp'])) {
    $_SESSION['Aus_n_Grp'] = 0;
}
$_SESSION['Aus_n_Grp'] = 0;

if (empty($_SESSION['alleGrp'])) {
    $_SESSION['alleGrp'] = 0;
}
$_SESSION['alleGrp'] = 0;

if (empty($_SESSION['Aus_ZK_Grp'])) {
	$_SESSION['Aus_ZK_Grp'] = 0;
}
$_SESSION['Aus_ZK_Grp'] = 0;

if (empty($_SESSION['ZK_Ges'])) {
	$_SESSION['ZK_Ges'] = 0;
}
$_SESSION['ZK_Ges'] = 0;

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



<form method="post" action="m_o_t_gruppe.php">

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


echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Auswertung</font></b></p>";

echo"
<br>
";

echo"
<br>
<br>
<br>";


if(((isset($_POST['send']))||(isset($_POST['n_gw']))||(isset($_POST['ZK'])))&&($_POST['Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}


         echo"<p class=\"unter\"> Gruppen:</p>";

         echo "<select name=\"Auswahl\" STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

                 for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

         echo "</select>";


         echo"<input type=\"submit\" name=\"send\" value=\"Mehrkampf\">";
         echo"<input type=\"submit\" name=\"n_gw\" value=\"Nur Gewichteben\">";
         echo"<input type=\"submit\" name=\"ZK\" value=\"Nach Zweikampf\">";


echo"
<br>
<br>
<br>";



         echo"<p class=\"unter\">Alle Gruppen Drucken:</p>";
         echo"<input type=\"submit\" name=\"AlMk\" value=\"Mehrkampf-Gesamt\">";
         echo"<input type=\"submit\" name=\"AlNG\" value=\"Gewichtheben-Gesamt\">";
         echo"<input type=\"submit\" name=\"ZKGes\" value=\"Zweikampf-Gesamt\">";


if((isset($_POST['send']))&&($_POST['Auswahl']!=''))
{
$_SESSION['Aus_Grp']=$_POST['Auswahl'];
         echo"
         <script>
          setTimeout(function(){
          location = 'm_o_t_auswertung.php'
          },0)
         </script>
         ";
}

if((isset($_POST['n_gw']))&&($_POST['Auswahl']!=''))
{
$_SESSION['Aus_n_Grp'] =$_POST['Auswahl'];
echo"
 <script>
 setTimeout(function(){
     location = 'm_o_t_auswertung_n_gw.php'
   },0)
 </script>
";
}

if((isset($_POST['ZK']))&&($_POST['Auswahl']!=''))
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

if(isset($_POST['AlMk']))
{
$_SESSION['alleGrp']='1';
         echo"
         <script>
          setTimeout(function(){
          location = 'm_o_t_auswertung.php'
          },0)
         </script>
         ";
}

if(isset($_POST['AlNG']))
{
$_SESSION['alleGrp']='1';
         echo"
         <script>
          setTimeout(function(){
          location = 'm_o_t_auswertung_n_gw.php'
          },0)
         </script>
         ";
}

if(isset($_POST['ZKGes']))
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



?>








</form>

</body>
</html>
