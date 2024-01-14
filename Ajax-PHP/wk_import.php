<?php
@set_time_limit(0);
header('Content-Type: text/html; charset=UTF-8');

error_reporting(1);

include '../funktionen/nuetzliches.php';
include '../funktionen/db_verbindung.php';

$Id_Wettkampf=$_POST['IdWk'];
$Wk_Art=$_POST['WkArt'];

switch ($Wk_Art) {
    case 1:
        $Wk_Art='ZK';
        break;
    case 2:
        $Wk_Art='Masters';
        break;
    case 3:
        $Wk_Art='M_o_T';
        break;
    case 4:
        $Wk_Art='M_m_T';
        break;
    case 5:
        $Wk_Art='BL';
        break;
}

if($Wk_Art=='BL'){
    $WkTabelle='bundesliga';
    $Kurz='bl';
}else{
    $WkTabelle='meisterschaft';
    $Kurz='ms';
}


function checkIfHeberExists ($IdHeber_Online_Db)
{
	global $db;

	$SQL_heber="Select Id_Online_Db From heber Where Id_Online_Db = '$IdHeber_Online_Db'";
	$heber_data=dbBefehl($SQL_heber);

	$num_rows_heber=mysqli_num_rows($heber_data);

	return $num_rows_heber;

}

function checkIfVereinExistsReturnId ($Verein)
{
	global $db;

	$SQL_verein="Select * From verein Where Verein = '".$Verein."' "; //AND IdVerein<0
	$verein_data=dbBefehl($SQL_verein);

	$num_rows_heber=mysqli_num_rows($verein_data);

	//If Verein exsits
	if($num_rows_heber==1){
		$Data=mysqli_fetch_assoc($verein_data);
		$num_rows_heber=$Data['IdVerein'];
	}

	return $num_rows_heber;

}

function return_kleinste_Id_Verein ()
{
	global $db;

	$SQL_verein="Select Min(IdVerein) AS kleinsteId From verein";
	$verein_data=dbBefehl($SQL_verein);

	$Id_Data=mysqli_fetch_assoc($verein_data);

	if($Id_Data['kleinsteId']>=0)
		$Id_Data['kleinsteId']=0;

	return $Id_Data['kleinsteId'];

}

function Insert_Verein ($Verein)
{
    global $db, $IdLaender;

	$IdVerein=return_kleinste_Id_Verein () - 1;
	$Bundesliga=1;
	//$IdLaender=2;	//BW

	$SQL_Insert_Update_Verein="INSERT INTO verein
	(IdVerein,Verein,Bundesliga, IdLaender)
	Values ('$IdVerein','$Verein','$Bundesliga','$IdLaender')";

	dbBefehl($SQL_Insert_Update_Verein);

}

function Update_Verein ($Verein,$IdVerein)
{
    global $db, $IdLaender, $Wk_Art;


	$Bundesliga=1;
	//$IdLaender=2;	//BW

	if($Wk_Art=='BL'){
	    $SQL_Insert_Update_Verein="UPDATE verein
	    SET Verein= '$Verein', Bundesliga= '$Bundesliga'
	    WHERE IdVerein ='$IdVerein'
	    ";
	}else{
	    $SQL_Insert_Update_Verein="UPDATE verein
	    SET Verein= '$Verein', Bundesliga= '$Bundesliga', IdLaender= '$IdLaender'
	    WHERE IdVerein ='$IdVerein'
	    ";
	}

	dbBefehl($SQL_Insert_Update_Verein);

}

function Gesamt_Insert_or_Update_Verein ($Verein)
{
	global $db;

	$VereinCheck=checkIfVereinExistsReturnId($Verein);

	if($VereinCheck!=0){
		$IdVerein=$VereinCheck;
		Update_Verein ($Verein,$IdVerein);
	}else{
		Insert_Verein ($Verein);
	}

}

function GetDatenbankenAsArray(){

    global $db;

    $DbArray=array();

    $SQL_db="Select * From datenbanken";
    $db_data=dbBefehl($SQL_db);

    while($db_ausgelesen = mysqli_fetch_assoc($db_data)){

        $DbArray[]=$db_ausgelesen['Datenbank'];

    }
    return $DbArray;
}

