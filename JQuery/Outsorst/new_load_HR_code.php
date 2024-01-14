<?php
include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$Wettkampf=$_SESSION['WeK'];

$Reload_Variable=0;
$DataReload = dbBefehl("SELECT * FROM wk_reload_$Wettkampf");
$ReloadIteration = mysqli_fetch_assoc($DataReload);

if($bridge==1){
    if($_SESSION['ReloadIterationHeberRaum1'] != $ReloadIteration['Bridge1']){
        echo'<script type="text/javascript">
                 location.reload();
         </script>';
    }
}else{ //Also für Bridge 2
    if($_SESSION['ReloadIterationHeberRaum2'] != $ReloadIteration['Bridge2']){
        echo'<script type="text/javascript">
                 location.reload();
         </script>';
    }
}

/*


$NowT = dbBefehl("SELECT * FROM tmp_reload_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

if(($HCA!=$dNow['IdHeber']) || ($VCA!=$dNow['V']) || ($HGwCA!=$dNow['HGw'])){
         echo'<script type="text/javascript">
                 location.reload();
         </script>';
}

$DBssReload = dbBefehl("SELECT * FROM tmp_ss_reload_$bridge")
OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

$DssR = mysqli_fetch_assoc($DBssReload);

if($DssR['HeberRaumR']==1){

          dbBefehl("UPDATE tmp_ss_reload_$bridge
                              SET HeberRaumR= '0'
                       ");


         echo'<script type="text/javascript">
                 location.reload();
         </script>';

}

 
 */

?>