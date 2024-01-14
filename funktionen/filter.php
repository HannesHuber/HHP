<?php


function filter($Art){         //$Art=0 f�r Meldeliste_anlegen; $Art=1 f�r Meldeliste und Grp_einteilung pro Heber (also nur ausgew�hlte Heber)
                               //$Art=2 f�r Wiegeliste  $Art=3 f�r WK Korektur

//HF --- add $VereinFilter                       
global $Verein, $VereinFilter, $heber, $heberNum, $Seiten, $data_a_db, $start, $Limit, $_SESSION;

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

if($Art==0) $_SESSION['Seite_Ml_A']==1;

if($stammdaten['Wk_Art']!='BL')  $dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);

if($stammdaten['Wk_Art']=='BL' && $Art!=0){
        //  $DataBlVerein=dbBefehl("SELECT * FROM verein, bl_vereins_auswahl_".$data_a_db['S_Db']."
        //                           WHERE bl_vereins_auswahl_".$data_a_db['S_Db'].".verein = verein.IdVerein");
        //  $Verein = mysqli_fetch_assoc($DataBlVerein);
}else{
    $Verein = dbBefehl("SELECT * FROM verein Order By Verein");
}
    $dataLand=dbBefehl("SELECT * FROM laender");


echo "<table class=tabelle border=\"5\" width=\"450\" cellpadding=\"4\" cellspacing=\"5\">";
echo "  <colgroup>
         <col width=\"28%\">
         <col width=\"28%\">
         <col width=\"28%\">
         <col width=\"16%\">

         </colgroup>";

echo "<tfoot>";
  echo "<tr>";

    echo "<td>";

         echo "Verein";

    echo "</td>";

if($Art==2){
    echo "<td>";
         echo "Gruppe";
    echo "</td>";
}elseif($Art==0){

	echo "<td>";
		echo 'Land';
	echo "</td>";

}
    echo "<td>";

    echo "</td>";

  echo "</tr>";


  echo "<tr>";

    echo"<td>";
         echo "<select name=\"Auswahl\" size=\"1\" class=\"Auswahl\"><br>";
         echo "<option value=\"\" selected>Wählen...</option>";

         if($Art==1 || $Art==2){
         	$ArrayVorhandeneVereine = ReturnArrayGemeldeteVereine();		//function in nuetzliches

         	foreach ($ArrayVorhandeneVereine as &$Verein) {
         		$get=str_replace(' ','_,_',$Verein);

         		echo "<option value=$get>$Verein</option>";
         	}

         }else if($stammdaten['Wk_Art']!='BL' || $Art==0){
           	while($dataAuswahl = mysqli_fetch_assoc($Verein))
            {
            	$merke=str_replace(' ','_,_',$dataAuswahl['Verein']);
                echo "<option value=$merke>".$dataAuswahl['Verein']."</option>";
            }
         }else{
          $ArrayVorhandeneVereine = ReturnArrayGemeldeteVereine();		//function in nuetzliches

         	foreach ($ArrayVorhandeneVereine as &$Verein) {
         		$get=str_replace(' ','_,_',$Verein);

         		echo "<option value=$get>$Verein</option>";
         	}
         }
            //  for($x=1;$x<=$stammdaten['Verein_Anzahl'];$x++){

            //     $merke=str_replace(' ','_,_',$Verein['Verein' . $x]);
            //     echo "<option value=" . $merke . ">" . $Verein['Verein' . $x] . "</option>";
            // }

         echo "</select>";
    echo "</td>";

if($Art==2){

    echo"<td>";

         echo "<select name=\"GrpAuswahl\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>Wählen...</option>";
           if($stammdaten['Wk_Art']!='BL'){
              while($dataAuswahl = mysqli_fetch_assoc($dbGruppen))
              {
                 $merke=str_replace(' ','_,_',$dataAuswahl['Gruppen']);
                 echo "<option value=$merke>" . $dataAuswahl['Gruppen'] . "</option>";
              }
            }else
                for($x=1;$x<=$stammdaten['Verein_Anzahl'];$x++)
                 echo "<option value=$x>$x</option>";

         echo "</select>";

    echo "</td>";

}

if($Art==0){
	echo"<td>";
	echo "<select name=\"Auswahl_Land\" size=\"1\" class=\"Auswahl\"><br>";
	echo "<option value=\"\" selected>Wählen...</option>";

		while($dataAuswahl = mysqli_fetch_assoc($dataLand))
		{
			$merke=str_replace(' ','_,_',$dataAuswahl['laender']);
			echo "<option value=$merke>".$dataAuswahl['laender']."</option>";
		}


	echo "</select>";
	echo "</td>";
}

    echo "<td align=\"center\">";

         echo "<input type=\"submit\" name=Filter value=\"Filtern\">";

    echo "</td>";

  echo "</tr>";

