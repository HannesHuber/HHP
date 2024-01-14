<?php
session_start(); //Cookie start
if (empty($_SESSION['At_Grp'])) {
    $_SESSION['At_Grp'] = 0;
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



<form method="post" action="athletik_gruppe.php">

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>


<?php
ob_start ();
error_reporting(0);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);


$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Athletiklisten</font></b></p>";

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

         echo "<select STYLE=\"$style; $stylezwei;\" name=\"Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

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



echo"
<br>
";



if((isset($_POST['send']))&&($_POST['Auswahl']!=''))
{
              $_SESSION['At_Grp']=$_POST['Auswahl'];


echo"
 <script>
 setTimeout(function(){
     location = 'athletik_drucken.php'
   },0)
 </script>
";


}







?>










</body>
</html>
