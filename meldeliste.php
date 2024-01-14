<?php
session_start();
if (empty($_SESSION['Seite_Ml'])) {
    $_SESSION['Seite_Ml'] = 1;
}
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

<script type='text/javascript'>
function showDiv() {
   document.getElementById('neuer_heber_BL').style.display = "block";
}
</script>

</head>



<body>



<form method="post" action="meldeliste.php">

<p class="kopf"><b>Meldeliste</b></p>

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>



<?php


ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/filter.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

$Limit=$stammdaten['Anzahl_Heber_p_S'];                                                                                                                        //fuer den wettkampf ein h�ckchen haben!

$start=($Limit*$_SESSION['Seite_Ml'])-$Limit;

if($stammdaten['Online_Wk']==1){
    $OnlineWk=1;
}else{
    $OnlineWk=0;
}


         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
			                         AND heber.IdVerein = verein.IdVerein
                               ORDER BY heber.Name COLLATE latin1_general_ci  ASC
                               LIMIT $start, $Limit") ;

         $heberNum = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               ORDER BY heber.Name ASC
                               ");

$numHeber = mysqli_num_rows($heberNum);
$Seiten=ceil($numHeber/$Limit);

         $Verein = dbBefehl("SELECT * FROM verein ORDER BY verein ASC");

$x=0;

filter(1);

echo"<br><br><br><br><br><br><br>";

echo"<div id=\"divid1\" class=\"examplediv\">";




echo "

<table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">



<thead>

 <tr>
  <th>Name</th>
  <th>Verein</th>
  <th>JG</th>
  <th>KoeGw</th>";
  if($stammdaten['DM']=='1') echo "<th>ZK Last</th>";
  echo"
  <th>Klasse</th>";
  if($stammdaten['Wk_Art']=='ZK'){
  	echo"<th>Klasse Überschreiben</th>"; //----	<th>Gesamt Grp</th>
  }
  if($stammdaten['Wk_Art']!='BL'){
      echo '<th>Mannschaft Auswahl</th>';
      if($stammdaten['Pokal']=='1'){
          echo '<th>Länder Mannschaft Auswahl</th>';
      }
  }

  if($stammdaten['MitNorm']=='1')
  	echo '<th>Norm</th>';
  echo"
  <th>Land</th>
  <th>M/W</th>
  <th>Ausser Konkurrenz</th>
  <th>Nach<br>Meldung</th>

 </tr>
</thead>
";





$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{


$i = $i+1;


     $Id="Id" . $i;
     $Loeschen="Loeschen" . $i;
     $Ausserkonkurrenz="Ausserkonkurrenz" . $i;
     $Konkurrenz="Konkurrenz" . $i;
     $Mannschaft="Mannschaft" . $i;
     $AlKlMain="AlKlMain" . $i;
     $ZKLast="ZKLast" . $i;
     $GesGrp="GesGrp" . $i;
     $Mannschaft_Auswahl="Mannschaft_Auswahl" . $i;
     $Laender_Mannschaft_Auswahl="Laender_Mannschaft_Auswahl" . $i;
     $NormHeber="NormHeber" . $i;
     $NachMeldung="NachMeldung" . $i;


echo "<input type=\"text\" name=$Id size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdHeber']."\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}





echo "<tr>";




     echo "<td>";



                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Name']." </span>";

                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Vorname']." </span>";

                 echo "<input type=\"submit\" name=$Loeschen value=\"Loeschen\">";




     echo "</td>";




     echo "<td>";                                                                                                // Spalte (Mit drop down bar)

          echo $dsatz['Verein'];

     echo "</td>";




     echo "<td>";


          echo $dsatz['Jahrgang'];


     echo "</td>";



     echo "<td>";


          echo $dsatz['Gewicht']."&nbsp; Kg";


     echo "</td>";

     if($stammdaten['DM']=='1'){
       echo "<td>";
           echo "<input type=\"text\" name=$ZKLast size=\"6\" value=\"".$dsatz['ZKLast']."\">";
       echo "</td>";
     }

     echo "<td>";
     	$AlKlAnzeige=al_kl_heber_ohne_AlKlMain ($dsatz['IdHeber'],$stammdaten);
     	echo $AlKlAnzeige;


     echo "</td>";

