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

<form method="post" action="teilnehmerliste.php">

<p class="kopf_np"><b>Athletikliste Drucken</b></p>

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>

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

$Verein = dbBefehl("SELECT * FROM verein");

$time=getdate();

$AtGrp=$_SESSION['At_Grp'];

$h = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                      WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                      AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$AtGrp'
                      ORDER BY heber_".$data_a_db['S_Db'].".Gruppe_Aus ASC,
                      heber.Name ASC");

$test=false;                                                   //Wenn wieder getestet werden soll muss test=true sein!
$z=true;

/*                                                            //Wird als besser empfunden ohne
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

if($dstamm['Pendellauf']==1)
{
include "athletik-listen/pendellauf.php";
}

if($dstamm['Sprint']==1)
{
include "athletik-listen/sprint.php";
}

if(($dstamm['Differenzsprung']==1) || ($dstamm['DifferenzsprungEmatte']==1))
{
include "athletik-listen/differenzsprung.php";
}

if($dstamm['Schlussdreisprung']==1)
{
include "athletik-listen/schlussdreisprung.php";
}

if($dstamm['Schockwurf']==1)
{
include "athletik-listen/schockwurf.php";
}

if($dstamm['Anristen']==1)
{
include "athletik-listen/anristen.php";
}

if($dstamm['Klimmziehen']==1)
{
include "athletik-listen/klimmziehen.php";
}

if($dstamm['Zug']==1)
{
include "athletik-listen/zug-liegend.php";
}

if($dstamm['Bankdruecken']==1)
{
include "athletik-listen/bankdrücken.php";
}

if($dstamm['Liegestuetz']==1)
{
include "athletik-listen/liegestützen.php";
}

if($dstamm['Beugestuetz']==1)
{
include "athletik-listen/beugestützen.php";
}
if($dstamm['Sternlauf']==1)
{
include "athletik-listen/sternlauf.php";
}






?>

</body>
</html>
