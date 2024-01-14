<?php
//Zeit f�r BL wieder n �bersicht

ob_start ();
error_reporting(1);



$data_a_db['S_Db']=$_SESSION['WeK'];

$BlEinzelGrp=$_SESSION['EinzelGruppenUebersicht'];

include 'funktionen/nuetzliches.php';

include 'funktionen/auswertung_funktionen.php';


$auswerte_Gruppe=$dNow['Gruppe'];	//Damit in Auswertung nur �ber diese Grp Ausgewertet wird



// $start_time = microtime(true);
// $end_time = microtime(true);
// $execution_time = ($end_time - $start_time);
// echo "Page took " . $execution_time . " seconds to execute.";

$Grp = $dNow['Gruppe'];

if (empty($_SESSION['GesGrp'])) {
    $_SESSION['GesGrp'] = 0;
}
$_SESSION['GesGrp'] = 0;

// if($stammdaten['Wk_Art'] == "M_o_T" || $stammdaten['Wk_Art'] == "M_m_T"){
//          include 'funktionen/platzierungmk.php';
// }else{
//          include 'funktionen/platzierung.php';
// }


if($stammdaten['Wk_Art']=='BL'){
	$DataVereinsAuswahl = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
	$VereinsAuswahl = mysqli_fetch_assoc($DataVereinsAuswahl);

	$NameVerein1 = returnNameVerein($VereinsAuswahl['Verein1']);
	$NameVerein2 = returnNameVerein($VereinsAuswahl['Verein2']);
}

$Grp = $dNow['Gruppe'];

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

         if($stammdaten['Wk_Art'] == "M_o_T" || $stammdaten['Wk_Art'] == "M_m_T")
         	$OrderByString="ORDER BY heber_".$data_a_db['S_Db'].".Gruppe_aus ASC, heber.Name ASC";
         elseif($stammdaten['Wk_Art'] == "ZK" && $stammdaten['MitNorm'] == 0)
         	$OrderByString="ORDER BY heber.AlKl, heber.Gewicht ASC, heber.Name ASC";
         elseif($stammdaten['Wk_Art'] == "ZK" && $stammdaten['MitNorm'] == 1)
         	$OrderByString="ORDER BY heber.Gewicht ASC, auswertung_".$data_a_db['S_Db'].".Platz_Norm ASC, heber.Name ASC";
         elseif($stammdaten['Wk_Art'] == "BL"){
         	if($stammdaten['UebersichtNachVerein'] == 1){
         		$OrderByString="ORDER BY FIELD(verein.Verein, '$NameVerein1', '$NameVerein2')  , heber_".$data_a_db['S_Db'].".Gruppe ASC, heber.Gewicht ASC, heber.Name ASC";
         	}else{
         		$OrderByString="ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC, verein.Verein ASC,heber.Gewicht ASC, heber.Name ASC";
         	}
         }
         	//Damit alle Gruppen in der �bersicht angezeigt werden in der Bundesliga
         	if($stammdaten['Wk_Art']=='BL' && $BlEinzelGrp==0){
         	    $StringGruppenAuswahl="AND heber_".$data_a_db['S_Db'].".Gruppe != '0' ";
         	}else{
         	    $StringGruppenAuswahl="AND heber_".$data_a_db['S_Db'].".Gruppe = '".$Grp."'";
         	}

          $wk_num = $data_a_db['S_Db'];
          // Columns explicitly mapped to their respective tables
          // $columns_to_select = "
          //     heber.Name, heber.IdHeber, auswertung_{$wk_num}.Platz_GwKl, heber.GwKl,
          //     auswertung_{$wk_num}.Relativ_P, staaten.Staat, heber.Vorname, auswertung_{$wk_num}.Gw_Kl, heber.Jahrgang,
          //     auswertung_{$wk_num}.Platz_Sin, auswertung_{$wk_num}.Platz_Sin_Malone_Meltzer, auswertung_{$wk_num}.Z_K, auswertung_{$wk_num}.Robbi_P,
          //     auswertung_{$wk_num}.R_2_G, auswertung_{$wk_num}.Al_Kl, auswertung_{$wk_num}.Platz_Robi_Quali,
          //     auswertung_{$wk_num}.S_2_G, heber_{$wk_num}.Gruppe, auswertung_{$wk_num}.S_1_G, heber.AlKl,
          //     auswertung_{$wk_num}.Robbi_Quali_P, auswertung_{$wk_num}.Sinclair_P_Malone_Meltzer, auswertung_{$wk_num}.Platz_Robi,
          //     auswertung_{$wk_num}.Platz_RP, heber.Gewicht, auswertung_{$wk_num}.R_1_G, auswertung_{$wk_num}.R_Gewicht, verein.Verein,
          //     heber_{$wk_num}.Gruppe_Aus, auswertung_{$wk_num}.S_3_G,
          //     auswertung_{$wk_num}.R_1, auswertung_{$wk_num}.R_2, auswertung_{$wk_num}.R_3,
          //     auswertung_{$wk_num}.S_1, auswertung_{$wk_num}.S_2, auswertung_{$wk_num}.S_3,
          //     auswertung_{$wk_num}.R_1_Ver, auswertung_{$wk_num}.R_2_Ver, auswertung_{$wk_num}.R_3_Ver,
          //     auswertung_{$wk_num}.S_1_Ver, auswertung_{$wk_num}.S_2_Ver, auswertung_{$wk_num}.S_3_Ver
          // ";

          // if($stammdaten['Wk_Art']=='M_m_T'){    
          //   $columns_to_select .= ",
          //   auswertung_{$wk_num}.M_K_G, auswertung_{$wk_num}.Platz_MK,
          //   auswertung_{$wk_num}.R_1_Te, auswertung_{$wk_num}.R_2_Te, auswertung_{$wk_num}.R_3_Te,
          //   auswertung_{$wk_num}.S_1_Te, auswertung_{$wk_num}.S_2_Te, auswertung_{$wk_num}.S_3_Te
          //   ";
          // }
          
          // if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T'){    
          //   $columns_to_select .= ",
          //   auswertung_{$wk_num}.Platz_ZK
          //   ";
          // }

         $columns_to_select = " * ";
          // " . $columns_to_select . "
         $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", staaten, verein
                               WHERE heber.IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               ".$StringGruppenAuswahl."
                               AND heber.IdStaat=staaten.IdStaat
						                   AND heber.IdVerein = verein.IdVerein
                               $OrderByString
                               ");


         $Verein = dbBefehl("SELECT * FROM verein");


