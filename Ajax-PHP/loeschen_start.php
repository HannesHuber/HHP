<?php

session_start();
header('Content-Type: text/html; charset=utf-8'); // sorgt für die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

include '../funktionen/db_verbindung.php';
include '../Outsorst/start_tabellen_erstellen.php';
$db=dbVerbindung();


$DS = $_POST['value'];         //$DS wird gebraucht da variable auch in dbTableDrop verwendet wird


                 dbBefehl("DELETE FROM datenbanken
                              WHERE Id_Db ='$DS'");

      $stammdaten=EinzeilerAbfrage("SELECT*FROM stammdaten_wk_$DS");
      if($stammdaten['Wk_Art']!='BL')
      {


                 $stammdaten=EinzeilerAbfrage("SELECT*FROM stammdaten_wk_$DS");
                 if($stammdaten['Wk_Art']!='ZK') dbTableDrop('grp');
                 if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T'){
                 	dbTableDrop('auswertung_mk');
                 	dbTableDrop('gruppen_mk_zaehler'); 
                 }

                 dbTableDrop('startgebuehren');
                 dbTableDrop('mannschaften');
                 dbTableDrop('gruppen');
                 dbTableDrop('auswertung_mannschaft');
                 dbTableDrop('laenderwertung');
                 dbTableDrop('alters_klassen_zk');

      }else{
      	dbTableDrop('bl_vereins_auswahl');
      	dbTableDrop('alters_klassen_zk');      		
      }
         

      
      dbTableDrop('stammdaten_wk');
      dbTableDrop('heber');
      dbTableDrop('heber_wk');
      dbTableDrop('user_blocker');
      dbTableDrop('gruppen_zeit');
      dbTableDrop('gewichtsklassen');
      dbTableDrop('auswertung');
      dbTableDrop('wk_reload');

?>