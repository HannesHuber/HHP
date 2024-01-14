<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$bridge=$_SESSION['Jury_Bridge'];
$wk_name=$_SESSION['WeK'];
$Art=$_SESSION['JuryArt'];

include '../funktionen/db_verbindung.php';
include '../funktionen/kampfrichter_pads.php';
include '../funktionen/nuetzliches.php';



$db=dbVerbindung();

$NowT = dbBefehl("SELECT * FROM tmp_letzter_heber_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_$wk_name");
$dataStamm = mysqli_fetch_assoc($dbstamm);

$tmp_kr_check = dbBefehl("SELECT * FROM tmp_kr_check_$bridge");
$kr_check = mysqli_fetch_assoc($tmp_kr_check);


         if((($_SESSION['JuryId']!=$dNow['IdHeber'])||($_SESSION['JuryV']!=$dNow['V'])||($_SESSION['JuryArt']!=$dNow['Art']))
         		){	
         		
         		 $_SESSION['BJury']=0;
         			
                 $_SESSION['JuryId']=$dNow['IdHeber'];
                 $_SESSION['JuryV']=$dNow['V'];
                 $_SESSION['JuryArt']=$dNow['Art'];

                 $_SESSION['reloadJury']=0;
                 
                 //unset($_POST);
                 //	 
                 
                 echo'<script type="text/javascript">						
    						location.reload();						                       
                 </script>';

         }




?>