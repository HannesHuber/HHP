<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/stammdaten.css">
<link rel="stylesheet" type="text/css" href="CSS/help_tip.css">



</head>

<body>


<form method="post" action="stammdaten.php">

<p class="kopf"><b>Stammdaten</b></p>

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>



<?php

ob_start ();
error_reporting(1);



include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
include 'funktionen/nuetzliches.php';

$db=dbVerbindung();

$data_a_db['S_Db']=$_SESSION['WeK'];

$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dsatz = mysqli_fetch_assoc($datenbank);

if($dsatz['Online_Wk']==1){
    $OnlineWk=1;
}else{
    $OnlineWk=0;
}

loginCheck($dsatz);
$x=0;


echo"
<br>
";


//if($OnlineWk==0){   //Nur wenn kein Online WK sonst schon vorangelegt

echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\" >
<thead>


</thead>

 <tr>

  <th>";
  echo '<div id="DivBoxHead"> Meisterschaft';
 /*
  echo'
 <div class="help-tip">
 <p>This is the inline help tip! It can contain all kinds of HTML. Style it as you please.</p>
 </div>';
*/
  echo "</div></th>
  <th>Ort/Verein</th>
  <th>Wettkampf Datum</th>";

if($dsatz['Wk_Art'] != "BL"){
    echo'<th>
            <div id="DivBoxHead">
                Heber pro Mannschaft
                    <div class="help-tip">
                        <p>Die Anzahl der Heber die pro Mannschaft gewertet werden.</p>
                    </div>
             </div>
        </th>';
    echo'<th>
            <div id="DivBoxHead">
                Min. Heber pro Mannschaft
                    <div class="help-tip">
                        <p>Die mindest Anzahl der Heber pro Mannschaft damit eine Mannschaftswertung erfolgt.</p>
                    </div>
             </div>
</th>';
}

echo '</tr>';

 echo "<tr>";

 echo "<td><input type=\"text\" name=\"Meisterschaft\" value=\"".$dsatz['Meisterschaft']."\">
";


echo "</td>";



 echo "<td><input type=\"text\" name=\"Ort\" value=\"".$dsatz['Ort']."\"></td>";



 echo "<td><input type=\"date\" name=\"Datum\" value=\"".$dsatz['Datum']."\"></td>";



         if($dsatz['Wk_Art'] != "BL"){
             echo "<td><input type=\"text\" name=\"HpM\" value=\"".$dsatz['Heber_pro_M']."\"></td>";
             echo "<td><input type=\"text\" name=\"mHpM\" value=\"".$dsatz['min_heber_pro_mann']."\"></td>";
         }

 echo "</tr>";

