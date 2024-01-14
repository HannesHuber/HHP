<?php
echo"<p class=\"kopf\" id='page-break'><b>Zug liegend von Grp:" . $_SESSION['GrpAthEin'] . "</b></p>";

if($test==true){
  if(($Alter<=15) && ($Ges=='Männlich')) $Prozent=80;
  if(($Alter<=15) && ($Ges=='Weiblich')) $Prozent=60;
  if(($Alter==16) && ($Ges=='Männlich')) $Prozent=90;
  if(($Alter==16) && ($Ges=='Weiblich')) $Prozent=67;
  if(($Alter==17) && ($Ges=='Männlich')) $Prozent=100;
  if(($Alter==17) && ($Ges=='Weiblich')) $Prozent=75;

echo"<p class=\"notiz\"><b>Die Grp " . $_SESSION['GrpAthEin'] . " ist einheitlich vom Alter: " . $Alter . " und dem Geschlecht: " . $Ges
 . ". D.h. ist das Hantelgewicht " . $Prozent . "% vom Körpergewicht.</b></p>";
}
echo"<p class=\"notiz\"><b>Die maximale Wiederholungszahl beträgt 15Wdh</b></p>";

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
      if(($Alter==15) && ($Ges=='Männlich')) $Prozent=80;
      if(($Alter==15) && ($Ges=='Weiblich')) $Prozent=60;
      if(($Alter==16) && ($Ges=='Männlich')) $Prozent=90;
      if(($Alter==16) && ($Ges=='Weiblich')) $Prozent=67;
      if(($Alter==17) && ($Ges=='Männlich')) $Prozent=100;
      if(($Alter==17) && ($Ges=='Weiblich')) $Prozent=75;
    }

    $HantelGw=$dsatz['Gewicht']*($Prozent/100);

     echo"<td>";
                 echo $HantelGw . "kg";
     echo"</td>";

     if($dsatz['Zug']>15)
     {
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
     }else{
      $style='';
      $stylezwei='';
     }


     echo"<td>";
                 echo "<input type=\"text\" STYLE=\"$style; $stylezwei;\"  name='$V1' size=\"2\" value=\"".$dsatz['Zug']."\"> Wdh";
     echo"</td>";
 echo "</tr>";

 if(isset($_POST['speichern']))
 {
                 $x=1;

                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Zug= '" . $_POST['V1' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

 }

}    //While schliesen

echo "</tbody>";
echo "</table>";
?>
