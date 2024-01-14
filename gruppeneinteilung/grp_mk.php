<?php

session_start();
ob_start ();
error_reporting(1);


include 'funktionen/mk_gruppen_einteilung.php';


Fueller_von_gruppen_mk_zaehler();	//in funktionen/mk_gruppen_einteilung


$dstamm = $dsatz;


         $heber = dbBefehl("SELECT * FROM heber, heber_".$data_a_db['S_Db']."
                               WHERE heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               ORDER BY heber.Jahrgang ASC,
                               heber.Gewicht ASC
                               ");

         $gruppenteiler=$dstamm['Gruppenteiler'];

$array=array();
                                            //Erfassung aller Jahrg�nge
while($d = mysqli_fetch_assoc($heber))
{

  if(in_array($d['Jahrgang'],$array)) {

  }else{
         $array[]= $d['Jahrgang'];
  }

}


echo'
<table width="100%" border="0" cellpadding="0" cellspacing="2">
  <col width="700">
  <col>
 <tr>
  <td>
';


echo "
<table  class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"120\">
    <col>
    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">

  </colgroup>


<thead>

 <tr>
  <th>Jahrgang</th>
  <th>M/W</th>
  <th>UnterGrp</th>
  <th>Gruppe</th>
  <th>Anzahl</th>

 </tr>
</thead>
";
echo'<tbody>';

$i=0;
$Grp=0;                                //for schleife �ber alle Jahrg�nge



foreach($array AS $ar){



  for($aussen=0;$aussen<2;$aussen++){

  if($aussen==0)
    $Ges='Männlich';
  else
    $Ges='Weiblich';

         $heber2 = dbBefehl("SELECT * FROM heber, heber_".$data_a_db['S_Db']."
                               WHERE heber.Jahrgang = '$ar'
                               AND heber.Geschlecht = '$Ges'
                               AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               ORDER BY heber.Gewicht ASC
                               ");

         $numb=mysqli_num_rows($heber2);


if($numb!=0){                       //Falls Jahrgang keinen Heber hat ENDE ~Zeile300

		 $anzahl=return_Anzahl($ar, $Ges);			   //$ar = Jahrgang, $Ges= Geschlecht function in funktionen/mk_gruppen_einteilung.php
         //$anzahl=ceil($numb/$gruppenteiler);           //ceil() ist aufrunden
         $anzahl_heber=floor($numb/$anzahl);           //floor() is abrunden   ist die Grundanzahl der Heber pro Gruppe
         $rest=($numb%$anzahl);
         $i++;
                                           //Speicherung der Gruppe_Aus in heber_wkname
$GA1=$anzahl_heber;
if($rest>=1)$GA1++;
$GA2=$GA1+$anzahl_heber;
if($rest>=2)$GA2++;
$GA3=$GA2+$anzahl_heber;
if($rest>=3)$GA3++;
$GA4=$GA3+$anzahl_heber;
if($rest>=4)$GA4++;

$zaehler=0;
$Grp++;



while($dsatz = mysqli_fetch_assoc($heber2))
{
  $zaehler++;




  if($dsatz['Gruppe_Aus']!= $Grp){
                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Gruppe_Aus= '$Grp'
                              WHERE IdHeber ='".$dsatz['IdHeber']."'");
  }



  if(($zaehler==$GA1)&&($anzahl>1))$Grp++;
  if(($zaehler==$GA2)&&($anzahl>2))$Grp++;
  if(($zaehler==$GA3)&&($anzahl>3))$Grp++;
  if(($zaehler==$GA4)&&($anzahl>4))$Grp++;

}                                                 //ENDE   Speicherung der Gruppe_Aus in heber_wkname


         $eins='Federleicht';
         $zwei='Leicht';
         $drei='Mittel';
         $vier='Halbschwer';
         $fuenf='Schwer';

         $plus_grp='plus_grp' . $i;
         $minus_grp='minus_grp' . $i;

         if(isset($_POST['plus_grp' . $i])){
         	$x=1;
         	Anzahl_plus_minus($ar, $Ges,'1');
         }

         if(isset($_POST['minus_grp' . $i])){
         	$x=1;
         	Anzahl_plus_minus($ar, $Ges,'0');
         }


     echo '<tr>';
         echo '<td>';
                 echo $ar;
         echo '</td>';

         echo '<td>';
         		 echo '<span style="width:80px;display:block;float:left;">';		//Art Tabulator
         		 	echo $Ges;
         		 echo '</span>';

                 echo"<input type=\"submit\" style=\"float:left\" name=\"$plus_grp\" value=\"+\">";

                 if($anzahl >= 2)
                 	echo"<input type=\"submit\" style=\"float:left\" name=\"$minus_grp\" value=\"-\">";

         echo '</td>';

         echo '<td>';
                 if($anzahl=='1'){}
                 elseif(($anzahl=='2')||($anzahl=='3')){echo $zwei;}
                 else{echo $eins;}
         echo '</td>';

         echo '<td>';
                 echo $i;
         echo '</td>';

         echo '<td>';
                 if($rest>=1){
                         echo $anzahl_heber+$rest;
                         $for_speichern=$anzahl_heber+$rest;
                 }
                 else{
                         echo $anzahl_heber;
                         $for_speichern=$anzahl_heber;
                 }
         echo '</td>';
     echo '</tr>';


     if($anzahl>1){

         $i++;

         echo '<tr>';
                 echo '<td>';
                 echo '</td>';

                 echo '<td>';
                 echo '</td>';

                 echo '<td>';
                         if($anzahl=='2'){echo $fuenf;}
                         elseif($anzahl=='3'){echo $drei;}
                         else{echo $zwei;}
                 echo '</td>';

                 echo '<td>';
                         echo $i;
                 echo '</td>';

                 echo '<td>';
                 if($rest>=2){
                         echo $anzahl_heber+$rest;
                         $for_speichern=$anzahl_heber+$rest;
                 }
                 else{
                         echo $anzahl_heber;
                         $for_speichern=$anzahl_heber;
                 }
                 echo '</td>';
         echo '</tr>';

     }

     if($anzahl>2){

         $i++;

         echo '<tr>';
                 echo '<td>';
                 echo '</td>';

                 echo '<td>';
                 echo '</td>';

                 echo '<td>';
                         if($anzahl=='3'){echo $fuenf;}
                         else{echo $drei;}
                 echo '</td>';

                 echo '<td>';
                         echo $i;
                 echo '</td>';

                 echo '<td>';
                 if($rest>=3){
                         echo $anzahl_heber+$rest;
                         $for_speichern=$anzahl_heber+$rest;
                 }
                 else{
                         echo $anzahl_heber;
                         $for_speichern=$anzahl_heber;
                 }
                 echo '</td>';
         echo '</tr>';

     }

     if($anzahl>3){

         $i++;

         echo '<tr>';
                 echo '<td>';
                 echo '</td>';

                 echo '<td>';
                 echo '</td>';

                 echo '<td>';
                         if($anzahl=='4'){echo $fuenf;}
                         else{echo $vier;}
                 echo '</td>';

                 echo '<td>';
                         echo $i;
                 echo '</td>';

                 echo '<td>';
                 if($rest>=4){
                         echo $anzahl_heber+$rest;
                         $for_speichern=$anzahl_heber+$rest;
                 }
                 else{
                         echo $anzahl_heber;
                         $for_speichern=$anzahl_heber;
                 }
                 echo '</td>';
         echo '</tr>';

     }

     if($anzahl==5){

         $i++;

         echo '<tr>';
                 echo '<td>';
                 echo '</td>';

                 echo '<td>';
                 echo '</td>';

                 echo '<td>';
                         echo $fuenf;
                 echo '</td>';

                 echo '<td>';
                         echo $i;
                 echo '</td>';

                 echo '<td>';
                         echo $anzahl_heber;
                 echo '</td>';
         echo '</tr>';

     }



}    //schliesst if(numb!=0)

}   //erste For-S.             Geschlecht

}    //zweite For-S.      array

echo'</tboddy></table>';       //beendet "linke" Tabelle


echo '</td>';                   //beendet "linke-seite" der �bertabelle



  $_SESSION['Refresch'] = 0;

  $pruefe = dbBefehl("SELECT Gruppe_Aus FROM grp_".$data_a_db['S_Db']);

  $rows_grp=mysqli_num_rows($pruefe);

  if($rows_grp<$Grp){
         for($c=$rows_grp+1;$c<=$Grp;$c++){
                 dbBefehl("INSERT INTO grp_".$data_a_db['S_Db']." (Gruppe_Aus, Gruppe)
                 Values ('$c', '1')");
         }
  }

  if($rows_grp>$Grp){
         for($c=$rows_grp;$c>$Grp;$c--){
                 dbBefehl("DELETE FROM grp_".$data_a_db['S_Db']."
                              WHERE Gruppe_Aus ='$c'");
         }
  }


                                                   //ENDE Pr�fen & Anpassen der gruppen_zeit_".$data_a_db['S_Db']." Tabelle

$_SESSION['Grp'] = $Grp;                           //Da Pr�fen & Anpassen aufgerufen werden muss nachdem der Code neu geldaen wurde

echo '<td VALIGN="TOP">';                    //oeffnet "rechte Seite" der �bertabelle Ausrichtung TOP


echo "
<table  class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>
    <col width=\"150\">
    <col width=\"150\">
  </colgroup>


<thead>

 <tr>
  <th>Gruppe</th>
  <th>Wk-Gruppe</th>
 </tr>
</thead>
";
echo'<tbody>';

$g = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

$anzahl_grp_aus=mysqli_num_rows($g);

for($i=1;$i<=$Grp;$i++){
  echo '
   <tr>
    <td>' . $i . '</td>';


    echo '<td>';
      echo "<select name=\"$i\" size=\"1\" class=\"Auswahl\">";


         $Grp_Wk = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']." WHERE Gruppe_Aus='$i'");
         $daGrpWk = mysqli_fetch_assoc($Grp_Wk);

                       for($k=1;$k<=$anzahl_grp_aus;$k++){

                                 if($daGrpWk['Gruppe']==$k)
                                 {
                                         echo "<option value=$k selected>$k</option>";

                                         $finder=$k;
                                 }
                                 else{
                                         echo "<option value=$k>$k</option>";
                                 }


                        }

      echo'</select>';

    echo'
    </td>
   </tr>';

  if(isset($_POST['speichern']))
  {
         $x=1;

         dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                      SET Gruppe= '" . $_POST[$i] . "'
                      WHERE Gruppe_Aus='$i'");

         dbBefehl("UPDATE grp_".$data_a_db['S_Db']."
                      SET Gruppe= '" . $_POST[$i] . "'
                      WHERE Gruppe_Aus='$i'");
  }


}       //schliest FOR schleife


echo '</td>';                   //schliesst "rechte Seite" der �bertabelle
echo'
 </tr>
 </tbody>
</table>';

echo '</table>';                //schliesst �bertabelle

?>