$num_rows=mysqli_num_rows($heber);

$x=0;


echo"<div id=\"divid1\" class=\"examplediv\">";


//�bertabelle zur Bundesliga�bersicht
if($stammdaten['Wk_Art']=='BL'){



    $Pt_V1=0;
    $Pt_V2=0;

    if($VereinsAuswahl['R_Pt_V1']!=$VereinsAuswahl['R_Pt_V2'])
        if($VereinsAuswahl['R_Pt_V1']>$VereinsAuswahl['R_Pt_V2']) $Pt_V1++;
        else                                                  $Pt_V2++;

        if($VereinsAuswahl['S_Pt_V1']!=$VereinsAuswahl['S_Pt_V2'])
            if($VereinsAuswahl['S_Pt_V1']>$VereinsAuswahl['S_Pt_V2']) $Pt_V1++;
            else                                                  $Pt_V2++;

            if($VereinsAuswahl['RuS_Pt_V1']!=$VereinsAuswahl['RuS_Pt_V2'])
                if($VereinsAuswahl['RuS_Pt_V1']>$VereinsAuswahl['RuS_Pt_V2']) $Pt_V1++;
                else                                                      $Pt_V2++;



                echo'<table class="BlTabelle" width="100%" align="left">';
                if($stammdaten['Zeitnehmer']!='0'){
                	echo "<colgroup>";
                	echo "<col width=\"52%\">"; //Name
                	echo "<col width=\"12%\">"; //Name
                	echo "<col width=\"12%\">"; //Name
                	echo "<col width=\"12%\">"; //Name
                	echo "<col width=\"12%\">"; //Name
                	echo "</colgroup>";
                }else{
                	echo "<colgroup>";
                	echo "<col width=\"55%\">"; //Name
                	echo "<col width=\"15%\">"; //Name
                	echo "<col width=\"15%\">"; //Name
                	echo "<col width=\"15%\">"; //Name
                	echo "</colgroup>";
                }



                echo'<tr>';
                echo'<th>Verein</th>';
                echo'<th>Reissen</th>';
                echo'<th>Stossen</th>';
                echo'<th>Gesamt</th>';

                if($stammdaten['Zeitnehmer']!='0'){

                	if($stammdaten['Verein_Anzahl']==3){
                		echo'<th  rowspan="4">';
                		echo'<p class="showTimeBox"><span id="showTime"></span></p>'; //Zeit: <br>
                		echo'</th>';
                	}else{
                		echo'<th  rowspan="3">';
                		echo'<p class="showTimeBox"><span id="showTime"></span></p>'; //Zeit: <br>
                		echo'</th>';
                	}


                }
                echo'</tr>';



                    $NameVerein1 = returnNameVerein($VereinsAuswahl['Verein1']);
                    $NameVerein2 = returnNameVerein($VereinsAuswahl['Verein2']);

                    if($stammdaten['Verein_Anzahl']=='3')
                        $NameVerein3 = returnNameVerein($VereinsAuswahl['Verein3']);

                        echo'<tr >';
                        echo'<th id="HideOverflow" id="Verein">' . $NameVerein1 . '</th>';
                        echo'<th id="Verein">' . $VereinsAuswahl['R_Pt_V1'] . '</th>';
                        echo'<th id="Verein">' . $VereinsAuswahl['S_Pt_V1'] . '</th>';
                        echo'<th id="Verein">' . $VereinsAuswahl['RuS_Pt_V1'].'</th>';       // . '('.$VereinsAuswahl[Hochrechnung_V1].')'
                        echo'</tr>';

                        echo'<tr>';
                        echo'<th  id="HideOverflow" id="Verein">' . $NameVerein2 . '</th>';
                        echo'<th id="Verein">' . $VereinsAuswahl['R_Pt_V2'] . '</th>';
                        echo'<th id="Verein">' . $VereinsAuswahl['S_Pt_V2'] . '</th>';
                        echo'<th id="Verein">' . $VereinsAuswahl['RuS_Pt_V2'] .'</th>';     //. '('.$VereinsAuswahl[Hochrechnung_V2].')'
                        echo'</tr>';

                        if($stammdaten['Verein_Anzahl']==3){
                            echo'<tr>';
                            echo'<th id="Verein">' . $NameVerein3 . '</th>';
                            echo'<th id="Verein">' . $VereinsAuswahl['R_Pt_V3'] . '</th>';
                            echo'<th id="Verein">' . $VereinsAuswahl['S_Pt_V3'] . '</th>';
                            echo'<th id="Verein">' . $VereinsAuswahl['RuS_Pt_V3'] .'</th>';     // . '('.$VereinsAuswahl[Hochrechnung_V3].')'
                            echo'</tr>';
                        }

                        echo'</table>';

                        echo'<br>';
                        echo'<br>';



}else{    //Bl Ende Aber trozdem Row f�r Zeit

    if($stammdaten['Wk_Art']!='BL'){
        if($stammdaten['Zeitnehmer']!='0'){
            echo'<div style="width: 100%">';
            echo'<div style="width: 20%; margin:auto; align:center;">';
            echo'<div class="showTimeBox">Zeit: <span id="showTime"></span></div>';
            echo'</div>';
            echo'</div>';
        }

    }

}


