<?php

function zk_Gruppen($Art){

global $db, $data_a_db;

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

$UnterArt=$Art;

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

if($stammdaten['Masters']==0){

    $ArtVariable="G_" . $UnterArt . "_" . $geschlecht;
    $K_M=$UnterArt . "_" . $geschlecht;
    $UpdateGrpVariable="Gk_" . $UnterArt . "_" . $geschlecht;
}else{
    $ArtVariable="G_" . $UnterArt . "_" . $geschlecht;
    $K_M="Aktive_" . $geschlecht;
    $UpdateGrpVariable="Gk_" . $UnterArt . "_" . $geschlecht;

}


if($UnterArt=='Junioren' && $stammdaten['Masters']==0){
    $ArtVariable="G_" . $UnterArt . "_" . $geschlecht;
    $K_M="Aktive_" . $geschlecht;
    $UpdateGrpVariable="Gk_" . $UnterArt . "_" . $geschlecht;
}


$gewichtsklassen = dbBefehl("SELECT * FROM gewichtsklassen_".$data_a_db['S_Db']);

if($stammdaten['Masters']==0)
   $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']." WHERE Klasse='$Art'");
else
   $Klasse = dbBefehl("SELECT * FROM alters_klassen_masters WHERE Klasse='$Art'");


$d_Klasse = mysqli_fetch_assoc($Klasse);
$time=getdate();

$i = 0;
$g = -1;




while($dsatz = mysqli_fetch_assoc($gewichtsklassen))
{
$i = $i+1;
$finder = 1;

     $Id="Id" . $i;
     $G_K_M=$ArtVariable . $i;



echo"<tbody>";
echo"<tr align=\"center\">";

         echo"<td>";
           if($dsatz[$K_M] == "1")
              echo $geschlecht . " +" . $g;
           else
              echo $geschlecht . " -$dsatz[$K_M]";

         echo"</td>";

         echo"<td>";


         $y=0;

$Von=$time['year'] - $d_Klasse['Von'];

// if($geschlecht=='W'&& $Art=='AK5'){
//    $Bis=1900; }
// elseif($geschlecht=='W' && ($Art=='AK6'||$Art=='AK7'||$Art=='AK8'||$Art=='AK9'||$Art=='AK10'))
//    $Bis=3000;
// else

$Bis=$time['year'] - $d_Klasse['Bis'];

                 $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                    WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                    AND heber.Geschlecht= '$gesLang'
                                    AND heber.AlKl= '$Art'");





           if($dsatz[$K_M] == "1")
           {

                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {

                         if($dsatzH['Gewicht'] > $g)
                         {
                                 $y=$y+1;

                                 if(isset($_POST['speichern']))
                                 {
                                    if($dsatzH['Gruppe']!=$_POST[$G_K_M]){
                                         dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                                                         SET Gruppe= '" . $_POST[$G_K_M] . "'
                                                         WHERE IdHeber='".$dsatzH['IdHeber']."'");
                                    }
                                 }

                         }

                 }


           }else{

                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {

                         if($dsatzH['Gewicht'] <= $dsatz[$K_M] && $dsatzH['Gewicht']> $g)
                         {
                         $y=$y+1;

                                 if(isset($_POST['speichern']))
                                 {
                                    if($dsatzH['Gruppe']!=$_POST[$G_K_M]){

                                         dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                                                         SET Gruppe= '" . $_POST[$G_K_M] . "'
                                                         WHERE IdHeber='".$dsatzH['IdHeber']."'");
                                    }

                                 }
                         }
                 }
            }

                 echo "$y";

         echo"</td>";


     echo "<td>";
//echo $UpdateGrpVariable;
          echo "<select name=\"$G_K_M\" size=\"1\" class=\"Auswahl\">";

            $Gruppen = dbBefehl("SELECT Gruppen
                                 FROM gruppen_zeit_".$data_a_db['S_Db']."
                                 ");

            $Auswahl = dbBefehl("SELECT $UpdateGrpVariable
                                 FROM gruppen_".$data_a_db['S_Db']."
                                 WHERE Id='$i'
                                 ");

            $dataAuswahl = mysqli_fetch_assoc($Auswahl);

                       while($dataGruppen = mysqli_fetch_assoc($Gruppen))
                       {

                                 if($dataGruppen['Gruppen']==$dataAuswahl[$UpdateGrpVariable])
                                 {

                                         echo "<option value=".$dataGruppen['Gruppen']." selected>".$dataGruppen['Gruppen']."</option>";

                                         $finder=$dataGruppen['Gruppen'];

                                 }
                                 else
                                    echo "<option value=".$dataGruppen['Gruppen'].">".$dataGruppen['Gruppen']."</option>";

                        }

          echo "</select>";

     echo "</td>";

  echo"</tr>";
echo"</tbody>";


      if(isset($_POST['speichern']))                                                       //Pr�fen wegen Speichern als Funktion
      {
           $x=1;

            $AuswahlCheck = dbBefehl("SELECT $UpdateGrpVariable
                                         FROM gruppen_".$data_a_db['S_Db']."
                                         WHERE Id='$i'
                                         ");

            $dataAuswahlCheck = mysqli_fetch_assoc($AuswahlCheck);

            if($dataAuswahlCheck[$UpdateGrpVariable]!=$_POST[$G_K_M]){

                 dbBefehl("UPDATE gruppen_".$data_a_db['S_Db']."
                              SET $UpdateGrpVariable= '" . $_POST[$G_K_M] . "'
                              WHERE Id='$i'");
            }


       }

         $D_Gruppen = dbBefehl("SELECT Gruppen
                                   FROM gruppen_zeit_".$data_a_db['S_Db']);


$z�hler=0;


                       while($dataD_G = mysqli_fetch_assoc($D_Gruppen))                  //Dynamisches Z�hlen der Heber pro Gruppe
                       {

                         $z�hler++;

                         $variable="g_" . $UnterArt . "_" . $geschlecht . "_" . $z�hler;



                         if($finder==$dataD_G['Gruppen'])
                         {
                                 global $$variable;
                                 $$variable = $$variable + $y;


                         }

                       }



      $g=$dsatz[$K_M];




}       //Ende while schleife

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



echo "</table>";

}



?>
