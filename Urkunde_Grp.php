<?php
session_start();
if (empty($_SESSION['Urk_Grp'])) {
    $_SESSION['Urk_Grp'] = 0;
}
$_SESSION['Urk_Grp'] = 0;

if (empty($_SESSION['Urk_Art'])) {
    $_SESSION['Urk_Art'] = 0;
}
$_SESSION['Urk_Art']=0;

if (empty($_SESSION['Ur_AlKl'])) {
    $_SESSION['Ur_AlKl'] = 0;
}
$_SESSION['Ur_AlKl'] = 0;
if (empty($_SESSION['Ur_name_AlKl'])) {
    $_SESSION['Ur_name_AlKl'] = 0;
}
$_SESSION['Ur_name_AlKl'] = '';

if (empty($_SESSION['GesGrp_Urkunde'])) {
    $_SESSION['GesGrp_Urkunde'] = 0;
}
$_SESSION['GesGrp_Urkunde'] = '';

if (empty($_SESSION['GrpUndAlKl_Urkunde'])) {
    $_SESSION['GrpUndAlKl_Urkunde'] = 0;
}
$_SESSION['GrpUndAlKl_Urkunde'] = 0;

if (empty($_SESSION['Mk_Auswahl_Art'])) {
	$_SESSION['Mk_Auswahl_Art'] = 0;
}
$_SESSION['Mk_Auswahl_Art'] = 0;

if (empty($_SESSION['UrkundeMitNorm'])) {
	$_SESSION['UrkundeMitNorm'] = 0;
}
$_SESSION['UrkundeMitNorm'] = 0;

if (empty($_SESSION['Urk_RoderS'])) {	//0 f�r Gesamt 1 f�r Reissen 2 f�r Stossen
	$_SESSION['Urk_RoderS'] = 0;
}
$_SESSION['Urk_RoderS'] = 0;

if (empty($_SESSION['Urk_Laenderwertung'])) {
	$_SESSION['Urk_Laenderwertung'] = 0;
}
$_SESSION['Urk_Laenderwertung'] = 0;


if (empty($_SESSION['Urk_Mk_Kg'])) {
    $_SESSION['Urk_Mk_Kg'] = 0;
}
$_SESSION['Urk_Mk_Kg'] = 0;

if (empty($_SESSION['Urk_GwKl'])) {
    $_SESSION['Urk_GwKl'] = 0;
}
$_SESSION['Urk_GwKl'] = 0;


header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">

<script type="text/javascript">
function popup (url) {


 var w = "screen.width";
 var h = "screen.height";



 fenster = window.open(url,"windowname4", "width=900, height=700, toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1");

 fenster.focus();
 return false;
}
</script>


</head>



<body>



<form method="post" action="Urkunde_Grp.php">

<a href="auswertung.php" title="Link zum Auswertung" id="range-logo">Auswertung</a>


<?php



ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dsatz = mysqli_fetch_assoc($datenbank);
loginCheck($dsatz);

$_SESSION['Urk_Art']=0;          //Zur�cksetzen des Wertes wegen weiterleitung zu urkunde.php


$dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);
$An_G=mysqli_num_rows($dbGruppen);





echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Urk-Gruppenwahl</font></b></p>";



