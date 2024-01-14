<?php
function SendHeberToSafeTabelle($Wk_Art, $bridge, $IdHeber, $Versuch, $Art, $Guel, $Twert) {
	global $wk_name, $Kr_Numb;
	$timestamp = time ();
	
	if ($Kr_Numb == 1) {
		dbBefehl ( "UPDATE tmp_heber_speichern_$bridge
					SET IdHeber= '$IdHeber', Versuch= '$Versuch', G1= '$Guel', G2= '', G3= '',
						Time1= '$timestamp', Time2= '0', Time3= '0',
						Technik1= '$Twert', Technik2= '0', Technik3= '0'
					WHERE Id = '1'
				 " );
	} else {
		
		$dbGueltig = dbBefehl ( "SELECT * FROM heber_wk_$wk_name WHERE IdHeber='$IdHeber' AND Versuch='$Versuch'" );
		$dErgebniss = mysqli_fetch_assoc ( $dbGueltig );
		
		$dgueltig1 = $dErgebniss ['G_' . $Art . '_1'];
		$dgueltig2 = $dErgebniss ['G_' . $Art . '_2'];
		$dgueltig3 = $dErgebniss ['G_' . $Art . '_3'];
		$dtime1 = $dErgebniss ['Time_' . $Art . '_1'];
		$dtime2 = $dErgebniss ['Time_' . $Art . '_2'];
		$dtime3 = $dErgebniss ['Time_' . $Art . '_3'];
		
		if ($Wk_Art == 'M_m_T') {
			
			$dtechnikpunkte1 = $dErgebniss ['TeWert_' . $Art . '_1'];
			$dtechnikpunkte2 = $dErgebniss ['TeWert_' . $Art . '_2'];
			$dtechnikpunkte3 = $dErgebniss ['TeWert_' . $Art . '_3'];
			
			dbBefehl ( "UPDATE tmp_heber_speichern_$bridge
					  SET IdHeber= '$IdHeber', Versuch= '$Versuch', G1= '$dgueltig1', G2= '$dgueltig2', G3= '$dgueltig3', 
							Time1= '$dtime1', Time2= '$dtime2', Time3= '$dtime3',
							Technik1= '$dtechnikpunkte1', Technik2= '$dtechnikpunkte2', Technik3= '$dtechnikpunkte3'
					  WHERE Id = '1'
				 " );
		} else {
			
			dbBefehl ( "UPDATE tmp_heber_speichern_$bridge
					 SET IdHeber= '$IdHeber', Versuch= '$Versuch', G1= '$dgueltig1', G2= '$dgueltig2', G3= '$dgueltig3', 
						 Time1= '$dtime1', Time2= '$dtime2', Time3= '$dtime3'
					WHERE Id = '1'
				 " );
		}
	}
}
function KR_Singel_Safe_To_heber_wk($Wk_numb, $Wk_Art, $Kr_numb, $Art, $IdHeber, $Versuch, $Guel, $TWert) {
		
	$timestamp = time ();	
	
	$GueltigString = 'G_' . $Art . '_' . $Kr_numb;
	$TimeString = 'Time_' . $Art . '_' . $Kr_numb;
	$TechniktString = 'TeWert_' . $Art . '_' . $Kr_numb;
	
	if ($Wk_Art != 'M_m_T') {
		// echo "Hi", $Wk_numb, $GueltigString, $TimeString, $IdHeber, $Versuch;
		dbBefehl ( "UPDATE heber_wk_$Wk_numb
                     SET $GueltigString= '$Guel', $TimeString= '$timestamp'
                     WHERE IdHeber= '$IdHeber'
                     AND Versuch= '$Versuch'
                     " );
	} else {
		
		dbBefehl ( "UPDATE heber_wk_$Wk_numb
                     SET $GueltigString= '$Guel', $TimeString= '$timestamp', $TechniktString= '$TWert'
                     WHERE IdHeber= '$IdHeber'
                     AND Versuch= '$Versuch'
                     " );
	}
}
function HardwareAnweisung1($bridge) {
	dbBefehl ( "UPDATE tmp_hardware_$bridge
                     SET Anweisung= '1'
                     WHERE Id='1'" );
}

function Save_to_Absignal($bridge,$KR_numb) {
	
	if($KR_numb=="1"){
	dbBefehl ( "UPDATE tmp_absignal_$bridge
			SET Kr1= '1'
			WHERE Id='1'" );
	}elseif($KR_numb=="2"){
		dbBefehl ( "UPDATE tmp_absignal_$bridge
				SET Kr2= '1'
				WHERE Id='1'" );
	}elseif($KR_numb=="3"){
		dbBefehl ( "UPDATE tmp_absignal_$bridge
				SET Kr3= '1'
				WHERE Id='1'" );
	}
}




?>