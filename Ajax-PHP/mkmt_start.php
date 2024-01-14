<?php

session_start();
header('Content-Type: text/html; charset=utf-8'); // sorgt für die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

if(!isset($ohneIncludeDbVerbindung))    $ohneIncludeDbVerbindung=0;
if(!isset($OnlineWk))                   $OnlineWk=0;

if($ohneIncludeDbVerbindung==0)
    include '../funktionen/db_verbindung.php';
    
    
include '../Outsorst/start_tabellen_erstellen.php';
$db=dbVerbindung();


$Creat = $_POST['creat'];         //$DS wird gebraucht da variable auch in dbTableDrop verwendet wird

         basicErsteller();

         MkErsteller('M_m_T');

         dbBefehl("CREATE TABLE heber_wk_$Creat(
                      IdHeber INT,
                      Versuch INT,
                      Reissen INT,
                      Stossen INT,
                      Technik_Reissen Float(11,2),
                      Technik_Stossen Float(11,2),
                      Div_Wert_R INT,
                      Div_Wert_S INT,
                      Gueltig_Reissen TEXT(100),
                      Gueltig_Stossen TEXT(100),
                      Reissen_Verzicht INT,
                      Stossen_Verzicht INT,
                      time_Reissen INT,
                      time_Stossen INT,
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
                      Time_Stossen_3 INT,
                      TeWert_Reissen_1 float(11,2),
                      TeWert_Stossen_1 float(11,2),
                      TeWert_Reissen_2 float(11,2),
                      TeWert_Stossen_2 float(11,2),
                      TeWert_Reissen_3 float(11,2),
                      TeWert_Stossen_3 float(11,2)
                      ) ");

         dbBefehl("CREATE TABLE auswertung_$Creat(
                      IdHeber INT,
                      Al_Kl TEXT(100),
                      K_Gewicht float(11,2),
                      R_Gewicht float(11,1),
                      Gw_Kl INT,
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
                      R_1_Te float(11,2),
                      R_2_Te float(11,2),
                      R_3_Te float(11,2),
                      S_1_Te float(11,2),
                      S_2_Te float(11,2),
                      S_3_Te float(11,2),
                      R_1_t INT,
                      R_2_t INT,
                      R_3_t INT,
                      S_1_t INT,
                      S_2_t INT,
                      S_3_t INT,
                      hoechste_time INT,
                      R_B float(11,1),
                      S_B float(11,1),
                      Z_K float(11,1),
                      M_K_G float(11,2),
                      ZK_Kg INT,
                      Sinclair_P float(11,4),
                      Sinclair_P_Malone_Meltzer float(11,2),
                      Relativ_P float(11,1),
                      IAT_P float(11,1),
                      Platz_IAT INT,
                      Robbi_P float(11,4),
                      Robbi_Quali_P float(11,4),
                      Platz_MK INT,
                      Platz_R INT,
                      Platz_S INT,
                      Platz_ZK INT,
                      Platz_Sin INT,
					  Platz_GwKl INT,
					  Platz_RP INT,
                      Platz_Robi INT,
                      Platz_Robi_Quali INT,
					  Platz_SP INT,
                      Platz_Sin_Malone_Meltzer INT,
                      Platz_ZK_Kg INT
                      ) ");

?>