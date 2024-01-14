<?php
session_start();
if (empty($_SESSION['Pokal_Planung_Grp'])) {
    $_SESSION['Pokal_Planung_Grp'] = '';
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">


</head>



<body>



<form method="post" action="pokal_grp.php">

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>


<?php


ob_start ();
error_reporting(1);

include 'funktionen/db_verbindung.php';

$db=dbVerbindung();

$data_a_db['S_Db']=$_SESSION['WeK'];

$laender = dbBefehl("SELECT * FROM laender")
           OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db'])
OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


$dsatz = mysqli_fetch_assoc($datenbank);




echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Wettkampf</font></b></p>";

echo"
<br>
";

echo"
<br>
<br>
<br>";


if((isset($_POST['Weiter']))&&($_POST['Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}

         echo"<p class=\"unter\"> Gruppen:</p>";

         echo "<select STYLE=\"$style; $stylezwei;\" name=\"Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

                 while($dataAuswahl = mysqli_fetch_assoc($laender))
                 {

                         $Safe=str_replace(' ','_,_',$dataAuswahl['laender']);
                         echo "<option value=$Safe>".$dataAuswahl['laender']."</option>";

                 }

         echo "</select>";


         echo"<input type=\"submit\" name=\"Weiter\" value=\"Weiter\">";




if((isset($_POST['Weiter']))&&($_POST['Auswahl']!=''))
{
$_SESSION['Pokal_Planung_Grp']=$_POST['Auswahl'];


echo"
 <script>
 setTimeout(function(){
     location = 'pokal.php'
   },0)
 </script>
";



}



?>





</body>
</html>
