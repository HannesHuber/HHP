<html lang="de">
<head>
<title></title>
<meta name="author" content="hannes">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000">
<link rel="stylesheet" type="text/css" href="CSS/alg.css">
<script language="javascript" type="text/javascript" src="JavaScript/kasse.js"></script>
<script type='text/javascript' src="jquery-2.2.1.min.js"></script>

<?php
function ProduktDiv ($Preis,$Name)
{
$Preis=number_format($Preis, 2);
     echo"<div onClick=\"plus($Preis, '$Name')\" class=\"Produkt\">";
          echo"<div id='PName'>
                 <div>$Name</div>
          </div>";
          echo"<div id='PPreis'>" . $Preis . "&euro;</div>
     </div>";

}

function PlusMoney ($Preis,$Name)
{
$Preis=number_format($Preis, 2);
     echo"<div onClick=\"plus($Preis, '$Name')\" id=\"always-safe\">$Name</div>";
}


echo '<div id="container">';
   echo '<div id="produkte1">';

      ProduktDiv(3.5,'Currywurst');
      ProduktDiv(2.8, 'Grillwurst');
      ProduktDiv(3.7, 'Kalbsbratwurst');
      ProduktDiv(6.8, 'Frikadellen m.P.');
      ProduktDiv(6.2, 'Tomaten-M.-Salat');

      echo '<div id="Abstand">&nbsp;</div>';

      ProduktDiv(2, 'Softdrinks');
      ProduktDiv(1.8, 'Mineralwasser');
      ProduktDiv(3, 'Bier Dose 0,5');
      ProduktDiv(1.8, 'Kaffe');
      ProduktDiv(4.5, 'Wein 0,25L');
      ProduktDiv(18, 'Wein 1L');
      ProduktDiv(3, 'Sekt 0,2L');

      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';

   echo '</div>';
   echo '<div id="produkte2">';

      ProduktDiv(2.4,'Pommes');
      ProduktDiv(3.0, 'Wienerle');
      ProduktDiv(3.5, 'Hot Dog');
      ProduktDiv(6.5, 'Gem&uuml;se Pasta');
      ProduktDiv(7.2, 'Grill&Chill Burger m.P.');

      echo '<div id="Abstand">&nbsp;</div>';

      ProduktDiv(2.5, 'Volvic Juice');
      ProduktDiv(2.5, 'Eistee');
      ProduktDiv(3, 'Bier Flasche 0,5');
      ProduktDiv(1.8, 'Cappucchino');
      ProduktDiv(6, 'Wein 0,375L');
      ProduktDiv(6, 'Ros&eacute; 0,75L');
      ProduktDiv(10, 'Sekt 0,75L');

      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';

   echo '</div>';
   echo '<div id="produkte3">';

      ProduktDiv(7, 'Gem.Burger m.P.');
      ProduktDiv(7.9, 'SchweineS. m.P&Paprika');
      ProduktDiv(7.5, 'Schnitzel m.P.');
      ProduktDiv(14.5, 'Rindertsteak m.S.');
      ProduktDiv(0.2, 'Ketchup/Mayo');

      echo '<div id="Abstand">&nbsp;</div>';

      ProduktDiv(2.5, 'Libella Isotonisch');
      ProduktDiv(3, 'Energy Drink');
      ProduktDiv(3, 'Bier Z&auml;ppfle 0,33');
      ProduktDiv(1.5, 'Tee/Espresso');
      ProduktDiv(14, 'Wein 0,75L');

      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';
      echo '<div id="Abstand">&nbsp;</div>';

   echo '</div>';

?>


   <div id="merkzettelContainer">
         <div id="merkzettelHead" class="zaehlBox">
              <div id="box1" class="innerZaehlBox">Merkzettel</div>
         </div>
         <div class="zaehlBox" id="topAbstand">
              <div class='MerkL'>Zusammen:</div>
              <div class='MerkR' id="count">0.00 &euro;</div>
         </div>
   </div>



<?php

$besNr=$_SESSION['bestellNr'];

echo '<div id="UntererBlock">';
echo '<div>';
     echo '<div id="Block1">';
         echo '<div onClick="safe()" id="always-safe">Bestellung fertig</div> ';
     echo '</div>';
     echo '<div id="Block2">';
         PlusMoney(0.5, '+0,50 &euro;');
     echo '</div>';
     echo '<div id="Block3">';
         PlusMoney(1, '+1 &euro;');
     echo '</div>';
     echo '<div id="Block4">';
         PlusMoney(2, '+2 &euro;');
     echo '</div>';
     echo '<div id="Block5">';
         PlusMoney(5, '+5 &euro;');
     echo '</div>';
echo '</div>';
         echo '<div id="Block1">';
                 echo '<div id="letzteBestNr">Die letzte Betstellnummer auf diesem Ger&auml;t war: ' . $besNr . '</div>';
         echo '<div>';
echo '</div>';
?>

</div> <!-- Ende Über Container  -->

<span id="ajaxtest"></span>




</body>
</html>