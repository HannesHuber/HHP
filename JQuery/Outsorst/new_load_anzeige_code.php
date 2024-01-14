<?php
                           //echo __FILE__;
include '../funktionen/db_verbindung.php';

$db=dbVerbindung();

$Wettkampf=$_SESSION['WeK'];

$Reload_Variable=0;
$DataReload = dbBefehl("SELECT * FROM wk_reload_$Wettkampf");
$ReloadIteration = mysqli_fetch_assoc($DataReload);

//Mit Einem Time Tracker damit erst nach 2 sekunden Reloaded wird damit die Zuschauer das Ergebniss sehen
if($bridge==1){
    if($_SESSION['ReloadIterationEinzelAnzeige1'] != $ReloadIteration['Bridge1']){
        
        if($_SESSION['ReloadDelayTimeCheck1']==0){
            $_SESSION['ReloadDelayTimeTracker1']=time();
            $_SESSION['ReloadDelayTimeCheck1']=1;
        }
        
        if($_SESSION['ReloadDelayTimeCheck1']==1 && time()-$_SESSION['ReloadDelayTimeTracker1'] > 2 ){
            
            $_SESSION['ReloadDelayTimeCheck1']=0;
            $_SESSION['ReloadDelayTimeTracker1']=0;
            
            echo'<script type="text/javascript">
                    location.reload();
                 </script>';
        }

    }
}else{ //Also f�r Bridge 2
    if($_SESSION['ReloadIterationEinzelAnzeige2'] != $ReloadIteration['Bridge2']){
        
        if($_SESSION['ReloadDelayTimeCheck2']==0){
            $_SESSION['ReloadDelayTimeTracker2']=time();
            $_SESSION['ReloadDelayTimeCheck2']=1;
        }
        
        if($_SESSION['ReloadDelayTimeCheck2']==1 && time()-$_SESSION['ReloadDelayTimeTracker2'] > 2 ){
            
            $_SESSION['ReloadDelayTimeCheck2']=0;
            $_SESSION['ReloadDelayTimeTracker2']=0;
            
            echo'<script type="text/javascript">
                    location.reload();
                 </script>';
        }
    }
}



/*
 
$NowT = dbBefehl("SELECT * FROM tmp_anzeige_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

$Data = dbBefehl("SELECT * FROM tmp_gerd_$bridge");
$dsatz = mysqli_fetch_assoc($Data);

$IdHeber=$_SESSION['KrIdHAn' . $bridge];
$Versuch=$_SESSION['KrVAn' . $bridge];
$Art=$_SESSION['KrArtAn' . $bridge];
$KrAnzahl=$_SESSION['KrAnzahlAn' . $bridge];
$Wk_name=$_SESSION['WeK'];


         $dbHeber = dbBefehl("SELECT * FROM heber_wk_$Wk_name
                               WHERE heber_wk_$Wk_name.IdHeber = '$IdHeber'
                               AND heber_wk_$Wk_name.Versuch= '$Versuch'
                               ");
         
$dHeber = mysqli_fetch_assoc($dbHeber);

$dStamm = dbBefehl("SELECT Gerd FROM stammdaten_wk_$Wk_name");
$DataStamm = mysqli_fetch_assoc($dbHeber);

$Hardware_Modus=$DataStamm['Gerd'];

$auslesen='Gueltig_' . $Art;




if($dNow['Anweisung']==0){

         if(($IdHeber!=$dsatz['IdHeber']) || ($Versuch!=$dsatz['V']) || ($Hgw!=$dsatz['HGw'])){

                 if($dHeber[$auslesen]=='Ja' || $dHeber[$auslesen]=='Nein'){ sleep (2); }

                 echo'<script type="text/javascript">
                         location.reload();
                 </script>';
         }
}



if($dNow['Anweisung']==1){
    if($Hardware_Modus==0) sleep (1);   //Damit nicht sofort gewechselt wird
    
                      dbBefehl("UPDATE tmp_anzeige_$bridge
                              SET Anweisung= '0'
                       ");

                 echo'<script type="text/javascript">
                         location.reload();
                 </script>';

}

 
 */

?>