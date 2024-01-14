<?php

$IdHeber=$_SESSION['KrIdHAn' . $bridge];
$Versuch=$_SESSION['KrVAn' . $bridge];
$Art=$_SESSION['KrArtAn' . $bridge];
$KrAnzahl=$_SESSION['KrAnzahlAn' . $bridge];
$Wk_name=$_SESSION['WeK'];
$Wk_Art=$_SESSION['WkArt' . $bridge];



         $dbHeber = dbBefehl("SELECT * FROM tmp_heber_speichern_1
                               WHERE Id='1'
                               ");

$dHeber = mysqli_fetch_assoc($dbHeber);


	$auslesen='G'.$Feld_numb;
	
		if($dHeber[$auslesen]=='Ja')echo '<p class="gueltig">&nbsp;</p>';
		elseif($dHeber[$auslesen]=='Nein')echo '<p class="ungueltig">&nbsp;</p>';
		else echo '<p>&nbsp;</p>';
	
		if(($dHeber[$auslesen]=='Ja' || $dHeber[$auslesen]=='Nein') && $_SESSION['MonitorReloadChecker']==0){
			$_SESSION['MonitorReload']=time();
			$_SESSION['MonitorReloadChecker']=1;
		}
		
		if($_SESSION['MonitorReloadChecker']==1 && ($_SESSION['MonitorReload']-time())<-3 ){
			
			$_SESSION['MonitorReloadChecker']=0;
			
			dbBefehl("Update tmp_heber_speichern_1
						Set G1='', G2='', G3=''
                               WHERE Id='1'
                               ");
			
			echo'<script type="text/javascript">
                         location.reload();
                 </script>';
		}


?>