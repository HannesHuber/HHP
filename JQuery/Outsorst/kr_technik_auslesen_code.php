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

$dHeber = mysqli_fetch_assoc($dbHeber);

if($KrAnzahl==1){
    if($Wk_Art!='M_m_T'){
        $auslesen='Gueltig_' . $Art;
    }else{
        $auslesen='G_' . $Art . '_' . $Feld_numb;
        if($dHeber[$auslesen]=='') $auslesen='Gueltig_' . $Art;
    }
    
    if($dHeber[$auslesen]=='Ja' || 'Nein'){
        
        $Tauslesen='TeWert_' . $Art . '_$Feld_numb';
               
        if($dHeber[$auslesen]=='Ja')echo '<p>' . $dHeber[$Tauslesen] . ' Pkt</p>';
        elseif($dHeber[$auslesen]=='Nein')echo '<p>0 Pkt</p>';
        else echo '<p>&nbsp;</p>';
    }else echo '<p>&nbsp;</p>';
    
}else{
    $auslesen='G_' . $Art . '_' . $Feld_numb;
    
    $Erg1='G_' . $Art . '_1';
    $Erg2='G_' . $Art . '_2';
    $Erg3='G_' . $Art . '_3';
    
    if( ($dHeber[$Erg1]=='Ja' || $dHeber[$Erg1]=='Nein') && ($dHeber[$Erg2]=='Ja' || $dHeber[$Erg2]=='Nein') && ($dHeber[$Erg1]=='Ja' || $dHeber[$Erg1]=='Nein')){
        $Tauslesen='TeWert_' . $Art . '_'.$Feld_numb;
        
        if($dHeber[$auslesen]=='Ja')echo '<p>' . $dHeber[$Tauslesen] . ' Pkt</p>';
        elseif($dHeber[$auslesen]=='Nein')echo '<p>0 Pkt</p>';
        else echo '<p>&nbsp;</p>';
    }else echo '<p>&nbsp;</p>';
}



?>