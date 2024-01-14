<?php
session_start();

$bridge=1;
$HCA=$_SESSION['HeberCheck'];
$VCA=$_SESSION['VCheck'];
$HGwCA=$_SESSION['HGwCheck'];

$Wettkampf=$_SESSION['WeK'];
include ("Outsorst/new_load_code.php");

?>