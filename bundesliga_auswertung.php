<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/bl_auswertung.css" />
<link rel="stylesheet" type="text/css" href="CSS/bl_auswertung_print.css" media="print" />


</head>


<body>

<form method="post" action="bundesliga_auswertung.php">



<!-- <p class="kopf"><b>Wettkampfprotokoll</b></p> -->

<a href="auswertung.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>


<?php


ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';

$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

$Verein = dbBefehl("SELECT * FROM verein");

$A_Kl = dbBefehl("SELECT * FROM alters_klassen");

//$Grp=$_SESSION['Aus_Grp'];

$time=getdate();



include 'funktionen/auswertung.php';   //Keine Funktion sondern einfach php einschub


$DataVereinsAuswahl = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
$VereinsAuswahl = mysqli_fetch_assoc($DataVereinsAuswahl);


$NameVerein1 = returnNameVerein($VereinsAuswahl['Verein1']);
$NameVerein2 = returnNameVerein($VereinsAuswahl['Verein2']);

$Verein1='' . $VereinsAuswahl['Verein1'];
$Verein2='' . $VereinsAuswahl['Verein2'];

$Pt_V1=$VereinsAuswahl['Ergebniss_V1'];
$Pt_V2=$VereinsAuswahl['Ergebniss_V2'];

$Pkt_Gesamt1=$VereinsAuswahl['RuS_Pt_V1'];
$Pkt_Gesamt2=$VereinsAuswahl['RuS_Pt_V2'];

if($stammdaten['Verein_Anzahl']==3){
    $NameVerein3 = returnNameVerein($VereinsAuswahl['Verein3']);
    $Verein3='' . $VereinsAuswahl['Verein3'];
    $Pkt_Gesamt3=$VereinsAuswahl['RuS_Pt_V3'];
}

if($stammdaten['auswertung_art']==0){
  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", verein, heber_".$data_a_db['S_Db']."
                                 WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
  			                         AND heber.IdVerein = verein.IdVerein
                                 AND heber.IdHeber= heber_".$data_a_db['S_Db'].".IdHeber
                                 ORDER BY FIELD(heber.IdVerein, '$Verein1' , '$Verein2', '$Verein3'),
                                          auswertung_".$data_a_db['S_Db'].".Relativ_P DESC");
}

if($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", verein, heber_".$data_a_db['S_Db']."
                                 WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
  			                         AND heber.IdVerein = verein.IdVerein
                                 AND heber.IdHeber= heber_".$data_a_db['S_Db'].".IdHeber
                                 ORDER BY FIELD(heber.IdVerein, '$Verein1' , '$Verein2', '$Verein3'),
                                          auswertung_".$data_a_db['S_Db'].".Sinclair_P_Malone_Meltzer DESC");
}


echo "
<table class='tabelle' id='BlHeadTabelle' cellpadding=\"0\" cellspacing=\"2\" width='100%'>
  <colgroup>
    <col width='33%'>
    <col width='33%'>
    <col width='33%'>
  </colgroup>
