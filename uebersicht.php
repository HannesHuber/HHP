<?php
session_start();
if (empty($_SESSION['HeberCheck'])) {
    $_SESSION['HeberCheck'] = -1;
}
if (empty($_SESSION['VCheck'])) {
    $_SESSION['VCheck'] = -1;
}
if (empty($_SESSION['HGwCheck'])) {
    $_SESSION['HGwCheck'] = -1;
}
if (empty($_SESSION['Uebericht_Gruppe_Safe_1'])) {
	$_SESSION['Uebericht_Gruppe_Safe_1'] = 1;
}

if (empty($_SESSION['EinzelGruppenUebersicht'])) {
    $_SESSION['EinzelGruppenUebersicht'] = 0;
}

if (empty($_SESSION['ReloadIterationUebersicht1'])) {
    $_SESSION['ReloadIterationUebersicht1'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">

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
	 $("#showTime").load("JQuery/getTime.php");
	 var refreshId = setInterval(function() {
	 $("#showTime").load("JQuery/getTime.php?" + 1*new Date());
	 }, 300);
	 });


     $(document).ready(function() {
       $("#new_load").load("JQuery/new_load.php");
       var refreshId = setInterval(function() {
          $("#new_load").load('JQuery/new_load.php?' + 1*new Date());
       }, 1000);
    });
</script>

<script  src="colResizable-1.6.js"></script>
 <script type="text/javascript">
	$(function(){

        var innerHTML = $("#updatePanel").html();

        var onTablesCreated = function(){
            $("#normal").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                resizeMode:'fit',
                postbackSafe:true,
                partialRefresh:true});

            $("#flex").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                resizeMode:'flex',
                postbackSafe:true,
                partialRefresh:true});

            $("#BlTabelle").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                resizeMode:'flex',
                postbackSafe:true,
                partialRefresh:true});


            $("#overflow").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                resizeMode:'overflow',
                postbackSafe:true,
                partialRefresh:true});
        }

		var fakePostback = function(){
			$("#updatePanel").html('<img src="img/loading.gif"/>');
			setTimeout(function(){
				$("#updatePanel").html(innerHTML);
				onPostbackOver();
				}, 700);
		};

		var onPostbackOver = function(){
			onTablesCreated();
		};


		$("#postback").click(fakePostback);
        onPostbackOver();

    });
  </script>

</head>



<body onLoad="setTimeout('stoppuhr()',0)">

<form method="post" action="uebersicht.php">

<?php


$bridge=1;

$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");
$dNow = mysqli_fetch_assoc($NowT);         //Für Cookie freien aufruf der Übersicht

$AfterNext = dbBefehl("SELECT * FROM tmp_uebernaechster_heber_$bridge");
$dAfterNext= mysqli_fetch_assoc($AfterNext);

$Grp = $dNow['Gruppe'];
$Art = $dNow['Art'];

$_SESSION['HeberCheck']=$dNow['IdHeber'];
$_SESSION['VCheck']=$dNow['V'];
$_SESSION['HGwCheck']=$dNow['HGw'];

//Für Reload über Iteration => Bei jedem laden nimm speichere zu dem zeitpunkt aktuellste Iteration, damit verglichen werden kann mit aktueller
$DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
$ReloadIteration = mysqli_fetch_assoc($DataReload);

$_SESSION['ReloadIterationUebersicht1']=$ReloadIteration['Bridge1'];


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

// $end_time = microtime(true);
// $execution_time = ($end_time - $start_time);
// echo "Page took " . $execution_time . " seconds to execute.";

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
