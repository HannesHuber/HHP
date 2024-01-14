<?php
session_start();
if (empty($_SESSION['Urk_Laenderwertung'])) {
	$_SESSION['Urk_Laenderwertung'] = 0;
}

header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">



<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl.css" />
<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl_print.css" media="print" />
<style>
@page { size:portrait; }
</style>
</head>


<body>

<form method="post" action="laenderwertung.php">

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

include 'funktionen/auswertung.php';

dbBefehl("DELETE FROM laenderwertung_".$data_a_db['S_Db']);


if($stammdaten['Wk_Art']=='ZK'){

$Art='GwKl';

}else{

$Art='MK';

}

if($stammdaten['Laenderwertung']=='1'){


     $Art_While = dbBefehl("SELECT * FROM verein");

     $Art_query = 'IdVerein';
     $Art_gleich = 'IdVerein';
     $Art_Summe = 'Verein';
}
if($stammdaten['Laenderwertung']=='2'){


     $Art_While = dbBefehl("SELECT * FROM laender");

     $Art_query = 'Land';
     $Art_gleich = 'laender';
     $Art_Summe = 'laender';

}
if($stammdaten['Laenderwertung']=='3'){


     $Art_While = dbBefehl("SELECT * FROM staaten");

     $Art_query = 'IdStaat';
     $Art_gleich = 'IdStaat';
     $Art_Summe = 'Staat';
}


   while($dsatz = mysqli_fetch_assoc($Art_While))
   {

         $Lw_P_z=0;

         if($_SESSION['Laender_Art']==0){

                 $heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].",laenderwertung,staaten, verein
                                 WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                 AND heber.IdStaat = staaten.IdStaat
                                 AND auswertung_".$data_a_db['S_Db'].".Platz_$Art = laenderwertung.Platz
                                 AND heber.$Art_query = '$dsatz[$Art_gleich]'
							   AND heber.IdVerein = verein.IdVerein
                                 ");

          }elseif($_SESSION['Laender_Art']==1){

                 $AlKl=$_SESSION['Laender_AlKl'];

                 if($stammdaten['MitNorm']==1 && $AlKl==$stammdaten['NormAlKl']){
                     //Hier habe ich Platz_$Art => Platz_Norm
                 	$heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].",laenderwertung,staaten, verein, heber_".$data_a_db['S_Db']."
                 			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
							AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                 			AND heber.IdStaat = staaten.IdStaat
                 			AND auswertung_".$data_a_db['S_Db'].".Platz_Norm = laenderwertung.Platz
                 			AND heber.$Art_query = '$dsatz[$Art_gleich]'
                 			AND heber.IdVerein = verein.IdVerein
							AND heber_".$data_a_db['S_Db'].".Norm_Heber = '1'
                 			");
                 }else{
                 	$heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].",laenderwertung,staaten, verein
                 			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                 			AND heber.IdStaat = staaten.IdStaat
                 			AND heber.AlKl = '$AlKl'
                 			AND auswertung_".$data_a_db['S_Db'].".Platz_$Art = laenderwertung.Platz
                 			AND heber.$Art_query = '$dsatz[$Art_gleich]'
                 			AND heber.IdVerein = verein.IdVerein
                 			");
                 }




          }elseif($_SESSION['Laender_Art']==2){

                 $heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].",laenderwertung,staaten, heber_".$data_a_db['S_Db'].", verein
                                 WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                 AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                 AND heber.IdStaat = staaten.IdStaat
                                 AND auswertung_".$data_a_db['S_Db'].".GwKl_GesGrp_Platz = laenderwertung.Platz
                                 AND heber.$Art_query = '$dsatz[$Art_gleich]'
							   AND heber.IdVerein = verein.IdVerein
                                 ");
          }


          if($stammdaten['Laenderwertung']=='2'){	//Gesondert Bundesl�nder �ber Vereine angesteurt werden
          	if($_SESSION['Laender_Art']==0){

          		$heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].",laenderwertung,staaten, verein, laender
          				WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
          				AND heber.IdStaat = staaten.IdStaat
          				AND auswertung_".$data_a_db['S_Db'].".Platz_$Art = laenderwertung.Platz
          				AND heber.IdVerein = verein.IdVerein
						AND laender.laender = '$dsatz[$Art_gleich]'
						AND laender.Idlaender = verein.IdLaender
          				");
          	}elseif($_SESSION['Laender_Art']==1){

          		$AlKl=$_SESSION['Laender_AlKl'];


          		if($stammdaten['MitNorm']==1 && $AlKl==$stammdaten['NormAlKl']){
          		    //Hier habe ich Platz_$Art => Platz_Norm
          			$heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].",laenderwertung,staaten, verein, laender, heber_".$data_a_db['S_Db']."
          					WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
							AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
          					AND heber.IdStaat = staaten.IdStaat
          					AND auswertung_".$data_a_db['S_Db'].".Platz_Norm = laenderwertung.Platz
          					AND heber.IdVerein = verein.IdVerein
          					AND laender.laender = '$dsatz[$Art_gleich]'
          					AND laender.Idlaender = verein.IdLaender
          					AND heber_".$data_a_db['S_Db'].".Norm_Heber = '1'
          					");

          		}else{
          			$heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].",laenderwertung,staaten, verein, laender
          					WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
          					AND heber.IdStaat = staaten.IdStaat
          					AND heber.AlKl = '$AlKl'
          					AND auswertung_".$data_a_db['S_Db'].".Platz_$Art = laenderwertung.Platz
          					AND heber.IdVerein = verein.IdVerein
          					AND laender.laender = '$dsatz[$Art_gleich]'
          					AND laender.Idlaender = verein.IdLaender
          					");
          		}
          	}
          }

          while($daten_heber = mysqli_fetch_assoc($heber)){
              $Lw_P_z = $Lw_P_z + $daten_heber['P_Punkte'];
              $nmae='Platz_MK';
          }




         if($Lw_P_z!=0)
                 dbBefehl("INSERT INTO laenderwertung_".$data_a_db['S_Db']." (Ver_Lan_Sta, Lw_Punkte)
                 Values ('$dsatz[$Art_Summe]', '$Lw_P_z')");

   }

   if($stammdaten['Laenderwertung']==1) echo '<p class="kopf"><b>Vereins-Wertung</b></p>';
   if($stammdaten['Laenderwertung']==2) echo '<p class="kopf"><b>Länder-Wertung</b></p>';
   if($stammdaten['Laenderwertung']==3) echo '<p class="kopf"><b>Staaten-Wertung</b></p>';



