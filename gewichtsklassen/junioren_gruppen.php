<?php


$gewichtsklassen = mysql_query("SELECT * FROM gewichtsklassen")
OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

$gewichtsklassenW = mysql_query("SELECT * FROM gewichtsklassen")
OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


$Klasse = mysql_query("SELECT * FROM alters_klassen
                       WHERE Klasse='Junioren'")
OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



$d_Klasse = mysql_fetch_assoc($Klasse);

$time=getdate();




echo "
<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"125\">
    <col width=\"60\">
    <col width=\"70\">

  </colgroup>


<thead>
 <tr>
   <th colspan=\"3\" >Junioren</th>
 </tr>

 <tr>
  <th>Gewichtsklassen</th>
  <th>Anzahl</th>
  <th>Gruppe</th>

 </tr>
</thead>
";

$i = 0;
$g = 0;

$g_Jun_M_1=0;
$g_Jun_M_2=0;
$g_Jun_M_3=0;
$g_Jun_M_4=0;
$g_Jun_M_5=0;



while($dsatz = mysql_fetch_assoc($gewichtsklassen))
{

$i = $i+1;
$finder = 1;

     $Id="Id" . $i;
     $G_Jun_M="G_Jun_M" . $i;

      echo"<tbody>";

      echo"<tr>";

         echo"<td>";


           if($dsatz[E_M] == "1")
           {
                 echo "M +105";

           }else{
                 echo "M -$dsatz[E_M]";
           }



         echo"</td>";


         echo"<td>";

         $y=0;


$Von=$time[year] - $d_Klasse[Von];
$Bis=$time[year] - $d_Klasse[Bis];



                 $heber = mysql_query("SELECT * FROM heber_$data_a_db[S_Db], heber
                                         WHERE heber_$data_a_db[S_Db].IdHeber = heber.IdHeber
                                         AND heber.Geschlecht= 'Männlich'
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis")
                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());




           if($dsatz[E_M] == "1")
           {



                 while($dsatzH = mysql_fetch_assoc($heber))
                 {
                         if($dsatzH[Gewicht] > $g)
                         {
                         $y=$y+1;


                                 if(isset($_POST['speichern']))
                                 {

                                 mysql_query("UPDATE heber_$data_a_db[S_Db]
                                              SET Gruppe= '" . $_POST['G_Jun_M' . $i] . "'
                                              WHERE IdHeber='$dsatzH[IdHeber]'")


                                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

                                 }

                         }

                 }


           }else{



                 while($dsatzH = mysql_fetch_assoc($heber))
                 {
                         if($dsatzH[Gewicht] <= $dsatz[E_M] && $dsatzH[Gewicht]> $g)
                         {
                         $y=$y+1;


                                 if(isset($_POST['speichern']))
                                 {

                                 mysql_query("UPDATE heber_$data_a_db[S_Db]
                                              SET Gruppe= '" . $_POST['G_Jun_M' . $i] . "'
                                              WHERE IdHeber='$dsatzH[IdHeber]'")


                                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

                                 }

                         }



                 }

            }





                 echo "$y";

         echo"</td>";


     echo "<td>";

          echo "<select name=\"$G_Jun_M\" size=\"1\" class=\"Auswahl\">";




         $Gruppen = mysql_query("SELECT Gruppen
                                 FROM gruppen_zeit_$data_a_db[S_Db]
                                 ");

         $Auswahl = mysql_query("SELECT Gk_Jun_M
                                 FROM gruppen_$data_a_db[S_Db]
                                 WHERE Id='$i'
                                 ");


         $dataAuswahl = mysql_fetch_assoc($Auswahl);




                       while($dataGruppen = mysql_fetch_assoc($Gruppen))
                       {

                                 if($dataGruppen[Gruppen]==$dataAuswahl[Gk_Jun_M])
                                 {

                                         echo "<option value=$dataGruppen[Gruppen] selected>$dataGruppen[Gruppen]</option>";

                                         $finder=$dataGruppen[Gruppen];

                                 }
                                 else{
                                         echo "<option value=$dataGruppen[Gruppen]>$dataGruppen[Gruppen]</option>";
                                 }


                        }



                  echo "</select>";




         echo "</td>";

      echo"</tr>";
      echo"</tbody>";

      if(isset($_POST['speichern']))
      {


             $x=1;


                 mysql_query("UPDATE gruppen_$data_a_db[S_Db]
                              SET Gk_Jun_M= '" . $_POST['G_Jun_M' . $i] . "'
                              WHERE Id='$i'")


                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

       }


         $D_Gruppen = mysql_query("SELECT Gruppen
                                   FROM gruppen_zeit_$data_a_db[S_Db]
                                   ");


$zähler=0;



                       while($dataD_G = mysql_fetch_assoc($D_Gruppen))                  //Dynamisches Zählen der Heber pro Gruppe
                       {

                         $zähler=$zähler + 1;

                         $variable="g_Jun_M_" . $zähler;


                         if($finder==$dataD_G[Gruppen])
                         {

                                 $$variable = $$variable + $y;


                         }




                       }



      $g=$dsatz[E_M];




}       //Ende erste while schleife





    echo"<tbody>";

      echo"<tr>";                            //Leere reihe

         echo"<td colspan=\"3\">";
                 echo"&nbsp;";

         echo"</td>";


      echo"</tr>";
    echo"</tbody>";

$gw=0;
$b=0;





while($dsatzW = mysql_fetch_assoc($gewichtsklassenW))
{

$b = $b+1;
$finder=1;

     $Id="Id" . $b;
     $G_Jun_W="G_Jun_W" . $b;            //Änderung


    echo"<tbody>";

     if($dsatzW[E_W] != "")              //Änderung
     {

      echo"<tr align=\"center\">";

         echo"<td>";

           if($dsatzW[E_W] == "1")           //Änderung
           {
                 echo "W +75";

           }else{
                 echo "W -$dsatzW[E_W]";      //Änderung
           }

         echo"</td>";


         echo"<td>";

         $y=0;


                 $heber = mysql_query("SELECT * FROM heber_$data_a_db[S_Db], heber
                                         WHERE heber_$data_a_db[S_Db].IdHeber = heber.IdHeber
                                         AND heber.Geschlecht= 'Weiblich'
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis")
                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());





           if($dsatzW[E_W] == "1")
           {


                 while($dsatzH = mysql_fetch_assoc($heber))
                 {
                         if($dsatzH[Gewicht] > $gw)
                         {
                         $y=$y+1;


                                 if(isset($_POST['speichern']))
                                 {

                                 mysql_query("UPDATE heber_$data_a_db[S_Db]
                                              SET Gruppe= '" . $_POST['G_Jun_W' . $b] . "'
                                              WHERE IdHeber='$dsatzH[IdHeber]'")


                                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

                                 }

                         }

                 }


           }else{


                 while($dsatzH = mysql_fetch_assoc($heber))
                 {
                         if($dsatzH[Gewicht] <= $dsatzW[E_W] && $dsatzH[Gewicht]> $gw)
                         {
                         $y=$y+1;


                                 if(isset($_POST['speichern']))
                                 {

                                 mysql_query("UPDATE heber_$data_a_db[S_Db]
                                              SET Gruppe= '" . $_POST['G_Jun_W' . $b] . "'
                                              WHERE IdHeber='$dsatzH[IdHeber]'")


                                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

                                 }

                         }



                 }
            }





                 echo "$y";

         echo"</td>";


     echo "<td>";

          echo "<select name=\"$G_Jun_W\" size=\"1\" class=\"Auswahl\">";



         $Gruppen = mysql_query("SELECT Gruppen
                                 FROM gruppen_zeit_$data_a_db[S_Db]
                                 ");

         $Auswahl = mysql_query("SELECT Gk_Jun_W
                                 FROM gruppen_$data_a_db[S_Db]
                                 WHERE Id='$b'
                                 ");


         $dataAuswahl = mysql_fetch_assoc($Auswahl);




                       while($dataGruppen = mysql_fetch_assoc($Gruppen))
                       {

                                 if($dataGruppen[Gruppen]==$dataAuswahl[Gk_Jun_W])
                                 {

                                         echo "<option value=$dataGruppen[Gruppen] selected>$dataGruppen[Gruppen]</option>";

                                         $finder=$dataGruppen[Gruppen];

                                 }
                                 else{
                                         echo "<option value=$dataGruppen[Gruppen]>$dataGruppen[Gruppen]</option>";
                                 }


                        }



                  echo "</select>";

         echo "</td>";

      echo"</tr>";




      if(isset($_POST['speichern']))
      {


             $x=1;


                 mysql_query("UPDATE gruppen_$data_a_db[S_Db]
                              SET Gk_Jun_W= '" . $_POST['G_Jun_W' . $b] . "'
                              WHERE Id='$b'")


                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

       }



         $D_Gruppen = mysql_query("SELECT Gruppen
                                   FROM gruppen_zeit_$data_a_db[S_Db]
                                   ");


$zähler=0;



                       while($dataD_G = mysql_fetch_assoc($D_Gruppen))                  //Dynamisches Zählen der Heber pro Gruppe
                       {

                         $zähler=$zähler + 1;

                         $variable="g_Jun_W_" . $zähler;


                         if($finder==$dataD_G[Gruppen])
                         {

                                 $$variable = $$variable + $y;


                         }




                       }



      $gw=$dsatzW[E_W];            //Änderung



     }



}
echo "</tbody>";
echo "</table>";
?>