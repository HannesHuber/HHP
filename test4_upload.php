<?php
ob_start();
//error_reporting(0);

include 'funktionen/db_verbindung.php';

$db=dbVerbindung();
$db_Online=dbVerbindungOnline();		//Sorgt für Online Con

$data_a_db['S_Db']=41;	// Auswertung von WK X Am ende von Wk hochladen

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_$data_a_db[S_Db]");
$stammdaten = mysqli_fetch_assoc($datenbank);

$Online_Wk_Id=$stammdaten['Online_Id_Wk'];

date_default_timezone_set("Europe/Berlin");
$timestamp=date("Y-m-d H:i:s");

function getVerein($IdVerein){
    global $db;
    $SQL_Verein = dbBefehl("SELECT * FROM verein WHERE IdVerein='$IdVerein'");
    $D_Verein = mysqli_fetch_assoc($SQL_Verein);
    $Verein=$D_Verein['Verein'];
    
    return $Verein;
}

/*
$Creat=1;		//Nummer hinter Tabelle Auswertung_
//Auswertung_2

dbBefehlOnline("CREATE TABLE auswertung_TEST_$Creat(
		IdHeber INT,
		K_Gewicht float(11,2),
		R_Gewicht float(11,2),
		R_1 INT,
		R_2 INT,
		R_3 INT,
		S_1 INT,
		S_2 INT,
		S_3 INT,
		R_1_Ver INT,
		R_2_Ver INT,
		R_3_Ver INT,
		S_1_Ver INT,
		S_2_Ver INT,
		S_3_Ver INT,
		R_B INT,
		S_B INT,
		Z_K INT,
		Relativ_P float(11,1)
		) ");

*/


$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_$data_a_db[S_Db], verein, heber_$data_a_db[S_Db]
		WHERE auswertung_$data_a_db[S_Db].IdHeber = heber.IdHeber
		AND heber.IdVerein = verein.IdVerein
        AND heber.IdHeber = heber_$data_a_db[S_Db].IdHeber
		ORDER BY 
		auswertung_$data_a_db[S_Db].Relativ_P DESC");

//$online=dbBefehlOnline("SELECT * FROM transferstatus");

while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{
if($dsatz_aus['Id_Online_Db']!=''){
    
//Konvertiert Ungültig zu negativem ergebniss
for($b=0;$b<2;$b++){
	
	if($b==0) $VorsatzB='R';
	else 	  $VorsatzB='S';

	for($i=1;$i<=3;$i++){
		$query_Abfrage=$VorsatzB.'_'.$i;
		$query_Abfrage_Gueltig=$VorsatzB.'_'.$i.'_G';
		
		if($dsatz_aus[$query_Abfrage_Gueltig] == 'Nein'){
			$dsatz_aus[$query_Abfrage]= - $dsatz_aus[$query_Abfrage];
		}
			
	}
}

//ermittle Verzicht
$Verzicht_feld='';
$zaehler=0;
for($b=0;$b<2;$b++){
    
    if($b==0) $VorsatzB='R';
    else 	  $VorsatzB='S';
    
    for($i=1;$i<=3;$i++){
        $Abfrage=$VorsatzB.'_'.$i.'_Ver';
        $Value_Verzicht=$VorsatzB.$i;
        if($dsatz_aus[$Abfrage]==1){
            $zaehler++;
            if($zaehler==1)
                $Verzicht_feld=$Value_Verzicht;
            else
                $Verzicht_feld=$Verzicht_feld.','.$Value_Verzicht;
        }
    }
}


echo $Verzicht_feld.'<br>';

$reissen_Relativ=$dsatz_aus['R_B'] - $dsatz_aus['R_Gewicht'];
if($reissen_Relativ<0) $reissen_Relativ=0;

$stossen_Relativ=$dsatz_aus['S_B'] - $dsatz_aus['R_Gewicht'];
if($stossen_Relativ<0) $stossen_Relativ=0;

$SQL="UPDATE teilnahme
                SET athlet_gewicht= '$dsatz_aus[K_Gewicht]', athlet_relativabzug= '$dsatz_aus[R_Gewicht]', 
                reissen1='$dsatz_aus[R_1]', reissen2='$dsatz_aus[R_2]', reissen3='$dsatz_aus[R_3]', reissen_punkte='$reissen_Relativ',
                stossen1='$dsatz_aus[S_1]', stossen2='$dsatz_aus[S_2]', stossen3='$dsatz_aus[S_3]', stossen_punkte='$stossen_Relativ',
                zweikampf='$dsatz_aus[Z_K]', zweikampf_punkte='$dsatz_aus[Relativ_P]', verzicht='$Verzicht_feld', updatetimestamp='$timestamp'

                WHERE athlet_cas_gguid ='$dsatz_aus[Id_Online_Db]'
                AND wettkampf_cas_guid ='$Online_Wk_Id'
                                ";	
dbBefehlOnline($SQL);
		
	
}//Ende If keine OnlineId

}



$SQL_Ergebniss = dbBefehl("SELECT * FROM bl_vereins_auswahl_$data_a_db[S_Db]");
$Data = mysqli_fetch_assoc($SQL_Ergebniss);

$IdHeim=$Data['Verein1'];
$IdGast=$Data['Verein2'];
$IdGast2=$Data['Verein3'];

$Heim=getVerein($IdHeim);
$Gast=getVerein($IdGast);
$Gast2=getVerein($IdGast2);

$Erg_Heim=$Data['RuS_Pt_V1'];
$Erg_Gast=$Data['RuS_Pt_V2'];
$Erg_Gast2=$Data['RuS_Pt_V3'];

$Pkt_Heim=$Data['Ergebniss_V1'];
$Pkt_Gast=$Data['Ergebniss_V2'];
$Pkt_Gast2=$Data['Ergebniss_V3'];

if($Erg_Heim>$Erg_Gast && $Erg_Heim>$Erg_Gast2) $Sieger=$Heim;
if($Erg_Gast>$Erg_Heim && $Erg_Gast>$Erg_Gast2) $Sieger=$Gast;
if($Erg_Gast2>$Erg_Heim && $Erg_Gast2>$Erg_Gast) $Sieger=$Gast2;

//Status=3 bedeutet erfolgreicher upload
$SQL_erfolgreicher_Upload="UPDATE wettkampf
		SET status='3', updatetimestamp='$timestamp', Heim_Ergebnis='$Erg_Heim', Gast_Ergebnis='$Erg_Gast', Gast2_Ergebnis='$Erg_Gast2',
            Heim_Punkte='$Pkt_Heim', Gast_Punkte='$Pkt_Gast', Gast2_Punkte='$Pkt_Gast2', Sieger='$Sieger'
		WHERE cas_gguid ='$Online_Wk_Id'
		";
dbBefehlOnline($SQL_erfolgreicher_Upload);

//Es fehlen noch status anpassung (mit absicht)

mysqli_close($db_Online);



