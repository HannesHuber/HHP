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


<form method="post" action="teilnehmerliste.php">

<p class="kopf"><b>Teilnehmerliste</b></p>


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



$Verein = dbBefehl("SELECT * FROM verein");

$WettKaArt=$stammdaten['Wk_Art'];

if($WettKaArt=='ZK'){
         if($stammdaten['DM']==1){
                 $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                                         WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
							   			AND heber.IdVerein = verein.IdVerein
                                         ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC, heber.Geschlecht ASC, heber.GwKl ASC,
                                         heber_".$data_a_db['S_Db'].".ZKLast DESC");
         }else{
                 $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                                         WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
							   			AND heber.IdVerein = verein.IdVerein
                                         ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC, heber.AlKl ASC, heber.Geschlecht ASC, heber.GwKl ASC,
                                         heber.Name ASC");
         }
}elseif($WettKaArt=='M_m_T' || $WettKaArt=='M_o_T'){

$heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                      WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
							   	AND heber.IdVerein = verein.IdVerein
                      ORDER BY heber_".$data_a_db['S_Db'].".Gruppe_Aus ASC, heber.Jahrgang DESC, heber.Geschlecht ASC,
                      heber.Name ASC");
}else{
	$heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
			WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
							   	AND heber.IdVerein = verein.IdVerein
			ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC, heber.Jahrgang DESC, heber.Geschlecht ASC,
			heber.Name ASC");
}
echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"280\">
    <col width=\"170\">
    <col width=\"50\">
    <col width=\"50\">";
	if($WettKaArt=='ZK') echo"<col width=\"65\">";
	if($stammdaten['Meldelast']=='1') echo "<col width=\"125\">";
    if($stammdaten['DM']=='1') echo "<col width=\"125\">";
    if($WettKaArt=='M_m_T' || $WettKaArt=='M_o_T') echo "<col width=\"100\">";
    echo"
    <col width=\"40\">";

echo"
  </colgroup>


<thead>

 <tr>
  <th>Name</th>
  <th>Verein</th>";

  if($WettKaArt=='ZK' && $stammdaten['DM']=='0')  echo '<th>Klasse</th>';
  else echo '<th>Jg</th>';

echo "
  <th>M/W</th>";
  if($WettKaArt=='ZK') echo "<th>GwKl</th>";
  if($stammdaten['Meldelast']=='1') echo "<th>ZK Last</th>";
  if($stammdaten['DM']=='1') echo "<th>Junioren/Aktive</th>";
  if($WettKaArt=='M_m_T' || $WettKaArt=='M_o_T') echo "<th>Ausw Grp</th>";

  echo"
  <th>Grp</th>";
echo"
 </tr>
</thead>
";

echo"<tbody>";




$time=getdate();

$i = 0;
$count=1;

while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

if($dsatz['AlKlMain']=='') safe_AlKl_GwKl ($dsatz['IdHeber'],$stammdaten);

if($WettKaArt=='M_m_T' || $WettKaArt=='M_o_T')
	$VergleichsGruppe=$dsatz['Gruppe_Aus'];
else
	$VergleichsGruppe=$dsatz['Gruppe'];

echo"<tbody>";

/*
if($count != $VergleichsGruppe)
{
	echo "<tr>";
	echo "<td colspan=\"5\">";
	echo"&nbsp;";
	echo "</td>";
	echo "</tr>";
}
*/


echo "<tr>";




     echo "<td>";

                 echo "<span style=\"width:125px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];

     echo "</td>";




     echo "<td>";

          echo $dsatz['Verein'];

     echo "</td>";




     echo "<td>";

         if($WettKaArt=='ZK' && $stammdaten['DM']=='0'){
          
               $AlKl=$dsatz['AlKl'];
               if($stammdaten['Masters']==1) $AlKl = convertString($AlKl, $dsatz["Geschlecht"]);
               echo $AlKl;
         }  //echo (al_kl_heber ($dsatz['IdHeber'],$stammdaten));
         else echo $dsatz['Jahrgang'];

     echo "</td>";




     echo "<td>";
          if($dsatz['Geschlecht']=='Männlich') echo "M";
          else echo "W";

     echo "</td>";
if($WettKaArt=='ZK'){
     echo "<td>";
           echo $dsatz['GwKl'];
     echo "</td>";
}

if($stammdaten['Meldelast']=='1'){
	echo "<td>";
	echo "$dsatz[ZKLast] kg";
	echo "</td>";

}
   if($stammdaten['DM']=='1'){

      $AK=al_kl_heber_ohne_AlKlMain ($dsatz['IdHeber'],$stammdaten);

      echo "<td>";
        if($AK!='Aktive'){
        	if($dsatz['Norm_Heber']==0) echo "J";
         	if($dsatz['Norm_Heber']==1) echo "J+A";
        }elseif($AK=='Aktive')    echo "A";
      echo "</td>";
    }

    if($WettKaArt=='M_m_T' || $WettKaArt=='M_o_T'){
    	echo "<td id=\"rechts\">";
    		echo "$dsatz[Gruppe_Aus]";
    	echo "</td>";
    }

         echo "<td id=\"rechts\">";

              echo "$dsatz[Gruppe]";

         echo "</td>";






echo "</tr>";


$count=$VergleichsGruppe;


}

echo "</tbody>";
echo "</table>";


         if(isset($_POST['reload']))
         {
         header('Location: http://localhost/ksv/planung.php');
         }


?>


</form>
</body>
</html>
