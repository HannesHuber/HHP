<?php

session_start();
header('Content-Type: text/html; charset=utf-8'); // sorgt f�r die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

//
if(!isset($ohneIncludeDbVerbindung))    $ohneIncludeDbVerbindung=0;
if(!isset($OnlineWk))                   $OnlineWk=0;

if($ohneIncludeDbVerbindung==0)
	include '../funktionen/db_verbindung.php';

include '../Outsorst/start_tabellen_erstellen.php';
$db=dbVerbindung();


$Creat = $_POST['creat'];

         CreatZuId();


         dbBefehl("CREATE TABLE alters_klassen_zk_$Creat LIKE alters_klassen_zk");
         dbBefehl("INSERT alters_klassen_zk_$Creat SELECT * FROM alters_klassen_zk");

         dbBefehl("CREATE TABLE bl_vereins_auswahl_$Creat(
                      Id INT,
                      Verein1 Text,
                      Verein2 Text,
                      Verein3 Text,
                      R_Pt_V1 float(11,1),
                      S_Pt_V1 float(11,1),
                      RuS_Pt_V1 float(11,1),
                      R_Pt_V2 float(11,1),
                      S_Pt_V2 float(11,1),
                      RuS_Pt_V2 float(11,1),
                      R_Pt_V3 float(11,1),
                      S_Pt_V3 float(11,1),
                      RuS_Pt_V3 float(11,1),
                      Ergebniss_V1 INT,
                      Ergebniss_V2 INT,
                      Ergebniss_V3 INT,
                        V1_Wk1 INT,
                        V2_Wk1 INT,
                        V1_Wk2 INT,
                        V3_Wk2 INT,
                        V2_Wk3 INT,
                        V3_Wk3 INT,
                        Hochrechnung_V1 float(11,1),
                        Hochrechnung_V2 float(11,1),
                        Hochrechnung_V3 float(11,1)
                      )");

         dbBefehl("INSERT INTO bl_vereins_auswahl_$Creat (Id)
                      Values ('1')");


         dbBefehl("CREATE TABLE user_blocker_$Creat(
                      MeldelisteAnlegen INT,
                      GrpEinteilung INT,
                      Wiegeliste INT,
                      WkBridge1 INT,
                      WkBridge2 INT)");

         dbBefehl("INSERT INTO user_blocker_$Creat (MeldelisteAnlegen,GrpEinteilung,Wiegeliste,WkBridge1,WkBridge2)
                      Values ('0','0','0','0','0')");

         dbBefehl("CREATE TABLE stammdaten_wk_$Creat(
                      Meisterschaft TEXT(100),
                      Ort TEXT(100),
                      Datum date,
                      Wk_Art TEXT(100),
                      Kampfrichter INT,
                      Gerd INT,
                      Urkunden_hoehe INT,
                      Anzahl_Heber_p_S INT,
                      passwort Text(250),
                      Liga Text(100),
                      LosNummern INT,
                      Zeitnehmer INT,
					            HHP_Hardware INT,
				              Block_Heben INT,
  				            auswertung_art INT,
                      Online_Wk INT,
                      Online_Id_Wk VARCHAR(32),
                      Verein_Anzahl INT,
                      Protokollant Text(100),
                      Mannschaftsfuehrer1 Text(100),
                      KampfrichterName Text(100),
                      Mannschaftsfuehrer2 Text(100),
                      Mannschaftsfuehrer3 Text(100),
					  Uebersicht_Font DOUBLE(11,1),
					  Kommentar Text(1000),
					  UebersichtNachVerein INT
                      )");

         if($OnlineWk==1){
             dbBefehl("INSERT INTO stammdaten_wk_$Creat (Wk_Art, Urkunden_hoehe, Anzahl_Heber_p_S,Kampfrichter,Gerd, LosNummern, Zeitnehmer, HHP_Hardware,
                                                         Block_Heben, auswertung_art, Online_Wk, Datum, Online_Id_Wk, Ort, Liga, Verein_Anzahl, Uebersicht_Font, UebersichtNachVerein)
                      Values ('BL', '14', '25', '1', '0', '1', '0', '0', '1', '0', '1', '$Datum', '$Online_Id_Wk', '$Ort', '$Liga', '$Bl_Verein_anzahl', '1.1', '0')");
         }else{
             dbBefehl("INSERT INTO stammdaten_wk_$Creat (Wk_Art, Urkunden_hoehe, Anzahl_Heber_p_S,Kampfrichter,Gerd, LosNummern, Zeitnehmer, HHP_Hardware, Block_Heben, Online_Wk,
															Verein_Anzahl, Uebersicht_Font, UebersichtNachVerein, auswertung_art)
                      Values ('BL', '14', '25', '1', '0', '1', '0', '0', '1', '0', '2', '1.1', '0', '0')");
         }

         dbBefehl("CREATE TABLE heber_$Creat(
                      IdHeber INT,
                      Auswahl TEXT(100),
                      Ausserkonkurrenz TEXT(100),
                      Gruppe INT,
                      LosNr INT,
                      R_uo_S INT,
                      Reihenfolge INT,
                      Auslaenderwertung INT)");

         dbBefehl("CREATE TABLE heber_wk_$Creat(
                      IdHeber INT,
                      Versuch INT,
                      Reissen INT,
                      Stossen INT,
                      Div_Wert_R INT,
                      Div_Wert_S INT,
                      Gueltig_Reissen TEXT(100),
                      Gueltig_Stossen TEXT(100),
                      Reissen_Verzicht INT,
                      Stossen_Verzicht INT,
                      time_Reissen INT,
                      time_Stossen INT,
                      time TEXT(100),
                      NH_Reissen INT,
                      NH_Stossen INT,
                      G_Reissen_1 TEXT(100),
                      G_Stossen_1 TEXT(100),
                      G_Reissen_2 TEXT(100),
                      G_Stossen_2 TEXT(100),
                      G_Reissen_3 TEXT(100),
                      G_Stossen_3 TEXT(100),
                      Time_Reissen_1 INT,
                      Time_Stossen_1 INT,
                      Time_Reissen_2 INT,
                      Time_Stossen_2 INT,
                      Time_Reissen_3 INT,
                      Time_Stossen_3 INT ) ");

         dbBefehl("CREATE TABLE auswertung_$Creat(
                      IdHeber INT,
                      Al_Kl TEXT(100),
                      Gw_Kl INT,
                      K_Gewicht float(11,2),
                      R_Gewicht float(11,1),
                      R_1 INT,
                      R_2 INT,
                      R_3 INT,
                      S_1 INT,
                      S_2 INT,
                      S_3 INT,
                      R_1_G TEXT(100),
                      R_2_G TEXT(100),
                      R_3_G TEXT(100),
                      S_1_G TEXT(100),
                      S_2_G TEXT(100),
                      S_3_G TEXT(100),
                      R_1_Ver INT,
                      R_2_Ver INT,
                      R_3_Ver INT,
                      S_1_Ver INT,
                      S_2_Ver INT,
                      S_3_Ver INT,
                      R_1_t INT,
                      R_2_t INT,
                      R_3_t INT,
                      S_1_t INT,
                      S_2_t INT,
                      S_3_t INT,
                      hoechste_time INT,
                      R_B INT,
                      S_B INT,
                      Z_K INT,
                      Relativ_P float(11,1),
                      IAT_P float(11,1),
                      Platz_IAT INT,
                      Robbi_P float(11,4),
                      Sinclair_P float(11,4),
                      Sinclair_P_Malone_Meltzer float(11,2),
                      Platz_GwKl INT,
                      Platz_R INT,
                      Platz_S INT,
                      Platz_RP INT,
                      Platz_Robi INT,
                      Platz_Sin INT,
                      Platz_Sin_Malone_Meltzer INT
                      ) ");


         dbBefehl("CREATE TABLE gruppen_zeit_$Creat(
                      Gruppen INT,
                      Bridge INT
                      )");

         dbBefehl("INSERT INTO gruppen_zeit_$Creat (Gruppen, Bridge)
                      Values ('1', '1'),
                             ('2', '1'),
                             ('3', '1')
                      ");

         dbBefehl("CREATE TABLE gewichtsklassen_$Creat AS SELECT * FROM gewichtsklassen");

         dbBefehl("CREATE TABLE wk_reload_$Creat(
                      Id_Iteration INT,
                      Bridge1 INT,
                      Bridge2 INT,
                      Grp INT,
                      WkLeitungIteration INT)");
         dbBefehl("INSERT INTO wk_reload_$Creat (Id_Iteration,Bridge1, Bridge2, Grp, WkLeitungIteration)
                      Values ('1', '0', '0', '0', '0')");

?>
