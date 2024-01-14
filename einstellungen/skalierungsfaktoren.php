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

<form method="post" action="skalierungsfaktoren.php">

<p class="kopf"><b>Skalierungsfaktoren</b></p>
<p>Hinweis:</p>
<p>Die Skalierungsfaktoren werden für die Berechnung der modifizierten Sinclairpunkte genutzt.</p>
<p>Die Berechnung findet wie folgt statt:</p>
<p>Ergebnis = Sinklairpunkte * Skalierungsfaktor * Skalierungsfaktor_alle(erste Zeile)</p>
<br>
<p>Änderungen in dieser Tabelle sind Wettkampf übergreifend</p>

<a href="alg_einstellungen.php" title="Link zu den Einstellungen" id="range-logo">Einstellungen</a>



<?php

ob_start ();
error_reporting(0);

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

echo'<br><br>';


echo ' <h2>Skalierungsfaktoren:</h2>
<table class="tabelle" border="1">
  <colgroup>
    <col>
    <col>
  </colgroup>

<thead>
 <tr>
  <th>Alter</th>
  <th>Männlich</th>
  <th>Weiblich</th>
 </tr>
</thead>
';


$i=0;
$data_scale = dbBefehl("SELECT * FROM skalierungsfaktoren");

while($dsatz = mysqli_fetch_assoc($data_scale))
{
	$i = $i+1;

  $Age="Age" . $i;
	$Man="Man" . $i;
	$Wom="Wom" . $i;

	echo '<tr>';
  if ($i == 1){
    echo '<td> alle </td>';
  }else{
	echo '<td>' . $dsatz['age'] . '</td>';
  }
	echo '<td><input type="text" name="'.$Man.'" value="' . $dsatz['maennlich'] . '"></td>';
	echo '<td><input type="text" name="'.$Wom.'" value="' . $dsatz['weiblich'] . '"></td>';


	if(isset($_POST['speichern']))                                                                                          //Speichern
	{
		$x=1;

		dbBefehl("UPDATE skalierungsfaktoren
				Set maennlich='" . $_POST[$Man] . "',
				    weiblich='" . $_POST[$Wom] . "'

                WHERE age='".$i."'
			");


	}
}
echo '</table>';


?>



<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">

<?php

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'skalierungsfaktoren.php'
   },0)
 </script>
";
}

?>
</form>
</body>
</html>
