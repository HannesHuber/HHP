<?php
session_start();
$Wk_Nummer=$_SESSION['WeK'];

if (empty($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/startseite.css">

</head>



<body>

<a href="login.php" title="Link zu Login" id="login">Login</a>
<a href="logout.php" title="Link zu Logout" id="logout">Logout</a>
<a href="start.php" title="Link zu Datenbanken" id="range-logo"><---</a>


<p class="kopf" align="center"><b><font size="10">Startseite </font></b></p>

<table class="table">
  <colgroup>
    <col width="50%">
    <col width="50%" >
  </colgroup>


<tbody>

  <tr>

     <td align="center">

         <a href=planung.php title="Link zur Planung" class="range-logo">Planung</a>

     </td>

<?php

ob_start ();
error_reporting(1);

include 'funktionen/db_verbindung.php';
$db=dbVerbindung();
$data_a_db['S_Db']=$_SESSION['WeK'];
$datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
$stammdaten = mysqli_fetch_assoc($datenbank);

if($stammdaten['Online_Wk']==1){
    $OnlineWk=1;
}else{
    $OnlineWk=0;
}



$DataUserBlocker = dbBefehl("SELECT * FROM user_blocker_".$data_a_db['S_Db']);
$UserBlocker = mysqli_fetch_assoc($DataUserBlocker);

    echo '<td align="center">';

    if($OnlineWk==0){
     if($stammdaten['Wk_Art'] == "ZK"){
     	if($UserBlocker['GrpEinteilung']==0 && $stammdaten['Grp_Einteilung'] == '0')
     		echo'<a title="Link zum Wettkampf" class="Blocked">Wettkampf</a>';
     	else
     		echo'<a href=wettkampf.php title="Link zum Wettkampf" class="range-logo">Wettkampf</a>';
	 }else{
         if($UserBlocker['GrpEinteilung']==1)
            echo'<a href=wettkampf.php title="Link zum Wettkampf" class="range-logo">Wettkampf</a>';
         else
            echo'<a title="Link zum Wettkampf" class="Blocked">Wettkampf</a>';
	 }
    }else{  //Wenn Online Wk kein muss f�r Vorheriege Gruppeneinteilung (Heber schon fix)
        echo'<a href=wettkampf.php title="Link zum Wettkampf" class="range-logo">Wettkampf</a>';
    }
    echo '</td>';


  echo '</tr>';
  echo '<tr>';


    echo '<td colspan="2" align="center">';

if($OnlineWk==0){
    if($stammdaten['Wk_Art'] == "ZK"){
    	if($UserBlocker['GrpEinteilung']==0 && $stammdaten['Grp_Einteilung'] == '0')
    		echo'<a title="Link zur Auswertung" class="Blocked">Auswertung</a>';
    	else
    		echo '<a href=auswertung.php title="Link zur Auswertung" class="range-logo">Auswertung</a>';
    }else{
    	if($UserBlocker['GrpEinteilung']==1)
    		echo '<a href=auswertung.php title="Link zur Auswertung" class="range-logo">Auswertung</a>';
    	else
    		echo'<a title="Link zur Auswertung" class="Blocked">Auswertung</a>';
    }
}else{
    echo '<a href=auswertung.php title="Link zur Auswertung" class="range-logo">Auswertung</a>';
}

   echo '</td>';

?>
  </tr>

 </tbody>
</table>

</body>
</html>
