<?php
session_start();

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">

<?php
if($_SESSION['Alt_Ueb_mk']==0) 	echo '<link rel="stylesheet" type="text/css" href="CSS/uebersicht.css?v=1.2">';
else                        	echo '<link rel="stylesheet" type="text/css" href="CSS/alt_uebersicht.css">';
?>

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() {
       $("#new_load").load("JQuery/new_load_uebersicht_mk.php");
       var refreshId = setInterval(function() {
          $("#new_load").load('JQuery/new_load_uebersicht_mk.php?' + 1*new Date());
       }, 1000);
    });
</script>

</head>



<body onLoad="setTimeout('stoppuhr()',0)">
<?php
ob_start ();
error_reporting(1);



include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$bridge=1;

$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");
$dNow = mysqli_fetch_assoc($NowT);         //F�r Cookie freien aufruf der �bersicht

$AfterNext = dbBefehl("SELECT * FROM tmp_uebernaechster_heber_$bridge");
$dAfterNext= mysqli_fetch_assoc($AfterNext);


$Grp = $_SESSION['Grp_Ueb_mk'];
$Art = $dNow['Art'];

$_SESSION['HeberCheck']=$dNow['IdHeber'];
$_SESSION['VCheck']=$dNow['V'];
$_SESSION['HGwCheck']=$dNow['HGw'];


include ("Outsorst/uebersicht_mk_code.php");
?>



</body>
</html>
