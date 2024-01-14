<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta name="author" content="hanne">
<meta name="editor" content="html-editor phase 5">
</head>
<body text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000">
<link rel="stylesheet" type="text/css" href="CSS/alg.css">

<p id="head"><b>Chill am Grill</b></p>
<?php

ob_start ();
error_reporting(0);



$db = mysqli_connect("database_hhp", "root", "", "thomas");

if (mysqli_connect_errno()) {
  printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
  exit();
}


mysqli_close($db);

?>



<a href="kasse.php" title="Link zur Kasse" id="Kasse">Kasse</a>
<a href="koch.php" title="Link zum Koch" id="Koch">Koch</a>

</body>
</html>