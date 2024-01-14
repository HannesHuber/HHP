<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();

$dbStatus = dbBefehl("SELECT * FROM tmp_jury_status_2");
$dStatus = mysqli_fetch_assoc($dbStatus);

if($dStatus['Sprecher'] == 1){
	$_SESSION['JuryReloadSprecher2']=1;
	
	
	echo'<script type="text/javascript">
                         location.reload();
                 </script>';
	
	
}
	


?>