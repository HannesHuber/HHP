<?php

// Name of the file
$filename = 'sqlDb/test(13).sql';
// MySQL host
$mysql_host = 'database_hhp';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = 'hhp';

// Connect to MySQL server
$db=mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);
if (mysqli_connect_errno()) {
  printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
  exit();
}

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    $Abfrage=mysqli_query($db,$templine);
    if (!$Abfrage) {
         echo "Konnte Abfrage ($templine) nicht erfolgreich ausfuehren von DB: " . mysqli_error($db);
         exit;
    }
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>