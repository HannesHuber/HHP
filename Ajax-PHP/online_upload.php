<?php
session_start();
ob_start();
error_reporting(1);
//error_reporting(0);



include '../funktionen/db_verbindung.php';

$db=dbVerbindung();
$db_Online=dbVerbindungOnline();		//Sorgt für Online Con

$data_a_db['S_Db']=$_SESSION['WeK'];	// Auswertung von WK X Am ende von Wk hochladen

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
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

function checkIfHeberExsits($IdHeber,$WkCas){
    global $db, $db_Online;

    $SQL_Online_Wk_Status=dbBefehlOnline("SELECT athlet_id FROM teilnahme_bl
                                            Where athlet_id='$IdHeber'
                                            AND wettkampf_cas_guid ='$WkCas' ");

    $Num = mysqli_num_rows($SQL_Online_Wk_Status);

    if($Num==0 || $Num=='') $Num=0;
    else $Num=1;

    return $Num;

}

$SQL_Online_Wk_Status=dbBefehlOnline("SELECT * FROM bundesliga Where cas_gguid='$Online_Wk_Id'");
$Data_status = mysqli_fetch_assoc($SQL_Online_Wk_Status);
$status=$Data_status['status'];

//Status 3 bedeutet Wettkampf wurde bereits hochgeladen

//UNGLEICH 3!!!!!!

if($status!=3 && $status!=4){

$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", verein, heber_".$data_a_db['S_Db']."
		WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
		AND heber.IdVerein = verein.IdVerein
        AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
        AND (heber_".$data_a_db['S_Db'].".Ausserkonkurrenz IS NULL OR heber_".$data_a_db['S_Db'].".Ausserkonkurrenz='')
		ORDER BY
		auswertung_".$data_a_db['S_Db'].".Relativ_P DESC");

//$online=dbBefehlOnline("SELECT * FROM transferstatus");

while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{

    // Assume that the current row is valid
    $isValid = true;

    // Check if any of the conditions for x = 1 are met:
    // R_1 or S_1 is 0, or R_1_G or S_1_G is null
    if ($dsatz_aus["R_1"] == 0 && $dsatz_aus["S_1"] == 0 ||
        $dsatz_aus["R_1_G"] === null && $dsatz_aus["S_1_G"] === null) {
            $isValid = false;
    }

    if (!$isValid) {
        continue;
    }

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

        //Ermittlung Verein
        if($dsatz_aus['Verein']==$Data_status['Heim']){
            $Verein='Heim';
        }elseif($dsatz_aus['Verein']==$Data_status['Gast']){
            $Verein='Gast';
        }elseif($dsatz_aus['Verein']==$Data_status['Gast2']){
            $Verein='Gast2';
        }



        $reissen_Relativ=$dsatz_aus['R_B'] - $dsatz_aus['R_Gewicht'];
        if($reissen_Relativ<0) $reissen_Relativ=0;

        $stossen_Relativ=$dsatz_aus['S_B'] - $dsatz_aus['R_Gewicht'];
        if($stossen_Relativ<0) $stossen_Relativ=0;

        $IdHeber=$dsatz_aus['Id_Online_Db'];
        //Für den Fall das Heber Lokal angelegt werden

        if($dsatz_aus['Name']==NULL)$dsatz_aus['Name']='';
        if($dsatz_aus['Vorname']==NULL)$dsatz_aus['Vorname']='';
        if($dsatz_aus['Jahrgang']==NULL)$dsatz_aus['Jahrgang']=0;
        if($Verein==NULL)$Verein='';

        if($dsatz_aus['R_1']==NULL)$dsatz_aus['R_1']=0;
        if($dsatz_aus['R_2']==NULL)$dsatz_aus['R_2']=0;
        if($dsatz_aus['R_3']==NULL)$dsatz_aus['R_3']=0;

        if($dsatz_aus['S_1']==NULL)$dsatz_aus['S_1']=0;
        if($dsatz_aus['S_2']==NULL)$dsatz_aus['S_2']=0;
        if($dsatz_aus['S_3']==NULL)$dsatz_aus['S_3']=0;

        //Setze Gewichte Erg auf 0 Wenn Heber nur im Reissen oder Stossen antritt:
        if($dsatz_aus['R_uo_S']==2){ //==2 bedeutet nur Stossen
            $dsatz_aus['R_1']=0;
            $dsatz_aus['R_2']=0;
            $dsatz_aus['R_3']=0;
        }

        if($dsatz_aus['R_uo_S']==1){ //==1 bedeutet nur Reissen
            $dsatz_aus['S_1']=0;
            $dsatz_aus['S_2']=0;
            $dsatz_aus['S_3']=0;
        }

        if($dsatz_aus['K_Gewicht']==NULL)$dsatz_aus['K_Gewicht']=0;
        if($dsatz_aus['R_Gewicht']==NULL)$dsatz_aus['R_Gewicht']=0;

        if($reissen_Relativ==NULL)$reissen_Relativ=0;
        if($stossen_Relativ==NULL)$stossen_Relativ=0;
        if($dsatz_aus['Z_K']==NULL)$dsatz_aus['Z_K']=0;
        if($dsatz_aus['Relativ_P']==NULL)$dsatz_aus['Relativ_P']=0;

        if($Verzicht_feld==NULL)$Verzicht_feld='';
        if($timestamp==NULL)$timestamp=0;


        if( checkIfHeberExsits($IdHeber,$Online_Wk_Id) == 1){   //Nicht nur ob Heber existiert sondern ob er für diesen wk existiert

        $SQL="UPDATE teilnahme_bl
                SET athlet_gewicht= '".$dsatz_aus['K_Gewicht']."', athlet_relativabzug= '".$dsatz_aus['R_Gewicht']."',
                reissen1='".$dsatz_aus['R_1']."', reissen2='".$dsatz_aus['R_2']."', reissen3='".$dsatz_aus['R_3']."', reissen_punkte='$reissen_Relativ',
                stossen1='".$dsatz_aus['S_1']."', stossen2='".$dsatz_aus['S_2']."', stossen3='".$dsatz_aus['S_3']."', stossen_punkte='$stossen_Relativ',
                zweikampf='".$dsatz_aus['Z_K']."', zweikampf_punkte='".$dsatz_aus['Relativ_P']."', verzicht='$Verzicht_feld', updatetimestamp='$timestamp',
                status= '3'
                WHERE athlet_id ='".$dsatz_aus['Id_Online_Db']."'
                AND wettkampf_cas_guid ='$Online_Wk_Id'
               ";
        }else{
            if($dsatz_aus['Id_Online_Db'] != 0 && $dsatz_aus['Id_Online_Db']!= NULL){

            if($dsatz_aus['Geschlecht']=='Weiblich') $Geschlecht='weiblich';
            else                                     $Geschlecht='männlich';

            $SQL="Insert Into teilnahme_bl
                    (athlet_name, athlet_vorname,  athlet_id, athlet_geschlecht, athlet_gebjahr, teilnahmerolle,
                     athlet_gewicht, athlet_relativabzug,
                     reissen1, reissen2, reissen3, reissen_punkte,
                     stossen1, stossen2, stossen3, stossen_punkte,
                     zweikampf, zweikampf_punkte, verzicht, updatetimestamp,
                     wettkampf_cas_guid, status)

                Values('".$dsatz_aus['Name']."', '".$dsatz_aus['Vorname']."', '".$dsatz_aus['Id_Online_Db']."', '$Geschlecht', '".$dsatz_aus['Jahrgang']."', '$Verein',
                '".$dsatz_aus['K_Gewicht']."', '".$dsatz_aus['R_Gewicht']."',
                '".$dsatz_aus['R_1']."', '".$dsatz_aus['R_2']."', '".$dsatz_aus['R_3']."', '$reissen_Relativ',
                '".$dsatz_aus['S_1']."', '".$dsatz_aus['S_2']."', '".$dsatz_aus['S_3']."', '$stossen_Relativ',
                '".$dsatz_aus['Z_K']."', '".$dsatz_aus['Relativ_P']."', '$Verzicht_feld', '$timestamp',
                '$Online_Wk_Id', '5')
               ";
            }
        }


        dbBefehlOnline($SQL);


    }//Ende If keine OnlineId

}





$SQL_Ergebniss = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
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

$Sieger=NULL; // To be sure that it is not empty

if($stammdaten['Verein_Anzahl']==2){


    $Pkt_Heim=$Data['Ergebniss_V1'];
    $Pkt_Gast=$Data['Ergebniss_V2'];
    $Pkt_Gast2=$Data['Ergebniss_V3'];

    $Kommentar=$stammdaten['Kommentar'];


    if($Erg_Heim>$Erg_Gast && $Erg_Heim>$Erg_Gast2) $Sieger=$Heim;
    if($Erg_Gast>$Erg_Heim && $Erg_Gast>$Erg_Gast2) $Sieger=$Gast;
    if($Erg_Gast2>$Erg_Heim && $Erg_Gast2>$Erg_Gast) $Sieger=$Gast2;

    //KOMMENTAR einfühen in Upload----------------------------------------------------------------------------------------
    //Status=3 bedeutet erfolgreicher upload
    $SQL_erfolgreicher_Upload="UPDATE bundesliga
		SET status='3', updatetimestamp='$timestamp', Heim_Ergebnis='$Erg_Heim', Gast_Ergebnis='$Erg_Gast',
            Heim_1_Punkte='$Pkt_Heim', Gast_1_Punkte='$Pkt_Gast', Sieger='$Sieger', Kommentar='$Kommentar'
		WHERE cas_gguid ='$Online_Wk_Id'
		";
    dbBefehlOnline($SQL_erfolgreicher_Upload);

}elseif($stammdaten['Verein_Anzahl']==3){

    $Pkt_Heim_1=$Data['V1_Wk1'];
    $Pkt_Gast_1=$Data['V2_Wk1'];

    $Pkt_Heim_2=$Data['V1_Wk2'];
    $Pkt_Gast2_2=$Data['V3_Wk2'];

    $Pkt_Gast_3=$Data['V2_Wk3'];
    $Pkt_Gast2_3=$Data['V3_Wk3'];

    $Kommentar=$stammdaten['Kommentar'];

    if($Erg_Heim>$Erg_Gast && $Erg_Heim>$Erg_Gast2) $Sieger=$Heim;
    if($Erg_Gast>$Erg_Heim && $Erg_Gast>$Erg_Gast2) $Sieger=$Gast;
    if($Erg_Gast2>$Erg_Heim && $Erg_Gast2>$Erg_Gast) $Sieger=$Gast2;

    //KOMMENTAR einfühen in Upload----------------------------------------------------------------------------------------
    //Status=3 bedeutet erfolgreicher upload
    $SQL_erfolgreicher_Upload="UPDATE bundesliga
		SET status='3', updatetimestamp='$timestamp',
            Heim_Ergebnis='$Erg_Heim', Gast_Ergebnis='$Erg_Gast', Gast2_Ergebnis='$Erg_Gast2',
            Heim_1_Punkte='$Pkt_Heim_1', Gast_1_Punkte='$Pkt_Gast_1',
            Heim_2_Punkte='$Pkt_Heim_2', Gast2_2_Punkte='$Pkt_Gast2_2',
            Gast_3_Punkte='$Pkt_Gast_3', Gast2_3_Punkte='$Pkt_Gast2_3',
            Sieger='$Sieger', Kommentar='$Kommentar'
		WHERE cas_gguid ='$Online_Wk_Id'
		";
    dbBefehlOnline($SQL_erfolgreicher_Upload);
}

mysqli_close($db_Online);

}
