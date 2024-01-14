<?php
include('/connectme.php');
$conn= mysqli_connect("database_hhp", "root", "", "hhp");
$thequery = "SELECT * FROM members";
$result = mysqli_query($conn,$thequery);

$file = fopen("php://output","w");

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="exported.' . date("Y.m.d") . '.csv"');
header('Pragma: no-cache');
header('Expires: 0');

$emptyarr = array();
$fieldinf = mysqli_fetch_fields($result);
foreach ($fieldinf as $valu)
{
	array_push($emptyarr, $valu->name);
}
fputcsv($file,$emptyarr);

while($row = mysqli_fetch_assoc($result))
{
	fputcsv($file,$row);
}
fclose($file);

mysqli_free_result($result);
mysqli_close($conn);
?> 