";



    echo '<tr>';

       echo "<td id='tdleft'>";
         echo '<span style="width:125px;display:block;float:left;">Datum: </span>' . mysqlDateToDate($stammdaten['Datum']);
       echo "</td>";

       echo "<td id='tdcenter'>";
       echo $NameVerein1 . ' - ' . $NameVerein2;
       if($stammdaten['Verein_Anzahl']==3) echo ' - '.$NameVerein3;
       echo "</td>";

       echo "<td id='tdright'>";
        if($stammdaten['Verein_Anzahl']==2)
            echo '<span style="width:175px;display:block;float:right;">' .$Pt_V1 . ' : ' . $Pt_V2 . '</span>Ergebniss:';
        else
            echo '<span style="width:175px;display:block;float:right;">' .$Pkt_Gesamt1 . ' : ' . $Pkt_Gesamt2 . ' : ' . $Pkt_Gesamt3 . '</span>Ergebnis:';

       echo "</td>";

    echo '</tr>';

    echo '<tr>';

       echo "<td id='tdleft'>";
         echo '<span style="width:125px;display:block;float:left;">Leistungsklasse: </span>' . $stammdaten['Liga'];
       echo "</td>";

       echo "<td id='tdcenter'>";
         echo 'Ort: &nbsp;&nbsp;' . $stammdaten['Ort'];;
       echo "</td>";

       echo "<td id='tdright'>";

       if($stammdaten['Verein_Anzahl']==2){
            if($Pt_V1>$Pt_V2)      $Sieger=$NameVerein1;
            elseif($Pt_V2>$Pt_V1)  $Sieger=$NameVerein2;
       }elseif($stammdaten['Verein_Anzahl']==3){
           if(groesser($Pkt_Gesamt1,$Pkt_Gesamt2)==1){
               if(groesser($Pkt_Gesamt1,$Pkt_Gesamt3)==1)       $Sieger=$NameVerein1;
               elseif(groesser($Pkt_Gesamt1,$Pkt_Gesamt3)==2)   $Sieger=$NameVerein3;
               elseif(groesser($Pkt_Gesamt1,$Pkt_Gesamt3)==2)   $Sieger=$NameVerein1.', '.$NameVerein3;
           }elseif(groesser($Pkt_Gesamt1,$Pkt_Gesamt2)==2){
               if(groesser($Pkt_Gesamt2,$Pkt_Gesamt3)==1)       $Sieger=$NameVerein2;
               elseif(groesser($Pkt_Gesamt2,$Pkt_Gesamt3)==2)   $Sieger=$NameVerein3;
               elseif(groesser($Pkt_Gesamt1,$Pkt_Gesamt2)==2)   $Sieger=$NameVerein2.', '.$NameVerein3;
           }elseif(groesser($Pkt_Gesamt1,$Pkt_Gesamt2)==0){
               if(groesser($Pkt_Gesamt1,$Pkt_Gesamt3)==1)       $Sieger=$NameVerein1.', '.$NameVerein2;
               elseif(groesser($Pkt_Gesamt1,$Pkt_Gesamt3)==2)   $Sieger=$NameVerein3;
               elseif(groesser($Pkt_Gesamt1,$Pkt_Gesamt3)==0)   $Sieger=$NameVerein1.', '.$NameVerein2.', '.$NameVerein3;
           }
       }


          echo '<span style="width:175px;display:block;float:right;">' .$Sieger . '</span>Sieger:';

       echo "</td>";

    echo '</tr>';


 echo '</tbody>';
echo "</table>";



echo "<br>";

echo "
<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\" width=\"100%\">
  <colgroup>
    <col width=\"250\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"100\">
    <col width=\"100\">
  </colgroup>
";



echo"
<thead>
 <tr>
  <th rowspan='2' id='tdcenter'>Name</th>
  <th rowspan='2' id='tdcenter'>Jahrgang</th>
  <th rowspan='2' id='tdcenter'>Kö-Gw</th>";


  if($stammdaten['auswertung_art']==0){
    echo"  <th rowspan='2' id='tdcenter'>Rl-Gw</th> ";
  }elseif($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
    echo" <th rowspan='2' id='tdcenter'>Sin-Fak</th> ";
  }

  echo"
  <th colspan=\"4\" id='tdcenter'>Reissen</th>
  <th colspan=\"4\" id='tdcenter'>Stossen</th>
  <th colspan=\"2\" id='tdcenter'>Zweikampf</th>
 </tr>

 <tr>
  <th id='tdcenter'>1</th>
  <th id='tdcenter'>2</th>
  <th id='tdcenter'>3</th>
  <th id='tdcenter'>Pkt.</th>
  <th id='tdcenter'>1</th>
  <th id='tdcenter'>2</th>
  <th id='tdcenter'>3</th>
  <th id='tdcenter'>Pkt.</th>
  <th id='tdcenter'>ZK</th>";

  if($stammdaten['auswertung_art']==0){
    echo"<th id='tdcenter'>Pkt.</th>";
  }

  if($stammdaten['auswertung_art']==1  || $stammdaten['auswertung_art']==2){
    echo"<th id='tdcenter'>Sin. Pkt.</th>";
  }

 echo"</tr>
</thead>
";

echo"<tbody>";

