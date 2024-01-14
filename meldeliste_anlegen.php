<?php
session_start();
if (empty($_SESSION['Seite_Ml_A'])) {
    $_SESSION['Seite_Ml_A'] = 1;
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
</head>



<body>

<form method="post" action="meldeliste_anlegen.php">

<p class="kopf"><b>Heber</b></p>

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

$NurEinmalUserBlock=0;

$Limit=$stammdaten['Anzahl_Heber_p_S'];                                                                                                                        //fuer den wettkampf ein h�ckchen haben!
$start=($Limit*$_SESSION['Seite_Ml_A'])-$Limit;
                                                                                                                         //passt sich dynamisch der db an!
//�berarbeiten!!-----------------------------------------------------------------------------------------------------------------------------
// Zu Wk Anlegen dazu machen!!!! ==> nur einmaliges Laden bei WK aufruf danach wird ja Meldeliste mit aktuallisiert....


       // dbBefehl("UPDATE heber SET Auswahl=''");

         $String="Auswahl";
         $alleHeberAuswahl = dbBefehl("SELECT * FROM heber WHERE Auswahl = 'Auswahl'");



         while($dataHeberAuswahl = mysqli_fetch_assoc($alleHeberAuswahl))
         {
             $HeberAuswahlData = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db']."
                                            WHERE IdHeber = ".$dataHeberAuswahl['IdHeber']);

             $checkAuswahl = mysqli_num_rows($HeberAuswahlData);

             if($checkAuswahl==0){
                 dbBefehl("UPDATE heber
                              SET Auswahl=''
                              WHERE IdHeber = ".$dataHeberAuswahl['IdHeber']);
             }


         }


         $aktu_auswahl = dbBefehl("SELECT heber.IdHeber,heber.Auswahl, heber_".$data_a_db['S_Db'].".IdHeber
                                    FROM heber, heber_".$data_a_db['S_Db']."
                                      WHERE heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber");

         //$numnum=mysqli_num_rows($aktu_auswahl);



         while($dataAktuell = mysqli_fetch_assoc($aktu_auswahl))
         {
             if($dataAktuell['Auswahl']!="Auswahl"){
                 dbBefehl("UPDATE heber
                              SET Auswahl='Auswahl'
                              WHERE IdHeber = ".$dataAktuell['IdHeber']);
         	}
         }

         //heber.Auswahl Aktuallisierrung ENDE-------------------------------------------------------------------------------------------


         $heber = dbBefehl("SELECT * FROM heber ORDER BY heber.Name ASC LIMIT $start, $Limit");

         $heberNum = dbBefehl("SELECT * FROM heber");

$numHeber = mysqli_num_rows($heberNum);
$Seiten=ceil($numHeber/$Limit);

         $Verein = dbBefehl("SELECT * FROM verein ORDER BY verein ASC");

         $num = mysqli_num_rows($heber);

         $new_Heber="0";

$x=0;


$numHeber=filter(0);					//FILTER!!!
if($numHeber!='')
	$Seiten=ceil($numHeber/$Limit);

//HF ================================================================
$sql = "SELECT IdVerein FROM verein WHERE Verein='$VereinFilter' ";
foreach ($db->query($sql) as $row) 
$VereinId = $row['IdVerein']."<br />";
//echo $VereinId;

if(isset($_POST['newHeber']))                                                       //Mehr Zeilen
{	
	// HF=================================================
	// $VereinFilter in \\Funktionen\filter.php angelegt
	
	$x=1;	//IdVerein von Kein Verein =9000   

    $currentYear = date('Y'); // Get the current year
    $Jahrgang  = $currentYear - 30; 
	if (empty($VereinFilter))
			dbBefehl("INSERT INTO heber (Name, Vorname, IdStaat, IdVerein, Jahrgang) Values ('1 neuer Heber', '1 neuer Heber', '1','9000', '$Jahrgang') ");
	else
			dbBefehl("INSERT INTO heber (Name, Vorname, IdStaat, IdVerein, Jahrgang) Values ('1 neuer Heber', '1 neuer Heber', '1', '$VereinId', '$Jahrgang') ");
			
	$new_Heber="1";
			
}

if(isset($_POST['fuenfnewHeber']))  // Mehr Zeilen
{
    $x = 1;
    
    if (empty($VereinFilter))
    {
        dbBefehl("INSERT INTO heber (Name, Vorname, IdStaat, IdVerein, Jahrgang)
                Values ('1 neuer Heber', ' 1 neuer Heber', '1', '9000', '$Jahrgang'), ('2 neuer Heber', '2 neuer Heber', '1', '9000', '$Jahrgang'), ('3 neuer Heber', '3 neuer Heber', '1', '9000', '$Jahrgang'), ('4 neuer Heber', '4 neuer Heber', '1', '9000', '$Jahrgang'), ('5 neuer Heber', '5 neuer Heber', '1', '9000', '$Jahrgang')");
    }
    else
    {
        // Assuming $VereinId is properly escaped or parameterized
        dbBefehl("INSERT INTO heber (Name, Vorname, IdStaat, IdVerein, Jahrgang) Values 
                ('1 neuer Heber', '1 neuer Heber', '1', '$VereinId', '$Jahrgang'), 
                ('2 neuer Heber', '2 neuer Heber', '1', '$VereinId', '$Jahrgang'), 
                ('3 neuer Heber', '3 neuer Heber', '1', '$VereinId', '$Jahrgang'), 
                ('4 neuer Heber', '4 neuer Heber', '1', '$VereinId', '$Jahrgang'), 
                ('5 neuer Heber', '5 neuer Heber', '1', '$VereinId', '$Jahrgang')");
    }
    
    $new_Heber = "1";
}
echo"<br>";


echo "
<div id=\"divid1\" class=\"examplediv\">
<table class=\"tabelle\"  border=\"1\" cellpadding=\"0\" cellspacing=\"2\" >
  <colgroup>";
if($stammdaten['Wk_Art']!='BL') echo "<col width=\"80\">";
echo"
    <col width=\"350\">
    <col width=\"150\">
    <col width=\"100\">
    <col width=\"150\">
    <col width=\"60\">
    <col width=\"50\">
    <col width=\"150\">
    <col width=\"150\">

  </colgroup>


<thead>

 <tr>";
if($stammdaten['Wk_Art']!='BL') echo "<th>Gemeldet</th>";
echo"
  <th>Name</th>
  <th>Verein</th>
  <th>Jahrgang</th>
  <th>Gewicht</th>
  <th>Klasse</th>
  <th>Land</th>
  <th>Geschlecht</th>
  <th>Staat</th>
  <th>Liga</th>
 </tr>
</thead>
";





$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{
$IdH=$dsatz['IdHeber'];
$DataMainAlKl = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db']." WHERE IdHeber='$IdH'");
$DMainAlKl = mysqli_fetch_assoc($DataMainAlKl);

/*	Ist jetzt am ende von Speichern!

if($DMainAlKl[AlKlMain]=='')
  	safe_AlKl_GwKl($dsatz[IdHeber],$stammdaten);    // htdocs/funktionen/nuetzliches.php safe AlKl und GwKl

if($stammdaten['MitNorm'] == 1){
	safe_GwKl_Norm_in_Auswertung ($dsatz[IdHeber],$stammdaten);
}

*/


$Verein=dbBefehl("SELECT * FROM verein WHERE IdVerein='" . $dsatz['IdVerein']. "' ");
$dataVerein= mysqli_fetch_assoc($Verein);

$Land=dbBefehl("SELECT * FROM laender WHERE Idlaender='" . $dataVerein['IdLaender']. "' ");
$dataLand= mysqli_fetch_assoc($Land);

if($dataLand['laender'] != $dsatz['Land'])
	dbBefehl("UPDATE heber
                              SET Land= '" . $dataLand['laender'] . "'
                              WHERE IdHeber ='" . $dsatz['IdHeber'] . "'");

$i = $i+1;


     $Id="Id" . $i;
     $Name="Name" . $i;
     $Vorname="Vorname" . $i;
     $Verein="Verein" . $i;
     $Jahrgang="Jahrgang" . $i;
     $Loeschen="Loeschen" . $i;
     $Gewicht="Gewicht" . $i;
     $Land="Land" . $i;
     $Geschlecht="Geschlecht" . $i;
     $Auswahl="Auswahl" . $i;
     $Safe_Verein="Safe_Verein" . $i;
     $Staat="Staat" . $i;
     $Bundesliga="Bundesliga" . $i;
     $AlKlMain="AlKlMain" . $i;



echo "<input type=\"text\" name=$Id size=\"0\" style=\" display: none; \" value=\"".$dsatz['IdHeber']."\"readonly>";




if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}


echo "<tr align=\"center\">";


if($stammdaten['Wk_Art']!='BL'){

     echo "<td align=\"center\">";
       if($dsatz['Auswahl']=="Auswahl")
           echo "<input type=\"checkbox\" name=$Auswahl value=\"Auswahl\" checked>";
       else
           echo "<input type=\"checkbox\" name=$Auswahl value=\"Auswahl\">";
     echo "</td>";

}



     echo "<td>";

          echo "<input type=\"text\" name=$Name size=\"10\" value=\"".$dsatz['Name']."\">";

          echo "<input type=\"text\" name=$Vorname size=\"10\" value=\"".$dsatz['Vorname']."\">";

          echo "<input type=\"submit\" name=$Loeschen value=\"Loeschen\">";

     echo "</td>";





     echo "<td>";                                                                                                // Spalte (Mit drop down bar)

          echo "<select name=\"$Verein\" size=\"1\" class=\"Auswahl\" style=\"max-width:32vmin;\">";
          echo "<option value=9000>kein Verein</option>";

         $Verein = dbBefehl("SELECT IdVerein
                                FROM heber
                                WHERE IdHeber = '" . $dsatz['IdHeber'] . "'
                                ");

         $dataVerein = mysqli_fetch_assoc($Verein);

         $Auswahl = dbBefehl("SELECT *
                                 FROM verein
                                 ORDER BY Verein ASC
                                 ");


                       while($dataAuswahlV = mysqli_fetch_assoc($Auswahl))
                       {
                                 if($dataAuswahlV['IdVerein']==$dataVerein['IdVerein'])
                                 {
                                         $Safe_Verein=str_replace(' ','_,_',$dataAuswahlV['IdVerein']);
                                         echo "<option value=$Safe_Verein selected>".$dataAuswahlV['Verein']."</option>";
                                 }
                                 else{
                                         $Safe_Verein=str_replace(' ','_,_',$dataAuswahlV['IdVerein']);
                                         echo "<option value=$Safe_Verein>".$dataAuswahlV['Verein']."</option>";
                                 }

                        }
         echo "</select>";


     echo "</td>";




     echo "<td>";
          echo "<input type=\"text\" name=$Jahrgang size=\"6\" value=\"".$dsatz['Jahrgang']."\">";
     echo "</td>";


     echo "<td>";
          echo "<input type=\"text\" name=$Gewicht size=\"3\" value=\"".$dsatz['Gewicht']."\">Kg";
     echo "</td>";


     echo "<td>";
          echo (al_kl_heber_ohne_AlKlMain ($dsatz['IdHeber'],$stammdaten));
     echo "</td>";




     echo "<td>";

     $Verein=dbBefehl("SELECT * FROM verein WHERE IdVerein='" . $dsatz['IdVerein']. "' ");
     $dataVerein= mysqli_fetch_assoc($Verein);

     $Land=dbBefehl("SELECT * FROM laender WHERE Idlaender='" . $dataVerein['IdLaender']. "' ");
     $dataLand= mysqli_fetch_assoc($Land);

     echo $dataLand['laender'];

     echo "</td>";




     echo "<td>";                                                                                                // Spalte (Mit drop down bar)


          echo "<select name=\"$Geschlecht\" size=\"1\" class=\"Auswahl\">";



         $Geschlecht = dbBefehl("SELECT Geschlecht
                                    FROM heber
                                    WHERE IdHeber = '" . $dsatz['IdHeber'] . "'
                                   ");

         $dataGeschlecht = mysqli_fetch_assoc($Geschlecht);



         $Auswahl_G = dbBefehl("SELECT Geschlecht
                                   FROM geschlecht
                                  ");




                       while($dataAuswahl_G = mysqli_fetch_assoc($Auswahl_G))
                       {

                                 if($dataAuswahl_G['Geschlecht']==$dsatz['Geschlecht'])
                                 {

                                         echo "<option value=".$dataAuswahl_G['Geschlecht']." selected>".$dataAuswahl_G['Geschlecht']."</option>";

                                 }
                                 else{
                                         echo "<option value=".$dataAuswahl_G['Geschlecht'].">".$dataAuswahl_G['Geschlecht']."</option>";
                                 }


                        }



                  echo "</select>";

         echo "</td>";




     echo "<td>";                                                                                                // Spalte (Mit drop down bar)

          echo "<select name=\"$Staat\" size=\"1\" class=\"Auswahl\">";

          echo "<option value=keinStaat>kein Staat</option>";


         $Staat = dbBefehl("SELECT IdStaat
                               FROM heber
                               WHERE IdHeber = '" . $dsatz['IdHeber'] . "'

                               ");



         $dataStaat = mysqli_fetch_assoc($Staat);



         $Aus_Staat = dbBefehl("SELECT *
                                   FROM staaten
                                    Order By Staat ASC
                                   ");




                       while($dataAus_Staat = mysqli_fetch_assoc($Aus_Staat))
                       {

                                 if($dataAus_Staat['IdStaat']==$dataStaat['IdStaat'])
                                 {

                                         $Safe_Staat=$dataAus_Staat['IdStaat'];


                                         echo "<option value=$Safe_Staat selected>".$dataAus_Staat['Staat']."</option>";



                                 }
                                 else{

                                         $Safe_Staat=$dataAus_Staat['IdStaat'];


                                         echo "<option value=$Safe_Staat>".$dataAus_Staat['Staat']."</option>";
                                 }


                        }



                  echo "</select>";




         echo "</td>";


     echo "<td align=\"center\">";

     $dsatz['Bundesliga']=returnBundesligaAuswahl($dsatz['IdHeber']);	//In funktionen/nuetzliches

       if($dsatz['Bundesliga']==1)
           echo "<input type=\"checkbox\" name=$Bundesliga value=\"1\" checked>";
       else
           echo "<input type=\"checkbox\" name=$Bundesliga value=\"1\">";
     echo "</td>";


echo "</tr>";



     if(isset($_POST['Loeschen' . $i]))                                                                                          //Loeschen
         {
          $x=1;


           dbBefehl("DELETE FROM heber
                               WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

           dbBefehl("DELETE FROM heber_".$data_a_db['S_Db']."
                               WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

           dbBefehl("DELETE FROM heber_wk_".$data_a_db['S_Db']."
                               WHERE IdHeber ='" . $_POST['Id' . $i] . "'");

          $new_Heber="1";

         }

	//Ermittlung if isset von Seiten Nummer wurde gedrückt
         for($SeitenZaeler=1; $SeitenZaeler<=$Seiten; $SeitenZaeler++){
         	$N_Seite="Seite" . $SeitenZaeler; //
         	if(isset($_POST[$N_Seite])) { $SaveVariable=1;}
         }

         if((isset($_POST['speichern'])) || ($new_Heber=='1') || isset($_POST['SeiteZurueck']) || isset($_POST['SeiteVor']) || $SaveVariable==1)
         {


         $x=1;

           if($stammdaten['Wk_Art']!='BL')
             if($NurEinmalUserBlock==0){
                 dbBefehl("UPDATE user_blocker_".$data_a_db['S_Db']." SET MeldelisteAnlegen = '1', GrpEinteilung = '0'");
                 $NurEinmalUserBlock++;
             }

             $_POST['Verein' . $i]=str_replace('_,_',' ',$_POST['Verein' . $i]);
             $_POST['Gewicht' . $i]=str_replace(",",".", $_POST['Gewicht' . $i]);

             if($_POST['Bundesliga' . $i] == "1")
             	$Bundesliga_Auswahl=1;
             else
             	$Bundesliga_Auswahl=0;

                $Jahrgang = isset($_POST['Jahrgang' . $i]) ? (int)$_POST['Jahrgang' . $i] : null;
                $currentYear = date('Y'); // Get the current year
                 
                // Calculate age based on the current year and Jahrgang
                $age = $currentYear - $Jahrgang;

                $Name = $_POST['Name' . $i];
                $Vorname = $_POST['Vorname' . $i];
                // Check if Jahrgang is within realistic bounds by calculating the age
                if($Jahrgang === null || $age < 6 || $age > 100) {
                    echo "
                        <script>
                            alert('Das Alter muss zwischen 6 und 100 Jahren liegen, Heber: $Name, $Vorname');
                        </script>
                    ";
                }else{

                    dbBefehl("UPDATE heber
                        SET Name= '" . $_POST['Name' . $i] . "',Vorname= '" . $_POST['Vorname' . $i] . "',IdVerein= '" . $_POST['Verein' . $i] . "',
                        Jahrgang='" . $_POST['Jahrgang' . $i] . "', Gewicht= '" . $_POST['Gewicht' . $i] . "', Land= '" . $_POST['Land' . $i] . "',
                        Geschlecht= '" . $_POST['Geschlecht' . $i] . "', Auswahl= '" . $_POST['Auswahl' . $i] . "',IdStaat= '" . $_POST['Staat' . $i] . "',
                        Bundesliga= '" . $_POST['Bundesliga' . $i] . "'
                        WHERE IdHeber ='" . $_POST['Id' . $i] . "'");
                }
                



         $Safe = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db']);

       $z=0;


         if($_POST['Auswahl' . $i] == "Auswahl")
         {
                 while($dataSafe = mysqli_fetch_assoc($Safe))
                 {
                         if($dataSafe['IdHeber'] == "" . $_POST['Id' . $i] . "")
                          	$z=1;
                 }



                 if($z==0)
                 {
                 	if($stammdaten['MitNorm']=='1' && $stammdaten['NormAlKl']==al_kl_heber_ohne_AlKlMain ($dsatz['IdHeber'],$stammdaten)){
                 		dbBefehl("INSERT INTO heber_".$data_a_db['S_Db']." (IdHeber, Norm_Heber)
                 				Values ('" . $_POST['Id' . $i] . "', '1')");
                 	}else{
                 		dbBefehl("INSERT INTO heber_".$data_a_db['S_Db']." (IdHeber)
                 				Values ('" . $_POST['Id' . $i] . "')");
                 	}


                         dbBefehl("INSERT INTO heber_wk_".$data_a_db['S_Db']." (IdHeber, Versuch)
                                      Values ('" . $_POST['Id' . $i] . "', '1')");


                         dbBefehl("INSERT INTO heber_wk_".$data_a_db['S_Db']." (IdHeber, Versuch)
                                      Values ('" . $_POST['Id' . $i] . "', '2')");


                         dbBefehl("INSERT INTO heber_wk_".$data_a_db['S_Db']." (IdHeber, Versuch)
                                      Values ('" . $_POST['Id' . $i] . "', '3')");

                 }




         }

         if($stammdaten['Wk_Art']!='BL'){ //Nicht fuer BL da es hier nicht mal einen Auswahl Knopf gibt
          if($_POST['Auswahl' . $i] == false)
          {
              HeberLoeschen($_POST['Id' . $i]);   //Delet IdHeber aus, heber_$num, heber_wk_$num und auswertung_$num
                                                 //"funktionen/nuetzliches.php
          }
         }

         if($DMainAlKl['AlKlMain']=='')
         	safe_AlKl_GwKl($_POST['Id' . $i],$stammdaten);    // htdocs/funktionen/nuetzliches.php safe AlKl und GwKl

         if($stammdaten['MitNorm'] == 1){
         	safe_GwKl_Norm_in_Auswertung ($_POST['Id' . $i],$stammdaten);
         }

}	//Speichern Ende


}
echo "</tbody>";
echo "</table>";

if($_SESSION['Seite_Ml_A']!=1)
echo '<input class="But" type="submit" name="SeiteZurueck" value="<">';

for($SeitenZaeler=1; $SeitenZaeler<=$Seiten; $SeitenZaeler++){

	$N_Seite="Seite" . $SeitenZaeler; //

    if($SeitenZaeler==$_SESSION['Seite_Ml_A'])
        echo "<input id=\"AktuelleSeite\" class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";
    else
        echo "<input class=\"But\" type=\"submit\" name=$N_Seite value=$SeitenZaeler>";

    if(isset($_POST[$N_Seite])) { $_SESSION['Seite_Ml_A']=$SeitenZaeler; $x=1;}

}
echo '<input class="But" type="submit" name="SeiteVor" value=">">';

if(isset($_POST['SeiteZurueck'])){ $_SESSION['Seite_Ml_A']--; $x=1;}
if(isset($_POST['SeiteVor'])){ $_SESSION['Seite_Ml_A']++; $x=1;}

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'meldeliste_anlegen.php'
   },0)
 </script>
";
}



?>



<br>

<input type="submit" name="newHeber" value="Neuer Heber">
<input type="submit" name="fuenfnewHeber" value="5 x Neuer Heber">


<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">

<br>
<br>
<br>
<br>
<br>
<br>
</form>

</body>
</html>
