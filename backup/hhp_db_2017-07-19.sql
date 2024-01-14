# Daten Backup vom: 19.07.2017 10:31 

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
INSERT INTO alters_klassen_masters VALUES ('30','34','AK0');
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
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Von)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk VALUES ('0','11','Kinder');
INSERT INTO alters_klassen_zk VALUES ('12','14','Schüler');
INSERT INTO alters_klassen_zk VALUES ('15','17','Jugend');
INSERT INTO alters_klassen_zk VALUES ('18','20','Junioren');
INSERT INTO alters_klassen_zk VALUES ('21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'alters_klassen_zk_1'
#
CREATE TABLE alters_klassen_zk_1 (
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Von)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk_1 VALUES ('0','11','Kinder');
INSERT INTO alters_klassen_zk_1 VALUES ('12','14','Schüler');
INSERT INTO alters_klassen_zk_1 VALUES ('15','17','Jugend');
INSERT INTO alters_klassen_zk_1 VALUES ('18','20','Junioren');
INSERT INTO alters_klassen_zk_1 VALUES ('21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'auswertung_1'
#
CREATE TABLE auswertung_1 (
    IdHeber int(11),
    Al_Kl tinytext,
    Gw_Kl int(11),
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
    Gw_Kl_GesGrp int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mannschaft_1'
#
CREATE TABLE auswertung_mannschaft_1 (
    IdVerein text,
    Mannschaft int(11),
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



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
INSERT INTO datenbanken VALUES ('1','test');



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
INSERT INTO gewichtsklassen VALUES ('6','56','53','62','63','94','74','85','69');
INSERT INTO gewichtsklassen VALUES ('7','62','1','69','1','105','90','94','1');
INSERT INTO gewichtsklassen VALUES ('8','1','0','1','0','1','1','1','0');
INSERT INTO gewichtsklassen VALUES ('9','0','0','0','0','0','0','0','0');
INSERT INTO gewichtsklassen VALUES ('10','0','0','0','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'gewichtsklassen_1'
#
CREATE TABLE gewichtsklassen_1 (
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
INSERT INTO gewichtsklassen_1 VALUES ('1','30','32','35','40','56','48','50','44');
INSERT INTO gewichtsklassen_1 VALUES ('2','35','36','40','44','62','53','56','48');
INSERT INTO gewichtsklassen_1 VALUES ('3','40','40','45','48','69','58','62','53');
INSERT INTO gewichtsklassen_1 VALUES ('4','45','44','50','53','77','63','69','58');
INSERT INTO gewichtsklassen_1 VALUES ('5','50','48','56','58','85','69','77','63');
INSERT INTO gewichtsklassen_1 VALUES ('6','56','53','62','63','94','74','85','69');
INSERT INTO gewichtsklassen_1 VALUES ('7','62','1','69','1','105','90','94','1');
INSERT INTO gewichtsklassen_1 VALUES ('8','1','0','1','0','1','1','1','0');
INSERT INTO gewichtsklassen_1 VALUES ('9','0','0','0','0','0','0','0','0');
INSERT INTO gewichtsklassen_1 VALUES ('10','0','0','0','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'gruppen_1'
#
CREATE TABLE gruppen_1 (
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
INSERT INTO gruppen_1 VALUES ('1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_1 VALUES ('2','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_1 VALUES ('3','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_1 VALUES ('4','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_1 VALUES ('5','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_1 VALUES ('6','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_1 VALUES ('7','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_1 VALUES ('8','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');



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
# structur for Table 'gruppen_zeit_1'
#
CREATE TABLE gruppen_zeit_1 (
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
INSERT INTO gruppen_zeit_1 VALUES ('1',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_1 VALUES ('2',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_1 VALUES ('3',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_1 VALUES ('4',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_1 VALUES ('5',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);



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
  PRIMARY KEY (IdHeber)
);
# ----------------------------------------------------------
#
INSERT INTO heber VALUES ('16','Littmann','Melina','0','2003','56.00','BRA','Weiblich','1','','Schüler','-58','0');
INSERT INTO heber VALUES ('17','Lammel',' Elin','30','2003','40.10','THÜ','Weiblich','1','','Schüler','-44','0');
INSERT INTO heber VALUES ('18','Breitschuh',' Marie Sophie','0','2003','48.10','THÜ','Weiblich','0','','Schüler','-53','0');
INSERT INTO heber VALUES ('19','Sensche',' Elias','30','2003','40.40','THÜ','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('20','Weißbeck','Benjamin','15','2003','56.40','SAS','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('21','Barthel',' Marlen','0','2003','33.20','SAS','Weiblich','0','','Schüler','-40','0');
INSERT INTO heber VALUES ('22','Schlittig',' Vicky','24','2003','51.30','SAS','Weiblich','1','','Schüler','-53','0');
INSERT INTO heber VALUES ('24','Günnel',' Maurice','35','2003','44.20','SAS','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('25','Exner',' Elias','31','2003','37.10','BER','Männlich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('27','Schadt',' Egor','27','2003','51.20','BER','Männlich','1','','Schüler','-56','0');
INSERT INTO heber VALUES ('28','Klünder',' Kevin','6','2003','36.10','SAS','Männlich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('29','Müller','Lucas','6','2003','36.20','SAS','Männlich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('30','Fähsecke',' Marie','25','2003','38.70','NDS','Weiblich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('31','Adamski',' Alex','0','2003','41.00','NDS','Männlich','0','','Schüler','-45','0');
INSERT INTO heber VALUES ('32','Adamski',' Max','0','2003','44.00','NDS','Männlich','0','','Schüler','-45','0');
INSERT INTO heber VALUES ('33','Knop',' Leo','34','2003','42.30','RLP','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('37','Blume',' Samira','0','2002','44.60','SAA','Weiblich','0','','Schüler','-48','0');
INSERT INTO heber VALUES ('39','Weiner','Sven','32','2002','63.20','BW','Männlich','1','','Schüler','-69','0');
INSERT INTO heber VALUES ('40','Leuthner',' Kevin','32','2002','58.90','BWG','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('109','Hartenberger','Michelle','35','2002','46.10','SAS','Weiblich','1','','Schüler','-48','0');
INSERT INTO heber VALUES ('110','Biener','Marie-Kristin','0','2002','44.40','BAY','Weiblich','0','','Schüler','-48','0');
INSERT INTO heber VALUES ('111','Bergmann','Jannick','0','2001','62.60','BAY','Männlich','0','','Schüler','-69','0');
INSERT INTO heber VALUES ('112','Boeder','Jordan','0','2001','50.10','NDS','Männlich','0','','Schüler','-56','0');
INSERT INTO heber VALUES ('113','Blume','Lukas','0','2001','52.00','SAA','Männlich','0','','Schüler','-56','0');
INSERT INTO heber VALUES ('114','Dunka','Josef','3','2002','43.50','BAY','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('115','Drechsel','Nikita','15','2001','57.10','SAS','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('116','Deutschmann','David','38','2001','74.30','BRA','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('117','Bröse','Maximilian','27','2002','44.00','BER','Männlich','0','','Schüler','-45','0');
INSERT INTO heber VALUES ('118','Bretsche','Mika','7','2002','80.10','THÜ','Männlich','0','','Schüler','+69','0');
INSERT INTO heber VALUES ('119','Feil','Bastian','19','2001','63.20','RLP','Männlich','1','','Schüler','-69','0');
INSERT INTO heber VALUES ('120','Feil','Philipp','19','2001','64.40','RLP','Männlich','1','','Schüler','-69','0');
INSERT INTO heber VALUES ('121','Feil','Nils','19','2001','51.30','RLP','Männlich','1','','Schüler','-56','0');
INSERT INTO heber VALUES ('122','Elsner','Eric','23','2002','69.20','SAS','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('123','Ehrig','Nino','7','2001','59.20','THÜ','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('124','Grau','Eric','5','2001','65.40','BWG','Männlich','1','','Schüler','-69','0');
INSERT INTO heber VALUES ('125','Friedrich','Raphael','35','2001','74.90','SAS','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('126','Fricke','Marc','24','2002','88.00','SAS','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('127','Fricke','Julian','24','2003','43.80','SAA','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('128','Florian','Maximilian','7','2001','75.50','THÜ','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('129','Ackermann','Antonia','3','2002','23.70','BER','Weiblich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('130','Grillmayer','Paula','3','2003','52.10','BAY','Weiblich','1','','Schüler','-53','0');
INSERT INTO heber VALUES ('132','Hein','Karl','31','2002','44.60','BER','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('133','Greiner','Marlon','7','2003','88.20','THÜ','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('134','Hansch','Dennis','36','2002','47.30','BRA','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('135','Hanft','Dominik','12','2001','73.70','THÜ','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('136','Hagedorn','Emily','34','2002','55.00','RLP','Weiblich','1','','Schüler','-58','0');
INSERT INTO heber VALUES ('137','Haaß','David','32','2002','88.80','BWG','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('138','Günther','Moritz','25','2002','88.40','NDS','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('139','Hofmann','Elisabeth','32','2001','57.70','BWG','Weiblich','1','','Schüler','-58','0');
INSERT INTO heber VALUES ('140','Hörner','Amelie','11','2002','56.60','BAY','Weiblich','1','','Schüler','-58','0');
INSERT INTO heber VALUES ('141','Kaiser','Davina','8','2001','72.10','RLP','Weiblich','1','','Schüler','+63','0');
INSERT INTO heber VALUES ('142','Keßler','Emily','19','2002','45.00','RLP','Weiblich','1','','Schüler','-48','0');
INSERT INTO heber VALUES ('143','Kaufhold','Kimberley','15','2001','46.00','SAS','Weiblich','1','','Schüler','-48','0');
INSERT INTO heber VALUES ('144','Maier','Moritz','33','2001','79.80','BAY','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('145','Ludwig','Erik','26','2001','75.90','SAS','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('146','Loose','W','10','2002','30.00','BWG','Männlich','1','','Schüler','-35','0');
INSERT INTO heber VALUES ('147','Knodel','Lucas','19','2002','37.00','RLP','Männlich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('148','Kluge','Fabian','28','2001','63.00','BWG','Männlich','1','','Schüler','-69','0');
INSERT INTO heber VALUES ('149','Müller','Lukas','16','2001','74.80','BAY','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('150','Müller','Ron','36','2001','54.50','BRA','Männlich','1','','Schüler','-56','0');
INSERT INTO heber VALUES ('151','Möske','Charline','22','2003','37.20','SAA','Weiblich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('152','Meißner','Alexander','31','2003','38.70','BER','Männlich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('153','Mattig','Lea Justine','9','2001','58.30','BRA','Weiblich','1','','Schüler','-63','0');
INSERT INTO heber VALUES ('154','Pilz','Daniel','3','2001','73.40','BAY','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('155','Pham Manh','Tuan','27','2001','42.80','BER','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('156','Peter','Dave','38','2001','56.10','BRA','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('157','Perlt','Julia ','30','2001','48.60','THÜ','Weiblich','1','','Schüler','-53','0');
INSERT INTO heber VALUES ('158','Neuhäuser','Leonie','7','2003','39.30','THÜ','Weiblich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('159','Schelhorn','Tarek-Wilhelm','30','2001','87.40','THÜ','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('160','Sailer','Philipp','32','2001','70.20','BW','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('161','Rössler','Laura','18','2001','56.50','RLP','Weiblich','1','','Schüler','-58','0');
INSERT INTO heber VALUES ('162','Reum','Ben','14','2002','55.25','THÜ','Männlich','1','','Schüler','-56','0');
INSERT INTO heber VALUES ('163','Plüger','Adrian','30','2001','62.00','THÜ','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('164','Schuster','Luc-Dante','13','2001','52.00','BER','Männlich','1','','Schüler','-56','0');
INSERT INTO heber VALUES ('165','Schönsiegel','Celina','32','2002','39.60','BW','Weiblich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('166','Schönherr','Richard','15','2002','60.20','SAS','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('167','Schneider','Milena','35','2001','61.20','SAS','Weiblich','1','','Schüler','-63','0');
INSERT INTO heber VALUES ('168','Schemmel','Tobias','3','2001','63.10','BAY','Männlich','1','','Schüler','-69','0');
INSERT INTO heber VALUES ('169','Stoye','Josefine','15','2001','53.00','SAS','Weiblich','1','','Schüler','-53','0');
INSERT INTO heber VALUES ('170','Seitz','Bianca','37','2001','46.10','BAY','Weiblich','1','','Schüler','-48','0');
INSERT INTO heber VALUES ('171','Seifert','Tim','35','2002','45.60','SAS','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('172','Sebalj','David','39','2001','45.00','BWG','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('173','Schütte','Fynn','31','2002','48.20','BER','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('174','Weiss','Philipp','7','2001','57.65','THÜ','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('175','Weiner','Luca','32','2001','57.20','BW','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('176','Ursolino','Angelina','32','2002','56.80','BW','Weiblich','1','','Schüler','-58','0');
INSERT INTO heber VALUES ('177','Truong-Bach','Lisa Mai','27','2001','45.20','BER','Weiblich','1','','Schüler','-48','0');
INSERT INTO heber VALUES ('178','Trost','Hannes','20','2001','65.30','THÜ','Männlich','1','','Schüler','-69','0');
INSERT INTO heber VALUES ('179','Wendlandt','Jannes','21','2001','63.80','BRA','Männlich','1','','Schüler','-69','0');
INSERT INTO heber VALUES ('180','Woecht','Sebastian','28','2001','69.00','BW','Männlich','1','','Schüler','-69','0');
INSERT INTO heber VALUES ('181','Wolf','Ricardo Aaron','36','2002','54.90','BRA','Männlich','1','','Schüler','-56','0');
INSERT INTO heber VALUES ('182','Zagermann','Eric','17','2001','86.00','SAA','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('185','Schache','Sina-Franziska','26','2002','52.60','SAS','Weiblich','1','','Schüler','-53','0');
INSERT INTO heber VALUES ('186','Da Silva Prior','Leon Cavalho','2','2002','63.10','RLP','Männlich','0','','Schüler','-69','0');
INSERT INTO heber VALUES ('187','Loose','Kyra','10','2002','48.50','BWG','Weiblich','1','','Schüler','-53','0');
INSERT INTO heber VALUES ('188','Kopp','Madita','39','2001','52.90','BWG','Weiblich','1','','Schüler','-53','0');
INSERT INTO heber VALUES ('189','Kessler','Ben','19','2005','50.00','RLP','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('190','Stöcklin','Tobias','40','2005','55.00','BWG','Männlich','1','','Kinder','-56','0');
INSERT INTO heber VALUES ('191','Schuler','Justin','41','2005','70.00','BWG','Männlich','1','','Kinder','+62','0');
INSERT INTO heber VALUES ('192','Grätz','Tizian','11','2005','50.00','BAY','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('193','Saini','Rishabh','33','2005','50.00','BAY','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('194','Graze','Elias','10','2005','50.00','BWG','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('195','Sailer','Lars','32','2005','50.00','BW','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('196','Spatola','Moriano','10','2005','75.00','BWG','Männlich','1','','Kinder','+62','0');
INSERT INTO heber VALUES ('197','Soldner','Farin','32','2005','75.00','BWG','Männlich','1','','Kinder','+62','0');
INSERT INTO heber VALUES ('198','Haupt','Christian','42','2005','50.00','BAY','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('199','Jutzi','Tom','43','2003','50.00','BWG','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('200','Reischl','Jonas','44','2003','50.00','BAY','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('201','Schneider','Julian','19','2003','50.00','RLP','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('203','Kampp','Marcel','41','2003','0.00','BWG','Männlich','1','','Schüler','-35','0');
INSERT INTO heber VALUES ('204','Bauer','Emil','0','2003','35.00','BAY','Männlich','0','','Schüler','-35','0');
INSERT INTO heber VALUES ('205','Bühr','Yannik','28','2003','20.00','BWG','Männlich','0','','Schüler','-35','0');
INSERT INTO heber VALUES ('206','Reichensperger','Marcel','43','2006','43.90','BW','Männlich','1','','Kinder','-45','0');
INSERT INTO heber VALUES ('207','Hofmann','Emanuel','28','2006','50.00','BWG','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('208','Junemann','Eric','11','2006','50.00','BAY','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('209','Löffler','Nils','2','2004','31.70','RLP','Männlich','1','','Kinder','-35','0');
INSERT INTO heber VALUES ('210','Friend','Hutch','45','2004','33.30','RLP','Männlich','1','','Kinder','-35','0');
INSERT INTO heber VALUES ('211','Wagenbach','Lars','43','2004','36.00','BW','Männlich','1','','Kinder','-40','0');
INSERT INTO heber VALUES ('212','Stanton','Elijah','47','2004','39.30','BAY','Männlich','1','','Kinder','-40','0');
INSERT INTO heber VALUES ('213','Rukabert','Benjamin','44','2004','0.00','BAY','Männlich','1','','Kinder','-30','0');
INSERT INTO heber VALUES ('214','Holetz','Tim','32','2004','44.00','BWG','Männlich','1','','Kinder','-45','0');
INSERT INTO heber VALUES ('215','Häfele','Alexander','48','2004','43.60','BAY','Männlich','1','','Kinder','-45','0');
INSERT INTO heber VALUES ('216','Köhler','Raik','19','2004','42.00','RLP','Männlich','1','','Kinder','-45','0');
INSERT INTO heber VALUES ('217','Seibold','Florian','44','2004','54.40','BAY','Männlich','1','','Kinder','-56','0');
INSERT INTO heber VALUES ('218','Grätz','Julian','11','2004','47.60','BAY','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('219','Stanton','Rowan','47','2004','52.80','BAY','Männlich','1','','Kinder','-56','0');
INSERT INTO heber VALUES ('220','Klassig','Conner','32','2004','53.80','BWG','Männlich','1','','Kinder','-56','0');
INSERT INTO heber VALUES ('222','Sattler','Yannik','19','2004','54.50','RLP','Männlich','1','','Kinder','-56','0');
INSERT INTO heber VALUES ('223','Blas','Noah','0','2004','58.60','BW','Männlich','0','','Kinder','-62','0');
INSERT INTO heber VALUES ('224','Still','Robin','46','2004','62.30','BAY','Männlich','1','','Kinder','+62','0');
INSERT INTO heber VALUES ('225','Schönsiegel','Justin','32','2004','64.00','BWG','Männlich','1','','Kinder','+62','0');
INSERT INTO heber VALUES ('226','Frey','Moritz','28','2004','69.70','BWG','Männlich','1','','Kinder','+62','0');
INSERT INTO heber VALUES ('227','Fischer','Finn','43','2003','50.00','BWG','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('228','Suschko','Julian','43','2003','55.00','BWG','Männlich','1','','Schüler','-56','0');
INSERT INTO heber VALUES ('229','Esterle','Michael','39','2003','50.00','BWG','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('230','Kazanc','Demian','2','2003','42.20','RLP','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('231','Hinderberger','Tim','2','2003','37.30','RLP','Männlich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('232','Fischer','Tom','11','2001','49.70','BAY','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('233','Stefan','Tim','49','2001','44.00','BAY','Männlich','1','','Schüler','-45','0');
INSERT INTO heber VALUES ('234','Kurz','Lorenz','49','2001','62.00','RLP','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('235','Baumgart','Tim','0','2001','77.60','BW','Männlich','0','','Schüler','+69','0');
INSERT INTO heber VALUES ('236','Poled','Nicolas','50','2001','75.20','BW','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('247','Dudorkhanov','Indira','30','2008','27.80','THÜ','Weiblich','1','','Kinder','-32','0');
INSERT INTO heber VALUES ('248','Gürth','Nils','30','2007','34.40','THÜ','Männlich','1','','Kinder','-35','0');
INSERT INTO heber VALUES ('249','Maas','Denny','30','2005','47.70','THÜ','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('250','Langkabel','Laura','30','2005','43.40','THÜ','Weiblich','1','','Kinder','-44','0');
INSERT INTO heber VALUES ('251','Dudorkhanov','Iman','30','2005','29.70','THÜ','Weiblich','1','','Kinder','-32','0');
INSERT INTO heber VALUES ('252','Dudorkhanov','Ibrahim','30','2004','43.00','THÜ','Männlich','1','','Kinder','-45','0');
INSERT INTO heber VALUES ('253','Steudner','Max','30','2004','52.20','THÜ','Männlich','1','','Kinder','-56','0');
INSERT INTO heber VALUES ('254','Oelling','Jakob','20','2003','50.00','THÜ','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('255','Walther','Eric-Rene','20','2003','85.90','THÜ','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('256','John','Leon','20','2002','73.90','THÜ','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('257','Motek','Jonas','20','2001','50.00','THÜ','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('258','Oelling','Jakob','51','2006','56.30','THÜ','Männlich','1','','Kinder','-62','0');
INSERT INTO heber VALUES ('259','Lanckrock','Justin','53','2005','28.00','HES','Männlich','1','','Kinder','-30','0');
INSERT INTO heber VALUES ('260','Kleine','Ryuu','53','2005','37.40','HES','Männlich','1','','Kinder','-40','0');
INSERT INTO heber VALUES ('261','Vasilev ','Filip','53','2003','48.40','HES','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('262','Konrad','Mark','53','2003','37.90','HES','Männlich','1','','Schüler','-40','0');
INSERT INTO heber VALUES ('263','Moritz','Justus','53','2003','51.95','HES','Männlich','1','','Schüler','-56','0');
INSERT INTO heber VALUES ('264','Georgiev','Aleks','53','2002','50.00','HES','Männlich','1','','Schüler','-50','0');
INSERT INTO heber VALUES ('265','Lagah','Goutam','53','2002','80.50','HES','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('266','Malkowsky','Asarja','53','2001','50.00','HES','Weiblich','1','','Schüler','-53','0');
INSERT INTO heber VALUES ('267','Alvarez','Carlos','0','2004','35.20','HES','Männlich','0','','Kinder','-40','0');
INSERT INTO heber VALUES ('268','De Nuccio','Leon','54','2004','46.90','HES','Männlich','0','','Kinder','-50','0');
INSERT INTO heber VALUES ('269','Houede','Daniel','54','2004','49.20','HES','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('270','Funk','Tim Patrick','54','2004','50.00','HES','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('271','Marx','Magnus','52','2005','34.50','THÜ','Männlich','1','','Kinder','-35','0');
INSERT INTO heber VALUES ('272','Demirtas','Efe Can','54','2004','15.00','HES','Männlich','0','','Kinder','-30','0');
INSERT INTO heber VALUES ('273','Schreiner','Alexander','54','2003','33.20','HES','Männlich','1','','Schüler','-35','0');
INSERT INTO heber VALUES ('274','Hallstein','Simon','54','2003','50.50','HES','Männlich','1','','Schüler','-56','0');
INSERT INTO heber VALUES ('275','van de Weijer','Lars','54','2002','60.00','HES','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('276','Simon','Mika','14','2004','45.20','THÜ','Männlich','1','','Kinder','-50','0');
INSERT INTO heber VALUES ('277','Neumann','Robin','12','2006','57.90','THÜ','Männlich','1','','Kinder','-62','0');
INSERT INTO heber VALUES ('278','Hennecke','Fabian','12','2005','36.00','THÜ','Männlich','1','','Kinder','-40','0');
INSERT INTO heber VALUES ('279','Schilling','Oskar','12','2005','52.50','THÜ','Männlich','1','','Kinder','-56','0');
INSERT INTO heber VALUES ('280','Brückner','Sophie','12','2005','34.00','THÜ','Weiblich','0','','Kinder','-36','0');
INSERT INTO heber VALUES ('281','Hennecke','Pascal','12','2004','69.20','THÜ','Männlich','1','','Kinder','+62','0');
INSERT INTO heber VALUES ('282','Reuter','Tom David','12','2004','58.30','HES','Männlich','1','','Kinder','-62','0');
INSERT INTO heber VALUES ('283','Heß','Damian','7','2007','40.50','THÜ','Männlich','1','','Kinder','-45','0');
INSERT INTO heber VALUES ('284','Kallenbach','Luca','7','2006','53.10','THÜ','Männlich','1','','Kinder','-56','0');
INSERT INTO heber VALUES ('285','Schweng','Eileen','7','2005','33.10','THÜ','Weiblich','1','','Kinder','-36','0');
INSERT INTO heber VALUES ('286','Langer','Tommy','7','2004','35.60','THÜ','Männlich','1','','Kinder','-40','0');
INSERT INTO heber VALUES ('287','Langbein','John','7','2004','31.00','THÜ','Männlich','1','','Kinder','-35','0');
INSERT INTO heber VALUES ('288','Jahn','Marlon','7','2003','89.90','THÜ','Männlich','1','','Schüler','+69','0');
INSERT INTO heber VALUES ('289','Emick','Jan','54','2004','74.20','HES','Männlich','1','','Kinder','+62','0');
INSERT INTO heber VALUES ('290','Schröpfer','Mo','20','2003','57.00','THÜ','Männlich','1','','Schüler','-62','0');
INSERT INTO heber VALUES ('291','Schroth','Nina','60','1990','75.60','BWG','Weiblich','1','','Aktive','-90','0');
INSERT INTO heber VALUES ('292','Treutlein','Mandy','60','1990','69.75','BW','Weiblich','1','','Aktive','-74','0');
INSERT INTO heber VALUES ('293','Kusterer','Sabine','60','1990','58.70','BWG','Weiblich','1','','Aktive','-63','0');
INSERT INTO heber VALUES ('294','Velagic','Almir','59','1990','150.30','BW','Männlich','1','','Aktive','+105','0');
INSERT INTO heber VALUES ('295','Prochorow','Alexej','59','1990','136.45','BW','Männlich','1','','Aktive','+105','0');
INSERT INTO heber VALUES ('296','Perez Valentin','Lydia','60','1990','75.85','BWG','Weiblich','6','','Aktive','-90','0');
INSERT INTO heber VALUES ('297','Kingue Matam','Bernadin','59','1990','70.70','BWG','Männlich','2','','Aktive','-77','0');
INSERT INTO heber VALUES ('298','Spiess','Jürgen','59','1990','106.90','BWG','Männlich','1','','Aktive','+105','0');
INSERT INTO heber VALUES ('299','Müller','Nico','59','1990','76.00','BWG','Männlich','1','','Aktive','-77','0');
INSERT INTO heber VALUES ('300','Lang','Max','59','1990','78.00','BWG','Männlich','1','','Aktive','-85','0');
INSERT INTO heber VALUES ('301','Michel','Anais','60','1990','49.55','BWG','Weiblich','2','','Aktive','-53','0');
INSERT INTO heber VALUES ('302','Bouly','Kevin','0','1990','96.90','BW','Männlich','0','','Aktive','-105','0');
INSERT INTO heber VALUES ('303','Hennequin','Benjamin','59','1990','88.70','BWG','Männlich','2','','Aktive','-94','0');
INSERT INTO heber VALUES ('304','Bardis','Giovanni','0','1990','86.85','BW','Männlich','0','','Aktive','-94','0');
INSERT INTO heber VALUES ('305','Nayo Ketchanke','Gaelle','60','1990','75.40','BWG','Weiblich','2','','Aktive','-90','0');
INSERT INTO heber VALUES ('306','Mata Perez','Andres Eduardo','59','1990','81.15','BWG','Männlich','6','','Aktive','-85','0');
INSERT INTO heber VALUES ('307','Sanchez Lopez','David','59','1990','72.15','BW','Männlich','6','','Aktive','-77','0');
INSERT INTO heber VALUES ('308','Brachi Garcia','Josue','0','1990','59.25','BW','Männlich','0','','Aktive','-62','0');
INSERT INTO heber VALUES ('309','Bordignon','Giorgua','0','1990','63.80','BW','Weiblich','0','','Aktive','-69','0');
INSERT INTO heber VALUES ('310','Pagliaro','Genny','60','1990','49.70','BWG','Weiblich','3','','Aktive','-53','0');
INSERT INTO heber VALUES ('311','Pizzolato','Antonio','59','1990','86.90','BWG','Männlich','3','','Aktive','-94','0');
INSERT INTO heber VALUES ('312','Scarantino','Mirco','59','1990','56.95','BW','Männlich','3','','Aktive','-62','0');
INSERT INTO heber VALUES ('313','Everi','Anna-Maria','60','1990','63.60','BWG','Weiblich','7','','Aktive','-69','0');
INSERT INTO heber VALUES ('334','a','','64','1975','89.40','BW','Weiblich','1','Auswahl','Aktive','-90','1');
INSERT INTO heber VALUES ('335','aa','','64','1970','90.00','BW','Weiblich','1','Auswahl','Aktive','-90','1');
INSERT INTO heber VALUES ('336','aaa','','64','1986','89.50','BW','Weiblich','1','Auswahl','Aktive','-90','1');
INSERT INTO heber VALUES ('337','aaaa','','64','1982','89.80','BW','Weiblich','1','','Aktive','-90','1');
INSERT INTO heber VALUES ('338','aaaaa','','64','1978','85.00','BW','Männlich','1','','Aktive','-85','1');
INSERT INTO heber VALUES ('339','aaaaaa','','64','1965','120.00','BW','Männlich','1','Auswahl','Aktive','+105','1');
INSERT INTO heber VALUES ('340','t3','','3','2000','90.00','BW','Männlich','1','','Jugend','-94','1');
INSERT INTO heber VALUES ('341','t2','','3','2005','80.00','BW','Männlich','1','','Kinder','+62','1');
INSERT INTO heber VALUES ('342','t1','','3','2005','54.00','BW','Männlich','1','','Kinder','-56','1');
INSERT INTO heber VALUES ('343','t4','','3','2000','85.00','BW','Männlich','1','','Jugend','-85','1');
INSERT INTO heber VALUES ('344','t5','','3','2000','70.00','BW','Männlich','1','','Jugend','-77','1');
INSERT INTO heber VALUES ('345','t6','','0','1995','60.00','BW','Männlich','1','','Aktive','-62','1');
INSERT INTO heber VALUES ('346','t6','','3','2000','92.00','BW','Männlich','1','','Jugend','-94','1');
INSERT INTO heber VALUES ('348','Moritz','Redlich','64','1996','75.00','BWG','Männlich','1','','Aktive','-77','0');
INSERT INTO heber VALUES ('349','aaaaaaa','aaaaaaa','64','1988','70.00','BW','Männlich','1','','Aktive','-77','0');



# ----------------------------------------------------------
#
# structur for Table 'heber_1'
#
CREATE TABLE heber_1 (
    IdHeber int(11),
    Auswahl tinytext,
    Ausserkonkurrenz tinytext,
    Gruppe int(11),
    Gruppe_Aus int(11),
    LosNr int(11),
    Pokal int(11),
    ZKLast int(11),
    AlKlMain tinytext,
    GesGrp int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'heber_wk_1'
#
CREATE TABLE heber_wk_1 (
    IdHeber int(11),
    Versuch int(11),
    Reißen int(11),
    Stoßen int(11),
    Div_Wert_R int(11),
    Div_Wert_S int(11),
    Gueltig_Reißen tinytext,
    Gueltig_Stoßen tinytext,
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



# ----------------------------------------------------------
#
# structur for Table 'laender'
#
CREATE TABLE laender (
    laender text NOT NULL,
    Idlaender int(11) NOT NULL auto_increment,
  PRIMARY KEY (Idlaender)
);
# ----------------------------------------------------------
#
INSERT INTO laender VALUES ('BW','2');
INSERT INTO laender VALUES ('BAY','3');
INSERT INTO laender VALUES ('RLP','4');
INSERT INTO laender VALUES ('NDS','5');
INSERT INTO laender VALUES ('BER','6');
INSERT INTO laender VALUES ('SAS','7');
INSERT INTO laender VALUES ('THÜ','8');
INSERT INTO laender VALUES ('BRA','9');
INSERT INTO laender VALUES ('SAA','10');
INSERT INTO laender VALUES ('NVP','11');
INSERT INTO laender VALUES ('NRW','12');
INSERT INTO laender VALUES ('HES','13');



# ----------------------------------------------------------
#
# structur for Table 'laenderwertung'
#
CREATE TABLE laenderwertung (
    Platz int(11) NOT NULL auto_increment,
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
# structur for Table 'laenderwertung_1'
#
CREATE TABLE laenderwertung_1 (
    Ver_Lan_Sta text,
    Lw_Punkte float(11,1),
    Lw_Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'mannschaften_1'
#
CREATE TABLE mannschaften_1 (
    Verein tinytext,
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
INSERT INTO sinclair_faktoren VALUES ('1','0.7943581410','0.8972607400','174.393','148.026');



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
# structur for Table 'stammdaten_wk_1'
#
CREATE TABLE stammdaten_wk_1 (
    Heber_pro_M int(11),
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
    DM int(11),
    GesGrpAlKl tinytext,
    LosNummern int(11),
    Rel_Sin_AlKl int(11),
    Hauptauswertung int(11),
    Zeitnehmer int(11),
    HHP_Hardware int(11),
    Grp_Einteilung int(11)
);
# ----------------------------------------------------------
#
INSERT INTO stammdaten_wk_1 VALUES ('4',NULL,NULL,NULL,'ZK','0.50','1','1','0','0',NULL,'14','25','0','0','0','0',NULL,'0','Aktive','1','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'startgebühren_1'
#
CREATE TABLE startgebühren_1 (
    E_Erw float(11,2),
    M_Erw float(11,2)
);
# ----------------------------------------------------------
#
INSERT INTO startgebühren_1 VALUES ('0.00','0.00');



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
INSERT INTO tmp_anzeige_1 VALUES ('0');



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
INSERT INTO tmp_anzeige_wk_1 VALUES ('330');



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
INSERT INTO tmp_db VALUES ('331');



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
INSERT INTO tmp_gerd_1 VALUES ('336','Reißen','100','1','aaa','','aaaaaa','89.50','-90');



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
INSERT INTO tmp_kr_check_1 VALUES ('1','0','0','0','0','1','1','2');



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
INSERT INTO tmp_letzter_heber_1 VALUES ('334','Stoßen','2');



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
INSERT INTO tmp_reload_1 VALUES ('336','1','100','Reißen','1');



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
INSERT INTO tmp_ss_reload_1 VALUES ('0','0');



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
INSERT INTO tmp_uebernaechster_heber_1 VALUES ('335');



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
INSERT INTO tmp_wk_korrektur_block VALUES ('1','1','1');



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
# structur for Table 'user_blocker_1'
#
CREATE TABLE user_blocker_1 (
    MeldelisteAnlegen int(11),
    GrpEinteilung int(11),
    Wiegeliste int(11),
    WkBridge1 int(11),
    WkBridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO user_blocker_1 VALUES ('0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'verein'
#
CREATE TABLE verein (
    Verein text NOT NULL,
    IdVerein int(11) NOT NULL auto_increment,
    Bundesliga int(11) NOT NULL,
  PRIMARY KEY (IdVerein)
);
# ----------------------------------------------------------
#
INSERT INTO verein VALUES ('KSV Lörrach','1','0');
INSERT INTO verein VALUES ('AV Speyer','2','0');
INSERT INTO verein VALUES ('1. AC Weiden','3','1');
INSERT INTO verein VALUES ('AC Atlas Plauen','4','0');
INSERT INTO verein VALUES ('AC Forst','5','0');
INSERT INTO verein VALUES ('AC Meißen','6','0');
INSERT INTO verein VALUES ('AC Suhl','7','0');
INSERT INTO verein VALUES ('AC Weisenau','8','0');
INSERT INTO verein VALUES ('ASK Frankfurt/Oder','9','0');
INSERT INTO verein VALUES ('ASV Ladenburg','10','0');
INSERT INTO verein VALUES ('ASV Neumarkt','11','0');
INSERT INTO verein VALUES ('ASV Schleusingen','12','0');
INSERT INTO verein VALUES ('Berliner TSC','13','0');
INSERT INTO verein VALUES ('Breitunger AV','14','0');
INSERT INTO verein VALUES ('Chemnitzer AC','15','0');
INSERT INTO verein VALUES ('Eichenauer SV','16','0');
INSERT INTO verein VALUES ('FAC Sangerhausen','17','0');
INSERT INTO verein VALUES ('KSC 07 Schifferstadt','18','0');
INSERT INTO verein VALUES ('KSV Grünstadt','19','0');
INSERT INTO verein VALUES ('KSV Sömmerda','20','0');
INSERT INTO verein VALUES ('Motor Eberswalde','21','0');
INSERT INTO verein VALUES ('MSV Buna Schkopau','22','0');
INSERT INTO verein VALUES ('NSAC Görlitz','23','0');
INSERT INTO verein VALUES ('Riesaer AC','24','0');
INSERT INTO verein VALUES ('SC Lüchow','25','0');
INSERT INTO verein VALUES ('SG F. Eibau','26','0');
INSERT INTO verein VALUES ('SG Saefkow','27','0');
INSERT INTO verein VALUES ('SGV Oberböbingen','28','0');
INSERT INTO verein VALUES ('SSV Samswegen1884','29','0');
INSERT INTO verein VALUES ('SV 90 Gräfenroda','30','0');
INSERT INTO verein VALUES ('SV Empor Berlin','31','0');
INSERT INTO verein VALUES ('SV G. Obrigheim','32','0');
INSERT INTO verein VALUES ('TB 03 Roding','33','0');
INSERT INTO verein VALUES ('TSG Haßloch','34','0');
INSERT INTO verein VALUES ('TSG Rodewisch','35','0');
INSERT INTO verein VALUES ('TSV B/W Schwedt','36','0');
INSERT INTO verein VALUES ('TSV Ingolstadt Nord','37','0');
INSERT INTO verein VALUES ('USC Viadrina','38','0');
INSERT INTO verein VALUES ('VFL Nagold','39','0');
INSERT INTO verein VALUES ('TUS Herten','40','0');
INSERT INTO verein VALUES ('TSV Heinsheim','41','0');
INSERT INTO verein VALUES ('KSV Kitzingen','42','0');
INSERT INTO verein VALUES ('AC Weinheim','43','0');
INSERT INTO verein VALUES ('TSV Waldkirchen','44','0');
INSERT INTO verein VALUES ('AC Kindsbach','45','0');
INSERT INTO verein VALUES ('TUS Raublig','46','0');
INSERT INTO verein VALUES ('ESV München Ost','47','0');
INSERT INTO verein VALUES ('TSV Ingoldstadt-Nord','48','0');
INSERT INTO verein VALUES ('AC 1923 Altrip','49','0');
INSERT INTO verein VALUES ('KSV Durlach','50','0');
INSERT INTO verein VALUES ('SG Jugendkraft Crawinkel','51','0');
INSERT INTO verein VALUES ('ESV Lok Mühlhausen','52','0');
INSERT INTO verein VALUES ('KSV Langen','53','0');
INSERT INTO verein VALUES ('FTG Pfungstadt','54','0');
INSERT INTO verein VALUES ('AC Mutterstadt','57','0');
INSERT INTO verein VALUES ('AC Germania St. Ilgen','58','0');
INSERT INTO verein VALUES ('InternationalM','59','0');
INSERT INTO verein VALUES ('InternationalW','60','0');
INSERT INTO verein VALUES ('aaaaaa','64','1');


