
var g_i=1;
var Acurry=0;
var Anudeln=0;
var Grillwurst=0;
var Kalbsbratwurst=0;
var Frikadellen=0;
var Tomaten=0;
var Pommes=0;
var Wienerle=0;
var Hot=0;
var Grill=0;
var GemBurger=0;
var SchweineS=0;
var Schnitzel=0;
var Rindertsteak=0;

function plus (preis,name) {

g_i++;

	
var einzufuegenesObjekt = document.createElement("div");

einzufuegenesObjekt.id = 'box' + g_i;
einzufuegenesObjekt.onclick=function(){    minus(einzufuegenesObjekt.id);    };
einzufuegenesObjekt.className = 'innerZaehlBox';
einzufuegenesObjekt.preis = preis;
einzufuegenesObjekt.name = name;

var ObLinks=document.createElement("div");
ObLinks.className = 'MerkL';
ObLinks.innerHTML = name;

var ObRechts=document.createElement("div");
ObRechts.className = 'MerkR';
ObRechts.innerHTML = preis.toFixed(2) + ' €';

var vorhandenesObjekt = document.getElementById('merkzettelHead');
vorhandenesObjekt.appendChild(einzufuegenesObjekt);

einzufuegenesObjekt.appendChild(ObLinks);
einzufuegenesObjekt.appendChild(ObRechts);

var count=document.getElementById('count');
var vorher=parseFloat(count.innerHTML);
var neu = vorher + preis;
count.innerHTML=neu.toFixed(2)+ '€';

switch(name) {
    case "Currywurst":
        Acurry++;
        break;
    case "Grillwurst":
        Grillwurst++;
        break;
    case "Gemüse Pasta":
        Anudeln++;
        break;
    case "Rindertsteak m.S.":
        Rindertsteak++;
        break;
    case "Kalbsbratwurst":
        Kalbsbratwurst++;
        break;
    case "Frikadellen m.P.":
        Frikadellen++;
        break;
    case "Tomaten-M.-Salat":
        Tomaten++;
        break;
    case "Pommes":
        Pommes++;
        break;
    case "Wienerle":
        Wienerle++;
        break;
    case "Hot Dog":
        Hot++;
        break;
    case "Grill&Chill Burger m.P.":
        Grill++;
        break;
    case "Gem.Burger m.P.":
        GemBurger++;
        break;
    case "SchweineS. m.P&Paprika":
        SchweineS++;
        break;
    case "Schnitzel m.P.":
        Schnitzel++;
        break;		

}



}

function minus (id) {
	
var Objekt=document.getElementById(id);	
	Objekt.style.display = "none"

var count=document.getElementById('count');
var vorher=parseFloat(count.innerHTML);
var neu = vorher - Objekt.preis;
count.innerHTML=neu.toFixed(2)+ '€';

switch(Objekt.name) {
    case "Currywurst":
        Acurry--;
        break;
    case "Grillwurst":
        Grillwurst--;
        break;
    case "Gemüse Pasta":
        Anudeln--;
        break;
    case "Rindertsteak m.S.":
        Rindertsteak--;
        break;
    case "Kalbsbratwurst":
        Kalbsbratwurst--;
        break;
    case "Frikadellen m.P.":
        Frikadellen--;
        break;
    case "Tomaten-M.-Salat":
        Tomaten--;
        break;
    case "Pommes":
        Pommes--;
        break;
    case "Wienerle":
        Wienerle--;
        break;
    case "Hot Dog":
        Hot--;
        break;
    case "Grill&Chill Burger m.P.":
        Grill--;
        break;
    case "Gem.Burger m.P.":
        GemBurger--;
        break;
    case "SchweineS. m.P&Paprika":
        SchweineS--;
        break;
    case "Schnitzel m.P.":
        Schnitzel--;
        break;	

}

}


function safe()
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

            document.getElementById("ajaxtest").innerHTML=xmlhttp.responseText;
			location.reload();
        }
    }
	
    xmlhttp.open("Post","PHP/safe.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xmlhttp.send('Acurry=' + Acurry 
				 + '&Anudeln=' + Anudeln 
				 + '&Rindertsteak=' + Rindertsteak 
				 + '&Grillwurst=' + Grillwurst
				 + '&Kalbsbratwurst=' + Kalbsbratwurst
				 + '&Frikadellen=' + Frikadellen
				 + '&Tomaten=' + Tomaten
				 + '&Pommes=' + Pommes
				 + '&Wienerle=' + Wienerle
				 + '&Hot=' + Hot
				 + '&Grill=' + Grill
				 + '&GemBurger=' + GemBurger
				 + '&SchweineS=' + SchweineS
				 + '&Schnitzel=' + Schnitzel
				 );						
	
}

function reload(){	
	location.reload();		
}
