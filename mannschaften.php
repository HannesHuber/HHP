<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Mannschaften</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">


</head>



<body>



<form method="post" action="mannschaften.php">

<p class="kopf"><b>Mannschaften</b></p>

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>


<?php

                                                                                                  // Button f�r mannschaften anlegen muss grau sein bis
ob_start ();                                                                                      // Nach Verein gefiltert wurde!
error_reporting(1);


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$d_Stamm = mysqli_fetch_assoc($datenbank);
loginCheck($d_Stamm);

$Verein = dbBefehl("SELECT * FROM verein Order By Verein ASC");


while($dsatzV = mysqli_fetch_assoc($Verein))
{
$lamda = 0;


         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
							   AND heber.IdVerein = verein.IdVerein");


         while($d_V = mysqli_fetch_assoc($heber))
         {




                 if($dsatzV['IdVerein']==$d_V['IdVerein'])
                 {



                 $lamda = 1;


                          $mannschaften = dbBefehl("SELECT * FROM mannschaften_".$data_a_db['S_Db']);

                         while($check = mysqli_fetch_assoc($mannschaften))
                         {

                                 if($check['IdVerein']==$d_V['IdVerein'])
                                 {
                                 $lamda = 2;

                                 }


                         }


                 }

         }


   if($lamda == 1) dbBefehl("INSERT INTO mannschaften_".$data_a_db['S_Db']." (IdVerein) Values ('".$dsatzV['IdVerein']."')");

   if($lamda == 0) dbBefehl("DELETE FROM mannschaften_".$data_a_db['S_Db']." WHERE IdVerein ='".$dsatzV['IdVerein']."'");

}




$x=0;

echo "

<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"300\">
    <col width=\"150\">
    <col width=\"300\">
  </colgroup>


<thead>

 <tr>
  <th>Verein</th>
  <th>Heber</th>
  <th>Anzahl Mannschaften</th>

 </tr>
</thead>
";



$N_mannschaften = dbBefehl("SELECT * FROM mannschaften_".$data_a_db['S_Db'].", verein
									WHERE verein.IdVerein = mannschaften_".$data_a_db['S_Db'].".IdVerein
                                    Order By verein.Verein ASC");



$i = 0;


while($dsatz = mysqli_fetch_assoc($N_mannschaften))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{


         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber.IdVerein ='".$dsatz['IdVerein']."'
							   AND heber.IdVerein = verein.IdVerein");


$row=mysqli_num_rows($heber);




$i = $i+1;


     $Id="Id" . $i;
     $Mannschaften="Mannschaften" . $i;



echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"".$dsatz['IdHeber']."\"readonly>";


if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}



echo "<tr align=\"center\" >";

     echo "<td>";

          echo $dsatz['Verein'];

     echo "</td>";



     echo "<td>";

          echo "$row";

     echo "</td>";




     echo "<td>";


          echo "<input type=\"text\" name=$Mannschaften size=\"6\" value=\"".$dsatz['Anzahl_M']."\">";


     echo "</td>";



echo "</tr>";






         if(isset($_POST['speichern']))
         {


             $x=1;

                         dbBefehl("UPDATE mannschaften_".$data_a_db['S_Db']."
                                      SET Anzahl_M= '" . $_POST['Mannschaften' . $i] . "'
                                      WHERE IdVerein ='".$dsatz['IdVerein']."'");

         }


}                          //while schleife zuende




   echo "</tbody>";
  echo "</table>";




echo'
<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">
';

  echo "<br>";

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'mannschaften.php'
   },0)
 </script>
";
}














?>










</body>
</html>
