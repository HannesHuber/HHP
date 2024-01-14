# Daten Backup vom: 31.05.2018 17:47 

# ----------------------------------------------------------
#
# structur for Table 'alters_klassen'
#
CREATE TABLE alters_klassen (
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Von)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen VALUES ('0','12','Kinder');
INSERT INTO alters_klassen VALUES ('13','15','Schüler');
INSERT INTO alters_klassen VALUES ('16','17','Jugend');
INSERT INTO alters_klassen VALUES ('18','20','Junioren');
INSERT INTO alters_klassen VALUES ('21','120','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'alters_klassen_masters'
#
CREATE TABLE alters_klassen_masters (
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Von)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_masters VALUES ('1','34','AK0');
INSERT INTO alters_klassen_masters VALUES ('35','39','AK1');
INSERT INTO alters_klassen_masters VALUES ('40','44','AK2');
INSERT INTO alters_klassen_masters VALUES ('45','49','AK3');
INSERT INTO alters_klassen_masters VALUES ('50','54','AK4');
INSERT INTO alters_klassen_masters VALUES ('55','59','AK5');
INSERT INTO alters_klassen_masters VALUES ('60','64','AK6');
INSERT INTO alters_klassen_masters VALUES ('65','69','AK7');
INSERT INTO alters_klassen_masters VALUES ('70','74','AK8');
INSERT INTO alters_klassen_masters VALUES ('75','79','AK9');
INSERT INTO alters_klassen_masters VALUES ('80','130','AK10');



# ----------------------------------------------------------
#
# structur for Table 'alters_klassen_zk'
#
CREATE TABLE alters_klassen_zk (
    Id int(11) NOT NULL,
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk VALUES ('1','0','11','Kinder');
INSERT INTO alters_klassen_zk VALUES ('2','12','14','Schüler');
INSERT INTO alters_klassen_zk VALUES ('3','15','17','Jugend');
INSERT INTO alters_klassen_zk VALUES ('4','18','20','Junioren');
INSERT INTO alters_klassen_zk VALUES ('5','21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'alters_klassen_zk_64'
#
CREATE TABLE alters_klassen_zk_64 (
    Id int(11) NOT NULL,
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk_64 VALUES ('1','0','11','Kinder');
INSERT INTO alters_klassen_zk_64 VALUES ('2','12','14','Schüler');
INSERT INTO alters_klassen_zk_64 VALUES ('3','15','17','Jugend');
INSERT INTO alters_klassen_zk_64 VALUES ('4','18','20','Junioren');
INSERT INTO alters_klassen_zk_64 VALUES ('5','21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'alters_klassen_zk_66'
#
CREATE TABLE alters_klassen_zk_66 (
    Id int(11) NOT NULL,
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk_66 VALUES ('1','0','11','Kinder');
INSERT INTO alters_klassen_zk_66 VALUES ('2','12','14','Schüler');
INSERT INTO alters_klassen_zk_66 VALUES ('3','15','17','Jugend');
INSERT INTO alters_klassen_zk_66 VALUES ('4','18','20','Junioren');
INSERT INTO alters_klassen_zk_66 VALUES ('5','21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'alters_klassen_zk_67'
#
CREATE TABLE alters_klassen_zk_67 (
    Id int(11) NOT NULL,
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk_67 VALUES ('1','0','11','Kinder');
INSERT INTO alters_klassen_zk_67 VALUES ('2','12','14','Schüler');
INSERT INTO alters_klassen_zk_67 VALUES ('3','15','17','Jugend');
INSERT INTO alters_klassen_zk_67 VALUES ('4','18','20','Junioren');
INSERT INTO alters_klassen_zk_67 VALUES ('5','21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'auswertung_64'
#
CREATE TABLE auswertung_64 (
    IdHeber int(11),
    Al_Kl tinytext,
    K_Gewicht float(11,2),
    R_Gewicht float(11,2),
    Gw_Kl int(11),
    R_1 int(11),
    R_2 int(11),
    R_3 int(11),
    S_1 int(11),
    S_2 int(11),
    S_3 int(11),
    R_1_G tinytext,
    R_2_G tinytext,
    R_3_G tinytext,
    S_1_G tinytext,
    S_2_G tinytext,
    S_3_G tinytext,
    R_1_Ver int(11),
    R_2_Ver int(11),
    R_3_Ver int(11),
    S_1_Ver int(11),
    S_2_Ver int(11),
    S_3_Ver int(11),
    R_1_t int(11),
    R_2_t int(11),
    R_3_t int(11),
    S_1_t int(11),
    S_2_t int(11),
    S_3_t int(11),
    hoechste_time int(11),
    R_B int(11),
    S_B int(11),
    Z_K int(11),
    M_K_G float(11,2),
    Sinclair_P float(11,4),
    Sinclair_P_Malone_Meltzer float(11,2),
    Relativ_P float(11,1),
    Platz_MK int(11),
    Platz_R int(11),
    Platz_S int(11),
    Platz_ZK int(11),
    Platz_Sin int(11),
    Platz_GwKl int(11),
    Platz_RP int(11),
    Platz_SP int(11),
    Platz_Sin_Malone_Meltzer int(11)
);
# ----------------------------------------------------------
#
INSERT INTO auswertung_64 VALUES ('341','Schüler','80.00','80.00','69','15','16','17','17','18','19','Ja','Ja','Ja','Ja','Nein','Ja','0','0','0','0','1','0','1527774608','1527774610','1527774612','1527774616','0','1527774622','1527774622','17','19','36','286.44',NULL,'44.04','0.0','1','1','1','1','1','1','1',NULL,NULL);
INSERT INTO auswertung_64 VALUES ('342','Schüler','54.00','18.50','-58','15','16','17','17','17','18','Ja','Ja','Ja','Nein','Ja','Ja','0','0','0','0','0','0','1527774609','1527774611','1527774613','1527774618','1527774618','1527774621','1527774621','17','18','35','280.83',NULL,'50.78','0.0','1','1','1','1','1','1','1',NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'auswertung_66'
#
CREATE TABLE auswertung_66 (
    IdHeber int(11),
    Al_Kl tinytext,
    K_Gewicht float(11,2),
    R_Gewicht float(11,2),
    Gw_Kl int(11),
    R_1 int(11),
    R_2 int(11),
    R_3 int(11),
    S_1 int(11),
    S_2 int(11),
    S_3 int(11),
    R_1_G tinytext,
    R_2_G tinytext,
    R_3_G tinytext,
    S_1_G tinytext,
    S_2_G tinytext,
    S_3_G tinytext,
    R_1_Ver int(11),
    R_2_Ver int(11),
    R_3_Ver int(11),
    S_1_Ver int(11),
    S_2_Ver int(11),
    S_3_Ver int(11),
    R_1_Te float(11,2),
    R_2_Te float(11,2),
    R_3_Te float(11,2),
    S_1_Te float(11,2),
    S_2_Te float(11,2),
    S_3_Te float(11,2),
    R_1_t int(11),
    R_2_t int(11),
    R_3_t int(11),
    S_1_t int(11),
    S_2_t int(11),
    S_3_t int(11),
    hoechste_time int(11),
    R_B float(11,1),
    S_B float(11,1),
    Z_K float(11,1),
    M_K_G float(11,2),
    ZK_Kg int(11),
    Sinclair_P float(11,4),
    Sinclair_P_Malone_Meltzer float(11,2),
    Relativ_P float(11,1),
    Platz_MK int(11),
    Platz_R int(11),
    Platz_S int(11),
    Platz_ZK int(11),
    Platz_Sin int(11),
    Platz_GwKl int(11),
    Platz_RP int(11),
    Platz_SP int(11),
    Platz_Sin_Malone_Meltzer int(11),
    Platz_ZK_Kg int(11)
);
# ----------------------------------------------------------
#
INSERT INTO auswertung_66 VALUES ('341','Schüler','80.00','80.00','69','15','16','17','20','21','22','Ja','Ja','Ja','Ja','Ja','Ja','0','0','0','0','0','0','5.00','5.00','7.00','7.00','6.00','4.00','0','0','0','0','0','0','0','17.0','22.0','39.0','163.10','39',NULL,'47.71','0.0','1','1','1','1','1','1','1',NULL,NULL,'1');
INSERT INTO auswertung_66 VALUES ('342','Schüler','54.00','18.50','-58','15','16','17','20','21','22','Ja','Ja','Ja','Ja','Ja','Ja','0','0','0','0','0','0','5.00','7.00','7.00','9.00','5.00','8.00','0','0','0','0','0','0','0','17.0','22.0','39.0','194.20','39',NULL,'56.58','3.5','1','1','1','1','1','1','1',NULL,NULL,'1');



# ----------------------------------------------------------
#
# structur for Table 'auswertung_67'
#
CREATE TABLE auswertung_67 (
    IdHeber int(11),
    Al_Kl tinytext,
    Gw_Kl int(11),
    Gw_Kl_Norm int(11),
    K_Gewicht float(11,2),
    R_Gewicht float(11,2),
    R_1 int(11),
    R_2 int(11),
    R_3 int(11),
    S_1 int(11),
    S_2 int(11),
    S_3 int(11),
    R_1_G tinytext,
    R_2_G tinytext,
    R_3_G tinytext,
    S_1_G tinytext,
    S_2_G tinytext,
    S_3_G tinytext,
    R_1_Ver int(11),
    R_2_Ver int(11),
    R_3_Ver int(11),
    S_1_Ver int(11),
    S_2_Ver int(11),
    S_3_Ver int(11),
    R_1_t int(11),
    R_2_t int(11),
    R_3_t int(11),
    S_1_t int(11),
    S_2_t int(11),
    S_3_t int(11),
    hoechste_time int(11),
    R_B int(11),
    S_B int(11),
    Z_K int(11),
    Relativ_P float(11,1),
    Sinclair_P float(11,2),
    Sinclair_P_Malone_Meltzer float(11,2),
    Platz_GwKl int(11),
    Platz_R int(11),
    Platz_S int(11),
    Platz_RP int(11),
    Platz_Sin int(11),
    Platz_Sin_Malone_Meltzer int(11),
    Platz_Relativ_pro_JG int(11),
    GwKl_GesGrp_Platz int(11),
    Relativ_GesGrp_Platz int(11),
    Sinclair_GesGrp_Platz int(11),
    Al_Kl_GesGrp tinytext,
    Gw_Kl_GesGrp int(11),
    Platz_R_Norm int(11),
    Platz_S_Norm int(11),
    Platz_Norm int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mannschaft_64'
#
CREATE TABLE auswertung_mannschaft_64 (
    IdVerein text,
    Mannschaft int(11),
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mannschaft_66'
#
CREATE TABLE auswertung_mannschaft_66 (
    IdVerein text,
    Mannschaft int(11),
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mannschaft_67'
#
CREATE TABLE auswertung_mannschaft_67 (
    IdVerein text,
    Mannschaft int(11),
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mk_64'
#
CREATE TABLE auswertung_mk_64 (
    IdHeber int(11) NOT NULL,
    Pt_Pendellauf float(11,2),
    Pt_Sprint float(11,2),
    Pt_Differenzsprung float(11,2),
    Pt_DifferenzsprungEmatte float(11,2),
    Pt_Schlussdreisprung float(11,2),
    Pt_Schockwurf float(11,2),
    Pt_Anristen float(11,2),
    Pt_Klimmziehen float(11,2),
    Pt_Zug float(11,2),
    Pt_Bankdruecken float(11,2),
    Pt_Liegestuetz float(11,2),
    Pt_Beugestuetz float(11,2),
    Pt_Sternlauf float(11,2),
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO auswertung_mk_64 VALUES ('341','174.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'80.00',NULL,NULL,'214.00');
INSERT INTO auswertung_mk_64 VALUES ('342','160.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'50.00',NULL,NULL,'200.00');



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mk_66'
#
CREATE TABLE auswertung_mk_66 (
    IdHeber int(11) NOT NULL,
    Pt_Pendellauf float(11,2),
    Pt_Sprint float(11,2),
    Pt_Differenzsprung float(11,2),
    Pt_DifferenzsprungEmatte float(11,2),
    Pt_Schlussdreisprung float(11,2),
    Pt_Schockwurf float(11,2),
    Pt_Anristen float(11,2),
    Pt_Klimmziehen float(11,2),
    Pt_Zug float(11,2),
    Pt_Bankdruecken float(11,2),
    Pt_Liegestuetz float(11,2),
    Pt_Beugestuetz float(11,2),
    Pt_Sternlauf float(11,2),
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO auswertung_mk_66 VALUES ('341',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO auswertung_mk_66 VALUES ('342',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'bl_grp'
#
CREATE TABLE bl_grp (
    Grp int(11) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO bl_grp VALUES ('1');
INSERT INTO bl_grp VALUES ('2');



# ----------------------------------------------------------
#
# structur for Table 'bridgen'
#
CREATE TABLE bridgen (
    Bridge int(11) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO bridgen VALUES ('1');
INSERT INTO bridgen VALUES ('2');



# ----------------------------------------------------------
#
# structur for Table 'datenbanken'
#
CREATE TABLE datenbanken (
    Id_Db int(11) NOT NULL auto_increment,
    Datenbank text NOT NULL,
  PRIMARY KEY (Id_Db)
);
# ----------------------------------------------------------
#
INSERT INTO datenbanken VALUES ('64','mkot');
INSERT INTO datenbanken VALUES ('66','mkmt');
INSERT INTO datenbanken VALUES ('67','zk');



# ----------------------------------------------------------
#
# structur for Table 'flaggen_staaten'
#
CREATE TABLE flaggen_staaten (
    IdStaat int(11) NOT NULL,
    Image longblob,
  PRIMARY KEY (IdStaat)
);
# ----------------------------------------------------------
#
INSERT INTO flaggen_staaten VALUES ('0',NULL);



# ----------------------------------------------------------
#
# structur for Table 'geschlecht'
#
CREATE TABLE geschlecht (
    Geschlecht text NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO geschlecht VALUES ('Männlich');
INSERT INTO geschlecht VALUES ('Weiblich');



# ----------------------------------------------------------
#
# structur for Table 'gewichtsklassen'
#
CREATE TABLE gewichtsklassen (
    Id int(11) NOT NULL,
    Kinder_M int(11),
    Kinder_W int(11),
    Schüler_M int(11),
    Schüler_W int(11),
    Aktive_M int(11),
    Aktive_W int(11),
    Jugend_M int(11),
    Jugend_W int(11),
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO gewichtsklassen VALUES ('1','30','32','35','40','56','48','50','44');
INSERT INTO gewichtsklassen VALUES ('2','35','36','40','44','62','53','56','48');
INSERT INTO gewichtsklassen VALUES ('3','40','40','45','48','69','58','62','53');
INSERT INTO gewichtsklassen VALUES ('4','45','44','50','53','77','63','69','58');
INSERT INTO gewichtsklassen VALUES ('5','50','48','56','58','85','69','77','63');
INSERT INTO gewichtsklassen VALUES ('6','56','53','62','63','94','75','85','69');
INSERT INTO gewichtsklassen VALUES ('7','62','1','69','1','105','90','94','1');
INSERT INTO gewichtsklassen VALUES ('8','1','0','1','0','1','1','1','0');
INSERT INTO gewichtsklassen VALUES ('9','0','0','0','0','0','0','0','0');
INSERT INTO gewichtsklassen VALUES ('10','0','0','0','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'gewichtsklassen_64'
#
CREATE TABLE gewichtsklassen_64 (
    Id int(11) NOT NULL,
    Kinder_M int(11),
    Kinder_W int(11),
    Schüler_M int(11),
    Schüler_W int(11),
    Aktive_M int(11),
    Aktive_W int(11),
    Jugend_M int(11),
    Jugend_W int(11),
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO gewichtsklassen_64 VALUES ('1','30','32','35','40','56','48','50','44');
INSERT INTO gewichtsklassen_64 VALUES ('2','35','36','40','44','62','53','56','48');
INSERT INTO gewichtsklassen_64 VALUES ('3','40','40','45','48','69','58','62','53');
INSERT INTO gewichtsklassen_64 VALUES ('4','45','44','50','53','77','63','69','58');
INSERT INTO gewichtsklassen_64 VALUES ('5','50','48','56','58','85','69','77','63');
INSERT INTO gewichtsklassen_64 VALUES ('6','56','53','62','63','94','75','85','69');
INSERT INTO gewichtsklassen_64 VALUES ('7','62','1','69','1','105','90','94','1');
INSERT INTO gewichtsklassen_64 VALUES ('8','1','0','1','0','1','1','1','0');
INSERT INTO gewichtsklassen_64 VALUES ('9','0','0','0','0','0','0','0','0');
INSERT INTO gewichtsklassen_64 VALUES ('10','0','0','0','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'gewichtsklassen_66'
#
CREATE TABLE gewichtsklassen_66 (
    Id int(11) NOT NULL,
    Kinder_M int(11),
    Kinder_W int(11),
    Schüler_M int(11),
    Schüler_W int(11),
    Aktive_M int(11),
    Aktive_W int(11),
    Jugend_M int(11),
    Jugend_W int(11),
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO gewichtsklassen_66 VALUES ('1','30','32','35','40','56','48','50','44');
INSERT INTO gewichtsklassen_66 VALUES ('2','35','36','40','44','62','53','56','48');
INSERT INTO gewichtsklassen_66 VALUES ('3','40','40','45','48','69','58','62','53');
INSERT INTO gewichtsklassen_66 VALUES ('4','45','44','50','53','77','63','69','58');
INSERT INTO gewichtsklassen_66 VALUES ('5','50','48','56','58','85','69','77','63');
INSERT INTO gewichtsklassen_66 VALUES ('6','56','53','62','63','94','75','85','69');
INSERT INTO gewichtsklassen_66 VALUES ('7','62','1','69','1','105','90','94','1');
INSERT INTO gewichtsklassen_66 VALUES ('8','1','0','1','0','1','1','1','0');
INSERT INTO gewichtsklassen_66 VALUES ('9','0','0','0','0','0','0','0','0');
INSERT INTO gewichtsklassen_66 VALUES ('10','0','0','0','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'gewichtsklassen_67'
#
CREATE TABLE gewichtsklassen_67 (
    Id int(11) NOT NULL,
    Kinder_M int(11),
    Kinder_W int(11),
    Schüler_M int(11),
    Schüler_W int(11),
    Aktive_M int(11),
    Aktive_W int(11),
    Jugend_M int(11),
    Jugend_W int(11),
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO gewichtsklassen_67 VALUES ('1','30','32','35','40','56','48','50','44');
INSERT INTO gewichtsklassen_67 VALUES ('2','35','36','40','44','62','53','56','48');
INSERT INTO gewichtsklassen_67 VALUES ('3','40','40','45','48','69','58','62','53');
INSERT INTO gewichtsklassen_67 VALUES ('4','45','44','50','53','77','63','69','58');
INSERT INTO gewichtsklassen_67 VALUES ('5','50','48','56','58','85','69','77','63');
INSERT INTO gewichtsklassen_67 VALUES ('6','56','53','62','63','94','75','85','69');
INSERT INTO gewichtsklassen_67 VALUES ('7','62','1','69','1','105','90','94','1');
INSERT INTO gewichtsklassen_67 VALUES ('8','1','0','1','0','1','1','1','0');
INSERT INTO gewichtsklassen_67 VALUES ('9','0','0','0','0','0','0','0','0');
INSERT INTO gewichtsklassen_67 VALUES ('10','0','0','0','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'grp_64'
#
CREATE TABLE grp_64 (
    Gruppe_Aus int(11),
    Gruppe int(11)
);
# ----------------------------------------------------------
#
INSERT INTO grp_64 VALUES ('1','1');
INSERT INTO grp_64 VALUES ('2','1');



# ----------------------------------------------------------
#
# structur for Table 'grp_66'
#
CREATE TABLE grp_66 (
    Gruppe_Aus int(11),
    Gruppe int(11)
);
# ----------------------------------------------------------
#
INSERT INTO grp_66 VALUES ('1','1');
INSERT INTO grp_66 VALUES ('2','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_64'
#
CREATE TABLE gruppen_64 (
    Id int(11),
    Gk_E_M int(11),
    Gk_E_W int(11),
    Gk_K_M int(11),
    Gk_K_W int(11),
    Gk_S_M int(11),
    Gk_S_W int(11),
    Gk_J_M int(11),
    Gk_J_W int(11),
    Gk_Jun_M int(11),
    Gk_Jun_W int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_64 VALUES ('1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_64 VALUES ('2','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_64 VALUES ('3','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_64 VALUES ('4','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_64 VALUES ('5','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_64 VALUES ('6','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_64 VALUES ('7','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_64 VALUES ('8','1','1','1','1','1','1','1','1','1','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_66'
#
CREATE TABLE gruppen_66 (
    Id int(11),
    Gk_E_M int(11),
    Gk_E_W int(11),
    Gk_K_M int(11),
    Gk_K_W int(11),
    Gk_S_M int(11),
    Gk_S_W int(11),
    Gk_J_M int(11),
    Gk_J_W int(11),
    Gk_Jun_M int(11),
    Gk_Jun_W int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_66 VALUES ('1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_66 VALUES ('2','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_66 VALUES ('3','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_66 VALUES ('4','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_66 VALUES ('5','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_66 VALUES ('6','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_66 VALUES ('7','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_66 VALUES ('8','1','1','1','1','1','1','1','1','1','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_67'
#
CREATE TABLE gruppen_67 (
    Id int(11),
    Gk_Kinder_M int(11),
    Gk_Kinder_W int(11),
    Gk_Schüler_M int(11),
    Gk_Schüler_W int(11),
    Gk_Jugend_M int(11),
    Gk_Jugend_W int(11),
    Gk_Junioren_M int(11),
    Gk_Junioren_W int(11),
    Gk_Aktive_M int(11),
    Gk_Aktive_W int(11),
    Gk_AK0_M int(11),
    Gk_AK0_W int(11),
    Gk_AK1_M int(11),
    Gk_AK1_W int(11),
    Gk_AK2_M int(11),
    Gk_AK2_W int(11),
    Gk_AK3_M int(11),
    Gk_AK3_W int(11),
    Gk_AK4_M int(11),
    Gk_AK4_W int(11),
    Gk_AK5_M int(11),
    Gk_AK5_W int(11),
    Gk_AK6_M int(11),
    Gk_AK6_W int(11),
    Gk_AK7_M int(11),
    Gk_AK7_W int(11),
    Gk_AK8_M int(11),
    Gk_AK8_W int(11),
    Gk_AK9_M int(11),
    Gk_AK9_W int(11),
    Gk_AK10_M int(11),
    Gk_AK10_W int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_67 VALUES ('1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_67 VALUES ('2','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_67 VALUES ('3','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_67 VALUES ('4','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_67 VALUES ('5','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_67 VALUES ('6','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_67 VALUES ('7','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_67 VALUES ('8','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_aus'
#
CREATE TABLE gruppen_aus (
    Gruppen int(11) NOT NULL,
  PRIMARY KEY (Gruppen)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_aus VALUES ('1');
INSERT INTO gruppen_aus VALUES ('2');
INSERT INTO gruppen_aus VALUES ('3');
INSERT INTO gruppen_aus VALUES ('4');
INSERT INTO gruppen_aus VALUES ('5');
INSERT INTO gruppen_aus VALUES ('6');
INSERT INTO gruppen_aus VALUES ('7');
INSERT INTO gruppen_aus VALUES ('8');
INSERT INTO gruppen_aus VALUES ('9');
INSERT INTO gruppen_aus VALUES ('10');
INSERT INTO gruppen_aus VALUES ('11');
INSERT INTO gruppen_aus VALUES ('12');
INSERT INTO gruppen_aus VALUES ('13');
INSERT INTO gruppen_aus VALUES ('14');
INSERT INTO gruppen_aus VALUES ('15');
INSERT INTO gruppen_aus VALUES ('16');
INSERT INTO gruppen_aus VALUES ('17');
INSERT INTO gruppen_aus VALUES ('18');
INSERT INTO gruppen_aus VALUES ('19');
INSERT INTO gruppen_aus VALUES ('20');
INSERT INTO gruppen_aus VALUES ('21');
INSERT INTO gruppen_aus VALUES ('22');
INSERT INTO gruppen_aus VALUES ('23');
INSERT INTO gruppen_aus VALUES ('24');
INSERT INTO gruppen_aus VALUES ('25');
INSERT INTO gruppen_aus VALUES ('26');
INSERT INTO gruppen_aus VALUES ('27');
INSERT INTO gruppen_aus VALUES ('28');
INSERT INTO gruppen_aus VALUES ('29');
INSERT INTO gruppen_aus VALUES ('30');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_mk_zaehler_64'
#
CREATE TABLE gruppen_mk_zaehler_64 (
    Jahrgang int(11),
    Geschlecht tinytext,
    Anzahl int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_mk_zaehler_64 VALUES ('2005','Weiblich','1');
INSERT INTO gruppen_mk_zaehler_64 VALUES ('2006','Männlich','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_mk_zaehler_66'
#
CREATE TABLE gruppen_mk_zaehler_66 (
    Jahrgang int(11),
    Geschlecht tinytext,
    Anzahl int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_mk_zaehler_66 VALUES ('2005','Weiblich','1');
INSERT INTO gruppen_mk_zaehler_66 VALUES ('2006','Männlich','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_zeit_64'
#
CREATE TABLE gruppen_zeit_64 (
    Gruppen int(11),
    Bridge int(11),
    Anzahl int(11),
    Datum date,
    Wiege_Zeit tinytext,
    Wiege_Zeit_Bis tinytext,
    WK_Zeit tinytext,
    Athletik_Zeit tinytext,
    Gruppe_Aus int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_zeit_64 VALUES ('1','1','2','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_64 VALUES ('2','1','0','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_64 VALUES ('3','1','0','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_64 VALUES ('4','1','0','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_64 VALUES ('5','1','0','0000-00-00','00:00','00:00','00:00','',NULL);



# ----------------------------------------------------------
#
# structur for Table 'gruppen_zeit_66'
#
CREATE TABLE gruppen_zeit_66 (
    Gruppen int(11),
    Bridge int(11),
    Anzahl int(11),
    Datum date,
    Wiege_Zeit tinytext,
    Wiege_Zeit_Bis tinytext,
    WK_Zeit tinytext,
    Athletik_Zeit tinytext,
    Gruppe_Aus int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_zeit_66 VALUES ('1','1','2','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_66 VALUES ('2','1','0','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_66 VALUES ('3','1','0','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_66 VALUES ('4','1','0','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_66 VALUES ('5','1','0','0000-00-00','00:00','00:00','00:00','',NULL);



# ----------------------------------------------------------
#
# structur for Table 'gruppen_zeit_67'
#
CREATE TABLE gruppen_zeit_67 (
    Gruppen int(11),
    Bridge int(11),
    Anzahl int(11),
    Datum date,
    Wiege_Zeit tinytext,
    Wiege_Zeit_Bis tinytext,
    WK_Zeit tinytext,
    Athletik_Zeit tinytext,
    Gruppe_Aus int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_zeit_67 VALUES ('1','1','7','0000-00-00','00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_67 VALUES ('2','1','0','0000-00-00','00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_67 VALUES ('3','1','0','0000-00-00','00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_67 VALUES ('4','1','0','0000-00-00','00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_67 VALUES ('5','1','0','0000-00-00','00:00','00:00','00:00',NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber'
#
CREATE TABLE heber (
    IdHeber int(11) NOT NULL auto_increment,
    Name text NOT NULL,
    Vorname text NOT NULL,
    IdVerein int(11) NOT NULL,
    Jahrgang int(11) NOT NULL,
    Gewicht double(11,2) NOT NULL,
    Land text NOT NULL,
    Geschlecht text NOT NULL,
    IdStaat int(11) NOT NULL,
    Auswahl text NOT NULL,
    AlKl text NOT NULL,
    GwKl text NOT NULL,
    Bundesliga int(11) NOT NULL,
    Id_Online_Db varchar(32) NOT NULL,
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO heber VALUES ('-369','Ludwig','Werner','9002','1938','0.00','BW','Männlich','1','','AK10','-56','1','21321');
INSERT INTO heber VALUES ('-368','Friedrich','Adrian','-35','1983','0.00','BW','Männlich','1','','AK1','-56','1','21293');
INSERT INTO heber VALUES ('-367','Werra','Manfred','-125','1940','0.00','BW','Männlich','1','','AK9','-56','1','9445');
INSERT INTO heber VALUES ('-366','Fischer','Finn','9000','2003','0.00','BW','Männlich','1','','Jugend','-50','1','13582');
INSERT INTO heber VALUES ('-365','Cerik','Muhammed','9000','1999','0.00','BW','Männlich','1','','Junioren','-56','1','12897');
INSERT INTO heber VALUES ('-364','Merkel','Angela','-124','1955','0.00','BW','Weiblich','1','','Aktive','-48','1','21394');
INSERT INTO heber VALUES ('-363','Fischer','Helene','-124','1988','0.00','BW','Weiblich','1','','Aktive','-48','1','21395');
INSERT INTO heber VALUES ('-362','Berg','Andrea','-124','1970','0.00','BW','Weiblich','1','','Aktive','-48','1','21400');
INSERT INTO heber VALUES ('-361','Kramp-Karrenabuer','Annegret','-124','1982','0.00','BW','Weiblich','1','','Aktive','-48','1','21399');
INSERT INTO heber VALUES ('-360','Deere','John','-124','1970','0.00','BW','Männlich','1','','Aktive','-56','1','21393');
INSERT INTO heber VALUES ('-359','Zane','Frank','-124','1940','0.00','BW','Männlich','1','','Aktive','-56','1','21398');
INSERT INTO heber VALUES ('-358','Kraft','Dörte','-124','1997','0.00','BW','Weiblich','1','','Aktive','-48','1','21397');
INSERT INTO heber VALUES ('-357','Schwarzenegger','Arnold','-124','1940','0.00','BW','Männlich','1','','Aktive','-56','1','21396');
INSERT INTO heber VALUES ('-356','Mustermann','Carina','-121','1987','0.00','BW','Weiblich','1','','Aktive','-48','1','20132');
INSERT INTO heber VALUES ('-355','Blümchen','Benjamin','-122','1997','0.00','BW','Männlich','1','','Aktive','-56','1','21371');
INSERT INTO heber VALUES ('-354','Maus','Minnie','-122','1989','0.00','BW','Weiblich','1','','Aktive','-48','1','21372');
INSERT INTO heber VALUES ('-353','Mustermann','Stefanie','-121','2000','0.00','BW','Weiblich','1','','Junioren','-48','1','20128');
INSERT INTO heber VALUES ('-352','Mustermann','Martin','-121','1985','0.00','BW','Männlich','1','','Aktive','-56','1','20116');
INSERT INTO heber VALUES ('-351','Simpson','Homer','-122','1959','0.00','BW','Männlich','1','','Aktive','-56','1','21374');
INSERT INTO heber VALUES ('-350','Luke','Lucky','-122','1995','0.00','BW','Männlich','1','','Aktive','-56','1','21375');
INSERT INTO heber VALUES ('-349','Maus','Micky','-122','1988','0.00','BW','Männlich','1','','Aktive','-56','1','21370');
INSERT INTO heber VALUES ('-348','Mustermann','Paul','-121','1990','0.00','BW','Männlich','1','','Aktive','-56','1','20117');
INSERT INTO heber VALUES ('-347','der Bär','Balu','-122','1960','0.00','BW','Männlich','1','','Aktive','-56','1','21373');
INSERT INTO heber VALUES ('-346','Mustermann','Max','-121','2002','0.00','BW','Männlich','1','','Jugend','-50','1','20292');
INSERT INTO heber VALUES ('-345','Bauer','Peter','-121','1980','0.00','BW','Männlich','1','','Aktive','-56','1','20113');
INSERT INTO heber VALUES ('-344','Obergfell','Klaus','-120','1931','0.00','BW','Männlich','1','','AK10','-56','1','7134');
INSERT INTO heber VALUES ('-343','Kolditz','Wolfgang','-119','1940','0.00','BW','Männlich','1','','AK9','-56','1','7641');
INSERT INTO heber VALUES ('-342','Bruse','Stefan','-41','1985','0.00','BW','Männlich','1','','AK0','-56','1','7019');
INSERT INTO heber VALUES ('-341','Reichelt','Rolf','-90','1936','0.00','BW','Männlich','1','','AK10','-56','1','3271');
INSERT INTO heber VALUES ('-340','Hahne','Detlef','-17','1954','0.00','BW','Männlich','1','','AK6','-56','1','1342');
INSERT INTO heber VALUES ('-339','Augustin','Detlef','-57','1951','0.00','BW','Männlich','1','','Aktive','-56','1','21357');
INSERT INTO heber VALUES ('-338','Leipelt','Ingo','-61','1967','0.00','BW','Männlich','1','','AK4','-56','1','12422');
INSERT INTO heber VALUES ('-337','Donsbach','Patrick','-61','1980','0.00','BW','Männlich','1','','AK1','-56','1','20824');
INSERT INTO heber VALUES ('-336','Nitschke','Horst','-5','1937','0.00','BW','Männlich','1','','AK10','-56','1','2657');
INSERT INTO heber VALUES ('-335','Dittmar','Robert','-118','1988','0.00','BW','Männlich','1','','AK0','-56','1','8596');
INSERT INTO heber VALUES ('-334','Rötte','Willi','-61','1950','0.00','BW','Männlich','1','','AK7','-56','1','1143');
INSERT INTO heber VALUES ('-333','Zapka','Torsten','-52','1968','0.00','BW','Männlich','1','','AK4','-56','1','21362');
INSERT INTO heber VALUES ('-332','Althoff','Melanie','-59','1976','0.00','BW','Weiblich','1','Auswahl','Aktive','-48','1','13685');
INSERT INTO heber VALUES ('-331','Obermüller','Horst','-15','1958','0.00','BW','Männlich','1','','AK6','-56','1','2001');
INSERT INTO heber VALUES ('-330','Sieth','Jürgen','-117','1965','0.00','BW','Männlich','1','','AK4','-56','1','450');
INSERT INTO heber VALUES ('-329','Vogl','Robert','-82','1959','0.00','BW','Männlich','1','','AK5','-56','1','484');
INSERT INTO heber VALUES ('-328','Holz','Stephanie','-65','1988','0.00','BW','Weiblich','1','','AK0','-48','1','21151');
INSERT INTO heber VALUES ('-327','Langenhan','Markus','-20','1988','0.00','BW','Männlich','1','','AK0','-56','1','7982');
INSERT INTO heber VALUES ('-326','Jantzen','Daniela','-59','1976','0.00','BW','Weiblich','1','','AK2','-48','1','13523');
INSERT INTO heber VALUES ('-325','Platzer','Tino','-99','1969','0.00','BW','Männlich','1','','AK3','-56','1','382');
INSERT INTO heber VALUES ('-324','Bettenhäuser','Ekkehard','-17','1940','0.00','BW','Männlich','1','','AK9','-56','1','12072');
INSERT INTO heber VALUES ('-323','Eibl','Kathrin ','-82','1979','0.00','BW','Weiblich','1','','AK1','-48','1','11612');
INSERT INTO heber VALUES ('-322','Nedvetskiy','Mariyan','-116','1940','0.00','BW','Männlich','1','','AK9','-56','1','12560');
INSERT INTO heber VALUES ('-321','Rösch','Robert','-96','1983','0.00','BW','Männlich','1','','AK1','-56','1','11505');
INSERT INTO heber VALUES ('-320','Schramm','Martin','-5','1958','0.00','BW','Männlich','1','','AK6','-56','1','2289');
INSERT INTO heber VALUES ('-319','Richter','Mario ','-52','1973','0.00','BW','Männlich','1','','AK3','-56','1','20789');
INSERT INTO heber VALUES ('-318','Machleit','Mario','-42','1968','0.00','BW','Männlich','1','','AK4','-56','1','339');
INSERT INTO heber VALUES ('-317','Wetzler','Gerhard','-12','1963','0.00','BW','Männlich','1','','AK5','-56','1','11364');
INSERT INTO heber VALUES ('-316','Schreiber','Thomas','-35','1969','0.00','BW','Männlich','1','','AK3','-56','1','3730');
INSERT INTO heber VALUES ('-315','Bücherl','Kurt','-61','1950','0.00','BW','Männlich','1','','AK7','-56','1','147');
INSERT INTO heber VALUES ('-314','Hofmann','Matthias','-112','1975','0.00','BW','Männlich','1','','AK2','-56','1','1860');
INSERT INTO heber VALUES ('-313','Buttgereit','Anke Laura','-45','1988','0.00','BW','Weiblich','1','','AK0','-48','1','21224');
INSERT INTO heber VALUES ('-312','Götze','Tino','-57','1962','0.00','BW','Männlich','1','','AK5','-56','1','21356');
INSERT INTO heber VALUES ('-311','Kasurinen','Stefanie','-82','1981','0.00','BW','Weiblich','1','','AK1','-48','1','20762');
INSERT INTO heber VALUES ('-310','Walter','Yvonne Nathalie','-115','1981','0.00','BW','Weiblich','1','','AK1','-48','1','21163');
INSERT INTO heber VALUES ('-309','Ambs','Tobias','-60','1976','0.00','BW','Männlich','1','Auswahl','Aktive','-56','1','101');
INSERT INTO heber VALUES ('-308','Hagedorn','Wilfried','-114','1966','0.00','BW','Männlich','1','','AK4','-56','1','13569');
INSERT INTO heber VALUES ('-307','Schüttler','Thomas','-100','1967','0.00','BW','Männlich','1','','AK4','-56','1','20675');
INSERT INTO heber VALUES ('-306','Rupp','Felix','77','1988','0.00','BW','Männlich','1','','AK0','-56','1','54');
INSERT INTO heber VALUES ('-305','Braun','Jürgen','-60','1966','0.00','BW','Männlich','1','','AK4','-56','1','3917');
INSERT INTO heber VALUES ('-304','Keßler-Löwenstein','Petra','-11','1975','0.00','BW','Weiblich','1','','AK2','-48','1','13078');
INSERT INTO heber VALUES ('-303','Seel','Alexander','-18','1964','0.00','BW','Männlich','1','','AK4','-56','1','3094');
INSERT INTO heber VALUES ('-302','Wilms','Gerhard','-51','1953','0.00','BW','Männlich','1','','AK7','-56','1','12602');
INSERT INTO heber VALUES ('-301','Johann','Horst','-113','1933','0.00','BW','Männlich','1','','AK10','-56','1','269');
INSERT INTO heber VALUES ('-300','Redl','Albert','-112','1965','0.00','BW','Männlich','1','','AK4','-56','1','10824');
INSERT INTO heber VALUES ('-299','Thoneick','Dr. Maurice','-61','1976','0.00','BW','Männlich','1','','AK2','-56','1','20823');
INSERT INTO heber VALUES ('-298','Freider','Michael','-86','1978','0.00','BW','Männlich','1','','AK2','-56','1','13462');
INSERT INTO heber VALUES ('-297','Jadwitschak','Andreas','-111','1972','0.00','BW','Männlich','1','','AK3','-56','1','12864');
INSERT INTO heber VALUES ('-296','Schlager','Jörg','-39','1968','0.00','BW','Männlich','1','','AK4','-56','1','13210');
INSERT INTO heber VALUES ('-295','Rohland','Joachim','-110','1965','0.00','BW','Männlich','1','','AK4','-56','1','3793');
INSERT INTO heber VALUES ('-294','Zembronski','Bartosz','-97','1983','0.00','BW','Männlich','1','','AK1','-56','1','20213');
INSERT INTO heber VALUES ('-293','Roß','Esther Annliese','-6','1971','0.00','BW','Weiblich','1','','AK3','-48','1','20349');
INSERT INTO heber VALUES ('-292','Fritsch','Daniel','-109','1977','0.00','BW','Männlich','1','','AK2','-56','1','1372');
INSERT INTO heber VALUES ('-291','Kolschmann','Andree','-23','1970','0.00','BW','Männlich','1','','AK3','-56','1','301');
INSERT INTO heber VALUES ('-290','Massel','Nicole','-59','1976','0.00','BW','Weiblich','1','','AK2','-48','1','20406');
INSERT INTO heber VALUES ('-289','Vogt','Sascha','-52','1987','0.00','BW','Männlich','1','','AK0','-56','1','20026');
INSERT INTO heber VALUES ('-288','Stühler','Bernd','-27','1963','0.00','BW','Männlich','1','','AK5','-56','1','6359');
INSERT INTO heber VALUES ('-287','Winter','Silvia','-2','1962','0.00','BW','Weiblich','1','','AK5','-48','1','11230');
INSERT INTO heber VALUES ('-286','Klepzig','Tony','-108','1986','0.00','BW','Männlich','1','','AK0','-56','1','6883');
INSERT INTO heber VALUES ('-285','Cech','Jürgen','-6','1969','0.00','BW','Männlich','1','','AK3','-56','1','21355');
INSERT INTO heber VALUES ('-284','Diehl','Korinna','-107','1963','0.00','BW','Weiblich','1','','AK5','-48','1','20974');
INSERT INTO heber VALUES ('-283','Scheffner','Vladimir','-43','1956','0.00','BW','Männlich','1','','AK6','-56','1','9164');
INSERT INTO heber VALUES ('-282','Matern','Viktor','-18','1988','0.00','BW','Männlich','1','','AK0','-56','1','13204');
INSERT INTO heber VALUES ('-281','Böttcher','Torsten','-60','1967','0.00','BW','Männlich','1','','AK4','-56','1','1005');
INSERT INTO heber VALUES ('-280','Thees','Robert','-81','1974','0.00','BW','Männlich','1','','AK2','-56','1','470');
INSERT INTO heber VALUES ('-279','Preißner','Roland','-25','1962','0.00','BW','Männlich','1','','AK5','-56','1','3332');
INSERT INTO heber VALUES ('-278','Ossiander','Gerhard','-39','1969','0.00','BW','Männlich','1','','AK3','-56','1','1616');
INSERT INTO heber VALUES ('-277','Pipke','Monika','-6','1960','0.00','BW','Weiblich','1','','AK5','-48','1','11655');
INSERT INTO heber VALUES ('-276','Proba','Anne','-16','1980','0.00','BW','Weiblich','1','','AK1','-48','1','21366');
INSERT INTO heber VALUES ('-275','Godyniak','Berthold','-2','1940','0.00','BW','Männlich','1','','AK9','-56','1','6491');
INSERT INTO heber VALUES ('-274','Buhl','Sylvia','-4','1967','0.00','BW','Weiblich','1','','AK4','-48','1','20047');
INSERT INTO heber VALUES ('-273','Braun','Helmut','-70','1941','0.00','BW','Männlich','1','','AK9','-56','1','1370');
INSERT INTO heber VALUES ('-272','Schröder','Jan','-105','1977','0.00','BW','Männlich','1','','AK2','-56','1','21339');
INSERT INTO heber VALUES ('-271','Zimmer','Ibolya','-4','1969','0.00','BW','Weiblich','1','','AK3','-48','1','12158');
INSERT INTO heber VALUES ('-270','Maier','Viktor','-48','1948','0.00','BW','Männlich','1','','AK8','-56','1','12778');
INSERT INTO heber VALUES ('-269','Rosengart','Oliver','-24','1971','0.00','BW','Männlich','1','','AK3','-56','1','611');
INSERT INTO heber VALUES ('-268','Gösche','Claudia','-12','1987','0.00','BW','Weiblich','1','','AK0','-48','1','12499');
INSERT INTO heber VALUES ('-267','Klingschat','Ralf','-104','1966','0.00','BW','Männlich','1','','AK4','-56','1','3944');
INSERT INTO heber VALUES ('-266','Nicol','Ron','-20','1977','0.00','BW','Männlich','1','','AK2','-56','1','3701');
INSERT INTO heber VALUES ('-265','Polch','Eusebius','-65','1975','0.00','BW','Männlich','1','','AK2','-56','1','21047');
INSERT INTO heber VALUES ('-264','Richardt','Steffen','-58','1977','0.00','BW','Männlich','1','','AK2','-56','1','2792');
INSERT INTO heber VALUES ('-263','Greiner','Jürgen','-35','1951','0.00','BW','Männlich','1','','AK7','-56','1','3651');
INSERT INTO heber VALUES ('-262','Mayer','Rüdiger','-103','1945','0.00','BW','Männlich','1','','AK8','-56','1','21342');
INSERT INTO heber VALUES ('-261','Millen','Frank','-65','1978','0.00','BW','Männlich','1','','AK2','-56','1','12028');
INSERT INTO heber VALUES ('-260','Kreßmann','Christine','-54','1985','0.00','BW','Weiblich','1','','AK0','-48','1','13522');
INSERT INTO heber VALUES ('-259','Schwenkert','Karl-Heinz','-79','1951','0.00','BW','Männlich','1','','AK7','-56','1','10178');
INSERT INTO heber VALUES ('-258','Neufeld','Jakob','-5','1983','0.00','BW','Männlich','1','','AK1','-56','1','1237');
INSERT INTO heber VALUES ('-257','Korzetz','Mandy','-47','1986','0.00','BW','Weiblich','1','','AK0','-48','1','21252');
INSERT INTO heber VALUES ('-256','Büchsenschütz','Marina','-59','1976','0.00','BW','Weiblich','1','','AK2','-48','1','13169');
INSERT INTO heber VALUES ('-255','Schmidt','Christian','-94','1984','0.00','BW','Männlich','1','','AK0','-56','1','13474');
INSERT INTO heber VALUES ('-254','Deppner','Werner','-102','1935','0.00','BW','Männlich','1','','AK10','-56','1','161');
INSERT INTO heber VALUES ('-253','Herberg','Harald','-47','1954','0.00','BW','Männlich','1','','AK6','-56','1','244');
INSERT INTO heber VALUES ('-252','Rehmund','Peter','-15','1951','0.00','BW','Männlich','1','','AK7','-56','1','2331');
INSERT INTO heber VALUES ('-251','Klein','Rudolf','-56','1968','0.00','BW','Männlich','1','','AK4','-56','1','20671');
INSERT INTO heber VALUES ('-250','Eserkanov','Hakku','-101','1960','0.00','BW','Männlich','1','','AK5','-56','1','13463');
INSERT INTO heber VALUES ('-249','Kraft','Artur','-100','1981','0.00','BW','Männlich','1','','AK1','-56','1','20719');
INSERT INTO heber VALUES ('-248','Seitz','Klaus','-39','1964','0.00','BW','Männlich','1','','AK4','-56','1','445');
INSERT INTO heber VALUES ('-247','Sporthalle Bleiche','Konstantin','-23','1961','0.00','BW','Männlich','1','','AK5','-56','1','21121');
INSERT INTO heber VALUES ('-246','Teichert','Thorsten','-55','1962','0.00','BW','Männlich','1','','AK5','-56','1','21233');
INSERT INTO heber VALUES ('-245','Kusterer','Andreas','-99','1961','0.00','BW','Männlich','1','','AK5','-56','1','11328');
INSERT INTO heber VALUES ('-244','Neitzel','Yves','-43','1970','0.00','BW','Männlich','1','','AK3','-56','1','19');
INSERT INTO heber VALUES ('-243','Hertrampf','Björn','-5','1982','0.00','BW','Männlich','1','','AK1','-56','1','10923');
INSERT INTO heber VALUES ('-242','Schelhase','Carina','-43','1982','0.00','BW','Weiblich','1','','AK1','-48','1','10860');
INSERT INTO heber VALUES ('-241','Eschemann','Sabina','-98','1964','0.00','BW','Weiblich','1','','AK4','-48','1','2963');
INSERT INTO heber VALUES ('-240','Graupeter','Thomas','-51','1983','0.00','BW','Männlich','1','','AK1','-56','1','4796');
INSERT INTO heber VALUES ('-239','Nicol','Bernd','-20','1949','0.00','BW','Männlich','1','','AK7','-56','1','6425');
INSERT INTO heber VALUES ('-238','Lackus','Ulrike','-97','1958','0.00','BW','Weiblich','1','','AK6','-48','1','10832');
INSERT INTO heber VALUES ('-237','Bauer','Markus','-96','1972','0.00','BW','Männlich','1','','AK3','-56','1','113');
INSERT INTO heber VALUES ('-236','Schelkle','Tobias','-95','1975','0.00','BW','Männlich','1','','AK2','-56','1','7259');
INSERT INTO heber VALUES ('-235','Balatzis','Asterios','-45','1959','0.00','BW','Männlich','1','','Aktive','-56','1','1299');
INSERT INTO heber VALUES ('-234','Gareis','Christian','-27','1967','0.00','BW','Männlich','1','','AK4','-56','1','20569');
INSERT INTO heber VALUES ('-233','Salosnig','Martina','-94','1984','0.00','BW','Weiblich','1','','AK0','-48','1','20627');
INSERT INTO heber VALUES ('-232','Etscheit','Judith','-61','1984','0.00','BW','Weiblich','1','','AK0','-48','1','13649');
INSERT INTO heber VALUES ('-231','Kirchenbauer','Peter','-93','1948','0.00','BW','Männlich','1','','AK8','-56','1','12827');
INSERT INTO heber VALUES ('-230','Stransky','Julia','-7','1972','0.00','BW','Weiblich','1','','AK3','-48','1','13447');
INSERT INTO heber VALUES ('-229','Hildenbrand','Susanne','-30','1981','0.00','BW','Weiblich','1','','AK1','-48','1','9854');
INSERT INTO heber VALUES ('-228','Berger','Veronika','-10','1973','0.00','BW','Weiblich','1','','AK3','-48','1','11478');
INSERT INTO heber VALUES ('-227','Woelky','Wolfgang','-92','1939','0.00','BW','Männlich','1','','AK9','-56','1','20931');
INSERT INTO heber VALUES ('-226','Stecklum','Philipp','-42','1988','0.00','BW','Männlich','1','','AK0','-56','1','9249');
INSERT INTO heber VALUES ('-225','Altvater','Waldemar','-51','1957','0.00','BW','Männlich','1','','Aktive','-56','1','1715');
INSERT INTO heber VALUES ('-224','Stanton','Kris','-91','1971','0.00','BW','Weiblich','1','','AK3','-48','1','12411');
INSERT INTO heber VALUES ('-223','Jooß','Horst','-90','1940','0.00','BW','Männlich','1','','AK9','-56','1','271');
INSERT INTO heber VALUES ('-222','Disch','André','-63','1984','0.00','BW','Männlich','1','','AK0','-56','1','9946');
INSERT INTO heber VALUES ('-221','Straub','Peter Olaf Fidelis','-23','1974','0.00','BW','Männlich','1','','AK2','-56','1','13241');
INSERT INTO heber VALUES ('-220','Wöhrle','Volker','-89','1973','0.00','BW','Männlich','1','','AK3','-56','1','2273');
INSERT INTO heber VALUES ('-219','Kaiser','Oliver','-87','1966','0.00','BW','Männlich','1','','AK4','-56','1','276');
INSERT INTO heber VALUES ('-218','Albiez','Andreas','-88','1982','0.00','BW','Männlich','1','Auswahl','Aktive','-56','1','2189');
INSERT INTO heber VALUES ('-217','Winklbauer','Michael','-15','1970','0.00','BW','Männlich','1','','AK3','-56','1','1900');
INSERT INTO heber VALUES ('-216','Unger','Denny','-55','1983','0.00','BW','Männlich','1','','AK1','-56','1','5231');
INSERT INTO heber VALUES ('-215','Kretz','Walter','-5','1954','0.00','BW','Männlich','1','','AK6','-56','1','2286');
INSERT INTO heber VALUES ('-214','Scharnowski','Markus','-83','1983','0.00','BW','Männlich','1','','AK1','-56','1','12406');
INSERT INTO heber VALUES ('-213','Metten','Erich','-87','1943','0.00','BW','Männlich','1','','AK9','-56','1','12038');
INSERT INTO heber VALUES ('-211','Pour-Aghily','Ali','-86','1963','0.00','BW','Männlich','1','','AK5','-56','1','6992');
INSERT INTO heber VALUES ('-210','Scholz - Deutsch','Verena','-4','1981','0.00','BW','Weiblich','1','','AK1','-48','1','20806');
INSERT INTO heber VALUES ('-209','Balke','Christian','-85','1982','0.00','BW','Männlich','1','','Aktive','-56','1','13530');
INSERT INTO heber VALUES ('-208','Branke','Michael','-19','1965','0.00','BW','Männlich','1','','AK4','-56','1','3519');
INSERT INTO heber VALUES ('-207','Forys','Kazimierz Michael','-7','1945','0.00','BW','Männlich','1','','AK8','-56','1','11884');
INSERT INTO heber VALUES ('-206','Popken','Jörg','-67','1964','0.00','BW','Männlich','1','','AK4','-56','1','3335');
INSERT INTO heber VALUES ('-205','Fischer','Emil','-84','1944','0.00','BW','Männlich','1','','AK8','-56','1','2485');
INSERT INTO heber VALUES ('-204','Pawlik','Sebastian','-83','1987','0.00','BW','Männlich','1','','AK0','-56','1','8799');
INSERT INTO heber VALUES ('-203','Schumacher','Joachim','-69','1978','0.00','BW','Männlich','1','','AK2','-56','1','12587');
INSERT INTO heber VALUES ('-202','Hirschbeck','Anton','-37','1957','0.00','BW','Männlich','1','','AK6','-56','1','251');
INSERT INTO heber VALUES ('-201','Kieu','Tien Cuong','-82','1960','0.00','BW','Männlich','1','','AK5','-56','1','9159');
INSERT INTO heber VALUES ('-200','Reichert','Tobias','-69','1984','0.00','BW','Männlich','1','','AK0','-56','1','4532');
INSERT INTO heber VALUES ('-199','Barth','Antje','-16','1981','0.00','BW','Weiblich','1','','Aktive','-48','1','9317');
INSERT INTO heber VALUES ('-198','Barth','Gabriele','-26','1962','0.00','BW','Weiblich','1','','AK5','-48','1','12751');
INSERT INTO heber VALUES ('-197','Klink','Ralf','-48','1967','0.00','BW','Männlich','1','','AK4','-56','1','13489');
INSERT INTO heber VALUES ('-196','Kirrstetter','Walter','-2','1948','0.00','BW','Männlich','1','','AK8','-56','1','2139');
INSERT INTO heber VALUES ('-195','Grzonka','Jördis','-47','1978','0.00','BW','Weiblich','1','','AK2','-48','1','13132');
INSERT INTO heber VALUES ('-194','Seyffer','Volker','-16','1961','0.00','BW','Männlich','1','','AK5','-56','1','3838');
INSERT INTO heber VALUES ('-193','Stuhlfauth','Christian','-4','1978','0.00','BW','Männlich','1','','AK2','-56','1','20926');
INSERT INTO heber VALUES ('-192','Ehrmann','Edmund','-5','1949','0.00','BW','Männlich','1','','AK7','-56','1','21381');
INSERT INTO heber VALUES ('-191','Engels','Stefanie','-77','1986','0.00','BW','Weiblich','1','','AK0','-48','1','20484');
INSERT INTO heber VALUES ('-190','Kiesel','Joachim','-18','1957','0.00','BW','Männlich','1','','AK6','-56','1','3095');
INSERT INTO heber VALUES ('-189','Thau','Eckehard','-81','1956','0.00','BW','Männlich','1','','AK6','-56','1','64');
INSERT INTO heber VALUES ('-188','Wittmann','Kai-Tim','-2','1984','0.00','BW','Männlich','1','','AK0','-56','1','4481');
INSERT INTO heber VALUES ('-187','Bossauer','Roman','-80','1973','0.00','BW','Männlich','1','','AK3','-56','1','138');
INSERT INTO heber VALUES ('-186','Schiller','Thomas','-44','1977','0.00','BW','Männlich','1','','AK2','-56','1','409');
INSERT INTO heber VALUES ('-185','Deutsch','Dominik  Daniel','-4','1980','0.00','BW','Männlich','1','','AK1','-56','1','13493');
INSERT INTO heber VALUES ('-184','Ansorg','Kevin','-31','1981','0.00','BW','Männlich','1','','Aktive','-56','1','3779');
INSERT INTO heber VALUES ('-183','Stöhr','Thomas','-79','1981','0.00','BW','Männlich','1','','AK1','-56','1','1653');
INSERT INTO heber VALUES ('-182','Pahlow','Klaus','-78','1938','0.00','BW','Männlich','1','','AK10','-56','1','21075');
INSERT INTO heber VALUES ('-181','Schwarz','Marcel','-73','1984','0.00','BW','Männlich','1','','AK0','-56','1','3636');
INSERT INTO heber VALUES ('-180','Straube','Michael','-77','1986','0.00','BW','Männlich','1','','AK0','-56','1','8275');
INSERT INTO heber VALUES ('-179','Rank','Bernhard','-76','1958','0.00','BW','Männlich','1','','AK6','-56','1','386');
INSERT INTO heber VALUES ('-178','Schweinsberg','Nils','-69','1988','0.00','BW','Männlich','1','','AK0','-56','1','13618');
INSERT INTO heber VALUES ('-177','Junghans, geb. Alm','Heike','-14','1980','0.00','BW','Weiblich','1','','AK1','-48','1','3958');
INSERT INTO heber VALUES ('-176','Hahl','Regine','-6','1985','0.00','BW','Weiblich','1','','AK0','-48','1','21360');
INSERT INTO heber VALUES ('-175','Sommer','Christian','-75','1981','0.00','BW','Männlich','1','','AK1','-56','1','3631');
INSERT INTO heber VALUES ('-174','Cursio','Giuseppe','-33','1970','0.00','BW','Männlich','1','','AK3','-56','1','12454');
INSERT INTO heber VALUES ('-173','Weingärtner','Silke','-74','1967','0.00','BW','Weiblich','1','','AK4','-48','1','1432');
INSERT INTO heber VALUES ('-172','Kleinschmidt','Gerd','-35','1952','0.00','BW','Männlich','1','','AK7','-56','1','3733');
INSERT INTO heber VALUES ('-171','Barzen','Joachim','-5','1955','0.00','BW','Männlich','1','','AK6','-56','1','2277');
INSERT INTO heber VALUES ('-170','Zehner','Ulrike','-27','1977','0.00','BW','Weiblich','1','','AK2','-48','1','1644');
INSERT INTO heber VALUES ('-169','Stenger','Björn','-44','1979','0.00','BW','Männlich','1','','AK1','-56','1','20258');
INSERT INTO heber VALUES ('-168','Braun','Siegfried','-23','1963','0.00','BW','Männlich','1','','AK5','-56','1','7199');
INSERT INTO heber VALUES ('-167','Kabbe','Jens','-58','1967','0.00','BW','Männlich','1','','AK4','-56','1','273');
INSERT INTO heber VALUES ('-166','Kassel','René','-73','1986','0.00','BW','Männlich','1','','AK0','-56','1','1330');
INSERT INTO heber VALUES ('-165','Werle','Konstanze','-8','1986','0.00','BW','Weiblich','1','','AK0','-48','1','20811');
INSERT INTO heber VALUES ('-164','Böhm','Christoph','-35','1982','0.00','BW','Männlich','1','','AK1','-56','1','130');
INSERT INTO heber VALUES ('-163','Faber Dr.','Friedrich','-50','1940','0.00','BW','Männlich','1','','AK9','-56','1','10137');
INSERT INTO heber VALUES ('-162','Hirschfeld','Friedrich','-72','1976','0.00','BW','Männlich','1','','AK2','-56','1','8191');
INSERT INTO heber VALUES ('-161','Braunbart','Ettore','-53','1980','0.00','BW','Männlich','1','','AK1','-56','1','141');
INSERT INTO heber VALUES ('-160','Sallamon','Otto','-54','1963','0.00','BW','Männlich','1','','AK5','-56','1','21173');
INSERT INTO heber VALUES ('-159','Hölzel','Maik','-71','1978','0.00','BW','Männlich','1','','AK2','-56','1','1129');
INSERT INTO heber VALUES ('-158','Barth','Heinrich','-70','1958','0.00','BW','Männlich','1','','AK6','-56','1','7069');
INSERT INTO heber VALUES ('-157','Pfeil','Ingo','-15','1958','0.00','BW','Männlich','1','','AK6','-56','1','11340');
INSERT INTO heber VALUES ('-156','Weber','Walter','-2','1954','0.00','BW','Männlich','1','','AK6','-56','1','2145');
INSERT INTO heber VALUES ('-155','Culjak','Zoran','-69','1974','0.00','BW','Männlich','1','','AK2','-56','1','21031');
INSERT INTO heber VALUES ('-154','Barth','Harry','-14','1958','0.00','BW','Männlich','1','','AK6','-56','1','112');
INSERT INTO heber VALUES ('-153','Wagner','Alfred','-45','1944','0.00','BW','Männlich','1','','AK8','-56','1','4916');
INSERT INTO heber VALUES ('-152','Krüger','Nico','-41','1987','0.00','BW','Männlich','1','','AK0','-56','1','7788');
INSERT INTO heber VALUES ('-151','Bächle','Georg','8','1953','0.00','BW','Männlich','1','','AK7','-56','1','21328');
INSERT INTO heber VALUES ('-150','Katzula','Reiner','-61','1953','0.00','BW','Männlich','1','','AK7','-56','1','4259');
INSERT INTO heber VALUES ('-149','Wessollek','Axel','-11','1967','0.00','BW','Männlich','1','','AK4','-56','1','3213');
INSERT INTO heber VALUES ('-148','Wetter','Andrea','-44','1978','0.00','BW','Weiblich','1','','AK2','-48','1','6227');
INSERT INTO heber VALUES ('-147','Frankenberger','Horst','-68','1948','0.00','BW','Männlich','1','','AK8','-56','1','1786');
INSERT INTO heber VALUES ('-146','Maak','Marco','-45','1978','0.00','BW','Männlich','1','','AK2','-56','1','11262');
INSERT INTO heber VALUES ('-145','Etten','Mathias','-65','1987','0.00','BW','Männlich','1','','AK0','-56','1','20083');
INSERT INTO heber VALUES ('-144','Bräuer','Daniel','-66','1977','0.00','BW','Männlich','1','','AK2','-56','1','3338');
INSERT INTO heber VALUES ('-143','Weisser','Berthold','-60','1972','0.00','BW','Männlich','1','','AK3','-56','1','497');
INSERT INTO heber VALUES ('-142','Bindl','Martin Roland','-15','1981','0.00','BW','Männlich','1','','AK1','-56','1','11239');
INSERT INTO heber VALUES ('-141','Dang','Minh Tuan','-67','1986','0.00','BW','Männlich','1','','AK0','-56','1','8121');
INSERT INTO heber VALUES ('-140','Wagner','Andreas','-6','1962','0.00','BW','Männlich','1','','AK5','-56','1','1321');
INSERT INTO heber VALUES ('-139','Tenhagen','Nadine','-54','1975','0.00','BW','Weiblich','1','','AK2','-48','1','20587');
INSERT INTO heber VALUES ('-138','Klemm','Sebastian','-54','1982','0.00','BW','Männlich','1','','AK1','-56','1','291');
INSERT INTO heber VALUES ('-137','Riehn','Bernhard','-66','1942','0.00','BW','Männlich','1','','AK9','-56','1','21133');
INSERT INTO heber VALUES ('-136','Mütz','Stefan','-5','1957','0.00','BW','Männlich','1','','AK6','-56','1','21364');
INSERT INTO heber VALUES ('-135','Mieger','Sven','8','1976','0.00','BW','Männlich','1','','AK2','-56','1','3240');
INSERT INTO heber VALUES ('-134','Walker','Jürgen','-31','1969','0.00','BW','Männlich','1','','AK3','-56','1','1976');
INSERT INTO heber VALUES ('-133','Zehner','Torsten','-27','1976','0.00','BW','Männlich','1','','AK2','-56','1','2028');
INSERT INTO heber VALUES ('-132','Weissbeck','Oliver','-45','1975','0.00','BW','Männlich','1','','AK2','-56','1','20916');
INSERT INTO heber VALUES ('-131','Vomschloß','Markus','-44','1977','0.00','BW','Männlich','1','','AK2','-56','1','13753');
INSERT INTO heber VALUES ('-130','Oettel','Ole','-65','1983','0.00','BW','Männlich','1','','AK1','-56','1','21122');
INSERT INTO heber VALUES ('-129','Beuthling','Volker','-4','1965','0.00','BW','Männlich','1','','AK4','-56','1','1200');
INSERT INTO heber VALUES ('-128','Porrmann','Nina','-64','1976','0.00','BW','Weiblich','1','','AK2','-48','1','13357');
INSERT INTO heber VALUES ('-127','Wirth','Heiko','-43','1969','0.00','BW','Männlich','1','','AK3','-56','1','2445');
INSERT INTO heber VALUES ('-126','Mönch','Michaela','-6','1965','0.00','BW','Weiblich','1','','AK4','-48','1','20350');
INSERT INTO heber VALUES ('-125','Schäfer','Heinrich','-63','1950','0.00','BW','Männlich','1','','AK7','-56','1','13705');
INSERT INTO heber VALUES ('-124','Horn','Jürgen','-63','1970','0.00','BW','Männlich','1','','AK3','-56','1','1093');
INSERT INTO heber VALUES ('-123','Doll','Jürgen','-62','1965','0.00','BW','Männlich','1','','AK4','-56','1','21303');
INSERT INTO heber VALUES ('-122','Zimmermann','Alexander','-54','1957','0.00','BW','Männlich','1','','AK6','-56','1','8803');
INSERT INTO heber VALUES ('-121','Hachmann','Elisabeth','-61','1982','0.00','BW','Weiblich','1','','AK1','-48','1','13608');
INSERT INTO heber VALUES ('-120','Simon','Hans-Peter','-60','1953','0.00','BW','Männlich','1','','AK7','-56','1','2061');
INSERT INTO heber VALUES ('-119','Hobler','Andreas','-59','1962','0.00','BW','Männlich','1','','AK5','-56','1','20408');
INSERT INTO heber VALUES ('-118','Bode','Rainer','-58','1954','0.00','BW','Männlich','1','','AK6','-56','1','21330');
INSERT INTO heber VALUES ('-117','Winkler','Nikolai','-57','1976','0.00','BW','Männlich','1','','AK2','-56','1','2611');
INSERT INTO heber VALUES ('-116','Öneren','Ferhat','-31','1958','0.00','BW','Männlich','1','','AK6','-56','1','1980');
INSERT INTO heber VALUES ('-115','Klein','Jakob','-56','1941','0.00','BW','Männlich','1','','AK9','-56','1','21169');
INSERT INTO heber VALUES ('-114','Heide','Manfred','-19','1940','0.00','BW','Männlich','1','','AK9','-56','1','9775');
INSERT INTO heber VALUES ('-113','Machleit','Christian','-42','1974','0.00','BW','Männlich','1','','AK2','-56','1','3719');
INSERT INTO heber VALUES ('-112','Schulze','Jan','-55','1973','0.00','BW','Männlich','1','','AK3','-56','1','21345');
INSERT INTO heber VALUES ('-111','Mergenthaler','Jens','-36','1978','0.00','BW','Männlich','1','','AK2','-56','1','349');
INSERT INTO heber VALUES ('-110','Stöver','Jochen','-54','1965','0.00','BW','Männlich','1','','AK4','-56','1','12370');
INSERT INTO heber VALUES ('-109','Scherf','Marko','-46','1970','0.00','BW','Männlich','1','','AK3','-56','1','3786');
INSERT INTO heber VALUES ('-108','Hopf','Markus','-53','1982','0.00','BW','Männlich','1','','AK1','-56','1','3782');
INSERT INTO heber VALUES ('-107','Hermann','Richard','-19','1952','0.00','BW','Männlich','1','','AK7','-56','1','4598');
INSERT INTO heber VALUES ('-106','Wicenciak','Markus','-52','1974','0.00','BW','Männlich','1','','AK2','-56','1','1244');
INSERT INTO heber VALUES ('-105','Michel','Peter','-27','1968','0.00','BW','Männlich','1','','AK4','-56','1','12836');
INSERT INTO heber VALUES ('-104','Walian','Raimund','-51','1975','0.00','BW','Männlich','1','','AK2','-56','1','21214');
INSERT INTO heber VALUES ('-103','Burkhardt','Steve','-50','1985','0.00','BW','Männlich','1','','AK0','-56','1','4141');
INSERT INTO heber VALUES ('-102','Giesecke','Steffen','-49','1970','0.00','BW','Männlich','1','','AK3','-56','1','21276');
INSERT INTO heber VALUES ('-101','Grauf','Karlheinz','-2','1947','0.00','BW','Männlich','1','','AK8','-56','1','2140');
INSERT INTO heber VALUES ('-100','Brettschneider','Uwe','-48','1965','0.00','BW','Männlich','1','','AK4','-56','1','20763');
INSERT INTO heber VALUES ('-99','Schmidt','Sebastian','-35','1968','0.00','BW','Männlich','1','','AK4','-56','1','13529');
INSERT INTO heber VALUES ('-98','Kuhn','Heinz','-4','1937','0.00','BW','Männlich','1','','AK10','-56','1','46');
INSERT INTO heber VALUES ('-97','Hänsch','Ronny','-23','1984','0.00','BW','Männlich','1','','AK0','-56','1','13236');
INSERT INTO heber VALUES ('-96','Ackermann','Helmut','-2','1939','0.00','BW','Männlich','1','Auswahl','Aktive','-56','1','11723');
INSERT INTO heber VALUES ('-95','Buschan','Ralf','-47','1965','0.00','BW','Männlich','1','','AK4','-56','1','3830');
INSERT INTO heber VALUES ('-94','Förster','Klaus','-46','1955','0.00','BW','Männlich','1','','AK6','-56','1','3783');
INSERT INTO heber VALUES ('-93','Ludwig','Johann','-45','1956','0.00','BW','Männlich','1','','AK6','-56','1','1314');
INSERT INTO heber VALUES ('-92','Pawlow','Andreas','-44','1980','0.00','BW','Männlich','1','','AK1','-56','1','12251');
INSERT INTO heber VALUES ('-91','Schüßler','Walter','-8','1943','0.00','BW','Männlich','1','','AK9','-56','1','9914');
INSERT INTO heber VALUES ('-90','Schulz','Heinz','-5','1931','0.00','BW','Männlich','1','','AK10','-56','1','11010');
INSERT INTO heber VALUES ('-89','Rüdiger','René','-43','1967','0.00','BW','Männlich','1','','AK4','-56','1','2475');
INSERT INTO heber VALUES ('-88','Leiniger','Alexandra','-35','1971','0.00','BW','Weiblich','1','','AK3','-48','1','20674');
INSERT INTO heber VALUES ('-87','Erkelenz','Peter','-42','1953','0.00','BW','Männlich','1','','AK7','-56','1','3718');
INSERT INTO heber VALUES ('-86','Elspaß','Swen','-41','1973','0.00','BW','Männlich','1','','AK3','-56','1','11469');
INSERT INTO heber VALUES ('-85','Lembke','Angelique','-40','1981','0.00','BW','Weiblich','1','','AK1','-48','1','13400');
INSERT INTO heber VALUES ('-84','Riegler','Rudi','-39','1970','0.00','BW','Männlich','1','','AK3','-56','1','1615');
INSERT INTO heber VALUES ('-83','Blesing','Martin','-6','1953','0.00','BW','Männlich','1','','AK7','-56','1','8499');
INSERT INTO heber VALUES ('-82','Schubert','Heide','-38','1966','0.00','BW','Weiblich','1','','AK4','-48','1','3802');
INSERT INTO heber VALUES ('-81','Krebs','Ralph','-37','1975','0.00','BW','Männlich','1','','AK2','-56','1','7644');
INSERT INTO heber VALUES ('-80','Rosengart','Siegfried','-22','1944','0.00','BW','Männlich','1','','AK8','-56','1','3112');
INSERT INTO heber VALUES ('-79','Kästner','Reinhard','-36','1962','0.00','BW','Männlich','1','','AK5','-56','1','13201');
INSERT INTO heber VALUES ('-78','Leiniger','Andreas','-35','1974','0.00','BW','Männlich','1','','AK2','-56','1','3727');
INSERT INTO heber VALUES ('-77','Schukies','Margot','-34','1952','0.00','BW','Weiblich','1','','AK7','-48','1','836');
INSERT INTO heber VALUES ('-76','Loch','Vera','8','1960','0.00','BW','Weiblich','1','','AK5','-48','1','53');
INSERT INTO heber VALUES ('-75','Junghans','Ronny','-14','1977','0.00','BW','Männlich','1','','AK2','-56','1','2782');
INSERT INTO heber VALUES ('-74','Müller','Bruno','-33','1959','0.00','BW','Männlich','1','','AK5','-56','1','2420');
INSERT INTO heber VALUES ('-73','Geier','Thomas','-32','1982','0.00','BW','Männlich','1','','AK1','-56','1','3757');
INSERT INTO heber VALUES ('-72','Sarapatsanos','Nikolaus','-31','1952','0.00','BW','Männlich','1','','AK7','-56','1','1983');
INSERT INTO heber VALUES ('-71','Bastian','Wigbert','-30','1981','0.00','BW','Männlich','1','','AK1','-56','1','13301');
INSERT INTO heber VALUES ('-70','Dumm','Adelbert','-29','1948','0.00','BW','Männlich','1','','AK8','-56','1','21007');
INSERT INTO heber VALUES ('-69','Rief','Karlheinz','-28','1958','0.00','BW','Männlich','1','','AK6','-56','1','1430');
INSERT INTO heber VALUES ('-68','Klose','Roman','-27','1973','0.00','BW','Männlich','1','','AK3','-56','1','1997');
INSERT INTO heber VALUES ('-67','Walter','Sven','-26','1980','0.00','BW','Männlich','1','','AK1','-56','1','5302');
INSERT INTO heber VALUES ('-66','Worm','Holger','-25','1961','0.00','BW','Männlich','1','','AK5','-56','1','518');
INSERT INTO heber VALUES ('-65','Kossmann','Reinhard','-7','1948','0.00','BW','Männlich','1','','AK8','-56','1','2826');
INSERT INTO heber VALUES ('-64','Augustin','Lothar','-24','1959','0.00','BW','Männlich','1','','Aktive','-56','1','11649');
INSERT INTO heber VALUES ('-63','Gebhardt','Hans-Dieter','-23','1971','0.00','BW','Männlich','1','','AK3','-56','1','10049');
INSERT INTO heber VALUES ('-62','Meinhardt-Heib','Alexander','77','1971','0.00','BW','Männlich','1','','AK3','-56','1','4715');
INSERT INTO heber VALUES ('-61','Wenzel','Bernd','-22','1959','0.00','BW','Männlich','1','','AK5','-56','1','502');
INSERT INTO heber VALUES ('-60','Stoklasek','Rudolf','-21','1940','0.00','BW','Männlich','1','','AK9','-56','1','11306');
INSERT INTO heber VALUES ('-59','Beck','Gerhard','-20','1938','0.00','BW','Männlich','1','','AK10','-56','1','7450');
INSERT INTO heber VALUES ('-58','Luh','Siegfried','-18','1966','0.00','BW','Männlich','1','','AK4','-56','1','13082');
INSERT INTO heber VALUES ('-57','Hermann','Barbara','-19','1955','0.00','BW','Weiblich','1','','AK6','-48','1','9926');
INSERT INTO heber VALUES ('-56','Schröder','Manfred','-18','1946','0.00','BW','Männlich','1','','AK8','-56','1','94');
INSERT INTO heber VALUES ('-55','Kilimnik','Abram','-17','1936','0.00','BW','Männlich','1','','AK10','-56','1','4070');
INSERT INTO heber VALUES ('-54','Rast','Jörg','-16','1954','0.00','BW','Männlich','1','','AK6','-56','1','3835');
INSERT INTO heber VALUES ('-53','Reischl','Thomas','-15','1975','0.00','BW','Männlich','1','','AK2','-56','1','3775');
INSERT INTO heber VALUES ('-52','Damme','Annett','-14','1967','0.00','BW','Weiblich','1','','AK4','-48','1','9975');
INSERT INTO heber VALUES ('-51','Jaeger','Jessica','77','1981','0.00','BW','Weiblich','1','','AK1','-48','1','13012');
INSERT INTO heber VALUES ('-50','Enkelmann','Peter','-13','1943','0.00','BW','Männlich','1','','AK9','-56','1','12826');
INSERT INTO heber VALUES ('-49','Haase','Matthias','-12','1962','0.00','BW','Männlich','1','','AK5','-56','1','563');
INSERT INTO heber VALUES ('-48','Czok','Bianca','-10','1981','80.00','BW','Weiblich','1','','Aktive','-90','1','2337');
INSERT INTO heber VALUES ('-47','Silveira','Gerhard','-6','1951','0.00','BW','Männlich','1','','AK7','-56','1','1095');
INSERT INTO heber VALUES ('-46','Mayer','Rolf','-6','1960','80.00','BW','Männlich','1','','Aktive','-85','1','826');
INSERT INTO heber VALUES ('-45','Sterner','Michael','-10','1979','80.00','BW','Männlich','1','','Aktive','-85','1','708');
INSERT INTO heber VALUES ('-44','Jung','Thomas','-11','1978','80.00','BW','Männlich','1','','Aktive','-85','1','828');
INSERT INTO heber VALUES ('-43','Cech','Briska','-6','1957','80.00','BW','Weiblich','1','','Aktive','-90','1','5292');
INSERT INTO heber VALUES ('-42','Eicher','Ralf','-6','1964','80.00','BW','Männlich','1','','Aktive','-85','1','2279');
INSERT INTO heber VALUES ('-41','Hofer','Andreas','-10','1979','80.00','BW','Männlich','1','','Aktive','-85','1','709');
INSERT INTO heber VALUES ('-40','Herrmann','Viktor','-11','1947','80.00','BW','Männlich','1','','Aktive','-85','1','830');
INSERT INTO heber VALUES ('-39','Ranftl','Rudi','-10','1969','80.00','BW','Männlich','1','','Aktive','-85','1','4652');
INSERT INTO heber VALUES ('-38','Attilo','Johny','-11','1965','80.90','BW','Männlich','1','','Aktive','-85','1','829');
INSERT INTO heber VALUES ('-37','Lahr','Simone','-6','1979','80.00','BW','Weiblich','1','','Aktive','-90','1','5604');
INSERT INTO heber VALUES ('-36','Koherr','Christian','-10','1973','80.00','BW','Männlich','1','','Aktive','-85','1','6');
INSERT INTO heber VALUES ('-35','Roth','Meike','-6','1960','80.00','BW','Weiblich','1','','Aktive','-90','1','5025');
INSERT INTO heber VALUES ('-34','Maul','Christian','-6','1983','80.00','BW','Männlich','1','','Aktive','-85','1','4903');
INSERT INTO heber VALUES ('-33','Rochelt','Axel','-11','1989','80.00','BW','Männlich','1','','Aktive','-85','1','8365');
INSERT INTO heber VALUES ('-32','Ziegler','Christian','-11','1968','80.00','BW','Männlich','1','','Aktive','-85','1','825');
INSERT INTO heber VALUES ('-31','Bruseghini','Franco','-10','1985','80.00','BW','Männlich','1','','Aktive','-85','1','4076');
INSERT INTO heber VALUES ('-30','Gainza','Victor Yoel Guerra','-9','1997','70.00','BW','Männlich','1','','Aktive','-77','1','11816');
INSERT INTO heber VALUES ('-29','Varlamov','Michael','-9','1997','70.00','BW','Männlich','1','','Aktive','-77','1','11832');
INSERT INTO heber VALUES ('-28','Pietruschka','Dennis','-4','1989','70.00','BW','Männlich','1','','Aktive','-77','1','8806');
INSERT INTO heber VALUES ('-27','Röder','Melanie','-4','1986','70.00','BW','Weiblich','1','','Aktive','-74','1','21134');
INSERT INTO heber VALUES ('-26','Ziegler','Sandro','-4','1990','70.00','BW','Männlich','1','','Aktive','-77','1','9774');
INSERT INTO heber VALUES ('-25','Rössler','Laura','-4','2001','70.00','BW','Weiblich','1','','Jugend','+69','1','13108');
INSERT INTO heber VALUES ('-24','Renner','Martin','-4','1986','70.00','BW','Männlich','1','','Aktive','-77','1','7311');
INSERT INTO heber VALUES ('-23','Tabel','Tabea Hannah','-9','1996','70.00','BW','Weiblich','1','','Aktive','-74','1','11464');
INSERT INTO heber VALUES ('-22','Krieger','Carina','-4','1990','70.00','BW','Weiblich','1','','Aktive','-74','1','12268');
INSERT INTO heber VALUES ('-21','Christophel','Marie','-9','2000','70.00','BW','Weiblich','1','','Junioren','-74','1','13784');
INSERT INTO heber VALUES ('-20','Vautard','Brandon Robert Jean','-9','1996','70.00','BW','Männlich','1','','Aktive','-77','1','20768');
INSERT INTO heber VALUES ('-19','Uhl','Armin','-9','1991','70.00','BW','Männlich','1','','Aktive','-77','1','10722');
INSERT INTO heber VALUES ('-18','Pokusa','Michael','-7','1987','119.20','BW','Männlich','1','','Aktive','+105','1','20764');
INSERT INTO heber VALUES ('-17','Roß','Lukas','-8','1987','109.70','BW','Männlich','1','','Aktive','+105','1','6255');
INSERT INTO heber VALUES ('-16','Rohde','Ivonne','-6','1982','0.00','BW','Weiblich','1','','AK1','-48','1','11231');
INSERT INTO heber VALUES ('-15','Pipke','Robin Max','-6','1997','45.00','BW','Männlich','1','','Aktive','-56','1','11502');
INSERT INTO heber VALUES ('-14','Roß','Martha','-8','1995','61.80','BW','Weiblich','1','','Aktive','-63','1','10686');
INSERT INTO heber VALUES ('-13','Helms','Chris','-7','1993','87.50','BW','Männlich','1','','Aktive','-94','1','11209');
INSERT INTO heber VALUES ('-12','Loose','Kyra','-8','2002','60.90','BW','Weiblich','1','','Jugend','-63','1','13060');
INSERT INTO heber VALUES ('-11','Ma','Vera','-8','2002','64.90','BW','Weiblich','1','','Jugend','-69','1','12895');
INSERT INTO heber VALUES ('-10','Szymon','Sven','-6','1993','74.90','BW','Männlich','1','','Aktive','-77','1','11064');
INSERT INTO heber VALUES ('-9','Reinhardt','Susanne','-8','1990','59.60','BW','Weiblich','1','','Aktive','-63','1','10718');
INSERT INTO heber VALUES ('-8','Steitz','Falk','-7','1993','91.40','BW','Männlich','1','','Aktive','-94','1','10683');
INSERT INTO heber VALUES ('-7','Scheuer','Tina','-7','1979','45.00','BW','Weiblich','1','','Aktive','-48','1','12110');
INSERT INTO heber VALUES ('-6','Olfert','Thomas','-7','1988','80.90','BW','Männlich','1','','Aktive','-85','1','374');
INSERT INTO heber VALUES ('-5','Wonisch','Nico','-8','1999','59.40','BW','Männlich','1','','Junioren','-62','1','12594');
INSERT INTO heber VALUES ('-4','Pokusa','Matus','-7','1988','93.40','BW','Männlich','1','','Aktive','-94','1','12750');
INSERT INTO heber VALUES ('-3','Nützel','Nicole','-6','1979','58.00','BW','Weiblich','1','','Aktive','-58','1','6891');
INSERT INTO heber VALUES ('-2','Fleischmann','Jana','-6','1991','61.90','BW','Weiblich','1','','Aktive','-63','1','20100');
INSERT INTO heber VALUES ('-1','Lee','Rebecca','-6','1988','0.00','BW','Weiblich','1','','AK0','-48','1','20099');
INSERT INTO heber VALUES ('16','Littmann','Melina','9000','2003','56.00','BW','Weiblich','1','','Schüler','-58','0','');
INSERT INTO heber VALUES ('17','Lammel',' Elin','30','2003','40.10','TH','Weiblich','1','','Schüler','-44','0','');
INSERT INTO heber VALUES ('18','Breitschuh',' Marie Sophie','9000','2003','48.10','BW','Weiblich','0','','Schüler','-53','0','');
INSERT INTO heber VALUES ('19','Sensche',' Elias','30','2003','40.40','TH','Männlich','1','','Schüler','-45','0','');
INSERT INTO heber VALUES ('20','Weißbeck','Benjamin','15','2003','56.40','SN','Männlich','1','','Schüler','-62','0','');
INSERT INTO heber VALUES ('21','Barthel',' Marlen','9000','2003','33.20','BW','Weiblich','0','','Jugend','-44','0','');
INSERT INTO heber VALUES ('22','Schlittig',' Vicky','24','2003','51.30','SN','Weiblich','1','','Schüler','-53','0','');
INSERT INTO heber VALUES ('24','Günnel',' Maurice','35','2003','44.20','SN','Männlich','1','','Schüler','-45','0','');
INSERT INTO heber VALUES ('25','Exner',' Elias','9000','2003','37.10','','Männlich','0','','Schüler','-40','0','');
INSERT INTO heber VALUES ('27','Schadt',' Egor','27','2003','51.20','BB','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('28','Klünder',' Kevin','6','2003','36.10','SN','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('29','Müller','Lucas','6','2003','36.20','SN','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('30','Fähsecke',' Marie','38','2003','38.70','BW','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('33','Knop',' Leo','34','2003','42.30','RP','Männlich','1','','Schüler','-45','0','');
INSERT INTO heber VALUES ('37','Blume',' Samira','9000','2002','44.60','BW','Weiblich','0','','Jugend','-48','0','');
INSERT INTO heber VALUES ('39','Weiner','Sven','32','2002','63.20','BW','Männlich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('40','Leuthner',' Kevin','32','2002','58.90','BW','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('109','Hartenberger','Michelle','35','2002','46.10','SN','Weiblich','1','','Jugend','-48','0','');
INSERT INTO heber VALUES ('110','Biener','Marie-Kristin','9000','2002','44.40','BW','Weiblich','0','','Jugend','-48','0','');
INSERT INTO heber VALUES ('111','Bergmann','Jannick','9000','2001','62.60','BW','Männlich','0','','Jugend','-69','0','');
INSERT INTO heber VALUES ('112','Boeder','Jordan','9000','2001','50.10','BW','Männlich','0','','Jugend','-56','0','');
INSERT INTO heber VALUES ('113','Blume','Lukas','9000','2001','52.00','BW','Männlich','0','','Jugend','-56','0','');
INSERT INTO heber VALUES ('114','Dunka','Josef','9000','2002','43.50','','Männlich','0','','Jugend','-50','0','');
INSERT INTO heber VALUES ('115','Drechsel','Nikita','15','2001','57.10','SN','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('116','Deutschmann','David','38','2001','74.30','BW','Männlich','1','','Jugend','-77','0','');
INSERT INTO heber VALUES ('117','Bröse','Maximilian','27','2002','44.00','BB','Männlich','0','','Jugend','-50','0','');
INSERT INTO heber VALUES ('118','Bretsche','Mika','7','2002','80.10','TH','Männlich','0','','Jugend','-85','0','');
INSERT INTO heber VALUES ('119','Feil','Bastian','9000','2001','63.20','','Männlich','0','','Jugend','-69','0','');
INSERT INTO heber VALUES ('120','Feil','Philipp','9000','2001','64.40','','Weiblich','0','','Jugend','-69','0','');
INSERT INTO heber VALUES ('121','Feil','Nils','9000','2001','51.30','','Männlich','0','','Jugend','-56','0','');
INSERT INTO heber VALUES ('122','Elsner','Eric','9000','2002','69.20','','Männlich','0','','Jugend','-77','0','');
INSERT INTO heber VALUES ('123','Ehrig','Nino','9000','2001','59.20','','Weiblich','0','','Jugend','-63','0','');
INSERT INTO heber VALUES ('124','Grau','Eric','5','2001','65.40','BY','Männlich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('125','Friedrich','Raphael','2','2001','74.90','RP','Männlich','0','','Jugend','-77','1','');
INSERT INTO heber VALUES ('126','Fricke','Marc','27','2002','88.00','BB','Männlich','0','','Jugend','-94','0','');
INSERT INTO heber VALUES ('127','Fricke','Julian','28','2003','43.80','BW','Männlich','0','','Schüler','-45','0','');
INSERT INTO heber VALUES ('128','Florian','Maximilian','7','2001','75.50','TH','Männlich','0','','Jugend','-77','0','');
INSERT INTO heber VALUES ('130','Grillmayer','Paula','3','2003','52.10','BY','Weiblich','1','','Jugend','-53','1','');
INSERT INTO heber VALUES ('132','Hein','Karl','31','2002','44.60','BE','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('133','Greiner','Marlon','7','2003','88.20','TH','Männlich','1','','Schüler','+69','0','');
INSERT INTO heber VALUES ('134','Hansch','Dennis','36','2002','47.30','BB','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('135','Hanft','Dominik','12','2001','73.70','NW','Männlich','1','','Jugend','-77','0','');
INSERT INTO heber VALUES ('136','Hagedorn','Emily','34','2002','55.00','RP','Weiblich','1','','Jugend','-58','0','');
INSERT INTO heber VALUES ('137','Haaß','David','32','2002','88.80','BW','Männlich','1','','Jugend','-94','0','');
INSERT INTO heber VALUES ('138','Günther','Moritz','25','2002','88.40','NI','Männlich','1','','Jugend','-94','0','');
INSERT INTO heber VALUES ('139','Hofmann','Elisabeth','32','2001','57.70','BW','Weiblich','1','','Jugend','-58','0','');
INSERT INTO heber VALUES ('140','Hörner','Amelie','11','2002','56.60','BB','Weiblich','1','','Jugend','-58','0','');
INSERT INTO heber VALUES ('141','Kaiser','Davina','8','2001','72.10','SL','Weiblich','1','','Jugend','+69','0','');
INSERT INTO heber VALUES ('142','Keßler','Emily','19','2002','45.00','RP','Weiblich','1','','Jugend','-48','0','');
INSERT INTO heber VALUES ('143','Kaufhold','Kimberley','15','2001','46.00','SN','Weiblich','1','','Jugend','-48','0','');
INSERT INTO heber VALUES ('144','Maier','Moritz','33','2001','79.80','BY','Männlich','1','','Jugend','-85','0','');
INSERT INTO heber VALUES ('145','Ludwig','Erik','26','2001','75.90','SN','Männlich','1','','Jugend','-77','0','');
INSERT INTO heber VALUES ('146','Loose','W','10','2002','30.00','BW','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('147','Knodel','Lucas','19','2002','37.00','RP','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('148','Kluge','Fabian','28','2001','63.00','BW','Männlich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('149','Müller','Lukas','16','2001','74.80','BW','Männlich','1','','Jugend','-77','0','');
INSERT INTO heber VALUES ('150','Müller','Ron','36','2001','54.50','BB','Männlich','1','','Jugend','-56','0','');
INSERT INTO heber VALUES ('151','Möske','Charline','22','2003','37.20','BY','Weiblich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('152','Meißner','Alexander','31','2003','38.70','BE','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('153','Mattig','Lea Justine','9','2001','58.30','BB','Weiblich','1','','Jugend','-63','0','');
INSERT INTO heber VALUES ('154','Pilz','Daniel','3','2001','73.40','BY','Männlich','1','','Jugend','-77','1','');
INSERT INTO heber VALUES ('155','Pham Manh','Tuan','27','2001','42.80','BB','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('156','Peter','Dave','38','2001','56.10','BW','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('157','Perlt','Julia ','30','2001','48.60','TH','Weiblich','1','','Jugend','-53','0','');
INSERT INTO heber VALUES ('158','Neuhäuser','Leonie','7','2003','39.30','TH','Weiblich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('159','Schelhorn','Tarek-Wilhelm','30','2001','87.40','TH','Männlich','1','','Jugend','-94','0','');
INSERT INTO heber VALUES ('160','Sailer','Philipp','32','2001','70.20','BW','Männlich','1','','Jugend','-77','0','');
INSERT INTO heber VALUES ('161','Rössler','Laura','18','2001','56.50','RP','Weiblich','1','','Jugend','-58','0','');
INSERT INTO heber VALUES ('162','Reum','Ben','14','2002','55.25','TH','Männlich','1','','Jugend','-56','0','');
INSERT INTO heber VALUES ('163','Plüger','Adrian','30','2001','62.00','TH','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('164','Schuster','Luc-Dante','13','2001','52.00','BE','Männlich','1','','Jugend','-56','0','');
INSERT INTO heber VALUES ('165','Schönsiegel','Celina','32','2002','39.60','BW','Weiblich','1','','Jugend','-44','0','');
INSERT INTO heber VALUES ('166','Schönherr','Richard','15','2002','60.20','SN','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('167','Schneider','Milena','35','2001','61.20','SN','Weiblich','1','','Jugend','-63','0','');
INSERT INTO heber VALUES ('168','Schemmel','Tobias','3','2001','63.10','BY','Männlich','1','','Jugend','-69','1','');
INSERT INTO heber VALUES ('169','Stoye','Josefine','15','2001','53.00','SN','Weiblich','1','','Jugend','-53','0','');
INSERT INTO heber VALUES ('170','Seitz','Bianca','37','2001','46.10','HH','Weiblich','1','','Jugend','-48','0','');
INSERT INTO heber VALUES ('171','Seifert','Tim','35','2002','45.60','SN','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('172','Sebalj','David','39','2001','45.00','BW','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('173','Schütte','Fynn','31','2002','48.20','BE','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('174','Weiss','Philipp','7','2001','57.65','TH','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('175','Weiner','Luca','32','2001','57.20','BW','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('176','Ursolino','Angelina','32','2002','56.80','BW','Weiblich','1','','Jugend','-58','0','');
INSERT INTO heber VALUES ('177','Truong-Bach','Lisa Mai','27','2001','45.20','BB','Weiblich','1','','Jugend','-48','0','');
INSERT INTO heber VALUES ('178','Trost','Hannes','9000','2001','65.30','','Männlich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('179','Wendlandt','Jannes','21','2001','63.80','BB','Männlich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('180','Woecht','Sebastian','28','2001','69.00','BW','Männlich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('181','Wolf','Ricardo Aaron','36','2002','54.90','BB','Männlich','1','','Jugend','-56','0','');
INSERT INTO heber VALUES ('182','Zagermann','Eric','17','2001','86.00','TH','Männlich','1','','Jugend','-94','0','');
INSERT INTO heber VALUES ('185','Schache','Sina-Franziska','26','2002','52.60','SN','Weiblich','1','','Jugend','-53','0','');
INSERT INTO heber VALUES ('186','Da Silva Prior','Leon Cavalho','2','2002','63.10','RP','Männlich','0','','Jugend','-69','1','');
INSERT INTO heber VALUES ('187','Loose','Kyra','10','2002','48.50','BW','Weiblich','1','','Jugend','-53','0','');
INSERT INTO heber VALUES ('188','Kopp','Madita','39','2001','52.90','BW','Weiblich','1','','Jugend','-53','0','');
INSERT INTO heber VALUES ('189','Kessler','Ben','19','2005','50.00','RP','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('190','Stöcklin','Tobias','40','2005','55.00','BY','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('191','Schuler','Justin','41','2005','70.00','BW','Männlich','1','','Schüler','+69','0','');
INSERT INTO heber VALUES ('192','Grätz','Tizian','11','2005','50.00','BB','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('193','Saini','Rishabh','33','2005','50.00','BY','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('194','Graze','Elias','10','2005','50.00','BW','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('195','Sailer','Lars','32','2005','50.00','BW','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('196','Spatola','Moriano','10','2005','75.00','BW','Männlich','1','','Schüler','+69','0','');
INSERT INTO heber VALUES ('197','Soldner','Farin','32','2005','75.00','BW','Männlich','1','','Schüler','+69','0','');
INSERT INTO heber VALUES ('198','Haupt','Christian','42','2005','50.00','BY','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('199','Jutzi','Tom','43','2003','50.00','BW','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('200','Reischl','Jonas','44','2003','50.00','BY','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('201','Schneider','Julian','19','2003','50.00','RP','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('203','Kampp','Marcel','41','2003','0.00','BW','Männlich','1','','Schüler','-35','0','');
INSERT INTO heber VALUES ('205','Bühr','Yannik','28','2003','20.00','BW','Männlich','0','','Schüler','-35','0','');
INSERT INTO heber VALUES ('206','Reichensperger','Marcel','43','2006','43.90','BW','Männlich','1','','Kinder','-45','0','');
INSERT INTO heber VALUES ('207','Hofmann','Emanuel','28','2006','50.00','BW','Männlich','1','','Kinder','-50','0','');
INSERT INTO heber VALUES ('208','Junemann','Eric','11','2006','50.00','BB','Männlich','1','','Kinder','-50','0','');
INSERT INTO heber VALUES ('209','Löffler','Nils','2','2004','31.70','RP','Männlich','1','','Schüler','-35','1','');
INSERT INTO heber VALUES ('210','Friend','Hutch','54','2004','33.30','HE','Männlich','0','','Schüler','-35','0','');
INSERT INTO heber VALUES ('211','Wagenbach','Lars','43','2004','36.00','BW','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('212','Stanton','Elijah','47','2004','39.30','BY','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('213','Rukabert','Benjamin','44','2004','0.00','BY','Männlich','1','','Schüler','-35','0','');
INSERT INTO heber VALUES ('214','Holetz','Tim','32','2004','44.00','BW','Männlich','1','','Schüler','-45','0','');
INSERT INTO heber VALUES ('215','Häfele','Alexander','48','2004','43.60','BY','Männlich','1','','Schüler','-45','0','');
INSERT INTO heber VALUES ('216','Köhler','Raik','19','2004','42.00','RP','Männlich','1','','Schüler','-45','0','');
INSERT INTO heber VALUES ('217','Seibold','Florian','44','2004','54.40','BY','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('218','Grätz','Julian','11','2004','47.60','BB','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('219','Stanton','Rowan','47','2004','52.80','BY','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('220','Klassig','Conner','32','2004','53.80','BW','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('222','Sattler','Yannik','19','2004','54.50','RP','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('223','Blas','Noah','9000','2004','58.60','BW','Männlich','0','','Schüler','-62','0','');
INSERT INTO heber VALUES ('224','Still','Robin','46','2004','62.30','BY','Männlich','1','','Schüler','-69','0','');
INSERT INTO heber VALUES ('225','Schönsiegel','Justin','32','2004','64.00','BW','Männlich','1','','Schüler','-69','0','');
INSERT INTO heber VALUES ('226','Frey','Moritz','12','2004','69.70','NW','Weiblich','0','','Schüler','+63','0','');
INSERT INTO heber VALUES ('227','Fischer','Finn','9000','2003','50.00','','Männlich','0','','Schüler','-50','0','');
INSERT INTO heber VALUES ('228','Suschko','Julian','43','2003','55.00','BW','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('229','Esterle','Michael','9000','2003','50.00','','Männlich','0','','Schüler','-50','0','');
INSERT INTO heber VALUES ('230','Kazanc','Demian','2','2003','42.20','RP','Männlich','1','','Schüler','-45','1','');
INSERT INTO heber VALUES ('231','Hinderberger','Tim','2','2003','37.30','RP','Männlich','1','','Schüler','-40','1','');
INSERT INTO heber VALUES ('232','Fischer','Tom','9000','2001','49.70','','Weiblich','0','','Jugend','-53','0','');
INSERT INTO heber VALUES ('233','Stefan','Tim','49','2001','44.00','RP','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('234','Kurz','Lorenz','49','2001','62.00','RP','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('235','Baumgart','Tim','9000','2001','77.60','BW','Männlich','0','','Jugend','-85','0','');
INSERT INTO heber VALUES ('236','Poled','Nicolas','50','2001','75.20','BW','Männlich','1','','Jugend','-77','0','');
INSERT INTO heber VALUES ('247','Dudorkhanov','Indira','9000','2008','27.80','','Männlich','1','','Kinder','-30','0','');
INSERT INTO heber VALUES ('248','Gürth','Nils','30','2007','34.40','TH','Männlich','1','','Kinder','-35','0','');
INSERT INTO heber VALUES ('249','Maas','Denny','30','2005','47.70','TH','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('250','Langkabel','Laura','30','2005','43.40','TH','Weiblich','1','','Schüler','-44','0','');
INSERT INTO heber VALUES ('251','Dudorkhanov','Iman','9000','2005','29.70','','Männlich','1','','Schüler','-35','0','');
INSERT INTO heber VALUES ('252','Dudorkhanov','Ibrahim','9000','2004','43.00','','Männlich','0','','Schüler','-45','0','');
INSERT INTO heber VALUES ('253','Steudner','Max','30','2004','52.20','TH','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('254','Oelling','Jakob','9000','2003','50.00','','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('255','Walther','Eric-Rene','9000','2003','85.90','','Männlich','1','','Schüler','+69','0','');
INSERT INTO heber VALUES ('256','John','Leon','9000','2002','73.90','','Männlich','1','','Jugend','-77','0','');
INSERT INTO heber VALUES ('257','Motek','Jonas','9000','2001','50.00','','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('258','Oelling','Jakob','51','2006','56.30','TH','Männlich','1','','Kinder','-62','0','');
INSERT INTO heber VALUES ('259','Lanckrock','Justin','53','2005','28.00','HE','Männlich','1','','Schüler','-35','0','');
INSERT INTO heber VALUES ('260','Kleine','Ryuu','53','2005','37.40','HE','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('261','Vasilev ','Filip','53','2003','48.40','HE','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('262','Konrad','Mark','53','2003','37.90','HE','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('263','Moritz','Justus','53','2003','51.95','HE','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('264','Georgiev','Aleks','15','2002','50.00','SN','Männlich','1','','Jugend','-50','0','');
INSERT INTO heber VALUES ('265','Lagah','Goutam','53','2002','80.50','HE','Männlich','1','','Jugend','-85','0','');
INSERT INTO heber VALUES ('266','Malkowsky','Asarja','53','2001','50.00','HE','Weiblich','1','','Jugend','-53','0','');
INSERT INTO heber VALUES ('267','Alvarez','Carlos','25','2004','35.20','NI','Männlich','0','','Schüler','-40','0','');
INSERT INTO heber VALUES ('268','De Nuccio','Leon','54','2004','46.90','HE','Männlich','0','','Schüler','-50','0','');
INSERT INTO heber VALUES ('269','Houede','Daniel','54','2004','49.20','HE','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('270','Funk','Tim Patrick','54','2004','50.00','HE','Männlich','0','','Schüler','-50','0','');
INSERT INTO heber VALUES ('271','Marx','Magnus','52','2005','34.50','BW','Männlich','1','','Schüler','-35','0','');
INSERT INTO heber VALUES ('272','Demirtas','Efe Can','54','2004','15.00','HE','Männlich','0','','Schüler','-35','0','');
INSERT INTO heber VALUES ('273','Schreiner','Alexander','54','2003','33.20','HE','Männlich','1','','Schüler','-35','0','');
INSERT INTO heber VALUES ('274','Hallstein','Simon','54','2003','50.50','HE','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('275','van de Weijer','Lars','54','2002','60.00','HE','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('276','Simon','Mika','14','2004','45.20','TH','Männlich','1','','Schüler','-50','0','');
INSERT INTO heber VALUES ('277','Neumann','Robin','12','2006','57.90','NW','Männlich','1','','Kinder','-62','0','');
INSERT INTO heber VALUES ('278','Hennecke','Fabian','12','2005','36.00','NW','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('279','Schilling','Oskar','12','2005','52.50','NW','Männlich','1','','Schüler','-56','0','');
INSERT INTO heber VALUES ('280','Brückner','Sophie','12','2005','34.00','NW','Weiblich','0','','Schüler','-40','0','');
INSERT INTO heber VALUES ('281','Hennecke','Pascal','12','2004','69.20','NW','Männlich','1','','Schüler','+69','0','');
INSERT INTO heber VALUES ('282','Reuter','Tom David','12','2004','58.30','NW','Männlich','1','','Schüler','-62','0','');
INSERT INTO heber VALUES ('283','Heß','Damian','7','2007','40.50','TH','Männlich','1','','Kinder','-45','0','');
INSERT INTO heber VALUES ('284','Kallenbach','Luca','7','2006','53.10','TH','Männlich','1','','Kinder','-56','0','');
INSERT INTO heber VALUES ('285','Schweng','Eileen','7','2005','33.10','TH','Weiblich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('286','Langer','Tommy','7','2004','35.60','TH','Männlich','1','','Schüler','-40','0','');
INSERT INTO heber VALUES ('287','Langbein','John','7','2004','31.00','TH','Männlich','1','','Schüler','-35','0','');
INSERT INTO heber VALUES ('288','Jahn','Marlon','7','2003','89.90','TH','Männlich','1','','Schüler','+69','0','');
INSERT INTO heber VALUES ('289','Emick','Jan','9000','2004','74.20','','Männlich','0','','Schüler','+69','0','');
INSERT INTO heber VALUES ('290','Schröpfer','Mo','9000','2003','57.00','','Männlich','1','','Schüler','-62','0','');
INSERT INTO heber VALUES ('292','Treutlein','Mandy','9000','1990','69.75','','Weiblich','1','','Aktive','-74','0','');
INSERT INTO heber VALUES ('293','Kusterer','Sabine','9000','1990','58.70','','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('294','Velagic','Almir','9000','1990','150.30','','Männlich','1','','Aktive','+105','0','');
INSERT INTO heber VALUES ('295','Prochorow','Alexej','9000','1990','136.45','','Männlich','1','','Aktive','+105','0','');
INSERT INTO heber VALUES ('296','Perez Valentin','Lydia','9000','1990','75.85','','Weiblich','6','','Aktive','-90','0','');
INSERT INTO heber VALUES ('297','Kingue Matam','Bernadin','9000','1990','70.70','BW','Männlich','2','','Aktive','-77','0','');
INSERT INTO heber VALUES ('298','Spiess','Jürgen','9000','1990','106.90','BW','Männlich','1','','Aktive','+105','0','');
INSERT INTO heber VALUES ('299','Müller','Nico','9000','1990','76.00','','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('300','Lang','Max','9000','1990','78.00','','Männlich','1','','Aktive','-85','0','');
INSERT INTO heber VALUES ('301','Michel','Anais','9000','1990','49.55','','Weiblich','2','','Aktive','-53','0','');
INSERT INTO heber VALUES ('302','Bouly','Kevin','9000','1990','96.90','BW','Männlich','0','','Aktive','-105','0','');
INSERT INTO heber VALUES ('303','Hennequin','Benjamin','9000','1990','88.70','','Männlich','2','','Aktive','-94','0','');
INSERT INTO heber VALUES ('304','Bardis','Giovanni','9000','1990','86.85','BW','Männlich','0','','Aktive','-94','0','');
INSERT INTO heber VALUES ('305','Nayo Ketchanke','Gaelle','9000','1990','75.40','','Weiblich','2','','Aktive','-90','0','');
INSERT INTO heber VALUES ('306','Mata Perez','Andres Eduardo','9000','1990','81.15','','Männlich','6','','Aktive','-85','0','');
INSERT INTO heber VALUES ('307','Sanchez Lopez','David','9000','1990','72.15','','Männlich','6','','Aktive','-77','0','');
INSERT INTO heber VALUES ('308','Brachi Garcia','Josue','9000','1990','59.25','BW','Männlich','0','','Aktive','-62','0','');
INSERT INTO heber VALUES ('309','Bordignon','Giorgua','9000','1990','63.80','BW','Weiblich','0','','Aktive','-69','0','');
INSERT INTO heber VALUES ('310','Pagliaro','Genny','9000','1990','49.70','','Weiblich','3','','Aktive','-53','0','');
INSERT INTO heber VALUES ('311','Pizzolato','Antonio','9000','1990','86.90','','Männlich','3','','Aktive','-94','0','');
INSERT INTO heber VALUES ('312','Scarantino','Mirco','9000','1990','56.95','','Männlich','3','','Aktive','-62','0','');
INSERT INTO heber VALUES ('313','Everi','Anna-Maria','9000','1990','63.60','','Weiblich','0','','Aktive','-69','0','');
INSERT INTO heber VALUES ('340','t3','','3','2003','90.00','BY','Männlich','1','','Jugend','-94','1','');
INSERT INTO heber VALUES ('341','t2','','3','2006','80.00','BY','Männlich','1','','Schüler','+69','1','');
INSERT INTO heber VALUES ('342','t1','','3','2005','54.00','BY','Weiblich','1','','Schüler','-58','1','');
INSERT INTO heber VALUES ('343','t4','','3','2004','85.00','BY','Männlich','1','','Schüler','+69','1','');
INSERT INTO heber VALUES ('344','t5','','3','1945','70.00','BY','Männlich','1','','Aktive','-77','1','');
INSERT INTO heber VALUES ('346','t6','','3','1950','92.00','BY','Männlich','1','','Aktive','-94','1','');
INSERT INTO heber VALUES ('348','Moritz','Redlich','64','1996','75.00','BY','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('354','Enns','Arthur','64','1990','73.40','BY','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('355','Neumann','Ellen','64','1994','81.20','BY','Weiblich','1','','Aktive','-90','0','');
INSERT INTO heber VALUES ('356','Reindl','Silke','64','1989','65.10','BY','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('358','Salosnig','Martina','64','1984','67.80','BY','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('359','Schmidt','Julia','64','1995','50.40','BY','Weiblich','1','','Aktive','-53','0','');
INSERT INTO heber VALUES ('360','Popel','Johannes','3','1994','76.80','BY','Männlich','1','','Aktive','-77','1','');
INSERT INTO heber VALUES ('361','Schemmel','Kerstin','3','1998','66.40','BY','Weiblich','1','','Junioren','-69','1','');
INSERT INTO heber VALUES ('362','Guerro Gainza','Viktor Yoel','57','1997','84.10','RP','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('363','Heid','Jason','57','1998','76.20','RP','Männlich','1','','Junioren','-77','0','');
INSERT INTO heber VALUES ('364','Schroth','Nina','57','1991','77.50','RP','Weiblich','1','','Aktive','-90','0','');
INSERT INTO heber VALUES ('365','Weishaupt','Tim','49','1997','83.50','RP','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('366','Wittur','Mike Maximilian','49','1993','76.20','RP','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('367','Block','Jennifer','5','1990','67.60','BY','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('368','Schoener','Katharina','5','1988','62.00','BY','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('369','Unger','Nina','5','1989','57.60','BY','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('370','Zehner','Ulrike','5','1977','47.30','BY','Weiblich','1','','Aktive','-48','0','');
INSERT INTO heber VALUES ('371','Lee','Rebecca','43','1988','62.20','BW','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('372','Nützel ','Nicole','43','1979','59.60','BW','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('373','Pipke','Monika','43','1960','51.90','BW','Weiblich','1','','Aktive','-53','0','');
INSERT INTO heber VALUES ('374','Rohde','Ivonne','43','1982','57.90','BW','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('375','Hinkelmann','Nancy','4','1996','47.60','SN','Weiblich','1','','Aktive','-48','0','');
INSERT INTO heber VALUES ('376','Behm ','Robby','58','1986','104.40','BW','Männlich','1','','Aktive','-105','0','');
INSERT INTO heber VALUES ('377','Hüllen-Deutscher','Daniela','58','1976','68.60','BW','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('378','Buchwald','Ina','12','1989','66.10','NW','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('379','Etscheit','Judith','12','1984','66.80','NW','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('380','Gjeli ','Enis','12','1999','94.00','NW','Männlich','1','','Junioren','-94','0','');
INSERT INTO heber VALUES ('381','Mayer','Sakina','12','1993','62.00','NW','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('382','von der Heyden','Angelina','12','1998','68.30','NW','Weiblich','1','','Junioren','-69','0','');
INSERT INTO heber VALUES ('383','Peter','Tessa','8','1993','68.10','SL','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('384','Janta','Gerit','6','1997','55.70','SN','Weiblich','1','','Junioren','-58','0','');
INSERT INTO heber VALUES ('385','Janta','Hagen','6','1999','72.80','SN','Männlich','1','','Junioren','-77','0','');
INSERT INTO heber VALUES ('386','Kästner','Henrik','52','2000','83.40','BW','Männlich','1','','Jugend','-85','0','');
INSERT INTO heber VALUES ('387','Kästner','Celine','52','1998','52.10','BW','Weiblich','1','','Junioren','-53','0','');
INSERT INTO heber VALUES ('388','Schaaf','Leon','52','2001','69.00','BW','Männlich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('389','Florian','Max','7','2001','85.00','TH','Männlich','1','','Jugend','-85','0','');
INSERT INTO heber VALUES ('390','Schweng','Cindy','7','2000','61.40','TH','Weiblich','1','','Jugend','-63','0','');
INSERT INTO heber VALUES ('391','Vogel ','Marc','7','2000','94.00','TH','Männlich','1','','Jugend','-94','0','');
INSERT INTO heber VALUES ('392','Männeke','Max','11','1995','84.60','BB','Männlich','1','','Aktive','-85','0','');
INSERT INTO heber VALUES ('393','Guzda','Patrick Michael','11','2000','92.90','BB','Männlich','1','','Jugend','-94','0','');
INSERT INTO heber VALUES ('394','Jurke','Bartimäus','11','1995','84.10','BB','Männlich','1','','Aktive','-85','0','');
INSERT INTO heber VALUES ('395','Leuschner','Maximilian','11','1999','84.70','BB','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('396','Zandeck','Manuel','11','1998','74.00','BB','Männlich','1','','Junioren','-77','0','');
INSERT INTO heber VALUES ('397','Jurke','Äneas','11','1989','76.50','BB','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('398','Arian','Assal','45','1990','58.00','HE','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('400','Bouratn','Martin','9','1995','93.00','BB','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('401','Hintze','Jenny','9','2000','61.40','BB','Weiblich','1','','Jugend','-63','0','');
INSERT INTO heber VALUES ('402','Mattig','Lea-Justine','9','2001','57.20','BB','Weiblich','1','','Jugend','-58','0','');
INSERT INTO heber VALUES ('403','Oswald','Robert','9','1988','93.40','BB','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('404','Pahl','Paul','9','1998','83.50','BB','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('405','Schedler','Leon','9','1998','56.00','BB','Männlich','1','','Junioren','-56','0','');
INSERT INTO heber VALUES ('406','Taubert','Anna','9','2000','74.40','BB','Weiblich','1','','Jugend','+69','0','');
INSERT INTO heber VALUES ('407','Hörner','Helene','40','1998','75.00','BY','Weiblich','1','','Junioren','-90','0','');
INSERT INTO heber VALUES ('408','Cornelius','Cosima','38','1990','56.70','BW','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('409','Schwarzbach','Tom','2','1986','84.90','RP','Männlich','1','','Aktive','-85','1','');
INSERT INTO heber VALUES ('410','Spindler','Christina','2','1995','68.80','RP','Weiblich','1','','Aktive','-69','1','');
INSERT INTO heber VALUES ('411','Wüst','Carolin','2','1999','62.30','RP','Weiblich','1','','Junioren','-63','1','');
INSERT INTO heber VALUES ('412','Ender','Jonas','13','1998','84.60','BE','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('413','Joachim','Robert','13','1987','70.40','BE','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('414','Müller','Michael','13','1987','86.60','BE','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('415','Mummhardt','Philip','13','1995','118.90','BE','Männlich','1','','Aktive','+105','0','');
INSERT INTO heber VALUES ('416','Oehler','Elisabeth','13','1991','52.90','BE','Weiblich','1','','Aktive','-53','0','');
INSERT INTO heber VALUES ('417','Schreiber','Chantal','13','1998','89.00','BE','Weiblich','1','','Junioren','-90','0','');
INSERT INTO heber VALUES ('418','Kassel','Rene','14','1986','76.60','TH','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('419','Günther','Björn','14','1996','103.00','TH','Männlich','1','','Aktive','-105','0','');
INSERT INTO heber VALUES ('420','Kudzik','Philip','15','1993','94.00','SN','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('421','Lang','Max','15','1992','76.80','SN','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('422','Martin','Sandra','15','1986','47.90','SN','Weiblich','1','','Aktive','-48','0','');
INSERT INTO heber VALUES ('423','Perthel','Kurt','15','1997','94.00','SN','Männlich','1','','Junioren','-94','0','');
INSERT INTO heber VALUES ('424','Pichler','Christoph','15','1993','67.20','SN','Männlich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('425','Häusler','Anna-Carina','22','1989','68.70','BY','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('426','Rieß','Lisa','22','1989','67.80','BY','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('427','Schnurrer','Florian','22','1993','93.60','BY','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('428','Lombardo','Noah','69','1999','65.40','BY','Männlich','1','','Junioren','-69','0','');
INSERT INTO heber VALUES ('429','Gürtler','Annalena','17','1998','74.90','TH','Weiblich','1','','Junioren','-90','0','');
INSERT INTO heber VALUES ('430','Meyer','Domenic','17','1998','93.50','TH','Männlich','1','','Junioren','-94','0','');
INSERT INTO heber VALUES ('431','Grotz','Saskia','54','1982','71.10','HE','Weiblich','1','','Aktive','-74','0','');
INSERT INTO heber VALUES ('432','Minchev','Sevdalin','9000','0','0.00','','Männlich','1','','','','0','');
INSERT INTO heber VALUES ('433','Minchev ','Sevdalin','37','1992','62.00','HH','Männlich','1','','Aktive','-62','0','');
INSERT INTO heber VALUES ('434','Hansen','Anna','68','1986','58.00','NI','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('435','Marth','Janina','9000','1991','69.00','','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('436','Porrmann','Nina','68','1976','57.10','NI','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('437','Marth','Janina','68','1991','67.90','NI','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('438','Hermann','Daniel','73','1996','76.40','BW','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('439','Stösser','Tim','75','1999','111.90','BW','Männlich','1','','Junioren','+105','0','');
INSERT INTO heber VALUES ('440','Scheuer','tina','1','1979','91.00','BW','Weiblich','1','','Aktive','+90','1','');
INSERT INTO heber VALUES ('441','Winterholler','Nicole','71','1986','73.50','BY','Weiblich','1','','Aktive','-74','0','');
INSERT INTO heber VALUES ('442','Spieß','Jürgen','72','1984','93.60','BW','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('443','Krieger','Carina','18','1990','49.80','RP','Weiblich','1','','Aktive','-53','0','');
INSERT INTO heber VALUES ('444','Rössler','Laura','18','2001','57.20','RP','Weiblich','1','','Jugend','-58','0','');
INSERT INTO heber VALUES ('445','Bopp','Lena','50','1990','57.70','BW','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('446','Kusterer','Sabine','50','1991','63.00','BW','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('447','Scharnberg','Natascha','50','1980','57.50','BW','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('448','Schweizer','Kevin','50','1986','92.60','BW','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('449','Attilo','Sophia','19','1993','52.90','RP','Weiblich','1','','Aktive','-53','0','');
INSERT INTO heber VALUES ('450','Attilo ','Giuliano','19','1998','68.50','RP','Männlich','1','','Junioren','-69','0','');
INSERT INTO heber VALUES ('451','Dauth','Caroline','19','1999','62.20','RP','Weiblich','1','','Junioren','-63','0','');
INSERT INTO heber VALUES ('452','Drews','Patrick','19','1995','73.60','RP','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('453','Feil','Nils','19','2001','59.80','RP','Männlich','1','','Jugend','-62','0','');
INSERT INTO heber VALUES ('454','Hammer','Nik','19','1998','71.40','RP','Männlich','1','','Junioren','-77','0','');
INSERT INTO heber VALUES ('455','Izere Shima','Padou','19','2000','55.70','RP','Männlich','1','','Jugend','-56','0','');
INSERT INTO heber VALUES ('456','Aßmann','Stefan','42','1987','84.80','BY','Männlich','1','','Aktive','-85','0','');
INSERT INTO heber VALUES ('457','Uhl','Armin','42','1991','84.70','BY','Männlich','1','','Aktive','-85','0','');
INSERT INTO heber VALUES ('458','Huber','Moritz','1','1998','68.60','BW','Männlich','1','','Junioren','-69','1','');
INSERT INTO heber VALUES ('459','Valduga','Camilla','1','2000','65.60','BW','Weiblich','1','','Junioren','-69','1','');
INSERT INTO heber VALUES ('460','Tabel','Tabea Hanna','1','1996','75.00','BW','Weiblich','1','','Aktive','-90','1','');
INSERT INTO heber VALUES ('461','Bonitz','Celina','78','2000','52.60','ST','Weiblich','1','','Jugend','-53','0','');
INSERT INTO heber VALUES ('462','Haupt','Dany','78','1999','78.30','ST','Weiblich','1','','Junioren','-90','0','');
INSERT INTO heber VALUES ('463','Weisbach','Anna-Maria','23','1999','92.50','SN','Weiblich','1','','Junioren','+90','0','');
INSERT INTO heber VALUES ('464','Schüller','Florian','79','2000','154.40','TH','Männlich','1','','Jugend','+94','0','');
INSERT INTO heber VALUES ('465','Rieger','Patricia','80','1985','73.30','SH','Weiblich','1','','Aktive','-74','0','');
INSERT INTO heber VALUES ('466','Burkhardt','Steve','26','1985','84.60','SN','Männlich','1','','Aktive','-85','0','');
INSERT INTO heber VALUES ('467','Hieke ','Robert','26','1994','116.70','SN','Männlich','1','','Aktive','+105','0','');
INSERT INTO heber VALUES ('468','Köhler ','Jessika','26','1999','75.20','SN','Weiblich','1','','Junioren','-90','0','');
INSERT INTO heber VALUES ('469','Ludwig ','Nancy','26','2000','63.00','SN','Weiblich','1','','Jugend','-63','0','');
INSERT INTO heber VALUES ('470','Ludwig','Erik','26','2001','84.60','SN','Männlich','1','','Jugend','-85','0','');
INSERT INTO heber VALUES ('471','Walzak ','Pauline','26','1999','52.80','SN','Weiblich','1','','Junioren','-53','0','');
INSERT INTO heber VALUES ('472','Weber','Ronny','26','1987','62.00','SN','Männlich','1','','Aktive','-62','0','');
INSERT INTO heber VALUES ('473','Wenke','Stefan','26','1990','94.00','SN','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('474','Bahrendt','Angelo','29','1997','111.50','ST','Männlich','1','','Aktive','+105','0','');
INSERT INTO heber VALUES ('475','Gösche','Claudia','83','1987','67.50','BW','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('476','Grau ','Svenia','83','2000','63.00','BW','Weiblich','1','','Jugend','-63','0','');
INSERT INTO heber VALUES ('477','Schmidt','Kevin','83','1997','63.90','BW','Männlich','1','','Junioren','-69','0','');
INSERT INTO heber VALUES ('478','Pianski','Julian','82','1998','95.00','SN','Männlich','1','','Junioren','-105','0','');
INSERT INTO heber VALUES ('479','Albiez','Andreas','81','1982','57.70','BW','Männlich','1','Auswahl','Aktive','-62','0','');
INSERT INTO heber VALUES ('480','Eble','Lisa','81','1990','64.90','BW','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('481','Eschrich','Lydia','30','2000','68.10','TH','Weiblich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('482','Griebel','Mark','30','1999','71.90','TH','Männlich','1','','Junioren','-77','0','');
INSERT INTO heber VALUES ('483','Griebel','Philipp','30','1996','94.00','TH','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('484','Heyer ','Fritz','30','1999','62.00','TH','Männlich','1','','Junioren','-62','0','');
INSERT INTO heber VALUES ('485','Idieva','Khava','30','2000','59.60','TH','Weiblich','1','','Jugend','-63','0','');
INSERT INTO heber VALUES ('486','Langkabel','Andre','30','2000','85.00','TH','Männlich','1','','Jugend','-85','0','');
INSERT INTO heber VALUES ('487','Orben','Selina','30','2000','62.00','TH','Weiblich','1','','Jugend','-63','0','');
INSERT INTO heber VALUES ('488','Perlt','Julia','30','2001','52.60','TH','Weiblich','1','','Jugend','-53','0','');
INSERT INTO heber VALUES ('489','Witte','Kirsten','30','1996','90.00','TH','Weiblich','1','','Aktive','-90','0','');
INSERT INTO heber VALUES ('490','Hertrampf','Björn','32','1982','89.40','BW','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('491','Döll','Sarah','32','2000','67.10','BW','Weiblich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('492','Hofmann','Ruben','32','2000','71.20','BW','Männlich','1','','Jugend','-77','0','');
INSERT INTO heber VALUES ('493','Hofmann','Matthäus','32','1994','105.00','BW','Männlich','1','','Aktive','-105','0','');
INSERT INTO heber VALUES ('494','Neufeld','Jakob','32','1983','77.00','BW','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('495','Soldner','Janne','32','1999','98.00','BW','Männlich','1','','Junioren','-105','0','');
INSERT INTO heber VALUES ('496','Müller','Nico','32','1993','78.40','BW','Männlich','1','','Aktive','-85','0','');
INSERT INTO heber VALUES ('497','Siegmann','Martin','32','1993','68.90','BW','Männlich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('498','Maurer','Lena','84','1994','62.60','BW','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('499','Zschaler','Sonja','85','1990','67.50','NI','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('500','Schlatt','Lara-Theresa','86','1991','72.60','NW','Weiblich','1','','Aktive','-74','0','');
INSERT INTO heber VALUES ('501','Körner','Kerstin','87','1992','62.70','BY','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('502','Jahn','Annabell','87','1986','56.80','BY','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('503','Bauer','Marina','33','1999','52.70','BY','Weiblich','1','','Junioren','-53','0','');
INSERT INTO heber VALUES ('504','Brandhuber','Hans','33','1996','84.80','BY','Männlich','1','','Aktive','-85','0','');
INSERT INTO heber VALUES ('505','Brandhuber','Simon','33','1991','70.70','BY','Männlich','1','','Aktive','-77','0','');
INSERT INTO heber VALUES ('506','Koralewski','Leon','33','1999','67.60','BY','Männlich','1','','Junioren','-69','0','');
INSERT INTO heber VALUES ('507','Koralewski','Rene','33','1997','68.70','BY','Männlich','1','','Junioren','-69','0','');
INSERT INTO heber VALUES ('508','Nowara','Gregor','33','1993','93.70','BY','Männlich','1','','Aktive','-94','0','');
INSERT INTO heber VALUES ('509','Jacobs','Sarah','88','1992','73.60','BY','Weiblich','1','','Aktive','-74','0','');
INSERT INTO heber VALUES ('510','Nuetzel','Lena','76','1987','57.80','BY','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('511','Pobig','Claudia','76','1989','60.60','BY','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('512','Schiffer','Karl','36','1998','72.40','BB','Männlich','1','','Junioren','-77','0','');
INSERT INTO heber VALUES ('513','Schneider','Michael-Lucas','36','1998','61.70','BB','Männlich','1','','Junioren','-62','0','');
INSERT INTO heber VALUES ('514','Schweizer','Lisa-Marie','36','1995','62.60','BB','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('515','Varlamov','Michael','89','1997','93.30','BB','Männlich','1','','Junioren','-94','0','');
INSERT INTO heber VALUES ('516','Boche','Maria','48','1993','55.20','BY','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('517','Voit','Tamara','46','1994','62.70','BY','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('518','Viktorova','Videlina','90','1991','62.60','BW','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('519','Thiemann','Kerstin','91','1995','71.70','BW','Weiblich','1','','Aktive','-74','0','');
INSERT INTO heber VALUES ('520','Ammer','Anja','93','1984','90.00','BW','Weiblich','1','','Aktive','-90','0','');
INSERT INTO heber VALUES ('521','Dosdall','Fiona','93','1995','78.40','BW','Weiblich','1','','Aktive','-90','0','');
INSERT INTO heber VALUES ('522','Lee','Betty','93','1987','55.30','BW','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('523','Räuchle','Ramon','94','1997','85.00','BW','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('524','Oreja','Ricarda Judith','92','1995','66.00','NW','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('525','Wutzler','Theresa','92','1991','73.50','NW','Weiblich','1','','Aktive','-74','0','');
INSERT INTO heber VALUES ('526','Bektic','Katarina','39','1992','55.40','BW','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('527','Jaeger','Jessica','77','1981','61.80','SL','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('528','Scheuer ','Tina','53','1979','94.70','HE','Weiblich','1','','Aktive','+90','0','');
INSERT INTO heber VALUES ('529','Arian','Assal','45','1990','55.90','HE','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('530','Schroll','Jacqueline','47','1997','63.00','BY','Weiblich','1','','Junioren','-63','0','');
INSERT INTO heber VALUES ('531','Florian','Max','7','2001','84.30','TH','Männlich','1','','Jugend','-85','0','');
INSERT INTO heber VALUES ('532','Opper','Julia','70','1993','63.00','HE','Weiblich','1','','Aktive','-63','0','');
INSERT INTO heber VALUES ('533','Gutu','Roberto','29','2000','71.50','ST','Männlich','1','','Jugend','-77','0','');
INSERT INTO heber VALUES ('534','Roßberg','Arthur','29','2000','50.90','ST','Männlich','1','','Jugend','-56','0','');
INSERT INTO heber VALUES ('535','Scholz','Paula','29','1996','68.70','ST','Weiblich','1','','Aktive','-69','0','');
INSERT INTO heber VALUES ('536','Adler','Martin','36','1999','82.00','BB','Männlich','1','Auswahl','Junioren','-85','0','');
INSERT INTO heber VALUES ('537','Blechschmidt','Jens','36','1998','76.50','BB','Männlich','1','','Junioren','-77','0','');
INSERT INTO heber VALUES ('538','Fischer','Ken','36','1997','83.70','BB','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('539','Kabs','Laura-Sophie','36','1998','61.00','BB','Weiblich','1','','Junioren','-63','0','');
INSERT INTO heber VALUES ('540','Kluth','Tizian','36','1997','83.70','BB','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('541','Mau','John Luke','36','1998','64.40','BB','Männlich','1','','Junioren','-69','0','');
INSERT INTO heber VALUES ('542','Hartenberger','Florian','35','1999','81.90','SN','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('543','Kunschke','Justin','89','2000','67.20','BB','Männlich','1','','Jugend','-69','0','');
INSERT INTO heber VALUES ('544','Baumann','Anastasia','96','1991','51.60','NW','Weiblich','1','','Aktive','-53','0','');
INSERT INTO heber VALUES ('545','Nezha','Agim','96','1998','84.40','NW','Männlich','1','','Junioren','-85','0','');
INSERT INTO heber VALUES ('546','Offer','Nicole','96','1990','57.10','NW','Weiblich','1','','Aktive','-58','0','');
INSERT INTO heber VALUES ('547','Wonisch','Nico','97','1999','60.40','BW','Männlich','1','','Junioren','-62','0','');
INSERT INTO heber VALUES ('548','Prochorow','Alexej','95','1990','134.50','HE','Männlich','1','','Aktive','+105','0','');
INSERT INTO heber VALUES ('549','ksv1','','1','1999','50.00','BW','Männlich','1','','Junioren','-56','1','');
INSERT INTO heber VALUES ('550','ksv2','','1','1995','70.00','BW','Männlich','1','','Aktive','-77','1','');
INSERT INTO heber VALUES ('551','test1','test1','-6','2018','80.00','','Männlich','1','','Kinder','+62','1','1');
INSERT INTO heber VALUES ('552','Otto','Alwin','-106','1944','0.00','BW','Männlich','1','','AK8','-56','1','2');
INSERT INTO heber VALUES ('553','Bickel','Dominik','-6','1994','72.50','BW','Männlich','1','','Aktive','-77','1','11499');
INSERT INTO heber VALUES ('554','Brehm','Nanina','-6','1994','61.40','BW','Weiblich','1','','Aktive','-63','1','13554');
INSERT INTO heber VALUES ('555','Beutel','Robert Maximilian','-6','1994','1.00','BW','Männlich','1','','Aktive','-56','1','13126');
INSERT INTO heber VALUES ('556','Czerwenka','Laura','-7','1996','57.60','BW','Weiblich','1','','Aktive','-58','1','11616');
INSERT INTO heber VALUES ('558','Werner','Ludwig','9002','1938','61.40','','Männlich','1','','AK10','-62','1','123123123');
INSERT INTO heber VALUES ('559','Klaus','Obergfell','-120','1931','81.30','BW','Männlich','1','','AK10','-85','1','898989898');
INSERT INTO heber VALUES ('560','Werra','Manfred','9004','1940','84.40','','Männlich','1','','AK9','-85','1','6445');
INSERT INTO heber VALUES ('561','Kolditz','Wolfgang','-119','1940','84.70','','Männlich','1','','AK9','-85','1','654654');
INSERT INTO heber VALUES ('562','Ambs','Ernst','-60','1943','1.00','BW','Männlich','1','Auswahl','Aktive','-56','1','1213211');
INSERT INTO heber VALUES ('563','Bleiche','Konstantin','-23','1961','1.00','BW','Männlich','1','','AK5','-56','1','13212145');
INSERT INTO heber VALUES ('564','Friedrich','Adrian','-35','1983','76.40','','Männlich','1','','AK1','-77','1','5645564');
INSERT INTO heber VALUES ('565','Dechand','Konstantin','-23','1961','75.00','','Männlich','1','','AK5','-77','1','852852');



# ----------------------------------------------------------
#
# structur for Table 'heber_64'
#
CREATE TABLE heber_64 (
    IdHeber int(11),
    Auswahl tinytext,
    Ausserkonkurrenz tinytext,
    Gruppe int(11),
    Gruppe_Aus int(11),
    LosNr int(11),
    Pendellauf float(11,1),
    Pendel2 float(11,1),
    Sprint float(11,1),
    Sprint2 float(11,1),
    Differenzsprung float(11,2),
    Differenzsprung2 float(11,2),
    Schlussdreisprung int(11),
    Schlussdreisprung2 int(11),
    Schlussdreisprung3 int(11),
    Schockwurf int(11),
    Schockwurf2 int(11),
    Schockwurf3 int(11),
    Anristen int(11),
    Klimmziehen int(11),
    Zug int(11),
    Bankdruecken int(11),
    Liegestuetz int(11),
    Beugestuetz int(11),
    Sternlauf int(11),
    Stern2 int(11),
    Pokal int(11),
    ZKLast int(11),
    GesGrp int(11),
    Mannschaft_Auswahl int(11),
    Nach_Meldung int(11)
);
# ----------------------------------------------------------
#
INSERT INTO heber_64 VALUES ('342',NULL,NULL,'1','1','2','10.0',NULL,'0.0',NULL,'0.00',NULL,'0',NULL,NULL,'0',NULL,NULL,'0','0','0','5','0','8','8',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_64 VALUES ('341',NULL,NULL,'1','2','1','9.3',NULL,'0.0',NULL,'0.00',NULL,'0',NULL,NULL,'0',NULL,NULL,'0','0','0','8','0','6','7',NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_66'
#
CREATE TABLE heber_66 (
    IdHeber int(11),
    Auswahl tinytext,
    Ausserkonkurrenz tinytext,
    Gruppe int(11),
    Gruppe_Aus int(11),
    LosNr int(11),
    Pendellauf float(11,1),
    Pendel2 float(11,1),
    Sprint float(11,1),
    Sprint2 float(11,1),
    Differenzsprung float(11,2),
    Differenzsprung2 float(11,2),
    Schlussdreisprung int(11),
    Schlussdreisprung2 int(11),
    Schlussdreisprung3 int(11),
    Schockwurf int(11),
    Schockwurf2 int(11),
    Schockwurf3 int(11),
    Anristen int(11),
    Klimmziehen int(11),
    Zug int(11),
    Bankdruecken int(11),
    Liegestuetz int(11),
    Beugestuetz int(11),
    Sternlauf int(11),
    Stern2 int(11),
    Pokal int(11),
    ZKLast int(11),
    GesGrp int(11),
    Mannschaft_Auswahl int(11),
    Nach_Meldung int(11)
);
# ----------------------------------------------------------
#
INSERT INTO heber_66 VALUES ('342',NULL,NULL,'1','1','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_66 VALUES ('341',NULL,NULL,'1','2','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_67'
#
CREATE TABLE heber_67 (
    IdHeber int(11),
    Auswahl tinytext,
    Ausserkonkurrenz tinytext,
    Gruppe int(11),
    Gruppe_Aus int(11),
    LosNr int(11),
    Pokal int(11),
    ZKLast int(11),
    AlKlMain tinytext,
    GesGrp int(11),
    Mannschaft_Auswahl int(11),
    Norm_Heber int(11),
    Nach_Meldung int(11)
);
# ----------------------------------------------------------
#
INSERT INTO heber_67 VALUES ('-96',NULL,NULL,'1',NULL,'3',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_67 VALUES ('536',NULL,NULL,'1',NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_67 VALUES ('-218',NULL,NULL,'1',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_67 VALUES ('479',NULL,NULL,'1',NULL,'5',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_67 VALUES ('-332',NULL,NULL,'1',NULL,'4',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_67 VALUES ('562',NULL,NULL,'1',NULL,'7',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_67 VALUES ('-309',NULL,NULL,'1',NULL,'8',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_67 VALUES ('-212',NULL,NULL,NULL,NULL,'9',NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_wk_64'
#
CREATE TABLE heber_wk_64 (
    IdHeber int(11),
    Versuch int(11),
    Reißen int(11),
    Stoßen int(11),
    Div_Wert_R int(11),
    Div_Wert_S int(11),
    Gueltig_Reißen tinytext,
    Gueltig_Stoßen tinytext,
    Reißen_Verzicht int(11),
    Stoßen_Verzicht int(11),
    time tinytext,
    NH_Reißen int(11),
    NH_Stoßen int(11),
    time_Reißen int(11),
    time_Stoßen int(11),
    G_Reißen_1 tinytext,
    G_Stoßen_1 tinytext,
    G_Reißen_2 tinytext,
    G_Stoßen_2 tinytext,
    G_Reißen_3 tinytext,
    G_Stoßen_3 tinytext,
    Time_Reißen_1 int(11),
    Time_Stoßen_1 int(11),
    Time_Reißen_2 int(11),
    Time_Stoßen_2 int(11),
    Time_Reißen_3 int(11),
    Time_Stoßen_3 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO heber_wk_64 VALUES ('342','1','15','17',NULL,NULL,'Ja','Nein',NULL,NULL,NULL,'1','1','1527774609','1527774618',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_64 VALUES ('342','2','16','17','1','0','Ja','Ja',NULL,NULL,NULL,'1','1','1527774611','1527774618',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_64 VALUES ('342','3','17','18','1','1','Ja','Ja',NULL,NULL,NULL,'1','1','1527774613','1527774621',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_64 VALUES ('341','1','15','17',NULL,NULL,'Ja','Ja',NULL,NULL,NULL,'1','1','1527774608','1527774616',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_64 VALUES ('341','2','16','18','1','1','Ja','Nein',NULL,'1',NULL,'1','1','1527774610',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_64 VALUES ('341','3','17','19','1','1','Ja','Ja',NULL,NULL,NULL,'1','1','1527774612','1527774622',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_wk_66'
#
CREATE TABLE heber_wk_66 (
    IdHeber int(11),
    Versuch int(11),
    Reißen int(11),
    Stoßen int(11),
    Technik_Reißen float(11,2),
    Technik_Stoßen float(11,2),
    Div_Wert_R int(11),
    Div_Wert_S int(11),
    Gueltig_Reißen tinytext,
    Gueltig_Stoßen tinytext,
    Reißen_Verzicht int(11),
    Stoßen_Verzicht int(11),
    time_Reißen int(11),
    time_Stoßen int(11),
    NH_Reißen int(11),
    NH_Stoßen int(11),
    G_Reißen_1 tinytext,
    G_Stoßen_1 tinytext,
    G_Reißen_2 tinytext,
    G_Stoßen_2 tinytext,
    G_Reißen_3 tinytext,
    G_Stoßen_3 tinytext,
    Time_Reißen_1 int(11),
    Time_Stoßen_1 int(11),
    Time_Reißen_2 int(11),
    Time_Stoßen_2 int(11),
    Time_Reißen_3 int(11),
    Time_Stoßen_3 int(11),
    TeWert_Reißen_1 float(11,2),
    TeWert_Stoßen_1 float(11,2),
    TeWert_Reißen_2 float(11,2),
    TeWert_Stoßen_2 float(11,2),
    TeWert_Reißen_3 float(11,2),
    TeWert_Stoßen_3 float(11,2)
);
# ----------------------------------------------------------
#
INSERT INTO heber_wk_66 VALUES ('342','1','15','20','5.00','9.00',NULL,NULL,'Ja','Ja',NULL,NULL,NULL,NULL,'1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_66 VALUES ('342','2','16','21','7.00','5.00','1','1','Ja','Ja',NULL,NULL,NULL,NULL,'1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_66 VALUES ('342','3','17','22','7.00','8.00','1','1','Ja','Ja',NULL,NULL,NULL,NULL,'1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_66 VALUES ('341','1','15','20','5.00','7.00',NULL,NULL,'Ja','Ja',NULL,NULL,NULL,NULL,'1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_66 VALUES ('341','2','16','21','5.00','6.00','1','1','Ja','Ja',NULL,NULL,NULL,NULL,'1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_66 VALUES ('341','3','17','22','7.00','4.00','1','1','Ja','Ja',NULL,NULL,NULL,NULL,'1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_wk_67'
#
CREATE TABLE heber_wk_67 (
    IdHeber int(11),
    Versuch int(11),
    Reißen int(11),
    Stoßen int(11),
    Div_Wert_R int(11),
    Div_Wert_S int(11),
    Gueltig_Reißen tinytext,
    Gueltig_Stoßen tinytext,
    Reißen_Verzicht int(11),
    Stoßen_Verzicht int(11),
    time_Reißen int(11),
    time_Stoßen int(11),
    NH_Reißen int(11),
    NH_Stoßen int(11),
    G_Reißen_1 tinytext,
    G_Stoßen_1 tinytext,
    G_Reißen_2 tinytext,
    G_Stoßen_2 tinytext,
    G_Reißen_3 tinytext,
    G_Stoßen_3 tinytext,
    Time_Reißen_1 int(11),
    Time_Stoßen_1 int(11),
    Time_Reißen_2 int(11),
    Time_Stoßen_2 int(11),
    Time_Reißen_3 int(11),
    Time_Stoßen_3 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO heber_wk_67 VALUES ('-96','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-96','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-96','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('536','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('536','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('536','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-218','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-218','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-218','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('479','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('479','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('479','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-332','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-332','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-332','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('562','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('562','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('562','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-309','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-309','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-309','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-212','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-212','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_67 VALUES ('-212','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'laender'
#
CREATE TABLE laender (
    laender text NOT NULL,
    Idlaender int(11) NOT NULL auto_increment,
    laender_lang text NOT NULL,
  PRIMARY KEY (Idlaender)
);
# ----------------------------------------------------------
#
INSERT INTO laender VALUES ('BW','2','Baden-Württemberg');
INSERT INTO laender VALUES ('BY','3','Bayern');
INSERT INTO laender VALUES ('BE','4','Berlin');
INSERT INTO laender VALUES ('BB','5','Brandenburg');
INSERT INTO laender VALUES ('HB','6','Bremen');
INSERT INTO laender VALUES ('HH','7','Hamburg');
INSERT INTO laender VALUES ('HE','8','Hessen');
INSERT INTO laender VALUES ('MV','9','Mecklenburg-Vorpommern');
INSERT INTO laender VALUES ('NI','10','Niedersachsen');
INSERT INTO laender VALUES ('NW','11','Nordrhein-Westfalen');
INSERT INTO laender VALUES ('RP','12','Rheinland-Pfalz');
INSERT INTO laender VALUES ('SL','13','Saarland');
INSERT INTO laender VALUES ('SN','14','Sachsen');
INSERT INTO laender VALUES ('ST','15','	Sachsen-Anhalt');
INSERT INTO laender VALUES ('SH','16','Schleswig-Holstein');
INSERT INTO laender VALUES ('TH','17','Thüringen');



# ----------------------------------------------------------
#
# structur for Table 'laenderwertung'
#
CREATE TABLE laenderwertung (
    Platz int(11) NOT NULL,
    P_Punkte int(11) NOT NULL,
  PRIMARY KEY (Platz)
);
# ----------------------------------------------------------
#
INSERT INTO laenderwertung VALUES ('1','28');
INSERT INTO laenderwertung VALUES ('2','25');
INSERT INTO laenderwertung VALUES ('3','23');
INSERT INTO laenderwertung VALUES ('4','22');
INSERT INTO laenderwertung VALUES ('5','21');
INSERT INTO laenderwertung VALUES ('6','20');
INSERT INTO laenderwertung VALUES ('7','19');
INSERT INTO laenderwertung VALUES ('8','18');
INSERT INTO laenderwertung VALUES ('9','17');
INSERT INTO laenderwertung VALUES ('10','16');
INSERT INTO laenderwertung VALUES ('11','15');
INSERT INTO laenderwertung VALUES ('12','14');
INSERT INTO laenderwertung VALUES ('13','13');
INSERT INTO laenderwertung VALUES ('14','12');
INSERT INTO laenderwertung VALUES ('15','11');
INSERT INTO laenderwertung VALUES ('16','10');
INSERT INTO laenderwertung VALUES ('17','9');
INSERT INTO laenderwertung VALUES ('18','8');
INSERT INTO laenderwertung VALUES ('19','7');
INSERT INTO laenderwertung VALUES ('20','6');
INSERT INTO laenderwertung VALUES ('21','5');
INSERT INTO laenderwertung VALUES ('22','4');
INSERT INTO laenderwertung VALUES ('23','3');
INSERT INTO laenderwertung VALUES ('24','2');
INSERT INTO laenderwertung VALUES ('25','1');



# ----------------------------------------------------------
#
# structur for Table 'laenderwertung_64'
#
CREATE TABLE laenderwertung_64 (
    Ver_Lan_Sta text,
    Lw_Punkte float(11,1),
    Lw_Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'laenderwertung_66'
#
CREATE TABLE laenderwertung_66 (
    Ver_Lan_Sta text,
    Lw_Punkte float(11,1),
    Lw_Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'laenderwertung_67'
#
CREATE TABLE laenderwertung_67 (
    Ver_Lan_Sta text,
    Lw_Punkte float(11,1),
    Lw_Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'mannschaften_64'
#
CREATE TABLE mannschaften_64 (
    IdVerein int(11),
    Anzahl_M int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'mannschaften_66'
#
CREATE TABLE mannschaften_66 (
    IdVerein int(11),
    Anzahl_M int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'mannschaften_67'
#
CREATE TABLE mannschaften_67 (
    IdVerein int(11),
    Anzahl_M int(11)
);
# ----------------------------------------------------------
#
INSERT INTO mannschaften_67 VALUES ('-59',NULL);
INSERT INTO mannschaften_67 VALUES ('-60',NULL);
INSERT INTO mannschaften_67 VALUES ('-88',NULL);
INSERT INTO mannschaften_67 VALUES ('81',NULL);
INSERT INTO mannschaften_67 VALUES ('-2',NULL);
INSERT INTO mannschaften_67 VALUES ('36',NULL);



# ----------------------------------------------------------
#
# structur for Table 'master_pw'
#
CREATE TABLE master_pw (
    Id int(11) NOT NULL,
    Master_PW tinytext NOT NULL
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'relativtabzug'
#
CREATE TABLE relativtabzug (
    Gewicht int(11) NOT NULL,
    Maenner double(11,1) NOT NULL,
    Frauen double(11,1) NOT NULL,
  PRIMARY KEY (Gewicht)
);
# ----------------------------------------------------------
#
INSERT INTO relativtabzug VALUES ('31','22.5','12.5');
INSERT INTO relativtabzug VALUES ('32','23.0','12.5');
INSERT INTO relativtabzug VALUES ('33','23.5','12.5');
INSERT INTO relativtabzug VALUES ('34','24.0','12.5');
INSERT INTO relativtabzug VALUES ('35','24.5','12.5');
INSERT INTO relativtabzug VALUES ('36','25.0','12.5');
INSERT INTO relativtabzug VALUES ('37','25.5','12.5');
INSERT INTO relativtabzug VALUES ('38','26.0','12.5');
INSERT INTO relativtabzug VALUES ('39','26.5','12.5');
INSERT INTO relativtabzug VALUES ('40','27.0','12.5');
INSERT INTO relativtabzug VALUES ('41','27.5','13.0');
INSERT INTO relativtabzug VALUES ('42','28.0','13.0');
INSERT INTO relativtabzug VALUES ('43','28.5','13.5');
INSERT INTO relativtabzug VALUES ('44','29.0','13.5');
INSERT INTO relativtabzug VALUES ('45','29.5','14.0');
INSERT INTO relativtabzug VALUES ('46','30.0','14.0');
INSERT INTO relativtabzug VALUES ('47','30.5','14.5');
INSERT INTO relativtabzug VALUES ('48','31.0','15.0');
INSERT INTO relativtabzug VALUES ('49','32.0','15.5');
INSERT INTO relativtabzug VALUES ('50','34.5','16.0');
INSERT INTO relativtabzug VALUES ('51','35.0','16.5');
INSERT INTO relativtabzug VALUES ('52','36.0','17.0');
INSERT INTO relativtabzug VALUES ('53','37.0','17.5');
INSERT INTO relativtabzug VALUES ('54','38.5','18.5');
INSERT INTO relativtabzug VALUES ('55','40.0','19.5');
INSERT INTO relativtabzug VALUES ('56','42.0','20.5');
INSERT INTO relativtabzug VALUES ('57','44.0','21.5');
INSERT INTO relativtabzug VALUES ('58','46.0','22.5');
INSERT INTO relativtabzug VALUES ('59','48.0','23.5');
INSERT INTO relativtabzug VALUES ('60','50.0','25.0');
INSERT INTO relativtabzug VALUES ('61','52.0','26.5');
INSERT INTO relativtabzug VALUES ('62','54.0','27.5');
INSERT INTO relativtabzug VALUES ('63','56.0','28.5');
INSERT INTO relativtabzug VALUES ('64','57.5','29.5');
INSERT INTO relativtabzug VALUES ('65','59.0','31.0');
INSERT INTO relativtabzug VALUES ('66','60.5','32.0');
INSERT INTO relativtabzug VALUES ('67','62.0','33.0');
INSERT INTO relativtabzug VALUES ('68','63.5','34.0');
INSERT INTO relativtabzug VALUES ('69','65.0','35.0');
INSERT INTO relativtabzug VALUES ('70','66.5','36.0');
INSERT INTO relativtabzug VALUES ('71','68.0','37.0');
INSERT INTO relativtabzug VALUES ('72','69.5','38.0');
INSERT INTO relativtabzug VALUES ('73','70.5','39.0');
INSERT INTO relativtabzug VALUES ('74','71.5','40.0');
INSERT INTO relativtabzug VALUES ('75','72.5','40.0');
INSERT INTO relativtabzug VALUES ('76','74.0','40.5');
INSERT INTO relativtabzug VALUES ('77','75.5','41.0');
INSERT INTO relativtabzug VALUES ('78','77.0','41.5');
INSERT INTO relativtabzug VALUES ('79','78.0','42.0');
INSERT INTO relativtabzug VALUES ('80','0.0','42.5');
INSERT INTO relativtabzug VALUES ('81','0.0','43.0');
INSERT INTO relativtabzug VALUES ('82','0.0','43.5');
INSERT INTO relativtabzug VALUES ('83','0.0','44.0');
INSERT INTO relativtabzug VALUES ('84','0.0','44.5');
INSERT INTO relativtabzug VALUES ('85','0.0','44.5');
INSERT INTO relativtabzug VALUES ('86','0.0','45.0');
INSERT INTO relativtabzug VALUES ('87','0.0','45.5');
INSERT INTO relativtabzug VALUES ('88','0.0','46.0');
INSERT INTO relativtabzug VALUES ('89','0.0','46.0');
INSERT INTO relativtabzug VALUES ('90','0.0','46.5');
INSERT INTO relativtabzug VALUES ('91','0.0','47.0');
INSERT INTO relativtabzug VALUES ('92','0.0','47.5');
INSERT INTO relativtabzug VALUES ('93','0.0','47.5');
INSERT INTO relativtabzug VALUES ('94','0.0','48.0');
INSERT INTO relativtabzug VALUES ('95','0.0','48.5');
INSERT INTO relativtabzug VALUES ('96','95.5','48.5');
INSERT INTO relativtabzug VALUES ('97','96.0','49.0');
INSERT INTO relativtabzug VALUES ('98','96.5','49.5');
INSERT INTO relativtabzug VALUES ('99','97.0','49.5');
INSERT INTO relativtabzug VALUES ('100','97.5','50.0');
INSERT INTO relativtabzug VALUES ('101','98.5','50.5');
INSERT INTO relativtabzug VALUES ('102','99.5','50.5');
INSERT INTO relativtabzug VALUES ('103','100.5','51.0');
INSERT INTO relativtabzug VALUES ('104','101.0','51.0');
INSERT INTO relativtabzug VALUES ('105','102.0','51.5');
INSERT INTO relativtabzug VALUES ('106','103.0','51.5');
INSERT INTO relativtabzug VALUES ('107','103.5','52.0');
INSERT INTO relativtabzug VALUES ('108','103.5','52.0');
INSERT INTO relativtabzug VALUES ('109','104.0','52.5');
INSERT INTO relativtabzug VALUES ('110','104.0','52.5');
INSERT INTO relativtabzug VALUES ('111','104.0','53.0');
INSERT INTO relativtabzug VALUES ('112','104.5','53.0');
INSERT INTO relativtabzug VALUES ('113','104.5','53.5');
INSERT INTO relativtabzug VALUES ('114','105.0','53.5');
INSERT INTO relativtabzug VALUES ('115','105.0','54.0');
INSERT INTO relativtabzug VALUES ('116','105.5','54.0');
INSERT INTO relativtabzug VALUES ('117','106.0','54.5');
INSERT INTO relativtabzug VALUES ('118','106.5','54.5');
INSERT INTO relativtabzug VALUES ('119','107.0','55.0');
INSERT INTO relativtabzug VALUES ('120','107.5','55.0');
INSERT INTO relativtabzug VALUES ('121','108.0','55.5');
INSERT INTO relativtabzug VALUES ('122','108.5','55.5');
INSERT INTO relativtabzug VALUES ('123','109.0','56.0');
INSERT INTO relativtabzug VALUES ('124','109.5','56.0');
INSERT INTO relativtabzug VALUES ('125','110.0','56.5');
INSERT INTO relativtabzug VALUES ('126','110.5','56.5');
INSERT INTO relativtabzug VALUES ('127','111.0','57.0');
INSERT INTO relativtabzug VALUES ('128','111.5','57.0');
INSERT INTO relativtabzug VALUES ('129','112.0','57.5');
INSERT INTO relativtabzug VALUES ('130','112.5','57.5');
INSERT INTO relativtabzug VALUES ('131','113.0','58.0');
INSERT INTO relativtabzug VALUES ('132','113.5','58.0');
INSERT INTO relativtabzug VALUES ('133','114.0','58.5');
INSERT INTO relativtabzug VALUES ('134','114.5','58.5');
INSERT INTO relativtabzug VALUES ('135','115.0','59.0');
INSERT INTO relativtabzug VALUES ('136','115.5','59.0');
INSERT INTO relativtabzug VALUES ('137','116.0','59.5');
INSERT INTO relativtabzug VALUES ('138','116.5','59.5');
INSERT INTO relativtabzug VALUES ('139','117.0','60.0');
INSERT INTO relativtabzug VALUES ('140','117.5','60.0');
INSERT INTO relativtabzug VALUES ('141','118.0','60.5');
INSERT INTO relativtabzug VALUES ('142','118.5','60.5');
INSERT INTO relativtabzug VALUES ('143','119.0','61.0');
INSERT INTO relativtabzug VALUES ('144','119.5','61.0');
INSERT INTO relativtabzug VALUES ('145','120.0','61.5');
INSERT INTO relativtabzug VALUES ('146','120.5','61.5');
INSERT INTO relativtabzug VALUES ('147','121.0','62.0');
INSERT INTO relativtabzug VALUES ('148','121.5','62.0');
INSERT INTO relativtabzug VALUES ('149','122.0','62.5');
INSERT INTO relativtabzug VALUES ('150','122.5','62.5');
INSERT INTO relativtabzug VALUES ('151','123.0','63.0');
INSERT INTO relativtabzug VALUES ('152','123.5','63.0');
INSERT INTO relativtabzug VALUES ('153','124.0','63.5');
INSERT INTO relativtabzug VALUES ('154','124.5','63.5');
INSERT INTO relativtabzug VALUES ('155','125.0','64.0');
INSERT INTO relativtabzug VALUES ('156','125.5','64.0');
INSERT INTO relativtabzug VALUES ('157','126.0','64.5');
INSERT INTO relativtabzug VALUES ('158','126.5','64.5');
INSERT INTO relativtabzug VALUES ('159','127.0','65.0');
INSERT INTO relativtabzug VALUES ('160','127.5','65.0');



# ----------------------------------------------------------
#
# structur for Table 'sinclair_alterstabellle'
#
CREATE TABLE sinclair_alterstabellle (
    Age int(11) NOT NULL,
    Al_Sin_Werte float(11,3) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO sinclair_alterstabellle VALUES ('30','1.000');
INSERT INTO sinclair_alterstabellle VALUES ('31','1.016');
INSERT INTO sinclair_alterstabellle VALUES ('32','1.031');
INSERT INTO sinclair_alterstabellle VALUES ('33','1.046');
INSERT INTO sinclair_alterstabellle VALUES ('34','1.059');
INSERT INTO sinclair_alterstabellle VALUES ('35','1.072');
INSERT INTO sinclair_alterstabellle VALUES ('36','1.083');
INSERT INTO sinclair_alterstabellle VALUES ('37','1.096');
INSERT INTO sinclair_alterstabellle VALUES ('38','1.109');
INSERT INTO sinclair_alterstabellle VALUES ('39','1.122');
INSERT INTO sinclair_alterstabellle VALUES ('40','1.135');
INSERT INTO sinclair_alterstabellle VALUES ('41','1.149');
INSERT INTO sinclair_alterstabellle VALUES ('42','1.162');
INSERT INTO sinclair_alterstabellle VALUES ('43','1.176');
INSERT INTO sinclair_alterstabellle VALUES ('44','1.189');
INSERT INTO sinclair_alterstabellle VALUES ('45','1.203');
INSERT INTO sinclair_alterstabellle VALUES ('46','1.218');
INSERT INTO sinclair_alterstabellle VALUES ('47','1.233');
INSERT INTO sinclair_alterstabellle VALUES ('48','1.248');
INSERT INTO sinclair_alterstabellle VALUES ('49','1.263');
INSERT INTO sinclair_alterstabellle VALUES ('50','1.279');
INSERT INTO sinclair_alterstabellle VALUES ('51','1.297');
INSERT INTO sinclair_alterstabellle VALUES ('52','1.316');
INSERT INTO sinclair_alterstabellle VALUES ('53','1.338');
INSERT INTO sinclair_alterstabellle VALUES ('54','1.361');
INSERT INTO sinclair_alterstabellle VALUES ('55','1.385');
INSERT INTO sinclair_alterstabellle VALUES ('56','1.411');
INSERT INTO sinclair_alterstabellle VALUES ('57','1.437');
INSERT INTO sinclair_alterstabellle VALUES ('58','1.462');
INSERT INTO sinclair_alterstabellle VALUES ('59','1.488');
INSERT INTO sinclair_alterstabellle VALUES ('60','1.514');
INSERT INTO sinclair_alterstabellle VALUES ('61','1.541');
INSERT INTO sinclair_alterstabellle VALUES ('62','1.568');
INSERT INTO sinclair_alterstabellle VALUES ('63','1.598');
INSERT INTO sinclair_alterstabellle VALUES ('64','1.629');
INSERT INTO sinclair_alterstabellle VALUES ('65','1.663');
INSERT INTO sinclair_alterstabellle VALUES ('66','1.699');
INSERT INTO sinclair_alterstabellle VALUES ('67','1.738');
INSERT INTO sinclair_alterstabellle VALUES ('68','1.779');
INSERT INTO sinclair_alterstabellle VALUES ('69','1.823');
INSERT INTO sinclair_alterstabellle VALUES ('70','1.867');
INSERT INTO sinclair_alterstabellle VALUES ('71','1.910');
INSERT INTO sinclair_alterstabellle VALUES ('72','1.953');
INSERT INTO sinclair_alterstabellle VALUES ('73','2.004');
INSERT INTO sinclair_alterstabellle VALUES ('74','2.060');
INSERT INTO sinclair_alterstabellle VALUES ('75','2.117');
INSERT INTO sinclair_alterstabellle VALUES ('76','2.181');
INSERT INTO sinclair_alterstabellle VALUES ('77','2.255');
INSERT INTO sinclair_alterstabellle VALUES ('78','2.336');
INSERT INTO sinclair_alterstabellle VALUES ('79','2.419');
INSERT INTO sinclair_alterstabellle VALUES ('80','2.504');
INSERT INTO sinclair_alterstabellle VALUES ('81','2.597');
INSERT INTO sinclair_alterstabellle VALUES ('82','2.702');
INSERT INTO sinclair_alterstabellle VALUES ('83','2.831');
INSERT INTO sinclair_alterstabellle VALUES ('84','2.981');
INSERT INTO sinclair_alterstabellle VALUES ('85','3.153');
INSERT INTO sinclair_alterstabellle VALUES ('86','3.352');
INSERT INTO sinclair_alterstabellle VALUES ('87','3.580');
INSERT INTO sinclair_alterstabellle VALUES ('88','3.843');
INSERT INTO sinclair_alterstabellle VALUES ('89','4.145');
INSERT INTO sinclair_alterstabellle VALUES ('90','4.493');



# ----------------------------------------------------------
#
# structur for Table 'sinclair_faktoren'
#
CREATE TABLE sinclair_faktoren (
    Id int(11) NOT NULL,
    Sin_Koef_M double(15,10) NOT NULL,
    Sin_Koef_W double(15,10) NOT NULL,
    Sin_Gew_M double(11,3) NOT NULL,
    Sin_Gew_W double(11,3) NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO sinclair_faktoren VALUES ('1','0.7519450300','0.7834974760','175.508','153.655');



# ----------------------------------------------------------
#
# structur for Table 'staaten'
#
CREATE TABLE staaten (
    IdStaat int(11) NOT NULL,
    Staat text NOT NULL,
    FlaggenFormat text NOT NULL,
  PRIMARY KEY (IdStaat)
);
# ----------------------------------------------------------
#
INSERT INTO staaten VALUES ('0','---','');
INSERT INTO staaten VALUES ('1','Ger','jpg');
INSERT INTO staaten VALUES ('2','Fra','');
INSERT INTO staaten VALUES ('3','','');
INSERT INTO staaten VALUES ('4','','');
INSERT INTO staaten VALUES ('5','','');
INSERT INTO staaten VALUES ('6','','');
INSERT INTO staaten VALUES ('7','','');
INSERT INTO staaten VALUES ('9','','');



# ----------------------------------------------------------
#
# structur for Table 'stammdaten_wk_64'
#
CREATE TABLE stammdaten_wk_64 (
    Heber_pro_M int(11),
    min_heber_pro_mann int(11),
    Meisterschaft tinytext,
    Ort tinytext,
    Datum tinytext,
    Wk_Art tinytext,
    V_Faktor float(11,2),
    Pendellauf int(11),
    Sprint int(11),
    Differenzsprung int(11),
    Differenzsprung2 int(11),
    DifferenzsprungEmatte int(11),
    Schlussdreisprung int(11),
    Schockwurf int(11),
    Anristen int(11),
    Klimmziehen int(11),
    Zug int(11),
    Bankdruecken int(11),
    Liegestuetz int(11),
    Beugestuetz int(11),
    Sternlauf int(11),
    Laenderwertung int(11),
    Kampfrichter int(11),
    Gerd int(11),
    Pokal int(11),
    Gruppenteiler int(11),
    Urkunden_höhe int(11),
    Anzahl_Heber_p_S int(11),
    Flagge int(11),
    International int(11),
    passwort tinytext,
    GesGrpAlKl tinytext,
    LosNummern int(11),
    Zeitnehmer int(11),
    HHP_Hardware int(11),
    Mannschaft_Auswahl int(11),
    UrkName1 tinytext,
    UrkName2 tinytext,
    UrkName3 tinytext,
    UrkName4 tinytext,
    Online_Wk int(11),
    Online_Id_Wk varchar(32)
);
# ----------------------------------------------------------
#
INSERT INTO stammdaten_wk_64 VALUES ('4','4','','','','M_o_T','0.50','1','0','0',NULL,'0','0','0','0','0','0','1','0','1','1','1','1','0','0','12','14','25','0','0',NULL,'Aktive','1','0','0','0',NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'stammdaten_wk_66'
#
CREATE TABLE stammdaten_wk_66 (
    Heber_pro_M int(11),
    min_heber_pro_mann int(11),
    Meisterschaft tinytext,
    Ort tinytext,
    Datum tinytext,
    Wk_Art tinytext,
    V_Faktor float(11,2),
    Pendellauf int(11),
    Sprint int(11),
    Differenzsprung int(11),
    Differenzsprung2 int(11),
    DifferenzsprungEmatte int(11),
    Schlussdreisprung int(11),
    Schockwurf int(11),
    Anristen int(11),
    Klimmziehen int(11),
    Zug int(11),
    Bankdruecken int(11),
    Liegestuetz int(11),
    Beugestuetz int(11),
    Sternlauf int(11),
    Laenderwertung int(11),
    Kampfrichter int(11),
    Gerd int(11),
    Pokal int(11),
    Gruppenteiler int(11),
    Urkunden_höhe int(11),
    Anzahl_Heber_p_S int(11),
    Flagge int(11),
    International int(11),
    passwort tinytext,
    GesGrpAlKl tinytext,
    LosNummern int(11),
    Zeitnehmer int(11),
    HHP_Hardware int(11),
    Mannschaft_Auswahl int(11),
    UrkName1 tinytext,
    UrkName2 tinytext,
    UrkName3 tinytext,
    UrkName4 tinytext,
    Online_Wk int(11),
    Online_Id_Wk varchar(32)
);
# ----------------------------------------------------------
#
INSERT INTO stammdaten_wk_66 VALUES ('4','4','','','','M_m_T','0.50','1','0','0',NULL,'0','0','0','0','0','0','1','0','1','1','1','1','0','0','12','14','25','0','0',NULL,'Aktive','1','0','0','0',NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'stammdaten_wk_67'
#
CREATE TABLE stammdaten_wk_67 (
    Heber_pro_M int(11),
    min_heber_pro_mann int(11),
    Meisterschaft tinytext,
    Ort tinytext,
    Datum tinytext,
    Wk_Art tinytext,
    V_Faktor float(11,2),
    Laenderwertung int(11),
    Kampfrichter int(11),
    Gerd int(11),
    Pokal int(11),
    Gruppenteiler int(11),
    Urkunden_höhe int(11),
    Anzahl_Heber_p_S int(11),
    Masters int(11),
    EineKlasse int(11),
    Flagge int(11),
    International int(11),
    passwort tinytext,
    Mannschaft_Auswahl int(11),
    GesGrpAlKl tinytext,
    LosNummern int(11),
    Rel_Sin_AlKl int(11),
    Hauptauswertung int(11),
    Zeitnehmer int(11),
    HHP_Hardware int(11),
    Grp_Einteilung int(11),
    DM int(11),
    MitNorm int(11),
    NormAlKl tinytext,
    UrkName1 tinytext,
    UrkName2 tinytext,
    UrkName3 tinytext,
    UrkName4 tinytext,
    Online_Wk int(11),
    Online_Id_Wk varchar(32)
);
# ----------------------------------------------------------
#
INSERT INTO stammdaten_wk_67 VALUES ('4','4','asdasdasdasdasdas','','','ZK','0.00','1','1','0','0','0','14','25','0','0','0','0',NULL,'0','','1','0','0','0','0','0','0','0','Aktive',NULL,NULL,NULL,NULL,'0',NULL);



# ----------------------------------------------------------
#
# structur for Table 'startgebühren_64'
#
CREATE TABLE startgebühren_64 (
    E_Erw float(11,2),
    M_Erw float(11,2),
    Nach_Meldung_Euro float(11,2)
);
# ----------------------------------------------------------
#
INSERT INTO startgebühren_64 VALUES ('0.00','0.00',NULL);



# ----------------------------------------------------------
#
# structur for Table 'startgebühren_66'
#
CREATE TABLE startgebühren_66 (
    E_Erw float(11,2),
    M_Erw float(11,2),
    Nach_Meldung_Euro float(11,2)
);
# ----------------------------------------------------------
#
INSERT INTO startgebühren_66 VALUES ('0.00','0.00',NULL);



# ----------------------------------------------------------
#
# structur for Table 'startgebühren_67'
#
CREATE TABLE startgebühren_67 (
    E_Erw float(11,2),
    M_Erw float(11,2),
    Nach_Meldung_Euro float(11,2)
);
# ----------------------------------------------------------
#
INSERT INTO startgebühren_67 VALUES ('0.00','0.00',NULL);



# ----------------------------------------------------------
#
# structur for Table 'tmp_anzeige_1'
#
CREATE TABLE tmp_anzeige_1 (
    Anweisung int(11) NOT NULL,
  PRIMARY KEY (Anweisung)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_anzeige_1 VALUES ('1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_anzeige_2'
#
CREATE TABLE tmp_anzeige_2 (
    Anweisung int(11) NOT NULL,
  PRIMARY KEY (Anweisung)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_anzeige_2 VALUES ('0');



# ----------------------------------------------------------
#
# structur for Table 'tmp_anzeige_wk_1'
#
CREATE TABLE tmp_anzeige_wk_1 (
    Wk_Nummer int(11) NOT NULL,
  PRIMARY KEY (Wk_Nummer)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_anzeige_wk_1 VALUES ('45');



# ----------------------------------------------------------
#
# structur for Table 'tmp_anzeige_wk_2'
#
CREATE TABLE tmp_anzeige_wk_2 (
    Wk_Nummer int(11) NOT NULL,
  PRIMARY KEY (Wk_Nummer)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_anzeige_wk_2 VALUES ('1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_db'
#
CREATE TABLE tmp_db (
    S_Db text NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO tmp_db VALUES ('67');



# ----------------------------------------------------------
#
# structur for Table 'tmp_gerd_1'
#
CREATE TABLE tmp_gerd_1 (
    IdHeber int(11) NOT NULL,
    Art text NOT NULL,
    HGw int(11) NOT NULL,
    V int(11) NOT NULL,
    Name text NOT NULL,
    Vorname text NOT NULL,
    Verein text NOT NULL,
    Kgw double(11,2) NOT NULL,
    Klasse int(11) NOT NULL,
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_gerd_1 VALUES ('-1','Stoßen','-1','-1','','','','0.00','0');



# ----------------------------------------------------------
#
# structur for Table 'tmp_gerd_2'
#
CREATE TABLE tmp_gerd_2 (
    IdHeber int(11) NOT NULL,
    Art text NOT NULL,
    HGw int(11) NOT NULL,
    V int(11) NOT NULL,
    Name text NOT NULL,
    Vorname text NOT NULL,
    Verein text NOT NULL,
    Kgw double(11,2) NOT NULL,
    Klasse int(11) NOT NULL,
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_gerd_2 VALUES ('337','Reißen','50','2','aaaa','','aaaaaa','78.00','-100');



# ----------------------------------------------------------
#
# structur for Table 'tmp_hardware_1'
#
CREATE TABLE tmp_hardware_1 (
    Id int(11) NOT NULL,
    Anweisung int(11) NOT NULL,
    Zeit int(11) NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_hardware_1 VALUES ('1','1','60');



# ----------------------------------------------------------
#
# structur for Table 'tmp_hardware_2'
#
CREATE TABLE tmp_hardware_2 (
    Id int(11) NOT NULL,
    Anweisung int(11) NOT NULL,
    Zeit int(11) NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_hardware_2 VALUES ('1','0','60');



# ----------------------------------------------------------
#
# structur for Table 'tmp_heber_speichern_1'
#
CREATE TABLE tmp_heber_speichern_1 (
    Id int(11) NOT NULL,
    IdHeber int(11) NOT NULL,
    Versuch int(11) NOT NULL,
    G1 text NOT NULL,
    G2 text NOT NULL,
    G3 text NOT NULL,
    Time1 int(11) NOT NULL,
    Time2 int(11) NOT NULL,
    Time3 int(11) NOT NULL,
    Technik1 float(11,2) NOT NULL,
    Technik2 float(11,2) NOT NULL,
    Technik3 float(11,2) NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_heber_speichern_1 VALUES ('1','-1','-1','Ja','Nein','Ja','1526227436','1526227435','1526227435','0.00','0.00','0.00');



# ----------------------------------------------------------
#
# structur for Table 'tmp_heber_speichern_2'
#
CREATE TABLE tmp_heber_speichern_2 (
    Id int(11) NOT NULL,
    IdHeber int(11) NOT NULL,
    Versuch int(11) NOT NULL,
    G1 text NOT NULL,
    G2 text NOT NULL,
    G3 text NOT NULL,
    Time1 int(11) NOT NULL,
    Time2 int(11) NOT NULL,
    Time3 int(11) NOT NULL,
    Technik1 float(11,2) NOT NULL,
    Technik2 float(11,2) NOT NULL,
    Technik3 float(11,2) NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_heber_speichern_2 VALUES ('1','0','0','','','','0','0','0','0.00','0.00','0.00');



# ----------------------------------------------------------
#
# structur for Table 'tmp_jury_status_1'
#
CREATE TABLE tmp_jury_status_1 (
    Id int(11) NOT NULL,
    Anzeige int(11) NOT NULL,
    Sprecher int(11) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO tmp_jury_status_1 VALUES ('1','0','0');



# ----------------------------------------------------------
#
# structur for Table 'tmp_jury_status_2'
#
CREATE TABLE tmp_jury_status_2 (
    Id int(11) NOT NULL,
    Anzeige int(11) NOT NULL,
    Sprecher int(11) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO tmp_jury_status_2 VALUES ('1','0','0');



# ----------------------------------------------------------
#
# structur for Table 'tmp_kr_check_1'
#
CREATE TABLE tmp_kr_check_1 (
    ID int(11) NOT NULL,
    K1 int(11) NOT NULL,
    K2 int(11) NOT NULL,
    K3 int(11) NOT NULL,
    Re1 int(11) NOT NULL,
    Re2 int(11) NOT NULL,
    Re3 int(11) NOT NULL,
    ReAnzeige int(11) NOT NULL,
  PRIMARY KEY (ID)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_kr_check_1 VALUES ('1','0','0','0','1','1','1','2');



# ----------------------------------------------------------
#
# structur for Table 'tmp_kr_check_2'
#
CREATE TABLE tmp_kr_check_2 (
    Id int(11) NOT NULL,
    K1 int(11) NOT NULL,
    K2 int(11) NOT NULL,
    K3 int(11) NOT NULL,
    Re1 int(11) NOT NULL,
    Re2 int(11) NOT NULL,
    Re3 int(11) NOT NULL,
    ReAnzeige int(11) NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_kr_check_2 VALUES ('1','0','0','0','0','1','1','2');



# ----------------------------------------------------------
#
# structur for Table 'tmp_letzter_heber_1'
#
CREATE TABLE tmp_letzter_heber_1 (
    IdHeber int(11) NOT NULL,
    Art text NOT NULL,
    V int(11) NOT NULL,
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_letzter_heber_1 VALUES ('342','Stoßen','3');



# ----------------------------------------------------------
#
# structur for Table 'tmp_letzter_heber_2'
#
CREATE TABLE tmp_letzter_heber_2 (
    IdHeber int(11) NOT NULL,
    Art text NOT NULL,
    V int(11) NOT NULL,
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_letzter_heber_2 VALUES ('334','Reißen','1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_reload_1'
#
CREATE TABLE tmp_reload_1 (
    IdHeber int(11) NOT NULL,
    V int(11) NOT NULL,
    HGw int(11) NOT NULL,
    Art text NOT NULL,
    Gruppe int(11) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO tmp_reload_1 VALUES ('0','-1','-1','Stoßen','1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_reload_2'
#
CREATE TABLE tmp_reload_2 (
    IdHeber int(11) NOT NULL,
    V int(11) NOT NULL,
    HGw int(11) NOT NULL,
    Art text NOT NULL,
    Gruppe int(11) NOT NULL,
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_reload_2 VALUES ('337','2','50','Reißen','1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_ss_reload_1'
#
CREATE TABLE tmp_ss_reload_1 (
    AnsagerR int(11) NOT NULL,
    HeberRaumR int(11) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO tmp_ss_reload_1 VALUES ('1','0');



# ----------------------------------------------------------
#
# structur for Table 'tmp_ss_reload_2'
#
CREATE TABLE tmp_ss_reload_2 (
    AnsagerR int(11) NOT NULL,
    HeberRaumR int(11) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO tmp_ss_reload_2 VALUES ('0','0');



# ----------------------------------------------------------
#
# structur for Table 'tmp_uebernaechster_heber_1'
#
CREATE TABLE tmp_uebernaechster_heber_1 (
    IdHeber int(11) NOT NULL,
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_uebernaechster_heber_1 VALUES ('342');



# ----------------------------------------------------------
#
# structur for Table 'tmp_uebernaechster_heber_2'
#
CREATE TABLE tmp_uebernaechster_heber_2 (
    IdHeber int(11) NOT NULL,
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_uebernaechster_heber_2 VALUES ('1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_uebersichtmk_reload'
#
CREATE TABLE tmp_uebersichtmk_reload (
    IdReload int(11) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO tmp_uebersichtmk_reload VALUES ('20');



# ----------------------------------------------------------
#
# structur for Table 'tmp_wk_korrektur_block'
#
CREATE TABLE tmp_wk_korrektur_block (
    Id int(11) NOT NULL,
    Grp_Bridge_1 int(11) NOT NULL,
    Grp_Bridge_2 int(11) NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_wk_korrektur_block VALUES ('1','0','1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_wk_testpokal'
#
CREATE TABLE tmp_wk_testpokal (
    IdHeber int(11) NOT NULL,
    Versuch int(11) NOT NULL,
    Reißen int(11) NOT NULL,
    Stoßen int(11) NOT NULL,
    Technik_Reißen float(11,2) NOT NULL,
    Technik_Stoßen float(11,2) NOT NULL,
    Div_Wert_R int(11) NOT NULL,
    Div_Wert_S int(11) NOT NULL,
    Gueltig_Reißen text NOT NULL,
    Gueltig_Stoßen text NOT NULL,
    time text NOT NULL,
    NH_Reißen int(11) NOT NULL,
    NH_Stoßen int(11) NOT NULL
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'user_blocker_64'
#
CREATE TABLE user_blocker_64 (
    MeldelisteAnlegen int(11),
    GrpEinteilung int(11),
    Wiegeliste int(11),
    WkBridge1 int(11),
    WkBridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO user_blocker_64 VALUES ('1','1','1','0','0');



# ----------------------------------------------------------
#
# structur for Table 'user_blocker_66'
#
CREATE TABLE user_blocker_66 (
    MeldelisteAnlegen int(11),
    GrpEinteilung int(11),
    Wiegeliste int(11),
    WkBridge1 int(11),
    WkBridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO user_blocker_66 VALUES ('1','1','1','0','0');



# ----------------------------------------------------------
#
# structur for Table 'user_blocker_67'
#
CREATE TABLE user_blocker_67 (
    MeldelisteAnlegen int(11),
    GrpEinteilung int(11),
    Wiegeliste int(11),
    WkBridge1 int(11),
    WkBridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO user_blocker_67 VALUES ('1','1','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'verein'
#
CREATE TABLE verein (
    Verein text NOT NULL,
    IdVerein int(11) NOT NULL auto_increment,
    Bundesliga int(11) NOT NULL,
    IdLaender int(11) NOT NULL,
  PRIMARY KEY (IdVerein)
);
# ----------------------------------------------------------
#
INSERT INTO verein VALUES ('AV Groß-Zimmern','-125','1','2');
INSERT INTO verein VALUES ('Testverein 4','-124','1','2');
INSERT INTO verein VALUES ('ESV-Freimann München e.V.','-123','1','2');
INSERT INTO verein VALUES ('Testverein2','-122','1','2');
INSERT INTO verein VALUES ('Testverein','-121','1','2');
INSERT INTO verein VALUES ('KSV 1898 e.V. St. Georgen e. V.','-120','1','2');
INSERT INTO verein VALUES ('Herrnburger Athletenverein 77 e.V. / Karsten Dähli','-119','1','2');
INSERT INTO verein VALUES ('ASV Herbsleben e.V.','-118','1','2');
INSERT INTO verein VALUES ('KSV 1884 Mannheim e.V.','-117','1','2');
INSERT INTO verein VALUES ('Athletik Club Heros Berlin e.V.','-116','1','2');
INSERT INTO verein VALUES ('Turnverein Ettenheim e.V.','-115','1','2');
INSERT INTO verein VALUES ('Freie Turner Blumenthal e. V. ','-114','1','2');
INSERT INTO verein VALUES ('Athletik-Sport-Verein ADLER  e.V.','-113','1','2');
INSERT INTO verein VALUES ('TuS Raubling e. V.','-112','1','2');
INSERT INTO verein VALUES ('GKV Bad Dürrenberg e. V.','-111','1','2');
INSERT INTO verein VALUES ('SV Einheit Altenburg e. V.','-110','1','2');
INSERT INTO verein VALUES ('TSG 1885 Augsburg  e. V.','-109','1','2');
INSERT INTO verein VALUES ('MSV Buna Schkopau e. V.','-108','1','2');
INSERT INTO verein VALUES ('TSG 1861 Kaiserslautern e. V.','-107','1','2');
INSERT INTO verein VALUES ('Eichenauer Sportverein e.V.','-106','1','2');
INSERT INTO verein VALUES ('Scoop e.V. ','-105','1','2');
INSERT INTO verein VALUES ('TSV 1860 Stralsund e. V.','-104','1','2');
INSERT INTO verein VALUES ('SV Athletia Wiesbaden 1892 ','-103','1','2');
INSERT INTO verein VALUES ('ASV 81 Würzburg e. V.','-102','1','2');
INSERT INTO verein VALUES ('KSV Sömmerda 1910 e. V.','-101','1','2');
INSERT INTO verein VALUES ('Kraftsportverein 1905 Worms e.V., 1. Vorsitzender ','-100','1','2');
INSERT INTO verein VALUES ('1. KSV 1896 Durlach e.V.','-99','1','2');
INSERT INTO verein VALUES ('MTV Vater Jahn Peine','-98','1','2');
INSERT INTO verein VALUES ('Athleten Club 1978 e.V. Forst','-97','1','2');
INSERT INTO verein VALUES ('ASV 1860 Neumarkt i.d.OPf. e. V.','-96','1','2');
INSERT INTO verein VALUES ('PSV Blau Gelb Fulda 1934/61 e. V.','-95','1','2');
INSERT INTO verein VALUES ('1. Athletik-Club 1954 Bayreuth e.V.','-94','1','2');
INSERT INTO verein VALUES ('TSG Haßloch e. V.','-93','1','2');
INSERT INTO verein VALUES ('Sportklub Hansa Germania von 1881 Hamburg e. V. co','-92','1','2');
INSERT INTO verein VALUES ('ESV München-Ost e.V.','-91','1','2');
INSERT INTO verein VALUES ('Athleten-Club 09 e.V. Laubenheim e. V.','-90','1','2');
INSERT INTO verein VALUES ('Turnverein Eintracht Diersburg e. V.','-89','1','2');
INSERT INTO verein VALUES ('SV 08 Laufenburg e. V. Abt.Gewichtheben','-88','1','2');
INSERT INTO verein VALUES ('AC 1904/20 e.V. Mainz-Weisenau e.V.','-87','1','2');
INSERT INTO verein VALUES ('Sportverein Freiburg-Haslach 1895 e.V. ','-86','1','2');
INSERT INTO verein VALUES ('1. Athletenclub 1897 Weiden e.V.','-85','1','2');
INSERT INTO verein VALUES ('SV Blau-Gelb Berlin e. V.','-84','1','2');
INSERT INTO verein VALUES ('VfL Sindelfingen e. V.','-83','1','2');
INSERT INTO verein VALUES ('TSV Forstenried e. V.','-82','1','2');
INSERT INTO verein VALUES ('Riesaer Athletikclub 1969 e. V.','-81','1','2');
INSERT INTO verein VALUES ('Turn-Club Hameln von 1880 e.V. ','-80','1','2');
INSERT INTO verein VALUES ('Kraftsportverein 1894/96 Kitzingen e.V.','-79','1','2');
INSERT INTO verein VALUES ('BKSV Hamburg e.V.','-78','1','2');
INSERT INTO verein VALUES ('Sportverein Tungendorf Neumünster von 1911 e.V. ','-77','1','2');
INSERT INTO verein VALUES ('STC Bavaria 20 Landshut e. V.','-76','1','2');
INSERT INTO verein VALUES ('Ohrdrufer Sportverein e. V.','-75','1','2');
INSERT INTO verein VALUES ('Turnverein Feldrennach 1896 e. V.','-74','1','2');
INSERT INTO verein VALUES ('Breitunger Athletik Verein e.V.','-73','1','2');
INSERT INTO verein VALUES ('GV Donaueschingen e.V.','-72','1','2');
INSERT INTO verein VALUES ('VfK Hannover v. 1903 e.V.','-71','1','2');
INSERT INTO verein VALUES ('Obervellmarer- Sport- Club e. V. Kraftsport','-70','1','2');
INSERT INTO verein VALUES ('SV Magstadt 1897 e. V.','-69','1','2');
INSERT INTO verein VALUES ('TV Heppenheim e. V.','-68','1','2');
INSERT INTO verein VALUES ('TSV 1862 Erding - Abt. Gewichtheben e. V.','-67','1','2');
INSERT INTO verein VALUES ('Turnverein 1898 e.V. Elz - Abtl. Gewichtheben','-66','1','2');
INSERT INTO verein VALUES ('Kylltalheber Ehrang 1973 e. V.','-65','1','2');
INSERT INTO verein VALUES ('BSC Kenpokan e.V.','-64','1','2');
INSERT INTO verein VALUES ('TV 1877 Waldhof-Mannheim e. V.','-63','1','2');
INSERT INTO verein VALUES ('TV Schwäbisch Gmünd-Wetzgau 1920 e. V.','-62','1','2');
INSERT INTO verein VALUES ('AC Goliath Mengede e.V.','-61','1','2');
INSERT INTO verein VALUES ('GV Eisenbach 1976 e.V.','-60','1','2');
INSERT INTO verein VALUES ('ASC 1906 Zeilsheim e.V.','-59','1','2');
INSERT INTO verein VALUES ('Fermersleber Sportverein 1895 Magdeburg e.V.','-58','1','2');
INSERT INTO verein VALUES ('Athletikclub Meißen e. V.','-57','1','2');
INSERT INTO verein VALUES ('ATSV Espelkamp','-56','1','2');
INSERT INTO verein VALUES ('TSV Blau-Weiß 65 Schwedt e. V.','-55','1','2');
INSERT INTO verein VALUES ('SV 14/19 Westerholt e. V.','-54','1','2');
INSERT INTO verein VALUES ('ASV 1897 Tuttlingen e.V.','-53','1','2');
INSERT INTO verein VALUES ('SAV Kassel 1993 e. V.','-52','1','2');
INSERT INTO verein VALUES ('ASV 1897 Neu-Ulm e. V.','-51','1','2');
INSERT INTO verein VALUES ('SG Fortschritt Eibau e. V.','-50','1','2');
INSERT INTO verein VALUES ('Fitness und Athletenclub Sangerhausen e. V.','-49','1','2');
INSERT INTO verein VALUES ('VfL Nagold e. V.','-48','1','2');
INSERT INTO verein VALUES ('Dresdner Sportclub 1898 e.V.','-47','1','2');
INSERT INTO verein VALUES ('SV 1883 Schwarza e. V.','-46','1','2');
INSERT INTO verein VALUES ('SV Fellbach 1890 e. V.','-45','1','2');
INSERT INTO verein VALUES ('Turnverein Eichen v. 1888 e.V.','-44','1','2');
INSERT INTO verein VALUES ('SV Empor Berlin e. V.','-43','1','2');
INSERT INTO verein VALUES ('SV 90 Gräfenroda e. V.','-42','1','2');
INSERT INTO verein VALUES ('SSV Samswegen 1884 e. V.','-41','1','2');
INSERT INTO verein VALUES ('SC Lüchow v. 1861 e. V.','-40','1','2');
INSERT INTO verein VALUES ('TSV Ingolstadt-Nord 1897/1913 e. V.','-39','1','2');
INSERT INTO verein VALUES ('Gewichtheber u.  Fitness Club Artern e. V','-38','1','2');
INSERT INTO verein VALUES ('SV - DJK  Kolbermoor e. V.','-37','1','2');
INSERT INTO verein VALUES ('AC 1894 e.V. Neulußheim e.V.','-36','1','2');
INSERT INTO verein VALUES ('ESV Lokomotive Mühlhausen e.V.','-35','1','2');
INSERT INTO verein VALUES ('Gymnastikverein Luckenwalde e.V.','-34','1','2');
INSERT INTO verein VALUES ('Sportverein Flözlingen 1920 e. V.','-33','1','2');
INSERT INTO verein VALUES ('Athleten-Club Suhl e.V.','-32','1','2');
INSERT INTO verein VALUES ('TSV Röthenbach e. V.','-31','1','2');
INSERT INTO verein VALUES ('Hebergemeinschaft Rastatt 1972 e. V.','-30','1','2');
INSERT INTO verein VALUES ('TSV Rettigheim 1902 e.V.','-29','1','2');
INSERT INTO verein VALUES ('AC 1923 Altrip e.V.','-28','1','2');
INSERT INTO verein VALUES ('Athleten - Club 82 Schweinfurt e. V.','-27','1','2');
INSERT INTO verein VALUES ('SG Heidelberg - Kirchheim e. V.','-26','1','2');
INSERT INTO verein VALUES ('Gewichtheber und Aerobic Verein Zittau 04 e. V.','-25','1','2');
INSERT INTO verein VALUES ('SV Bayer Wuppertal e. V.','-24','1','2');
INSERT INTO verein VALUES ('Sportvereinigung Gifhorn von 1912 e.V.','-23','1','2');
INSERT INTO verein VALUES ('Kraftsportverein Essen 1888 e.V.','-22','1','2');
INSERT INTO verein VALUES ('TSV Grün-Weiß Rostock 1895 e. V.','-21','1','2');
INSERT INTO verein VALUES ('Jugendkraft Crawinkel e.V.','-20','1','2');
INSERT INTO verein VALUES ('GSV Eintracht Baunatal e.V.','-19','1','2');
INSERT INTO verein VALUES ('Bielefelder TG v. 1848 e.V.','-18','1','2');
INSERT INTO verein VALUES ('Berliner Turn- und Sportclub e.V.','-17','1','2');
INSERT INTO verein VALUES ('Athletik-Club Potsdam e.V.','-16','1','2');
INSERT INTO verein VALUES ('TSV Waldkirchen e. V.','-15','1','2');
INSERT INTO verein VALUES ('Turn- und Athletenverein Brüel e.V .','-14','1','2');
INSERT INTO verein VALUES ('AC Olympia Schrobenhausen v.1895','-13','1','2');
INSERT INTO verein VALUES ('Sportclub Pforzheim e. V.','-12','1','2');
INSERT INTO verein VALUES ('KSV Grünstadt e. V.','-11','1','2');
INSERT INTO verein VALUES ('ESV München-Neuaubing e. V.','-10','1','2');
INSERT INTO verein VALUES ('Athleten-Club 1892 Mutterstadt e.V.','-9','1','2');
INSERT INTO verein VALUES ('ASV 1901 Ladenburg e.V.','-8','1','2');
INSERT INTO verein VALUES ('KSV 1959 Langen e.V.','-7','1','2');
INSERT INTO verein VALUES ('Athletik Club 1892 Weinheim e. V.','-6','1','2');
INSERT INTO verein VALUES ('SV Germania Obrigheim e. V.','-5','1','2');
INSERT INTO verein VALUES ('Kraft-Sport-Club 07 Schifferstadt e.V.','-4','1','2');
INSERT INTO verein VALUES ('AC Germania St. Ilgen e.V.','-3','1','2');
INSERT INTO verein VALUES ('TSV  Heinsheim e. V.','-2','1','2');
INSERT INTO verein VALUES ('KSV Lörrach','1','1','2');
INSERT INTO verein VALUES ('AV03 Speyer','2','1','12');
INSERT INTO verein VALUES ('1. AC Weiden','3','1','3');
INSERT INTO verein VALUES ('AC Atlas Plauen','4','0','14');
INSERT INTO verein VALUES ('AC 82 Schweinfurt','5','0','3');
INSERT INTO verein VALUES ('AC Meißen','6','0','14');
INSERT INTO verein VALUES ('AC Suhl','7','0','17');
INSERT INTO verein VALUES ('AC Heros Wemmetsweiler ','8','1','2');
INSERT INTO verein VALUES ('ASK Frankfurt/Oder','9','0','5');
INSERT INTO verein VALUES ('ASV Ladenburg','10','0','2');
INSERT INTO verein VALUES ('AC Potsdam','11','0','5');
INSERT INTO verein VALUES ('AC Goliath 20 Mengede','12','0','11');
INSERT INTO verein VALUES ('Berliner TSC','13','0','4');
INSERT INTO verein VALUES ('Breitunger AV','14','0','17');
INSERT INTO verein VALUES ('Chemnitzer AC','15','0','14');
INSERT INTO verein VALUES ('Eichenauer SV','16','0','2');
INSERT INTO verein VALUES ('FAC Sangerhausen','17','0','17');
INSERT INTO verein VALUES ('KSC 07 Schifferstadt','18','0','12');
INSERT INTO verein VALUES ('KSV Grünstadt','19','0','12');
INSERT INTO verein VALUES ('Motor Eberswalde','21','0','5');
INSERT INTO verein VALUES ('ESV München Freimann','22','0','3');
INSERT INTO verein VALUES ('NSAC Görlitz','23','0','14');
INSERT INTO verein VALUES ('Riesaer AC','24','0','14');
INSERT INTO verein VALUES ('SC Lüchow','25','0','10');
INSERT INTO verein VALUES ('SG F. Eibau','26','0','14');
INSERT INTO verein VALUES ('SG Saefkow','27','0','5');
INSERT INTO verein VALUES ('SGV Oberböbingen','28','0','2');
INSERT INTO verein VALUES ('SSV Samswegen1884','29','0','15');
INSERT INTO verein VALUES ('SV 90 Gräfenroda','30','0','17');
INSERT INTO verein VALUES ('SV Empor Berlin','31','0','4');
INSERT INTO verein VALUES ('SV G. Obrigheim','32','0','2');
INSERT INTO verein VALUES ('TB 03 Roding','33','0','3');
INSERT INTO verein VALUES ('TSG Haßloch','34','0','12');
INSERT INTO verein VALUES ('TSG Rodewisch','35','0','14');
INSERT INTO verein VALUES ('TSV B/W Schwedt','36','0','5');
INSERT INTO verein VALUES ('Athletenverein Harburg','37','0','7');
INSERT INTO verein VALUES ('Athletikclub Konstanz ','38','0','2');
INSERT INTO verein VALUES ('VFL Nagold','39','0','2');
INSERT INTO verein VALUES ('ASV 1860 Neumark','40','0','3');
INSERT INTO verein VALUES ('TSV Heinsheim','41','0','2');
INSERT INTO verein VALUES ('KSV Kitzingen','42','0','3');
INSERT INTO verein VALUES ('AC 92 Weinheim','43','0','2');
INSERT INTO verein VALUES ('TSV Waldkirchen','44','0','3');
INSERT INTO verein VALUES ('ASC 06 Zeilsheim','45','0','8');
INSERT INTO verein VALUES ('TUS Raublig','46','0','3');
INSERT INTO verein VALUES ('ASC Boxdorf','47','0','3');
INSERT INTO verein VALUES ('TSV Ingoldstadt-Nord','48','0','3');
INSERT INTO verein VALUES ('AC 1923 Altrip','49','0','12');
INSERT INTO verein VALUES ('KSV Durlach','50','0','2');
INSERT INTO verein VALUES ('SG Jugendkraft Crawinkel','51','0','17');
INSERT INTO verein VALUES ('AC Neulußheim','52','0','2');
INSERT INTO verein VALUES ('KSV Langen','53','0','8');
INSERT INTO verein VALUES ('FTG Pfungstadt','54','0','8');
INSERT INTO verein VALUES ('AC 1892 Mutterstadt','57','0','12');
INSERT INTO verein VALUES ('AC Germania St. Ilgen','58','0','2');
INSERT INTO verein VALUES ('1.AC Bayreuth','64','0','3');
INSERT INTO verein VALUES ('BSC Kenpokan','68','0','10');
INSERT INTO verein VALUES ('ESV München-Neuaubing','69','0','3');
INSERT INTO verein VALUES ('GSV Eintrach Baunatal','70','0','8');
INSERT INTO verein VALUES ('KraftMühle Würzburg','71','0','3');
INSERT INTO verein VALUES ('Kraft-Werk Schwarzach','72','0','2');
INSERT INTO verein VALUES ('GV Eisenbach','73','0','2');
INSERT INTO verein VALUES ('HG Rastatt','75','0','2');
INSERT INTO verein VALUES ('KSV Bavaria Regensburg','76','0','3');
INSERT INTO verein VALUES ('KSV Hostenbach','77','1','2');
INSERT INTO verein VALUES ('MSV Buna Schkobau','78','0','15');
INSERT INTO verein VALUES ('Ohrdrufer Sportverein','79','0','17');
INSERT INTO verein VALUES ('Preetzer TSV','80','0','16');
INSERT INTO verein VALUES ('SV Laufenburg','81','0','2');
INSERT INTO verein VALUES ('SSV 1952 Torgau','82','0','14');
INSERT INTO verein VALUES ('SC Pforzheim','83','0','2');
INSERT INTO verein VALUES ('SV Magstadt','84','0','2');
INSERT INTO verein VALUES ('SV Quitt Ankum 1919','85','0','10');
INSERT INTO verein VALUES ('SV Bayer Wuppertal','86','0','11');
INSERT INTO verein VALUES ('SV - DJK - Kolbermoor','87','0','3');
INSERT INTO verein VALUES ('TSG Augsburg','88','0','3');
INSERT INTO verein VALUES ('TSV Cottbus','89','0','5');
INSERT INTO verein VALUES ('TV 1877 Waldhof','90','0','2');
INSERT INTO verein VALUES ('TV Ettenheim','91','0','2');
INSERT INTO verein VALUES ('VFL Duisburg-Süd','92','0','11');
INSERT INTO verein VALUES ('VFL Sindelfingen','93','0','2');
INSERT INTO verein VALUES ('TV Feldrennach','94','0','2');
INSERT INTO verein VALUES ('Kölner AC','96','0','11');
INSERT INTO verein VALUES ('TV Mengen','97','0','2');
INSERT INTO verein VALUES ('Kein Verein','9000','1','2');
INSERT INTO verein VALUES ('AC Germania Aschaffenburg-Schweinheim','9002','1','2');
INSERT INTO verein VALUES ('KSV 1898 St. Georgen e.V.','9003','0','2');
INSERT INTO verein VALUES ('AV Großzimmern','9004','0','8');


