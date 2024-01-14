<?php
session_start();
if (empty($_SESSION['Refresch'])) {
    $_SESSION['Refresch'] = 0;
}
if (empty($_SESSION['Grp'])) {
    $_SESSION['Grp'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Gruppeneinteilung</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/gruppen.css">


</head>

<body>

<form method="post" action="gruppeneinteilung.php">

<p class="kopf"><b>Gruppeneinteilung</b></p>


<?php


ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include "gewichtsklassen/gruppen_funktion.php";
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dsatz = mysqli_fetch_assoc($datenbank);
loginCheck($dsatz);



$heberNachMeldung = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                WHERE heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber");

while($dsatz_aus = mysqli_fetch_assoc($heberNachMeldung)){
    $IdHeber=$dsatz_aus['IdHeber'];
    safe_AlKl_GwKl($IdHeber,$dsatz);
}

$grp = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']."");
$Zahl_Gruppen = mysqli_num_rows($grp);

if($_SESSION['LetzteSeite']==0) echo '<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>';
else							echo '<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>';


 $time=getdate();

 $Zaeler=0;
 $AnzahlAnpassen=0;

while($Zahl_Gruppen >= $Zaeler)                  //Variablen Ersteller zum Z�hlen der Teilnehmer der Gruppen(Mehrkampf)
{

$Zaeler= $Zaeler + 1;


${'vari' . $Zaeler}=0;

}


if($dsatz['Wk_Art'] == "ZK")                                                       //ZK Start!!
{

   if($dsatz['Masters'] != 1)                                                       //ZK Start!!
   {

                                                                         //�ber Tabelle
echo "
<div id=\"divid1\" class=\"examplediv\">
<table border=\"0\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"20%\">
    <col width=\"20%\">
    <col width=\"20%\">
    <col width=\"20%\">
    <col width=\"20%\">

  </colgroup>

  <tr>
";


$x=0;

$C_K=0;
$C_S=0;
$C_J=0;
$C_Jun=0;
$C_E=0;






$dataGwkl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);

$i_var=0;
$Checker=array();

while($d_Gwkl = mysqli_fetch_assoc($dataGwkl))
{

                         $Feldname=$d_Gwkl['Klasse'];

                         $dataVonBis = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']."
                                                 WHERE alters_klassen_zk_".$data_a_db['S_Db'].".Klasse = '$Feldname'");
                         $VonBis = mysqli_fetch_assoc($dataVonBis);

                         $Von=$time['year']-$VonBis['Von'];
                         $Bis=$time['year']-$VonBis['Bis'];

                         $dataHeber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                                WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                                AND heber.AlKl= '$Feldname' ");

                         $DHeber = mysqli_fetch_assoc($dataHeber);

                         if($DHeber != "")  $Checker[$Feldname]= 1;            //$Checker[...]=1 f�r es gibt teilnehmer
                         else $Checker[$Feldname]= 0;



}


$test = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);


while($t = mysqli_fetch_assoc($test)){


         $tt=$t['Klasse'];

         if($Checker[$tt]==1){
                 echo"<td>";
                         zk_Gruppen($tt);                        //einf�gen der Tabellen   Aus /gewichtsklassen/gruppenfunktionen
                 echo"</td>";
         }


}

echo"</tr>";

$D_Gruppen = dbBefehl("SELECT Gruppen
                          FROM gruppen_zeit_".$data_a_db['S_Db']."
                          ");
$zaehler=0;

while($dataD_G = mysqli_fetch_assoc($D_Gruppen))
{
  $zaehler++;

  $var="g" . $zaehler;

  $Data_alters_klassen = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);

         while($D_alters_k = mysqli_fetch_assoc($Data_alters_klassen))
         {
                 $vm="g_" . $D_alters_k['Klasse'] . "_M_" . $zaehler;
                 $vw="g_" . $D_alters_k['Klasse'] . "_W_" . $zaehler;

                 $$var= $$var + $$vm + $$vw;
         }

}

//---------------------------------------------------------------------------------------------------
}else{        // ENDE der 1. if!= masters clouse!
//---------------------------------------------------------------------------------------------------


$Check_K = dbBefehl("SELECT * FROM alters_klassen_masters");
                                                                         //�ber Tabelle
echo "
<div id=\"divid1\" class=\"examplediv\">
<table border=\"0\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"20%\">
    <col width=\"20%\">
    <col width=\"20%\">
    <col width=\"20%\">
    <col width=\"20%\">

  </colgroup>

  <tr>
";


$x=0;

$C_A1=0;
$C_A2=0;
$C_A3=0;
$C_A4=0;
$C_A5=0;
$C_A6=0;
$C_A7=0;
$C_A8=0;
$C_A9=0;
$C_A10=0;
$C_A11=0;
$C_A12=0;
$C_A13=0;

while($d_Check_K = mysqli_fetch_assoc($Check_K))
{

$Von=$time['year'] - $d_Check_K['Von'];
$Bis=$time['year'] - $d_Check_K['Bis'];
                                                                                                      //Zweiteilen da Frauen nur bis Ak
                                                                                                      //5 gehen

                  $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                         WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                         AND heber.Geschlecht = 'Männlich'
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis");

                  $Checker = mysqli_fetch_assoc($heber);

                  if($Checker != "" && $d_Check_K['Klasse'] == "AK0") $C_A0=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK1") $C_A1=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK2") $C_A2=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK3") $C_A3=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK4") $C_A4=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK5") $C_A5=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK6") $C_A6=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK7") $C_A7=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK8") $C_A8=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK9") $C_A9=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK10") $C_A10=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK11") $C_A11=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK12") $C_A12=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK13") $C_A13=1;


                  //echo $Checker['Name']; //. '|' . $d_Check_K['Klasse'] . $Von . "|||||||";

