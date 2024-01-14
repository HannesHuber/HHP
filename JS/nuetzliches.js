function weiterleitungRoS(feldAuswahl,page,art,stringGrp,WkId,stringGruppenB1,stringGruppenB2,WkStandB1,WkStandB2)
{
	var errorLoadinigScreen=1;
	var error=0;
	var auswahl=document.getElementById(feldAuswahl).value;
	

	if(WkStandB1==1){
		
		var GrpB1 = stringGruppenB1.split(",");	
		
		GrpB1.forEach(function(entry) {
			if(auswahl==entry)
			{
				if (confirm("Es scheint ein Wettkampf auf Bridge 1 statt zu finden. Sind Sie sicher, dass Sie einen neuen Wk beginnen moechten und damit den anderen Wettkampf unterbrechen wollen?") == true) {
					error=0;
				} else {
					error=1;
					exit;
				}
				
			}
		});	
		
		if(error==1) exit;
	}

	if(WkStandB2==1){
		
		var GrpB2 = stringGruppenB2.split(",");	
		
		GrpB2.forEach(function(entry) {
			if(auswahl==entry)
			{
				if (confirm("Es scheint ein Wettkampf auf Bridge 2 statt zu finden. Sind Sie sicher, dass Sie einen neuen Wk beginnen moechten und damit den anderen Wettkampf unterbrechen wollen?") == true) {
					error=0;
				} else {
					error=1;
					exit;
				}
				
			}
		});	
		
		if(error==1) exit;
	}	
	
	var a = stringGrp.split(",");
	
	a.forEach(function(entry) {
		if(auswahl==entry)
		{
			document.getElementById(feldAuswahl).style.border="2px solid #FF0000";
			document.getElementById(feldAuswahl).style.backgroundColor="#FAFFAD";
			//confirm('In der Gruppe ' + auswahl + ' sind noch nicht alle 1.Versuche eingetragen!');
						
		}
	});
	
	if (auswahl==''){
		document.getElementById(feldAuswahl).style.border="2px solid #FF0000";
		document.getElementById(feldAuswahl).style.backgroundColor="#FAFFAD";
		return;
	}else
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
            document.getElementById("weiterleitung").innerHTML=xmlhttp.responseText;
            location.href=page;          
        }
    }
    xmlhttp.open("Post","Ajax-PHP/weiterleitungRoS.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
	xmlhttp.send('auswahl=' + auswahl + '&art=' + art + '&WkId=' + WkId);
	
}

function test(grp, grp2, page) 
{	
	var e = document.getElementById("Aus");
	var value = e.options[e.selectedIndex].value;
	var error=0
	
	if(grp==value || grp2==value)
	{
		if (confirm("Die von ihnen ausgewaehlte Gruppe " + value + " scheint gerade aktiv zu heben. Wenn dies der Fall ist, fahren Sie nicht fort! Dies kann zu Fehlern fuehren!") == true) {
			error=0;
		} else {
			error=1;
			exit;
		}
		
	}
	if(error==1) exit;
	
	
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
            document.getElementById("weiterleitung").innerHTML=xmlhttp.responseText;
            location.href=page;            
        }
    }
    xmlhttp.open("Post","Ajax-PHP/wk_korrektur_weiterleitung.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
	xmlhttp.send('gruppe=' + value); 
	
	document.getElementById("modal").style.display='block';
	
}






