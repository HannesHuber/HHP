<?php
@set_time_limit(0);	//Damit Script so lange ausführen darf wie es will



$servername = "database_hhp";
$username = "root";
$password = "";
$dbName = "hhp";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Drope Database
$sql = "DROP DATABASE hhp";
mysqli_query($conn, $sql);

// Create database
$sql = "CREATE DATABASE " . $dbName;
if (mysqli_query($conn, $sql)) {
    echo "<br>Datenbank erfolgreich erstellt.";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);


// Name of the file
$filename = '../upload/upload.sql';
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
         echo "Konnte Abfrage ($templine) nicht erfolgreich ausführen von DB: " . mysqli_error($db);
         exit;
    }
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "<br>Tabellen erfolgreich angelegt";

mysqli_close($db);

?>