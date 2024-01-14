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


if (empty($_SESSION['ReloadIterationEinzelAnzeige1'])) {
    $_SESSION['ReloadIterationEinzelAnzeige1'] = 0;
}
if (empty($_SESSION['ReloadDelayTimeTracker1'])) {
    $_SESSION['ReloadDelayTimeTracker1'] = 0;
}
if (empty($_SESSION['ReloadDelayTimeCheck1'])) {
    $_SESSION['ReloadDelayTimeCheck1'] = 0;
}
header('Content-Type: text/html; charset=utf-8');    //
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

        <link rel="stylesheet" type="text/css" href="CSS/kr_anzeige.css">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">

     $(document).ready(function() {
       $("#showTime").load("JQuery/getTime1.php");
       var refreshId = setInterval(function() {
          $("#showTime").load("JQuery/getTime1.php?" + 1*new Date());
       }, 300);
    });

     $(document).ready(function() {
       $("#new_load").load("JQuery/new_load_anzeige_1.php");
       var refreshId = setInterval(function() {
          $("#new_load").load('JQuery/new_load_anzeige_1.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g1").load("JQuery/kr_auslesen_g1_b1.php");
       var refreshId = setInterval(function() {
          $("#g1").load('JQuery/kr_auslesen_g1_b1.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g2").load("JQuery/kr_auslesen_g2_b1.php");
       var refreshId = setInterval(function() {
          $("#g2").load('JQuery/kr_auslesen_g2_b1.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g3").load("JQuery/kr_auslesen_g3_b1.php");
       var refreshId = setInterval(function() {
          $("#g3").load('JQuery/kr_auslesen_g3_b1.php?' + 1*new Date());
       }, 1000);
    });


     $(document).ready(function() {
       $("#tg").load("JQuery/kr_auslesen_t1.php");
       var refreshId = setInterval(function() {
          $("#tg").load('JQuery/kr_auslesen_t1.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
         $("#Jury").load("JQuery/Jury_auslesen_1.php");
         var refreshId = setInterval(function() {
            $("#Jury").load('JQuery/Jury_auslesen_1.php?' + 1*new Date());
         }, 1000);
      });
/*
     $(document).ready(function() {
         $("#te1").load("JQuery/kr_te_auslesen_g1_b1.php");
         var refreshId = setInterval(function() {
            $("#te1").load('JQuery/kr_te_auslesen_g1_b1.php?' + 1*new Date());
         }, 1000);
      });

       $(document).ready(function() {
         $("#te2").load("JQuery/kr_te_auslesen_g2_b1.php");
         var refreshId = setInterval(function() {
            $("#te2").load('JQuery/kr_te_auslesen_g2_b1.php?' + 1*new Date());
         }, 1000);
      });

       $(document).ready(function() {
         $("#te3").load("JQuery/kr_te_auslesen_g3_b1.php");
         var refreshId = setInterval(function() {
            $("#te3").load('JQuery/kr_te_auslesen_g3_b1.php?' + 1*new Date());
         }, 1000);
      });
*/

</script>

</head>


<body onLoad="setTimeout('stoppuhr()',0)">

<?php
ob_start ();
error_reporting(0);          //

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];


$bridge=1;

//F�r Reload �ber Iteration => Bei jedem laden nimm speichere zu dem zeitpunkt aktuellste Iteration, damit verglichen werden kann mit aktueller
$DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['ReloadIterationEinzelAnzeige1']=$ReloadIteration['Bridge1'];

include ("Outsorst/heber_anzeige_code.php");
?>



</body>
</html>
