<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Mannschaften</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">


<style type="text/css">
@import "allgemein.css";
@import "tabelle.css";


</style>


</head>



<body>



<form method="post" action="mannschaften.php">

<p class="kopf"><b>Mannschaften</b></p>




<?php

                                                                                                  // Button f�r mannschaften anlegen muss grau sein bis
ob_start ();                                                                                      // Nach Verein gefiltert wurde!
error_reporting(0);                                                                               //


$conn = mysql_connect("database_hhp","root","") or die(mysql_error());
mysql_select_db("test");



         $aktuelle_db = mysql_query("SELECT * FROM tmp_db")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $data_a_db = mysql_fetch_assoc($aktuelle_db)
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $heber = mysql_query("SELECT * FROM heber_$data_a_db[S_Db], heber
                               WHERE heber_$data_a_db[S_Db].IdHeber = heber.IdHeber")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());

         $Verein = mysql_query("SELECT * FROM verein")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         $Get_M = mysql_query("SELECT * FROM mannschaften_$data_a_db[S_Db]")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());









$x=0;


echo "<table class=Filter border=\"5\" width=\"450\" cellpadding=\"4\" cellspacing=\"5\">";

echo "  <colgroup>
         <col width=\"28%\">
         <col width=\"28%\">
         <col width=\"28%\">
         <col width=\"16%\">

         </colgroup>";



echo "<tfoot>";
  echo "<tr>";

    echo "<td>";

         echo "Verein";

    echo "</td>";




  echo "</tr>";


  echo "<tr>";

    echo"<td>";



         echo "<select name=\"Auswahl\" size=\"1\" class=\"Auswahl\"><br>";

         echo "<option value=\"\" selected>W�hlen...</option>";

         while($dataAuswahl = mysql_fetch_assoc($Verein))
         {


           $merke=str_replace(' ','_,_',$dataAuswahl[Verein]);

                 echo "<option value=$merke>$dataAuswahl[Verein]</option>";


         }

         echo "</select>";


    echo "</td>";




    echo "<td align=\"center\">";

         echo "<input type=\"submit\" name=Filter value=\"Filtern\">";

    echo "</td>";

  echo "</tr>";

echo "</tfoot>";
echo "</table>";




