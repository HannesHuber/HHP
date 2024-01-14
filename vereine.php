<?php
session_start();
if (empty($_SESSION['Seite_V'])) {
    $_SESSION['Seite_V'] = 1;
}
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">

</head>



<body>

<form method="post" action="vereine.php">

<p class="kopf"><b>Vereine</b></p>

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

$start=($Limit*$_SESSION['Seite_V'])-$Limit;

$vereindb= dbBefehl("SELECT * FROM verein
						WHERE IdVerein NOT IN('0')
                        ORDER BY Verein ASC
                        LIMIT $start, $Limit
                        ");                                                                                                                         //passt sich dynamisch der db an!


//AND IdVerein > 0

$numVerein= dbBefehl("SELECT * FROM verein");

$numVerein = mysqli_num_rows($numVerein);
$Seiten=ceil($numVerein/$Limit);



if(isset($_POST['newVerein']))
{

         $x=1;

         dbBefehl("INSERT INTO verein (Verein)
                      Values ('0_NewVerein')");

         $new_Verein="1";

}


echo"<br>";


echo "
<div id=\"divid1\" class=\"examplediv\">
<table class=\"tabelle\"  border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"350\">
  </colgroup>


<thead>

 <tr>
  <th>Verein</th>
  <th>Liga</th>
  <th>Bundesland</th>
 </tr>
</thead>
";





$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($vereindb))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

if($dsatz['IdVerein']!=9000){ //Kein Verein wird nicht angezeigt


$i = $i+1;

     $Id="Id" . $i;
     $Verein="Verein" . $i;
     $Loeschen="Loeschen" . $i;
     $Bundesliga="Bundesliga" . $i;
     $Land="Land".$i;

echo "<input type=\"text\" name=$Id size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdVerein']."\"readonly>";


if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}

echo "<tr align=\"center\">";


     echo "<td>";

          echo "<input type=\"text\" name=$Verein size=\"25\" value=\"".$dsatz['Verein']."\">";

          echo "<input type=\"submit\" name=$Loeschen value=\"Loeschen\">";

     echo "</td>";


     echo "<td align=\"center\">";
       if($dsatz['Bundesliga']==1)
           echo "<input type=\"checkbox\" name=$Bundesliga value=\"1\" checked>";
       else
           echo "<input type=\"checkbox\" name=$Bundesliga value=\"1\">";
     echo "</td>";


     echo "<td>";

     echo "<select name=\"$Land\" size=\"1\" class=\"Auswahl\">";                // Spalte (Mit drop down bar)

     $Land = dbBefehl("SELECT * FROM laender");

     while($dataAuswahl = mysqli_fetch_assoc($Land))
     {
     	if($dataAuswahl['Idlaender']==$dsatz['IdLaender'])
     		echo "<option value=".$dataAuswahl['Idlaender']." selected>".$dataAuswahl['laender']."</option>";
     	else
     		echo "<option value=".$dataAuswahl['Idlaender'].">".$dataAuswahl['laender']."</option>";
     }

     echo "</select>";



     echo "</td>";

echo "</tr>";



     if(isset($_POST['Loeschen' . $i]))                                                                                          //L�schen
         {
          $x=1;


           dbBefehl("DELETE FROM verein
                               WHERE IdVerein ='" . $_POST['Id' . $i] . "
                               '");


          $new_Verein="1";

         }


         if((isset($_POST['speichern'])) || ($new_Heber=='1'))
         {


             $x=1;


             $_POST['Verein' . $i]=str_replace('_,_',' ',$_POST['Verein' . $i]);

             $_POST['Gewicht' . $i]=str_replace(",",".", $_POST['Gewicht' . $i]);


                 dbBefehl("UPDATE verein
                              SET Verein= '" . $_POST['Verein' . $i] . "', Bundesliga = '" . $_POST['Bundesliga' . $i] . "',
								IdLaender='" . $_POST['Land' . $i] . "'
                              WHERE IdVerein ='" . $_POST['Id' . $i] . "'");

}

}//Ende if IdVerein!=9000 (Kein Verein)

}   //Ende While
echo "</tbody>";
echo "</table>";

if($_SESSION['Seite_V']!=1)
echo '<input class="But" type="submit" name="SeiteZurueck" value="<">';

for($SeitenZaeler=1; $SeitenZaeler<=$Seiten; $SeitenZaeler++){

$N_Seite="Seite" . $SeitenZaeler;

    if($SeitenZaeler==$_SESSION['Seite_V'])
        echo "<input id=\"AktuelleSeite\" class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";
    else
        echo "<input class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";

    if(isset($_POST[$N_Seite])) { $_SESSION['Seite_V']=$SeitenZaeler; $x=1;}

}
echo '<input class="But" type="submit" name="SeiteVor" value=">">';

if(isset($_POST['SeiteZurueck'])){ $_SESSION['Seite_V']--; $x=1;}
if(isset($_POST['SeiteVor'])){ $_SESSION['Seite_V']++; $x=1;}

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'vereine.php'
   },0)
 </script>
";
}

?>

<br>

<input type="submit" name="newVerein" value="Neuer Verein">

<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">


</form>
</body>
</html>
