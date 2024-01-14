<?php
session_start();
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



<form method="post" action="mehrkampfergebnisse.php">

<p class="kopf"><b>Heber</b></p>


<a href="wettkampf.php" title="Link zum Wettkampf" id="range-logo">Wettkampf</a>



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
loginCheck($stammdaten);

         $Verein = dbBefehl("SELECT * FROM verein");

         $datenbank = dbBefehl("SELECT * FROM stammdaten_wk_".$data_a_db['S_Db']);
         $stammdaten = mysqli_fetch_assoc($datenbank);

         $Grp=$_SESSION['Mk_Grp'];

		 //F�r MK-�bersicht
         $auswerte_Gruppe=$_SESSION['Mk_Grp'];
         include 'funktionen/auswertung.php';
         $Grp=$_SESSION['Mk_Grp'];
         include 'funktionen/platzierungmk.php';
         $Grp=$_SESSION['Mk_Grp'];

         $heber = dbBefehl("SELECT * FROM heber_".$data_a_db['S_Db'].", heber, heber_wk_".$data_a_db['S_Db'].", verein
                               WHERE heber_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_".$data_a_db['S_Db'].".Gruppe = '$Grp'
                               AND heber_wk_".$data_a_db['S_Db'].".Versuch = '1'
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber.IdHeber
                               AND heber_wk_".$data_a_db['S_Db'].".IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
							   AND heber.IdVerein = verein.IdVerein
                               ORDER BY heber.Name ASC");



$x=0;




echo"<div id=\"divid1\" class=\"examplediv\">";






echo "   <table class=\"tabelle\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
                 <colgroup>
                         <col width=\"250\">
                         <col width=\"150\">
                         <col width=\"150\">
                         <col width=\"150\"> ";              //Tabellenkopf der immer Angezeigt wird

                 if($stammdaten['Pendellauf'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Sprint'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Differenzsprung'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['DifferenzsprungEmatte'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Schlussdreisprung'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Schockwurf'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Anristen'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Klimmziehen'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Zug'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Bankdruecken'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Liegestuetz'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Beugestuetz'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

                 if($stammdaten['Sternlauf'] == "1"){

                         echo"<col width=\"150\"> ";

                 }

      echo" </colgroup>


         <thead>


         <tr>
                 <th>Name</th>
                 <th>Verein</th>
                 <th>Jahrgang</th>
                 <th>Geschlecht</th>";


                 if($stammdaten['Pendellauf'] == "1"){

                         echo"<th>Pendellauf</th>";

                 }

                 if($stammdaten['Sprint'] == "1"){

                         echo"<th>Sprint</th>";

                 }

                 if($stammdaten['Differenzsprung'] == "1"){

                         echo"<th>Differenzsprung</th>";

                 }

                 if($stammdaten['DifferenzsprungEmatte'] == "1"){

                         echo"<th>Differenzsprung</th>";

                 }

                 if($stammdaten['Schlussdreisprung'] == "1"){

                         echo"<th>Schlussdreisprung</th>";

                 }

                 if($stammdaten['Schockwurf'] == "1"){

                         echo"<th>Schockwurf</th>";

                 }

                 if($stammdaten['Anristen'] == "1"){

                         echo"<th>Anristen</th>";

                 }

                 if($stammdaten['Klimmziehen'] == "1"){

                         echo"<th>Klimmziehen</th>";

                 }

                 if($stammdaten['Zug'] == "1"){

                        echo"<th>Zug</th>";

                 }

                 if($stammdaten['Bankdruecken'] == "1"){

                         echo"<th>Bankdruecken</th>";

                 }

                 if($stammdaten['Liegestuetz'] == "1"){

                         echo"<th>Liegestuetz</th>";

                 }

                 if($stammdaten['Beugestuetz'] == "1"){

                         echo"<th>Beugestuetz</th>";

                 }

                 if($stammdaten['Sternlauf'] == "1"){

                         echo"<th>Sternlauf</th>";

                 }



         echo" </tr>";
echo"</thead>";






$time=getdate();

$i = 0;


while($dsatz = mysqli_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{






$i = $i+1;


     $Id="Id" . $i;
     $Pendellauf="Pendellauf" . $i;
     $Sprint="Sprint" . $i;
     $Differenzsprung="Differenzsprung" . $i;
     $Schlussdreisprung="Schlussdreisprung" . $i;
     $Schockwurf="Schockwurf" . $i;
     $Anristen="Anristen" . $i;
     $Klimmziehen="Klimmziehen" . $i;
     $Zug="Zug" . $i;
     $Bankdruecken="Bankdruecken" . $i;
     $Liegestuetz="Liegestuetz" . $i;
     $Beugestuetz="Beugestuetz" . $i;
     $Sternlauf="Sternlauf" . $i;


echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"".$dsatz['IdHeber']."\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody class=\"ungerade\">";

} else {

echo "<tbody class=\"gerade\">";

}





echo "<tr align=\"center\" >";

     echo "<td>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Name']." </span>";
                 echo "<span style=\"width:100px;display:block;float:left;\"> ".$dsatz['Vorname']." </span>";
     echo "</td>";

     echo "<td>";      // Spalte (Mit drop down bar)
          echo $dsatz['Verein'];
     echo "</td>";

     echo "<td>";
          echo $dsatz['Jahrgang'];
     echo "</td>";

     echo "<td>";
          echo $dsatz['Geschlecht'];
     echo "</td>";


     if($stammdaten['Pendellauf'] == "1"){

        echo "<td>";

            echo "<input type=\"text\" name=$Pendellauf size=\"6\" value=\"".$dsatz['Pendellauf']."\"> sek.";

        echo "</td>";


     }

     if($stammdaten['Sprint'] == "1"){

      echo "<td>";

         echo "<input type=\"text\" name=$Sprint size=\"6\" value=\"".$dsatz['Sprint']."\"> sek.";

      echo "</td>";

     }

     if(($stammdaten['Differenzsprung'] == "1") || ($stammdaten['DifferenzsprungEmatte'] == "1")){

      echo "<td>";

         echo "<input type=\"text\" name=$Differenzsprung size=\"6\" value=\"".$dsatz['Differenzsprung']."\"> cm";

      echo "</td>";

     }

     if($stammdaten['Schlussdreisprung'] == "1"){

      echo "<td>";

         echo "<input type=\"text\" name=$Schlussdreisprung size=\"6\" value=\"".$dsatz['Schlussdreisprung']."\"> cm";

      echo "</td>";

     }

     if($stammdaten['Schockwurf'] == "1"){

      echo "<td>";

         echo "<input type=\"text\" name=$Schockwurf size=\"6\" value=\"".$dsatz['Schockwurf']."\"> cm";

      echo "</td>";

     }

     if($stammdaten['Anristen'] == "1"){

      echo "<td>";

         echo "<input type=\"text\" name=$Anristen size=\"6\" value=\"".$dsatz['Anristen']."\"> Wdh.";

      echo "</td>";

     }

     if($stammdaten['Klimmziehen'] == "1"){

      echo "<td>";

        echo "<input type=\"text\" name=$Klimmziehen size=\"6\" value=\"".$dsatz['Klimmziehen']."\"> Wdh.";

      echo "</td>";

     }

     if($stammdaten['Zug'] == "1"){

      echo "<td>";

         echo "<input type=\"text\" name=$Zug size=\"6\" value=\"".$dsatz['Zug']."\"> Wdh.";

      echo "</td>";

     }

     if($stammdaten['Bankdruecken'] == "1"){

      echo "<td>";

         echo "<input type=\"text\" name=$Bankdruecken size=\"6\" value=\"".$dsatz['Bankdruecken']."\"> Wdh.";

      echo "</td>";

     }

     if($stammdaten['Liegestuetz'] == "1"){

      echo "<td>";

         echo "<input type=\"text\" name=$Liegestuetz size=\"6\" value=\"".$dsatz['Liegestuetz']."\"> Wdh.";

      echo "</td>";

     }

     if($stammdaten['Beugestuetz'] == "1"){

      echo "<td>";

         echo "<input type=\"text\" name=$Beugestuetz size=\"6\" value=\"".$dsatz['Beugestuetz']."\"> Wdh.";

      echo "</td>";

     }

     if($stammdaten['Sternlauf'] == "1"){

      echo "<td>";

         echo "<input type=\"text\" name=$Sternlauf size=\"6\" value=\"".$dsatz['Sternlauf']."\"> sek.";

      echo "</td>";

     }


echo "</tr>";


         if(isset($_POST['speichern']))
         {


             $x=1;



             $_POST['Pendellauf' . $i]=str_replace(",",".", $_POST['Pendellauf' . $i]);

             $_POST['Sprint' . $i]=str_replace(",",".", $_POST['Sprint' . $i]);

             $_POST['Sternlauf' . $i]=str_replace(",",".", $_POST['Sternlauf' . $i]);
             $_POST['Schockwurf' . $i]=str_replace(",",".", $_POST['Schockwurf' . $i]);
             $_POST['Schlussdreisprung' . $i]=str_replace(",",".", $_POST['Schlussdreisprung' . $i]);
             $_POST['Differenzsprung' . $i]=str_replace(",",".", $_POST['Differenzsprung' . $i]);



                 dbBefehl("UPDATE heber_".$data_a_db['S_Db']."
                              SET Pendellauf= '" . $_POST['Pendellauf' . $i] . "',
                              Differenzsprung= '" . $_POST['Differenzsprung' . $i] . "', Sprint= '" . $_POST['Sprint' . $i] . "',
                              Schlussdreisprung= '" . $_POST['Schlussdreisprung' . $i] . "', Schockwurf= '" . $_POST['Schockwurf' . $i] . "',
                              Anristen= '" . $_POST['Anristen' . $i] . "', Klimmziehen= '" . $_POST['Klimmziehen' . $i] . "',
                              Zug= '" . $_POST['Zug' . $i] . "', Bankdruecken= '" . $_POST['Bankdruecken' . $i] . "', Liegestuetz= '" . $_POST['Liegestuetz' . $i] . "',
                              Beugestuetz= '" . $_POST['Beugestuetz' . $i] . "', Sternlauf= '" . $_POST['Sternlauf' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'");




         }



}
echo "</tbody>";
echo "</table>";





if($x==1)
{
reload_uebersicht_mk();	//in funktionen/nuetzliches.php

echo"
 <script>
 setTimeout(function(){
     location = 'mehrkampfergebnisse.php'
   },0)
 </script>
";

}





?>


<br>
<br>
<input type="submit" name="speichern" value="Speichern">





</form>
</body>
</html>
