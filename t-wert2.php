<?php
session_start();
if (empty($_SESSION['KrAnzahl'])) {
    $_SESSION['KrAnzahl'] = 0;
}
if (empty($_SESSION['KrId2'])) {
    $_SESSION['KrId2'] = -1;
}
if (empty($_SESSION['KrV2'])) {
    $_SESSION['KrV2'] = -1;
}
if (empty($_SESSION['KrArt2'])) {
    $_SESSION['KrArt2'] = '';
}
if (empty($_SESSION['KrHGw2'])) {
    $_SESSION['KrHGw2'] = -1;
}
if (empty($_SESSION['B2'])) {
    $_SESSION['B2'] = 0;
}
if (empty($_SESSION['GueltigK2'])) {
    $_SESSION['GueltigK2'] = '';
}
if (empty($_SESSION['reloadK2'])) {
    $_SESSION['reloadK2'] = 0;
}
if (empty($_SESSION['T-WertK2'])) {
    $_SESSION['T-WertK2'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="viewport" content="initial-scale=1.0, width=device-width">

<link rel="stylesheet" type="text/css" href="CSS/kampfrichter.css">
<link rel="stylesheet" type="text/css" href="CSS/ButtonNumpad.css">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<script>

    function add (number){
  //  var t0 = performance.now();
         document.getElementById("demo").value += number;
  //  var t1 = performance.now();
  //  alert(t1-t0);
    }
    function oneback (){
         document.getElementById("demo").value = document.getElementById("demo").value.slice(0, -1);
    }
    function clearall (){
         document.getElementById("demo").value = "";
    }
    function komma (){
         document.getElementById("demo").value += ",";
    }

</script>

</head>

<body>


<form method="POST" action="t-wert2.php">


<?php
$KR_numb=2;
include 'Outsorst/t-wert_code.php';
?>


</body>
</html>