<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/startgebuehren.css">




</head>



<body>



<form method="post" action="startgebuehren.php">

<p class="kopf"><b>Startgebuehren</b></p>

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>



<?php





ob_start ();
// error_reporting(2);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
error_reporting(1);


include 'funktionen/db_verbindung.php';

$db=dbVerbindung();

$data_a_db['S_Db']=$_SESSION['WeK'];

$datenbank = dbBefehl("SELECT * FROM startgebuehren_".$data_a_db['S_Db']);

$dsatz = mysqli_fetch_assoc($datenbank);

$Dstamm = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

$stammdaten = mysqli_fetch_assoc($Dstamm);
loginCheck($stammdaten);

$x=0;


// Run the tests
// runTests();
// $result = mysqli_query($db, "SELECT @@sql_mode as sql_mode");
// $row = mysqli_fetch_assoc($result);

// echo "Current SQL Mode: " . $row['sql_mode'];

echo"
<br>
<br>
<br>
";



echo "
<div id=\"divid1\" class=\"examplediv\">
<table cellpadding=\"0\" cellspacing=\"2\" >
<thead>

  <colgroup>
    <col width=\"300\">
    <col width=\"150\">
  </colgroup>


 <tr>
  <th>Einzelanmeldungen</th>
  <td><input type=\"text\" name=E_Erw size=\"1\" value=\"".$dsatz['E_Erw']."\">Euro</td>
 </tr>

</thead>
";


echo "
 <tr>

  <th>Mannschaftsmeldungen</th>
  <td><input type=\"text\" name=M_Erw size=\"1\" value=\"".$dsatz['M_Erw']."\">Euro</td>
 </tr>


";
echo"
<tr>

<th>Nachmeldung</th>
<td><input type=\"text\" name=\"Nach_Meldung_Euro\" size=\"1\" value=\"".$dsatz['Nach_Meldung_Euro']."\">Euro</td>

</tr>";

echo "</tbody>";
echo "</table>";




if(isset($_POST['speichern']))                                                                                          //Speichern
         {

         $x=1;

         dbBefehl("UPDATE startgebuehren_".$data_a_db['S_Db']."
                     SET E_Erw= '" . $_POST['E_Erw'] . "',
                     M_Erw= '" . $_POST['M_Erw'] . "',
					 Nach_Meldung_Euro= '" . $_POST['Nach_Meldung_Euro'] . "'
                     ");



                     
         }

// if($x==1)
// {
// echo"
//  <script>
//  setTimeout(function(){
//      location = 'startgebuehren.php'
//    },0)
//  </script>
// ";
// }



?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>




<input id="always-safe" type="submit" name="speichern" value="Speichern">


<br>
<br>






</body>
</html>
