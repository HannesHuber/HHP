<?php
session_start();
if (empty($_SESSION['WeK'])) {
    $_SESSION['WeK'] = '';
}
if (empty($_SESSION['ReloadFromDbBefehl'])) {
    $_SESSION['ReloadFromDbBefehl'] = 0;
}
if (empty($_SESSION['ReloadFromDbBefehlChecker'])) {
    $_SESSION['ReloadFromDbBefehlChecker'] = 0;
}
$_SESSION['user'] = 0;

//session_destroy();

header('Content-Type: text/html; charset=utf-8');

?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<link rel="stylesheet" type="text/css" href="CSS/start.css">

<script type='text/javascript' src="jquery-2.2.1.min.js"></script>
<script type='text/javascript' src="JS/start_funktionen.js"></script>

</head>

<body>

<script>
function myFunction() {
    location.reload();
}
</script>

<form method="post" action="start.php">
<br><br><br><br><br><br>


<span id="ajaxtest"></span>
<span id="ajax-loeschen"></span>
<span id="mkot_ersteller"></span>
<span id="mkmt_ersteller"></span>

<div id="modal">
  <div class="spinner">
     <div class="bounce1"></div>
     <div class="bounce2"></div>
     <div class="bounce3"></div>
  </div>
</div>

<?php

