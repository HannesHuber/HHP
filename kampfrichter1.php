<?php
session_start();
if (empty($_SESSION['KrAnzahl'])) {
    $_SESSION['KrAnzahl'] = 0;
}
if (empty($_SESSION['KrId'])) {
    $_SESSION['KrId'] = 0;
}
if (empty($_SESSION['KrV'])) {
    $_SESSION['KrV'] = 0;
}
if (empty($_SESSION['KrArt'])) {
    $_SESSION['KrArt'] = '';
}
if (empty($_SESSION['KrHGw'])) {
    $_SESSION['KrHGw'] = 0;
}
if (empty($_SESSION['KrFF'])) {
    $_SESSION['KrFF'] = '';
}
if (empty($_SESSION['B1'])) {
    $_SESSION['B1'] = 0;
}
if (empty($_SESSION['GueltigK1'])) {
    $_SESSION['GueltigK1'] = '';
}
if (empty($_SESSION['reloadK1'])) {
    $_SESSION['reloadK1'] = 0;
}
if (empty($_SESSION['T-WertK1'])) {
    $_SESSION['T-WertK1'] = 0;
}
if (empty($_SESSION['Zeitnehmer_bridge'])) {
    $_SESSION['Zeitnehmer_bridge'] = 0;
}
if (empty($_SESSION['Anweisung1Checker'])) {
    $_SESSION['Anweisung1Checker'] = 0;
}
if (empty($_SESSION['Lampe_Signal1'])) {
	$_SESSION['Lampe_Signal1'] = 0;
}
	
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">
<meta name="viewport" content="width=device-width,height=device-height,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" type="text/css" href="CSS/kampfrichter.css">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">
document.ontouchmove = function(event){
    event.preventDefault();
}

$(document).ready(function() {
  $("#HardwareAnweisung").load("JQuery/HardwareAnweisung.php");
  var refreshId = setInterval(function() {
     $("#HardwareAnweisung").load('JQuery/HardwareAnweisung.php?' + 1*new Date());
  }, 150);
});

     $(document).ready(function() {
       $("#showTime").load("JQuery/getTime.php");
       var refreshId = setInterval(function() {
          $("#showTime").load("JQuery/getTime.php?" + 1*new Date());
       }, 250);
    });

     $(document).ready(function() {
       $("#newKR1").load("JQuery/new_load_kr1.php");
       var refreshId = setInterval(function() {
          $("#newKR1").load('JQuery/new_load_KR1.php?' + 1*new Date());
       }, 500);
    });

     $(document).ready(function() {
       $("#variablen_reload").load("JQuery/variablen_reload_kr1.php");
       var refreshId = setInterval(function() {
          $("#variablen_reload").load('JQuery/variablen_reload_kr1.php?' + 1*new Date());
       }, 10000);
    });

    function add(value) {
    getElementById("T-Wert").innerHTML=getElementById("T-Wert").innerHTML + "value";
    }
</script>

</head>
<body>
<form method="post" action="kampfrichter1.php">

<span id="HardwareAnweisung"></span>

<?php

$KR_nummer=1;
$KR_nummer2=1;

include 'Outsorst/kampfrichter_pads_code.php';

?>

</form>
</body>
</html>