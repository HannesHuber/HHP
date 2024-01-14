<?php
session_start();
if (empty($_SESSION['JuryId'])) {
    $_SESSION['JuryId'] = 0;
}
if (empty($_SESSION['JuryV'])) {
    $_SESSION['JuryV'] = 0;
}
if (empty($_SESSION['JuryArt'])) {
    $_SESSION['JuryArt'] = '';
}
if (empty($_SESSION['KrHGw'])) {
    $_SESSION['KrHGw'] = 0;
}
if (empty($_SESSION['BJury'])) {
    $_SESSION['BJury'] = 0;
}
if (empty($_SESSION['JuryGueltig'])) {
    $_SESSION['JuryGueltig'] = '';
}
if (empty($_SESSION['reloadJury'])) {
    $_SESSION['reloadJury'] = 0;
}
if (empty($_SESSION['T-WertJury'])) {
    $_SESSION['T-WertJury'] = 0;
}
if (empty($_SESSION['Zeitnehmer_bridge'])) {
    $_SESSION['Zeitnehmer_bridge'] = 0;
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
     $("#newkr1").load("JQuery/new_load_jury.php");
     var refreshId = setInterval(function() {
        $("#newkr1").load('JQuery/new_load_jury.php?' + 1*new Date());
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
<form method="post" action="jury.php">

<span id="HardwareAnweisung"></span>

<?php

include 'Outsorst/jury_pad_code.php';

?>

</form>
</body>
</html>