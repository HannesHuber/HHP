<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/urkunden.css" />
<link rel="stylesheet" type="text/css" href="CSS/urkunden_print.css" media="print" />

</head>

<body>

<form method="post" action="urkunde.php">

<p class="kopf"><b>Urkunde</b></p>


<a href="auswertung.php" title="Link zur Auswertung" id="range-logo">Auswertung</a>


<?php

ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);



if($stammdaten['Wk_Art']=='M_m_T') $M_m_T=1;
else $M_m_T=0;

if($_SESSION['Urk_Mk_Kg']==1) $Mk_Kg=1;
else $Mk_Kg=0;

if($_SESSION['Mk_Auswahl_Art']==1) $stammdaten['Wk_Art']='ZK';


$auswerte_Gruppe=0;											//Damit in Auswertung �ber alle Gruppen Ausgewertet wird
//include 'funktionen/auswertung.php';

$Verein = dbBefehl("SELECT * FROM verein");

$A_Kl = dbBefehl("SELECT * FROM alters_klassen");

$AlKl=$_SESSION['Ur_name_AlKl'];
$Grp=$_SESSION['Urk_Grp'];

echo"<input type=\"submit\" id=\"button\" name=\"Plus\" value=\"+\">";
echo"<input type=\"submit\" id=\"button\" name=\"Minus\" value=\"-\">";



if(isset($_POST['Plus']))
{
   $stammdaten['Urkunden_hoehe']++;
   $U_h=$stammdaten['Urkunden_hoehe'];

         dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
                      SET Urkunden_hoehe= '$U_h'
                      ");
}
if(isset($_POST['Minus']))
{
	$stammdaten['Urkunden_hoehe']--;
	$U_h=$stammdaten['Urkunden_hoehe'];

         dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
                      SET Urkunden_hoehe= '$U_h'
                      ");
}

$i = 0;
//Foer �ber die WkGruppe

if($stammdaten['Wk_Art']=='ZK')
{
   $arrayWkGrp = array();

   if($_SESSION['Ur_AlKl']==0)   $arrayWkGrp[] = $Grp;
   else                          $arrayWkGrp[] = $AlKl;


}else{
    if($stammdaten['Grp_Einteilung'] == 1){
        $arrayWkGrp = array();
        $arrayWkGrp[] = $Grp;

    }else{
        $DataWkGruppen = dbBefehl("SELECT * FROM grp_".$data_a_db['S_Db']." Where Gruppe='$Grp'");
        $arrayWkGrp = array();
        while ($WkGrp = mysqli_fetch_assoc($DataWkGruppen))
            $arrayWkGrp[]=$WkGrp['Gruppe_Aus'];
    }


}

if($_SESSION['Urk_Art']==1){	//F�r Mannschafts Urkunden
	$arrayWkGrp = array();
	$arrayWkGrp[] = 1;	//Einfach damit man in die for each schleife kommt
}

