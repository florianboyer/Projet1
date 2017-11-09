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
		<form action="gestionStocks.php" method="get">
			<fieldset><legend>Ajouter des stocks</legend>
				<LABEL for="titre"><pre>Titre   :</pre></LABEL>

<?php

	//require_once "connectBase.php";
	global $cnx;	
	//if (($cnx = connectionBDD()) === false) exit;

	$req="select idTitre, libTitre from titre;";
	$result = $cnx->query($req) or die("La requête a échoué : ".$cnx->error);	
	if($result->num_rows<1) die("La requête ne renvoie aucun résultat");

	echo "<form action='gestionStocks.php' method='get'><select name='liste_titre' required>";
	while ($ligne = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<option value=\" ".$ligne['idTitre']."\">".$ligne['libTitre']."</option>";
	}
	echo "</select></form>"
?>
				<LABEL for="format"><pre>Format du film  :</pre></LABEL>
				<input type="radio" name="format" value="1"> CD-ROM
				<input type="radio" name="format" value="2"> K7
				<input type="radio" name="format" value="3"> DVD 
				<input type="radio" name="format" value="4"> BLU-RAY
				<LABEL for="stock"><pre>Stock Total   :</pre></LABEL>
				<input type="number" name="stock" min="0" required><br>
				<LABEL for="dispo"><pre>Disponible  :</pre></LABEL>
				<input type="number" name="dispo" min="0" max="500" required><br><br>
				<button type="submit" name="btn" value="Submit">Ajouter au sotck</button>
			</fieldset>
		</form>	
	</div>
<div class="swapage"><a href="rechercheStock.php">> Aller voir les Stocks <</a></div>
<?php
class stock {
	private $idTitre;
	private $format;
	private $stock;
	private $dispo;
	
	public function stock($idTitre, $format=null, $stock=0, $dispo=0) {
		$this->idTitre = $idTitre;
		$this->format = $format;
		$this->stock = $stock;
		$this->dispo = $dispo;
	} 
	
	public function toString() {
		return $this->idTitre."(".$this->stock.")";
	}
	public function toBase() {
		//require_once "connectBase.php";
		global $cnx;
		//if (($cnx = connectionBDD()) === false) exit;
			
		$req = "INSERT INTO `stock`(`idTitre`, `idFormat`, `stock`, `dispo`) 
		VALUES ('$this->idTitre', '$this->format', '$this->stock', '$this->dispo');";
			
		$result = $cnx->query($req) or die("La requête a échoué $req : ".$cnx->error);	
		
		// on ferme la connexion
		mysqli_close($cnx);
	}
}
	
	if(!isset($_REQUEST['btn'])) exit;

	echo "<div class=\"requete\">";	

	// récupération des données du formulaire
	$idTitre = $_REQUEST["liste_titre"];

	$format = $_REQUEST["format"];

	$stock = $_REQUEST["stock"];

	$dispo = $_REQUEST["dispo"];
	
	// création de l'objet
	$Stock = new stock($idTitre, $format, $stock, $dispo);
	
	// enregistrement
	$Stock->toBase();
	
	echo "Enregistrement du stock.<br><br> Stock total : ".$stock."<br> Du film N°".$idTitre."<br> Il reste : ".$dispo." exemplaires dispo <br> Sous le format : ".$format;
	echo "</div>";
?>
</div>
</body>
</html>
