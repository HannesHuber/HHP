<?php
echo"<p class=\"kopf\" id='page-break'><b>Schockwurf von Grp:" . $_SESSION['At_Grp'] . "</b></p>";

if($test==true){
  if($Alter<=10) $KugelGw=2;
  if((($Alter==11) || ($Alter==12)) && ($Ges=='Männlich')) $KugelGw=3;
  if((($Alter==11) || ($Alter==12)) && ($Ges=='Weiblich')) $KugelGw=2;
  if((($Alter==13) || ($Alter==14)) && ($Ges=='Männlich')) $KugelGw=4;
  if((($Alter==13) || ($Alter==14)) && ($Ges=='Weiblich')) $KugelGw=3;
  if((($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Männlich')) $KugelGw=5;
  if((($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Weiblich')) $KugelGw=4;

echo"<p class=\"notiz\"><b>Grp: " . $_SESSION['At_Grp'] . " Alter: " . $Alter . " Geschlecht: " . $Ges . ". => Kugel gw.:
" . $KugelGw . "</b></p>";
}

include "heber_abfrage.php";

if($test==true){
echo "
<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"300\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
  </colgroup>

<thead>
 <tr>
  <th>Name</th>
  <th>V1</th>
  <th>V2</th>
  <th>V3</th>
 </tr>
</thead>
";
}else{
echo "
<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"0\">
  <colgroup>
    <col width=\"300\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
    <col width=\"100\">
  </colgroup>

<thead>
 <tr>
  <th>Name</th>
  <th>Ku-Gw</th>
  <th>V1</th>
  <th>V2</th>
  <th>V3</th>
 </tr>
</thead>
";
}

echo"<tbody>";

while($dsatz = mysqli_fetch_assoc($heber_abfrage))
{
 $Ges=$dsatz['Geschlecht'];

 echo "<tr>";
     echo "<td>";
                 echo "<span id='tab'> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];
     echo "</td>";

    if($test==false){
      $Alter=$time['year']-$dsatz['Jahrgang'];
      if($Alter<=10) $KugelGw=2;
      if((($Alter==11) || ($Alter==12)) && ($Ges=='Männlich')) $KugelGw=3;
      if((($Alter==11) || ($Alter==12)) && ($Ges=='Weiblich')) $KugelGw=2;
      if((($Alter==13) || ($Alter==14)) && ($Ges=='Männlich')) $KugelGw=4;
      if((($Alter==13) || ($Alter==14)) && ($Ges=='Weiblich')) $KugelGw=3;
      if((($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Männlich')) $KugelGw=5;
      if((($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Weiblich')) $KugelGw=4;

     echo"<td>";
                 echo $KugelGw . "kg";
     echo"</td>";
    }

     echo"<td>";
                 echo "<input type=\"text\" name=\"Schock1\" size=\"2\" value=\"\" readonly> cm";
     echo"</td>";


     echo"<td>";
                 echo "<input type=\"text\" name=\"Schock2\" size=\"2\" value=\"\" readonly> cm";
     echo"</td>";


     echo"<td>";
                 echo "<input type=\"text\" name=\"Schock3\" size=\"2\" value=\"\" readonly> cm";
     echo"</td>";
 echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
