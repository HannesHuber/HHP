<?php
session_start();
if (empty($_SESSION['Seite_Ml'])) {
	$_SESSION['Seite_Ml'] = 1;
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
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">


</head>



<body>



<form method="post" action="gruppeneinteilung_pro_heber.php">

<p class="kopf"><b>Gruppeneinteilung pro Heber</b></p>



<?php


ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/filter.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

if($_SESSION['LetzteSeite']==0) echo '<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>';
else							echo '<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>';

$Limit=$stammdaten['Anzahl_Heber_p_S'];                                                                                                                        //f�r den wettkampf ein h�ckchen haben!
$start=($Limit*$_SESSION['Seite_Ml'])-$Limit;


         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
							   AND heber.IdVerein = verein.IdVerein
                               ORDER BY heber.Name ASC
                               LIMIT $start, $Limit") ;

         $heberNum = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               ORDER BY heber.Name ASC
                               ");

$numHeber = mysqli_num_rows($heberNum);
$Seiten=ceil($numHeber/$Limit);

         $Verein = dbBefehl("SELECT * FROM verein ORDER BY verein ASC");

$x=0;

filter(1);

echo"<br><br><br><br>";

echo"<div id=\"divid1\" class=\"examplediv\">";

echo "

<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"250\">
    <col width=\"125\">
    <col width=\"125\">

  </colgroup>


<thead>

 <tr>
  <th>Name</th>
  <th>Verein</th>
  <th>Gruppe</th>

 </tr>
</thead>
";





$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{


$i = $i+1;


     $Id="Id" . $i;
     $Select_Gruppe="Select_Gruppe" . $i;


echo "<input type=\"text\" name=$Id size=\"0\" style=\" display: none; \" value=\"$dsatz[IdHeber]\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}





echo "<tr>";
     echo "<td>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Vorname']." </span>";
     echo "</td>";

     echo "<td>";                                                                                                // Spalte (Mit drop down bar)
          echo $dsatz['Verein'];
     echo "</td>";

     echo "<td>";

     	echo "<select name=\"$Select_Gruppe\" size=\"1\" class=\"Auswahl\">";

     		$id=$dsatz['IdHeber'];

     		$Gruppen = dbBefehl("SELECT Gruppen
     								FROM gruppen_zeit_".$data_a_db['S_Db']."
     							");

     		$Auswahl = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db']."
     								WHERE IdHeber='$id'
     					 		");

     		$dataAuswahl = mysqli_fetch_assoc($Auswahl);

     		while($dataGruppen = mysqli_fetch_assoc($Gruppen))
     		{
     			if($dataGruppen['Gruppen']==$dataAuswahl['Gruppe'])
     			{
     				echo "<option value=".$dataGruppen['Gruppen']." selected>".$dataGruppen['Gruppen']."</option>";
     				$finder=$dataGruppen['Gruppen'];
     			}
     			else
     				echo "<option value=".$dataGruppen['Gruppen'].">".$dataGruppen['Gruppen']."</option>";
     		}

     	echo "</select>";

     echo "</td>";

echo "</tr>";


         if(isset($_POST['speichern']))
         {
         	$x=1;

         	$id=$dsatz['IdHeber'];
         	$Auswahl = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db']."
         			WHERE IdHeber='$id'
         			");

         			$dataAuswahl = mysqli_fetch_assoc($Auswahl);

         			if($dataAuswahl['Gruppe']!=$_POST[$Select_Gruppe]){

         				dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
         						SET Gruppe= '" . $_POST[$Select_Gruppe] . "'
         						WHERE IdHeber='$id'");
         			}
         }




}
echo "</tbody>";
echo "</table>";


if($_SESSION['Seite_Ml_A']!=1)
	echo '<input class="But" type="submit" name="SeiteZur�ck" value="<">';

	for($SeitenZaeler=1; $SeitenZaeler<=$Seiten; $SeitenZaeler++){

		$N_Seite="Seite" . $SeitenZaeler;

		if($SeitenZaeler==$_SESSION['Seite_Ml'])
			echo "<input id=\"AktuelleSeite\" class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";
			else
				echo "<input class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";

				if(isset($_POST[$N_Seite])) { $_SESSION['Seite_Ml']=$SeitenZaeler; $x=1;}

	}
	echo '<input class="But" type="submit" name="SeiteVor" value=">">';

	if(isset($_POST['SeiteZurück'])){ $_SESSION['Seite_Ml']--; $x=1;}
	if(isset($_POST['SeiteVor'])){ $_SESSION['Seite_Ml']++; $x=1;}



//Anfang der Untertabelle!----------------------------------------------------------------------------------------------


$grp = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

echo "<table>";
echo"<tr>";

echo"<td colspan=\"4\">";



echo "
<table  class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"120\">
    <col width=\"65\">
    <col width=\"65\">
    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">

  </colgroup>


<thead>

 <tr>
  <th>Gruppen</th>
  <th>Anzahl</th>
  <th>Bridge</th>
  <th>Datum</th>
  <th>Wiege Zeit - Von</th>
  <th>Wiege Zeit - Bis</th>
  <th>Wettkampf Zeit</th>

 </tr>
</thead>
";

$c=0;


while($dataGrp = mysqli_fetch_assoc($grp))
{

	$c++;

	$gruppe="g" . $c;
	$Id_grp="Id_grp" . $c;
	$Zeit="Zeit" . $c;
	$Auswahl="Auswahl" . $c;
	$Wiege_Zeit="Wiege_Zeit" . $c;
	$Datum="Datum" . $c;
	$Wiege_Zeit_Bis="Wiege_Zeit_Bis" . $c;


	$Heber_in_Gruppe = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db']." WHERE Gruppe='$c' ");
	$numHeber = mysqli_num_rows($Heber_in_Gruppe);

	echo "<input type=\"text\" name=$Id_grp size=\"0\" style=\" visibility:hidden; \" value=\"".$dsatz['Id']."\"readonly>";

	echo"<tbody>";


	echo "<tr>";

	echo "<td>";
		echo "Gruppe ".$dataGrp['Gruppen'];
	echo "</td>";


	echo "<td>";
		echo $numHeber;
	echo "</td>";


	echo "<td>";                                                                                                // Spalte (Mit drop down bar)

	echo "<select name=\"$Auswahl\" size=\"1\" class=\"Auswahl\">";



	$Bridgen = dbBefehl("SELECT * FROM bridgen");

	while($dataAuswahl = mysqli_fetch_assoc($Bridgen))
	{

		if($dataAuswahl['Bridge']==$dataGrp['Bridge'])
		{

			echo "<option value=".$dataAuswahl['Bridge']." selected>".$dataAuswahl['Bridge']."</option>";

		}
		else{
			echo "<option value=".$dataAuswahl['Bridge'].">".$dataAuswahl['Bridge']."</option>";
		}


	}



	echo "</select>";

	echo "</td>";

	echo "<td>";

	echo "<input type=\"date\" name=$Datum size=\"8\" value=\"".$dataGrp['Datum']."\">";

	echo "</td>";


	echo "<td>";


	echo "<input type=\"text\" name=$Wiege_Zeit size=\"3\" value=\"".$dataGrp['Wiege_Zeit']."\">Uhr";


	echo "</td>";

	echo "<td>";


	echo "<input type=\"text\" name=$Wiege_Zeit_Bis size=\"3\" value=\"".$dataGrp['Wiege_Zeit_Bis']."\">Uhr";


	echo "</td>";

	echo "<td>";


	echo "<input type=\"text\" name=$Zeit size=\"3\" value=\"".$dataGrp['WK_Zeit']."\">Uhr";


	echo "</td>";



	echo "</tr>";




	if(isset($_POST['speichern']))
	{

		$x=1;

		dbBefehl("UPDATE user_blocker_".$data_a_db['S_Db']." SET GrpEinteilung = '1'");

		dbBefehl("UPDATE gruppen_zeit_".$data_a_db['S_Db']."
				SET WK_Zeit= '" . $_POST['Zeit' . $c] . "', Wiege_Zeit= '" . $_POST['Wiege_Zeit' . $c] . "',
                                 Bridge= '" . $_POST['Auswahl' . $c] . "', Datum= '" . $_POST['Datum' . $c] . "',
				Anzahl= '$Anzahl', Wiege_Zeit_Bis= '" . $_POST['Wiege_Zeit_Bis' . $c] . "'
				WHERE Gruppen='$c'");

	}


}



echo"</tbody> ";

echo "</table>";


echo"

<br>

Gruppen <input type=\"submit\" name=\"plus\" value=\"+\">

<input type=\"submit\" name=\"minus\" value=\"-\">
";







echo "</tr>";

echo "</table>";




if(isset($_POST['plus']))
{

	$x=1;


	$g_plus = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


	$num_g = mysqli_num_rows($g_plus);

	$neu=$num_g + 1;

	dbBefehl("INSERT INTO gruppen_zeit_".$data_a_db['S_Db']." (Gruppen, WK_Zeit, Wiege_Zeit, Bridge, Wiege_Zeit_Bis)
			Values ('$neu', '00:00', '00:00', '1', '00:00')");



}



if(isset($_POST['minus']))
{

	$x=1;


	$g_plus = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


	$num_g = mysqli_num_rows($g_plus);


	dbBefehl("DELETE FROM gruppen_zeit_".$data_a_db['S_Db']."
			WHERE Gruppen ='$num_g'");



}




if($x==1)
{
	echo"
 <script>
 setTimeout(function(){
     location = 'gruppeneinteilung_pro_heber.php'
   },0)
 </script>
";
}


?>
<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">

</form>
</body>
</html>
