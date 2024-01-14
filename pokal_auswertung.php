<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
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



<form method="post" action="pokal_auswertung.php">


<p class="kopf"><b>Pokal Auswertung</b></p>

<a href="auswertung.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>






<?php

ob_start ();
error_reporting(1);


include 'funktionen/db_verbindung.php';


$db = dbVerbindung ();
$data_a_db ['S_Db'] = $_SESSION ['WeK'];

$data_a_db['S_Db']=$_SESSION['WeK'];


$Laender = dbBefehl("SELECT * FROM laender");



$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

$stammdaten = mysqli_fetch_assoc($datenbank);


$time=getdate();


$Heber_p_M = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);


$data_H_p_M = mysqli_fetch_assoc($Heber_p_M)
OR die ("<pre>\n".$sql."</pre>\n".mysqli_error());


$An_H_p_M = $data_H_p_M['Heber_pro_M'];


dbBefehl("DELETE FROM laenderwertung_".$data_a_db['S_Db']);


$i=0;
while($daten_verein = mysqli_fetch_assoc($Laender))
{

$i++;

         if($stammdaten['Wk_Art']=='ZK'){

                 $heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                                       WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber.Land = '$daten_verein[laender]'
                                       AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                       AND heber_".$data_a_db['S_Db'].".Pokal = '1'
                                       ORDER BY auswertung_".$data_a_db['S_Db'].".Relativ_P DESC
                                       ");


         }else{

                 $heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                                       WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber.Land = '$daten_verein[laender]'
                                       AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                       AND heber_".$data_a_db['S_Db'].".Pokal = '1'
                                       ORDER BY auswertung_".$data_a_db['S_Db'].".M_K_G DESC
                                       ");

         }



         $Z_HpM=0;
         $Z_Mann=1;
         $M=1;
         $W=1;

         while($daten_heber = mysqli_fetch_assoc($heber))
         {


                         $Z="Mann_" . $Z_Mann;


                         if($Z_HpM <= 5){

                                 if($stammdaten['Wk_Art']=='ZK'){

                                         if(($daten_heber['Geschlecht']=='Weiblich')&&($W<=4)){

                                                 $W++;
                                                 $Z_HpM++;
                                                 $$Z= $$Z + $daten_heber['Relativ_P'];

                                         }

                                         if(($daten_heber['Geschlecht']=='Männlich')&&($M<=4)){

                                                 $M++;
                                                 $Z_HpM++;
                                                 $$Z= $$Z + $daten_heber['Relativ_P'];

                                         }

                                 }else{

                                         if(($daten_heber['Geschlecht']=='Weiblich')&&($W<=4)){

                                                 $W++;
                                                 $Z_HpM++;
                                                 $$Z= $$Z + $daten_heber['M_K_G'];

                                         }

                                         if(($daten_heber['Geschlecht']=='Männlich')&&($M<=4)){

                                                 $M++;
                                                 $Z_HpM++;
                                                 $$Z= $$Z + $daten_heber['M_K_G'];

                                         }


                                 }


                                 if($Z_HpM == 5){


                                         $safe=$$Z;


                                         dbBefehl("INSERT INTO laenderwertung_".$data_a_db['S_Db']." (Ver_Lan_Sta, Lw_Punkte)
                                                      Values ('".$daten_verein['laender']."', '$safe')");



                                         $$Z=0;

                                         $Z_Mann++;

                                         $Z_HpM  = 0;


                                 }

                 }


         }



}


$platz=0;

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

            <tr>
                 <th>Land</th>
                 <th>Punkte</th>
                 <th>Platz</th>
            </tr>

            </thead>

            ";
         $i=0;

         while($dsatz = mysqli_fetch_assoc($daten_Mann))
         {


         $i++;
if ($i % 2 != 0) {                                            //ungerades und gerades i indikator
                                                                 //ungerade/gerade => zwischen linien in table

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}



echo "<tr align=\"center\" >";



                 $platz=$platz+1;


                 echo"

                 <tr>
                         <td>".$dsatz['Ver_Lan_Sta']."</td>
                         <td>".$dsatz['Lw_Punkte']."</td>
                         <td>$platz</td>
                 </tr>

                 ";


                 dbBefehl("UPDATE laenderwertung_".$data_a_db['S_Db']."
                              SET Lw_Platz= '$platz'
                              WHERE Ver_Lan_Sta='".$dsatz['Ver_Lan_Sta']."'
                              ");


         }
         echo"</tbody>";
echo "</table>";





?>









</body>
</html>
