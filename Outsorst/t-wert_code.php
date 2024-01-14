<?php

ob_start ();
error_reporting(0);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
include 'funktionen/kampfrichter_pads.php';
$db=dbVerbindung();

$data_a_db['S_Db']=$_SESSION['WeK'];

$_SESSION['Lampe_Signal1'] = 0;	//Damit Lampe ausgeht

$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

if($KR_numb== 1)  $KR_numb='';       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss

$Art = $_SESSION['KrArt' . $KR_numb];
$Id = $_SESSION['KrId' . $KR_numb];
$Versuch= $_SESSION['KrV' . $KR_numb];
$Hgw = $_SESSION['KrHGw' . $KR_numb];
$TWert = 0;              //By default

if($KR_numb== '')  $KR_numb=1;       //Damit ich JQuery/new_load_KR1.php nicht anpassen muss

$bridge = $_SESSION['KR' . $KR_numb . '_Bridge'];

$heber = dbBefehl("SELECT * FROM heber WHERE IdHeber = '$Id' ");

$dsatz = mysqli_fetch_assoc($heber);

$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

$dataStamm = mysqli_fetch_assoc($dbstamm);
$_SESSION['KrAnzahl']=$dataStamm['Kampfrichter'];

if($dataStamm['Kampfrichter']>1)$G_art='G_' . $Art . '_1';
if($dataStamm['Kampfrichter']>1)$T_art='T_' . $Art . '_1';


echo'<table class="ttable">';
  echo'<tr>';
    echo'<td colspan="4"><input id="demo" maxlength="4" size="4" type="text" name="T-Wert" readonly></td>';  //type="number" step="0.1"
  echo'</tr>';
  echo'<tr>';
    echo'<td><button class="myButton" type="button" onclick="add(7)">7</button></td>';                //type="button" unerl�sslich sonst reload!!
    echo'<td><button class="myButton" type="button" onclick="add(8)">8</button></td>';
    echo'<td><button class="myButton" type="button" onclick="add(9)">9</button></td>';
    echo'<td><button class="myButton" type="button" onclick="oneback()"><-</button></td>';
  echo'</tr>';
  echo'<tr>';
    echo'<td><button class="myButton" type="button" onclick="add(4)">4</button></td>';
    echo'<td><button class="myButton" type="button" onclick="add(5)">5</button></td>';
    echo'<td><button class="myButton" type="button" onclick="add(6)">6</button></td>';
    echo'<td><button class="myButton" type="button" onclick="clearall()">Neu</button></td>';
  echo'</tr>';
  echo'<tr>';
    echo'<td><button class="myButton" type="button" onclick="add(1)">1</button></td>';
    echo'<td><button class="myButton" type="button" onclick="add(2)">2</button></td>';
    echo'<td><button class="myButton" type="button" onclick="add(3)">3</button></td>';
    echo'<td><button class="myButton" type="button"></button></td>';
  echo'</tr>';
  echo'<tr>';
    echo'<td><button class="myButton" type="button"></button></td>';
    echo'<td><button class="myButton" type="button" onclick="add(this.innerHTML)">0</button></td>';
    echo'<td><button class="myButton" type="button" onclick="komma()">,</button></td>';
    echo'<td><input class="myButton" type="submit" name="T-Send" value="Send"></td>';
  echo'</tr>';
echo'</table>';




if(isset($_POST['T-Send'])){

         $number= str_replace(",",".", htmlspecialchars($_POST['T-Wert']));
         $technikpunkt = number_format ( $number , $decimals = 1 , $dec_point = "." , $thousands_sep = "" );

         if($technikpunkt>10){

                 echo'<script type="text/javascript" language="Javascript">
                 alert("Der Wert: ' . $technikpunkt . ' ist nicht erlaubt!")
                 </script>';

         }else{

                 if($dataStamm['Kampfrichter']>1){

                 	$Wk_numb=$data_a_db['S_Db'];
                 	$Wk_Art=$dataStamm['Wk_Art'];
                 	$Kr_Gueltig='Ja';

                 	KR_Singel_Safe_To_heber_wk($Wk_numb, $Wk_Art, $KR_numb, $Art, $Id, $Versuch, $Kr_Gueltig, $technikpunkt);

                         dbBefehl("UPDATE tmp_kr_check_$bridge
                                      SET K$KR_numb= '1'");

                 }

                 $_SESSION['T-WertK' . $KR_numb]=$technikpunkt;
                 $_SESSION['B' . $KR_numb]=1;
                 $_SESSION['GueltigK' . $KR_numb]='Ja';

                 header('Location: kampfrichter_wertung' . $KR_numb . '.php');
                 exit();



         }
}


?>


</body>
</html>
