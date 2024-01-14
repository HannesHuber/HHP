<?php
header('Content-Type: text/html; charset=utf-8'); // sorgt f�r die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE


$db = mysqli_connect("database_hhp", "root", "", "thomas");

if (mysqli_connect_errno()) {
  printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
  exit();
}

$nummer = $_POST['nummer'];
$n2=$nummer-1;

$BestellungData = mysqli_query($db,"SELECT * FROM bestellungen LIMIT $nummer OFFSET $n2");
$Bestellung = mysqli_fetch_assoc ($BestellungData);

$BestId=$Bestellung['Idbest'];

mysqli_query($db,"DELETE FROM bestellungen WHERE Idbest = $BestId");


mysqli_close($db);

?>