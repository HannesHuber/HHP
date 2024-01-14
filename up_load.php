<?php
session_start();
if (empty($_SESSION['UpLoad_IdStaat'])) {
	$_SESSION['UpLoad_IdStaat'] = 0;
}

header('Content-Type: text/html; charset=utf-8');
?>

<html>
<head>
<title>UpLoad</title>
<meta name="author" content="H-Pc" http-equiv="cache-control" content="no-cache">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">

</head>

<p class="kopf"><b>Staaten</b></p>

<a href="staaten.php" title="Link zu Staaten" id="range-logo">Staaten</a>

<form action="up_load.php" method="post" enctype="multipart/form-data">

<input type="file" name="datei"><br>
<input type="submit" value="Hochladen" name="xxx">
</form>

<?php
ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();




if(isset($_POST['xxx']))
{
	$IdStaat=$_SESSION['UpLoad_IdStaat'];
	$upload_folder = 'Bilder/FlaggenStaaten/'; //Das Upload-Verzeichnis
	$filename = $IdStaat;	//pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
	$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));


	//�berpr�fung der Dateiendung
	$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
	if(!in_array($extension, $allowed_extensions)) {
		die("Ung�ltige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
	}

	//�berpr�fung der Dateigr��e
	$max_size = 500*1024; //500 KB
	if($_FILES['datei']['size'] > $max_size) {
		die("Bitte keine Dateien gr��er 500kb hochladen");
	}

	//�berpr�fung dass das Bild keine Fehler enth�lt
	if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
		$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		$detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
		if(!in_array($detected_type, $allowed_types)) {
			die("Nur der Upload von Bilddateien ist gestattet");
		}
	}

	//Pfad zum Upload
	$new_path = $upload_folder.$filename.'.'.$extension;

	/*
	//Neuer Dateiname falls die Datei bereits existiert
	if(file_exists($new_path)) { //Falls Datei existiert, h�nge eine Zahl an den Dateinamen
		$id = 1;
		do {
			$new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
			$id++;
		} while(file_exists($new_path));
	}
	*/

	//Alles okay, verschiebe Datei an neuen Pfad
	move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);

	dbBefehl("UPDATE staaten
               SET FlaggenFormat= '$extension'
               WHERE IdStaat ='$IdStaat'");


	//echo 'Bild erfolgreich hochgeladen: ';

	echo"
 <script>
 setTimeout(function(){
     location = 'staaten.php'
   },1)
 </script>
";

}





?>
