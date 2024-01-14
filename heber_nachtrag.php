<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">





</head>



<body>



<form method="post" action="heber_nachtrag.php">

<p class="kopf"><b>Heber</b></p>

<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>



<?php


ob_start ();
error_reporting(1);


$conn = mysql_connect("database_hhp","root","") or die(mysql_error());
mysql_select_db("test");

$data_a_db[S_Db]=$_SESSION['WeK'];

         mysql_query("UPDATE heber
                      SET Auswahl=''
                              ")

         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());





         $aktu_auswahl = mysql_query("SELECT * FROM heber, heber_$data_a_db[S_Db]
                                      WHERE heber.IdHeber = heber_$data_a_db[S_Db].IdHeber")

         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         while($dataAktuell = mysql_fetch_assoc($aktu_auswahl))
         {

                 mysql_query("UPDATE heber
                              SET Auswahl='Auswahl'
                              WHERE IdHeber = $dataAktuell[IdHeber]")

                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         }










         $heber = mysql_query("SELECT * FROM heber ORDER BY heber.Name ASC")                 //$heber war mal $trainer
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

         $Verein = mysql_query("SELECT * FROM verein")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());




         $num = mysql_num_rows($heber);














$x=0;


echo "<table class=tabelle border=\"5\" width=\"450\" cellpadding=\"4\" cellspacing=\"5\">";

echo "  <colgroup>
         <col width=\"28%\">
         <col width=\"28%\">
         <col width=\"28%\">
         <col width=\"16%\">

         </colgroup>";



echo "<tfoot>";
  echo "<tr>";

    echo "<td>";

         echo "Verein";

    echo "</td>";


    echo "<td>";
    echo "</td>";


  echo "</tr>";


  echo "<tr>";

    echo"<td>";



         echo "<select name=\"Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>W�hlen...</option>";

         while($dataAuswahl = mysql_fetch_assoc($Verein))
         {


           $merke=str_replace(' ','_,_',$dataAuswahl[Verein]);

                 echo "<option value=$merke>$dataAuswahl[Verein]</option>";


         }

         echo "</select>";


    echo "</td>";




    echo "<td align=\"center\">";

         echo "<input type=\"submit\" name=Filter value=\"Filtern\">";

    echo "</td>";

  echo "</tr>";

echo "</tfoot>";
echo "</table>";




if(isset($_POST['Filter']))
{

$orginal=str_replace('_,_',' ',$_POST['Auswahl']);

         if($_POST['Auswahl'] != "")
         {

                 $heber = mysql_query("SELECT * FROM heber
                                         WHERE Verein = '$orginal'
                                         ORDER BY heber.Name ASC")

                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         }




}








if(isset($_POST['newHeber']))                                                       //Mehr Zeilen
{

         $x=1;


         mysql_query("INSERT INTO heber (Name, Vorname)
                      Values ('Neuer ', 'Heber')")

         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



}


echo "
<div id=\"divid1\" class=\"examplediv\">
<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"80\">
    <col width=\"350\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">

  </colgroup>


<thead>

 <tr>
  <th>Gemeldet</th>
  <th>Name</th>
  <th>Verein</th>
  <th>Jahrgang</th>
  <th>Gewicht</th>
  <th>Klasse</th>
  <th>Land</th>
  <th>Geschlecht</th>
 </tr>
</thead>
";





$time=getdate();

$i = 0;


while($dsatz = mysql_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{









$i = $i+1;


     $Id="Id" . $i;
     $Name="Name" . $i;
     $Vorname="Vorname" . $i;
     $Verein="Verein" . $i;
     $Jahrgang="Jahrgang" . $i;
     $L�schen="L�schen" . $i;
     $Gewicht="Gewicht" . $i;
     $Land="Land" . $i;
     $Geschlecht="Geschlecht" . $i;
     $Auswahl="Auswahl" . $i;
     $Safe_Verein="Safe_Verein" . $i;




echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"$dsatz[IdHeber]\"readonly>";




if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}




echo "<tr align=\"center\">";




     if($dsatz[Auswahl]=="Auswahl")
     {

         echo "<td align=\"center\">";


                 echo "<input type=\"checkbox\" name=$Auswahl value=\"Auswahl\" checked>";


         echo "</td>";

     }else{

         echo "<td align=\"center\">";


                 echo "<input type=\"checkbox\" name=$Auswahl value=\"Auswahl\">";


         echo "</td>";

     }




     echo "<td>";


          echo "<input type=\"text\" name=$Name size=\"10\" value=\"$dsatz[Name]\">";

          echo "<input type=\"text\" name=$Vorname size=\"10\" value=\"$dsatz[Vorname]\">";

          echo "<input type=\"submit\" name=$L�schen value=\"L�schen\">";


     echo "</td>";




     echo "<td>";                                                                                                // Spalte (Mit drop down bar)

          echo "<select name=\"$Verein\" size=\"1\" class=\"Auswahl\">";

          echo "<option value=keinVerein>kein Verein</option>";


         $Verein = mysql_query("SELECT Verein
                                 FROM heber
                                 WHERE IdHeber = '" . $dsatz[IdHeber] . "'
                                 ")

                                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         $dataVerein = mysql_fetch_assoc($Verein);



         $Auswahl = mysql_query("SELECT Verein
                                 FROM verein
                                 ");




                       while($dataAuswahlV = mysql_fetch_assoc($Auswahl))
                       {

                                 if($dataAuswahlV[Verein]==$dataVerein[Verein])
                                 {

                                         $Safe_Verein=str_replace(' ','_,_',$dataAuswahlV[Verein]);


                                         echo "<option value=$Safe_Verein selected>$dataAuswahlV[Verein]</option>";



                                 }
                                 else{

                                         $Safe_Verein=str_replace(' ','_,_',$dataAuswahlV[Verein]);


                                         echo "<option value=$Safe_Verein>$dataAuswahlV[Verein]</option>";
                                 }


                        }



                  echo "</select>";




         echo "</td>";




     echo "<td>";


          echo "<input type=\"text\" name=$Jahrgang size=\"6\" value=\"$dsatz[Jahrgang]\">";


     echo "</td>";



     echo "<td>";


          echo "<input type=\"text\" name=$Gewicht size=\"3\" value=\"$dsatz[Gewicht]\">Kg";


     echo "</td>";



     echo "<td>";




         $Alter=$time[year]-$dsatz[Jahrgang];




         $Klasse = mysql_query("SELECT * FROM alters_klassen
                                 ")

                                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



                       while($dataKlassen = mysql_fetch_assoc($Klasse))
                       {

                                 if($dataKlassen[Von] <= $Alter && $dataKlassen[Bis] >= $Alter)
                                 {

                                         echo"$dataKlassen[Klasse]";

                                 }



                        }


     echo "</td>";



     echo "<td>";



                                                                                                // Spalte (Mit drop down bar)

          echo "<select name=\"$Land\" size=\"1\" class=\"Auswahl\">";



         $DLand = mysql_query("SELECT Land
                                 FROM heber
                                 WHERE IdHeber = '" . $dsatz[IdHeber] . "'
                                 ")

                                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         $dataLand = mysql_fetch_assoc($DLand);


         $Land = mysql_query("SELECT * FROM laender")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());




                       while($dataAuswahl = mysql_fetch_assoc($Land))
                       {

                                 if($dataAuswahl[laender]==$dataLand[Land])
                                 {

                                         echo "<option value=$dataAuswahl[laender] selected>$dataAuswahl[laender]</option>";

                                 }
                                 else{
                                         echo "<option value=$dataAuswahl[laender]>$dataAuswahl[laender]</option>";
                                 }


                        }



                  echo "</select>";

     echo "</td>";




     echo "<td>";                                                                                                // Spalte (Mit drop down bar)

          echo "<select name=\"$Geschlecht\" size=\"1\" class=\"Auswahl\">";



         $Geschlecht = mysql_query("SELECT Geschlecht
                                    FROM heber
                                    WHERE IdHeber = '" . $dsatz[IdHeber] . "'
                                   ")

                                   OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         $dataGeschlecht = mysql_fetch_assoc($Geschlecht);



         $Auswahl_G = mysql_query("SELECT Geschlecht
                                   FROM geschlecht
                                  ");




                       while($dataAuswahl_G = mysql_fetch_assoc($Auswahl_G))
                       {

                                 if($dataAuswahl_G[Geschlecht]==$dsatz[Geschlecht])
                                 {

                                         echo "<option value=$dataAuswahl_G[Geschlecht] selected>$dataAuswahl_G[Geschlecht]</option>";

                                 }
                                 else{
                                         echo "<option value=$dataAuswahl_G[Geschlecht]>$dataAuswahl_G[Geschlecht]</option>";
                                 }


                        }



                  echo "</select>";

         echo "</td>";



echo "</tr>";



         if(isset($_POST['speichern']))
         {


             $x=1;




             $_POST['Verein' . $i]=str_replace('_,_',' ',$_POST['Verein' . $i]);

             $_POST['Gewicht' . $i]=str_replace(",",".", $_POST['Gewicht' . $i]);



                 mysql_query("UPDATE heber
                              SET Name= '" . $_POST['Name' . $i] . "',Vorname= '" . $_POST['Vorname' . $i] . "',Verein= '" . $_POST['Verein' . $i] . "',
                              Jahrgang='" . $_POST['Jahrgang' . $i] . "', Gewicht= '" . $_POST['Gewicht' . $i] . "', Land= '" . $_POST['Land' . $i] . "',
                              Geschlecht= '" . $_POST['Geschlecht' . $i] . "', Auswahl= '" . $_POST['Auswahl' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());






         $Safe = mysql_query("SELECT * FROM heber_$data_a_db[S_Db]")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());





       $z=0;







          if($_POST['Auswahl' . $i] == "Auswahl")
         {




                 while($dataSafe = mysql_fetch_assoc($Safe))
                 {
;


                         if($dataSafe[IdHeber] =="" . $_POST['Id' . $i] . "")
                         {

                          $z=1;

                         }


                  }

;



                 if($z==0)
                 {

                         mysql_query("INSERT INTO heber_$data_a_db[S_Db] (IdHeber)

                                      Values ('" . $_POST['Id' . $i] . "')")
                         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



                         mysql_query("INSERT INTO heber_wk_$data_a_db[S_Db] (IdHeber, Versuch)

                                      Values ('" . $_POST['Id' . $i] . "', '1')")
                         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


                         mysql_query("INSERT INTO heber_wk_$data_a_db[S_Db] (IdHeber, Versuch)

                                      Values ('" . $_POST['Id' . $i] . "', '2')")
                         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


                         mysql_query("INSERT INTO heber_wk_$data_a_db[S_Db] (IdHeber, Versuch)

                                      Values ('" . $_POST['Id' . $i] . "', '3')")
                         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

                 }




         }


         if($_POST['Auswahl' . $i] == false)
         {

           mysql_query("DELETE FROM heber_$data_a_db[S_Db]
                               WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


           OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



           mysql_query("DELETE FROM heber_wk_$data_a_db[S_Db]
                               WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


           OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

         }

}





         if(isset($_POST['L�schen' . $i]))                                                                                          //L�schen
         {
          $x=1;


           mysql_query("DELETE FROM heber
                               WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


           OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

           mysql_query("DELETE FROM heber_$data_a_db[S_Db]
                               WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


           OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



           mysql_query("DELETE FROM heber_wk_$data_a_db[S_Db]
                               WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


           OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

         }








}
echo "</tbody>";
echo "</table>";



if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'http://htp-test1.de/heber_nachtrag.php'
   },0)
 </script>
";
}


?>




<input type="submit" name="newHeber" value="Neuer Heber">



<br>
<br>
<input type="submit" name="speichern" value="Speichern">

<br>
<br>

<a href=wettkampf.php><img src="Home.jpg" width="50" height="47" border="0" onmouseover="this.src='home2.jpg'" onmouseout="this.src='home.jpg'" alt="Zur�ck zum Index"></a>







</body>
</html>
