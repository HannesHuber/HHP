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
error_reporting(1);

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

$Grp=$_SESSION['Aus_Grp'];

$time=getdate();

if($_SESSION['alleGrp']=='1') $auswerte_Gruppe=0;						//Damit in Auswertung �ber alle Gruppen Ausgewertet wird
else	$auswerte_Gruppe=$Grp;

include 'funktionen/auswertung.php';   //Keine Funktion sondern einfach php einschub
include 'funktionen/platzierungmk.php';   //Keine Funktion sondern einfach php einschub

$Grp=$_SESSION['Aus_Grp'];

echo "<p class=\"kopf\"><b> ".$stammdaten['Meisterschaft']." in ".$stammdaten['Ort']." am ".$stammdaten['Datum']."</b></p>";
echo "<table class=\"tabelle\">
                 <colgroup> ";
if($stammdaten['Wk_Art']!='M_m_T'){
                         echo '<col width="200">';     //Name
                         echo '<col width="150">';     //Verein
                         echo '<col width="50">';      //Jahrgang
                         echo '<col width="60">';      //Kg
                         echo '<col width="30">';      //M/W
                         echo '<col width="30">';
                         echo '<col width="30">';
                         echo '<col width="30">';
                         echo '<col width="30">';
                         echo '<col width="30">';
                         echo '<col width="30">';                      //Tabellenkopf der immer Angezeigt wird
}else{
                         echo '<col>
                         <col>
                         <col>
                         <col>
                         <col>
                         <col>
                         <col>
                         <col>
                         <col>
                         <col>
                         <col>';              //Tabellenkopf der immer Angezeigt wird
}

                 if($stammdaten['Wk_Art']=='M_m_T') echo'<col><col><col><col><col><col>';

                 if($stammdaten['Pendellauf'] == "1")
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Sprint'] == "1")
                         motAuswertungCol($stammdaten);

                 if(($stammdaten['Differenzsprung'] == "1")||($stammdaten['DifferenzsprungEmatte'] == "1"))
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Schlussdreisprung'] == "1")
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Schockwurf'] == "1")
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Anristen'] == "1")
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Klimmziehen'] == "1")
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Zug'] == "1")
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Bankdruecken'] == "1")
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Liegestuetz'] == "1")
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Beugestuetz'] == "1")
                         motAuswertungCol($stammdaten);

                 if($stammdaten['Sternlauf'] == "1")
                         motAuswertungCol($stammdaten);


                 echo"<col width=\"45\">";
                 echo"<col width=\"45\">";


      echo" </colgroup>";

echo"
         <thead>
         <tr>
                 <th>Name</th>
                 <th>Verein</th>
                 <th>JG</th>
                 <th>KG</th>
                 <th>M/W</th>";
                 if($stammdaten['Wk_Art']=='M_m_T') echo "<th colspan=\"6\">Reissen</th>";
                 else echo "<th colspan=\"3\">Reissen</th>";
                 if($stammdaten['Wk_Art']=='M_m_T') echo "<th colspan=\"6\">Stossen</th>";
                 else echo "<th colspan=\"3\">Stossen</th>";



                 if($stammdaten['Pendellauf'] == "1")
                         echo"<th>Pendell</th>";

                 if($stammdaten['Sprint'] == "1")
                         echo"<th>Sprint</th>";

                 if(($stammdaten['Differenzsprung'] == "1")||($stammdaten['DifferenzsprungEmatte'] == "1"))
                         echo"<th>DiffSp</th>";

                 if($stammdaten['Schlussdreisprung'] == "1")
                         echo"<th>3Hopp</th>";

                 if($stammdaten['Schockwurf'] == "1")
                         echo"<th>Schock</th>";

                 if($stammdaten['Anristen'] == "1")
                         echo"<th>Anristen</th>";

                 if($stammdaten['Klimmziehen'] == "1")
                         echo"<th>Klimmz</th>";

                 if($stammdaten['Zug'] == "1")
                        echo"<th>Zug</th>";

                 if($stammdaten['Bankdruecken'] == "1")
                         echo"<th>Bankdr</th>";

                 if($stammdaten['Liegestuetz'] == "1")
                         echo"<th>Liegest</th>";

                 if($stammdaten['Beugestuetz'] == "1")
                         echo"<th>Beugest</th>";

                 if($stammdaten['Sternlauf'] == "1")
                         echo"<th>Sternl</th>";


                echo"<th>Pt</th>";

                echo"<th>Platz</th>";


         echo" </tr>";
echo"</thead>";


$Grp=$_SESSION['Aus_Grp'];

