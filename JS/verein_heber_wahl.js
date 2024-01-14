function kick(value)
{
	var error=0;
	var check = confirm('Wollen Sie diesen Heber wirklich Loeschen?');

	if (check == true) {
		error=0;
		document.getElementById("modal").style.display='block';
	} else {
		error=1;
		exit;
		
	}

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
            document.getElementById("ajax-loeschen").innerHTML=xmlhttp.responseText;
            location.reload();

        }
    }
    xmlhttp.open("Post","Ajax-PHP/kick_heber.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send('value=' + value);
}

