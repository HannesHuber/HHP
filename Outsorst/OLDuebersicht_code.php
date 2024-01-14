<?php
//Zeit für BL wieder n Übersicht
$data_a_db[S_Db]=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_$data_a_db[S_Db]");

$stammdaten = mysqli_fetch_assoc($datenbank);

$BlEinzelGrp=$_SESSION['EinzelGruppenUebersicht'];

include 'funktionen/nuetzliches.php';
include 'funktionen/auswertung_funktionen.php';

$auswerte_Gruppe=$dNow[Gruppe];	//Damit in Auswertung nur über diese Grp Ausgewertet wird

include 'funktionen/auswertung_heber_einfügen.php'; //Um die Heber in Auswertung zu übertragen
//include 'funktionen/auswertung.php'; //Diese wird nun direkt im Wk bzw. in der Wk Korrektur durchgeführt


$Grp = $dNow[Gruppe];

if (empty($_SESSION['GesGrp'])) {
    $_SESSION['GesGrp'] = 0;
}
$_SESSION['GesGrp'] = 0;

if($stammdaten[Wk_Art] == "M_o_T" || $stammdaten[Wk_Art] == "M_m_T"){
         include 'funktionen/platzierungmk.php';
}else{
         include 'funktionen/platzierung.php';
}



ob_start ();
error_reporting(0);

