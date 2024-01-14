<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();


$IdHeber=$_SESSION['KrIdHAn1'];
$Versuch=$_SESSION['KrVAn1'];
$Art=$_SESSION['KrArtAn1'];
$Wk_name=$_SESSION['WeK'];

$dbStatus = dbBefehl("SELECT * FROM tmp_jury_status_1");
$dStatus = mysqli_fetch_assoc($dbStatus);

if($dStatus['Anzeige'] == 1){
	$_SESSION['JuryReload1']=1;
	
	
	echo'<script type="text/javascript">
                         location.reload();
                 </script>';
	
	
}
	


?>