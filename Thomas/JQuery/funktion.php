<?php
function abfrage ($nummer)
{
global $db;
$n2=$nummer-1;

$BestellungData = mysqli_query($db,"SELECT * FROM bestellungen LIMIT $nummer OFFSET $n2");

$Bestellung = mysqli_fetch_assoc ($BestellungData);
return $Bestellung;
}

function echoDIV ($Bestellung)
{
    if($Bestellung['essen']!=''){
         echo '<div id="PName">' . $Bestellung['essen'] . '</div>';
         echo '<div id="PPreis">' . $Bestellung['BestellNr'] . '</div>';
    }else{
         echo '-------';       
    }
}

function komplett(){



}
?>