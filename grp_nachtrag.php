<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Gruppeneinteilung</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/gruppen.css">


</head>

<body>

<form method="post" action="grp_nachtrag.php">

<p class="kopf"><b>Gruppeneinteilung - Nachtrag</b></p>


<a href="wettkampf.php" title="Link zur Planung" id="range-logo">Wettkampf</a>


<?php


ob_start ();
error_reporting(0);


$conn = mysql_connect("database_hhp","root","") or die(mysql_error());
mysql_select_db("test");

$data_a_db[S_Db]=$_SESSION['WeK'];

         $datenbank = mysql_query("SELECT * FROM stammdaten_wk_$data_a_db[S_Db]")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $dsatz = mysql_fetch_assoc($datenbank);



         $grp = mysql_query("SELECT * FROM gruppen_zeit_$data_a_db[S_Db]")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());




         $Check_K = mysql_query("SELECT * FROM alters_klassen")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $Zahl_Gruppen = mysql_num_rows($grp);


 $time=getdate();

 $Zaeler=0;

while($Zahl_Gruppen >= $Zaeler)                  //Variablen Ersteller zum Z�hlen der Teilnehmer der Gruppen(Mehrkampf)
{

$Zaeler= $Zaeler + 1;


${'vari' . $Zaeler}=0;

}




