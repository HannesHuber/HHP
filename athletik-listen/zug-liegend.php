<?php
echo"<p class=\"kopf\" id='page-break'><b>Zug liegend von Grp:" . $_SESSION['At_Grp'] . "</b></p>";

if($test==true){
  if(($Alter<=15) && ($Ges=='Männlich')) $Prozent=80;
  if(($Alter<=15) && ($Ges=='Weiblich')) $Prozent=60;
  if(($Alter==16) && ($Ges=='Männlich')) $Prozent=90;
  if(($Alter==16) && ($Ges=='Weiblich')) $Prozent=67;
  if(($Alter==17) && ($Ges=='Männlich')) $Prozent=100;
  if(($Alter==17) && ($Ges=='Weiblich')) $Prozent=75;

echo"<p class=\"notiz\"><b>Grp: " . $_SESSION['At_Grp'] . " Alter: " . $Alter . " Geschlecht: " . $Ges
 . ". => Hantel gw.: " . $Prozent . "% vom Kg.</b></p>";
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
                 echo "<span style=\"width:125px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];
     echo "</td>";

    if($test==false){
      $Alter=$time['year']-$dsatz['Jahrgang'];
      if(($Alter<=15) && ($Ges=='Männlich')) $Prozent=80;
      if(($Alter<=15) && ($Ges=='Weiblich')) $Prozent=60;
      if(($Alter==16) && ($Ges=='Männlich')) $Prozent=90;
      if(($Alter==16) && ($Ges=='Weiblich')) $Prozent=67;
      if(($Alter==17) && ($Ges=='Männlich')) $Prozent=100;
      if(($Alter==17) && ($Ges=='Weiblich')) $Prozent=75;
    }

    $HantelGw=$dsatz['Gewicht']*($Prozent/100);

     echo"<td>";
                 echo $HantelGw . "kg";
     echo"</td>";


     echo"<td>";
                 echo "<input type=\"text\" name=\"Zug1\" size=\"2\" value=\"\" readonly> Wdh";
     echo"</td>";
 echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
