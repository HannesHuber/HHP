<?php
session_start();
if (empty($_SESSION['BL_Verein_number'])) {
    $_SESSION['BL_Verein_number'] = 0;
}
if (empty($_SESSION['BL_Verein_auswahl'])) {
    $_SESSION['BL_Verein_auswahl'] = '';
}

header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<style>
.TextBox{
    width: auto;
    padding: 5px 3px;
    margin: 8px 0;
    border: 1px solid #555;
    outline: none;
    display:block;
    overflow:hidden;
    white-space:nowrap;
}
</style>

<script type="text/javascript">
function popup (url) {


 var w = "screen.width";
 var h = "screen.height";

 fenster = window.open(url,"windowname4", "width=900, height=700, toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1");

 fenster.focus();
 return false;
}
</script>


</head>



<body>



<form method="post" action="verein-und-heberwahl.php">

<a href="planung.php" title="Link zur Planung" id="range-logo">Planung</a>


<?php



ob_start ();
error_reporting(1);

function Get_Verein_Name($IdVerein) {
    global $db;
    if($IdVerein!=0){
        $DataVerein = dbBefehl("SELECT * FROM verein Where IdVerein='$IdVerein'");
        $DVerein=mysqli_fetch_assoc($DataVerein);
        $VereinName=$DVerein['Verein'];
    }else
        $VereinName='';

  return $VereinName;
}

include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

$OnlineWk=$stammdaten['Online_Wk']; //Ist 1 f�r Online_WK

$Verein = dbBefehl("SELECT * FROM verein Where Bundesliga='1'  Order By Verein");
$Verein2 = dbBefehl("SELECT * FROM verein Where Bundesliga='1' Order By Verein");
$Verein3 = dbBefehl("SELECT * FROM verein Where Bundesliga='1' Order By Verein");

$DataSpeicherVereine = dbBefehl("SELECT * FROM bl_vereins_auswahl_".$data_a_db['S_Db']." Where Id='1'");
$DSpeicherVereine = mysqli_fetch_assoc($DataSpeicherVereine);

//Daten der Vereine aus Bl_Vereins_Auswahl
$IdVerein1=$DSpeicherVereine['Verein1'];
$VereinName1=Get_Verein_Name($IdVerein1);

$IdVerein2=$DSpeicherVereine['Verein2'];
$VereinName2=Get_Verein_Name($IdVerein2);

$IdVerein3=$DSpeicherVereine['Verein3'];
$VereinName3=Get_Verein_Name($IdVerein3);


//Pr�f Funktion falls Verein gewechselt wird mit schon ausgew�hlten hebern,
//Dass dann diese heber aus heber_$wk entfernt werden

