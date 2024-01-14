<?php
session_start();
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

<form method="post" action="gruppeneinteilung_auswahl.php">



<table>
  <colgroup>
    <col width="800">
    <col>
  </colgroup>
<thead>
<tr>
    <td colspan="2" align="center" >

<div id="box1"> <img src="Bilder/BVDG-Neu.jpg" alt="BVDG Gewichtheben" width="250px" > </div>



</tr>





<tr>
  <td>

   <font size="+1" > <p class="kopf"><b>Gruppeneinteilung-Auswahl</b></p> </font>

       <br>
       <br>


         <table class="tabelle" width="300" border="0" cellpadding="9" cellspacing="4">
         <tbody>



<?php


ob_start ();
error_reporting(0);


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dsatz = mysqli_fetch_assoc($datenbank);

$DataUserBlocker = dbBefehl("SELECT * FROM user_blocker_".$data_a_db['S_Db']);
$UserBlocker = mysqli_fetch_assoc($DataUserBlocker);

if($dsatz['Grp_Einteilung'] == '0'){
	echo '<tr>';
		echo "<td onClick=\"location.href='gruppeneinteilung.php';\">Gruppeneinteilung nach GwKl</td>";
	echo '</tr>';
}else{
	echo '<tr>';
		echo "<td onClick=\"location.href='gruppeneinteilung_pro_Heber.php';\">Gruppeneinteilung pro Heber</td>";
	echo '</tr>';
}



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
