<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$bridge=$_SESSION['Zeitnehmer_bridge'];

$_SESSION['ZeitWert']          = 60;
$_SESSION['ZeitAnweisung']     = 0;
$_SESSION['CheckNull']         = 0;
$_SESSION['Check']             = 0;

   dbBefehl("UPDATE tmp_hardware_$bridge
                SET Zeit= '60'");


?>