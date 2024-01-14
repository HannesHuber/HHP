# Daten Backup vom: 15.07.2019 09:31 

# ----------------------------------------------------------
#
# structur for Table 'aa_test'
#
CREATE TABLE aa_test (
    Id int(11) NOT NULL,
    String varchar(20),
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO aa_test VALUES ('1','testtesttest');



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
# structur for Table 'alters_klassen_zk_95'
#
CREATE TABLE alters_klassen_zk_95 (
    Id int(11) NOT NULL,
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk_95 VALUES ('1','0','11','Kinder');
INSERT INTO alters_klassen_zk_95 VALUES ('2','12','14','Schüler');
INSERT INTO alters_klassen_zk_95 VALUES ('3','15','17','Jugend');
INSERT INTO alters_klassen_zk_95 VALUES ('4','18','20','Junioren');
INSERT INTO alters_klassen_zk_95 VALUES ('5','21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'alters_klassen_zk_96'
#
CREATE TABLE alters_klassen_zk_96 (
    Id int(11) NOT NULL,
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk_96 VALUES ('1','0','11','Kinder');
INSERT INTO alters_klassen_zk_96 VALUES ('2','12','14','Schüler');
INSERT INTO alters_klassen_zk_96 VALUES ('3','15','17','Jugend');
INSERT INTO alters_klassen_zk_96 VALUES ('4','18','20','Junioren');
INSERT INTO alters_klassen_zk_96 VALUES ('5','21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'alters_klassen_zk_97'
#
CREATE TABLE alters_klassen_zk_97 (
    Id int(11) NOT NULL,
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk_97 VALUES ('1','0','11','Kinder');
INSERT INTO alters_klassen_zk_97 VALUES ('2','12','14','Schüler');
INSERT INTO alters_klassen_zk_97 VALUES ('3','15','17','Jugend');
INSERT INTO alters_klassen_zk_97 VALUES ('4','18','20','Junioren');
INSERT INTO alters_klassen_zk_97 VALUES ('5','21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'auswertung_95'
#
CREATE TABLE auswertung_95 (
    IdHeber int(11) NOT NULL,
    Al_Kl tinytext,
    Gw_Kl int(11),
    Gw_Kl_Norm int(11),
    K_Gewicht float(11,2),
    R_Gewicht float(11,1),
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
    Robbi_P float(11,4),
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
    Platz_Norm int(11),
    Platz_Robi int(11) NOT NULL,
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO auswertung_95 VALUES ('1','Aktive','-73',NULL,'70.00','66.5','150','151','152','150','151','152','Ja','Nein','Nein','Ja','','','0','1','1','0','0','0','1562058785','0','0','1562058792','0','0','1562058792','150','150','300','167.0','535.7631',NULL,'395.31','1','1','1','1','1',NULL,NULL,NULL,NULL,NULL,'','0',NULL,NULL,NULL,'1');
INSERT INTO auswertung_95 VALUES ('2','Aktive','-55',NULL,'50.00','34.5','100','101','102','100','101','102','Ja','Ja','Ja','Ja','','','0','0','0','0','0','0','1562063824','1562064119','1562064125','1562064141','0','0','1562064141','102','100','202','133.0','290.7064',NULL,'338.05','1','1','2','2','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2');
INSERT INTO auswertung_95 VALUES ('3','Aktive','-55',NULL,'50.00','34.5','100','101','102','100','101','102','Ja','Ja','Nein','Ja','','','0','0','1','0','0','0','1562063811','1562064117','0','1562064136','0','0','1562064136','101','100','201','132.0','285.9531',NULL,'336.37','2','2','1','3','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3');



# ----------------------------------------------------------
#
# structur for Table 'auswertung_96'
#
CREATE TABLE auswertung_96 (
    IdHeber int(11),
    Al_Kl tinytext,
    Gw_Kl int(11),
    K_Gewicht float(11,2),
    R_Gewicht float(11,1),
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
    Robbi_P float(11,4),
    Sinclair_P float(11,4),
    Sinclair_P_Malone_Meltzer float(11,2),
    Platz_GwKl int(11),
    Platz_R int(11),
    Platz_S int(11),
    Platz_RP int(11),
    Platz_Robi int(11),
    Platz_Sin int(11),
    Platz_Sin_Malone_Meltzer int(11)
);
# ----------------------------------------------------------
#
INSERT INTO auswertung_96 VALUES ('-12','Aktive','-59','57.20','22.5','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'2',NULL);
INSERT INTO auswertung_96 VALUES ('-11','Aktive','-64','60.10','26.5','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL,'1',NULL);
INSERT INTO auswertung_96 VALUES ('-10','Jugend','-67','66.10','62.0','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3',NULL,'1',NULL);
INSERT INTO auswertung_96 VALUES ('-9','Aktive','-109','104.20','102.0','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,'1',NULL);
INSERT INTO auswertung_96 VALUES ('-8','Jugend','-76','74.70','40.0','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5',NULL,'1',NULL);
INSERT INTO auswertung_96 VALUES ('-7','Junioren','-64','64.00','29.5','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'6',NULL,'1',NULL);
INSERT INTO auswertung_96 VALUES ('-6','Junioren','-81','77.20','77.0','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'7',NULL,'1',NULL);
INSERT INTO auswertung_96 VALUES ('-5','Aktive','-67','64.70','59.0','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'8',NULL,'2',NULL);
INSERT INTO auswertung_96 VALUES ('-4','Aktive','-96','94.10','94.1','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'9',NULL,'1',NULL);
INSERT INTO auswertung_96 VALUES ('-3','Jugend','-55','55.00','19.5','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10',NULL,'1',NULL);
INSERT INTO auswertung_96 VALUES ('-2','Aktive','-81','76.50','75.5','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11',NULL,'1',NULL);
INSERT INTO auswertung_96 VALUES ('-1','Junioren','-81','75.90','74.0','0',NULL,NULL,'0',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'12',NULL,'1',NULL);



# ----------------------------------------------------------
#
# structur for Table 'auswertung_97'
#
CREATE TABLE auswertung_97 (
    IdHeber int(11),
    Al_Kl tinytext,
    K_Gewicht float(11,2),
    R_Gewicht float(11,1),
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
    Robbi_P float(11,4),
    Platz_MK int(11),
    Platz_R int(11),
    Platz_S int(11),
    Platz_ZK int(11),
    Platz_Sin int(11),
    Platz_GwKl int(11),
    Platz_RP int(11),
    Platz_Robi int(11),
    Platz_SP int(11),
    Platz_Sin_Malone_Meltzer int(11)
);
# ----------------------------------------------------------
#
INSERT INTO auswertung_97 VALUES ('1','Aktive','70.00','66.5','-73','100','101','102','100','101','102','Ja','Ja','Ja','Ja','Ja','Ja','0','0','0','0','0','0','1563175518','1563175527','1563175537','1563175550','1563175560','1563175570','1563175570','102','102','204','580.64',NULL,'268.81','71.0','148.7920','3','1','1','1',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO auswertung_97 VALUES ('2','Aktive','50.00','34.5','-55','100','101','102','100','101','102','Ja','Ja','Ja','Ja','Ja','Ja','0','0','0','0','0','0','1563175512','1563175522','1563175531','1563175544','1563175554','1563175565','1563175565','102','102','204','736.90',NULL,'341.39','135.0','300.3783','1','2','2','2',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO auswertung_97 VALUES ('3','Aktive','50.00','34.5','-55','100','101','102','100','101','102','Ja','Ja','Ja','Ja','Ja','Ja','0','0','0','0','0','0','1563175514','1563175524','1563175533','1563175546','1563175556','1563175567','1563175567','102','102','204','736.90',NULL,'341.39','135.0','300.3783','2','3','3','3',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO auswertung_97 VALUES ('4','Aktive','110.00','104.0','109','100','101','102','100','101','102','Ja','Ja','Ja','Ja','Ja','Ja','0','0','0','0','0','0','1563175520','1563175529','1563175539','1563175552','1563175563','1563175572','1563175572','102','102','204','423.59',NULL,'219.08','0.0','59.0961','5','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO auswertung_97 VALUES ('5','Aktive','110.00','104.0','109','100','101','102','100','101','102','Ja','Ja','Ja','Ja','Ja','Ja','0','0','0','0','0','0','1563175516','1563175525','1563175535','1563175548','1563175558','1563175568','1563175568','102','102','204','438.59',NULL,'219.08','0.0','59.0961','4','5','5','5',NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'auswertung_laender_mannschaft_90'
#
CREATE TABLE auswertung_laender_mannschaft_90 (
    laender text,
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_laender_mannschaft_91'
#
CREATE TABLE auswertung_laender_mannschaft_91 (
    laender text,
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_laender_mannschaft_97'
#
CREATE TABLE auswertung_laender_mannschaft_97 (
    laender text,
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mannschaft_95'
#
CREATE TABLE auswertung_mannschaft_95 (
    IdVerein text,
    Mannschaft int(11),
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mannschaft_97'
#
CREATE TABLE auswertung_mannschaft_97 (
    IdVerein text,
    Mannschaft int(11),
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mk_97'
#
CREATE TABLE auswertung_mk_97 (
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
INSERT INTO auswertung_mk_97 VALUES ('1','200.00',NULL,NULL,NULL,'180.00','96.43',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO auswertung_mk_97 VALUES ('2','200.00',NULL,NULL,NULL,'180.00','135.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO auswertung_mk_97 VALUES ('3','200.00',NULL,NULL,NULL,'180.00','135.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO auswertung_mk_97 VALUES ('4','190.00',NULL,NULL,NULL,'160.00','61.36',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO auswertung_mk_97 VALUES ('5','200.00',NULL,NULL,NULL,'180.00','61.36',NULL,NULL,NULL,NULL,NULL,NULL,NULL);



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
# structur for Table 'bl_vereins_auswahl_96'
#
CREATE TABLE bl_vereins_auswahl_96 (
    Id int(11),
    Verein1 text,
    Verein2 text,
    Verein3 text,
    R_Pt_V1 float(11,1),
    S_Pt_V1 float(11,1),
    RuS_Pt_V1 float(11,1),
    R_Pt_V2 float(11,1),
    S_Pt_V2 float(11,1),
    RuS_Pt_V2 float(11,1),
    R_Pt_V3 float(11,1),
    S_Pt_V3 float(11,1),
    RuS_Pt_V3 float(11,1),
    Ergebniss_V1 int(11),
    Ergebniss_V2 int(11),
    Ergebniss_V3 int(11),
    V1_Wk1 int(11),
    V2_Wk1 int(11),
    V1_Wk2 int(11),
    V3_Wk2 int(11),
    V2_Wk3 int(11),
    V3_Wk3 int(11),
    Hochrechnung_V1 float(11,1),
    Hochrechnung_V2 float(11,1),
    Hochrechnung_V3 float(11,1)
);
# ----------------------------------------------------------
#
INSERT INTO bl_vereins_auswahl_96 VALUES ('1','-5','-126','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'159.0',NULL);



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
INSERT INTO datenbanken VALUES ('95','test zk');
INSERT INTO datenbanken VALUES ('96','2. BL-A: SV Germania Obrigheim II-AV Speyer II');
INSERT INTO datenbanken VALUES ('97','test mk');



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
    Id int(11),
    Kinder_M int(11),
    Kinder_W int(11),
    Schüler_M int(11),
    Schüler_W int(11),
    Jugend_M int(11),
    Jugend_W int(11),
    Aktive_M int(11),
    Aktive_W int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gewichtsklassen VALUES ('1','25','25','35','35','49','40','55','45');
INSERT INTO gewichtsklassen VALUES ('2','30','30','40','40','55','45','61','49');
INSERT INTO gewichtsklassen VALUES ('3','35','35','45','45','61','49','67','55');
INSERT INTO gewichtsklassen VALUES ('4','40','40','49','49','67','55','73','59');
INSERT INTO gewichtsklassen VALUES ('5','45','45','55','55','73','59','81','64');
INSERT INTO gewichtsklassen VALUES ('6','49','49','61','59','81','64','89','71');
INSERT INTO gewichtsklassen VALUES ('7','55','55','67','64','89','71','96','76');
INSERT INTO gewichtsklassen VALUES ('8','61','59','73','71','96','76','102','81');
INSERT INTO gewichtsklassen VALUES ('9','67','1','81','76','102','81','109','87');
INSERT INTO gewichtsklassen VALUES ('10','1','0','89','1','1','1','1','1');
INSERT INTO gewichtsklassen VALUES ('11','0','0','96','0','0','0','0','0');
INSERT INTO gewichtsklassen VALUES ('12','0','0','1','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'gewichtsklassen_95'
#
CREATE TABLE gewichtsklassen_95 (
    Id int(11),
    Kinder_M int(11),
    Kinder_W int(11),
    Schüler_M int(11),
    Schüler_W int(11),
    Jugend_M int(11),
    Jugend_W int(11),
    Aktive_M int(11),
    Aktive_W int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gewichtsklassen_95 VALUES ('1','25','25','35','35','49','40','55','45');
INSERT INTO gewichtsklassen_95 VALUES ('2','30','30','40','40','55','45','61','49');
INSERT INTO gewichtsklassen_95 VALUES ('3','35','35','45','45','61','49','67','55');
INSERT INTO gewichtsklassen_95 VALUES ('4','40','40','49','49','67','55','73','59');
INSERT INTO gewichtsklassen_95 VALUES ('5','45','45','55','55','73','59','81','64');
INSERT INTO gewichtsklassen_95 VALUES ('6','49','49','61','59','81','64','89','71');
INSERT INTO gewichtsklassen_95 VALUES ('7','55','55','67','64','89','71','96','76');
INSERT INTO gewichtsklassen_95 VALUES ('8','61','59','73','71','96','76','102','81');
INSERT INTO gewichtsklassen_95 VALUES ('9','67','1','81','76','102','81','109','87');
INSERT INTO gewichtsklassen_95 VALUES ('10','1','0','89','1','1','1','1','1');
INSERT INTO gewichtsklassen_95 VALUES ('11','0','0','96','0','0','0','0','0');
INSERT INTO gewichtsklassen_95 VALUES ('12','0','0','1','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'gewichtsklassen_96'
#
CREATE TABLE gewichtsklassen_96 (
    Id int(11),
    Kinder_M int(11),
    Kinder_W int(11),
    Schüler_M int(11),
    Schüler_W int(11),
    Jugend_M int(11),
    Jugend_W int(11),
    Aktive_M int(11),
    Aktive_W int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gewichtsklassen_96 VALUES ('1','25','25','35','35','49','40','55','45');
INSERT INTO gewichtsklassen_96 VALUES ('2','30','30','40','40','55','45','61','49');
INSERT INTO gewichtsklassen_96 VALUES ('3','35','35','45','45','61','49','67','55');
INSERT INTO gewichtsklassen_96 VALUES ('4','40','40','49','49','67','55','73','59');
INSERT INTO gewichtsklassen_96 VALUES ('5','45','45','55','55','73','59','81','64');
INSERT INTO gewichtsklassen_96 VALUES ('6','49','49','61','59','81','64','89','71');
INSERT INTO gewichtsklassen_96 VALUES ('7','55','55','67','64','89','71','96','76');
INSERT INTO gewichtsklassen_96 VALUES ('8','61','59','73','71','96','76','102','81');
INSERT INTO gewichtsklassen_96 VALUES ('9','67','1','81','76','102','81','109','87');
INSERT INTO gewichtsklassen_96 VALUES ('10','1','0','89','1','1','1','1','1');
INSERT INTO gewichtsklassen_96 VALUES ('11','0','0','96','0','0','0','0','0');
INSERT INTO gewichtsklassen_96 VALUES ('12','0','0','1','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'gewichtsklassen_97'
#
CREATE TABLE gewichtsklassen_97 (
    Id int(11),
    Kinder_M int(11),
    Kinder_W int(11),
    Schüler_M int(11),
    Schüler_W int(11),
    Jugend_M int(11),
    Jugend_W int(11),
    Aktive_M int(11),
    Aktive_W int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gewichtsklassen_97 VALUES ('1','25','25','35','35','49','40','55','45');
INSERT INTO gewichtsklassen_97 VALUES ('2','30','30','40','40','55','45','61','49');
INSERT INTO gewichtsklassen_97 VALUES ('3','35','35','45','45','61','49','67','55');
INSERT INTO gewichtsklassen_97 VALUES ('4','40','40','49','49','67','55','73','59');
INSERT INTO gewichtsklassen_97 VALUES ('5','45','45','55','55','73','59','81','64');
INSERT INTO gewichtsklassen_97 VALUES ('6','49','49','61','59','81','64','89','71');
INSERT INTO gewichtsklassen_97 VALUES ('7','55','55','67','64','89','71','96','76');
INSERT INTO gewichtsklassen_97 VALUES ('8','61','59','73','71','96','76','102','81');
INSERT INTO gewichtsklassen_97 VALUES ('9','67','1','81','76','102','81','109','87');
INSERT INTO gewichtsklassen_97 VALUES ('10','1','0','89','1','1','1','1','1');
INSERT INTO gewichtsklassen_97 VALUES ('11','0','0','96','0','0','0','0','0');
INSERT INTO gewichtsklassen_97 VALUES ('12','0','0','1','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'grp_97'
#
CREATE TABLE grp_97 (
    Gruppe_Aus int(11),
    Gruppe int(11)
);
# ----------------------------------------------------------
#
INSERT INTO grp_97 VALUES ('1','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_95'
#
CREATE TABLE gruppen_95 (
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
INSERT INTO gruppen_95 VALUES ('1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_95 VALUES ('2','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_95 VALUES ('3','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_95 VALUES ('4','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_95 VALUES ('5','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_95 VALUES ('6','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_95 VALUES ('7','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_95 VALUES ('8','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_95 VALUES ('9','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_95 VALUES ('10','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_97'
#
CREATE TABLE gruppen_97 (
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
INSERT INTO gruppen_97 VALUES ('1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_97 VALUES ('2','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_97 VALUES ('3','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_97 VALUES ('4','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_97 VALUES ('5','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_97 VALUES ('6','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_97 VALUES ('7','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_97 VALUES ('8','1','1','1','1','1','1','1','1','1','1');



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
# structur for Table 'gruppen_mk_zaehler_97'
#
CREATE TABLE gruppen_mk_zaehler_97 (
    Jahrgang int(11),
    Geschlecht tinytext,
    Anzahl int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_mk_zaehler_97 VALUES ('1990','Männlich','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_zeit_95'
#
CREATE TABLE gruppen_zeit_95 (
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
INSERT INTO gruppen_zeit_95 VALUES ('1','1','3','0000-00-00','00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_95 VALUES ('2','1','0','0000-00-00','00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_95 VALUES ('3','1','0','0000-00-00','00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_95 VALUES ('4','1','0','0000-00-00','00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_95 VALUES ('5','1','0','0000-00-00','00:00','00:00','00:00',NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'gruppen_zeit_96'
#
CREATE TABLE gruppen_zeit_96 (
    Gruppen int(11),
    Bridge int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_zeit_96 VALUES ('1','1');
INSERT INTO gruppen_zeit_96 VALUES ('2','1');
INSERT INTO gruppen_zeit_96 VALUES ('3','1');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_zeit_97'
#
CREATE TABLE gruppen_zeit_97 (
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
INSERT INTO gruppen_zeit_97 VALUES ('1','1','5','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_97 VALUES ('2','1','0','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_97 VALUES ('3','1','0','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_97 VALUES ('4','1','0','0000-00-00','00:00','00:00','00:00','',NULL);
INSERT INTO gruppen_zeit_97 VALUES ('5','1','0','0000-00-00','00:00','00:00','00:00','',NULL);



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
INSERT INTO heber VALUES ('-12','Schilde','Larissa ','-126','1997','57.20','BW','Weiblich','1','','Aktive','-59','1','21490');
INSERT INTO heber VALUES ('-11','Horn','Kathrin','-126','1987','60.10','BW','Weiblich','1','','Aktive','-64','1','21496');
INSERT INTO heber VALUES ('-10','Hinderberger','Tim','-126','2003','66.10','BW','Männlich','1','','Jugend','-67','1','13671');
INSERT INTO heber VALUES ('-9','Jakob','Marcus','-126','1989','104.20','BW','Männlich','1','','Aktive','-109','1','20725');
INSERT INTO heber VALUES ('-8','Keil','Anna-Katharina','-126','2002','74.70','BW','Weiblich','1','','Jugend','-76','1','21559');
INSERT INTO heber VALUES ('-7','Wüst','Carolin Annabell','-126','1999','64.00','BW','Weiblich','1','','Junioren','-64','1','20059');
INSERT INTO heber VALUES ('-6','Hofmann','Ruben','-5','2000','77.20','BW','Männlich','1','','Junioren','-81','1','12885');
INSERT INTO heber VALUES ('-5','Müller','Adrian','-5','1995','64.70','BW','Männlich','1','','Aktive','-67','1','11133');
INSERT INTO heber VALUES ('-4','Zimmermann','Tim','-5','1996','94.10','BW','Männlich','1','','Aktive','-96','1','11979');
INSERT INTO heber VALUES ('-3','Schönsiegel','Celina','-5','2002','55.00','BW','Weiblich','1','','Jugend','-55','1','20987');
INSERT INTO heber VALUES ('-2','Hülser','Philipp','-5','1995','76.50','BW','Männlich','1','','Aktive','-81','1','11432');
INSERT INTO heber VALUES ('-1','Staudt','Yannik','-5','1999','75.90','BW','Männlich','1','','Junioren','-81','1','12358');
INSERT INTO heber VALUES ('1','t1','','-146','1990','70.00','BY','Männlich','1','Auswahl','Aktive','-73','0','');
INSERT INTO heber VALUES ('2','t2','','-146','1990','50.00','BY','Männlich','1','Auswahl','Aktive','-55','0','');
INSERT INTO heber VALUES ('3','t3','','-146','1990','50.00','BY','Männlich','1','Auswahl','Aktive','-55','0','');
INSERT INTO heber VALUES ('4','t4','','-146','1990','110.00','BY','Männlich','1','Auswahl','Aktive','+109','0','');
INSERT INTO heber VALUES ('5','t5','','-146','1990','110.00','BY','Männlich','1','Auswahl','Aktive','+109','0','');
INSERT INTO heber VALUES ('6','test','test','-92','2002','50.00','BW','Männlich','1','','Jugend','-55','0','');
INSERT INTO heber VALUES ('7','öäöüöäöü','üöäö','-146','2002','50.00','BY','Männlich','1','','Jugend','-55','0','');
INSERT INTO heber VALUES ('8','üüüüääääööö','üüüüääääööö','-146','1992','60.00','BY','Männlich','1','','Aktive','-61','0','');



# ----------------------------------------------------------
#
# structur for Table 'heber_95'
#
CREATE TABLE heber_95 (
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
INSERT INTO heber_95 VALUES ('1',NULL,NULL,'1',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_95 VALUES ('2',NULL,NULL,'1',NULL,'3',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_95 VALUES ('3',NULL,NULL,'1',NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_96'
#
CREATE TABLE heber_96 (
    IdHeber int(11),
    Auswahl tinytext,
    Ausserkonkurrenz tinytext,
    Gruppe int(11),
    LosNr int(11),
    R_uo_S int(11),
    Reihenfolge int(11),
    Auslaenderwertung int(11)
);
# ----------------------------------------------------------
#
INSERT INTO heber_96 VALUES ('-1',NULL,NULL,'0','10','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-2',NULL,NULL,'0','11','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-3',NULL,NULL,'0','12','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-4',NULL,NULL,'0','5','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-5',NULL,NULL,'0','6','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-6',NULL,NULL,'0','1','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-7',NULL,NULL,'0','4','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-8',NULL,NULL,'0','3','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-9',NULL,NULL,'0','2','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-10',NULL,NULL,'0','7','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-11',NULL,NULL,'0','8','0',NULL,'0');
INSERT INTO heber_96 VALUES ('-12',NULL,NULL,'1','9','0','1','0');



# ----------------------------------------------------------
#
# structur for Table 'heber_97'
#
CREATE TABLE heber_97 (
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
    Laender_Mannschaft_Auswahl int(11),
    Nach_Meldung int(11)
);
# ----------------------------------------------------------
#
INSERT INTO heber_97 VALUES ('1',NULL,NULL,'1','1','4','8.0','9.0','0.0',NULL,'0.00',NULL,'800','900','700','800','700','900','0','0','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_97 VALUES ('2',NULL,NULL,'1','1','1','11.0','8.0','0.0',NULL,'0.00',NULL,'700','800','900','900','800','700','0','0','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_97 VALUES ('3',NULL,NULL,'1','1','2','8.0','12.0','0.0',NULL,'0.00',NULL,'900','800','700','900','900','800','0','0','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_97 VALUES ('4',NULL,NULL,'1','1','5','11.2','8.5','0.0',NULL,'0.00',NULL,'800','700','800','700','800','900','0','0','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_97 VALUES ('5',NULL,NULL,'1','1','3','8.0','10.0','0.0',NULL,'0.00',NULL,'900','800','700','800','900','700','0','0','0','0','0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_wk_95'
#
CREATE TABLE heber_wk_95 (
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
INSERT INTO heber_wk_95 VALUES ('1','1','150','150',NULL,NULL,'Ja','Ja',NULL,NULL,'1562058785','1562058792','1','1','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_95 VALUES ('1','2','151','151','-1562058785','-1562058792','Nein',NULL,'1',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_95 VALUES ('1','3','152','152',NULL,NULL,'Nein',NULL,'1',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_95 VALUES ('2','1','100','100',NULL,NULL,'Ja','Ja',NULL,NULL,'1562063824','1562064141','1','1','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_95 VALUES ('2','2','101','101','295','-1562064141','Ja',NULL,NULL,NULL,'1562064119',NULL,'1',NULL,'Ja',NULL,'Ja',NULL,'Ja',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_95 VALUES ('2','3','102','102','6',NULL,'Ja',NULL,NULL,NULL,'1562064125',NULL,'1',NULL,'Ja',NULL,'Ja',NULL,'Ja',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_95 VALUES ('3','1','100','100',NULL,NULL,'Ja','Ja',NULL,NULL,'1562063811','1562064136','1','1','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_95 VALUES ('3','2','101','101','306','-1562064136','Ja',NULL,NULL,NULL,'1562064117',NULL,'1',NULL,'Ja',NULL,'Ja',NULL,'Ja',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_95 VALUES ('3','3','102','102','-1562064117',NULL,'Nein',NULL,'1',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_wk_96'
#
CREATE TABLE heber_wk_96 (
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
    time tinytext,
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
INSERT INTO heber_wk_96 VALUES ('-1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-1','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-1','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-2','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-2','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-2','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-3','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-3','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-3','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-4','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-4','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-4','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-5','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-5','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-5','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-6','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-6','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-6','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-7','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-7','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-7','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-8','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-8','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-8','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-9','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-9','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-9','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-10','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-10','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-10','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-11','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-11','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-11','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-12','1','100','100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-12','2','101','101',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_96 VALUES ('-12','3','102','102',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_wk_97'
#
CREATE TABLE heber_wk_97 (
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
INSERT INTO heber_wk_97 VALUES ('1','1','100','100',NULL,NULL,'Ja','Ja',NULL,NULL,NULL,'1','1','1563175518','1563175550','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('1','2','101','101','9','10','Ja','Ja',NULL,NULL,NULL,'1','1','1563175527','1563175560','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('1','3','102','102','10','10','Ja','Ja',NULL,NULL,NULL,'1','1','1563175537','1563175570','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('2','1','100','100',NULL,NULL,'Ja','Ja',NULL,NULL,NULL,'1','1','1563175512','1563175544','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('2','2','101','101','10','10','Ja','Ja',NULL,NULL,NULL,'1','1','1563175522','1563175554','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('2','3','102','102','9','11','Ja','Ja',NULL,NULL,NULL,'1','1','1563175531','1563175565','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('3','1','100','100',NULL,NULL,'Ja','Ja',NULL,NULL,NULL,'1','1','1563175514','1563175546','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('3','2','101','101','10','10','Ja','Ja',NULL,NULL,NULL,'1','1','1563175524','1563175556','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('3','3','102','102','9','11','Ja','Ja',NULL,NULL,NULL,'1','1','1563175533','1563175567','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('4','1','100','100',NULL,NULL,'Ja','Ja',NULL,NULL,NULL,'1','1','1563175520','1563175552','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('4','2','101','101','9','11','Ja','Ja',NULL,NULL,NULL,'1','1','1563175529','1563175563','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('4','3','102','102','10','9','Ja','Ja',NULL,NULL,NULL,'1','1','1563175539','1563175572','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('5','1','100','100',NULL,NULL,'Ja','Ja',NULL,NULL,NULL,'1','1','1563175516','1563175548','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('5','2','101','101','9','10','Ja','Ja',NULL,NULL,NULL,'1','1','1563175525','1563175558','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_97 VALUES ('5','3','102','102','10','10','Ja','Ja',NULL,NULL,NULL,'1','1','1563175535','1563175568','Ja','Ja','Ja','Ja','Ja','Ja',NULL,NULL,NULL,NULL,NULL,NULL);



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
INSERT INTO laender VALUES ('Unb','18','Unbekannt');



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
# structur for Table 'laenderwertung_95'
#
CREATE TABLE laenderwertung_95 (
    Ver_Lan_Sta text,
    Lw_Punkte float(11,1),
    Lw_Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'laenderwertung_97'
#
CREATE TABLE laenderwertung_97 (
    Ver_Lan_Sta text,
    Lw_Punkte float(11,1),
    Lw_Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'mannschaften_95'
#
CREATE TABLE mannschaften_95 (
    IdVerein int(11),
    Anzahl_M int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'mannschaften_97'
#
CREATE TABLE mannschaften_97 (
    IdVerein int(11),
    Anzahl_M int(11)
);
# ----------------------------------------------------------
#



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
INSERT INTO relativtabzug VALUES ('74','71.5','39.5');
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
# structur for Table 'robi_faktor_b'
#
CREATE TABLE robi_faktor_b (
    Id int(11),
    B double
);
# ----------------------------------------------------------
#
INSERT INTO robi_faktor_b VALUES ('1','3.3219281');



# ----------------------------------------------------------
#
# structur for Table 'robi_faktoren_men_aktive'
#
CREATE TABLE robi_faktoren_men_aktive (
    Id int(11),
    GwKl int(11),
    WeltRekord int(11)
);
# ----------------------------------------------------------
#
INSERT INTO robi_faktoren_men_aktive VALUES ('1','55','293');
INSERT INTO robi_faktoren_men_aktive VALUES ('2','61','317');
INSERT INTO robi_faktoren_men_aktive VALUES ('3','67','339');
INSERT INTO robi_faktoren_men_aktive VALUES ('4','73','362');
INSERT INTO robi_faktoren_men_aktive VALUES ('5','81','375');
INSERT INTO robi_faktoren_men_aktive VALUES ('6','89','387');
INSERT INTO robi_faktoren_men_aktive VALUES ('7','96','416');
INSERT INTO robi_faktoren_men_aktive VALUES ('8','102','412');
INSERT INTO robi_faktoren_men_aktive VALUES ('9','109','435');
INSERT INTO robi_faktoren_men_aktive VALUES ('10','1','478');



# ----------------------------------------------------------
#
# structur for Table 'robi_faktoren_men_junioren'
#
CREATE TABLE robi_faktoren_men_junioren (
    Id int(11),
    GwKl int(11),
    WeltRekord int(11)
);
# ----------------------------------------------------------
#
INSERT INTO robi_faktoren_men_junioren VALUES ('1','55','264');
INSERT INTO robi_faktoren_men_junioren VALUES ('2','61','293');
INSERT INTO robi_faktoren_men_junioren VALUES ('3','67','316');
INSERT INTO robi_faktoren_men_junioren VALUES ('4','73','344');
INSERT INTO robi_faktoren_men_junioren VALUES ('5','81','372');
INSERT INTO robi_faktoren_men_junioren VALUES ('6','89','371');
INSERT INTO robi_faktoren_men_junioren VALUES ('7','96','397');
INSERT INTO robi_faktoren_men_junioren VALUES ('8','102','392');
INSERT INTO robi_faktoren_men_junioren VALUES ('9','109','410');
INSERT INTO robi_faktoren_men_junioren VALUES ('10','1','432');



# ----------------------------------------------------------
#
# structur for Table 'robi_faktoren_men_schueler'
#
CREATE TABLE robi_faktoren_men_schueler (
    Id int(11),
    GwKl int(11),
    WeltRekord int(11)
);
# ----------------------------------------------------------
#
INSERT INTO robi_faktoren_men_schueler VALUES ('1','49','220');
INSERT INTO robi_faktoren_men_schueler VALUES ('2','55','248');
INSERT INTO robi_faktoren_men_schueler VALUES ('3','61','263');
INSERT INTO robi_faktoren_men_schueler VALUES ('4','67','297');
INSERT INTO robi_faktoren_men_schueler VALUES ('5','73','306');
INSERT INTO robi_faktoren_men_schueler VALUES ('6','81','327');
INSERT INTO robi_faktoren_men_schueler VALUES ('7','89','342');
INSERT INTO robi_faktoren_men_schueler VALUES ('8','96','350');
INSERT INTO robi_faktoren_men_schueler VALUES ('9','102','353');
INSERT INTO robi_faktoren_men_schueler VALUES ('10','1','352');



# ----------------------------------------------------------
#
# structur for Table 'robi_faktoren_women_aktive'
#
CREATE TABLE robi_faktoren_women_aktive (
    Id int(11),
    GwKl int(11),
    WeltRekord int(11)
);
# ----------------------------------------------------------
#
INSERT INTO robi_faktoren_women_aktive VALUES ('1','45','191');
INSERT INTO robi_faktoren_women_aktive VALUES ('2','49','210');
INSERT INTO robi_faktoren_women_aktive VALUES ('3','55','232');
INSERT INTO robi_faktoren_women_aktive VALUES ('4','59','243');
INSERT INTO robi_faktoren_women_aktive VALUES ('5','64','257');
INSERT INTO robi_faktoren_women_aktive VALUES ('6','71','267');
INSERT INTO robi_faktoren_women_aktive VALUES ('7','76','278');
INSERT INTO robi_faktoren_women_aktive VALUES ('8','81','283');
INSERT INTO robi_faktoren_women_aktive VALUES ('9','87','294');
INSERT INTO robi_faktoren_women_aktive VALUES ('10','1','331');



# ----------------------------------------------------------
#
# structur for Table 'robi_faktoren_women_junioren'
#
CREATE TABLE robi_faktoren_women_junioren (
    Id int(11),
    GwKl int(11),
    WeltRekord int(11)
);
# ----------------------------------------------------------
#
INSERT INTO robi_faktoren_women_junioren VALUES ('1','45','179');
INSERT INTO robi_faktoren_women_junioren VALUES ('2','49','206');
INSERT INTO robi_faktoren_women_junioren VALUES ('3','55','211');
INSERT INTO robi_faktoren_women_junioren VALUES ('4','59','227');
INSERT INTO robi_faktoren_women_junioren VALUES ('5','64','240');
INSERT INTO robi_faktoren_women_junioren VALUES ('6','71','252');
INSERT INTO robi_faktoren_women_junioren VALUES ('7','76','259');
INSERT INTO robi_faktoren_women_junioren VALUES ('8','81','259');
INSERT INTO robi_faktoren_women_junioren VALUES ('9','87','269');
INSERT INTO robi_faktoren_women_junioren VALUES ('10','1','324');



# ----------------------------------------------------------
#
# structur for Table 'robi_faktoren_women_schueler'
#
CREATE TABLE robi_faktoren_women_schueler (
    Id int(11),
    GwKl int(11),
    WeltRekord int(11)
);
# ----------------------------------------------------------
#
INSERT INTO robi_faktoren_women_schueler VALUES ('1','40','135');
INSERT INTO robi_faktoren_women_schueler VALUES ('2','45','157');
INSERT INTO robi_faktoren_women_schueler VALUES ('3','49','177');
INSERT INTO robi_faktoren_women_schueler VALUES ('4','55','192');
INSERT INTO robi_faktoren_women_schueler VALUES ('5','59','206');
INSERT INTO robi_faktoren_women_schueler VALUES ('6','64','215');
INSERT INTO robi_faktoren_women_schueler VALUES ('7','71','225');
INSERT INTO robi_faktoren_women_schueler VALUES ('8','76','229');
INSERT INTO robi_faktoren_women_schueler VALUES ('9','81','231');
INSERT INTO robi_faktoren_women_schueler VALUES ('10','1','230');



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
# structur for Table 'stammdaten_wk_95'
#
CREATE TABLE stammdaten_wk_95 (
    Heber_pro_M int(11),
    min_heber_pro_mann int(11),
    Meisterschaft tinytext,
    Ort tinytext,
    Datum tinytext,
    Wk_Art tinytext,
    auto_mannschaft int(11),
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
    Online_Id_Wk varchar(32),
    Uebersicht_Font double(11,1),
    RelativArt int(11)
);
# ----------------------------------------------------------
#
INSERT INTO stammdaten_wk_95 VALUES ('4','4','','','','ZK','0','0.00','1','1','0','0','0','14','25','0','0','0','1',NULL,'0','','1','0','0','0','0','0','0','0','Aktive',NULL,NULL,NULL,NULL,'0',NULL,'1.1','0');



# ----------------------------------------------------------
#
# structur for Table 'stammdaten_wk_96'
#
CREATE TABLE stammdaten_wk_96 (
    Meisterschaft tinytext,
    Ort tinytext,
    Datum date,
    Wk_Art tinytext,
    Kampfrichter int(11),
    Gerd int(11),
    Urkunden_höhe int(11),
    Anzahl_Heber_p_S int(11),
    passwort tinytext,
    Liga tinytext,
    LosNummern int(11),
    Zeitnehmer int(11),
    HHP_Hardware int(11),
    Block_Heben int(11),
    Online_Wk int(11),
    Online_Id_Wk varchar(32),
    Verein_Anzahl int(11),
    Protokollant tinytext,
    Mannschaftsfuehrer1 tinytext,
    KampfrichterName tinytext,
    Mannschaftsfuehrer2 tinytext,
    Mannschaftsfuehrer3 tinytext,
    Uebersicht_Font double(11,1)
);
# ----------------------------------------------------------
#
INSERT INTO stammdaten_wk_96 VALUES (NULL,'Am Park 10, 74847 Obrigheim ','2019-04-13','BL','1','0','14','25',NULL,'2. Bundesliga','1','0','0','1','1','FA8D728CB49D4BF083AB87A2A0F4E2BC','2',NULL,NULL,NULL,NULL,NULL,'1.1');



# ----------------------------------------------------------
#
# structur for Table 'stammdaten_wk_97'
#
CREATE TABLE stammdaten_wk_97 (
    Heber_pro_M int(11),
    min_heber_pro_mann int(11),
    Meisterschaft tinytext,
    Ort tinytext,
    Datum tinytext,
    Wk_Art tinytext,
    auto_mannschaft int(11),
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
    Online_Id_Wk varchar(32),
    Grp_Einteilung int(11),
    mannschaft_nach_relativ int(11),
    Uebersicht_Font double(11,1),
    RelativArt int(11)
);
# ----------------------------------------------------------
#
INSERT INTO stammdaten_wk_97 VALUES ('4','4','','','','M_o_T','0','0.50','1','0','0',NULL,'0','1','1','0','0','0','0','0','0','0','1','1','0','0','12','14','25','0','0',NULL,'Aktive','1','0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','1.1','1');



# ----------------------------------------------------------
#
# structur for Table 'startgebühren_95'
#
CREATE TABLE startgebühren_95 (
    E_Erw float(11,2),
    M_Erw float(11,2),
    Nach_Meldung_Euro float(11,2)
);
# ----------------------------------------------------------
#
INSERT INTO startgebühren_95 VALUES ('0.00','0.00',NULL);



# ----------------------------------------------------------
#
# structur for Table 'startgebühren_97'
#
CREATE TABLE startgebühren_97 (
    E_Erw float(11,2),
    M_Erw float(11,2),
    Nach_Meldung_Euro float(11,2)
);
# ----------------------------------------------------------
#
INSERT INTO startgebühren_97 VALUES ('0.00','0.00',NULL);



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
INSERT INTO tmp_anzeige_2 VALUES ('1');



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
INSERT INTO tmp_anzeige_wk_1 VALUES ('79');



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
INSERT INTO tmp_anzeige_wk_2 VALUES ('82');



# ----------------------------------------------------------
#
# structur for Table 'tmp_db'
#
CREATE TABLE tmp_db (
    S_Db text NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO tmp_db VALUES ('97');



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
INSERT INTO tmp_gerd_2 VALUES ('-468','Reißen','101','2',' Kaufhold',' Ayleen','Chemnitzer AC e.V.','57.90','-58');



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
INSERT INTO tmp_hardware_1 VALUES ('1','1','59');



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
INSERT INTO tmp_hardware_2 VALUES ('1','1','60');



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
INSERT INTO tmp_heber_speichern_1 VALUES ('1','0','0','','','','0','0','0','0.00','0.00','0.00');



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
INSERT INTO tmp_kr_check_2 VALUES ('1','0','0','0','0','0','0','2');



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
INSERT INTO tmp_letzter_heber_1 VALUES ('0','Reißen','0');



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
INSERT INTO tmp_letzter_heber_2 VALUES ('0','Reißen','0');



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
INSERT INTO tmp_reload_1 VALUES ('0','-1','-1','Reißen','1');



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
INSERT INTO tmp_reload_2 VALUES ('-468','2','101','Reißen','1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_ss_reload_1'
#
CREATE TABLE tmp_ss_reload_1 (
    AnsagerR int(11) NOT NULL,
    HeberRaumR int(11) NOT NULL,
    UebersichtR int(11),
  PRIMARY KEY (AnsagerR)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_ss_reload_1 VALUES ('1','1','1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_ss_reload_2'
#
CREATE TABLE tmp_ss_reload_2 (
    AnsagerR int(11) NOT NULL,
    HeberRaumR int(11) NOT NULL,
    UebersichtR int(11)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_ss_reload_2 VALUES ('1','1','1');



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
INSERT INTO tmp_uebernaechster_heber_1 VALUES ('4');



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
INSERT INTO tmp_uebernaechster_heber_2 VALUES ('-96');



# ----------------------------------------------------------
#
# structur for Table 'tmp_uebersichtmk_reload'
#
CREATE TABLE tmp_uebersichtmk_reload (
    IdReload int(11) NOT NULL
);
# ----------------------------------------------------------
#
INSERT INTO tmp_uebersichtmk_reload VALUES ('81');



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
# structur for Table 'user_blocker_95'
#
CREATE TABLE user_blocker_95 (
    MeldelisteAnlegen int(11),
    GrpEinteilung int(11),
    Wiegeliste int(11),
    WkBridge1 int(11),
    WkBridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO user_blocker_95 VALUES ('1','1','1','1','0');



# ----------------------------------------------------------
#
# structur for Table 'user_blocker_96'
#
CREATE TABLE user_blocker_96 (
    MeldelisteAnlegen int(11),
    GrpEinteilung int(11),
    Wiegeliste int(11),
    WkBridge1 int(11),
    WkBridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO user_blocker_96 VALUES ('0','0','1','1','0');



# ----------------------------------------------------------
#
# structur for Table 'user_blocker_97'
#
CREATE TABLE user_blocker_97 (
    MeldelisteAnlegen int(11),
    GrpEinteilung int(11),
    Wiegeliste int(11),
    WkBridge1 int(11),
    WkBridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO user_blocker_97 VALUES ('1','1','1','0','0');



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
INSERT INTO verein VALUES ('VFL Nagold e.V.','-217','1','2');
INSERT INTO verein VALUES ('TSV Cottbus e.V.','-216','1','5');
INSERT INTO verein VALUES ('AC Meißen e.V.','-215','1','14');
INSERT INTO verein VALUES ('AC 1972 Kindsbach e.V.','-214','1','18');
INSERT INTO verein VALUES ('SV-DJK Kolbermoor e.V. ','-213','1','3');
INSERT INTO verein VALUES ('SG Anton Saefkow 83 e.V.','-212','1','18');
INSERT INTO verein VALUES ('USC Viadrina Frankfurt (Oder) e.V:','-211','1','5');
INSERT INTO verein VALUES ('SV Freiburg-Haslach 1895','-210','1','2');
INSERT INTO verein VALUES ('AC 82 Schweinfurt e. V.','-209','1','3');
INSERT INTO verein VALUES ('Powerlifting Würzburg e.V.','-208','1','3');
INSERT INTO verein VALUES ('SAV Kassel 1993 e.V.','-207','1','8');
INSERT INTO verein VALUES ('KSV Bochum 1898 e.V.','-206','1','11');
INSERT INTO verein VALUES ('Sportclub Pforzheim e.V.','-205','1','2');
INSERT INTO verein VALUES ('1. AC Regensburg e.V.','-204','1','3');
INSERT INTO verein VALUES ('HG Rastatt 1972 e. V.','-203','1','2');
INSERT INTO verein VALUES ('SV 1883 Schwarza e.V.','-202','1','17');
INSERT INTO verein VALUES ('Kölner AC v. 1882 e. V. ','-201','1','11');
INSERT INTO verein VALUES ('TuS Raubling e.V.','-200','1','3');
INSERT INTO verein VALUES ('Kylltalheber Ehrang 1973','-199','1','12');
INSERT INTO verein VALUES ('SuS Dortmund Derne e.V.','-198','1','11');
INSERT INTO verein VALUES ('TSG Haßloch e.V.','-197','1','12');
INSERT INTO verein VALUES ('VfL Duisburg-Süd 1920 e.V.','-196','1','11');
INSERT INTO verein VALUES ('Preetzer TSV v. 1861 e.V.','-195','1','16');
INSERT INTO verein VALUES ('TSV Gaarden v. 1875 e.V.','-194','1','16');
INSERT INTO verein VALUES ('AC 1972 e.V. Kindsbach e. V.','-193','1','12');
INSERT INTO verein VALUES ('SV Bayer Wuppertal e.V.','-192','1','11');
INSERT INTO verein VALUES ('AC 1892 Weinheim e. V.','-191','1','2');
INSERT INTO verein VALUES ('1. AC 1954 Bayreuth e.V.','-190','1','3');
INSERT INTO verein VALUES ('ESV-Freimann München','-189','1','3');
INSERT INTO verein VALUES ('SV 90 Gräfenroda e.V.','-188','1','17');
INSERT INTO verein VALUES ('VfL Sindelfingen e.V.','-187','1','2');
INSERT INTO verein VALUES ('TSG 1885 Augsburg  e.V.','-186','1','3');
INSERT INTO verein VALUES ('Athletenteam Vogtland ','-185','1','2');
INSERT INTO verein VALUES ('TB 03 Roding e. V.','-184','1','2');
INSERT INTO verein VALUES ('Testverein 3','-183','1','2');
INSERT INTO verein VALUES ('SG Anton Saefkow 83','-182','1','4');
INSERT INTO verein VALUES ('TUS Freiheit Herten','-181','1','2');
INSERT INTO verein VALUES ('KSV Essen 1888 e.V.','-180','1','11');
INSERT INTO verein VALUES ('AC 1894 Neulußheim e.V.','-179','1','2');
INSERT INTO verein VALUES ('TC Hameln v. 1880 e.V. ','-178','1','10');
INSERT INTO verein VALUES ('TSV Ingolstadt-Nord e.V.','-177','1','3');
INSERT INTO verein VALUES ('SGV Oberböbingen ´20 e.V.','-176','1','2');
INSERT INTO verein VALUES ('TG Landshut v. 1861 e.V.','-175','1','3');
INSERT INTO verein VALUES ('SSV Samswegen 1884','-174','1','15');
INSERT INTO verein VALUES ('TSV ','-173','1','2');
INSERT INTO verein VALUES ('KSC 07 Schifferstadt e.V.','-172','1','12');
INSERT INTO verein VALUES ('ASV 1932 Schleusingen','-171','1','17');
INSERT INTO verein VALUES ('SV Empor Berlin e.V.','-170','1','4');
INSERT INTO verein VALUES ('ESV Loko. Mühlhausen','-169','1','17');
INSERT INTO verein VALUES ('TB 03 Roding e.V.','-168','1','3');
INSERT INTO verein VALUES ('SSV Höchstädt','-167','1','3');
INSERT INTO verein VALUES ('AC Meißen e. V.','-166','1','14');
INSERT INTO verein VALUES ('SV Gold-Blau Augsburg e.V.','-165','1','3');
INSERT INTO verein VALUES ('TSV  Heinsheim e.V.','-164','1','2');
INSERT INTO verein VALUES ('AC Suhl e.V.','-163','1','17');
INSERT INTO verein VALUES ('TSG Rodewisch e.V.','-162','1','14');
INSERT INTO verein VALUES ('TV Mengen 1863 e.V.','-161','1','2');
INSERT INTO verein VALUES ('AV 03 e.V. Speyer','-160','1','12');
INSERT INTO verein VALUES ('MSV Buna Schkopau e.V.','-159','1','15');
INSERT INTO verein VALUES ('TV Ettenheim e.V.','-158','1','2');
INSERT INTO verein VALUES ('Riesaer AC 1969 e.V.','-157','1','14');
INSERT INTO verein VALUES ('TV Feldrennach 1896 e.V.','-156','1','2');
INSERT INTO verein VALUES ('NSAC Görlitz e.V.','-155','1','14');
INSERT INTO verein VALUES ('TSV Burgau e.V.','-154','1','3');
INSERT INTO verein VALUES ('SV Motor Eberswalde e.V.','-153','1','5');
INSERT INTO verein VALUES ('USC Viadrina Frankfurt','-152','1','5');
INSERT INTO verein VALUES ('TSG Angermünde e.V.','-151','1','5');
INSERT INTO verein VALUES ('SGV Oberböbingen 1920 e. V.','-150','1','2');
INSERT INTO verein VALUES ('SC Lüchow v. 1861 e.V.','-149','1','10');
INSERT INTO verein VALUES ('Chemnitzer AC e.V.','-148','1','14');
INSERT INTO verein VALUES ('SV Germania Obrigheim','-147','1','2');
INSERT INTO verein VALUES ('1. AC 1897 Weiden e.V.','-146','1','3');
INSERT INTO verein VALUES ('Dresdner SC 1898 e.V.','-145','1','14');
INSERT INTO verein VALUES ('Kraft-Werk Schwarzach e.V.','-144','1','2');
INSERT INTO verein VALUES ('FAC Sangerhausen e. V.','-143','1','15');
INSERT INTO verein VALUES ('AC Potsdam e.V.','-142','1','5');
INSERT INTO verein VALUES ('ASV 1860 Neumarkt e.V.','-141','1','18');
INSERT INTO verein VALUES ('Berliner TSC e.V.','-140','1','4');
INSERT INTO verein VALUES ('AC Atlas Plauen e.V.','-139','1','14');
INSERT INTO verein VALUES ('AC 1892 Mutterstadt e.V.','-138','1','12');
INSERT INTO verein VALUES ('SG ','-137','1','4');
INSERT INTO verein VALUES ('TSV BW 65 Schwedt e.V.','-136','1','5');
INSERT INTO verein VALUES ('SG Fortschritt Eibau e.V.','-135','1','14');
INSERT INTO verein VALUES ('KSV 1894/96 Kitzingen e.V.','-134','1','3');
INSERT INTO verein VALUES ('ASK Frankfurt (Oder) e.V.','-133','1','5');
INSERT INTO verein VALUES ('TSV Waldkirchen e.V.','-132','1','3');
INSERT INTO verein VALUES ('SV 08 Laufenburg e.V.','-131','1','2');
INSERT INTO verein VALUES ('Eichenauer SV e.V.','-130','1','3');
INSERT INTO verein VALUES ('KSV Grünstadt e.V.','-129','1','12');
INSERT INTO verein VALUES ('SSV 1952 Torgau e.V.','-128','1','14');
INSERT INTO verein VALUES ('KSV Lörrach 1902 e.V.','-127','1','2');
INSERT INTO verein VALUES ('Athletenverein 1903 e.V. Speyer','-126','1','2');
INSERT INTO verein VALUES ('AV Groß-Zimmern','-125','1','2');
INSERT INTO verein VALUES ('Testverein 4','-124','1','2');
INSERT INTO verein VALUES ('ESV-Freimann München e.V.','-123','1','3');
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
INSERT INTO verein VALUES ('MSV Buna Schkopau e. V.','-108','1','15');
INSERT INTO verein VALUES ('TSG 1861 Kaiserslautern e. V.','-107','1','2');
INSERT INTO verein VALUES ('Eichenauer Sportverein e.V.','-106','1','3');
INSERT INTO verein VALUES ('Scoop e.V. ','-105','1','7');
INSERT INTO verein VALUES ('TSV 1860 Stralsund e. V.','-104','1','2');
INSERT INTO verein VALUES ('SV Athletia Wiesbaden 1892 ','-103','1','2');
INSERT INTO verein VALUES ('ASV 81 Würzburg e. V.','-102','1','2');
INSERT INTO verein VALUES ('KSV Sömmerda 1910 e. V.','-101','1','2');
INSERT INTO verein VALUES ('Kraftsportverein 1905 Worms e.V., 1. Vorsitzender ','-100','1','2');
INSERT INTO verein VALUES ('1. KSV 1896 Durlach e.V.','-99','1','2');
INSERT INTO verein VALUES ('MTV Vater Jahn Peine','-98','1','2');
INSERT INTO verein VALUES ('Athleten Club 1978 e.V. Forst','-97','1','2');
INSERT INTO verein VALUES ('ASV 1860 Neumarkt i.d.OPf. e. V.','-96','1','3');
INSERT INTO verein VALUES ('PSV Blau Gelb Fulda 1934/61 e. V.','-95','1','2');
INSERT INTO verein VALUES ('1. Athletik-Club 1954 Bayreuth e.V.','-94','1','2');
INSERT INTO verein VALUES ('TSG Haßloch e. V.','-93','1','2');
INSERT INTO verein VALUES ('Sportklub Hansa Germania von 1881 Hamburg e. V. co','-92','1','2');
INSERT INTO verein VALUES ('ESV München-Ost e.V.','-91','1','3');
INSERT INTO verein VALUES ('Athleten-Club 09 e.V. Laubenheim e. V.','-90','1','2');
INSERT INTO verein VALUES ('Turnverein Eintracht Diersburg e. V.','-89','1','2');
INSERT INTO verein VALUES ('SV 08 Laufenburg e. V. Abt.Gewichtheben','-88','1','2');
INSERT INTO verein VALUES ('AC 1904/20 e.V. Mainz-Weisenau e.V.','-87','1','2');
INSERT INTO verein VALUES ('Sportverein Freiburg-Haslach 1895 e.V. ','-86','1','2');
INSERT INTO verein VALUES ('1. Athletenclub 1897 Weiden e.V.','-85','1','3');
INSERT INTO verein VALUES ('SV Blau-Gelb Berlin e. V.','-84','1','2');
INSERT INTO verein VALUES ('VfL Sindelfingen e. V.','-83','1','2');
INSERT INTO verein VALUES ('TSV Forstenried e. V.','-82','1','2');
INSERT INTO verein VALUES ('Riesaer Athletikclub 1969 e. V.','-81','1','14');
INSERT INTO verein VALUES ('Turn-Club Hameln von 1880 e.V. ','-80','1','2');
INSERT INTO verein VALUES ('Kraftsportverein 1894/96 Kitzingen e.V.','-79','1','3');
INSERT INTO verein VALUES ('BKSV Hamburg e.V.','-78','1','2');
INSERT INTO verein VALUES ('Sportverein Tungendorf Neumünster von 1911 e.V. ','-77','1','2');
INSERT INTO verein VALUES ('STC Bavaria 20 Landshut e. V.','-76','1','2');
INSERT INTO verein VALUES ('Ohrdrufer Sportverein e. V.','-75','1','2');
INSERT INTO verein VALUES ('Turnverein Feldrennach 1896 e. V.','-74','1','2');
INSERT INTO verein VALUES ('Breitunger Athletik Verein e.V.','-73','1','17');
INSERT INTO verein VALUES ('GV Donaueschingen e.V.','-72','1','2');
INSERT INTO verein VALUES ('VfK Hannover v. 1903 e.V.','-71','1','10');
INSERT INTO verein VALUES ('Obervellmarer- Sport- Club e. V. Kraftsport','-70','1','2');
INSERT INTO verein VALUES ('SV Magstadt 1897 e. V.','-69','1','2');
INSERT INTO verein VALUES ('TV Heppenheim e. V.','-68','1','2');
INSERT INTO verein VALUES ('TSV 1862 Erding - Abt. Gewichtheben e. V.','-67','1','2');
INSERT INTO verein VALUES ('Turnverein 1898 e.V. Elz - Abtl. Gewichtheben','-66','1','2');
INSERT INTO verein VALUES ('Kylltalheber Ehrang 1973 e. V.','-65','1','2');
INSERT INTO verein VALUES ('BSC Kenpokan e.V.','-64','1','10');
INSERT INTO verein VALUES ('TV 1877 Waldhof-Mannheim e. V.','-63','1','2');
INSERT INTO verein VALUES ('TV Schwäbisch Gmünd-Wetzgau 1920 e. V.','-62','1','2');
INSERT INTO verein VALUES ('AC Goliath Mengede e.V.','-61','1','11');
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
INSERT INTO verein VALUES ('SG Fortschritt Eibau e. V.','-50','1','14');
INSERT INTO verein VALUES ('Fitness und Athletenclub Sangerhausen e. V.','-49','1','2');
INSERT INTO verein VALUES ('VfL Nagold e. V.','-48','1','2');
INSERT INTO verein VALUES ('Dresdner Sportclub 1898 e.V.','-47','1','14');
INSERT INTO verein VALUES ('SV 1883 Schwarza e. V.','-46','1','2');
INSERT INTO verein VALUES ('SV Fellbach 1890 e. V.','-45','1','2');
INSERT INTO verein VALUES ('Turnverein Eichen v. 1888 e.V.','-44','1','2');
INSERT INTO verein VALUES ('SV Empor Berlin e. V.','-43','1','4');
INSERT INTO verein VALUES ('SV 90 Gräfenroda e. V.','-42','1','17');
INSERT INTO verein VALUES ('SSV Samswegen 1884 e. V.','-41','1','15');
INSERT INTO verein VALUES ('SC Lüchow v. 1861 e. V.','-40','1','10');
INSERT INTO verein VALUES ('TSV Ingolstadt-Nord 1897/1913 e. V.','-39','1','3');
INSERT INTO verein VALUES ('Gewichtheber u.  Fitness Club Artern e. V','-38','1','2');
INSERT INTO verein VALUES ('SV - DJK  Kolbermoor e. V.','-37','1','2');
INSERT INTO verein VALUES ('AC 1894 e.V. Neulußheim e.V.','-36','1','2');
INSERT INTO verein VALUES ('ESV Lokomotive Mühlhausen e.V.','-35','1','17');
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
INSERT INTO verein VALUES ('TSV Waldkirchen e. V.','-15','1','3');
INSERT INTO verein VALUES ('Turn- und Athletenverein Brüel e.V .','-14','1','2');
INSERT INTO verein VALUES ('AC Olympia Schrobenhausen v.1895','-13','1','2');
INSERT INTO verein VALUES ('Sportclub Pforzheim e. V.','-12','1','2');
INSERT INTO verein VALUES ('KSV Grünstadt e. V.','-11','1','2');
INSERT INTO verein VALUES ('ESV München-Neuaubing e. V.','-10','1','2');
INSERT INTO verein VALUES ('Athleten-Club 1892 Mutterstadt e.V.','-9','1','2');
INSERT INTO verein VALUES ('ASV 1901 Ladenburg e.V.','-8','1','2');
INSERT INTO verein VALUES ('KSV 1959 Langen e.V.','-7','1','8');
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
INSERT INTO verein VALUES ('Eichenauer SV','16','0','3');
INSERT INTO verein VALUES ('FAC Sangerhausen','17','0','15');
INSERT INTO verein VALUES ('KSC 07 Schifferstadt','18','0','12');
INSERT INTO verein VALUES ('KSV Grünstadt','19','0','12');
INSERT INTO verein VALUES ('Motor Eberswalde','21','0','5');
INSERT INTO verein VALUES ('ESV München Freimann','22','0','3');
INSERT INTO verein VALUES ('NSAC Görlitz','23','0','14');
INSERT INTO verein VALUES ('Riesaer AC','24','0','14');
INSERT INTO verein VALUES ('SC Lüchow','25','0','10');
INSERT INTO verein VALUES ('SG F. Eibau','26','0','14');
INSERT INTO verein VALUES ('SG Saefkow','27','0','4');
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
INSERT INTO verein VALUES ('TSV Heinsheim','41','1','18');
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
INSERT INTO verein VALUES ('KSV Langen ','53','1','18');
INSERT INTO verein VALUES ('FTG Pfungstadt','54','0','8');
INSERT INTO verein VALUES ('AC 1892 Mutterstadt','57','0','12');
INSERT INTO verein VALUES ('AC Germania St. Ilgen','58','0','2');
INSERT INTO verein VALUES ('1.AC Bayreuth','64','0','3');
INSERT INTO verein VALUES ('BSC Kenpokan','68','0','10');
INSERT INTO verein VALUES ('ESV München-Neuaubing','69','1','3');
INSERT INTO verein VALUES ('GSV Eintrach Baunatal','70','0','8');
INSERT INTO verein VALUES ('KraftMühle Würzburg','71','0','3');
INSERT INTO verein VALUES ('Kraft-Werk Schwarzach','72','0','2');
INSERT INTO verein VALUES ('GV Eisenbach','73','0','2');
INSERT INTO verein VALUES ('HG Rastatt','75','0','2');
INSERT INTO verein VALUES ('KSV Bavaria Regensburg','76','0','3');
INSERT INTO verein VALUES ('KSV Hostenbach','77','1','2');
INSERT INTO verein VALUES ('MSV Buna Schkobau','78','0','15');
INSERT INTO verein VALUES ('Ohrdrufer Sportverein','79','0','17');
INSERT INTO verein VALUES ('Preetzer TSV','80','0','12');
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



# ----------------------------------------------------------
#
# structur for Table 'versions_tabelle'
#
CREATE TABLE versions_tabelle (
    Id int(11) NOT NULL,
    Versionsnummer float(11,3),
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO versions_tabelle VALUES ('1','1.028');



# ----------------------------------------------------------
#
# structur for Table 'wk_reload_95'
#
CREATE TABLE wk_reload_95 (
    Id_Iteration int(11),
    Bridge1 int(11),
    Bridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO wk_reload_95 VALUES ('1','19','0');



# ----------------------------------------------------------
#
# structur for Table 'wk_reload_96'
#
CREATE TABLE wk_reload_96 (
    Id_Iteration int(11),
    Bridge1 int(11),
    Bridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO wk_reload_96 VALUES ('1','1','0');



# ----------------------------------------------------------
#
# structur for Table 'wk_reload_97'
#
CREATE TABLE wk_reload_97 (
    Id_Iteration int(11),
    Bridge1 int(11),
    Bridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO wk_reload_97 VALUES ('1','35','0');


