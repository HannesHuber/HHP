<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="../CSS/hauptmenue.css">

</head>
<body>

<a href="../planung.php" title="Link zur Planung" id="range-logo">Planung</a>

<table border ="0" width="100%" >
  <colgroup>
    <col width="200">
    <col>
  </colgroup>
<thead>
<tr>
    <td colspan="2" align="center" >

<div id="box1"> <img src="../Bilder/bwg.jpg" alt="BW Gewichtheben" width="250px" > </div>
<div id="box2"> <img src="../Bilder/BVDG-Neu.jpg" alt="BVDG Gewichtheben" width="250px" > </div>



</tr>

<tr>
    <td colspan="2">

</tr>


<tr>
  <td>

   <font size="+1" >




<p class="kopf"><b>Einstellungen-ZK</b></p>

   <br>

   <table class="tabelle" border="0" cellpadding="9" cellspacing="4">
    <tbody>

         <tr>
           <td onClick="location.href='einstellungen/altersklassen-setup.php';">Altersklassen Anpassen</td>
         </tr>
         <tr>
           <td onClick="location.href='einstellungen/gewichtsklassen-setup.php';">Gewichtsklassen Anpassen</td>
         </tr>

    </tbody>
   </table>

   </font>
  </td>

  <td>



           </td>


         </tr>
        </colgroup>
       </thead>
      </table>




    </td>

  </td>

 </tr>
 </thead>
</table>

</body>
</html>