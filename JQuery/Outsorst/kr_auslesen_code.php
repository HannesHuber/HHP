<?php

$IdHeber=$_SESSION['KrIdHAn' . $bridge];
$Versuch=$_SESSION['KrVAn' . $bridge];
$Art=$_SESSION['KrArtAn' . $bridge];
$KrAnzahl=$_SESSION['KrAnzahlAn' . $bridge];
$Wk_name=$_SESSION['WeK'];
$Wk_Art=$_SESSION['WkArt' . $bridge];

         $dbHeber = dbBefehl("SELECT * FROM heber_wk_$Wk_name
                               WHERE heber_wk_$Wk_name.IdHeber = '$IdHeber'
                               AND heber_wk_$Wk_name.Versuch= '$Versuch'
                               ");


if ($dbHeber === false) {
    // Handle query error
    echo "Database query failed.";
    exit;
}

$dHeber = mysqli_fetch_assoc($dbHeber);

if ($dHeber === null) {
    // Handle no result
    echo "<div class='large-text'>No Data</div>";
    exit;
}

if($KrAnzahl==1){
	if($Wk_Art!='M_m_T'){
		$auslesen='Gueltig_' . $Art;
	}else{
		$auslesen='G_' . $Art . '_' . $Feld_numb;
		if($dHeber[$auslesen]=='') $auslesen='Gueltig_' . $Art;
	}
	
	if($dHeber[$auslesen]=='Ja')echo '<p class="gueltig">&nbsp;</p>';
	elseif($dHeber[$auslesen]=='Nein')echo '<p class="ungueltig">&nbsp;</p>';
	else echo '<p>&nbsp;</p>';
	
	
}else{ 
	$auslesen='G_' . $Art . '_' . $Feld_numb;
	
	$Erg1='G_' . $Art . '_1';
	$Erg2='G_' . $Art . '_2';
	$Erg3='G_' . $Art . '_3';
	
	if( ($dHeber[$Erg1]=='Ja' || $dHeber[$Erg1]=='Nein') && ($dHeber[$Erg2]=='Ja' || $dHeber[$Erg2]=='Nein') && ($dHeber[$Erg1]=='Ja' || $dHeber[$Erg1]=='Nein')){
		if($dHeber[$auslesen]=='Ja')echo '<p class="gueltig">&nbsp;</p>';
		elseif($dHeber[$auslesen]=='Nein')echo '<p class="ungueltig">&nbsp;</p>';
		else echo '<p>&nbsp;</p>';
	}
}



?>