echo '<br>';

$Klein="3.5%";
$Mittel="4.5%";
$Mini="3%";


echo '<table class="tabelle" width="100%" >'; //id="flex"
echo "<colgroup>";

echo "<col width=\"18%\">"; //Name

//Vereins Spalte
if($stammdaten['Wk_Art'] == "BL"){
	if($stammdaten['UebersichtNachVerein'] == 1){
	//Dann keine Vereins Spalte
	}else{
		if($stammdaten['International']=='0' || $stammdaten['Wk_Art']=='BL') echo "<col width=\"20%\">";         //Verein
		else echo "<col width=\"5%\">";
	}
}else{
	if($stammdaten['International']=='0' || $stammdaten['Wk_Art']=='BL') echo "<col width=\"20%\">";         //Verein
	else echo "<col width=\"5%\">";
}
//Verein Ende

if($stammdaten['Flagge']==3){
	echo "<col width=\"".$Klein."\">";
}

if($stammdaten['Wk_Art']=='M_o_T' || $stammdaten['Wk_Art']=='M_m_T'){
    echo "<col width=\"".$Klein."\">"; //F�r Gruppe
}

if($stammdaten['MitNorm']=='1'){
    echo"<col width=\"".$Klein."\">";
}

//JG|KoeGw|RelGw(f�r BL)|Next|R1...

echo"<col width=\"".$Klein."\">"; //JG


if( $stammdaten['Wk_Art']=='BL'){ //Für KoeGw in BL
	echo"<col width=\"".$Mittel."\">";
}

if($stammdaten['Wk_Art']=='BL' && $stammdaten['Block_Heben']){
	echo"<col width=\"".$Mittel."\">"; // RelGw in BL
}

if($stammdaten['RelativArt']=="3"){
  echo"<col width=\"".$Mittel."\">"; // RelGw in BL
}



echo"<col width=\"".$Mittel."\">";

echo"<col width=\"".$Mittel."\">";


//Reissen STossen:
echo"<col width=\"".$Mini."\">";
if($stammdaten['Wk_Art']=='M_m_T') echo" <col width=\"".$Mini."\">";
echo "<col width=\"".$Mini."\">";
if($stammdaten['Wk_Art']=='M_m_T') echo" <col width=\"".$Mini."\">";
echo "<col width=\"".$Mini."\">";
if($stammdaten['Wk_Art']=='M_m_T') echo" <col width=\"".$Mini."\">";
// echo "<col width=\"35\">";	Reissen-Erg
// echo "<col width=\"35\">";	Reissen-Platzierung

