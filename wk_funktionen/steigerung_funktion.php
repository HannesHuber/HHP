<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); // sorgt f�r die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

//Funktion wird in dezentraler Steigerung aufgerufen

include '../funktionen/db_verbindung.php';
include '../funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$idH = $_POST['id'];
$versuch = $_POST['versuch'];
$Hgw = $_POST['Hgw'];
$i = $_POST['i'];
$Art= $_POST['Art'];

if( $Art=='R'){
    $Art='Reissen';
}else{
    $Art='Stossen';
}

// echo $Hgw;

$WkName = $_SESSION['WeK'];

$bridge = $_SESSION['HWkBridge'];


                         //Cookie f�r FehlerFang f�r Gerd Tabelle

                 if($i==1){

                    $_SESSION['IdHeber'] = $idH;
                    $_SESSION['Steigerung']=1;
                 }else{
                                         //Falls einer runtersteigert!
                    $_SESSION['IdHeber'] = $idH;
                    $_SESSION['Steigerung']=2;

                 }

                       // Cookie ende


                 while($versuch<=3){

                         dbBefehl("UPDATE heber_wk_$WkName
                                      SET $Art= '$Hgw'
                                      WHERE IdHeber='$idH'
                                      AND Versuch='$versuch'
                                      ");

                         $versuch++;
                         $Hgw++;

                 }
         
    //Für wk-leiter und anzeigen Reload:
    reload_wk_leiter_und_anzeigen($bridge); //function in funktionen/nuetzliches.php

          

?>