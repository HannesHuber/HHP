<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();


$IdHeber=$_SESSION['KrIdHAn2'];
$Versuch=$_SESSION['KrVAn2'];
$Art=$_SESSION['KrArtAn2'];
$Wk_name=$_SESSION['WeK'];

$dbStatus = dbBefehl("SELECT * FROM tmp_jury_status_2");
$dStatus = mysqli_fetch_assoc($dbStatus);

if($dStatus['Anzeige'] == 1){
	$_SESSION['JuryReload2']=1;
	
	
	echo'<script type="text/javascript">
                         location.reload();
                 </script>';
	
	
}
	


?>