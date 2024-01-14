<?php

if($stammdaten['Wk_Art'] != "ZK" && $stammdaten['Wk_Art'] != "BL"){
$Grp_data = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']."
                               WHERE Gruppe = '$Grp'
                               ");
}elseif($stammdaten['Wk_Art'] != "BL"){
$Grp_data = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']."
                               WHERE Gruppen = '$Grp'
                               ");
}else{
$Grp_data = dbBefehl("SELECT * FROM bl_grp
                               WHERE Grp = '$Grp'
                               ");
}
                              //Anlegen der Arrays as needed
$arrayR=array();
$arrayRP=array();
$arrayRlP=array();

$arrayS=array();
$arraySP=array();
$arraySlP=array();

$arrayZ=array();
$arrayZP=array();
$arrayZlP=array();

$arrayM=array();
$arrayMP=array();
$arrayMlP=array();

$arraySin=array();
$arraySinP=array();
$arraySinlP=array();

$arrayRe=array();
$arrayReP=array();
$arrayRelP=array();

$arrayGewicht=array();

while($dsatz_Grp = mysqli_fetch_assoc($Grp_data))      //Da wir in der �bersicht sind | �ber alle Gruppen die in dieser WK_Grp sind
{
if($stammdaten['Wk_Art'] != "ZK" && $stammdaten['Wk_Art'] != "BL") $Grp=$dsatz_Grp['Gruppe_Aus'];      //Z_K hat keine Gruppe_Aus!

$arrayR[$Grp]=array();
$arrayRP[$Grp]=array();
$arrayRlP[$Grp]=array();

$arrayS[$Grp]=array();
$arraySP[$Grp]=array();
$arraySlP[$Grp]=array();

$arrayZ[$Grp]=array();
$arrayZP[$Grp]=array();
$arrayZlP[$Grp]=array();

$arrayM[$Grp]=array();
$arrayMP[$Grp]=array();
$arrayMlP[$Grp]=array();

$arraySin[$Grp]=array();
$arraySinP[$Grp]=array();
$arraySinlP[$Grp]=array();

$arrayRe[$Grp]=array();
$arrayReP[$Grp]=array();
$arrayRelP[$Grp]=array();

$arrayGewicht[$Grp]=array();

if($stammdaten['Wk_Art'] != "ZK" && $stammdaten['Wk_Art'] != "BL"){
$auswertung_M_K = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db']."
                               WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
                               ");
}else{
$auswertung_M_K = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db']."
                               WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               ");
}

while($d_aus = mysqli_fetch_assoc($auswertung_M_K))                        //Zum errechnen der Mehrkampfwertung_Gesamt
{
$RB=0;
$SB=0;

if($stammdaten['Wk_Art'] != "M_m_T")
{
  if($d_aus['R_1_G'] == "Ja"){
    $RB=$d_aus['R_1'];
  }
  if($d_aus['R_2_G'] == "Ja"){
    $RB=$d_aus['R_2'];
  }
  if($d_aus['R_3_G'] == "Ja"){
    $RB=$d_aus['R_3'];
  }
  if($d_aus['S_1_G'] == "Ja"){
    $SB=$d_aus['S_1'];
  }
  if($d_aus['S_2_G'] == "Ja"){
    $SB=$d_aus['S_2'];
  }
  if($d_aus['S_3_G'] == "Ja"){
    $SB=$d_aus['S_3'];
  }

         if($stammdaten['Wk_Art'] == "ZK" || $stammdaten['Wk_Art'] == "BL"){              //Erstmal nur f�r neue Sortierung von der �bersicht

                if(($RB!=$d_aus['R_B'])||($SB!=$d_aus['S_B'])){
                   dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                SET R_B= '$RB', S_B= '$SB'
                                WHERE IdHeber ='$d_aus[IdHeber]'
                                ");
                }
         }

}else{                    //Ende der Beste Versuch erfassung f�r != M_m_T

  if($d_aus['R_1_G']=='Ja') $R_1=(($d_aus['R_1']*50)/$d_aus['Gewicht'])+ $d_aus['R_1_T'] * 10; else $R_1=0;
  if($d_aus['R_2_G']=='Ja') $R_2=(($d_aus['R_2']*50)/$d_aus['Gewicht'])+ $d_aus['R_2_T'] * 10; else $R_2=0;
  if($d_aus['R_3_G']=='Ja') $R_3=(($d_aus['R_3']*50)/$d_aus['Gewicht'])+ $d_aus['R_3_T'] * 10; else $R_3=0;

  if($d_aus['S_1_G']=='Ja') $S_1=(($d_aus['S_1']*50)/$d_aus['Gewicht'])+ $d_aus['S_1_T'] * 10; else $S_1=0;
  if($d_aus['S_2_G']=='Ja') $S_2=(($d_aus['S_2']*50)/$d_aus['Gewicht'])+ $d_aus['S_2_T'] * 10; else $S_2=0;
  if($d_aus['S_3_G']=='Ja') $S_3=(($d_aus['S_3']*50)/$d_aus['Gewicht'])+ $d_aus['S_3_T'] * 10; else $S_3=0;


  if($R_1>=$R_2) $RB=$R_1;
  else           $RB=$R_2;
  if($RB < $R_3) $RB=$R_3;

  if($S_1>=$S_2) $SB=$S_1;
  else           $SB=$S_2;
  if($SB < $S_3) $SB=$S_3;

}     //schliesst else
  $ZB=$RB+$SB;
  $arrayR[$Grp][$d_aus['IdHeber']]=$RB;                                    //erstellt array mit [IdHeber][Bester Versuch]
  $arrayS[$Grp][$d_aus['IdHeber']]=$SB;
  $arrayZ[$Grp][$d_aus['IdHeber']]=$ZB;

  $arrayGewicht[$Grp][$d_aus['IdHeber']]=$d_aus['Gewicht'];
  $arrayGewichtS[$Grp][$d_aus['IdHeber']]=$d_aus['Gewicht'];
  $arrayGewichtZ[$Grp][$d_aus['IdHeber']]=$d_aus['Gewicht'];

  if($stammdaten['Wk_Art'] != "ZK" && $stammdaten['Wk_Art'] != "BL") $arrayM[$Grp][$d_aus['IdHeber']]= $d_aus['M_K_G'];
  if($stammdaten['Wk_Art'] == "ZK") $arraySin[$Grp][$d_aus['IdHeber']]= $d_aus['Sinclair_P'];
  if($stammdaten['Wk_Art'] == "BL") $arrayRe[$Grp][$d_aus['IdHeber']]= $d_aus['Relativ_P'];

}     //ende while(auswertung)
                                         //Um numerische Assioziation bei multisort zu behalten:
                                         //http://stackoverflow.com/questions/23740747/array-multisort-with-maintaining-numeric-index-association

$keys = array_keys($arrayR[$Grp]);
array_multisort($arrayR[$Grp], SORT_DESC, $arrayGewicht[$Grp], SORT_ASC, $arrayR[$Grp], $keys);
$arrayR[$Grp] = array_combine($keys, $arrayR[$Grp]);
$arrayGewicht[$Grp] = array_combine($keys, $arrayGewicht[$Grp]);

$keysS = array_keys($arrayS[$Grp]);
array_multisort($arrayS[$Grp], SORT_DESC, $arrayGewichtS[$Grp], SORT_ASC, $arrayS[$Grp], $keysS);
$arrayS[$Grp] = array_combine($keysS, $arrayS[$Grp]);

$keysZ = array_keys($arrayZ[$Grp]);
array_multisort($arrayZ[$Grp], SORT_DESC, $arrayGewichtZ[$Grp], SORT_ASC, $arrayZ[$Grp], $keysZ);
$arrayZ[$Grp] = array_combine($keysZ, $arrayZ[$Grp]);

                                 // sortiert array neu s.d. hoechstes value oben    (Alt)
// arsort($arrayR[$Grp]);
// arsort($arrayS[$Grp]);
// arsort($arrayZ[$Grp]);
arsort($arrayM[$Grp]);           //Bei Mehrkampf Gewicht egal
arsort($arraySin[$Grp]);
arsort($arrayRe[$Grp]);


$Gw=0;
$RP=0;
$tmp_zr=0;
foreach ($arrayR[$Grp] AS $key => $value){
  if(($Rlp==$value)&&($RP!=0)&&($arrayGewicht[$Grp][$key]==$Gw)){    //Um gleiche Punkte mit gleichen Pl�tzen zu vergeben
     $tmp_zr++;
  }elseif($value==0){
     $RP=0;
  }else{
     $RP=$RP+$tmp_zr+1;
     $tmp_zr=0;
  }

  $arrayRP[$Grp][$key][0]=$value;                //$arrayRP[gruppe][IdHeber][0=Punkte][1=Platz]

  $arrayRP[$Grp][$key][1]=$RP;

  $arrayRlP[$Grp][$value]=$RP;

  $Rlp=$value;
  $Gw=$arrayGewicht[$Grp][$key];
}

$Gw=0;
$SP=0;
$tmp_zr=0;
foreach ($arrayS[$Grp] AS $key => $value){
  if(($Slp==$value)&&($SP!=0)&&($arrayGewicht[$Grp][$key]==$Gw)){                     //Um gleiche Punkte mit gleichen Pl�tzen zu vergeben
     $tmp_zr++;
  }elseif($value==0){
     $SP=0;
  }else{
     $SP=$SP+$tmp_zr+1;
     $tmp_zr=0;
  }

  $arraySP[$Grp][$key][0]=$value;                //$arrayRP[gruppe][IdHeber][0=Punkte][1=Platz]

  $arraySP[$Grp][$key][1]=$SP;

  $arraySlP[$Grp][$value]=$SP;

  $Slp=$value;
  $Gw=$arrayGewicht[$Grp][$key];
}

$Gw=0;
$ZP=0;
$tmp_zr=0;
foreach ($arrayZ[$Grp] AS $key => $value){
  if(($Zlp==$value)&&($arrayGewicht[$Grp][$key]==$Gw)){                     //Um gleiche Punkte mit gleichen Pl�tzen zu vergeben
     $tmp_zr++;
  }elseif($value==0){
     $ZP=0;
  }else{
     $ZP=$ZP+$tmp_zr+1;
     $tmp_zr=0;
  }

  $arrayZP[$Grp][$key][0]=$value;                //$arrayRP[gruppe][IdHeber][0=Punkte][1=Platz]

  $arrayZP[$Grp][$key][1]=$ZP;

  $arrayZlP[$Grp][$value]=$ZP;

  $Zlp=$value;
  $Gw=$arrayGewicht[$Grp][$key];
}

$MP=0;
$tmp_mr=0;
foreach ($arrayM[$Grp] AS $key => $value){
  if($Mlp==$value){                              //Um gleiche Punkte mit gleichen Pl�tzen zu vergeben
     $tmp_mr++;
  }elseif($value==0){
     $MP=0;
  }else{
     $MP=$MP+$tmp_mr+1;
     $tmp_mr=0;
  }

  $arrayMP[$Grp][$key][0]=$value;                //$arrayRP[gruppe][IdHeber][0=Punkte][1=Platz]

  $arrayMP[$Grp][$key][1]=$MP;

  $arrayMlP[$Grp][$value]=$MP;

  $Mlp=$value;
}

$SinP=0;
$tmp_mr=0;
foreach ($arraySin[$Grp] AS $key => $value){
  if($Sinlp==$value){                     //Um gleiche Punkte mit gleichen Pl�tzen zu vergeben
     $tmp_mr++;
  }elseif($value==0){
     $SinP=0;
  }else{
     $SinP=$SinP+$tmp_mr+1;
     $tmp_mr=0;
  }

  $arraySinP[$Grp][$key][0]=$value;                //$arrayRP[gruppe][IdHeber][0=Punkte][1=Platz]

  $arraySinP[$Grp][$key][1]=$SinP;

  $arraySinlP[$Grp][$value]=$SinP;

  $Sinlp=$value;
}

$Sinlp=0;
$SinP=0;
$tmp_mr=0;
foreach ($arrayRe[$Grp] AS $key => $value){
  if($Sinlp==$value){                     //Um gleiche Punkte mit gleichen Pl�tzen zu vergeben
     $tmp_mr++;
  }elseif($value==0){
     $SinP=0;
  }else{
     $SinP=$SinP+$tmp_mr+1;
     $tmp_mr=0;
  }

  $arrayReP[$Grp][$key][0]=$value;                //$arrayRP[gruppe][IdHeber][0=Punkte][1=Platz]

  $arrayReP[$Grp][$key][1]=$SinP;

  $arrayRelP[$Grp][$value]=$SinP;

  $Sinlp=$value;
}

}     //ende while Grp

?>
