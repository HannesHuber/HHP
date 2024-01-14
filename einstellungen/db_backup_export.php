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

<form method="post" action="db_backup_export.php">

<p class="kopf"><b>Datenbank Backup Export</b></p>

<a href="alg_einstellungen.php" title="Link zu den Einstellungen" id="range-logo">Einstellungen</a>

<br>
<br>
<input id="Download" type="submit" name="dbDownload" value="Download DB">


<?php


if(isset($_POST['dbDownload']))                                                                                          //Speichern
{

	include '../export.php';	
	

}
?>

</form>
</body>
</html>