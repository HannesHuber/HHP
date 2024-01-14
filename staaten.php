<?php
session_start();
if (empty($_SESSION['Seite_S'])) {
    $_SESSION['Seite_S'] = 1;
}

if (empty($_SESSION['UpLoad_IdStaat'])) {
	$_SESSION['UpLoad_IdStaat'] = 0;
}
$_SESSION['UpLoad_IdStaat'] = 0;

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc" http-equiv="cache-control" content="no-cache">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">

</head>



<body>

<form method="post" action="staaten.php">

<p class="kopf"><b>Staaten</b></p>

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>


<?php


ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

$Limit=$stammdaten['Anzahl_Heber_p_S'];                                                                                                                        //f�r den wettkampf ein h�ckchen haben!

$start=($Limit*$_SESSION['Seite_S'])-$Limit;

$staatendb= dbBefehl("SELECT * FROM staaten
                        ORDER BY IdStaat ASC
                        LIMIT $start, $Limit
                        ");                                                                                                                         //passt sich dynamisch der db an!

$numVerein= dbBefehl("SELECT * FROM staaten");
$numVerein = mysqli_num_rows($numVerein);
$Seiten=ceil($numVerein/$Limit);



if(isset($_POST['newVerein']))
{

         $x=1;

         $staatendata= dbBefehl("SELECT IdStaat FROM staaten
         		ORDER BY IdStaat DESC
         		");
         $hoechster_parameter_data = mysqli_fetch_assoc($staatendata);
         $hoechste_Id_plus=$hoechster_parameter_data['IdStaat'] + 1;

         dbBefehl("INSERT INTO staaten (IdStaat, Staat)
                      Values ('$hoechste_Id_plus', '')");

         $new_Verein="1";

}


echo"<br>";


echo "
<div id=\"divid1\" class=\"examplediv\">
<table class=\"tabelle\"  border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"300\">
  </colgroup>


<thead>

 <tr>
  <th>Staaten</th>
  <th>Flagge</th>
  <th>Hochladen</th>
 </tr>
</thead>
";





$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($staatendb))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{
	if($dsatz['IdStaat']!=0){

$i = $i+1;

     $Id="Id" . $i;
     $Staat="Staat" . $i;
     $Loeschen="Loeschen" . $i;
     $Hochladen="Hochladen" . $i;

echo "<input type=\"text\" name=$Id size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdStaat']."\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}

echo "<tr align=\"center\">";


     echo "<td>";
          echo "<input type=\"text\" name=$Staat size=\"5\" value=\"".$dsatz['Staat']."\">";
          echo "<input type=\"submit\" name=$Loeschen value=\"Loeschen\">";


     echo "</td>";

     echo "<td>";
     	if($dsatz['FlaggenFormat']!='')
     		echo '<img src="Bilder/FlaggenStaaten/'.$dsatz['IdStaat'].'.'.$dsatz['FlaggenFormat'].'" alt="Flagge" height="30" width="50">';
     echo "</td>";

     echo "<td>";
     	echo "<input type=\"submit\" name=$Hochladen value=\"Bild Hochladen\">";
     echo "</td>";


echo "</tr>";

if(isset($_POST[$Hochladen])){
    $_SESSION['UpLoad_IdStaat']=$dsatz['IdStaat'];

	echo"
 <script>
 setTimeout(function(){
     location = 'up_load.php'
   },0)
 </script>
";

}

     if(isset($_POST['Loeschen' . $i]))                                                                                          //Loeschen
         {
          $x=1;

           dbBefehl("DELETE FROM staaten
                               WHERE IdStaat ='" . $_POST['Id' . $i] . "
                               '");
          $new_Verein="1";

         }


         if((isset($_POST['speichern'])) || ($new_Heber=='1'))
         {


             $x=1;


             $_POST['Staat' . $i]=str_replace('_,_',' ',$_POST['Staat' . $i]);


                 dbBefehl("UPDATE staaten
                              SET Staat= '" . $_POST['Staat' . $i] . "'
                              WHERE IdStaat ='" . $_POST['Id' . $i] . "'");

		}

	}

}
echo "</tbody>";
echo "</table>";

if($_SESSION['Seite_S']!=1)
echo '<input class="But" type="submit" name="SeiteZurück" value="<">';

for($SeitenZaeler=1; $SeitenZaeler<=$Seiten; $SeitenZaeler++){

$N_Seite="Seite" . $SeitenZaeler;

    if($SeitenZaeler==$_SESSION['Seite_S'])
        echo "<input id=\"AktuelleSeite\" class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";
    else
        echo "<input class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";

    if(isset($_POST[$N_Seite])) { $_SESSION['Seite_S']=$SeitenZaeler; $x=1;}

}
echo '<input class="But" type="submit" name="SeiteVor" value=">">';

if(isset($_POST['SeiteZur�ck'])){ $_SESSION['Seite_S']--; $x=1;}
if(isset($_POST['SeiteVor'])){ $_SESSION['Seite_S']++; $x=1;}

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'staaten.php'
   },0)
 </script>
";
}

?>

<br>

<input type="submit" name="newVerein" value="Neuer Staat">

<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">


</form>
</body>
</html>