if($stammdaten['Grp_Einteilung'] == 1){
    $dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);
    $An_G=mysqli_num_rows($dbGruppen);
}else{

    $dbGruppen = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']);
    $An_G=mysqli_num_rows($dbGruppen);
}





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
echo "<p class=\"kopf\" id=\"page-break\"><b>$stammdaten[Meisterschaft] in $stammdaten[Ort] am $stammdaten[Datum] <span class=\"kopf\">Gruppe $Grp</span></b></p>";
}else{
echo "<p class=\"kopf\"><b>$stammdaten[Meisterschaft] in $stammdaten[Ort] am $stammdaten[Datum] <span class=\"kopf\">Gruppe $Grp</span></b></p>";
}

*/

   // $Wk_Gruppe=$_SESSION['Aus_Grp']; War nur f�r einzelne Gruppe
    if($stammdaten['Grp_Einteilung'] == 1){
        $Wk_Gruppe=$Grp;
    }else{
        //Suche Anzeige Gruppe
        $AnzeigeGruppe = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']." WHERE Gruppe_Aus='$Grp'");

        $DsatzAnzeigeGruppe = mysqli_fetch_assoc($AnzeigeGruppe);
        $Wk_Gruppe=$DsatzAnzeigeGruppe['Gruppe'];
    }



if(($_SESSION['alleGrp'] == 1)&& $Grp!=1){
    echo'<tbody>';
       echo'<tr>';
          echo'<td colspan=\"25\">';
          echo 'Gruppe: ' . $Wk_Gruppe;
          echo'</td>';
       echo'</tr>';
    echo'</tbody>';

}else{
    echo'<tbody>';
       echo'<tr>';
          echo'<td colspan=\"25\">';
          echo 'Gruppe: ' . $Wk_Gruppe;
          echo'</td>';
       echo'</tr>';
    echo'</tbody>';
}
//Anpassung wenn mit Selber Grp Einteilung
if($stammdaten['Grp_Einteilung'] == 1){
    $heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   		AND heber.IdVerein = verein.IdVerein
                                   ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".M_K_G DESC
                                   ");
}else{
    $heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
							   		AND heber.IdVerein = verein.IdVerein
                                   ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".M_K_G DESC
                                   ");
}




$x=0;



$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($heber_aus))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

if($dsatz['Ausserkonkurrenz']!='Ausserkonkurrenz') $i++;
else $i='AK';


echo "<input type=\"text\" name=$Id size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdHeber']."\"readonly>";



if ( (int)$i % 2 != 0 ) {                                            //ungerades und gerades i indikator
  echo "<tbody class=\"ungerade\">";
} else {
  echo "<tbody class=\"gerade\">";
}

