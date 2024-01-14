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
			<b>Länder Mannschaftsauswertung</b>
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

//$Verein = dbBefehl ( "SELECT * FROM verein" );
$Laender = dbBefehl ( "SELECT * FROM laender" );
//include 'funktionen/auswertung.php';

$Heber_p_M = dbBefehl ( "SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$data_H_p_M = mysqli_fetch_assoc ( $Heber_p_M );
$An_H_p_M = 5; //  Beim Pokal werden die besten 5 gewertet         $data_H_p_M ['Heber_pro_M'];
$Min_H_p_M =$data_H_p_M ['min_heber_pro_mann'];
$Pokal=$data_H_p_M ['Pokal'];

dbBefehl ( "DELETE FROM auswertung_laender_mannschaft_".$data_a_db['S_Db']);



$arrayHeberVerein= array();

$i = 0;
while ( $daten_verein = mysqli_fetch_assoc ( $Laender ) ) {



	$i ++;

	$An_M_V = 1;	//F�r La�nder nur 1 Mannschaft

$MannschaftNummer=1; //Es gibt nur eine Mannschaft pro Verein



		$heber = dbBefehl ( "SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                                       WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber.Land = '$daten_verein[laender]'
                                       AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                       AND (heber_".$data_a_db['S_Db'].".Ausserkonkurrenz is NULL || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '0'
                                            || heber_".$data_a_db['S_Db'].".Ausserkonkurrenz = '')
										AND heber_".$data_a_db['S_Db'].".Laender_Mannschaft_Auswahl = '1'
                                       ORDER BY auswertung_".$data_a_db['S_Db'].".M_K_G DESC
									  "  );



	$Z_HpM = 0;
	$Z_Mann = 1;
	$Land='';

	$num_rows_heber=mysqli_num_rows($heber);

	/*

	 Pokal: min 1 M�dchen min 1 Junge pro Mannschaft
	 => heber selection ohne Limit
	 => in while loop abfrage Mcheck=1 if Geschlecht= M�nnlich (Bzw. Wcheck f�r Weiblich)
	 => when letzter loop und ein Geschlecht nicht vorhanden => Weitermachen bis Geschlecht vorhanden sonst kein safe


	 */

	$M_Check=0;
	$W_Check=0;

	if($num_rows_heber >= $Min_H_p_M){     //Muss mindestens mehr als minimum amount sein



	while ( $daten_heber = mysqli_fetch_assoc ( $heber ) ) {



	    if( $daten_heber['Geschlecht'] == "Weiblich"){
	        $W_Check=1;
	    }else{
	        $M_Check=1;
	    }
	    //If Pokal ==1 checke ob bei $Z_HpM == $An_H_p_M - 1 ein W und ein M vorhanden wenn nicht dann nicht weiter machen
	    if ( ( ($Pokal==1) && ($Z_HpM == $An_H_p_M - 1 ) && ($W_Check==1 && $M_Check==1) ) || ( ($Pokal==1) && ($Z_HpM != $An_H_p_M - 1 ) ) || $Pokal==0  ) {

		if ($Z_Mann <= $An_M_V) {

			$Z_HpM++;
			$Z = "Mann_" . $Z_Mann;

			if ($Z_HpM <= $An_H_p_M) {

			    $arrayHeberVerein[$daten_verein['laender']][]=$daten_heber['Vorname'].' '.$daten_heber['Name'];

			    if($Land!=$daten_heber['Land']){
				    $$Z = 0;
				}


					$$Z = $$Z + $daten_heber ['M_K_G'];



				if ($Z_HpM == $An_H_p_M) {
					$safe = $$Z;

					dbBefehl ( "INSERT INTO auswertung_laender_mannschaft_".$data_a_db['S_Db']." (laender, Punkte)
									Values ('".$daten_verein['laender_lang']."', '$safe')" );

					$$Z = 0;
					$Z_Mann = $Z_Mann + 1;
					$Z_HpM = 0;
				}
			}
		}
	    } //Ende Pokal abfrage
	    $Land=$daten_heber['Land'];
	}

	} //Schlie�t if >= als min_h_p_M



}


$platz = 0;

//var_dump($arrayHeberVerein);



$daten_Mann = dbBefehl ( "SELECT * FROM auswertung_laender_mannschaft_".$data_a_db['S_Db'].", laender
							WHERE auswertung_laender_mannschaft_".$data_a_db['S_Db'].".laender = laender.laender_lang
                           ORDER BY auswertung_laender_mannschaft_".$data_a_db['S_Db'].".Punkte DESC" );

echo "<div id=\"divid1\" class=\"examplediv\">";

echo "<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
            <colgroup>
                 <col width=\"250\">
                 <col width=\"150\">
                 <col width=\"150\">
                 <col width=\"150\">
                 <col width=\"150\">
            </colgroup>

            <thead>

            <tr>
                 <th>Land</th>
                 <th>Heber</th>
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

	echo "<tr>";

	echo "<td>".$dsatz['laender_lang']."</td>";
	echo "<td></td>";

	echo"<td>".$dsatz['Punkte']." Pkt</td>";
	echo"<td>".$platz."</td>";


    echo "</tr>";



    foreach ($arrayHeberVerein[$dsatz['laender']] as &$value) {

        echo "

		<tr>
		<td></td>
		<td>$value</td>
		<td></td>
		<td></td>
		</tr>";

    }

	dbBefehl ( "UPDATE auswertung_laender_mannschaft_".$data_a_db['S_Db']."
                              SET Platz= '$platz'
                              WHERE laender ='".$dsatz['laender_lang']."'
                              " );
}
echo "</tbody>";
echo "</table>";

?>



</form>
</body>
</html>
