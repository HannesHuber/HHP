<?php

$String_Sort_GwKl = 'auswertung_'.$data_a_db['S_Db'].'.Gw_Kl > 0 , auswertung_'.$data_a_db['S_Db'].'.Gw_Kl DESC,';

$String_Sort_Platz = 'auswertung_'.$data_a_db['S_Db'].'.Platz_GwKl IS NULL,
                             auswertung_'.$data_a_db['S_Db'].'.Platz_GwKl =0,
                             auswertung_'.$data_a_db['S_Db'].'.Platz_GwKl ASC';

$String_Sort_Platz_Norm = 'auswertung_'.$data_a_db['S_Db'].'.Platz_Norm IS NULL,
                             auswertung_'.$data_a_db['S_Db'].'.Platz_Norm =0,
                             auswertung_'.$data_a_db['S_Db'].'.Platz_Norm ASC';

if($_SESSION['Aus_GrpUndAlKl']==0){

if($_SESSION['GesGrp']==0){

if($_SESSION['alleGrp']==0){

if($_SESSION['Aus_AlKl'] == 0){

  if($stammdaten['EineKlasse']==0){                 //EineKlasse legt fest ob egal ob Junior oder Aktive alle zusammen in eine Grp. Kommen

  if($stammdaten['Masters']==1){
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }else{

       $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk ORDER BY Von ASC");

       while($dataKlassen = mysqli_fetch_assoc($Klasse))
       {
                 if($query_Klassen == '') $query_Klassen="'" . $dataKlassen['Klasse'] . "'";
                 else $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassen['Klasse'] . "'";

       }

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].",verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, " . $query_Klassen . "), heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }

  $heber_aus= dbBefehl($query);

  }else{

  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz
                         ");

  }

}else{           // if Sesson AlKl==0 Ende

  if($stammdaten['EineKlasse']==0){                 //EineKlasse legt fest ob egal ob Junior oder Aktive alle zusammen in eine Grp. Kommen

  if($stammdaten['Masters']==1){
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber.AlKl = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }else{

       $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk ORDER BY Von ASC");

       while($dataKlassen = mysqli_fetch_assoc($Klasse))
       {
                 if($query_Klassen == '') $query_Klassen="'" . $dataKlassen['Klasse'] . "'";
                 else $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassen['Klasse'] . "'";

       }

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber.AlKl = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, " . $query_Klassen . "), heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }

  $heber_aus= dbBefehl($query);

  }else{

  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber.AlKl = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz
                         ");

  }

}

}else{             //über alle Grp

 if($stammdaten['EineKlasse']==0){       //EineKlasse legt fest ob egal ob Junior oder Aktive alle zusammen in eine Grp. Kommen

  if($stammdaten['Masters']==1)
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  else{

       $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk ORDER BY Von ASC");

       while($dataKlassen = mysqli_fetch_assoc($Klasse))
       {
                 if($query_Klassen == '') $query_Klassen="'" . $dataKlassen['Klasse'] . "'";
                 else $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassen['Klasse'] . "'";

       }



       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, " . $query_Klassen . "), heber.Geschlecht ASC,

                         ".$String_Sort_GwKl."

                         heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }

  $heber_aus= dbBefehl($query);



 }else{    //Else Einklassen Auswertung

  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz
                         ");

}   //Ende Einklassen Auswertung


}    //Ende if sessons alle Grp == 1

}else{  //Ende if GesGrp==0

 if($Grp==0){

  if($stammdaten['Masters']==1){
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }else{

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }


 }else{        //Grp==0 Ende

  if($stammdaten['Masters']==1){
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }else{

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }

 }       //Grp==1 Ende

 $heber_aus= dbBefehl($query);

}       //Ende GesGrp!=0

}else{   //Ende GrpUndAlKl==0


if($stammdaten['EineKlasse']==0){                 //EineKlasse legt fest ob egal ob Junior oder Aktive alle zusammen in eine Grp. Kommen



if($stammdaten['Masters']==1){
       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                         AND heber.AlKl = '$AlKl'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, 'Kinder', 'Schüler', 'Jugend', 'Junioren', 'Aktive', 'AK1', 'AK2', 'AK3',
                         'AK4', 'AK5', 'AK6', 'AK7', 'AK8', 'AK9', 'AK10'), heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }else{

       $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk ORDER BY Von ASC");

       while($dataKlassen = mysqli_fetch_assoc($Klasse))
       {
                 if($query_Klassen == '') $query_Klassen="'" . $dataKlassen['Klasse'] . "'";
                 else $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassen['Klasse'] . "'";

       }

       $query="SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                         AND heber.AlKl = '$AlKl'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY FIELD(Al_Kl, " . $query_Klassen . "), heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz";
  }

  $heber_aus= dbBefehl($query);

}else{   //Ende EineKlasse==0

  $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                         AND heber.AlKl = '$AlKl'
							   AND heber.IdVerein = verein.IdVerein
                         ORDER BY heber.Geschlecht ASC,
                         ".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
                         $String_Sort_Platz
                         ");


}

}        //Ende GrpUndAlKl!=0

if($_SESSION['MitNorm']==1){
    if($_SESSION['Aus_L_Grp']=="-1"){

        $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber_".$data_a_db['S_Db'].".Norm_Heber = '1'
			AND heber.IdVerein = verein.IdVerein
			ORDER BY heber.Geschlecht ASC,
			".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
			$String_Sort_Platz_Norm
			");
    }else{
        $Grp=$_SESSION['Aus_L_Grp'];

        $heber_aus= dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", verein
				WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
				AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
				AND heber_".$data_a_db['S_Db'].".Norm_Heber = '1'
				AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
				AND heber.IdVerein = verein.IdVerein
				ORDER BY heber.Geschlecht ASC,
				".$String_Sort_GwKl."
 heber_".$data_a_db['S_Db'].".Ausserkonkurrenz ASC,
				$String_Sort_Platz_Norm
				");
    }
}



?>
