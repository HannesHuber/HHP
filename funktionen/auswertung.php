<?php
@set_time_limit(0);	//Damit Script so lange ausf�hren darf wie es will


include 'auswertung_funktionen.php';



$time=getdate();
//$Verein = dbBefehl("SELECT * FROM verein");	//Kann Wahrscheinlich weg
if ($stammdaten['Wk_Art']=='BL'){
         $Data_Bl_Verein = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
         $Bl_Verein=mysqli_fetch_assoc($Data_Bl_Verein);

         $arrayVereinR=array();
         $arrayVereinS=array();
         $arrayVereinRuS=array();
         $arrayVerein1u2=array();

         $auswerte_Gruppe=0;
}

$zaehler=0;



if($auswerte_Gruppe==0)
	$dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);	//F�r �ber alle Gruppen
else
	$dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']." WHERE Gruppen='$auswerte_Gruppe' ");		//Damit nur �ber relevante Grp gegangen wird z.B. f�r �bersicht


//----------------------------------------------------------------------------------------------

while($DataGruppen= mysqli_fetch_assoc($dbGruppen))
{
$Gruppe_Auswertung=$DataGruppen['Gruppen'];

if ($stammdaten['Wk_Art']!='ZK')
   $A_Kl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);
elseif($stammdaten['Masters']==0)
   $A_Kl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);
else
   $A_Kl = dbBefehl("SELECT * FROM alters_klassen_masters");

$time=getdate();


