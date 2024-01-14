<?php
session_start();
error_reporting(-1);
if (empty($_SESSION['WeK'])) {
	$_SESSION['WeK'] = '';
}
$_SESSION['user'] = 0;

if (empty($_SESSION['Filter_Text'])) {
    $_SESSION['Filter_Text'] = '';
}



//session_destroy();

header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/start.css">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>
<script type='text/javascript' src="JS/Online-Import.js"></script>

</head>

<body>


<script>
function myFunction() {
    location.reload();
}
</script>

<form method="post" action="import-wk.php">
<br><br><br><br><br><br>


<span id="ajaxtest"></span>
<span id="ajax-loeschen"></span>
<span id="mkot_ersteller"></span>
<span id="mkmt_ersteller"></span>

<div id="modal">
  <div class="spinner">
     <div class="bounce1"></div>
     <div class="bounce2"></div>
     <div class="bounce3"></div>
  </div>
</div>

<a href="start.php" title="Link zu Datenbanken" id="range-logo"><---</a>


<?php

ob_start();
error_reporting(1);

include 'funktionen/db_verbindung.php';

dbTest();

include 'Outsorst/start_tabellen_erstellen.php';
//Javascript weist auf PHP in Ajax-PHP Ordner
$db=dbVerbindung();
$db_Online=dbVerbindungOnline();		//Sorgt für Online Con

$query="SELECT * FROM datenbanken WHERE Id_Db NOT IN ('0')";	//nicht NULL wegen redirect to start in code jede Seite

$result = dbBefehl($query);


$x=0;




//Datenbanken Anzeige:

echo '<p class="kopf" align="left"><font size="10"><b>WK-Import</font></b></p>';

//Filter---------------------------------------------------------------------------------------
if( isset($_POST['Filter'])){
    $_SESSION['Filter_Text'] = $_POST['Filter_Text'];
}

$FilterText=$_SESSION['Filter_Text'];

echo '<br><br>';
echo "<table class=tabelle border=\"5\" width=\"550\" cellpadding=\"4\" cellspacing=\"5\">";
echo "  <colgroup>
         <col width=\"70%\">
         <col width=\"30%\">

         </colgroup>";

echo "<tfoot>";
echo "<tr>";

echo "<td>";
echo "Heim-Verein";
echo "</td>";

echo "<td>";
echo "</td>";

echo "</tr>";
echo "<tr>";

echo "<td>";
echo "<input type=\"text\" name=\"Filter_Text\" size=\"35\" value=\"$FilterText\">";
echo "</td>";

echo "<td align=\"center\">";
echo "<input type=\"submit\" name=Filter value=\"Filtern\">";
echo "</td>";

echo "</tr>";

echo "</tfoot>";
echo "</table>";

echo '<br><br><br><br>';



if($FilterText == ''){
    $WK_Data = dbBefehlOnline ("SELECT * FROM bundesliga Order By Datum DESC");
}else{
    $WK_Data = dbBefehlOnline ("SELECT * FROM bundesliga
                                WHERE Heim LIKE '%$FilterText%'
                                Order By Datum DESC");
}
//Filter-ENDE-------------------------------------------------------------------------------------

echo "
<div style=\"text-align: left;\">";
echo "
<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
<thead>

 <tr>
  <th>Datenbanken</th>
  <th>Datum</th>

  <th>Import</th>
 </tr>


</thead>

";  //<th>Wk-Art</th>

echo "<tbody>";

$i = 0;


while ($dsatz = mysqli_fetch_assoc($WK_Data)) {

    $i++;

    $Id="Id" . $i;
    $DB="DB" . $i;
    $Loeschen="Loeschen" . $i;
    $Laden="Laden" . $i;
    $AuswahlWK="AuswahlWK".$i;
    $Datum=$dsatz['Datum'];
    $IdWk=$dsatz['wettkampf_id'];
    $Passwort=$dsatz['Code'];    //Vorl�ufig

    /*

    if($dsatz['Gast2']==NULL || $dsatz['Gast2']=='')
        $WkName=$dsatz['Heim']." gegen ".$dsatz['Gast'];
    else
        $WkName=$dsatz['Heim']." vs ".$dsatz['Gast']." vs ".$dsatz['Gast2'];

        $WkName_Datum=$WkName.", ".$Datum;
     */

   $WkName=$dsatz['Name'];



    echo "<input type=\"text\" name=$Id size=\"0\" style=\" display:none; \" value=\"$IdWk\"readonly>";

    echo "<tr>";
        echo "<td>";
            echo "<input type=\"text\" name=$DB size=\"85\" value=\"$WkName\" readonly>";
        echo "</td>";

        echo "<td>";
            echo "<input type=\"text\" name=$DB size=\"10\" value=\"$Datum\" readonly>";
        echo "</td>";

 /*
        echo "<td>";
        echo "<select id=$AuswahlWK name=\"AuswahlWk\" STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

        echo "<option value=\"1\" selected>ZK</option>";
        echo "<option value=\"2\" >Masters</option>";
        echo "<option value=\"3\" >MkoT</option>";
        echo "<option value=\"4\" >MkmT</option>";
        echo "<option value=\"5\" >BL</option>";

        echo "</select>";
        echo "</td>";
  */



        echo "<td align=\"center\">";
        echo "<button type=\"button\" id=\"zk-load\" name=\"new_wettkampf\" onclick=\"OnlineDB_Import($IdWk,'$WkName','$Passwort',$i,5)\">Download</button>";
        echo "</td>";
    echo "</tr>";
}


echo "</tbody>";
echo "</table>";
