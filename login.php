<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

ob_start ();
error_reporting(0);

include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);


if(isset($_GET['login'])) {
        $passwort = $_POST['passwort'];

        $hash=$stammdaten['passwort'];

        if(password_verify($passwort, $hash))
             $_SESSION['user']=true;
        else
             $errorMessage = "Passwort war ungültig<br>";

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
</head>
<body>

<a href="index.php" title="Link zu Index" id="range-logo">Index</a>
<?php
if(isset($errorMessage)) {
        echo $errorMessage;
}
?>

<form action="?login=1" method="post">

<?php
if($_SESSION['user']==true)
    echo 'Sie sind eingeloggt.';
else{

    echo 'Dein Passwort:<br>';
    echo '<input type="password" size="40"  maxlength="250" name="passwort"><br>';

    echo '<input type="submit" value="Abschicken">';
}
?>

</form>
</body>
</html>