while($dA_Kl = mysqli_fetch_assoc($A_Kl))              // Definition der Jahrg�nge
{


if($stammdaten['Wk_Art'] != "ZK" && $stammdaten['Wk_Art'] != "BL")
{

$heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                      WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                      AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                      AND heber.AlKl= '".$dA_Kl['Klasse']."'
					  AND heber.IdVerein = verein.IdVerein
					  AND heber_".$data_a_db['S_Db'].".Gruppe= '$Gruppe_Auswertung'
                      ORDER BY heber.IdHeber ASC, heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                      ");

}else{

$heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                      WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                      AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                      AND heber.AlKl= '$dA_Kl[Klasse]'
					  AND heber.IdVerein = verein.IdVerein
					  AND heber_".$data_a_db['S_Db'].".Gruppe= '$Gruppe_Auswertung'
                      ORDER BY heber.IdHeber ASC, heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                      ");
}

$i = 0;
$count=1;
$c_geschlecht=0;
$IdHeber=0;
$xxx=1;
$R_N=0;
$S_N=0;
$R_B=0;
$S_B=0;


while($dsatz = mysqli_fetch_assoc($heber))                                              //Innere Schleife
{

$i++;

if($dsatz['time_Reissen'] == NULL) $dsatz['time_Reissen'] =0;	//F�r Korrekte if Abfrage beim Heber in auswertung aktualisieren
if($dsatz['time_Stossen'] == NULL) $dsatz['time_Stossen'] =0;

$AlKl=al_kl_heber ($dsatz['IdHeber'],$stammdaten);
$GwKl=gw_kl_heber ($AlKl,$dsatz['IdHeber'],$stammdaten);

$Alter=$time['year']-$dsatz['Jahrgang'];                                                                                                              //Safe in auswertung_ ...

$auswertung = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db']." WHERE IdHeber='$dsatz[IdHeber]'");
$dauswertung = mysqli_fetch_assoc($auswertung);

$up_a = 0;

$AnzahlReihen=mysqli_num_rows($auswertung);

if($AnzahlReihen==1) $up_a = 1;



if($up_a == "0")
{


         if($stammdaten['Wk_Art'] == "M_m_T")
         {

                 dbBefehl("INSERT INTO auswertung_".$data_a_db['S_Db']." (IdHeber,Al_Kl, Gw_Kl, K_Gewicht, R_1, S_1, R_1_G, S_1_G, R_1_Ver, S_1_Ver, R_1_Te, S_1_Te, R_1_t, S_1_t)
                      Values ('".$dsatz['IdHeber']."',
                              '$AlKl',
                              '$GwKl',
                              '".$dsatz['Gewicht']."',
                              '".$dsatz['Reissen']."',
                              '".$dsatz['Stossen']."',
                              '".$dsatz['Gueltig_Reissen']."',
                              '".$dsatz['Gueltig_Stossen']."',
                              '".$dsatz['Reissen_Verzicht']."',
               			          '".$dsatz['Stossen_Verzicht']."',
                              '".$dsatz['Technik_Reissen']."',
                              '".$dsatz['Technik_Stossen']."',
                              '".$dsatz['time_Reissen']."',
                              '".$dsatz['time_Stossen']."')");

         }elseif($stammdaten['Wk_Art'] == "M_o_T"){

                 dbBefehl("INSERT INTO auswertung_".$data_a_db['S_Db']." (IdHeber,Al_Kl, Gw_Kl, K_Gewicht, R_1, S_1, R_1_G, S_1_G, R_1_Ver, S_1_Ver, R_1_t, S_1_t)
                      Values ('".$dsatz['IdHeber']."',
                              '$AlKl',
                              '$GwKl',
                              '".$dsatz['Gewicht']."',
                              '".$dsatz['Reissen']."',
                              '".$dsatz['Stossen']."',
                              '".$dsatz['Gueltig_Reissen']."',
                              '".$dsatz['Gueltig_Stossen']."',
                              '".$dsatz['Reissen_Verzicht']."',
               			          '".$dsatz['Stossen_Verzicht']."',
                              '".$dsatz['time_Reissen']."',
                              '".$dsatz['time_Stossen']."')");

         }elseif($stammdaten['Wk_Art'] == "ZK"){

                 $zk_query="INSERT INTO auswertung_".$data_a_db['S_Db']." (IdHeber,Al_Kl,Gw_Kl, K_Gewicht, R_1, S_1, R_1_G, S_1_G, R_1_Ver, S_1_Ver, R_1_t, S_1_t)
                      Values ('".$dsatz['IdHeber']."',
                              '$AlKl',
                              '$GwKl',
                              '".$dsatz['Gewicht']."',
                              '".$dsatz['Reissen']."',
                              '".$dsatz['Stossen']."',
                              '".$dsatz['Gueltig_Reissen']."',
                              '".$dsatz['Gueltig_Stossen']."',
                              '".$dsatz['Reissen_Verzicht']."',
               			          '".$dsatz['Stossen_Verzicht']."',
                              '".$dsatz['time_Reissen']."',
                              '".$dsatz['time_Stossen']."')";

                 dbBefehl($zk_query);

                 if($dsatz['GesGrp']==1){

                         $A_K_GesGrp=$stammdaten['GesGrpAlKl'];
                         $G_K_GesGrp=gw_kl_heber ($A_K_GesGrp,$dsatz['IdHeber'],$stammdaten);

                         dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                         SET Al_Kl_GesGrp= '$A_K_GesGrp', Gw_Kl_GesGrp= '$G_K_GesGrp'
                                         WHERE IdHeber ='".$dsatz['IdHeber']."'");

                 }

                 if($stammdaten['MitNorm'] == 1){
                 	safe_GwKl_Norm_in_Auswertung ($dsatz['IdHeber'],$stammdaten);
                 }

         }else{


                 $zk_query="INSERT INTO auswertung_".$data_a_db['S_Db']." (IdHeber,Al_Kl,Gw_Kl, K_Gewicht, R_1, S_1, R_1_G, S_1_G, R_1_Ver, S_1_Ver)
                      Values ('".$dsatz['IdHeber']."',
                              '$AlKl',
                              '$GwKl',
                              '".$dsatz['Gewicht']."',
                              '".$dsatz['Reissen']."',
                              '".$dsatz['Stossen']."',
                              '".$dsatz['Gueltig_Reissen']."',
                              '".$dsatz['Gueltig_Stossen']."',
                              '".$dsatz['Reissen_Verzicht']."',
               			          '".$dsatz['Stossen_Verzicht']."')";

                 dbBefehl($zk_query);



                 if($dsatz['GesGrp']==1){

                         $A_K_GesGrp=$stammdaten['GesGrpAlKl'];
                         $G_K_GesGrp=gw_kl_heber ($A_K_GesGrp,$dsatz['IdHeber'],$stammdaten);

                         dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                         SET Al_Kl_GesGrp= '$A_K_GesGrp', Gw_Kl_GesGrp= '$G_K_GesGrp'
                                         WHERE IdHeber ='".$dsatz['IdHeber']."'");

                 }


         }


}else{		//Up_a=0 Ende

	//Damit if Abfrage f�r Update richtig funktioniert: Denkt sonst 0!=NULL

	if($dsatz['Stossen_Verzicht']===NULL) $dsatz['Stossen_Verzicht']=0;
	if($dsatz['Reissen_Verzicht']===NULL) $dsatz['Reissen_Verzicht']=0;
	if($dsatz['Reissen']===NULL) $dsatz['Reissen']=0;
	if($dsatz['Stossen']===NULL) $dsatz['Stossen']=0;


         if($stammdaten['Wk_Art'] == "M_m_T")
         {

                 $zahl =$dsatz['Versuch'];

                 $R_G="R_" . $zahl . "_G";
                 $S_G="S_" . $zahl . "_G";

                 $R_Ver="R_" . $zahl . "_Ver";
                 $S_Ver="S_" . $zahl . "_Ver";

                 $R_T="R_" . $zahl . "_Te";
                 $S_T="S_" . $zahl . "_Te";

                 $R_t="R_" . $zahl . "_t";
                 $S_t="S_" . $zahl . "_t";

                 if($dsatz['Technik_Reissen']===NULL) $dsatz['Technik_Reissen']=0;
                 if($dsatz['Technik_Stossen']===NULL) $dsatz['Technik_Stossen']=0;

                 if(($dauswertung['R_' . $zahl]!=$dsatz['Reissen'])||($dauswertung['S_' . $zahl]!=$dsatz['Stossen'])||($dauswertung[$R_G]!=$dsatz['Gueltig_Reissen'])
                     ||($dauswertung[$S_G]!=$dsatz['Gueltig_Stossen'])||($dauswertung['K_Gewicht']!=$dsatz['Gewicht'])||($dauswertung[$R_T]!=$dsatz['Technik_Reissen'])
                     ||($dauswertung[$S_T]!=$dsatz['Technik_Stossen'])||($dauswertung['Al_Kl']!=$dsatz['AlKl'])||($dauswertung['Gw_Kl']!=$dsatz['GwKl'])
                 	 ||($dauswertung[$R_t]!=$dsatz['time_Reissen'])||($dauswertung[$S_t]!=$dsatz['time_Stossen'])
                 	 ||($dauswertung[$R_Ver]!=$dsatz['Reissen_Verzicht'])||($dauswertung[$S_Ver]!=$dsatz['Stossen_Verzicht'])){

                    dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                SET R_$zahl= '".$dsatz['Reissen']."', S_$zahl= '".$dsatz['Stossen']."', $R_G= '".$dsatz['Gueltig_Reissen']."', $S_G= '".$dsatz['Gueltig_Stossen']."',
                                K_Gewicht='".$dsatz['Gewicht']."', $R_T= '".$dsatz['Technik_Reissen']."', $S_T= '".$dsatz['Technik_Stossen']."',Al_Kl='$AlKl',
                    		    $R_t='".$dsatz['time_Reissen']."', $S_t='".$dsatz['time_Stossen']."', $R_Ver= '".$dsatz['Reissen_Verzicht']."', $S_Ver= '".$dsatz['Stossen_Verzicht']."'
                                WHERE IdHeber ='".$dsatz['IdHeber']."'
                                ");
                 }

         }elseif($stammdaten['Wk_Art'] == "M_o_T"){

                 $zahl =$dsatz['Versuch'];

                 $R_G="R_" . $zahl . "_G";
                 $S_G="S_" . $zahl . "_G";

                 $R_Ver="R_" . $zahl . "_Ver";
                 $S_Ver="S_" . $zahl . "_Ver";

                 $R_t="R_" . $zahl . "_t";
                 $S_t="S_" . $zahl . "_t";


                 if(($dauswertung['R_' . $zahl]!=$dsatz['Reissen'])||($dauswertung['S_' . $zahl]!=$dsatz['Stossen'])||($dauswertung[$R_G]!=$dsatz['Gueltig_Reissen'])
                     ||($dauswertung[$S_G]!=$dsatz['Gueltig_Stossen'])||($dauswertung['K_Gewicht']!=$dsatz['Gewicht'])||($dauswertung['Al_Kl']!=$dsatz['AlKl'])
                 		||($dauswertung['Gw_Kl']!=$dsatz['GwKl'])||($dauswertung[$R_t]!=$dsatz['time_Reissen'])||($dauswertung[$S_t]!=$dsatz['time_Stossen'])
                 		||($dauswertung[$R_Ver]!=$dsatz['Reissen_Verzicht'])||($dauswertung[$S_Ver]!=$dsatz['Stossen_Verzicht'])){

                    dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                 SET R_$zahl= '".$dsatz['Reissen']."', S_$zahl= '".$dsatz['Stossen']."', $R_G= '".$dsatz['Gueltig_Reissen']."', $S_G= '".$dsatz['Gueltig_Stossen']."',
                                     K_Gewicht= '".$dsatz['Gewicht']."',Al_Kl='$AlKl', $R_t='".$dsatz['time_Reissen']."', $S_t='".$dsatz['time_Stossen']."',
                    				$R_Ver= '".$dsatz['Reissen_Verzicht']."', $S_Ver= '".$dsatz['Stossen_Verzicht']."'
                                 WHERE IdHeber ='".$dsatz['IdHeber']."'
                                 ");
                 }

         }elseif($stammdaten['Wk_Art'] == "ZK"){


                 $zahl =$dsatz['Versuch'];

                 $R_G="R_" . $zahl . "_G";
                 $S_G="S_" . $zahl . "_G";

                 $R_Ver="R_" . $zahl . "_Ver";
                 $S_Ver="S_" . $zahl . "_Ver";

                 $R_t="R_" . $zahl . "_t";
                 $S_t="S_" . $zahl . "_t";





                 if(($dauswertung['R_' . $zahl]!=$dsatz['Reissen'])||($dauswertung['S_' . $zahl]!=$dsatz['Stossen'])||($dauswertung[$R_G]!=$dsatz['Gueltig_Reissen'])
                     ||($dauswertung[$S_G]!=$dsatz['Gueltig_Stossen'])||($dauswertung['K_Gewicht']!=$dsatz['Gewicht'])||($dauswertung['Al_Kl']!=$dsatz['AlKl'])
                 		||($dauswertung['Gw_Kl']!=$dsatz['GwKl'])||($dauswertung[$R_t]!=$dsatz['time_Reissen'])||($dauswertung[$S_t]!=$dsatz['time_Stossen'])
                 		||($dauswertung[$R_Ver]!=$dsatz['Reissen_Verzicht'])||($dauswertung[$S_Ver]!=$dsatz['Stossen_Verzicht'])){

                    dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                 SET R_$zahl= '".$dsatz['Reissen']."', S_$zahl= '".$dsatz['Stossen']."', $R_G= '".$dsatz['Gueltig_Reissen']."', $S_G= '".$dsatz['Gueltig_Stossen']."',
                                     $R_t= '".$dsatz['time_Reissen']."', $S_t= '".$dsatz['time_Stossen']."', K_Gewicht= '".$dsatz['Gewicht']."',Al_Kl='$AlKl',Gw_Kl=$GwKl,
                    					$R_Ver= '".$dsatz['Reissen_Verzicht']."', $S_Ver= '".$dsatz['Stossen_Verzicht']."'
                                 WHERE IdHeber ='".$dsatz['IdHeber']."'
                                 ");

                 }




         }else{

                 $zahl =$dsatz['Versuch'];

                 $R_G="R_" . $zahl . "_G";
                 $S_G="S_" . $zahl . "_G";

                 $R_Ver="R_" . $zahl . "_Ver";
                 $S_Ver="S_" . $zahl . "_Ver";


                 if(($dauswertung['R_' . $zahl]!=$dsatz['Reissen'])||($dauswertung['S_' . $zahl]!=$dsatz['Stossen'])||($dauswertung[$R_G]!=$dsatz['Gueltig_Reissen'])
                     ||($dauswertung[$S_G]!=$dsatz['Gueltig_Stossen'])||($dauswertung['K_Gewicht']!=$dsatz['Gewicht'])||($dauswertung['Al_Kl']!=$dsatz['AlKl'])
                 		||($dauswertung['Gw_Kl']!=$dsatz['GwKl'])
                 		||($dauswertung[$R_Ver]!=$dsatz['Reissen_Verzicht'])||($dauswertung[$S_Ver]!=$dsatz['Stossen_Verzicht'])){

                    dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                 SET R_$zahl= '".$dsatz['Reissen']."', S_$zahl= '".$dsatz['Stossen']."', $R_G= '".$dsatz['Gueltig_Reissen']."', $S_G= '".$dsatz['Gueltig_Stossen']."',
                    		K_Gewicht= '".$dsatz['Gewicht']."',Al_Kl='$AlKl',Gw_Kl=$GwKl, $R_Ver= '".$dsatz['Reissen_Verzicht']."', $S_Ver= '".$dsatz['Stossen_Verzicht']."'
                                 WHERE IdHeber ='".$dsatz['IdHeber']."'
                                 ");
                 }


         }


}





if($stammdaten['Wk_Art'] == "M_m_T")
{
  if($xxx <= "3")
  {
         if($dsatz['Gueltig_Reissen']== "Ja")
         {
                 $R_N=(($dsatz['Reissen']*50)/$dsatz['Gewicht'])+ $dsatz['Technik_Reissen'] * 10;
                 $R_Z= $dsatz['Reissen'];
         }

         if($dsatz['Gueltig_Stossen']== "Ja")
         {
                 $S_N=(($dsatz['Stossen']*50)/$dsatz['Gewicht'])+ $dsatz['Technik_Stossen'] * 10;
                 $S_Z= $dsatz['Stossen'];
         }
  }

         if($R_N > $R_B)
         {
                 $R_B=$R_N;
         }

         if($S_N > $S_B)
         {
                 $S_B=$S_N;
         }

  if($xxx == "3")
  {

  //  if($R_B!=0 && $S_B!=0)   $Z_K = $R_B + $S_B;
  //  else                     $Z_K = 0;

    $Z_K = $R_B + $S_B;

    if($R_B!=0 && $S_B!=0)   $ZK_Kg = $R_Z + $S_Z;
    else                     $ZK_Kg = 0;


    $Z_K=round($Z_K, 1);
    $R_B=round($R_B, 1);
    $S_B=round($S_B, 1);



    if($dauswertung['Z_K']!= $Z_K || $dauswertung['R_B']!= $R_B || $dauswertung['S_B']!=$S_B || $dauswertung['ZK_Kg']!=$ZK_Kg){

                 dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                              SET Z_K= '$Z_K', R_B= '$R_B', S_B= '$S_B', ZK_Kg= '$ZK_Kg'
                              WHERE IdHeber ='".$dsatz['IdHeber']."'
                              ");
             }

  $Z_K=0;
  $R_B=0;
  $S_B=0;
  $R_N=0;
  $S_N=0;
  $xxx=0;

  $ZK_Kg=0;
  $R_Z=0;
  $S_Z=0;

  }



}else{       //Ende M_m_T


$relativtabzug = dbBefehl("SELECT * FROM relativtabzug");



$stop=0;
while($d_r = mysqli_fetch_assoc($relativtabzug)){              //Relativ Gewicht bestimmen

   if($dsatz['Geschlecht']=="Männlich") $geschlecht="Maenner";
   if($dsatz['Geschlecht']=="Weiblich") $geschlecht="Frauen";

   if($dsatz['Gewicht'] <= $d_r['Gewicht'] && $stop=="0"){

         if($d_r[$geschlecht]=="0") $relativ_abzug = $dsatz['Gewicht'];
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

if($xxx=="1"){
    $R_timestamp=0;
    $S_timestamp=0;
}

  if($xxx <= "3")
  {
         if($dsatz['Gueltig_Reissen']== "Ja")
         {
                 $R_Z= $dsatz['Reissen'];

                 if($stammdaten['Wk_Art'] != "BL"){
                     $R_timestamp=$dsatz['time_Reissen'];
                 }
         }

         if($dsatz['Gueltig_Stossen']== "Ja")
         {
                 $S_Z= $dsatz['Stossen'];

                 if($stammdaten['Wk_Art'] != "BL"){
                     $S_timestamp=$dsatz['time_Stossen'];
                 }
         }
  }

if($xxx == "3")
{

    if($stammdaten['Wk_Art'] != "BL"){                                                  //F�r Zeitsptempel
        if($R_timestamp < $S_timestamp)    $hoechste_time = $S_timestamp;
        else                               $hoechste_time = $R_timestamp;
    }


//Berechnung Relativ Punkte:
if($R_Z < $relativ_abzug) $R_R=0;
else $R_R = $R_Z - $relativ_abzug;

if($S_Z < $relativ_abzug) $R_S=0;
else $R_S = $S_Z - $relativ_abzug;

$R_P = $R_R + $R_S;

if($R_P<0) $R_P=0;

if($stammdaten['Wk_Art'] == "BL" || $stammdaten['Wk_Art'] == "Mk_m_T"  || $stammdaten['Wk_Art'] == "Mk_o_T"){
    $Z_K = $R_Z + $S_Z;
}else{  //Nur in Einzelwettkämpfen ein Loch
    if($R_Z!=0 && $S_Z!=0)   $Z_K = $R_Z + $S_Z;
    else                     $Z_K = 0;
}


$SinFaktor=SinclairFaktor($dsatz,$stammdaten)*MaloneMeltzerFaktor($dsatz,$stammdaten);

$SP_Malone_Meltzer=($R_Z+$S_Z)*$SinFaktor;

//If Wk Modus in BL ist Sinclair:
if($stammdaten['Wk_Art'] == "BL"){
  if($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
    $Sinclair_R = $R_Z * $SinFaktor;
    $Sinclair_S = $S_Z * $SinFaktor;
    $Sinclair_Ges = ($R_Z + $S_Z) * $SinFaktor;
  }
}

if($dsatz['Ausserkonkurrenz']!='Ausserkonkurrenz'){ //Wenn Ausserkonkurrenz keine Pkt.
  if($stammdaten['auswertung_art']==0){
    $arrayVereinR[$dsatz['IdVerein']]+= $R_R;
    $arrayVereinS[$dsatz['IdVerein']]+= $R_S;
    $arrayVereinRuS[$dsatz['IdVerein']]+= $R_P;
  }elseif($stammdaten['auswertung_art']==1 || $stammdaten['auswertung_art']==2){
    $arrayVereinR[$dsatz['IdVerein']]+= $Sinclair_R;
    $arrayVereinS[$dsatz['IdVerein']]+= $Sinclair_S;
    $arrayVereinRuS[$dsatz['IdVerein']]+= $Sinclair_Ges;
  }

}

//Calc RobiPoints---------------------------------------------------------------------------------------------------------

//GwKl ist mit minus/Plus gespeichert -52...

if($GwKl<0) $Robbi_GwKl=$GwKl*(-1);
else $Robbi_GwKl=1;

//echo $dsatz['IdHeber'].$dsatz['Name'].$Robbi_GwKl."|".$AlKl."<br>";
//echo $geschlecht.$AlKl.$Robbi_GwKl.'|'.$Z_K;

$RobbiPoints= Return_RobiPoints($geschlecht,$AlKl,$Robbi_GwKl,$Z_K);

//var_dump($RobbiPoints);


//---------------------------------------------------------------------------------------------------------------------------

//Calc Qualy-RobiPoints------------------------------------------------------------------------------------------------------

//GwKl ist mit minus/Plus gespeichert -52...

if($GwKl<0) $Robbi_GwKl=$GwKl*(-1);
else $Robbi_GwKl=1;

//echo $geschlecht.$AlKl.$Robbi_GwKl.'|'.$Z_K;

$RobbiQualiPoints=$stammdaten['RobiVorfaktor'] * Return_Robi_Qualifikation_Points($geschlecht,$Robbi_GwKl,$Z_K);

//var_dump($RobbiPoints);



//---------------------------------------------------------------------------------------------------------------------------


//Calc IAT-Points------------------------------------------------------------------------------------------------------
$AlKl=al_kl_heber($dsatz['IdHeber'],$stammdaten);
$geschlecht = $dsatz['Geschlecht'];
$KöGw = $dsatz['Gewicht'];
// echo $AlKl, $geschlecht, $KöGw, $Z_K;
$IAT_points = iat_points($Alter, $geschlecht, $KöGw, $Z_K);
if ($stammdaten['RelativArt'] == "3"){
    $R_P = $IAT_points;
    // echo 'Geschlecht: ', $geschlecht, ' Alter: ', $Alter, ' ZK: ', $Z_K, ' IAT_ZK_points: ', $IAT_points, '<br>';
}
//---------------------------------------------------------------------------------------------------------------------------

//Speichern------------------------------------------------------------------------------------------------------------------

        if($stammdaten['Wk_Art'] != "ZK" && $stammdaten['Wk_Art'] != "BL"){
        	if(($dsatz['Sinclair_P_Malone_Meltzer']!==$SP_Malone_Meltzer)||$dsatz['Z_K']!==$Z_K || $dsatz['Relativ_P']!==$R_P || $dsatz['hoechste_time']!==$hoechste_time){
                // echo $IAT_points;
                 dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                              SET Z_K= '$Z_K', R_B= '$R_Z', S_B= '$S_Z', Sinclair_P_Malone_Meltzer= '$SP_Malone_Meltzer',
                 					Relativ_P='$R_P', Robbi_P='$RobbiPoints', Robbi_Quali_P='$RobbiQualiPoints',
                                     IAT_P='$IAT_points',
									hoechste_time= '$hoechste_time'
                              WHERE IdHeber ='".$dsatz['IdHeber']."'
                              ");
              }

        }elseif($stammdaten['Wk_Art'] == "ZK"){
        	if(($dsatz['Sinclair_P_Malone_Meltzer']!=$SP_Malone_Meltzer)||$dsatz['Z_K']!=$Z_K || $dsatz['Relativ_P']!=$R_P
                 || $dsatz['hoechste_time']!=$hoechste_time){

                 dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                              SET Z_K= '$Z_K', R_B= '$R_Z', S_B= '$S_Z', Sinclair_P_Malone_Meltzer= '$SP_Malone_Meltzer',
									Relativ_P='$R_P', Robbi_P='$RobbiPoints', Robbi_Quali_P='$RobbiQualiPoints',
                                    IAT_P='$IAT_points',
									R_Gewicht='$relativ_abzug', hoechste_time= '$hoechste_time'
                              WHERE IdHeber ='".$dsatz['IdHeber']."'
                              ");
              }
        }else{
              if(($dsatz['Sinclair_P_Malone_Meltzer']!==$SP_Malone_Meltzer)||$dsatz['Z_K']!==$Z_K || $dsatz['Relativ_P']!==$R_P){

                  //Ohne: , Robbi_P='$RobbiPoints', Robbi_Quali_P='$RobbiQualiPoints'

                 dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                              SET Z_K= '$Z_K', R_B= '$R_Z', S_B= '$S_Z', Sinclair_P_Malone_Meltzer= '$SP_Malone_Meltzer',
									Relativ_P='$R_P',
                                    IAT_P='$IAT_points',
									R_Gewicht='$relativ_abzug', hoechste_time= '$hoechste_time'
                              WHERE IdHeber ='".$dsatz['IdHeber']."'
                              ");
              }
        }


        if($stammdaten['Wk_Art'] == "BL"){

               $R1=$arrayVereinR[$Bl_Verein['Verein1']];
               $S1=$arrayVereinS[$Bl_Verein['Verein1']];
               $RuS1=$arrayVereinRuS[$Bl_Verein['Verein1']];

               $R2=$arrayVereinR[$Bl_Verein['Verein2']];
               $S2=$arrayVereinS[$Bl_Verein['Verein2']];
               $RuS2=$arrayVereinRuS[$Bl_Verein['Verein2']];

               $R3=$arrayVereinR[$Bl_Verein['Verein3']];
               $S3=$arrayVereinS[$Bl_Verein['Verein3']];
               $RuS3=$arrayVereinRuS[$Bl_Verein['Verein3']];

               if($stammdaten['Verein_Anzahl']==2){


               $Pt_V1=0;
               $Pt_V2=0;

               //echo $Bl_Verein['Verein1'];
               //var_dump(GetVereinLetzterGueltigerVersuch("Reissen"));


               if($R1!=$R2){
               	if($R1>$R2) $Pt_V1++;
               	else        $Pt_V2++;
               }else{
               	$IdVereinLetzterGueltigenHebung=GetVereinLetzterGueltigerVersuch("Reissen");
               	if($IdVereinLetzterGueltigenHebung==$Bl_Verein['Verein1']) $Pt_V2++;
               	if($IdVereinLetzterGueltigenHebung==$Bl_Verein['Verein2']) $Pt_V1++;

               }


               if($S1!=$S2){
               	if($S1>$S2) $Pt_V1++;
               	else        $Pt_V2++;
               }else{
               	$IdVereinLetzterGueltigenHebung=GetVereinLetzterGueltigerVersuch("Stossen");
               	if($IdVereinLetzterGueltigenHebung==$Bl_Verein['Verein1']) $Pt_V2++;
               	if($IdVereinLetzterGueltigenHebung==$Bl_Verein['Verein2']) $Pt_V1++;

               }


               if($RuS1!=$RuS2){
               	if($RuS1>$RuS2) $Pt_V1++;
               	else            $Pt_V2++;
               }else{
               	$IdVereinLetzterGueltigenHebung=GetVereinLetzterGueltigerVersuch("Stossen");
               	if($IdVereinLetzterGueltigenHebung==$Bl_Verein['Verein1']) $Pt_V2++;
               	if($IdVereinLetzterGueltigenHebung==$Bl_Verein['Verein2']) $Pt_V1++;

               }


                 //var_dump($Pt_V1);


               dbBefehl("UPDATE bl_vereins_auswahl_".$data_a_db['S_Db']."
                            SET R_Pt_V1= '$R1', S_Pt_V1= '$S1', RuS_Pt_V1=' $RuS1',
                                R_Pt_V2= '$R2', S_Pt_V2= '$S2', RuS_Pt_V2='$RuS2',
                                Ergebniss_V1= '$Pt_V1', Ergebniss_V2= '$Pt_V2'
                         ");


               }elseif($stammdaten['Verein_Anzahl']==3){
                   $Pt_V1=0;
                   $Pt_V2=0;
                   $Pt_V3=0;

                   //if($stammdaten['auswertung_art']==0){

                     if(groesser($R1,$R2)==1){
                         if(groesser($R1,$R3)==1)     $Pt_V1++;
                         elseif(groesser($R1,$R3)==2) $Pt_V3++;
                     }elseif(groesser($R1,$R2)==2){
                       if(groesser($R2,$R3)==1)     $Pt_V2++;
                       elseif(groesser($R2,$R3)==2) $Pt_V3++;
                     }

                     if(groesser($S1,$S2)==1){
                         if(groesser($S1,$S3)==1)     $Pt_V1++;
                         elseif(groesser($S1,$S3)==2) $Pt_V3++;
                     }elseif(groesser($S1,$S2)==2){
                       if(groesser($S2,$S3)==1)     $Pt_V2++;
                       elseif(groesser($S2,$S3)==2) $Pt_V3++;
                     }

                     if(groesser($RuS1,$RuS2)==1){
                         if(groesser($RuS1,$RuS3)==1)     $Pt_V1++;
                         elseif(groesser($RuS1,$RuS3)==2) $Pt_V3++;
                     }elseif(groesser($RuS1,$RuS2)==2){
                       if(groesser($RuS2,$RuS3)==1)     $Pt_V2++;
                       elseif(groesser($RuS2,$RuS3)==2) $Pt_V3++;
                     }

                     /*
                     if($R1!=$R2)
                         if($R1>$R2) $Pt_V1++;
                         else        $Pt_V2++;

                     if($S1!=$S2)
                         if($S1>$S2) $Pt_V1++;
                         else        $Pt_V2++;

                     if($RuS1!=$RuS2)
                         if($RuS1>$RuS2) $Pt_V1++;
                         else            $Pt_V2++;
                     */


                        dbBefehl("UPDATE bl_vereins_auswahl_".$data_a_db['S_Db']."
                            SET R_Pt_V1= '$R1', S_Pt_V1= '$S1', RuS_Pt_V1=' $RuS1',
                                R_Pt_V2= '$R2', S_Pt_V2= '$S2', RuS_Pt_V2='$RuS2',
                                R_Pt_V3= '$R3', S_Pt_V3= '$S3', RuS_Pt_V3='$RuS3'
                         ");

               }


        }



$S_timestamp=0;
$R_timestamp=0;

$Z_K=0;
$R_Z=0;
$S_Z=0;
$xxx=0;
  }  //If Versuch ==3 ENDE

}
$xxx ++;

}  //schliest innere Schleife

}   //schliest altersklassen def. schleife

}   //Schliest �ber Gruppen


//------------------------------------------------------------------------------------------------------------------


if($stammdaten['Wk_Art'] == "M_o_T" || $stammdaten['Wk_Art']== "M_m_T"){

	if($auswerte_Gruppe==0)
		$dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);	//F�r �ber alle Gruppen
	else
		$dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']." WHERE Gruppen='$auswerte_Gruppe' ");


while($DataGruppen= mysqli_fetch_assoc($dbGruppen))
{
$Gruppe_Auswertung=$DataGruppen['Gruppen'];

$Grp_data = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']." WHERE grp_".$data_a_db['S_Db'].".Gruppe='$Gruppe_Auswertung'");




while($dsatz_Grp = mysqli_fetch_assoc($Grp_data))
{

$Grp=$dsatz_Grp['Gruppe_Aus'];

$auswertung_M_K = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db']."
                               WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
                               ");





while($dsatz_aus_M_K = mysqli_fetch_assoc($auswertung_M_K))                        //Zum errechnen der Mehrkampfwertung_Gesamt
{

$M_K_Punkte = 0;
$B_S_V=0;                                                                                  //Besten G�ltigen Versuch finden:
$B_R_V=0;
$S_d_S_P=0;       //Schlussdreisprung Punkte


if($stammdaten['Wk_Art'] == "M_o_T")
{


if($dsatz_aus_M_K['R_1_G'] == "Ja"){

$B_R_V=$dsatz_aus_M_K['R_1'];

}

if($dsatz_aus_M_K['R_2_G'] == "Ja"){

$B_R_V=$dsatz_aus_M_K['R_2'];

}

if($dsatz_aus_M_K['R_3_G'] == "Ja"){

$B_R_V=$dsatz_aus_M_K['R_3'];

}

if($dsatz_aus_M_K['S_1_G'] == "Ja"){

$B_S_V=$dsatz_aus_M_K['S_1'];

}

if($dsatz_aus_M_K['S_2_G'] == "Ja"){

$B_S_V=$dsatz_aus_M_K['S_2'];

}

if($dsatz_aus_M_K['S_3_G'] == "Ja"){

$B_S_V=$dsatz_aus_M_K['S_3'];

}

}  //Ende der Beste Versuch erfassung f�r M_o_T

$IdHeber=$dsatz_aus_M_K['IdHeber'];
$Alter=$time['year']-$dsatz_aus_M_K['Jahrgang'];
$geschlecht = $dsatz_aus_M_K['Geschlecht'];
$KöGw = $dsatz_aus_M_K['Gewicht'];

                 if($stammdaten['Pendellauf'] == "1"){
                 	$Pt_Pendel=0;
                     if(($dsatz_aus_M_K['Pendellauf'] != "0.0")&&($dsatz_aus_M_K['Pendel2'] != "0.0")&&
                         ($dsatz_aus_M_K['Pendel2'] != NULL)&&($dsatz_aus_M_K['Pendellauf'] != NULL)){

                        if($dsatz_aus_M_K['Pendellauf']<=$dsatz_aus_M_K['Pendel2']){
                                 $Pendel=$dsatz_aus_M_K['Pendellauf'];
                        }else{
                                 $Pendel=$dsatz_aus_M_K['Pendel2'];
                        }
                        $Pt_Pendel= ((13 - $Pendel) * 20) + 100;
                     }
                     if((($dsatz_aus_M_K['Pendellauf'] != "0.0")&&($dsatz_aus_M_K['Pendellauf'] != NULL))&&(($dsatz_aus_M_K['Pendel2'] == "0.0")||($dsatz_aus_M_K['Pendel2'] == NULL))){
                         $Pendel=$dsatz_aus_M_K['Pendellauf'];
                         $Pt_Pendel= ((13 - $Pendel) * 20) + 100;
                     }
                     if((($dsatz_aus_M_K['Pendellauf'] == "0.0")||($dsatz_aus_M_K['Pendellauf'] == NULL))&&(($dsatz_aus_M_K['Pendel2'] != "0.0")&&($dsatz_aus_M_K['Pendel2'] != NULL))){
                         $Pendel=$dsatz_aus_M_K['Pendel2'];
                         $Pt_Pendel= ((13 - $Pendel) * 20) + 100;
                     }
                     if($Pt_Pendel<0) $Pt_Pendel=0;

                     safeInAuswertungMk($IdHeber, 'Pendellauf', $Pt_Pendel);
                     $M_K_Punkte=$Pt_Pendel;
                 }


                 if($stammdaten['Sternlauf'] == "1"){
                 	$Pt_Stern=0;
                    $Stern=0.0;
                     if(($dsatz_aus_M_K['Sternlauf'] != "0.0")&&($dsatz_aus_M_K['Stern2'] != "0.0")&&
                         ($dsatz_aus_M_K['Stern2'] != NULL)&&($dsatz_aus_M_K['Sternlauf'] != NULL)){

                        if($dsatz_aus_M_K['Sternlauf']<=$dsatz_aus_M_K['Stern2']){
                                 $Stern=$dsatz_aus_M_K['Sternlauf'];
                        }else{
                                 $Stern=$dsatz_aus_M_K['Stern2'];
                        }
                        $Pt_Stern= ((12 - $Stern) * 20) + 160;
                     }
                     if((($dsatz_aus_M_K['Sternlauf'] != "0.0")&&($dsatz_aus_M_K['Sternlauf'] != NULL))&&(($dsatz_aus_M_K['Stern2'] == "0.0")||($dsatz_aus_M_K['Stern2'] == NULL))){
                         $Stern=$dsatz_aus_M_K['Sternlauf'];
                         $Pt_Stern= ((12 - $Stern) * 20) + 160;
                     }
                     if((($dsatz_aus_M_K['Sternlauf'] == "0.0")||($dsatz_aus_M_K['Sternlauf'] == NULL))&&(($dsatz_aus_M_K['Stern2'] != "0.0")&&($dsatz_aus_M_K['Stern2'] != NULL))){
                         $Stern=$dsatz_aus_M_K['Stern2'];
                         $Pt_Stern= ((12 - $Stern) * 20) + 160;
                     }

                    if ($stammdaten['RelativArt'] == "3"){
                        $Pt_Stern = 0.0;
                        $Pt_Stern = iat_sternlauf($Alter, $geschlecht, $KöGw, $Stern);
                        // echo 'Geschlecht: ', $geschlecht, ' Alter: ', $Alter, ' Result: ', $Stern, 'sec, Pt_Stern: ', $Pt_Stern, '<br>';
                    }

                    if($Pt_Stern<0) $Pt_Stern=0;

                     safeInAuswertungMk($IdHeber, 'Sternlauf', $Pt_Stern);
                     $M_K_Punkte+=$Pt_Stern;

                 }


                 if($stammdaten['Sprint'] == "1"){
                 	$Pt_Sprint=0;
                     if(($dsatz_aus_M_K['Sprint'] != "0.0")&&($dsatz_aus_M_K['Sprint2'] != "0.0")&&
                         ($dsatz_aus_M_K['Sprint'] != NULL)&&($dsatz_aus_M_K['Sprint2'] != NULL)){

                        if($dsatz_aus_M_K['Sprint']<=$dsatz_aus_M_K['Sprint2']){
                                 $Sprint=$dsatz_aus_M_K['Sprint'];
                        }else{
                                 $Sprint=$dsatz_aus_M_K['Sprint2'];
                        }
                        $Pt_Sprint=  ((6 - $Sprint) *40) +100;
                     }
                     if((($dsatz_aus_M_K['Sprint'] != "0.0")&&($dsatz_aus_M_K['Sprint'] != NULL))&&(($dsatz_aus_M_K['Sprint2'] == "0.0")||($dsatz_aus_M_K['Sprint2'] == NULL))){
                         $Sprint=$dsatz_aus_M_K['Sprint'];
                         $Pt_Sprint= ((6 - $Sprint) *40) +100;
                     }
                     if((($dsatz_aus_M_K['Sprint'] == "0.0")||($dsatz_aus_M_K['Sprint'] == NULL))&&(($dsatz_aus_M_K['Sprint2'] != "0.0")&&($dsatz_aus_M_K['Sprint2'] != NULL))){
                         $Pendel=$dsatz_aus_M_K['Sprint2'];
                         $Pt_Sprint= ((6 - $Sprint) *40) +100;
                     }
                     if($Pt_Sprint<0) $Pt_Sprint=0;
                     safeInAuswertungMk($IdHeber, 'Sprint', $Pt_Sprint);
                     $M_K_Punkte+=$Pt_Sprint;
                 }

                 if($stammdaten['Differenzsprung'] == "1"){
                 	$Pt_Differenzsprung=0;
                        if($dsatz_aus_M_K['Differenzsprung']<=$dsatz_aus_M_K['Differenzsprung2']){
                                 $Differenzsprung=$dsatz_aus_M_K['Differenzsprung2'];
                        }else{
                                 $Differenzsprung=$dsatz_aus_M_K['Differenzsprung'];
                        }
                        $Pt_Differenzsprung= ($Differenzsprung * 2.25);

                        if($Pt_Differenzsprung<0) $Pt_Differenzsprung=0;
                        safeInAuswertungMk($IdHeber, 'Differenzsprung', $Pt_Differenzsprung);
                        $M_K_Punkte+=$Pt_Differenzsprung;


                 }

                 if($stammdaten['DifferenzsprungEmatte'] == "1"){
                 	$Pt_Differenzsprung=0;
                        if($dsatz_aus_M_K['Differenzsprung']<=$dsatz_aus_M_K['Differenzsprung2']){
                                 $Differenzsprung=$dsatz_aus_M_K['Differenzsprung2'];
                        }else{
                                 $Differenzsprung=$dsatz_aus_M_K['Differenzsprung'];
                        }
                        $Pt_Differenzsprung= ($Differenzsprung * 3);

                        if($Pt_Differenzsprung<0) $Pt_Differenzsprung=0;
                        safeInAuswertungMk($IdHeber, 'DifferenzsprungEmatte', $Pt_Differenzsprung);
                        $M_K_Punkte+=$Pt_Differenzsprung;


                 }

                 if($stammdaten['Schlussdreisprung'] == "1"){
                 	$Pt_Schlussdreisprung=0;
                        if($dsatz_aus_M_K['Schlussdreisprung']<=$dsatz_aus_M_K['Schlussdreisprung2']){
                                 $Schlussdreisprung=$dsatz_aus_M_K['Schlussdreisprung2'];
                        }else{
                                 $Schlussdreisprung=$dsatz_aus_M_K['Schlussdreisprung'];
                        }
                        if($Schlussdreisprung<=$dsatz_aus_M_K['Schlussdreisprung3']){
                                 $Schlussdreisprung=$dsatz_aus_M_K['Schlussdreisprung3'];
                        }
                        $Pt_Schlussdreisprung=  ($Schlussdreisprung * 0.2 );
       
                        if ($stammdaten['RelativArt'] == "3"){
                            $Pt_Schlussdreisprung = 0.0;
                            $Pt_Schlussdreisprung = iat_schluss_drei_sprung($Alter, $geschlecht, $KöGw, $Schlussdreisprung);
                            // echo 'Geschlecht: ', $geschlecht, ' Alter: ', $Alter, 'Result: ', $Schlussdreisprung, 'cm, Pt_Schlussdreisprung: ', $Pt_Schlussdreisprung, '<br>';
                        }

                        if($Pt_Schlussdreisprung<0) $Pt_Schlussdreisprung=0;
                        safeInAuswertungMk($IdHeber, 'Schlussdreisprung', $Pt_Schlussdreisprung);
                        $M_K_Punkte+=$Pt_Schlussdreisprung;



                 }

                 if($stammdaten['Schockwurf'] == "1"){
                 	$Pt_Schockwurf=0;
                        if($dsatz_aus_M_K['Schockwurf']<=$dsatz_aus_M_K['Schockwurf2']){
                                 $Schockwurf=$dsatz_aus_M_K['Schockwurf2'];
                        }else{
                                 $Schockwurf=$dsatz_aus_M_K['Schockwurf'];
                        }
                        if($Schockwurf<=$dsatz_aus_M_K['Schockwurf3']){
                                 $Schockwurf=$dsatz_aus_M_K['Schockwurf3'];
                        }


                        $Pt_Schockwurf= (($Schockwurf * 7.5)/$dsatz_aus_M_K['Gewicht']);

                        if ($stammdaten['RelativArt'] == "3"){
                            $Pt_Schockwurf = 0.0;
                            $Pt_Schockwurf = iat_kugel_schock($Alter, $geschlecht, $KöGw, $Schockwurf);
                            // echo 'Geschlecht: ', $geschlecht, ' Alter: ', $Alter, 'Result: ', $Schockwurf, 'cm, Pt_Schockwurf: ', $Pt_Schockwurf, '<br>';
                        }

                        safeInAuswertungMk($IdHeber, 'Schockwurf', $Pt_Schockwurf);
                        $M_K_Punkte+=$Pt_Schockwurf;

                 }

                 if($stammdaten['Anristen'] == "1"){
                 	$Pt_Anristen=0;
                 	if( ($Alter== "10") || ($Alter== "11") || ($Alter== "12") ){
                                 if($dsatz_aus_M_K['Anristen'] <= "10"){
                                 	$Pt_Anristen= ($dsatz_aus_M_K['Anristen'] * 15);
                                 }else{
                                 	$Pt_Anristen= 150;
                                 }
                        }


                        if($Alter == "13"){
                        	if($Alter<= "12"){
                        		$Pt_Anristen= ($dsatz_aus_M_K['Anristen'] * 12.5);
                            }else{
                                $Pt_Anristen= 150;
                            }
                        }


                        if(( $Alter == "14") || ($Alter == "15") || ($Alter == "16") ||
                        ($Alter == "17")){

                                 if($dsatz_aus_M_K['Anristen'] <= "15"){
                                 	$Pt_Anristen= ($dsatz_aus_M_K['Anristen'] * 10);
                                 }else{
                                 	$Pt_Anristen= 150;
                                 }
                        }

                        safeInAuswertungMk($IdHeber, 'Anristen', $Pt_Anristen);
                        $M_K_Punkte+=$Pt_Anristen;
                 }

                 if($stammdaten['Klimmziehen'] == "1"){
                 	$Pt_Klimmziehen=0;
                        if( ($Alter == "10") || ($Alter == "11") || ($Alter == "12") ){
                                 if($dsatz_aus_M_K['Klimmziehen'] <= "10"){
                                 	$Pt_Klimmziehen= ($dsatz_aus_M_K['Klimmziehen'] * 15);
                                 }else{
                                 	$Pt_Klimmziehen= 150;
                                 }
                        }


                        if($Alter == "13"){

                                 if($dsatz_aus_M_K['Geschlecht'] == "Weiblich"){

                                         if($dsatz_aus_M_K['Klimmziehen'] <= "10"){

                                         	$Pt_Klimmziehen= ($dsatz_aus_M_K['Klimmziehen'] * 15);
                                         }else{

                                         	$Pt_Klimmziehen= 150;

                                         }

                                 }else{

                                         if($dsatz_aus_M_K['Klimmziehen'] <= "12"){

                                         	$Pt_Klimmziehen= ($dsatz_aus_M_K['Klimmziehen'] * 12.5);
                                         }else{

                                         	$Pt_Klimmziehen= 150;

                                         }
                                 }

                        }


                        if(($Alter == "14") || ($Alter == "15") || ($Alter == "16") ||
                          ($Alter == "17")){

                                 if($dsatz_aus_M_K['Geschlecht'] == "Weiblich"){


                                         if($dsatz_aus_M_K['Klimmziehen'] <= "12"){

                                         	$Pt_Klimmziehen= ($dsatz_aus_M_K['Klimmziehen'] * 12.5);
                                         }else{

                                         	$Pt_Klimmziehen= 150;
                                         }

                                 }else{


                                         if($dsatz_aus_M_K['Klimmziehen'] <= "15"){

                                         	$Pt_Klimmziehen= ($dsatz_aus_M_K['Klimmziehen'] * 10);
                                         }else{

                                         	$Pt_Klimmziehen= 150;

                                         }

                                 }
                        }

                        safeInAuswertungMk($IdHeber, 'Klimmziehen', $Pt_Klimmziehen);
                        $M_K_Punkte+=$Pt_Klimmziehen;

                 }



                 if($stammdaten['Zug'] == "1"){
                 	$Pt_Zug=0;
                 	if($Alter == "15"){
                 		if($dsatz_aus_M_K['Zug'] <= "15"){
                 			$Pt_Zug= ($dsatz_aus_M_K['Zug'] * 10);
                 		}else{
                 			$Pt_Zug= 150;
                 		}
                 	}

                 	if($Alter == "16"){
                 		if($dsatz_aus_M_K['Zug'] <= "12"){
                 			$Pt_Zug= ($dsatz_aus_M_K['Zug'] * 12.5);
                 		}else{
                 			$Pt_Zug= 150;
                 		}
                 	}

                 	if($Alter == "17"){
                 		if($dsatz_aus_M_K['Zug'] <= "10"){
                 			$Pt_Zug= ($dsatz_aus_M_K['Zug'] * 15);
                 		}else{
                 			$Pt_Zug= 150;
                 		}
                 	}



                 	safeInAuswertungMk($IdHeber, 'Zug', $Pt_Zug);
                 	$M_K_Punkte+=$Pt_Zug;

                 }



                 if($stammdaten['Bankdruecken'] == "1"){
                 	$Pt_Bankdruecken=0;
                                 if($dsatz_aus_M_K['Bankdruecken'] <= "15"){
                                 	$Pt_Bankdruecken= ($dsatz_aus_M_K['Bankdruecken'] * 10);
                                 }else{
                                 	$Pt_Bankdruecken= 150;
                                 }

                                 safeInAuswertungMk($IdHeber, 'Bankdruecken', $Pt_Bankdruecken);
                                 $M_K_Punkte+=$Pt_Bankdruecken;

                 }

                 if($stammdaten['Liegestuetz'] == "1"){

                 	$Pt_Liegestuetz= ($dsatz_aus_M_K['Liegestuetz'] * 4.5);

                 	safeInAuswertungMk($IdHeber, 'Liegestuetz', $Pt_Liegestuetz);
                 	$M_K_Punkte+=$Pt_Liegestuetz;

                 }

                 if($stammdaten['Beugestuetz'] == "1"){

                 	$Pt_Beugestuetz= ($dsatz_aus_M_K['Liegestuetz'] * 5);

                 	safeInAuswertungMk($IdHeber, 'Beugestuetz', $Pt_Beugestuetz);
                 	$M_K_Punkte+=$Pt_Beugestuetz;

                 }



if($stammdaten['Wk_Art'] == "M_o_T")
{
    #TODO: anpassung Faktor weiblich
    $M_K_G =( ( ($B_R_V * 135) / $dsatz_aus_M_K['K_Gewicht']) + ( ($B_S_V * 100) / $dsatz_aus_M_K['K_Gewicht'] ) ) + $M_K_Punkte * $stammdaten['V_Faktor'];

}else{

	$M_K_G= $dsatz_aus_M_K['R_B'] + $dsatz_aus_M_K['S_B']+ $M_K_Punkte * $stammdaten['V_Faktor'];

}

if ($stammdaten['RelativArt'] == "3"){
    $IAT_ZK_points = iat_points($Alter, $geschlecht, $KöGw, ($B_R_V+$B_S_V));
    $M_K_G = $IAT_ZK_points + $M_K_Punkte;
    // echo 'M_K_G: ', $M_K_G, '<br>';
    // echo 'Geschlecht: ', $geschlecht, ' Alter: ', $Alter, ' IAT_ZK_points: ', $IAT_ZK_points, ' IAT_MK: ', $M_K_Punkte, ' Mk_Gesamt: ', $M_K_G, '<br>';
}


       if($dsatz_aus_M_K['M_K_G']!=$M_K_G){

                 dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                              SET M_K_G= '$M_K_G'
                              WHERE IdHeber ='".$dsatz_aus_M_K['IdHeber']."'
                              ");
       }
}                                                                        //Auswertung des Mehrkampfes...ENDE

}//Ende �ber alle Gruppen | Da wir in der Uebersicht sind muss �ber alle Gruppen die im Wk dabei sind gegangen werden

}//Ende von if != ZK && != BL

}//Ende �ber Gruppen



if($stammdaten['Verein_Anzahl']==3){
    function dreier_Wk_Verein_Punkte_auswertung(){

        global $data_a_db;

        $DataVereinsAbfrage = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
        $VereinsData = mysqli_fetch_assoc($DataVereinsAbfrage);



        for($Wk=1;$Wk<=3;$Wk++){


            if($Wk==1){
                $a=1;
                $b=2;
            }elseif($Wk==2){
                $a=1;
                $b=3;
            }elseif($Wk==3){
                $a=2;
                $b=3;
            }

            $V1_R=$VereinsData['R_Pt_V'.$a];
            $V2_R=$VereinsData['R_Pt_V'.$b];

            $V1_S=$VereinsData['S_Pt_V'.$a];
            $V2_S=$VereinsData['S_Pt_V'.$b];

            $V1_RuS=$VereinsData['RuS_Pt_V'.$a];
            $V2_RuS=$VereinsData['RuS_Pt_V'.$b];

            $Pt_Verrein=array();
            $Pt_Verrein[1]=0;
            $Pt_Verrein[2]=0;

            if(groesser($V1_R,$V2_R)==1){
                $Pt_Verrein[1]++;
            }elseif(groesser($V1_R,$V2_R)==2){
                $Pt_Verrein[2]++;
            }

            if(groesser($V1_S,$V2_S)==1){
                $Pt_Verrein[1]++;
            }elseif(groesser($V1_S,$V2_S)==2){
                $Pt_Verrein[2]++;
            }

            if(groesser($V1_RuS,$V2_RuS)==1){
                $Pt_Verrein[1]++;
            }elseif(groesser($V1_RuS,$V2_RuS)==2){
                $Pt_Verrein[2]++;
            }

            $PV1=$Pt_Verrein[1];
            $PV2=$Pt_Verrein[2];

            $V1String='V'.$a.'_Wk'.$Wk;
            $V2String='V'.$b.'_Wk'.$Wk;



            dbBefehl("UPDATE bl_vereins_auswahl_".$data_a_db['S_Db']."
                            SET $V1String='$PV1', $V2String='$PV2'
                            WHERE Id='1'
                         ");

        }
    }

    dreier_Wk_Verein_Punkte_auswertung();

}



?>




</body>
</html>
