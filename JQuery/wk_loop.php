<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$Heber=          $_SESSION['GLIdHeber'];
$HVersuch=       $_SESSION['GLVersuch'];
$Wk_name=        $_SESSION['WeK'];
$Grp=            $_SESSION['Wk_Grp'];
$bridge=         $_SESSION['HWkBridge'];
$Art=            $_SESSION['Wk_SoR'];
$Wk_Art=         $_SESSION['Wk_Art_ZK_usw'];

$dataStammdaten = dbBefehl("SELECT * FROM stammdaten_wk_$Wk_name");
$Data_Stammdaten= mysqli_fetch_assoc($dataStammdaten);

$Numb_Kampfrichter=$Data_Stammdaten['Kampfrichter'];

//Speichern der Tabelle tmp_heber_speichern_$bridge Anfang! -------------------------------------------------------------------

$Ergebniss = dbBefehl("SELECT * FROM tmp_heber_speichern_$bridge
                               WHERE Id = '1'
                               ");
$dErgebniss = mysqli_fetch_assoc($Ergebniss);

$dHeber=          $dErgebniss['IdHeber'];
$dVersuch=        $dErgebniss['Versuch'];
$dgueltig1=        $dErgebniss['G1'];
$dgueltig2=        $dErgebniss['G2'];
$dgueltig3=        $dErgebniss['G3'];
$dtime1=           $dErgebniss['Time1'];
$dtime2=           $dErgebniss['Time2'];
$dtime3=           $dErgebniss['Time3'];
$dtechnikpunkte1=  $dErgebniss['Technik1'];
$dtechnikpunkte2=  $dErgebniss['Technik2'];
$dtechnikpunkte3=  $dErgebniss['Technik3'];

$Technik_Gesamt=	0;

$gueltig_Zaehler=	0;
$gueltig_Gesamt=	'';

//echo $Heber . ', ' . $dHeber . ';;; ' . $HVersuch . ', ' . $dVersuch . ';;; ';


// echo "", $Heber, ' | ',$dHeber, ' | ',$HVersuch, ' | ',$dVersuch;

if($Heber==$dHeber && $HVersuch==$dVersuch){

	
if($Wk_Art=='M_m_T'){ //Bissher noch keine Unterst�tzung f�r HHP-Hardware in M_m_T!!!!
	
	if($Numb_Kampfrichter==1){
		if($dgueltig1!='' && $dtime1!=0){
			$gueltig_Gesamt=$dgueltig1;
			dbBefehl("UPDATE heber_wk_$Wk_name
					SET Gueltig_$Art= '$gueltig_Gesamt', time_$Art= '$dtime1', Technik_$Art= '$dtechnikpunkte1',
					G_" . $Art . "_1= '$dgueltig1', Time_" . $Art . "_1= '$dtime1', TeWert_" . $Art . "_1= '$dtechnikpunkte1'
					WHERE IdHeber='$Heber'
					AND Versuch='$HVersuch'
					");
			Reset_tmp_heber_bridge($bridge);
		}
	}else{
		if($dgueltig1!='' && $dgueltig2!='' && $dgueltig3!='' && $dtime1!=0 && $dtime2!=0 && $dtime3!=0){
			
			if($dgueltig1=='Ja') 	$gueltig_Zaehler++;
			if($dgueltig2=='Ja') 	$gueltig_Zaehler++;
			if($dgueltig3=='Ja') 	$gueltig_Zaehler++;
			
			if($gueltig_Zaehler>=2){
				$gueltig_Gesamt='Ja';
				$Technik_Gesamt=($dtechnikpunkte1 + $dtechnikpunkte2 + $dtechnikpunkte3)/$gueltig_Zaehler;
				$Technik_Gesamt=round($Technik_Gesamt,2);
			}
			else{
				$gueltig_Gesamt='Nein';
				$Technik_Gesamt=0;
			}


			
			dbBefehl("UPDATE heber_wk_$Wk_name
					SET Gueltig_$Art= '$gueltig_Gesamt', time_$Art= '$dtime1', Technik_$Art= '$Technik_Gesamt',
					G_" . $Art . "_1= '$dgueltig1', Time_" . $Art . "_1= '$dtime1', TeWert_" . $Art . "_1= '$dtechnikpunkte1',
					G_" . $Art . "_2= '$dgueltig2', Time_" . $Art . "_2= '$dtime2', TeWert_" . $Art . "_2= '$dtechnikpunkte2',
					G_" . $Art . "_3= '$dgueltig3', Time_" . $Art . "_3= '$dtime3', TeWert_" . $Art . "_3= '$dtechnikpunkte3'
					WHERE IdHeber='$Heber'
					AND Versuch='$HVersuch'
					");
			Reset_tmp_heber_bridge($bridge);
		}
	}

}else{	
	
	if($Numb_Kampfrichter==1){
		
		if($dgueltig1!='' && $dtime1!=0){
			$gueltig_Gesamt=$dgueltig1;
			dbBefehl("UPDATE heber_wk_$Wk_name
						SET Gueltig_$Art= '$gueltig_Gesamt', time_$Art= '$dtime1', 
							G_" . $Art . "_1= '$dgueltig1', Time_" . $Art . "_1= '$dtime1'
						WHERE IdHeber='$Heber'
						AND Versuch='$HVersuch'
					 ");
			Reset_tmp_heber_bridge($bridge);
		}
	}else{
		if($dgueltig1!='' && $dgueltig2!='' && $dgueltig3!='' && $dtime1!=0 && $dtime2!=0 && $dtime3!=0){
			
			if($dgueltig1=='Ja') 	$gueltig_Zaehler++;
			if($dgueltig2=='Ja') 	$gueltig_Zaehler++;			
			if($dgueltig3=='Ja') 	$gueltig_Zaehler++;
			
			if($gueltig_Zaehler>=2)	$gueltig_Gesamt='Ja';
			else					$gueltig_Gesamt='Nein';
								
			dbBefehl("UPDATE heber_wk_$Wk_name
						SET Gueltig_$Art= '$gueltig_Gesamt', time_$Art= '$dtime1', 
							G_" . $Art . "_1= '$dgueltig1', Time_" . $Art . "_1= '$dtime1', 
							G_" . $Art . "_2= '$dgueltig2', Time_" . $Art . "_2= '$dtime2',
							G_" . $Art . "_3= '$dgueltig3', Time_" . $Art . "_3= '$dtime3'
						WHERE IdHeber='$Heber'
						AND Versuch='$HVersuch'
					");
			Reset_tmp_heber_bridge($bridge);
		}
	}
}   //Update ende


if($gueltig_Gesamt=='Nein'){

$dataHeber = dbBefehl("SELECT * FROM heber_wk_$Wk_name
                                WHERE IdHeber = '$Heber'
                                AND Versuch='$HVersuch'
                                ");
$Data_Heber = mysqli_fetch_assoc($dataHeber);
$Hgw=$Data_Heber[$Art];

    if($dVersuch==1){
         $HgwP=$Hgw+1;

                         dbBefehl("UPDATE heber_wk_$Wk_name
                                      SET $Art= '$Hgw'
                                      WHERE IdHeber='$Heber'
                                      AND Versuch='2'
                                      ");

                         dbBefehl("UPDATE heber_wk_$Wk_name
                                      SET $Art= '$HgwP'
                                      WHERE IdHeber='$Heber'
                                      AND Versuch='3'
                                      ");
    }
    if($dVersuch==2){

                         dbBefehl("UPDATE heber_wk_$Wk_name
                                      SET $Art= '$Hgw'
                                      WHERE IdHeber='$Heber'
                                      AND Versuch='3'
                                      ");
    }


}



}   //Richtiger Heber+Versuch Check ende (if)


function Reset_tmp_heber_bridge($bridge){
	
	global $db;
	
	$Ergebniss = dbBefehl("UPDATE tmp_heber_speichern_$bridge
			SET IdHeber= '0', Versuch= '0', G1= '', G2= '', G3= '', Time1= '0', Time2= '0', Time3= '0',
			Technik1= '0', Technik2= '0', Technik3= '0'
			WHERE Id = '1'
			");
}

?>