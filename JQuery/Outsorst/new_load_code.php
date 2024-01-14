<?php
                           //echo __FILE__;
include '../funktionen/db_verbindung.php';



$db=dbVerbindung();

/*
$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

if(($HCA!=$dNow['IdHeber']) || ($VCA!=$dNow['V']) || ($HGwCA!=$dNow['HGw'])){
         echo'<script type="text/javascript">
                 location.reload();
         </script>';
}

$Abfrage = dbBefehl("SELECT * FROM tmp_ss_reload_$bridge");
$Erg = mysqli_fetch_assoc($Abfrage);

if($Erg['UebersichtR']==1){
    dbBefehl("UPDATE tmp_ss_reload_$bridge
                              SET UebersichtR= '0'
                       ");
    
    echo'<script type="text/javascript">
                 location.reload();
         </script>';
}

*/


$Reload_Variable=0;
$DataReload = dbBefehl("SELECT * FROM wk_reload_$Wettkampf");
$ReloadIteration = mysqli_fetch_assoc($DataReload);

if($bridge==1){ 
	//echo $_SESSION['ReloadIterationUebersicht1']. $ReloadIteration['Bridge1'];
    if($_SESSION['ReloadIterationUebersicht1'] != $ReloadIteration['Bridge1']){
        echo'<script type="text/javascript">
                 location.reload();
         </script>'; 
    } 
}else{ //Also f�r Bridge 2
    if($_SESSION['ReloadIterationUebersicht2'] != $ReloadIteration['Bridge2']){
        echo'<script type="text/javascript">
                 location.reload();
         </script>'; 
    }
}



?>