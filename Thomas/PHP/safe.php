<?php
session_start();
if (empty($_SESSION['reload'])) {
    $_SESSION['reload'] = 0;
}
if (empty($_SESSION['bestellNr'])) {
    $_SESSION['bestellNr'] = 0;
}
header('Content-Type: text/html; charset=utf-8'); // sorgt f�r die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE

function safeBest ($name,$Anzahl)
{
global $db, $besNr;
$query="INSERT INTO bestellungen (essen,BestellNr) VALUES ('$name',$besNr)";



while($Anzahl>0){
$Anzahl--;
$faillure=1;

while($faillure==1){
  try {
       $faillure=0;
       if(!mysqli_query($db,$query)) {
          throw new Exception(mysqli_error($db));
       }
     }catch (Exception $e) {
        $faillure=1;
   }

}        //while faillure Ende
}        //while Anzahl Ende


}        //funktion Ende

function TryCatchBestNr ()
{
global $db;
$faillure=1;
$query="SELECT * FROM tmp_bestell_nr";


while($faillure==1){
  try {
     $faillure=0;
     if(!($Ergebniss = mysqli_query($db,$query))) {
        throw new Exception(mysqli_error($db));
     }

         $dataBestNr = mysqli_fetch_assoc($Ergebniss);
         $besNr=$dataBestNr['bestell_nr'];

         if($besNr==10) $besNr=1;
         else $besNr++;

         $query2="UPDATE tmp_bestell_nr SET bestell_nr='$besNr'";

     if(!mysqli_query($db,$query2)) {
        throw new Exception(mysqli_error($db));
     }
     $_SESSION['bestellNr']=$besNr;
     return $besNr;

   }catch (Exception $e) {
      $faillure=1;
   }
}
}   //funktion fertig



$db = mysqli_connect("database_hhp", "root", "", "thomas");

if (mysqli_connect_errno()) {
  printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
  exit();
}



$Acurry = $_POST['Acurry'];
$Anudeln = $_POST['Anudeln'];
$Grillwurst = $_POST['Grillwurst'];
$Kalbsbratwurst = $_POST['Kalbsbratwurst'];
$Frikadellen = $_POST['Frikadellen'];
$Tomaten = $_POST['Tomaten'];
$Pommes = $_POST['Pommes'];
$Wienerle = $_POST['Wienerle'];
$Hot = $_POST['Hot'];
$Grill = $_POST['Grill'];
$GemBurger = $_POST['GemBurger'];
$SchweineS = $_POST['SchweineS'];
$Schnitzel = $_POST['Schnitzel'];
$Rindertsteak = $_POST['Rindertsteak'];


$besNr=TryCatchBestNr();


for($i=0;$i<15;$i++){

switch ($i) {
    case 0:
        safeBest ('Currywurst',$Acurry);
        break;
    case 1:
        safeBest ('Gem.Nudeln',$Anudeln);
        break;
    case 2:
        safeBest ('Rindersteak',$Rindertsteak);
        break;
    case 3:
        safeBest ('Grillwurst',$Grillwurst);
        break;
    case 4:
        safeBest ('Kalbsbratwurst',$Kalbsbratwurst);
        break;
    case 5:
        safeBest ('Frikadellen',$Frikadellen);
        break;
    case 6:
        safeBest ('TomatenM. Salat',$Tomaten);
        break;
    case 7:
        safeBest ('Pommes',$Pommes);
        break;
    case 8:
        safeBest ('Wienerle',$Wienerle);
        break;
    case 9:
        safeBest ('Grill&Chill Burger',$Grill);
        break;
    case 10:
        safeBest ('Gem&uuml;se Burger',$GemBurger);
        break;
    case 11:
        safeBest ('SchweineSteak m.P.&Paprika',$SchweineS);
        break;
    case 12:
        safeBest ('Schnitzel m.P.',$Schnitzel);
        break;
    case 13:
        safeBest ('Hot Dog',$Hot);
        break;
}

}


mysqli_close($db);

$_SESSION['reload'] = 1;

?>