<?php
include("connectNW.php");
?>
<!doctype html>                    
<html lang="fr">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="style_NW.css">
	<title>New World</title>
</head>
<body>
<?php 
	if (isset($_SESSION['username']))
	{
		$username=$_SESSION['username'];
		echo "<div class=\"haut\"><strong>Bonjour ".$username."<a href=\"\">| France</a><a href=\"NW_connex.php\">| Déconnexion</a></strong></div>";
	} else {
?>
<div class="haut">
	<strong><a href="">| France</a>
			<a href="NW_connex.php">| Connexion</a>
			<a href="NW_signup.php">| Inscription</a></strong>
</div>
<?php
}
?>
<div class="menu">
		<a href=""><font size="+5">NW</font></a> 
		<strong> <a href=""><font size="+3">Acheter</font></a>
				 <a href=""><font size="+3">Produire</font></a>
				 <a href="NW_dist.php"><font size="+3">Distribuer</font></a></strong>

		 <input id="recherche" type="texte" placeholder="Rechercher" onclick="this.value='';">
</div>

<div class=corps background="monde.png"><br>

	<div class=img>
	<br>
		<img src="jardinier-a-larrosoir.jpg" width="225" height="150"><br><br>
		<img src="boucher.jpg" widht="200" height="150"><br>
	</div>

	<div class=corpsText>
		<p>Les meilleurs produits de saison.</p>
		<p>Du producteur à l'artisan et au consommateur.</p>
		<p>Ni usine, ni camion, ni grande surface.</p>
		<p>La terre et l'Homme à nouveau respectés.</p>

		<p>NewWorld</p>
			<br><br><br><br>
		</p>
	</div><br>

</div>

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
		<td>- Le savoir faire des artisantfvs</td>
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

<div class="footer">
		<a href="">copyright NW-2017 </a>
		<a href=""> | Nous contacter </a>
		<a href=""> | Mention légales </a>
</div>
</body>
</html>
