<?php


function Fueller_von_gruppen_mk_zaehler()
{
    global $data_a_db;

    $heber = dbBefehl("SELECT * FROM heber, heber_".$data_a_db['S_Db']."
			WHERE heber.IdHeber = heber_".$data_a_db['S_Db'].".IdHeber
			ORDER BY heber.Jahrgang ASC,
			heber.Gewicht ASC
			");

    while($d = mysqli_fetch_assoc($heber))
    {

        $einzelHeber=dbBefehl("SELECT * FROM gruppen_mk_zaehler_".$data_a_db['S_Db']."
				WHERE Jahrgang= '".$d['Jahrgang']."'
				AND Geschlecht= '".$d['Geschlecht']."'");

        $numRows=mysqli_num_rows($einzelHeber);

        if($numRows==0) {

            dbBefehl("INSERT INTO gruppen_mk_zaehler_".$data_a_db['S_Db']." (Jahrgang, Geschlecht, Anzahl)
					Values ('".$d['Jahrgang']."',
					'".$d['Geschlecht']."',
					'1')
					");

        }

    }

}

function return_Anzahl($Jahrgang, $Geschlecht)
{
    global $data_a_db;

    $DBAbfrage=dbBefehl("SELECT Anzahl FROM gruppen_mk_zaehler_".$data_a_db['S_Db']."
			WHERE Jahrgang= '$Jahrgang'
			AND Geschlecht= '$Geschlecht'");

    $d = mysqli_fetch_assoc($DBAbfrage);

    return $d['Anzahl'];

}


function update_Anzahl($Jahrgang, $Geschlecht, $Anzahl)
{
    global $data_a_db;

    $query="UPDATE gruppen_mk_zaehler_".$data_a_db['S_Db']."
	SET Anzahl= '$Anzahl'
	WHERE Jahrgang= '$Jahrgang'
	AND Geschlecht= '$Geschlecht'";

    dbBefehl($query);
}

function Anzahl_plus_minus($Jahrgang, $Geschlecht, $Art)
{
    global $data_a_db;

    $anzahl=return_Anzahl($Jahrgang, $Geschlecht);

    if($Art == 1)	$anzahl++;
    if($Art == 0)	$anzahl--;

    update_Anzahl($Jahrgang, $Geschlecht, $anzahl);

}








?>
