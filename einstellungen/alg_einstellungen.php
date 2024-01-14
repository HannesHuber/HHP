<?php
session_start();
if (empty($_SESSION['Imported'])) {
	$_SESSION['Imported'] = 0;
}
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<title>Ultima</title>
<meta name="author" content="H-Pc">
<meta name="editor" content="html-editor phase 5">

<link rel="stylesheet" type="text/css" href="../CSS/hauptmenue.css">
<link rel="stylesheet" type="text/css" href="../CSS/alg.css">

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




<p class="kopf"><b>Algemeine Einstellungen</b></p>

   <br>

   <table class="tabelle" border="0" cellpadding="9" cellspacing="4">
    <tbody>

         <tr>
           <td onClick="location.href='robi-faktoren.php';">Robi-Faktoren Anpassen</td>
         </tr>
         <tr>
           <td onClick="location.href='sinclair-faktoren.php';">Sinclair-Faktoren Anpassen</td>
         </tr>
          <tr>
            <td onClick="location.href='skalierungsfaktoren.php';">Skalierungsfaktoren Anpassen</td>
          </tr>

         <!--
	         <tr>
	           <td onClick="location.href='db_backup_export.php';">Datenbank Backup erstellen</td>
	         </tr>
	         <tr>
	           <td onClick="location.href='db_backup_import.php';">Datenbank Backup importieren</td>
	         </tr>
         -->
         <tr>
           <td onClick="location.href='db_reset.php';">Datenbank Reset</td>
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
