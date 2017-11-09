<?php include './connectBase.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="videoclub.css">
	<title>Gestion des titres</title>
</head>
<body>
	<div class="haut">
		<a href="connexion.php">| Déconnexion</a>
	</div>

	<div class="corps"><a href="videoclub.php"><h1>Vidéo club Spectacus</h1></a>

	<div class="menu_2">
		<form action="creerTitres.php" method="get">
			<fieldset><legend>Ajouter un titre</legend>
				<LABEL for="titre"><pre>titre   :</pre></LABEL>
				<input type="text" name="titre" autofocus required size="40"><br>
				<LABEL for="title"><pre>Title   :</pre></LABEL>
				<input type="text" name="title" size="40"><br>
				<LABEL for="an"><pre>Année  :</pre></LABEL>
				<input type="number" name="an" min="1900" max="2017" required><br>
				<label for="theme"> Thème/Genere :</label>
       			<select name="theme" id="theme">
       				<option value="1">Animaux</option>
					<option value="2">Arts</option>
 					<option value="3">Chefs-d'oeuvre</option>
 					<option value="4">Cinémas nationaux</option> 
 					<option value="5">Constructions</option>
					<option value="6">Distractions</option>
					<option value="7">Divers</option>
 					<option value="8">Diverses communautés</option>
					<option value="9">Ecrivains</option>
					<option value="10">Fantastique/Science-fiction</option>
					<option value="11">Genres cinématographiques</option>
					<option value="12">Guerres</option>
					<option value="13">Histoire</option>
					<option value="14">Lieux géographiques</option>
					<option value="15">Lois et déviances</option>
					<option value="16">Milieu médical</option>
					<option value="17">Milieux socio-professionnels</option>
					<option value="18">Moyens de communication</option>
					<option value="19">Moyens de transport</option>
					<option value="20">Nature</option>
					<option value="21">Personnages célèbres</option>
					<option value="22">Prix cinématographiques</option>
					<option value="23">Problèmes de société</option>
					<option value="24">Professions</option>
					<option value="25">Religions</option>
					<option value="26">Scénaristes célèbres</option>
					<option value="27">Séries</option>
					<option value="35">Sports</option>
				</select><br><br>
 			<button class="bordure1 btn alignR" type="submit" name="btn" value="Submit">Ajouter ce titre</button>
			</fieldset>
		</form>	
	</div>
</div>
<div class="swapage"><a href="rechercheTitre.php">> Aller voir les titres <</a></div>

<?php
class titre {
	private $titre;
	private $title;
	private $an;
	private $theme;
	
	public function titre($Titre=null, $An=null, $Title=null, $Theme=null) {
		$this->titre = $Titre;
		$this->title = $Title;
		$this->an = $An;
		$this->theme = $Theme;
	} 
	public function getTitre() {
		return $this->titre;
	}
	public function setTitre($Titre) {
		$this->titre = $Titre;
	}
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($Title) {
		$this->title = $Title;
	}
	public function getAn() {
		return $this->an;
	}
	public function setAn($An) {
		$this->an = $An;
	}
	public function getTheme(){
		return $this->theme;
	}
	public function setTheme($Theme){
		$this->theme = $Theme;
	}
	public function toString() {
		return $this->titre."(".$this->an.")";
	}
	public function toBase() {
		//require_once "connectBase.php";
		global $cnx;
		
		//if (($cnx = connectionBDD()) === false) exit;
			
		$req = "INSERT INTO `titre`(`libTitre`, `anParution`, `title`, `idTheme`) 
		VALUES ('$this->titre', '$this->an', '$this->title', '$this->theme');";
			
		$result = $cnx->query($req) or die("La requête \"$req\" a échoué : ".$cnx->error);	
		
		// on ferme la connexion
		mysqli_close($cnx);
	}
}
	
	if(!isset($_REQUEST['btn'])) exit;

	echo "<div class=\"requete\">";	

	// récupération des données du formulaire
	$titre = $_REQUEST["titre"];
	if(isset($_REQUEST["title"]))
		$title = $_REQUEST["title"];
	else
		$title ="";
	$an = $_REQUEST["an"];
	$theme = $_REQUEST["theme"];
	
	// création de l'objet
	$Titre = new titre($titre, $an, $title, $theme);
	
	// enregistrement
	$Titre->toBase();
	
	echo "Enregistrement du titre : ".$Titre->toString();
	echo "</div>";
?>
</body>
</html>




