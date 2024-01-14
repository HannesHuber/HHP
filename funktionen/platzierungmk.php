<?php

// wird benoetigt: include 'funktionen/db_verbindung.php';
//                include 'funktionen/nuetzliches.php';


$Verein = dbBefehl("SELECT * FROM verein");

$A_Kl = dbBefehl("SELECT * FROM alters_klassen");

$time=getdate();


if($stammdaten['Grp_Einteilung'] == 1){
    $dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);
    $An_G=mysqli_num_rows($dbGruppen);
}else{

    $dbGruppen = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']);
    $An_G=mysqli_num_rows($dbGruppen);
}

  for ($start=1;$start<=$An_G;$start++)
    $arrayWkGrp[]=$start;


    foreach ($arrayWkGrp as &$Grp) {

    if($stammdaten['Grp_Einteilung'] == 1){


        $heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db']."
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                                   ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".M_K_G DESC
                                   ");
    }else{
        $heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db']."
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
                                   ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".M_K_G DESC
                                   ");
    }


$x=0;
$i = 0;

while($dsatz = mysqli_fetch_assoc($heber_aus))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

if($dsatz['Ausserkonkurrenz']!='Ausserkonkurrenz'){
         if($dsatz['M_K_G'] == 0)       $Platz=0;
         else{                          $i++;  $Platz=$i;}
}else $Platz='AK';

   if($dsatz['Platz_MK'] != $Platz){
     dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                  SET Platz_MK= '$Platz'
                  WHERE IdHeber ='$dsatz[IdHeber]'
                  ");
   }
}




//Platzierung Reissen anfang
unset($dsatz);
$heber_aus_Reissen = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db']."
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
                                   ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".R_B DESC
                                   ");
$x=0;
$i = 0;

while($dsatz = mysqli_fetch_assoc($heber_aus_Reissen))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

if($dsatz['Ausserkonkurrenz']!='Ausserkonkurrenz'){
         if($dsatz['R_B'] == 0)         $Platz=0;
         else{                          $i++;  $Platz=$i;}
}else $Platz='AK';

   if($dsatz['Platz_R'] != $Platz){
     dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                  SET Platz_R= '$Platz'
                  WHERE IdHeber ='".$dsatz['IdHeber']."'
                  ");
   }
}



//Platzierung Stossen anfang
unset($dsatz);
$heber_aus_Stossen = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db']."
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
                                   ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".S_B DESC
                                   ");
$x=0;
$i = 0;

while($dsatz = mysqli_fetch_assoc($heber_aus_Stossen))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

if($dsatz['Ausserkonkurrenz']!='Ausserkonkurrenz'){
         if($dsatz['S_B'] == 0)         $Platz=0;
         else{                          $i++;  $Platz=$i;}
}else $Platz='AK';

   if($dsatz['Platz_S'] != $Platz){
     dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                  SET Platz_S= '$Platz'
                  WHERE IdHeber ='".$dsatz['IdHeber']."'
                  ");
   }
}



//Platzierung Zweikampf anfang
unset($dsatz);
$heber_aus_ZK = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db']."
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
                                   ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".Z_K DESC
                                   ");
$x=0;
$i = 0;

while($dsatz = mysqli_fetch_assoc($heber_aus_ZK))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

if($dsatz['Ausserkonkurrenz']!='Ausserkonkurrenz'){
         if($dsatz['Z_K'] == 0)         $Platz=0;
         else{                          $i++;  $Platz=$i;}
}else $Platz='AK';

   if($dsatz['Platz_ZK'] != $Platz){
     dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                  SET Platz_ZK= '$Platz'
                  WHERE IdHeber ='".$dsatz['IdHeber']."'
                  ");
   }
}







//Platzierung Zweikampf nur Kg anfang
//Wird nur f�r Mk_m_T benoetigt da sonst der ZK schon nur Kg ist
unset($dsatz);

if($stammdaten['Wk_Art'] == "M_m_T"){


$heber_aus_ZK_Kg = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db']."
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
                                   ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".ZK_Kg DESC
                                   ");
$x=0;
$i = 0;

while($dsatz = mysqli_fetch_assoc($heber_aus_ZK_Kg))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

    if($dsatz['Ausserkonkurrenz']!='Ausserkonkurrenz'){
        if($dsatz['ZK_Kg'] == 0)       $Platz=0;
        else{                          $i++;  $Platz=$i;}
    }else $Platz='AK';

    if($dsatz['Platz_ZK_Kg'] != $Platz){
        dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                  SET Platz_ZK_Kg= '$Platz'
                  WHERE IdHeber ='".$dsatz['IdHeber']."'
                  ");
    }
}


}

}  //for ENDE f�r Alle Grp drucken
unset($arrayWkGrp);
?>





</body>
</html>
