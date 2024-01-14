<?php
session_start();
if (empty($_SESSION['wk_protokoll_grp'])) {
    $_SESSION['wk_protokoll_grp'] = 0;
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

<form method="post" action="wk_protokoll_grp.php">

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


echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Wettkampf-Protokoll</font></b></p>";

echo"
<br>
";

echo"
<br>
<br>
<br>";

echo"<p class=\"unter\">Alle Gruppen:</p>";
echo"<input type=\"submit\" name=\"ALL\" value=\"Auswahl\">";

if(isset($_POST['ALL']))
{
	$_SESSION['wk_protokoll_grp']='0';
	echo"
         <script>
          setTimeout(function(){
          location = 'wk_protokoll.php'
          },0)
         </script>
         ";
}


if((isset($_POST['Senden']))&&($_POST['Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}

         echo"<p class=\"unter\"> Gruppen:</p>";

         echo "<select name=\"Auswahl\" id=\"Aus\"  STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

         if($stammdaten['Wk_Art']!='BL'){
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
             for($x=1;$x<=$stammdaten['Verein_Anzahl'];$x++)
                 echo "<option value=$x>$x</option>";

         echo "</select>";

         echo"<input type=\"submit\" name=\"Senden\" value=\"Auswahl\">";

 if((isset($_POST['Senden']))&&($_POST['Auswahl']!=''))
 {

 	$_SESSION['wk_protokoll_grp']=$_POST['Auswahl'];

 	echo"
 	<script>
 	setTimeout(function(){
  	   location = 'wk_protokoll.php'
  	 },0)
 	</script>
	";

 }


?>

</form>
</body>
</html>
