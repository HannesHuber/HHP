<?php
session_start();
if (empty($_SESSION['KrIdHAn2'])) {
    $_SESSION['KrIdHAn2'] = -1;
}
if (empty($_SESSION['KrVAn2'])) {
    $_SESSION['KrVAn2'] = -1;
}
if (empty($_SESSION['KrArtAn2'])) {
    $_SESSION['KrArtAn2'] = '';
}
if (empty($_SESSION['KrHGwAn2'])) {
    $_SESSION['KrHGwAn2'] = -1;
}
if (empty($_SESSION['KrAnzahlAn2'])) {
    $_SESSION['KrAnzahlAn2'] = -1;
}
if (empty($_SESSION['ReloadHeberAnzeigeAn2'])) {
    $_SESSION['ReloadHeberAnzeigeAn2'] = -1;
}
if (empty($_SESSION['ReIdHeberAn2'])) {
    $_SESSION['ReIdHeberAn2'] = -1;
}
if (empty($_SESSION['KrBridgeAn2'])) {
    $_SESSION['KrBridgeAn2'] = -1;
}
if (empty($_SESSION['WkArt2'])) {
	$_SESSION['WkArt2'] = '';
}
if (empty($_SESSION['JuryReload2'])) {
	$_SESSION['JuryReload2'] = '';
}


if (empty($_SESSION['ReloadIterationEinzelAnzeige2'])) {
    $_SESSION['ReloadIterationEinzelAnzeige2'] = 0;
}
if (empty($_SESSION['ReloadDelayTimeTracker2'])) {
    $_SESSION['ReloadDelayTimeTracker2'] = 0;
}
if (empty($_SESSION['ReloadDelayTimeCheck2'])) {
    $_SESSION['ReloadDelayTimeCheck2'] = 0;
}
header('Content-Type: text/html; charset=utf-8');    //
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<!-- --> <link rel="stylesheet" type="text/css" href="CSS/kr_anzeige.css">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">

     $(document).ready(function() {
       $("#showTime").load("JQuery/getTime2.php");
       var refreshId = setInterval(function() {
          $("#showTime").load("JQuery/getTime2.php?" + 1*new Date());
       }, 300);
    });


     $(document).ready(function() {
       $("#new_load").load("JQuery/new_load_anzeige_2.php");
       var refreshId = setInterval(function() {
          $("#new_load").load('JQuery/new_load_anzeige_2.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g1").load("JQuery/kr_auslesen_g1_b2.php");
       var refreshId = setInterval(function() {
          $("#g1").load('JQuery/kr_auslesen_g1_b2.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g2").load("JQuery/kr_auslesen_g2_b2.php");
       var refreshId = setInterval(function() {
          $("#g2").load('JQuery/kr_auslesen_g2_b2.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g3").load("JQuery/kr_auslesen_g3_b2.php");
       var refreshId = setInterval(function() {
          $("#g3").load('JQuery/kr_auslesen_g3_b2.php?' + 1*new Date());
       }, 1000);
    });


     $(document).ready(function() {
       $("#tg").load("JQuery/kr_auslesen_t2.php");
       var refreshId = setInterval(function() {
          $("#tg").load('JQuery/kr_auslesen_t2.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
         $("#Jury").load("JQuery/Jury_auslesen_2.php");
         var refreshId = setInterval(function() {
            $("#Jury").load('JQuery/Jury_auslesen_2.php?' + 1*new Date());
         }, 1000);
      });
/*
     $(document).ready(function() {
         $("#te1").load("JQuery/kr_te_auslesen_g1_b2.php");
         var refreshId = setInterval(function() {
            $("#te1").load('JQuery/kr_te_auslesen_g1_b2.php?' + 1*new Date());
         }, 1000);
      });

       $(document).ready(function() {
         $("#te2").load("JQuery/kr_te_auslesen_g2_b2.php");
         var refreshId = setInterval(function() {
            $("#te2").load('JQuery/kr_te_auslesen_g2_b2.php?' + 1*new Date());
         }, 1000);
      });

       $(document).ready(function() {
         $("#te3").load("JQuery/kr_te_auslesen_g3_b2.php");
         var refreshId = setInterval(function() {
            $("#te3").load('JQuery/kr_te_auslesen_g3_b2.php?' + 1*new Date());
         }, 1000);
      });
*/

</script>

</head>


<body onLoad="setTimeout('stoppuhr()',0)">

<?php
ob_start ();
error_reporting(0);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];


$bridge=2;

//F�r Reload �ber Iteration => Bei jedem laden nimm speichere zu dem zeitpunkt aktuellste Iteration, damit verglichen werden kann mit aktueller
$DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['ReloadIterationEinzelAnzeige2']=$ReloadIteration['Bridge2'];

include ("Outsorst/heber_anzeige_code.php");
?>



</body>
</html>
