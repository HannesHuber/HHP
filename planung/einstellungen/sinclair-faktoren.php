<?php
session_start();
if (empty($_SESSION['al_kl_setup_error'])) {
    $_SESSION['al_kl_setup_error'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>

<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">
<script type='text/javascript' src="check_funktion.js"></script>

<link rel="stylesheet" type="text/css" href="../../CSS/alg.css">
<link rel="stylesheet" type="text/css" href="../../CSS/table.css">


</head>
<body>

<form method="post" action="altersklassen-setup.php">

<p class="kopf"><b>Altersklassen-Einstellungen</b></p>
<p>Hinweis:</p>
<p>Änderungen die Sie in dieser Tabelle vornehmen sind tiefgreifend!</p>
<p>Führen Sie Änderungen an dieser Tabelle immer direkt nach der Erstellung eines Wettkampfes durch,</p>
<p>noch bevor Sie Heber in Meldeliste Anlegen "Melden", anderen falls kann es zu Fehlern führen!</p>
<a href="../einstellungen_zk.php" title="Link zu den Einstellungen" id="range-logo">Einstellungen</a>

<table class="tabelle" border="1">
  <colgroup>
    <col width="60">
    <col width="60">
    <col width="125">
  </colgroup>

<thead>
 <tr>
  <th>Von</th>
  <th>Bis</th>
  <th>Klasse</th>
  <th>&nbsp;</th>
 </tr>
</thead>

<?php

ob_start ();
error_reporting(1);

include '../../funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);
loginCheck($stammdaten);

$Klasse = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']." ORDER BY Von ASC");

$Klassen_Array=array();
$zaehler=0;
$DataArrayDuplicate = dbBefehl("SELECT * FROM alters_klassen_zk_".$data_a_db['S_Db']." ORDER BY Von ASC");
while($DataDuplicate = mysqli_fetch_assoc($DataArrayDuplicate))
{
        $zaehler++;
        $Klassen_Array[$zaehler]=$DataDuplicate['Klasse'];
}


$i = 0;
$V = 0;
$B = 0;
$LB = 0;
$error=0;
$error_art=0;
$AlKlNeu_error=0;
$Neue_AlKl="Neue_AlKl";
$duplicated_array=array();
while($dsatz = mysqli_fetch_assoc($Klasse))
{


$i++;
     $Von="Von" . $i;
     $Bis="Bis" . $i;
     $Class="Class" . $i;
     $loeschen="loeschen" . $i;


 echo '<tr>';
   echo "<td><input type=\"text\" name=$Von id=$Von size=\"6\" value=\"$dsatz[Von]\"></td>";
   echo "<td><input type=\"text\" name=$Bis id=$Bis size=\"6\" value=\"$dsatz[Bis]\"></td>";
         if($dsatz['Klasse']=='Aktive') echo "<td><input type=\"text\" name=$Class id=$Class size=\"10\" value=\"".$dsatz['Klasse']."\" readonly></td>";
         else echo "<td><input type=\"text\" name=$Class id=$Class size=\"10\" value=\"".$dsatz['Klasse']."\"></td>";

         if($dsatz['Klasse']!='Aktive') echo "<td><input id=\"loeschen\" type=\"submit\" name=$loeschen value=\"Loeschen\"></td>";
         else echo '<td></td>';
 echo '</tr>';


    if(isset($_POST['speichern'])){

         $Klasse_Post=$_POST['Class' . $i];

         //Against Spezial Chars!-----------------------------------------------------
         $d_Klasse=$dsatz['Klasse'];
         $muster = "/[ !�$%&(){}=+*~#';:.,~@`������������������������Ұ^-]/";     //Keine Sonderzeichen


         if(preg_match($muster, $Klasse_Post)){
                  $error=$i; echo '<p style="color:red">Error: Bitte keine Sonderzeichen oder Leerzeichen im Namen! Seite muss neugeladen werden!</p>';
                  exit();
         }

                //Against Safe as Masters!-------------------------------------------------------
         $xx=substr($Klasse_Post,0,-1);
         $xx=strtoupper($xx);
         if(($xx=="AK")||($xx=="AK1")){
                 $error=$i;
                 echo '<p style="color:red">Error: Ung�ltiger Name! Seite muss neugeladen werden!</p>';
                 exit();
         }

                //Against double Name!--------------------------------------------------------------
         foreach ($Klassen_Array as $key => $value) {
                 if($key != $i){
                         if($value==$Klasse_Post){
                                 $error=$i;
                                 echo '<p style="color:red">Error: Doppelter Name! Seite muss neugeladen werden!</p>';
                                 exit();
                         }
                 }
         }
         unset($value); // wegen $verweis auf value

         $check_array=array();
         $check_array[$i]=array();

         $check_array[$i]["Von"]=$dsatz["Von"];
         $check_array[$i]["Bis"]=$dsatz["Bis"];
         $check_array[$i]["Klasse"]=$dsatz["Klasse"];

         $V=$_POST['Von' . $i];
         $B=$_POST['Bis' . $i];

         if(($B-$V)<0){ $error=$i; echo '<p style="color:red">Error: Von > Bis bei Klasse: ' . $dsatz["Klasse"] . '! Seite muss neugeladen werden!</p>';  exit();}
         if($error==0){
                 $x=1;

                    if($Klasse_Post!=$dsatz['Klasse']){

                         $AlteSpalte_M=$dsatz["Klasse"] . "_M";
                         $AlteSpalte_W=$dsatz["Klasse"] . "_W";
                         $NeueSpalte_M=$_POST['Class' . $i] . "_M";
                         $NeueSpalte_W=$_POST['Class' . $i] . "_W";

                         dbBefehl("ALTER TABLE gewichtsklassen_".$data_a_db['S_Db']." CHANGE $AlteSpalte_M  $NeueSpalte_M INT(11), CHANGE $AlteSpalte_W  $NeueSpalte_W INT(11)");
                         dbBefehl("ALTER TABLE gruppen_".$data_a_db['S_Db']." CHANGE Gk_$AlteSpalte_M  Gk_$NeueSpalte_M INT(11), CHANGE Gk_$AlteSpalte_W  Gk_$NeueSpalte_W INT(11)");


                    }

                    dbBefehl("UPDATE alters_klassen_zk_".$data_a_db['S_Db']."
                                    SET Von= '" . $_POST['Von' . $i] . "',Bis= '" . $_POST['Bis' . $i] . "',
                                                                Klasse= '" . $_POST['Class' . $i] . "'
                                    WHERE Klasse = '$d_Klasse'");
         }

         $LB=$_POST['Bis' . $i];

    }


    if(isset($_POST['loeschen' . $i])){

           $x=1;
           $DeletAlKl=$dsatz['Klasse'];
           $DeletAlKlGwKl_M=$dsatz['Klasse'] . "_M";
           $DeletKlGwKl_W=$dsatz['Klasse'] . "_W";


           dbBefehl("ALTER TABLE gewichtsklassen_".$data_a_db['S_Db']." DROP $DeletAlKlGwKl_M, DROP $DeletKlGwKl_W");
           dbBefehl("ALTER TABLE gruppen_".$data_a_db['S_Db']." DROP Gk_$DeletAlKlGwKl_M, DROP Gk_$DeletKlGwKl_W");
           dbBefehl("DELETE FROM alters_klassen_zk_".$data_a_db['S_Db']." WHERE Klasse ='$DeletAlKl'");
    }

    if($error!=0){

        echo"<script>test($error,$error_art);</script>";
        $error=0;
        $error_art=0;
    }
    if($dsatz['Klasse']==$Neue_AlKl) $AlKlNeu_error=1;



}       //Ende While schleife




if(isset($_POST['newAlKl-A']) || isset($_POST['newAlKl-S']) || isset($_POST['newAlKl-K']) || isset($_POST['newAlKl-J'])){



        if($AlKlNeu_error==1) echo "<script>AlKlneuError();</script>";
    else{
              $x=1;
        $NeuAlKlGwKl_M=$Neue_AlKl . "_M";
        $NeuAlKlGwKl_W=$Neue_AlKl . "_W";
                $NeuAlKlGrp_M=$Neue_AlKl . "_M";
                $NeuAlKlGrp_W=$Neue_AlKl . "_W";
                dbBefehl("INSERT INTO alters_klassen_zk_".$data_a_db['S_Db']." (Von,Bis,Klasse)
                       Values ('-1','0','$Neue_AlKl')");
        dbBefehl("ALTER TABLE gewichtsklassen_".$data_a_db['S_Db']." ADD $NeuAlKlGwKl_M INT(11), ADD $NeuAlKlGwKl_W INT(11)");
        dbBefehl("ALTER TABLE gruppen_".$data_a_db['S_Db']." ADD Gk_$NeuAlKlGwKl_M INT(11), ADD Gk_$NeuAlKlGwKl_W INT(11)");


        if(isset($_POST['newAlKl-A'])){ $GwKl_Copie='Aktive'; }
        if(isset($_POST['newAlKl-J'])){ $GwKl_Copie='Jugend'; }
        if(isset($_POST['newAlKl-S'])){ $GwKl_Copie='Schüler'; }
        if(isset($_POST['newAlKl-K'])){ $GwKl_Copie='Kinder'; }

        $query="Update gewichtsklassen, gewichtsklassen_{$data_a_db['S_Db']}
                        Set {$NeuAlKlGwKl_M} = gewichtsklassen.{$GwKl_Copie}_M, {$NeuAlKlGwKl_W} = gewichtsklassen.{$GwKl_Copie}_W
                                Where gewichtsklassen.Id= gewichtsklassen_{$data_a_db['S_Db']}.Id";

        dbBefehl($query);
          }

}

?>

</table>


<br>
<br>
<input id="always-safe" type="submit" name="speichern" value="Speichern">
<input id="newAlKl" type="submit" name="newAlKl-A" value="Neue Altersklasse mit GwKl der Aktiven"><br>
<input id="newAlKl" type="submit" name="newAlKl-J" value="Neue Altersklasse mit GwKl der Jugend"><br>
<input id="newAlKl" type="submit" name="newAlKl-S" value="Neue Altersklasse mit GwKl der Schüler"><br>
<input id="newAlKl" type="submit" name="newAlKl-K" value="Neue Altersklasse mit GwKl der Kinder">

<?php

if($x==1)
{
echo"
 <script>
 setTimeout(function(){
     location = 'altersklassen-setup.php'
   },0)
 </script>
";
}

?>
</form>
</body>
</html>
