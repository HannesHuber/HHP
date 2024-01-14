<?php

// wird benoetigt: include 'funktionen/db_verbindung.php';
//                include 'funktionen/nuetzliches.php';
// Session: $_SESSION['GesGrp']  spielt rolle!

$Verein = dbBefehl("SELECT * FROM verein");

$time=getdate();

$GesGrp=$_SESSION['GesGrp'];

$Grp=0;


//F�r ZK!---------------------------------------------------------------------------------------------

if($GesGrp==0){          //Extra Auswertung

 if($stammdaten['EineKlasse']==0){       //EineKlasse legt fest ob egal ob Junior oder Aktive alle zusammen in eine Grp. Kommen

     if($stammdaten['Masters']==1){
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         Z_K DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";

     }else{

       $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']." ORDER BY Von ASC");

       while($dataKlassen = mysqli_fetch_assoc($Klasse))
       {
                 if($query_Klassen == '') $query_Klassen="'" . $dataKlassen['Klasse'] . "'";
                 else $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassen['Klasse'] . "'";
       }

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, FIELD(Al_Kl, " . $query_Klassen . "), heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC, Z_K DESC,
                         auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
  }

  $heber_aus= dbBefehl($query);


 }else{    //Else Einklassen Auswertung

  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         Z_K DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
                         ");

}   //Ende Einklassen Auswertung


}else{  //Ende if GesGrp==0

 if($Grp==0){

   if($stammdaten['Masters']==1){
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         Z_K DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
   }else{

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         ORDER BY  heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         Z_K DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
   }


 }

 $heber_aus= dbBefehl($query);

}       //Ende GesGrp!=0






$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$Z_K=0;
$K_Gewicht=0;
$zaehler=0;


while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{

$zaehler++;
$i_zaheler++;
if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz'){
 if($dsatz_aus['Z_K']==0) $Platz= (int) 0;
 else{
        if (is_numeric($Platz)) {
                $Platz += 1;
        }else{ 
                $Platz = (int) 1;     
        }

 }
}else $Platz='AK';

if($stammdaten['EineKlasse']==0 && $_SESSION['GesGrp']==0){ //Nur falls eine Klasse aus ist

 if($dsatz_aus['Al_Kl'] != $Al_Kl ){

         if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                 if($dsatz_aus['Z_K']==0) $Platz=0;
                 else $Platz =1;
         else $Platz ='AK';

  $z=0;


 }else{                              //Damit beide events nicht gleichzeitig getriggerd werden

         if($dsatz_aus['Geschlecht'] != $Geschlecht){

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                         if($dsatz_aus['Z_K']==0) $Platz=0;
                         else $Platz =1;
                 else $Platz ='AK';

                 $z=0;

         }else{

                 if($dsatz_aus['Gw_Kl'] != $Gw_Kl)
                 {
                         if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                                 if($dsatz_aus['Z_K']==0) $Platz=0;
                                 else $Platz =1;
                         else $Platz ='AK';

                         $z=0;

                 }
         }
  }

}elseif($zaehler!=1){            // ohne EineKlasse Ende  && ohne Norm ==0

         if($dsatz_aus['Geschlecht'] != $Geschlecht){

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                         if($dsatz_aus['Z_K']==0) $Platz=0;
                         else $Platz =1;
                 else $Platz ='AK';

                 $z=0;

         }else{

                 if($dsatz_aus['Gw_Kl'] != $Gw_Kl)
                 {
                         if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                                 if($dsatz_aus['Z_K']==0) $Platz=0;
                                 else $Platz =1;
                         else $Platz ='AK';

                         $z=0;

                 }

         }
}



$Al_Kl = $dsatz_aus['Al_Kl'];
$Gw_Kl = $dsatz_aus['Gw_Kl'];
$Geschlecht = $dsatz_aus['Geschlecht'];
$Z_K = $dsatz_aus['Z_K'];
$K_Gewicht = $dsatz_aus['K_Gewicht'];



if($_SESSION['GesGrp']==1){

     if($dsatz_aus['GwKl_GesGrp_Platz'] != $Platz){
         dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         SET GwKl_GesGrp_Platz='$Platz'
                         WHERE IdHeber = '$dsatz_aus[IdHeber]'
                         ");
     }
}else{

     if($dsatz_aus['Platz_GwKl'] != $Platz){
         dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         SET Platz_GwKl='$Platz'
                         WHERE IdHeber = '$dsatz_aus[IdHeber]'
                         ");
     }
}


}                //ENDE while Heber


