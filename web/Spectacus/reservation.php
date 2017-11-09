<?php include './connectBase.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="videoclub.css">
	<title>Réservation</title>
</head>
<body>
<div class="haut">

		<a href="connexion.php">| Déconnexion</a>
	</div>
	<div class="corps"><a href="index.php"><h1>Vidéo club Spectacus</h1></a>

	<div class="menu_2">
		<form action="reservation.php" method="get">
			<fieldset><legend>Réserver votre film :</legend>
				<LABEL for="titre"><pre>Quel film souhaitez-vous?    </pre></LABEL>

<?php

	//require_once "connectBase.php";
	global $cnx;	
	//if (($cnx = connectionBDD()) === false) exit;

	$req="select idTitre, libTitre from titre;";
	$result = $cnx->query($req) or die("La requête a échoué : ".$cnx->error);	
	if($result->num_rows<1) die("La requête ne renvoie aucun résultat");

	echo "<form action='reservation.php' method='get'><select name='liste_titre' required>";
	while ($ligne = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<option value=\" ".$ligne['idTitre']."\">".$ligne['libTitre']."</option>";
	}
	echo "</select></form>"
?>
				<LABEL for="format"><pre>Quel format voulez-vous?       </pre></LABEL>
				<input type="radio" name="format" value="1"> CD-ROM
				<input type="radio" name="format" value="2"> K7
				<input type="radio" name="format" value="3"> DVD 
				<input type="radio" name="format" value="4"> BLU-RAY
				<LABEL for="date"><pre>A partir de quel jour?         </pre></LABEL>
				<input type="date" name="date" value="JJ/MM/AA" onclick="this.value='';" required><br><br><br>
				<button type="submit" name="btn" value="Submit">Réservez !</button>
			</fieldset>
		</form>	
	</div>
</body>