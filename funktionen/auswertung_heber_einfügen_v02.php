<?php


$columns_to_select = " * ";


if($stammdaten['Wk_Art'] != "ZK" && $stammdaten['Wk_Art'] != "BL")
{
    $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                    WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                    AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                    AND heber.IdVerein = verein.IdVerein
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
                ORDER BY heber.IdHeber ASC, heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                ");
    }
}

//Get Lifters from $heber:
$heber_ids = [];
while ($dsatz = mysqli_fetch_assoc($heber)) {
    $heber_ids[] = $dsatz['IdHeber'];
}
//Duplicate id's due to heber_wk_$wk_num => remove duplicates
$heber_ids = array_unique($heber_ids);

$query = "SELECT IdHeber FROM auswertung_" . $data_a_db['S_Db'] . " WHERE IdHeber IN (" . implode(",", $heber_ids) . ")";
$result = dbBefehl($query);

$existing_ids = [];
while ($row = mysqli_fetch_assoc($result)) {
    $existing_ids[] = $row['IdHeber'];
}

// Find missing IdHeber that are in $heber_ids but not in $existing_ids
$missing_ids = array_diff($heber_ids, $existing_ids);

// Loop through $missing_ids to insert them into auswertung table
foreach ($missing_ids as $id) {

    // Insert lifters
    if($stammdaten['Wk_Art'] != "ZK" && $stammdaten['Wk_Art'] != "BL")
    {
        $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                        WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                        AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                        AND heber.IdVerein = verein.IdVerein
                        AND heber.idHeber = '" . $id . "'
                        ORDER BY heber.IdHeber ASC, heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                        ");
    }else{
        if($stammdaten['Wk_Art'] == "BL"){
                $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                        WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                        AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                        AND heber.IdVerein = verein.IdVerein
                        AND heber.idHeber = '" . $id . "'
                        ORDER BY heber.IdHeber ASC, heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                        ");
        }else{
            $heber = dbBefehl("SELECT " . $columns_to_select . " FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                    WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                    AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                    AND heber.IdVerein = verein.IdVerein
                    AND heber.idHeber = '" . $id . "'
                    ORDER BY heber.IdHeber ASC, heber_wk_".$data_a_db['S_Db'].".Versuch ASC
                    ");
        }
    }
    $dsatz = mysqli_fetch_assoc($heber);

    if($dsatz['time_Reissen'] == NULL) $dsatz['time_Reissen'] =0;	//Für Korrekte if Abfrage beim Heber in auswertung aktualisieren
    if($dsatz['time_Stossen'] == NULL) $dsatz['time_Stossen'] =0;

    $AlKl=al_kl_heber ($dsatz['IdHeber'],$stammdaten);
    $GwKl=gw_kl_heber ($AlKl,$dsatz['IdHeber'],$stammdaten);

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

?>




</body>
</html>
