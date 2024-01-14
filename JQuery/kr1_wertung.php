<?php
session_start();
// echo "JQUERy/kr1_wertung.php";
header('Content-Type: text/html; charset=utf-8');
$bridge=$_SESSION['KR1_Bridge'];
$wk_name=$_SESSION['WeK'];
$Art=$_SESSION['KrArt'];
$Kr_Numb=$_SESSION['KrAnzahl'];



include '../funktionen/db_verbindung.php';
include '../funktionen/kampfrichter_pads.php';
include '../funktionen/nuetzliches.php';

$db=dbVerbindung();

$NowT = dbBefehl("SELECT * FROM tmp_gerd_$bridge");
$dNow = mysqli_fetch_assoc($NowT);

$dbstamm = dbBefehl("SELECT * FROM stammdaten_wk_$wk_name");
$dataStamm = mysqli_fetch_assoc($dbstamm);

$tmp_kr_check = dbBefehl("SELECT * FROM tmp_kr_check_$bridge");
$kr_check = mysqli_fetch_assoc($tmp_kr_check);


if($_SESSION['KrAnzahl']==1){

	
             if($_SESSION['reloadK1']==0){
                 $Wk_Art=$dataStamm['Wk_Art'];
                 $IdHeber=$_SESSION['KrId'];
                 $Versuch=$_SESSION['KrV'];
                 $Guel=$_SESSION['GueltigK1'];
                 $TWert=$_SESSION['T-WertK1'];

                 SendHeberToSafeTabelle($Wk_Art, $bridge, $IdHeber, $Versuch, $Art, $Guel, $TWert);   //Funktion in /htdocs/funktionen/kampfrichter_pads; Speichert Heber in tmp_Speichern_$bridge
                                
                 $_SESSION['reloadK1']=1;
         }
                        

         if((($_SESSION['KrId']!=$dNow['IdHeber'])||($_SESSION['KrV']!=$dNow['V'])||($_SESSION['KrArt']!=$dNow['Art'])||
             ($_SESSION['KrHGw']!=$dNow['HGw']))&&($_SESSION['reloadK1']==1)){

                 $_SESSION['KrId']=$dNow['IdHeber'];
                 $_SESSION['KrV']=$dNow['V'];
                 $_SESSION['KrArt']=$dNow['Art'];
                 $_SESSION['KrHGw']=$dNow['HGw'];

                 $_SESSION['reloadK1']=0;

                 dbBefehl("UPDATE tmp_kr_check_$bridge
                              SET ReAnzeige='1'");

  echo"
 <script>
 setTimeout(function(){
     location = 'kampfrichter1.php'
   },0)
 </script>
";

         }

     if($kr_check['Re1']==1)
              KampfrichterPadResetAusfuehrung($bridge,1, $wk_name, $Art, $dNow);

}else{                        //Also f�r mehr als einen KR!------------------------------------------------


         if(($kr_check['K1']==1)&&($kr_check['K2']==1)&&($kr_check['K3']==1)){

            $Wk_Art=$dataStamm['Wk_Art'];
            $IdHeber=$_SESSION['KrId'];
            $Versuch=$_SESSION['KrV'];
            $Art=$_SESSION['KrArt'];
            $TWert=0;

             if($dataStamm['Wk_Art']!='M_m_T'){

                 $dbGueltig = dbBefehl("SELECT * FROM heber_wk_$wk_name WHERE IdHeber='$IdHeber' AND Versuch='$Versuch'");
                 $d_Guel = mysqli_fetch_assoc($dbGueltig);

                 $Count_Gueltig=0;
                 if($d_Guel['G_' . $Art . '_1']=='Ja')$Count_Gueltig++;
                 if($d_Guel['G_' . $Art . '_2']=='Ja')$Count_Gueltig++;
                 if($d_Guel['G_' . $Art . '_3']=='Ja')$Count_Gueltig++;

                 if($Count_Gueltig>=2)$Guel='Ja';
                 else $Guel='Nein';


                 SendHeberToSafeTabelle($Wk_Art, $bridge, $IdHeber, $Versuch, $Art, $Guel, $TWert); //Funktion in /htdocs/funktionen/kampfrichter_pads; Speichert Heber in tmp_Speichern_$bridge

             }else{                       //Also f�r mit Technik

                 $dbGueltig = dbBefehl("SELECT * FROM heber_wk_$wk_name WHERE IdHeber='$IdHeber' AND Versuch='$Versuch'");

                 $d_Guel = mysqli_fetch_assoc($dbGueltig);

                 $Count_Gueltig=0;
                 $Count_Twert=0.00;

                 if($d_Guel['G_' . $Art . '_1']=='Ja'){$Count_Gueltig++;  $Count_Twert+=$d_Guel['TeWert_' . $Art . '_1'];}
                 if($d_Guel['G_' . $Art . '_2']=='Ja'){$Count_Gueltig++;  $Count_Twert+=$d_Guel['TeWert_' . $Art . '_2'];}
                 if($d_Guel['G_' . $Art . '_3']=='Ja'){$Count_Gueltig++;  $Count_Twert+=$d_Guel['TeWert_' . $Art . '_3'];}

                 if($Count_Gueltig>=2)   {$Guel='Ja'; $Twert=$Count_Twert/$Count_Gueltig;}
                 else                    {$Guel='Nein'; $Twert=0;}

                 SendHeberToSafeTabelle($Wk_Art, $bridge, $IdHeber, $Versuch, $Art, $Guel, $TWert); //Funktion in /htdocs/funktionen/kampfrichter_pads; Speichert Heber in tmp_Speichern_$bridge


             }

           dbBefehl("UPDATE tmp_kr_check_$bridge
                        SET K1= '0', K2= '0', K3= '0'");

           $_SESSION['Anweisung1Checker']=0;
           
           /*
           echo"
 			<script>
 				setTimeout(function(){
     				location = 'kampfrichter1.php'
   				},0)
 			</script>
			";
          */ 
         }

         if((($_SESSION['KrId']!=$dNow['IdHeber'])||($_SESSION['KrV']!=$dNow['V'])||($_SESSION['KrArt']!=$dNow['Art'])||
         		($_SESSION['KrHGw']!=$dNow['HGw']))&&(($kr_check['K1']==0)&&($kr_check['K2']==0)&&($kr_check['K3']==0))){
         			
         			$_SESSION['KrId']=$dNow['IdHeber'];
         			$_SESSION['KrV']=$dNow['V'];
         			$_SESSION['KrArt']=$dNow['Art'];
         			$_SESSION['KrHGw']=$dNow['HGw'];
         			$_SESSION['B1']=0;
         			
         			echo"
 					<script>
 						setTimeout(function(){
     						location = 'kampfrichter1.php'
   						},0)
 					</script>
					";
         }
     if($kr_check['Re1']==1)
              KampfrichterPadResetAusfuehrung($bridge,1, $wk_name, $Art, $dNow);


}
?>