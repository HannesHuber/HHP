<?php
session_start();

$bridge=$_SESSION['KR_A_Bridge'];

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$NowT = dbBefehl("SELECT * FROM tmp_gerd_$bridge");

$dNow = mysqli_fetch_assoc($NowT);

$tmp_kr_check = dbBefehl("SELECT * FROM tmp_kr_check_$bridge");

$kr_check = mysqli_fetch_assoc($tmp_kr_check);


    if(($dNow['IdHeber']!=0) && ($dNow['IdHeber']!=NULL)&&($dNow['IdHeber']!='')){

         if((($_SESSION['krIdH']!=$dNow['IdHeber'])||($_SESSION['krV']!=$dNow['V'])||($_SESSION['krArt']!=$dNow['Art'])||
             ($_SESSION['krHGw']!=$dNow['HGw']))&&(($kr_check['ReAnzeige']==1)||($kr_check['ReAnzeige']==2))){

                 dbBefehl("UPDATE tmp_kr_check_$bridge
                              SET ReAnzeige='0'");

             if($kr_check['ReAnzeige']==1){
                 echo'<script type="text/javascript">
                         setTimeout(function(){
                                 window.location.reload(1);
                         }, 8000);
                 </script> ';
             }else{
                 echo'<script type="text/javascript">
                         location.reload(true);
                 </script>';
             }
         }
     }




?>