<?php
session_start();	
include '../funktionen/db_verbindung.php';

$db=dbVerbindung();

$DBtmp_uebersicht_mk_reload = dbBefehl("SELECT * FROM tmp_uebersichtmk_reload");
$dataReload = mysqli_fetch_assoc($DBtmp_uebersicht_mk_reload);

$IdReload_NEU=$dataReload["IdReload"];

$IdReload_ALT=$_SESSION['IdReMk'];

if($IdReload_NEU != $IdReload_ALT){
	$_SESSION['IdReMk']=$IdReload_NEU;

          echo'<script type="text/javascript">
                 location.reload();
         </script>';
 
}


?>