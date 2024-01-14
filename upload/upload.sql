# Daten Backup vom: 11.11.2019 12:32 

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
# structur for Table 'alters_klassen_zk_109'
#
CREATE TABLE alters_klassen_zk_109 (
    Id int(11) NOT NULL,
    Von int(11) NOT NULL,
    Bis int(11) NOT NULL,
    Klasse text NOT NULL,
  PRIMARY KEY (Id)
);
# ----------------------------------------------------------
#
INSERT INTO alters_klassen_zk_109 VALUES ('1','0','11','Kinder');
INSERT INTO alters_klassen_zk_109 VALUES ('2','12','14','Schüler');
INSERT INTO alters_klassen_zk_109 VALUES ('3','15','17','Jugend');
INSERT INTO alters_klassen_zk_109 VALUES ('4','18','20','Junioren');
INSERT INTO alters_klassen_zk_109 VALUES ('5','21','100','Aktive');



# ----------------------------------------------------------
#
# structur for Table 'auswertung_109'
#
CREATE TABLE auswertung_109 (
    IdHeber int(11),
    Al_Kl text,
    K_Gewicht float(11,2),
    R_Gewicht float(11,1),
    Gw_Kl int(11),
    R_1 int(11),
    R_2 int(11),
    R_3 int(11),
    S_1 int(11),
    S_2 int(11),
    S_3 int(11),
    R_1_G text,
    R_2_G text,
    R_3_G text,
    S_1_G text,
    S_2_G text,
    S_3_G text,
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
    Robbi_P float(11,4),
    Robbi_Quali_P float(11,4),
    Platz_MK int(11),
    Platz_R int(11),
    Platz_S int(11),
    Platz_ZK int(11),
    Platz_Sin int(11),
    Platz_GwKl int(11),
    Platz_RP int(11),
    Platz_Robi int(11),
    Platz_Robi_Quali int(11),
    Platz_SP int(11),
    Platz_Sin_Malone_Meltzer int(11),
    Platz_ZK_Kg int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_laender_mannschaft_109'
#
CREATE TABLE auswertung_laender_mannschaft_109 (
    laender text,
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mannschaft_109'
#
CREATE TABLE auswertung_mannschaft_109 (
    IdVerein text,
    Mannschaft int(11),
    Punkte float(11,1),
    Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'auswertung_mk_109'
#
CREATE TABLE auswertung_mk_109 (
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
INSERT INTO datenbanken VALUES ('109','Deutsche Meisterschaft der Schüler/innen');



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
# structur for Table 'gewichtsklassen_109'
#
CREATE TABLE gewichtsklassen_109 (
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
INSERT INTO gewichtsklassen_109 VALUES ('1','25','25','35','35','49','40','55','45');
INSERT INTO gewichtsklassen_109 VALUES ('2','30','30','40','40','55','45','61','49');
INSERT INTO gewichtsklassen_109 VALUES ('3','35','35','45','45','61','49','67','55');
INSERT INTO gewichtsklassen_109 VALUES ('4','40','40','49','49','67','55','73','59');
INSERT INTO gewichtsklassen_109 VALUES ('5','45','45','55','55','73','59','81','64');
INSERT INTO gewichtsklassen_109 VALUES ('6','49','49','61','59','81','64','89','71');
INSERT INTO gewichtsklassen_109 VALUES ('7','55','55','67','64','89','71','96','76');
INSERT INTO gewichtsklassen_109 VALUES ('8','61','59','73','71','96','76','102','81');
INSERT INTO gewichtsklassen_109 VALUES ('9','67','1','81','76','102','81','109','87');
INSERT INTO gewichtsklassen_109 VALUES ('10','1','0','89','1','1','1','1','1');
INSERT INTO gewichtsklassen_109 VALUES ('11','0','0','96','0','0','0','0','0');
INSERT INTO gewichtsklassen_109 VALUES ('12','0','0','1','0','0','0','0','0');



# ----------------------------------------------------------
#
# structur for Table 'grp_109'
#
CREATE TABLE grp_109 (
    Gruppe_Aus int(11),
    Gruppe int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'gruppen_109'
#
CREATE TABLE gruppen_109 (
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
INSERT INTO gruppen_109 VALUES ('1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_109 VALUES ('2','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_109 VALUES ('3','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_109 VALUES ('4','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_109 VALUES ('5','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_109 VALUES ('6','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_109 VALUES ('7','1','1','1','1','1','1','1','1','1','1');
INSERT INTO gruppen_109 VALUES ('8','1','1','1','1','1','1','1','1','1','1');



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
# structur for Table 'gruppen_mk_zaehler_109'
#
CREATE TABLE gruppen_mk_zaehler_109 (
    Jahrgang int(11),
    Geschlecht text,
    Anzahl int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'gruppen_zeit_109'
#
CREATE TABLE gruppen_zeit_109 (
    Gruppen int(11),
    Bridge int(11),
    Anzahl int(11),
    Datum date,
    Wiege_Zeit text,
    Wiege_Zeit_Bis text,
    WK_Zeit text,
    Athletik_Zeit text,
    Gruppe_Aus int(11)
);
# ----------------------------------------------------------
#
INSERT INTO gruppen_zeit_109 VALUES ('1',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_109 VALUES ('2',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_109 VALUES ('3',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_109 VALUES ('4',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);
INSERT INTO gruppen_zeit_109 VALUES ('5',NULL,NULL,NULL,'00:00','00:00','00:00',NULL,NULL);



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
INSERT INTO heber VALUES ('-203','Glaubitz','Louis Joel','-41','2006','70.00','SN','Männlich','1','','Schüler','-73','1','22512');
INSERT INTO heber VALUES ('-202','Pfeifer','Niclas','-36','2004','73.00','BW','Männlich','1','','Jugend','-73','1','12589');
INSERT INTO heber VALUES ('-201','Hilbert','Leonie','-50','2005','54.00','BW','Weiblich','1','','Schüler','-55','1','20986');
INSERT INTO heber VALUES ('-200','Hofer','Josefine','-41','2004','94.00','SN','Weiblich','1','','Jugend','+81','1','21425');
INSERT INTO heber VALUES ('-199','Altmann','Robin Tilo','-41','2006','40.00','SN','Männlich','1','','Schüler','-40','1','22037');
INSERT INTO heber VALUES ('-198','Scharbach','Hannes','-36','2004','76.00','BW','Männlich','1','','Jugend','-81','1','20992');
INSERT INTO heber VALUES ('-197','Krüger','Nico ','-41','1987','77.90','BW','Männlich','3','','Aktive','-81','1','7788');
INSERT INTO heber VALUES ('-196','Bickel','Dominik','-6','1994','74.40','BW','Männlich','3','','Aktive','-81','1','11499');
INSERT INTO heber VALUES ('-195','Brehm','Nanina','-6','1994','63.70','BW','Weiblich','3','','Aktive','-64','1','13554');
INSERT INTO heber VALUES ('-194','Hertrampf','Björn ','-41','1982','91.10','BW','Männlich','3','','Aktive','-96','1','10923');
INSERT INTO heber VALUES ('-193','Scholz','Paula','-41','1996','68.80','BW','Weiblich','3','','Aktive','-71','1','20784');
INSERT INTO heber VALUES ('-192','Joachin','Robert ','-41','1987','69.80','BW','Männlich','3','','Aktive','-73','1','7395');
INSERT INTO heber VALUES ('-191','Mark','Eckhardt','-41','1989','97.00','BW','Männlich','3','','Aktive','-102','1','10960');
INSERT INTO heber VALUES ('-190','Wisniewski','Damian','-41','1986','67.80','BW','Männlich','3','','Aktive','-73','1','20000');
INSERT INTO heber VALUES ('-189','Guto','Roberto ','-41','2000','73.00','BW','Männlich','3','','Junioren','-73','1','12911');
INSERT INTO heber VALUES ('-188','test','test','-1','2002','100.00','BW','Männlich','3','Auswahl','Jugend','-102','1','12312');
INSERT INTO heber VALUES ('-187','Secho','Fabian','-2','1987','101.00','BW','Männlich','1','Auswahl','Aktive','-102','1','20676');
INSERT INTO heber VALUES ('-186','Maus','Micky','-2','1988','80.50','BW','Männlich','1','Auswahl','Aktive','-81','1','21370');
INSERT INTO heber VALUES ('-185','Fries','Jonathan ','-1','1997','86.50','BW','Männlich','1','Auswahl','Aktive','-89','1','21391');
INSERT INTO heber VALUES ('-184','Glaser','Robert','-1','1970','91.00','BW','Männlich','1','Auswahl','Aktive','-96','1','20131');
INSERT INTO heber VALUES ('-183','Blümchen','Benjamin','-2','1997','80.30','BW','Männlich','1','Auswahl','Aktive','-81','1','21371');
INSERT INTO heber VALUES ('-182','Duck','Donald','-1','1990','95.00','BW','Männlich','1','Auswahl','Aktive','-96','1','20117');
INSERT INTO heber VALUES ('-181','Maus','Minnie','-2','1989','62.60','BW','Weiblich','1','Auswahl','Aktive','-64','1','21372');
INSERT INTO heber VALUES ('-180','Simpson','Homer','-2','1959','94.90','BW','Männlich','3','Auswahl','Aktive','-96','1','21374');
INSERT INTO heber VALUES ('-179','Dan Biebl','Stefanie','-1','2000','88.00','BW','Weiblich','1','Auswahl','Junioren','+87','1','20128');
INSERT INTO heber VALUES ('-178','Mustermann','Martin','-1','1985','94.80','BW','Männlich','3','Auswahl','Aktive','-96','1','20116');
INSERT INTO heber VALUES ('-177','Bauer','Peter','-1','1980','88.40','BW','Männlich','3','Auswahl','Aktive','-89','1','20113');
INSERT INTO heber VALUES ('-176','der Bär','Balu','-2','1960','72.50','BW','Männlich','1','Auswahl','Aktive','-73','1','21373');
INSERT INTO heber VALUES ('-175','Friedrich','Lukas Noah','-16','2005','68.00','BW','Männlich','1','','Schüler','-73','1','21255');
INSERT INTO heber VALUES ('-174','Drafz','Benedikt','-23','2005','67.00','BB','Männlich','1','','Schüler','-67','1','22478');
INSERT INTO heber VALUES ('-173','Beck','Geronimo','-44','2004','46.00','TH','Männlich','1','','Jugend','-49','1','22256');
INSERT INTO heber VALUES ('-172','Kleinfeld','Raphael','-45','2006','65.00','TH','Männlich','1','','Schüler','-67','1','22461');
INSERT INTO heber VALUES ('-171','Neubert','Nora','-14','2006','53.00','SN','Weiblich','1','','Schüler','-55','1','21735');
INSERT INTO heber VALUES ('-170','Barthel','Marius','-15','2005','60.00','SN','Männlich','1','','Schüler','-61','1','12988');
INSERT INTO heber VALUES ('-169','Rogge','Jan Lennart','-33','2005','61.00','BY','Männlich','1','','Schüler','-61','1','22502');
INSERT INTO heber VALUES ('-168','Akdeniz','Dilara','-10','2006','50.00','BW','Weiblich','1','','Schüler','-55','1','21988');
INSERT INTO heber VALUES ('-167','Schuler','Justin','-53','2005','48.00','BW','Männlich','1','','Schüler','-49','1','21264');
INSERT INTO heber VALUES ('-166','Bühr','Marlene','-51','2006','50.00','BW','Weiblich','1','','Schüler','-55','1','21348');
INSERT INTO heber VALUES ('-165','Kohlisch','Martin','-14','2004','57.00','SN','Männlich','1','','Jugend','-61','1','13666');
INSERT INTO heber VALUES ('-164','Keil','Richard','-43','2006','50.00','BE','Männlich','1','','Schüler','-55','1','21217');
INSERT INTO heber VALUES ('-163','Müller','Marie','-52','2006','55.00','BY','Weiblich','1','','Schüler','-55','1','20924');
INSERT INTO heber VALUES ('-162','Pfister','Roi Tayler','-3','2006','35.00','BW','Männlich','1','','Schüler','-35','1','22252');
INSERT INTO heber VALUES ('-161','Raulf','Luis','-37','2006','58.00','SN','Männlich','1','','Schüler','-61','1','21779');
INSERT INTO heber VALUES ('-160','Kahler','Ben','-44','2005','59.00','TH','Männlich','1','','Schüler','-61','1','22500');
INSERT INTO heber VALUES ('-159','Viol','Laura','-25','2005','69.00','BB','Weiblich','1','','Schüler','-71','1','13176');
INSERT INTO heber VALUES ('-158','Neukirchner','Laura Leonie','-15','2005','44.00','SN','Weiblich','1','','Schüler','-45','1','22375');
INSERT INTO heber VALUES ('-157','Dudorkhanov','Ibrahim','-45','2004','74.00','TH','Männlich','1','','Jugend','-81','1','13624');
INSERT INTO heber VALUES ('-156','Schlenz','Tobias','-33','2006','91.00','BY','Männlich','1','','Schüler','-96','1','21279');
INSERT INTO heber VALUES ('-155','Siegert','Drago Balthsar','-18','2004','92.00','BB','Männlich','1','','Jugend','-96','1','13453');
INSERT INTO heber VALUES ('-154','Hermsdorf','Hendrik','-42','2006','70.00','TH','Männlich','1','','Schüler','-73','1','21673');
INSERT INTO heber VALUES ('-153','Plischke','Marc','-37','2004','98.00','SN','Männlich','1','','Jugend','-102','1','22075');
INSERT INTO heber VALUES ('-152','Rettenberger','Nathalie','-49','2004','56.00','BY','Weiblich','1','','Jugend','-59','1','21248');
INSERT INTO heber VALUES ('-151','Holetz','Tim','-22','2004','75.00','BW','Männlich','1','','Jugend','-81','1','20287');
INSERT INTO heber VALUES ('-150','Benzelrath','Nils','-51','2004','67.00','BW','Männlich','1','','Jugend','-67','1','20486');
INSERT INTO heber VALUES ('-149','Ring','Paul','-13','2006','36.00','BY','Männlich','1','','Schüler','-40','1','21520');
INSERT INTO heber VALUES ('-148','Kurbanova','Tanzila','-45','2005','70.00','TH','Weiblich','1','','Schüler','-71','1','21883');
INSERT INTO heber VALUES ('-147','Hennecke','Fabian Joelle','-4','2005','57.00','TH','Männlich','1','','Schüler','-61','1','21769');
INSERT INTO heber VALUES ('-146','Rothbauer','Tyler','-18','2006','45.00','BB','Männlich','1','','Schüler','-45','1','21022');
INSERT INTO heber VALUES ('-145','Nützel','Lucas','-6','2004','43.00','RP','Männlich','1','','Jugend','-49','1','21452');
INSERT INTO heber VALUES ('-144','Hennecke','Pascal Morris','-4','2004','114.00','TH','Männlich','1','','Jugend','+102','1','21770');
INSERT INTO heber VALUES ('-143','Engels','Mara','-6','2004','75.00','RP','Weiblich','1','','Jugend','-76','1','20847');
INSERT INTO heber VALUES ('-142','Rettenberger','Eric','-49','2004','72.00','BY','Männlich','1','','Jugend','-73','1','22451');
INSERT INTO heber VALUES ('-141','Kloos','Dennis','-11','2006','51.00','BW','Männlich','1','','Schüler','-55','1','22494');
INSERT INTO heber VALUES ('-140','Knorra','Max-Sebastian','-11','2004','58.00','BW','Männlich','1','','Jugend','-61','1','22052');
INSERT INTO heber VALUES ('-139','Simon','Mika','-48','2004','65.00','TH','Männlich','1','','Jugend','-67','1','20144');
INSERT INTO heber VALUES ('-138','Göttlich','Lennard','-21','2004','57.00','SN','Männlich','1','','Jugend','-61','1','20412');
INSERT INTO heber VALUES ('-137','Urban','Arian Lukas','-18','2005','73.00','BB','Männlich','1','','Schüler','-73','1','21023');
INSERT INTO heber VALUES ('-136','Conti','Enrico','-19','2005','82.00','BW','Männlich','1','','Schüler','-89','1','21269');
INSERT INTO heber VALUES ('-135','Nizamov','Artur','-7','2005','65.00','SN','Männlich','1','','Schüler','-67','1','21450');
INSERT INTO heber VALUES ('-134','Phan','Quoc Hai','-47','2004','73.00','NI','Männlich','1','','Jugend','-73','1','21107');
INSERT INTO heber VALUES ('-133','Schlittig','Robby','-7','2006','51.00','SN','Männlich','1','','Schüler','-55','1','21737');
INSERT INTO heber VALUES ('-132','Kronschwitz','Lio Tim','-20','2005','65.00','BB','Männlich','1','','Schüler','-67','1','13589');
INSERT INTO heber VALUES ('-131','Scholz','Florian','-17','2005','70.00','SN','Männlich','1','','Schüler','-73','1','21241');
INSERT INTO heber VALUES ('-130','Graf','Maria','-46','2006','45.00','BY','Weiblich','1','','Schüler','-45','1','20425');
INSERT INTO heber VALUES ('-129','Meyer','Natalie','-25','2004','73.00','BB','Weiblich','1','','Jugend','-76','1','20375');
INSERT INTO heber VALUES ('-128','Dudorkhanov','Iman','-45','2005','49.00','TH','Weiblich','1','','Schüler','-49','1','13625');
INSERT INTO heber VALUES ('-127','Körner','Lukas','-45','2005','52.00','TH','Männlich','1','','Schüler','-55','1','21880');
INSERT INTO heber VALUES ('-126','Engel','Alexandra','-24','2004','48.00','BB','Weiblich','1','','Jugend','-49','1','20186');
INSERT INTO heber VALUES ('-125','Marx','Magnus','-35','2005','56.00','TH','Männlich','1','','Schüler','-61','1','20138');
INSERT INTO heber VALUES ('-124','Blum','Philip','-21','2005','76.00','SN','Männlich','1','','Schüler','-81','1','22447');
INSERT INTO heber VALUES ('-123','Schweng','Eileen','-44','2005','56.00','TH','Weiblich','1','','Schüler','-59','1','21404');
INSERT INTO heber VALUES ('-122','Tas','Melda','-6','2004','50.00','RP','Weiblich','1','','Jugend','-55','1','21273');
INSERT INTO heber VALUES ('-121','Soldner','Farin','-22','2005','76.00','BW','Männlich','1','','Schüler','-81','1','21331');
INSERT INTO heber VALUES ('-120','Stanton','Elijah','-39','2004','60.00','BY','Männlich','1','','Jugend','-61','1','21014');
INSERT INTO heber VALUES ('-119','Sheebo','Rezan','-22','2004','58.00','BW','Männlich','1','','Jugend','-61','1','21546');
INSERT INTO heber VALUES ('-118','Hammer','Moritz','-25','2005','85.00','BB','Männlich','1','','Schüler','-89','1','21175');
INSERT INTO heber VALUES ('-117','Böhme','Tim','-43','2006','50.00','BE','Männlich','1','','Schüler','-55','1','21216');
INSERT INTO heber VALUES ('-116','Brückner','Sophie','-4','2005','49.00','TH','Weiblich','1','','Schüler','-49','1','21410');
INSERT INTO heber VALUES ('-115','Kopp','Dana','-12','2006','58.00','BW','Weiblich','1','','Schüler','-59','1','22049');
INSERT INTO heber VALUES ('-114','Walker','Felix','-13','2006','42.00','BY','Männlich','1','','Schüler','-45','1','20884');
INSERT INTO heber VALUES ('-113','Ludwig','Nicky- Jane','-42','2006','55.00','TH','Weiblich','1','','Schüler','-55','1','22002');
INSERT INTO heber VALUES ('-112','Farrar','Mika','-7','2005','68.00','SN','Männlich','1','','Schüler','-73','1','21449');
INSERT INTO heber VALUES ('-111','Weißmann','Ron','-14','2006','48.00','SN','Männlich','1','','Schüler','-49','1','21732');
INSERT INTO heber VALUES ('-110','Sahin','Silvan ','-19','2006','60.00','BW','Männlich','1','','Schüler','-61','1','22114');
INSERT INTO heber VALUES ('-109','Bellmann','Ole','-14','2006','55.00','SN','Männlich','1','','Schüler','-55','1','21734');
INSERT INTO heber VALUES ('-108','Meingast','Alexander','-29','2006','48.00','BY','Männlich','1','','Schüler','-49','1','22050');
INSERT INTO heber VALUES ('-107','Schmitt','Fabius Yuma ','-5','2006','56.00','BW','Männlich','1','','Schüler','-61','1','22489');
INSERT INTO heber VALUES ('-106','Wirtner','Manuel','-40','2004','58.00','BW','Männlich','1','','Jugend','-61','1','13634');
INSERT INTO heber VALUES ('-105','Berger','Erik-Steven','-17','2004','85.00','SN','Männlich','1','','Jugend','-89','1','21439');
INSERT INTO heber VALUES ('-104','Stanton','Rowan','-39','2004','70.00','BY','Männlich','1','','Jugend','-73','1','21015');
INSERT INTO heber VALUES ('-103','Teterjatnik','Iwan','-38','2004','70.00','BB','Männlich','1','','Jugend','-73','1','20309');
INSERT INTO heber VALUES ('-102','Pfeifer','Nicco','-37','2006','90.00','SN','Männlich','1','','Schüler','-96','1','21778');
INSERT INTO heber VALUES ('-101','Kohn','Justin','-21','2004','78.00','SN','Männlich','1','','Jugend','-81','1','20411');
INSERT INTO heber VALUES ('-100','Neuert','Florian','-10','2006','66.00','BW','Männlich','1','','Schüler','-67','1','21987');
INSERT INTO heber VALUES ('-99','Bürkle','Benjamin','-16','2004','62.00','BW','Männlich','1','','Jugend','-67','1','20069');
INSERT INTO heber VALUES ('-98','Reinhardt','Nils Thorben','-30','2004','78.00','ST','Männlich','1','','Jugend','-81','1','20345');
INSERT INTO heber VALUES ('-97','Walter','Lenny','-18','2005','58.00','BB','Männlich','1','','Schüler','-61','1','21016');
INSERT INTO heber VALUES ('-96','Biela','Maximilian','-13','2006','55.00','BY','Männlich','1','','Schüler','-55','1','21265');
INSERT INTO heber VALUES ('-95','Martin','Leonie Mercedes','-14','2004','66.00','SN','Weiblich','1','','Jugend','-71','1','13665');
INSERT INTO heber VALUES ('-94','Tas','Sinem','-6','2004','52.00','RP','Weiblich','1','','Jugend','-55','1','20259');
INSERT INTO heber VALUES ('-93','Frank','Leonard','-35','2005','70.00','TH','Männlich','1','','Schüler','-73','1','22104');
INSERT INTO heber VALUES ('-92','Barth','Jason','-15','2006','60.00','SN','Männlich','1','','Schüler','-61','1','21723');
INSERT INTO heber VALUES ('-91','Kloss','Lukas','-34','2006','71.00','HE','Männlich','1','','Schüler','-73','1','22406');
INSERT INTO heber VALUES ('-90','Sahitaj','Edonis','-33','2004','51.00','BY','Männlich','1','','Jugend','-55','1','21278');
INSERT INTO heber VALUES ('-89','Keßler','Moritz','-6','2005','42.00','RP','Männlich','1','','Schüler','-45','1','21138');
INSERT INTO heber VALUES ('-88','Saini','Rishabh','-29','2005','60.00','BY','Männlich','1','','Schüler','-61','1','20614');
INSERT INTO heber VALUES ('-87','Singh','Pavanpreet','-32','2005','65.00','HE','Männlich','1','','Schüler','-67','1','21030');
INSERT INTO heber VALUES ('-86','Leopold','Niclas','-18','2006','78.00','BB','Männlich','1','','Schüler','-81','1','21017');
INSERT INTO heber VALUES ('-85','Kerimow','Dominik','-31','2005','42.00','BY','Männlich','1','','Schüler','-45','1','21070');
INSERT INTO heber VALUES ('-84','Chrysochoidis','Alexandros','-30','2005','96.00','ST','Männlich','1','','Schüler','-96','1','21254');
INSERT INTO heber VALUES ('-83','Hein','Tiago','-28','2006','48.00','BE','Männlich','1','','Schüler','-49','1','21748');
INSERT INTO heber VALUES ('-82','Wissing','Nele','-15','2005','59.00','SN','Weiblich','1','','Schüler','-59','1','21947');
INSERT INTO heber VALUES ('-81','Simeth','Lukas','-29','2005','51.00','BY','Männlich','1','','Schüler','-55','1','22051');
INSERT INTO heber VALUES ('-80','Karnatz','Louis','-21','2005','59.00','SN','Männlich','1','','Schüler','-61','1','21908');
INSERT INTO heber VALUES ('-79','Lange','Maximilian','-28','2005','61.00','BE','Männlich','1','','Schüler','-61','1','20770');
INSERT INTO heber VALUES ('-78','Rohde','Felix','-20','2005','50.00','BB','Männlich','1','','Schüler','-55','1','13592');
INSERT INTO heber VALUES ('-77','Weißert','Jan','-16','2004','74.00','BW','Männlich','1','','Jugend','-81','1','20487');
INSERT INTO heber VALUES ('-76','Siegert','Sissi Lara','-18','2006','58.00','BB','Weiblich','1','','Schüler','-59','1','21020');
INSERT INTO heber VALUES ('-75','Häfele','Alexander','-27','2004','72.00','BY','Männlich','1','','Jugend','-73','1','12542');
INSERT INTO heber VALUES ('-74','Haupt','Christian','-13','2005','77.00','BY','Männlich','1','','Schüler','-81','1','20494');
INSERT INTO heber VALUES ('-73','Ullmann ','Anne-Marie ','-26','2006','50.00','TH','Weiblich','1','','Schüler','-55','1','21746');
INSERT INTO heber VALUES ('-72','Grießmann','Jeremy','-25','2004','73.00','BB','Männlich','1','','Jugend','-73','1','20296');
INSERT INTO heber VALUES ('-71','Mayer','Phillip','-11','2005','74.00','BW','Männlich','1','','Schüler','-81','1','21056');
INSERT INTO heber VALUES ('-70','Spist','Christopher','-24','2006','59.00','BB','Männlich','1','','Schüler','-61','1','20187');
INSERT INTO heber VALUES ('-69','Reuter','Tom David','-4','2004','94.00','TH','Männlich','1','','Jugend','-96','1','22005');
INSERT INTO heber VALUES ('-68','Heidemann','Felix','-15','2006','59.00','SN','Männlich','1','','Schüler','-61','1','21724');
INSERT INTO heber VALUES ('-67','Jahnke','Tino','-23','2004','73.00','BB','Männlich','1','','Jugend','-73','1','20539');
INSERT INTO heber VALUES ('-66','Klassig','Conner','-22','2004','78.00','BW','Männlich','1','','Jugend','-81','1','20288');
INSERT INTO heber VALUES ('-65','Rusch','Valentino','-21','2005','55.00','SN','Männlich','1','','Schüler','-55','1','21152');
INSERT INTO heber VALUES ('-64','Merscher','Lennert Benedict','-20','2005','53.00','BB','Männlich','1','','Schüler','-55','1','21457');
INSERT INTO heber VALUES ('-63','Herweg','Lucy','-18','2006','52.00','BB','Weiblich','1','','Schüler','-55','1','21019');
INSERT INTO heber VALUES ('-62','Stofer','Marius','-19','2004','60.00','BW','Männlich','1','','Jugend','-61','1','21140');
INSERT INTO heber VALUES ('-61','Thomanek','Julia','-19','2006','55.00','BW','Weiblich','1','','Schüler','-55','1','22112');
INSERT INTO heber VALUES ('-60','Hauff','Tom','-18','2006','60.00','BB','Männlich','1','','Schüler','-61','1','21018');
INSERT INTO heber VALUES ('-59','Lichtenwald','Paul','-17','2005','53.00','SN','Männlich','1','','Schüler','-55','1','21672');
INSERT INTO heber VALUES ('-58','Beyer','Valentin','-16','2006','63.00','BW','Männlich','1','','Schüler','-67','1','22238');
INSERT INTO heber VALUES ('-57','Pomsel','Maurice','-15','2006','45.00','SN','Männlich','1','','Schüler','-45','1','21722');
INSERT INTO heber VALUES ('-56','Prießner','Vincent','-14','2004','57.00','SN','Männlich','1','','Jugend','-61','1','21455');
INSERT INTO heber VALUES ('-55','Ring','Hannes','-13','2006','42.00','BY','Männlich','1','','Schüler','-45','1','21266');
INSERT INTO heber VALUES ('-54','Mast','Ronny','-12','2004','83.00','BW','Männlich','1','','Jugend','-89','1','20353');
INSERT INTO heber VALUES ('-53','Wagenbach','Lars Elias','-11','2004','57.00','BW','Männlich','1','','Jugend','-61','1','20531');
INSERT INTO heber VALUES ('-52','Tas','Simge','-6','2004','69.00','RP','Weiblich','1','','Jugend','-71','1','20260');
INSERT INTO heber VALUES ('-51','Schrödersecker','Chryssanthi-Sanyana Marie ','-10','2006','64.00','BW','Weiblich','1','','Schüler','-64','1','22009');
INSERT INTO heber VALUES ('-50','Haselmann','Enrico','-9','2005','63.00','BY','Männlich','1','','Schüler','-67','1','20074');
INSERT INTO heber VALUES ('-49','Schmitt','Aleta Kimana','-5','2006','56.00','BW','Weiblich','1','','Schüler','-59','1','22490');
INSERT INTO heber VALUES ('-48','Millen','Lea','-8','2005','54.00','RP','Weiblich','1','','Schüler','-55','1','21534');
INSERT INTO heber VALUES ('-47','Thieme','Hanna-Christin','-7','2006','54.00','SN','Weiblich','1','','Schüler','-55','1','21736');
INSERT INTO heber VALUES ('-46','Kessler','Ben','-6','2005','59.00','RP','Männlich','1','','Schüler','-61','1','21137');
INSERT INTO heber VALUES ('-45','Pfalzgraf','Lisa-Marie','-5','2006','56.00','BW','Weiblich','1','','Schüler','-59','1','22492');
INSERT INTO heber VALUES ('-44','Neumann','Robin','-4','2006','92.00','TH','Männlich','1','','Schüler','-96','1','21775');
INSERT INTO heber VALUES ('-43','Werner','Maximilian','-3','2004','64.00','BW','Männlich','1','','Jugend','-67','1','20522');
INSERT INTO heber VALUES ('-42','Schnurrer','Florian','-123','1993','97.00','BW','Männlich','3','','Aktive','-102','1','13094');
INSERT INTO heber VALUES ('-41','Zierer','Verena','-123','1994','67.10','BW','Weiblich','3','','Aktive','-71','1','22122');
INSERT INTO heber VALUES ('-40','Schuierer','Maximilian','-184','1993','71.70','BW','Männlich','3','','Aktive','-73','1','11050');
INSERT INTO heber VALUES ('-39','Wang','Jingyi','-123','1992','69.00','BW','Männlich','3','','Aktive','-73','1','13030');
INSERT INTO heber VALUES ('-38','Holllerith','Anna','-123','1996','65.10','BW','Weiblich','3','','Aktive','-71','1','20819');
INSERT INTO heber VALUES ('-37','Klitzke','Sarah','-123','1993','62.20','BW','Weiblich','3','','Aktive','-64','1','20215');
INSERT INTO heber VALUES ('-36','Rieß','Lisa','-123','1989','70.80','BW','Weiblich','3','','Aktive','-71','1','13113');
INSERT INTO heber VALUES ('-35','Isilay','Ali','-123','1994','84.00','BW','Männlich','3','','Aktive','-89','1','20815');
INSERT INTO heber VALUES ('-34','König','Anne-Sophie','-17','1989','61.70','BW','Weiblich','3','','Aktive','-64','1','21712');
INSERT INTO heber VALUES ('-33','Biega','Tadeusz','-17','1986','95.50','BW','Männlich','3','','Aktive','-96','1','21555');
INSERT INTO heber VALUES ('-32','Rosol','Tomasz','-17','1989','66.30','BW','Männlich','3','','Aktive','-67','1','11229');
INSERT INTO heber VALUES ('-31','Mummhardt','Philip','-17','1995','110.00','BW','Männlich','3','','Aktive','+109','1','11526');
INSERT INTO heber VALUES ('-30','Rieger','Patricia','-17','1987','78.80','BW','Weiblich','3','','Aktive','-81','1','12950');
INSERT INTO heber VALUES ('-29','Schedler','Leon','-17','1998','56.90','BW','Männlich','3','','Aktive','-61','1','12077');
INSERT INTO heber VALUES ('-28','Marecek','Petr','-17','1998','80.90','BW','Männlich','3','','Aktive','-81','1','22281');
INSERT INTO heber VALUES ('-27','Fischer','Adolf','-184','1984','72.00','BW','Männlich','3','','Aktive','-73','1','21912');
INSERT INTO heber VALUES ('-26','Jackwerth','Maximilian','-184','1995','111.90','BW','Männlich','3','','Aktive','+109','1','11379');
INSERT INTO heber VALUES ('-25','Voit','Hermann','-184','1987','80.20','BW','Männlich','3','','Aktive','-81','1','7992');
INSERT INTO heber VALUES ('-24','Rat','Lavinia','-218','1992','56.70','BW','Weiblich','1','','Aktive','-59','1','21656');
INSERT INTO heber VALUES ('-23','Schemmel','Simone','-218','1994','67.50','BW','Weiblich','1','','Aktive','-71','1','10550');
INSERT INTO heber VALUES ('-22','Narr','Alexander','-218','1993','95.80','BW','Männlich','1','','Aktive','-96','1','8115');
INSERT INTO heber VALUES ('-21','Popel','Johannes','-218','1994','82.00','BW','Männlich','1','','Aktive','-89','1','11658');
INSERT INTO heber VALUES ('-20','Schemmel','Kerstin','-218','1998','63.90','BW','Weiblich','1','','Aktive','-64','1','11660');
INSERT INTO heber VALUES ('-19','Schemmel','Roman','-218','1997','86.45','BW','Männlich','1','','Aktive','-89','1','11077');
INSERT INTO heber VALUES ('-18','Nowara','Daniel','-184','1989','102.90','BW','Männlich','3','','Aktive','-109','1','9234');
INSERT INTO heber VALUES ('-17','Kellermeier','Julia','-184','0','52.00','BW','Weiblich','3','','','','1','12442');
INSERT INTO heber VALUES ('-16','Pilz','Steffen','-184','1975','73.00','BW','Männlich','3','','Aktive','-73','1','11281');
INSERT INTO heber VALUES ('-15','Pilz','Annika','-184','2002','54.80','BW','Weiblich','3','','Jugend','-55','1','12780');
INSERT INTO heber VALUES ('-14','Brandhuber','Simon','-184','1991','68.80','BW','Männlich','3','','Aktive','-73','1','9549');
INSERT INTO heber VALUES ('-13','Kulzer','Peter','-184','1998','105.60','BW','Männlich','3','','Aktive','-109','1','12049');
INSERT INTO heber VALUES ('-12','Nowara','Gregor','-184','1993','90.00','BW','Männlich','3','','Aktive','-96','1','10626');
INSERT INTO heber VALUES ('-11','Stransky','Petr','-184','1997','73.30','BW','Männlich','3','','Aktive','-81','1','20886');
INSERT INTO heber VALUES ('-10','Jahn','Annabell','-184','1986','61.80','BW','Weiblich','3','','Aktive','-64','1','13324');
INSERT INTO heber VALUES ('-9','Brandhuber','Hans','-184','1996','88.40','BW','Männlich','3','','Aktive','-89','1','11378');
INSERT INTO heber VALUES ('-8','Wagner','Andreas','-6','1962','61.00','BW','Männlich','1','','Aktive','-61','1','1321');
INSERT INTO heber VALUES ('-7','Nützel','Nicole','-6','1979','56.70','BW','Weiblich','3','','Aktive','-59','1','6891');
INSERT INTO heber VALUES ('-6','Hesse','Josef ','-6','1994','82.30','BW','Männlich','3','','Aktive','-89','1','11225');
INSERT INTO heber VALUES ('-5','Fleischmann','Jana','-6','1991','64.80','BW','Weiblich','1','','Aktive','-71','1','20100');
INSERT INTO heber VALUES ('-4','Lee','Rebecca','-6','1988','59.90','BW','Weiblich','3','','Aktive','-64','1','20099');
INSERT INTO heber VALUES ('-3','Szymon','Sven','-6','1993','76.90','BW','Männlich','3','','Aktive','-81','1','11064');
INSERT INTO heber VALUES ('-2','Kohler','Laura','-6','1988','59.20','BW','Weiblich','3','','Aktive','-64','1','21985');
INSERT INTO heber VALUES ('-1','Rohde','Ivonne','-6','1982','59.40','BW','Weiblich','1','','Aktive','-64','1','11231');
INSERT INTO heber VALUES ('1','t1','','-146','1990','50.00','BY','Männlich','1','','Aktive','-55','0','');
INSERT INTO heber VALUES ('2','t2','','-146','1990','50.00','BY','Männlich','1','','Aktive','-55','0','');
INSERT INTO heber VALUES ('3','t3','','-146','1990','50.00','BY','Männlich','1','','Aktive','-55','0','');
INSERT INTO heber VALUES ('4','t4','','-146','1990','110.00','BY','Männlich','1','','Aktive','+109','0','');
INSERT INTO heber VALUES ('5','t5','','-146','1990','110.00','BY','Männlich','1','','Aktive','+109','0','');
INSERT INTO heber VALUES ('6','test','test','-9','1990','1.00','','Männlich','1','','Aktive','-55','1','21212');
INSERT INTO heber VALUES ('7','asda','test','-9','1990','1.00','','Weiblich','1','','Aktive','-45','1','123');



# ----------------------------------------------------------
#
# structur for Table 'heber_109'
#
CREATE TABLE heber_109 (
    IdHeber int(11),
    Auswahl text,
    Ausserkonkurrenz text,
    Gruppe int(11),
    Gruppe_Aus int(11),
    StartNr int(11),
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
INSERT INTO heber_109 VALUES ('-43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'138',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-44',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-45',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'110',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-46',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'130',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-47',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'93',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-48',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'110',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-49',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'110',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'133',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-51',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'56',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-52',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'92',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-53',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'106',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-54',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'140',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-55',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'59',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-56',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'110',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-57',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'63',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-58',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'104',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-59',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'83',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-60',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'140',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-61',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'64',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-62',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'112',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-63',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'100',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-64',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'110',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-65',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'120',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-66',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'211',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-67',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'139',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-68',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'84',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-69',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'155',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-70',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'80',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-71',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'94',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-72',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'167',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-73',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'83',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-74',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'111',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-75',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'170',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-76',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'90',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-77',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'167',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-78',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'100',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-79',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'153',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-80',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'130',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-81',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'90',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-82',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'92',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-83',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'109',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-84',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'210',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-85',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'98',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-86',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'140',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-87',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'120',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-88',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'166',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-89',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'88',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-90',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'91',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-91',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'120',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-92',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'122',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-93',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-94',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'86',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-95',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'140',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-96',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'82',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-97',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'120',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-98',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'196',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-99',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'128',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-198',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'137',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'124',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-101',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'155',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-102',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'110',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-103',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'190',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-104',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'100',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-105',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'165',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-106',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'110',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-107',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'55',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-108',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'89',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-109',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'85',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-110',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'115',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-111',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'65',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-112',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'101',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-199',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'60',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-113',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'70',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-114',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'74',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-115',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'90',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-116',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'92',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-117',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'108',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-118',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'135',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-119',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'107',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-120',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'100',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-121',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'165',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-122',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'77',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'88',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-124',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'135',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-125',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'115',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-126',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'70',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-127',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'107',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-128',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'85',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-129',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'95',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-130',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'81',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-131',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'180',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-132',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'150',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-200',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'110',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-133',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'100',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-134',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'180',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-135',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'113',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-136',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'108',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-137',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'150',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-138',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'120',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-139',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'140',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-140',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'102',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-141',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'64',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-142',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'164',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-143',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'99',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-144',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'180',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-145',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'76',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-146',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'90',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-201',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'110',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-147',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'101',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-148',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'81',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-149',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'52',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-150',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'150',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-151',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'140',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-152',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'130',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-153',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'180',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-154',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'105',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-155',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'180',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-202',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'125',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-156',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'121',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-157',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'133',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-158',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'44',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-159',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'145',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-160',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'92',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-161',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'80',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-162',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'59',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-163',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'70',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-164',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'108',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-165',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'120',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-166',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'82',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-167',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'86',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-168',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'52',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-203',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'70',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-169',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'98',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-170',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'130',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-171',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'95',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'101',NULL,'1',NULL,NULL);
INSERT INTO heber_109 VALUES ('-173',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'86',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-174',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'104',NULL,'0',NULL,NULL);
INSERT INTO heber_109 VALUES ('-175',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'156',NULL,'1',NULL,NULL);



# ----------------------------------------------------------
#
# structur for Table 'heber_wk_109'
#
CREATE TABLE heber_wk_109 (
    IdHeber int(11),
    Versuch int(11),
    Reissen int(11),
    Stossen int(11),
    Technik_Reissen float(11,2),
    Technik_Stossen float(11,2),
    Div_Wert_R int(11),
    Div_Wert_S int(11),
    Gueltig_Reissen text,
    Gueltig_Stossen text,
    Reissen_Verzicht int(11),
    Stossen_Verzicht int(11),
    time_Reissen int(11),
    time_Stossen int(11),
    NH_Reissen int(11),
    NH_Stossen int(11),
    G_Reissen_1 text,
    G_Stossen_1 text,
    G_Reissen_2 text,
    G_Stossen_2 text,
    G_Reissen_3 text,
    G_Stossen_3 text,
    Time_Reissen_1 int(11),
    Time_Stossen_1 int(11),
    Time_Reissen_2 int(11),
    Time_Stossen_2 int(11),
    Time_Reissen_3 int(11),
    Time_Stossen_3 int(11),
    TeWert_Reissen_1 float(11,2),
    TeWert_Stossen_1 float(11,2),
    TeWert_Reissen_2 float(11,2),
    TeWert_Stossen_2 float(11,2),
    TeWert_Reissen_3 float(11,2),
    TeWert_Stossen_3 float(11,2)
);
# ----------------------------------------------------------
#
INSERT INTO heber_wk_109 VALUES ('-43','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-43','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-43','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-44','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-44','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-44','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-45','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-45','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-45','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-46','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-46','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-46','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-47','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-47','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-47','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-48','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-48','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-48','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-49','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-49','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-49','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-50','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-50','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-50','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-51','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-51','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-51','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-52','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-52','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-52','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-53','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-53','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-53','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-54','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-54','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-54','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-55','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-55','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-55','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-56','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-56','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-56','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-57','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-57','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-57','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-58','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-58','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-58','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-59','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-59','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-59','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-60','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-60','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-60','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-61','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-61','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-61','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-62','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-62','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-62','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-63','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-63','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-63','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-64','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-64','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-64','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-65','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-65','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-65','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-66','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-66','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-66','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-67','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-67','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-67','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-68','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-68','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-68','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-69','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-69','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-69','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-70','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-70','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-70','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-71','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-71','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-71','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-72','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-72','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-72','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-73','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-73','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-73','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-74','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-74','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-74','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-75','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-75','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-75','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-76','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-76','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-76','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-77','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-77','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-77','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-78','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-78','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-78','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-79','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-79','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-79','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-80','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-80','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-80','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-81','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-81','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-81','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-82','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-82','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-82','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-83','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-83','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-83','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-84','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-84','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-84','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-85','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-85','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-85','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-86','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-86','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-86','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-87','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-87','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-87','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-88','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-88','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-88','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-89','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-89','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-89','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-90','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-90','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-90','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-91','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-91','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-91','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-92','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-92','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-92','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-93','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-93','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-93','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-94','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-94','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-94','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-95','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-95','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-95','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-96','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-96','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-96','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-97','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-97','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-97','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-98','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-98','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-98','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-99','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-99','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-99','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-198','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-198','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-198','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-100','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-100','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-100','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-101','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-101','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-101','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-102','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-102','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-102','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-103','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-103','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-103','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-104','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-104','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-104','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-105','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-105','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-105','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-106','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-106','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-106','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-107','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-107','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-107','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-108','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-108','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-108','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-109','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-109','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-109','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-110','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-110','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-110','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-111','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-111','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-111','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-112','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-112','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-112','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-199','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-199','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-199','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-113','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-113','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-113','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-114','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-114','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-114','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-115','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-115','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-115','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-116','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-116','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-116','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-117','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-117','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-117','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-118','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-118','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-118','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-119','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-119','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-119','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-120','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-120','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-120','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-121','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-121','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-121','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-122','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-122','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-122','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-123','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-123','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-123','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-124','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-124','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-124','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-125','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-125','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-125','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-126','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-126','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-126','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-127','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-127','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-127','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-128','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-128','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-128','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-129','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-129','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-129','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-130','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-130','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-130','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-131','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-131','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-131','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-132','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-132','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-132','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-200','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-200','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-200','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-133','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-133','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-133','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-134','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-134','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-134','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-135','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-135','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-135','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-136','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-136','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-136','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-137','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-137','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-137','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-138','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-138','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-138','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-139','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-139','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-139','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-140','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-140','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-140','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-141','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-141','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-141','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-142','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-142','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-142','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-143','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-143','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-143','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-144','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-144','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-144','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-145','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-145','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-145','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-146','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-146','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-146','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-201','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-201','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-201','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-147','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-147','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-147','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-148','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-148','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-148','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-149','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-149','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-149','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-150','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-150','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-150','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-151','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-151','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-151','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-152','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-152','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-152','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-153','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-153','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-153','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-154','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-154','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-154','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-155','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-155','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-155','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-202','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-202','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-202','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-156','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-156','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-156','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-157','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-157','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-157','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-158','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-158','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-158','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-159','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-159','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-159','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-160','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-160','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-160','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-161','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-161','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-161','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-162','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-162','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-162','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-163','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-163','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-163','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-164','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-164','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-164','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-165','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-165','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-165','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-166','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-166','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-166','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-167','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-167','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-167','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-168','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-168','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-168','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-203','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-203','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-203','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-169','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-169','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-169','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-170','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-170','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-170','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-171','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-171','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-171','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-172','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-172','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-172','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-173','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-173','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-173','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-174','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-174','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-174','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-175','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-175','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO heber_wk_109 VALUES ('-175','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);



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
# structur for Table 'laenderwertung_109'
#
CREATE TABLE laenderwertung_109 (
    Ver_Lan_Sta text,
    Lw_Punkte float(11,1),
    Lw_Platz int(11)
);
# ----------------------------------------------------------
#



# ----------------------------------------------------------
#
# structur for Table 'mannschaften_109'
#
CREATE TABLE mannschaften_109 (
    IdVerein int(11),
    Anzahl_M int(11)
);
# ----------------------------------------------------------
#
INSERT INTO mannschaften_109 VALUES ('-3','0');
INSERT INTO mannschaften_109 VALUES ('-4','1');
INSERT INTO mannschaften_109 VALUES ('-5','0');
INSERT INTO mannschaften_109 VALUES ('-6','1');
INSERT INTO mannschaften_109 VALUES ('-7','1');
INSERT INTO mannschaften_109 VALUES ('-8','0');
INSERT INTO mannschaften_109 VALUES ('-9','0');
INSERT INTO mannschaften_109 VALUES ('-10','0');
INSERT INTO mannschaften_109 VALUES ('-11','0');
INSERT INTO mannschaften_109 VALUES ('-12','0');
INSERT INTO mannschaften_109 VALUES ('-13','1');
INSERT INTO mannschaften_109 VALUES ('-14','1');
INSERT INTO mannschaften_109 VALUES ('-15','1');
INSERT INTO mannschaften_109 VALUES ('-16','1');
INSERT INTO mannschaften_109 VALUES ('-17','0');
INSERT INTO mannschaften_109 VALUES ('-18','1');
INSERT INTO mannschaften_109 VALUES ('-19','1');
INSERT INTO mannschaften_109 VALUES ('-20','0');
INSERT INTO mannschaften_109 VALUES ('-21','1');
INSERT INTO mannschaften_109 VALUES ('-22','1');
INSERT INTO mannschaften_109 VALUES ('-23','0');
INSERT INTO mannschaften_109 VALUES ('-24','0');
INSERT INTO mannschaften_109 VALUES ('-25','1');
INSERT INTO mannschaften_109 VALUES ('-26','0');
INSERT INTO mannschaften_109 VALUES ('-27','0');
INSERT INTO mannschaften_109 VALUES ('-28','0');
INSERT INTO mannschaften_109 VALUES ('-29','0');
INSERT INTO mannschaften_109 VALUES ('-30','0');
INSERT INTO mannschaften_109 VALUES ('-31','0');
INSERT INTO mannschaften_109 VALUES ('-32','0');
INSERT INTO mannschaften_109 VALUES ('-33','0');
INSERT INTO mannschaften_109 VALUES ('-34','0');
INSERT INTO mannschaften_109 VALUES ('-35','0');
INSERT INTO mannschaften_109 VALUES ('-36','0');
INSERT INTO mannschaften_109 VALUES ('-37','0');
INSERT INTO mannschaften_109 VALUES ('-38','0');
INSERT INTO mannschaften_109 VALUES ('-39','0');
INSERT INTO mannschaften_109 VALUES ('-40','0');
INSERT INTO mannschaften_109 VALUES ('-41','0');
INSERT INTO mannschaften_109 VALUES ('-42','0');
INSERT INTO mannschaften_109 VALUES ('-43','0');
INSERT INTO mannschaften_109 VALUES ('-44','0');
INSERT INTO mannschaften_109 VALUES ('-45','1');
INSERT INTO mannschaften_109 VALUES ('-46','0');
INSERT INTO mannschaften_109 VALUES ('-47','0');
INSERT INTO mannschaften_109 VALUES ('-48','0');
INSERT INTO mannschaften_109 VALUES ('-49','0');
INSERT INTO mannschaften_109 VALUES ('-50','0');
INSERT INTO mannschaften_109 VALUES ('-51','0');
INSERT INTO mannschaften_109 VALUES ('-52','0');
INSERT INTO mannschaften_109 VALUES ('-53','0');



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
# structur for Table 'robi_faktoren_men_standart'
#
CREATE TABLE robi_faktoren_men_standart (
    Id int(11),
    GwKl int(11),
    WeltRekord int(11)
);
# ----------------------------------------------------------
#
INSERT INTO robi_faktoren_men_standart VALUES ('1','55','293');
INSERT INTO robi_faktoren_men_standart VALUES ('2','61','312');
INSERT INTO robi_faktoren_men_standart VALUES ('3','67','331');
INSERT INTO robi_faktoren_men_standart VALUES ('4','73','348');
INSERT INTO robi_faktoren_men_standart VALUES ('5','81','368');
INSERT INTO robi_faktoren_men_standart VALUES ('6','89','387');
INSERT INTO robi_faktoren_men_standart VALUES ('7','96','401');
INSERT INTO robi_faktoren_men_standart VALUES ('8','102','412');
INSERT INTO robi_faktoren_men_standart VALUES ('9','109','424');
INSERT INTO robi_faktoren_men_standart VALUES ('10','1','453');



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
# structur for Table 'robi_faktoren_women_standart'
#
CREATE TABLE robi_faktoren_women_standart (
    Id int(11),
    GwKl int(11),
    WeltRekord int(11)
);
# ----------------------------------------------------------
#
INSERT INTO robi_faktoren_women_standart VALUES ('1','45','191');
INSERT INTO robi_faktoren_women_standart VALUES ('2','49','203');
INSERT INTO robi_faktoren_women_standart VALUES ('3','55','221');
INSERT INTO robi_faktoren_women_standart VALUES ('4','59','232');
INSERT INTO robi_faktoren_women_standart VALUES ('5','64','245');
INSERT INTO robi_faktoren_women_standart VALUES ('6','71','261');
INSERT INTO robi_faktoren_women_standart VALUES ('7','76','272');
INSERT INTO robi_faktoren_women_standart VALUES ('8','81','283');
INSERT INTO robi_faktoren_women_standart VALUES ('9','87','294');
INSERT INTO robi_faktoren_women_standart VALUES ('10','1','320');



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
# structur for Table 'stammdaten_wk_109'
#
CREATE TABLE stammdaten_wk_109 (
    Heber_pro_M int(11),
    min_heber_pro_mann int(11),
    Meisterschaft text,
    Ort text,
    Datum text,
    Wk_Art text,
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
    Urkunden_hoehe int(11),
    Anzahl_Heber_p_S int(11),
    Flagge int(11),
    International int(11),
    passwort text,
    GesGrpAlKl text,
    LosNummern int(11),
    Zeitnehmer int(11),
    HHP_Hardware int(11),
    Mannschaft_Auswahl int(11),
    UrkName1 text,
    UrkName2 text,
    UrkName3 text,
    UrkName4 text,
    Online_Wk int(11),
    Online_Id_Wk varchar(32),
    Grp_Einteilung int(11),
    mannschaft_nach_relativ int(11),
    Uebersicht_Font double(11,1),
    RelativArt int(11),
    RobiVorfaktor float(11,2),
    Kommentar text,
    StartNr int(11)
);
# ----------------------------------------------------------
#
INSERT INTO stammdaten_wk_109 VALUES ('4','4',NULL,'Ingolstadt','2019-11-15','M_m_T',NULL,'0.50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','0','0','12','14','25','0','0',NULL,'Aktive','1','0','0','0',NULL,NULL,NULL,NULL,'1','74FB1278553B4AFE94C57D9872DFBBCC','0','0','1.1','1','1.00',NULL,'0');



# ----------------------------------------------------------
#
# structur for Table 'startgebuehren_109'
#
CREATE TABLE startgebuehren_109 (
    E_Erw float(11,2),
    M_Erw float(11,2),
    Nach_Meldung_Euro float(11,2)
);
# ----------------------------------------------------------
#
INSERT INTO startgebuehren_109 VALUES ('0.00','0.00',NULL);



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
INSERT INTO tmp_anzeige_wk_1 VALUES ('107');



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
INSERT INTO tmp_db VALUES ('109');



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
INSERT INTO tmp_gerd_1 VALUES ('-1','Stossen','-1','-1','','','','0.00','0');



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
INSERT INTO tmp_letzter_heber_1 VALUES ('-181','Stossen','3');



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
INSERT INTO tmp_reload_1 VALUES ('0','-1','-1','Stossen','1');



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
    Id int(11),
    AnsagerR int(11),
    HeberRaumR int(11),
    UebersichtR int(11),
    Wk_Leiter int(11)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_ss_reload_1 VALUES ('1','1','1','1','1');



# ----------------------------------------------------------
#
# structur for Table 'tmp_ss_reload_2'
#
CREATE TABLE tmp_ss_reload_2 (
    Id int(11),
    AnsagerR int(11),
    HeberRaumR int(11),
    UebersichtR int(11),
    Wk_Leiter int(11)
);
# ----------------------------------------------------------
#
INSERT INTO tmp_ss_reload_2 VALUES ('1','1','1','1','1');



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
INSERT INTO tmp_uebernaechster_heber_1 VALUES ('-181');



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
INSERT INTO tmp_uebersichtmk_reload VALUES ('73');



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
# structur for Table 'user_blocker_109'
#
CREATE TABLE user_blocker_109 (
    MeldelisteAnlegen int(11),
    GrpEinteilung int(11),
    Wiegeliste int(11),
    WkBridge1 int(11),
    WkBridge2 int(11)
);
# ----------------------------------------------------------
#
INSERT INTO user_blocker_109 VALUES ('0','0','0','0','0');



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
INSERT INTO verein VALUES ('TSV  Heinsheim e.V.','-53','1','2');
INSERT INTO verein VALUES ('Eichenauer SV e.V.','-52','1','3');
INSERT INTO verein VALUES ('SGV Oberböbingen ´20 e.V.','-51','1','2');
INSERT INTO verein VALUES ('SV 08 Laufenburg e.V.','-50','1','2');
INSERT INTO verein VALUES ('ESV München-Neuaubing','-49','1','3');
INSERT INTO verein VALUES ('Breitunger AV e.V.','-48','1','17');
INSERT INTO verein VALUES ('BSC Kenpokan e.V.','-47','1','10');
INSERT INTO verein VALUES ('TSV Waldkirchen e.V.','-46','1','3');
INSERT INTO verein VALUES ('SV 90 Gräfenroda e.V.','-45','1','17');
INSERT INTO verein VALUES ('AC Suhl e.V.','-44','1','17');
INSERT INTO verein VALUES ('SV Empor Berlin e.V.','-43','1','4');
INSERT INTO verein VALUES ('ASV Herbsleben e.V.','-42','1','17');
INSERT INTO verein VALUES ('NSAC Görlitz e.V.','-41','1','14');
INSERT INTO verein VALUES ('TV Ettenheim e.V.','-40','1','2');
INSERT INTO verein VALUES ('ESV München-Ost e.V.','-39','1','3');
INSERT INTO verein VALUES ('TSV BW 65 Schwedt e.V.','-38','1','5');
INSERT INTO verein VALUES ('AC Meißen e. V.','-37','1','14');
INSERT INTO verein VALUES ('GV Eisenbach 1976 e.V. ','-36','1','2');
INSERT INTO verein VALUES ('ESV Loko. Mühlhausen','-35','1','17');
INSERT INTO verein VALUES ('FTG 1900 Pfungstadt e. V.','-34','1','8');
INSERT INTO verein VALUES ('TSV Burgau e.V.','-33','1','3');
INSERT INTO verein VALUES ('KSV 1959 Langen e.V.','-32','1','8');
INSERT INTO verein VALUES ('SSV Höchstädt','-31','1','3');
INSERT INTO verein VALUES ('FAC Sangerhausen e. V.','-30','1','15');
INSERT INTO verein VALUES ('TB 03 Roding e.V.','-29','1','3');
INSERT INTO verein VALUES ('Berliner TSC e.V.','-28','1','4');
INSERT INTO verein VALUES ('TSV Ingolstadt-Nord e.V.','-27','1','3');
INSERT INTO verein VALUES ('KSV Sömmerda 1910 e.V.','-26','1','17');
INSERT INTO verein VALUES ('USC Viadrina Frankfurt','-25','1','5');
INSERT INTO verein VALUES ('SV Motor Eberswalde e.V.','-24','1','5');
INSERT INTO verein VALUES ('TSG Angermünde e.V.','-23','1','5');
INSERT INTO verein VALUES ('SV Germania Obrigheim','-22','1','2');
INSERT INTO verein VALUES ('SG Fortschritt Eibau e.V.','-21','1','14');
INSERT INTO verein VALUES ('AC Potsdam e.V.','-20','1','5');
INSERT INTO verein VALUES ('KraftWerkstatt Lörrach e.V.','-19','1','2');
INSERT INTO verein VALUES ('ASK Frankfurt (Oder) e.V.','-18','1','5');
INSERT INTO verein VALUES ('SSV 1952 Torgau e.V.','-17','1','14');
INSERT INTO verein VALUES ('TV Feldrennach 1896 e.V.','-16','1','2');
INSERT INTO verein VALUES ('AC Atlas Plauen e.V.','-15','1','14');
INSERT INTO verein VALUES ('Chemnitzer AC e.V.','-14','1','14');
INSERT INTO verein VALUES ('TSV Röthenbach e.V.','-13','1','3');
INSERT INTO verein VALUES ('WFC Nagold e.V.','-12','1','2');
INSERT INTO verein VALUES ('AC 1892 Weinheim e. V.','-11','1','2');
INSERT INTO verein VALUES ('AC Germania St. Ilgen e.V.','-10','1','2');
INSERT INTO verein VALUES ('ASV 1860 Neumarkt e.V.','-9','1','3');
INSERT INTO verein VALUES ('Kylltalheber Ehrang 1973','-8','1','12');
INSERT INTO verein VALUES ('Riesaer AC 1969 e.V.','-7','1','14');
INSERT INTO verein VALUES ('KSV Grünstadt e.V.','-6','1','12');
INSERT INTO verein VALUES ('1. KSV 1896 Durlach e.V.','-5','1','2');
INSERT INTO verein VALUES ('ASV 1932 Schleusingen','-4','1','17');
INSERT INTO verein VALUES ('Kraft-Werk Schwarzach e.V.','-3','1','2');
INSERT INTO verein VALUES ('Testverein2','-2','1','2');
INSERT INTO verein VALUES ('Testverein','-1','1','2');
INSERT INTO verein VALUES ('Kein Verein','9000','1','2');



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
INSERT INTO versions_tabelle VALUES ('1','1.042');



# ----------------------------------------------------------
#
# structur for Table 'wk_reload_109'
#
CREATE TABLE wk_reload_109 (
    Id_Iteration int(11),
    Bridge1 int(11),
    Bridge2 int(11),
    Grp int(11)
);
# ----------------------------------------------------------
#
INSERT INTO wk_reload_109 VALUES ('1','0','0','0');


