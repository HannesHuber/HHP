<?php
session_start();
if (empty($_SESSION['Imported'])) {
    $_SESSION['Imported'] = 0;
}
$_SESSION['Filter_Text'] = '';
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="../CSS/alg.css">
<link rel="stylesheet" type="text/css" href="../CSS/hauptmenue.css">

</head>
<body>

<a href="../start.php" title="Link zu Start" id="range-logo">Start</a>

<table  width="100%" >
  <colgroup>
    <col width="200">
    <col>
  </colgroup>
<thead>
<tr>
    <td colspan="2" align="center" >





</tr>

<tr>
    <td colspan="2">

</tr>


<tr>
  <td>

   <font size="+1" >




<p class="kopf"><b>Import Auswahl</b></p>

   <br>

   <table class="tabelle" border="0" cellpadding="9" cellspacing="4">
    <tbody>

         <tr>
           <td onClick="location.href='import-wk-ms.php';">Einzelmeisterschaften Import</td>
         </tr>
         <tr>
           <td onClick="location.href='import-wk.php';">Bundesliga Import</td>
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