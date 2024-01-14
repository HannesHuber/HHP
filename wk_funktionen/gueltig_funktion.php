<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); // sorgt f�r die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

ob_start ();
error_reporting(0);
//Einzel Heber wirft undifined ... weil ''Fehlen

include '../funktionen/db_verbindung.php';
include '../funktionen/nuetzliches.php';
include '../funktionen/auswertung_funktionen.php';
$db=dbVerbindung();

$idH = $_POST['id'];
$gueltig = $_POST['gueltig'];
$versuch = $_POST['versuch'];
$WkArt = $_POST['WkArt'];
$Hgw = $_POST['Hgw'];

$Art = $_SESSION['Wk_SoR'];
$WkName = $_SESSION['WeK'];
$bridge = $_SESSION['HWkBridge'];

$data_a_db['S_Db']=$WkName;

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_$WkName");
$stammdaten = mysqli_fetch_assoc($datenbank);

$nIdH = $_POST['nIdH'];
$nV = $_POST['nV'];
$nHgw = $_POST['nHgw'];

// $timestamp = time();
$date = date_create();
$timestamp = date_timestamp_get($date);
//echo $timestamp;

        $_SESSION['NHeber']=$idH;                                //f�r Heber dr�ber
        $_SESSION['NHVersuch'] = $versuch;
        $_SESSION['NHHgw'] = $nHgw;

        $KrWertungString1='G_'.$Art.'_1';
        $KrWertungString2='G_'.$Art.'_2';
        $KrWertungString3='G_'.$Art.'_3';



if($WkArt=='M_m_T'){

   if($gueltig=='Ja'){

        $number=$_POST['technik'];

        $technikpunkt=str_replace(",",".", $number);

    }else $technikpunkt=0;

                    dbBefehl("UPDATE heber_wk_$WkName
                                 SET Gueltig_$Art= '$gueltig', Technik_$Art= '$technikpunkt', NH_$Art= '1', time_$Art = '$timestamp' ,
                                        $KrWertungString1='$gueltig', $KrWertungString2='$gueltig', $KrWertungString3='$gueltig'
                                 WHERE IdHeber='$idH'
                                 AND Versuch='$versuch'
                                 ");


}else{ //WkArt!= M_m_T
                    dbBefehl("UPDATE heber_wk_$WkName
                                 SET Gueltig_$Art= '$gueltig', NH_$Art= '1', time_$Art = '$timestamp',
                                        $KrWertungString1='$gueltig', $KrWertungString2='$gueltig', $KrWertungString3='$gueltig'
                                 WHERE IdHeber='$idH'
                                 AND Versuch='$versuch'
                                 ");

} //Ende F�r WkArt!= M_m_T

if($gueltig!='Ja'){

    if($versuch==1){
         $HgwP=$Hgw+1;

                         dbBefehl("UPDATE heber_wk_$WkName
                                      SET $Art= '$Hgw'
                                      WHERE IdHeber='$idH'
                                      AND Versuch='2'
                                      ");

                         dbBefehl("UPDATE heber_wk_$WkName
                                      SET $Art= '$HgwP'
                                      WHERE IdHeber='$idH'
                                      AND Versuch='3'
                                      ");
    }
    if($versuch==2){

                         dbBefehl("UPDATE heber_wk_$WkName
                                      SET $Art= '$Hgw'
                                      WHERE IdHeber='$idH'
                                      AND Versuch='3'
                                      ");
    }


}

	Einzel_Heber_Auswertung($idH);	//Wertet Heber direkt aus in Tabelle auswertung und auswertung_mk

                                                          //F�hr die Einzel Heber Anzeige Befehl zum reload
       dbBefehl("DELETE FROM tmp_anzeige_$bridge");
       dbBefehl("INSERT INTO tmp_anzeige_$bridge (Anweisung)
                     Values ('1')");

       //Für Dezentralen Steigerungs Reload:
       dez_steigerung_reload_increase_couter();

       if($stammdaten['Gerd']==1)
              $_SESSION['Pad-Reset-Variable-' . $bridge]=1;

              //F�r neuen Reload:

              ReloadVariableWkLeiterErhoehung($bridge);    //In funktionen/nuetzliches
              //Ende Reload

?>
