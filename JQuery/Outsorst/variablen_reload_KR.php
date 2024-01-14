<?php
header('Content-Type: text/html; charset=utf-8');

if($KR_numb== 1)  $KR_numb='';       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss


$_SESSION['KrArt' . $KR_numb] = $_SESSION['KrArt' . $KR_numb];
$_SESSION['KrId' . $KR_numb] = $_SESSION['KrId' . $KR_numb];
$_SESSION['KrV' . $KR_numb] = $_SESSION['KrV' . $KR_numb];
$_SESSION['KrHGw' . $KR_numb] = $_SESSION['KrHGw' . $KR_numb];

if($KR_numb== '')  $KR_numb=1;       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss


$_SESSION['KR' . $KR_numb . '_Bridge'] = $_SESSION['KR' . $KR_numb . '_Bridge'];

$_SESSION['Zeitnehmer_bridge']= $_SESSION['Zeitnehmer_bridge'];


?>