$Grp = $dNow[Gruppe];
         
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_$data_a_db[S_Db]");
$stammdaten = mysqli_fetch_assoc($datenbank);

         if($stammdaten[Wk_Art] == "M_o_T" || $stammdaten[Wk_Art] == "M_m_T")
         	$OrderByString="ORDER BY heber_$data_a_db[S_Db].Gruppe_aus ASC, heber.Name ASC";
         elseif($stammdaten[Wk_Art] == "ZK" && $stammdaten['MitNorm'] == 0)
         	$OrderByString="ORDER BY heber.AlKl, heber.Gewicht ASC, heber.Name ASC";
         elseif($stammdaten[Wk_Art] == "ZK" && $stammdaten['MitNorm'] == 1)
         	$OrderByString="ORDER BY heber.Gewicht ASC, auswertung_$data_a_db[S_Db].Platz_Norm ASC, heber.Name ASC";
         elseif($stammdaten[Wk_Art] == "BL")
         	$OrderByString="ORDER BY heber_$data_a_db[S_Db].Gruppe ASC, verein.Verein ASC,heber.Gewicht ASC, heber.Name ASC";
         
         	//Damit alle Gruppen in der Übersicht angezeigt werden in der Bundesliga
         	if($stammdaten[Wk_Art]=='BL' && $BlEinzelGrp==0){
         	    $StringGruppenAuswahl="AND heber_$data_a_db[S_Db].Gruppe != '0' ";
         	}else{
         	    $StringGruppenAuswahl="AND heber_$data_a_db[S_Db].Gruppe = '".$Grp."'";
         	}
         	
         	
         	
         	//AND heber_$data_a_db[S_Db].Gruppe = '$Grp'
         $heber = dbBefehl("SELECT * FROM heber, auswertung_$data_a_db[S_Db], heber_$data_a_db[S_Db], staaten, verein
                               WHERE heber.IdHeber = auswertung_$data_a_db[S_Db].IdHeber
                               AND heber.IdHeber = heber_$data_a_db[S_Db].IdHeber
                               AND heber_$data_a_db[S_Db].IdHeber = heber.IdHeber
                               ".$StringGruppenAuswahl."
                               AND heber.IdStaat=staaten.IdStaat
							   AND heber.IdVerein = verein.IdVerein
                               $OrderByString
                               ");

                               
         $Verein = dbBefehl("SELECT * FROM verein");       

         if($stammdaten[Wk_Art]=='BL'){
              $DataVereinsAuswahl = dbBefehl("SELECT * FROM bl_vereins_auswahl_$data_a_db[S_Db]");
              $VereinsAuswahl = mysqli_fetch_assoc($DataVereinsAuswahl);
         }

$num_rows=mysqli_num_rows($heber);

$x=0;


echo"<div id=\"divid1\" class=\"examplediv\">";


echo "

<table class=\"tabelle\">
  <colgroup>        
    <col width=\"380\">                     
    <col>";
if($stammdaten[International]=='0' || $stammdaten[Wk_Art]=='BL') echo "<col width=\"320\">";         //Verein
    else echo "<col width=\"80\">";
    
    if($stammdaten[Flagge]==3){
    	echo "<col>
    	<col width=\"46\">";
    }
    		
    if($stammdaten[Wk_Art]=='M_o_T' || $stammdaten[Wk_Art]=='M_m_T'){
    echo "<col>
    <col width=\"15\">";
    }
    if($stammdaten[MitNorm]=='1'){
        echo"
        <col>
        <col width=\"10\">"; 
    }
    //JG|KoeGw|RelGw(für BL)|Next|R1...
    
    if( $stammdaten[Wk_Art]=='BL'){ //Für RelGw
        echo"
        <col>
        <col width=\"50\">";
    }
    if($stammdaten['Wk_Art']=='BL' && $stammdaten['Block_Heben']){
        echo"
        <col>
        <col width=\"50\">";
    }
    
    echo"
    <col>
    <col width=\"50\">
    <col>
    <col width=\"50\">
    <col>
    <col width=\"35\"> 
    <col>
    <col width=\"35\">";
    if($stammdaten[Wk_Art]=='M_m_T') echo" <col width=\"35\">";
    echo "<col width=\"35\">";
    if($stammdaten[Wk_Art]=='M_m_T') echo" <col width=\"35\">";
    echo "<col width=\"35\">";
    if($stammdaten[Wk_Art]=='M_m_T') echo" <col width=\"35\">";   
   // echo "<col width=\"35\">";	Reissen-Erg
   // echo "<col width=\"35\">";	Reissen-Platzierung
    echo "<col>";
    echo "<col width=\"35\">";
    if($stammdaten[Wk_Art]=='M_m_T') echo" <col width=\"35\">";
    echo "<col width=\"35\">";
    if($stammdaten[Wk_Art]=='M_m_T') echo" <col width=\"35\">";
    echo "<col width=\"35\">";
    if($stammdaten[Wk_Art]=='M_m_T') echo" <col width=\"35\">"; 
   // echo "<col width=\"35\">";	Stossen-Erg
   // echo "<col width=\"35\">";	Stossen-Platz
    echo "<col >";              //Ist für BL letzte leer zeile (Prüfe mit width=350)
    echo "<col width=\"35\">";
    if($stammdaten[Wk_Art]=='BL'){
        echo "<col >";              //Ist für BL letzte leer zeile (Prüfe mit width=350)
        echo "<col width=\"35\">";
    }
    echo "<col width=\"35\">";
    if($stammdaten[Wk_Art]=='ZK' && $stammdaten[Masters]=='1'){
      echo "<col>";
      echo "<col width=\"35\">";
      echo "<col width=\"35\">";
    }
    if($stammdaten[Wk_Art]!='M_m_T'){
    echo "<col>";
    echo "<col width=\"35\">";
    echo "<col width=\"35\">";
    }
    if($stammdaten[MitNorm]=='1'){/*
    	echo "<col>";
    	echo "<col width=\"35\">";  */
    }
echo "</colgroup>";

echo '<thead>';

//Übertabelle zur Bundesligaübersicht
if($stammdaten[Wk_Art]=='BL'){

echo'
   <tr>
      <th colspan="50">';

      $Pt_V1=0;
      $Pt_V2=0;

      if($VereinsAuswahl[R_Pt_V1]!=$VereinsAuswahl[R_Pt_V2])
         if($VereinsAuswahl[R_Pt_V1]>$VereinsAuswahl[R_Pt_V2]) $Pt_V1++;
         else                                                  $Pt_V2++;

      if($VereinsAuswahl[S_Pt_V1]!=$VereinsAuswahl[S_Pt_V2])
         if($VereinsAuswahl[S_Pt_V1]>$VereinsAuswahl[S_Pt_V2]) $Pt_V1++;
         else                                                  $Pt_V2++;

      if($VereinsAuswahl[RuS_Pt_V1]!=$VereinsAuswahl[RuS_Pt_V2])
         if($VereinsAuswahl[RuS_Pt_V1]>$VereinsAuswahl[RuS_Pt_V2]) $Pt_V1++;
         else                                                      $Pt_V2++;

     echo'<table id="BlTabelle" width="100%" border="0" >';
     echo'<colgroup>';
       echo'<col width="30%">';
       echo'<col width="9%">';
       echo'<col width="9%">';
       echo'<col width="18%">';
       echo'<col width="13%">';
     echo'</colgroup>';
      echo'<tr>';
       echo'<th>Verein</th>';

       echo'<th>Reissen</th>';
       echo'<th>Stossen</th>';
       echo'<th>Gesamt</th>';
       echo'<th  rowspan="3">';
            if($stammdaten['Zeitnehmer']!='0')
                echo'<p class="showTimeBox"><span id="showTime"></span></p>'; //Zeit: <br>
      echo'</th>';
       
      echo'</tr>';
 
        
      $NameVerein1 = returnNameVerein($VereinsAuswahl[Verein1]);
      $NameVerein2 = returnNameVerein($VereinsAuswahl[Verein2]);
      
      if($stammdaten[Verein_Anzahl]=='3')
        $NameVerein3 = returnNameVerein($VereinsAuswahl[Verein3]);
      
      echo'<tr >';
      echo'<th id="Verein">' . $NameVerein1 . '</th>';
       echo'<th id="Verein">' . $VereinsAuswahl[R_Pt_V1] . '</th>';
       echo'<th id="Verein">' . $VereinsAuswahl[S_Pt_V1] . '</th>';
       echo'<th id="Verein">' . $VereinsAuswahl[RuS_Pt_V1].'</th>';       // . '('.$VereinsAuswahl[Hochrechnung_V1].')'
      echo'</tr>';
      
      echo'<tr>';
      echo'<th id="Verein">' . $NameVerein2 . '</th>';
       echo'<th id="Verein">' . $VereinsAuswahl[R_Pt_V2] . '</th>';
       echo'<th id="Verein">' . $VereinsAuswahl[S_Pt_V2] . '</th>';
       echo'<th id="Verein">' . $VereinsAuswahl[RuS_Pt_V2] .'</th>';     //. '('.$VereinsAuswahl[Hochrechnung_V2].')'
      echo'</tr>';
      
      if($stammdaten['Verein_Anzahl']==3){
          echo'<tr>';
          echo'<th id="Verein">' . $NameVerein3 . '</th>';
          echo'<th id="Verein">' . $VereinsAuswahl[R_Pt_V3] . '</th>';
          echo'<th id="Verein">' . $VereinsAuswahl[S_Pt_V3] . '</th>';
          echo'<th id="Verein">' . $VereinsAuswahl[RuS_Pt_V3] .'</th>';     // . '('.$VereinsAuswahl[Hochrechnung_V3].')'
          echo'</tr>';
      }
      
     echo'</table>';
     
     echo'<br>';

 echo'</th>
   </tr>
';
}else{    //Bl Ende Aber trozdem Row für Zeit
  echo'<tr>';
    echo'<th  colspan="50">';
    if($stammdaten['Wk_Art']!='BL'){
        if($stammdaten['Zeitnehmer']!='0'){
            echo'<div style="width: 100%">';
            echo'<div style="width: 150px; margin:auto; align:center;">';
            echo'<div class="showTimeBox">Zeit: <span id="showTime"></span></div>';
            echo'</div>';
            echo'</div>';
        }
        
    } 
    echo'</th>';
 echo'</tr>';
}
  

echo"

 <tr>";
if($stammdaten['Wk_Art']=='BL'){
    
    if($BlEinzelGrp==0) echo"<th>Gruppe 1</th>";
    else                echo"<th>Gruppe ".$Grp."</th>";
   
}else{
    echo"<th></th>";
}
  
  echo"<th></th>";

if($stammdaten[Flagge]==3) echo "<th></th><th></th>";

if($stammdaten[Wk_Art]=='M_o_T' || $stammdaten[Wk_Art]=='M_m_T') echo"<th></th><th></th>";

if($stammdaten[MitNorm]=='1'){
    echo'<th></th>';
    echo'<th></th>';
}

//Hier wurden 2 mehr reingepackt--------------------------------------------------------------------------------------------------------
if( $stammdaten[Wk_Art]=='BL'){ //Für RelGw Und ZK
    echo"
  <th></th>
  <th></th>";
}

if($stammdaten['Wk_Art']=='BL' && $stammdaten['Block_Heben']){ //Für Order
    echo"
  <th></th>
  <th></th>";
}

echo"
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>

";

if($stammdaten[Wk_Art]=='M_m_T'){

   echo"<th id=\"center\" colspan=\"6\">Reissen</th>";

}else{

   echo"<th id=\"center\" colspan=\"3\">Reissen</th>";

}
//echo '<th></th>'; Reissen Erg
//echo '<th></th>'; Reissen Platz
echo '<th></th>';

if($stammdaten[Wk_Art]=='M_m_T'){

   echo"<th id=\"center\" colspan=\"6\">Stossen</th>";

}else{

   echo"<th id=\"center\" colspan=\"3\">Stossen</th>";

}
//echo '<th></th>'; Stossen Erg
//echo '<th></th>'; Stossen Platz

if($stammdaten[Wk_Art]=='M_m_T' || $stammdaten[Wk_Art]=='M_o_T') echo "<th></th><th id=\"center\" colspan=\"2\">ZK</th>";

if($stammdaten[Wk_Art]!='BL' && $stammdaten[MitNorm]!='1'){
	echo "<th></th><th id=\"center\" colspan=\"2\">Total</th>";
}
if($stammdaten[MitNorm]=='1'){
	echo "<th></th><th id=\"center\" colspan=\"2\">Jun</th>"; //Ohne Norm
	echo "<th></th><th id=\"center\" colspan=\"1\">".$stammdaten['NormAlKl']."</th>";	
}
if($stammdaten[Wk_Art]=='ZK' && $stammdaten[Masters]=='1') echo "<th></th><th id=\"center\" colspan=\"2\">S-M-M</th>";

if($stammdaten[Wk_Art]=='BL') echo "<th></th><th>ZK</th><th></th><th id=\"center\" colspan=\"2\">Relativ</th>";

echo"</tr>";


echo"

 <tr>
  <th>Name</th>
  <th id=\"e-col\"></th>";
if($stammdaten[International]=='0' || $stammdaten[Wk_Art]=='BL') echo '<th>Verein</th>';
  else echo '<th>Staat</th>';
  
  if($stammdaten[Flagge]==3){
  	echo"<th id=\"e-col\"></th>";
  	echo"<th>Flagge</th>";
  }
  	
  if($stammdaten[MitNorm]=='1'){
      
      echo"<th id=\"e-col\"></th>";
      echo"<th>J/A</th>";
  }
  	
  echo"<th id=\"e-col\"></th>";
  if($stammdaten[Wk_Art]=='M_m_T' || $stammdaten[Wk_Art]=='M_o_T') echo "<th>G</th> <th id=\"e-col\"></th>";
  echo"
  <th>JG</th>
  <th id=\"e-col\"></th>";

  if($stammdaten[Wk_Art]=='ZK' && $stammdaten[Masters]=='0')     echo "<th>GwKl</th>";
  elseif($stammdaten[Wk_Art]=='ZK' && $stammdaten[Masters]=='1') echo "<th>SF*SMM</th>";
  else                                                           echo "<th>KoeGw</th>";
  
  if($stammdaten[Wk_Art]=='BL') echo "<th id=\"e-col\"></th> <th>RelGw</th>";

  if($stammdaten['Wk_Art']=='BL' && $stammdaten['Block_Heben']) echo "<th id=\"e-col\"></th> <th>Order</th>";
      
  echo"
  <th id=\"e-col\"></th>
  <th>NEXT</th>
  <th id=\"e-col\"></th>
  <th>R1</th>";
  if($stammdaten[Wk_Art]=='M_m_T') echo '<th></th>';
  echo '<th>R2</th>';
  if($stammdaten[Wk_Art]=='M_m_T') echo '<th></th>';
  echo '<th>R3</th>';
  if($stammdaten[Wk_Art]=='M_m_T') echo '<th></th>';
  
  //echo "<th>Erg</th> <th>Pl</th>"; Reissen-Erg+Platz
  
  echo "<th id=\"e-col\"></th>
  <th>S1</th>";
  if($stammdaten[Wk_Art]=='M_m_T') echo '<th></th>';
  echo '<th>S2</th>';
  if($stammdaten[Wk_Art]=='M_m_T') echo '<th></th>';
  echo '<th>S3</th>';
  if($stammdaten[Wk_Art]=='M_m_T') echo '<th></th>';
  
  //echo "<th>Erg</th> <th>Pl</th>"; Stossen-Erg+Platz

  if($stammdaten[Wk_Art]=='ZK' && $stammdaten[Masters]=='1'){
    echo"
    <th id=\"e-col\"></th>
    <th>Erg</th>
    <th>Pl</th>";
  }
  if($stammdaten[Wk_Art]!='ZK'  && $stammdaten[Wk_Art]!='BL'){
    echo '<th id=\"e-col\"></th>
    <th>Erg</th>
    <th>Pl</th>';
  }
  
  
  
    if($stammdaten[Wk_Art]=='BL'){
        echo '<th id=\"e-col\"></th>';
        echo '<th>Erg</th>';    //Für ZK Erg
    }
    echo '<th id=\"e-col\"></th>';
    echo '
    <th>Erg</th>
    <th>Pl</th>';
    
  if($stammdaten[MitNorm]=='1'){
  	echo '<th id=\"e-col\"></th>
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

if($stammdaten[Hauptauswertung]==0 && $stammdaten[Wk_Art]=='ZK'){
	if($i!=1){
		if ($OldGwKl != $dsatz [GwKl]) {
			echo "<tr id=\"zwischenraum\">";
				echo "<td id=\"noBorder\">";
					echo "</td>";		
			echo "</tr>";
		}
	}
}

if($dsatz['Gruppe']!=$OldGrp && $i!=1){
    $OldGrp=$dsatz['Gruppe'];
    echo "<tr>";
    echo"<td align=\"left\" colspan=\"28\">Gruppe $OldGrp</td>";
    echo "</tr>";
}
     
     if($dsatz[IdHeber]==$dNow[IdHeber])
     	echo "<tr id=\"trNow\">";
     else if($dsatz[IdHeber]==$dAfterNext[IdHeber])
     	echo "<tr id=\"trNext\">";
     else
     	echo "<tr>";


     echo '<td>';
                 echo "<span style=\"width:150px;display:block;float:left;\"> $dsatz[Name] </span>";
                 echo " $dsatz[Vorname] ";
     echo "</td>";

     echo "<td  id=\"e-col\">";
         echo ' ';
     echo "</td>";

     echo "<td>";
     if($stammdaten[International]=='0' || $stammdaten[Wk_Art]=='BL')echo "$dsatz[Verein]";
          else echo "$dsatz[Staat]";
     echo "</td>";
     
     if($stammdaten[MitNorm]=='1'){
         echo "<td  id=\"e-col\">";
         echo ' ';
         echo "</td>";
         
         echo "<td>";
         $firstChar=substr($dsatz[Al_Kl],0,1);
         echo $firstChar;
         echo "</td>";
     }
     
     
     
         
     if($stammdaten[Flagge]==3){
     	     	
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
     		echo '<div id="rahmen"> <img src="Bilder/FlaggenStaaten/'.$DataFlagge[IdStaat].'.'.$DataFlagge[FlaggenFormat].'" alt="Flagge" id="bild"> </div>';
     	echo "</td>";
     }

     if($stammdaten[Wk_Art]=='M_o_T' || $stammdaten[Wk_Art]=='M_m_T'){
         echo "<td  id=\"e-col\">";
                 echo ' ';
         echo "</td>";

         echo "<td>";
                 echo $dsatz[Gruppe_Aus];
         echo "</td>";
     }

     echo "<td  id=\"e-col\">";

     echo "</td>";

     echo "<td>";                       //Kann beides wieder weg später
          echo "$dsatz[Jahrgang]";
     echo "</td>";

     echo "<td  id=\"e-col\">";        // Bis hier


     echo "<td>";

         if($dsatz[Gw_Kl] > 0)   $GwKlTable = '+' . $dsatz[Gw_Kl];
         else                    $GwKlTable = $dsatz[Gw_Kl];

         if($stammdaten[Wk_Art]=='ZK' && $stammdaten[Masters]=='0')     echo $GwKlTable;
         elseif(($stammdaten[Wk_Art]=='ZK' && $stammdaten[Masters]=='1') || $stammdaten[Wk_Art]=='ZK' && $stammdaten[Rel_Sin_AlKl]=='1'){
         	if ($stammdaten[Masters]=='1') {	//Functions from nuetzliches.php
         		$SinFaktor=SinclairFaktor($dsatz,$stammdaten)*MaloneMeltzerFaktor($dsatz,$stammdaten);
         	}else $SinFaktor=SinclairFaktor($dsatz,$stammdaten);
         	
         	$SinFaktor=round($SinFaktor, 4);
         	echo $SinFaktor;
         } 
         else                                                           echo $dsatz[Gewicht];

         
         /*
          if($dsatz[IdHeber]==$dNow[IdHeber])
          echo "<td id=\"Now\">";
          else if($dsatz[IdHeber]==$dAfterNext[IdHeber])
          echo "<td id=\"Next\">";
          else
          echo "<td>";
          */
          
     echo "</td>";

     echo "<td  id=\"e-col\">";
     echo "</td>";
     
     if($stammdaten[Wk_Art]=='BL'){
         echo "<td>";
         echo $dsatz['R_Gewicht'];
         echo "</td>";
         
         echo "<td  id=\"e-col\">";
         echo "</td>";
     }

     if($stammdaten['Wk_Art']=='BL' && $stammdaten['Block_Heben']){
         echo "<td>";
         echo $dsatz['Reihenfolge'];
         echo "</td>";
         
         echo "<td  id=\"e-col\">";
         echo "</td>";
     }

     	echo "<td id=\"naechstesHeberGewichtSpalte\">";
     	$Versuch=1;
     	if($Art=='Reissen'){
     	    if($dsatz[R_1_G]==''||$dsatz[R_1_G]==NULL) $Versuch=1;	//echo $dsatz[R_1];
     	    if(($dsatz[R_2_G]==''||$dsatz[R_2_G]==NULL) && ($dsatz[R_1_G]!=''||$dsatz[R_1_G]!=NULL)) $Versuch=2; //echo $dsatz[R_2];
     	    if(($dsatz[R_3_G]==''||$dsatz[R_3_G]==NULL) && ($dsatz[R_2_G]!=''||$dsatz[R_2_G]!=NULL) && ($dsatz[R_1_G]!=''||$dsatz[R_1_G]!=NULL)) $Versuch=3; //echo $dsatz[R_3];
     	}
     	if($Art=='Stossen'){
     	    if($dsatz[S_1_G]==''||$dsatz[S_1_G]==NULL) $Versuch=1; //echo $dsatz[S_1];
     	    if(($dsatz[S_2_G]==''||$dsatz[S_2_G]==NULL) && ($dsatz[S_1_G]!=''||$dsatz[S_1_G]!=NULL)) $Versuch=2; //echo $dsatz[S_2];
     	    if(($dsatz[S_3_G]==''||$dsatz[S_3_G]==NULL) && ($dsatz[S_2_G]!=''||$dsatz[S_2_G]!=NULL) && ($dsatz[S_1_G]!=''||$dsatz[S_1_G]!=NULL)) $Versuch=3; //echo $dsatz[S_3];
     	}
     	
     	$IdHeber=$dsatz['IdHeber'];
     	$DataNaechsterVersuch = dbBefehl("SELECT * FROM heber_wk_$data_a_db[S_Db]
     			WHERE IdHeber= $IdHeber
     			AND Versuch= $Versuch
     			");
     	$DataGewichtNaechsterVersuch = mysqli_fetch_assoc($DataNaechsterVersuch);
     	
     	echo $DataGewichtNaechsterVersuch[$Art];
     	
     	/*
          if($Art=='Reissen'){
                 if($dsatz[R_1_G]==''||$dsatz[R_1_G]==NULL) echo $dsatz[R_1];
                 if(($dsatz[R_2_G]==''||$dsatz[R_2_G]==NULL) && ($dsatz[R_1_G]!=''||$dsatz[R_1_G]!=NULL)) echo $dsatz[R_2];
                 if(($dsatz[R_3_G]==''||$dsatz[R_3_G]==NULL) && ($dsatz[R_2_G]!=''||$dsatz[R_2_G]!=NULL) && ($dsatz[R_1_G]!=''||$dsatz[R_1_G]!=NULL)) echo $dsatz[R_3];
          }
          if($Art=='Stossen'){
                 if($dsatz[S_1_G]==''||$dsatz[S_1_G]==NULL) echo $dsatz[S_1];
                 if(($dsatz[S_2_G]==''||$dsatz[S_2_G]==NULL) && ($dsatz[S_1_G]!=''||$dsatz[S_1_G]!=NULL)) echo $dsatz[S_2];
                 if(($dsatz[S_3_G]==''||$dsatz[S_3_G]==NULL) && ($dsatz[S_2_G]!=''||$dsatz[S_2_G]!=NULL) && ($dsatz[S_1_G]!=''||$dsatz[S_1_G]!=NULL)) echo $dsatz[S_3];
          }
    */
echo "</td>";
     

     echo "<td  id=\"e-col\">";
     echo "</td>";
     
     
     
     
     $ArtKurz='R';
     
     for($z=1;$z<4;$z++){
     	if($dsatz[$ArtKurz.'_'.$z.'_Ver']==1)
     		$dsatz[$ArtKurz.'_'.$z]='V';
     		
     		if($dsatz[$ArtKurz.'_'.$z.'_G']!=''||$dsatz[$ArtKurz.'_'.$z.'_G']!=NULL){
     			
     			if($dsatz[$ArtKurz.'_'.$z.'_G'] == "Ja")
     			{
     				echo "<td id=\"RS1J\">";
     			}else{
     				echo "<td id=\"RS1N\">";
     				if($dsatz[$ArtKurz.'_'.$z.'_Ver']==0) echo '-';
     			}
     			echo $dsatz[$ArtKurz . '_' . $z];
     			echo "</td>";
     			
     			
     			if($stammdaten[Wk_Art]=='M_m_T'){
     				
     				if($dsatz[$ArtKurz.'_'.$z.'_G'] == "Ja")
     				{
     					echo "<td id=\"RS1J\">";
     				}else{
     					echo "<td id=\"RS1N\">";
     				}
     				echo $dsatz[$ArtKurz . '_' . $z . '_Te'];
     				echo "</td>";
     			}
     			
     		}else if($stammdaten[Wk_Art]=='M_m_T') echo'<td></td><td></td>';
     		else echo'<td></td>';
     }
     
/*	Reissen Erg+Platz
     
 echo "<td id=\"Erg\">";
         echo $dsatz[R_B];
 echo "</td>";

 echo "<td>";
          if($stammdaten[Wk_Art]=='ZK'){
                 if($stammdaten[Hauptauswertung]!='0') echo '-';               
                 else echo $dsatz[Platz_R];
          }else echo $dsatz[Platz_R];

 echo "</td>";

*/
     echo "<td  id=\"e-col\">";

     echo "</td>";


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
 				if($dsatz[$ArtKurz.'_'.$z.'_Ver']==0) echo '-';
 			}
 			echo $dsatz[$ArtKurz . '_' . $z];
 			echo "</td>";
 			
 			
 			if($stammdaten[Wk_Art]=='M_m_T'){
 				
 				if($dsatz[$ArtKurz.'_'.$z.'_G'] == "Ja")
 				{
 					echo "<td id=\"RS1J\">";
 				}else{
 					echo "<td id=\"RS1N\">";
 				}
 				echo $dsatz[$ArtKurz . '_'. $z . '_Te'];
 				echo "</td>";
 			}
 			
 		}else if($stammdaten[Wk_Art]=='M_m_T') echo'<td></td><td></td>';
 		else echo'<td></td>';
 }

