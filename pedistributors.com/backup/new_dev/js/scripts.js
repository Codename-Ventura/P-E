// JavaScript Document
function onloads(){
	slideshow();

}

function CallPrint(strid)
{
var prtContent = document
.getElementById(strid);
var WinPrint =
window.open('','','left=0,top=0,width=1,height=1,t oolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
prtContent.innerHTML=strOldOne;
}

function slideshow(){
	flip();
	setInterval ( "flip()", 15000 );
}

var req;

function flip(imageindex) {
		var imageindex;
		var loc = new String(window.parent.document.location);
		if(imageindex != null){
        var url = "flip.php?index=" + imageindex;
		}
		else{
		var url = "flip.php";
		}
        if(window.XMLHttpRequest) {
                req = new XMLHttpRequest();
        } else if(window.ActiveXObject) {
                req = new ActiveXObject("Microsoft.XMLHTTP");
        }
        req.open("GET", url, true);
        req.onreadystatechange = function(div){
			var div = "testdiv";        
       		obj = document.getElementById(div);
        	setFade(0);
        
			if(req.readyState == 4) {
                	if(req.status == 200) {
                        	response = req.responseText;
                        	obj.innerHTML = response;
                        	fade(0);
                	} else {
                        	alert("There was a problem retrieving the data:\n" + req.statusText);
                	}
        	}		
		
		}
        req.send(null);
		
}


function callback() {
		var div = "main_content_header";        
        obj = document.getElementById(div);
        setFade(0);
        
		if(req.readyState == 4) {
                if(req.status == 200) {
                        response = req.responseText;
                        obj.innerHTML = response;
                        fade(0);
                } else {
                        alert("There was a problem retrieving the data:\n" + req.statusText);
                }
        }
}

function fade(amt) {
	if(amt <= 100) {
		setFade(amt);
		amt += 10;
		setTimeout("fade("+amt+")", 10);
    }
}

function setFade(amt) {
	obj = document.getElementById("main_content_header");
	
	
	amt = (amt == 100)?99.999:amt;
  	if(window.obj){ 
	// IE
	obj.style.filter = "alpha(opacity:"+amt+")";
  
	// Safari<1.2, Konqueror
	obj.style.KHTMLOpacity = amt/100;
  
	// Mozilla and Firefox
	obj.style.MozOpacity = amt/100;
  
	// Safari 1.2, newer Firefox and Mozilla, CSS3
	obj.style.opacity = amt/100;
	}
}



function flip2(imageindex) {
		var location_number;
		var loc = new String(window.parent.document.location);
		if(imageindex != null){
        var url = "shiptolocation.php?st=" + location_number;
		}
		else{
		var url = "shiptolocation.php";
		}
        if(window.XMLHttpRequest) {
                req = new XMLHttpRequest();
        } else if(window.ActiveXObject) {
                req = new ActiveXObject("Microsoft.XMLHTTP");
        }
        req.open("GET", url, true);
        req.onreadystatechange = function(div){
			var div = "shipto_location";        
       		obj = document.getElementById(div);
        	setFade2(0);
        
			if(req.readyState == 4) {
                	if(req.status == 200) {
                        	response = req.responseText;
                        	obj.innerHTML = response;
                        	fade2(0);
                	} else {
                        	alert("There was a problem retrieving the data:\n" + req.statusText);
                	}
        	}		
		
		}
        req.send(null);
		
}


function callback2() {
		var div = "shipto_location";        
        obj = document.getElementById(div);
        setFade2(0);
        
		if(req.readyState == 4) {
                if(req.status == 200) {
                        response = req.responseText;
                        obj.innerHTML = response;
                        fade2(0);
                } else {
                        alert("There was a problem retrieving the data:\n" + req.statusText);
                }
        }
}

function fade2(amt) {
	if(amt <= 100) {
		setFade2(amt);
		amt += 10;
		setTimeout("fade("+amt+")", 10);
    }
}

function setFade2(amt) {
	obj = document.getElementById("shipto_location");
	
	amt = (amt == 100)?99.999:amt;
  
	// IE
	obj.style.filter = "alpha(opacity:"+amt+")";
  
	// Safari<1.2, Konqueror
	obj.style.KHTMLOpacity = amt/100;
  
	// Mozilla and Firefox
	obj.style.MozOpacity = amt/100;
  
	// Safari 1.2, newer Firefox and Mozilla, CSS3
	obj.style.opacity = amt/100;
}



function ShowCred() {
	$('#clarify').fadeOut(400, function(){
		$('#yescust').fadeOut(400, function(){ 
			$('#nocust').fadeIn(2000);	
			});
		});
	
	}

function ShowReg() {
$('#clarify').fadeOut(400, function(){
	$('#nocust').fadeOut(400, function(){ 
		$('#yescust').fadeIn(2000);	
	});
});
	
	}

function ShowHide(obj) {
	if (document.getElementById(obj).className == "show"){
		document.getElementById(obj).className='hide';}
	else{document.getElementById(obj).className='show';}
}

function CheckEmpty(theform){
	var returnval=true //by default, allow form submission
	for (i=0; i<theform.elements.length; i++){
		if (theform.elements[i].className == "req" ){
			if (theform.elements[i].value==""){ //if empty field
				theform.elements[i].style.backgroundColor = '#fcff00';
				returnval=false //disallow form submission
				}
			}
		}
if (returnval == false){
	alert("Please make sure all fields are entered, empty fields have been highlighted yellow.  Please review your form and submit again");
	return returnval;
	}
else {return returnval}
}
