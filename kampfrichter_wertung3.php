<?php
session_start();
if (empty($_SESSION['KrAnzahl'])) {
    $_SESSION['KrAnzahl'] = 0;
}
if (empty($_SESSION['KrId3'])) {
    $_SESSION['KrId3'] = 0;
}
if (empty($_SESSION['KrV3'])) {
    $_SESSION['KrV3'] = 0;
}
if (empty($_SESSION['KrArt3'])) {
    $_SESSION['KrArt3'] = '';
}
if (empty($_SESSION['KrHGw3'])) {
    $_SESSION['KrHGw3'] = 0;
}
if (empty($_SESSION['B3'])) {
    $_SESSION['B3'] = 0;
}
if (empty($_SESSION['GueltigK3'])) {
    $_SESSION['GueltigK3'] = '';
}
if (empty($_SESSION['reloadK3'])) {
    $_SESSION['reloadK3'] = 0;
}
if (empty($_SESSION['T-WertK3'])) {
    $_SESSION['T-WertK3'] = 0;
}
if (empty($_SESSION['Zeitnehmer_bridge'])) {
    $_SESSION['Zeitnehmer_bridge'] = 0;
}
if (empty($_SESSION['Lampe_Signal3'])) {
	$_SESSION['Lampe_Signal3'] = 0;
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
    $("#newkr3").load("JQuery/new_load_kr3.php");
    var refreshId = setInterval(function() {
        $("#newkr3").load('JQuery/new_load_kr3.php?' + 1*new Date());
    }, 1000);
    });

     $(document).ready(function() {
       $("#variablen_reload").load("JQuery/variablen_reload_kr3.php");
       var refreshId = setInterval(function() {
          $("#variablen_reload").load('JQuery/variablen_reload_kr3.php?' + 1*new Date());
       }, 10000);
    });

    function add(value) {
    getElementById("T-Wert").innerHTML=getElementById("T-Wert").innerHTML + "value";
    }
</script>

</head>

<form method="post" action="kampfrichter_wertung3.php">

<body>
<?php
$KR_numb=3;
include 'Outsorst/kampfrichter_pads_wertung_code.php';
?>


</body>
</html>