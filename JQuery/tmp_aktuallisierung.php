<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$Art = $_SESSION['Wk_SoR'];
$WkName = $_SESSION['WeK'];
$bridge = $_SESSION['HWkBridge'];

if($bridge!=0){
$Grp = $_SESSION['Wk_Grp'];

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_$WkName");
$stammdaten = mysqli_fetch_assoc($datenbank);

if($Art=="Reissen"){
$Kurz="R";

}else{
$Kurz="S";
}

if($stammdaten["Wk_Art"]=='BL'){

	
	if($stammdaten['Block_Heben']=='0'){
		
		/* Alte Heberreihenfolge mit Differenze statt wer mehr Pause hat muss Heben => Jetzt mit Diff ermittlung der Zeit
		 $StringOrderBy=" ORDER BY heber_$WkName.Gruppe ASC,
		 heber_wk_$WkName.$Art ASC,
		 heber_wk_$WkName.Versuch ASC,
		 heber_wk_$WkName.time_$Art DESC,
		  heber_$WkName.LosNr ASC";
		 */
		
		$StringOrderBy=" ORDER BY heber_$WkName.Gruppe ASC,
		heber_wk_$WkName.$Art ASC,
		heber_wk_$WkName.Versuch ASC,
		heber_wk_$WkName.Div_Wert_$Kurz ASC,
		heber_$WkName.LosNr ASC";
		
	}elseif($stammdaten['Block_Heben']=='1'){
		
		
		$StringOrderBy=" ORDER BY heber_$WkName.Gruppe ASC,
		heber_wk_$WkName.Versuch ASC,
		heber_wk_$WkName.$Art ASC,
		heber_wk_$WkName.Div_Wert_$Kurz ASC,
		heber.Gewicht ASC";
		
	}
	
	if($stammdaten['Gerd']==0){
		
		if($Art=="Reissen"){       //Da nicht alle f�r Reissen und Stossen starten
			
			//In der leeren Zeile war AND heber_$WkName.Gruppe = '$Grp' damit nur eine Gruppe ausgew�hlt wurde
			$heber = dbBefehl("SELECT * FROM heber_$WkName, heber, heber_wk_$WkName, verein
					WHERE heber_$WkName.IdHeber = heber.IdHeber
					AND heber_wk_$WkName.IdHeber = heber.IdHeber
					AND heber_wk_$WkName.IdHeber = heber_$WkName.IdHeber
					AND heber.IdVerein = verein.IdVerein
					AND heber_$WkName.Gruppe != '0'
					AND (heber_wk_$WkName.Gueltig_$Art = '' OR heber_wk_$WkName.Gueltig_$Art IS NULL)
					AND (heber_$WkName.R_uo_S = '0' OR heber_$WkName.R_uo_S = '1')
					".$StringOrderBy);
		}else{     //F�r Stossen
			
			$heber = dbBefehl("SELECT * FROM heber_$WkName, heber, heber_wk_$WkName, verein
					WHERE heber_$WkName.IdHeber = heber.IdHeber
					AND heber_wk_$WkName.IdHeber = heber.IdHeber
					AND heber_wk_$WkName.IdHeber = heber_$WkName.IdHeber
					AND heber.IdVerein = verein.IdVerein
					AND heber_$WkName.Gruppe != '0'
					AND (heber_wk_$WkName.Gueltig_$Art = '' OR heber_wk_$WkName.Gueltig_$Art IS NULL)
					AND (heber_$WkName.R_uo_S = '0' OR heber_$WkName.R_uo_S = '2')
					".$StringOrderBy);
		}
		
		
		
	}else{   //Gerd==1
		
		if($Art=="Reissen"){       //Da nicht alle f�r Reissen und Stossen starten
			
			//In der leeren Zeile war AND heber_$WkName.Gruppe = '$Grp' damit nur eine Gruppe ausgew�hlt wurde
			$heber = dbBefehl("SELECT * FROM heber_$WkName, heber, heber_wk_$WkName, verein
					WHERE heber_$WkName.IdHeber = heber.IdHeber
					AND heber_wk_$WkName.IdHeber = heber.IdHeber
					AND heber_wk_$WkName.IdHeber = heber_$WkName.IdHeber
					AND heber.IdVerein = verein.IdVerein
					AND heber_$WkName.Gruppe != '0'
					AND (heber_wk_$WkName.NH_$Art = '' OR heber_wk_$WkName.NH_$Art IS NULL
					AND (heber_$WkName.R_uo_S = '0' OR heber_$WkName.R_uo_S = '1')
					OR heber_wk_$WkName.NH_$Art = '0')
					".$StringOrderBy);
			
		}else{
			
			$heber = dbBefehl("SELECT * FROM heber_$WkName, heber, heber_wk_$WkName, verein
					WHERE heber_$WkName.IdHeber = heber.IdHeber
					AND heber_wk_$WkName.IdHeber = heber.IdHeber
					AND heber_wk_$WkName.IdHeber = heber_$WkName.IdHeber
					AND heber.IdVerein = verein.IdVerein
					AND heber_$WkName.Gruppe != '0'
					AND (heber_wk_$WkName.NH_$Art = '' OR heber_wk_$WkName.NH_$Art IS NULL
					AND (heber_$WkName.R_uo_S = '0' OR heber_$WkName.R_uo_S = '2')
					OR heber_wk_$WkName.NH_$Art = '0')
					".$StringOrderBy);
		}
		
	}




}else{       //Für wenn nicht BL
	//Auch hier wurde alles von Div Wert zu "heber_wk_$WkName.time_$Art DESC," umgestellt
	
	$StringOrderBy=" ORDER BY   heber_wk_$WkName.$Art ASC,
	heber_wk_$WkName.Versuch ASC,
	heber_wk_$WkName.Div_Wert_$Kurz ASC,
	heber_$WkName.LosNr ASC";
	
	
	
	if($stammdaten['Gerd']==0){
		
		$heber = dbBefehl("SELECT * FROM heber_$WkName, heber, heber_wk_$WkName, verein
				WHERE heber_$WkName.IdHeber = heber.IdHeber
				AND heber_wk_$WkName.IdHeber = heber.IdHeber
				AND heber_wk_$WkName.IdHeber = heber_$WkName.IdHeber
				AND heber.IdVerein = verein.IdVerein
				AND heber_$WkName.Gruppe = '$Grp'
				AND (heber_wk_$WkName.Gueltig_$Art = '' OR heber_wk_$WkName.Gueltig_$Art IS NULL)
				" . $StringOrderBy);
		
	}else{
		
		$heber = dbBefehl("SELECT * FROM heber_$WkName, heber, heber_wk_$WkName, verein
				WHERE heber_$WkName.IdHeber = heber.IdHeber
				AND heber_wk_$WkName.IdHeber = heber.IdHeber
				AND heber_wk_$WkName.IdHeber = heber_$WkName.IdHeber
				AND heber.IdVerein = verein.IdVerein
				AND heber_$WkName.Gruppe = '$Grp'
				AND (heber_wk_$WkName.NH_$Art = '' OR heber_wk_$WkName.NH_$Art IS NULL
				OR heber_wk_$WkName.NH_$Art = '0')
				" . $StringOrderBy);
		
	}
	
}        //Ende else != BL


        $NumRowsHeber=mysqli_num_rows($heber);

        if($NumRowsHeber!=0){
                 $dsatz = mysqli_fetch_assoc($heber);
                 $nIdH=$dsatz['IdHeber'];
                 $nHgw=$dsatz[$Art];
                 $nV=$dsatz['Versuch'];
                 $name=$dsatz['Name'];
                 $vorname=$dsatz['Vorname'];
                 $verein=$dsatz['Verein'];
                 $gewicht=$dsatz['Gewicht'];
                 $klasse=$dsatz['GwKl'];
        }else{
                 $nIdH=-1;
                 $nHgw=-1;
                 $nV=-1;
                 $name='';
                 $vorname='';
                 $verein='';
                 $gewicht='';
                 $klasse='';
        }

        $Data_tmp = dbBefehl("SELECT * FROM tmp_gerd_$bridge");
        $dsatz_tmp = mysqli_fetch_assoc($Data_tmp);

        if(($dsatz_tmp["IdHeber"]!=$nIdH)||(($dsatz_tmp["IdHeber"]==$nIdH)&&(($dsatz_tmp["HGw"]!=$nHgw)||($dsatz_tmp["V"]!=$nV)))){

           dbBefehl("DELETE FROM tmp_gerd_$bridge");

           dbBefehl("INSERT INTO tmp_gerd_$bridge (IdHeber,Art,HGw,V,Name,Vorname,Verein,Kgw,Klasse)
                         Values ('$nIdH', '$Art','$nHgw','$nV','$name','$vorname','$verein','$gewicht','$klasse')");
        }

}//$bridge != 0
?>