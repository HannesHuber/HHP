<?php
echo"<p class=\"kopf\" id='page-break'><b>Klimmziehen von Grp:" . $_SESSION['GrpAthEin'] . "</b></p>";

if($test==true){
  if(($Alter<=10) || ($Alter==11) || ($Alter==12)) $MaxWdh=10;
  if(($Alter==13) && ($Ges=='Männlich')) $MaxWdh=12;
  if(($Alter==13) && ($Ges=='Weiblich')) $MaxWdh=10;
  if((($Alter==14) || ($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Männlich')) $MaxWdh=15;
  if((($Alter==14) || ($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Weiblich')) $MaxWdh=12;

echo"<p class=\"notiz\"><b>Die Grp " . $_SESSION['GrpAthEin'] . " ist einheitlich vom Alter: " . $Alter . " und dem Geschlecht: " . $Ges
 . ". D.h. ist die max. Wdh-Anzahl: " . $MaxWdh . "Wdh.</b></p>";
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

$i = 0;
while($dsatz = mysqli_fetch_assoc($heber_abfrage))
{
$Ges=$dsatz['Geschlecht'];
$i++;
$Id="Id" . $i;
$V1="V1" . $i;

echo "<input type=\"text\" name='$Id' size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdHeber']."\"readonly>";

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

     if($dsatz['Klimmziehen']>$MaxWdh)
     {
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
     }else{
      $style='';
      $stylezwei='';
     }

     echo"<td>";
                 echo "<input type=\"text\" STYLE=\"$style; $stylezwei;\" name='$V1' size=\"2\" value=\"".$dsatz['Klimmziehen']."\"> Wdh";
     echo"</td>";
 echo "</tr>";

 if(isset($_POST['speichern']))
 {
                 $x=1;

                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Klimmziehen= '" . $_POST['V1' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

 }

}    //While schliesen

echo "</tbody>";
echo "</table>";
?>
