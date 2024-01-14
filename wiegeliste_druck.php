<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">



<link rel="stylesheet" type="text/css" href="CSS/teilnehmerliste.css" />
<link rel="stylesheet" type="text/css" href="CSS/teilnehmerliste_print.css" media="print" />

</head>



<body>


<form method="post" action="wiegeliste_druck.php">

<p class="kopf"><b>Wiegeliste</b></p>


<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>






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

if ($stammdaten['LosNummern']==1)  LosNrVerteiler($data_a_db['S_Db']);          //f�r automatische Verteilung der LosNr


$Verein = dbBefehl("SELECT * FROM verein");

$orginal=str_replace('_,_',' ',$_SESSION['Wiege_Verein']);

$Grp=$_SESSION['Wiege_Grp'];

//Case when sollte daf�r sorgen das GwKL die Gr�sser 0 am ende kommen
//Case when heber.GwKl>0 then 1 else 0 end,
$SortString=" heber.Gewicht ASC, heber_".$data_a_db['S_Db'].".LosNr ASC,";

if($orginal!=''){



             if($stammdaten['International']=='0'){       //Ver�ndertes Order By International

                 $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", staaten, verein
                                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                       AND Verein = '$orginal'
                                       AND staaten.IdStaat=heber.IdStaat
							   		   AND heber.IdVerein = verein.IdVerein
                                       ORDER BY $SortString heber.Name ASC");
              }else{

                 $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", staaten, verein
                                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                       AND Verein = '$orginal'
                                       AND heber.IdStaat=staaten.IdStaat
							   	AND heber.IdVerein = verein.IdVerein
                                       ORDER BY $SortString staaten.Staat ASC, heber.Name ASC");
              }

}else{

             if($stammdaten['International']=='0'){       //Ver�ndertes Order By

                 $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", staaten, verein
                                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                       AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                                       AND staaten.IdStaat=heber.IdStaat
							   	AND heber.IdVerein = verein.IdVerein
                                       ORDER BY $SortString heber.Name ASC");
              }else{

                 $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", staaten, verein
                                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                       AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                                       AND heber.IdStaat=staaten.IdStaat
							   	AND heber.IdVerein = verein.IdVerein
                                       ORDER BY $SortString staaten.Staat ASC, heber.Name ASC");
              }

}


if($orginal!='')
     echo"<p class=\"kopf\"><b>Verein: $orginal</b></p>";
else
     echo"<p class=\"kopf\"><b>Gruppe: $Grp</b></p>";


echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"250\">";
     echo '<col width=\"300\">';
echo"<col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">
    <col width=\"50\">";
 echo"<col width=\"50\">";
if($stammdaten['StartNr']=='1') echo"<col width=\"50\">";
echo"
  </colgroup>


<thead>

 <tr>
  <th>Name</th>";
     if($stammdaten['International']=='1') echo '<th>Staat</th>';
     else echo '<th>Verein</th>';
echo"
  <th>M/W</th>
  <th>KöGw</th>
  <th>1.V R</th>
  <th>1.V S</th>
  <th>Los Nr.</th>";
if($stammdaten['StartNr']=='1') echo"<th>Start Nr.</th>";
if($stammdaten['Wk_Art']=='BL') echo '<th>Gruppe</th>';


echo"
 </tr>
</thead>
";






$time=getdate();

$i = 0;
$count=1;
$GwKl=0;

echo"<tbody>";

while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

	if($stammdaten['Wk_Art']!='BL' && $stammdaten['Wk_Art']!='M_m_T' && $stammdaten['Wk_Art']!='M_o_T'){


	if($GwKl != $dsatz['GwKl']){
		echo"</tbody>";
		echo "<thead>";
		echo "<tr>";
		echo '<td id="GwKl" colspan="6">';
			echo "Gewichtsklasse " . $dsatz['GwKl'];
		echo "</dh>";
		echo "</tr>";
		$GwKl = $dsatz['GwKl'];

		echo "</thead>";
		echo"<tbody>";
	}

    }







echo "<tr>";




     echo "<td>";

                 echo "<span style=\"width:125px;display:block;float:left;\"> ".$dsatz['Name']." </span>";

                 echo $dsatz['Vorname'];

     echo "</td>";

if($stammdaten['International']=='1'){

     echo "<td>";
                 echo $dsatz['Staat'];
     echo "</td>";


}else{
    echo "<td>";
    echo $dsatz['Verein'];
    echo "</td>";
}


     echo "<td>";


          if($dsatz['Geschlecht']=="Weiblich"){

                 echo"W";

          }else{

                 echo"M";
          }

     echo "</td>";



     	echo "<td id=\"rechts\">";
     	echo "</td>";

     	echo "<td>";
     	echo "</td>";

     	echo "<td>";
     	echo "</td>";


     if($stammdaten['LosNummern']==1) echo "<td>". $dsatz['LosNr'] . "</td>";
     else                             echo "<td> &nbsp; </td>";

     if($stammdaten['StartNr']=='1'){
     	echo "<td> &nbsp; </td>";
     }

if($stammdaten['Wk_Art']=='BL') echo "<td>&nbsp;</td>";


echo "</tr>";


$count=$dsatz['Gruppe'];


}

echo "</tbody>";
echo "</table>";


echo"
<br>
<br>
";



if(isset($_POST['reload']))
{
echo"
 <script>
 setTimeout(function(){
     location = 'wiegelisten_verein.php'
   },0)
 </script>
";
}


?>


</form>
</body>
</html>
