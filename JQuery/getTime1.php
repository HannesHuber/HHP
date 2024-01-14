<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$bridge=1;

$test = dbBefehl("SELECT * FROM tmp_hardware_$bridge");
$t = mysqli_fetch_assoc($test);

$time=$t['Zeit'];

if($time<0) $time==0;
echo $time;
?>