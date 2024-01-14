<?php
session_start();
if (empty($_SESSION['ZeitAnweisung'])) {
    $_SESSION['ZeitAnweisung'] = 0;
}
if (empty($_SESSION['ZeitWert_Anzeige'])) {
    $_SESSION['ZeitWert_Anzeige'] = 60;
}
if (empty($_SESSION['Zeitstempel'])) {
    $_SESSION['Zeitstempel'] = 0;
}
if (empty($_SESSION['CheckNull'])) {
    $_SESSION['CheckNull'] = 0;
}
if (empty($_SESSION['Check'])) {
    $_SESSION['Check'] = 0;
}
if (empty($_SESSION['ErsterAufrufZeit'])) {
    $_SESSION['ErsterAufrufZeit'] = 0;
}

header('Content-Type: text/html; charset=utf-8');
//
//

?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/zeitnehmer.css">
<link rel="stylesheet" type="text/css" href="CSS/ButtonNumpad.css">


<script type='text/javascript' src="jquery-2.2.1.min.js"></script>
<script type='text/javascript' src="JS/zeitnehmer_funktionen.js"></script>

<script type="text/javascript">
     $(document).ready(function() {
       $("#zeitRefresh").load("JQuery/zeitLoop1.php");
       var refreshId = setInterval(function() {
          $("#zeitRefresh").load('JQuery/zeitLoop1.php?' + 1*new Date());
       }, 250);
    });

     $(document).ready(function() {
       $("#justTime").load("JQuery/getTime_Anzeige.php");
       var refreshId = setInterval(function() {
          $("#justTime").load("JQuery/getTime_Anzeige.php?" + 1*new Date());
       }, 250);
    });
</script>

<!--
<a href="wettkampf_anzeige.php" title="Link zur Wettkampf-Anzeige" id="range-logo">Wettkampf</a>

-->

</head>

<body>

<form method="post" action="zeitnehmer.php">



<?php

ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

$Grp =   $_SESSION['Wk_Grp'];
$Art =   $_SESSION['Wk_SoR'];
$bridge= $_SESSION['ZeitAnzeige_bridge'];

echo $bridge;


echo '<p id="middle"><span id="justTime"></span></p>';


?>

<span id="zeitRefresh"></span>

<div id="modal">
 <div class="sk-circle">
  <div class="sk-circle1 sk-child"></div>
  <div class="sk-circle2 sk-child"></div>
  <div class="sk-circle3 sk-child"></div>
  <div class="sk-circle4 sk-child"></div>
  <div class="sk-circle5 sk-child"></div>
  <div class="sk-circle6 sk-child"></div>
  <div class="sk-circle7 sk-child"></div>
  <div class="sk-circle8 sk-child"></div>
  <div class="sk-circle9 sk-child"></div>
  <div class="sk-circle10 sk-child"></div>
  <div class="sk-circle11 sk-child"></div>
  <div class="sk-circle12 sk-child"></div>
 </div>
</div>

</body>
</html>
