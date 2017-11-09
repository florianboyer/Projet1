<?php
include("connectNW.php");
?>
<!doctype html>                    
<html lang="fr">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style_NW.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link href="w3.css" rel="stylesheet" type="text/css">
	<title>New World</title>
</head>
<body>
<nav class="bar black">
  <a href="New_World.php" class="button bar-item" id="here"><i class="fa fa-home"></i> Home</a>
  <a href="" class="button bar-item">Acheter</a>
  <a href="" class="button bar-item">Produire</a>
  <a href="NW_dist.php" class="button bar-item">Distribuer</a>

  <input type="text" class="search bar-item" placeholder="Rechercher..."></div>

   <a href="" class="button bar-item right">France</a>
 
  <a href="#connexion" class="button bar-item right" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fa fa-user"></i> Connexion</a>
   <a href="" class="button bar-item right">Inscription</a>
</nav>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"><i class="fa fa-close"></i></span>
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required><br><br>
        
      <button type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div><br><br>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw"><a href="#">Forgot password?</a></span>
    </div>
  </form>
  <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</div>

<section>
 <div class="slideshow-container">
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img id="imgSize" src="bandeau_prod.png" >
    <div class="text"></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img id="imgSize" src="bandeau_dist.png">
    <div class="text"></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img  id="imgSize" src="bandeau_cli.png">
    <div class="text"></div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div> 

<script type="text/javascript">
  var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
} 
</script>
</section>

 <section class="container center" style="max-width:600px">
  <h2 class="wide ">New World</h2>
  <p class="opacity ">
  <i>Les meilleurs produits de saison.<br>
	Du producteur à l'artisan et au consommateur.<br>
	Ni usine, ni camion, ni grande surface.<br>
	La terre et l'Homme à nouveau respectés.<br>
</i></p>
</section>


<div class="bas">
	<table>
	<th>Participer</th><th>Comprendre</th><th>Communiquer</th>
	<tr>
		<td>- Proposer des produits</td>
		<td>- Savoir faire local</td>
		<td>- Les secrets des producteurs</td>
	</tr>
	<tr>
		<td>- Transformer</td>
		<td>- Réduire les transports</td>
		<td>- Le savoir faire des artisant</td>
	</tr>
	<tr>
		<td>- Devenir client</td>
		<td>- Produits frais</td>
		<td>- Les recettes de grand-mère</td>
	</tr>
	<tr>
		<td>- Distribuer</td>
		<td>- Qualité</td>
		<td>- La conservation des aliments</td>
	</tr>
	</tr>
	</table>
			
</div>


<footer class="container padding-64 center black bottom">
<p><SCRIPT LANGUAGE="JavaScript">
var maintenant=new Date();
var jour=maintenant.getDate();
var mois=maintenant.getMonth()+1;
var an=maintenant.getFullYear();
document.write("Aujourd'hui le ",jour,"/",mois,"/",an);
</SCRIPT>
- Entreprise New World - 05000 Gap – Responsable de publication : M.BAYEUX<br>
  Tous droits réservés © 2017</p>
<a href="">Nous contacter |</a> 
<a href="">Mention légales |</a> 
<a href=""  onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Se connecter</a> 
</footer>
</body>
</html>