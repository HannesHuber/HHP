<?php
session_start();
if (empty($_SESSION['reload'])) {
    $_SESSION['reload'] = 0;
}
if (empty($_SESSION['bestellNr'])) {
    $_SESSION['bestellNr'] = 0;
}
?>
<html lang="de">
<head>

<title></title>
<meta name="author" content="hannes">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000">
<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<script language="javascript" type="text/javascript" src="JavaScript/kasse.js"></script>
<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<?php
$db = mysqli_connect("database_hhp", "root", "", "thomas");

if (mysqli_connect_errno()) {
  printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
  exit();
}

$besNr=$_SESSION['bestellNr'];

     if($_SESSION['reload'] == 0){
         include ("Outsorst/KasseHtml.php");
     }else{
         echo "<div id='kopf'>Die Bestellnummer lautet: $besNr</div>";
         $_SESSION['reload']=0;
         echo "<div onClick=\"reload()\" id=\"naechster\">N&auml;chster</div>";

echo"
 <script>
 setTimeout(function(){
     location = 'kasse.php'
   },4000)
 </script>
";

}
?>
                                




</body>
</html>