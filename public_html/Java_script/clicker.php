<!DOCTYPE html> 
<html lang=fr>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="clicker.css">

<title>Cliker game</title>
</head>
<body>
<h1>Le jeu du click </h1>

<div class="compteur" id="score">0</div>

<button class="clicker" id="bouton">Click-here</button>

<div class="boutique"><h3>Boutique :</h3>
<hr>
<button class="achat" id="achat">Bonus +1</button><p id="multiplicateur"></p>
<hr>
<button class="achat" id="achat">Bonus (a venir)</button><p id="multiplicateur"></p>
<hr>
</div>


<script type="text/javascript">
$bouton = document.getElementById("bouton");
$achat1 = document.getElementById("achat");
$multiplicateur = document.getElementById("multiplicateur");
$score = document.getElementById("score");
score = 0;
nbMultiplicateur = 1;

function afficherScore() {
    $score.innerHTML = "Score : " + score;
}

function afficherNbMultiplicateur() {
    $multiplicateur.innerHTML = "nombre de points par click : " + nbMultiplicateur + " (prix : " + prix() + ")";
}

function clic() {
    score = score + nbMultiplicateur;
    afficherScore();
}

function prix() {
    return 20 * nbMultiplicateur * nbMultiplicateur;
}

function acheterMultiplicateur() {
    if (score >= prix()) {
        score = score - prix();
        nbMultiplicateur = nbMultiplicateur + 1;
        afficherNbMultiplicateur();
        afficherScore();
    } else {
        alert("Votre score est insuffisant !");
    }
}



$bouton.onclick = clic;
$achat1.onclick = acheterMultiplicateur;
afficherScore();
afficherNbMultiplicateur();
</script>
</body>