$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$Z_K=0;
$K_Gewicht=0;
$zaehler=0;
unset($arrayWkGrp);

//Für Reissen Platz!---------------------------------------------------------------------------------------------

if($GesGrp==0){          //Extra Auswertung

 if($stammdaten['EineKlasse']==0){       //EineKlasse legt fest ob egal ob Junior oder Aktive alle zusammen in eine Grp. Kommen

  if($stammdaten['Masters']==1)
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         S_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
  else{

       $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']." ORDER BY Von ASC");

       while($dataKlassen = mysqli_fetch_assoc($Klasse))
       {
                 if($query_Klassen == '') $query_Klassen="'" . $dataKlassen['Klasse'] . "'";
                 else $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassen['Klasse'] . "'";
       }

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, FIELD(Al_Kl, " . $query_Klassen . "), heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC, R_B DESC,
                         auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
  }

  $heber_aus= dbBefehl($query);


 }else{    //Else Einklassen Auswertung

  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, heber.Geschlecht ASC, 
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC, 
                         R_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
                         ");

}   //Ende Einklassen Auswertung


}else{  //Ende if GesGrp==0

 if($Grp==0){

   if($stammdaten['Masters']==1){
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC, 
                         R_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
   }else{

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         R_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
   }


 }
 $heber_aus= dbBefehl($query);

}       //Ende GesGrp!=0






$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$R_B=0;
$K_Gewicht=0;
$zaehler=0;

while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{

$zaehler++;
$i_zaheler++;
if($dsatz_aus['Ausserkonkurrenz'] != 'Ausserkonkurrenz'){
  if($dsatz_aus['R_B']==0){
    $Platz= (int) 0;
  }else{ 
        if (is_numeric($Platz)) {
                $Platz += 1;
        }else{ 
                $Platz = (int) 1;     
        }
  }
}else $Platz='AK';

if($stammdaten['EineKlasse']==0 && $_SESSION['GesGrp']==0){                  //Nur falls eine Klasse aus ist

 if($dsatz_aus['Al_Kl'] != $Al_Kl ){

         if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                 if($dsatz_aus['R_B']==0) $Platz=0;
                 else $Platz =1;
         else $Platz ='AK';

  $z=0;


 }else{                              //Damit beide events nicht gleichzeitig getriggerd werden

         if($dsatz_aus['Geschlecht'] != $Geschlecht){

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                         if($dsatz_aus['R_B']==0) $Platz=0;
                         else $Platz =1;
                 else $Platz ='AK';

                 $z=0;

         }else{

                 if($dsatz_aus['Gw_Kl'] != $Gw_Kl)
                 {
                         if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                                 if($dsatz_aus['R_B']==0) $Platz=0;
                                 else $Platz =1;
                         else $Platz ='AK';

                         $z=0;

                 }
         }
  }

}elseif($zaehler!=1){                                       // ohne EineKlasse Ende

         if($dsatz_aus['Geschlecht'] != $Geschlecht){

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                         if($dsatz_aus['R_B']==0) $Platz=0;
                         else $Platz =1;
                 else $Platz ='AK';

                 $z=0;

         }else{

                 if($dsatz_aus['Gw_Kl'] != $Gw_Kl)
                 {
                         if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                                 if($dsatz_aus['R_B']==0) $Platz=0;
                                 else $Platz =1;
                         else $Platz ='AK';

                         $z=0;

                 }
         }
}


$Al_Kl = $dsatz_aus['Al_Kl'];
$Gw_Kl = $dsatz_aus['Gw_Kl'];
$Geschlecht = $dsatz_aus['Geschlecht'];
$R_B = $dsatz_aus['R_B'];
$K_Gewicht = $dsatz_aus['K_Gewicht'];


    if($dsatz_aus['Platz_R'] != $Platz){

         dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         SET Platz_R='$Platz'
                         WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
                         ");
    }



}                //ENDE while Heber


$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$R_B=0;
$K_Gewicht=0;
$zaehler=0;
unset($arrayWkGrp);


//Für Stossen Platz!---------------------------------------------------------------------------------------------

