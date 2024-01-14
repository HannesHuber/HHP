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


<form method="post" action="zeitplan.php">

<p class="kopf"><b>Zeitplan</b></p>



<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>

<?php


ob_start ();
error_reporting(1);



include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include "zeitplan/funktion.php";
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

$Verein = dbBefehl("SELECT * FROM verein");

if(($stammdaten['Wk_Art'] == "M_o_T") || ($stammdaten['Wk_Art'] == "M_m_T"))
{

$gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']."
                        ORDER BY gruppen_zeit_".$data_a_db['S_Db'].".Gruppe_Aus ASC
                        ");

}else{

$gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']."
                        ORDER BY gruppen_zeit_".$data_a_db['S_Db'].".Gruppen ASC
                        ");

}




if(($stammdaten['Wk_Art'] == "M_o_T") || ($stammdaten['Wk_Art'] == "M_m_T"))
{
echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"80\">
    <col width=\"80\">

  </colgroup>
";


echo"

<thead>

 <tr>
  <th>Gruppe</th>
  <th>Datum</th>
  <th>Wiegen - Von</th>
  <th>Wiegen - Bis</th>
  <th>Wettkampf</th>
  <th>Athletik</th>
  <th>Brett</th>
  <th>Anzahl</th>

 </tr>
</thead>

";


}else{


echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"80\">
    <col width=\"100\">";

if($stammdaten['Wk_Art'] == "ZK" && $stammdaten['Grp_Einteilung'] == '0') echo "<col width=\"200\">";

echo"
  </colgroup>
";



echo"

<thead>

 <tr>
  <th>Gruppe</th>
  <th>Datum</th>
  <th>Wiege-Zeit - Von</th>
  <th>Wiege-Zeit - Bis</th>
  <th>Wettkampf-Zeit</th>
  <th>Brett</th>
  <th>Anzahl</th>";

if($stammdaten['Wk_Art'] == "ZK" && $stammdaten['Grp_Einteilung'] == '0') echo "<th>Gewichtsklassen</th>";

echo"
  </tr>
</thead>

";


}

echo"<tbody>";




$time=getdate();

$i = 0;
$count=0;

while($dsatz = mysqli_fetch_assoc($gruppen))                         // Anlegen der Tabelle(IdHeber muss ai sein)
{

echo"<tbody>";

echo "<tr>";


         echo "<td>";
                 echo $dsatz['Gruppen'];
         echo "</td>";

         echo "<td>";
                 echo $dsatz['Datum'];
         echo "</td>";



         echo "<td>";
                 echo $dsatz['Wiege_Zeit'];
         echo "</td>";
         echo "<td>";
                 echo $dsatz['Wiege_Zeit_Bis'];
         echo "</td>";



         echo "<td>";

                 echo $dsatz['WK_Zeit'];

         echo "</td>";

if(($stammdaten['Wk_Art'] == "M_o_T") || ($stammdaten['Wk_Art'] == "M_m_T"))
{
         echo "<td>";

                 echo $dsatz['Athletik_Zeit'];

         echo "</td>";




}

         echo "<td>";

                 echo $dsatz['Bridge'];

         echo "</td>";

         echo "<td>";

                 echo $dsatz['Anzahl'];

         echo "</td>";



if(($stammdaten['Wk_Art'] == "M_o_T") || ($stammdaten['Wk_Art'] == "M_m_T"))
{

}else if( ($stammdaten['Wk_Art'] == "ZK" && $stammdaten['Grp_Einteilung'] == '0') || $stammdaten['Wk_Art'] != "ZK"){


        echo "<td>";
        echo "</td>";




echo "</tr>";


$count = $dsatz['Gruppen'];



if($stammdaten['Wk_Art']=='ZK'){
         if($stammdaten['Masters']==0)
            $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);
         else
            $Klasse = dbBefehl("SELECT * FROM alters_klassen_masters");
}else
    $Klasse = dbBefehl("SELECT * FROM alters_klassen");


while($d_Klasse = mysqli_fetch_assoc($Klasse))
{

         ZeitEinteilung($d_Klasse['Klasse'], $dsatz['Gruppen']);

}


}


}

echo "</tbody>";
echo "</table>";


if(isset($_POST['reload']))
{
echo"
 <script>
 setTimeout(function(){
     location = 'http://htp-test1.de/planung.php'
   },0)
 </script>
";
}


?>



</body>
</html>