ob_start();
error_reporting(1); //1 E_ALL
//Version!!!
//Update 1.016 für Offline Liga kein Löschen beim Speichern in Meldeliste-Anlegen f�r BL
//Update 1.017 unter zk_start die gruppen_$Creat von 8 auf 10 erh�ht, damit die Grp einteilung der Masters funktioniert
//Update 1.018 Komplett erneuerung der Reload Funktion f�r alle sich selbst ernuerden Anzeigen z.B. Übersicht
//Update 1.019 Fix nach Anzeigen Update, damit wieder Korrekt 3 Striche bei 3Kr angezeigt werden und damit das Ergebniss �ber Wk pads korrekt angezeigt wird
//Update 1.021 Wenn Masters Aktiv dann in ZK auswertung mit Sinclair
//Mannschaften Fix das auch mindest Anzahl gewertet wird
//Auto erfassung der Altersklassen jetzt beim Speichern in Stammdaten und Meldeliste
//Update 1.022 Auch Online Vereine werden nun in Offline BL Vereins Auswahl angezeigt
//Update 1.023 Fix Einzel Kr Fix f�r Anzeige
//Update 1.024 Fix Altersklassen hinzuf�gen
//Update 1.025 Fix Gruppeneinteilung in f�r mk-Wk
//Update 1.027 Mehrkampf Mannschaften k�nnen nun nach Relativ oder Mk Gesamt ausgewertet werden
//Update 1.028 Update f�r die �bersicht f�r die Zuschauer
//Update 1.029 Robi Wertung f�r ZK in �bersicht sowie Auswertung
//Update 1.029 Kommentare kann man nun Speichern (Vorbereitung auf hochlade Update)
//Update 1.031 Diverse anpassungen für Internationale Wk's z.B. Wiegeliste mit StartNr nach GwKl nach LosNr + StartNr auf Anzeige + Übersicht Farbanpassungen
//Update 1.032 Dezentrales Steigern + Neue Spalte in wk_reload_$WkNummer Grp mit Reload Iterationen in Dezentralen Steigerungen
//Update 1.033 Bundesliga Season Update
//Update 1.034 Bundesliga Season Update mit kommentar Upload
//Update 1.035 Bundesliga Season Update mit kommentar Upload
//Update 1.036 Korrekte Vorhersage des 3. Versuchs in der Versuchsreihenfolge
//Update 1.037 Übersicht in Bl kann nun zwischen Gruppe und Vereins Sortierung wechseln Neuer Wk needed (änderungen in Stammdaten)
//Update 1.038 Fixed Startgeb�hren zu Startgebueren Coding error
//Update 1.040 Überarbeitung allen Codes von ASCII zu Unix codierung + Fix von Heberreihenfolge!
//Update 1.041 Fix nun auch richtige Reihenfolge auf allen ANzeigen + tmp_gerd_$bridge
//Update 1.042 Neue hinterlegte DB für neuinstallation oder DB reset
//Update 1.043 Update der Stammdaten, jetzt kann die Meldelast extra ausgewählt werden, damit diese bei der Teilnehmerliste angezeigt wird
//Update 1.044 DM Schüler Update, DM Herren Update + Speicher Buttons Update
//Update 1.045 Update für "Neuer Heber" Button für heruntergeladene Bundesliga Wettkämpfe dieser Löscht nun alle alten Heber mit der selben OnlineID und erstellt dann einen neuen
//Update 1.046 Update nHeber_funktion/Pad-Resett && hinzufügen von tmp_absignal_1/2 für Absignal ausgehend von Wk-Pads
//Update 1.047 Heber outsorst/heber_auswahl_zk.php ANSI->UTF8 (Unterschied für Masters)
//Update 1.048 Anpassung der Liga Gruppen, damit Liga SW überall 3 Gruppen zur Auswahl haben (vorallem für wk-Korrektur)
//Update 1.049 Einführung Blockheben option in Stammdaten für ZK
//Update 1.049 Mehrkampf: 2 Nachkommastellen für Distanzen/Zeit für Mehrkampfdisziplinen überall, BL-EinzelheberAnzeige=> GwKLasse -> KöGw
//Update 1.049 Außerdem entfernung nicht funktionsfähiger DB backup und DB import funktionen unter start/einstellungen/alg_einstellungen
//Update 1.050 Entfernen von Block_Heben in ZK/MK/Masters
//Update 1.051 Bug Fix Relativabzug für KöGw > 160kg jetzt möglich
//Update 1.052 Online_import Einzelmeisterschaft fix
//Update 1.053 Update Urkunden DM Aktive
//Update 1.054 Update verein-heber-auswahl.php --> if($OnlineWk==1) => getrennt für online und offline
//Update 1.055 Bug Fix Sternlauf MK Auswertung
//Update 1.056 Bug Fix Sternlauf asuwertung_funktionen.php
//Update 1.057 Anpassungen Nachkommastellen MK
//Update 1.058 Sinclair auswertungsoption für Liga + Bezirksliga skalierungs_faktoren Auswertung eingefügt
//Update 1.060 ALLES durchgegangen um das Programm fit zu machen für die PHP 8.++ daher array[string] => array['string']
//Update 1.061 Bug Fix in übersicht (Rel Punkte, Sin Punkte, Sin*F Punkte)
//Update 1.062 Bug Fix in Übersicht (Vereine Gesamt Pkt änderte sich nicht => Problem in EinzelheberAuswertungs funktion)
//Update 1.063 Anpassung der EinzelHeberAnzeige => KöGw für BL
//Update 1.064 Skalierungsfaktor alle
//Update 1.065 Masters jetzt bis AK13
//Update 1.066 Update Table alters_klassen_masters
//Update 1.067 Bug in dezentraler Steigerung in zusammenhang mit start nummer
//Update 1.068 Masters calculation update to “Sinclair-Huebner-Meltzer-Faber” (SHMF)
//Update 1.069 Bug fix für Online WK nachmeldung für vereins anpassung bei update (funktion neuer Heber)
//Update 1.070 Jahrgang jetzt auch anpassbar über neuer Heber in Meldeliste für online WK
//Update 1.071 Uebersicht für DM Junioren/Aktive anpassungen Juniroen eigene Farbe Skalierung
//Update 1.072 wkfunktionen/gueltig+ungueltig date => timestamp
//Update 1.073 Heber Reihenfolge vorhersage bug fix Update time Dif
//Update 1.074 Bug Fix Bl Upload loop => no location reload... && Hinweis für Neuer Heber erstellen ID Wichtig!
//Update 1.075 Error catch for online download if Gewicht ==0 AND GwKl == 0
//Update 1.076 Bug in Auswertung für Robi-Punkte wenn GwKl z.B. von Kinder nicht mit Tabelle Aktive übereinstimmt
//Update 1.078 Bug in Relativwetung für Gewicht unter Gewicht x(?) Kg
//Update 1.079 AK Bug in Platzierung für ZK/Reißen/Stoßen
//Update 1.080 Dezentrale Steigerung Filter
//Update 1.081 Groesseres Master Update für Daniela und Ralf
//Update 1.082 Harald Farner Änderungen
//Update 1.083 Harald Farner Änderungen "5 neue Heber" in meldeliste anlegen vergessen
//Update 1.084 Update wiegeliste jetzt sorted by grp and with different pages
//Update 1.085 Fixed a bug with new download of all lifters in BL (Bug was all lifters there displayed in protocoll and uploaded)
//Update 1.086 Fixed Bug such that Reißen und Stoßen needed to be filled was all lifters there displayed in protocoll and uploaded)
//Update 1.087 Tryed to adjust file name for linux (case sensitiv) aspecially "KR" -> "kr"
//Update 1.088 Incoperated IAT-points for "Zweikampf" and "Mehrkampf(Schlussdreisprung/3er-Hopp/Kugel-Schock)"
//Update 1.100 Performance Update (Vorallem einzel Heber einfügen aus uebersicht zu WK-Leiter verschoben und überarbeitet)
//Update 1.101 kleinigkeiten
//Update 1.103 Nach DM Aktive OHNE bug fix von AK?!
//Update 1.104 Bug Fix AK (Nur wenn AK erst nach 1. Hebung erfolgt...)
//Update 1.105 Included an mysql seassion setting function to ensure all databases are the same (MAC of Thomas)
//Update 1.106 Anzeige Fehler RelativGewicht für BL in Übersicht (Beseitigt)
//Update 1.107 Jahrgang sollte nun nicht mehr wenn leer zu Bugs führen
//Update 1.108 Länderwertung für Mk_o_T Bug wird wieder angezeigt
//Update 1.109 IAT-Pkt anzeige Uebersicht Bug fixed
//Update 1.110 IAT-Punkte in Wiegeliste
//Update 1.111 IAT-Punkte in Uebersicht
//Update 1.112 AlKl anpassen in base tables
//Update 1.113 Anzeige Überarbeitung
//Update 1.114 Sinclair erweiterung bis 1.0Kg
//Update 1.115 Neue Vereine anlegen Bug fix

