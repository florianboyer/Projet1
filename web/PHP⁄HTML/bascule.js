window.onload = t;

function t () {
	
	form = formulaire.listeDispo;

	form.onmouseover = f1;
	form.onmouseout = f2;

	form.onchange = affiche;
}

function f1 () {this.style.background = "cyan";} 
function f2 () {this.style.background = "yellow";}

function affiche () { 
	var choix = form.value;
	alert("votre choix est "+choix);
 }
