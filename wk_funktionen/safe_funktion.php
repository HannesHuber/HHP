<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); // sorgt f�r die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

include '../funktionen/db_verbindung.php';
include '../funktionen/nuetzliches.php';
$db=dbVerbindung();

$idH = $_POST['id'];
$versuch = $_POST['versuch'];
$Hgw = $_POST['Hgw'];
$i = $_POST['i'];

$Art = $_SESSION['Wk_SoR'];
$WkName = $_SESSION['WeK'];
$bridge = $_SESSION['HWkBridge'];

$data_a_db['S_Db']=$WkName;	//F�r functionen aus nuetzliches


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
          dbBefehl("UPDATE tmp_ss_reload_$bridge
                              SET AnsagerR= '1', HeberRaumR='1', UebersichtR='1'
                       ");


        //Für Dezentralen Steigerungs Reload:
        dez_steigerung_reload_increase_couter();

          //F�r neuen Reload:
          ReloadVariableWkLeiterErhoehung($bridge);    //In funktionen/nuetzliches
          //Ende Reload
          

?>