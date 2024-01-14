<?php

$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

$stammdaten = mysqli_fetch_assoc($datenbank);

include 'funktionen/nuetzliches.php';

$auswerte_Gruppe=$_SESSION['Grp_Ueb_mk'];	//Damit in Auswertung nur �ber diese Grp Ausgewertet wird

// include 'funktionen/auswertung_heber_einfügen.php'; //Um die Heber in Auswertung zu �bertragen
// include 'funktionen/auswertung.php';	//Wird schon in Mehrkampf eingaben ausgef�hrt

function MkTd($Art, $stammdaten, $dsatz) {
	global $Punkte_Gesamt;
	if($stammdaten[$Art] == "1"){
		$Art="Pt_" . $Art;
		echo "<td  id=\"e-col\">";
		echo "<td>";
			echo $dsatz[$Art];
		echo "</td>";
		$Punkte_Gesamt+=$dsatz[$Art];
	}
}


$Grp = $_SESSION['Grp_Ueb_mk'];

if (empty($_SESSION['GesGrp'])) {
    $_SESSION['GesGrp'] = 0;
}
$_SESSION['GesGrp'] = 0;


//include 'funktionen/platzierungmk.php'; //Wird schon in Mehrkampf eingaben ausgef�hrt



ob_start ();
error_reporting(E_ALL);


