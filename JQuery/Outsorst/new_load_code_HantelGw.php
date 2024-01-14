<?php
                           //echo __FILE__;
include '../funktionen/db_verbindung.php';

$db=dbVerbindung();

$NowT = dbBefehl("SELECT IdHeber, HGw FROM tmp_reload_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

if($HGw!=$dNow['HGw'] || $IdHeber != $dNow['IdHeber']){
         echo'<script type="text/javascript">
                 location.reload();
         </script>';
}


?>