if($stammdaten['Wk_Art']=='ZK'){

     echo "<td>";                                                                                                // Spalte (Mit drop down bar)

          echo "<select name=\"$AlKlMain\" size=\"1\" class=\"Auswahl\">";

          echo "<option value=NULL>--------</option>";

          if($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']!='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);

          elseif($stammdaten['Wk_Art']=='M_m_T' || $stammdaten['Wk_Art']=='M_o_T')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen");

          elseif($stammdaten['Wk_Art']=='ZK' && $stammdaten['Masters']=='1')
                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_masters");


                       while($dataAus_AlKl = mysqli_fetch_assoc($DataAlKl))
                       {
                                 if($dsatz['AlKlMain']==$dataAus_AlKl['Klasse'])
                                 {
                                         $Safe_AlKl=$dsatz['AlKlMain'];
                                         echo "<option value=$Safe_AlKl selected>".$dataAus_AlKl['Klasse']."</option>";
                                 }
                                 else{
                                         $Safe_AlKl=$dataAus_AlKl['Klasse'];
                                         echo "<option value=$Safe_AlKl>".$dataAus_AlKl['Klasse']."</option>";
                                 }
                        }
                  echo "</select>";

         echo "</td>";




/*
     echo "<td>";

        if ($dsatz[GesGrp]==0)
          echo "<input type=\"checkbox\" name=\"$GesGrp\" value=\"1\">";
        elseif ($dsatz[GesGrp]==1)
          echo "<input type=\"checkbox\" name=\"$GesGrp\" value=\"1\" checked>";


     echo "</td>";
*/

} //if ZK ENDE

