<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">



<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl.css" />
<link rel="stylesheet" type="text/css" href="CSS/zk_gwkl_print.css" media="print" />

</head>



<body>


<form method="post" action="m_o_t_auswertung.php">

<a href="auswertung.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>


<?php

ob_start ();
error_reporting(0);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

$Verein = dbBefehl("SELECT * FROM verein");

$A_Kl = dbBefehl("SELECT * FROM alters_klassen");

$Grp=$_SESSION['Aus_n_Grp'];

$time=getdate();

if($_SESSION['alleGrp']=='1') $auswerte_Gruppe=0;						//Damit in Auswertung �ber alle Gruppen Ausgewertet wird
else	$auswerte_Gruppe=$Grp;

include 'funktionen/auswertung.php';   //Keine Funktion sondern einfach php einschub
include 'funktionen/platzierungmk.php';   //Keine Funktion sondern einfach php einschub

$Grp=$_SESSION['Aus_n_Grp'];

echo "<p class=\"kopf\"><b>Zweikampfauswertung</b></p>";

echo "<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">";

if($stammdaten['Wk_Art']!='M_m_T'){

     echo'<colgroup>';
         echo '<col width="170">';     //Name
         echo '<col width="170">';     //Verein
         echo '<col width="80">';      //Jahrgang
         echo '<col width="80">';      //Kg
         echo '<col width="35">';      //M/W
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="70">';       //Punkte
         echo '<col width="70">';
     echo" </colgroup>";

}else{

     echo'<colgroup>';
         echo '<col width="170">';     //Name
         echo '<col width="150">';     //Verein
         echo '<col width="80">';      //Jahrgang
         echo '<col width="80">';      //Kg
         echo '<col width="35">';      //M/W
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="30">';
         echo '<col width="70">';       //Punkte
         echo '<col width="70">';
     echo" </colgroup>";

}

    echo"<thead>";



      echo"<tr>
                 <th>Name</th>
                 <th>Verein</th>
                 <th>Jahrgang</th>
                 <th>Gewicht</th>
                 <th>M/W</th>";

        if($stammdaten['Wk_Art'] == "M_m_T")
        {
                 echo"
                 <th colspan=\"6\">Reissen</th>
                 <th colspan=\"6\">Stossen</th>";
        }else{
                 echo"
                 <th colspan=\"3\">Reissen</th>
                 <th colspan=\"3\">Stossen</th>";
        }

        echo"<th>Punkte</th>";
        echo"<th>Platz</th>";

         echo" </tr>";
echo"</thead>";





$Grp=$_SESSION['Aus_n_Grp'];
$dbGruppen = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']);
$An_G=mysqli_num_rows($dbGruppen);

if($_SESSION['alleGrp'] == 1)
  for ($start=1;$start<=$An_G;$start++)
    $arrayWkGrp[]=$start;
else{
  $DataWkGruppen = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']." Where Gruppe='$Grp'");
  $arrayWkGrp = array();
  while ($WkGrp = mysqli_fetch_assoc($DataWkGruppen))
  $arrayWkGrp[]=$WkGrp['Gruppe_Aus'];
}

/*                   War alte �ber Gruppen abfrage

if($_SESSION['alleGrp'] == 1){
$schleife_bis=intval($An_G);
$schleife_start=1;
}else{
$schleife_bis=intval($Grp);
$schleife_start=intval($Grp);
}

if($_SESSION['alleGrp'] == 1)
   for($Grp=$schleife_start;$Grp<=$schleife_bis;$Grp++){
else

*/

