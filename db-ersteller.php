
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">




</head>



<body>



<form method="post" action="db-ersteller.php">                           //Wichtig muss vorhanden sein damit die post[] funktion klappt!!!!!!

<p class="kopf" align="center"><font size="10"><b>Datenbanken</font></b></p>




<?php





ob_start ();
error_reporting(0);


$conn = mysql_connect("database_hhp","root","") or die(mysql_error());
mysql_select_db("test");


$result = mysql_query("SHOW DATABASES");






    // $xxx = "CREATE DATABASE my_db";    Datenbank erschaffen
    // $aaa = "DROP DATABASE my_db";      Datenbank l�schen
    // $bbb = "DROP TABLE Irgentwas";     Tabelle aus DB l�schen (erst Verbindung zu einer DB herstellen)

    // mysql_query($aaa);                 mysql_query wird zum ausf�hren ben�tigt





$x=0;


if(isset($_POST['speichern']))                                                         //Speicher Funktion
{
  $x=1;
}



echo "
<div id=\"divid1\" class=\"examplediv\">
<table width=\"30%\"  border=\"1\" cellpadding=\"0\" cellspacing=\"2\" align=\"center\">
<thead>

 <tr>
  <th>Datenbanken</th>
  <th>Laden</th>
 </tr>


</thead>

";



$i = 0;




while ($dsatz = mysql_fetch_assoc($result)) {





$i = $i+1;


     $DB="DB" . $i;
     $L�schen="L�schen" . $i;
     $Laden="Laden" . $i;


echo "<tbody>";


echo "<tr>";






     echo "<td>";


          echo "<input type=\"text\" name=$DB size=\"30\" value=\"$dsatz[Database]\">";


          echo "<input type=\"submit\" name=$L�schen value=\"L�schen\">";


     echo "</td>";





     echo "<td align=\"center\">";


          echo "<input type=\"submit\" name=$Laden value=\"  Laden  \">";





     echo "</td>";



echo "</tr>";






         if(isset($_POST['L�schen' . $i]))                                                                                          //L�schen
         {

                 $x=1;

                 $Ddb= "u" . $_POST['DB' . $i] . "";


                 $Delete = "DROP DATABASE $Ddb";


                 mysql_query($Delete)
                 OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



         }





}


echo "</tbody>";
echo "</table>";


echo"<br>";



echo "
<div id=\"divid1\" class=\"examplediv\">
<table width=\"30%\"  border=\"0\" cellpadding=\"0\" cellspacing=\"2\" align=\"center\">

";



  echo "<tr>";


     echo "<td>";


         $SpF = "Speicherfeld";
         echo "<input type=\"text\" name=$SpF size=\"30\" value=\"\">";                           //Speicher Eingabefeld


         echo "<input type=\"submit\" name=\"new_wettkampf\" value=\"Neuer Wettkampf\">";         //Speicherbutton



     echo "</td>";


  echo "</tr>";


echo "</tbody>";
echo "</table>";







    // $xxx = "CREATE DATABASE my_db";    Datenbank erschaffen
    // $aaa = "DROP DATABASE my_db";      Datenbank l�schen
    // $bbb = "DROP TABLE Irgentwas";     Tabelle aus DB l�schen (erst Verbindung zu einer DB herstellen)

    // mysql_query($aaa);                 mysql_query wird zum ausf�hren ben�tigt








if(isset($_POST['new_wettkampf']))                                                       //Neue DB anlegen
{


         $x=1;


         $Inhalt= "" . $_POST['Speicherfeld'] . "";


         $Creat = "CREATE DATABASE $Inhalt";


         mysql_query($Creat)
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


}






if($x==1)
{
header('Location: http://localhost/ksv/db-ersteller.php');
}



?>











</body>
</html>