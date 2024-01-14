function gueltig(value,gueltig)
{


   var idH=document.getElementById("Id" + value).value;
   var v=document.getElementById("V" + value).value;
   var Hgw=document.getElementById("Steigern" + value).value;


   if(WkArt=="M_m_T"){

           var technik=document.getElementById("technik" + value).value;

           if((gueltig=="Ja")&&((technik<=0)||(technik>10))){
                   if(technik<=0){
                                document.getElementById("technik" + value).style.border="2px solid #FF0000";
                                document.getElementById("technik" + value).style.backgroundColor="#FAFFAD";
                                alert("Technikwert fehlt!");
                                return;
                   }else{
                                document.getElementById("technik" + value).style.border="2px solid #FF0000";
                                document.getElementById("technik" + value).style.backgroundColor="#FAFFAD";
                                alert("Technikwert zu hoch!");
                                return;
                   }
           }else
              document.getElementById("modal").style.display='block';
   }else
      document.getElementById("modal").style.display='block';


   value++;
try {
   var nIdH=document.getElementById("Id" + value).value;
   var nV=document.getElementById("V" + value).value;
   var nHgw=document.getElementById("Steigern" + value).value;
}
catch(err) {
   var nIdH=0;
   var nV=0;
   var nHgw=0;
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
    xmlhttp.open("Post","wk_funktionen/gueltig_funktion.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        if(WkArt=="M_m_T"){
        xmlhttp.send('id=' + idH + '&gueltig=' + gueltig + '&versuch=' + v + '&nIdH=' + nIdH + '&nV=' + nV + '&nHgw=' + '&technik=' + technik
                                 + '&nHgw=' + nHgw + '&WkArt=' + WkArt + '&Hgw=' + Hgw);
        }else{
        xmlhttp.send('id=' + idH + '&gueltig=' + gueltig + '&versuch=' + v + '&nIdH=' + nIdH + '&nV=' + nV + '&nHgw=' + nHgw + '&WkArt=' + WkArt + '&Hgw=' + Hgw);
        }

}

function safe(value,lastHgw,WkArt)
{

   var idH=document.getElementById("Id" + value).value;
   var v=document.getElementById("V" + value).value;
   var Hgw=document.getElementById("Steigern" + value).value;
   var error=0;



   if(WkArt==0){	//WkArt==0 für nicht BL(Wk_Art)
	   				//		 0 für BL ohne Block_Heben
	   				//		 1 für BL mit Block_Heben

	   if(Hgw<lastHgw){

                document.getElementById("Steigern" + value).style.border="2px solid #FF0000";
                document.getElementById("Steigern" + value).style.backgroundColor="#FAFFAD";

                var check = confirm("Unter-Steigert! Mindest HantelGw = " + lastHgw + "kg");

                if(check ==false){
                	return;
                }
                /*
                if(confirm("Unter-Steigert! Mindest HantelGw = " + lastHgw + "kg") == true){
                	error=0;
                	alert("Hallo");
                }else{
                	return;
                }
                */

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
   xmlhttp.open("Post","wk_funktionen/safe_funktion.php",true);
   xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

       xmlhttp.send('id=' + idH + '&versuch=' + v + '&Hgw=' + Hgw + '&i=' + value);

}

function nheber(value,Grp)
{

   document.getElementById("modal").style.display='block';

   var idH=document.getElementById("Id" + value).value;
   var v=document.getElementById("V" + value).value;
   var Hgw=document.getElementById("Steigern" + value).value;



   value++;

try {
   var nIdH=document.getElementById("Id" + value).value;
   var nV=document.getElementById("V" + value).value;
   var nHgw=document.getElementById("Steigern" + value).value;
}
catch(err) {
   var nIdH=0;
   var nV=0;
   var nHgw=0;
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


    xmlhttp.open("Post","wk_funktionen/nheber_funktion.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send('id=' + idH + '&versuch=' + v + '&nIdH=' + nIdH + '&nV=' + nV + '&nHgw=' + nHgw + '&WkArt=' + WkArt + '&Hgw=' + Hgw + '&Grp=' + Grp);



}

function verzicht(value,alleVersuche)
{

	   document.getElementById("modal").style.display='block';

	   var idH=document.getElementById("Id" + value).value;
	   var v=document.getElementById("V" + value).value;
	   var Hgw=document.getElementById("Steigern" + value).value;

	do{

	   value++;
	try {
	   var nIdH=document.getElementById("Id" + value).value;
	   var nV=document.getElementById("V" + value).value;
	   var nHgw=document.getElementById("Steigern" + value).value;
	}
	catch(err) {
	   var nIdH=0;
	   var nV=0;
	   var nHgw=0;
	}
	}while(idH==nIdH)

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

	            document.getElementById("verzicht").innerHTML=xmlhttp.responseText;
	            location.reload();
	        }
	    }
	    xmlhttp.open("Post","wk_funktionen/verzicht_funktion.php",true);
	    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	    xmlhttp.send('id=' + idH + '&gueltig=' + gueltig + '&versuch=' + v + '&nIdH=' + nIdH + '&nV=' + nV + '&nHgw=' + nHgw + '&WkArt=' + WkArt + '&Hgw=' + Hgw + '&alleVersuche=' + alleVersuche);


}

function Steigerung_safe(value,Art,v)
{

	var ArtPlusV="Input"+Art+"_"+v+"Id"+value;
	//alert(ArtPlusV);

   var idH=document.getElementById("Id" + value).value;
   var Hgw=document.getElementById(ArtPlusV).value;



   var error=0;


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

            document.getElementById("save").innerHTML=xmlhttp.responseText;
            location.reload();
       }
   }


   xmlhttp.open("Post","wk_funktionen/steigerung_funktion.php",true);
   xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

       xmlhttp.send('id=' + idH + '&versuch=' + v + '&Hgw=' + Hgw + '&i=' + value + '&Art=' + Art);

}
