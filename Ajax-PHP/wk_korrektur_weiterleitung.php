<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); // sorgt für die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

$Grp = $_POST['gruppe'];

$_SESSION['Kor_Grp']=$Grp;

?>