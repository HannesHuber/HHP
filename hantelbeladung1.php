<?php
session_start();
if (empty($_SESSION['HantelGw1'])) {
    $_SESSION['HantelGw1'] = 0;
}
if (empty($_SESSION['HantelIdHeber1'])) {
	$_SESSION['HantelIdHeber1'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/hantelbeladung.css?v=1.2">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() {
       $("#new_load").load("JQuery/new_load_HantelGw1.php");
       var refreshId = setInterval(function() {
          $("#new_load").load('JQuery/new_load_HantelGw1.php?' + 1*new Date());
       }, 1000);
    });
</script>

</head>



<body onLoad="setTimeout('stoppuhr()',0)">
<?php
ob_start ();
//error_reporting(0);



include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$bridge=1;

$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");
$dNow = mysqli_fetch_assoc($NowT);         //Für Cookie freien aufruf der Übersicht    

$Grp = $dNow['Gruppe'];
$Art = $dNow['Art'];

$IdHeber=$dNow['IdHeber'];
$Hantel_Gewicht=$dNow['HGw'];

$DataGeschlecht = dbBefehl("SELECT Geschlecht, Jahrgang FROM heber WHERE IdHeber='$IdHeber'");
$dGeschlecht = mysqli_fetch_assoc($DataGeschlecht);         //Für Cookie freien aufruf der Übersicht

$_SESSION['HantelGw1']=$dNow['HGw'];
$_SESSION['HantelIdHeber1']=$IdHeber;



include 'Outsorst/code_hantelbeladung.php';
?>



</body>
</html>