function CheckIfExsits($DbName){

    global $db;

    $DbArray=GetDatenbankenAsArray();
    $Checker=0;

    if(in_array($DbName, $DbArray)) $Checker=1;

    return $Checker;
}

function GenerateNameDB($DbName){

    global $db;

    $z=1;
    $finished=0;

    while($finished!=1){
        $db_test=$DbName;

        if($z!=1) $db_test=$db_test." (".$z.")";

        if(CheckIfExsits($db_test)==1) $z++;
        else $finished=1;
    }

    return $db_test;
}

function return_kleinste_Id_Heber ()
{
    global $db;

    $SQL_heber="Select Min(IdHeber) AS kleinsteId From heber";
    $heber_data=dbBefehl($SQL_heber);

    $Id_Data=mysqli_fetch_assoc($heber_data);

    if($Id_Data['kleinsteId']>0)
        $Id_Data['kleinsteId']=0;

        return $Id_Data['kleinsteId'];

}

function get_IdHeber($IdHeber_Online_Db){

    global $db;

    if(checkIfHeberExists($IdHeber_Online_Db)==1){
        $SQL_heber="Select IdHeber,Id_Online_Db From heber Where Id_Online_Db='$IdHeber_Online_Db'";
        $heber_data=dbBefehl($SQL_heber);
        $D_Heber=mysqli_fetch_assoc($heber_data);

        $IdHeber=$D_Heber['IdHeber'];
    }else{
        $IdHeber=return_kleinste_Id_Heber() -1;
    }

    return $IdHeber;

}

function checkIfHeberAngelegt ($IdHeber)
{
    global $db, $data_a_db;

    $SQL_heber="Select IdHeber From heber_".$data_a_db['S_Db']." Where IdHeber = '$IdHeber'";
    $heber_data=dbBefehl($SQL_heber);

    $num_rows_heber=mysqli_num_rows($heber_data);
    if($num_rows_heber>=1) $num_rows_heber=1;
    else $num_rows_heber=0;

    return $num_rows_heber;

}

function ReturnIdNation ($NameNation)
{
    if($NameNation=='Deutsch'){
        $IdNation=1;
    }else{
        $IdNation=3;
    }

    return $IdNation;

}


//Funktion die Wk Art Prüft aus


//Creat wk

$db=dbVerbindung(); //is schon in include 'bl_start.php';
$db_Online=dbVerbindungOnline();		//Sorgt für Online Con

//$Wk_Art='BL';   //Sp�ter von wettkampf Tabelle auslesen <---------------------------------------------------------------------------
                //Zu �beratrbeiten: Verein zu Heber ermittelung und Vereins speicherung f�r ZK


//Ermittlung Art Name von WK
$WK_Data = dbBefehlOnline ("SELECT * FROM ".$WkTabelle." WHERE wettkampf_id= '$Id_Wettkampf' ");
$Daten_WK_Online = mysqli_fetch_assoc($WK_Data);




$Online_Id_Wk=$Daten_WK_Online['cas_gguid'];
$Datum=$Daten_WK_Online['Datum'];   //Wk Datum
$Ort=$Daten_WK_Online['Ort'];



$ohneIncludeDbVerbindung=1;	//Damit nicht doppelt included wird in bl_start.php
$OnlineWk=1;    //Damit in bl_start in Stammdaten ein Online Wk geinsertet wird

//Check if DbName exsistiert
$_POST['creat']=GenerateNameDB($_POST['creat']);

$Masters=0;


