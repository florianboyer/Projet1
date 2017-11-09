<script type="text/javascript" src="fichier.js"> // ou language="javascript"
 
 <a href="#" onclick="..">

 <a href="javascript:...">

window.alert("tit"); //affiche un message "titi"

var M = prompt ("msg","");

// exemple fonction avec switch
function mois() {
		var txt;
		var mois = prompt("Choisissez un mois de l'année");
		switch(mois.toLowerCase()) {
				case "janvier":
				txt = "Il y a 31 jours en"+mois;
				break;

				case "février":
				txt = "Il y a 28 jours en"+mois;
				break;

				case "mars":
				txt = "Il y a 31 jours en"+mois;
				break;

				case "avril":
				txt = "Il y a 30jours en"+mois;
				break;

				case "mai":
				txt = "Il y a 31jours en"+mois;
				break;

				case "juin":
				txt = "Il y a 30jours en"+mois;
				break;

				case "juillet":
				txt = "Il y a 31jours en"+mois;
				break;

				case "août":
				txt = "Il y a 31jours en"+mois;
				break;

				case "septembre":
				txt = "Il y a 30jours en"+mois;
				break;

				case "octobre"
				txt = "Il y a 31jours en"+mois;
				break;

				case "novembre":
				txt = "Il y a 30jours en"+mois;
				break;

				case "décembre":
				txt = "Il y a 31jours en"+mois;
				break;

				default:
				txt = "";
				break;
				}
		document.getElementById("mois").innerHTML = txt;
		alert(txt)


var depart = ["Hautes-Alpes", "Alpes de Haute Provence","Vaucluse"];
déprart[2] // renvoie "vaucluse" 