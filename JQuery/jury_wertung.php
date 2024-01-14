<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$bridge=$_SESSION['Jury_Bridge'];
$wk_name=$_SESSION['WeK'];
$Art=$_SESSION['JuryArt'];

include '../funktionen/db_verbindung.php';
include '../funktionen/kampfrichter_pads.php';
include '../funktionen/nuetzliches.php';

function JurySafeHeber($Wk_numb, $WkArt, $Art, $Guel, $IdHeber, $Versuch){
	$GueltigString= "Gueltig_" . $Art;

		
		dbBefehl ("UPDATE heber_wk_$Wk_numb
				SET $GueltigString= '$Guel'
				WHERE IdHeber= '$IdHeber'
				AND Versuch= '$Versuch'
				");
	
}

function tmp_Jury_Status_Update($bridge){
	dbBefehl ( "UPDATE tmp_jury_status_$bridge
			SET Anzeige= '1', Sprecher='1'
			WHERE Id='1'" );
}

$db=dbVerbindung();

$NowT = dbBefehl("SELECT * FROM tmp_letzter_heber_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_$wk_name");
$dataStamm = mysqli_fetch_assoc($dbstamm);

$tmp_kr_check = dbBefehl("SELECT * FROM tmp_kr_check_$bridge");
$kr_check = mysqli_fetch_assoc($tmp_kr_check);


if($_SESSION['BJury']==1){
	$Wk_Art=$dataStamm['Wk_Art'];
	$IdHeber=$_SESSION['JuryId'];
	$Versuch=$_SESSION['JuryV'];
	$Guel=$_SESSION['JuryGueltig'];
	$_SESSION['reloadJury']=1;
	$_SESSION['BJury']=0;
	
	JurySafeHeber($wk_name, $Wk_Art, $Art, $Guel, $IdHeber, $Versuch);
	tmp_Jury_Status_Update($bridge);
	
	//SendHeberToSafeTabelle($Wk_Art, $bridge, $IdHeber, $Versuch, $Art, $Guel, $TWert);   //Funktion in /htdocs/funktionen/kampfrichter_pads; Speichert Heber in tmp_Speichern_$bridge	
		
}
                            

         if(((($_SESSION['JuryId']!=$dNow['IdHeber'])||($_SESSION['JuryV']!=$dNow['V'])||($_SESSION['JuryArt']!=$dNow['Art']))
         		)&&($_SESSION['reloadJury']==1)){	//&&($_SESSION['reloadJury']==1)
         		         	         			
                 $_SESSION['JuryId']=$dNow['IdHeber'];
                 $_SESSION['JuryV']=$dNow['V'];
                 $_SESSION['JuryArt']=$dNow['Art'];

                 $_SESSION['reloadJury']=0;
                 
                 //unset($_POST);
                 //	 
                 
                 echo"
 <script>
 setTimeout(function(){
     location = 'jury.php'
   },0)
 </script>
";

         }




?>