/*
$Von=$time['year'] - $d_Check_K['Von'];
if($d_Check_K['Klasse']=='AK5')$Bis=1900;                                   //Ak geht bei Frauen nur bis 5
elseif(($d_Check_K['Klasse']=='AK6') || ($d_Check_K['Klasse']=='AK7') || ($d_Check_K['Klasse']=='AK8')
 || ($d_Check_K['Klasse']=='AK9') || ($d_Check_K['Klasse']=='AK10')  || ($d_Check_K['Klasse']=='AK11'))$Bis=3000;
else $Bis=$time['year'] - $d_Check_K['Bis'];                                  //Damit niemand in h�rere Aks eingeteilt wird
*/

                  $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                         WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                         AND heber.Geschlecht = 'Weiblich'
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis");

                  $Checker = mysqli_fetch_assoc($heber);

                  if($Checker != "" && $d_Check_K['Klasse'] == "AK0") $C_A0=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK1") $C_A1=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK2") $C_A2=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK3") $C_A3=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK4") $C_A4=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK5") $C_A5=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK6") $C_A6=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK7") $C_A7=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK8") $C_A8=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK9") $C_A9=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK10") $C_A10=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK11") $C_A11=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK12") $C_A12=1;
                  if($Checker != "" && $d_Check_K['Klasse'] == "AK13") $C_A13=1;

}
$zaehler=0;
for($x=0;$x<=13;$x++)
{
  $z='C_A' . $x;
  $AK='AK' . $x;

  if($$z=="1"){
    $zaehler++;
    echo"<td>";
       zk_Gruppen($AK);
    echo"</td>";
  }
  if($zaehler==6){
    echo"</tr>";
    echo"<tr>";
  }


}


echo"</tr>";


