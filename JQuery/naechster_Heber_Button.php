<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$Heber=          $_SESSION['GLIdHeber'];
$HVersuch=       $_SESSION['GLVersuch'];
$Wk_name=        $_SESSION['WeK'];
$Grp=            $_SESSION['Wk_Grp'];
$bridge=         $_SESSION['HWkBridge'];
$Art=            $_SESSION['Wk_SoR'];

// echo $Heber, ' | ', $HVersuch, ' | ', $Wk_name, ' | ', '<br>';

         $H = dbBefehl("SELECT * FROM heber_$Wk_name, heber, heber_wk_$Wk_name
                               WHERE heber_$Wk_name.IdHeber = '$Heber'
                               AND heber_wk_$Wk_name.IdHeber = '$Heber'
                               AND heber.IdHeber = '$Heber'
                               AND heber_wk_$Wk_name.Versuch= '$HVersuch'
                               ");

$dtest = mysqli_fetch_assoc($H);
if(($dtest['Gueltig_' . $_SESSION['Wk_SoR']] == 'Ja') || ($dtest['Gueltig_' . $_SESSION['Wk_SoR']] == 'Nein')){

    usleep(300000);
    
echo"<button type=\"button\" onclick=\"nheber(this.value," . $Grp . ")\" value=\"1\">Nächster Heber</button>";

}else echo'Wertung abwarten';


?>