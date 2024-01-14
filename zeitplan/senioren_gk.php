

<?php


$e_w = mysql_query("SELECT * FROM gewichtsklassen, gruppen_".$data_a_db['S_Db']."
                    WHERE gruppen_".$data_a_db['S_Db'].".Id = gewichtsklassen.Id
                    AND gruppen_".$data_a_db['S_Db'].".Gk_E_W = '".$dsatz['Gruppen']."'
                    ")

OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



$Klasse = mysql_query("SELECT * FROM alters_klassen
                       WHERE Klasse='Senioren'")

OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

$d_Klasse = mysql_fetch_assoc($Klasse);

$time=getdate();





$g = 0;




while($d_w = mysql_fetch_assoc($e_w))
{


$y=0;


$newId = $d_w[Id] - 1;



         $new = mysql_query("SELECT * FROM gewichtsklassen
                             WHERE Id = '$newId'
                            ")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $v_gewicht = mysql_fetch_assoc($new);




$v_g = $v_gewicht;



if($newId == 0)
{

$v_g = 1;


}




$Von=$time[year] - $d_Klasse[Von];
$Bis=$time[year] - $d_Klasse[Bis];



                 $heber = mysql_query("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                         WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                         AND heber.Geschlecht= 'Weiblich'
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis")
                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



           if($d_w[E_W] == "1")
           {


                 while($dsatzH = mysql_fetch_assoc($heber))
                 {

                         if($dsatzH[Gewicht] >= $v_g[E_W])
                         {
                                 $y=$y+1;


                         }

                 }


           }else{


             if($d_w[E_W] != "0")
             {

                 while($dsatzH = mysql_fetch_assoc($heber))
                 {


                         if($dsatzH[Gewicht] < $d_w[E_W] && $dsatzH[Gewicht]>= $v_g[E_W])
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

                 if($d_w[E_W] == "1")
                 {

                         echo"Senioren(W) +$v_g[E_W]";


                 }else{

                         echo"Senioren(W) -$d_w[E_W]";


                 }



        echo "</td>";



echo "</tr>";






}    //if clouse Ende




}    //While1 Ende






$e_m = mysql_query("SELECT * FROM gewichtsklassen, gruppen_".$data_a_db['S_Db']."
                    WHERE gruppen_".$data_a_db['S_Db'].".Id = gewichtsklassen.Id
                    AND gruppen_".$data_a_db['S_Db'].".Gk_E_M = '$dsatz[Gruppen]'
                    ")

OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

$g = 0;




while($d_m = mysql_fetch_assoc($e_m))
{


$y=0;


$newId = $d_m[Id] - 1;



         $new = mysql_query("SELECT * FROM gewichtsklassen
                             WHERE Id = '$newId'
                            ")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $v_gewicht = mysql_fetch_assoc($new);




$v_g = $v_gewicht;



if($newId == 0)
{

$v_g = 1;


}




$Von=$time[year] - $d_Klasse[Von];
$Bis=$time[year] - $d_Klasse[Bis];



                 $heber = mysql_query("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                         WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                         AND heber.Geschlecht= 'M�nnlich'
                                         AND heber.Jahrgang <= $Von
                                         AND heber.Jahrgang >= $Bis")
                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



           if($d_m[E_M] == "1")
           {


                 while($dsatzH = mysql_fetch_assoc($heber))
                 {

                         if($dsatzH[Gewicht] >= $v_g[E_M])
                         {
                                 $y=$y+1;


                         }

                 }


           }else{




                 while($dsatzH = mysql_fetch_assoc($heber))
                 {


                         if($dsatzH[Gewicht] < $d_m[E_M] && $dsatzH[Gewicht]>= $v_g[E_M])
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

                 if($d_m[E_M] == "1")
                 {

                         echo"Senioren(M) +$v_g[E_M]";


                 }else{

                         echo"Senioren(M) -$d_m[E_M]";


                 }



        echo "</td>";



echo "</tr>";






}    //if clouse Ende




}    //While2 Ende








?>
