<?php
session_start();
if (empty($_SESSION['HCA'])) {
    $_SESSION['HCA'] = -1;
}
if (empty($_SESSION['VCA'])) {
    $_SESSION['VCA'] = -1;
}
if (empty($_SESSION['HGwCA'])) {
    $_SESSION['HGwCA'] = -1;
}


if (empty($_SESSION['ReloadIterationHeberRaum1'])) {
    $_SESSION['ReloadIterationHeberRaum1'] = 0;
}
header('Content-Type: text/html; charset=utf-8');

/*


 */
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="CSS/w3.css">
<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/heber_raum.css">


<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    $("#showTime").load("JQuery/getTime1.php");
    var refreshId = setInterval(function() {
       $("#showTime").load("JQuery/getTime1.php?" + 1*new Date());
    }, 300);
 });

     $(document).ready(function() {
       $("#newlA").load("JQuery/new_load_HR.php");
       var refreshId = setInterval(function() {
          $("#newlA").load('JQuery/new_load_HR.php?' + 1*new Date());
       }, 1000);
    });



</script>

</head>
<body>

<?php

ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$bridge=1;

$DbWk = dbBefehl("SELECT * FROM tmp_anzeige_wk_1");
$dWK = mysqli_fetch_assoc($DbWk);
$data_a_db['S_Db']=$dWK['Wk_Nummer'];


$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
$Wk_Art=$stammdaten['Wk_Art'];

$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

$Grp = $dNow['Gruppe'];
$Art = $dNow['Art'];

//F�r Reload �ber Iteration => Bei jedem laden nimm speichere zu dem zeitpunkt aktuellste Iteration, damit verglichen werden kann mit aktueller
$DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['ReloadIterationHeberRaum1']=$ReloadIteration['Bridge1'];

//Pr�fe Ob $Art nicht Leer (Falsche DB Abfrage)-----------------------
$timeout=0;
$t1=time();
while ($Art!="Reissen" && $Art!="Stossen" && $timeout<5) {
	$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");
	$dNow = mysqli_fetch_assoc($NowT);

	$Grp = $dNow['Gruppe'];
	$Art = $dNow['Art'];

	$t2=time(true);
	$timeout=$t2-$t1;
	if($timeout>=5){
		echo "Verbingdunsprobleme: Error 42";
		exit;
	}
}
//--------------------------------------------------------------------

$_SESSION['HCA']=$dNow['IdHeber'];
$_SESSION['VCA']=$dNow['V'];
$_SESSION['HGwCA']=$dNow['HGw'];



//F�r die Seitenaufteilung
echo'<div class="w3-cell-row">';
if($Wk_Art=='BL'){
    echo'<div class=" w3-cell" style=" width:55%; ">'; //w3-container border:1px solid black;
}

if($_SESSION['HeberRaumSolo']==0){

    if($Wk_Art=='BL'){  //1.Grp1 Reissen dann Grp2 Reissen Dann Grp

        for($schleife=0;$schleife<2;$schleife++){
            if($schleife==0)    $Art="Reissen";
            else                $Art="Stossen";

            for($Grp=1;$Grp<=$stammdaten['Verein_Anzahl'];$Grp++){
                include ("Outsorst/heber_raum_code.php");
            }
        }
    }//Ende if BL
    else{   //Nur aktuelle Grp Reissen dann Stossen
        for($schleife=0;$schleife<2;$schleife++){
            if($schleife==0)    $Art="Reissen";
            else                $Art="Stossen";

            include ("Outsorst/heber_raum_code.php");
        }
    }
}else{  //Wenn Solo Ansicht
    include ("Outsorst/heber_raum_code.php");
}


echo"</div>";

//Wird nur in heber_raum 1 ben�tigt da BL nur auf einer Bridge
if($stammdaten['Wk_Art']=='BL'){


    echo'<div class=" w3-cell" >'; //w3-container
    echo'<br>';


    include 'funktionen/nuetzliches.php';

    $DataVereinsAuswahl = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
    $VereinsAuswahl = mysqli_fetch_assoc($DataVereinsAuswahl);


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



                echo'<table class="w3-table w3-bordered w3-xlarge BLUebersicht2">';
                echo'<colgroup>';
                echo'<col width="55%">';
                echo'<col width="15%">';
                echo'<col width="15%">';
                echo'<col width="15%">';
                echo'</colgroup>';
                echo'<tr>';
                echo'<th>Verein</th>';

                echo'<th>R</th>';
                echo'<th>S</th>';
                echo'<th>Erg</th>';

               echo'</tr>';


                    $NameVerein1 = returnNameVerein($VereinsAuswahl['Verein1']);
                    $NameVerein2 = returnNameVerein($VereinsAuswahl['Verein2']);

                    if($stammdaten['Verein_Anzahl']=='3')
                        $NameVerein3 = returnNameVerein($VereinsAuswahl['Verein3']);

                        echo'<tr >';
                        echo'<td id="Verein">' . $NameVerein1 . '</th>';
                        echo'<td id="Verein">' . $VereinsAuswahl['R_Pt_V1'] . '</th>';
                        echo'<td id="Verein">' . $VereinsAuswahl['S_Pt_V1'] . '</th>';
                        echo'<td id="Verein">' . $VereinsAuswahl['RuS_Pt_V1'] . '</th>';
                        echo'</tr>';

                        echo'<tr>';
                        echo'<td id="Verein">' . $NameVerein2 . '</th>';
                        echo'<td id="Verein">' . $VereinsAuswahl['R_Pt_V2'] . '</th>';
                        echo'<td id="Verein">' . $VereinsAuswahl['S_Pt_V2'] . '</th>';
                        echo'<td id="Verein">' . $VereinsAuswahl['RuS_Pt_V2'] . '</th>';
                        echo'</tr>';

                        if($stammdaten['Verein_Anzahl']==3){
                            echo'<tr>';
                            echo'<th id="Verein">' . $NameVerein3 . '</th>';
                            echo'<th id="Verein">' . $VereinsAuswahl['R_Pt_V3'] . '</th>';
                            echo'<th id="Verein">' . $VereinsAuswahl['S_Pt_V3'] . '</th>';
                            echo'<th id="Verein">' . $VereinsAuswahl['RuS_Pt_V3'] . '</th>';
                            echo'</tr>';
                        }

                        echo'</table>';

         echo"</div>";
}

echo"</div>";

?>


</body>
</html>
