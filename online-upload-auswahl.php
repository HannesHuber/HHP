<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">

<script type="text/javascript" src="JS/Online-Upload.js"></script>

</head>

<body>
<span id="weiterleitung"></span>

<form method="post" action="wk_protokoll_grp.php">

<a href="auswertung.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>


<span id="ajaxtest"></span>

<div id="modal">
  <div class="spinner">
     <div class="bounce1"></div>
     <div class="bounce2"></div>
     <div class="bounce3"></div>
  </div>
</div>

<?php

ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';

$db=dbVerbindung();
$db_Online=dbVerbindungOnline();		//Sorgt für Online Con

$data_a_db['S_Db']=$_SESSION['WeK'];

loginCheck($stammdaten);

$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

$stammdaten = mysqli_fetch_assoc($datenbank);

$Online_Wk_Id=$stammdaten['Online_Id_Wk'];

echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Wettkampf hochladen</font></b></p>";


echo"
<br>
";

echo"
<br>
<br>
<br>";

$SQL_Online_Wk_Status=dbBefehlOnline("SELECT status FROM bundesliga Where cas_gguid='$Online_Wk_Id'");
$Data_status = mysqli_fetch_assoc($SQL_Online_Wk_Status);
$status=$Data_status['status'];

mysqli_close($db_Online);

//Ungleich 3
if($status < 3){
  echo"<p class=\"unter\">Wettkampf hochladen:</p>";
  echo "<button type=\"button\" id=\"Wk-Upload\" onclick=\"OnlineUpload()\">hochladen</button>";
}else{
    echo"<p class=\"unter\">Wettkampf wurde erfolgreich hochgeladen</p>";
}



?>

</form>
</body>
</html>
