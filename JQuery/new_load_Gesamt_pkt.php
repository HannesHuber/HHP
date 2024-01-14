<?php
session_start();
include '../funktionen/db_verbindung.php';
$db=dbVerbindung();


$Wettkampf=$_SESSION['WeK'];

$Reload_Variable=0;
$DataReload = dbBefehl("SELECT * FROM wk_reload_$Wettkampf");
$ReloadIteration = mysqli_fetch_assoc($DataReload);


if($_SESSION['ReloadIterationGesamtPkt'] != $ReloadIteration['Bridge1']){
     echo'<script type="text/javascript">
     location.reload();
     </script>'; 
}

?>