function zk_ersteller()
{
        document.getElementById("modal").style.display='block';

        var creat=document.getElementById("Speicherfeld").value;


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
    xmlhttp.open("Post","Ajax-PHP/zk_start.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xmlhttp.send('creat=' + creat);
}

function mk_o_t_ersteller()
{
        document.getElementById("modal").style.display='block';

        var creat=document.getElementById("Speicherfeld").value;


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
            document.getElementById("mkot_ersteller").innerHTML=xmlhttp.responseText;
            location.reload();

        }
    }
    xmlhttp.open("Post","Ajax-PHP/mkot_start.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xmlhttp.send('creat=' + creat);
}

function mk_m_t_ersteller()
{
        document.getElementById("modal").style.display='block';

        var creat=document.getElementById("Speicherfeld").value;


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
            document.getElementById("mkmt_ersteller").innerHTML=xmlhttp.responseText;
            location.reload();

        }
    }
    xmlhttp.open("Post","Ajax-PHP/mkmt_start.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xmlhttp.send('creat=' + creat);
}

function loeschen(value)
{
	var error=0;
	var check = confirm('Wollen Sie diesen Wettkampf wirklich Loeschen?');

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
    xmlhttp.open("Post","Ajax-PHP/loeschen_start.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send('value=' + value);
}


function dbErsteller()
{
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
            document.getElementById("ajax-loeschen").innerHTML=xmlhttp.responseText;
            location.reload();

        }
    }

    xmlhttp.open("Post","Ajax-PHP/db_ersteller.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send();

}

function bl_ersteller()
{
        document.getElementById("modal").style.display='block';
        var creat=document.getElementById("Speicherfeld").value;

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
    xmlhttp.open("Post","Ajax-PHP/bl_start.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xmlhttp.send('creat=' + creat);
}


function dbUpdate(version)
{
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
            document.getElementById("ajax-loeschen").innerHTML=xmlhttp.responseText;
            location.reload();

        }
    }

    xmlhttp.open("Post","Ajax-PHP/db_update.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send('version=' + version);

}
