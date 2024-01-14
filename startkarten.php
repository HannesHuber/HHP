<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<link rel="stylesheet" type="text/css" href="CSS/startkarten.css" />
<link rel="stylesheet" type="text/css" href="CSS/startkarten_print.css" media="print" />

</head>



<body>


<form method="post" action="startkarten.php">

<p class="kopf"><b>Startkarten</b></p>


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
$stammdaten = mysqli_fetch_assoc($datenbank);

$Grp=$_SESSION['Startkarten_Grp'];
$Verein_or_Grp=$_SESSION['Startkarte_nach_Verein_oder_Grp'];
$Verein_Startkarten=$_SESSION['Startkarten_Verein'];

if($Verein_Startkarten!='0') $arrayStartkarten[]=$Verein_Startkarten;
else{
    $ArrayVorhandeneVereine = ReturnArrayGemeldeteVereine();
    foreach ($ArrayVorhandeneVereine as &$Verein) {
        $get=str_replace(' ','_,_',$Verein);
        $arrayStartkarten[]=$get;
    }
}



if ($stammdaten['LosNummern']==1)  LosNrVerteiler($data_a_db['S_Db']);          //f�r automatische Verteilung der LosNr



$Verein = dbBefehl("SELECT * FROM verein");

$WettKaArt=$stammdaten['Wk_Art'];


$time=getdate();

$i = 0;
$count=1;

