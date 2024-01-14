<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$bridge=$_SESSION['KR2_Bridge'];
$wk_name=$_SESSION['WeK'];
$Art=$_SESSION['KrArt2'];


include '../funktionen/db_verbindung.php';
include '../funktionen/nuetzliches.php';
$db=dbVerbindung();

$NowT = dbBefehl("SELECT * FROM tmp_gerd_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

$tmp_kr_check = dbBefehl("SELECT * FROM tmp_kr_check_$bridge");

$kr_check = mysqli_fetch_assoc($tmp_kr_check);

    if(($dNow['IdHeber']!=0) && ($dNow['IdHeber']!=NULL)&&($dNow['IdHeber']!='')){

         if((($_SESSION['KrId2']!=$dNow['IdHeber'])||($_SESSION['KrV2']!=$dNow['V'])||($_SESSION['KrArt2']!=$dNow['Art'])||
             ($_SESSION['KrHGw2']!=$dNow['HGw']))){

                // dbBefehl("UPDATE tmp_kr_check_$bridge    SET Re2='0'");    //  zusammen mit && Re2==1in if oben

                 $_SESSION['KrId2']=$dNow['IdHeber'];
                 $_SESSION['KrV2']=$dNow['V'];
                 $_SESSION['KrArt2']=$dNow['Art'];
                 $_SESSION['KrHGw2']=$dNow['HGw'];
                 $_SESSION['B2']=0;

                 echo"
 					<script>
 						setTimeout(function(){
     						location = 'kampfrichter2.php'
   						},0)
 					</script>
				";
         }
     }
     if($kr_check['Re2']==1)
              KampfrichterPadResetAusfuehrung($bridge,2, $wk_name, $Art, $dNow);



?>