if($GesGrp==0){          //Extra Auswertung

 if($stammdaten['EineKlasse']==0){       //EineKlasse legt fest ob egal ob Junior oder Aktive alle zusammen in eine Grp. Kommen

  if($stammdaten['Masters']==1)
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         S_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
  else{

       $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']." ORDER BY Von ASC");

       while($dataKlassen = mysqli_fetch_assoc($Klasse))
       {
                 if($query_Klassen == '') $query_Klassen="'" . $dataKlassen['Klasse'] . "'";
                 else $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassen['Klasse'] . "'";
       }

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, FIELD(Al_Kl, " . $query_Klassen . "), heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC, S_B DESC,
                         auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
  }

  $heber_aus= dbBefehl($query);


 }else{    //Else Einklassen Auswertung

  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         S_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
                         ");

}   //Ende Einklassen Auswertung


}else{  //Ende if GesGrp==0

 if($Grp==0){

   if($stammdaten['Masters']==1){
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         ORDER BY heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC, FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         S_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
   }else{

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         ORDER BY  heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,heber.Geschlecht ASC,
                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                         S_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";
   }


 }
 $heber_aus= dbBefehl($query);

}       //Ende GesGrp!=0






$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$S_B=0;
$K_Gewicht=0;
$zaehler=0;

while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{

$zaehler++;
$i_zaheler++;
if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz'){
 if($dsatz_aus['S_B']==0) $Platz= (int) 0;
 else{
        if (is_numeric($Platz)) {
                $Platz += 1;
        }else{ 
                $Platz = (int) 1;     
        }
 }
}else $Platz='AK';

if($stammdaten['EineKlasse']==0 && $_SESSION['GesGrp']==0){                  //Nur falls eine Klasse aus ist

 if($dsatz_aus['Al_Kl'] != $Al_Kl ){

         if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                 if($dsatz_aus['S_B']==0) $Platz=0;
                 else $Platz =1;
         else $Platz ='AK';

  $z=0;


 }else{                              //Damit beide events nicht gleichzeitig getriggerd werden

         if($dsatz_aus['Geschlecht'] != $Geschlecht){

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                         if($dsatz_aus['S_B']==0) $Platz=0;
                         else $Platz =1;
                 else $Platz ='AK';

                 $z=0;

         }else{

                 if($dsatz_aus['Gw_Kl'] != $Gw_Kl)
                 {
                         if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                                 if($dsatz_aus['S_B']==0) $Platz=0;
                                 else $Platz =1;
                         else $Platz ='AK';

                         $z=0;

                 }
         }
  }

}elseif($zaehler!=1){                                       // ohne EineKlasse Ende

         if($dsatz_aus['Geschlecht'] != $Geschlecht){

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                         if($dsatz_aus['S_B']==0) $Platz=0;
                         else $Platz =1;
                 else $Platz ='AK';

                 $z=0;

         }else{

                 if($dsatz_aus['Gw_Kl'] != $Gw_Kl)
                 {
                         if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
                                 if($dsatz_aus['S_B']==0) $Platz=0;
                                 else $Platz =1;
                         else $Platz ='AK';

                         $z=0;

                 }
         }
}


$Al_Kl = $dsatz_aus['Al_Kl'];
$Gw_Kl = $dsatz_aus['Gw_Kl'];
$Geschlecht = $dsatz_aus['Geschlecht'];
$S_B = $dsatz_aus['S_B'];
$K_Gewicht = $dsatz_aus['K_Gewicht'];


    if($dsatz_aus['Platz_S'] != $Platz){

         dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         SET Platz_S='$Platz'
                         WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
                         ");
    }



}                //ENDE while Heber


$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$S_B=0;
$K_Gewicht=0;
$zaehler=0;
unset($arrayWkGrp);


//Für Sinclair-Melone-Meltzer!---------------------------------------------------------------------------------------------


if($GesGrp==0){          //Extra Auswertung

 if($stammdaten['EineKlasse']==0){       //EineKlasse legt fest ob egal ob Junior oder Aktive alle zusammen in eine Grp. Kommen

       $StringOrderAlKl=OrderByZKAlKlundGeschlechtString($stammdaten);   //funktionen/nuetzliches.php

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY " . $StringOrderAlKl . " heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         auswertung_".$data_a_db['S_Db'].".Sinclair_P_Malone_Meltzer DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";


       $heber_aus= dbBefehl($query);


 }else{    //Else Einklassen Auswertung

  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY Geschlecht ASC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         auswertung_".$data_a_db['S_Db'].".Sinclair_P_Malone_Meltzer DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
                         ");

}   //Ende Einklassen Auswertung


}else{  //Ende if GesGrp==0

 if($Grp==0){

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         ORDER BY Geschlecht ASC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         auswertung_".$data_a_db['S_Db'].".Sinclair_P_Malone_Meltzer DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";



 }
 $heber_aus= dbBefehl($query);

}       //Ende GesGrp!=0



