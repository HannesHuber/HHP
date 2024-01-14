<?php

 // �ber Altersklassen und GwKL

$Grp = $dNow['Gruppe'];

$GruppeVergleich=0;

for($i=0;$i<2;$i++){

if($i==0)$ges='M';
else $ges='W';

$daGwKl= dbBefehl("SELECT * FROM gewichtsklassen");

         $g=0;

         while($dsatzGwKl = mysqli_fetch_assoc($daGwKl)){           //echo $dsatzGwKl['E_' . $ges] . $ges . '|';

                 $Platz=0;
                 $PlR=0;
                 $PlS=0;

                 if($i==0)$geschlecht='Männlich';
                 else $geschlecht='Weiblich';

                 if($dsatzGwKl['Aktive_' . $ges]==1) $MaxGewicht=10000;
                 else $MaxGewicht=$dsatzGwKl['Aktive_' . $ges];

         $daHeber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                               WHERE heber.IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               AND heber.Geschlecht = '$geschlecht'
                               AND heber.Gewicht <= '$MaxGewicht'
                               AND heber.Gewicht > '$g'
                               ORDER BY auswertung_".$data_a_db['S_Db'].".Z_K DESC
                               ");

                 if(mysqli_num_rows($daHeber)!=0) $GruppeVergleich++;

                 while($dsatzHeber = mysqli_fetch_assoc($daHeber)){
                         if($dsatzHeber[Z_K]>0)$Platz++;
                         $arrayZP[$Grp][$dsatzHeber['IdHeber']][0]=$dsatzHeber[Z_K];      //$arrayRP[gruppe][IdHeber][0=Punkte][1=Platz]
                         $arrayZP[$Grp][$dsatzHeber['IdHeber']][1]=$Platz;
                         $arrayZP[$Grp][$dsatzHeber['IdHeber']][2]=$GruppeVergleich;     //Um zu sehen wer gegen wen k�mpft

                 }

         $daHeber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                               WHERE heber.IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               AND heber.Geschlecht = '$geschlecht'
                               AND heber.Gewicht <= '$MaxGewicht'
                               AND heber.Gewicht > '$g'
                               ORDER BY auswertung_".$data_a_db['S_Db'].".R_B DESC
                               ");

                 while($dsatzHeber = mysqli_fetch_assoc($daHeber)){


                         if($dsatzHeber['R_B']>0)$PlR++;
                         $arrayRP[$Grp][$dsatzHeber['IdHeber']][0]=$dsatzHeber['R_B'];      //$arrayRP[gruppe][IdHeber][0=Punkte][1=Platz]
                         $arrayRP[$Grp][$dsatzHeber['IdHeber']][1]=$PlR;
                 }


         $daHeber = dbBefehl("SELECT * FROM heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db']."
                               WHERE heber.IdHeber = auswertung_".$data_a_db['S_Db'].".IdHeber
                               AND heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                               AND heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               AND heber.Geschlecht = '$geschlecht'
                               AND heber.Gewicht <= '$MaxGewicht'
                               AND heber.Gewicht > '$g'
                               ORDER BY auswertung_".$data_a_db['S_Db'].".S_B DESC
                               ");

                 while($dsatzHeber = mysqli_fetch_assoc($daHeber)){
                         if($dsatzHeber['S_B']>0)$PlS++;
                         $arraySP[$Grp][$dsatzHeber['IdHeber']][0]=$dsatzHeber['S_B'];      //$arrayRP[gruppe][IdHeber][0=Punkte][1=Platz]
                         $arraySP[$Grp][$dsatzHeber['IdHeber']][1]=$PlS;
                 }


$g=$dsatzGwKl['Aktive_' . $ges];

       }
}

?>
