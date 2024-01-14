

<?php


$k_w = dbBefehl("SELECT * FROM gewichtsklassen, gruppen_".$data_a_db['S_Db']."
                    WHERE gruppen_".$data_a_db['S_Db'].".Id = gewichtsklassen.Id
                    AND gruppen_".$data_a_db['S_Db'].".Gk_K_W = '".$dsatz['Gruppen']."'
                    ");

$Klasse = dbBefehl("SELECT * FROM alters_klassen
                       WHERE Klasse='Kinder'");

$d_Klasse = mysqli_fetch_assoc($Klasse);

$time=getdate();





$g = 0;




while($d_w = mysqli_fetch_assoc($k_w))
{


$y=0;


$newId = $d_w['Id'] - 1;



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
                                         AND heber.Geschlecht= 'Weiblich'
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis");



           if($d_w['K_W'] == "1")
           {


                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {

                         if($dsatzH['Gewicht'] >= $v_g['K_W'])
                         {
                                 $y=$y+1;


                         }

                 }


           }else{


             if($d_w['K_W'] != "0")
             {

                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {


                         if($dsatzH['Gewicht'] < $d_w['K_W'] && $dsatzH['Gewicht']>= $v_g['K_W'])
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

                 if($d_w['K_W'] == "1")
                 {

                         echo"Kinder(W) +".$v_g['K_W'];


                 }else{

                         echo"Kinder(W) -".$d_w['K_W'];


                 }



        echo "</td>";



echo "</tr>";






}    //if clouse Ende




}    //While1 Ende






$k_m = dbBefehl("SELECT * FROM gewichtsklassen, gruppen_".$data_a_db['S_Db']."
                    WHERE gruppen_".$data_a_db['S_Db'].".Id = gewichtsklassen.Id
                    AND gruppen_".$data_a_db['S_Db'].".Gk_K_M = '".$dsatz['Gruppen']."'
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
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis");



           if($d_m['K_M'] == "1")
           {


                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {

                         if($dsatzH['Gewicht'] >= $v_g['K_M'])
                         {
                                 $y=$y+1;


                         }

                 }


           }else{




                 while($dsatzH = mysqli_fetch_assoc($heber))
                 {


                         if($dsatzH['Gewicht'] < $d_m['K_M'] && $dsatzH['Gewicht']>= $v_g['K_M'])
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

                 if($d_m['K_M'] == "1")
                 {

                         echo"Kinder(M) +".$v_g['K_M'];


                 }else{

                         echo"Kinder(M) -".$d_m['K_M'];


                 }



        echo "</td>";



echo "</tr>";






}    //if clouse Ende




}    //While2 Ende








?>