$D_Gruppen = dbBefehl("SELECT Gruppen
                       FROM gruppen_zeit_".$data_a_db['S_Db']."
                       ");
$zaehler=0;

while($dataD_G = mysqli_fetch_assoc($D_Gruppen))
{
  $zaehler++;

  $var="g" . $zaehler;

  $Data_alters_klassen = dbBefehl("SELECT * FROM alters_klassen_masters");

         while($D_alters_k = mysqli_fetch_assoc($Data_alters_klassen))
         {
                 $vm="g_" . $D_alters_k['Klasse'] . "_M_" . $zaehler;
                 $vw="g_" . $D_alters_k['Klasse'] . "_W_" . $zaehler;

                 $$var= $$var + $$vm + $$vw;
         }

}




/*
$D_Gruppen = dbBefehl("SELECT Gruppen
                          FROM gruppen_zeit_$data_a_db[S_Db]
                          ");


$zaehler=0;



while($dataD_G = mysqli_fetch_assoc($D_Gruppen))
{
$zaehler=$zaehler + 1;

$var1="g" . $zaehler;

$v1="g_A1_M_" . $zaehler;
$v2="g_A1_W_" . $zaehler;
$v3="g_A2_M_" . $zaehler;
$v4="g_A2_W_" . $zaehler;
$v5="g_A3_M_" . $zaehler;
$v6="g_A3_W_" . $zaehler;
$v7="g_A4_M_" . $zaehler;
$v8="g_A4_W_" . $zaehler;
$v9="g_A5_M_" . $zaehler;
$v10="g_A5_W_" . $zaehler;
$v11="g_A6_M_" . $zaehler;
$v12="g_A6_W_" . $zaehler;
$v13="g_A7_M_" . $zaehler;
$v14="g_A7_W_" . $zaehler;
$v15="g_A8_M_" . $zaehler;
$v16="g_A8_W_" . $zaehler;
$v17="g_A9_M_" . $zaehler;
$v18="g_A9_W_" . $zaehler;
$v19="g_A10_M_" . $zaehler;
$v20="g_A10_W_" . $zaehler;



$$var1 = $$v1 + $$v2 + $$v3 + $$v4 + $$v5 + $$v6 + $$v7 + $$v8 + $$v9 + $$v10 + $$v11 + $$v12 + $$v13 + $$v14 + $$v15 + $$v16 + $$v17 + $$v18 + $$v19 + $$v20;

}

*/



}                       //Ende der if Master clouse


                         //Anfang der Untertabelle
echo"<tr>";

echo"<td colspan=\"4\">";



echo "
<table  class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"120\">
    <col width=\"65\">
    <col width=\"65\">
    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">

  </colgroup>


<thead>

 <tr>
  <th>Gruppen</th>
  <th>Anzahl</th>
  <th>Bridge</th>
  <th>Datum</th>
  <th>Wiege Zeit - Von</th>
  <th>Wiege Zeit - Bis</th>
  <th>Wettkampf Zeit</th>

 </tr>
