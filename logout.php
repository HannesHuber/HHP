<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

ob_start ();
error_reporting(0);

$_SESSION['user']=false;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Logout</title>


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
</head>
<body>

<a href="index.php" title="Link zu Index" id="range-logo">Index</a>
<?php
if($_SESSION['user']==false)
         echo 'Sie wurden erfolgreich ausgeloggt!';
else
         echo 'Fehler beim ausloggen!';
?>
</form>
</body>
</html>