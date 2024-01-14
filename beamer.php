<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="CSS/beamer.css">

<script type="text/javascript">

window.setInterval("Farbe()", 3000);

function Farbe () {

javascript:location.reload()

}


</script>


<script type="text/javascript"> 
   start = new Date();
   startzeit = start.getTime();

   function stoppuhr()
  {
     aktuell = new Date();
     zeit = (aktuell.getTime() - startzeit) / 1000;
     document.getElementById('xxx').innerHTML = Math.round(zeit);        //   <span id="xxx"></span>  um die zeit auszugeben!
     setTimeout('stoppuhr()',1000);


   }


</script>


</head>



<body onLoad="setTimeout('stoppuhr()',0)">


<form name="beamer" method="post" action="beamer.php">




<?php



ob_start ();
error_reporting(0);


$conn = mysql_connect("database_hhp","root","") or die(mysql_error());
mysql_select_db("test");

$data_a_db[S_Db]=$_SESSION['WeK'];

$Gruppen = mysql_query("SELECT * FROM gruppen_zeit_$data_a_db[S_Db]")
           OR die ("<pre>\n".$sql."</pre>\n".mysql_error());


$Grp = $_SESSION['Wk_Grp'];
$Art = $_SESSION['Wk_SoR'];

if($Art=="Rei�en"){
$Kurz="R";

}else{
$Kurz="S";
}


         $heber = mysql_query("SELECT * FROM heber_$data_a_db[S_Db], heber, heber_wk_$data_a_db[S_Db]
                               WHERE heber_$data_a_db[S_Db].IdHeber = heber.IdHeber
                               AND heber_wk_$data_a_db[S_Db].IdHeber = heber.IdHeber
                               AND heber_wk_$data_a_db[S_Db].IdHeber = heber_$data_a_db[S_Db].IdHeber
                               AND heber_$data_a_db[S_Db].Gruppe = '$Grp'
                               AND (heber_wk_$data_a_db[S_Db].Gueltig_$Art = '' OR heber_wk_$data_a_db[S_Db].Gueltig_$Art IS NULL)
                               ORDER BY heber_wk_$data_a_db[S_Db].$Art ASC,
                               heber_wk_$data_a_db[S_Db].Versuch ASC,
                               heber_wk_$data_a_db[S_Db].Div_Wert_$Kurz DESC,
                               heber_$data_a_db[S_Db].LosNr ASC")
         OR die ("<pre>\n".$sql."</pre>\n".mysql_error());



$time=getdate();

echo"<div class=\"div-heber\">";

echo "<table class=beamer border=\"0\" width=\"100%\" height=\"90%\" cellpadding=\"4\" cellspacing=\"5\">";

echo "  <colgroup>
           <col width=\"40%\">
        </colgroup>";



$i = 0;


while($dsatz = mysql_fetch_assoc($heber))
{

$i = $i+1;



if($i == "1")
{
    $time = $dsatz[time];


    if($time == "")
    {

         echo "
         <script type=\"text/javascript\">



         function stoppuhr()
         {

                 document.getElementById('spanId').innerHTML = 60;


                 setTimeout('stoppuhr()',1000);


         }

         </script>
         ";


   }else{


echo "
  <script type=\"text/javascript\">


  var daten = \"".$time."\";



   function stoppuhr()
  {

         aktuell = new Date();
         time = daten - aktuell.getTime()/1000;
         time = time + 60;

         if(time>= 0){

                 document.getElementById('spanId').innerHTML =Math.round(time) ;
         }else{
                 document.getElementById('spanId').innerHTML = 0;
         }


         setTimeout('stoppuhr()',1000);


   }

  </script>
";


}

echo "<tr>";
         echo "<td height=20%>";

                 echo "Name:";

         echo "</td>";


         echo "<td>";

                 echo "$dsatz[Name], $dsatz[Vorname]";

         echo "</td>";
  echo "</tr>";



echo "<tr>";
         echo "<td height=20%>";

                 echo "Verein:";

         echo "</td>";


         echo "<td>";

                 echo "$dsatz[Verein]";

         echo "</td>";
echo "</tr>";



echo "<tr>";
         echo "<td height=20%>";

                 echo "K�rper-Gew.:";

         echo "</td>";


         echo "<td>";

                 echo "$dsatz[Gewicht] Kg";

         echo "</td>";
echo "</tr>";



echo "<tr>";
         echo "<td height=20%>";

                 echo "Hantel-Gew.:";

         echo "</td>";


         echo "<td>";

                 echo "$dsatz[$Art] Kg";

         echo "</td>";
echo "</tr>";



echo "<tr>";
         echo "<td height=20%>";

                 echo "Versuch:";

         echo "</td>";


         echo "<td>";

                 echo "$dsatz[Versuch]";

         echo "</td>";
echo "</tr>";



}



}                                                                        //While-Schleife zu ende











   echo"</div>";



if($x==1)
{
header('Location: http://localhost/ksv/anzeige_wettkampf.php');
}



?>











</body>
</html>