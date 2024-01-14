function OnlineUpload()
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
            document.getElementById("ajaxtest").innerHTML=xmlhttp.responseText;
            location.reload();

        }
    }
    xmlhttp.open("Post","Ajax-PHP/online_upload.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send();	//Erst wenn DB nummer übergeben wird
}
