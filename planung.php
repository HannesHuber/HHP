<?php
session_start();
$Wk_Nummer=$_SESSION['WeK'];

if (empty($_SESSION['LetzteSeite'])) {
	$_SESSION['LetzteSeite'] = 0;
}
$_SESSION['LetzteSeite'] = 0;

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


$_SESSION['Seite_Ml_A'] = 1;
$_SESSION['Filter_orginal'] = "";
$_SESSION['Filter_gruppe'] = "";
$_SESSION['Filter_isset'] = 0;
$_SESSION['Auswahl_Land'] = "";

header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/hauptmenue.css">

</head>
<body>


<a href="index.php" title="Link zur Startseite" id="range-logo">Startseite</a>

<table border ="0" width="100%" >
  <colgroup>
    <col width="200">
    <col>
  </colgroup>
<thead>
<tr>
    <td colspan="2" align="center" >




</tr>

<tr>
    <td colspan="2">

</tr>


<tr>
  <td>

   <font size="+1" >




<p class="kopf"><b>Planung</b></p>

       <br>


         <table class="tabelle" border="0" cellpadding="9" cellspacing="4">
         <tbody>


         <tr>
           <td onClick="location.href='stammdaten.php';">Stammdaten</td>
         </tr>


<?php


ob_start ();
error_reporting(1);

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$data_a_db['S_Db']=$_SESSION['WeK'];

$db=dbVerbindung();

$DataUserBlocker = dbBefehl("SELECT * FROM user_blocker_" . $data_a_db['S_Db']);
$UserBlocker = mysqli_fetch_assoc($DataUserBlocker);


         $data_a_db['S_Db']=$_SESSION['WeK'];   // Einfacher als alles zu ersetzen

         $datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);

         $dsatz = mysqli_fetch_assoc($datenbank);

         if($dsatz['Online_Wk']==1){
             $OnlineWk=1;
         }else{
             $OnlineWk=0;
         }


if($dsatz['Wk_Art']!='BL'){
    echo '<tr>';
          echo "<td onClick=\"location.href='startgebuehren.php';\">Startgebuehren</td>";
    echo '</tr>';
}

if($dsatz['Wk_Art']!='BL') $MeldelisteAnlegen='Meldeliste Anlegen';
else $MeldelisteAnlegen='Heber';

if($OnlineWk==0){   //Nur wenn kein Online Wk da sonst Heber schon angelegt
    echo '<tr>';
      if($dsatz['Wk_Art']=='BL') echo "<td onClick=\"location.href='meldeliste_anlegen.php';\">$MeldelisteAnlegen</td>";
      else
         if($UserBlocker['MeldelisteAnlegen']==0)
            echo "<td class=\"Hinweis\" onClick=\"location.href='meldeliste_anlegen.php';\">$MeldelisteAnlegen</td>";
         else
            echo "<td onClick=\"location.href='meldeliste_anlegen.php';\">$MeldelisteAnlegen</td>";
    echo '</tr>';
}


if($dsatz['Wk_Art']=='BL'){
    echo '<tr>';

      if($OnlineWk==0){
         if($UserBlocker['GrpEinteilung']==0)
            echo "<td class=\"Hinweis\" onClick=\"location.href='verein-und-heberwahl.php';\">Verein-und Heberwahl</td>";
         else
            echo "<td onClick=\"location.href='verein-und-heberwahl.php';\">Verein-und Heberwahl</td>";
      }else{ //Kein Hinweis n�tig f�r Online WK (Da Heber schon ausgew�hlt)
         echo "<td onClick=\"location.href='verein-und-heberwahl.php';\">Verein-und Heberwahl</td>";
      }
    echo '</tr>';
}

