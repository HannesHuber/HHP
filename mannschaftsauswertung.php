<?php
session_start ();
header ( 'Content-Type: text/html; charset=utf-8' );
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">



<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl.css" />
<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl_print.css"
	media="print" />

</head>



<body>



	<form method="post" action="mannschaftsauswertung.php">


		<p class="kopf">
			<b>Mannschaftsauswertung</b>
		</p>

		<a href="auswertung.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>

<?php

ob_start ();
error_reporting ( 1 );

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';

$db = dbVerbindung ();
$data_a_db ['S_Db'] = $_SESSION ['WeK'];
$datenbank = dbBefehl ( "SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc ( $datenbank );
loginCheck ( $stammdaten );

$Verein = dbBefehl ( "SELECT * FROM verein" );

//include 'funktionen/auswertung.php';

$Heber_p_M = dbBefehl ( "SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$data_H_p_M = mysqli_fetch_assoc ( $Heber_p_M );
$An_H_p_M = $data_H_p_M ['Heber_pro_M'];
$Min_H_p_M =$data_H_p_M ['min_heber_pro_mann'];
$Pokal=$data_H_p_M ['Pokal'];

dbBefehl ( "DELETE FROM auswertung_mannschaft_".$data_a_db['S_Db']);


$arrayHeberVerein= array();

$i = 0;
while ( $daten_verein = mysqli_fetch_assoc ( $Verein ) ) {

	$i ++;

	$Anzahl_Mann_V = dbBefehl ( "SELECT * FROM mannschaften_".$data_a_db['S_Db']."
			WHERE mannschaften_".$data_a_db['S_Db'].".IdVerein = '".$daten_verein['IdVerein']."'
			" );
	$d = mysqli_fetch_assoc ( $Anzahl_Mann_V );
	$An_M_V = $d ['Anzahl_M'];	//Anzahl Mannschaften für diesen Verein




for($MannschaftNummer=1;	$MannschaftNummer<=$An_M_V;		$MannschaftNummer++){

    //If Auto Mannschaftauswertung dann müssen die Heber weiterlaufen => bei Heber auswahl Mannschaft ignorieren
    if($stammdaten ['auto_mannschaft'] == '1'){
        $StringMannschaftNummer="";
        $LimitString="";

    }else{
        $StringMannschaftNummer="AND heber_".$data_a_db['S_Db'].".Mannschaft_Auswahl = '$MannschaftNummer'";
        $LimitString="LIMIT $An_H_p_M";
    }

    if ($stammdaten ['Wk_Art'] == 'ZK') {

	    if($stammdaten['Masters']==1){



	          	        $heber = dbBefehl ( "SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                                       WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber.IdVerein = $daten_verein[IdVerein]
                                       AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                       AND (heber_".$data_a_db['S_Db'].".Ausserkonkurrenz is NULL || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '0'
                                            || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '')
									   $StringMannschaftNummer
                                       ORDER BY auswertung_".$data_a_db['S_Db'].".Sinclair_P_Malone_Meltzer DESC
									   ".$LimitString );


	    }else{

		$heber = dbBefehl ( "SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                                       WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber.IdVerein = $daten_verein[IdVerein]
                                       AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                       AND (heber_".$data_a_db['S_Db'].".Ausserkonkurrenz is NULL || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '0'
                                            || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '')
							  		   $StringMannschaftNummer
                                       ORDER BY auswertung_".$data_a_db['S_Db'].".Relativ_P DESC
									   ".$LimitString );
	    }
	} else {
		//Nach Relativ
	    if($stammdaten['mannschaft_nach_relativ']==1){
	        $heber = dbBefehl ( "SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                                       WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber.IdVerein = $daten_verein[IdVerein]
                                       AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                       AND (heber_".$data_a_db['S_Db'].".Ausserkonkurrenz is NULL || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '0'
                                            || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '')
									   $StringMannschaftNummer
                                       ORDER BY auswertung_".$data_a_db['S_Db'].".Relativ_P DESC
									  ".$LimitString  ); // LIMIT $An_H_p_M wegen Pokal
	        //Nach Mk Gesamt
	    }else{
	        $heber = dbBefehl ( "SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                                       WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber.IdVerein = $daten_verein[IdVerein]
                                       AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                       AND (heber_".$data_a_db['S_Db'].".Ausserkonkurrenz is NULL || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '0'
                                            || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '')
									   $StringMannschaftNummer
                                       ORDER BY auswertung_".$data_a_db['S_Db'].".M_K_G DESC
									  ".$LimitString  ); // LIMIT $An_H_p_M wegen Pokal
	    }

	}



	$Z_HpM = 0;
	$Z_Mann = 1;
	$VereinName='';
	$MannschaftsChange=0;

	$num_rows_heber=mysqli_num_rows($heber);

	//echo $num_rows_heber.'<br>';

	if($num_rows_heber >= $Min_H_p_M){     //Muss mindestens mehr als minimum amount sein e

	    //Da Für Autozuteilung an dieser Stelle ein Schnitt gemacht werden soll
	    //Und da wenn nicht Auto zuteilung auch Vereine beachtet werden müssen mit mindest Heber Anzahl
	    if($stammdaten ['auto_mannschaft'] == '1'){
	    	if($An_H_p_M>$num_rows_heber){
	    		$AnzahlHeberWannGespeichertWerdenSoll= $num_rows_heber;
	    	}else{
	    		$AnzahlHeberWannGespeichertWerdenSoll= $An_H_p_M;
	    	}
	    }else{
	        $AnzahlHeberWannGespeichertWerdenSoll= $num_rows_heber;
	    }



	    while ( $daten_heber = mysqli_fetch_assoc ( $heber ) ) {

		if ($Z_Mann <= $An_M_V) {

			$Z_HpM++;
			$Z = "Mann_" . $Z_Mann;

			if($MannschaftsChange != $Z_Mann){
				$MannschaftsChange=$Z_Mann;
				$$Z=0;
			}

			//Weil sonst im falle von nicht ganz aufgefüllten mannschaften kein Save erfolgt
			if($stammdaten ['auto_mannschaft'] == '1'){
				if($Z_Mann>1){
					if($An_H_p_M>$num_rows_heber-(($Z_Mann-1)*$An_H_p_M)){
						$AnzahlHeberWannGespeichertWerdenSoll=$num_rows_heber-(($Z_Mann-1)*$An_H_p_M);

						if($AnzahlHeberWannGespeichertWerdenSoll < $Min_H_p_M){
							goto naechsterVerein; //Springt aus Schelife zum nächsten Verein
						}
					}
				}
			}


			if ($Z_HpM <= $An_H_p_M) {

			    if($VereinName!=$daten_verein['Verein']){
				    $$Z = 0;
				}

				$pkt_heber=0;
				if ($stammdaten ['Wk_Art'] == 'ZK'){
				    if($stammdaten['Masters']==1){
						if($daten_heber['Geschlecht'] == 'Weilblich'){
							$pkt_heber = $daten_heber ['Sinclair_P_Malone_Meltzer']*1.5;
						}else{
							$pkt_heber = $daten_heber ['Sinclair_P_Malone_Meltzer'];
						}
				    }else{
				        $pkt_heber = $daten_heber ['Relativ_P'];
					}
				}else{ //Wenn nicht ZK
				    if($stammdaten['mannschaft_nach_relativ']==1){
				        $pkt_heber = $daten_heber ['Relativ_P'];
				    }else{
						if($daten_heber['Geschlecht'] == 'Weilblich'){
							$pkt_heber = $daten_heber ['M_K_G'];
						}else{
							$pkt_heber = $daten_heber ['M_K_G'];
						}
				        // $$Z = $$Z + $daten_heber ['M_K_G'];
				    }

				}
				$$Z = $$Z + $pkt_heber;
			    $arrayHeberVerein[$daten_verein['IdVerein']][$MannschaftNummer][]=$daten_heber['Vorname'].' '.$daten_heber['Name'] . ' ('.$pkt_heber.')';


				// echo "<br>". $daten_verein['Verein'] . $daten_heber ['M_K_G'] . $daten_heber['Vorname'] . $$Z;

					if ($Z_HpM == $AnzahlHeberWannGespeichertWerdenSoll) {
					$safe = $$Z;
						
					// echo "<br> SAFE:". $daten_verein['Verein'] . $daten_heber['M_K_G'] . $daten_heber['Vorname'] . $safe;

					dbBefehl ( "INSERT INTO auswertung_mannschaft_".$data_a_db['S_Db']." (IdVerein, Mannschaft, Punkte)
									Values ('".$daten_verein['IdVerein']."', '$MannschaftNummer', '$safe')" );

					$$Z = 0;
					$Z_Mann = $Z_Mann + 1;
					$Z_HpM = 0;
					//$safe=0;

					if($stammdaten['auto_mannschaft'] == '1'){ //&& $MannschaftNummer<$An_M_V
					    $MannschaftNummer++;
					}

				}
			}
		}

		$VereinName=$daten_verein['Verein'];
	}

	} //Schlie�t if >= als min_h_p_M


}//Schli�t For Schleife �ber Mannschaften

naechsterVerein:

}


$platz = 0;

//var_dump($arrayHeberVerein);



$daten_Mann = dbBefehl ( "SELECT * FROM auswertung_mannschaft_".$data_a_db['S_Db'].", verein
							WHERE auswertung_mannschaft_".$data_a_db['S_Db'].".IdVerein = verein.IdVerein
                           ORDER BY auswertung_mannschaft_".$data_a_db['S_Db'].".Punkte DESC" );

echo "<div id=\"divid1\" class=\"examplediv\">";

echo "<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
            <colgroup>
                 <col width=\"250\">
                 <col width=\"250\">
                 <col width=\"150\">
                 <col width=\"150\">
                 <col width=\"150\">
            </colgroup>

            <thead>

            <tr>
                 <th>Verein</th>
                 <th>Heber</th>
                 <th>Mannschaft</th>
                 <th>Punkte</th>
                 <th>Platz</th>
            </tr>

            </thead>

            ";
$i = 0;

while ( $dsatz = mysqli_fetch_assoc ( $daten_Mann ) ) {

	$i ++;
	if ($i % 2 != 0) { // ungerades und gerades i indikator
	                   // ungerade/gerade => zwischen linien in table

		echo "<tbody class=\"ungerade\">";
	} else {

		echo "<tbody class=\"gerade\">";
	}

	echo "<tr align=\"center\" >";

	$platz = $platz + 1;

	echo "

                 <tr>
                         <td>".$dsatz['Verein']."</td>
						 <td></td>";


	echo"
                         <td>".$dsatz['Mannschaft']."</td>
                         <td>".$dsatz['Punkte']." Pkt</td>
                         <td>$platz</td>
                 </tr>

                 ";

	foreach ($arrayHeberVerein[$dsatz['IdVerein']][$dsatz['Mannschaft']] as &$value) {

		echo "

		<tr>
		<td></td>
		<td>$value</td>
		<td></td>
		<td></td>
		<td></td>
		</tr>";

	}

	dbBefehl ( "UPDATE auswertung_mannschaft_".$data_a_db['S_Db']."
                              SET Platz= '$platz'
                              WHERE IdVerein ='".$dsatz['IdVerein']."'
                              AND Mannschaft='".$dsatz['Mannschaft']."'
                              " );
}
echo "</tbody>";
echo "</table>";

?>



</form>
</body>
</html>
