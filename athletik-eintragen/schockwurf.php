<?php
echo"<p class=\"kopf\" id='page-break'><b>Schockwurf von Grp:" . $_SESSION['GrpAthEin'] . "</b></p>";

if($test==true){
  if($Alter<=10) $KugelGw=2;
  if((($Alter==11) || ($Alter==12)) && ($Ges=='Männlich')) $KugelGw=3;
  if((($Alter==11) || ($Alter==12)) && ($Ges=='Weiblich')) $KugelGw=2;
  if((($Alter==13) || ($Alter==14)) && ($Ges=='Männlich')) $KugelGw=4;
  if((($Alter==13) || ($Alter==14)) && ($Ges=='Weiblich')) $KugelGw=3;
  if((($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Männlich')) $KugelGw=5;
  if((($Alter==15) || ($Alter==16) || ($Alter==17)) && ($Ges=='Weiblich')) $KugelGw=4;

echo"<p class=\"notiz\"><b>Die Grp " . $_SESSION['GrpAthEin'] . " ist einheitlich vom Alter: " . $Alter . " und dem
Geschlecht: " . $Ges . ". D.h. muss die " . $KugelGw . "kg Kugel genommen werden.</b></p>";
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

$i = 0;
while($dsatz = mysqli_fetch_assoc($heber_abfrage))
{
$Ges=$dsatz['Geschlecht'];
$i++;
$Id="Id" . $i;
$V1="V1" . $i;
$V2="V2" . $i;
$V3="V3" . $i;

echo "<input type=\"text\" name='$Id' size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdHeber']."\"readonly>";

 echo "<tr>";
     echo "<td>";
                 echo "<span style=\"width:125px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
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
                 echo "<input type=\"text\" name='$V1' size=\"2\" value=\"".$dsatz['Schockwurf']."\"> cm";
     echo"</td>";


     echo"<td>";
                 echo "<input type=\"text\" name='$V2' size=\"2\" value=\"".$dsatz['Schockwurf2']."\"> cm";

     echo"</td>";


     echo"<td>";
                 echo "<input type=\"text\" name='$V3' size=\"2\" value=\"".$dsatz['Schockwurf3']."\"> cm";
     echo"</td>";
 echo "</tr>";

 if(isset($_POST['speichern']))
{
	$x=1;
	$_POST['V1' . $i]=str_replace(",",".", $_POST['V1' . $i]);
	$_POST['V2' . $i]=str_replace(",",".", $_POST['V2' . $i]);
	$_POST['V3' . $i]=str_replace(",",".", $_POST['V3' . $i]);

                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Schockwurf= '" . $_POST['V1' . $i] . "', Schockwurf2= '" . $_POST['V2' . $i] . "',
                              Schockwurf3= '" . $_POST['V3' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
}

}    //While schliesen

echo "</tbody>";
echo "</table>";
?>
