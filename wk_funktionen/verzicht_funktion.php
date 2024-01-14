<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); // sorgt f�r die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

ob_start ();
error_reporting(0);

include '../funktionen/db_verbindung.php';
include '../funktionen/nuetzliches.php';
include '../funktionen/auswertung_funktionen.php';
$db=dbVerbindung();

$idH = $_POST['id'];
$versuch = $_POST['versuch'];
$WkArt = $_POST['WkArt'];
$Hgw = $_POST['Hgw'];

$Art = $_SESSION['Wk_SoR'];
$WkName = $_SESSION['WeK'];
$bridge = $_SESSION['HWkBridge'];

$data_a_db['S_Db']=$WkName;	//F�r Einzel Heber Auswertung

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_$WkName");
$stammdaten = mysqli_fetch_assoc($datenbank);

$date = date_create();
$timestamp = date_timestamp_get($date);

$nIdH = $_POST['nIdH'];
$nV = $_POST['nV'];
$nHgw = $_POST['nHgw'];
$alleVersuche = $_POST['alleVersuche'];

$_SESSION['NHeber']=$idH;             //f�r Heber dr�ber
$_SESSION['NHVersuch'] = $versuch;
$_SESSION['NHHgw'] = $nHgw;

if($alleVersuche==1){
    for($x=$versuch;$x<=3;$x++){

                         dbBefehl("UPDATE heber_wk_$WkName
                                      SET Gueltig_$Art= 'Nein', NH_$Art='1', ".$Art."_Verzicht='1'
                                      WHERE IdHeber='$idH'
                                      AND Versuch='$x'
                                      ");
    }

    if($WkArt=='BL'){
        dbBefehl("UPDATE heber_$WkName
                    SET Reihenfolge= '0'
                    WHERE IdHeber ='$idH'
                 ");
    }

}else{
    dbBefehl("UPDATE heber_wk_$WkName
                                      SET Gueltig_$Art= 'Nein', NH_$Art='1', ".$Art."_Verzicht='1', time_$Art = '$timestamp'
                                      WHERE IdHeber='$idH'
                                      AND Versuch='$versuch'
                                      ");
}

    //Benoetigt nützliches!!
    Einzel_Heber_Auswertung($idH);	//Wertet Heber direkt aus in Tabelle auswertung und auswertung_mk

    
    //Für Dezentralen Steigerungs Reload:
    dez_steigerung_reload_increase_couter();
    
    //F�r neuen Reload:
    ReloadVariableWkLeiterErhoehung($bridge);    //In funktionen/nuetzliches
    //Ende Reload
