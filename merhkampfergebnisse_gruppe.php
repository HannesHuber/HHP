<?php
session_start();
if (empty($_SESSION['Mk_Grp'])) {
    $_SESSION['Mk_Grp'] = 0;
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



<form method="post" action="merhkampfergebnisse_gruppe.php">

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
loginCheck($stammdaten);

$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>MK-Gruppenwahl</font></b></p>";

echo"
<br>
";

echo"
<br>
<br>
<br>";

if((isset($_POST['send']))&&($_POST['Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}

         echo"<p class=\"unter\"> Gruppen:</p>";

         echo "<select name=\"Auswahl\" STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

                 while($dataAuswahl = mysqli_fetch_assoc($Gruppen))
                 {
                      if($dsatz['Wk_Art']=='ZK'){

                         $merke=str_replace(' ','_,_',$dataAuswahl['Gruppen']);

                         echo "<option value=$merke>".$dataAuswahl['Gruppen']."</option>";

                      }else{

                         $merke=str_replace(' ','_,_',$dataAuswahl['Gruppen']);

                         echo "<option value=$merke>".$dataAuswahl['Gruppen']."</option>";

                      }

                 }

         echo "</select>";


         echo"<input type=\"submit\" name=\"send\" value=\"Auswahl\">";


if((isset($_POST['send']))&&($_POST['Auswahl']!=''))
{


  $_SESSION['Mk_Grp']=$_POST['Auswahl'];



  echo"
   <script>
     setTimeout(function(){
       location = 'mehrkampfergebnisse.php'
     },0)
   </script>
  ";


}







?>










</body>
</html>
