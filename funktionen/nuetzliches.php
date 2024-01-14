<?php

function dez_steigerung_reload_increase_couter(){

    global $data_a_db;
    //Für neuen Reload:
    $Reload_Variable=0;
    $DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
    $ReloadIteration = mysqli_fetch_assoc($DataReload);
    $Reload_Variable=$ReloadIteration['WkLeitungIteration']+1;
    dbBefehl("UPDATE wk_reload_".$data_a_db['S_Db']."
                                SET WkLeitungIteration = '$Reload_Variable'
                                WHERE Id_Iteration ='1'
                                ");

}

function reload_wk_leiter_und_anzeigen($bridge){

    global $data_a_db;
    //Für neuen Reload:
    $Reload_Variable=0;
    $DataReload = dbBefehl("SELECT * FROM wk_reload_".$data_a_db['S_Db']);
    $ReloadIteration = mysqli_fetch_assoc($DataReload);
    $Reload_Variable=$ReloadIteration['Grp']+1;
    dbBefehl("UPDATE wk_reload_".$data_a_db['S_Db']."
                                SET Grp = '$Reload_Variable'
                                WHERE Id_Iteration ='1'
                                ");

    if($bridge==1){
        $Reload_Variable=$ReloadIteration['Bridge1']+1;

        dbBefehl("UPDATE wk_reload_".$data_a_db['S_Db']."
                                    SET Bridge1= '$Reload_Variable'
                                    WHERE Id_Iteration ='1'
                                    ");
    }else{
        $Reload_Variable=$ReloadIteration['Bridge2']+1;

        dbBefehl("UPDATE wk_reload_".$data_a_db['S_Db']."
                                    SET Bridge2= '$Reload_Variable'
                                    WHERE Id_Iteration ='1'
                                    ");
    }


}

function al_kl_heber ($IdHeber,$stammdaten)
{
    global $data_a_db;


    $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                        WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                        AND heber.IdHeber='$IdHeber'
                        LIMIT 1") ;

    if(mysqli_num_rows($heber)==0){

            $heber = dbBefehl("SELECT * FROM heber
                                    WHERE heber.IdHeber='$IdHeber'
                                    LIMIT 1") ;
    }

    $dsatz = mysqli_fetch_assoc($heber);

    if($dsatz['AlKlMain']!=''){

        $AlKl=$dsatz['AlKlMain'];
        return $AlKl;

    }else{


        $Jahrgang=$dsatz['Jahrgang'];
        $Wk_Art=$stammdaten["Wk_Art"];

        $time=getdate();
        $Alter=$time['year']-$Jahrgang;


        if($stammdaten["Masters"]==0)
        {

            if($Wk_Art=="ZK" || $Wk_Art=="M_o_T" || $Wk_Art=="M_m_T") $query="Select * From alters_klassen_zk_".$data_a_db['S_Db'];
            else $query="Select * From alters_klassen";

            $data=dbBefehl($query);

            while($result=mysqli_fetch_assoc($data))
                if(($Alter>=$result["Von"])&&($Alter<=$result["Bis"])) $AlKl=$result["Klasse"];


            return $AlKl;


        }else{ //IF Masters == 1

            $Klasse = dbBefehl("SELECT * FROM alters_klassen_masters");

                while($dataKlassen = mysqli_fetch_assoc($Klasse))
                {

                    if($dataKlassen['Von'] <= $Alter && $dataKlassen['Bis'] >= $Alter)
                    {

                        if($dsatz["Geschlecht"]=="Männlich") {$AlKl=$dataKlassen["Klasse"]; }
                        else
                        if(($dataKlassen['Klasse']=='AK9') ||
                            ($dataKlassen['Klasse']=='AK10')) $AlKl="AK5";
                        else $AlKl=$dataKlassen['Klasse'];

                        //($dataKlassen['Klasse']=='AK6') || ($dataKlassen['Klasse']=='AK7') ||
                        //($dataKlassen['Klasse']=='AK8') ||
                    }
                    if($dataKlassen['Klasse']=='AK0' && $dataKlassen['Von'] > $Alter){

                        $query="Select * From alters_klassen_zk_".$data_a_db['S_Db'];
                        $data=dbBefehl($query);

                        while($result=mysqli_fetch_assoc($data))
                        if(($Alter>=$result["Von"])&&($Alter<=$result["Bis"])) $AlKl=$result["Klasse"];

                    }

                }
            // $AlKl = convertString($AlKl, $dsatz["Geschlecht"]);

            return $AlKl;
        }

    }  // if AlKlMain zu
}   //ENDE

function gw_kl_heber ($Klasse,$IdHeber,$stammdaten)
{
         global $data_a_db;

         $heber = dbBefehl("SELECT * FROM heber
                               WHERE heber.IdHeber='$IdHeber'
                               LIMIT 1") ;
         $dsatz = mysqli_fetch_assoc($heber);


$Geschlecht=$dsatz["Geschlecht"];
$Gewicht=$dsatz["Gewicht"];

if($stammdaten['Wk_Art']!='BL' && $stammdaten['Wk_Art']!= 'M_o_T' && $stammdaten['Wk_Art']!= 'M_m_T')
    if($stammdaten['Masters']==1) $Klasse="Aktive";

if($Klasse=='Junioren') $Klasse="Aktive";


   if ($Klasse!=''&& $Geschlecht!='')
   {

   $Ges = substr($Geschlecht, 0, 1);

   $Var=$Klasse . '_' . $Ges;

   $query="SELECT " . $Var . " FROM gewichtsklassen_".$data_a_db['S_Db'];

   $data=dbBefehl($query);

   $g=-1;
   while($result=mysqli_fetch_assoc($data)){
         if($result[$Var]!=1)
             if(($Gewicht<=$result[$Var])&&($Gewicht>$g)) $GwKl="-" . $result[$Var];

         if($result[$Var]==1)
             if($Gewicht>$g) $GwKl="+" . $g;

         $g=$result[$Var];
   }

   }else $GwKl='';



   return $GwKl;

}

function safe_AlKl_GwKl ($IdHeber,$stammdaten)
{
     global $data_a_db;

         $A_K=al_kl_heber_ohne_AlKlMain ($IdHeber,$stammdaten);

         $G_K=gw_kl_heber ($A_K,$IdHeber,$stammdaten);


         dbBefehl("UPDATE heber
                   SET AlKl= '$A_K', GwKl= '$G_K'
                   WHERE IdHeber ='$IdHeber'");

         $Data_Auswertung=dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db']." WHERE IdHeber='$IdHeber'");

         $num_Aus=mysqli_num_rows($Data_Auswertung);

         if($num_Aus==1){

                         dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                      SET Al_Kl= '$A_K', Gw_Kl= '$G_K'
                                      WHERE IdHeber ='$IdHeber'");


         }

}

function safe_GwKl_Norm_in_Auswertung ($IdHeber,$stammdaten)
{
	global $data_a_db;

	$A_K=$stammdaten['NormAlKl'];	//Vorgegebene GwKl von Stammdaten

	$G_K=gw_kl_heber ($A_K,$IdHeber,$stammdaten);

	$Data_Auswertung=dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db']." WHERE IdHeber='$IdHeber'");

	$num_Aus=mysqli_num_rows($Data_Auswertung);

	$dsatz = mysqli_fetch_assoc($Data_Auswertung);

	if($num_Aus==1 && $dsatz['Gw_Kl_Norm'] != $G_K){

		dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
				SET Gw_Kl_Norm= '$G_K'
				WHERE IdHeber ='$IdHeber'");

	}

}

function relativGewicht($Gewicht, $Geschlecht){

    $relativtabzug = dbBefehl("SELECT * FROM relativtabzug");

    $stop=0;

    while($d_r = mysqli_fetch_assoc($relativtabzug)){              //Relativ Gewicht bestimmen

        if($Geschlecht=="Männlich") $geschlecht="Maenner";
        if($Geschlecht=="Weiblich") $geschlecht="Frauen";

        if($Gewicht <= $d_r['Gewicht'] && $stop=="0"){

            if($d_r[$geschlecht]=="0") $relativ_abzug = $Gewicht;
            else $relativ_abzug = $d_r[$geschlecht];

            $stop=1;
        }
    }

    if ($stop == 0){
    	$ZusatzKg=$dsatz['Gewicht']-160;
    	$relativ_abzug = $d_r[$geschlecht];
    	if ($geschlecht == "Maenner"){
    		$relativ_abzug= 127.5 + floor($ZusatzKg)/2;
    	}
    	if ($geschlecht=="Frauen"){
    		$relativ_abzug= 65 + floor(floor($ZusatzKg)/2)/2;
    	}
    	//echo "hier",$relativ_abzug;
    	$stop=1;
    }

    return $relativ_abzug;

}

function randomGen($min, $quantity) {
    $max=$min+$quantity-1;
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function LosNrVerteiler($name) {
    $data_a_db['S_Db']=$name;

    $DataHoechsteLosNr = dbBefehl("SELECT LosNr FROM heber_".$data_a_db['S_Db']."
                           WHERE LosNr <> '0'
                           OR LosNr <> ''
                           OR LosNr IS NOT NULL
                           ORDER BY LosNr DESC
                           LIMIT 1");

    $ArrayHoechsteLosNr=mysqli_fetch_assoc($DataHoechsteLosNr);
    $HoechsteLosNr=$ArrayHoechsteLosNr['LosNr'];

    $DataAnzahlLeereLosNr = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db']."
                                      WHERE LosNr = '0'
                                      OR LosNr = ''
                                      OR LosNr IS NULL");

    $AnzahlLosNr=mysqli_num_rows($DataAnzahlLeereLosNr);

    $HoechsteLosNr++;

    $arrayLosNr=randomGen($HoechsteLosNr, $AnzahlLosNr);

    $i=0;
    while($result=mysqli_fetch_assoc($DataAnzahlLeereLosNr)){

       dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                 SET LosNr= '".$arrayLosNr[$i]."'
                 WHERE IdHeber ='".$result['IdHeber']."'");
       $i++;
    }

}

function ArrayWiegelistenGruppen(){


    global $data_a_db;

    $arrayGrp=array();
    $stringGrp='';


    $DataGruppen=dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber_wk_".$data_a_db['S_Db']."
                           WHERE heber_".$data_a_db['S_Db'].".IdHeber=heber_wk_".$data_a_db['S_Db'].".IdHeber
                           AND heber_wk_".$data_a_db['S_Db'].".Versuch='1'");

    while($result=mysqli_fetch_assoc($DataGruppen)){

           if($result['Reioeen']==0 || $result['Reioeen'] == NULL || $result['Stooeen']==0 || $result['Stooeen'] == NULL)
                 if(!in_array($result['Gruppe'],$arrayGrp,true))
                     $arrayGrp[]=$result['Gruppe'];

    }

    $i=0;

    foreach ($arrayGrp as $value){
        if($i==0)
           $stringGrp=$value;
        else
           $stringGrp=$stringGrp . ',' . $value;

        $i++;

    }
     return $stringGrp;

}


function ArrayBridgenErrorGruppe($num){


    global $data_a_db;

    $datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
    $stammdaten = mysqli_fetch_assoc($datenbank);

if($stammdaten['Wk_Art']!='BL'){

    $arrayGrp=array();
    $stringGrp='';


    $DataGruppen=dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']."
                           WHERE Bridge = '$num'");

    while($result=mysqli_fetch_assoc($DataGruppen))
         $arrayGrp[]=$result['Gruppen'];

    $i=0;

    foreach ($arrayGrp as $value){
        if($i==0)
           $stringGrp=$value;
        else
           $stringGrp=$stringGrp . ',' . $value;

        $i++;

    }


}else $stringGrp='1,2';           //Ende Else Bundesliga

  return $stringGrp;

}

function motAuswertungCol($stammdaten){

   if($stammdaten['Wk_Art']=='M_m_T')
      echo '<col width="60">';
   else
      echo '<col width="60">';
}

function HeberLoeschen($IdHeber){

    global $data_a_db;

    dbBefehl("DELETE FROM heber_".$data_a_db['S_Db']." WHERE IdHeber ='$IdHeber'");

    dbBefehl("DELETE FROM heber_wk_".$data_a_db['S_Db']." WHERE IdHeber ='$IdHeber'");

    $DataIdHeber=dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db']."
                           WHERE IdHeber = '$IdHeber'");

    if(mysqli_num_rows($DataIdHeber)== 1){

           dbBefehl("DELETE FROM auswertung_".$data_a_db['S_Db']."
                               WHERE IdHeber ='$IdHeber'");

    }

}

function convertString($inputString, $gender) {
    // var_dump($inputString, $gender);
    $ak_factor = (int)substr($inputString, 2); // Extract the number after "AK"
    $prefix = $gender == 'Männlich' ? 'M' : 'W'; // Determine the gender prefix
    return $prefix . (30 + $ak_factor*5); // Construct the output string
}



function al_kl_heber_ohne_AlKlMain ($IdHeber,$stammdaten)
{
         global $data_a_db;
         $AlKl = 'Aktive';


         $heber = dbBefehl("SELECT * FROM heber
                               WHERE heber.IdHeber='$IdHeber'
                               LIMIT 1");
         $dsatz = mysqli_fetch_assoc($heber);


  $Jahrgang=$dsatz['Jahrgang'];
  $Wk_Art=$stammdaten["Wk_Art"];

  $time=getdate();
  $Alter=$time['year']-$Jahrgang;

  if (!array_key_exists('Masters', $stammdaten)){
      $stammdaten['Masters']=0;
  }

if($stammdaten['Masters']==1){

     $Klasse = dbBefehl("SELECT * FROM alters_klassen_masters");


          while($dataKlassen = mysqli_fetch_assoc($Klasse))
          {


                 if($dataKlassen['Von'] <= $Alter && $dataKlassen['Bis'] >= $Alter)
                 {

                        if($dsatz["Geschlecht"]=="Männlich") {$AlKl=$dataKlassen["Klasse"];}
                        else
                           if(($dataKlassen['Klasse']=='AK9') || ($dataKlassen['Klasse']=='AK10')) $AlKl="AK5";
                           else $AlKl=$dataKlassen['Klasse'];

                           //($dataKlassen['Klasse']=='AK6') || ($dataKlassen['Klasse']=='AK7') ||
                           //($dataKlassen['Klasse']=='AK8') ||
                  }

                  if($dataKlassen['Klasse']=='AK0' && $dataKlassen['Von'] > $Alter){

                  	$query="Select * From alters_klassen_zk_".$data_a_db['S_Db'];
                  	$data=dbBefehl($query);

                  	while($result=mysqli_fetch_assoc($data))
                  		if(($Alter>=$result["Von"])&&($Alter<=$result["Bis"])) $AlKl=$result["Klasse"];

                  }

          }
    //Convert e.g. AK0 into M30/W30:
    // $AlKl=convertString($AlKl, $dsatz["Geschlecht"]);
    
}else{
    

    if($Wk_Art=="ZK" || $Wk_Art=="M_o_T" || $Wk_Art=="M_m_T") $query="Select * From alters_klassen_zk_".$data_a_db['S_Db'];
    else $query="Select * From alters_klassen";

    $data=dbBefehl($query);

    while($result=mysqli_fetch_assoc($data))
        if(($Alter>=$result["Von"])&&($Alter<=$result["Bis"])) $AlKl=$result["Klasse"];

}

     return $AlKl;


}

function IdStaatzuStaat ($IdStaat)
{

global $data_a_db;

$DataStaat=dbBefehl("SELECT * FROM staaten WHERE IdStaat='$IdStaat'");
$DStaat=mysqli_fetch_assoc($DataStaat);

return $DStaat['Staat'];

}


function SinclairFaktor($dsatz,$stammdaten) {

$time=getdate();

$data_Sin_Faktoren = dbBefehl("SELECT * FROM sinclair_faktoren");
$dSin_Faktoren = mysqli_fetch_assoc($data_Sin_Faktoren);

$Sin_Koeffizient_M=$dSin_Faktoren['Sin_Koef_M'];
$Sin_Koeffizient_W=$dSin_Faktoren['Sin_Koef_W'];

$Sin_Gewicht_M=$dSin_Faktoren['Sin_Gew_M'];
$Sin_Gewicht_W=$dSin_Faktoren['Sin_Gew_W'];

$A_Sinclair=$time['year']-$dsatz['Jahrgang'];

if($dsatz['Geschlecht']=='Männlich'){

  if($dsatz['Gewicht']>1.0){

  	if($dsatz['Gewicht']<$Sin_Gewicht_M){

  		$SWGw= 10**($Sin_Koeffizient_M*(log10($dsatz['Gewicht']/$Sin_Gewicht_M))**2);                 //** equals to the power of

         $SWGw=round($SWGw, 4);

     }else $SWGw=1;
  }else{
    $Gw=32.0;
    if($Gw<$Sin_Gewicht_M){

        $SWGw= 10**($Sin_Koeffizient_M*(log10($Gw/$Sin_Gewicht_M))**2);                 //** equals to the power of

        $SWGw=round($SWGw, 4);

    }else $SWGw=1;
  }

}else{	//Weiblich

  if($dsatz['Gewicht']>1.0){

  	if($dsatz['Gewicht']<$Sin_Gewicht_W){

  		$SWGw= 10**($Sin_Koeffizient_W*log10($dsatz['Gewicht']/$Sin_Gewicht_W)**2);

         $SWGw=round($SWGw, 4);

     }else $SWGw=1;
  }else{

    $Gw=28.0;

    if($Gw<$Sin_Gewicht_W){

        $SWGw= 10**($Sin_Koeffizient_W*log10($Gw/$Sin_Gewicht_W)**2);

       $SWGw=round($SWGw, 4);

   }else $SWGw=1;
  }
}


if($stammdaten['Wk_Art'] == "BL"){
  if ($stammdaten['auswertung_art']==2){
    $time=getdate();
    $Alter=$time['year']-$dsatz['Jahrgang'];
    $data_Scale_Faktoren = dbBefehl("SELECT * FROM skalierungsfaktoren WHERE age='$Alter'");
    $data_scale = mysqli_fetch_assoc($data_Scale_Faktoren);


    $data_Scale_Faktoren_all = dbBefehl("SELECT * FROM skalierungsfaktoren WHERE age='1'");
    $data_scale_all = mysqli_fetch_assoc($data_Scale_Faktoren_all);

    if($dsatz['Geschlecht'] == 'Männlich'){
      $scale_faktor = $data_scale['maennlich'] * $data_scale_all['maennlich'];
    }else{
      $scale_faktor = $data_scale['weiblich'] * $data_scale_all['weiblich'];
    }
    $SWGw = $SWGw * $scale_faktor;
  }
}

return $SWGw;

}

function MaloneMeltzerFaktor($dsatz,$stammdaten) {

	$time=getdate();

	$A_Sinclair=$time['year']-$dsatz['Jahrgang'];

	if($stammdaten['Masters']==1){
		$db_Sin_Alt_Wert = dbBefehl("SELECT * FROM sinclair_alterstabellle WHERE Age='$A_Sinclair'");
		$dSinAltWert = mysqli_fetch_assoc($db_Sin_Alt_Wert);

        if($dsatz['Geschlecht']=='Männlich'){
        if($dSinAltWert['Al_Sin_Werte']==NULL) $Sin_alters_wert=1;
            else $Sin_alters_wert=$dSinAltWert['Al_Sin_Werte'];
        }else{ #Weiblich:
        if($dSinAltWert['Al_Sin_Werte_W']==NULL) $Sin_alters_wert=1;
        else $Sin_alters_wert=$dSinAltWert['Al_Sin_Werte_W'];
        }

        echo "data: ", $A_Sinclair, " ", $Sin_alters_wert, " " , $dsatz['Name'], $dSinAltWert['Al_Sin_Werte'], $dSinAltWert['Al_Sin_Werte_W'] . '<br>';

	}else $Sin_alters_wert=1;

	$SP_Faktor=$Sin_alters_wert;

	return $SP_Faktor;

}

function Uhrzeit($timestamp) {

         if($timestamp==0)       $date="00:00:00";
         else                    $date=date('H:i:s', $timestamp);

         return $date;
}

function TimestampFromDateTime($date, $time) {

         $date = '' . $date . ' ' . $time;
         $date = date_create($date);
         $timestamp= date_timestamp_get($date);

         return $timestamp;
}

function mysqlDateToDate($date) {

         $date = strtotime( $date );
         $date=date('d.m.y', $date);

         return $date;
}

function OrderByZKAlKlundGeschlechtString($stammdaten) {

 global $data_a_db;

      if($stammdaten['Rel_Sin_AlKl']==1){

         $Klasse = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']." ORDER BY Von ASC");

         while($dataKlassen = mysqli_fetch_assoc($Klasse))
         {
                 if($query_Klassen == '') $query_Klassen="'" . $dataKlassen['Klasse'] . "'";
                 else $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassen['Klasse'] . "'";
         }

         if($stammdaten['Masters']==1){
             $KlasseMasters = dbBefehl("SELECT Klasse FROM alters_klassen_masters ORDER BY Von ASC");

             while($dataKlassenMasters = mysqli_fetch_assoc($KlasseMasters))
             {
                 $query_Klassen=$query_Klassen . ', ' . "'" . $dataKlassenMasters['Klasse'] . "'";
             }
         }

         $StringOrderAlKl="FIELD(Al_Kl, " . $query_Klassen . "), Geschlecht ASC,";
      }else
         $StringOrderAlKl="";

      return $StringOrderAlKl;


}

function KampfrichterPadResetOrder($bridge){

    dbBefehl("UPDATE tmp_kr_check_$bridge
                 SET Re1='1', Re2='1', Re3='1'");

    dbBefehl("UPDATE tmp_absignal_$bridge
    		SET Kr1= '0',Kr2= '0',Kr3= '0'
    		WHERE Id='1'
    		");

}
function KampfrichterSpeicherLoeschenfuerAktuellerHeber($bridge, $wk_name, $Art, $Id, $V){

    for($i=1;$i<4;$i++){
         $G_Art[$i]='G_' . $Art . '_' . $i;
         $Time_Art[$i]='Time_' . $Art . '_' . $i;
    }

    dbBefehl("UPDATE heber_wk_$wk_name
                     SET $G_Art[1]=NULL, $Time_Art[1]=NULL, $G_Art[2]=NULL, $Time_Art[2]=NULL,
                         $G_Art[3]=NULL, $Time_Art[3]=NULL
                     WHERE IdHeber='$Id'
                     AND Versuch='$V'");


   dbBefehl("UPDATE tmp_absignal_$bridge
             		SET Kr1= '0',Kr2= '0',Kr3= '0'
                    WHERE Id='1'
                    ");

}

function KampfrichterPadResetAusfuehrung($bridge,$NumPad, $wk_name, $Art){


                 $NowT = dbBefehl("SELECT * FROM tmp_gerd_$bridge");
                 $dNow = mysqli_fetch_assoc($NowT);

                 dbBefehl("UPDATE tmp_kr_check_$bridge
                                 SET Re$NumPad='0', K$NumPad='0'");

                 $_SESSION['B' . $NumPad]=0;
                 $G_Art='G_' . $Art . '_' . $NumPad;
                 $Time_Art='Time_' . $Art . '_' . $NumPad;

                 if($NumPad==1) $NumPad='';      //Da ich leider die $Session variablen für Kr1 Pad ohne Zahl definiert hab

                 $Id=$_SESSION['KrId' . $NumPad];
                 $V=$_SESSION['KrV' . $NumPad];

                 dbBefehl("UPDATE heber_wk_$wk_name
                                 SET $G_Art=NULL, $Time_Art=NULL
                                 WHERE IdHeber='$Id'
                                 AND Versuch='$V'");

                 $_SESSION['KrId' . $NumPad]=$dNow['IdHeber'];
                 $_SESSION['KrV' . $NumPad]=$dNow['V'];
                 $_SESSION['KrArt' . $NumPad]=$dNow['Art'];
                 $_SESSION['KrHGw' . $NumPad]=$dNow['HGw'];

                 if($NumPad=='') $NumPad=1;
                 echo"
           			<script>
             			setTimeout(function(){
                 			location = 'kampfrichter" . $NumPad. ".php'
             			},0)
           			</script>
         		";

}

function einKiloSteigerungProVersuch($WkName,$IdHeber,$Versuch,$Hgw,$Art){

    $Hgw++;

    if($Versuch==1){
         $HgwP=$Hgw+1;

                         dbBefehl("UPDATE heber_wk_$WkName
                                      SET $Art= '$Hgw'
                                      WHERE IdHeber='$IdHeber'
                                      AND Versuch='2'
                                      ");

                         dbBefehl("UPDATE heber_wk_$WkName
                                      SET $Art= '$HgwP'
                                      WHERE IdHeber='$IdHeber'
                                      AND Versuch='3'
                                      ");
    }
    if($Versuch==2){

                         dbBefehl("UPDATE heber_wk_$WkName
                                      SET $Art= '$Hgw'
                                      WHERE IdHeber='$IdHeber'
                                      AND Versuch='3'
                                      ");
    }

}

function ReturnArrayGemeldeteVereine(){

	global $data_a_db;

	$query="SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
								WHERE heber_".$data_a_db['S_Db'].".IdHeber= heber.IdHeber
							   	AND heber.IdVerein = verein.IdVerein
                                Order By verein.Verein";

	$dataHeberfuerVereine=dbBefehl($query);
	$ArrayVorhandeneVereine=array();

	while($dataFuerVereine = mysqli_fetch_assoc($dataHeberfuerVereine)){
		if(!in_array($dataFuerVereine['Verein'], $ArrayVorhandeneVereine))
			$ArrayVorhandeneVereine[]=$dataFuerVereine['Verein'];

	}

	return $ArrayVorhandeneVereine;

}

function safeInAuswertungMk($IdHeber, $Art, $Pt){
	global $data_a_db;

	$query="SELECT * FROM auswertung_mk_".$data_a_db['S_Db']."
				WHERE IdHeber= '$IdHeber'";

	$dbHeber=dbBefehl($query);

	$CheckLeer=mysqli_num_rows($dbHeber);

	if($CheckLeer==0){
		dbBefehl("INSERT INTO auswertung_mk_".$data_a_db['S_Db']." (IdHeber)
								Values ('$IdHeber')");

		$dbHeber=dbBefehl($query);
	}

	$dHeber = mysqli_fetch_assoc($dbHeber);

	if($dHeber["Pt_" . $Art] != $Pt){
		dbBefehl("UPDATE auswertung_mk_".$data_a_db['S_Db']."
				SET Pt_$Art= '$Pt'
				WHERE IdHeber ='$IdHeber'
				");
	}

}

function reload_uebersicht_mk(){
	global $data_a_db;


	$DBtmp_uebersicht_mk_reload = dbBefehl("SELECT * FROM tmp_uebersichtmk_reload");
	$dataReload = mysqli_fetch_assoc($DBtmp_uebersicht_mk_reload);

	$IdReload=$dataReload["IdReload"];


	if($IdReload==100) 	$IdReloadPlus=0;
	else				$IdReloadPlus=$IdReload+1;

	dbBefehl("UPDATE tmp_uebersichtmk_reload
			SET IdReload= '$IdReloadPlus'
			");

}

function clearTmpLetzterHeber($bridge){
	global $data_a_db;

	dbBefehl("UPDATE tmp_letzter_heber_$bridge
			SET IdHeber= '-1'
			");
}

function returnNameVerein($IdVerein){
    global $data_a_db;

    $DataVerein = dbBefehl("SELECT * FROM verein WHERE IdVerein = $IdVerein");
    $DVerein = mysqli_fetch_assoc($DataVerein);
    return  $DVerein['Verein'];
}

function returnBundesligaAuswahl($IdHeber){
	global $data_a_db;

	$Bundesliga_Data = dbBefehl("SELECT Bundesliga FROM heber WHERE IdHeber = $IdHeber");
	$Bundesliga_Data_Auswahl = mysqli_fetch_assoc($Bundesliga_Data);
	return  $Bundesliga_Data_Auswahl['Bundesliga'];
}

function groesser($x1,$x2){

    $return=0;

    if($x1!=$x2){
        if($x1>$x2) $return=1;
        else        $return=2;
    }

    return $return;
}

function check_if_online_id_exists($IdHeber){
    global $data_a_db;

    $heberData = dbBefehl("SELECT IdHeber FROM heber WHERE Id_Online_Db = $IdHeber");


    return mysqli_num_rows($heberData);
}

function heber_in_wk_tabellen($IdHeber){

    global $data_a_db;

    $Wk_Nummer=$data_a_db['S_Db'];

    $heberData = dbBefehl("SELECT IdHeber FROM heber_$Wk_Nummer WHERE IdHeber = $IdHeber");

    if(mysqli_num_rows($heberData)==0){

        dbBefehl("INSERT INTO heber_$Wk_Nummer (IdHeber)
                                      Values ('" . $IdHeber . "')");

        dbBefehl("INSERT INTO heber_wk_$Wk_Nummer (IdHeber, Versuch)
                                      Values ('" . $IdHeber . "', '1')");

        dbBefehl("INSERT INTO heber_wk_$Wk_Nummer (IdHeber, Versuch)
                                      Values ('" . $IdHeber . "', '2')");

        dbBefehl("INSERT INTO heber_wk_$Wk_Nummer (IdHeber, Versuch)
                                      Values ('" . $IdHeber . "', '3')");
    }
}

function get_id_heber_from_id_online($OnlineId){
    $heberData = dbBefehl("SELECT IdHeber FROM heber WHERE Id_Online_Db = $OnlineId");
    $heber = mysqli_fetch_assoc($heberData);
    return  $heber['IdHeber'];
}

function isInteger($input){
    return(ctype_digit(strval($input)));
}

function ReloadVariableWkLeiterErhoehung($bridge){

    global $data_a_db;

    $Wk_Nummer=$data_a_db['S_Db'];

    $Reload_Variable=0;
    $DataReload = dbBefehl("SELECT * FROM wk_reload_$Wk_Nummer");
    $ReloadIteration = mysqli_fetch_assoc($DataReload);

    if($bridge==1){
        $Reload_Variable=$ReloadIteration['Bridge1']+1;

        dbBefehl("UPDATE wk_reload_$Wk_Nummer
                                  SET Bridge1= '$Reload_Variable'
                                  WHERE Id_Iteration ='1'
                                  ");
    }else{
        $Reload_Variable=$ReloadIteration['Bridge2']+1;

        dbBefehl("UPDATE wk_reload_$Wk_Nummer
                                  SET Bridge2= '$Reload_Variable'
                                  WHERE Id_Iteration ='1'
                                  ");
    }


}