foreach ($arrayWkGrp as &$Grp) {

         //F�r �ber die WkGrupp

$time=getdate();


if($_SESSION['Urk_Art']==0){      // Nur 1 f�r mannschaft   2 F�r GesGrp

     if($stammdaten['Wk_Art']=='ZK'){

       if($_SESSION['GrpUndAlKl_Urkunde']==0){
       	if($stammdaten['Masters']==1){
       	    if($_SESSION['Urk_GwKl']==1){
       	        $Platz_Name='Platz_GwKl';
       	        $Punkte_Name='Z_K';
       	        $Einheit_Name='Kg';
       	    }else{
       	        $Platz_Name='Platz_Sin';
       	        $Punkte_Name='Sinclair_P_Malone_Meltzer';
       	        $Einheit_Name='Pkt';
       	    }

       	}else{
         if($stammdaten['Hauptauswertung']==0){

             //Zeile 120
             if($_SESSION['Urk_RoderS'] == 0){
                 if($M_m_T==1){
                     if($Mk_Kg==1) $Platz_Name='Platz_ZK_Kg';
                     else $Platz_Name='Platz_ZK';

                 }else
                    $Platz_Name='Platz_GwKl';

                 if($Mk_Kg==1)  $Punkte_Name='ZK_Kg';
                 else   $Punkte_Name='Z_K';

             }elseif($_SESSION['Urk_RoderS'] == 1){
                 $Platz_Name='Platz_R';
                 $Punkte_Name='R_B';
             }elseif($_SESSION['Urk_RoderS'] ==2){
                 $Platz_Name='Platz_S';
                 $Punkte_Name='S_B';
             }
             if($M_m_T==1 && $Mk_Kg==0)
                    $Einheit_Name='Pkt';
                else
                    $Einheit_Name='Kg';

         }elseif($stammdaten['Hauptauswertung']==1){
                 $Platz_Name='Platz_RP';
                 $Punkte_Name='Relativ_P';
                 $Einheit_Name='Pkt';
         }elseif($stammdaten['Hauptauswertung']==2){
                 $Platz_Name='Platz_Sin';
                 $Punkte_Name='Sinclair_P';
                 $Einheit_Name='Pkt';
         }
       	}
       	if($_SESSION['Ur_AlKl']==0){

                 $heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
                                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   			 AND heber.IdVerein = verein.IdVerein
                                         ORDER BY auswertung_".$data_a_db['S_Db'].".Al_Kl DESC,
                                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                                         auswertung_".$data_a_db['S_Db'].".$Platz_Name ASC
                                         ");
         }else{

                 $heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
                                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                         AND heber.AlKl = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                                         ORDER BY auswertung_".$data_a_db['S_Db'].".Al_Kl DESC,
                                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                                         auswertung_".$data_a_db['S_Db'].".$Platz_Name ASC
                                         ");
         }

       }else{    //Ende $_SESSION['GrpUndAlKl_Urkunde']==0

           if($_SESSION['Urk_RoderS'] == 0){
               $Platz_Name='Platz_GwKl';
               $Punkte_Name='Z_K';
           }elseif($_SESSION['Urk_RoderS'] == 1){
               $Platz_Name='Platz_R';
               $Punkte_Name='R_B';
           }elseif($_SESSION['Urk_RoderS'] ==2){
               $Platz_Name='Platz_S';
               $Punkte_Name='S_B';
           }
           $Einheit_Name='Kg';

           //echo $_SESSION['Urk_RoderS'];
                 $heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
                                         WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                         AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                         AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                                         AND heber.AlKl= '$AlKl'
							             AND heber.IdVerein = verein.IdVerein
                                         ORDER BY auswertung_".$data_a_db['S_Db'].".Al_Kl DESC,
                                         auswertung_".$data_a_db['S_Db'].".Gw_Kl DESC,
                                         auswertung_".$data_a_db['S_Db'].".$Platz_Name ASC
                                         ");

       }         //Ende $_SESSION['GrpUndAlKl_Urkunde']!=0

     }else{		//Ende ZK

     	if($_SESSION['Mk_Auswahl_Art']==0){
     		$Platz_Name='Platz_MK';
     		$Punkte_Name='M_K_G';
     		$Einheit_Name='Pkt';
     	}else{	//$_SESSION['Mk_Auswahl_Art']=1
     		$Platz_Name='Platz_ZK';
     		$Punkte_Name='Z_K';
     		$Einheit_Name='Kg';
     	}

     	if($stammdaten['Grp_Einteilung'] == 1){

     	    $query="SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
     					WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
     					AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
     					AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
     					ORDER BY auswertung_".$data_a_db['S_Db'].".$Punkte_Name DESC
     					";
     	}else{

     	    $query="SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
     					WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
     					AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
     					AND heber_".$data_a_db['S_Db'].".Gruppe_Aus = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
     					ORDER BY auswertung_".$data_a_db['S_Db'].".$Punkte_Name DESC
     					";
     	}
     	$heber_aus = dbBefehl($query);
     }

}

if($_SESSION['GesGrp_Urkunde']==1){           //schliest if urkunden art ist mannschaft  + Anfang GesGrp

   if($Grp==0){
         $heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
							   AND heber.IdVerein = verein.IdVerein
                                   ORDER BY auswertung_".$data_a_db['S_Db'].".GwKl_GesGrp_Platz ASC
                                   ");
   }else{
         $heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
                                   WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                   AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                   AND heber_".$data_a_db['S_Db'].".GesGrp = '1'
                                   AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
							   AND heber.IdVerein = verein.IdVerein
                                   ORDER BY auswertung_".$data_a_db['S_Db'].".GwKl_GesGrp_Platz ASC
                                   ");
   }

}

echo"<div id=\"divid1\" class=\"examplediv\">";

$timestamp = time();
$datum = date("d.m.y", $timestamp);

if($_SESSION['Urk_Art']==1){                                    // schliest if urk_art ist nicht mannschaft

	$heber_aus = dbBefehl("SELECT * FROM auswertung_mannschaft_".$data_a_db['S_Db'].", verein
							WHERE auswertung_mannschaft_".$data_a_db['S_Db'].".IdVerein = verein.IdVerein
							ORDER BY Platz ASC
	");

}

if($_SESSION['UrkundeMitNorm']==1){

	if($_SESSION['Urk_RoderS'] == 0)
		$Platz_Name='Platz_Norm';
	elseif($_SESSION['Urk_RoderS'] == 1)
		$Platz_Name='Platz_R_Norm';
	elseif($_SESSION['Urk_RoderS'] ==2)
		$Platz_Name='Platz_S_Norm';

	//$Platz_Name='Platz_Norm';
	$heber_aus = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db'].", heber, heber_".$data_a_db['S_Db'].", verein
			WHERE auswertung_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			AND heber_".$data_a_db['S_Db'].".IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
			AND heber_".$data_a_db['S_Db'].".Norm_Heber = '1'
			AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
			AND heber.IdVerein = verein.IdVerein
			ORDER BY auswertung_".$data_a_db['S_Db'].".$Platz_Name ASC
			");
}

if($_SESSION['Urk_Laenderwertung']==1){

	$heber_aus = dbBefehl("SELECT * FROM laenderwertung_".$data_a_db['S_Db']."
							ORDER BY Lw_Platz ASC
						  ");

}



while($dsatz = mysqli_fetch_assoc($heber_aus))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{

if($_SESSION['Urk_Art']==0){
    if($stammdaten['Wk_Art']=='ZK'){
        if($_SESSION['GesGrp_Urkunde']==1){      $Platz=$dsatz['GwKl_GesGrp_Platz']; }
        else{                                    $Platz=$dsatz[$Platz_Name]; }
   }else $Platz=$dsatz['Platz_MK'];
}else $Platz=$dsatz['Platz'];

if($_SESSION['Urk_Laenderwertung']) $Platz=$dsatz["Lw_Platz"];



if($Platz!=0){

$i++;
if($i!=1)
echo '<div id="page-break"></div>';

echo "<table class=\"tabelle\" cellpadding=\"2\" cellspacing=\"2\" border= \"0\" width=\"100%\" >
";

if($_SESSION['Urk_Laenderwertung']==1){

	if($stammdaten['Laenderwertung']=='2'){
		$DLand= dbBefehl("SELECT * FROM laender WHERE laender='".$dsatz['Ver_Lan_Sta']."'");
		$DataLand = mysqli_fetch_assoc($DLand);
		$dsatz['Ver_Lan_Sta']=$DataLand['laender_lang'];

	}

	echo "<tr><th>";

			echo "<h1>";

			for($x=0; $x<$stammdaten['Urkunden_hoehe']; $x++) echo '<br>';
				if($stammdaten['Laenderwertung']=='1') echo "Der ";
				echo "$dsatz[Ver_Lan_Sta]";

			echo "</h1>";

	echo "</th></tr>";

	echo "<tr><th><h2>";
		echo "belegte mit ".$dsatz['Lw_Punkte']." Pkt.";
	echo "</h2></th></tr>";

	echo "<tr><th><h3>";
	echo "den ".$dsatz['Lw_Platz'].".Platz";
	echo "</h3></th></tr>";

}else{

echo "<tr>";


     echo "<th>";

                 echo "<h1>";

                 for($x=0; $x<$stammdaten['Urkunden_hoehe']; $x++) echo '<br>';

                    if($_SESSION['Urk_Art']==0) echo $dsatz['Vorname'] . " " . $dsatz['Name'];


                 echo "</h1>";


     echo "</th>";


echo "</tr>";

echo "<tr>";


	if($_SESSION['Urk_Art']==0){
		echo "<td> <h2> ".$dsatz['Verein']."</h2> </td>";
	}
	else{
		echo "<th> <h1> Der Verein </h1>  </th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th> <h1> ".$dsatz['Verein']." </h1>  </th>";
	}


echo "</tr>";

if($_SESSION['Urk_Art']==0){
	if($stammdaten['Wk_Art']=='ZK'){
		if($stammdaten['Masters']==0 || $_SESSION['Urk_GwKl']==1){
 if($stammdaten['Rel_Sin_AlKl']==1 || ($stammdaten['Rel_Sin_AlKl']==0 && $stammdaten['Hauptauswertung']==0)){
  echo "<tr>";
      echo "<td>";
                 if($_SESSION['GesGrp_Urkunde']==1)      $AlKl_Anzeige=$dsatz['Al_Kl_GesGrp'];
                 else                                    $AlKl_Anzeige=$dsatz['Al_Kl'];

                 if($_SESSION['UrkundeMitNorm']==1)		$AlKl_Anzeige=$stammdaten['NormAlKl'];

                 if($_SESSION['Urk_RoderS'] == 0)
                 	$string_einschub="in";
                 elseif($_SESSION['Urk_RoderS'] == 1)
                 	$string_einschub="im Reissen in";
                 elseif($_SESSION['Urk_RoderS'] ==2)
                 	$string_einschub="im Stossen in";

                 	if($stammdaten['EineKlasse'] == '1'){
                 		echo "<h2>belegte in der</h2>";
                 	}else{
                 		echo "<h2>belegte $string_einschub der Altersklasse <span style='font-size: 110%;'>$AlKl_Anzeige</span></h2>";
                 	}

                 	/* font-weight: normal; <span style='font-weight:bold;'> </span>  <span style='font-weight:bolder;'>*/

      echo "</td>";
  echo "</tr>";
 }else{
   echo "<tr>";
      echo "<td>";
         echo "<h2> belegte </h2>";
      echo "</td>";
  echo "</tr>";
 }

 if($stammdaten['Rel_Sin_AlKl']==0 && $stammdaten['Hauptauswertung']==0 && $M_m_T!=1 ){
  if($dsatz['Gw_Kl']>0) $dsatz['Gw_Kl']='+' . $dsatz['Gw_Kl'];

  echo "<tr>";
      echo "<td>";
                 if($_SESSION['GesGrp_Urkunde']==1)      $GwKlAnzeige=$dsatz['Gw_Kl_GesGrp'];
                 else                                    $GwKlAnzeige=$dsatz['Gw_Kl'];

                 echo "<h2>Gewichtsklasse <span style='font-size: 110%;'>$GwKlAnzeige Kg</span></h2>";
      echo "</td>";
  echo "</tr>";
 }
}else{ //F�r Masters
	echo "<tr>";
	echo "<td>";
		echo "<h2>belegte</h2>";
	echo "</td>";
	echo "</tr>";
}
}
else{

  echo "<tr>";
      echo "<td>";
                 echo "<h2> belegte in dem Jahrgang ".$dsatz['Jahrgang']."</h2>";
      echo "</td>";
  echo "</tr>";

}
}else{

  echo "<tr>";
      echo "<td>";
                 echo "<h2> belegte mit der ".$dsatz['Mannschaft'].". Mannschaft</h2>";
      echo "</td>";
  echo "</tr>";


}

if($_SESSION['Urk_Art']==0){
    $Punkte=$dsatz[$Punkte_Name];
    $name=$Einheit_Name;

}else $Punkte=$dsatz['Punkte'];

echo "<tr>";
     echo "<td>";
     echo "<h2> mit <span style='font-size: 110%;'>$Punkte</span> $name</h2>";
     echo "</td>";
echo "</tr>";


echo "<tr>";

     echo "<td>";
     echo "<h3> den <span style='font-size: 130%;'>$Platz.</span> Platz</h3>";       //&nbsp
     echo "</td>";

echo "</tr>";

echo "<tr>";
echo "<td>";
echo "<h2>".$stammdaten['Meisterschaft']."</h2>";
echo "</td>";

echo "</tr>";

/*
echo "<tr>";
echo "<td>";
echo "<h2> Ingolstadt 22./23. Juni 2018</h2>";
echo "</td>";
echo "</tr>";
*/

echo "</table>";



if($stammdaten['UrkName1']!=''||$stammdaten['UrkName2']!=''){
    echo "<br><br><br><br>";
  /* echo "<table class=\"�berTabelleUnterschriften\">";
    echo'<tr>';
    echo'<td>';
*/
    echo "<table class=\"Unterschriften-Table\">";
    echo'<colgroup>';
    echo'<col >';
    echo'<col width=10%>';
    echo'<col >';
    echo'</colgroup>';

    echo'<tr>';
    echo'<td id="Unt-align-rechts">'.$stammdaten['UrkName1'].'</td>';
    echo'<td></td>';
    echo'<td>'.$stammdaten['UrkName2'].'</td>';
    echo'<td></td>';
    echo'</tr>';
    echo'<tr>';
    echo'<td id="Unt-align-rechts">'.$stammdaten['UrkName3'].'</td>';
    echo'<td></td>';
    echo'<td>'.$stammdaten['UrkName4'].'</td>';
    echo'<td></td>';
    echo'</tr>';
    echo "</table>";
   /*
    echo'</td>';
    echo'</tr>';
    echo "</table>";
    */

} // If UrkName != ''


} // if nicht Laenderwertung Ende

} //if Platz !=   Ende

}


}        //foreach fertig



?>

</form>

</body>
</html>
