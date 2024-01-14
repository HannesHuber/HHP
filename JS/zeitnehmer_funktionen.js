function Play()
{
	
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

            document.getElementById("zeitRefresh").innerHTML=xmlhttp.responseText;
            //location.reload();
        }
    }
    xmlhttp.open("Post","Zeitnehmer_funktionen/play_funktion.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        
    xmlhttp.send();
        

}

function Paus()
{

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
            document.getElementById("zeitRefresh").innerHTML=xmlhttp.responseText;
            //location.reload();
        }
    }
    xmlhttp.open("Post","Zeitnehmer_funktionen/paus_funktion.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        
    xmlhttp.send();
        
}

function Add(value)
{

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
            document.getElementById("zeitRefresh").innerHTML=xmlhttp.responseText;
            //location.reload();
        }
    }
    xmlhttp.open("Post","Zeitnehmer_funktionen/add_funktion.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        
    xmlhttp.send('value=' + value);
        
}

function Reset()
{
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
            document.getElementById("zeitRefresh").innerHTML=xmlhttp.responseText;
            //location.reload();
        }
    }
    xmlhttp.open("Post","Zeitnehmer_funktionen/reset_funktion.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      
    xmlhttp.send();
        
}