//    => Introduce check if in auswertung values are not 0 or none for R1 and S1
/* Regelt die Updates:
if($Version['Versionsnummer']!=$Version_Now){
	echo"<script> dbUpdate($Version_Now) </script>"; //Von JS/start_funktionen.js und führt zu Ajax-PHP/db_update.php
}
*/

//-----------------------------------------------------------------------------------------------------------------------
$Version_Now=1.115;
echo '<a id="Versionsnummer"> Version: '. $Version_Now .'</a>';
//-----------------------------------------------------------------------------------------------------------------------

include 'funktionen/db_verbindung.php';

function PruefeObFeldExistiertSonstAnlegen($tabellenname, $feldname, $feldArt){
    global $db;

    //Prüfe ob tmp_ss_reload_$bridge ist erweiter (Seit Bundesliga Neu 23.09.2018)
    $result = dbBefehl("SHOW COLUMNS FROM $tabellenname");

    $_tablespecs = array();   // alle Properties aller Felder der Tabelle
    $_record = array();       // Zwischenpuffer für die Abfrage


    while($_record = mysqli_fetch_assoc($result))
    {
        $_tablespecs[$_record['Field']] = $_record;
    }

    if (isset($_tablespecs[$feldname]))
    {
        //echo "Feld existiert.";
    }else{
        //echo "Feld existiert nicht.";
        $QueryAlter="ALTER TABLE $tabellenname ADD $feldname $feldArt";
        dbBefehl($QueryAlter);
    }
}

dbTest();

include 'Outsorst/start_tabellen_erstellen.php';
//Javascript weist auf PHP in Ajax-PHP Ordner
$db=dbVerbindung();

setMySQL_Mode(); //in db_verbindungen.php


// $result = mysqli_query($db, "SELECT @@sql_mode as sql_mode");
// $row = mysqli_fetch_assoc($result);

// echo "<br> Current SQL Mode: " . $row['sql_mode'];

$query="SELECT * FROM datenbanken WHERE Id_Db NOT IN ('0')";	//nicht NULL wegen redirect to start in code jede Seite

$result = dbBefehl($query);

$val = mysqli_query($db,'Select * From versions_tabelle');

