<?php
session_start();
if (empty($_SESSION['Filter_orginal'])) {
    $_SESSION['Filter_orginal'] = "";
}
if (empty($_SESSION['Filter_gruppe'])) {
    $_SESSION['Filter_gruppe'] = "";
}
if (empty($_SESSION['Filter_isset'])) {
    $_SESSION['Filter_isset'] = 0;
}
if (empty($_SESSION['Auswahl_Land'])) {
	$_SESSION['Auswahl_Land'] = "";
}
if (empty($_SESSION['Seite_Wiege_A'])) {
    $_SESSION['Seite_Wiege_A'] = 1;
}
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/table.css">


<script type='text/javascript' src="jquery-2.2.1.min.js"></script>
<script type='text/javascript' src="JS/verein_heber_wahl.js"></script>

</head>



<body>



<form method="post" action="wiegelisten.php">

<p class="kopf"><b>Heber</b></p>


<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>

<span id="ajax-loeschen"></span>

<div id="modal">
  <div class="spinner">
     <div class="bounce1"></div>
     <div class="bounce2"></div>
     <div class="bounce3"></div>
  </div>
</div>

<?php


ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/filter.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$NurEinmalUserBlock=0;
$NurEinmalAuslaenderCheck=0;
$ErrorAuslaender=0;
$AusländerReissen=array();
$AusländerStossen=array();

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);


$Limit=$stammdaten['Anzahl_Heber_p_S'];                                                                                                                        //fuer den wettkampf ein h�ckchen haben!
$start=($Limit*$_SESSION['Seite_Wiege_A'])-$Limit;

if ($stammdaten['LosNummern']==1)  LosNrVerteiler($data_a_db['S_Db']);          //f�r automatische Verteilung der LosNr

// echo $_SESSION['Seite_Wiege_A'],':', $start,':', $Limit;

    $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                        WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                        AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                        AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                        AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                        AND heber.IdVerein = verein.IdVerein
                        ORDER BY heber_".$data_a_db['S_Db'].".Gruppe DESC, heber.IdVerein, heber.Gewicht
                        LIMIT $start, $Limit");

    $Verein = dbBefehl("SELECT * FROM verein");

    # Get number sides to scroll:
    $heberNum = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
    WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
    AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
    AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
    AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
    AND heber.IdVerein = verein.IdVerein
    ORDER BY heber_".$data_a_db['S_Db'].".Gruppe ASC, heber.IdVerein, heber.Gewicht");

    $numHeber = mysqli_num_rows($heberNum);
    $Seiten=ceil($numHeber/$Limit);

$x=0;


filter(2); //von Include 2 f�r wiegeliste



echo"<div id=\"divid1\" class=\"examplediv\">";




echo "

<table class=\"tabelle\"  border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
";

echo"  <colgroup>
    <col width=\"380\">
    <col width=\"300\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"150\">
    <col width=\"50\">
    <col width=\"150\">";
if($stammdaten['StartNr']=='1'){
	echo "<col width=\"150\">";
}
echo"
  </colgroup>";

echo"
<thead>

 <tr>
  <th>Name</th>
  <th>Verein</th>";
if($stammdaten['Wk_Art']=='BL') echo '<th>Gruppe</th>';
else echo '<th>Jahrgang</th>';


echo "
  <th>Klasse</th>
  <th>Gewicht</th>
  <th>1. Versuch Reissen</th>
  <th>1. Versuch Stossen</th>";

if($stammdaten['StartNr']=='1'){
	echo "<th>Start Nummer</th>";
}

if($stammdaten['Wk_Art']=='BL'){
    echo '<th>R/S</th>';
    echo '<th>Wertung als</th>';

}else echo "<th>Los Nummer</th>";

echo"
  <th>Geschlecht</th>


 </tr>
</thead>";



echo "<br><br><br><br><br><br><br>";


$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($heber))        // Anlegen der Tabelle(IdHeber muss ai sein)
{

if($stammdaten['MitNorm'] == 1){
	safe_GwKl_Norm_in_Auswertung ($dsatz['IdHeber'],$stammdaten);
}


$i = $i+1;

     $Id="Id" . $i;
     $Loeschen="Loeschen" . $i;
     $Ausserkonkurrenz="Ausserkonkurrenz" . $i;
     $Konkurrenz="Konkurrenz" . $i;
     $Mannschaft="Mannschaft" . $i;
     $Gewicht="Gewicht" . $i;
     $V1R="V1R" . $i;
     $V1S="V1S" . $i;
     $LosNr="LosNr" . $i;
     $Gruppe="Gruppe" . $i;
     $RoS="RoS" . $i;
     $Nation="Nation" . $i;
     $Verein='Verein' . $i;
     $StartNr='StartNr' . $i;


echo "<input type=\"text\" name=$Id size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdHeber']."\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}