$heber_check= dbBefehl("SELECT * FROM heber, heber_".$data_a_db['S_Db']."
                               WHERE heber.IdHeber= heber_".$data_a_db['S_Db'].".IdHeber
							  ");
while($dsatz_aus = mysqli_fetch_assoc($heber_check))
{
    if($stammdaten['Verein_Anzahl']==2){
        if($dsatz_aus['IdVerein']!=$IdVerein1 && $dsatz_aus['IdVerein']!=$IdVerein2){
            $SQL="DELETE FROM heber_".$data_a_db['S_Db']." WHERE IdHeber = '$dsatz_aus[IdHeber]' ";
            dbBefehl($SQL);
        }
    }elseif($stammdaten['Verein_Anzahl']==3){
        if($dsatz_aus['IdVerein']!=$IdVerein1 && $dsatz_aus['IdVerein']!=$IdVerein2 && $dsatz_aus['IdVerein']!=$IdVerein3){
            $SQL="DELETE FROM heber_".$data_a_db['S_Db']." WHERE IdHeber = '$dsatz_aus[IdHeber]' ";
            dbBefehl($SQL);
        }
    }

}

echo"<p class=\"kopf\" align=\"center\"><font size=\"10\"><b>Verein-und Heberwahl</font></b></p>";

echo"
<br>
";

echo"
<br>
<br>
<br>";

echo '<table width="60%" border="0" cellpadding="0" cellspacing="2" >';
echo '<tr>';
  echo '<td><p class="unter">Verein 1</p></td>';
  echo '<td><p class="unter">Verein 2</p></td>';
  if($stammdaten['Verein_Anzahl']==3)
    echo '<td><p class="unter">Verein 3</p></td>';
 echo'</tr>';
 echo '<tr>';


if((isset($_POST['send']))&&($_POST['Auswahl']==''))
{
         $style="border: 2px solid #FF0000";
         $stylezwei="background-color: #FAFFAD";
}


   echo '<td>';

   if($OnlineWk==1){
       echo '<div class=TextBox>'.$VereinName1.'</div>';
       $_POST['Auswahl']=$IdVerein1;

   }else{
         echo "<select STYLE=\"$style; $stylezwei;\" name=\"Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

         if($DSpeicherVereine['Verein1'] == ""){
             echo "<option value=\"\" selected>Wählen...</option>";
         }else{
             echo "<option value=$IdVerein1 selected>$VereinName1</option>";
             echo "<option value=\"\">kein Verein</option>";
         }
                 while($dataAuswahl = mysqli_fetch_assoc($Verein))
                 {
                         if($DSpeicherVereine['Verein1']==$dataAuswahl['Verein']){

                                 $merke=str_replace(' ','_,_',$dataAuswahl['IdVerein']);
                                 echo "<option value=$merke selected>".$dataAuswahl['Verein']."</option>";

                         }else{
                                 $merke=str_replace(' ','_,_',$dataAuswahl['IdVerein']);
                                 echo "<option value=$merke>".$dataAuswahl['Verein']."</option>";
                         }
                 }
         echo "</select>";
   }


         echo"<input type=\"submit\" name=\"send\" value=\"Heber Auswählen\">";
   echo '</td>';


echo"
<br>
<br>
<br>";

if((isset($_POST['V2Send']))&&($_POST['V2_Auswahl']==''))
{
         $style2="border: 2px solid #FF0000";
         $stylezwei2="background-color: #FAFFAD";
}


    echo '<td>';

    if($OnlineWk==1){
        echo '<div class=TextBox>'.$VereinName2.'</div>';
        $_POST['V2_Auswahl']=$IdVerein2;

    }else{


         echo "<select STYLE=\"$style2; $stylezwei2;\" name=\"V2_Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

         if($DSpeicherVereine['Verein2'] == ""){
             echo "<option value=\"\" selected>Wählen...</option>";
         }else{
             echo "<option value=$IdVerein2 selected>$VereinName2</option>";
             echo "<option value=\"\">kein Verein</option>";
         }

                 while($dataGrpAuswahl = mysqli_fetch_assoc($Verein2))
                 {
                         if($DSpeicherVereine['Verein2']==$dataGrpAuswahl['Verein']){
                                 $merke=str_replace(' ','_,_',$dataGrpAuswahl['IdVerein']);
                                 echo "<option value=$merke selected>".$dataGrpAuswahl['Verein']."</option>";
                         }else{
                                 $merke=str_replace(' ','_,_',$dataGrpAuswahl['IdVerein']);
                                 echo "<option value=$merke>".$dataGrpAuswahl['Verein']."</option>";
                         }
                 }
         echo "</select>";
    }


         echo"<input type=\"submit\" name=\"V2Send\" value=\"Heber Auswählen\">";
     echo '</td>';


     echo"
<br>
<br>
<br>";

     if((isset($_POST['V3Send']))&&($_POST['V3_Auswahl']==''))
     {
         $style3="border: 2px solid #FF0000";
         $stylezwei3="background-color: #FAFFAD";
     }



if($stammdaten['Verein_Anzahl']==3){

     echo '<td>';

     if($OnlineWk==1){
         echo '<div class=TextBox>'.$VereinName3.'</div>';
         $_POST['V3_Auswahl']=$IdVerein3;

     }else{


         echo "<select STYLE=\"$style3; $stylezwei3;\" name=\"V3_Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

         if($DSpeicherVereine['Verein3'] == ""){
             echo "<option value=\"\" selected>Wählen...</option>";
         }else{
             echo "<option value=$IdVerein3 selected>$VereinName3</option>";
             echo "<option value=\"\">kein Verein</option>";
         }

                 while($dataGrpAuswahl = mysqli_fetch_assoc($Verein3))
                 {
                     if($DSpeicherVereine['Verein3']==$dataGrpAuswahl['Verein']){
                         $merke=str_replace(' ','_,_',$dataGrpAuswahl['IdVerein']);
                         echo "<option value=$merke selected>".$dataGrpAuswahl['Verein']."</option>";
                     }else{
                         $merke=str_replace(' ','_,_',$dataGrpAuswahl['IdVerein']);
                         echo "<option value=$merke>".$dataGrpAuswahl['Verein']."</option>";
                     }
                 }
                 echo "</select>";
     }


     echo"<input type=\"submit\" name=\"V3Send\" value=\"Heber Auswählen\">";
     echo '</td>';

}   //Ende if Verein Anzahl == 3


 echo'</tr>';
echo'</table>';



if((isset($_POST['send'])) || (isset($_POST['V2Send'])) || (isset($_POST['V3Send'])) || (isset($_POST['Safe'])))
{

    if($_POST['Auswahl']!='') $Verein1=str_replace('_,_',' ',$_POST['Auswahl']);
    else $Verein1='';

    if($_POST['V2_Auswahl']!='') $Verein2=str_replace('_,_',' ',$_POST['V2_Auswahl']);
    else $Verein2='';

    if($_POST['V3_Auswahl']!='') $Verein3=str_replace('_,_',' ',$_POST['V3_Auswahl']);
    else $Verein3='';

    if(isset($_POST['send'])){
        $_SESSION['BL_Verein_auswahl']=$Verein1;
        $_SESSION['BL_Verein_number']=1;
    }elseif(isset($_POST['V2Send'])){
        $_SESSION['BL_Verein_auswahl']=$Verein2;
        $_SESSION['BL_Verein_number']=2;
    }elseif(isset($_POST['V3Send'])){
        $_SESSION['BL_Verein_auswahl']=$Verein3;
        $_SESSION['BL_Verein_number']=3;
    }

    dbBefehl("UPDATE bl_vereins_auswahl_".$data_a_db['S_Db']."
                   SET Verein1= '$Verein1', Verein2= '$Verein2', Verein3= '$Verein3'
                   Where Id='1'");





    if( ( isset($_POST['send'])&&$_POST['Auswahl']!='' ) || (isset($_POST['V2Send'])&&$_POST['V2_Auswahl']!='' ) ||
        ( isset($_POST['V3Send'])&&$_POST['V3_Auswahl']!='' ))
    {
    echo"
 <script>
 setTimeout(function(){
     location = 'verein-heber-auswahl.php'
   },0)
 </script>
";
    }elseif( isset($_POST['Safe']) ){
        echo"
 <script>
 setTimeout(function(){
     location = 'verein-und-heberwahl.php'
   },0)
 </script>
";
    }
}



?>

<br><br>
<input type="submit" name="Safe" value="Speichern">







</form>
</body>
</html>