foreach ($arrayWkGrp as &$Grp) {

/*

if(($_SESSION['alleGrp'] == 1)&& $Grp!=1){
echo "<p class=\"kopf\" id=\"page-break\"><b>Zweikampfauswertung mit Technik &nbsp;&nbsp;&nbsp; Gruppe $Grp</b></p>";
}else{
echo "<p class=\"kopf\"><b>Zweikampfauswertung mit Technik &nbsp;&nbsp;&nbsp; Gruppe $Grp</b></p>";
}

*/


if(($_SESSION['alleGrp'] == 1)&& $Grp!=1){
    echo'<tbody>';
       echo'<tr>';
          echo'<td colspan=\"25\">';
                 echo 'Gruppe: ' . $Grp;
          echo'</td>';
       echo'</tr>';
    echo'</tbody>';

}else{
    echo'<tbody>';
       echo'<tr>';
          echo'<td colspan=\"25\">';
                 echo 'Gruppe: ' . $Grp;
          echo'</td>';
       echo'</tr>';
    echo'</tbody>';
}


$heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                                   ORDER BY auswertung_".$data_a_db['S_Db'].".Z_K DESC
                                   ");


$x=0;


$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($heber_aus))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{
$i++;


echo "<input type=\"text\" name=$Id size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdHeber']."\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}



echo "<tr align=\"center\" >";


     echo "<td>";
                 echo $dsatz['Name'].", ".$dsatz['Vorname'];
     echo "</td>";


     echo "<td>";                                                                                                // Spalte (Mit drop down bar)

          echo $dsatz['Verein'];

     echo "</td>";




     echo "<td>";


          echo $dsatz['Jahrgang'];


     echo "</td>";


     echo "<td>";


          echo $dsatz['Gewicht'];


     echo "</td>";



     echo "<td>";

          if($dsatz['Geschlecht'] == "Männlich")
          {
                 echo"M";
          }else{
                 echo"W";
          }

     echo "</td>";


if($dsatz['R_1_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";
}

         echo $dsatz['R_1'];

     echo "</td>";


if($stammdaten['Wk_Art'] == "M_m_T"){
if($dsatz['R_1_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";


}
       echo $dsatz['R_1_Te'];
     echo "</td>";
}


if($dsatz['R_2_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";
}


         echo $dsatz['R_2'];

     echo "</td>";

if($stammdaten['Wk_Art'] == "M_m_T"){
if($dsatz['R_2_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";


}
        echo $dsatz['R_2_Te'];
     echo "</td>";
}



if($dsatz['R_3_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";
}


         echo $dsatz['R_3'];

     echo "</td>";

if($stammdaten['Wk_Art'] == "M_m_T"){
if($dsatz['R_3_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";


}
         echo $dsatz['R_3_Te'];
     echo "</td>";
}



if($dsatz['S_1_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";
}


         echo $dsatz['S_1'];

     echo "</td>";

if($stammdaten['Wk_Art'] == "M_m_T"){
if($dsatz['S_1_G'] == "Ja")
{
     echo "<td>";

}else{

     echo "<td class=\"durchstrich\">";


}
         echo $dsatz['S_1_Te'];
     echo "</td>";
}


if($dsatz['S_2_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";
}


         echo $dsatz['S_2'];

     echo "</td>";


if($stammdaten['Wk_Art'] == "M_m_T"){
if($dsatz['S_2_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";


}
        echo $dsatz['S_2_Te'];
     echo "</td>";
}



if($dsatz['S_3_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";
}


         echo $dsatz['S_3'];

     echo "</td>";


if($stammdaten['Wk_Art'] == "M_m_T"){
if($dsatz['S_3_G'] == "Ja")
{
     echo "<td>";
}else{

     echo "<td class=\"durchstrich\">";


}
         echo $dsatz['S_3_Te'];
     echo "</td>";
}


      echo "<td>";

         echo $dsatz['Z_K'];

      echo "</td>";


      echo "<td>";

      echo $dsatz['Platz_ZK'];

      echo "</td>";


echo "</tr>";






}





} //schliesst for schleife f�r alle Grp

echo "</tbody>";
echo "</table>";

?>

<br><br>
<br><br>
<br><br>
<table width="100%" border="0" cellpadding="0" cellspacing="2">
 <tr>
  <td><hr id="un" class="linie"></td>
  <td><hr id="un" class="linie"></td>
  <td><hr id="un" class="linie"></td>
 </tr>
</table>

</form>
</body>
</html>
