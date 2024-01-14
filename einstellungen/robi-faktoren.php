<?php
session_start();
if (empty($_SESSION['al_kl_setup_error'])) {
    $_SESSION['al_kl_setup_error'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>

<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">

<script type='text/javascript' src="check_funktion.js"></script>

<link rel="stylesheet" type="text/css" href="../../CSS/alg.css">
<link rel="stylesheet" type="text/css" href="../../CSS/table.css">


</head>
<body>

<form method="post" action="robi-faktoren.php">

<p class="kopf"><b>Robi-Faktoren</b></p>
<p>Hinweis:</p>
<p>Die Robi-Faktoren werden sind abhängig von den Weltrekorden in den jeweiligen Klassen.</p>
<p>Für genauere Information besuchen Sie die Seite www.iwf.net</p>
<br>
<p>Änderungen in dieser Tabelle sind Wettkampf übergreifend</p>
<p>Die 1 in GwKl steht für die oben offene Gewichtsklasse in der jeweiligen Kategorie</p>

<a href="alg_einstellungen.php" title="Link zu den Einstellungen" id="range-logo">Einstellungen</a>



<?php

ob_start ();
error_reporting(1);

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();


$data_B = dbBefehl("SELECT * FROM robi_faktor_b");
$dsatz = mysqli_fetch_assoc($data_B);

$Faktor_B=$dsatz['B'];

echo '<p> Faktor B = <input type="text" name="Faktor_B" value="' . $Faktor_B . '"> </p>';



if(isset($_POST['speichern']))                                                                                          //Speichern
{
    dbBefehl("UPDATE robi_faktor_b
				Set B='" . $_POST['Faktor_B'] . "'
                WHERE Id='1'
			");
}

echo'<br><br>';

echo '<table>';



echo '<tr>';
echo '<td>';


echo ' <h2>Männer-Qualiefikation:</h2>
<table class="tabelle" border="1">
  <colgroup>
    <col>
    <col>
  </colgroup>

<thead>
 <tr>
  <th>Gewichts-Klasse</th>
  <th>Standart</th>
 </tr>
</thead>
';


$i=0;
$data_men_aktive = dbBefehl("SELECT * FROM robi_faktoren_men_standart");

while($dsatz = mysqli_fetch_assoc($data_men_aktive))
{
	$i = $i+1;

	$GwKl="GwKl-standart" . $i;
	$WR="WR-standart" . $i;

	echo '<tr>';
	echo '<td><input type="text" name="'.$GwKl.'" value="' . $dsatz['GwKl'] . '"></td>';
	echo '<td><input type="text" name="'.$WR.'" value="' . $dsatz['WeltRekord'] . '"></td>';


	if(isset($_POST['speichern']))                                                                                          //Speichern
	{
		$x=1;

		dbBefehl("UPDATE robi_faktoren_men_standart
				Set GwKl='" . $_POST[$GwKl] . "',
				 WeltRekord='" . $_POST[$WR] . "'

                WHERE Id='".$i."'
			");


	}
}
echo '</table>';

echo '</td>';
echo '<td>';


echo ' <h2>Frauen-Qualiefikation:</h2>
<table class="tabelle" border="1">
  <colgroup>
    <col>
    <col>
  </colgroup>

<thead>
 <tr>
  <th>Gewichts-Klasse</th>
  <th>Standart</th>
 </tr>
</thead>
';


$i=0;
$data_women_aktive = dbBefehl("SELECT * FROM robi_faktoren_women_standart");

while($dsatz2 = mysqli_fetch_assoc($data_women_aktive))
{
	$i = $i+1;

	$GwKl2="GwKl2-standart" . $i;
	$WR2="WR2-standart" . $i;

	echo '<tr>';
	echo '<td><input type="text" name="'.$GwKl2.'" value="' . $dsatz2['GwKl'] . '"></td>';
	echo '<td><input type="text" name="'.$WR2.'" value="' . $dsatz2['WeltRekord'] . '"></td>';
	echo '</tr>';


	if(isset($_POST['speichern']))                                                                                          //Speichern
	{
		$x=1;

		dbBefehl("UPDATE robi_faktoren_women_standart
				Set GwKl='" . $_POST[$GwKl2] . "',
				 WeltRekord='" . $_POST[$WR2] . "'
                WHERE Id='".$i."'
			");


	}
}
echo '</table>';

echo '</td>';
echo '</tr>';



echo '<tr>';
echo '<td>';
echo'<br><br>';

echo ' <h2>Männer-Aktive:</h2>
<table class="tabelle" border="1">
  <colgroup>
    <col>
    <col>
  </colgroup>

<thead>
 <tr>
  <th>Gewichts-Klasse</th>
  <th>Weltrekord</th>
 </tr>
</thead>
';


$i=0;
$data_men_aktive = dbBefehl("SELECT * FROM robi_faktoren_men_aktive");

while($dsatz = mysqli_fetch_assoc($data_men_aktive))
{
    $i = $i+1;

    $GwKl="GwKl" . $i;
    $WR="WR" . $i;

    echo '<tr>';
        echo '<td><input type="text" name="'.$GwKl.'" value="' . $dsatz['GwKl'] . '"></td>';
        echo '<td><input type="text" name="'.$WR.'" value="' . $dsatz['WeltRekord'] . '"></td>';


    if(isset($_POST['speichern']))                                                                                          //Speichern
    {
        $x=1;

        dbBefehl("UPDATE robi_faktoren_men_aktive
				Set GwKl='" . $_POST[$GwKl] . "',
				 WeltRekord='" . $_POST[$WR] . "'

                WHERE Id='".$i."'
			");


    }
}
echo '</table>';

echo '</td>';
echo '<td>';

echo'<br><br>';

echo ' <h2>Frauen-Aktive:</h2>
<table class="tabelle" border="1">
  <colgroup>
    <col>
    <col>
  </colgroup>

<thead>
 <tr>
  <th>Gewichts-Klasse</th>
  <th>Weltrekord</th>
 </tr>
</thead>
';


$i=0;
$data_women_aktive = dbBefehl("SELECT * FROM robi_faktoren_women_aktive");

while($dsatz2 = mysqli_fetch_assoc($data_women_aktive))
{
    $i = $i+1;

    $GwKl2="GwKl2" . $i;
    $WR2="WR2" . $i;

    echo '<tr>';
    echo '<td><input type="text" name="'.$GwKl2.'" value="' . $dsatz2['GwKl'] . '"></td>';
    echo '<td><input type="text" name="'.$WR2.'" value="' . $dsatz2['WeltRekord'] . '"></td>';
    echo '</tr>';


    if(isset($_POST['speichern']))                                                                                          //Speichern
    {
        $x=1;

        dbBefehl("UPDATE robi_faktoren_women_aktive
				Set GwKl='" . $_POST[$GwKl2] . "',
				 WeltRekord='" . $_POST[$WR2] . "'
                WHERE Id='".$i."'
			");


    }
}
echo '</table>';

echo '</td>';
echo '</tr>';


echo '<tr>';
echo '<td>';

echo '<br><br>';

echo ' <h2>Männer-Junioren:</h2>
<table class="tabelle" border="1">
  <colgroup>
    <col>
    <col>
  </colgroup>

<thead>
 <tr>
  <th>Gewichts-Klasse</th>
  <th>Weltrekord</th>
 </tr>
</thead>
';


$i=0;
$data_men_aktive = dbBefehl("SELECT * FROM robi_faktoren_men_junioren");

while($dsatz = mysqli_fetch_assoc($data_men_aktive))
{
    $i = $i+1;

    $GwKl3="GwKl3" . $i;
    $WR3="WR3" . $i;

    echo '<tr>';
    echo '<td><input type="text" name="'.$GwKl3.'" value="' . $dsatz['GwKl'] . '"></td>';
    echo '<td><input type="text" name="'.$WR3.'" value="' . $dsatz['WeltRekord'] . '"></td>';


    if(isset($_POST['speichern']))                                                                                          //Speichern
    {
        $x=1;

        dbBefehl("UPDATE robi_faktoren_men_junioren
				Set GwKl='" . $_POST[$GwKl3] . "',
				 WeltRekord='" . $_POST[$WR3] . "'

                WHERE Id='".$i."'
			");


    }
}
echo '</table>';

echo '</td>';
echo '<td>';

echo '<br><br>';

echo ' <h2>Frauen-Junioren:</h2>
<table class="tabelle" border="1">
  <colgroup>
    <col>
    <col>
  </colgroup>

<thead>
 <tr>
  <th>Gewichts-Klasse</th>
  <th>Weltrekord</th>
 </tr>
</thead>
';


$i=0;
$data_women_aktive = dbBefehl("SELECT * FROM robi_faktoren_women_junioren");

while($dsatz2 = mysqli_fetch_assoc($data_women_aktive))
{
    $i = $i+1;

    $GwKl4="GwKl4" . $i;
    $WR4="WR4" . $i;

    echo '<tr>';
    echo '<td><input type="text" name="'.$GwKl4.'" value="' . $dsatz2['GwKl'] . '"></td>';
    echo '<td><input type="text" name="'.$WR4.'" value="' . $dsatz2['WeltRekord'] . '"></td>';
    echo '</tr>';


    if(isset($_POST['speichern']))                                                                                          //Speichern
    {
        $x=1;

        dbBefehl("UPDATE robi_faktoren_women_junioren
				Set GwKl='" . $_POST[$GwKl4] . "',
				 WeltRekord='" . $_POST[$WR4] . "'
                WHERE Id='".$i."'
			");


    }
}
echo '</table>';

echo '</td>';
echo '</tr>';



echo '<tr>';
echo '<td>';

echo '<br><br>';

echo ' <h2>Männer-Jugend:</h2>
<table class="tabelle" border="1">
  <colgroup>
    <col>
    <col>
  </colgroup>

<thead>
 <tr>
  <th>Gewichts-Klasse</th>
  <th>Weltrekord</th>
 </tr>
</thead>
';


$i=0;
$data_men_aktive = dbBefehl("SELECT * FROM robi_faktoren_men_schueler");

while($dsatz = mysqli_fetch_assoc($data_men_aktive))
{
    $i = $i+1;

    $GwKl5="GwKl5" . $i;
    $WR5="WR5" . $i;

    echo '<tr>';
    echo '<td><input type="text" name="'.$GwKl5.'" value="' . $dsatz['GwKl'] . '"></td>';
    echo '<td><input type="text" name="'.$WR5.'" value="' . $dsatz['WeltRekord'] . '"></td>';


    if(isset($_POST['speichern']))                                                                                          //Speichern
    {
        $x=1;

        dbBefehl("UPDATE robi_faktoren_men_schueler
				Set GwKl='" . $_POST[$GwKl5] . "',
				 WeltRekord='" . $_POST[$WR5] . "'

                WHERE Id='".$i."'
			");


    }
}
echo '</table>';

echo '</td>';
echo '<td>';

echo '<br><br>';

echo ' <h2>Frauen-Jugend:</h2>
<table class="tabelle" border="1">
  <colgroup>
    <col>
    <col>
  </colgroup>

<thead>
 <tr>
  <th>Gewichts-Klasse</th>
  <th>Weltrekord</th>
 </tr>
</thead>
';


$i=0;
$data_women_aktive = dbBefehl("SELECT * FROM robi_faktoren_women_schueler");

while($dsatz2 = mysqli_fetch_assoc($data_women_aktive))
{
    $i = $i+1;

    $GwKl6="GwKl6" . $i;
    $WR6="WR6" . $i;

    echo '<tr>';
    echo '<td><input type="text" name="'.$GwKl6.'" value="' . $dsatz2['GwKl'] . '"></td>';
    echo '<td><input type="text" name="'.$WR6.'" value="' . $dsatz2['WeltRekord'] . '"></td>';
    echo '</tr>';


    if(isset($_POST['speichern']))                                                                                          //Speichern
    {
        $x=1;

        dbBefehl("UPDATE robi_faktoren_women_schueler
				Set GwKl='" . $_POST[$GwKl6] . "',
				 WeltRekord='" . $_POST[$WR6] . "'
                WHERE Id='".$i."'
			");


    }
}
echo '</table>';

echo '</td>';
echo '</tr>';



echo '</table>';

?>

</table>


<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">

<?php

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'robi-faktoren.php'
   },0)
 </script>
";
}

?>
</form>
</body>
</html>
