<?php
session_start();
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



<form method="post" action="pokal.php">

<p class="kopf"><b>Pokal Heber Auswählen</b></p>

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>



<?php


ob_start ();
error_reporting(1);


include 'funktionen/db_verbindung.php';

$db=dbVerbindung();

$data_a_db['S_Db']=$_SESSION['WeK'];

         $Verein = dbBefehl("SELECT * FROM verein");

         $d_tmp['land']=$_SESSION['Pokal_Planung_Grp'];

         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber.IdVerein = verein.IdVerein
                               AND heber.Land = '".$d_tmp['land']."'
                               ORDER BY heber.Name ASC");


$x=0;


echo"<div id=\"divid1\" class=\"examplediv\">";


echo "

<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"50\">
    <col width=\"300\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"300\">

  </colgroup>


<thead>

 <tr>
  <th>Auswahl</th>
  <th>Name</th>
  <th>Verein</th>
  <th>Jahrgang</th>
  <th>Gewicht</th>
  <th>Klasse</th>
  <th>Land</th>
  <th>Geschlecht</th>

 </tr>
</thead>
";



$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{


$i = $i+1;


     $Id="Id" . $i;
     $Loeschen="Loeschen" . $i;
     $Ausserkonkurrenz="Ausserkonkurrenz" . $i;
     $Konkurrenz="Konkurrenz" . $i;
     $Mannschaft="Mannschaft" . $i;
     $Auswahl="Auswahl" . $i;


echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"".$dsatz['IdHeber']."\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator
  echo "<tbody class=\"ungerade\">";
} else {
  echo "<tbody class=\"gerade\">";
}

echo "<tr>";

 if($dsatz['Pokal']=="1")
     {
         echo "<td align=\"center\">";
                 echo "<input type=\"checkbox\" name=$Auswahl value=\"Auswahl\" checked>";
         echo "</td>";
     }else{
         echo "<td align=\"center\">";
                 echo "<input type=\"checkbox\" name=$Auswahl value=\"Auswahl\">";
         echo "</td>";
     }

     echo "<td>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];
     echo "</td>";

     echo "<td>";                                                                                                // Spalte (Mit drop down bar)
          echo $dsatz['Verein'];
     echo "</td>";


     echo "<td>";
          echo $dsatz['Jahrgang'];
     echo "</td>";

     echo "<td>";
          echo $dsatz['Gewicht'] . "&nbsp; Kg";
     echo "</td>";

     echo "<td>";

         $Alter=$time['year']-$dsatz['Jahrgang'];

         $Klasse = dbBefehl("SELECT * FROM alters_klassen
                                 ");

                       while($dataKlassen = mysqli_fetch_assoc($Klasse))
                       {
                                 if($dataKlassen['Von'] <= $Alter && $dataKlassen['Bis'] >= $Alter)
                                 {
                                         echo $dataKlassen['Klasse'];
                                 }
                        }

     echo "</td>";


     echo "<td>";
          echo $dsatz['Land'];
     echo "</td>";

     echo "<td>";
          echo $dsatz['Geschlecht'];
     echo "</td>";
echo "</tr>";


 if(isset($_POST['speichern']))
         {


             $x=1;



         if($_POST['Auswahl' . $i] == "Auswahl")
         {
                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Pokal = '1'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
         }

         if($_POST['Auswahl' . $i] == false)
         {
                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Pokal = '0'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

         }


       } //Speichern zu ende





}                //While zuende
echo "</tbody>";
echo "</table>";

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'pokal.php'
   },0)
 </script>
";
}





?>

<br>
<br>
<input type="submit" name="speichern" value="Speichern">







</body>
</html>