$Umbruch=0;
$Platz=0;
$z=0;
$Sinclair_P_Malone_Meltzer=0;
$Geschlecht='Männlich';
$ZK_ueber_AlKl_einzeln=1;

if($stammdaten['Wk_Art']=='ZK')
  if($stammdaten['Rel_Sin_AlKl']=='0') $ZK_ueber_AlKl_einzeln=0;


while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{

if($dsatz_aus['Ausserkonkurrenz']=='Ausserkonkurrenz') $Platz='AK';

if($ZK_ueber_AlKl_einzeln==1){
 if($dsatz_aus['Al_Kl'] != $Al_Kl && $_SESSION['GesGrp']==0)
 {
         if($stammdaten['EineKlasse']==0){         //Nur f�r ohne eine Klasse

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz') $Platz =0;
                 else $Platz ='AK';
         }        //Ende Eine Klasse
 }else{

         if($dsatz_aus['Geschlecht'] != $Geschlecht){

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz') $Platz =0;
                 else $Platz ='AK';
         }
 }
}

$Al_Kl = $dsatz_aus['Al_Kl'];
$Gw_Kl = $dsatz_aus['Gw_Kl'];
$Geschlecht = $dsatz_aus['Geschlecht'];

if($Platz!=='AK'){
        if (is_numeric($Platz)) {
                $Platz += 1;
        }else{ 
                $Platz = (int) 1;     
        }
}


$Sinclair_P_Malone_Meltzer= $dsatz_aus['Sinclair_P_Malone_Meltzer'];

//echo 'IdHeber: ' . $dsatz_aus[IdHeber] . ' || Al_KL: ' . $Al_Kl . ' || Platz: ' . $Platz . ' || SinP: ' . $Sinclair_P . '<br>';


if($_SESSION['GesGrp']==1){

         if($dsatz_aus['Sinclair_GesGrp_Platz'] != $Platz){
                 dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         SET Sinclair_GesGrp_Platz='$Platz'
                         WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
                         ");
         }
}else{
         if($dsatz_aus['Platz_Sin'] != $Platz){
                 dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         SET Platz_Sin='$Platz'
                         WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
                         ");
         }

}


}

unset($arrayWkGrp);
unset($Geschlecht);
unset($Sinclair_P_Malone_Meltzer);
unset($Al_Kl);
unset($Gw_Kl);



//Für Relativ!---------------------------------------------------------------------------------------------

if($stammdaten['Wk_Art']!='BL'){

if($GesGrp==0){          //Extra Auswertung

 if($stammdaten['EineKlasse']==0){       //EineKlasse legt fest ob egal ob Junior oder Aktive alle zusammen in eine Grp. Kommen

       $StringOrderAlKl=OrderByZKAlKlundGeschlechtString($stammdaten);   //funktionen/nuetzliches.php

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY " . $StringOrderAlKl . " heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         auswertung_".$data_a_db['S_Db'].".Relativ_P DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";


  $heber_aus= dbBefehl($query);


 }else{    //Else Einklassen Auswertung

  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         ORDER BY Geschlecht ASC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         auswertung_".$data_a_db['S_Db'].".Relativ_P DESC , auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
                         ");

}   //Ende Einklassen Auswertung


}else{  //Ende if GesGrp==0

 if($Grp==0){

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         ORDER BY Geschlecht ASC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         auswertung_".$data_a_db['S_Db'].".Relativ_P DESC , Z_K DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";

 }
 $heber_aus= dbBefehl($query);

}       //Ende GesGrp!=0

}else{        //Ende if != BL

$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", staaten
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber.IdStaat=staaten.IdStaat
                         ORDER BY Relativ_P DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
                         ");

}

$Umbruch=0;
$Platz=0;
$z=0;
$Relativ_P=0;
$Geschlecht='Männlich';
$ZK_ueber_AlKl_einzeln=1;

