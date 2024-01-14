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

<script type='text/javascript' src="../JS/import.js"></script>


</head>
<body>

<form action="db_backup_import.php" method="post" enctype="multipart/form-data">

<p class="kopf"><b>Datenbank Backup Import</b></p>

<a href="alg_einstellungen.php" title="Link zu den Einstellungen" id="range-logo">Einstellungen</a>


<br>
<br>
<p style="font-size:18pt;">
Vorsicht das Hochladen einer Datenbank �berschreibt alle bisher angelegten Wettk�mpfe!
</p>

<br>
<br>

'.sql' Datei ausw�hlen die Hochgeladen werden sollen:
<br>
<br>
<input type="file" name="fileToUpload" id="fileToUpload">
<br>
<br>
<br>
<input type="submit" name="Upload" value="Backup Hochladen">

<span id="ajaxtest"></span>
<span id="ajax-loeschen"></span>
<span id="mkot_ersteller"></span>
<span id="mkmt_ersteller"></span>

<div id="modal">
  <div class="spinner">
     <div class="bounce1"></div>
     <div class="bounce2"></div>
     <div class="bounce3"></div>
  </div>
</div>

<?php

ob_start();
error_reporting(0);

include '../funktionen/db_verbindung.php';

function dbTestImport()
{
	$conn = mysqli_connect("database_hhp", "root", "", "hhp");
	
	if(mysqli_connect_error()=="Unknown database 'hhp'"){
		
		echo"<script> dbImport() </script>";
		exit();
	}
	mysqli_close($conn);
	
}

$db=dbVerbindung();

if(isset($_POST['Upload']))                                                                                          //Speichern
{
	include '../import.php';
	
	echo"<script> dbImport() </script>";
	exit();
	

	

	
	//include '../Ajax-PHP/db_import.php';
	
}




?>

</form>
</body>
</html>