if($Wk_Art=='BL'){

//If WK ist Bundesliga      ||Falls nicht mehr nur Bundesliga müssen die Vereine unten in der
//                          ||while heber Schleife ausgeführt werden

$IdLaender=2; //BW

$Liga=$Daten_WK_Online['Liga'];

$Heim_Verein=$Daten_WK_Online['Heim'];
$Gast_Verein=$Daten_WK_Online['Gast'];
$Gast2_Verein=$Daten_WK_Online['Gast2'];

//Update oder Insert in Vereins Tabelle
Gesamt_Insert_or_Update_Verein($Heim_Verein);
Gesamt_Insert_or_Update_Verein($Gast_Verein);

//Get IdVerein
$Heim_IdVerein=checkIfVereinExistsReturnId ($Heim_Verein);
$Gast_IdVerein=checkIfVereinExistsReturnId ($Gast_Verein);



if($Gast2_Verein==''){
    $Bl_Verein_anzahl=2;
    $Gast2_IdVerein=NULL;
}
else{
	$Bl_Verein_anzahl=3;
	Gesamt_Insert_or_Update_Verein($Gast2_Verein);
	$Gast2_IdVerein=checkIfVereinExistsReturnId ($Gast2_Verein);
}


//$Creat=$Daten_WK_Online['wettkampf_id'];//Hier ist $Creat noch Name des WK's
//$_POST['creat']=$Creat;	//Nummer des Wks


include 'bl_start.php'; //Hier ist  $db=dbVerbindung() schon festgelegt und include dbverbindung auch drinnen
$data_a_db['S_Db']=$Creat;	//Creat ist jetzt Wk Id

//Update bl_vereins_auswahl_$wknummer mit Vereinen
$SQL_Bl_Verein_Update="UPDATE  bl_vereins_auswahl_".$Creat."
		SET Verein1= '$Heim_IdVerein', Verein2= '$Gast_IdVerein', Verein3= '$Gast2_IdVerein'
		WHERE Id ='1' ";
dbBefehl($SQL_Bl_Verein_Update);


//BL-ENDE--------------------------------------------------------------------------


}elseif($Wk_Art=='ZK'){
    $Masters=0;
    include 'zk_start.php'; //Hier ist  $db=dbVerbindung() schon festgelegt und include dbverbindung auch drinnen
    $data_a_db['S_Db']=$Creat;	//Creat ist jetzt Wk Id
}elseif($Wk_Art=='Masters'){    //Hier weiter machen-------------------------------------!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $Masters=1;
    include 'zk_start.php'; //Hier ist  $db=dbVerbindung() schon festgelegt und include dbverbindung auch drinnen
    $data_a_db['S_Db']=$Creat;	//Creat ist jetzt Wk Id
}elseif($Wk_Art=='M_o_T'){
    include 'mkot_start.php';
    $data_a_db['S_Db']=$Creat;	//Creat ist jetzt Wk Id
}elseif($Wk_Art=='M_m_T'){
    include 'mkmt_start.php';
    $data_a_db['S_Db']=$Creat;	//Creat ist jetzt Wk Id
}


//Get Stammdaten als Array
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

echo $Heim_Verein, '|', $Gast_Verein, '<br>';
if($Wk_Art=='BL'){ 
	if($Bl_Verein_anzahl==2){
		//For BL loop over all lifter of that given Verein in Online DB (Online-Table='athleten')
		$SQL_heber="Select * From athleten Where verein= '".$Heim_Verein."' OR verein= '".$Gast_Verein."' ";
	}elseif($Bl_Verein_anzahl==3){
		//For BL loop over all lifter of that given Verein in Online DB (Online-Table='athleten')
		$SQL_heber="Select * From athleten Where verein= '".$Heim_Verein."' OR verein= '".$Gast_Verein."' OR verein= '".$Gast2_Verein."'";
	}else{
		echo "ERROR_101: unkown number for Bl_Verein_anzahl";
	}
}else{
	//Insert heber in heber.sql
	//For that loop over athelte data corresponding to given wk:
	//WK cas_gguid <=> wettkampf_cas_guid für indifikation Heber <=> WK
	$SQL_heber="Select * From teilnahme_".$Kurz." Where wettkampf_cas_guid= '".$Daten_WK_Online['cas_gguid']."'";
}
$heber_data=dbBefehlOnline($SQL_heber);


$i=0;