if($stammdaten['Wk_Art']=='ZK')
  if($stammdaten['Rel_Sin_AlKl']=='0') $ZK_ueber_AlKl_einzeln=0;


while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{
if($dsatz_aus['Ausserkonkurrenz']=='Ausserkonkurrenz') $Platz='AK';

//ZK: Nur dann zwischen AlKl und Geschelcht f�r Platzierung unterscheiden wenn Rel_Sin_AlKl==1


if($ZK_ueber_AlKl_einzeln==1){
 if($stammdaten['Wk_Art']!='BL'){
   if($dsatz_aus['Al_Kl'] != $Al_Kl && $_SESSION['GesGrp']==0)
   {
         if($stammdaten['EineKlasse']==0){         //Nur f�r ohne eine Klasse

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz') $Platz =0;
                 else $Platz ='AK';
         }        //Ende Eine Klasse
   }else{
         if($dsatz_aus['Geschlecht'] != $Geschlecht){

                 if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz') $Platz =0;
                 else $Platz ='AK';
         }
   }
 }
}

$Al_Kl = $dsatz_aus['Al_Kl'];
$Gw_Kl = $dsatz_aus['Gw_Kl'];
$Geschlecht = $dsatz_aus['Geschlecht'];
if (is_numeric($Platz)) {
        $Platz += 1;
}else{ 
        $Platz = (int) 1;     
}


$Relativ_P = $dsatz_aus['Relativ_P'];


//echo 'IdHeber: ' . $dsatz_aus[IdHeber] . ' || Al_KL: ' . $Al_Kl . ' || Gw_Kl: ' . $Gw_Kl . ' || Platz: ' . $Platz . ' || RelP: ' . $Relativ_P . '<br>';


if($_SESSION['GesGrp']==1){

         if($dsatz_aus['Relativ_GesGrp_Platz'] != $Platz){
                 dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         SET Relativ_GesGrp_Platz='$Platz'
                         WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
                         ");
         }
}else{
         if($dsatz_aus['Platz_RP'] != $Platz){
                 dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         SET Platz_RP='$Platz'
                         WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
                         ");
         }

}


}
unset($arrayWkGrp);
unset($Geschlecht);
unset($Sinclair_P);
unset($Al_Kl);
unset($Gw_Kl);


//F�r Relativ pro JG----------------------------------------------------------------------------------------------------
//Vlt. nur ver�bergehend implementiert bis export funktion vorhanden
if($_SESSION['Auswahl_Relativ_pro_JG']!='')
if($stammdaten['Wk_Art']=='ZK'){
	if($stammdaten['Wk_Art']!='BL'){

		$query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
							WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
							AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
							ORDER BY Geschlecht ASC, heber.Jahrgang ASC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
							auswertung_".$data_a_db['S_Db'].".Relativ_P DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC";

		$heber_aus= dbBefehl($query);

		$Umbruch=0;
		$Platz=0;
		$Geschlecht='Männlich';

		while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
		{
			if($dsatz_aus['Jahrgang'] != $Jahrgang)
			{
				if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz') $Platz =0;
				else $Platz ='AK';				        //Ende Eine Klasse
			}else{
				if($dsatz_aus['Geschlecht'] != $Geschlecht){

					if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz') $Platz =0;
					else $Platz ='AK';
				}
			}


			$Jahrgang= $dsatz_aus['Jahrgang'];
			$Geschlecht = $dsatz_aus['Geschlecht'];
                        if (is_numeric($Platz)) {
                                $Platz += 1;
                        }else{ 
                                $Platz = (int) 1;     
                        }

			if($dsatz_aus['Platz_Relativ_pro_JG'] != $Platz){
				dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
							SET Platz_Relativ_pro_JG='$Platz'
							WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
						");
			}

		}
	}
}

//----------------------------------------------------------------------------------------------
//--------------------------Mit Norm Auswertung:
//----------------------------------------------------------------------------------------------

