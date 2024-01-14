function OnlineDB_Import(IdWettkampf,WkName,Pw,index, WkArt)
{
	var creat=WkName;	//WkName

	if(WkArt==1){
		var WkArt = document.getElementById("AuswahlWK"+index).value;
	}


	if(Pw!=''){
		Eingabe = window.prompt("Dieser Wettkampf ist Passwort geschuetzt. Bitte geben Sie das Passwort an.","Passwort");

		if(Eingabe==Pw){
			alert("Das Passwort ist korrekt, der Download kann starten");
		}else{
			exit;
		}
	}

	document.getElementById("modal").style.display='block';


if (window.XMLHttpRequest)
    {
        // AJAX nutzen mit IE7+, Chrome, Firefox, Safari, Opera
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // AJAX mit IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {


        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("ajaxtest").innerHTML=xmlhttp.responseText;
            location.reload();

        }
    }
    xmlhttp.open("Post","Ajax-PHP/wk_import.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send('creat=' + creat + '&IdWk=' + IdWettkampf + '&WkArt=' + WkArt);	//     Erst wenn DB nummer übergeben wird
}
