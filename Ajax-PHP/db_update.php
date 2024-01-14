<?php
@set_time_limit(0);	//Damit Script so lange ausführen darf wie es will

header('Content-Type: text/html; charset=utf-8'); // sorgt für die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

$Version_Now = $_POST['version'];

include '../funktionen/db_verbindung.php';
include '../Outsorst/start_tabellen_erstellen.php';


function PruefeObFeldExistiertSonstAnlegen($tabellenname, $feldname, $feldArt){
    global $db;



    //Pruefe ob tmp_ss_reload_$bridge ist erweiter (Seit Bundesliga Neu 23.09.2018)
    $result = dbBefehl("SHOW COLUMNS FROM $tabellenname");

    $_tablespecs = array();   // alle Properties aller Felder der Tabelle
    $_record = array();       // Zwischenpuffer für die Abfrage


    while($_record = mysqli_fetch_assoc($result))
    {
        $_tablespecs[$_record['Field']] = $_record;
    }

    if (isset($_tablespecs[$feldname]))
    {
        //echo "Feld existiert.";
    }else{
        //echo "Feld existiert nicht.";
        $QueryAlter="ALTER TABLE $tabellenname ADD $feldname $feldArt";
        dbBefehl($QueryAlter);

    }
}

$db=dbVerbindung();

$Version_Data = dbBefehl('Select * From versions_tabelle Where Id="1"');
$Version_DB = mysqli_fetch_assoc($Version_Data);

$Version=$Version_DB['Versionsnummer'];


//if($Version<1.001){
    //Prüfe Ob Feld Existiert sonst Anlegen:    PrüfeObFeldExistiertSonstAnlegen($tabellenname, $feldname, $feldArt)
    //Neues Feld in tmp_ss_reload seit 23.09.2018
