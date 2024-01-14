<?php
session_start();
if (empty($_SESSION['HCAA'])) {
    $_SESSION['HCAA'] = -1;
}
if (empty($_SESSION['VCAA'])) {
    $_SESSION['VCAA'] = -1;
}
if (empty($_SESSION['HGwCAA'])) {
    $_SESSION['HGwCAA'] = -1;
}
if (empty($_SESSION['AnsagerLH_B1'])) {
    $_SESSION['AnsagerLH_B1'] = 0;
}
if (empty($_SESSION['AnsagerLH_B2'])) {
    $_SESSION['AnsagerLH_B2'] = 0;
}
if (empty($_SESSION['AnsagerLHVersuch_B1'])) {
    $_SESSION['AnsagerLHVersuch_B1'] = 0;
}
if (empty($_SESSION['AnsagerLHVersuch_B2'])) {
    $_SESSION['AnsagerLHVersuch_B2'] = 0;
}
if (empty($_SESSION['JuryReloadSprecher1'])) {
	$_SESSION['JuryReloadSprecher1'] = '';
}


if (empty($_SESSION['ReloadIterationAnsager1'])) {
    $_SESSION['ReloadIterationAnsager1'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">
<link rel="stylesheet" type="text/css" href="CSS/ansager.css">


<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">

     $(document).ready(function() {
       $("#showTime").load("JQuery/getTime1.php");
       var refreshId = setInterval(function() {
          $("#showTime").load("JQuery/getTime1.php?" + 1*new Date());
       }, 300);
    });

     $(document).ready(function() {
       $("#newlA").load("JQuery/new_load_A.php");
       var refreshId = setInterval(function() {
          $("#newlA").load('JQuery/new_load_A.php?' + 1*new Date());
       }, 1000);
    });



     $(document).ready(function() {
         $("#Jury").load("JQuery/Jury_auslesen_Sprecher_1.php");
         var refreshId = setInterval(function() {
            $("#Jury").load('JQuery/Jury_auslesen_Sprecher_1.php?' + 1*new Date());
         }, 1000);
      });
</script>


<script type="text/javascript">
   start = new Date();
   startzeit = start.getTime();

   function stoppuhr()
  {
     aktuell = new Date();
     zeit = (aktuell.getTime() - startzeit) / 1000;
     document.getElementById('xxx').innerHTML = Math.round(zeit);        //   <span id="xxx"></span>  um die zeit auszugeben!
     setTimeout('stoppuhr()',1000);


   }


</script>


</head>



<body onLoad="setTimeout('stoppuhr()',0)">

<?php
ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$bridge=1;

$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");

$dNow = mysqli_fetch_assoc($NowT);

$Grp = $dNow['Gruppe'];
$Art = $dNow['Art'];

$_SESSION['HCAA']=$dNow['IdHeber'];
$_SESSION['VCAA']=$dNow['V'];
$_SESSION['HGwCAA']=$dNow['HGw'];


//F�r Reload �ber Iteration => Bei jedem laden nimm speichere zu dem zeitpunkt aktuellste Iteration, damit verglichen werden kann mit aktueller
$DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['ReloadIterationAnsager1']=$ReloadIteration['Bridge1'];


include ("Outsorst/ansager_code.php");

?>


</body>
</html>
