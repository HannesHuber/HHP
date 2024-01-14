<?php
session_start();
if (empty($_SESSION['krIdH'])) {
    $_SESSION['krIdH'] = -1;
}
if (empty($_SESSION['krV'])) {
    $_SESSION['krV'] = -1;
}
if (empty($_SESSION['krHGw'])) {
    $_SESSION['krHGw'] = -1;
}
if (empty($_SESSION['krArt'])) {
    $_SESSION['krArt'] = '';
}
if (empty($_SESSION['KrAnzahl'])) {
    $_SESSION['KrAnzahl'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<meta name="author" content="hanne">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() {
       $("#g1").load("JQuery/kr_auslesen_g1.php");
       var refreshId = setInterval(function() {
          $("#g1").load('JQuery/kr_auslesen_g1.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#t1").load("JQuery/kr_auslesen_t1.php");
       var refreshId = setInterval(function() {
          $("#t1").load('JQuery/kr_auslesen_t1.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g2").load("JQuery/kr_auslesen_g2.php");
       var refreshId = setInterval(function() {
          $("#g2").load('JQuery/kr_auslesen_g2.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#t2").load("JQuery/kr_auslesen_t2.php");
       var refreshId = setInterval(function() {
          $("#t2").load('JQuery/kr_auslesen_t2.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#g3").load("JQuery/kr_auslesen_g3.php");
       var refreshId = setInterval(function() {
          $("#g3").load('JQuery/kr_auslesen_g3.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#t3").load("JQuery/kr_auslesen_t3.php");
       var refreshId = setInterval(function() {
          $("#t3").load('JQuery/kr_auslesen_t3.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#KR_reload").load("JQuery/kr_reload.php");
       var refreshId = setInterval(function() {
          $("#KR_reload").load('JQuery/kr_reload.php?' + 1*new Date());
       }, 1000);
    });

     $(document).ready(function() {
       $("#tg").load("JQuery/kr_auslesen_tg.php");
       var refreshId = setInterval(function() {
          $("#tg").load('JQuery/kr_auslesen_tg.php?' + 1*new Date());
       }, 1000);
    });
</script>


</head>
<body>


<?php


ob_start ();
error_reporting(1);

$bridge=$_SESSION['KR_A_Bridge'];
$bridge=1;
$conn = mysql_connect("database_hhp","root","") or die(mysql_error());
mysql_select_db("test");

$data_a_db['S_Db']=$_SESSION['WeK'];

$NowT = mysql_query("SELECT * FROM tmp_reload_$bridge")
OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

$dNow = mysql_fetch_assoc($NowT);

$datenbank = mysql_query("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db'])
OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

$stammdaten = mysql_fetch_assoc($datenbank);

$_SESSION['KrAnzahl']=$stammdaten['Kampfrichter'];

$Grp = $dNow['Gruppe'];
$Art = $dNow['Art'];

$_SESSION['krIdH']=$dNow['IdHeber'];
$_SESSION['krV']=$dNow['V'];
$_SESSION['krHGw']=$dNow['HGw'];
$_SESSION['krArt']=$Art;

if($Art=="Reissen"){
$Kurz="R";

}else{
$Kurz="S";
}

         $heber = mysql_query("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db']."
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = '$dNow[IdHeber]'
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = '$dNow[IdHeber]'
                               AND heber.IdHeber = '$dNow[IdHeber]'
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               AND heber_wk_".$data_a_db['S_Db'].".Versuch = '$dNow[V]'
                               ")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

$dsatz = mysql_fetch_assoc($heber);

echo'<table class="tabelle" >';
 echo'<tr>';
  echo'<td colspan="6" id="Name">
       <div id="tab">' . $dsatz['Name'] . ' ' . $dsatz['Vorname'] . '</div>
  </td>';
 echo'</tr>';
 echo'<tr>';
  echo'<td colspan="6" id="Verein">' . $dsatz['Verein'] . '</td>';
 echo'</tr>';
 echo'<tr>';
  echo'<td colspan="4" id="V">' . $dNow['V'] . '.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
  echo'<td colspan="2" id="V">' . $dsatz[$Art] . 'Kg</td>';
 echo'</tr>';
 echo'<tr>';
  echo'<td colspan="6" id="KGw">KGw: ' . $dsatz['Gewicht'] . '</td>';
 echo'</tr>';
 echo'<tr>';
 if($_SESSION['KrAnzahl']==1) echo'<td colspan="3" id="gueltig"><div id="g1"></div></td>';
 else{
    echo'<td id="gueltig"><div id="g1"></div></td>';
    echo'<td id="gueltig"><div id="g2"></div></td>';
    echo'<td id="gueltig"><div id="g3"></div></td>';
  }
  echo'<td colspan="2" id="twert"><div id="tg"></div></td>';
  echo'<td id="zeit">Zeit</td>';
 echo'</tr>';
 echo'<tr>';

 echo'</tr>';
echo'</table>';


echo'<div id="KR_reload"></div>';


                    //Die DVs zum zeigen von Gueltig/Ungueltig
/*  echo'<td><div id="g1"></div></td>';
  echo'<td><div id="t1"></div></td>';
  echo'<td><div id="g2"></div></td>';
  echo'<td><div id="t2"></div></td>';
  echo'<td><div id="g3"></div></td>';
  echo'<td><div id="t3"></div></td>';
*/

?>

</body>
</html>
