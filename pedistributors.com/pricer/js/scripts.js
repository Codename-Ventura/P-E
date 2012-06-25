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
	alert("Emprty Fields Not Allowed : ID-1-0T ERROR!");
	return returnval;
	}
else {return returnval}
}