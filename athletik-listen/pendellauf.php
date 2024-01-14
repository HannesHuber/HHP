<?php
                                                                                            //Start Pendellauf
echo"<p class=\"kopf\"><b>Pendellauf von Grp:" . $_SESSION['At_Grp'] . "</b></p>";

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

while($dsatz = mysqli_fetch_assoc($heber_abfrage))
{
 echo "<tr>";

     echo "<td>";
                 echo "<span id='tab'> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];
     echo "</td>";


     echo"<td>";
                 echo "<input type=\"text\" name=\"Pendel1\" size=\"2\" value=\"\" readonly> sek";
     echo"</td>";


     echo"<td>";
                 echo "<input type=\"text\" name=\"Pendel2\" size=\"2\" value=\"\" readonly> sek";
     echo"</td>";
 echo "</tr>";
}

echo "</tbody>";
echo "</table>";

?>
