<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

ob_start ();
error_reporting(0);
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl.css" />
<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl_print.css" media="print" />

</head>



<body>


<form method="post" action="auswertung_export.php">

<a href="auswertung.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>


<?php
include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

// Input Array f�r .csv Datei mit Kopfzeile
$array_csv = array();
$array_csv_data = array();

// Pfad zur aktuellen Datei
$path = preg_replace ("/\\\\/","/",__FILE__);
$path = dirname ($path);
$path = trim($path);

// Pfad zum Backup
$path .= "/CSV/";

// Art der Datei
$filetype='.csv';

// Datei Name
$DateiName='auswertung';

//�ffnet Stream zu .csv Datei in /CSV
$backup_pfad=$path.$DateiName.$filetype;
$fp= fopen($backup_pfad, 'w');

$Verein = dbBefehl("SELECT * FROM verein");

$A_Kl = dbBefehl("SELECT * FROM alters_klassen");


$time=getdate();

$auswerte_Gruppe=0;						//Damit in Auswertung �ber alle Gruppen Ausgewertet wird

include 'funktionen/auswertung.php';   //Keine Funktion sondern einfach php einschub

if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T')
	include 'funktionen/platzierungmk.php';   //Keine Funktion sondern einfach php einschub
else
	include 'funktionen/platzierung.php';


$array_csv[]='Vorname';
$array_csv[]='Name';
$array_csv[]='Verein';
$array_csv[]='JG';
$array_csv[]='KG';
$array_csv[]='M/W';
$array_csv[]='R1';
$array_csv[]='R1_G';
$array_csv[]='R2';
$array_csv[]='R2_G';
$array_csv[]='R3';
$array_csv[]='R3_G';
$array_csv[]='S1';
$array_csv[]='S1_G';
$array_csv[]='S2';
$array_csv[]='S2_G';
$array_csv[]='S3';
$array_csv[]='S3_G';

if($stammdaten['Wk_Art']=='M_m_T'){
	$array_csv[]='Technik_R1';
	$array_csv[]='Technik_R2';
	$array_csv[]='Technik_R3';
	$array_csv[]='Technik_S1';
	$array_csv[]='Technik_S2';
	$array_csv[]='Technik_S3';
}


                 if($stammdaten['Pendellauf'] == "1")
                 	$array_csv[]='Pendell';

                 if($stammdaten['Sprint'] == "1")
                 	$array_csv[]='Sprint';

                 if(($stammdaten['Differenzsprung'] == "1")||($stammdaten['DifferenzsprungEmatte'] == "1"))
                 	$array_csv[]='DiffSp';

                 if($stammdaten['Schlussdreisprung'] == "1")
                 	$array_csv[]='3Hopp';

                 if($stammdaten['Schockwurf'] == "1")
                 	$array_csv[]='Schockwurf';

                 if($stammdaten['Anristen'] == "1")
                 	$array_csv[]='Anristen';

                 if($stammdaten['Klimmziehen'] == "1")
                 	$array_csv[]='Klimmz';

                 if($stammdaten['Zug'] == "1")
                 	$array_csv[]='Zug';

                 if($stammdaten['Bankdruecken'] == "1")
                 	$array_csv[]='Bankdr';

                 if($stammdaten['Liegestuetz'] == "1")
                 	$array_csv[]='Liegest';

                 if($stammdaten['Beugestuetz'] == "1")
                 	$array_csv[]='Beugest';

                 if($stammdaten['Sternlauf'] == "1")
                 	$array_csv[]='Sternl';


                 if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T'){
                 	$array_csv[]='Pt';
                 	$array_csv[]='PlatzMK';
                 }else{
                 	$array_csv[]='Last_ZK';
                 	$array_csv[]='Platz_GwKl';
                 }



                 fputcsv($fp, $array_csv);



if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T'){

$dbGruppen = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']);
$An_G=mysqli_num_rows($dbGruppen);

  for ($start=1;$start<=$An_G;$start++)
    $arrayWkGrp[]=$start;

}else{
	$arrayWkGrp[]=0;
}


