<?php
session_start(); //Cookie start
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/athletik.css" />
<link rel="stylesheet" type="text/css" href="CSS/athletik_print.css" media="print" />

</head>

<body>

<form method="post" action="athletik_eintragen.php">

<p class="kopf_np"><b>Athletik eintragen</b></p>

<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>

<?php

ob_start ();
error_reporting(0);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dstamm = mysqli_fetch_assoc($datenbank);
loginCheck($dstamm);

$Verein = dbBefehl("SELECT * FROM verein");

$time=getdate();

$Grp=$_SESSION['GrpAthEin'];

//F�r MK-�bersicht
$dataStammMK = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($dataStammMK);

$auswerte_Gruppe=$_SESSION['GrpAthEin'];
include 'funktionen/auswertung.php';
$Grp=$_SESSION['GrpAthEin'];
include 'funktionen/platzierungmk.php';
$Grp=$_SESSION['GrpAthEin'];


$AtGrp=$Grp;		//$_SESSION['At_Grp'];

$h = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                           WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                           AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                           ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC,
                           heber.Name ASC");

$test=false;                                                   //Wenn wieder getestet werden soll muss test=true sein!
$z=true;
/*                                                            //Wird ohne als besser empfunden
while($dtest = mysqli_fetch_assoc($h))                         //Test ob Jahrgang oder Geschlecht vermischt ist
{
  if($z==true){
         $Jg=$dtest[Jahrgrang];
         $Ges=$dtest[Geschlecht];
         $Alter=$time[year]-$dtest[Jahrgang];
         $z=false;
  }
  if(($Jg!=$dtest[Jahrgrang])||($Ges!=$dtest[Geschlecht])){
         $test=false;
  }
}
*/

if($_SESSION['Disziplin']==1)
{
include "athletik-eintragen/pendellauf.php";
}

if($_SESSION['Disziplin']==2)
{
include "athletik-eintragen/sprint.php";
}

if($_SESSION['Disziplin']==3)
{
include "athletik-eintragen/differenzsprung.php";
}

if($_SESSION['Disziplin']==4)
{
include "athletik-eintragen/schlussdreisprung.php";
}

if($_SESSION['Disziplin']==5)
{
include "athletik-eintragen/schockwurf.php";
}

if($_SESSION['Disziplin']==6)
{
include "athletik-eintragen/anristen.php";
}

if($_SESSION['Disziplin']==7)
{
include "athletik-eintragen/klimmziehen.php";
}

if($_SESSION['Disziplin']==8)
{
include "athletik-eintragen/zug-liegend.php";
}

if($_SESSION['Disziplin']==9)
{
include "athletik-eintragen/bankdrücken.php";
}

if($_SESSION['Disziplin']==10)
{
include "athletik-eintragen/liegestützen.php";
}

if($_SESSION['Disziplin']==11)
{
include "athletik-eintragen/beugestützen.php";
}

if($_SESSION['Disziplin']==12)
{
include "athletik-eintragen/sternlauf.php";
}

if($x==1)
{
reload_uebersicht_mk();	//in funktionen/nuetzliches.php

echo"
 <script>
 setTimeout(function(){
     location = 'athletik_eintragen.php'
   },0)
 </script>
";
}

?>
<br>

<input type="submit" name="speichern" value="Speichern">


</form>
</body>
</html>