/*

 echo "<td id=\"Erg\">";
         echo $dsatz[S_B];
 echo "</td>";

 echo "<td>";
          if($stammdaten[Wk_Art]=='ZK'){
                 if($stammdaten[Hauptauswertung]!='0') echo '-';
                 else echo $dsatz[Platz_S];
          }else echo $dsatz[Platz_S];
 echo "</td>";
 
 */
 
 if($stammdaten[Wk_Art]!='BL'){

 echo "<td  id=\"e-col\">";

 echo "</td>";


 echo "<td id=\"Erg\">";
            if($stammdaten[Wk_Art]=='ZK'){
                 if($stammdaten[Hauptauswertung]=='0') echo $dsatz[Z_K];
                 elseif($stammdaten[Hauptauswertung]=='1') echo $dsatz[Relativ_P];
                 elseif($stammdaten[Hauptauswertung]=='2') echo $dsatz[Sinclair_P_Malone_Meltzer];
            }else echo $dsatz['Z_K'];
         
         
 echo "</td>";

 echo "<td>";
         if($stammdaten[Wk_Art]=='ZK')
         	if($stammdaten[MitNorm]=='1'){	//Damit bei einem WK mit Norm nur Heber Platzierungen gezeigt werden ohne Norm
         		if($dsatz['Al_Kl']==$stammdaten['NormAlKl']) $dsatz[Platz_GwKl]='-';
         		
         	}
                 if($stammdaten[Hauptauswertung]=='0') echo $dsatz[Platz_GwKl];
                 elseif($stammdaten[Hauptauswertung]=='1') echo $dsatz[Platz_RP];
                 elseif($stammdaten[Hauptauswertung]=='2') echo $dsatz[Platz_Sin];
         elseif($stammdaten[Wk_Art]=='BL') echo $dsatz[Platz_GwKl];
         else echo $dsatz[Platz_ZK];
 echo "</td>";
 
 if($stammdaten[MitNorm]=='1'){
 	if($dsatz[Platz_Norm]=='') $dsatz[Platz_Norm]='-';
 	echo "<td  id=\"e-col\">";
 	
 	echo "<td>";
 	echo $dsatz[Platz_Norm];
 	echo "</td>";
 }
 
 }	//Für nicht BL
 
 if($stammdaten[Wk_Art]!='ZK' && $stammdaten[Wk_Art]!='BL'){

   echo "<td  id=\"e-col\">";
   echo "</td>";

   echo "<td id=\"Erg\">";
        echo $dsatz[M_K_G];
   echo "</td>";

   echo "<td>";
        echo $dsatz[Platz_MK];
   echo "</td>";
 }

if($stammdaten[Wk_Art]=='ZK' && $stammdaten[Masters]=='1'){

   echo "<td  id=\"e-col\">";

   echo "</td>";

 echo "<td id=\"Erg\">";
 echo $dsatz[Sinclair_P_Malone_Meltzer];
 echo "</td>";

 echo "<td>";
 echo $dsatz[Platz_Sin_Malone_Meltzer];
 echo "</td>";
 }

if($stammdaten[Wk_Art]=='BL'){

   echo "<td  id=\"e-col\">";
   echo "</td>";
   
   echo "<td id=\"Erg\">";
        echo $dsatz['Z_K'];
   echo "</td>";
   
   echo "<td  id=\"e-col\">";
   echo "</td>";
   
 echo "<td id=\"Erg\">";
         echo $dsatz[Relativ_P];
 echo "</td>";

 echo "<td>";
 if($dsatz[Relativ_P]!=0)
     echo $dsatz[Platz_RP];
 else 
     echo "-";
 echo "</td>";
 }
 

 
echo "</tr>";

$OldGwKl=$dsatz['GwKl'];
$OldGrp=$dsatz['Gruppe'];
}
echo "</tbody>";
echo "</table>";

echo'<div id="new_load"></div>';




?>



<body></body>
<html></html>