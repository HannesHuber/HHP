
function al_kl_check(value)
{

   var idH=document.getElementById("Id" + value).value;
   var v=document.getElementById("V" + value).value;
   var Hgw=document.getElementById("Steigern" + value).value;

   for(var i=1;i<=value;i++){

   }

   if(Hgw<lastHgw){

                document.getElementById("Steigern" + value).style.border="2px solid #FF0000";
                document.getElementById("Steigern" + value).style.backgroundColor="#FAFFAD";
                alert("Unter-Steigert! Mindest HantelGw = " + lastHgw + "kg");
                return;
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

            document.getElementById("ajaxtest").innerHTML=xmlhttp.responseText;
            location.reload();
        }
    }
    xmlhttp.open("Post","wk_funktionen/safe_funktion.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send('id=' + idH + '&versuch=' + v + '&Hgw=' + Hgw + '&i=' + value);

}

function test(value, art){

        var LB=value-1;

        if(art==1){
                var Klasse=document.getElementById("Class" + value).value;
                alert("Error:" + art + " In der Klasse: " + Klasse + " war Von>Bis");
                return;
        }else{
                var Klasse=document.getElementById("Class" + value).value;
                var LetzteKlasse=document.getElementById("Class" + LB).value;
                alert("Error:" + art + " Die Klasse: " + LetzteKlasse + " und die Klasse: " + Klasse + " haben sich ueberschnitten!");
                return;
        }
}

function AlKlneuError(){

        alert("Es darf nicht mehr als eine neue Klasse gleichzeitig erstellt werden!");
}




