<?php

function zk_Gruppen($Art){

global $db, $data_a_db;

/*

switch ($Art) {
    case 'Kinder':
        $UnterArt='K';
        break;
    case 'Schüler':
        $UnterArt='S';
        break;
    case 'Junioren':
        $UnterArt='J';
        break;
    case 'Senioren':
        $UnterArt='E';
        break;

}

*/               $UnterArt=$Art;

echo "
<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"125\">
    <col width=\"60\">
    <col width=\"70\">

  </colgroup>


<thead>
 <tr>";
   echo "<th colspan=\"3\" >$Art</th>";                                        //Kinder
echo "</tr>

 <tr>
  <th>Gewichtsklassen</th>
  <th>Anzahl</th>
  <th>Gruppe</th>

 </tr>
</thead>
";






for($ges=0;$ges<2;$ges++){

switch ($ges) {
    case 0:
          $geschlecht='M';
          $gesLang='Männlich';
        break;
    case 1:
          $geschlecht='W';
          $gesLang='Weiblich';
        break;
}

$ArtVariable="G_" . $UnterArt . "_" . $geschlecht;
$K_M=$UnterArt . "_" . $geschlecht;
$UpdateGrpVariable="Gk_" . $UnterArt . "_" . $geschlecht;


$gewichtsklassen = dbBefehl("SELECT * FROM gewichtsklassen");
$Klasse = dbBefehl("SELECT * FROM alters_klassen
                       WHERE Klasse='$Art'");
                                                                                 //Kinder
$d_Klasse = mysqli_fetch_assoc($Klasse);
$time=getdate();

$i = 0;
$g = 0;

while($dsatz = mysqli_fetch_assoc($gewichtsklassen))
{

$i = $i+1;
$finder = 1;

     $Id="Id" . $i;
     $G_K_M=$ArtVariable . $i;                                        // "G_K_M"   "K"

echo"<tbody>";
echo"<tr align=\"center\">";

         echo"<td>";
           if($dsatz[$K_M] == "1")                                //K_M  Switch vlt.
           {
                 echo $geschlecht . " +" . $g;


           }else{
                 echo $geschlecht . " -$dsatz[$K_M]";
           }


         echo"</td>";

         echo"<td>";

         $y=0;

$Von=$time[year] - $d_Klasse[Von];
$Bis=$time[year] - $d_Klasse[Bis];

                 $heber = dbBefehl("SELECT * FROM heber_$data_a_db[S_Db], heber
                                         WHERE heber_$data_a_db[S_Db].IdHeber = heber.IdHeber
                                         AND heber.Geschlecht= '$gesLang'
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis");





           if($dsatz[$K_M] == "1")
           {

                 while($dsatzH = mysqli_fetch_assoc($heber))        //Update funktion einbauen die heber_test mit grp versieht
                 {


                         if($dsatzH[Gewicht] >= $g)
                         {
                                 $y=$y+1;

                                 if(isset($_POST['speichern']))
                                 {

                                 dbBefehl("UPDATE heber_$data_a_db[S_Db]
                                              SET Gruppe= '" . $_POST['$ArtVariable' . $i] . "'
                                              WHERE IdHeber='$dsatzH[IdHeber]'");

                                 }

                         }

                 }


           }else{




                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {
                         if($dsatzH[Gewicht] <= $dsatz[$K_M] && $dsatzH[Gewicht]> $g)
                         {
                         $y=$y+1;


                                 if(isset($_POST['speichern']))
                                 {

                                 dbBefehl("UPDATE heber_$data_a_db[S_Db]
                                              SET Gruppe= '" . $_POST['$ArtVariable' . $i] . "'
                                              WHERE IdHeber='$dsatzH[IdHeber]'");

                                 }
                         }
                 }
            }

                 echo "$y";

         echo"</td>";


     echo "<td>";



          echo "<select name=\"$G_K_M\" size=\"1\" class=\"Auswahl\">";

         $Gruppen = dbBefehl("SELECT Gruppen
                                 FROM gruppen_zeit_$data_a_db[S_Db]
                                 ");

         $Auswahl = dbBefehl("SELECT Gk_K_M
                                 FROM gruppen_$data_a_db[S_Db]
                                 WHERE Id='$i'
                                 ");

         $dataAuswahl = mysqli_fetch_assoc($Auswahl);

                       while($dataGruppen = mysqli_fetch_assoc($Gruppen))
                       {

                                 if($dataGruppen[Gruppen]==$dataAuswahl[$UpdateGrpVariable])
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

      if(isset($_POST['speichern']))                                                       //Prüfen wegen Speichern als Funktion
      {
             $x=1;

                 dbBefehl("UPDATE gruppen_$data_a_db[S_Db]
                              SET $UpdateGrpVariable= '" . $_POST['G_K_M' . $i] . "'
                              WHERE Id='$i'");

       }





         $D_Gruppen = dbBefehl("SELECT Gruppen
                                   FROM gruppen_zeit_$data_a_db[S_Db]");


$zähler=0;



                       while($dataD_G = mysqli_fetch_assoc($D_Gruppen))                  //Dynamisches Zählen der Heber pro Gruppe
                       {

                         $zähler=$zähler + 1;

                         $variable="g_" . $UnterArt . "_" . $geschlecht . "_" . $zähler;


                         if($finder==$dataD_G[Gruppen])
                         {

                                 $$variable = $$variable + $y;


                         }




                       }



      $g=$dsatz[$K_M];




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


}                 //Ende for geschlecht


while($dsatzW = mysqli_fetch_assoc($gewichtsklassenW))
{

$b = $b+1;
$finder=1;

     $Id="Id" . $b;
     $G_K_W="G_K_W" . $b;            //Änderung

echo"<tbody>";
echo"<tr align=\"center\">";




     if($dsatzW[K_W] != "")              //Änderung
     {



         echo"<td>";

           if($dsatzW[K_W] == "1")           //Änderung
           {
                 echo "W +53";

           }else{
                 echo "W -$dsatzW[K_W]";      //Änderung
           }

         echo"</td>";


         echo"<td>";

         $y=0;


                 $heber = dbBefehl("SELECT * FROM heber_$data_a_db[S_Db], heber
                                         WHERE heber_$data_a_db[S_Db].IdHeber = heber.IdHeber
                                         AND heber.Geschlecht= 'Weiblich'
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis");




           if($dsatzW[K_W] == "1")
           {



                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {
                         if($dsatzH[Gewicht] > $gw)
                         {
                         $y=$y+1;

                                 if(isset($_POST['speichern']))
                                 {

                                 dbBefehl("UPDATE heber_$data_a_db[S_Db]
                                              SET Gruppe= '" . $_POST['G_K_W' . $b] . "'
                                              WHERE IdHeber='$dsatzH[IdHeber]'");

                                 }

                         }

                 }


           }else{

                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {
                         if($dsatzH[Gewicht] <= $dsatzW[K_W] && $dsatzH[Gewicht]> $gw)
                         {
                         $y=$y+1;


                                 if(isset($_POST['speichern']))
                                 {

                                 dbBefehl("UPDATE heber_$data_a_db[S_Db]
                                              SET Gruppe= '" . $_POST['G_K_W' . $b] . "'
                                              WHERE IdHeber='$dsatzH[IdHeber]'");

                                 }

                         }



                 }
            }





                 echo "$y";

         echo"</td>";


     echo "<td>";

          echo "<select name=\"$G_K_W\" size=\"1\" class=\"Auswahl\">";




         $Gruppen = dbBefehl("SELECT Gruppen
                                 FROM gruppen_zeit_$data_a_db[S_Db]
                                 ");

         $Auswahl = dbBefehl("SELECT Gk_K_W
                                 FROM gruppen_$data_a_db[S_Db]
                                 WHERE Id='$b'
                                 ");


         $dataAuswahl = mysqli_fetch_assoc($Auswahl);




                       while($dataGruppen = mysqli_fetch_assoc($Gruppen))
                       {

                                 if($dataGruppen[Gruppen]==$dataAuswahl[Gk_K_W])
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


                 dbBefehl("UPDATE gruppen_$data_a_db[S_Db]
                              SET Gk_K_W= '" . $_POST['G_K_W' . $b] . "'
                              WHERE Id='$b'");

       }


         $D_Gruppen = dbBefehl("SELECT Gruppen
                                   FROM gruppen_zeit_$data_a_db[S_Db]
                                   ");


$zähler=0;



                       while($dataD_G = mysqli_fetch_assoc($D_Gruppen))                  //Dynamisches Zählen der Heber pro Gruppe
                       {

                         $zähler=$zähler + 1;

                         $variable="g_K_W_" . $zähler;


                         if($finder==$dataD_G[Gruppen])
                         {

                                 $$variable = $$variable + $y;


                         }




                       }



      $gw=$dsatzW[K_W];            //Änderung



     }



}
echo "</table>";

}
?>