if($val == FALSE)
{
    dbBefehl("
        CREATE TABLE versions_tabelle(
        Id INT,
        Versionsnummer FLOAT(11,3)
        )
    ");

    dbBefehl("INSERT INTO versions_tabelle (Id, Versionsnummer)
                      Values ('1', '1')");

}

$Version_Data = dbBefehl('Select * From versions_tabelle Where Id="1"');
$Version = mysqli_fetch_assoc($Version_Data);

if($Version['Versionsnummer']!=$Version_Now){
      echo"<script> dbUpdate($Version_Now) </script>"; //Von JS/start_funktionen.js und führt zu Ajax-PHP/db_update.php
}


$x=0;

echo '<p class="kopf" align="left"><font size="10"><b>Datenbanken</font></b></p>';


echo "
<div style=\"text-align: left;\">";
echo "
<table class=\"tabelle\"   border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
<thead>

 <tr>
  <th>Datenbanken</th>
  <th>Laden</th>
 </tr>


</thead>

";

$i = 0;

while ($dsatz = mysqli_fetch_assoc($result)){


$i = $i+1;

     $Id="Id" . $i;
     $DB="DB" . $i;
     $Loeschen="Loeschen" . $i;
     $Laden="Laden" . $i;



echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"$dsatz[Id_Db]\"readonly>";


echo "<tbody>";


echo "<tr>";


     echo "<td>";


          echo "<input type=\"text\" name=$DB size=\"100\" value=\"$dsatz[Datenbank]\" readonly>";

          //Weiterleitung aber JS/start_funktionen zu Ajax-PHP/loeschen_start.php
          echo "<button type=\"button\" id=\"$Loeschen\" name=\"$Loeschen\" onclick=\"loeschen(this.value)\" value=\"$dsatz[Id_Db]\">Loeschen</button>";

     echo "</td>";


     echo "<td align=\"center\">";

          echo "<input type=\"submit\" name=$Laden value=\"Laden\">";

     echo "</td>";


echo "</tr>";


    if(isset($_POST['Laden' . $i]))                                                  //Laden
    {
            $Sdb= "" . $_POST['Id' . $i] . "";

            $_SESSION['WeK']=$Sdb;

            dbBefehl("DELETE FROM tmp_db");
            dbBefehl("INSERT INTO tmp_db (S_Db) Values ('$Sdb')");

            echo"
            <script>
                    setTimeout(function(){
                    location = 'index.php'
                    },0)
            </script>
            ";
    }
}

echo "</tbody>";
echo "</table>";

echo"<br>";

echo "

<table width=\"600\"  border=\"0\" cellpadding=\"0\" cellspacing=\"2\" align=\"left\">

";

  echo "<tr>";

     echo "<td>";

         $SpF = "Speicherfeld";
         echo"Wettkampftitel:";
         echo "<input type=\"text\" id=\"Speicherfeld\" name=$SpF size=\"60\">";                           //Speicher Eingabefeld

     echo "</td>";
     echo "<td>";



     echo "</td>";

     echo "</tr>";



  echo "</tr>";

  echo "<tr>";

    echo"<td>";

    echo"</td>";


    echo"<td>";

         echo "<button type=\"button\" id=\"zk-load\" name=\"new_wettkampf\" onclick=\"zk_ersteller()\">Neuer Zweikampf - Wettkampf</button>";
         echo "<button type=\"button\" id=\"mkot-button\" name=\"new_mkot\" onclick=\"mk_o_t_ersteller()\">Neuer Mehrkampf ohne Technikwertung</button>";
         echo "<button type=\"button\" id=\"mkmt-button\" name=\"new_mkmt\" onclick=\"mk_m_t_ersteller()\">Neuer Mehrkampf mit Technikwertung</button>";
         echo "<button type=\"button\" id=\"bl-button\" name=\"new_bl\" onclick=\"bl_ersteller()\">Neuer Ligakampf</button>";
    echo"</td>";


  echo"</tr>";

echo "</tbody>";
echo "</table>";

echo"</div>";

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'start.php'
   },0)
 </script>
";
}

?>

<a href="/einstellungen/alg_einstellungen.php" title="Link zu Einstellungen" id="range-logo">Einstellungen</a>

<a href="/import_auswahl.php" title="Link zum WK-Import" id="range-logo-unten">WK-Import</a>


</form>
</body>
</html>