echo "<tr align=\"center\" >";


     echo "<td>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Vorname']." </span>";
                 echo "<button type=\"button\" onclick=\"kick(this.value)\" value=\"".$dsatz['IdHeber']."\">Loeschen</button>";

     echo "</td>";


     echo "<td>";
     echo "<input type=\"text\" id=\"transparent\" name=$Verein value=\"".$dsatz['Verein']."\" readonly>";
     echo "</td>";


     echo "<td>";

       if($stammdaten['Wk_Art']=='BL'){

         echo "<select name=\"$Gruppe\" size=\"1\" class=\"Auswahl\">";

         $DGruppe = dbBefehl("SELECT Gruppe
                              FROM heber_".$data_a_db['S_Db']."
                              WHERE IdHeber = '" . $dsatz['IdHeber'] . "'
                              ");
         echo "<option value=\"\" selected>Wähle..</option>";

         $DGrp = mysqli_fetch_assoc($DGruppe);

                        for($x=1;$x<=$stammdaten['Verein_Anzahl']+1;$x++){
                            if($x==$DGrp['Gruppe'])
                                echo "<option value=$x selected>$x</option>";
                            else
                                echo "<option value=$x>$x</option>";
                        }
        echo "</select>";

       }else
          echo $dsatz['Jahrgang'];


     echo "</td>";



     echo "<td>";
         echo (al_kl_heber ($dsatz['IdHeber'],$stammdaten));        //Aus N�tzliches!
     echo "</td>";


     echo "<td>";
          echo "<input type=\"text\" name=$Gewicht size=\"2\" value=\"".$dsatz['Gewicht']."\"> Kg";
     echo "</td>";


     echo "<td>";
          echo "<input type=\"text\" name=$V1R size=\"2\" value=\"".$dsatz['Reissen']."\"> Kg";
     echo "</td>";


     echo "<td>";
          echo "<input type=\"text\" name=$V1S size=\"2\" value=\"".$dsatz['Stossen']."\"> Kg";
     echo "</td>";

     if($stammdaten['StartNr']=='1'){
     	echo "<td>";
     		echo "<input type=\"text\" name=$StartNr size=\"1\" value=\"".$dsatz['StartNr']."\">";
     	echo "</td>";
     }

     echo "<td>";
          if($stammdaten['Wk_Art']=='BL'){

                 echo "<select name=\"$RoS\" size=\"1\" class=\"Auswahl\">";

                 $DRuoS = dbBefehl("SELECT *
                                    FROM heber_".$data_a_db['S_Db']."
                                    WHERE IdHeber = '" . $dsatz['IdHeber'] . "'
                                    ");

                 $RuoS = mysqli_fetch_assoc($DRuoS);

                       for($x=0;$x<3;$x++){

                         switch ($x) {
                            case 0:
                                 $RoSArt='R+S';
                                 break;
                            case 1:
                                 $RoSArt='R';
                                 break;
                            case 2:
                                 $RoSArt='S';
                                 break;
                         }

                            if($x==$RuoS['R_uo_S'])
                                echo "<option value=$x selected>$RoSArt</option>";
                            else
                                echo "<option value=$x>$RoSArt</option>";
                      }
                 echo "</select>";

          }else{

                 if($stammdaten['LosNummern']==1) echo "$dsatz[LosNr]";
                 else                             echo "<input type=\"text\" name=$LosNr size=\"1\" value=\"".$dsatz['LosNr']."\">";


          }
     echo "</td>";
     if($stammdaten['Wk_Art']=='BL'){


     echo "<td>";


     if($dsatz['Auslaenderwertung']==0){
         echo "<input type=\"text\" id=\"transparent\" name=$Nation size=\"6\" value=\"Deutscher\" readonly>";
         $ArrayHeberNation[$i]=1; //Deutsch = 1
     }else{
         echo "<input type=\"text\" id=\"transparent\" name=$Nation size=\"6\" value=\"Ausländer\" readonly>";
         $ArrayHeberNation[$i]=2; //nicht Deutsch != 1
     }
     echo "</td>";

     }

     echo "<td>";
          echo $dsatz['Geschlecht'];
     echo "</td>";


echo "</tr>";

         if($dsatz['AlKlMain']=='')
                 safe_AlKl_GwKl($dsatz['IdHeber'],$stammdaten);     //Speichert Al-und Gw_Klasse In nuetzliches
                // safe_GwKl_Norm_in_Auswertung($dsatz[IdHeber],$stammdaten);

                
        //Ermittlung if isset von Seiten Nummer wurde gedrückt
        for($SeitenZaeler=1; $SeitenZaeler<=$Seiten; $SeitenZaeler++){
            $N_Seite="Seite" . $SeitenZaeler; //
            if(isset($_POST[$N_Seite])) { $SaveVariable=1;}
        }

         if(isset($_POST['speichern']) || isset($_POST['SeiteZurueck']) || isset($_POST['SeiteVor']) || $SaveVariable==1)
         {
             if($stammdaten['Wk_Art']=='BL'){
             if($NurEinmalAuslaenderCheck==0){
                 $NurEinmalAuslaenderCheck++;

                 for($z=1;$z<=$num_rows_heber;$z++){

                     if($_POST['Nation' . $z]!="Deutscher" && $_POST['Gruppe' . $z] != ""){ //Post Gruppe ist "0" "1" oder "2"

                        switch ($_POST['RoS' . $z]) {
                            case 0:
                                $AusländerReissen[$_POST['Verein' . $z]]++;
                                $AusländerStossen[$_POST['Verein' . $z]]++;
                                break;
                            case 1:
                                $AusländerReissen[$_POST['Verein' . $z]]++;
                                break;
                            case 2:
                                $AusländerStossen[$_POST['Verein' . $z]]++;
                                break;
                        }
                    }
                }

                foreach ($AusländerReissen as $key => $value){

                    if($value > 2){
                        $ErrorAuslaender=1;
                    }
                }

                foreach ($AusländerStossen as $key => $value){

                    if($value > 2){
                        if($ErrorAuslaender==1) $ErrorAuslaender=3;
                        else $ErrorAuslaender=2;
                    }
                }


                if($ErrorAuslaender==1){
                    echo"
                        <script>
                            alert('Es wurde nicht gespeichert! Mehr als 2 Ausländer im Reissen, pro Verein!!!')
                        </script>
                        ";
                }
                if($ErrorAuslaender==2){
                    echo"
                        <script>
                            alert('Es wurde nicht gespeichert! Mehr als 2 Ausländer im Stossen, pro Verein!!!')
                        </script>
                        ";
                }
                if($ErrorAuslaender==3){

                    echo"
                        <script>
                            alert('Es wurde nicht gespeichert! Mehr als 2 Ausländer im Reissen und Stossen, pro Verein!!!')
                        </script>
                        ";

                }

             }
             }  //If WK_Art=BL ENDE


             if($ErrorAuslaender==0){


             $x=1;

             if($NurEinmalUserBlock==0){
                 if($stammdaten['Wk_Art']!='M_m_T' && $stammdaten['Wk_Art']!='M_o_T' && $stammdaten['Wk_Art']!='BL'){
                 	dbBefehl("UPDATE user_blocker_".$data_a_db['S_Db']."
										SET Wiegeliste = '1',
											GrpEinteilung = '0'");
             	}else{
             		dbBefehl("UPDATE user_blocker_".$data_a_db['S_Db']."
             				SET Wiegeliste = '1'");
             	}
                 $NurEinmalUserBlock++;
             }

             $number=htmlspecialchars($_POST['Gewicht' . $i]);

                 $gewicht=str_replace(",",".", $number);

                 dbBefehl("UPDATE heber
                              SET Gewicht= '$gewicht'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

               if($stammdaten['Wk_Art']=='BL'){
                    dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Gruppe='" . $_POST['Gruppe' . $i] . "', R_uo_S='" . $_POST['RoS' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
               }else{
                   if($stammdaten['LosNummern']==0){
                         dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                                         SET LosNr='" . $_POST['LosNr' . $i] . "'
                                         WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
                   }
               }

               if($stammdaten['StartNr']==1){
               		dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
               					SET StartNr='" . $_POST['StartNr' . $i] . "'
                                WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
               }

               //1.Versuch in DB mit automatischen steigerung

               $Data_HeberWkV1=dbBefehl("SELECT Reissen,Stossen FROM heber_wk_".$data_a_db['S_Db']."
                                            WHERE IdHeber='" . $_POST['Id' . $i] . "'
                                            AND Versuch= '1' ");

               $d_HeberWkV1 = mysqli_fetch_assoc($Data_HeberWkV1);

               $DB_R1=$d_HeberWkV1['Reissen'];
               $DB_S1=$d_HeberWkV1['Stossen'];


               $VersuchR1=(int)$_POST['V1R' . $i];
               $VersuchR2=$VersuchR1+1;
               $VersuchR3=$VersuchR1+2;

               $VersuchS1=(int)$_POST['V1S' . $i];
               $VersuchS2=$VersuchS1+1;
               $VersuchS3=$VersuchS1+2;

               if($VersuchR1 != $DB_R1 || $VersuchS1 != $DB_S1 ){


                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $VersuchR1 . "', Stossen= '" . $VersuchS1 . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '1'
                              ");

                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $VersuchR2 . "', Stossen= '" . $VersuchS2 . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '2'
                              ");

                 dbBefehl("UPDATE heber_wk_".$data_a_db['S_Db']."
                              SET Reissen= '" . $VersuchR3 . "', Stossen= '" . $VersuchS3 . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'
                              AND Versuch = '3'
                              ");
               }

                 $Data_Auswertung=dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db']." WHERE IdHeber='" . $_POST['Id' . $i] . "'");
                 $num_Aus=mysqli_num_rows($Data_Auswertung);

                     if($num_Aus==1){
                         $IdHeber=$dsatz['IdHeber'];
                         $A_K_GesGrp=$stammdaten['GesGrpAlKl'];
                         $G_K_GesGrp=gw_kl_heber ($A_K_GesGrp,$IdHeber,$stammdaten);

                         if($stammdaten['Wk_Art']=='ZK'){
                         	dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         			SET K_Gewicht= '$gewicht', Al_Kl_GesGrp= '$A_K_GesGrp', Gw_Kl_GesGrp= '$G_K_GesGrp'
                         			WHERE IdHeber ='$IdHeber'");
                         }else{
                         	dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                         			SET K_Gewicht= '$gewicht'
                         			WHERE IdHeber ='$IdHeber'");
                         }

                     }

             }  //If Error Ausländer ==0 ENde


             dbBefehl("UPDATE tmp_ss_reload_1
                              SET AnsagerR= '1', HeberRaumR='1', UebersichtR='1'
                       ");

             dbBefehl("UPDATE tmp_ss_reload_2
                              SET AnsagerR= '1', HeberRaumR='1', UebersichtR='1'
                       ");

         }





         if(isset($_POST['Loeschen' . $i]))                                                                                          //Loeschen
         {

          $x=1;

                 HeberLoeschen($_POST['Id' . $i]);   //Delet IdHeber aus, heber_$num, heber_wk_$num und auswertung_$num
                                                     //"funktionen/nuetzliches.php
         }




}
echo "</tbody>";
echo "</table>";



if($_SESSION['Seite_Wiege_A']!=1)
echo '<input class="But" type="submit" name="SeiteZurueck" value="<">';

for($SeitenZaeler=1; $SeitenZaeler<=$Seiten; $SeitenZaeler++){

	$N_Seite="Seite" . $SeitenZaeler;

    if($SeitenZaeler==$_SESSION['Seite_Wiege_A'])
        echo "<input id=\"AktuelleSeite\" class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";
    else
        echo "<input class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";

    if(isset($_POST[$N_Seite])) { $_SESSION['Seite_Wiege_A']=$SeitenZaeler; $x=1;}

}
echo '<input class="But" type="submit" name="SeiteVor" value=">">';

if(isset($_POST['SeiteZurueck'])){ $_SESSION['Seite_Wiege_A']--; $x=1;}
if(isset($_POST['SeiteVor'])){ $_SESSION['Seite_Wiege_A']++; $x=1;}



// //-----AUSWERTUNG-----------------------
// $auswerte_Gruppe=0;											//Damit in Auswertung �ber alle Gruppen Ausgewertet wird
// include 'funktionen/auswertung.php';                          //Keine Funktion sondern einfach php einschub
// include 'funktionen/platzierung.php';
// //--------------------------------------



if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'wiegelisten.php'
   },0)
 </script>
";
}






?>


<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">
<br>
<br><br>
<br>





</form>
</body>
</html>
