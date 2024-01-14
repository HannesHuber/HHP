<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$bridge=$_SESSION['Zeitnehmer_bridge'];

$Anweisung=$_SESSION['ZeitAnweisung'];

if($Anweisung==0)
{
$value = $_POST['value'];
$_SESSION['ZeitWert'] += $value;
$time= $_SESSION['ZeitWert'];

   dbBefehl("UPDATE tmp_hardware_$bridge
                SET Zeit= '$time'");
}

?>