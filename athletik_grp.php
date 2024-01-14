<?php
session_start(); //Cookie start
if (empty($_SESSION['GrpAthEin'])) {
    $_SESSION['GrpAthEin'] = 0;
}
if (empty($_SESSION['Disziplin'])) {
    $_SESSION['Disziplin'] = 0;
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



<form method="post" action="athletik_grp.php">

<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>


<?php



ob_start ();
error_reporting(1);


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dstamm = mysqli_fetch_assoc($datenbank);
loginCheck($dstamm);

$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Athletiklisten</font></b></p>";

echo"
<br>
<br>
<br>
<br>";

if((isset($_POST['send']))&&($_POST['Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}

         echo"<p class=\"unter\">Gruppe &nbsp;Disziplin </p>";

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

if((isset($_POST['send']))&&($_POST['A2']==''))
{
         $style2="border: 2px solid #FF0000";
         $stylezwei2="background-color: #FAFFAD";
}


         echo " &nbsp;<select STYLE=\"$style2; $stylezwei2;\" name=\"A2\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

               if($dstamm['Pendellauf']==1){
                         echo "<option value='1'>Pendellauf</option>";
               }
               if($dstamm['Sprint']==1){
                         echo "<option value='2'>Sprint</option>";
               }
               if(($dstamm['Differenzsprung']==1) || ($dstamm['DifferenzsprungEmatte']==1)){
                         echo "<option value='3'>Differenzsprung</option>";
               }
               if($dstamm['Schlussdreisprung']==1){
                         echo "<option value='4'>Schlussdreisprung</option>";
               }
               if($dstamm['Schockwurf']==1){
                         echo "<option value='5'>Schockwurf</option>";
               }
               if($dstamm['Anristen']==1){
                         echo "<option value='6'>Anristen</option>";
               }
               if($dstamm['Klimmziehen']==1){
                         echo "<option value='7'>Klimmziehen</option>";
               }
               if($dstamm['Zug']==1){
                         echo "<option value='8'>Zug liegend</option>";
               }
               if($dstamm['Bankdruecken']==1){
                         echo "<option value='9'>Bankdrücken</option>";
               }
               if($dstamm['Liegestuetz']==1){
                         echo "<option value='10'>Liegestütz</option>";
               }
               if($dstamm['Beugestuetz']==1){
                         echo "<option value='11'>Beugestütz</option>";
               }
               if($dstamm['Sternlauf']==1){
                         echo "<option value='12'>Sternlauf</option>";
               }

         echo "</select>";

echo"<input type=\"submit\" name=\"send\" value=\"Auswahl\">";

if((isset($_POST['send']))&&(($_POST['Auswahl']!='')&&($_POST['A2']!='')))
{
              $_SESSION['GrpAthEin']=$_POST['Auswahl'];
              $_SESSION['Disziplin']=$_POST['A2'];


echo"
 <script>
 setTimeout(function(){
     location = 'athletik_eintragen.php'
   },0)
 </script>
";


}






?>










</body>
</html>
