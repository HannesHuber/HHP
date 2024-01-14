<?php
session_start();


if (empty($_SESSION['ReloadIterationGesamtPkt'])) {
    $_SESSION['ReloadIterationGesamtPkt'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/anzeige_gesamt_pkt.css">


<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">



     $(document).ready(function() {
       $("#newlA").load("JQuery/new_load_Gesamt_pkt.php");
       var refreshId = setInterval(function() {
          $("#newlA").load('JQuery/new_load_Gesamt_pkt.php?' + 1*new Date());
       }, 1000);
    });



</script>


<script type="text/javascript">


</script>


</head>



<body onLoad="setTimeout('stoppuhr()',0)">

<?php
ob_start ();
error_reporting(1);

//F�r Blaue Schwerter => Schmal-----------------------------------------------------------------
$BlaueSchwerter=1;


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

$bridge=1;

$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");

$dNow = mysqli_fetch_assoc($NowT);

$Grp = $dNow['Gruppe'];
$Art = $dNow['Art'];

$_SESSION['HCAA']=$dNow['IdHeber'];
$_SESSION['VCAA']=$dNow['V'];
$_SESSION['HGwCAA']=$dNow['HGw'];


//F�r Reload �ber Iteration => Bei jedem laden nimm speichere zu dem zeitpunkt aktuellste Iteration, damit verglichen werden kann mit aktueller
$DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['ReloadIterationGesamtPkt']=$ReloadIteration['Bridge1'];

//var_dump($_SESSION['ReloadIterationGesamtPkt']);

if($stammdaten['RelativArt']==2){ //Olympia Quali

    $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber.IdVerein = verein.IdVerein
            AND auswertung_".$data_a_db['S_Db'].".Platz_Robi IS NOT NULL
			ORDER BY
			auswertung_".$data_a_db['S_Db'].".Platz_Robi_Quali = 0, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,  auswertung_".$data_a_db['S_Db'].".Platz_Robi_Quali ASC
			LIMIT 10");
}

if($stammdaten['RelativArt']==0){ //Robi Pkt

    $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber.IdVerein = verein.IdVerein
            AND auswertung_".$data_a_db['S_Db'].".Platz_Robi IS NOT NULL
			ORDER BY
			auswertung_".$data_a_db['S_Db'].".Platz_Robi = 0, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,  auswertung_".$data_a_db['S_Db'].".Platz_Robi ASC
			LIMIT 10");
}

if($stammdaten['RelativArt']==1){ //Relativ Pkt

    $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber.IdVerein = verein.IdVerein
            AND auswertung_".$data_a_db['S_Db'].".Platz_Robi IS NOT NULL
			ORDER BY
			auswertung_".$data_a_db['S_Db'].".Platz_RP = 0, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,  auswertung_".$data_a_db['S_Db'].".Platz_RP ASC
			LIMIT 10");
}

if($stammdaten['RelativArt']==2){ //Olympia Quali

    $PktName='Robbi_Quali_P';
    $Platz_Name='Platz_Robi_Quali';
}

if($stammdaten['RelativArt']==0){ //Robi Pkt

    $PktName='Robbi_P';
    $Platz_Name='Platz_Robi';
}

if($stammdaten['RelativArt']==1){ //Relativ Pkt

    $PktName='Relativ_P';
    $Platz_Name='Platz_RP';
}

$OrderByString="auswertung_".$data_a_db['S_Db'].".".$PktName." DESC";

$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber.IdVerein = verein.IdVerein
            AND auswertung_".$data_a_db['S_Db'].".Platz_Robi IS NOT NULL
			ORDER BY
			$OrderByString
			LIMIT 10");


echo "
<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">";


echo"<thead>

 <tr>
  <th>Pl</th>";

if($BlaueSchwerter!=1){

if($stammdaten['International']=='0') echo '<th>Verein</th>';
else echo '<th>Staat</th>';
if($stammdaten['International']=='0') echo '<th>Land</th>';


    echo "
  <th>K�-Gw</th>";
    //<th>Rl-Gw</th>
    echo"<th colspan=\"3\">Rei�en</th>
  <th colspan=\"3\">Sto�en</th>
  <th>ZK</th>";
}


  echo"
  <th>Points</th>
  <th>Name</th>

 </tr>
</thead>
";

echo"<tbody>";




$Al_Kl='';
$Platz=0;
$Relativ_P=0;
$z=0;
$Geschlecht='M�nnlich';
$ZK_ueber_AlKl_einzeln=1;
$i=0;

    while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
    {
        $i++;

        if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

            echo "<tbody class=\"ungerade\">";

        } else {

            echo "<tbody class=\"gerade\">";

        }

        echo "<tr>";


        echo "<td>";
        echo $i;    //$dsatz_aus[$Platz_Name];
        echo "</td>";

        if($BlaueSchwerter!=1){

        echo "<td>";                                                                                                // Spalte (Mit drop down bar)
        if($stammdaten['International']=='0')echo "$dsatz_aus[Verein]";
        else echo IdStaatzuStaat ($dsatz_aus['IdStaat']);
        echo "</td>";

        $Verein=dbBefehl("SELECT * FROM verein WHERE IdVerein='" . $dsatz_aus['IdVerein']. "' ");
        $dataVerein = mysqli_fetch_assoc($Verein);
        $Land=dbBefehl("SELECT * FROM laender WHERE Idlaender='" . $dataVerein['IdLaender']. "' ");
        $dataLand= mysqli_fetch_assoc($Land);

        if($stammdaten['International']==0)      echo '<td>' . $dataLand['laender'] . '</td>';



        echo "<td>";
        echo $dsatz_aus['K_Gewicht']". Kg";
        echo "</td>";

        /*
         echo "<td>";
         echo "$dsatz_aus[R_Gewicht] Kg";
         echo "</td>";
         */

        $mitZeit=0;

        if($dsatz_aus['R_1_Ver']==0){

            if($dsatz_aus['R_1_G'] == "Ja")
            {
                echo "<td>";
            }else{
                echo "<td class=\"durchstrich\">";
            }
            echo $dsatz_aus['R_1'];
        }else
            echo "<td>Ver";

            echo "</td>";

            if($mitZeit=='1'){
                echo "<td>";
                echo Uhrzeit($dsatz_aus['R_1_t']);
                echo "</td>";
            }


            if($dsatz_aus['R_2_Ver']==0){
                if($dsatz_aus['R_2_G'] == "Ja")
                {
                    echo "<td>";
                }else{

                    echo "<td class=\"durchstrich\">";
                }
                echo $dsatz_aus['R_2'];
            }else
                echo "<td>Ver";

                echo "</td>";

                if($mitZeit=='1'){
                    echo "<td>";
                    echo Uhrzeit($dsatz_aus['R_2_t']);
                    echo "</td>";
                }

                if($dsatz_aus['R_3_Ver']==0){
                    if($dsatz_aus['R_3_G'] == "Ja")
                    {
                        echo "<td>";
                    }else{

                        echo "<td class=\"durchstrich\">";
                    }


                    echo $dsatz_aus['R_3'];
                }else
                    echo "<td>Ver";

                    echo "</td>";

                    if($mitZeit=='1'){
                        echo "<td>";
                        echo Uhrzeit($dsatz_aus['R_3_t']);
                        echo "</td>";
                    }

                    if($dsatz_aus['S_1_Ver']==0){
                        if($dsatz_aus['S_1_G'] == "Ja")
                        {
                            echo "<td>";
                        }else{

                            echo "<td class=\"durchstrich\">";
                        }


                        echo $dsatz_aus['S_1'];
                    }else
                        echo "<td>Ver";

                        echo "</td>";

                        if($mitZeit=='1'){
                            echo "<td>";
                            echo Uhrzeit($dsatz_aus['S_1_t']);
                            echo "</td>";
                        }

                        if($dsatz_aus['S_2_Ver']==0){
                            if($dsatz_aus['S_2_G'] == "Ja")
                            {
                                echo "<td>";
                            }else{

                                echo "<td class=\"durchstrich\">";
                            }


                            echo $dsatz_aus['S_2'];
                        }else
                            echo "<td>Ver";

                            echo "</td>";

                            if($mitZeit=='1'){
                                echo "<td>";
                                echo Uhrzeit($dsatz_aus['S_2_t']);
                                echo "</td>";
                            }

                            if($dsatz_aus['S_3_Ver']==0){
                                if($dsatz_aus['S_3_G'] == "Ja")
                                {
                                    echo "<td>";
                                }else{

                                    echo "<td class=\"durchstrich\">";
                                }


                                echo $dsatz_aus['S_3'];
                            }else
                                echo "<td>Ver";

                                echo "</td>";

                                if($mitZeit=='1'){
                                    echo "<td>";
                                    echo Uhrzeit($dsatz_aus['S_3_t']);
                                    echo "</td>";
                                }




                                echo "<td>";

                                echo $dsatz_aus['Z_K']." Kg";

                                echo "</td>";


        } //Blaue Schwerter Ende---------------------------------------------------------------------------


                                echo "<td>";

                                echo $dsatz_aus[$PktName];

                                echo "</td>";




                                echo "<td>";


                                echo $dsatz_aus['Name'];
                                echo $dsatz_aus['Vorname'];
                                echo "</td>";


                                echo "</tr>";

    }

      echo "</table>";


    echo'<div id="newlA"></div>';
?>


</body>
</html>
