<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>

<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">

<script type='text/javascript' src="check_funktion.js"></script>

<link rel="stylesheet" type="text/css" href="../../CSS/alg.css">
<link rel="stylesheet" type="text/css" href="../../CSS/table.css">


</head>
<body>

<form method="post" action="db_reset.php">

<p class="kopf"><b>Datenbank Reset</b></p>

<a href="../start.php" title="Link zu Start" id="range-logo">Start</a>

<br>
<br>
<input id="Download" type="submit" name="dbReset" value="DB Reset">


<?php

include '../funktionen/db_verbindung.php';

$db=dbVerbindung();

echo "Das Resetten der Datenbank führt dazu das alle bisher gespeicherten Wettkämpfe sowie alle angelegten Heber und Vereine gelöscht werden.";

if(isset($_POST['dbReset']))                                                                                          //Speichern
{
	dbBefehl(" DROP DATABASE  hhp; ");	
	
	echo "Die Datenbank wurde erfolgreich gelöscht! Gehen Sie nun zurück auf localhost/start.php";
}
?>

</form>
</body>
</html>