<?php
$heber_abfrage = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                      WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                      AND heber_".$data_a_db['S_Db'].".Gruppe = '$AtGrp'
                      ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC,
                      heber.Name ASC");
?>
