<?php

echo"<p class=\"kopf\" id='page-break'><b>Bankdrücken von Grp:" . $_SESSION['At_Grp'] . "</b></p>";

if($test==true){
      if(($Alter<=10) && ($Ges==Männlich)) $Prozent=50;
      if(($Alter<=10) && ($Ges==Weiblich)) $Prozent=45;
      if(($Alter==11) && ($Ges==Männlich)) $Prozent=57;
      if(($Alter==11) && ($Ges==Weiblich)) $Prozent=48;
      if(($Alter==12) && ($Ges==Männlich)) $Prozent=65;
      if(($Alter==12) && ($Ges==Weiblich)) $Prozent=52;
      if(($Alter==13) && ($Ges==Männlich)) $Prozent=70;
      if(($Alter==13) && ($Ges==Weiblich)) $Prozent=57;
      if(($Alter==14) && ($Ges==Männlich)) $Prozent=75;
      if(($Alter==14) && ($Ges==Weiblich)) $Prozent=63;

echo"<p class=\"notiz\"><b>Grp: " . $_SESSION['At_Grp'] . " Alter: " . $Alter . " Geschlecht: " . $Ges
 . " =>Hantelgewicht " . $Prozent . "% vom Kg.</b></p>";
}

include "heber_abfrage.php";


echo "
<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"300\">
    <col width=\"100\">
    <col width=\"100\">
  </colgroup>

<thead>
 <tr>
  <th>Name</th>
  <th>H-Gw</th>
  <th>V1</th>
 </tr>
</thead>
";


echo"<tbody>";

while($dsatz = mysqli_fetch_assoc($heber_abfrage))
{
 $Ges=$dsatz['Geschlecht'];

 echo "<tr>";
     echo "<td>";
                 echo "<span style=\"width:125px;display:block;float:left;\"> $dsatz[Name] </span>";
                 echo "$dsatz[Vorname]";
     echo "</td>";

    if($test==false){
      $Alter=$time['year']-$dsatz['Jahrgang'];
      if(($Alter<=10) && ($Ges==Männlich)) $Prozent=50;
      if(($Alter<=10) && ($Ges==Weiblich)) $Prozent=45;
      if(($Alter==11) && ($Ges==Männlich)) $Prozent=57;
      if(($Alter==11) && ($Ges==Weiblich)) $Prozent=48;
      if(($Alter==12) && ($Ges==Männlich)) $Prozent=65;
      if(($Alter==12) && ($Ges==Weiblich)) $Prozent=52;
      if(($Alter==13) && ($Ges==Männlich)) $Prozent=70;
      if(($Alter==13) && ($Ges==Weiblich)) $Prozent=57;
      if(($Alter==14) && ($Ges==Männlich)) $Prozent=75;
      if(($Alter==14) && ($Ges==Weiblich)) $Prozent=63;
    }

    $HantelGw=$dsatz['Gewicht']*($Prozent/100);

     echo"<td>";
                 echo $HantelGw . "kg";
     echo"</td>";


     echo"<td>";
                 echo "<input type=\"text\" name=\"Banckdrücken1\" size=\"2\" value=\"\" readonly> Wdh";
     echo"</td>";
 echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