//}


 if($dsatz['Wk_Art'] != "ZK" && $dsatz['Wk_Art'] != "BL")
 {

   echo "<tr>";

         echo "<td>Pendellauf";

         if($dsatz['Pendellauf'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Pendellauf\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Pendellauf\" value=\"1\">";

         }
         echo" </td>";



         echo "<td>30m - Sprint ";

         if($dsatz['Sprint'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Sprint\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Sprint\" value=\"1\">";

         }
         echo" </td>";




         echo "<td>Differenzsprung ohne E-Matte ";

         if($dsatz['Differenzsprung'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Differenzsprung\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Differenzsprung\" value=\"1\">";

         }
         echo" </td>";




         echo "<td>Differenzsprung mit E-Matte ";

         if($dsatz['DifferenzsprungEmatte'] == '1'){

                 echo "<input type=\"checkbox\" name=\"DifferenzsprungEmatte\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"DifferenzsprungEmatte\" value=\"1\">";

         }
         echo" </td>";





 echo "</tr>";

   echo "<tr>";

          echo "<td>Schockwurf";

         if($dsatz['Schockwurf'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Schockwurf\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Schockwurf\" value=\"1\">";

         }
         echo" </td>";



         echo "<td>Anristen ";

         if($dsatz['Anristen'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Anristen\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Anristen\" value=\"1\">";

         }
         echo" </td>";




         echo "<td>Klimmziehen ";

         if($dsatz['Klimmziehen'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Klimmziehen\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Klimmziehen\" value=\"1\">";

         }
         echo" </td>";




         echo "<td>Zug liegend ";

         if($dsatz['Zug'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Zug\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Zug\" value=\"1\">";

         }
         echo" </td>";


 echo "</tr>";




 echo "<tr>";

         echo "<td>Bankdrücken ";

         if($dsatz['Bankdruecken'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Bankdruecken\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Bankdruecken\" value=\"1\">";

         }
         echo" </td>";


         echo "<td>Liegestütz ";

         if($dsatz['Liegestuetz'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Liegestuetz\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Liegestuetz\" value=\"1\">";

         }
         echo" </td>";


         echo "<td>Beugestütz ";

         if($dsatz['Beugestuetz'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Beugestuetz\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Beugestuetz\" value=\"1\">";

         }
         echo" </td>";



         echo "<td>Sternlauf ";

         if($dsatz['Sternlauf'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Sternlauf\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Sternlauf\" value=\"1\">";

         }
         echo" </td>";



 echo "</tr>";
 echo "<tr>";


         echo "<td>Schlussdreisprung ";

         if($dsatz['Schlussdreisprung'] == '1'){

                 echo "<input type=\"checkbox\" name=\"Schlussdreisprung\" value=\"1\" checked>";

         }else{

                 echo "<input type=\"checkbox\" name=\"Schlussdreisprung\" value=\"1\">";

         }
         echo" </td>";

 echo "</tr>";


 }                      //Schlie�t if(!=Zk && != BL)

echo "</tbody>";
echo "</table>";


echo"<br>";

if($dsatz['Wk_Art'] != "BL"){

echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\" >
<thead>


</thead>

 <tr>";

echo'
  <th>
            <div id="DivBoxHead">
                Länderwertung nach

             </div>
</th>
  <th>
            <div id="DivBoxHead">
               Schüler/Jugendpokal
                    <div class="help-tip">
                        <p>Dadurch gibt es in der Auswertung eine Pokal Länder-Mannschaftsauswertung, die zu wertenden Heber müssen davor in der Meldeliste ausgewählt werden. (Es werden die besten 5 gewertet)</p>
                    </div>
             </div>
</th>

  <th>
            <div id="DivBoxHead">
               Mannschaften-Auto-Zuteilung
                    <div class="help-tip">
                        <p>Dadurch werden die besten Heber automatisch in die 1.Mannschaft geordnet, danach in die 2.Mannschaft usw.. Die Mannschaftszuweisung in der Meldeliste wird dann nicht berücksichtigt.</p>
                    </div>
             </div>
</th>
';
if($dsatz['Wk_Art'] == "M_o_T" || $dsatz['Wk_Art'] == "M_m_T"){
    echo'<th>
    <div id="DivBoxHead">
    Mannschaftswertung nach
    <div class="help-tip">
    <p>Hier kann festgelegt werden ob die Mannschaft nach Mehrkampfpunkten, oder nach Relativpunkten bestimmt wird.</p>
    </div>
    </div>
    </th>';
}
 if($dsatz['Wk_Art'] == "ZK"){
         echo '<th>Masters</th>';
         echo '<th>Einklassen Auswertung</th>';
 }

echo'</tr>';



echo"<body>";

  echo"<tr>";
       echo"<td>";

         if($dsatz['Laenderwertung'] == '1'){

                 echo "Verein<input type=\"radio\" name=\"LW\" value=\"1\" checked>";

         }else{

                 echo "Verein<input type=\"radio\" name=\"LW\" value=\"1\">";

         }
         echo" </td>";


       echo"<td>";

         if($dsatz['Pokal'] == '0'){

                 echo "Nein<input type=\"radio\" name=\"Pokal\" value=\"0\" checked>";

         }else{

                 echo "Nein<input type=\"radio\" name=\"Pokal\" value=\"0\">";

         }
         echo" </td>";

         echo"<td>";

         if($dsatz['auto_mannschaft'] == 0){

             echo "Nein<input type=\"radio\" name=\"Auto-Mannschaft\" value=\"0\" checked>";

         }else{

             echo "Nein<input type=\"radio\" name=\"Auto-Mannschaft\" value=\"0\">";

         }
         echo" </td>";

         if($dsatz['Wk_Art'] == "M_o_T" || $dsatz['Wk_Art'] == "M_m_T"){
             echo"<td>";

             if($dsatz['mannschaft_nach_relativ'] == 0){

                 echo "Mk-Gesamt-Pkt<input type=\"radio\" name=\"Mannschaft_Relativ\" value=\"0\" checked>";

             }else{

                 echo "Mk-Gesamt-Pkt<input type=\"radio\" name=\"Mannschaft_Relativ\" value=\"0\">";

             }
             echo" </td>";
         }

if($dsatz['Wk_Art'] == "ZK"){
       echo"<td>";
                 if($dsatz['Masters'] == '0') echo "Nein<input type=\"radio\" name=\"Masters\" value=\"0\" checked>";
                 else echo "Nein<input type=\"radio\" name=\"Masters\" value=\"0\">";
       echo" </td>";

       echo"<td>";
                 if($dsatz['EineKlasse'] == '0') echo "Nein<input type=\"radio\" name=\"EineKlasse\" value=\"0\" checked>";
                 else echo "Nein<input type=\"radio\" name=\"EineKlasse\" value=\"0\">";
       echo" </td>";
}

  echo"</tr>";


  echo"<tr>";
       echo"<td>";

         if($dsatz['Laenderwertung'] == '2'){

                 echo "Land<input type=\"radio\" name=\"LW\" value=\"2\" checked>";

         }else{

                 echo "Land<input type=\"radio\" name=\"LW\" value=\"2\">";

         }
         echo" </td>";

         echo"<td>";

         if($dsatz['Pokal'] == '1'){

                 echo "Ja<input type=\"radio\" name=\"Pokal\" value=\"1\" checked>";

         }else{

                 echo "Ja<input type=\"radio\" name=\"Pokal\" value=\"1\">";

         }
         echo" </td>";

         echo"<td>";

         if($dsatz['auto_mannschaft'] == 1){

             echo "Ja<input type=\"radio\" name=\"Auto-Mannschaft\" value=\"1\" checked>";

         }else{

             echo "Ja<input type=\"radio\" name=\"Auto-Mannschaft\" value=\"1\">";

         }
         echo" </td>";

         if($dsatz['Wk_Art'] == "M_o_T" || $dsatz['Wk_Art'] == "M_m_T"){
             echo"<td>";

             if($dsatz['mannschaft_nach_relativ'] == 1 ){

                 echo "Relativ-Pkt<input type=\"radio\" name=\"Mannschaft_Relativ\" value=\"1\" checked>";

             }else{

                 echo "Relativ-Pkt<input type=\"radio\" name=\"Mannschaft_Relativ\" value=\"1\">";

             }
             echo" </td>";
         }

if($dsatz['Wk_Art'] == "ZK"){
         echo"<td>";
                 if($dsatz['Masters'] == '1') echo "Ja<input type=\"radio\" name=\"Masters\" value=\"1\" checked>";
                 else echo "Ja<input type=\"radio\" name=\"Masters\" value=\"1\">";
         echo" </td>";

         echo"<td>";
                 if($dsatz['EineKlasse'] == '1') echo "Ja<input type=\"radio\" name=\"EineKlasse\" value=\"1\" checked>";
                 else echo "Ja<input type=\"radio\" name=\"EineKlasse\" value=\"1\">";
         echo" </td>";
}

  echo"</tr>";


  echo"<tr>";
       echo"<td>";

         if($dsatz['Laenderwertung'] == '3'){

                 echo "Staat<input type=\"radio\" name=\"LW\" value=\"3\" checked>";

         }else{

                 echo "Staat<input type=\"radio\" name=\"LW\" value=\"3\">";

         }
         echo" </td>";

  echo"</tr>";





echo "</tbody>";
echo "</table>";

echo"<br>";

} //Ende id(!= BL)


echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\" >
<thead>


</thead>

 <tr>

  <th>Anzahl Kampfrichter</th>";



   //

//if($dsatz[Wk_Art] == "BL"){
	echo "<th>Block Heben</th>";
    if($dsatz['Online_Wk']== 0 && $dsatz['Wk_Art'] == "BL")
        echo "<th>Verein Anzahl</th>";
//}

if($dsatz['Wk_Art'] != "BL"){
echo "
  <th>Flagge</th>
  <th>Internationaler Wk</th>";
}

if($dsatz['Wk_Art'] == "ZK") echo "<th>Auswertung mit Norm</th>";

if($dsatz['Wk_Art'] != "BL") echo "<th>Relativ-Wertung</th>";


echo "</tr>";



echo"<body>";

  echo"<tr>";
       echo"<td>";

         if($dsatz['Kampfrichter'] == '1'){

                 echo "Ein Kampfrichter<input type=\"radio\" name=\"KR\" value=\"1\" checked>";

         }else{

                 echo "Ein Kampfrichter<input type=\"radio\" name=\"KR\" value=\"1\">";

         }
         echo" </td>";

         //if($dsatz[Wk_Art] == "BL"){
         	echo"<td>";

         	if($dsatz['Block_Heben'] == '1')
         		echo "Ja<input type=\"radio\" name=\"BlockHebenButton\" value=\"1\" checked>";
         	else
         		echo "Ja<input type=\"radio\" name=\"BlockHebenButton\" value=\"1\">";

         	echo" </td>";
         //}


    if($dsatz['Wk_Art'] == "BL"){

         	if($dsatz['Online_Wk']== 0){

         	  echo"<td>";

         	  if($dsatz['Verein_Anzahl'] == '2')
         	      echo "2er<input type=\"radio\" name=\"Verein_Anzahl\" value=\"2\" checked>";
         	  else
         	      echo "2er<input type=\"radio\" name=\"Verein_Anzahl\" value=\"2\">";

         	  echo" </td>";

         	}
    }

if($dsatz['Wk_Art'] != "BL"){

       echo"<td>";

         if($dsatz['Flagge'] == '0'){

                 echo "Keine<input type=\"radio\" name=\"Fl\" value=\"0\" checked>";

         }else{

                 echo "Keine<input type=\"radio\" name=\"Fl\" value=\"0\">";

         }
         echo" </td>";

       echo"<td>";

         if($dsatz['International'] == '0'){

                 echo "Nein<input type=\"radio\" name=\"Inter\" value=\"0\" checked>";

         }else{

                 echo "Nein<input type=\"radio\" name=\"Inter\" value=\"0\">";

         }
         echo" </td>";

}   //Ende != BL

if($dsatz['Wk_Art'] == "ZK"){

	echo"<td>";

	if($dsatz['MitNorm'] == '0')
		echo "Nein<input type=\"radio\" name=\"MitNorm\" value=\"0\" checked>";
	else
		echo "Nein<input type=\"radio\" name=\"MitNorm\" value=\"0\">";

	echo" </td>";
}

if($dsatz['Wk_Art'] != "BL"){

	echo"<td>";

	if($dsatz['RelativArt'] == '1')
		echo "Relativ<input type=\"radio\" name=\"RelativArt\" value=\"1\" checked>";
	else
		echo "Relativ<input type=\"radio\" name=\"RelativArt\" value=\"1\">";

		echo" </td>";
}

  echo"</tr>";


  echo"<tr>";
       echo"<td>";

         if($dsatz['Kampfrichter'] == '3'){

                 echo "Drei Kampfrichter<input type=\"radio\" name=\"KR\" value=\"3\" checked>";

         }else{

                 echo "Drei Kampfrichter<input type=\"radio\" name=\"KR\" value=\"3\">";

         }
         echo" </td>";

         //if($dsatz[Wk_Art] == "BL"){
         	echo"<td>";

         	if($dsatz['Block_Heben'] == '0'){

         		echo "Nein<input type=\"radio\" name=\"BlockHebenButton\" value=\"0\" checked>";

         	}else{

         		echo "Nein<input type=\"radio\" name=\"BlockHebenButton\" value=\"0\">";

         	}
         	echo" </td>";
         //}


if($dsatz['Wk_Art'] == "BL"){
         	if($dsatz['Online_Wk']== 0){

         	    echo"<td>";

         	    if($dsatz['Verein_Anzahl'] == '3')
         	        echo "3er<input type=\"radio\" name=\"Verein_Anzahl\" value=\"3\" checked>";
         	    else
         	        echo "3er<input type=\"radio\" name=\"Verein_Anzahl\" value=\"3\">";

         	    echo" </td>";

         	}
}

if($dsatz['Wk_Art'] != "BL"){

	echo"<td>";

	if($dsatz['Flagge'] == '3'){

		echo "Staaten<input type=\"radio\" name=\"Fl\" value=\"3\" checked>";

	}else{

		echo "Staaten<input type=\"radio\" name=\"Fl\" value=\"3\">";

	}

	echo" </td>";

/*
        echo"<td>";

         if($dsatz[Flagge] == '1'){

                 echo "Verein<input type=\"radio\" name=\"Fl\" value=\"1\" checked>";

         }else{

                 echo "Verein<input type=\"radio\" name=\"Fl\" value=\"1\">";

         }
         echo" </td>";

         if($dsatz[Flagge] == '2'){

                 echo "Bundesland<input type=\"radio\" name=\"Fl\" value=\"2\" checked>";

         }else{

                 echo "Bundesland<input type=\"radio\" name=\"Fl\" value=\"2\">";

         }

*/

       echo"<td>";

         if($dsatz['International'] == '1'){

                 echo "Ja<input type=\"radio\" name=\"Inter\" value=\"1\" checked>";

         }else{

                 echo "Ja<input type=\"radio\" name=\"Inter\" value=\"1\">";

         }
         echo" </td>";

} //Ende != Bl

if($dsatz['Wk_Art'] == "ZK"){

	echo"<td>";

	if($dsatz['MitNorm'] == '1')
		echo "Ja<input type=\"radio\" name=\"MitNorm\" value=\"1\" checked>";
	else
		echo "Ja<input type=\"radio\" name=\"MitNorm\" value=\"1\">";

	echo" </td>";
}

if($dsatz['Wk_Art'] != "BL"){

	echo"<td>";

	if($dsatz['RelativArt'] == '0')
		echo "Robi-Wertung<input type=\"radio\" name=\"RelativArt\" value=\"0\" checked>";
	else
		echo "Robi-Wertung<input type=\"radio\" name=\"RelativArt\" value=\"0\">";

	echo" </td>";


}

  echo"</tr>";


  if($dsatz['Wk_Art'] == "ZK"){

  	echo"<tr>";

  	echo"<td></td>";
  	echo"<td></td>";
  	echo"<td></td>";
  	echo"<td></td>";

  	echo"<td>";


  		$DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']);

  		echo "<select name=\"NormAlKl\" size=\"1\" class=\"Auswahl\"><br>";

  		while($dataAus_AlKl = mysqli_fetch_assoc($DataAlKl))
  		{
  			if($dataAus_AlKl['Klasse']==$dsatz['NormAlKl'])
  				echo "<option selected value=$dataAus_AlKl[Klasse]>$dataAus_AlKl[Klasse]</option>";
  			else
  				echo "<option value=$dataAus_AlKl[Klasse]>$dataAus_AlKl[Klasse]</option>";
  		}
  		echo "</select>";


  	echo" </td>";

  	echo"<td>";

  	if($dsatz['RelativArt'] == '2'){
  		echo "Olympia-Quali-Pkt<input type=\"radio\" name=\"RelativArt\" value=\"2\" checked>";
  	}

  	else{
  		echo "Olympia-Quali-Pkt<input type=\"radio\" name=\"RelativArt\" value=\"2\">";
  	}

  	echo "<select name=\"RobiVorfaktor\" size=\"1\" class=\"Auswahl\"><br>";


  	if($dsatz['RobiVorfaktor']==1.00)
  		echo "<option selected value='1.0'>Bronze</option>";
  	else
  		echo "<option value='1.0'>Bronze</option>";

  	if($dsatz['RobiVorfaktor']==1.05)
  		echo "<option selected value='1.05'>Silver</option>";
  	else
  		echo "<option value='1.05'>Silver</option>";


  	if($dsatz['RobiVorfaktor']==1.1)
  		echo "<option selected value='1.1'>Gold</option>";
  	else
  		echo "<option value='1.1'>Gold</option>";


  	echo "</select>";
  	echo" </td>";

  	echo"</tr>";

  }

  
  if($dsatz['Wk_Art'] != "BL"){

        echo"<tr>";

        echo"<td></td>";
        echo"<td></td>";
        echo"<td></td>";
        echo"<td></td>";
        if($dsatz['Wk_Art'] == "ZK"){
                echo"<td></td>";
        }

        echo" <td>";
	if($dsatz['RelativArt'] == '3')
		echo "IAT-Wertung<input type=\"radio\" name=\"RelativArt\" value=\"3\" checked>";
	else
		echo "IAT-Wertung<input type=\"radio\" name=\"RelativArt\" value=\"3\">";

        echo" </td>";

        echo"</tr>";

}


if($dsatz['Wk_Art'] != "BL"){

  echo"<tr>";

     echo"<td></td>";

        echo"<td>";


         echo" </td>";

  echo"</tr>";

  echo"<tr>";

     echo"<td></td>";

        echo"<td>";


         echo" </td>";

  echo"</tr>";

} // Ende != BL

echo "</tbody>";
echo "</table>";
                                                                         //Neue Tabelle F�r den Verechnungs Faktor


echo"<br>";

 echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\" >
<thead>


</thead>

 <tr>";

 echo "<th>Zeitnehmer</th>";



 if($dsatz['Wk_Art'] == "M_m_T" || $dsatz['Wk_Art']=='M_o_T'){


     echo'<th>
    <div id="DivBoxHead">
    Verechnungs Faktor:
    <div class="help-tip">
    <p>Verechnungsfakrot: 0.5 für 4 Disziplinen und 0.66 für 3 Disziplinen</p>
    </div>
    </div>
    </th>';
 }
elseif($dsatz['Wk_Art']== "BL" && $OnlineWk==0)            echo '<th>Leistungsklasse</th>';
// ---Gesamt Grp---else                                  echo '<th>Gesamt-Grp AlKl</th>';


  echo "<th>Passwort:</th>";
  if($dsatz['Wk_Art'] == "ZK") echo "<th>Deutsche Meisterschaft</th>";
  if($dsatz['Wk_Art'] != "BL") echo "<th>Start Nummer</th>";
  if($dsatz['Wk_Art'] != "BL") echo "<th>Mit Meldelast</th>";
 echo"</tr>";

   echo  '<tr>';


   	echo"<td>";
   		if($dsatz['Zeitnehmer'] == '0')
   			echo "Nein<input type=\"radio\" name=\"Zeitnehmer\" value=\"0\" checked>";
   		else
   			echo "Nein<input type=\"radio\" name=\"Zeitnehmer\" value=\"0\">";
   	echo" </td>";

   //	if($dsatz[Wk_Art]== "BL" && $OnlineWk==0) echo "<td><input type=\"text\" name=\"Leistungsklasse\" value=\"$dsatz[Liga]\"></td>";


if($dsatz['Wk_Art'] == "M_m_T" || $dsatz['Wk_Art']=='M_o_T') echo "<td><input type=\"text\" name=\"V_Faktor\" value=\"".$dsatz['V_Faktor']."\"></td>";
elseif($dsatz['Wk_Art']== "BL" && $OnlineWk==0) echo "<td><input type=\"text\" name=\"Leistungsklasse\" value=\"".$dsatz['Liga']."\"></td>";
/*else{
   echo "<td>";

          echo "<select name=\"GesGrpAlKl\" size=\"1\" class=\"Auswahl\">";

                 $DataAlKl = dbBefehl("SELECT * FROM alters_klassen_zk");

                       while($dataAus_AlKl = mysqli_fetch_assoc($DataAlKl))
                       {
                                 if($dsatz[GesGrpAlKl]==$dataAus_AlKl[Klasse])
                                 {
                                         $Safe_AlKl=$dsatz[GesGrpAlKl];
                                         echo "<option value=$Safe_AlKl selected>$dataAus_AlKl[Klasse]</option>";
                                 }
                                 else{
                                         $Safe_AlKl=$dataAus_AlKl[Klasse];
                                         echo "<option value=$Safe_AlKl>$dataAus_AlKl[Klasse]</option>";
                                 }
                        }
                  echo "</select>";
   echo "</td>";
}
*/

if($dsatz['passwort']!=''){

     echo "<td>Altes Pw:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"password\" name=\"oldPw\" value=\"\"></td>";


     echo "<td></td>";
     echo "<td>Passwort:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"password\" name=\"passwort\" value=\"\"></td>";
}else{
     echo "<td>Passwort:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"password\" name=\"passwort\" value=\"\"></td>";

}
if($dsatz['Wk_Art'] == "ZK"){

	echo"<td>";

	if($dsatz['DM'] == '0'){
		echo "Nein<input type=\"radio\" name=\"DM\" value=\"0\" checked>";
	}else{
		echo "Nein<input type=\"radio\" name=\"DM\" value=\"0\">";
	}
	echo" </td>";
}

if($dsatz['Wk_Art'] != "BL"){

	echo"<td>";

	if($dsatz['StartNr'] == '0'){
		echo "Nein<input type=\"radio\" name=\"StartNr\" value=\"0\" checked>";
	}else{
		echo "Nein<input type=\"radio\" name=\"StartNr\" value=\"0\">";
	}
	echo" </td>";
}


if($dsatz['Wk_Art'] != "BL"){

	echo"<td>";

	if($dsatz['Meldelast'] == '0'){
		echo "Nein<input type=\"radio\" name=\"Meldelast\" value=\"0\" checked>";
	}else{
		echo "Nein<input type=\"radio\" name=\"Meldelast\" value=\"0\">";
	}
	echo" </td>";
}

echo  '</tr>';

   echo  '<tr>';

   echo"<td>";
   	if($dsatz['Zeitnehmer'] == '1')
   		echo "Zeitnehmer-Pad<input type=\"radio\" name=\"Zeitnehmer\" value=\"1\" checked>";
   	else
   		echo "Zeitnehmer-Pad<input type=\"radio\" name=\"Zeitnehmer\" value=\"1\">";
   echo" </td>";

   if($dsatz['Wk_Art']== "BL" && $OnlineWk==0) echo"<td></td>";
   if($dsatz['Wk_Art'] == "M_m_T" || $dsatz['Wk_Art']=='M_o_T') echo "<td></td>";
    // F�r Gesamt Grp echo "<td></td>";
     echo "<td>Wiederholen:<input type=\"password\" name=\"passwort2\" value=\"\"></td>";


     if($dsatz['Wk_Art'] == "ZK"){
     	echo"<td>";

     	if($dsatz['DM'] == '1'){

     		echo "Ja<input type=\"radio\" name=\"DM\" value=\"1\" checked>";

     	}else{

     		echo "Ja<input type=\"radio\" name=\"DM\" value=\"1\">";

     	}
     	echo" </td>";
     }

     if($dsatz['Wk_Art'] != "BL"){

     	echo"<td>";

     	if($dsatz['StartNr'] == '1'){
     		echo "Ja<input type=\"radio\" name=\"StartNr\" value=\"1\" checked>";
     	}else{
     		echo "Ja<input type=\"radio\" name=\"StartNr\" value=\"1\">";
     	}
     	echo" </td>";
     }

     if($dsatz['Wk_Art'] != "BL"){

     	echo"<td>";

     	if($dsatz['Meldelast'] == '1'){
     		echo "Ja<input type=\"radio\" name=\"Meldelast\" value=\"1\" checked>";
     	}else{
     		echo "Ja<input type=\"radio\" name=\"Meldelast\" value=\"1\">";
     	}
     	echo" </td>";
     }

   echo  '</tr>';

echo  '<tr>';
   echo"<td>";
   if($dsatz['Zeitnehmer'] == '2')
       echo "Wk-Leiter<input type=\"radio\" name=\"Zeitnehmer\" value=\"2\" checked>";
   else
       echo "Wk-Leiter<input type=\"radio\" name=\"Zeitnehmer\" value=\"2\">";
       echo" </td>";

echo  '</tr>';

echo "</tbody>";
echo "</table>";


echo"<br>";

if($dsatz['Wk_Art'] == "BL"){
    echo "
    <table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\" >

     <tr>

      <th>Protokollant</th>
      <th>Mannschaftsführer1</th>
      <th>Kampfrichter</th>
      <th>Mannschaftsführer2</th>";

if($dsatz['Verein_Anzahl']==3){
    echo "<th>Mannschaftsführer3</th>";
}
    echo "</tr>
";

    echo"<body>";

    echo "<td> <input type=\"text\" name=\"Protokollant\" value=\"".$dsatz['Protokollant']."\"> </td>";
    echo "<td> <input type=\"text\" name=\"Mannschaftsfuehrer1\" value=\"".$dsatz['Mannschaftsfuehrer1']."\"> </td>";
    echo "<td> <input type=\"text\" name=\"KampfrichterName\" value=\"".$dsatz['KampfrichterName']."\"> </td>";
    echo "<td> <input type=\"text\" name=\"Mannschaftsfuehrer2\" value=\"".$dsatz['Mannschaftsfuehrer2']."\"> </td>";

    if($dsatz['Verein_Anzahl']==3){
        echo "<td> <input type=\"text\" name=\"Mannschaftsfuehrer3\" value=\"".$dsatz['Mannschaftsfuehrer3']."\"> </td>";
    }

    echo "</tbody>";
    echo "</table>";

    echo"<br>";
}

 echo "

<table class=\"tabelle\" cellpadding=\"0\" cellspacing=\"2\" >
<thead>


</thead>

 <tr>

  <th>Wettkampfanlage</th>";

  if($dsatz['Wk_Art'] == "BL" && $dsatz['Online_Wk']== 0){
      echo "<th>Auswertungs Art</th>";
  }

  if($dsatz['Wk_Art'] != "BL"){
         echo "<th>Los-Nummern</th>";

         if($dsatz['Wk_Art'] == "ZK" || $dsatz['Wk_Art'] == "M_o_T" || $dsatz['Wk_Art'] == "M_m_T" ){
             if($dsatz['Wk_Art'] == "ZK" ){
                 echo "<th>Relativ und Sinclair über Al-Kl</th>";
                 echo "<th>Hauptauswertungs-Art</th>";
             }
                 echo "<th>";
                 echo'
            <div id="DivBoxHead">
               Schüler/Jugendpokal
                    <div class="help-tip">
                        <p>Die Auswertung im Mehrkampf wird dadurch pro selbst angelegter Gruppe durchgeführt</p>
                    </div>
             </div> ';
echo"Gruppeneinteilung</th>";
         }
  }



echo "
 </tr>
";



echo"<body>";

  echo"<tr>";
       echo"<td>";

         if($dsatz['Gerd'] == '0')
                 echo "Externe Wk-Anlage<input type=\"radio\" name=\"Gerd\" value=\"0\" checked>";
         else
                 echo "Externe Wk-Anlage<input type=\"radio\" name=\"Gerd\" value=\"0\">";


       echo" </td>";

       if($dsatz['Wk_Art'] == "BL" && $dsatz['Online_Wk']== 0){
         echo"<td>";

           if($dsatz['auswertung_art'] == '0')
                   echo "Relativpunkte <input type=\"radio\" name=\"auswertung_art\" value=\"0\" checked>";
           else
                   echo "Relativpunkte <input type=\"radio\" name=\"auswertung_art\" value=\"0\">";
         echo" </td>";
       }

    if($dsatz['Wk_Art'] != "BL"){
       echo"<td>";

         if($dsatz['LosNummern'] == '0')
                 echo "Losnummern per Hand verteilen<input type=\"radio\" name=\"LosNr\" value=\"0\" checked>";
         else
                 echo "Losnummern per Hand verteilen<input type=\"radio\" name=\"LosNr\" value=\"0\">";
       echo" </td>";

       if($dsatz['Wk_Art'] == "ZK" || $dsatz['Wk_Art'] == "M_o_T" || $dsatz['Wk_Art'] == "M_m_T" ){
           if($dsatz['Wk_Art'] == "ZK" ){
       echo"<td>";
         if($dsatz['Rel_Sin_AlKl'] == '0')
                 echo "Nein<input type=\"radio\" name=\"ButtonRelSinAlKl\" value=\"0\" checked>";
         else
                 echo "Nein<input type=\"radio\" name=\"ButtonRelSinAlKl\" value=\"0\">";
       echo" </td>";

       echo"<td>";
         if($dsatz['Hauptauswertung'] == '0')
                 echo "Zweikampf<input type=\"radio\" name=\"ButtonHauptauswertung\" value=\"0\" checked>";
         else
                 echo "Zweikampf<input type=\"radio\" name=\"ButtonHauptauswertung\" value=\"0\">";
       echo" </td>";


           }

       echo"<td>";
       		if($dsatz['Grp_Einteilung'] == '0')
       			echo "Nach AlKl & GwKl<input type=\"radio\" name=\"ButtonGrpEinteilung\" value=\"0\" checked>";
       		else
       			echo "Nach AlKl & GwKl<input type=\"radio\" name=\"ButtonGrpEinteilung\" value=\"0\">";
       echo" </td>";


      }

    }
  echo"</tr>";


  echo"<tr>";
       echo"<td>";

       if($dsatz['Gerd'] == '1' && $dsatz['HHP_Hardware'] == '0')
                 echo "Mit Kampfrichter Pads<input type=\"radio\" name=\"Gerd\" value=\"1\" checked>";
         else
                 echo "Mit Kampfrichter Pads<input type=\"radio\" name=\"Gerd\" value=\"1\">";

       echo" </td>";

       if($dsatz['Wk_Art'] == "BL" && $dsatz['Online_Wk']== 0){
         echo"<td>";

           if($dsatz['auswertung_art'] == '1')
                   echo "Sinclair <input type=\"radio\" name=\"auswertung_art\" value=\"1\" checked>";
           else
                   echo "Sinclair <input type=\"radio\" name=\"auswertung_art\" value=\"1\">";
         echo" </td>";
       }

    if($dsatz['Wk_Art'] != "BL"){
       echo"<td>";

         if($dsatz['LosNummern'] == '1')
                 echo "Losnummern werden automatisch verteilt<input type=\"radio\" name=\"LosNr\" value=\"1\" checked>";
         else
                 echo "Losnummern werden automatisch verteilt<input type=\"radio\" name=\"LosNr\" value=\"1\">";

       echo" </td>";

       if($dsatz['Wk_Art'] == "ZK" || $dsatz['Wk_Art'] == "M_o_T" || $dsatz['Wk_Art'] == "M_m_T" ){
           if($dsatz['Wk_Art'] == "ZK" ){
       echo"<td>";
         if($dsatz['Rel_Sin_AlKl'] == '1')
                 echo "Ja<input type=\"radio\" name=\"ButtonRelSinAlKl\" value=\"1\" checked>";
         else
                 echo "Ja<input type=\"radio\" name=\"ButtonRelSinAlKl\" value=\"1\">";
       echo" </td>";

       echo"<td>";
         if($dsatz['Hauptauswertung'] == '1')
                 echo "Relativ<input type=\"radio\" name=\"ButtonHauptauswertung\" value=\"1\" checked>";
         else
                 echo "Relativ<input type=\"radio\" name=\"ButtonHauptauswertung\" value=\"1\">";
       echo" </td>";

           }

       echo"<td>";
       		if($dsatz['Grp_Einteilung'] == '1')
            	echo "Pro Heber<input type=\"radio\" name=\"ButtonGrpEinteilung\" value=\"1\" checked>";
            else
                echo "Pro Heber<input type=\"radio\" name=\"ButtonGrpEinteilung\" value=\"1\">";
       echo" </td>";
      }

    }
  echo"</tr>";


if($dsatz['Wk_Art'] == "ZK"){
  echo"<tr>";
  	echo"<td>";
      if($dsatz['Gerd'] == '1' && $dsatz['HHP_Hardware'] == '1')
  		echo "Mit HHP-Hardware<input type=\"radio\" name=\"Gerd\" value=\"2\" checked>";
  	  else
  		echo "Mit HHP-Hardware<input type=\"radio\" name=\"Gerd\" value=\"2\">";
  	echo" </td>";

       echo"<td>";
       echo" </td>";

       echo"<td>";
       echo" </td>";

       echo"<td>";
         if($dsatz['Hauptauswertung'] == '2')
                 echo "Sinclair<input type=\"radio\" name=\"ButtonHauptauswertung\" value=\"2\" checked>";
         else
                 echo "Sinclair<input type=\"radio\" name=\"ButtonHauptauswertung\" value=\"2\">";
       echo" </td>";

       echo"<td>";
       echo" </td>";

  echo"</tr>";
}elseif($dsatz['Wk_Art'] != "M_m_T"){
	echo"<tr>";
	  echo"<td>";
		if($dsatz['Gerd'] == '1' && $dsatz['HHP_Hardware'] == '1')
			echo "Mit HHP-Hardware<input type=\"radio\" name=\"Gerd\" value=\"2\" checked>";
		else
			echo "Mit HHP-Hardware<input type=\"radio\" name=\"Gerd\" value=\"2\">";
	  echo" </td>";

    if($dsatz['Wk_Art'] == "BL" && $dsatz['Online_Wk']== 0){
      echo"<td>";

        if($dsatz['auswertung_art'] == '2')
                echo "Skalierungsfaktor * Sinclair <input type=\"radio\" name=\"auswertung_art\" value=\"2\" checked>";
        else
                echo "Skalierungsfaktor * Sinclair <input type=\"radio\" name=\"auswertung_art\" value=\"2\">";
      echo" </td>";
    }

	echo"</tr>";
}



echo "</tbody>";
echo "</table>";



if(isset($_POST['speichern']))                                                                                          //Speichern
{
        $x=1;

        if($_POST['Gerd'] == '0'){
        	$Gerd=0;
        	$Hardware=0;
        }elseif($_POST['Gerd']=='1'){
        	$Gerd=1;
        	$Hardware=0;
        }elseif($_POST['Gerd']=='2'){
        	$Gerd=1;
        	$Hardware=1;
        }


    if($dsatz['Wk_Art'] == "ZK")
    {

    	$_POST['V_Faktor' . $i]=str_replace(",",".", $_POST['V_Faktor' . $i]);

         dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
                      SET Meisterschaft= '" . $_POST['Meisterschaft'] . "',
                      Ort= '" . $_POST['Ort'] . "',
                      Datum= '" . $_POST['Datum'] . "',
                      Heber_pro_M= '" . $_POST['HpM'] . "',
                      min_heber_pro_mann= '" . $_POST['mHpM'] . "',
                      auto_mannschaft= '" . $_POST['Auto-Mannschaft'] . "',
                      V_Faktor= '" . $_POST['V_Faktor'] . "',
                      Laenderwertung= '" . $_POST['LW'] . "',
                      Kampfrichter= '" . $_POST['KR'] . "',
                      Gerd= '$Gerd',
                      Pokal= '" . $_POST['Pokal'] . "',
                      Masters= '" . $_POST['Masters'] . "',
                      EineKlasse= '" . $_POST['EineKlasse'] . "',
                      Flagge= '" . $_POST['Fl'] . "',
                      International= '" . $_POST['Inter'] . "',
                      GesGrpAlKl= '" . $_POST['GesGrpAlKl'] . "' ,
                      Losnummern= '" . $_POST['LosNr'] . "',
                      Rel_Sin_AlKl= '" . $_POST['ButtonRelSinAlKl'] . "',
                      Hauptauswertung= '" . $_POST['ButtonHauptauswertung'] . "',
					  Zeitnehmer= '" . $_POST['Zeitnehmer'] . "',
					  HHP_Hardware='$Hardware',
                      Grp_Einteilung= '" . $_POST['ButtonGrpEinteilung'] . "',
                      DM= '" . $_POST['DM'] . "',
                      MitNorm= '" . $_POST['MitNorm'] . "',
                      NormAlKl= '" . $_POST['NormAlKl'] . "',
					  RelativArt= '" . $_POST['RelativArt'] . "',
					  RobiVorfaktor= '" . $_POST['RobiVorfaktor'] . "',
					  StartNr= '" . $_POST['StartNr'] . "',
					  Block_Heben= '" . $_POST['BlockHebenButton'] . "',
					  Meldelast='" . $_POST['Meldelast'] . "'
                      ");

         //Block_Heben= '" . $_POST['BlockHebenButton'] . "',

     }elseif($dsatz['Wk_Art'] != "BL"){

         $_POST['V_Faktor' . $i]=str_replace(",",".", $_POST['V_Faktor' . $i]);

         dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
                      SET Meisterschaft= '" . $_POST['Meisterschaft'] . "',
                      Ort= '" . $_POST['Ort'] . "',
                      Datum= '" . $_POST['Datum'] . "',
                      Heber_pro_M= '" . $_POST['HpM'] . "',
                      min_heber_pro_mann= '" . $_POST['mHpM'] . "',
                      auto_mannschaft= '" . $_POST['Auto-Mannschaft'] . "',
                      V_Faktor= '" . $_POST['V_Faktor'] . "',
                      Pendellauf= '" . $_POST['Pendellauf'] . "',
                      Sprint= '" . $_POST['Sprint'] . "',
                      Differenzsprung= '" . $_POST['Differenzsprung'] . "',
                      DifferenzsprungEmatte= '" . $_POST['DifferenzsprungEmatte'] . "',
                      Schlussdreisprung= '" . $_POST['Schlussdreisprung'] . "',
                      Schockwurf= '" . $_POST['Schockwurf'] . "',
                      Anristen= '" . $_POST['Anristen'] . "',
                      Klimmziehen= '" . $_POST['Klimmziehen'] . "',
                      Zug= '" . $_POST['Zug'] . "',
                      Bankdruecken= '" . $_POST['Bankdruecken'] . "',
                      Liegestuetz= '" . $_POST['Liegestuetz'] . "',
                      Beugestuetz= '" . $_POST['Beugestuetz'] . "',
                      Sternlauf= '" . $_POST['Sternlauf'] . "',
                      Laenderwertung= '" . $_POST['LW'] . "',
                      Kampfrichter= '" . $_POST['KR'] . "',
                      Gerd= '$Gerd',
                      Pokal= '" . $_POST['Pokal'] . "',
                      Flagge= '" . $_POST['Fl'] . "',
                      Losnummern= '" . $_POST['LosNr'] . "',
					  Zeitnehmer= '" . $_POST['Zeitnehmer'] . "',
					  HHP_Hardware='$Hardware',
                      Grp_Einteilung= '" . $_POST['ButtonGrpEinteilung'] . "',
                      mannschaft_nach_relativ = '" . $_POST['Mannschaft_Relativ'] . "',
					  RelativArt= '" . $_POST['RelativArt'] . "',
					  StartNr= '" . $_POST['StartNr'] . "',
					  Block_Heben= '" . $_POST['BlockHebenButton'] . "',
					  Meldelast='" . $_POST['Meldelast'] . "'
                      ");

        // Block_Heben= '" . $_POST['BlockHebenButton'] . "',
    }else{ //Also für BL
        if($OnlineWk==1){
                //Ohne Ort Meisterschaft Datum Liga
            dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
                      SET Kampfrichter= '" . $_POST['KR'] . "',
                      Gerd= '$Gerd',
					  Zeitnehmer= '" . $_POST['Zeitnehmer'] . "',
					  HHP_Hardware='$Hardware',
					  Block_Heben= '" . $_POST['BlockHebenButton'] . "',
					  Protokollant= '" . $_POST['Protokollant'] . "',
					  Mannschaftsfuehrer1= '" . $_POST['Mannschaftsfuehrer1'] . "',
					  KampfrichterName= '" . $_POST['KampfrichterName'] . "',
					  Mannschaftsfuehrer2= '" . $_POST['Mannschaftsfuehrer2'] . "',
					  Mannschaftsfuehrer3= '" . $_POST['Mannschaftsfuehrer3'] . "'
                      ");
        }else{

            dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']."
                      SET Meisterschaft= '" . $_POST['Meisterschaft'] . "',
                      Ort= '" . $_POST['Ort'] . "',
                      Datum= '" . $_POST['Datum'] . "',
                      Kampfrichter= '" . $_POST['KR'] . "',
                      Gerd= '$Gerd',
                      Liga= '" . $_POST['Leistungsklasse'] . "',
			                Zeitnehmer= '" . $_POST['Zeitnehmer'] . "',
					            HHP_Hardware='$Hardware',
					  Block_Heben= '" . $_POST['BlockHebenButton'] . "',
					  auswertung_art= '" . $_POST['auswertung_art'] . "',
                      Verein_Anzahl= '" . $_POST['Verein_Anzahl'] . "',
					  Protokollant= '" . $_POST['Protokollant'] . "',
					  Mannschaftsfuehrer1= '" . $_POST['Mannschaftsfuehrer1'] . "',
					  KampfrichterName= '" . $_POST['KampfrichterName'] . "',
					  Mannschaftsfuehrer2= '" . $_POST['Mannschaftsfuehrer2'] . "',
					  Mannschaftsfuehrer3= '" . $_POST['Mannschaftsfuehrer3'] . "'
                      ");
        }
    }


    $DBstammdaten = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
    $stammdaten = mysqli_fetch_assoc($DBstammdaten);

    $heberNachMeldung = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber
                                WHERE heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber");

    while($dsatz_aus = mysqli_fetch_assoc($heberNachMeldung)){
        //    echo $dsatz_aus['IdHeber'].'<br>';
        $IdHeber=$dsatz_aus['IdHeber'];
        safe_AlKl_GwKl($IdHeber,$stammdaten);
        //    echo "Erfolg";
    }


} //ENDE Speichern

if(isset($_POST['Pw-speichern']))                                                                                          //Speichern
{
        $x=1;
        $error = false;
        $passwort = $_POST['passwort'];
        $passwort2 = $_POST['passwort2'];
        $OldPw= $_POST['oldPw'];
        $hash=$dsatz['passwort'];

        if($dsatz['passwort']!=''){
             if(!password_verify($OldPw, $hash)){
                  echo '<a href="stammdaten.php" title="Error" id="error"><div class="zentriert">Altes Passwort falsch!</div></a>';
                  $error = true;
                  exit();
             }
        }
        if($passwort != $passwort2) {
                echo '<a href="stammdaten.php" title="Error" id="error"><div class="zentriert">Die Passwörter müssen Übereinstimmen!</div></a>';
                $error = true;
                exit();
        }
        if(!$error) {

          if($passwort!='') $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
          else $passwort_hash = NULL;

          dbBefehl("UPDATE stammdaten_wk_".$data_a_db['S_Db']." Set passwort= '$passwort_hash'");
          $_SESSION['user']=true;
        }
}

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'stammdaten.php'
   },0)
 </script>
";
}



?>

<br>

<input id="always-safe" type="submit" name="speichern" value="Speichern">
<input type="submit" name="Pw-speichern" value="Passwort Speichern">




</form>
</body>
</html>
