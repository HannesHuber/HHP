<?php

$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

$stammdaten = mysqli_fetch_assoc($datenbank);


include 'funktionen/nuetzliches.php';

$Grp = $dNow['Gruppe'];

$DataDsatz = dbBefehl("SELECT * FROM tmp_gerd_$bridge");
$dsatz = mysqli_fetch_assoc($DataDsatz);

$_SESSION['KrIdHAn' . $bridge]    = $dsatz['IdHeber'];
$_SESSION['KrVAn' . $bridge]      = $dsatz['V'];
$_SESSION['KrArtAn' . $bridge]    = $dsatz['Art'];
$_SESSION['KrHGwAn' . $bridge]    = $dsatz['HGw'];
$_SESSION['KrAnzahlAn' . $bridge] = $stammdaten['Kampfrichter'];
$_SESSION['WkArt' . $bridge]	  =	$stammdaten['Wk_Art'];

if($stammdaten['Flagge']==3){
	$IdHeber=$dsatz['IdHeber'];
	$DBFlagge = dbBefehl("SELECT * FROM staaten, heber
							WHERE heber.IdHeber= $IdHeber
							AND heber.IdStaat= staaten.IdStaat
						");
	$DataFlagge = mysqli_fetch_assoc($DBFlagge);

}


if($_SESSION['JuryReload'.$bridge]==1){

	$_SESSION['JuryReload'.$bridge]=0;
	dbBefehl ( "UPDATE tmp_jury_status_$bridge
					SET Anzeige= '0'
					WHERE Id='1'" );

	$DBLetzterHeber = dbBefehl("SELECT * FROM tmp_letzter_heber_$bridge, heber, heber_wk_".$data_a_db['S_Db']."
			WHERE tmp_letzter_heber_$bridge.IdHeber=heber.IdHeber
			AND heber_wk_".$data_a_db['S_Db'].".IdHeber = tmp_letzter_heber_$bridge.IdHeber
			AND heber_wk_".$data_a_db['S_Db'].".Versuch = tmp_letzter_heber_$bridge.V ");
	$DataLetzterHeber = mysqli_fetch_assoc($DBLetzterHeber);

	echo '<div id="JuryDiv">';

	echo'<table class="tabelle">';

	echo'<tr>';
	echo'<td id="JuryName">';
	echo 'Jury Entscheidung!';
	echo'</td>';
	echo'</tr>';

	echo'<tr>';
	echo'<td id="JuryVersuch">';
	echo $DataLetzterHeber['Versuch'].'.V &nbsp;';
	echo $DataLetzterHeber['Vorname'].' '.$DataLetzterHeber['Name'];
	echo'</td>';

	echo'</tr>';
	echo'<tr>';
	$Art=$DataLetzterHeber['Art'];
	if($DataLetzterHeber['Gueltig_'.$Art]=='Ja')
		echo'<td id="JuryGueltig">&nbsp;<div class="JuryGueltig">&nbsp;</div></td>';
	else
			echo'<td id="JuryGueltig">&nbsp;<div class="JuryUngueltig">&nbsp;</div></td>';
	echo'</tr>';
	echo'</table>';


	echo '</div>';

	echo"<script type=\"text/javascript\">

    function disablediv(div){
        var objDiv = document.getElementById(div);
                if(objDiv)
            objDiv.style.display=\"none\";
    }
    window.setTimeout(\"disablediv('JuryDiv')\",7000);

    </script>";
}

var_dump($dsatz['IdHeber']);

if($dsatz['IdHeber']!=0 && $dsatz['IdHeber']!=-1){

echo'<table class="tabelle" >';
 echo'<tr>';
  echo'<td colspan="6" id="Name">
       <div id="tab">' . $dsatz['Name'] . ' ' . $dsatz['Vorname'] . '</div>
  </td>';
 echo'</tr>';
 echo'<tr>';
  echo'<td colspan="6" id="Verein">' . $dsatz['Verein'] . '</td>';
 echo'</tr>';
 echo'<tr>';
 if($stammdaten['Flagge']==3){
 	echo '<td colspan="2" >';
 		echo '<div id="rahmen"> <img src="Bilder/FlaggenStaaten/'.$DataFlagge['IdStaat'].'.'.$DataFlagge['FlaggenFormat'].'"  id="bild"> </div>';
 	echo'</td>';
 	echo'<td colspan="2" id="V">' . $dsatz['V'] . '.V &nbsp;</td>';
 }else
 	echo'<td colspan="4" id="V">' . $dsatz['V'] . '.V &nbsp;</td>';

  echo'<td colspan="2" id="V">' . $dsatz['HGw'] . 'Kg</td>';
 echo'</tr>';
 echo'<tr>';

// var_dump($dsatz['Klasse']);
if ($dsatz['Klasse'] == 0) {
    // Handle no result
    // echo "<div class='large-text'>Pause</div>";
  
}else{
	if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='BL'){
		$StringKlasse= "KöGw: " . $dsatz['Kgw']. " Kg";
	}else{
		if($dsatz['Klasse'] > 1 ){
		$StringKlasse = "GwKl: " . "+" . $dsatz['Klasse'];
		}else{
		$StringKlasse = "GwKl: " . $dsatz['Klasse'];
		}
	}
}
 if($stammdaten['StartNr']=='1'){

 	$IdHeber=$dsatz['IdHeber'];

 	$DataDsatzStartNr= dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db']." WHERE IdHeber=$IdHeber");
 	$dsatzStartNr = mysqli_fetch_assoc($DataDsatzStartNr);

 	$StringStartNr = $dsatzStartNr['StartNr'];

 	echo'<td colspan="3" id="KGw">' . $StringKlasse. '</td>';
 /*	echo'</tr>';
 	echo'<tr>'; */
 	echo'<td colspan="3" id="KGw">StartNr: ' . $StringStartNr. '</td>';

 }else{
 	echo'<td colspan="6" id="KGw">' . $StringKlasse. '</td>';
 }
 echo'</tr>';
 echo'<tr>';
 if($_SESSION['KrAnzahlAn' . $bridge]==1) echo'<td colspan="3" id="gueltig"><div id="g1"></div></td>';
 else{
    echo'<td id="gueltig"><div id="g1"></div></td>';
    echo'<td id="gueltig"><div id="g2"></div></td>';
    echo'<td id="gueltig"><div id="g3"></div></td>';
  }

 if($stammdaten['Wk_Art']=='M_m_T') echo'<td colspan="2" id="twert"><div id="tg"></div></td>';
 else                             echo'<td colspan="2" id="twert"></td>';

 if($stammdaten['Zeitnehmer']!=0)
  echo'<td id="zeit"><div id="showTime"></div></td>';
 echo'</tr>';

/*
 if($stammdaten[Wk_Art]=='M_m_T'){
     echo'<tr>';
     echo'<td colspan="2" id="twert"><div id="te1"></div></td>';
     echo'<td colspan="2" id="twert"><div id="te2"></div></td>';
     echo'<td colspan="2" id="twert"><div id="te3"></div></td>';
     echo'</tr>';
 }
 */

echo'</table>';

}else{
	//Ende if dsatz != -1
	echo "<div class='large-text'>Pause</div>";
	echo '<img src="../img/BVDG_HHP.png" alt="" class="my-image"/>';
}
echo'<div id="new_load"></div>';
echo'<div id="Jury"></div>';




?>



</body>
</html>
