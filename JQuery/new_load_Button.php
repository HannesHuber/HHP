<?php
session_start();

include '../funktionen/db_verbindung.php';
$db=dbVerbindung();


$Wettkampf=$_SESSION['WeK'];

//var_dump($_SESSION['ReloadIterationWkLeiter']);

$Reload_Variable=0;
$DataReload = dbBefehl("SELECT * FROM wk_reload_$Wettkampf");
$ReloadIteration = mysqli_fetch_assoc($DataReload);

//var_dump($_SESSION['WeK']);
//var_dump($ReloadIteration['Grp']);
//var_dump($_SESSION['ReloadIterationWkLeiter']);

    if($_SESSION['ReloadIterationWkLeiter'] != $ReloadIteration['Grp']){
        echo '<input id="ReloadButton" style=\"display: none; type="submit" name="ReloadButton" value="Steigerung">';
    }





?>