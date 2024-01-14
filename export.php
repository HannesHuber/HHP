<?php

include 'funktionen/db_verbindung.php';

/*

Fatal error: Uncaught Error: Call to undefined function ereg_replace() in C:\xampp\htdocs\export.php:25 Stack trace: #0
C:\xampp\htdocs\einstellungen\db_backup_export.php(36): include() #1 {main} thrown in C:\xampp\htdocs\export.php on line 25
*/

$db=dbVerbindung();

@set_time_limit(0); //Damit Script so lange ausf�hren darf wie es will

//Verbindung zur Datenbank
//$verbindung = mysql_connect("database_hhp","User","Passwort") or die("Username/Passwort falsch");

// MySQL Datenbanken
$dbname = array();
$dbname[]= "hhp";	//Name Datenbank

// 0: Normale Datei
// 1: GZip-Datei
$compression = 0;	//Nicht Komprimiert

//Falls Gzip nicht vorhanden, kein Gzip
if(!extension_loaded("zlib"))
	$compression = 0;
	
	// Pfad zur aktuellen Datei
	$path = preg_replace("/\\\\/","/",__FILE__);
	$path = dirname ($path);
	$path = trim($path);
	
	// Pfad zum Backup
	$path .= "/backup/";
	
	//Speicherart
	//0: Nur Server speichern
	//1: Zus�tzlich per Email versenden
	$send = 0;
	
	//Email-Adresse f&uuml;r Backup
	$email = "email@adresse";
	
	
	//Dateityp
	if ($compression==1) $filetype = "sql.gz";
	else $filetype = "sql";
	
	//Dateieigenschaften
	$cur_time=date("d.m.Y H:i");
	$cur_date=date("Y-m-d");
	
	//Pfade zu den neuen Backup-Dateien (fur den Mailversand)
	//__Nicht ver�ndern___
	$backup_pfad = array();
	
			
	//Erstelle Struktur von Datenbank
	function get_def($dbname, $table) {
		global $verbindung;
		$def = "";
		
		$def .= "CREATE TABLE $table (\n";
		$result = dbBefehl("SHOW FIELDS FROM $table");
		while($row = mysqli_fetch_array($result)) {
			$def .= "    $row[Field] $row[Type]";
			if ($row["Default"] != "") $def .= " DEFAULT '$row[Default]'";
			if ($row["Null"] != "YES") $def .= " NOT NULL";
			if ($row["Extra"] != "") $def .= " $row[Extra]";
			$def .= ",\n";
		}
		$def = preg_replace ("/,\n$/","", $def);
		$result = dbBefehl("SHOW KEYS FROM $table");
		while($row = mysqli_fetch_array($result)) {
			$kname=$row["Key_name"];
			if(($kname != "PRIMARY") && ($row["Non_unique"] == 0)) $kname="UNIQUE|$kname";
			if(!isset($index[$kname])) $index[$kname] = array();
			$index[$kname][] = $row["Column_name"];
		}
		while(list($x, $columns) = @each($index)) {
			$def .= ",\n";
			if($x == "PRIMARY") $def .= "  PRIMARY KEY (" . implode($columns, ", ") . ")";
			else if (substr($x,0,6) == "UNIQUE") $def .= "  UNIQUE ".substr($x,7)." (" . implode($columns, ", ") . ")";
			else $def .= "  KEY $x (" . implode($columns, ", ") . ")";
		}
		
		$def .= "\n);";
		return (stripslashes($def));
	}
	
	//Erstelle Eint�ge von Tabelle
	function get_content($dbname, $table) {
		global $verbindung;
		$content="";
		$result = dbBefehl("SELECT * FROM $table");
		while($row = mysqli_fetch_row($result)) {
			$insert = "INSERT INTO $table VALUES (";
			for($j=0; $j<mysqli_num_fields($result);$j++) {
				if(!isset($row[$j])) $insert .= "NULL,";
				else if($row[$j] != "") $insert .= "'".addslashes($row[$j])."',";
				else $insert .= "'',";
			}
			$insert = preg_replace ("/,$/","",$insert);
			$insert .= ");\n";
			$content .= $insert;
		}
		return $content;
	}
	
	//Funktion um Backup auf dem Server zu speichern
	function write_backup($val,$newfile) //,$newfile_data
	{
		global $compression,$path,$cur_date,$filetype,$backup_pfad;
		
		$backup_pfad[] = $path.$val."_db_".$cur_date.".".$filetype;
		

		$fp = fopen ($path.$val."_db_".$cur_date.".".$filetype,"w");
		fwrite ($fp,$newfile);
		fclose ($fp);
			
			/*
			$fp = fopen($path.$val."_data_".$cur_date.".".$filetype,"w");
			fwrite ($fp,$newfile_data);
			fclose ($fp);
			*/
		
	}
	//Backup per Email verschicken
	function mail_att($to, $from, $subject, $message) {
		// $to Empf�nger
		// $from Absender ("email@domain.de" oder "Name <email@domain.de>")
		// $subject Betreff
		// $message Inhalt der Email
		global $backup_pfad; //Die Pfade zu den Dateien
		
		
		if(is_array($backup_pfad) AND count($backup_pfad) > 0)
		{
			$mime_boundary = "-----=" . md5(uniqid(rand(), 1));
			
			
			$header = "From: ".$from."\r\n";
			$header.= "MIME-Version: 1.0\r\n";
			$header.= "Content-Type: multipart/mixed;\r\n";
			$header.= " boundary=\"".$mime_boundary."\"\r\n";
			
			$content = "This is a multi-part message in MIME format.\r\n\r\n";
			$content.= "--".$mime_boundary."\r\n";
			$content.= "Content-Type: text/plain charset=\"utf-8\"\r\n";
			$content.= "Content-Transfer-Encoding: 7bit\r\n\r\n";
			$content.= $message."\r\n";
			
			//Dateien anhaengen
			foreach($backup_pfad AS $file)
			{
				$name = basename($file);
				$data = chunk_split(base64_encode(implode("", file($file))));
				$len = filesize($file);
				$content.= "--".$mime_boundary."\r\n";
				$content.= "Content-Disposition: attachment;\r\n";
				$content.= "\tfilename=\"$name\";\r\n";
				$content.= "Content-Length: .$len;\r\n";
				$content.= "Content-Type: application/x-gzip; name=\"".$file."\"\r\n";
				$content.= "Content-Transfer-Encoding: base64\r\n\r\n";
				$content.= $data."\r\n";
			}
			
			if(mail($to, $subject, $content, $header)) return true;
			else return false;
		}
		
		return false;
	}
	
	
	//Backup erstellen
	while (list(,$val) = each($dbname))
	{
		$newfile="# Daten Backup vom: $cur_time \r\n";
		$newfile_data="# Datenbackup: $cur_time \r\n# www.php-einfach.de \r\n";
		
		//backup schreiben
		$tables = dbBefehl("SHOW TABLES");
		$num_tables = @mysqli_num_rows($tables);
		$i = 0;
		while($DataTable=mysqli_fetch_array($tables))
		{
			$table = $DataTable[0];	//Hier k�nnte Tabellen Auswahl statt finden
			
			$newfile .= "\n# ----------------------------------------------------------\n#\n";
			$newfile .= "# structur for Table '$table'\n#\n";
			$newfile .= get_def($val,$table);
			$newfile .= "\n# ----------------------------------------------------------\n#\n";
			$newfile .= get_content($val,$table);	//Ein File
			$newfile .= "\n\n";
			
			/*
			$newfile_data .= "\n# ----------------------------------------------------------\n#\n";
			$newfile_data .= "#\n# data for table '$table'\n#\n";
			$newfile_data .= get_content($val,$table);
			$newfile_data .= "\n\n";
			*/
			
			$i++;
		}
		
		write_backup($val,$newfile);	//,$newfile_data
	} //End: while
	
	
	
	
	$filePath = $backup_pfad[0];
	
	
	if (file_exists($filePath)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filePath));
		ob_clean();
		flush();
		readfile($filePath);
		exit;
	}