$daten_Mann = dbBefehl("SELECT * FROM laenderwertung_".$data_a_db['S_Db']."
                           ORDER BY laenderwertung_".$data_a_db['S_Db'].".Lw_Punkte DESC");

echo"<div id=\"divid1\" class=\"examplediv\">";

echo "<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
            <colgroup>
                 <col width=\"250\">
                 <col width=\"150\">
                 <col width=\"150\">
            </colgroup>

            <thead>

            <tr>";

if($stammdaten['Laenderwertung']==1) echo '<th>Verein</th>';
if($stammdaten['Laenderwertung']==2) echo '<th>Land</th>';
if($stammdaten['Laenderwertung']==3) echo '<th>Staat</th>';


                echo"
                 <th>Punkte</th>
                 <th>Platz</th>
            </tr>

            </thead>

       ";

$platz=0;
$i=0;
$Vergleich=0;
$Zaehler=0;
while($dsatz = mysqli_fetch_assoc($daten_Mann))
{
    if($stammdaten['Laenderwertung']==2){
        $daten_Land = dbBefehl("SELECT * FROM laender WHERE laender = '".$dsatz['Ver_Lan_Sta']."'");
        $dLand = mysqli_fetch_assoc($daten_Land);
        $dsatz['Ver_Lan_Sta']=$dLand['laender_lang'];
    }


if($dsatz['Lw_Punkte']!='0'){

$i++;

  if ($i % 2 != 0) {                                             //ungerades und gerades i indikator
                                                                 //ungerade/gerade => zwischen linien in table

  echo "<tbody class=\"ungerade\">";

  } else {

  echo "<tbody class=\"gerade\">";

  }



  echo "<tr align=\"center\" >";

                 if($Vergleich==$dsatz['Lw_Punkte']){

                         $Zaehler++;

                 }else{

                         $platz++;
                         $platz= $platz + $Zaehler;
                         $Zaehler=0;
                 }




                 echo"<tr>
                         <td>".$dsatz['Ver_Lan_Sta']."</td>
                         <td>".$dsatz['Lw_Punkte']."</td>
                         <td>$platz</td>
                 </tr>

                 ";

                 $Ver_Lan_Sta=$dsatz['Ver_Lan_Sta'];
                 $wk_number=$data_a_db['S_Db'];


                 dbBefehl("UPDATE laenderwertung_$wk_number
                 		SET Lw_Platz= '$platz'
                 		WHERE Ver_Lan_Sta ='$Ver_Lan_Sta'
                 		");

         $Vergleich=$dsatz['Lw_Punkte'];
     }                                                               //if-schlefe
  }
         echo"</tbody>";
echo "</table>";

if(isset($_POST['Urkunden'])){
	$_SESSION['Urk_Laenderwertung']=1;
	//$_SESSION['Laender_AlKl']
	//$stammdaten[Laenderwertung]

	echo"
 <script>
 setTimeout(function(){
     location = 'urkunde.php'
   },0)
 </script>
";

}

?>


<br><br>

<input id="always-safe" type="submit" name="Urkunden" value="Urkunden">



</form>
</body>
</html>