</thead>
";

      $c=0;


         while($dataGrp = mysqli_fetch_assoc($grp))
         {
            
          $c++;

          $gruppe="g" . $c;
          $Id_grp="Id_grp" . $c;
          $Zeit="Zeit" . $c;
          $Auswahl="Auswahl" . $c;
          $Wiege_Zeit="Wiege_Zeit" . $c;
          $Datum="Datum" . $c;
          $Wiege_Zeit_Bis="Wiege_Zeit_Bis" . $c;


          echo "<input type=\"text\" name=$Id_grp size=\"0\" style=\" visibility:hidden; \" value=\"$dsatz[Id]\"readonly>";

          echo"<tbody>";


                 echo "<tr>";

                   echo "<td>";

                         echo "Gruppe ".$dataGrp['Gruppen'];

                   echo "</td>";


                   echo "<td>";
                        echo $$gruppe;                           //nimmt Dynamisch den Namen der Gruppen variablen an die die Heber z�hlt
                        $Anzahl=$$gruppe;

                   echo "</td>";


                   echo "<td>";                                                                                                // Spalte (Mit drop down bar)

                         echo "<select name=\"$Auswahl\" size=\"1\" class=\"Auswahl\">";



                                 $Bridgen = dbBefehl("SELECT *
                                                         FROM bridgen
                                                         ");

                                 while($dataAuswahl = mysqli_fetch_assoc($Bridgen))
                                 {

                                         if($dataAuswahl['Bridge']==$dataGrp['Bridge'])
                                         {

                                                 echo "<option value=".$dataAuswahl['Bridge']." selected>".$dataAuswahl['Bridge']."</option>";

                                         }
                                         else{
                                                 echo "<option value=".$dataAuswahl['Bridge'].">".$dataAuswahl['Bridge']."</option>";
                                         }


                                 }



                         echo "</select>";

                   echo "</td>";

                   echo "<td>";

                         echo "<input type=\"date\" name=$Datum size=\"8\" value=\"".$dataGrp['Datum']."\">";

                   echo "</td>";


                   echo "<td>";


                         echo "<input type=\"text\" name=$Wiege_Zeit size=\"3\" value=\"".$dataGrp['Wiege_Zeit']."\">Uhr";


                   echo "</td>";

                   echo "<td>";


                         echo "<input type=\"text\" name=$Wiege_Zeit_Bis size=\"3\" value=\"".$dataGrp['Wiege_Zeit_Bis']."\">Uhr";


                   echo "</td>";

                   echo "<td>";


                         echo "<input type=\"text\" name=$Zeit size=\"3\" value=\"".$dataGrp['WK_Zeit']."\">Uhr";


                   echo "</td>";



               echo "</tr>";




            if(isset($_POST['speichern']))
            {

               $x=1;



                    dbBefehl("UPDATE user_blocker_".$data_a_db['S_Db']." SET GrpEinteilung = '1'");

                    dbBefehl("UPDATE gruppen_zeit_".$data_a_db['S_Db']."
                                 SET WK_Zeit= '" . $_POST['Zeit' . $c] . "', Wiege_Zeit= '" . $_POST['Wiege_Zeit' . $c] . "',
                                 Bridge= '" . $_POST['Auswahl' . $c] . "', Datum= '" . $_POST['Datum' . $c] . "',
                                 Anzahl= '$Anzahl', Wiege_Zeit_Bis= '" . $_POST['Wiege_Zeit_Bis' . $c] . "'
                                 WHERE Gruppen='$c'");

            }


         }



echo"</tbody> ";

echo "</table>";


echo"

<br>

Gruppen <input type=\"submit\" name=\"plus\" value=\"+\">

<input type=\"submit\" name=\"minus\" value=\"-\">
";







echo "</tr>";

echo "</table>";


echo"

<br>
<br>
<input id=\"always-safe\" type=\"submit\" name=\"speichern\" value=\"Speichern\">

<br>
<br>




";



if(isset($_POST['plus']))
{

    $x=1;


         $g_plus = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


         $num_g = mysqli_num_rows($g_plus);

         $neu=$num_g + 1;

         dbBefehl("INSERT INTO gruppen_zeit_".$data_a_db['S_Db']." (Gruppen, WK_Zeit, Wiege_Zeit, Bridge)
                      Values ('$neu', '00:00', '00:00', '1')");



}



if(isset($_POST['minus']))
{

    $x=1;


         $g_plus = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


         $num_g = mysqli_num_rows($g_plus);


                 dbBefehl("DELETE FROM gruppen_zeit_".$data_a_db['S_Db']."
                              WHERE Gruppen ='$num_g'");



}




if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'gruppeneinteilung.php'
   },0)
 </script>
";
}








}else{                                                                            //Ende der Gruppeneinteilung f�r Zweikampf
                                                                                  //Und Anfang f�r Mehrkampf einteilung


echo '<br><br>';

if(isset($_POST['übernehmen'])){
  $x=1;
  $_SESSION['Refresch'] = 1;
                    dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
                                 SET Gruppenteiler= '" . $_POST['grp-teiler'] . "'
                                 ");
}


include "gruppeneinteilung/grp_mk.php";                                                      //Einf�gen der Grp Einteilung


echo "
<table  class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"120\">
    <col width=\"80\">
    <col width=\"65\">
    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">

  </colgroup>


<thead>

 <tr>
  <th>Gruppen</th>
  <th>#Wk-G</th>
  <th>Bridge</th>
  <th>Datum</th>
  <th>Wiege Zeit - Von</th>
  <th>Wiege Zeit - Bis</th>
  <th>Wettkampf Zeit</th>
  <th>Athletik Zeit</th>

 </tr>
</thead>
";

      $c=0;

      $grp = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


         while($dataGrp = mysqli_fetch_assoc($grp))
         {
         $c++;

         $heber2 = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db']."
                               WHERE Gruppe = '$c'
                               ");

         $numb=mysqli_num_rows($heber2);

          $gruppe="g" . $c;
          $Id_grp="Id_grp" . $c;
          $Zeit="Zeit" . $c;
          $Auswahl="Auswahl" . $c;
          $Wiege_Zeit="Wiege_Zeit" . $c;
          $Wiege_Zeit_Bis="Wiege_Zeit_Bis" . $c;
          $Athletik_Zeit="Athletik_Zeit" . $c;
          $Datum="Datum" . $c;

          echo "<input type=\"text\" name=$Id_grp size=\"0\" style=\" visibility:hidden; \" value=\"".$dsatz['Id']."\"readonly>";

          echo"<tbody>";


                 echo "<tr>";

                   echo "<td>";



                         echo "Gruppe " . $c;


                   echo "</td>";


                   echo "<td>";

                        echo $numb;                           //nimmt Dynamisch den Namen der Gruppen variablen an die die Heber z�hlt

                   echo "</td>";




                   echo "<td>";                                                                                                // Spalte (Mit drop down bar)

                         echo "<select name=\"$Auswahl\" size=\"1\" class=\"Auswahl\">";



                                 $Bridgen = dbBefehl("SELECT * FROM bridgen");


                                 while($dataAuswahl = mysqli_fetch_assoc($Bridgen))
                                 {

                                         if($dataAuswahl['Bridge']==$dataGrp['Bridge'])
                                         {

                                                 echo "<option value=".$dataAuswahl['Bridge']." selected>".$dataAuswahl['Bridge']."</option>";

                                         }
                                         else{
                                                 echo "<option value=".$dataAuswahl['Bridge'].">".$dataAuswahl['Bridge']."</option>";
                                         }


                                 }



                         echo "</select>";

                   echo "</td>";

                   echo "<td>";

                         echo "<input type=\"date\" name=$Datum size=\"8\" value=\"".$dataGrp['Datum']."\">";

                   echo "</td>";


                   echo "<td>";

                         echo "<input type=\"text\" name=$Wiege_Zeit size=\"3\" value=\"".$dataGrp['Wiege_Zeit']."\">Uhr";

                   echo "</td>";


                   echo "<td>";

                         echo "<input type=\"text\" name=$Wiege_Zeit_Bis size=\"3\" value=\"".$dataGrp['Wiege_Zeit_Bis']."\">Uhr";

                   echo "</td>";



                   echo "<td>";


                         echo "<input type=\"text\" name=$Zeit size=\"3\" value=\"".$dataGrp['WK_Zeit']."\">Uhr";


                   echo "</td>";



                   echo "<td>";


                         echo "<input type=\"text\" name=$Athletik_Zeit size=\"3\" value=\"".$dataGrp['Athletik_Zeit']."\">Uhr";


                   echo "</td>";



               echo "</tr>";




            if(isset($_POST['speichern']))
            {
               $x=1;
                    dbBefehl("UPDATE user_blocker_".$data_a_db['S_Db']." SET GrpEinteilung = '1'");

                    dbBefehl("UPDATE gruppen_zeit_".$data_a_db['S_Db']."
                                 SET WK_Zeit= '" . $_POST['Zeit' . $c] . "', Wiege_Zeit= '" . $_POST['Wiege_Zeit' . $c] . "',
                                 Bridge= '" . $_POST['Auswahl' . $c] . "', Athletik_Zeit= '" . $_POST['Athletik_Zeit' . $c] . "',
                                 Datum= '" . $_POST['Datum' . $c] . "', Anzahl= '$numb', Wiege_Zeit_Bis= '" . $_POST['Wiege_Zeit_Bis' . $c] . "'
                                 WHERE Gruppen='$c'");

            }
         }



echo"</tbody> ";

echo "</table>";

echo"

<br>

Gruppen <input type=\"submit\" name=\"plus\" value=\"+\">

<input type=\"submit\" name=\"minus\" value=\"-\">
";

echo"<br><br><br><input type=\"submit\" id=\"always-safe\" name=\"speichern\" value=\"speichern\"> ";


if(isset($_POST['plus']))
{

    $x=1;


         $g_plus = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

         $num_g = mysqli_num_rows($g_plus);

         $neu=$num_g + 1;

         dbBefehl("INSERT INTO gruppen_zeit_".$data_a_db['S_Db']." (Gruppen, WK_Zeit, Wiege_Zeit, Bridge, Athletik_Zeit)
                      Values ('$neu', '00:00', '00:00', '1', '00:00')");



}


if(isset($_POST['minus']))
{

    $x=1;


         $g_plus = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);


         $num_g = mysqli_num_rows($g_plus);


                 dbBefehl("DELETE FROM gruppen_zeit_".$data_a_db['S_Db']."
                              WHERE Gruppen ='$num_g'");



}

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'gruppeneinteilung.php'
   },0)
 </script>
";
}


}


?>

</form>
</body>
</html>
