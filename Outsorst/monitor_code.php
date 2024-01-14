<?php





include 'funktionen/nuetzliches.php';



$_SESSION['KrIdHAn' . $bridge]    = $dsatz['IdHeber'];
$_SESSION['KrVAn' . $bridge]      = $dsatz['V'];
$_SESSION['KrArtAn' . $bridge]    = $dsatz['Art'];
$_SESSION['KrHGwAn' . $bridge]    = $dsatz['HGw'];
$_SESSION['KrAnzahlAn' . $bridge] = $stammdaten['Kampfrichter'];
$_SESSION['WkArt' . $bridge]	  =	$stammdaten['Wk_Art'];







echo'<table class="tabelle" >';

echo'<tr>';



echo'</tr>';

 echo'<tr>';

    echo'<td id="gueltig"><div id="g1"></div></td>';
    echo'<td id="gueltig"><div id="g2"></div></td>';
    echo'<td id="gueltig"><div id="g3"></div></td>';

 

 echo'</tr>';
echo'</table>';



echo'<div id="Jury"></div>';




?>



</body>
</html>