<?php

function ZeitEinteilung($Art,$Grp){

global $db, $data_a_db, $dsatz;

$UnterArt=$Art;

$Gk_Variable='Gk_' . $UnterArt . '_W';


$k_w = dbBefehl("SELECT * FROM gewichtsklassen, gruppen_".$data_a_db['S_Db']."
                    WHERE gruppen_".$data_a_db['S_Db'].".Id = gewichtsklassen.Id
                    AND gruppen_".$data_a_db['S_Db'].".$Gk_Variable = '".$dsatz['Gruppen']."'
                    ");

$Klasse = dbBefehl("SELECT * FROM alters_klassen_zk
                       WHERE Klasse='$Art'");

$d_Klasse = mysqli_fetch_assoc($Klasse);

$time=getdate();

$g = 0;



while($d_w = mysqli_fetch_assoc($k_w))
{



$y=0;

$newId = $d_w['Id'] - 1;

         $new = dbBefehl("SELECT * FROM gewichtsklassen
                             WHERE Id = '$newId'");

         $v_gewicht = mysqli_fetch_assoc($new);


$v_g = $v_gewicht;

if($newId == 0)
{
$v_g = 1;

}

$Von=$time['year'] - $d_Klasse['Von'];
$Bis=$time['year'] - $d_Klasse['Bis'];

                 $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                         WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                         AND heber.Geschlecht= 'Weiblich'
                                         AND heber.AlKl = '$Art'
                                         AND heber_".$data_a_db['S_Db'].".Gruppe = '".$dsatz['Gruppen']."'");


if($Art!='Junioren')     $Art_W=$UnterArt . '_W';
else                     $Art_W='Aktive_W';

           if($d_w[$Art_W] == "1")
           {
                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {
                         if($dsatzH['Gewicht'] > $v_g[$Art_W])
                         {
                                 $y=$y+1;
                         }

                 }


           }else{


             if($d_w[$Art_W] != "0")
             {
                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {
                         if($dsatzH['Gewicht'] <= $d_w[$Art_W] && $dsatzH['Gewicht'] > $v_g[$Art_W])
                         {
                                 $y=$y+1;
                         }


                 }
             }
            }


if($y != "0")
{

echo "<tr>";



        echo "<td>";
        echo "</td>";


        echo "<td>";
        echo "</td>";


        echo "<td>";
        echo "</td>";


        echo "<td>";
        echo "</td>";

        echo "<td>";
        echo "</td>";

        echo "<td>";
        echo "</td>";

        echo "<td>";
        echo "</td>";


        echo "<td>";


                 if($d_w[$Art_W] == "1")
                 {
                         echo $Art . "(W) +" . $v_g[$Art_W];
                 }else{
                         echo $Art . "(W) -" . $d_w[$Art_W];
                 }



        echo "</td>";



echo "</tr>";






}    //if clouse Ende




}    //While1 Ende

$Gk_Variable='Gk_' . $UnterArt . '_M';

if($Art!='Junioren')     $Art_M=$UnterArt . '_M';
else                     $Art_M='Aktive_M';

$k_m = dbBefehl("SELECT * FROM gewichtsklassen, gruppen_".$data_a_db['S_Db']."
                    WHERE gruppen_".$data_a_db['S_Db'].".Id = gewichtsklassen.Id
                    AND gruppen_".$data_a_db['S_Db'].".$Gk_Variable = '".$dsatz['Gruppen']."'
                    ");

$g = 0;


while($d_m = mysqli_fetch_assoc($k_m))
{

$y=0;

$newId = $d_m['Id'] - 1;



         $new = dbBefehl("SELECT * FROM gewichtsklassen
                                   WHERE Id = '$newId'
                                   ");


         $v_gewicht = mysqli_fetch_assoc($new);




$v_g = $v_gewicht;



if($newId == 0)
{

$v_g = 1;


}


$Von=$time['year'] - $d_Klasse['Von'];
$Bis=$time['year'] - $d_Klasse['Bis'];



                 $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                         WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                         AND heber.Geschlecht= 'Männlich'
                                         AND heber.AlKl = '$Art'
                                         AND heber_".$data_a_db['S_Db'].".Gruppe = '".$dsatz['Gruppen']."'");



           if($d_m[$Art_M] == "1")
           {



                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {

                         if($dsatzH['Gewicht'] > $v_g[$Art_M])
                         {
                                 $y=$y+1;


                         }

                 }


           }else{




                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {


                         if($dsatzH['Gewicht'] <= $d_m[$Art_M] && $dsatzH['Gewicht'] > $v_g[$Art_M])
                         {
                                 $y=$y+1;

                         }


                 }
            }


if($y != "0")
{

echo "<tr>";



        echo "<td>";
        echo "</td>";


        echo "<td>";
        echo "</td>";


        echo "<td>";
        echo "</td>";


        echo "<td>";
        echo "</td>";

        echo "<td>";
        echo "</td>";

        echo "<td>";
        echo "</td>";

        echo "<td>";
        echo "</td>";


        echo "<td>";

                 if($d_m[$Art_M] == "1")
                 {

                         echo $Art . "(M) +$v_g[$Art_M]";


                 }else{

                         echo $Art . "(M) -$d_m[$Art_M]";


                 }



        echo "</td>";



echo "</tr>";






}    //if clouse Ende




}    //While2 Ende



}        //funktion Ende




?>
