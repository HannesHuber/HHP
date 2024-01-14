function dbImport()
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
            document.getElementById("modal").style.display='none';
            document.getElementById("TextWirdHochgeladen").style.display='none';
            
            location.reload();
        }
    }

    xmlhttp.open("Post","../Ajax-PHP/db_import.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send();

}