while($dsatz_aus = mysqli_fetch_assoc($heber_data)){

	// $Vorname=$dsatz_aus['vorname'];
	// echo $Vorname;

	$Vorname=$dsatz_aus['athlet_vorname'];
	$Name=$dsatz_aus['athlet_name'];

	// echo $Vorname, ', ', $Name, '<br>';	

	$i++;

	//$IdVerein=-$dsatz_aus['IdVerein'];//KSV Loerrach
	//$Verein=$dsatz_aus['Verein'];
	$Jahrgang=$dsatz_aus['athlet_gebjahr'];

	//echo $i, $Vorname, $Jahrgang, $dsatz_aus['athlet_nation'], '<br>';

	if($dsatz_aus['athlet_geschlecht']=='weiblich') $Geschlecht='Weiblich';
	else $Geschlecht='Männlich';

	if($Wk_Art=='BL'){
	    // $Gewicht=$dsatz_aus['athlet_gewicht'];
		$Gewicht=60;		
	    $IdNation=ReturnIdNation ($dsatz_aus['athlet_nation']);
	}else{
	    $Gewicht=abs($dsatz_aus['gewicht']); //$dsatz_aus['athlet_gewicht']

	    if($Gewicht==NULL || $Gewicht==0){
	        if($Geschlecht=='Männlich') $GeschlechtKurz="m";
	        else $GeschlechtKurz="w";

          if ($dsatz_aus['gewichtsklasse_'.$GeschlechtKurz] == ""){
            echo $i, $Vorname, $Jahrgang, $dsatz_aus['athlet_nation'], '|||||';
            var_dump($dsatz_aus['gewichtsklasse_'.$GeschlechtKurz]);
            echo "dsatz_aus['gewichtsklasse_'.GeschlechtKurz] == ''", '<br>';
            $Gewicht = 1.0;
          }else{
  	        if($dsatz_aus['gewichtsklasse_'.$GeschlechtKurz] < 0 ){
  	            $Gewicht=abs($dsatz_aus['gewichtsklasse_'.$GeschlechtKurz]);
  	        }else{
  	            $Gewicht=abs($dsatz_aus['gewichtsklasse_'.$GeschlechtKurz]) + 1;
  	        }
          }

	    }
	    $IdNation=1; //=> IdNation=1 = Deutsch
	}


	if($Wk_Art!='BL'){


		switch ($dsatz_aus['verband']) {
			case 'BAY':
				$Land= "BY";
				$IdLaender=3;
				break;
			case 'BRA':
				$Land= "BB";
				$IdLaender=5;
				break;
			case 'BER':
				$Land= "BE";
				$IdLaender=4;
				break;
			case 'BWG':
				$Land= "BW";
				$IdLaender=2;
				break;
			case 'BRE':
				$Land= "HB";
				$IdLaender=6;
				break;
			case 'HES':
				$Land= "HE";
				$IdLaender=8;
				break;
			case 'HAM':
				$Land= "HH";
				$IdLaender=7;
				break;
			case 'NDS':
				$Land= "NI";
				$IdLaender=10;
				break;
			case 'NRW':
				$Land= "NW";
				$IdLaender=11;
				break;
			case 'SAC':
				$Land= "SN";
				$IdLaender=14;
				break;
			case 'SAA':
				$Land= "ST";
				$IdLaender=15;
				break;
			case 'SLD':
				$Land= "SL";
				$IdLaender=13;
				break;
			case 'SHS':
				$Land= "SH";
				$IdLaender=16;
				break;
			case 'MVP':
				$Land= "MV";
				$IdLaender=9;
				break;
			case 'RLP':
				$Land= "RP";
				$IdLaender=12;
				break;
			case 'THÜ':
				$Land= "TH";
				$IdLaender=17;
				break;
			default:
				$Land= "Unb";
				$IdLaender=18;
		}

	}else{ //If != BL ENDE
	    $Land= "BW";
	    $IdLaender=2;
	}

	//echo "<p>".$Land."</p>";
	//$Land='BW'; // Nein!
	$Bundesliga='1';
	//$IdLaender='2';


	if($Wk_Art=='BL'){ 
		$IdHeber_Online_Db=$dsatz_aus['athleten_id'];
	}else{
		$IdHeber_Online_Db=$dsatz_aus['athlet_id'];
	}

	$IdHeber=get_IdHeber($IdHeber_Online_Db);


    //Vereins ermittelung für Bundesliga-----------------------------------------------------------------------
	if($Wk_Art=='BL'){     //Brauch neue Vereins zuweisung/ermittlung fuer ZK!!!!!!!!!!!!


	$Verein = $dsatz_aus['verein'];

	// echo $Verein;

	// $Verein_Heim_Gast_Gast2=$dsatz_aus['teilnahmerolle'];

	// if($Verein_Heim_Gast_Gast2=='Heim'){
	//     $Verein=$Heim_Verein;
	// }elseif($Verein_Heim_Gast_Gast2=='Gast'){
	//     $Verein=$Gast_Verein;
	// }elseif($Verein_Heim_Gast_Gast2=='Gast2'){
	//     $Verein=$Gast2_Verein;
	// }else{
	//     $Verein='0';
	// }

	}else{//If Verein != 0 ende

	    $Verein=$dsatz_aus['verein'];
	    if($Verein=='')  $Verein='Kein Verein';

	    Gesamt_Insert_or_Update_Verein($Verein);
	}


	if($Verein!='0'){
		$IdVerein=checkIfVereinExistsReturnId($Verein); //returns IdVerein if Vereins Exists
		$HeberCheck=checkIfHeberExists ($IdHeber_Online_Db);		//0 Falls $IdHeber_Online_Db noch nicht vorhanden ist | 1 Falls vorhanden
	}else{
		$IdVerein=0;
	}



  if ($IdVerein != 0){
  	//Hier neue Id finden immer neue niedrigste also immer $min Id --
  	if($HeberCheck==0){
      //echo $HeberCheck .'|'. $Vorname .'|'. $Name .'|'. $IdVerein .'|'. $Jahrgang .'|'. $Gewicht .'|'. $IdHeber_Online_Db .'<br>';

  		$SQL_Insert_Update="INSERT INTO heber
  				(IdHeber,Vorname,Name, IdVerein, Jahrgang, Gewicht, Land, Geschlecht, Bundesliga, Id_Online_Db, IdStaat)
  	    Values ('$IdHeber','$Vorname','$Name','$IdVerein','$Jahrgang','$Gewicht','$Land','$Geschlecht','$Bundesliga', '$IdHeber_Online_Db',
                  '$IdNation')";
  	}else{
      //echo $HeberCheck .'|'. $IdHeber .'|'. $Vorname .'|'. $Name .'|'. $IdVerein .'|'. $Jahrgang .'|'. $Gewicht .'|'. $IdHeber_Online_Db .'<br>';

  		$SQL_Insert_Update="UPDATE heber
  		SET Vorname= '$Vorname', Name= '$Name', IdVerein= '".$IdVerein."', Jahrgang= '$Jahrgang', Gewicht= '$Gewicht',
  			Land='$Land', Geschlecht='$Geschlecht', IdStaat='$IdNation', Bundesliga='$Bundesliga', Id_Online_Db='$IdHeber_Online_Db'
  		WHERE IdHeber ='$IdHeber'
  		";
      //echo $SQL_Insert_Update.'<br>';

  	}



  	dbBefehl($SQL_Insert_Update);



  	//Calc AlKl R_Gw usw.

  	safe_AlKl_GwKl($IdHeber,$stammdaten);


  	//Insert heber in wk tabellen

	// echo $Name . ' | ' .checkIfHeberAngelegt($IdHeber);

  	if(checkIfHeberAngelegt($IdHeber)==0){

  	    if($Wk_Art=='BL'){
  	        //Ausl�nderwertung 0 = Nein Ausl�nderwertung 1 = Ja
  	        //Bestimme ob Heber als Ausl�nder z�hlt oder nicht
  	        $Auslaenderwertung=0;
  	        //==0 bei + $dsatz_aus['athlet_de_wert']
  	        if(($dsatz_aus['athlet_nation']!= 'Deutsch' && $dsatz_aus['athlet_nation'] != NULL) && $dsatz_aus['athlet_de_wert']==0){
  	        	$Auslaenderwertung=1;
  	        }

  	       dbBefehl("INSERT INTO heber_".$data_a_db['S_Db']." (IdHeber,Auslaenderwertung)
  	       		Values ('$IdHeber', '$Auslaenderwertung')");

  	    }else{ //Nicht BL
  	        $ZKLast=$dsatz_aus['zweikampf_anmeldung'];
  	        $Norm=$dsatz_aus['norm'];

  	        if($Norm=='Ja') $Norm=1;
  	        else            $Norm=0;

  	        $Mannschaft=0;

  	        $Mannschaft=$dsatz_aus['vereinswertung'];

  	        if($Mannschaft== 'Keine Mannschaft'){
  	            $Mannschaft=0;
  	        }
  	        else{

  	            $Mannschaft=intval(substr($Mannschaft, 0, 1)); //start at 0 length=1
  	        }


  	            $SQL_Mannschaft="SELECT * FROM mannschaften_".$data_a_db['S_Db']." Where IdVerein='$IdVerein'";
  	            $Mannschaft_Abfrage = dbBefehl($SQL_Mannschaft);

  	            $num_rows_Mannschaft=mysqli_num_rows($Mannschaft_Abfrage);

  	            if($num_rows_Mannschaft != 1){

  	                $SQL_Mann_Insert="INSERT INTO mannschaften_".$data_a_db['S_Db']."
  				       (IdVerein,Anzahl_M)
  	                   Values ('$IdVerein','$Mannschaft')";
  	                dbBefehl($SQL_Mann_Insert);
  	            }else{

  	              // $Mannschaft_Table = mysqli_fetch_assoc($Mannschaft_Abfrage);
  	              //  if($Mannschaft_Table['Anzahl_M'] < $Mannschaft){

  	              //      $SQL_Mann_Update="UPDATE heber_".$data_a_db['S_Db']."
  		          //        SET Anzahl_M= '$Mannschaft'
  		          //        WHERE IdHeber ='$IdHeber'
  		          //        ";
  	              //      dbBefehl($SQL_Mann_Update);
  	              //  }
  	            }


  	        if($Wk_Art=='ZK'){
  	           dbBefehl("INSERT INTO heber_".$data_a_db['S_Db']." (IdHeber,ZKLast,Norm_Heber,Mannschaft_Auswahl)
  	                       Values ('$IdHeber','$ZKLast','$Norm','$Mannschaft')");
  	        }else{
  	            dbBefehl("INSERT INTO heber_".$data_a_db['S_Db']." (IdHeber,ZKLast,Mannschaft_Auswahl)
  	                       Values ('$IdHeber','$ZKLast','$Mannschaft')");
  	        }
  	    } // end if not BL


  	       dbBefehl("INSERT INTO heber_wk_".$data_a_db['S_Db']." (IdHeber, Versuch)
  	               Values ('$IdHeber', '1')");

  	       dbBefehl("INSERT INTO heber_wk_".$data_a_db['S_Db']." (IdHeber, Versuch)
  	               Values ('$IdHeber', '2')");

  	       dbBefehl("INSERT INTO heber_wk_".$data_a_db['S_Db']." (IdHeber, Versuch)
  	               Values ('$IdHeber', '3')");


		}

	} //IdVerein != 0 fertig


}

//Update WK das erfolgreich gedownloaded wurde
//Set status='1' (1 bedeutet erfolgreich ausgelesen)

//Setzen der Zeitzohne
date_default_timezone_set("Europe/Berlin");
$Timestamp=date("Y-m-d H:i:s");


$SQL_erfolgreicher_Download="UPDATE ".$WkTabelle."
		SET status='1', updatetimestamp='$Timestamp'
		WHERE wettkampf_id ='$Id_Wettkampf'
		";
dbBefehlOnline($SQL_erfolgreicher_Download);