if(( (isset($_POST['send'])) || (isset($_POST['send_R'])) || (isset($_POST['send_S'])) )&&($_POST['Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}


         echo"<p class=\"unter\"> Gruppen:</p>";

         echo "<select name=\"Auswahl\" STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

                 for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

         echo "</select>";

         echo"<input type=\"submit\" name=\"send\" value=\"Gesamt\">";
         echo"<input type=\"submit\" name=\"send_R\" value=\"Reissen\">";
         echo"<input type=\"submit\" name=\"send_S\" value=\"Stossen\">";


if(( (isset($_POST['send'])) || (isset($_POST['send_R'])) || (isset($_POST['send_S'])) ) && ($_POST['Auswahl']!=''))
{
	if(isset($_POST['send_R']))
		$_SESSION['Urk_RoderS'] = 1;

	if(isset($_POST['send_S']))
		$_SESSION['Urk_RoderS'] = 2;

$_SESSION['Urk_Grp']=$_POST['Auswahl'];
$_SESSION['Mk_Auswahl_Art'] = 0;

echo"
 <script>
 setTimeout(function(){
     location = 'urkunde.php'
   },0)
 </script>
";

}

if($dsatz['Wk_Art']=='ZK'){
    if($dsatz['Masters']=='1'){

if(( (isset($_POST['sendM'])) || (isset($_POST['send_RM'])) || (isset($_POST['send_SM'])) )&&($_POST['AuswahlM']==''))
{
    $styleM="border: 2px solid #FF0000";
    $stylezweiM="background-color: #FAFFAD";
}


echo"<p class=\"unter\"> Gruppen nach Gewichtsklassen:</p>";

echo "<select name=\"AuswahlM\" STYLE=\"$styleM; $stylezweiM;\" size=\"1\" class=\"Auswahl\"><br>";

echo "<option value=\"\" selected>Wählen...</option>";

for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

echo "</select>";

echo"<input type=\"submit\" name=\"sendM\" value=\"Gesamt\">";
echo"<input type=\"submit\" name=\"send_RM\" value=\"Reissen\">";
echo"<input type=\"submit\" name=\"send_SM\" value=\"Stossen\">";


if(( (isset($_POST['sendM'])) || (isset($_POST['send_RM'])) || (isset($_POST['send_SM'])) ) && ($_POST['AuswahlM']!=''))
{
    if(isset($_POST['send_RM']))
        $_SESSION['Urk_RoderS'] = 1;

        if(isset($_POST['send_SM']))
            $_SESSION['Urk_RoderS'] = 2;

            $_SESSION['Urk_Grp']=$_POST['AuswahlM'];
            $_SESSION['Mk_Auswahl_Art'] = 0;
            $_SESSION['Urk_GwKl'] = 1;

            echo"
 <script>
 setTimeout(function(){
     location = 'urkunde.php'
   },0)
 </script>
";

}
}   //Ende if Masters
}   //ENde if ZK


if($dsatz['Wk_Art']=='M_o_T' || $dsatz['Wk_Art']=='M_m_T')
{


	if((isset($_POST['Mk_send_Auswahl_ZK']))&&($_POST['Mk_Auswahl_ZK']==''))
	{
		$Mk_style_Auswahl="border: 2px solid #FF0000";
		$Mk_style_Auswahl_zwei="background-color: #FAFFAD";
	}


	echo"<p class=\"unter\"> Gruppen auswertung nach ZK:</p>";

	echo "<select name=\"Mk_Auswahl_ZK\" STYLE=\"$Mk_style_Auswahl; $Mk_style_Auswahl_zwei;\" size=\"1\" class=\"Auswahl\"><br>";

	echo "<option value=\"\" selected>Wählen...</option>";

	for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

	echo "</select>";

	echo"<input type=\"submit\" name=\"Mk_send_Auswahl_ZK\" value=\"Gesamt\">";



	if((isset($_POST['Mk_send_Auswahl_ZK']))&&($_POST['Mk_Auswahl_ZK']!=''))
	{

		$_SESSION['Urk_Grp']=$_POST['Mk_Auswahl_ZK'];
		$_SESSION['Mk_Auswahl_Art'] = 1;

		echo"
 	<script>
 	setTimeout(function(){
  	   location = 'urkunde.php'
  	 },0)
 	</script>
	";

	}

}


if($dsatz['Wk_Art']=='M_m_T')
{


    if((isset($_POST['Mk_send_Auswahl_ZK_Kg']))&&($_POST['Mk_Auswahl_ZK_Kg']==''))
    {
        $Mk_style_Auswahl_Kg="border: 2px solid #FF0000";
        $Mk_style_Auswahl_Kg_zwei="background-color: #FAFFAD";
    }


    echo"<p class=\"unter\"> Gruppen auswertung nach ZK ohne Technik:</p>";

    echo "<select name=\"Mk_Auswahl_ZK_Kg\" STYLE=\"$Mk_style_Auswahl_Kg; $Mk_style_Auswahl_Kg_zwei;\" size=\"1\" class=\"Auswahl\"><br>";

    echo "<option value=\"\" selected>Wählen...</option>";

    for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

    echo "</select>";

    echo"<input type=\"submit\" name=\"Mk_send_Auswahl_ZK_Kg\" value=\"Gesamt\">";



    if((isset($_POST['Mk_send_Auswahl_ZK_Kg']))&&($_POST['Mk_Auswahl_ZK_Kg']!=''))
    {

        $_SESSION['Urk_Grp']=$_POST['Mk_Auswahl_ZK_Kg'];
        $_SESSION['Mk_Auswahl_Art'] = 1;
        $_SESSION['Urk_Mk_Kg'] = 1;

        echo"
 	<script>
 	setTimeout(function(){
  	   location = 'urkunde.php'
  	 },0)
 	</script>
	";

    }

}


if($dsatz['Wk_Art']=='ZK')
{


    if(( (isset($_POST['UrkundeAlKl'])) || (isset($_POST['UrkundeAlKl_R'])) || (isset($_POST['UrkundeAlKl_S'])))&&($_POST['AuswahlAlKl']==''))
{
         $styleAlKl="border: 2px solid #FF0000";
         $stylezweiAlKl="background-color: #FAFFAD";
}


         echo"<p class=\"unter\"> Altersklassen:</p>";

         echo "<select name=\"AuswahlAlKl\" STYLE=\"$styleAlKl; $stylezweiAlKl;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";


          if($dsatz['Wk_Art']=='ZK' && $dsatz['Masters']!='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);

          elseif($dsatz['Wk_Art']=='M_m_T' || $dsatz['Wk_Art']=='M_o_T')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen");

          elseif($dsatz['Wk_Art']=='ZK' && $dsatz['Masters']=='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_masters");


                       while($dataAus_AlKl = mysqli_fetch_assoc($DataAlKl))
                       {
                             $Safe_AlKl=$dataAus_AlKl['Klasse'];
                             echo "<option value=$Safe_AlKl>".$dataAus_AlKl['Klasse']."</option>";
                        }
                  echo "</select>";


                  echo"<input type=\"submit\" name=\"UrkundeAlKl\" value=\"Gesamt\">";
                  echo"<input type=\"submit\" name=\"UrkundeAlKl_R\" value=\"Reissen\">";
                  echo"<input type=\"submit\" name=\"UrkundeAlKl_S\" value=\"Stossen\">";

if(( (isset($_POST['UrkundeAlKl'])) || (isset($_POST['UrkundeAlKl_R'])) || (isset($_POST['UrkundeAlKl_S']))) && ($_POST['AuswahlAlKl']!=''))
{

	if(isset($_POST['UrkundeAlKl_R']))
		$_SESSION['Urk_RoderS'] = 1;

	if(isset($_POST['UrkundeAlKl_S']))
		$_SESSION['Urk_RoderS'] = 2;

$_SESSION['Ur_AlKl'] = 1;
$_SESSION['Ur_name_AlKl']=$_POST['AuswahlAlKl'];

         echo"
         <script>
          setTimeout(function(){
          location = 'urkunde.php'
          },0)
         </script>
         ";
}


echo"
<br>";
if($dsatz['MitNorm']==1){

	echo"<p class=\"unter\">Grp mit Norm:</p>";

	$DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);

	if(( isset($_POST['LastNorm']) || isset($_POST['LastNorm_R']) || isset($_POST['LastNorm_S']) ) &&($_POST['AuswahlNorm']==''))
	{
		$styleNorm="border: 2px solid #FF0000";
		$stylezweiNorm="background-color: #FAFFAD";
	}

	echo "<select name=\"AuswahlNorm\" STYLE=\"$styleNorm; $stylezweiNorm;\" size=\"1\" class=\"Auswahl\"><br>";

	echo "<option value=\"\" selected>Wählen...</option>";

	for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

	echo "</select>";


	echo"<input type=\"submit\" name=\"LastNorm\" value=\"Gesamt\">";
	echo"<input type=\"submit\" name=\"LastNorm_R\" value=\"Reissen\">";
	echo"<input type=\"submit\" name=\"LastNorm_S\" value=\"Stossen\">";
}

if(( isset($_POST['LastNorm']) || isset($_POST['LastNorm_R']) || isset($_POST['LastNorm_S']) ) &&($_POST['AuswahlNorm']!=''))
{
	if(isset($_POST['LastNorm_R']))
		$_SESSION['Urk_RoderS'] = 1;

	if(isset($_POST['LastNorm_S']))
		$_SESSION['Urk_RoderS'] = 2;

	$_SESSION['UrkundeMitNorm']=1;
	$_SESSION['Urk_Grp']=$_POST['AuswahlNorm'];
	echo"
         <script>
          setTimeout(function(){
          location = 'urkunde.php'
          },0)
         </script>
         ";
}

if( (isset($_POST['UrkundeGrpUndAlKl']) || isset($_POST['UrkundeGrpUndAlKl_R']) || isset($_POST['UrkundeGrpUndAlKl_S']))&&(($_POST['AuswahlGrpUndA']=='')||($_POST['AuswahlGUndAlKl']=='')))
{
         $styleGrpUndAlKl="border: 2px solid #FF0000";
         $stylezweiGrpUndAlKl="background-color: #FAFFAD";
}


         echo"<p class=\"unter\"> Gruppe und Altersklassen:</p>";

         echo "<select name=\"AuswahlGrpUndA\" STYLE=\"$styleGrpUndAlKl; $stylezweiGrpUndAlKl;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";

                 for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

         echo "</select>";

         echo " und ";

         echo "<select name=\"AuswahlGUndAlKl\" STYLE=\"$styleGrpUndAlKl; $stylezweiGrpUndAlKl;\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";


          if($dsatz['Wk_Art']=='ZK' && $dsatz['Masters']!='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);

          elseif($dsatz['Wk_Art']=='M_m_T' || $dsatz['Wk_Art']=='M_o_T')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen");

          elseif($dsatz['Wk_Art']=='ZK' && $dsatz['Masters']=='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_masters");


                       while($dataAus_AlKl = mysqli_fetch_assoc($DataAlKl))
                       {
                             $Safe_AlKl=$dataAus_AlKl['Klasse'];
                             echo "<option value=$Safe_AlKl>".$dataAus_AlKl['Klasse']."</option>";
                        }
                  echo "</select>";


                  echo"<input type=\"submit\" name=\"UrkundeGrpUndAlKl\" value=\"Gesamt\">";
                  echo"<input type=\"submit\" name=\"UrkundeGrpUndAlKl_R\" value=\"Reissen\">";
                  echo"<input type=\"submit\" name=\"UrkundeGrpUndAlKl_S\" value=\"Stossen\">";


if( (isset($_POST['UrkundeGrpUndAlKl']) || isset($_POST['UrkundeGrpUndAlKl_R']) || isset($_POST['UrkundeGrpUndAlKl_S']))&&(($_POST['AuswahlGrpUndA']!='')&&($_POST['AuswahlGUndAlKl']!='')))
{
    if(isset($_POST['UrkundeGrpUndAlKl_R']))
        $_SESSION['Urk_RoderS'] = 1;

    if(isset($_POST['UrkundeGrpUndAlKl_S']))
        $_SESSION['Urk_RoderS'] = 2;

$_SESSION['GrpUndAlKl_Urkunde'] = 1;
$_SESSION['Ur_name_AlKl']=$_POST['AuswahlGUndAlKl'];
$_SESSION['Urk_Grp']=$_POST['AuswahlGrpUndA'];

         echo"
         <script>
          setTimeout(function(){
          location = 'urkunde.php'
          },0)
         </script>
         ";
}

/*

echo"
<br>";

if((isset($_POST['send_GesGrp_Grp']))&&($_POST['Auswahl_GesGrp_Grp']==''))
{
	$style_GesGrp_Grp="border: 2px solid #FF0000";
	$stylezwei_GesGrp_Grp="background-color: #FAFFAD";
}


echo"<p class=\"unter\">Gesamt Gruppe nach Gruppen:</p>";

echo "<select name=\"Auswahl_GesGrp_Grp\" STYLE=\"$style_GesGrp_Grp; $stylezwei_GesGrp_Grp;\" size=\"1\" class=\"Auswahl\"><br>";

echo "<option value=\"\" selected>Wählen...</option>";

for($k=1;$k<=$An_G;$k++) echo "<option value=$k>$k</option>";

echo "</select>";

echo"<input type=\"submit\" name=\"send_GesGrp_Grp\" value=\"Auswahl\">";




if((isset($_POST['send_GesGrp_Grp']))&&($_POST['Auswahl_GesGrp_Grp']!=''))
{

	$_SESSION['GesGrp_Urkunde']=1;
	$_SESSION['Urk_Grp']=$_POST['Auswahl_GesGrp_Grp'];

	echo"
 <script>
 setTimeout(function(){
     location = 'urkunde.php'
   },0)
 </script>
";

}



echo"
<br>";

echo"<p class=\"unter\">Gesamt Gruppe:</p>";

echo"<input type=\"submit\" name=\"GesGrp_Urkunde\" value=\"Weiter\">";



if(isset($_POST['GesGrp_Urkunde']))
{

	$_SESSION['GesGrp_Urkunde']=1;

	echo"
 <script>
 setTimeout(function(){
     location = 'urkunde.php'
   },0)
 </script>
";

}

*/

} //Ende if ZK

echo"
<br>";

         echo"<p class=\"unter\"> Mannschafts-Urkunden:</p>";

         echo"<input type=\"submit\" name=\"sendMann\" value=\"Weiter\">";



if(isset($_POST['sendMann']))
{

$_SESSION['Urk_Art']=1;

echo"
 <script>
 setTimeout(function(){
     location = 'urkunde.php'
   },0)
 </script>
";

}


if($dsatz['Wk_Art']!='BL'){
    $size='25';
    echo "<br>";
    echo"<p class=\"unter\"> Namen für Unterschrift(optional):</p>";
    echo "<input type=\"text\" size=\"$size\" name=\"UrkName1\" value=\"$dsatz[UrkName1]\">";
    echo "<input type=\"text\" size=\"$size\" name=\"UrkName2\" value=\"$dsatz[UrkName2]\">";
    echo "<br>";
    echo "<input type=\"text\" size=\"$size\" name=\"UrkName3\" value=\"$dsatz[UrkName3]\">";
    echo "<input type=\"text\" size=\"$size\" name=\"UrkName4\" value=\"$dsatz[UrkName4]\">";
    echo"<input type=\"submit\" name=\"SafeUrkNamen\" value=\"Speichern\">";
}

if(isset($_POST['SafeUrkNamen']))
{

    dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
                      SET UrkName1= '" . $_POST['UrkName1'] . "',
                      UrkName2= '" . $_POST['UrkName2'] . "',
                      UrkName3='" . $_POST['UrkName3'] . "',
                      UrkName4= '" . $_POST['UrkName4'] . "'
                      ");

    echo"
 <script>
 setTimeout(function(){
     location = 'urkunde_grp.php'
   },0)
 </script>
";

}

?>

</form>
</body>
</html>