if(isset($_POST['Filter']))
{

$orginal=str_replace('_,_',' ',$_POST['Auswahl']);

         if($_POST['Auswahl'] != "")
         {

                 $heber = mysql_query("SELECT * FROM heber
                                         WHERE Verein = '$orginal'")

                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         }




}



echo"<div id=\"divid1\" class=\"examplediv\">";


echo"<table border=\"1\" width=\"100%\">

         <colgroup>

         <col width=\"50%\">
         <col width=\"50%\">


         </colgroup>

";
echo"<tr>";
echo"<td>";




if(isset($_POST['Filter']))                                                           // f�r dynamische K�stchen
{


echo "

<table  border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"100\">
    <col width=\"350\">
    <col width=\"150\">
    <col width=\"150\">

  </colgroup>


<thead>

 <tr>
  <th>Mannschaft</th>
  <th>Name</th>
  <th>Verein</th>
  <th>Jahrgang</th>

 </tr>
</thead>
";



}else{

echo "

<table  border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
  <colgroup>
    <col width=\"300\">
    <col width=\"120\">
    <col width=\"120\">
    <col width=\"120\">
  </colgroup>


<thead>

 <tr>
  <th>Name</th>
  <th>Verein</th>
  <th>Jahrgang</th>
  <th>+</th>

 </tr>
</thead>
";



}



$i = 0;


while($dsatz = mysql_fetch_assoc($heber))                                                      // Anlegen der Tabelle(IdHeber muss ai sein)
{


$i = $i+1;


     $Id="Id" . $i;
     $L�schen="L�schen" . $i;
     $Ausserkonkurrenz="Ausserkonkurrenz" . $i;
     $Konkurrenz="Konkurrenz" . $i;
     $Mannschaft="Mannschaft" . $i;
     $Plus="Plus" . $i;
     $Auswahl="Auswahl" . $i;



echo "<input type=\"text\" name=$Id size=\"0\" style=\" visibility:hidden; \" value=\"$dsatz[IdHeber]\"readonly>";



if ($i % 2 != 0) {                                            //ungerades und gerades i indikator

echo "<tbody bgcolor=\"#F3EDCB\">";

} else {

echo "<tbody bgcolor=\"#E1D5F5\">";

}





echo "<tr align=\"center\" >";





         if(isset($_POST['Filter']))                                                           // f�r dynamische K�stchen
         {

         echo "<td>";

              echo "<input type=\"checkbox\" name=$Mannschaft value=\"aktiv\">";

         echo "</td>";

         }








     echo "<td>";



         echo"<table border=\"0\" width=\"300\">

              <colgroup>

              <col width=\"30%\">
              <col width=\"24%\">
              <col width=\"24%\">
              <col width=\"22%\">

              </colgroup>

         ";
               echo "<td>";
               echo "</td>";


                echo "<td align=\"left\">";

                         echo "$dsatz[Name] &nbsp;";

                echo "</td>";



                echo "<td align=\"left\">";

                         echo " $dsatz[Vorname]";

                echo "</td>";


                echo "<td align=\"right\">";

                         echo "<input type=\"submit\" name=$L�schen value=\"L�schen\">";

                echo "</td>";


         echo"</table>";



     echo "</td>";




     echo "<td>";

          echo "$dsatz[Verein]";

     echo "</td>";




     echo "<td>";


          echo "$dsatz[Jahrgang]";


     echo "</td>";








     echo "<td>";                                                                                                // Spalte (Mit drop down bar)

          echo "<select name=\"$Auswahl\" size=\"1\" class=\"Auswahl\">";

          echo "<option value=\"\">W�hlen</option>";


         $Mannschaft = mysql_query("SELECT *
                                    FROM mannschaften_$data_a_db[S_Db]
                                    ")

                       OR die ("<pre>\n".$sql."</pre>\n".mysql_error());




                       while($dataM = mysql_fetch_assoc($Mannschaft))
                       {


                                         echo "<option value=$dataM[Mannschaft]>$dataM[Mannschaft]</option>";
                                         echo "<input type=\"submit\" name=$Plus value=\"+\">";


                        }



                  echo "</select>";

         echo "</td>";









echo "</tr>";



         if(isset($_POST['Ausserkonkurrenz' . $i]))
         {
                 $x=1;

                 mysql_query("UPDATE heber_$data_a_db[S_Db]
                              SET Ausserkonkurrenz = 'Ausserkonkurrenz'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         }


         if(isset($_POST['Konkurrenz' . $i]))
         {

                 $x=1;

                 mysql_query("UPDATE heber_$data_a_db[S_Db]
                              SET Ausserkonkurrenz = ''
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         }







         if(isset($_POST['L�schen' . $i]))                                                                                          //L�schen
         {

          $x=1;




           mysql_query("DELETE FROM heber_$data_a_db[S_Db]
                               WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


           OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         }



         if(isset($_POST['s_mannschaft']))                                                                          //Mannschaft Speicher button
         {



                 if($_POST['Mannschaft' . $i] =="aktiv")
                 {

                   $x=1;

                         mysql_query("UPDATE heber_$data_a_db[S_Db]
                                      SET Mannschaft ='" . $_POST['t_mannschaft'] . "'
                                      WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


                         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());





                 }



         }





         if(isset($_POST['Plus' . $i]))
         {
                 $x=1;

                 mysql_query("UPDATE heber_$data_a_db[S_Db]
                              SET Mannschaft = '" . $_POST['Auswahl' . $i] . "'
                              WHERE IdHeber ='" . $_POST['Id' . $i] . "'")


                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


         }







}                          //while schleife zuende




   echo "</tbody>";
  echo "</table>";


  echo "<br>";


  echo"<input type=\"text\" name=\"t_mannschaft\" size=\"10\" >";

  echo"<input type=\"submit\" name=\"s_mannschaft\" value=\"Mannschaft Anlegen\">";

  echo"

  <br>
  <br>
  <br>

  <a href=planung.php><img src=\"Home.jpg\" width=\"50\" height=\"47\" border=\"0\"
  onmouseover=\"this.src='home2.jpg'\" onmouseout=\"this.src='home.jpg'\" alt=\"Zur�ck zum Index\"></a>


  ";





 echo"</td>";




 echo"<td vertical-align=\"top\">";                                                       // �ber Tabelle Rechte seite beginnt hier!





  $d=0;



 while($Mdsatz = mysql_fetch_assoc($Get_M))
 {

    $f=0;
    $d++;

    $L�schen_G_M="L�schen_G_M" . $d;







         $M_Heber = mysql_query("SELECT * FROM heber_$data_a_db[S_Db], heber
                               WHERE heber_$data_a_db[S_Db].IdHeber = heber.IdHeber
                               AND heber_$data_a_db[S_Db].Mannschaft ='$Mdsatz[Mannschaft]'")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());






          echo "

                 <table width=\"85%\" border=\"1\" cellpadding=\"0\" cellspacing=\"2\">
                 <colgroup>
                  <col width=\"17.5%\">
                  <col width=\"30%\">
                  <col width=\"17.5%\">
                  <col width=\"17.5%\">
                  <col width=\"17.5%\">

                 </colgroup>


                 <thead>

                 <tr>

                  <th colspan=\"5\">$Mdsatz[Mannschaft]

                  <input type=\"submit\" name=$L�schen_G_M value=\"L\">  </th>

                 </tr>



                 <tr>
                  <th>Verein</th>
                  <th>Name</th>
                  <th>Jahrgang</th>
                  <th>Gewicht</th>
                  <th>L�schen</th>
                 </tr>
                 </thead>


         ";





         while($dsatz_Mheber = mysql_fetch_assoc($M_Heber))                   // Tabellen erstellung
         {


$f = $f+1;


     $Id_M="Id_M" . $f;
     $L�schen_M="L�schen_M" . $f;





         echo "<input type=\"text\" name=$Id_M size=\"0\" style=\" visibility:hidden; \" value=\"$dsatz_Mheber[IdHeber]\"readonly>";






           echo "<tr align=\"center\">";

               echo "<td>";

                         echo "$dsatz_Mheber[Verein]";

               echo "</td>";



               echo "<td>";

                 echo "<table width=\"100%\" border=\"0\">";



                   echo"  <colgroup>
                           <col width=\"50%\">
                           <col width=\"50%\">

                          </colgroup>
                   ";
                      echo "<tr>";

                         echo "<td>";

                                 echo "$dsatz_Mheber[Name]";

                         echo "</td>";


                         echo "<td>";

                                 echo "$dsatz_Mheber[Vorname]";

                         echo "</td>";

                      echo "<tr>";

                 echo "</table>";

               echo "</td>";



               echo "<td>";


                         echo "$dsatz_Mheber[Jahrgang]";


               echo "</td>";



               echo "<td>";


                         echo "$dsatz_Mheber[Gewicht]";


               echo "</td>";




               echo "<td>";

                         echo "<input type=\"submit\" name=$L�schen_M value=\"L\">";


               echo "</td>";







            echo "</tr>";



         if(isset($_POST['L�schen_M' . $f]))                                                                                          //L�schen
         {

          $x=1;


                         mysql_query("UPDATE heber_$data_a_db[S_Db]
                                      SET Mannschaft =''
                                      WHERE IdHeber ='" . $_POST['Id_M' . $f] . "'")


                         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         }








         }
     echo "<br>";
     echo "<br>";




         if(isset($_POST['L�schen_G_M' . $d]))                                                                                          //L�schen
         {

          $x=1;


                 mysql_query("DELETE FROM mannschaften_$data_a_db[S_Db]
                              WHERE Mannschaft ='$Mdsatz[Mannschaft]'")

                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         }











 }


 echo"</td>";

echo"</tr>";
echo "</table>";


         if(isset($_POST['s_mannschaft']))
         {

                         mysql_query("INSERT INTO mannschaften_$data_a_db[S_Db] (Mannschaft)
                                      Values ('" . $_POST['t_mannschaft'] . "')")

                         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());
         }






if($x==1)
{
header('Location: http://localhost/ksv/mannschaften.php');
}














?>










</body>
</html>