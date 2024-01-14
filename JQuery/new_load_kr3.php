<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$bridge=$_SESSION['KR3_Bridge'];
$wk_name=$_SESSION['WeK'];
$Art=$_SESSION['KrArt3'];

include '../funktionen/db_verbindung.php';
include '../funktionen/nuetzliches.php';
$db=dbVerbindung();

$NowT = dbBefehl("SELECT * FROM tmp_gerd_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

$tmp_kr_check = dbBefehl("SELECT * FROM tmp_kr_check_$bridge");

$kr_check = mysqli_fetch_assoc($tmp_kr_check);


         if((($_SESSION['KrId3']!=$dNow['IdHeber'])||($_SESSION['KrV3']!=$dNow['V'])||($_SESSION['KrArt3']!=$dNow['Art'])||
             ($_SESSION['KrHGw3']!=$dNow['HGw']))){


                 $_SESSION['KrId3']=$dNow['IdHeber'];
                 $_SESSION['KrV3']=$dNow['V'];
                 $_SESSION['KrArt3']=$dNow['Art'];
                 $_SESSION['KrHGw3']=$dNow['HGw'];
                 $_SESSION['B3']=0;

                 echo"
 					<script>
 						setTimeout(function(){
     						location = 'kampfrichter3.php'
   						},0)
 					</script>
				";

         }

     if($kr_check['Re3']==1)
              KampfrichterPadResetAusfuehrung($bridge,3, $wk_name, $Art, $dNow);
?>