if($stammdaten['MitNorm']==1){


	$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber_".$data_a_db['S_Db'].".Norm_Heber = '1'
			ORDER BY heber.Geschlecht ASC,
			auswertung_".$data_a_db['S_Db'].".Gw_Kl_Norm DESC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
			Z_K DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
			");


$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$Z_K=0;
$K_Gewicht=0;
$zaehler=0;


while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{

        

	$zaehler++;
	$i_zaheler++;
        
        if ($dsatz_aus['Ausserkonkurrenz'] != 'Ausserkonkurrenz') {
                if ($dsatz_aus['R_B'] == 0) $Platz = 0;
                else {
                        if (is_numeric($Platz)) {
                                $Platz += 1;
                        }else{ 
                                $Platz = (int) 1;     
                        }
                }
        } else {
                $Platz = 'AK';
        }



			if($dsatz_aus['Geschlecht'] != $Geschlecht){

				if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
					if($dsatz_aus['Z_K']==0) $Platz=0;
					else $Platz =1;
					else $Platz ='AK';

					$z=0;

			}else{

				if($dsatz_aus['Gw_Kl_Norm'] != $Gw_Kl_Norm)
				{
					if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
						if($dsatz_aus['Z_K']==0) $Platz=0;
						else $Platz =1;
						else $Platz ='AK';

						$z=0;

				}
			}



	$Al_Kl = $dsatz_aus['Al_Kl'];
	$Gw_Kl_Norm = $dsatz_aus['Gw_Kl_Norm'];
	$Geschlecht = $dsatz_aus['Geschlecht'];
	$Z_K = $dsatz_aus['Z_K'];
	$K_Gewicht = $dsatz_aus['K_Gewicht'];

			if($dsatz_aus['Platz_Norm'] != $Platz){
				dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
						SET Platz_Norm='$Platz'
						WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
						");
			}


}                //ENDE while Heber


$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$Z_K=0;
$K_Gewicht=0;
$zaehler=0;
unset($arrayWkGrp);

//F�r Reissen Platz!---------------------------------------------------------------------------------------------

$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
		WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
		AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
		AND heber_".$data_a_db['S_Db'].".Norm_Heber = '1'
		ORDER BY heber.Geschlecht ASC,
		auswertung_".$data_a_db['S_Db'].".Gw_Kl_Norm DESC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
		R_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
		");


$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$R_B=0;
$K_Gewicht=0;
$zaehler=0;

while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{

	$zaehler++;
	$i_zaheler++;
        
        if ($dsatz_aus['Ausserkonkurrenz'] != 'Ausserkonkurrenz') {
                if ($dsatz_aus['R_B'] == 0) $Platz = 0;
                else {
                        if (is_numeric($Platz)) {
                                $Platz += 1;
                        }else{
                                $Platz = (int) 1;     
                        }
                }
        } else {
                $Platz = 'AK';
        }


			if($dsatz_aus['Geschlecht'] != $Geschlecht){

				if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
					if($dsatz_aus['R_B']==0) $Platz=0;
					else $Platz =1;
					else $Platz ='AK';

					$z=0;

			}else{

				if($dsatz_aus['Gw_Kl_Norm'] != $Gw_Kl_Norm)
				{
					if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
						if($dsatz_aus['R_B']==0) $Platz=0;
						else $Platz =1;
						else $Platz ='AK';

						$z=0;

				}
			}


	$Al_Kl = $dsatz_aus['Al_Kl'];
	$Gw_Kl_Norm= $dsatz_aus['Gw_Kl_Norm'];
	$Geschlecht = $dsatz_aus['Geschlecht'];
	$R_B = $dsatz_aus['R_B'];
	$K_Gewicht = $dsatz_aus['K_Gewicht'];


	if($dsatz_aus['Platz_R_Norm'] != $Platz){

		dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
				SET Platz_R_Norm='$Platz'
				WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
				");
	}



}                //ENDE while Heber


$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$R_B=0;
$K_Gewicht=0;
$zaehler=0;
unset($arrayWkGrp);


//F�r Stossen Platz!---------------------------------------------------------------------------------------------

$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
		WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
		AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
		AND heber_".$data_a_db['S_Db'].".Norm_Heber = '1'
		ORDER BY heber.Geschlecht ASC,
		auswertung_".$data_a_db['S_Db'].".Gw_Kl_Norm DESC, heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
		S_B DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
		");



$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$S_B=0;
$K_Gewicht=0;
$zaehler=0;

while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{

	$zaehler++;
	$i_zaheler++;
	
        
        if ($dsatz_aus['Ausserkonkurrenz'] != 'Ausserkonkurrenz') {
                if ($dsatz_aus['R_B'] == 0) $Platz = 0;
                else {
                        if (is_numeric($Platz)) {
                                $Platz += 1;
                        }else{ 
                                $Platz = (int) 1;     
                        }
                }
        } else {
                $Platz = 'AK';
        }


			if($dsatz_aus['Geschlecht'] != $Geschlecht){

				if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
					if($dsatz_aus['S_B']==0) $Platz=0;
					else $Platz =1;
					else $Platz ='AK';

					$z=0;

			}else{

				if($dsatz_aus['Gw_Kl_Norm'] != $Gw_Kl_Norm)
				{
					if($dsatz_aus['Ausserkonkurrenz']!='Ausserkonkurrenz')
						if($dsatz_aus['S_B']==0) $Platz=0;
						else $Platz =1;
						else $Platz ='AK';

						$z=0;

				}
			}



	$Al_Kl = $dsatz_aus['Al_Kl'];
	$Gw_Kl_Norm = $dsatz_aus['Gw_Kl_Norm'];
	$Geschlecht = $dsatz_aus['Geschlecht'];
	$S_B = $dsatz_aus['S_B'];
	$K_Gewicht = $dsatz_aus['K_Gewicht'];


	if($dsatz_aus['Platz_S_Norm'] != $Platz){

		dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
				SET Platz_S_Norm='$Platz'
				WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
				");
	}



}                //ENDE while Heber


$i_zaheler=0;
$Umbruch=0;
$Platz=0;
$z=0;
$S_B=0;
$K_Gewicht=0;
$zaehler=0;
unset($arrayWkGrp);

}	//Auswertung MitNorm Ende