if($Verein_or_Grp == 0){

  foreach ($arrayStartkarten as &$Verein_Startkarten) {

    $Verein_Startkarten=str_replace('_,_',' ',$Verein_Startkarten);

    if($WettKaArt=='ZK'){
            if($stammdaten['DM']==1){
                    $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein, laender
                                            WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                          AND heber.IdVerein = verein.IdVerein
                        AND verein.IdLaender = laender.Idlaender
                                            AND verein.Verein= '$Verein_Startkarten'
                                            ORDER BY verein.Verein, heber.Name, heber_".$data_a_db['S_Db'].".Gruppe ASC, heber.Geschlecht ASC, heber.GwKl ASC,
                                            heber_".$data_a_db['S_Db'].".ZKLast DESC");
            }else{
                    $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein, laender
                                            WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                          AND heber.IdVerein = verein.IdVerein
                        AND verein.IdLaender = laender.Idlaender
                                            AND verein.Verein= '$Verein_Startkarten'
                                            ORDER BY verein.Verein, heber.Name, heber_".$data_a_db['S_Db'].".Gruppe ASC, heber.AlKl ASC, heber.Geschlecht ASC, heber.GwKl ASC,
                                            heber.Name ASC");
            }

    }elseif($WettKaArt=='M_m_T' || $WettKaArt=='M_o_T'){

    $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein, laender
                          WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                      AND heber.IdVerein = verein.IdVerein
                        AND verein.IdLaender = laender.Idlaender
                                            AND verein.Verein= '$Verein_Startkarten'
                          ORDER BY  heber.Name, heber_".$data_a_db['S_Db'].".Gruppe_Aus ASC, heber.Jahrgang DESC, heber.Geschlecht ASC,
                          heber.Name ASC");
    }else{
      $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, verein, laender
          WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                      AND heber.IdVerein = verein.IdVerein
                        AND verein.IdLaender = laender.Idlaender
                                            AND verein.Verein= '$Verein_Startkarten'
          ORDER BY  heber.Name, heber_".$data_a_db['S_Db'].".Gruppe ASC, heber.Jahrgang DESC, heber.Geschlecht ASC,
          heber.Name ASC");
    }






    while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
    {

    $i++;

    if($i==3){
        echo'<div id="page-break"></div>';
        $i=1;
    }

    echo '<div id="BoxStammdaten">';
    echo '<table class="StammTableOben" >
      <tr>
        <th colspan="4">'.$stammdaten['Meisterschaft'].'</th>
      </tr>
      <tr>
        <td colspan="2">Name: '.$dsatz['Name'].'</td>
        <td colspan="2">Vorname: '.$dsatz['Vorname'].'</td>
      </tr>
      <tr>
        <td colspan="2">Verein: '.$dsatz['Verein'].'</td>
        <td colspan="2">Bundesland: '.$dsatz['laender'].'</td>
      </tr>
      <tr>
        <td colspan="2">Jahrgang: '.$dsatz['Jahrgang'].'</td>
        <td colspan="2">Los-Nr.: ';

      if ($stammdaten['LosNummern']==1) echo $dsatz['LosNr'];

    echo '</td>
      </tr>
      <tr>
        <td colspan="2">KöGw:</td>
        <td colspan="2">GwKl:</td>
      </tr>
    </table>';

      echo '
    <table class="StammTableUnten" >
    <tr>
    <th></th>
    <th colspan="1">Versuch 1</th>
    <th colspan="2">Versuch 2</th>
    <th colspan="2">Versuch 3</th>
    </tr>
    <tr>
    <th rowspan="3">Reissen</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td  colspan="2"></td>
    <td  colspan="2"></td>
    </tr>
    <tr>
    <td></td>
    <td  colspan="2"></td>
    <td  colspan="2"></td>
    </tr>

    <tr>
    </tr>

    <tr>
    <th rowspan="3">Stossen</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td  colspan="2"></td>
    <td  colspan="2"></td>
    </tr>
    <tr>
    <td></td>
    <td  colspan="2"></td>
    <td  colspan="2"></td>
    </tr>
    </table>';

    echo '</div>';

    echo '<br>';

    }

  }       //Ende for each Verein

}else{ //Für den Fall für nach Gruppe:

  if($stammdaten['International']=='0'){       //Ver�ndertes Order By

    $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", staaten, verein
                          WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                          AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                          AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                          AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                          AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                          AND staaten.IdStaat=heber.IdStaat
      AND heber.IdVerein = verein.IdVerein
                          ORDER BY $SortString heber.Name ASC");
 }else{

    $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", staaten, verein
                          WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                          AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                          AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                          AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
                          AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                          AND heber.IdStaat=staaten.IdStaat
      AND heber.IdVerein = verein.IdVerein
                          ORDER BY $SortString staaten.Staat ASC, heber.Name ASC");
 }



  while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
  {

  $i++;

  if($i==3){
      echo'<div id="page-break"></div>';
      $i=1;
  }

  echo '<div id="BoxStammdaten">';
  echo '<table class="StammTableOben" >
    <tr>
      <th colspan="4">'.$stammdaten['Meisterschaft'].'</th>
    </tr>
    <tr>
      <td colspan="2">Name: '.$dsatz['Name'].'</td>
      <td colspan="2">Vorname: '.$dsatz['Vorname'].'</td>
    </tr>
    <tr>
      <td colspan="2">Verein: '.$dsatz['Verein'].'</td>
      <td colspan="2">Bundesland: '.$dsatz['laender'].'</td>
    </tr>
    <tr>
      <td colspan="2">Jahrgang: '.$dsatz['Jahrgang'].'</td>
      <td colspan="2">Los-Nr.: ';

    if ($stammdaten['LosNummern']==1) echo $dsatz['LosNr'];

  echo '</td>
    </tr>
    <tr>
      <td colspan="2">KöGw:</td>
      <td colspan="2">GwKl:</td>
    </tr>
  </table>';

    echo '
  <table class="StammTableUnten" >
  <tr>
  <th></th>
  <th colspan="1">Versuch 1</th>
  <th colspan="2">Versuch 2</th>
  <th colspan="2">Versuch 3</th>
  </tr>
  <tr>
  <th rowspan="3">Reissen</th>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  </tr>
  <tr>
  <td></td>
  <td  colspan="2"></td>
  <td  colspan="2"></td>
  </tr>
  <tr>
  <td></td>
  <td  colspan="2"></td>
  <td  colspan="2"></td>
  </tr>

  <tr>
  </tr>

  <tr>
  <th rowspan="3">Stossen</th>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  </tr>
  <tr>
  <td></td>
  <td  colspan="2"></td>
  <td  colspan="2"></td>
  </tr>
  <tr>
  <td></td>
  <td  colspan="2"></td>
  <td  colspan="2"></td>
  </tr>
  </table>';

  echo '</div>';

  echo '<br>';

  }



}

         if(isset($_POST['reload']))
         {
         header('Location: http://localhost/ksv/planung.php');
         }


?>


</form>
</body>
</html>
