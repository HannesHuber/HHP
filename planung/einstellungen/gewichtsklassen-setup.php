<?php
session_start();
if (empty($_SESSION['al_kl_setup_error'])) {
    $_SESSION['al_kl_setup_error'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>

<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">
<script type='text/javascript' src="check_funktion.js"></script>

<link rel="stylesheet" type="text/css" href="../../CSS/alg.css">
<link rel="stylesheet" type="text/css" href="../../CSS/table.css">


</head>
<body>

<form method="post" action="gewichtsklassen-setup.php">

<p class="kopf"><b>Gewichtsklassen-Einstellungen</b></p>

<a href="../einstellungen_zk.php" title="Link zu den Einstellungen" id="range-logo">Einstellungen</a>

<?php

ob_start ();
error_reporting(1);

include '../../funktionen/db_verbindung.php';
include '../../funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

$DataGwKl = dbBefehl("SELECT * FROM gewichtsklassen_".$data_a_db['S_Db']);
$DataGwKl2 = dbBefehl("SELECT * FROM gewichtsklassen_".$data_a_db['S_Db']);

echo 'Hinweis: Um die z.B. +65kg Gewichtsklasse zu erhalten muss einfach eine 1 in dieses Feld gesetzt werden.
      Dies hat zur folge, dass die vorrangegangene GwKl in dieser Spalte zur "+" GwKl wird.';
echo '
<table class="tabelle" border="1" cellpadding="0" cellspacing="2" >
 <colgroup>';

$i=1;
//echo mysqli_num_fields($DataGwKl);

while($i < mysqli_num_fields($DataGwKl)){$i++;
  echo '<col width="60">';
}   //Ende While


echo'</colgroup>
  <thead>
   <tr>';


$i=1;
while($dGwKl = mysqli_fetch_assoc($DataGwKl2)){
  if ($i==1){
    foreach($dGwKl as $key => $value){
        //echo "$key=$value";
        if($key != 'Id')
        echo "<th>" . $key . "</th>";
    }
  }
  $i++;

}        //Ende While

echo '
  </tr>
 </thead>';


$NumCloums = dbBefehl("SELECT count(*)
FROM information_schema.columns
WHERE table_name = 'gewichtsklassen_".$data_a_db['S_Db']."'");

$NumCol=mysqli_fetch_assoc($NumCloums);   //echo ($NumCol["count(*)"]);

$BigDataGwKl = dbBefehl("SELECT * FROM gewichtsklassen_".$data_a_db['S_Db']);

$i = 0;
$Id = 0;

while($dsatz = mysqli_fetch_assoc($BigDataGwKl))
{

$i++;
$Id++;

//     $DataColums = dbBefehl("SELECT * FROM gewichtsklassen_".$data_a_db['S_Db']);

echo '<tr>';

foreach($dsatz as $key => $value){
    //echo "$key=$value";
    if($key != 'Id'){
    //echo "<th>" . $key . "</th>";

   // $ColName = '';
   // $ColName=$dGwKl->name;
   $ColId="ColId" . $key . $Id;

   echo "<td><input type=\"text\" name=$ColId id=$ColId size=\"6\" value=\"".$dsatz[$key]."\"></td>";

   if(isset($_POST['speichern'])){
           $x=1;
           // echo $key;
           // echo "|";
           // echo $ColId;
           // echo "|";
           // echo $Id;
           // echo "|";
           // echo $_POST[$ColId];
           // print"----------------";



           dbBefehl("UPDATE gewichtsklassen_".$data_a_db['S_Db']."
                     SET $key= '" . $_POST[$ColId] . "'
                     WHERE Id = '$Id'");
   }

 } //If NOT ID close
} //Foreach close


echo '</tr>';

}


if(isset($_POST['speichern'])){

    $heberNachMeldung = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                WHERE heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber");
  //  $rowNachMeldung=mysqli_num_rows($heberNachMeldung);

  //  echo $rowNachMeldung;

    while($dsatz_aus = mysqli_fetch_assoc($heberNachMeldung)){
       // echo $dsatz_aus['IdHeber'].'<br>';
        $IdHeber=$dsatz_aus['IdHeber'];
        safe_AlKl_GwKl($IdHeber,$stammdaten);
      //  echo "Erfolg";
    }
}

?>

</table>

<br>
<br>
<input type="submit" name="speichern" value="Speichern">

<?php

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'gewichtsklassen-setup.php'
   },0)
 </script>
";
}

?>

</form>

</body>
</html>