$Verein='';
// Iterate over the result set fetched from the database
while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{
  // Assume that the current row is valid
  $isValid = true;
  
  // Check if any of the conditions for x = 1 are met:
  // R_1 or S_1 is 0, or R_1_G or S_1_G is null
  if ($dsatz_aus["R_1"] == 0 && $dsatz_aus["S_1"] == 0 ||
    $dsatz_aus["R_1_G"] === null && $dsatz_aus["S_1_G"] === null) {
        $isValid = false;
  }

  if (!$isValid) {
      continue;
  }

if($Verein==''){
  if($Verein!=$dsatz_aus['Verein']){
   echo "<thead>";
      echo "<tr>";
           echo "<th colspan=\"12\">";
                   echo $dsatz_aus['Verein'];
           echo "</th>";
      echo "</tr>";
   echo "</thead>";
  }
}else{
  if($Verein!=$dsatz_aus['Verein']){
   echo "<thead>";
   echo "<tr>";
   	echo "<td colspan=\"7\"></td>";
  	 	echo "<td id='tdcenter'>";
   		echo $GesRelPt_Reissen;
   		echo "</td>";

   echo "<td colspan=\"3\"></td>";
   		echo "<td id='tdcenter'>";
   		echo $GesRelPt_Stossen;
   		echo "</td>";

   echo "<td colspan=\"1\"></td>";
   		echo "<td id='tdcenter'>";
   		echo $GesRelPt;
   		echo "</td>";

   echo "</tr>";

   echo "</thead>";
   echo "<thead>";
      echo "<tr>";
           echo "<th colspan=\"12\">";
                   echo $dsatz_aus['Verein'];
           echo "</th>";
      echo "</tr>";
   echo "</thead>";

   $GesRelPt=0;
   $GesRelPt_Reissen=0;
   $GesRelPt_Stossen=0;
  }
}



echo "<tr>";

     echo "<td>";
                 echo "<span style=\"width:120px;display:block;float:left;\"> ".$dsatz_aus['Name']." </span>";
                 echo $dsatz_aus['Vorname'];
                 if($dsatz_aus['Ausserkonkurrenz']=='Ausserkonkurrenz') echo " (AK)";
     echo "</td>";

     echo "<td  id='tdcenter'>";
         echo $dsatz_aus['Jahrgang'];
     echo "</td>";

     echo "<td  id='tdcenter'>";
         echo $dsatz_aus['K_Gewicht']. " Kg";
     echo "</td>";

     echo "<td  id='tdcenter'>";
     if($stammdaten['auswertung_art']==0){
       echo $dsatz_aus['R_Gewicht'];
     }elseif($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
       echo sinclair_faktor($dsatz_aus['IdHeber']); //Aus funktionen/auswertung_funktionen
     }
     echo "</td>";

     for($x=1;$x<4;$x++){
         if($dsatz_aus['R_'.$x.'_Ver']!=1){
            if($dsatz_aus['R_'.$x.'_G'] == "Ja")
            {
                 echo "<td  id='tdcenter'>";
            }else{

                echo "<td class=\"durchstrich\"  id='tdcenter'>";
            }

            if($dsatz_aus['R_uo_S']==0 || $dsatz_aus['R_uo_S']==1)
                echo $dsatz_aus['R_'.$x];

        }else{
            echo "<td  id='tdcenter'>";
            echo "V";
        }
         echo "</td>";

     }


     echo "<td  id='tdcenter'>";



      if($stammdaten['auswertung_art']==0){
        $Relativ_R=$dsatz_aus['R_B']-$dsatz_aus['R_Gewicht'];
        if($Relativ_R<0)$Relativ_R=0.0;

        $Relativ_R=number_format($Relativ_R,1, '.', ' ');

      	echo $Relativ_R;

      }elseif($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
        $SinFaktor=sinclair_faktor($dsatz_aus['IdHeber']);
        $Sinclair_pkt=$dsatz_aus['R_B']*$SinFaktor;
        $Sinclair_pkt=number_format($Sinclair_pkt,1, '.', ' ');
        echo $Sinclair_pkt;

        //Zur berechnung der Gesamt Pkt Stoßen
        $Relativ_R = $Sinclair_pkt;
        $Sinclair_pkt = 0;
      }
     echo "</td>";


     for($x=1;$x<4;$x++){
         if($dsatz_aus['S_'.$x.'_Ver']!=1){


            if($dsatz_aus['S_'.$x.'_G'] == "Ja")
            {
                echo "<td  id='tdcenter'>";
            }else{
                echo "<td class=\"durchstrich\"  id='tdcenter'>";
            }

            if($dsatz_aus['R_uo_S']==0 || $dsatz_aus['R_uo_S']==2)
                echo $dsatz_aus['S_'.$x];
         }else{
             echo "<td  id='tdcenter'>";
             echo "V";
         }
         echo "</td>";

     }


     echo "<td  id='tdcenter'>";

         if($stammdaten['auswertung_art']==0){
           $Relativ_S=$dsatz_aus['S_B']-$dsatz_aus['R_Gewicht'];
           if($Relativ_S<0)$Relativ_S=0.0;

           $Relativ_S=number_format($Relativ_S,1, '.', ' ');

           echo $Relativ_S;

         }elseif($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
           $SinFaktor=sinclair_faktor($dsatz_aus['IdHeber']);
           $Sinclair_pkt=$dsatz_aus['S_B']*$SinFaktor;
           $Sinclair_pkt=number_format($Sinclair_pkt,1, '.', ' ');
           echo $Sinclair_pkt;

           //Zur berechnung der Gesamt Pkt Stoßen
           $Relativ_S = $Sinclair_pkt;
           $Sinclair_pkt = 0;

         }



     echo "</td>";





     echo "<td  id='tdcenter'>";

         echo "$dsatz_aus[Z_K] Kg";

     echo "</td>";



     echo "<td  id='tdcenter'>";
     if($stammdaten['auswertung_art']==0){
       echo "$dsatz_aus[Relativ_P]";
     }elseif($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
       echo "$dsatz_aus[Sinclair_P_Malone_Meltzer]";
     }


     echo "</td>";


  echo "</tr>";

    $Verein=$dsatz_aus['Verein'];
    if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz'){
        if($stammdaten['auswertung_art']==0){
          $Heber_Punkte = $dsatz_aus['Relativ_P'];
        }elseif($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
          $Heber_Punkte = $dsatz_aus['Sinclair_P_Malone_Meltzer'];
        }
        $GesRelPt+=$Heber_Punkte;
        $GesRelPt_Reissen+=$Relativ_R;
        $GesRelPt_Stossen+=$Relativ_S;
    }
}