if($dsatz[Wk_Art] == "ZK")
{




                                                                         //�ber Tabelle
echo "
<div id=\"divid1\" class=\"examplediv\">
<table class=\"tabelle\" border=\"0\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"25%\">
    <col width=\"25%\">
    <col width=\"25%\">
    <col width=\"25%\">

  </colgroup>

  <tr>
";


$x=0;

$C_K=0;
$C_S=0;
$C_J=0;
$C_E=0;


while($d_Check_K = mysql_fetch_assoc($Check_K))
{

$Von=$time[year] - $d_Check_K[Von];
$Bis=$time[year] - $d_Check_K[Bis];



                  $heber = mysql_query("SELECT * FROM heber_$data_a_db[S_Db], heber
                                         WHERE heber_$data_a_db[S_Db].IdHeber = heber.IdHeber
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis")
                  OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


                  $Checker = mysql_fetch_assoc($heber);



                  if($Checker != "" && $d_Check_K[Klasse] == "Kinder")
                  {
                  $C_K=1;

                  }


                  if($Checker != "" && $d_Check_K[Klasse] == "Sch�ler")
                  {
                  $C_S=1;

                  }


                  if($Checker != "" && $d_Check_K[Klasse] == "Junioren")
                  {
                  $C_J=1;

                  }


                  if($Checker != "" && $d_Check_K[Klasse] == "Senioren")
                  {
                  $C_E=1;

                  }


}


if($C_K=="1")
{


echo"<td>";

include "gewichtsklassen/kinder_gruppen.php";

echo"</td>";

}



if($C_S=="1")
{

echo"<td>";

include "gewichtsklassen/schueler_gruppen.php";

echo"</td>";

}


if($C_J=="1")
{

echo"<td>";

include "gewichtsklassen/jugend_gruppen.php";


echo"</td>";

}


if($C_E=="1")
{

echo"<td>";

include "gewichtsklassen/erw_gruppen.php";

echo"</td>";

}

echo"</tr>";


$D_Gruppen = mysql_query("SELECT Gruppen
                          FROM gruppen_zeit_$data_a_db[S_Db]
                          ");


$z�hler=0;



while($dataD_G = mysql_fetch_assoc($D_Gruppen))
{
$z�hler=$z�hler + 1;

$var1="g" . $z�hler;

$v1="g_K_M_" . $z�hler;
$v2="g_K_W_" . $z�hler;
$v3="g_S_M_" . $z�hler;
$v4="g_S_W_" . $z�hler;
$v5="g_J_M_" . $z�hler;
$v6="g_J_W_" . $z�hler;
$v7="g_E_M_" . $z�hler;
$v8="g_E_W_" . $z�hler;



$$var1 = $$v1 + $$v2 + $$v3 + $$v4 + $$v5 + $$v6 + $$v7 + $$v8;



}


echo"<tr>";

echo"<td colspan=\"4\">";



echo "
<table  class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"120\">
    <col width=\"65\">
    <col width=\"65\">
    <col width=\"120\">

  </colgroup>


<thead>

 <tr>
  <th>Gruppen</th>
  <th>Anzahl</th>
  <th>Bridge</th>
  <th>Wiege Zeit</th>
  <th>Wettkampf Zeit</th>

 </tr>
</thead>
";

      $c=0;


         while($dataGrp = mysql_fetch_assoc($grp))
         {

          $c=$c+1;

          $gruppe="g" . $c;
          $Id_grp="Id_grp" . $c;
          $Zeit="Zeit" . $c;
          $Auswahl="Auswahl" . $c;
          $Wiege_Zeit="Wiege_Zeit" . $c;


          echo "<input type=\"text\" name=$Id_grp size=\"0\" style=\" visibility:hidden; \" value=\"$dsatz[Id]\"readonly>";

          echo"<tbody>";


                 echo "<tr>";

                   echo "<td>";



                         echo "Gruppe $dataGrp[Gruppen]";


                   echo "</td>";


                   echo "<td>";

                        echo $$gruppe;                           //nimmt Dynamisch den Namen der Gruppen variablen an die die Heber z�hlt

                   echo "</td>";




                   echo "<td>";                                                                                                // Spalte (Mit drop down bar)

                         echo "<select name=\"$Auswahl\" size=\"1\" class=\"Auswahl\">";



                                 $Bridgen = mysql_query("SELECT *
                                                         FROM bridgen
                                                         ")

                                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());




                                 while($dataAuswahl = mysql_fetch_assoc($Bridgen))
                                 {

                                         if($dataAuswahl[Bridge]==$dataGrp[Bridge])
                                         {

                                                 echo "<option value=$dataAuswahl[Bridge] selected>$dataAuswahl[Bridge]</option>";

                                         }
                                         else{
                                                 echo "<option value=$dataAuswahl[Bridge]>$dataAuswahl[Bridge]</option>";
                                         }


                                 }



                         echo "</select>";

                   echo "</td>";


                   echo "<td>";


                         echo "<input type=\"text\" name=$Wiege_Zeit size=\"3\" value=\"$dataGrp[Wiege_Zeit]\">Uhr";


                   echo "</td>";



                   echo "<td>";


                         echo "<input type=\"text\" name=$Zeit size=\"3\" value=\"$dataGrp[WK_Zeit]\">Uhr";


                   echo "</td>";



               echo "</tr>";




            if(isset($_POST['speichern']))
            {




               $x=1;


                    mysql_query("UPDATE gruppen_zeit_$data_a_db[S_Db]
                                 SET WK_Zeit= '" . $_POST['Zeit' . $c] . "', Wiege_Zeit= '" . $_POST['Wiege_Zeit' . $c] . "',
                                 Bridge= '" . $_POST['Auswahl' . $c] . "'
                                 WHERE Gruppen='$c'")


                    OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

            }


         }



echo"</tbody> ";

echo "</table>";


echo"

<br>

Gruppen <input type=\"submit\" name=\"plus\" value=\"+\">

<input type=\"submit\" name=\"minus\" value=\"-\">
";







echo "</tr>";

echo "</table>";


echo"

<br>
<br>
<input type=\"submit\" name=\"speichern\" value=\"Speichern\">

<br>
<br>

<a href=planung.php><img src=\"Home.jpg\" width=\"50\" height=\"47\" border=\"0\"
onmouseover=\"this.src='home2.jpg'\" onmouseout=\"this.src='home.jpg'\" alt=\"Zur�ck zum Index\"></a>


";



if(isset($_POST['plus']))
{

    $x=1;


         $g_plus = mysql_query("SELECT * FROM gruppen_zeit_$data_a_db[S_Db]")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $num_g = mysql_num_rows($g_plus);

         $neu=$num_g + 1;

         mysql_query("INSERT INTO gruppen_zeit_$data_a_db[S_Db] (Gruppen, WK_Zeit, Wiege_Zeit, Bridge)
                      Values ('$neu', '00:00', '00:00', '1')")

         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



}



if(isset($_POST['minus']))
{

    $x=1;


         $g_plus = mysql_query("SELECT * FROM gruppen_zeit_$data_a_db[S_Db]")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $num_g = mysql_num_rows($g_plus);


                 mysql_query("DELETE FROM gruppen_zeit_$data_a_db[S_Db]
                              WHERE Gruppen ='$num_g'")

                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



}




if($x==1)
{
header('Location: http://localhost/ksv/grp_nachtrag.php');
}









}else{                                                                            //Ende der Gruppeneinteilung f�r Zweikampf
                                                                                  //Und Anfang f�r Mehrkampf einteilung


echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"CSS/table.css\">";       //CSS f�r die Mehrkampf tabelle









         $heber = mysql_query("SELECT * FROM heber_$data_a_db[S_Db], heber
                               WHERE heber_$data_a_db[S_Db].IdHeber = heber.IdHeber
                               ORDER BY heber.Jahrgang DESC, heber.Geschlecht ASC, heber.Gewicht ASC ")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         $Verein = mysql_query("SELECT * FROM verein")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());










$x=0;




echo"<div id=\"divid1\" class=\"examplediv\">";




echo "

<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"250\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">

  </colgroup>


<thead>

 <tr>
  <th>Name</th>
  <th>Jahrgang</th>
  <th>Gewicht</th>
  <th>Geschlecht</th>
  <th>Gruppe</th>


 </tr>
</thead>
";





$time=getdate();

$i = 0;


while($dsatz = mysql_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{




$i = $i+1;


     $Id="Id" . $i;
     $L�schen="L�schen" . $i;
     $Gruppe="Gruppe" . $i;


echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"$dsatz[IdHeber]\"readonly>";



if ($dsatz[Geschlecht] == Weiblich) {                                            //Zeilen Farbe nach Geschlecht

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}





echo "<tr>";




     echo "<td>";



                 echo "<span style=\"width:100px;display:block;float:left;\"> $dsatz[Name] </span>";

                 echo "<span style=\"width:100px;display:block;float:left;\"> $dsatz[Vorname] </span>";


     echo "</td>";



     echo "<td>";


          echo "$dsatz[Jahrgang]";


     echo "</td>";



     echo "<td>";


          echo "$dsatz[Gewicht]&nbsp; Kg";


     echo "</td>";




     echo "<td>";

          echo "$dsatz[Geschlecht]";

     echo "</td>";



     echo "<td>";

          echo "<select name=\"$Gruppe\" size=\"1\" class=\"Auswahl\">";




         $Gruppen = mysql_query("SELECT Gruppen
                                 FROM gruppen_zeit_$data_a_db[S_Db]
                                 ");

         $Auswahl = mysql_query("SELECT Gruppe
                                 FROM heber_$data_a_db[S_Db]
                                 WHERE IdHeber='$dsatz[IdHeber]'
                                 ");


         $dataAuswahl = mysql_fetch_assoc($Auswahl);




                       while($dataGruppen = mysql_fetch_assoc($Gruppen))
                       {

                                 if($dataGruppen[Gruppen]==$dataAuswahl[Gruppe])
                                 {

                                         echo "<option value=$dataGruppen[Gruppen] selected>$dataGruppen[Gruppen]</option>";

                                         $finder=$dataGruppen[Gruppen];




                                 }
                                 else{
                                         echo "<option value=$dataGruppen[Gruppen]>$dataGruppen[Gruppen]</option>";
                                 }


                        }




                        ${'vari' . $finder}= ${'vari' . $finder} +1;


                  echo "</select>";




         echo "</td>";




echo "</tr>";











if(isset($_POST['speichern']))
         {


             $x=1;



                 mysql_query("UPDATE heber_$data_a_db[S_Db]
                              SET Gruppe= '" . $_POST['Gruppe' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         }










}
echo "</tbody>";
echo "</table>";



echo "
<table  class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"120\">
    <col width=\"65\">
    <col width=\"65\">
    <col width=\"120\">

  </colgroup>


<thead>

 <tr>
  <th>Gruppen</th>
  <th>Anzahl</th>
  <th>Bridge</th>
  <th>Wiege Zeit</th>
  <th>Wettkampf Zeit</th>

 </tr>
</thead>
";

      $c=0;


         while($dataGrp = mysql_fetch_assoc($grp))
         {

          $c=$c+1;

          $gruppe="g" . $c;
          $Id_grp="Id_grp" . $c;
          $Zeit="Zeit" . $c;
          $Auswahl="Auswahl" . $c;
          $Wiege_Zeit="Wiege_Zeit" . $c;


          echo "<input type=\"text\" name=$Id_grp size=\"0\" style=\" visibility:hidden; \" value=\"$dsatz[Id]\"readonly>";

          echo"<tbody>";


                 echo "<tr>";

                   echo "<td>";



                         echo "Gruppe $dataGrp[Gruppen]";


                   echo "</td>";


                   echo "<td>";

                        echo ${'vari' . $c};                           //nimmt Dynamisch den Namen der Gruppen variablen an die die Heber z�hlt

                   echo "</td>";




                   echo "<td>";                                                                                                // Spalte (Mit drop down bar)

                         echo "<select name=\"$Auswahl\" size=\"1\" class=\"Auswahl\">";



                                 $Bridgen = mysql_query("SELECT *
                                                         FROM bridgen
                                                         ")

                                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());




                                 while($dataAuswahl = mysql_fetch_assoc($Bridgen))
                                 {

                                         if($dataAuswahl[Bridge]==$dataGrp[Bridge])
                                         {

                                                 echo "<option value=$dataAuswahl[Bridge] selected>$dataAuswahl[Bridge]</option>";

                                         }
                                         else{
                                                 echo "<option value=$dataAuswahl[Bridge]>$dataAuswahl[Bridge]</option>";
                                         }


                                 }



                         echo "</select>";

                   echo "</td>";


                   echo "<td>";


                         echo "<input type=\"text\" name=$Wiege_Zeit size=\"3\" value=\"$dataGrp[Wiege_Zeit]\">Uhr";


                   echo "</td>";



                   echo "<td>";


                         echo "<input type=\"text\" name=$Zeit size=\"3\" value=\"$dataGrp[WK_Zeit]\">Uhr";


                   echo "</td>";



               echo "</tr>";




            if(isset($_POST['speichern']))
            {




               $x=1;


                    mysql_query("UPDATE gruppen_zeit_$data_a_db[S_Db]
                                 SET WK_Zeit= '" . $_POST['Zeit' . $c] . "', Wiege_Zeit= '" . $_POST['Wiege_Zeit' . $c] . "',
                                 Bridge= '" . $_POST['Auswahl' . $c] . "'
                                 WHERE Gruppen='$c'")


                    OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

            }


         }



echo"</tbody> ";

echo "</table>";


echo"

<br>

Gruppen <input type=\"submit\" name=\"plus\" value=\"+\">

<input type=\"submit\" name=\"minus\" value=\"-\">
";




if(isset($_POST['plus']))
{

    $x=1;


         $g_plus = mysql_query("SELECT * FROM gruppen_zeit_$data_a_db[S_Db]")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $num_g = mysql_num_rows($g_plus);

         $neu=$num_g + 1;

         mysql_query("INSERT INTO gruppen_zeit_$data_a_db[S_Db] (Gruppen, WK_Zeit, Wiege_Zeit, Bridge)
                      Values ('$neu', '00:00', '00:00', '1')")

         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



}



if(isset($_POST['minus']))
{

    $x=1;


         $g_plus = mysql_query("SELECT * FROM gruppen_zeit_$data_a_db[S_Db]")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $num_g = mysql_num_rows($g_plus);


                 mysql_query("DELETE FROM gruppen_zeit_$data_a_db[S_Db]
                              WHERE Gruppen ='$num_g'")

                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



}





if($x==1)
{
header('Location: http://hannespc/ksv/grp_nachtrag.php');
}







}



?>

<br>
<br>
<input type="submit" name="speichern" value="Speichern">





</body>
</html>