<?php
session_start();
$Wk_Nummer=$_SESSION['WeK'];

if (empty($_SESSION['LetzteSeite'])) {
	$_SESSION['LetzteSeite'] = 1;
}
$_SESSION['LetzteSeite'] = 1;

if (empty($_SESSION['Seite_Ml_A'])) {
	$_SESSION['Seite_Ml_A'] = 1;
}
if (empty($_SESSION['Filter_orginal'])) {
	$_SESSION['Filter_orginal'] = "";
}
if (empty($_SESSION['Filter_gruppe'])) {
	$_SESSION['Filter_gruppe'] = "";
}
if (empty($_SESSION['Filter_isset'])) {
	$_SESSION['Filter_isset'] = 0;
}
if (empty($_SESSION['Auswahl_Land'])) {
	$_SESSION['Auswahl_Land'] = "";
}
if (empty($_SESSION['IdReMk'])) {
	$_SESSION['IdReMk'] = -1;
}

$_SESSION['Seite_Ml_A'] = 1;
$_SESSION['Filter_orginal'] = "";
$_SESSION['Filter_gruppe'] = "";
$_SESSION['Filter_isset'] = 0;
$_SESSION['Auswahl_Land'] = "";

header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">
<link rel="stylesheet" type="text/css" href="CSS/hauptmenue.css">

</head>



<body>


<a href="index.php" title="Link zur Startseite" id="range-logo">Startseite</a>

<form method="post" action="wettkampf.php">



<table>
  <colgroup>
    <col width="200">
    <col>
  </colgroup>
<thead>
<tr>
    <td colspan="2" align="center" >




</tr>





<tr>
  <td>

   <font size="+1" > <p class="kopf"><b>Wettkampf</b></p> </font>

       <br>
       <br>


         <table class="tabelle" width="300" border="0" cellpadding="9" cellspacing="4">
         <tbody>



<?php


ob_start ();
error_reporting(1);


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dsatz = mysqli_fetch_assoc($datenbank);

$DataUserBlocker = dbBefehl("SELECT * FROM user_blocker_".$data_a_db['S_Db']);
$UserBlocker = mysqli_fetch_assoc($DataUserBlocker);

	echo '<tr>';
		echo "<td onClick=\"location.href='wiegelisten_gruppe_druck_wk.php';\">Wiegelisten Druck</td>";
	echo '</tr>';

      echo '<tr>';
         if($UserBlocker['Wiegeliste']==0)
            echo "<td class=\"Hinweis\" onClick=\"location.href='wiegelisten.php';\">Wiegelisten einpflegen</td>";
         else
            echo "<td onClick=\"location.href='wiegelisten.php';\">Wiegelisten einpflegen</td>";

      echo '</tr>';


      if($dsatz['Wk_Art']!= 'BL' && $dsatz['Grp_Einteilung'] == '0'){
      	echo '<tr>';
      		if($UserBlocker['GrpEinteilung']==0)
      			echo"<td class=\"Hinweis\" onClick=\"location.href='gruppeneinteilung.php';\">Gruppeneinteilung</td>";
      		else
      			echo"<td onClick=\"location.href='gruppeneinteilung.php';\">Gruppeneinteilung</td>";

      	echo '</tr>';
      }


      if($dsatz['Wk_Art'] == "ZK"){

      echo '<tr>';
      	if($UserBlocker['Wiegeliste']==0 || ($UserBlocker['GrpEinteilung']==0 && $dsatz['Grp_Einteilung'] == '0'))
      		echo "<td class=\"Blocked\">Wettkampf Protokoll</td>";
      	else
      		echo "<td onClick=\"location.href='wk_protokoll_grp.php';\">Wettkampf Protokoll Druck</td>";
      echo '</tr>';

      echo '<tr>';
      	if($UserBlocker['Wiegeliste']==0 || ($UserBlocker['GrpEinteilung']==0 && $dsatz['Grp_Einteilung'] == '0'))
            echo "<td class=\"Blocked\">Wettkampf</td>";
         else
            echo "<td onClick=\"location.href='wettkampf_anzeige.php';\">Wettkampf</td>";


      echo '</tr>';

      }else{
      	echo '<tr>';
      	if($UserBlocker['Wiegeliste']==0 || ($UserBlocker['GrpEinteilung']==0 && $dsatz['Grp_Einteilung'] == '0'))
      		echo "<td class=\"Blocked\">Wettkampf Protokoll</td>";
      	else
      		echo "<td onClick=\"location.href='wk_protokoll_grp.php';\">Wettkampf Protokoll Druck</td>";
      	echo '</tr>';



      	echo '<tr>';

      	if($UserBlocker['Wiegeliste']==0 || ($UserBlocker['GrpEinteilung']==0 && $dsatz['Grp_Einteilung'] == '0'))
      		echo "<td class=\"Blocked\">Wettkampf</td>";
      	else
      		echo "<td onClick=\"location.href='wettkampf_anzeige.php';\">Wettkampf</td>";


      	echo '</tr>';
      }

if($dsatz['Wk_Art'] != "ZK" && $dsatz['Wk_Art'] !="BL")
{

         echo "<tr>
                 <td onClick=\"location.href='merhkampfergebnisse_gruppe.php';\">Mehrkampfergebnisse</td>
              </tr> ";

         echo "<tr>
                 <td onClick=\"location.href='athletik_grp.php';\">Athletik eintragen</td>
              </tr> ";

}



      echo '<tr>';
      if($dsatz['Wk_Art'] == "ZK"){
      	if($UserBlocker['Wiegeliste']==0 || ($UserBlocker['GrpEinteilung']==0 && $dsatz['Grp_Einteilung'] == '0'))
      		echo "<td class=\"Blocked\">Wettkampf Korrektur</td>";
      	else
      		echo "<td onClick=\"location.href='wettkampf_korrektur_grp.php';\">Wettkampf Korrektur</td>";
      }else{
      	if(($UserBlocker['Wiegeliste']==0 || $UserBlocker['GrpEinteilung']==0) && $dsatz['Wk_Art'] != "BL")
      		echo "<td class=\"Blocked\">Wettkampf Korrektur</td>";
      	else
      		echo "<td onClick=\"location.href='wettkampf_korrektur_grp.php';\">Wettkampf Korrektur</td>";
      }

      echo '</tr>';


      echo '<tr>';
      if($dsatz['Wk_Art'] == "ZK"){
          if($UserBlocker['Wiegeliste']==0 || ($UserBlocker['GrpEinteilung']==0 && $dsatz['Grp_Einteilung'] == '0'))
              echo "<td class=\"Blocked\">Dezentrale Steigerung</td>";
          else
              echo "<td onClick=\"location.href='steigerung_grp.php';\">Dezentrale Steigerung</td>";
      }else{
          if(($UserBlocker['Wiegeliste']==0 || $UserBlocker['GrpEinteilung']==0) && $dsatz['Wk_Art'] != "BL")
              echo "<td class=\"Blocked\">Dezentrale Steigerung</td>";
          else
              echo "<td onClick=\"location.href='steigerung_grp.php';\">Dezentrale Steigerung</td>";
      }

      echo '</tr>';
      ?>



          </tbody>
         </table>




  </td>

 </tr>
 </thead>
</table>

</form>

</body>
</html>
