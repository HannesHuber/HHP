<?php
session_start();
if (empty($_SESSION['Laender_AlKl'])) {
    $_SESSION['Laender_AlKl'] = '';
}
$_SESSION['Laender_AlKl'] = '';

if (empty($_SESSION['Laender_Art'])) {
    $_SESSION['Laender_Art'] = '';
}
$_SESSION['Laender_Art'] = 0;

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



<form method="post" action="laenderwertung_grp.php">

<a href="auswertung.php" title="Link zum Auswertung" id="range-logo">Auswertung</a>


<?php



ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($dsatz);


if($stammdaten['Wk_Art'] == "ZK"){
    $dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);
}else{
    $dbGruppen = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']);
}

$An_G=mysqli_num_rows($dbGruppen);





echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Auswahl</font></b></p>";

echo"
<br>
";



if((isset($_POST['LaenderAlKl']))&&($_POST['AuswahlAlKl']==''))
{
         $styleAlKl="border: 2px solid #FF0000";
         $stylezweiAlKl="background-color: #FAFFAD";
}

$String='';
if($stammdaten['MitNorm']==1) $String='(mit Norm)';

         echo"<p class=\"unter\"> Altersklassen$String:</p>";

         echo "<select name=\"AuswahlAlKl\" STYLE=\"$styleAlKl; $stylezweiAlKl;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";


          if($stammdaten['Wk_Art']=='ZK' && $dsatz['Masters']!='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk");

          elseif($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen");

          elseif($stammdaten['Wk_Art']=='ZK' && $dsatz['Masters']=='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_masters");


                       while($dataAus_AlKl = mysqli_fetch_assoc($DataAlKl))
                       {
                             $Safe_AlKl=$dataAus_AlKl['Klasse'];
                             echo "<option value=$Safe_AlKl>".$dataAus_AlKl['Klasse']."</option>";
                        }
                  echo "</select>";


         echo"<input type=\"submit\" name=\"LaenderAlKl\" value=\"Auswahl\">";

if((isset($_POST['LaenderAlKl']))&&($_POST['AuswahlAlKl']!=''))
{
$_SESSION['Laender_Art'] = 1;
$_SESSION['Laender_AlKl']=$_POST['AuswahlAlKl'];

         echo"
         <script>
          setTimeout(function(){
          location = 'laenderwertung.php'
          },0)
         </script>
         ";
}

echo"
<br>
<br>
<br>";

         echo"<p class=\"unter\">Algemeine Länderwertung:</p>";

         echo"<input type=\"submit\" name=\"AlgLaender\" value=\"Weiter\">";

if(isset($_POST['AlgLaender']))
{

         echo"
         <script>
          setTimeout(function(){
          location = 'laenderwertung.php'
          },0)
         </script>
         ";
}

/*
if($stammdaten[Wk_Art] == "ZK"){
echo"
<br>
<br>
<br>";

         echo"<p class=\"unter\">Gesamt Gruppe:</p>";

         echo"<input type=\"submit\" name=\"GesGrp\" value=\"Weiter\">";

if(isset($_POST['GesGrp']))
{
$_SESSION['Laender_Art'] = 2;
         echo"
         <script>
          setTimeout(function(){
          location = 'laenderwertung.php'
          },0)
         </script>
         ";
}


}       //Ende if ZK
*/

?>

</form>
</body>
</html>
