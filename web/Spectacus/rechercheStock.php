<?php include './connectBase.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="videoclub.css">
	<title>Gestion des Stocks</title>
</head>
<body>
	<div class="haut">
		<a href="connexion.php">| Déconnexion</a>
	</div>

	<div class="corps"><a href="videoclub.php"><h1>Vidéo club Spectacus</h1></a>

	<div class="menu_2">
		<form action="rechercheStock.php" method="get">
			<fieldset><legend>Voir les stocks</legend>
				<LABEL for="titre"><pre>Titre   :</pre></LABEL>
<?php

	//require_once "connectBase.php";
		
	//if (($cnx = connectionBDD()) === false) exit;

	$req="select idTitre, libTitre from titre;";
	$result = $cnx->query($req) or die("La requête a échoué : ".$cnx->error);	
	if($result->num_rows<1) die("La requête ne renvoie aucun résultat");

	echo "<form action='rechercheStock' method='get'><select name='liste_titre'required>";
	while ($ligne = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<option value=\" ".$ligne['idTitre']."\">".$ligne['libTitre']."</option>";
	}
	echo "</select></form>"
?>
				<LABEL for="format"><pre>Format du film  :</pre></LABEL>
				<input type="radio" name="format" value="CD-ROM"> CD-ROM
				<input type="radio" name="format" value="K7"> K7
				<input type="radio" name="format" value="DVD"> DVD 
				<input type="radio" name="format" value="BLUE-RAY"> BLUE-RAY<br><br>
				<button type="submit" name="btn" value="Submit">Voir le stock !</button>
			</fieldset>	

		</div>
<div class="swapage"><a href="gestionStocks.php">> Ajouter des Stocks <</a></div>
<?php
function listerTitres($req) {
		//require_once "connectBase.php";
		global $cnx;
		//if (($cnx = connectionBDD()) === false) exit;
			
		$result = $cnx->query($req) or die("La requête a échoué : ".$cnx->error);	
		if($result->num_rows<1) die("La requête ne renvoie aucun résultat");
	
		// affichage en-tête
		echo "<table><tr>";
		$data = $result->fetch_array(MYSQLI_ASSOC);
		foreach ($data as $key => $value) 
			{  echo '<td><strong>'.$key.' / '.'</strong></td>';}
		echo '</tr>';
		$result->data_seek(0);
	
		
		while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<tr>";
			foreach($data as $key=>$valeur) {
				echo "<td>$valeur</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
				
		// on ferme la connexion
		mysqli_close($cnx);
	}

	
	if(!isset($_REQUEST['btn'])) exit;

	echo "<div class=\"requete\">";	

	// récupération des données du formulaire
	$idTitre = $_REQUEST["liste_titre"];
	if(isset($_REQUEST["format"]))
		$format = $_REQUEST["format"];
	else $format=null;
	$req = "select * from stock where idTitre = \"$idTitre\" "; 
	if (isset($format) && strlen($format)>0)
		$req .= " AND format LIKE \"%$format%\" ";
//print $req;
	// lecture
	listerTitres($req);
	
	echo "</div>";
?>
		
</div>
</body>
</html>