if($stammdaten['Wk_Art']!='BL'){

	$DBVerein = dbBefehl("SELECT * FROM mannschaften_".$data_a_db['S_Db']."
			WHERE IdVerein = '$dsatz[IdVerein]'
			");
	$DataMannschaften = mysqli_fetch_assoc($DBVerein);
	$NumberMannschaften = $DataMannschaften['Anzahl_M'];

	echo "<td>";

	echo "<select name=\"$Mannschaft_Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

	//echo "<option value=\"\" selected>W�hlen...</option>";
	echo "<option value='0' selected>0</option>";
	if($NumberMannschaften>=0)
		for($z=1;$z<=$NumberMannschaften;$z++){
			if($z== $dsatz['Mannschaft_Auswahl'])
				echo "<option value=$z selected>$z</option>";
			else
				echo "<option value=$z>$z</option>";
		}


	echo "</select>";


	/*
	if ($dsatz[Mannschaft_Auswahl]==0)
		echo "<input type=\"checkbox\" name=\"$Mannschaft_Auswahl\" value=\"1\">";
	elseif ($dsatz[Mannschaft_Auswahl]==1)
		echo "<input type=\"checkbox\" name=\"$Mannschaft_Auswahl\" value=\"1\" checked>";

	*/

	echo "</td>";
}

//L�ndermannschaft-Auswahl fuer Schueler-Pokal
if($stammdaten['Pokal']=='1'){



    echo "<td>";

    echo "<select name=\"$Laender_Mannschaft_Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

    //echo "<option value=\"\" selected>W�hlen...</option>";
    echo "<option value='0' selected>----</option>";

    if($dsatz['Laender_Mannschaft_Auswahl'] == 1)
        echo "<option value=1 selected>Auswahl</option>";
    else
        echo "<option value=1 >Auswahl</option>";
    echo "</select>";


     echo "</td>";
} //If Pokal Ende


if($stammdaten['MitNorm']=='1'){
echo "<td>";
if($AlKlAnzeige==$stammdaten['NormAlKl']){
	echo "<input type=\"checkbox\" name=\"$NormHeber\" value=\"1\" checked onclick=\"return false;\">";

	if($dsatz['Norm_Heber']==0){
	    dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                                         SET Norm_Heber= '1'
                                         WHERE IdHeber ='$dsatz[IdHeber]' ");

	}
}

else{
	if ($dsatz['Norm_Heber']==0)
		echo "<input type=\"checkbox\" name=\"$NormHeber\" value=\"1\">";
	elseif ($dsatz['Norm_Heber']==1)
		echo "<input type=\"checkbox\" name=\"$NormHeber\" value=\"1\" checked>";
}
echo "</td>";
}



echo "<td>";

$Verein=dbBefehl("SELECT * FROM verein WHERE IdVerein='" . $dsatz['IdVerein']. "' ");
$dataVerein= mysqli_fetch_assoc($Verein);

$Land=dbBefehl("SELECT * FROM laender WHERE Idlaender='" . $dataVerein['IdLaender']. "' ");
$dataLand= mysqli_fetch_assoc($Land);

echo $dataLand['laender'];

echo "</td>";

if($dataLand['laender'] != $dsatz['Land']){
    dbBefehl("UPDATE heber
                              SET Land = '" . $dataLand['laender']. "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
}

     if($dsatz['Geschlecht']=='Weiblich') $MW='W';
     else								$MW='M';


     echo "<td>";
     	echo $MW;
     echo "</td>";


         echo "<td>";
            echo "<span style=\"width:150px;display:block;float:left;\">".$dsatz['Ausserkonkurrenz']."</span>";

                                 if($dsatz['Ausserkonkurrenz']=="Ausserkonkurrenz")
                                 	echo "<input type=\"submit\" name=$Konkurrenz value=\"Unset AK\">";
                                 else
                                 	echo "<input type=\"submit\" name=$Ausserkonkurrenz value=\"Set AK\">";

         echo "</td>";

     if($stammdaten['Wk_Art']!='BL'){
         echo "<td>";
         if($dsatz['Nach_Meldung']==1)
         	echo "<input type=\"checkbox\" name=$NachMeldung checked value=\"1\">";
         else
         	echo "<input type=\"checkbox\" name=$NachMeldung value=\"1\">";

         echo "</td>";
      }

echo "</tr>";



         if(isset($_POST['Ausserkonkurrenz' . $i]))
         {
                 $x=1;

                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Ausserkonkurrenz = 'Ausserkonkurrenz'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");


         }


         if(isset($_POST['Konkurrenz' . $i]))
         {

                 $x=1;

                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Ausserkonkurrenz = ''
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");


         }







         if(isset($_POST['Loeschen' . $i]))                                                                                          //Loeschen
         {

           $x=1;

                 HeberLoeschen($_POST['Id' . $i]);   //Delet IdHeber aus, heber_$num, heber_wk_$num und auswertung_$num
                                                     //"funktionen/nuetzliches.php

         }



         //Ermittlung if isset von Seiten Nummer wurde gedrückt
         for($SeitenZaeler=1; $SeitenZaeler<=$Seiten; $SeitenZaeler++){
         	$N_Seite="Seite" . $SeitenZaeler; //
         	if(isset($_POST[$N_Seite])) { $SaveVariable=1;}
         }

         if(isset($_POST['speichern']) || isset($_POST['SeiteZurueck']) || isset($_POST['SeiteVor']) || $SaveVariable==1)
         {
            $x=1;

             if($stammdaten['Wk_Art']=='ZK'){

                 $IdHeber=$_POST['Id' . $i];

                 if($stammdaten['MitNorm']=='1'){

                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                                         SET ZKLast= '" . $_POST[$ZKLast] . "', GesGrp= '" . $_POST[$GesGrp] . "',
											Mannschaft_Auswahl= '" . $_POST[$Mannschaft_Auswahl] . "',
											Norm_Heber= '" . $_POST[$NormHeber] . "',
											Nach_Meldung= '" . $_POST[$NachMeldung] . "'
                                         WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
                  }else{
                  	dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                  			SET ZKLast= '" . $_POST[$ZKLast] . "', GesGrp= '" . $_POST[$GesGrp] . "',
											Mannschaft_Auswahl= '" . $_POST[$Mannschaft_Auswahl] . "',
											Nach_Meldung= '" . $_POST[$NachMeldung] . "'
                                         WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
                  }

                 $Data_Auswertung=dbBefehl("SELECT * FROM auswertung_".$data_a_db['S_Db']." WHERE IdHeber='" . $_POST['Id' . $i] . "'");
                 $num_Aus=mysqli_num_rows($Data_Auswertung);





                 if($_POST[$GesGrp]!=NULL && $_POST[$GesGrp]!='0'){
                   if($num_Aus==1){

                         $A_K_GesGrp=$stammdaten['GesGrpAlKl'];
                         $G_K_GesGrp=gw_kl_heber ($A_K_GesGrp,$IdHeber,$stammdaten);

                         dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                         SET Al_Kl_GesGrp= '$A_K_GesGrp', Gw_Kl_GesGrp= '$G_K_GesGrp'
                                         WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
                   }
                 }


                 if($_POST['AlKlMain' . $i]=='NULL'){
                         safe_AlKl_GwKl ($IdHeber,$stammdaten);
                         dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                                         SET AlKlMain= ''
                                         WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

                 }
                 else{

                         $A_K=$_POST['AlKlMain' . $i];
                         $G_K=gw_kl_heber ($A_K,$IdHeber,$stammdaten);

                         dbBefehl("UPDATE heber
                                         SET AlKl= '$A_K', GwKl= '$G_K'
                                         WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

                         dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                                         SET AlKlMain= '$A_K'
                                         WHERE IdHeber ='" . $_POST['Id' . $i] . "'");


                         if($num_Aus==1){
                             dbBefehl("UPDATE auswertung_".$data_a_db['S_Db']."
                                         SET Al_Kl= '$A_K', Gw_Kl= '$G_K'
                                         WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
                         }
                 }
             }else{ // if ZK ENDE
                 if($stammdaten['Pokal']=='1'){
                     $Safe_String="Laender_Mannschaft_Auswahl= '" . $_POST[$Laender_Mannschaft_Auswahl] . "',";
                 }else{
                     $Safe_String="";
                 }

             	dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
             			  	SET Mannschaft_Auswahl= '" . $_POST[$Mannschaft_Auswahl] . "',
											$Safe_String
                                            Nach_Meldung= '" . $_POST[$NachMeldung] . "'
                            WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
             }
         }




}
echo "</tbody>";
echo "</table>";



if($OnlineWk==1){

    echo '<div id="neuer_heber_BL">';

    echo '<table id="neuer_heber_tabelle">';
    echo '<tr>';
    echo '<td>';
    echo 'AthletId:';
    echo '</td>';

    echo '<td>';
    echo '<input type="input" name="athlet_id" value="">';
    echo '</td>';

    echo '<td>';
    echo 'Vorname:';
    echo '</td>';

    echo '<td>';
    echo '<input type="input" name="athlet_vorname" value="">';
    echo '</td>';

    echo '<td>';
    echo 'Name:';
    echo '</td>';

    echo '<td>';
    echo '<input type="input" name="athlet_name" value="">';
    echo '</td>';

    echo '<td>';

    echo "<select name=\"AuswahlSend\" STYLE=\"$style; $stylezwei;\" size=\"1\" class=\"Auswahl\"><br>";

    echo "<option value=\"9000\" selected>Kein Verein</option>";

    $query="SELECT * FROM verein Order By verein.Verein";

    $dataHeberfuerVereine=dbBefehl($query);

    while($dataFuerVereine = mysqli_fetch_assoc($dataHeberfuerVereine)){
        $IdVerein=$dataFuerVereine['IdVerein'];

        echo "<option value=$IdVerein>".$dataFuerVereine['Verein']."</option>";

    }


    echo "</select>";


    echo '</td>';


    echo '</tr>';


    echo '<tr>';

    echo '<td>';
    echo 'AthletId-Wiederholen:';
    echo '</td>';

    echo '<td>';
    echo '<input type="input" name="athlet_id_wiederholung" value="">';
    echo '</td>';


    echo '<td>';
    echo 'Geschlecht:';
    echo '</td>';


    echo '<td>';
    echo "<select id=\"Auswahl\" name=\"Geschlecht\" size=\"1\" class=\"Auswahl\"><br>";

    for($kkk=1;$kkk<=2;$kkk++){
        if($kkk==1) $Ges='M';
        else $Ges='W';

        echo "<option value=$kkk>$Ges</option>";
    }

    echo "</select>";
    echo '</td>';

    echo '<td>';
    echo 'Jahrgang:';
    echo '</td>';

    echo '<td>';
    echo '<input type="input" name="Jahrgang" value="">';
    echo '</td>';




    echo '</tr>';

    echo '</table>';

    echo '<br>';
    echo '<input type="submit" id="neuer_heber_erstellen" name="neuer_heber_erstellen" value="Erstellen">';

    echo '<br>';
    echo '<br>';
    echo '<input type="submit" id="neuer_heber_erstellen" name="close" value="Schliessen">';

    echo '</div>';




    if(isset($_POST['neuer_heber_erstellen']) )                                                       //Mehr Zeilen
    {

        if(!isInteger($_POST['athlet_id'])){
            echo"
                <script>
                    alert('Athleten Id ist keine gueltige Zahl!');
                </script>
                ";
        }else{

            
            $Jahrgang = isset($_POST['Jahrgang']) ? (int)$_POST['Jahrgang'] : null;
            $currentYear = date('Y'); // Get the current year
            
            // Calculate age based on the current year and Jahrgang
            $age = $currentYear - $Jahrgang;
            
            // Check if Jahrgang is within realistic bounds by calculating the age
            if($Jahrgang === null || $age < 6 || $age > 100) {
                echo "
                    <script>
                        alert('Das Alter muss zwischen 6 und 100 Jahren liegen, basierend auf dem Jahrgang!');
                    </script>
                ";
            }elseif($_POST['athlet_id']=='' || ($_POST['athlet_id'] != $_POST['athlet_id_wiederholung']) )                                                       //Mehr Zeilen
            {
                echo"
                <script>
                    alert('Athleten Id wurde nicht richtig ausgefuellt!');
                </script>
                ";

            }else{

                $IdHeber_Online=$_POST['athlet_id'];
                $Vorname=$_POST['athlet_vorname'];
                $Name=$_POST['athlet_name'];

                if($_POST['Geschlecht']==1) $Geschlecht='Männlich';
                else                        $Geschlecht='Weiblich';


                if( check_if_online_id_exists($_POST['athlet_id']) == 0){   //Aus funktionen/nuetzliches

                    $IdVerein= $_POST['AuswahlSend'];
                    // echo "insert";
                    // echo $IdVerein;

                    dbBefehl("INSERT INTO heber (Id_Online_Db, Name, Vorname, Geschlecht, Jahrgang,
                                             IdStaat, IdVerein, Bundesliga, Gewicht)
                            Values ('$IdHeber_Online','$Name', '$Vorname', '$Geschlecht', '$Jahrgang',
                                    '1','$IdVerein', '1', '1')");

                }else{
                  $IdVerein= $_POST['AuswahlSend'];
                  // echo "update";
                  // echo $IdVerein;

                    dbBefehl("Update heber
                            Set Name='$Name', Vorname='$Vorname', Geschlecht= '$Geschlecht', IdVerein= '$IdVerein', Bundesliga='1', Jahrgang= '$Jahrgang'
                            Where Id_Online_Db= '$IdHeber_Online'
                        ");
                }
                $IdHeber=get_id_heber_from_id_online($IdHeber_Online);
                safe_AlKl_GwKl ($IdHeber,$stammdaten);
                heber_in_wk_tabellen($IdHeber);

               $x=1;

            }
        }//If athlet id is integer



    }   //If isset neuer Heber

}   //If wk = Online WK


if($OnlineWk==1){
    echo '<br>
    <br>
    <input type="button" name="answer" value="Neuer Heber" onclick="showDiv()" />';

    echo '<br>
    <br>';
}





if($_SESSION['Seite_Ml_A']!=1)
echo '<input class="But" type="submit" name="SeiteZurueck" value="<">';

for($SeitenZaeler=1; $SeitenZaeler<=$Seiten; $SeitenZaeler++){

$N_Seite="Seite" . $SeitenZaeler;

    if($SeitenZaeler==$_SESSION['Seite_Ml'])
        echo "<input id=\"AktuelleSeite\" class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";
    else
        echo "<input class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";

    if(isset($_POST[$N_Seite])) { $_SESSION['Seite_Ml']=$SeitenZaeler; $x=1;}

}
echo '<input class="But" type="submit" name="SeiteVor" value=">">';

if(isset($_POST['SeiteZurueck'])){ $_SESSION['Seite_Ml']--; $x=1;}
if(isset($_POST['SeiteVor'])){ $_SESSION['Seite_Ml']++; $x=1;}



if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'meldeliste.php'
   },0)
 </script>
";
}





?>



<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">

<br>
<br>
<br>
<br>
</form>
</body>
</html>
