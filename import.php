<?php
@set_time_limit(0); //Damit Script so lange ausführen darf wie es will


$path = preg_replace("/\\\\/","/",__FILE__);
$path = dirname ($path);
$path = trim($path);

// Pfad zum Backup
$path .= "/upload/";

$target_dir = $path;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$newfileName=$target_dir . "upload.sql";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "sql" ) {
			echo "Die Datei ist keine .sql Datei!";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, die Datei konnte nicht hochgeladen werden.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfileName)) {
				echo "<p id='TextWirdHochgeladen'>Die Datei ". basename( $_FILES["fileToUpload"]["name"]). " wird nun hochgeladen.</p>";
			} else {
				echo "Es gab einen Fehler beim Hochladen der Datei.";
			}
		}

		
		
		
		
		
