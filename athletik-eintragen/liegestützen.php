<?php

echo"<p class=\"kopf\" id='page-break'><b>Liegestützen von Grp:" . $_SESSION['GrpAthEin'] . "</b></p>";

include "heber_abfrage.php";

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
echo"<tbody>";

$i = 0;
while($dsatz = mysqli_fetch_assoc($heber_abfrage))
{
$i++;
$Id="Id" . $i;
$V1="V1" . $i;

echo "<input type=\"text\" name='$Id' size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdHeber']."\"readonly>";

 echo "<tr>";
     echo "<td>";
                 echo "<span style=\"width:125px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];
     echo "</td>";

     echo"<td>";
                 echo "<input type=\"text\" name='$V1' size=\"2\" value=\"".$dsatz['Liegestuetz']."\"> Wdh";
     echo"</td>";
 echo "</tr>";

 if(isset($_POST['speichern']))
 {
                 $x=1;

                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Liegestuetz= '" . $_POST['V1' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

 }

}    //While schliesen

echo "</tbody>";
echo "</table>";
?>
