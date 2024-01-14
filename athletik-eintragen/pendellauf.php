<?php                                                                                          //Start Pendellauf
echo"<p class=\"kopf\"><b>Pendellauf von Grp:" . $_SESSION['GrpAthEin'] . "</b></p>";

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
  <th>V1</th>
  <th>V2</th>
 </tr>
</thead>
";
echo"<tbody>";

$i = 0;
while($dsatz = mysqli_fetch_assoc($heber_abfrage))
{
$i++;
$Id="Id" . $i;
$Pendel1="Pendel1" . $i;
$Pendel2="Pendel2" . $i;

echo "<input type=\"text\" name='$Id' size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdHeber']."\"readonly>";

 echo "<tr>";
     echo "<td>";
                 echo "<span style=\"width:125px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];
     echo "</td>";


     echo"<td>";
                 echo "<input type=\"text\" name='$Pendel1' size=\"2\" value=\"".$dsatz['Pendellauf']."\"> sek";
     echo"</td>";


     echo"<td>";
                 echo "<input type=\"text\" name='$Pendel2' size=\"2\" value=\"".$dsatz['Pendel2']."\"> sek";

     echo"</td>";
 echo "</tr>";

 if(isset($_POST['speichern']))
{
         $x=1;
         $_POST['Pendel1' . $i]=str_replace(",",".", $_POST['Pendel1' . $i]);
         $_POST['Pendel2' . $i]=str_replace(",",".", $_POST['Pendel2' . $i]);

                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Pendellauf= '" . $_POST['Pendel1' . $i] . "', Pendel2= '" . $_POST['Pendel2' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
}

}    //While schliesen

echo "</tbody>";
echo "</table>";



?>
