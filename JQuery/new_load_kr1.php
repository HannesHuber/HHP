<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$bridge=$_SESSION['KR1_Bridge'];
$wk_name=$_SESSION['WeK'];
$Art=$_SESSION['KrArt'];
$Kr_Numb=$_SESSION['KrAnzahl'];

include '../funktionen/db_verbindung.php';
include '../funktionen/kampfrichter_pads.php';
include '../funktionen/nuetzliches.php';

$db=dbVerbindung();

$NowT = dbBefehl("SELECT * FROM tmp_gerd_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_$wk_name");
$dataStamm = mysqli_fetch_assoc($dbstamm);

$tmp_kr_check = dbBefehl("SELECT * FROM tmp_kr_check_$bridge");
$kr_check = mysqli_fetch_assoc($tmp_kr_check);



if($_SESSION['KrAnzahl']==1){

         if(($_SESSION['KrId']!=$dNow['IdHeber'])||($_SESSION['KrV']!=$dNow['V'])||($_SESSION['KrArt']!=$dNow['Art'])||
             ($_SESSION['KrHGw']!=$dNow['HGw'])){


                 $_SESSION['KrId']=$dNow['IdHeber'];
                 $_SESSION['KrV']=$dNow['V'];
                 $_SESSION['KrArt']=$dNow['Art'];
                 $_SESSION['KrHGw']=$dNow['HGw'];

                 dbBefehl("UPDATE tmp_kr_check_$bridge
                              SET ReAnzeige='2'");

                 echo'<script type="text/javascript">
                         location.reload(true);
                 </script>';
             }

           
     if($kr_check['Re1']==1)
              KampfrichterPadResetAusfuehrung($bridge,1, $wk_name, $Art, $dNow);

}else{                        //Also f�r mehr als einen KR!------------------------------------------------

	
	
         if((($_SESSION['KrId']!=$dNow['IdHeber'])||($_SESSION['KrV']!=$dNow['V'])||($_SESSION['KrArt']!=$dNow['Art'])||
             ($_SESSION['KrHGw']!=$dNow['HGw']))&&(($kr_check['K1']==0)&&($kr_check['K2']==0)&&($kr_check['K3']==0))){

                 $_SESSION['KrId']=$dNow['IdHeber'];
                 $_SESSION['KrV']=$dNow['V'];
                 $_SESSION['KrArt']=$dNow['Art'];
                 $_SESSION['KrHGw']=$dNow['HGw'];
                 $_SESSION['B1']=0;

                 echo'<script type="text/javascript">
                         location.reload(true);
                 </script>';
             }        


     if($kr_check['Re1']==1)
              KampfrichterPadResetAusfuehrung($bridge,1, $wk_name, $Art, $dNow);


}
?>