echo "<thead>";
echo "<tr>";
echo "<td colspan=\"7\"></td>";
echo "<td id='tdcenter'>";
echo $GesRelPt_Reissen;
echo "</td>";

echo "<td colspan=\"3\"></td>";
echo "<td id='tdcenter'>";
echo $GesRelPt_Stossen;
echo "</td>";

echo "<td colspan=\"1\"></td>";

echo "<td id='tdcenter'>";
echo $GesRelPt;
echo "</td>";

echo "</tr>";
echo "</thead>";


echo "</tbody>";
echo "</table>";


echo '</form>';

echo'
<br>

<form id="sample" method="post" action="bundesliga_auswertung.php">
  <textarea name="text" form="sample" rows="3" cols="130">'.$stammdaten['Kommentar'].'</textarea>';

echo'
<br>
<br>';

echo'<input id="always-safe" class="hide"  type="submit" name="save" value="Speichern">';

echo'</form>';

echo'<form method="post" action="bundesliga_auswertung.php">

<br>
<table width="100%" border="0" cellpadding="0" cellspacing="2">
 <tr>
  <td><hr id="un" class="linie"></td>
  <td><hr id="un" class="linie"></td>
  <td><hr id="un" class="linie"></td>
  <td><hr id="un" class="linie"></td>';

if($stammdaten['Verein_Anzahl']==3)
    echo'<td><hr id="un" class="linie"></td>';

echo'
 </tr>';
echo'
<tr>';
if($stammdaten['Protokollant']!='')
    echo '<td center="centerUn" id="display">'.$stammdaten['Protokollant'].'<br> Protokollführer</td>';
else
    echo '<td center="centerUn" id="display">Protokollführer</td>';

if($stammdaten['Mannschaftsfuehrer1']!='')
    echo '<td center="centerUn" id="display">'.$stammdaten['Mannschaftsfuehrer1'].'<br> Mannschaftsführer</td>';
else
    echo '<td center="centerUn" id="display">Mannschaftsführer</td>';

if($stammdaten['KampfrichterName']!='')
    echo '<td center="centerUn" id="display">'.$stammdaten['KampfrichterName'].'<br> Hauptkampfrichter </td>';
else
    echo '<td center="centerUn" id="display">Hauptkampfrichter </td>';

if($stammdaten['Mannschaftsfuehrer2']!='')
    echo '<td center="centerUn" id="display">'.$stammdaten['Mannschaftsfuehrer2'].'<br> Mannschaftsführer </td>';
else
    echo '<td center="centerUn" id="display">Mannschaftsführer</td>';


  if($stammdaten['Verein_Anzahl']==3)
      if($stammdaten['Mannschaftsfuehrer3']!='')
        echo '<td center="centerUn" id="display">'.$stammdaten['Mannschaftsfuehrer3'].'<br> Mannschaftsführer </td>';
      else
        echo '<td center="centerUn" id="display">Mannschaftsführer</td>';

echo'
</tr>

</table>';


if(isset($_POST['save']))
{
	$x=1;

	$text = $_POST['text'];
	/*
	$ids = explode("\n", str_replace("\r", "", $text));

	$i=1;

	foreach ($ids as $value){
		if($i==1){
			$String=$value;
		}else{
			$String=$String.'\n'.$value;
		}
		$i++;
	}
	//var_dump ($String);
	 *
	 *
	 */
	dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']." SET Kommentar = '" . $text. "' ");
}

/*
         if((isset($_POST['save'])))
         {
         	//$x=1;
         	$text="textareaReal";
         	var_dump(htmlentities($_POST['textareaReal']));

         }
*/

//var_dump($x);


         if($x==1)
         {
         	echo"
 <script>
 setTimeout(function(){
     location = 'bundesliga_auswertung.php'
   },0)
 </script>
";
         }


echo'
</form>
</body>
</html>';
