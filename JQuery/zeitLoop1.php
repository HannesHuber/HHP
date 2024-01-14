<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

function UpdateZeit($bridge, $value) {
    dbBefehl("UPDATE tmp_hardware_$bridge
                SET Zeit= '$value'");
}

$bridge=         $_SESSION['Zeitnehmer_bridge'];


if($bridge==0) $bridge=1;

$Anweisung=      $_SESSION['ZeitAnweisung'];
$Z_Wert=         $_SESSION['ZeitWert'];
$Z_Stempel=      $_SESSION['Zeitstempel'];
$CheckNull=      $_SESSION['CheckNull'];
$Check=          $_SESSION['Check'];
$Start=          $_SESSION['ErsterAufrufZeit'];
$time=           $Z_Wert;


if($Start==0){
$_SESSION['ZeitWert']          = 59;
$_SESSION['ZeitAnweisung']     = 0;
$_SESSION['CheckNull']         = 0;
$_SESSION['Check']             = 0;

UpdateZeit($bridge, '59');

$_SESSION['ErsterAufrufZeit']=1;
}

if($Anweisung==0 && $CheckNull==1)
{
   $timeArrayNOW = getdate();
   $timestampNOW = $timeArrayNOW['0'] +1; //+1 Damit der Zeitnehmer direkt sieht das es 
   $_SESSION['ZeitWert'] = $_SESSION['Zeitstempel'] - $timestampNOW;
   $_SESSION['CheckNull']=0;
   $_SESSION['Check'] =   0;

   $Z_Wert = $_SESSION['ZeitWert'];
   UpdateZeit($bridge, $Z_Wert);


}

if($Anweisung==1 && $Check==0)
{
   $timeArray = getdate();
   $timestamp = $timeArray['0'] + $Z_Wert;

   $_SESSION['Check'] =      1;
   $_SESSION['CheckNull']=   1;
   $_SESSION['Zeitstempel'] = $timestamp;
}

if($Anweisung==1)
{

   $timeArrayNOW = getdate();
   $timestampNOW = $timeArrayNOW['0'] + 1;
   $time = $_SESSION['Zeitstempel'] - $timestampNOW;

   UpdateZeit($bridge, $time);
}



?>