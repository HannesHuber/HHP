<?php
session_start();

header('Content-Type: text/html; charset=utf-8'); // sorgt für die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE
?>

<html lang="de">
<head>
<meta charset="utf-8"/>
<title></title>
<meta name="author" content="hannes">
</head>
<body text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000">
<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<script language="javascript" type="text/javascript" src="JavaScript/kasse.js"></script>
<script type='text/javascript' src="jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="JQuery/Koch.js"></script>
<script language="javascript" type="text/javascript" src="JavaScript/koch.js"></script>

<div id="container">
     <div id="UeberKochBox1" class="Border">
         <div id="KB1" class="KochBoxen" onClick="fertig(1)"></div>
         <div id="KB2" class="KochBoxen" onClick="fertig(2)"></div>
         <div id="KB3" class="KochBoxen" onClick="fertig(3)"></div>
         <div id="KB4" class="KochBoxen" onClick="fertig(4)"></div>
         <div id="KB5" class="KochBoxen" onClick="fertig(5)"></div>
     </div>
     <div id="UeberKochBox2" class="Border">
         <div id="KB6" class="KochBoxen" onClick="fertig(6)"></div>
         <div id="KB7" class="KochBoxen" onClick="fertig(7)"></div>
         <div id="KB8" class="KochBoxen" onClick="fertig(8)"></div>
         <div id="KB9" class="KochBoxen" onClick="fertig(9)"></div>
         <div id="KB10" class="KochBoxen" onClick="fertig(10)"></div>
     </div>

</div>

<span id="ajaxtest"></span>

</body>
</html>