$Grp = $_SESSION['Grp_Ueb_mk'];

         if($stammdaten['Wk_Art'] == "M_o_T" || $stammdaten['Wk_Art'] == "M_m_T")
         	$OrderByString="ORDER BY heber_".$data_a_db['S_Db'].".Gruppe_aus ASC, heber.Name ASC";
         else
         	$OrderByString="ORDER BY heber.Gewicht ASC, heber.Name ASC";

					echo $Grp;
         $heber = dbBefehl("SELECT * FROM heber, auswertung_mk_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", staaten, verein, auswertung_".$data_a_db['S_Db']."
                               WHERE heber.IdHeber = auswertung_mk_".$data_a_db['S_Db'].".IdHeber
						   					 			 AND heber.IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               AND heber.IdStaat=staaten.IdStaat
							   					 		 AND heber.IdVerein = verein.IdVerein
                               $OrderByString
                               ");

         $Verein = dbBefehl("SELECT * FROM verein");

         $datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
         $stammdaten = mysqli_fetch_assoc($datenbank);

         if($stammdaten['Wk_Art']=='BL'){
              $DataVereinsAuswahl = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
              $VereinsAuswahl = mysqli_fetch_assoc($DataVereinsAuswahl);
         }


$x=0;


echo"<div id=\"divid1\" class=\"examplediv\">";


echo "

<table class=\"tabelle\">
  <colgroup>
    <col width=\"210\">
	<col>
	<col width=\"150\">
	<col>
	<col><col><col><col><col>

";

    if($stammdaten['Flagge']==3){
    	echo "<col>
    	<col width=\"46\">";
    }


    if($stammdaten['Pendellauf'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Sprint'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Differenzsprung'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['DifferenzsprungEmatte'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Schlussdreisprung'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Schockwurf'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Anristen'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Klimmziehen'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Zug'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Bankdruecken'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Liegestuetz'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Beugestuetz'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    if($stammdaten['Sternlauf'] == "1"){

    	echo"<col><col width=\"150\"> ";

    }

    echo "<col><col><col>"; 	//Ergebnisse

echo "</colgroup>";

echo '<thead>';


echo"

 <tr>
  <th>Name</th>
  <th id=\"e-col\"></th>";
  if($stammdaten['International']=='0') echo '<th>Verein</th>';
  else echo '<th>Staat</th>';

  if($stammdaten['Flagge']==3){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Flagge</th>";
  }


  echo"<th id=\"e-col\"></th>";
  if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T') echo "<th>G</th> <th id=\"e-col\"></th>";

  echo"
  <th>JG</th>
  <th id=\"e-col\"></th>";

  echo "<th>KoeGw</th>";


  if($stammdaten['Pendellauf'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Pendellauf</th>";

  }

  if($stammdaten['Sprint'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Sprint</th>";

  }

  if($stammdaten['Differenzsprung'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Differenzsprung</th>";

  }

  if($stammdaten['DifferenzsprungEmatte'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Differenzsprung</th>";

  }

  if($stammdaten['Schlussdreisprung'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Schlussdreisprung</th>";

  }

  if($stammdaten['Schockwurf'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Schockwurf</th>";

  }

  if($stammdaten['Anristen'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Anristen</th>";

  }

  if($stammdaten['Klimmziehen'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Klimmziehen</th>";

  }

  if($stammdaten['Zug'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Zug</th>";

  }

  if($stammdaten['Bankdruecken'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Bankdruecken</th>";

  }

  if($stammdaten['Liegestuetz'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Liegestuetz</th>";

  }

  if($stammdaten['Beugestuetz'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Beugestuetz</th>";

  }

  if($stammdaten['Sternlauf'] == "1"){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Sternlauf</th>";

  }

  echo '<th id=\"e-col\"></th>
    <th>Erg</th>
    <th>Pl</th>';

echo '</tr>';


echo"</thead>";

$time=getdate();

$i = 0;


$num_rows=mysqli_num_rows($heber);
echo $num_rows;
while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

$i = $i+1;

$Punkte_Gesamt=0;

     $Id="Id" . $i;
     $Loeschen="Loeschen" . $i;
     $Ausserkonkurrenz="Ausserkonkurrenz" . $i;
     $Konkurrenz="Konkurrenz" . $i;
     $Gewicht="Gewicht" . $i;
     $V1R="V1R" . $i;
     $V1S="V1S" . $i;
     $V2R="V2R" . $i;
     $V2S="V2S" . $i;
     $V3R="V3R" . $i;
     $V3S="V3S" . $i;

     $V1RT="V1RT" . $i;
     $V1ST="V1ST" . $i;
     $V2RT="V2RT" . $i;
     $V2ST="V2ST" . $i;
     $V3RT="V3RT" . $i;
     $V3ST="V3ST" . $i;

     $V1RG="V1RG" . $i;
     $V1SG="V1SG" . $i;
     $V2RG="V2RG" . $i;
     $V2SG="V2SG" . $i;
     $V3RG="V3RG" . $i;
     $V3SG="V3SG" . $i;

     $V1RUG="V1RUG" . $i;
     $V1SUG="V1SUG" . $i;
     $V2RUG="V2RUG" . $i;
     $V2SUG="V2SUG" . $i;
     $V3RUG="V3RUG" . $i;
     $V3SUG="V3SUG" . $i;


echo "<input type=\"text\" name=$Id size=\"0\" style=\" display: none; \" value=\"$dsatz[IdHeber]\"readonly>";

echo "<tbody>";

if($stammdaten['Hauptauswertung']==0 && $stammdaten['Wk_Art']=='ZK'){
	if($i!=1){
		if ($OldGwKl != $dsatz ['GwKl']) {
			echo "<tr id=\"zwischenraum\">";
				echo "<td id=\"noBorder\">";
					echo "</td>";
			echo "</tr>";
		}
	}
}


echo "<tr>";


     echo "<td>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];
     echo "</td>";

     echo "<td  id=\"e-col\">";
         echo ' ';
     echo "</td>";

     echo "<td>";
          if($stammdaten['International']=='0')echo $dsatz['Verein'];
          else echo $dsatz['Staat'];
     echo "</td>";

     if($stammdaten['Flagge']==3){

     	$IdHeber=$dsatz['IdHeber'];
     	$DBFlagge = dbBefehl("SELECT * FROM staaten, heber
     							WHERE heber.IdHeber= $IdHeber
     							AND heber.IdStaat= staaten.IdStaat
     						");
     	$DataFlagge = mysqli_fetch_assoc($DBFlagge);

     	echo "<td  id=\"e-col\">";
     		echo ' ';
     	echo "</td>";

     	echo "<td>";
     		echo '<div id="rahmen"> <img src="Bilder/FlaggenStaaten/'.$DataFlagge['IdStaat'].'.'.$DataFlagge['FlaggenFormat'].'" alt="Flagge" id="bild"> </div>';
     	echo "</td>";
     }

     if($stammdaten['Wk_Art']=='M_o_T' || $stammdaten['Wk_Art']=='M_m_T'){
         echo "<td  id=\"e-col\">";
                 echo ' ';
         echo "</td>";

         echo "<td>";
                 echo $dsatz['Gruppe_Aus'];
         echo "</td>";
     }

     echo "<td  id=\"e-col\">";

     echo "</td>";

     echo "<td>";                       //Kann beides wieder weg sp�ter
          echo $dsatz['Jahrgang'];
     echo "</td>";

     echo "<td  id=\"e-col\">";        // Bis hier

     echo "<td>";
     	echo $dsatz['Gewicht'];
     echo "</td>";




 MkTd("Pendellauf", $stammdaten, $dsatz);
 MkTd("Sprint", $stammdaten, $dsatz);
 MkTd("Schlussdreisprung", $stammdaten, $dsatz);
 MkTd("Schockwurf", $stammdaten, $dsatz);
 MkTd("Anristen", $stammdaten, $dsatz);
 MkTd("Klimmziehen", $stammdaten, $dsatz);
 MkTd("Zug", $stammdaten, $dsatz);
 MkTd("Bankdruecken", $stammdaten, $dsatz);
 MkTd("Liegestuetz", $stammdaten, $dsatz);
 MkTd("Beugestuetz", $stammdaten, $dsatz);
 MkTd("Sternlauf", $stammdaten, $dsatz);
 MkTd("Differenzsprung", $stammdaten, $dsatz);
 MkTd("DifferenzsprungEmatte", $stammdaten, $dsatz);


 echo "<td  id=\"e-col\"></td>";
 echo "<td>";
 	echo $Punkte_Gesamt;
 echo "</td>";
 echo "<td>";
 	echo $dsatz['Platz_MK'];
 echo "</td>";


echo "</tr>";

$OldGwKl=$dsatz['GwKl'];

}
echo "</tbody>";
echo "</table>";

echo'<div id="new_load"></div>';




?>



<body></body>
<html></html>