PruefeObFeldExistiertSonstAnlegen("tmp_ss_reload_1","UebersichtR","INT");
PruefeObFeldExistiertSonstAnlegen("tmp_ss_reload_2","UebersichtR","INT");

    //Korrigiere Relativabzug:
    $RelQuery="SELECT * FROM relativtabzug WHERE Gewicht='74'";
    $RelRes = dbBefehl($RelQuery);
    $Relativtabelle = mysqli_fetch_assoc($RelRes);

    if($Relativtabelle['Frauen']== 40){
        dbBefehl("UPDATE relativtabzug
				    SET Frauen= '39.5'
				    WHERE Gewicht ='74'");
    }
    //Korrektur Ende!
   // $Version=1.001;
//}

if($Version<1.002){

    dbBefehl("DROP TABLE gewichtsklassen");
    dbBefehl("CREATE TABLE gewichtsklassen(
                Id INT,
                Kinder_M INT,
                Kinder_W INT,
                Schüler_M INT,
                Schüler_W INT,
                Jugend_M INT,
                Jugend_W INT,
                Aktive_M INT,
                Aktive_W INT
                )
           ");
    dbBefehl("INSERT INTO gewichtsklassen (Id,Kinder_M, Kinder_W, Schüler_M, Schüler_W, Jugend_M, Jugend_W, Aktive_M, Aktive_W)
                      Values
                        ('1','25','25','35','35','49','40','55','45'),
                        ('2','30','30','40','40','55','45','61','49'),
                        ('3','35','35','45','45','61','49','67','55'),
                        ('4','40','40','49','49','67','55','73','59'),
                        ('5','45','45','55','55','73','59','81','64'),
                        ('6','49','49','61','59','81','64','89','71'),
                        ('7','55','55','67','64','89','71','96','76'),
                        ('8','61','59','73','71','96','76','102','81'),
                        ('9','67','1','81','76','102','81','109','87'),
                        ('10','1','0','89','1', '1', '1',  '1',  '1'),
                        ('11','0','0','96','0','0','0','0','0'),
                        ('12','0','0','1', '0','0','0','0','0')
    ");

    $Version=1.002;
}


if($Version<1.026){

    dbBefehl("CREATE TABLE robi_faktor_b(
                Id INT,
                B double
                )
           ");

    dbBefehl("INSERT INTO robi_faktor_b (Id,B)
                      Values
                        ('1','3.3219281')
    ");


    dbBefehl("CREATE TABLE robi_faktoren_men_aktive(
                Id INT,
                GwKl INT,
                WeltRekord INT
                )
           ");

    dbBefehl("CREATE TABLE robi_faktoren_women_aktive(
                Id INT,
                GwKl INT,
                WeltRekord INT
                )
           ");

    dbBefehl("INSERT INTO robi_faktoren_men_aktive (Id,GwKl, WeltRekord)
                      Values
                        ('1','55','293'),
                        ('2','61','317'),
                        ('3','67','339'),
                        ('4','73','362'),
                        ('5','81','375'),
                        ('6','89','387'),
                        ('7','96','416'),
                        ('8','102','412'),
                        ('9','109','435'),
                        ('10','1','478')
    ");

    dbBefehl("INSERT INTO robi_faktoren_women_aktive (Id,GwKl, WeltRekord)
                      Values
                        ('1','45','191'),
                        ('2','49','210'),
                        ('3','55','232'),
                        ('4','59','243'),
                        ('5','64','257'),
                        ('6','71','267'),
                        ('7','76','278'),
                        ('8','81','283'),
                        ('9','87','294'),
                        ('10','1','331')
    ");


    dbBefehl("CREATE TABLE robi_faktoren_men_junioren(
                Id INT,
                GwKl INT,
                WeltRekord INT
                )
           ");

    dbBefehl("CREATE TABLE robi_faktoren_women_junioren(
                Id INT,
                GwKl INT,
                WeltRekord INT
                )
           ");

    dbBefehl("INSERT INTO robi_faktoren_men_junioren (Id,GwKl, WeltRekord)
                      Values
                        ('1','55','264'),
                        ('2','61','293'),
                        ('3','67','316'),
                        ('4','73','344'),
                        ('5','81','372'),
                        ('6','89','371'),
                        ('7','96','397'),
                        ('8','102','392'),
                        ('9','109','410'),
                        ('10','1','432')
    ");

    dbBefehl("INSERT INTO robi_faktoren_women_junioren (Id,GwKl, WeltRekord)
                      Values
                        ('1','45','179'),
                        ('2','49','206'),
                        ('3','55','211'),
                        ('4','59','227'),
                        ('5','64','240'),
                        ('6','71','252'),
                        ('7','76','259'),
                        ('8','81','259'),
                        ('9','87','269'),
                        ('10','1','324')
    ");



    dbBefehl("CREATE TABLE robi_faktoren_men_schueler(
                Id INT,
                GwKl INT,
                WeltRekord INT
                )
           ");

    dbBefehl("CREATE TABLE robi_faktoren_women_schueler(
                Id INT,
                GwKl INT,
                WeltRekord INT
                )
           ");

    dbBefehl("INSERT INTO robi_faktoren_men_schueler (Id,GwKl, WeltRekord)
                      Values
                        ('1','49','220'),
                        ('2','55','248'),
                        ('3','61','263'),
                        ('4','67','297'),
                        ('5','73','306'),
                        ('6','81','327'),
                        ('7','89','342'),
                        ('8','96','350'),
                        ('9','102','353'),
                        ('10','1','352')
    ");

    dbBefehl("INSERT INTO robi_faktoren_women_schueler (Id,GwKl, WeltRekord)
                      Values
                        ('1','40','135'),
                        ('2','45','157'),
                        ('3','49','177'),
                        ('4','55','192'),
                        ('5','59','206'),
                        ('6','64','215'),
                        ('7','71','225'),
                        ('8','76','229'),
                        ('9','81','231'),
                        ('10','1','230')
    ");



    $Version=1.026;
}


if($Version<1.029){

	dbBefehl("CREATE TABLE robi_faktoren_men_standart(
                Id INT,
                GwKl INT,
                WeltRekord INT
                )
           ");

	dbBefehl("CREATE TABLE robi_faktoren_women_standart(
                Id INT,
                GwKl INT,
                WeltRekord INT
                )
           ");

	dbBefehl("INSERT INTO robi_faktoren_men_standart (Id,GwKl, WeltRekord)
                      Values
                        ('1','55','293'),
                        ('2','61','312'),
                        ('3','67','331'),
                        ('4','73','348'),
                        ('5','81','368'),
                        ('6','89','387'),
                        ('7','96','401'),
                        ('8','102','412'),
                        ('9','109','424'),
                        ('10','1','453')
    ");

	dbBefehl("INSERT INTO robi_faktoren_women_standart (Id,GwKl, WeltRekord)
                      Values
                        ('1','45','191'),
                        ('2','49','203'),
                        ('3','55','221'),
                        ('4','59','232'),
                        ('5','64','245'),
                        ('6','71','261'),
                        ('7','76','272'),
                        ('8','81','283'),
                        ('9','87','294'),
                        ('10','1','320')
    ");

	$Version=1.029;
}

if($Version<1.032){
    dbBefehl("DROP TABLE tmp_ss_reload_1");
    dbBefehl("CREATE TABLE tmp_ss_reload_1(
                Id INT,
                AnsagerR INT,
                HeberRaumR INT,
                UebersichtR INT,
                Wk_Leiter INT
                )
           ");

    dbBefehl("INSERT INTO tmp_ss_reload_1 (Id,AnsagerR, HeberRaumR,UebersichtR,Wk_Leiter)
                      Values
                        ('1','1','1','1','1')
    ");

    dbBefehl("DROP TABLE tmp_ss_reload_2");
    dbBefehl("CREATE TABLE tmp_ss_reload_2(
                Id INT,
                AnsagerR INT,
                HeberRaumR INT,
                UebersichtR INT,
                Wk_Leiter INT
                )
           ");

    dbBefehl("INSERT INTO tmp_ss_reload_2 (Id,AnsagerR, HeberRaumR,UebersichtR,Wk_Leiter)
                      Values
                        ('1','1','1','1','1')
    ");
}

if($Version<1.046){
	dbBefehl("CREATE TABLE tmp_absignal_1(
                Id INT,
                Kr1 INT,
                Kr2 INT,
                Kr3 INT,
				PRIMARY KEY(Id)
                )
           ");

	dbBefehl("INSERT INTO tmp_absignal_1 (Id,Kr1,Kr2,Kr3)
                      Values
                        ('1','0','0','0')
    ");


	dbBefehl("CREATE TABLE tmp_absignal_2(
                Id INT,
                Kr1 INT,
                Kr2 INT,
                Kr3 INT,
				PRIMARY KEY(Id)
                )
           ");

	dbBefehl("INSERT INTO tmp_absignal_2 (Id,Kr1,Kr2,Kr3)
                      Values
                        ('1','0','0','0')
    ");


}

if($Version<1.058){

  dbBefehl("CREATE TABLE skalierungsfaktoren(
                age INT,
                maennlich FLOAT(11,5),
                weiblich FLOAT(11,5),
				PRIMARY KEY(age)
                )
           ");


	dbBefehl("INSERT INTO skalierungsfaktoren (age, maennlich, weiblich)
                      Values
                        ('1','1','1'),
                        ('2','1','1'),
                        ('3','1','1'),
                        ('4','1','1'),
                        ('5','1','1'),
                        ('6','1','1'),
                        ('7','1','1'),
                        ('8','1','1'),
                        ('9','1','1'),
                        ('10','1','1'),
                        ('11','1','1'),
                        ('12','1','1'),
                        ('13','1','1'),
                        ('14','1','1'),
                        ('15','1','1'),
                        ('16','1','1'),
                        ('17','1','1'),
                        ('18','1','1'),
                        ('19','1','1'),
                        ('20','1','1'),
                        ('21','1','1'),
                        ('22','1','1'),
                        ('23','1','1'),
                        ('24','1','1'),
                        ('25','1','1'),
                        ('26','1','1'),
                        ('27','1','1'),
                        ('28','1','1'),
                        ('29','1','1'),
                        ('30','1','1'),
                        ('31','1','1'),
                        ('32','1','1'),
                        ('33','1','1'),
                        ('34','1','1'),
                        ('35','1','1'),
                        ('36','1','1'),
                        ('37','1','1'),
                        ('38','1','1'),
                        ('39','1','1'),
                        ('40','1','1'),
                        ('41','1','1'),
                        ('42','1','1'),
                        ('43','1','1'),
                        ('44','1','1'),
                        ('45','1','1'),
                        ('46','1','1'),
                        ('47','1','1'),
                        ('48','1','1'),
                        ('49','1','1'),
                        ('50','1','1'),
                        ('51','1','1'),
                        ('52','1','1'),
                        ('53','1','1'),
                        ('54','1','1'),
                        ('55','1','1'),
                        ('56','1','1'),
                        ('57','1','1'),
                        ('58','1','1'),
                        ('59','1','1'),
                        ('60','1','1'),
                        ('61','1','1'),
                        ('62','1','1'),
                        ('63','1','1'),
                        ('64','1','1'),
                        ('65','1','1'),
                        ('66','1','1'),
                        ('67','1','1'),
                        ('68','1','1'),
                        ('69','1','1'),
                        ('70','1','1'),
                        ('71','1','1'),
                        ('72','1','1'),
                        ('73','1','1'),
                        ('74','1','1'),
                        ('75','1','1'),
                        ('76','1','1'),
                        ('77','1','1'),
                        ('78','1','1'),
                        ('79','1','1'),
                        ('80','1','1'),
                        ('81','1','1'),
                        ('82','1','1'),
                        ('83','1','1'),
                        ('84','1','1'),
                        ('85','1','1'),
                        ('86','1','1'),
                        ('87','1','1'),
                        ('88','1','1'),
                        ('89','1','1'),
                        ('90','1','1'),
                        ('91','1','1'),
                        ('92','1','1'),
                        ('93','1','1'),
                        ('94','1','1'),
                        ('95','1','1'),
                        ('96','1','1'),
                        ('97','1','1'),
                        ('98','1','1'),
                        ('99','1','1'),
                        ('100','1','1'),
                        ('101','1','1'),
                        ('102','1','1'),
                        ('103','1','1'),
                        ('104','1','1'),
                        ('105','1','1'),
                        ('106','1','1'),
                        ('107','1','1'),
                        ('108','1','1'),
                        ('109','1','1')
    ");
}

if($Version<1.066){
  dbBefehl("UPDATE `alters_klassen_masters` SET `Von`='80',`Bis`='84' WHERE `Klasse`='AK10'");

	dbBefehl("INSERT INTO alters_klassen_masters (Von, Bis, Klasse)
                      Values
                        ('85','89','AK11'),
                        ('90','94','AK12'),
                        ('95','99','AK13')
    ");

}

if($Version<1.068){
  dbBefehl("ALTER TABLE `sinclair_alterstabellle` ADD `Al_Sin_Werte_W` FLOAT(11,3) NOT NULL AFTER `Al_Sin_Werte`");

  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.0' WHERE `Age`='30'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.016' WHERE `Age`='31'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.031' WHERE `Age`='32'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.046' WHERE `Age`='33'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.059' WHERE `Age`='34'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.072' WHERE `Age`='35'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.084' WHERE `Age`='36'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.097' WHERE `Age`='37'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.11' WHERE `Age`='38'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.124' WHERE `Age`='39'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.138' WHERE `Age`='40'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.153' WHERE `Age`='41'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.17' WHERE `Age`='42'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.187' WHERE `Age`='43'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.205' WHERE `Age`='44'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.223' WHERE `Age`='45'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.244' WHERE `Age`='46'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.265' WHERE `Age`='47'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.288' WHERE `Age`='48'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.313' WHERE `Age`='49'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.34' WHERE `Age`='50'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.369' WHERE `Age`='51'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.401' WHERE `Age`='52'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.435' WHERE `Age`='53'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.47' WHERE `Age`='54'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.507' WHERE `Age`='55'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.545' WHERE `Age`='56'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.585' WHERE `Age`='57'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.625' WHERE `Age`='58'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.665' WHERE `Age`='59'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.705' WHERE `Age`='60'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.744' WHERE `Age`='61'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.778' WHERE `Age`='62'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.808' WHERE `Age`='63'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.839' WHERE `Age`='64'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.873' WHERE `Age`='65'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.909' WHERE `Age`='66'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.948' WHERE `Age`='67'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='1.989' WHERE `Age`='68'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.033' WHERE `Age`='69'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.077' WHERE `Age`='70'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.12' WHERE `Age`='71'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.163' WHERE `Age`='72'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.214' WHERE `Age`='73'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.27' WHERE `Age`='74'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.327' WHERE `Age`='75'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.391' WHERE `Age`='76'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.465' WHERE `Age`='77'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.546' WHERE `Age`='78'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.629' WHERE `Age`='79'");
  dbBefehl("UPDATE `sinclair_alterstabellle` SET `Al_Sin_Werte_W`='2.714' WHERE `Age`='80'");
}



if($Version<1.112){
    // Connect to the database and clear the table
    dbBefehl("DELETE FROM `alters_klassen`");

    // Sample data for insertion
    $inserts = [
      ['Von' => 0, 'Bis' => 12, 'Klasse' => 'Kinder'],
      ['Von' => 13, 'Bis' => 15, 'Klasse' => 'Schüler'],
      ['Von' => 16, 'Bis' => 17, 'Klasse' => 'Jugend'],
      ['Von' => 18, 'Bis' => 20, 'Klasse' => 'Junioren'],
      ['Von' => 21, 'Bis' => 120, 'Klasse' => 'Aktive']
    ];

    foreach ($inserts as $insert) {
      $von = $insert['Von'];
      $bis = $insert['Bis'];
      $klasse = $insert['Klasse'];

      $sql = "INSERT INTO `alters_klassen` (`Von`, `Bis`, `Klasse`) VALUES ('$von', '$bis', '$klasse')";
      dbBefehl($sql);
    }

        // Connect to the database and clear the table
        dbBefehl("DELETE FROM `alters_klassen_zk`");

        // Sample data for insertion
        $inserts = [
          ['Von' => 0, 'Bis' => 12, 'Klasse' => 'Kinder'],
          ['Von' => 13, 'Bis' => 15, 'Klasse' => 'Schüler'],
          ['Von' => 16, 'Bis' => 17, 'Klasse' => 'Jugend'],
          ['Von' => 18, 'Bis' => 20, 'Klasse' => 'Junioren'],
          ['Von' => 21, 'Bis' => 120, 'Klasse' => 'Aktive']
        ];
        $i=0;
        foreach ($inserts as $insert) {
          $i++;
          $von = $insert['Von'];
          $bis = $insert['Bis'];
          $klasse = $insert['Klasse'];
    
          $sql = "INSERT INTO `alters_klassen_zk` (`Id`, `Von`, `Bis`, `Klasse`) VALUES ('$i','$von', '$bis', '$klasse')";
          dbBefehl($sql);
        }
}

if($Version<$Version_Now){ //Für Updates ohne änderung and DB
    $Version=$Version_Now;
}


dbBefehl("UPDATE versions_tabelle
             SET Versionsnummer= '$Version'
             WHERE Id ='1'
        ");

?>
