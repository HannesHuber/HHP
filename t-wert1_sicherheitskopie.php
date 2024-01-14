<?php
session_start();
if (empty($_SESSION['KrAnzahl'])) {
    $_SESSION['KrAnzahl'] = 0;
}
if (empty($_SESSION['KrId'])) {
    $_SESSION['KrId'] = -1;
}
if (empty($_SESSION['KrV'])) {
    $_SESSION['KrV'] = -1;
}
if (empty($_SESSION['KrArt'])) {
    $_SESSION['KrArt'] = '';
}
if (empty($_SESSION['KrHGw'])) {
    $_SESSION['KrHGw'] = -1;
}
if (empty($_SESSION['B1'])) {
    $_SESSION['B1'] = 0;
}
if (empty($_SESSION['GueltigK1'])) {
    $_SESSION['GueltigK1'] = '';
}
if (empty($_SESSION['reloadK1'])) {
    $_SESSION['reloadK1'] = 0;
}
if (empty($_SESSION['T-WertK1'])) {
    $_SESSION['T-WertK1'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="viewport" content="initial-scale=1.0, width=device-width">

<link rel="stylesheet" type="text/css" href="CSS/kampfrichter.css">
<link rel="stylesheet" type="text/css" href="CSS/ButtonNumpad.css">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script>

    function add (number){
  //  var t0 = performance.now();
         document.getElementById("demo").value += number;
  //  var t1 = performance.now();
  //  alert(t1-t0);
    }
    function oneback (){
         document.getElementById("demo").value = document.getElementById("demo").value.slice(0, -1);
    }
    function clearall (){
         document.getElementById("demo").value = "";
    }
    function komma (){
         document.getElementById("demo").value += ",";
    }

</script>

</head>

<body>


<form method="POST" action="t-wert1.php">


<?php

ob_start ();
error_reporting(0);

include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();

$data_a_db[S_Db]=$_SESSION['WeK'];

$Gruppen = dbBefehl("SELECT * FROM gruppen_zeit_$data_a_db[S_Db]");

$Art = $_SESSION['KrArt'];
$Id = $_SESSION['KrId'];
$Versuch= $_SESSION['KrV'];
$Hgw = $_SESSION['KrHGw'];

$heber = dbBefehl("SELECT * FROM heber WHERE IdHeber = '$Id' ");

$dsatz = mysqli_fetch_assoc($heber);

$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_$data_a_db[S_Db]");

$dataStamm = mysqli_fetch_assoc($dbstamm);
$_SESSION['KrAnzahl']=$dataStamm[Kampfrichter];

if($dataStamm[Kampfrichter]>1)$G_art1='G_' . $Art . '_1';
if($dataStamm[Kampfrichter]>1)$T_art1='T_' . $Art . '_1';


echo'<table class="ttable">';
  echo'<tr>';
    echo'<td colspan="4"><input id="demo" maxlength="4" size="4" type="text" name="T-Wert" readonly></td>';  //type="number" step="0.1"
  echo'</tr>';
  echo'<tr>';
    echo'<td><button class="myButton" type="button" onclick="add(7)">7</button></td>';                //type="button" unerlässlich sonst reload!!
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

                 if($dataStamm[Kampfrichter]>1){
                         dbBefehl("UPDATE tmp_kr_check_$bridge
                                      SET K1= '1'");

                         if($dataStamm[Wk_Art]=='M_m_T'){

                                 dbBefehl("UPDATE heber_wk_$data_a_db[S_Db]
                                                 SET $G_art1= 'Ja', $T_art1= '$technikpunkt'
                                                 WHERE IdHeber='$Id'
                                                 AND Versuch='$Versuch'");

                         }else{

                                 dbBefehl("UPDATE heber_wk_$data_a_db[S_Db]
                                                 SET $G_art1= 'Ja'
                                                 WHERE IdHeber='$Id'
                                                 AND Versuch='$Versuch'");

                         }

                 }


                 $_SESSION['T-WertK1']=$technikpunkt;
                 $_SESSION['B1']=1;
                 $_SESSION['GueltigK1']='Ja';

                 header('Location: kampfrichter1.php');
                 exit();



         }
}


?>


</body>
</html>