echo "<tr align=\"center\" >";

     echo "<td>";
                 echo "<span> ".$dsatz['Name'].", </span>";
                 echo "<span> ".$dsatz['Vorname']." </span>";
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

  if($stammdaten['Wk_Art']=='M_m_T'){

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

  if($stammdaten['Wk_Art']=='M_m_T'){

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

  if($stammdaten['Wk_Art']=='M_m_T'){
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

  if($stammdaten['Wk_Art']=='M_m_T'){
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

  if($stammdaten['Wk_Art']=='M_m_T'){
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

  if($stammdaten['Wk_Art']=='M_m_T'){
    if($dsatz['S_3_G'] == "Ja")
    {
        echo "<td>";
    }else{
        echo "<td class=\"durchstrich\">";
    }
        echo $dsatz['S_3_Te'];
    echo "</td>";
  }





     if($stammdaten['Pendellauf'] == "1"){
     	$Pendel=0;
                     if(($dsatz['Pendellauf'] != 0)&&($dsatz['Pendel2'] != 0)){

                        if($dsatz['Pendellauf']<=$dsatz['Pendel2']){
                                 $Pendel=$dsatz['Pendellauf'];
                        }else{
                                 $Pendel=$dsatz['Pendel2'];
                        }

                     }
                     $P=$Pendel;
                     if((($dsatz['Pendellauf'] != 0)&&($dsatz['Pendellauf'] != NULL))&&(($dsatz['Pendel2'] == 0)||($dsatz['Pendel2'] == NULL))){
                         $Pendel=$dsatz['Pendellauf'];
                     }
                     if((($dsatz['Pendellauf'] == 0)||($dsatz['Pendellauf'] == 0))&&(($dsatz['Pendel2'] != 0)&&($dsatz['Pendel2'] != NULL))){
                         $Pendel=$dsatz['Pendel2'];
                     }

        echo "<td>";

            echo $Pendel;

        echo "</td>";


     }

     if($stammdaten['Sprint'] == 1){
     	$Sprint=0;
                     if(($dsatz['Sprint'] != 0)&&($dsatz['Sprint2'] != 0)){

                        if($dsatz['Sprint']<=$dsatz['Sprint2']){
                                 $Sprint=$dsatz['Sprint'];
                        }else{
                                 $Sprint=$dsatz['Sprint2'];
                        }

                     }
                     if((($dsatz['Sprint'] != 0)&&($dsatz['Sprint'] != NULL))&&(($dsatz['Sprint2'] == 0)||($dsatz['Sprint'] == NULL))){
                         $Sprint=$dsatz['Sprint'];
                     }
                     if((($dsatz['Sprint'] == 0)||($dsatz['Sprint'] == NULL))&&(($dsatz['Sprint2'] != 0)&&($dsatz['Sprint2'] != NULL))){
                         $Sprint=$dsatz['Sprint2'];
                     }



      echo "<td>";

         echo $Sprint;

      echo "</td>";

     }

     if(($stammdaten['Differenzsprung'] == 1)||($stammdaten['DifferenzsprungEmatte'] == 1)){
     	$Differenzsprung=0;

         if($dsatz['Differenzsprung']<=$dsatz['Differenzsprung2']){
                 $Differenzsprung=$dsatz['Differenzsprung2'];
         }else{
                 $Differenzsprung=$dsatz['Differenzsprung'];
         }



      echo "<td>";

         echo $Differenzsprung;

      echo "</td>";

     }


     if($stammdaten['Schlussdreisprung'] == 1){
     	$Schlussdreisprung=0;
         if($dsatz['Schlussdreisprung']<=$dsatz['Schlussdreisprung2']){
                 $Schlussdreisprung=$dsatz['Schlussdreisprung2'];
         }else{
                 $Schlussdreisprung=$dsatz['Schlussdreisprung'];
         }
         if($Schlussdreisprung<=$dsatz['Schlussdreisprung3']){
                 $Schlussdreisprung=$dsatz['Schlussdreisprung3'];
         }

      echo "<td>";

         echo $Schlussdreisprung;

      echo "</td>";

     }

     if($stammdaten['Schockwurf'] == 1){
     	$Schockwurf=0;
         if($dsatz['Schockwurf']<=$dsatz['Schockwurf2']){
                 $Schockwurf=$dsatz['Schockwurf2'];
         }else{
                 $Schockwurf=$dsatz['Schockwurf'];
         }
         if($Schockwurf<=$dsatz['Schockwurf3']){
                 $Schockwurf=$dsatz['Schockwurf3'];
         }

      echo "<td>";

         echo $Schockwurf;

      echo "</td>";

     }

     if($stammdaten['Anristen'] == "1"){

      echo "<td>";

         echo $dsatz['Anristen'];

      echo "</td>";

     }

     if($stammdaten['Klimmziehen'] == "1"){

      echo "<td>";

        echo $dsatz['Klimmziehen'];

      echo "</td>";

     }

     if($stammdaten['Zug'] == "1"){

      echo "<td>";

         echo $dsatz['Zug'];

      echo "</td>";

     }

     if($stammdaten['Bankdruecken'] == "1"){

      echo "<td>";

         echo $dsatz['Bankdruecken'];

      echo "</td>";

     }

     if($stammdaten['Liegestuetz'] == "1"){

      echo "<td>";

         echo $dsatz['Liegestuetz'];

      echo "</td>";

     }

     if($stammdaten['Beugestuetz'] == "1"){

      echo "<td>";

         echo $dsatz['Beugestuetz'];

      echo "</td>";

     }

     if($stammdaten['Sternlauf'] == "1"){
     	$Stern=0;
                     if(($dsatz['Sternlauf'] != "0.0")&&($dsatz['Stern2'] != "0.0")){

                        if($dsatz['Sternlauf']<=$dsatz['Stern2']){
                                 $Stern=$dsatz['Sternlauf'];
                        }else{
                                 $Stern=$dsatz['Stern2'];
                        }

                     }
                     $S=$Stern;
                     if((($dsatz['Sternlauf'] != "0.0")&&($dsatz['Sternlauf'] != NULL))&&(($dsatz['Stern2'] == "0.0")||($dsatz['Stern2'] == NULL))){
                         $Stern=$dsatz['Sternlauf'];
                     }
                     if((($dsatz['Sternlauf'] == "0.0")||($dsatz['Sternlauf'] == "0.0"))&&(($dsatz['Stern2'] != "0.0")&&($dsatz['Stern2'] != NULL))){
                         $Stern=$dsatz['Stern2'];
                     }

        echo "<td>";

            echo $Stern;

        echo "</td>";


     }


      echo "<td>";

         echo $dsatz['M_K_G'];

      echo "</td>";



      echo "<td>";

         echo $dsatz['Platz_MK'];

      echo "</td>";


echo "</tr>";



/*
     dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                  SET Platz_MK= '$i'
                  WHERE IdHeber ='$dsatz[IdHeber]'
                  ");
*/


}



}  //for ENDE f�r Alle Grp drucken

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
