<?php

echo"<p class=\"kopf\" id='page-break'><b>Differenzsprung von Grp:" . $_SESSION['At_Grp'] . "</b></p>";

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
                 echo "<span style=\"width:125px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo $dsatz['Vorname'];
     echo "</td>";


     echo"<td>";
                 echo "<input type=\"text\" name=\"DifSprung1\" size=\"2\" value=\"\" readonly> cm";
     echo"</td>";


     echo"<td>";
                 echo "<input type=\"text\" name=\"DifSprung2\" size=\"2\" value=\"\" readonly> cm";
     echo"</td>";
 echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
