<?php
session_start();
$Wk_Nummer=$_SESSION['WeK'];

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


if (empty($_SESSION['Aus_L_Grp'])) {
	$_SESSION['Aus_L_Grp'] = 0;
}
if (empty($_SESSION['Aus_R_Grp'])) {
	$_SESSION['Aus_R_Grp'] = 0;
}
if (empty($_SESSION['Aus_S_Grp'])) {
	$_SESSION['Aus_S_Grp'] = 0;
}
if (empty($_SESSION['alleGrp'])) {
	$_SESSION['alleGrp'] = 0;
}
if (empty($_SESSION['Aus_AlKl'])) {
	$_SESSION['Aus_AlKl'] = 0;
}
if (empty($_SESSION['GesGrp'])) {
	$_SESSION['GesGrp'] = 0;
}

if (empty($_SESSION['Aus_GrpUndAlKl'])) {
	$_SESSION['Aus_GrpUndAlKl'] = 0;
}

if (empty($_SESSION['AuswertungMitZeit'])) {
	$_SESSION['AuswertungMitZeit'] = 0;
}

if (empty($_SESSION['Auswahl_Relativ_pro_JG'])) {
	$_SESSION['Auswahl_Relativ_pro_JG'] = '';
}

if (empty($_SESSION['MitNorm'])) {
	$_SESSION['MitNorm'] = 0;
}





header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">
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
  <td>

   <font size="+1" >


<p class="kopf"><b>Auswertung</b></p>

       <br>
       <br>

         <table class="tabelle" width="300" border="0" cellpadding="9" cellspacing="4">
         <tbody>

<?php


ob_start ();
error_reporting(1);


include 'Outsorst/Code_auf_jeder_Seite.php';
include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$dsatz = mysqli_fetch_assoc($datenbank);

if($dsatz['Wk_Art']=='BL'){
    if($dsatz['Online_Wk']==1)  $OnlineWk=1;
    else                        $OnlineWk=0;
}


if($dsatz['Wk_Art'] == "M_o_T")
{

         echo "<tr>
                 <td onClick=\"location.href='m_o_t_gruppe.php';\">Mehrkampfauswertung ohne Technik</td>

              </tr>


              <tr>
                 <td onClick=\"location.href='mannschaftsauswertung.php';\">Mannschaftsauswertung</td>
              </tr>";

         if($dsatz['Pokal'] == "1"){
             echo "<tr>
             <td onClick=\"location.href='laender_mannschaftsauswertung.php';\">Pokal-Länder-Mannschaftsauswertung</td>
              </tr>";
         }
         echo"
              <tr>
                 <td onClick=\"location.href='Urkunde_Grp.php';\">Urkunden</td>
              </tr>

              <tr>
                 <td onClick=\"location.href='laenderwertung_grp.php';\">Länderauswertung</td>
              </tr>

              ";

}elseif($dsatz['Wk_Art'] == "M_m_T"){

         echo "<tr>
                 <td onClick=\"location.href='m_o_t_gruppe.php';\">Mehrkampfauswertung Mit Technik</td>

              </tr>


              <tr>
                 <td onClick=\"location.href='mannschaftsauswertung.php';\">Mannschaftsauswertung</td>
              </tr>";

         if($dsatz['Pokal'] == "1"){
             echo "<tr>
             <td onClick=\"location.href='laender_mannschaftsauswertung.php';\">Pokal-Länder-Mannschaftsauswertung</td>
              </tr>";
         }
         echo"
              <tr>
                 <td onClick=\"location.href='Urkunde_Grp.php';\">Urkunden</td>
              </tr>

              <tr>
                 <td onClick=\"location.href='laenderwertung_grp.php';\">Länderauswertung</td>
              </tr>

              ";





}elseif($dsatz['Wk_Art'] == "ZK"){

    echo"
         <tr>
           <td onClick=\"location.href='zk_ausw_gruppe.php';\">ZK Auswertungen</td>
         </tr>";

   echo "<tr>
           <td onClick=\"location.href='mannschaftsauswertung.php';\">Mannschaftsauswertung</td>
         </tr>
         <tr>
           <td onClick=\"location.href='Urkunde_Grp.php';\">Urkunden</td>
         </tr>
         <tr>
           <td onClick=\"location.href='laenderwertung_grp.php';\">Länderauswertung</td>
         </tr>
         ";

}elseif($dsatz['Wk_Art'] == "BL"){

    echo"
         <tr>
           <td onClick=\"location.href='bundesliga_auswertung.php';\">Protokoll</td>
         </tr>";

}


if($dsatz['Pokal'] == 1){
    echo"
         <tr>
           <td onClick=\"location.href='pokal_auswertung.php';\">Pokal Auswertung</td>
         </tr>
         ";
}

echo"
         <tr>";
           echo "<td onClick=\"location.href='auswertung_export.php';\">CSV Export der Auswertung</td>";
         echo "</tr>
         ";

         if($OnlineWk==1){
             echo"
                <tr>
                    <td onClick=\"location.href='online-upload-auswahl.php';\">Export in das Onlineportal</td>
                </tr>";
         }
?>

          </tbody>
         </table>


  <td>


    </td>

  </td>

 </tr>
 </thead>
</table>


</body>
</html>
