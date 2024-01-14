<?php
session_start();
if (empty($_SESSION['KrAnzahl'])) {
    $_SESSION['KrAnzahl'] = 0;
}
if (empty($_SESSION['KrId2'])) {
    $_SESSION['KrId2'] = 0;
}
if (empty($_SESSION['KrV2'])) {
    $_SESSION['KrV2'] = 0;
}
if (empty($_SESSION['KrArt2'])) {
    $_SESSION['KrArt'] = '';
}
if (empty($_SESSION['KrHGw2'])) {
    $_SESSION['KrHGw2'] = 0;
}
if (empty($_SESSION['B2'])) {
    $_SESSION['B2'] = 0;
}
if (empty($_SESSION['GueltigK2'])) {
    $_SESSION['GueltigK2'] = '';
}
if (empty($_SESSION['reloadK2'])) {
    $_SESSION['reloadK2'] = 0;
}
if (empty($_SESSION['T-WertK2'])) {
    $_SESSION['T-WertK2'] = 0;
}
if (empty($_SESSION['Zeitnehmer_bridge'])) {
    $_SESSION['Zeitnehmer_bridge'] = 0;
}
if (empty($_SESSION['Lampe_Signal2'])) {
	$_SESSION['Lampe_Signal2'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/kampfrichter.css">


<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">

     $(document).ready(function() {
       $("#showTime").load("JQuery/getTime.php");
       var refreshId = setInterval(function() {
          $("#showTime").load("JQuery/getTime.php?" + 1*new Date());
       }, 250);
    });

     $(document).ready(function() {
       $("#newKR2").load("JQuery/new_load_kr2.php");
       var refreshId = setInterval(function() {
          $("#newKR2").load('JQuery/new_load_kr2.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#variablen_reload").load("JQuery/variablen_reload_kr2.php");
       var refreshId = setInterval(function() {
          $("#variablen_reload").load('JQuery/variablen_reload_kr2.php?' + 1*new Date());
       }, 10000);
    });

    function add(value) {
    getElementById("T-Wert").innerHTML=getElementById("T-Wert").innerHTML + "value";
    }
</script>

</head>

<form method="post" action="kampfrichter2.php">

<body>
<?php


$KR_nummer=2;
$KR_nummer2=2;


include 'Outsorst/kampfrichter_pads_code.php';
?>


</body>
</html>