echo "</tfoot>";
echo "</table>";

if( isset($_POST['Filter']) || $_SESSION['Filter_isset']==1 )
{

$_SESSION['Filter_isset']=1;
$orginal=$_SESSION['Filter_orginal'];
$Grp=$_SESSION['Filter_gruppe'];
$Land=$_SESSION['Auswahl_Land'];

if(isset($_POST['Filter'])){
		 $_SESSION['Seite_Ml_A']=1;

         $orginal=str_replace('_,_',' ',$_POST['Auswahl']);
         $_SESSION['Filter_orginal']=$orginal;

         $Grp=$_POST['GrpAuswahl'];
         $_SESSION['Filter_gruppe']=$Grp;

         $Land=$_POST['Auswahl_Land'];
         $_SESSION['Auswahl_Land']=$Land;
}

         if($orginal != "")
         {
                switch ($Art) {
                   case 0:

                   	if($Land==""){
                   	 	$query="SELECT * FROM heber, verein
                                       WHERE Verein = '$orginal'
							   		   AND heber.IdVerein = verein.IdVerein
                                       ORDER BY heber.Name ASC
                                       ";
                   	}else{
                   		$query="SELECT * FROM heber, verein
                   					WHERE Verein = '$orginal'
							   		AND heber.IdVerein = verein.IdVerein
									AND Land = '$Land'
                   					ORDER BY heber.Name ASC
									";
                   	}
                         $heber = dbBefehl($query);

                         $heberNum = dbBefehl($query);

                         $numHeber = mysqli_num_rows($heberNum);
                         $Seiten=ceil($numHeber/$Limit);
                   break;

                   case 1:
                         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND Verein = '$orginal'
							   		   AND heber.IdVerein = verein.IdVerein
                                       ORDER BY heber.Name ASC
                                       ");

                         $heberNum = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND Verein = '$orginal'
							   		   AND heber.IdVerein = verein.IdVerein
                                       ORDER BY heber.Name ASC");

                         $numHeber = mysqli_num_rows($heberNum);
                         $Seiten=ceil($numHeber/$Limit);
                   break;

                   case 2:

                      if($Grp == ""){

                         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                       AND Verein = '$orginal'
							   			AND heber.IdVerein = verein.IdVerein
                                       ORDER BY heber.Name ASC");

                      }else{

                         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                       AND Verein = '$orginal'
                                       AND heber_".$data_a_db['S_Db'].".Gruppe='$Grp'
							   		AND heber.IdVerein = verein.IdVerein
                                       ORDER BY heber.Name ASC");

                      }
                   break;
                   case 3:

                         $heber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", verein
                                       WHERE heber.IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                                       AND Verein = '$orginal'
							   AND heber.IdVerein = verein.IdVerein
                                       ORDER BY heber.Name ASC
                                       ");

                   break;

                 }      //switch Ende

         }elseif($orginal == "" && ($Grp != "" || $Land != "")){               //if Auswahl!=''   Ende

                 if($Art==2){

                         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                                       WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                       AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                       AND heber_".$data_a_db['S_Db'].".Gruppe='$Grp'
							   AND heber.IdVerein = verein.IdVerein
                                       ORDER BY heber.Name ASC");


                 }elseif($Art==0){
                 	$Limit=$stammdaten['Anzahl_Heber_p_S'];                                                                                                                        //f�r den wettkampf ein h�ckchen haben!

                 	$start=($Limit*$_SESSION['Seite_Ml_A'])-$Limit;

                 		$query="SELECT * FROM heber, verein
                 						WHERE Land = '$Land'
							   AND heber.IdVerein = verein.IdVerein
                 						ORDER BY heber.Name ASC
										LIMIT $start, $Limit
                 						";
                 		$query2="SELECT * FROM heber, verein
                 						WHERE Land = '$Land'
							   AND heber.IdVerein = verein.IdVerein
                 						ORDER BY heber.Name ASC
                 						";

                 	$heber = dbBefehl($query);

                 	$heberNum = dbBefehl($query2);

                 	$numHeber = mysqli_num_rows($heberNum);
                 	$Seiten=ceil($numHeber/$Limit);

                 }
         }
                  // HF =================
		    $VereinFilter=$orginal;
}      //isset Filter Ende


return $numHeber;
}        //function ENDE
?>
