<?php
session_start();
if (empty($_SESSION['Kor_Grp'])) {
    $_SESSION['Kor_Grp'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">

<script type="text/javascript" src="JS/nuetzliches.js"></script>

</head>

<body>
<span id="weiterleitung"></span>

<form method="post" action="wettkampf_korrektur_grp.php">

<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>

<div id="modal">
  <div class="spinner">
     <div class="bounce1"></div>
     <div class="bounce2"></div>
     <div class="bounce3"></div>
  </div>
</div>

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

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

$dsatz = mysqli_fetch_assoc($datenbank);

$db_wk_korrektur_blocker = dbBefehl("SELECT * FROM tmp_wk_korrektur_block");
$data_wk_korrektur_block = mysqli_fetch_assoc($db_wk_korrektur_blocker);
$wk_korrektur_block_bridge1=$data_wk_korrektur_block['Grp_Bridge_1'];
$wk_korrektur_block_bridge2=$data_wk_korrektur_block['Grp_Bridge_2'];

echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Wettkampf</font></b></p>";

echo"
<br>
";

echo"
<br>
<br>
<br>";

if((isset($_POST['Senden']))&&($_POST['Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}

         echo"<p class=\"unter\"> Gruppen:</p>";

         echo "<select name=\"Auswahl\" id=\"Aus\"  STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

         if($dsatz['Wk_Art']!='BL'){
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
         }else
         	for($x=1;$x<=3;$x++) //$dsatz['Verein_Anzahl']
                    echo "<option value=$x>$x</option>";

         echo "</select>";


 echo "<button type=\"button\"  name=\"Senden\" id=\"Reissen\"  onclick=\"test($wk_korrektur_block_bridge1,$wk_korrektur_block_bridge2,
                                                                     'wettkampf_korrektur.php')\">Senden</button>";

?>


</body>
</html>
