<?php
session_start();
if (empty($_SESSION['HCA2'])) {
    $_SESSION['HCA2'] = -1;
}
if (empty($_SESSION['VCA2'])) {
    $_SESSION['VCA2'] = -1;
}
if (empty($_SESSION['HGwCA2'])) {
    $_SESSION['HGwCA2'] = -1;
}

if (empty($_SESSION['ReloadIterationHeberRaum2'])) {
    $_SESSION['ReloadIterationHeberRaum2'] = 0;
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

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/heber_raum.css">


<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    $("#showTime").load("JQuery/getTime2.php");
    var refreshId = setInterval(function() {
       $("#showTime").load("JQuery/getTime2.php?" + 1*new Date());
    }, 300);
 });

     $(document).ready(function() {
       $("#newlA").load("JQuery/new_load_HR2.php");
       var refreshId = setInterval(function() {
          $("#newlA").load('JQuery/new_load_HR2.php?' + 1*new Date());
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

$bridge=2;

$DbWk = dbBefehl("SELECT * FROM tmp_anzeige_wk_1");
$dWK = mysqli_fetch_assoc($DbWk);
$data_a_db['S_Db']=$dWK['Wk_Nummer'];

$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");

$dNow = mysqli_fetch_assoc($NowT);

$Grp = $dNow['Gruppe'];
$Art = $dNow['Art'];

$_SESSION['HCA2']=$dNow['IdHeber'];
$_SESSION['VCA2']=$dNow['V'];
$_SESSION['HGwCA2']=$dNow['HGw'];

//F�r Reload �ber Iteration => Bei jedem laden nimm speichere zu dem zeitpunkt aktuellste Iteration, damit verglichen werden kann mit aktueller
$DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['ReloadIterationHeberRaum2']=$ReloadIteration['Bridge2'];


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

?>


</body>
</html>
