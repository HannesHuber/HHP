<?php



$time=getdate();
//$Verein = dbBefehl("SELECT * FROM verein");	//Kann Wahrscheinlich weg
if ($stammdaten['Wk_Art']=='BL'){
         $Data_Bl_Verein = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']);
         $Bl_Verein=mysqli_fetch_assoc($Data_Bl_Verein);

         $arrayVereinR=array();
         $arrayVereinS=array();
         $arrayVereinRuS=array();
         $arrayVerein1u2=array();
}

$zaehler=0;



if($auswerte_Gruppe==0)
	$dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']);	//Für über alle Gruppen
else
	$dbGruppen = dbBefehl("SELECT * FROM gruppen_zeit_".$data_a_db['S_Db']." WHERE Gruppen='$auswerte_Gruppe' ");		//Damit nur �ber relevante Grp gegangen wird z.B. f�r �bersicht



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


        while($dA_Kl = mysqli_fetch_assoc($A_Kl))                                                      // Definition der Jahrg�nge
        {
                echo $dA_Kl;

                    
                $wk_num = $data_a_db['S_Db'];  // This should be dynamically set based on your application logic    

                $columns_to_select = "
                heber.IdHeber, 
                heber.Jahrgang, 
                heber.Gewicht, 
                heber.Geschlecht, 
                heber_{$wk_num}.GesGrp,
                heber_wk_{$wk_num}.time_Stossen,
                heber_wk_{$wk_num}.Gueltig_Reissen,
                heber_wk_{$wk_num}.Gueltig_Stossen,
                heber_wk_{$wk_num}.Reissen,
                heber_wk_{$wk_num}.time_Reissen,
                heber_wk_{$wk_num}.Stossen
                ";
                
                if($stammdaten['Wk_Art']=='M_m_T'){    
                        $columns_to_select .= ",
                        heber_wk_{$wk_num}.Technik_Reissen,
                        heber_wk_{$wk_num}.Technik_Stossen
                        ";
                }


                if($stammdaten['Wk_Art'] != "ZK" && $stammdaten['Wk_Art'] != "BL")
                {

                        $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                                        WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                        AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                        AND heber.AlKl= '$dA_Kl[Klasse]'
                                        AND heber.IdVerein = verein.IdVerein
                                        AND heber_".$data_a_db['S_Db'].".Gruppe= '$Gruppe_Auswertung'
                                        ORDER BY heber.IdHeber ASC, heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                                        ");

                }else{

                        if($stammdaten['Wk_Art'] == "BL"){
                                $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                                        WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                        AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                        AND heber.IdVerein = verein.IdVerein
                                        ORDER BY heber.IdHeber ASC, heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                                        ");
                        }else{
                                $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                                        WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                                        AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                                        AND heber.IdVerein = verein.IdVerein
                                        AND heber_".$data_a_db['S_Db'].".Gruppe= '$Gruppe_Auswertung'
                                        ORDER BY heber.IdHeber ASC, heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                                        ");
                        }

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

                        if($dsatz['time_Reissen'] == NULL) $dsatz['time_Reissen'] =0;	//Für Korrekte if Abfrage beim Heber in auswertung aktualisieren
                        if($dsatz['time_Stossen'] == NULL) $dsatz['time_Stossen'] =0;

                        $AlKl=al_kl_heber ($dsatz['IdHeber'],$stammdaten);
                        $GwKl=gw_kl_heber ($AlKl,$dsatz['IdHeber'],$stammdaten);

                        $Alter=$time['year']-$dsatz['Jahrgang'];                                                                                                              //Safe in auswertung_ ...

                        $auswertung = dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db']." WHERE IdHeber='".$dsatz['IdHeber']."'");
                        // $dauswertung = mysqli_fetch_assoc($auswertung);

                        $up_a = 0;

                        $AnzahlReihen=mysqli_num_rows($auswertung);

                        if($AnzahlReihen==1) $up_a = 1;

                        if($up_a == "0")
                        {
                                //RelativGewichtbestimmen
                                $relGw=relativGewicht($dsatz['Gewicht'], $dsatz['Geschlecht']);

                                if($stammdaten['Wk_Art'] == "M_m_T")
                                {

                                        dbBefehl("INSERT INTO auswertung_".$data_a_db['S_Db']." (IdHeber,Al_Kl, Gw_Kl, K_Gewicht, R_Gewicht, R_1, S_1, R_1_G, S_1_G, R_1_Te, S_1_Te, R_1_t, S_1_t)
                                        Values ('".$dsatz['IdHeber']."',
                                                '$AlKl',
                                                '$GwKl',
                                                '".$dsatz['Gewicht']."',
                                                '$relGw',
                                                '".$dsatz['Reissen']."',
                                                '".$dsatz['Stossen']."',
                                                '".$dsatz['Gueltig_Reissen']."',
                                                '".$dsatz['Gueltig_Stossen']."',
                                                '".$dsatz['Technik_Reissen']."',
                                                '".$dsatz['Technik_Stossen']."',
                                                '".$dsatz['time_Reissen']."',
                                                '".$dsatz['time_Stossen']."')");

                                }elseif($stammdaten['Wk_Art'] == "M_o_T"){

                                        dbBefehl("INSERT INTO auswertung_".$data_a_db['S_Db']." (IdHeber,Al_Kl, Gw_Kl, K_Gewicht, R_Gewicht, R_1, S_1, R_1_G, S_1_G, R_1_t, S_1_t)
                                        Values ('".$dsatz['IdHeber']."',
                                                '$AlKl',
                                                '$GwKl',
                                                '".$dsatz['Gewicht']."',
                                                '$relGw',
                                                '".$dsatz['Reissen']."',
                                                '".$dsatz['Stossen']."',
                                                '".$dsatz['Gueltig_Reissen']."',
                                                '".$dsatz['Gueltig_Stossen']."',
                                                '".$dsatz['time_Reissen']."',
                                                '".$dsatz['time_Stossen']."')");

                                }elseif($stammdaten['Wk_Art'] == "ZK"){

                                        $zk_query="INSERT INTO auswertung_".$data_a_db['S_Db']." (IdHeber,Al_Kl,Gw_Kl, K_Gewicht, R_Gewicht, R_1, S_1, R_1_G, S_1_G, R_1_t, S_1_t)
                                        Values ('".$dsatz['IdHeber']."',
                                                '$AlKl',
                                                '$GwKl',
                                                '".$dsatz['Gewicht']."',
                                                '$relGw',
                                                '".$dsatz['Reissen']."',
                                                '".$dsatz['Stossen']."',
                                                '".$dsatz['Gueltig_Reissen']."',
                                                '".$dsatz['Gueltig_Stossen']."',
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

                                }else{

                                        $zk_query="INSERT INTO auswertung_".$data_a_db['S_Db']." (IdHeber,Al_Kl,Gw_Kl, K_Gewicht, R_Gewicht, R_1, S_1, R_1_G, S_1_G)
                                        Values ('".$dsatz['IdHeber']."',
                                                '$AlKl',
                                                '$GwKl',
                                                '".$dsatz['Gewicht']."',
                                                '$relGw',
                                                '".$dsatz['Reissen']."',
                                                '".$dsatz['Stossen']."',
                                                '".$dsatz['Gueltig_Reissen']."',
                                                '".$dsatz['Gueltig_Stossen']."')";

                                        dbBefehl($zk_query);

                                        if($dsatz['GesGrp']==1){

                                                $A_K_GesGrp=$stammdaten['GesGrpAlKl'];
                                                $G_K_GesGrp=gw_kl_heber ($A_K_GesGrp,$dsatz['IdHeber'],$stammdaten);

                                                dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                                                SET Al_Kl_GesGrp= '$A_K_GesGrp', Gw_Kl_GesGrp= '$G_K_GesGrp'
                                                                WHERE IdHeber ='".$dsatz['IdHeber']."'");
                                        }
                                }
                        }


                }  //schliest innere Schleife

        }   //schliest altersklassen def. schleife

}   //Schliest über Gruppen


?>




</body>
</html>
