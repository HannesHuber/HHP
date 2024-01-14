<?php
session_start();
if (empty($_SESSION['Startkarten_Verein'])) {
	$_SESSION['Startkarten_Verein'] = '0';
}
if (empty($_SESSION['Startkarten_Grp'])) {
    $_SESSION['Startkarten_Grp'] = 0;
}
if (empty($_SESSION['Startkarte_nach_Verein_oder_Grp'])) {
    $_SESSION['Startkarte_nach_Verein_oder_Grp'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/selfhtml.css" media="print" />


</head>



<body>



<form method="post" action="startkarten_verein.php">

<?php

ob_start ();
error_reporting(1);


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];

$Verein = dbBefehl("SELECT * FROM verein ORDER BY verein ASC");
if($stammdaten['Wk_Art']!='BL') $Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

$dsatz = mysqli_fetch_assoc($datenbank);


echo"<p class=\"kopf\"><b>Startkarten-Vereinswahl</b></p>";

echo "<a href=\"planung.php\" title=\"Link zur Planung\" id=\"range-logo\">Planung</a>";


echo"
<br>
<br>
<br>
<br>";



if((isset($_POST['bestaetigen']))&&($_POST['AuswahlSend']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}

         echo"<p class=\"unter\">Nach Verein:</p>";

         echo "<select name=\"AuswahlSend\" STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"0\" selected>Alle</option>";

         $ArrayVorhandeneVereine = ReturnArrayGemeldeteVereine();		//function in nuetzliches

         foreach ($ArrayVorhandeneVereine as &$Verein) {
         	$get=str_replace(' ','_,_',$Verein);

         	echo "<option value=$get>$Verein</option>";
         }


         echo "</select>";

         echo"<input type=\"submit\" name=\"bestaetigen\" value=\"Bestätigen\">";

         echo"
         <br>
         <br>
         <br>";
         
         if((isset($_POST['GrpSend']))&&($_POST['Grp_Auswahl']==''))
         {
                  $style="border: 2px solid #FF0000";
                  $stylezwei="background-color: #FAFFAD";
         }
         
                  echo"<p class=\"unter\">Nach Gruppe:</p>";
         
                  echo "<select STYLE=\"$style; $stylezwei;\" name=\"Grp_Auswahl\" size=\"1\" class=\"Auswahl\"><br>";
         
                    echo "<option value=\"\" selected>Wählen...</option>";
                      if($stammdaten['Wk_Art']!='BL'){
                          while($dataGrpAuswahl = mysqli_fetch_assoc($Gruppen))
                          {
                                  $merke=str_replace(' ','_,_',$dataGrpAuswahl['Gruppen']);
                                  echo "<option value=$merke>".$dataGrpAuswahl['Gruppen']."</option>";
                          }
                      }else
                         for($x=1;$x<=3;$x++) //$stammdaten['Verein_Anzahl']
                                    echo "<option value=$x>$x</option>";
         
                  echo "</select>";
         
         
                  echo"<input type=\"submit\" name=\"GrpSend\" value=\"Auswahl\">";
         

         if((isset($_POST['bestaetigen']))&&($_POST['AuswahlSend']!=''))
         {
         	$_SESSION['Startkarten_Verein']=$_POST['AuswahlSend'];
            $_SESSION['Startkarte_nach_Verein_oder_Grp']=0;



         	echo"
 				<script>
 					setTimeout(function(){
     					location = 'startkarten.php'
   					},0)
 				</script>
			";

         }

         if((isset($_POST['GrpSend']))&&($_POST['Grp_Auswahl']!=''))
         {
         
         $_SESSION['Startkarten_Verein']='';
         $_SESSION['Startkarte_nach_Verein_oder_Grp']=1;
         $_SESSION['Startkarten_Grp']=$_POST['Grp_Auswahl'];
         
         echo"
          <script>
          setTimeout(function(){
              location = 'startkarten.php'
            },0)
          </script>
         ";
         
         
         }



?>








</form>

</body>
</html>
