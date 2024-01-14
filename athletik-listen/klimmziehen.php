<?php
echo"<p class=\"kopf\" id='page-break'><b>Klimmziehen von Grp:" . $_SESSION['At_Grp'] . "</b></p>";

if($test==true){
  if(($Alter<=10) || ($Alter==11) || ($Alter==12)) $MaxWdh=10;
  if(($Alter==13) && ($Ges==Männlich)) $MaxWdh=12;
  if(($Alter==13) && ($Ges==Weiblich)) $MaxWdh=10;
  if((($Alter==14) || ($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges==Männlich)) $MaxWdh=15;
  if((($Alter==14) || ($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges==Weiblich)) $MaxWdh=12;

echo"<p class=\"notiz\"><b>Grp: " . $_SESSION['At_Grp'] . " Alter: " . $Alter . " Geschlecht: " . $Ges
 . " => max: " . $MaxWdh . "Wdh.</b></p>";
}

include "heber_abfrage.php";

if($test==true){
echo "
<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"300\">
    <col width=\"100\">
  </colgroup>

<thead>
 <tr>
  <th>Name</th>
  <th>V1</th>
 </tr>
</thead>
";
}else{
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
  <th>Max Wdh</th>
  <th>V1</th>
 </tr>
</thead>
";
}

echo"<tbody>";

while($dsatz = mysqli_fetch_assoc($heber_abfrage))
{
 $Ges=$dsatz[Geschlecht];

 echo "<tr>";
     echo "<td>";
                 echo "<span style=\"width:125px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];
     echo "</td>";

    if($test==false){
      $Alter=$time['year']-$dsatz['Jahrgang'];
      if(($Alter<=10) || ($Alter==11) || ($Alter==12)) $MaxWdh=10;
      if(($Alter==13) && ($Ges=='Männlich')) $MaxWdh=12;
      if(($Alter==13) && ($Ges=='Weiblich')) $MaxWdh=10;
      if((($Alter==14) || ($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Männlich')) $MaxWdh=15;
      if((($Alter==14) || ($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Weiblich')) $MaxWdh=12;

     echo"<td>";
                 echo $MaxWdh . "Wdh";
     echo"</td>";
    }

     echo"<td>";
                 echo "<input type=\"text\" name=\"Klimmziehen1\" size=\"2\" value=\"\" readonly> Wdh";
     echo"</td>";
 echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
