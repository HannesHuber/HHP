<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include '../funktionen/db_verbindung.php';
include '../funktionen/kampfrichter_pads.php';

$bridge=$_SESSION['KR1_Bridge'];
$wk_name=$_SESSION['WeK'];
$Art=$_SESSION['KrArt'];

$db=dbVerbindung();
if($_SESSION['KrAnzahl']==1){
	
	if($_SESSION['Lampe_Signal1']=='1'){
		HardwareAnweisung1 ($bridge);
		$_SESSION['Lampe_Signal1']='0';
	}

}else{
	$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_$wk_name");
	$dataStamm = mysqli_fetch_assoc($dbstamm);
	
	$tmp_kr_check = dbBefehl("SELECT * FROM tmp_kr_check_$bridge");
	$kr_check = mysqli_fetch_assoc($tmp_kr_check);
	
	$Counter=0;
	
	if($dataStamm['Wk_Art']!= 'M_m_T'){
		if($kr_check['K1']==1) $Counter++;
		if($kr_check['K2']==1) $Counter++;
		if($kr_check['K3']==1) $Counter++;
	}else{
		if($kr_check['K1']==1 || $kr_check['K1']==2) $Counter++;
		if($kr_check['K2']==1 || $kr_check['K2']==2) $Counter++;
		if($kr_check['K3']==1 || $kr_check['K3']==2) $Counter++;
	}
	if($Counter>=2 && $_SESSION['Anweisung1Checker']==0){
		HardwareAnweisung1 ($bridge);
		$_SESSION['Anweisung1Checker']=1;
	}
	
}
?>