if($dsatz['Wk_Art']!='BL'){

     echo"
         <tr>
          <td onClick=\"location.href='mannschaften.php';\">Mannschaften Anlegen</td>
         </tr>
         <tr>
          <td onClick=\"location.href='meldeliste.php';\">Meldeliste</td>
         </tr>
	";
         if($dsatz['Pokal']==1){
         echo"
         <tr>
           <td onClick=\"location.href='pokal_grp.php';\">Pokal Auswahl</td>
         </tr>
         ";
         }



       echo '<tr>';

       if($dsatz['Wk_Art']=='ZK' || $dsatz['Wk_Art'] == "M_o_T" || $dsatz['Wk_Art'] == "M_m_T"){

         	if($UserBlocker['GrpEinteilung']==1 || ($UserBlocker['GrpEinteilung']==0 && $UserBlocker['MeldelisteAnlegen']==0)
         			|| ($UserBlocker['GrpEinteilung']==1 && $UserBlocker['MeldelisteAnlegen']==1))
         		if($dsatz['Grp_Einteilung'] == '0')
         			echo"<td onClick=\"location.href='gruppeneinteilung.php';\">Gruppeneinteilung</td>";
         		else
         			echo "<td onClick=\"location.href='gruppeneinteilung_pro_Heber.php';\">Gruppeneinteilung</td>";
         	else
         		if($dsatz['Grp_Einteilung'] == '0')
         			echo"<td class=\"Hinweis\" onClick=\"location.href='gruppeneinteilung.php';\">Gruppeneinteilung</td>";
         		else
         			if($UserBlocker['Wiegeliste']==0)
         				echo"<td class=\"Hinweis\" onClick=\"location.href='gruppeneinteilung_pro_Heber.php';\">Gruppeneinteilung</td>";
         			else
         				echo"<td onClick=\"location.href='gruppeneinteilung_pro_Heber.php';\">Gruppeneinteilung</td>";

         }else{

         	if($UserBlocker['GrpEinteilung']==1 || ($UserBlocker['GrpEinteilung']==0 && $UserBlocker['MeldelisteAnlegen']==0)
         			|| ($UserBlocker['GrpEinteilung']==1 && $UserBlocker['MeldelisteAnlegen']==1))

         		echo"<td onClick=\"location.href='gruppeneinteilung.php';\">Gruppeneinteilung</td>";
         	else
         		echo"<td class=\"Hinweis\" onClick=\"location.href='gruppeneinteilung.php';\">Gruppeneinteilung</td>";

         }

       echo '</tr>';


       /*
         echo '<tr>';
           if($UserBlocker[GrpEinteilung]==1 || ($UserBlocker[GrpEinteilung]==0 && $UserBlocker[MeldelisteAnlegen]==0)
              || ($UserBlocker[GrpEinteilung]==1 && $UserBlocker[MeldelisteAnlegen]==1))

           		if($dsatz[Wk_Art]=='ZK') echo"<td onClick=\"location.href='gruppeneinteilung_auswahl.php';\">Gruppeneinteilung</td>";
           		else echo"<td onClick=\"location.href='gruppeneinteilung.php';\">Gruppeneinteilung</td>";
           else
           		if($dsatz[Wk_Art]=='ZK') echo"<td class=\"Hinweis\" onClick=\"location.href='gruppeneinteilung_auswahl.php';\">Gruppeneinteilung</td>";
           		else echo"<td class=\"Hinweis\" onClick=\"location.href='gruppeneinteilung.php';\">Gruppeneinteilung</td>";
         echo '</tr>';
        */
}
if($dsatz['Wk_Art']!='BL'){

         if($dsatz['Wk_Art']!='ZK'){
         echo"
         <tr>
           <td onClick=\"location.href='athletik_gruppe.php';\">Athletik(Drucken)</td>
         </tr>
         ";
         }

   echo "<tr>
           <td onClick=\"location.href='quittung_verein.php';\">Quittung(Drucken)</td>
         </tr>
         <tr>
           <td onClick=\"location.href='teilnehmerliste.php';\">Teilnehmerliste(Drucken)</td>
         </tr>
         <tr>
           <td onClick=\"location.href='zeitplan.php';\">Zeitplan(Drucken)</td>
         </tr>";
}


   echo "<tr>";
          echo"<td onClick=\"location.href='wiegelisten_verein.php';\">Wiegelisten(Drucken)</td>";
   echo "</tr>";

   echo "<tr>";
   		echo"<td onClick=\"location.href='startkarten_verein.php';\">Startkarten(Drucken)</td>";
   echo "</tr>";

   //Nur wenn kein Online WK da sonst schon vor angelegt
   if($OnlineWk == 0 || $dsatz['Wk_Art'] != 'BL'){
   echo "
         <tr>
           <td onClick=\"location.href='vereine.php';\">Vereine</td>
         </tr>";
   }

   if($OnlineWk==0){
   echo "
         <tr>
           <td onClick=\"location.href='staaten.php';\">Staaten</td>
         </tr>";
}

   if($dsatz['Wk_Art']=='ZK' || $dsatz['Wk_Art']=='M_o_T' || $dsatz['Wk_Art']=='M_m_T'){
   echo "<tr>
           <td onClick=\"location.href='planung/einstellungen_zk.php';\">Einstellungen</td>
         </tr>";
    }
?>



          </tbody>
         </table>




  <td>



           </td>


         </tr>
        </colgroup>
       </thead>
      </table>




    </td>

  </td>

 </tr>
 </thead>
</table>
<br>
<br>
<br>
<br><br>
</body>
</html>