echo "<col width=\"".$Mini."\">";
if($stammdaten['Wk_Art']=='M_m_T') echo" <col width=\"".$Mini."\">";
echo "<col width=\"".$Mini."\">";
if($stammdaten['Wk_Art']=='M_m_T') echo" <col width=\"".$Mini."\">";
echo "<col width=\"".$Mini."\">";
if($stammdaten['Wk_Art']=='M_m_T') echo" <col width=\"".$Mini."\">";
// echo "<col width=\"35\">";	Stossen-Erg
// echo "<col width=\"35\">";	Stossen-Platz
             //Ist f�r BL letzte leer zeile (Pr�fe mit width=350)

echo "<col width=\"".$Klein."\">"; //Erg
echo "<col width=\"".$Klein."\">";

if($stammdaten['Wk_Art']=='BL'){
               //Ist f�r BL letzte leer zeile (Pr�fe mit width=350)
   // PL f�r Rel wird nicht gebraucht echo "<col width=\"".$Klein."\">"; //In BL braucht man 3 Erg
}


if($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='1'){

    echo "<col width=\"".$Klein."\">";
    echo "<col width=\"".$Klein."\">";
}

if($stammdaten['Wk_Art']=='ZK' && ($stammdaten['RelativArt']=='0' || $stammdaten['RelativArt']=='2')){ //F�r Robi Points
    echo "<col width=\"".$Klein."\">";
	echo "<col width=\"".$Klein."\">";
}

if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T'){

    echo "<col width=\"".$Klein."\">";
    echo "<col width=\"".$Klein."\">";
}
if($stammdaten['MitNorm']=='1'){
    //echo "<col>";
    //echo "<col width=\"35\">";
    echo "<col width=\"".$Klein."\">";
}
echo "</colgroup>";

echo '<thead>';
echo" <tr>";
if($stammdaten['Wk_Art']=='BL'){
	if($stammdaten['UebersichtNachVerein'] == 1){
		echo"<th>$NameVerein1</th>";
	}else{
		if($BlEinzelGrp==0) echo"<th>Gruppe 1</th>";
		else                echo"<th>Gruppe ".$Grp."</th>";
	}

}else{
    echo"<th></th>";
}



if($stammdaten['Flagge']==3) echo "<th></th>";

if($stammdaten['Wk_Art']=='M_o_T' || $stammdaten['Wk_Art']=='M_m_T') echo"<th></th>";

if($stammdaten['MitNorm']=='1'){ //Für Spalte mit Ak von Norm

    echo'<th></th>';
}


//Hier wurden 2 mehr reingepackt--------------------------------------------------------------------------------------------------------
if( $stammdaten['Wk_Art']=='BL'){ //F�r RelGw Und ZK

	if($stammdaten['UebersichtNachVerein'] == 1){
		//Dann keine Vereins Spalte
	}else{
		echo"<th></th>";
	}

}

if($stammdaten['Wk_Art']=='BL' && $stammdaten['Block_Heben']){ //F�r Order
    echo"

  <th></th>";
}

echo"
  <th></th>
  <th></th>
  <th></th>
  <th></th>

";

if($stammdaten['RelativArt']=="3"){
  echo"<th></th>";
}

if($stammdaten['Wk_Art']=='M_m_T'){

   echo"<th id=\"center\" colspan=\"6\">Reissen</th>";

}else{

   echo"<th id=\"center\" colspan=\"3\">Reissen</th>";

}
//echo '<th></th>'; Reissen Erg
//echo '<th></th>'; Reissen Platz


if($stammdaten['Wk_Art']=='M_m_T'){

   echo"<th id=\"center\" colspan=\"6\">Stossen</th>";

}else{

   echo"<th id=\"center\" colspan=\"3\">Stossen</th>";

}

//echo '<th></th>'; Stossen Erg
//echo '<th></th>'; Stossen Platz

if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T') echo "<th id=\"center\" colspan=\"2\">ZK</th>";


if($stammdaten['Wk_Art']!='BL' && $stammdaten['MitNorm']!='1'){
	echo "<th id=\"center\" colspan=\"2\">Total</th>";
}
if($stammdaten['MitNorm']=='1'){
	echo "<th id=\"center\" colspan=\"2\">Jun</th>"; //Ohne Norm
	echo "<th id=\"center\" colspan=\"1\">".substr($stammdaten['NormAlKl'],0,2)."</th>";
}
if($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='1') echo "<th id=\"center\" colspan=\"2\">S-M-M</th>";

if($stammdaten['Wk_Art']=='ZK' && $stammdaten['RelativArt']=='0'){ //F�r Robi Points
	echo "<th id=\"center\" colspan=\"2\">Robi</th>";
}

if($stammdaten['Wk_Art']=='ZK' && $stammdaten['RelativArt']=='2'){ //F�r Quali Points
	echo "<th id=\"center\" colspan=\"2\">Quali</th>";
}


