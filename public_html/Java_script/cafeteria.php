<!DOCTYPE html> 
<html lang=fr>
<head>
<meta charset="utf-8">
<title>Caisse</title>  


<script type="text/javascript"> 

window.onload = function() {  
  

$entr = document.getElementById("entr");
$legum = document.getElementById("legum");
$fish = document.getElementById("fish");
$viand = document.getElementById("viand");
$dess = document.getElementById("dess");
$supplement = document.getElementById("supplement");


}


//$tva = document.getElementByTagsName("tva");
function afficheEntree() {
    $entr.innerHTML = "Vous avez choisi une entree";
}



   /*var legumes = document.getElementById("legumes").value;
  $legum.innerHTML = "Vous avez choisi une" + legumes;
  var poisson = document.getElementById("poisson").value;
 $fish.innerHTML = "Vous avez choisi une" + poisson;
  var viande = document.getElementById("viande").value;
 $viand.innerHTML = "Vous avez choisi une" + viande;
  var dessert = document.getElementById("dessert").value;
 $dess.innerHTML = "Vous avez choisi une" + dessert;*/
    
function afficheEntree() {
    $entr.innerHTML = "Vous avez choisi une entree";
}
function afficheLegume() {
    $legum.innerHTML = "Vous avez choisi des légumes";
}
function affichePoisson() {
    $fish.innerHTML = "Vous avez choisi du poisson";
}
function afficheViande() {
    $viand.innerHTML = "Vous avez choisi de la viande";
}
function afficheDessert() {
    $dess.innerHTML = "Vous avez choisi un dessert";
}
    
function afficheBoisson() {
    var boisson = document.getElementById("boisson").value;
    if (boisson=="nothing") {
        $supplement.innerHTML = "Vous n'avez pas choisi de supplément ";
    } else {
        $supplement.innerHTML = "Vous avez choisi un supplément " + boisson ;
    }
}


   
</script>   

</head>

<body>
    <!-- <fieldset><legend>  Saisir :</legend>
         <label for="qte"> Borne 1 : </label>
	     <input type="number" name="b1" min="0" max=""><br>
	     <label for="qte"> Borne 2 : </label>
         <input type="number" name="b2" min="0" max=""><br>
         <input type="submit" value="Validation"><br>
     </fieldset> -->
<fieldset><legend>Menu :</legend>
	<strong>Option repas :</strong>  <br /><br />
     <input  type="number"  id="entree" onchange="afficheEntree()"><label for="entree"> Entrée </label><br /><br />
      <input type="number"  id="legumes" onchange="afficheLegume()"><label for="legumes"> Légumes </label><br /><br />
      <input type="number"  id="poisson" onchange="affichePoisson()"><label for="poisson"> Poisson </label><br /><br />
      <input type="number"  id="viande" onchange="afficheViande()"><label for="viande"> Viande </label><br /><br />
      <input type="number"  id="dessert" onchange="afficheDessert()"><label for="dessert"> Dessert </label><br /><br><br>

	<label for="boisson"><strong>Supplément boisson :</strong></label><br />
        <select  id="boisson" onchange="afficheBoisson()">
        <option value='nothing'> Aucune </option>
            <optgroup label="soda">
                <option  value="coca"> Coca-Cola </option>
                <option  value="oasis"> Oasis </option>
                <option  value="orangina" > Orangina </option>
                <option  value="sprite"> Sprite </option></option>
                <option  value="ice-tea" > Ice Tea </option>
            </optgroup>
            <optgroup label="Alcool">
            	<option  value="vin"> Vin </option>
            	<option  value="rose"> Rosé </option>
            	<option value="bière"> Bière </option>
            	<option value="champagne"> Champagne </option>
           </optgroup>
            <optgroup label="Autres">
                <option  value="thé" > Thé </option>
                <option  value="café" > Café </option>
                <option  value="milkshake"> Milkshake </option>
                <option  value="frappé" > Frappé </option>
            </optgroup> 
          </select><br><br><br>

    <strong>Choix de la commande:</strong> <br />
    <input type="radio"  name="tva"><label for="tva"> Surplace</label>
    <input type="radio"  name="tva"><label for="tva"> Emporter</label><br><br>
 </fieldset><br>
          <button type="button" id="bouton">Validez !</button><br><br>

<fieldset><legend></legend> 
<div class="ticket"> 
    <div id="entr"></div>
    <div id="legum"></div>
    <div id="fish"></div>
    <div id="viand"></div>    
    <div id="dess"></div>
    <div id="supplement"></div><br>
</div>
</fieldset>


</body>
</html>