foreach ($arrayWkGrp as &$Grp) {


if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T'){

	$heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
			AND heber.IdVerein = verein.IdVerein
			ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".M_K_G DESC
			");
}else if($stammdaten['Wk_Art']=='ZK'){

	if($stammdaten['Masters']==1)
		$query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
		WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
		AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
		AND heber.IdVerein = verein.IdVerein
		ORDER BY FIELD(Al_Kl, 'Kinder', 'Sch�ler', 'Jugend', 'Junioren', 'Aktive', 'M_AK1', 'M_AK2', 'M_AK3',
		'M_AK4', 'M_AK5', 'M_AK6', 'M_AK7', 'M_AK8', 'M_AK9', 'M_AK10'), heber.Geschlecht ASC,
		auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
		auswertung_".$data_a_db['S_Db'].".Platz_GwKl ASC";
		else{

			$Klasse = dbBefehl("SELECT * FROM alters_klassen_zk ORDER BY Von ASC");

			while($dataKlassen = mysqli_fetch_assoc($Klasse))
			{
				if($query_Klassen == '') $query_Klassen="'" . $dataKlassen['Klasse'] . "'";
				else $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassen['Klasse'] . "'";

			}

			$query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber.IdVerein = verein.IdVerein
			ORDER BY FIELD(Al_Kl, " . $query_Klassen . "), heber.Geschlecht ASC,
			auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
			auswertung_".$data_a_db['S_Db'].".Platz_GwKl ASC";
		}

		$heber_aus= dbBefehl($query);


	//include 'Outsorst/heber_auswahl_zk.php';

}else if($stammdaten['Wk_Art']=='BL'){

	$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber.IdVerein = verein.IdVerein
			ORDER BY FIELD(heber.IdVerein, '$Verein1' , '$Verein2'),
			auswertung_".$data_a_db['S_Db'].".Relativ_P DESC");
}


$x=0;



$time=getdate();

$i = 0;



