<?php
include 'funktion.php';

  $string=__file__;
  $nummer=preg_replace("/[^0-9]/","",$string);

$db = mysqli_connect("database_hhp", "root", "", "thomas");

if (mysqli_connect_errno()) {
  printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
  exit();
}

$Bestellung=abfrage($nummer);

echoDIV($Bestellung);

mysqli_close($db);

?>