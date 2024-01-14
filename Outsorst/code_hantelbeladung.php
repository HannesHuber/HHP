<?php

$leftCSS=33.5;	//Da fängt der Stopper an in %

if($dGeschlecht['Geschlecht'] == 'Weiblich') 	$HantelLabel='W';
else											$HantelLabel='M';

echo '<div id="divStange"> </div>'; //'.$HantelLabel.'
echo '<div id="divStopper"> </div>';

echo '<p class="showGwBox"><span id="showGw">'.$HantelLabel.': '.$Hantel_Gewicht.' kg</span></p>';

//$Hantel_Gewicht=187;

function EchoDivScheibe($ScheibeGw){
	global $leftCSS;
	
	switch ($ScheibeGw) {
		case 25000:
			$widthCSS=6;
			break;
		case 20000:
			$widthCSS=5;
			break;
		case 15000:
			$widthCSS=4.5;
			break;
		case 10000:
			$widthCSS=4;
			break;
		case 5000:
			$widthCSS=2.6;
			break;
		case 2500:
			$widthCSS=2.3;
			break;
		case 2000:
			$widthCSS=2.1;
			break;
		case 1500:
			$widthCSS=2;
			break;
		case 1000:
			$widthCSS=1.9;
			break;
		case 500:
			$widthCSS=1.8;
			break;
	}
	
	if($ScheibeGw>=10000){
		echo ' <div class="Scheibe Gross" id="kg'.$ScheibeGw.'" 
					style="left:'.$leftCSS.'%; width:'.$widthCSS.'%;  "> 
		</div>';
		$leftCSS+=$widthCSS;
	}else{
		echo ' <div class="Scheibe" id="kg'.$ScheibeGw.'"
					style="left:'.$leftCSS.'%; width:'.$widthCSS.'%;  ">
		</div>';
		$leftCSS+=$widthCSS;
	}
	
	
}

$JahrJetzt = date('Y');
$JahrGang = $dGeschlecht['Jahrgang'];
$AK= $JahrJetzt - $JahrGang;

if($dGeschlecht['Geschlecht'] == 'Weiblich' || $AK<= 14) 	$HantelStange=15000;
else														$HantelStange=20000;

//echo $HantelStange;

$Hantel_Gewicht=$Hantel_Gewicht*1000;

$ArrayScheibenGw=array();
$ScheibenZahl=array();

//Gewichtsangaben in Gramm damit kg= key sein kann in array (kg*1000=gramm)
$ArrayScheibenGw[]=25000;
$ArrayScheibenGw[]=20000;
$ArrayScheibenGw[]=15000;
$ArrayScheibenGw[]=10000;
$ArrayScheibenGw[]=5000;
$ArrayScheibenGw[]=2500;
$ArrayScheibenGw[]=2000;
$ArrayScheibenGw[]=1500;
$ArrayScheibenGw[]=1000;
$ArrayScheibenGw[]=500;


$Verschluss=2500;

$ScheibenGW = ( $Hantel_Gewicht - $HantelStange)/2;

if( ($ScheibenGW - $Verschluss) >=0){
	$ScheibenGW= $ScheibenGW - $Verschluss;
	
	
	foreach ($ArrayScheibenGw as $KG){
		$ScheibenZahl[$KG] = floor($ScheibenGW/$KG);
		$ScheibenGW = ($ScheibenGW % $KG);
		
	}
	
	foreach ( $ScheibenZahl as $key => $Anzahl){
		$ScheibeGw=$key;
		//echo $ScheibeGw.'|'.$Anzahl.'<br>';
		
		for($i=1; $i<=$Anzahl; $i++){
			EchoDivScheibe($ScheibeGw);
		}
	}
	
	
	$widthCSS=3;
	echo ' <div class="Scheibe" id="verschluss1"
					style="left:'.$leftCSS.'%; width:'.$widthCSS.'%;  ">
		</div>';
	$leftCSS+=$widthCSS/1.5;
	
	$widthCSS=3;
	echo ' <div class="Scheibe" id="verschluss2"
					style="left:'.$leftCSS.'%; width:'.$widthCSS.'%;  ">
		</div>';
	$leftCSS+=$widthCSS;
	
}else{

	foreach ($ArrayScheibenGw as $KG){
		$ScheibenZahl[$KG] = floor($ScheibenGW/$KG);
		$ScheibenGW = ($ScheibenGW % $KG);
		
	}
	
	foreach ( $ScheibenZahl as $key => $Anzahl){
		$ScheibeGw=$key;
		//echo $ScheibeGw.'|'.$Anzahl.'<br>';
		
		for($i=1; $i<=$Anzahl; $i++){
			EchoDivScheibe($ScheibeGw);
		}
	}
	
}

echo'<div id="new_load"></div>';

//<div id="ScheibenBox"></div>


/*
			25	/	20	/	15	/	10 kg Scheibe => Hoehe = 450mm 
Breite:		67		54		42		34

			5	 kg Scheibe => Hoehe = 230mm 
Breite:		26,5
			
			2,5	 kg Scheibe => Hoehe = 230mm 
Breite:		26,5


 */


?>








