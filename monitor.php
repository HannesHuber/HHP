<?php
session_start();
if (empty($_SESSION['krIdHAn1'])) {
    $_SESSION['krIdHAn1'] = -1;
}
if (empty($_SESSION['KrVAn1'])) {
    $_SESSION['KrVAn1'] = -1;
}
if (empty($_SESSION['KrArtAn1'])) {
    $_SESSION['KrArtAn1'] = '';
}
if (empty($_SESSION['KrHGwAn1'])) {
    $_SESSION['KrHGwAn1'] = -1;
}
if (empty($_SESSION['KrAnzahlAn1'])) {
    $_SESSION['KrAnzahlAn1'] = -1;
}
if (empty($_SESSION['ReloadHeberAnzeigeAn1'])) {
    $_SESSION['ReloadHeberAnzeigeAn1'] = -1;
}
if (empty($_SESSION['ReIdHeberAn1'])) {
    $_SESSION['ReIdHeberAn1'] = -1;
}
if (empty($_SESSION['KrBridgeAn1'])) {
    $_SESSION['KrBridgeAn1'] = -1;
}
if (empty($_SESSION['WkArt1'])) {
	$_SESSION['WkArt1'] = '';
}
if (empty($_SESSION['JuryReload1'])) {
	$_SESSION['JuryReload1'] = '';
}
if (empty($_SESSION['MonitorReload'])) {
	$_SESSION['MonitorReload'] = 0;
}
if (empty($_SESSION['MonitorReloadChecker'])) {
	$_SESSION['MonitorReloadChecker'] = 0;
}
header('Content-Type: text/html; charset=utf-8');    //
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<!--   -->  <link rel="stylesheet" type="text/css" href="CSS/monitor.css">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">



     $(document).ready(function() {
       $("#g1").load("JQuery/monitorkr1.php");
       var refreshId = setInterval(function() {
          $("#g1").load('JQuery/monitorkr1.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g2").load("JQuery/monitorkr2.php");
       var refreshId = setInterval(function() {
          $("#g2").load('JQuery/monitorkr2.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g3").load("JQuery/monitorkr3.php");
       var refreshId = setInterval(function() {
          $("#g3").load('JQuery/monitorkr3.php?' + 1*new Date());
       }, 1000);
    });


     $(document).ready(function() {
       $("#tg").load("JQuery/kr_auslesen_t1.php");
       var refreshId = setInterval(function() {
          $("#tg").load('JQuery/kr_auslesen_t1.php?' + 1*new Date());
       }, 1000);
    });




</script>

</head>


<body onLoad="setTimeout('stoppuhr()',0)">

<?php
ob_start ();
error_reporting(1);          //

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();


$bridge=1;

include ("Outsorst/monitor_code.php");
?>



</body>
</html>
