<?php
session_start();
if (empty($_SESSION['KrAnzahl'])) {
    $_SESSION['KrAnzahl'] = 0;
}
if (empty($_SESSION['KrId'])) {
    $_SESSION['KrId'] = -1;
}
if (empty($_SESSION['KrV'])) {
    $_SESSION['KrV'] = -1;
}
if (empty($_SESSION['KrArt'])) {
    $_SESSION['KrArt'] = '';
}
if (empty($_SESSION['KrHGw'])) {
    $_SESSION['KrHGw'] = -1;
}
if (empty($_SESSION['B1'])) {
    $_SESSION['B1'] = 0;
}
if (empty($_SESSION['GueltigK1'])) {
    $_SESSION['GueltigK1'] = '';
}
if (empty($_SESSION['reloadK1'])) {
    $_SESSION['reloadK1'] = 0;
}
if (empty($_SESSION['T-WertK1'])) {
    $_SESSION['T-WertK1'] = 0;
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

<script type="text/javascript">

$(document).ready(function() {
  $("#HardwareAnweisung").load("JQuery/HardwareAnweisung.php");
  var refreshId = setInterval(function() {
     $("#HardwareAnweisung").load('JQuery/HardwareAnweisung.php?' + 1*new Date());
  }, 150);
});

</script>

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


<form method="POST" action="t-wert1.php">

<span id="HardwareAnweisung"></span>

<?php
$KR_numb=1;
include 'Outsorst/t-wert_code.php';

?>

</form>
</body>
</html>