if($stammdaten['Wk_Art']=='BL' && $stammdaten['auswertung_art']==0){
   echo "<th>ZK</th><th id=\"center\" colspan=\"1\">Rel</th>";
}
if($stammdaten['Wk_Art']=='BL' && $stammdaten['auswertung_art']==1){
    echo "<th>ZK</th><th id=\"center\" colspan=\"1\">Sin</th>";
}
if($stammdaten['Wk_Art']=='BL' && $stammdaten['auswertung_art']==2){
    echo "<th>ZK</th><th id=\"center\" colspan=\"1\">Sin*F</th>";
}
echo"</tr>";



echo"

 <tr>
  <th >Name</th>";
if($stammdaten['International']=='0' || $stammdaten['Wk_Art']=='BL'){
	if($stammdaten['UebersichtNachVerein'] == 1){
		//Dann keine Vereins Spalte
	}else{
		echo '<th >Verein</th>';
	}

}
  else echo '<th>Staat</th>';

  if($stammdaten['Flagge']==3){
  	echo "<th>F</th>";
  }

  if($stammdaten['MitNorm']=='1'){

      echo"<th>J/A</th>";
  }

  if($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T') echo "<th>G</th>";

  if($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='1'){
    echo"<th>AlKl</th>";
  }else{
    echo"<th>JG</th>";
  }



  if($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='0')     echo "<th>GwKl</th>";
  elseif($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='1') echo "<th>SF*SMM</th>";
  else                                                           echo "<th>KoeGw</th>";

  if($stammdaten['RelativArt']=="3"){echo " <th>IAT-F</th>";}
  if($stammdaten['Wk_Art']=='BL' && $stammdaten['auswertung_art']==0) echo " <th>RelGw</th>";
  if($stammdaten['Wk_Art']=='BL' && $stammdaten['auswertung_art']==1) echo " <th>SinFak</th>";
  if($stammdaten['Wk_Art']=='BL' && $stammdaten['auswertung_art']==2) echo " <th>SinFak</th>";

  if($stammdaten['Wk_Art']=='BL' && $stammdaten['Block_Heben']) echo " <th>RF</th>";

  echo"
  <th>NEXT</th>
  <th>R1</th>";
  if($stammdaten['Wk_Art']=='M_m_T') echo '<th></th>';
  echo '<th>R2</th>';
  if($stammdaten['Wk_Art']=='M_m_T') echo '<th></th>';
  echo '<th>R3</th>';
  if($stammdaten['Wk_Art']=='M_m_T') echo '<th></th>';

  //echo "<th>Erg</th> <th>Pl</th>"; Reissen-Erg+Platz

  echo "
  <th>S1</th>";
  if($stammdaten['Wk_Art']=='M_m_T') echo '<th></th>';
  echo '<th>S2</th>';
  if($stammdaten['Wk_Art']=='M_m_T') echo '<th></th>';
  echo '<th>S3</th>';
  if($stammdaten['Wk_Art']=='M_m_T') echo '<th></th>';

  //echo "<th>Erg</th> <th>Pl</th>"; Stossen-Erg+Platz

  if($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='1'){
    echo"
    <th>Erg</th>
    <th>Pl</th>";
  }
  if($stammdaten['Wk_Art']!='ZK'  && $stammdaten['Wk_Art']!='BL'){
    echo '
    <th>Erg</th>
    <th>Pl</th>';
  }

  if($stammdaten['Wk_Art']=='ZK' && ($stammdaten['RelativArt']=='0' || $stammdaten['RelativArt']=='2')){ //F�r Robi Points
  	echo '
    <th>Erg</th>
    <th>Pl</th>';
  }

    if($stammdaten['Wk_Art']=='BL'){

        echo '<th>Erg</th>';    //F�r ZK Erg
    }

    echo '
    <th>Erg</th>';

    if($stammdaten['Wk_Art']!='BL'){ //Kein Rel PL f�r BL
    	echo'<th>Pl</th>';
    }


  if($stammdaten['MitNorm']=='1'){
  	echo '
    <th>Pl</th>';
  }
echo '</tr>';

echo"</thead>";

$time=getdate();

$i = 0;

while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

$i = $i+1;


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


if($stammdaten['Wk_Art']=='BL'){
	if($stammdaten['UebersichtNachVerein'] == 1){
		if($dsatz['Verein']!=$OldVerein&& $i!=1){
			$OldVerein=$dsatz['Verein'];
			echo "<tr>";
			echo"<td align=\"left\" style=\"border-right:0px; border-left:0px;\">".$dsatz['Verein']."</td>";
			echo "</tr>";
		}

	}else{
		if($dsatz['Gruppe']!=$OldGrp && $i!=1){
			$OldGrp=$dsatz['Gruppe'];
			echo "<tr>";
			echo"<td align=\"left\" style=\"border-right:0px; border-left:0px;\">Gruppe $OldGrp</td>";
			echo "</tr>";
		}
	}

}else{ //If NOT BL

if($dsatz['Gruppe']!=$OldGrp && $i!=1){
    $OldGrp=$dsatz['Gruppe'];
    echo "<tr>";
    echo"<td align=\"left\" style=\"border-right:0px; border-left:0px;\">Gruppe $OldGrp</td>";
    echo "</tr>";
}

}

     if($dsatz['IdHeber']==$dNow['IdHeber'])
     	echo "<tr id=\"trNow\">";
     else if($dsatz['IdHeber']==$dAfterNext['IdHeber'])
     	echo "<tr id=\"trNext\">";
     else{
       if($stammdaten['MitNorm']=='1' && $stammdaten['NormAlKl']=='Aktive' && $dsatz['Al_Kl'] != 'Aktive'){
         	echo "<tr id=\"tr_norm\">";
       }else{
       	echo "<tr>";
       }
     }


     echo '<td >';
     echo  $dsatz['Vorname'] . " ";
     echo  $dsatz['Name'] ; //<span style=\"width:150px;display:block;float:left;\"> </span>

     echo "</td>";

            if($stammdaten['International']=='0' || $stammdaten['Wk_Art']=='BL'){

            		if($stammdaten['UebersichtNachVerein'] == 1){
            			//Dann keine Vereins Spalte
            		}else{
            			echo '<td>';// id="HideOverflow2"
            			echo $dsatz['Verein'];
            			echo "</td>";
            		}

            }
                else{
                	echo '<td>';// id="HideOverflow2"
                	echo $dsatz['Staat'];
                	echo "</td>";
                }

     if($stammdaten['MitNorm']=='1'){
         echo "<td>";
         $firstChar=substr($dsatz['Al_Kl'],0,1);
         echo $firstChar;
         echo "</td>";
     }

     if($stammdaten['Flagge']==3){

     	$IdHeber=$dsatz['IdHeber'];
     	$DBFlagge = dbBefehl("SELECT staaten.IdStaat, staaten.FlaggenFormat FROM staaten, heber
     							WHERE heber.IdHeber= $IdHeber
     							AND heber.IdStaat= staaten.IdStaat
     						");
     	$DataFlagge = mysqli_fetch_assoc($DBFlagge);



     	echo "<td>";
     		echo '<div id="rahmen"> <img src="Bilder/FlaggenStaaten/'.$DataFlagge['IdStaat'].'.'.$DataFlagge['FlaggenFormat'].'" alt="Flagge" id="bild"> </div>';
     	echo "</td>";
     }

     if($stammdaten['Wk_Art']=='M_o_T' || $stammdaten['Wk_Art']=='M_m_T'){


         echo "<td>";
                 echo $dsatz['Gruppe_Aus'];
         echo "</td>";
     }


     echo "<td>";                       //Kann beides wieder weg später
          if($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='1'){
            // echo $dsatz['AlKl'];
            
            $AlKl=$dsatz['AlKl'];
            if($stammdaten['Masters']==1) $AlKl = convertString($AlKl, $dsatz["Geschlecht"]);
            echo $AlKl;
            
          }else{
            echo $dsatz['Jahrgang'];
          }
     echo "</td>";


     echo "<td>";

         if($dsatz['Gw_Kl'] > 0)   $GwKlTable = '+' . $dsatz['Gw_Kl'];
         else                    $GwKlTable = $dsatz['Gw_Kl'];

         if($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='0' && $stammdaten['Hauptauswertung']=='0')     echo $GwKlTable;
         elseif(($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='1') ){ 	//|| $stammdaten[Wk_Art]=='ZK' && $stammdaten[Rel_Sin_AlKl]=='1'
         	if ($stammdaten['Masters']=='1') {	//Functions from nuetzliches.php
         		$SinFaktor=SinclairFaktor($dsatz,$stammdaten)*MaloneMeltzerFaktor($dsatz,$stammdaten);
         	}else $SinFaktor=SinclairFaktor($dsatz,$stammdaten);

         	$SinFaktor=round($SinFaktor, 4);
          $SinFaktor=number_format($SinFaktor,2, '.', ' ');
         	// echo $SinFaktor;
          
          echo $dsatz['GwKl'];
        }else{
          echo $dsatz['Gewicht'];
        }

     echo "</td>";

    if($stammdaten['RelativArt']=="3"){
      $iat_faktor=round(iat_factor($dsatz['Alter'], $dsatz['Geschlecht'], $dsatz['Gewicht']), 2);
      echo "<td>";
      echo $iat_faktor;
      echo "</td>";
    }

     if($stammdaten['Wk_Art']=='BL'  && $stammdaten['auswertung_art']==0){
         echo "<td>";
        //  echo $dsatz['R_Gewicht'];
         echo relativGewicht($dsatz['Gewicht'], $dsatz['Geschlecht']);
         echo "</td>";


     }elseif($stammdaten['Wk_Art']=='BL' && ($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2) ){
       $SinFaktor=sinclair_faktor($dsatz['IdHeber']);
       $SinFaktor=number_format($SinFaktor,2, '.', ' ');
       echo "<td>";
       echo $SinFaktor;
       echo "</td>";
     }

     if($stammdaten['Wk_Art']=='BL' && $stammdaten['Block_Heben']){
         echo "<td>";
         echo $dsatz['Reihenfolge'];
         echo "</td>";


     }

     	echo "<td id=\"naechstesHeberGewichtSpalte\">";
     	$Versuch=1;
     	if($Art=='Reissen'){
     	    if($dsatz['R_1_G']==''||$dsatz['R_1_G']==NULL) $Versuch=1;	//echo $dsatz[R_1];
     	    if(($dsatz['R_2_G']==''||$dsatz['R_2_G']==NULL) && ($dsatz['R_1_G']!=''||$dsatz['R_1_G']!=NULL)) $Versuch=2; //echo $dsatz[R_2];
     	    if(($dsatz['R_3_G']==''||$dsatz['R_3_G']==NULL) && ($dsatz['R_2_G']!=''||$dsatz['R_2_G']!=NULL) && ($dsatz['R_1_G']!=''||$dsatz['R_1_G']!=NULL)) $Versuch=3; //echo $dsatz[R_3];
     	}
     	if($Art=='Stossen'){
     	    if($dsatz['S_1_G']==''||$dsatz['S_1_G']==NULL) $Versuch=1; //echo $dsatz[S_1];
     	    if(($dsatz['S_2_G']==''||$dsatz['S_2_G']==NULL) && ($dsatz['S_1_G']!=''||$dsatz['S_1_G']!=NULL)) $Versuch=2; //echo $dsatz[S_2];
     	    if(($dsatz['S_3_G']==''||$dsatz['S_3_G']==NULL) && ($dsatz['S_2_G']!=''||$dsatz['S_2_G']!=NULL) && ($dsatz['S_1_G']!=''||$dsatz['S_1_G']!=NULL)) $Versuch=3; //echo $dsatz[S_3];
     	}

     	$IdHeber=$dsatz['IdHeber'];
     	$DataNaechsterVersuch = dbBefehl("SELECT Reissen, Stossen FROM heber_wk_".$data_a_db['S_Db']."
     			WHERE IdHeber= $IdHeber
     			AND Versuch= $Versuch
     			");
     	$DataGewichtNaechsterVersuch = mysqli_fetch_assoc($DataNaechsterVersuch);

     	echo $DataGewichtNaechsterVersuch[$Art];


echo "</td>";


     $ArtKurz='R';

     for($z=1;$z<4;$z++){
     	if($dsatz[$ArtKurz.'_'.$z.'_Ver']==1)
     		$dsatz[$ArtKurz.'_'.$z]='V';


     		if($dsatz[$ArtKurz.'_'.$z.'_G'] != '' || $dsatz[$ArtKurz.'_'.$z.'_G'] != NULL){

     			if($dsatz[$ArtKurz.'_'.$z.'_G'] == "Ja")
     			{
     				echo "<td id=\"RS1J\">";
     			}else{
     				echo "<td id=\"RS1N\">";
     				if($dsatz[$ArtKurz.'_'.$z.'_Ver']==0) echo '';//echo '-';
     			}
     			echo $dsatz[$ArtKurz . '_' . $z];
     			echo "</td>";


     			if($stammdaten['Wk_Art']=='M_m_T'){

     				if($dsatz[$ArtKurz.'_'.$z.'_G'] == "Ja")
     				{
     					echo "<td id=\"RS1J\">";
     				}else{
     					echo "<td id=\"RS1N\">";
     				}
     				echo $dsatz[$ArtKurz . '_' . $z . '_Te'];
     				echo "</td>";
     			}

     		}else if($stammdaten['Wk_Art']=='M_m_T') echo'<td></td><td></td>';
     		else echo'<td></td>';
     }





$ArtKurz='S';

 for($z=1;$z<4;$z++){
 	if($dsatz[$ArtKurz.'_'.$z.'_Ver']==1)
 		$dsatz[$ArtKurz.'_'.$z]='V';

 		if($dsatz[$ArtKurz.'_'.$z.'_G']!=''||$dsatz[$ArtKurz.'_'.$z.'_G']!=NULL){

 			if($dsatz[$ArtKurz.'_'.$z.'_G'] == "Ja")
 			{
 				echo "<td id=\"RS1J\">";
 			}else{
 				echo "<td id=\"RS1N\">";
 				if($dsatz[$ArtKurz.'_'.$z.'_Ver']==0) echo ''; //echo '-';
 			}
 			echo $dsatz[$ArtKurz . '_' . $z];
 			echo "</td>";


 			if($stammdaten['Wk_Art']=='M_m_T'){

 				if($dsatz[$ArtKurz.'_'.$z.'_G'] == "Ja")
 				{
 					echo "<td id=\"RS1J\">";
 				}else{
 					echo "<td id=\"RS1N\">";
 				}
 				echo $dsatz[$ArtKurz . '_'. $z . '_Te'];
 				echo "</td>";
 			}

 		}else if($stammdaten['Wk_Art']=='M_m_T') echo'<td></td><td></td>';
 		else echo'<td></td>';
 }



 if($stammdaten['Wk_Art']!='BL'){




 echo "<td id=\"Erg\">";
     
            if($stammdaten['Wk_Art']=='ZK'){
                 if($stammdaten['Hauptauswertung']=='0') echo $dsatz['Z_K'];
                 elseif($stammdaten['Hauptauswertung']=='1') echo $dsatz['Relativ_P'];
                 elseif($stammdaten['Hauptauswertung']=='2') echo $dsatz['Sinclair_P_Malone_Meltzer'];
            }else echo $dsatz['Z_K'];


 echo "</td>";

 echo "<td>";
         if($stammdaten['Wk_Art']=='ZK')
         	if($stammdaten['MitNorm']=='1'){	//Damit bei einem WK mit Norm nur Heber Platzierungen gezeigt werden ohne Norm
         		if($dsatz['Al_Kl']==$stammdaten['NormAlKl']) $dsatz['Platz_GwKl']='-';

         	}
         if($stammdaten['Hauptauswertung']=='0') $PlatzString=$dsatz['Platz_GwKl'];
         elseif($stammdaten['Hauptauswertung']=='1') $PlatzString=$dsatz['Platz_RP'];
         elseif($stammdaten['Hauptauswertung']=='2') $PlatzString=$dsatz['Platz_Sin'];
         elseif($stammdaten['Wk_Art']=='BL') $PlatzString=$dsatz['Platz_GwKl'];
         else $PlatzString=$dsatz['Platz_ZK'];

         if($PlatzString=='0'){
         	$PlatzString='AK';
         }
         		 echo $PlatzString;
 echo "</td>";

 if($stammdaten['MitNorm']=='1'){
 	if($dsatz['Platz_Norm']=='') $dsatz['Platz_Norm']='-';


 	echo "<td>";
 	echo $dsatz['Platz_Norm'];
 	echo "</td>";
 }

 }	//F�r nicht BL

 if($stammdaten['Wk_Art']!='ZK' && $stammdaten['Wk_Art']!='BL'){



   echo "<td id=\"Erg\">";
        // echo $dsatz['Relativ_P'];
        echo $dsatz['M_K_G'];
   echo "</td>";

   echo "<td>";
        // echo $dsatz['Platz_RP'];
        echo $dsatz['Platz_MK'];
   echo "</td>";
 }

if($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='1'){



 echo "<td id=\"Erg\">";
 echo $dsatz['Sinclair_P_Malone_Meltzer'];
 echo "</td>";

 echo "<td>";
 echo $dsatz['Platz_Sin_Malone_Meltzer'];
 echo "</td>";
 }

if($stammdaten['Wk_Art']=='BL'){



   echo "<td id=\"Erg\">";
        echo $dsatz['Z_K'];
   echo "</td>";

 echo "<td id=\"Erg\">";
   if($stammdaten['auswertung_art']==0){
     echo "$dsatz[Relativ_P]";
   }elseif($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
     echo "$dsatz[Sinclair_P_Malone_Meltzer]";
   }
 echo "</td>";

 /*
 echo "<td>";
 if($dsatz[Relativ_P]!=0)
     echo $dsatz[Platz_RP];
 else
     echo "-";
 echo "</td>";
 */
 }

 if($stammdaten['Wk_Art']=='ZK' && $stammdaten['RelativArt']=='0'){ //F�r Robi Points
 	echo "<td id=\"Erg\">";
 	echo $dsatz['Robbi_P'];
 	echo "</td>";

 	echo "<td>";
 	echo $dsatz['Platz_Robi'];
 	echo "</td>";
 }

 if($stammdaten['Wk_Art']=='ZK' && $stammdaten['RelativArt']=='2'){ //F�r Robi Points
 	echo "<td id=\"Erg\">";
 	echo $dsatz['Robbi_Quali_P'];
 	echo "</td>";

 	echo "<td>";
 	echo $dsatz['Platz_Robi_Quali'];
 	echo "</td>";
 }


echo "</tr>";

$OldGwKl=$dsatz['GwKl'];
$OldGrp=$dsatz['Gruppe'];
$OldVerein=$dsatz['Verein'];

}
echo "</tbody>";
echo "</table>";

echo'<div id="new_load"></div>';



?>



<body></body>
<html></html>
