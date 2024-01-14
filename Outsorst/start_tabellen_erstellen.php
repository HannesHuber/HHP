<?php

function CreatZuId(){

         global $Creat;

         dbBefehl("INSERT INTO datenbanken (Datenbank)
                      Values ('$Creat')");

         $DataId=dbBefehl("SELECT Id_Db FROM datenbanken WHERE Datenbank = '$Creat'");
         $Id = mysqli_fetch_assoc($DataId);

         $Creat=$Id['Id_Db'];

}

function basicErsteller (){

         global $Creat;

         CreatZuId();

         dbBefehl("CREATE TABLE user_blocker_$Creat(
                      MeldelisteAnlegen INT,
                      GrpEinteilung INT,
                      Wiegeliste INT,
                      WkBridge1 INT,
                      WkBridge2 INT)");

         dbBefehl("INSERT INTO user_blocker_$Creat (MeldelisteAnlegen,GrpEinteilung,Wiegeliste,WkBridge1,WkBridge2)
                      Values ('0','0','0','0','0')");

         dbBefehl("CREATE TABLE startgebuehren_$Creat(
                      E_Erw float(11,2),
                      M_Erw float(11,2),
                      Nach_Meldung_Euro float(11,2))");

         dbBefehl("INSERT INTO startgebuehren_$Creat (E_Erw, M_Erw)
                      Values ('0', '0')");

         dbBefehl("CREATE TABLE mannschaften_$Creat(
                      IdVerein INT,
                      Anzahl_M INT)");

         dbBefehl("CREATE TABLE gruppen_zeit_$Creat(
                      Gruppen INT,
                      Bridge INT,
                      Anzahl INT,
                      Datum date,
                      Wiege_Zeit TEXT(100),
                      Wiege_Zeit_Bis TEXT(100),
                      WK_Zeit TEXT(100),
                      Athletik_Zeit TEXT(100),
                      Gruppe_Aus INT)");

         dbBefehl("INSERT INTO gruppen_zeit_$Creat (Gruppen, Wiege_Zeit, Wiege_Zeit_Bis, WK_Zeit)
                      Values ('1', '00:00', '00:00', '00:00'),
                             ('2', '00:00', '00:00', '00:00'),
                             ('3', '00:00', '00:00', '00:00'),
                             ('4', '00:00', '00:00', '00:00'),
                             ('5', '00:00', '00:00', '00:00')
                      ");

         dbBefehl("CREATE TABLE auswertung_mannschaft_$Creat(
                      IdVerein TEXT,
                      Mannschaft INT,
                      Punkte float(11,1),
                      Platz INT
                      ) ");


         dbBefehl("CREATE TABLE laenderwertung_$Creat(
                      Ver_Lan_Sta TEXT,
                      Lw_Punkte float(11,1),
                      Lw_Platz INT
                      ) ");

         dbBefehl("CREATE TABLE gewichtsklassen_$Creat LIKE gewichtsklassen");
         dbBefehl("INSERT gewichtsklassen_$Creat SELECT * FROM gewichtsklassen");



  
       dbBefehl("CREATE TABLE wk_reload_$Creat(
              Id_Iteration INT,
              Bridge1 INT,
              Bridge2 INT,
              Grp INT,
              WkLeitungIteration INT)");
       dbBefehl("INSERT INTO wk_reload_$Creat (Id_Iteration,Bridge1, Bridge2, Grp, WkLeitungIteration)
              Values ('1', '0', '0', '0', '0')");


}


function  InsertIntoStammdaten_Wk ($Wk_Art){

global $Creat;
global $OnlineWk;
global $Datum;
global $Online_Id_Wk;
global $Ort;

if($OnlineWk==1){
    dbBefehl("INSERT INTO stammdaten_wk_$Creat (Heber_pro_M, min_heber_pro_mann, Wk_Art, V_Faktor, Urkunden_hoehe,
                       Gruppenteiler, Anzahl_Heber_p_S, Flagge, International, Gerd, Kampfrichter, Pokal, Laenderwertung, GesGrpAlKl, LosNummern,
					   Zeitnehmer, HHP_Hardware, Mannschaft_Auswahl,
                       Online_Wk, Datum, Online_Id_Wk, Ort,Grp_Einteilung,mannschaft_nach_relativ,Uebersicht_Font,RelativArt, RobiVorfaktor,
						StartNr,Meldelast,Block_Heben)
                       Values ('4', '4', '$Wk_Art', '0.5', '14', '12', '25', '0', '0', '0', '1', '0', '1', 'Aktive', '1', '0', '0', '0',
                                '$OnlineWk', '$Datum', '$Online_Id_Wk', '$Ort', '0', '0', '1.1','1','1', '0', '0', '0')");
    // ,Block_Heben , '0'
}else{

dbBefehl("INSERT INTO stammdaten_wk_$Creat (Heber_pro_M, min_heber_pro_mann, Wk_Art, V_Faktor, Urkunden_hoehe,
                       Gruppenteiler, Anzahl_Heber_p_S, Flagge, International, Gerd, Kampfrichter, Pokal, Laenderwertung, GesGrpAlKl, LosNummern,
					  Zeitnehmer, HHP_Hardware, Mannschaft_Auswahl,Grp_Einteilung,mannschaft_nach_relativ,Uebersicht_Font,RelativArt, RobiVorfaktor,
						StartNr,Meldelast,Block_Heben)
                       Values ('4', '4', '$Wk_Art', '0.5', '14', '12', '25', '0', '0', '0', '1', '0', '1', 'Aktive', '1', '0', '0', '0', '0',
								'0', '1.1','1','1', '0', '0', '0')");
// ,Block_Heben , '0'
}

}


function MkErsteller($Wk_Art){

	global $Creat;

	dbBefehl("CREATE TABLE auswertung_laender_mannschaft_$Creat(
                      laender TEXT,
                      Punkte float(11,1),
                      Platz INT
                      ) ");

	dbBefehl("CREATE TABLE alters_klassen_zk_$Creat LIKE alters_klassen_zk");
	dbBefehl("INSERT alters_klassen_zk_$Creat SELECT * FROM alters_klassen_zk");

	dbBefehl("CREATE TABLE gruppen_mk_zaehler_$Creat(
					Jahrgang INT,
					Geschlecht Text(250),
					Anzahl INT)
			");

	// Block_Heben INT,
         dbBefehl("CREATE TABLE stammdaten_wk_$Creat(
                      Heber_pro_M INT,
                      min_heber_pro_mann INT,
                      Meisterschaft TEXT(100),
                      Ort TEXT(100),
                      Datum TEXT(100),
                      Wk_Art TEXT(100),
                      auto_mannschaft INT,
                      V_Faktor Float (11,2),
                      Pendellauf INT,
                      Sprint INT,
                      Differenzsprung INT,
                      Differenzsprung2 INT,
                      DifferenzsprungEmatte INT,
                      Schlussdreisprung INT,
                      Schockwurf INT,
                      Anristen INT,
                      Klimmziehen INT,
                      Zug INT,
                      Bankdruecken INT,
                      Liegestuetz INT,
                      Beugestuetz INT,
                      Sternlauf INT,
                      Laenderwertung INT,
                      Kampfrichter INT,
                      Gerd INT,
                      Pokal INT,
                      Gruppenteiler INT,
                      Urkunden_hoehe INT,
                      Anzahl_Heber_p_S INT,
                      Flagge INT,
                      International INT,
                      passwort Text(250),
                      GesGrpAlKl Text(250),
                      LosNummern INT,
					  Zeitnehmer INT,
					  HHP_Hardware INT,
                      Mannschaft_Auswahl INT,
					  UrkName1 TEXT(100),
					  UrkName2 TEXT(100),
					  UrkName3 TEXT(100),
					  UrkName4 TEXT(100),
                      Online_Wk INT,
                      Online_Id_Wk VARCHAR(32),
					  Grp_Einteilung INT,
                      mannschaft_nach_relativ INT,
					  Uebersicht_Font DOUBLE(11,1),
					  RelativArt INT,
					  RobiVorfaktor Float(11,2),
					  Kommentar Text(1000),
					  StartNr INT,
					  Block_Heben INT,
					  Meldelast INT
                      )");

        InsertIntoStammdaten_Wk($Wk_Art);

         dbBefehl("CREATE TABLE heber_$Creat(
                      IdHeber INT,
                      Auswahl TEXT(100),
                      Ausserkonkurrenz TEXT(100),
                      Gruppe INT,
                      Gruppe_Aus INT,
                      StartNr INT,
                      LosNr INT,
                      Pendellauf Float(11,1),
                      Pendel2 Float(11,1),
                      Sprint Float(11,1),
                      Sprint2 Float(11,1),
                      Differenzsprung Float(11,1),
                      Differenzsprung2 Float(11,1),
                      Schlussdreisprung Float (11,1),
                      Schlussdreisprung2 Float (11,1),
                      Schlussdreisprung3 Float (11,1),
                      Schockwurf Float (11,1),
                      Schockwurf2 Float (11,1),
                      Schockwurf3 Float (11,1),
                      Anristen INT,
                      Klimmziehen INT,
                      Zug INT,
                      Bankdruecken INT,
                      Liegestuetz INT,
                      Beugestuetz INT,
                      Sternlauf Float (11,1),
                      Stern2 Float (11,1),
                      Pokal INT,
                      ZKLast INT,
                      GesGrp INT,
                      Mannschaft_Auswahl INT,
                      Laender_Mannschaft_Auswahl INT,
					  Nach_Meldung INT
                      )");


         dbBefehl("CREATE TABLE auswertung_mk_$Creat(
         		IdHeber INT NOT NULL,
         		Pt_Pendellauf Float(11,2),
         		Pt_Sprint Float(11,2),
         		Pt_Differenzsprung Float(11,2),
         		Pt_DifferenzsprungEmatte Float(11,2),
         		Pt_Schlussdreisprung Float(11,2),
         		Pt_Schockwurf Float(11,2),
         		Pt_Anristen Float(11,2),
         		Pt_Klimmziehen Float(11,2),
         		Pt_Zug Float(11,2),
         		Pt_Bankdruecken Float(11,2),
         		Pt_Liegestuetz Float(11,2),
         		Pt_Beugestuetz Float(11,2),
         		Pt_Sternlauf Float(11,2),
				PRIMARY KEY (IdHeber)
         		)");

         dbBefehl("CREATE TABLE gruppen_$Creat(
                      Id INT,
                      Gk_E_M INT,
                      Gk_E_W INT,
                      Gk_K_M INT,
                      Gk_K_W INT,
                      Gk_S_M INT,
                      Gk_S_W INT,
                      Gk_J_M INT,
                      Gk_J_W INT,
                      Gk_Jun_M INT,
                      Gk_Jun_W INT
                      )");



         dbBefehl("INSERT INTO gruppen_$Creat (Id, Gk_E_M, Gk_E_W, Gk_K_M, Gk_K_W, Gk_S_M, Gk_S_W, Gk_J_M, Gk_J_W, Gk_Jun_M, Gk_Jun_W)
                      Values ('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
                             ('2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
                             ('3', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
                             ('4', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),

                             ('5', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
                             ('6', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
                             ('7', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
                             ('8', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1')
                      ");

         dbBefehl("CREATE TABLE grp_$Creat(
                      Gruppe_Aus INT,
                      Gruppe INT)");

}





?>
