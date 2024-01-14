<?php
session_start();
if (empty($_SESSION['HeberCheck2'])) {
    $_SESSION['HeberCheck2'] = -1;
}
if (empty($_SESSION['VCheck2'])) {
    $_SESSION['VCheck2'] = -1;
}
if (empty($_SESSION['HGwCheck2'])) {
    $_SESSION['HGwCheck2'] = -1;
}

if (empty($_SESSION['EinzelGruppenUebersicht'])) {
    $_SESSION['EinzelGruppenUebersicht'] = 0;
}


if (empty($_SESSION['ReloadIterationUebersicht2'])) {
    $_SESSION['ReloadIterationUebersicht2'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<?php
if($_SESSION['Alt_Ueb']==0) echo '<link rel="stylesheet" type="text/css" href="CSS/uebersicht.css?v=1.2">';
else                        echo '<link rel="stylesheet" type="text/css" href="CSS/alt_uebersicht.css">';


ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

$size=$stammdaten['Uebersicht_Font'];


echo'<style>
table.tabelle { font-size: '.$size.'vw;}
</style>';
?>

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() {
       $("#new_load").load("JQuery/new_load2.php");
       var refreshId = setInterval(function() {
          $("#new_load").load('JQuery/new_load2.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
    	    $("#showTime").load("JQuery/getTime2.php");
    	    var refreshId = setInterval(function() {
    	       $("#showTime").load("JQuery/getTime2.php?" + 1*new Date());
    	    }, 300);
    	 });
</script>

</head>



<body onLoad="setTimeout('stoppuhr()',0)">

<form method="post" action="uebersicht.php">
<?php


$bridge=2;

$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");
$dNow = mysqli_fetch_assoc($NowT);          //F�r Cookie freien aufruf der �bersicht

$AfterNext = dbBefehl("SELECT * FROM tmp_uebernaechster_heber_$bridge");
$dAfterNext= mysqli_fetch_assoc($AfterNext);

$Grp = $dNow['Gruppe'];
$Art = $dNow['Art'];

$_SESSION['HeberCheck2']=$dNow['IdHeber'];
$_SESSION['VCheck2']=$dNow['V'];
$_SESSION['HGwCheck2']=$dNow['HGw'];


//F�r Reload �ber Iteration => Bei jedem laden nimm speichere zu dem zeitpunkt aktuellste Iteration, damit verglichen werden kann mit aktueller
$DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['ReloadIterationUebersicht2']=$ReloadIteration['Bridge2'];

include ("Outsorst/uebersicht_code2.php");

if(isset($_POST['Font_Plus']))
{
	$x=1;
	$size=$size+0.1;
	dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
			SET Uebersicht_Font='" . $size. "'
                             ");
}

if(isset($_POST['Font_Minus']))
{
	$x=1;
	$size=$size-0.1;
	dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
			SET Uebersicht_Font='" . $size. "'
                             ");
}

if(isset($_POST['UebersichtNachVereinChange']))
{
	$x=1;
	if($stammdaten['UebersichtNachVerein'] == 1){
		dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
				SET UebersichtNachVerein='0'
				");
	}else{
		dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
				SET UebersichtNachVerein='1'
				");
	}
}

if($x==1)
{
	echo"
 <script>
 setTimeout(function(){
     location = 'uebersicht.php'
   },0)
 </script>
";
}

?>

<button type="submit" name="Font_Plus" class="Font_Size">+</button>
<button type="submit" name="Font_Minus" class="Font_Size">-</button>

<?php
if($stammdaten['Wk_Art'] == "BL"){
	if($stammdaten['UebersichtNachVerein'] == 1){
		echo'<button type="submit" name="UebersichtNachVereinChange" class="Font_Size">Nach Gruppe</button>';
	}else{
		echo'<button type="submit" name="UebersichtNachVereinChange" class="Font_Size">Nach Verein</button>';
	}
}
?>

</form>

</body>
</html>