if($stammdaten['Wk_Art']!='BL'){

//Platzierung Robi-Points-------------------------------------------------------------------------------------------
$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", staaten
		WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
		AND heber.IdStaat=staaten.IdStaat
		ORDER BY Robbi_P DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
		");

$Umbruch=0;
$Platz=0;
$z=0;
$Relativ_P=0;
$Geschlecht='Männlich';
$ZK_ueber_AlKl_einzeln=0;


while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{
	if($dsatz_aus['Ausserkonkurrenz']=='Ausserkonkurrenz') $Platz='AK';

	$Al_Kl = $dsatz_aus['Al_Kl'];
	$Gw_Kl = $dsatz_aus['Gw_Kl'];
	$Geschlecht = $dsatz_aus['Geschlecht'];
	
        if (is_numeric($Platz)) {
                $Platz += 1;
        }else{ 
                $Platz = (int) 1;     
        }
        
        


	$Relativ_P = $dsatz_aus['Robbi_P'];

	if($Relativ_P==0){
		$Platz= (int) 0;
	}

	if($dsatz_aus['Platz_Robi'] != $Platz){
			dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
					SET Platz_Robi='$Platz'
					WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
					");
		}
}

unset($arrayWkGrp);
unset($Geschlecht);
unset($Sinclair_P);
unset($Al_Kl);
unset($Gw_Kl);


//Platzierung Robi Qualifikation-Points-------------------------------------------------------------------------------------------
$heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", staaten
		WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
		AND heber.IdStaat=staaten.IdStaat
		ORDER BY Robbi_Quali_P DESC, auswertung_".$data_a_db['S_Db'].".hoechste_time ASC
		");

$Umbruch=0;
$Platz=0;
$z=0;
$Relativ_P=0;
$Geschlecht='Männlich';
$ZK_ueber_AlKl_einzeln=0;


while($dsatz_aus = mysqli_fetch_assoc($heber_aus))
{
    if($dsatz_aus['Ausserkonkurrenz']=='Ausserkonkurrenz') $Platz='AK';

    $Al_Kl = $dsatz_aus['Al_Kl'];
    $Gw_Kl = $dsatz_aus['Gw_Kl'];
    $Geschlecht = $dsatz_aus['Geschlecht'];

        if (is_numeric($Platz)) {
                $Platz += 1;
        }else{ 
                $Platz = (int) 1;     
        }


    $Relativ_P = $dsatz_aus['Robbi_Quali_P'];

    if($Relativ_P==0){
        $Platz= (int) 0;
    }

    if($dsatz_aus['Platz_Robi_Quali'] != $Platz){
        dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
					SET Platz_Robi_Quali='$Platz'
					WHERE IdHeber = '".$dsatz_aus['IdHeber']."'
					");
    }
}

unset($arrayWkGrp);
unset($Geschlecht);
unset($Sinclair_P);
unset($Al_Kl);
unset($Gw_Kl);

}

?>



</body>
</html>