while($dsatz = mysqli_fetch_assoc($heber_aus))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{
		//fputcsv($fp, $dsatz);

	$array_csv_data[]=$dsatz['Name'];
	$array_csv_data[]=$dsatz['Vorname'];
	$array_csv_data[]=$dsatz['Verein'];
	$array_csv_data[]=$dsatz['Jahrgang'];
	$array_csv_data[]=$dsatz['Gewicht'];
	$array_csv_data[]=$dsatz['Geschlecht'];
	$array_csv_data[]=$dsatz['R_1'];
	$array_csv_data[]=$dsatz['R_1_G'];
	$array_csv_data[]=$dsatz['R_2'];
	$array_csv_data[]=$dsatz['R_2_G'];
	$array_csv_data[]=$dsatz['R_3'];
	$array_csv_data[]=$dsatz['R_3_G'];
	$array_csv_data[]=$dsatz['S_1'];
	$array_csv_data[]=$dsatz['S_1_G'];
	$array_csv_data[]=$dsatz['S_2'];
	$array_csv_data[]=$dsatz['S_2_G'];
	$array_csv_data[]=$dsatz['S_3'];
	$array_csv_data[]=$dsatz['S_3_G'];

	if($stammdaten['Wk_Art']=='M_m_T'){
		$array_csv_data[]=$dsatz['R_1_Te'];
		$array_csv_data[]=$dsatz['R_2_Te'];
		$array_csv_data[]=$dsatz['R_3_Te'];
		$array_csv_data[]=$dsatz['S_1_Te'];
		$array_csv_data[]=$dsatz['S_2_Te'];
		$array_csv_data[]=$dsatz['S_3_Te'];
	}

     if($stammdaten['Pendellauf'] == "1"){
     	$Pendel=0;
                     if(($dsatz['Pendellauf'] != 0)&&($dsatz['Pendel2'] != 0)){

                        if($dsatz['Pendellauf']<=$dsatz['Pendel2']){
                                 $Pendel=$dsatz['Pendellauf'];
                        }else{
                                 $Pendel=$dsatz['Pendel2'];
                        }

                     }
                     $P=$Pendel;
                     if((($dsatz['Pendellauf'] != 0)&&($dsatz['Pendellauf'] != NULL))&&(($dsatz['Pendel2'] == 0)||($dsatz['Pendel2'] == NULL))){
                         $Pendel=$dsatz['Pendellauf'];
                     }
                     if((($dsatz['Pendellauf'] == 0)||($dsatz['Pendellauf'] == 0))&&(($dsatz['Pendel2'] != 0)&&($dsatz['Pendel2'] != NULL))){
                         $Pendel=$dsatz['Pendel2'];
                     }

        $array_csv_data[]=$Pendel;

     }

     if($stammdaten['Sprint'] == 1){
     	$Sprint=0;
                     if(($dsatz['Sprint'] != 0)&&($dsatz['Sprint2'] != 0)){

                        if($dsatz['Sprint']<=$dsatz['Sprint2']){
                                 $Sprint=$dsatz['Sprint'];
                        }else{
                                 $Sprint=$dsatz['Sprint2'];
                        }

                     }
                     if((($dsatz['Sprint'] != 0)&&($dsatz['Sprint'] != NULL))&&(($dsatz['Sprint2'] == 0)||($dsatz['Sprint'] == NULL))){
                         $Sprint=$dsatz['Sprint'];
                     }
                     if((($dsatz['Sprint'] == 0)||($dsatz['Sprint'] == NULL))&&(($dsatz['Sprint2'] != 0)&&($dsatz['Sprint2'] != NULL))){
                         $Sprint=$dsatz['Sprint2'];
                     }

         $array_csv_data[]=$Sprint;

     }

     if(($stammdaten['Differenzsprung'] == 1)||($stammdaten['DifferenzsprungEmatte'] == 1)){
     	$Differenzsprung=0;

         if($dsatz['Differenzsprung']<=$dsatz['Differenzsprung2']){
                 $Differenzsprung=$dsatz['Differenzsprung2'];
         }else{
                 $Differenzsprung=$dsatz['Differenzsprung'];
         }

         $array_csv_data[]=$Differenzsprung;

     }


     if($stammdaten['Schlussdreisprung'] == 1){
     	$Schlussdreisprung=0;
         if($dsatz['Schlussdreisprung']<=$dsatz['Schlussdreisprung2']){
                 $Schlussdreisprung=$dsatz['Schlussdreisprung2'];
         }else{
                 $Schlussdreisprung=$dsatz['Schlussdreisprung'];
         }
         if($Schlussdreisprung<=$dsatz['Schlussdreisprung3']){
                 $Schlussdreisprung=$dsatz['Schlussdreisprung3'];
         }

         $array_csv_data[]=$Schlussdreisprung;

     }

     if($stammdaten['Schockwurf'] == 1){
     	$Schockwurf=0;
         if($dsatz['Schockwurf']<=$dsatz['Schockwurf2']){
                 $Schockwurf=$dsatz['Schockwurf2'];
         }else{
                 $Schockwurf=$dsatz['Schockwurf'];
         }
         if($Schockwurf<=$dsatz['Schockwurf3']){
                 $Schockwurf=$dsatz['Schockwurf3'];
         }

      $array_csv_data[]=$Schockwurf;

     }

     if($stammdaten['Anristen'] == "1"){

      $array_csv_data[]=$dsatz['Anristen'];

     }

     if($stammdaten['Klimmziehen'] == "1"){

     	$array_csv_data[]=$dsatz['Klimmziehen'];

     }

     if($stammdaten['Zug'] == "1"){

     	$array_csv_data[]=$dsatz['Zug'];
     }

     if($stammdaten['Bankdruecken'] == "1"){

     	$array_csv_data[]=$dsatz['Bankdruecken'];

     }

     if($stammdaten['Liegestuetz'] == "1"){

     	$array_csv_data[]=$dsatz['Liegestuetz'];

     }

     if($stammdaten['Beugestuetz'] == "1"){

     	$array_csv_data[]=$dsatz['Beugestuetz'];

     }

     if($stammdaten['Sternlauf'] == "1"){
     	$Stern=0;
                     if(($dsatz['Sternlauf'] != "0.0")&&($dsatz['Stern2'] != "0.0")){

                        if($dsatz['Sternlauf']<=$dsatz['Stern2']){
                                 $Stern=$dsatz['Sternlauf'];
                        }else{
                                 $Stern=$dsatz['Stern2'];
                        }

                     }
                     $S=$Stern;
                     if((($dsatz['Sternlauf'] != "0.0")&&($dsatz['Sternlauf'] != NULL))&&(($dsatz['Stern2'] == "0.0")||($dsatz['Stern2'] == NULL))){
                         $Stern=$dsatz['Sternlauf'];
                     }
                     if((($dsatz['Sternlauf'] == "0.0")||($dsatz['Sternlauf'] == "0.0"))&&(($dsatz['Stern2'] != "0.0")&&($dsatz['Stern2'] != NULL))){
                         $Stern=$dsatz['Stern2'];
                     }

        $array_csv_data[]=$Stern;


     }


     if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T'){
     	$array_csv_data[]=$dsatz['M_K_G'];
     	$array_csv_data[]=$dsatz['Platz_MK'];
     }else{
     	$array_csv_data[]=$dsatz['Z_K'];
     	$array_csv_data[]=$dsatz['Platz_GwKl'];
     }


     fputcsv($fp, $array_csv_data);

     unset($array_csv_data);
}



}  //for ENDE f�r Alle Grp drucken



echo "</tbody>";
echo "</table>";

// Schlie�t den Stream f�r .csv Datei
fclose ($fp);

$filePath = $backup_pfad;

if (file_exists($filePath)) {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($filePath));
	ob_clean();
	flush();
	readfile($filePath);
	exit;
}

?>

<br><br>
<br><br>
<br><br>
<table width="100%" border="0" cellpadding="0" cellspacing="2">
 <tr>
  <td><hr id="un" class="linie"></td>
  <td><hr id="un" class="linie"></td>
  <td><hr id="un" class="linie"></td>
 </tr>
</table>





</form>
</body>
</html>
