<?php
include("connectNW.php");
?>
<!DOCTYPE html> 
<html lang=fr>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="NW_dist.css">
<title>Mise en vente</title>
</head>
<body>
<?php 
	if (isset($_SESSION['username']))
	{
		$username=$_SESSION['username'];
		echo "<div class=\"haut\"><strong>Bonjour ".$username."<a href=\"\">| France</a><a href=\"NW_connex.php\">| Déconnexion</a></strong></div>";
?>


	<div class="menu">
		<strong><a href="New_World.php"><font size="+5">New World</font></a></strong> 
		
				 <input id="recherche" type="texte" placeholder="Rechercher" onclick="this.value='';">
	</div>
	<div class=corps background="/~remy/monde.png"><br>

	<div class="corps">
	<form action="NW_dist.php" method="get">
    	<legend><h2>  Vous souhaitez vendre :</h2></legend>
         	<label for="qte"> Quantité (kg) : </label>
	     	<input type="number" step=".5" name="qte" min="0" max="1000" value="5" ><br><br>
	     	<label for="pdt"> Votre produit   : </label>
 <?php      	
global $cnx;	
	//if (($cnx = connectionBDD()) === false) exit;

	$req="select idProduit, nomProd from Produit;";
	$result = $cnx->query($req) or die("La requête a échoué : ".$cnx->error);	
	if($result->num_rows<1) die("La requête ne renvoie aucun résultat");

	echo "<form action='NW_dist.php' method='get'><select name='pdt' required>";
	while ($ligne = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<option value=\" ".$ligne['idProduit']."\">".$ligne['nomProd']."</option>";
	}
	echo "</select></form>"
?>


			<label for="prix"> Prix au kg : </label>
	     	<input type="number" step=".01" name="prix" min="0" max="100" value="1.50" ><br><br>

       		<label for="dateRec"> Date de la récolte :</label>
			<input type="date" name="dateRec" placeholder="JJ / MM / AA " onclick="this.value='';"><br><br>

				<label for="limit"> Date limite de consommation :</label>
			<input type="date" name="dateLimit" placeholder=" JJ / MM / AA " onclick="this.value='';"><br><br>

			<label for="parcelle">Parcelle / Ville / Mode :</label>
<?php      	
global $cnx;	
	//if (($cnx = connectionBDD()) === false) exit;
	//$idProducteur = $_SESSION["idProducteur"];

	$req="select idParcelle, nomParcelle, ville, modeProd from Parcelle where idProducteur=idProducteur;";
	$result = $cnx->query($req) or die("La requête a échoué : ".$cnx->error);	
	if($result->num_rows<1) die("La requête ne renvoie aucun résultat");

	echo "<form action='NW_dist.php' method='get'><select name='parcelle' required>";
	while ($ligne = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<option value=\" ".$ligne['idParcelle']."\">".$ligne['nomParcelle']."  /  ".$ligne['ville']."  /  ".$ligne['modeProd']."</option>";
	}
	echo "</select></form>"
?><br><br>


	     	<input type="submit" name="btn" value="Validation">

</div>
	</div>
	</form>
	<div class="bas">
	</div>
	<div class="footer">
	<br><br><br><br>
			<a href="">copyright NW-2017 </a>
			<a href=""> | Nous contacter </a>
			<a href=""> | Mention légales </a>
	</div>

<?php
class lot {
	private $qte;
	private $dateRec;
	private $dateLimit;
	private $prix;
	
	public function lot($prix=null, $qte=null, $dateRec=null, $dateLimit=null) {
		$this->prix = $prix;
		$this->qte = $qte;
		$this->dateRec = $dateRec;
		$this->dateLimit = $dateLimit;
	} 

	public function getPrix(){
	return $this->prix;
	}
	public function setPrix($prix){
		$this->prix = $prix;
	}
	public function getQte() {
		return $this->qte;
	}
	public function setQte($qte) {
		$this->qte = $qte;
	}
	public function getDateRec() {
		return $this->dateRec;
	}
	public function setDateRec($dateRec) {
		$this->dateRec = $dateRec;
	}
	public function getDateLimit(){
		return $this->dateLimit;
	}
	public function setDateLimit($dateLimit){
		$this->dateLimit = $dateLimit;
	}
	public function toString() {
		return $this->pdt."(".$this->prix."€".$this->qte."kg)";
	}
	public function toBase() {
		//require_once "connectBase.php";
		global $cnx;
		
		//if (($cnx = connectionBDD()) === false) exit;
			
		$req = "INSERT INTO `lots`(`prix`, `qtyLot`, `dateRecolte`,`dateLimite`) 
		VALUES ('$this->prix', '$this->qte', '$this->dateRec','$this->dateLimit');";
echo $req;
		$result = $cnx->query($req) or die("La requête \"$req\" a échoué : ".$cnx->error);	
var_dump($result);
		// on ferme la connexion
		mysqli_close($cnx);
	}
}
	
	if(!isset($_REQUEST['btn'])) exit;

	echo "<div class=\"requete\">";	

	// récupération des données du formulaire
	$qte = $_REQUEST["qte"];
	$dateRec = $_REQUEST["dateRec"];
	$dateLimit = $_REQUEST["dateLimit"];
	$prix = $_REQUEST["prix"];

	
	// création de l'objet
	$Lot = new lot($prix, $qty, $dateRec, $dateLimit);
	
	// enregistrement
	$Lot->toBase();
	
	echo "Enregistrement de votre lot : ".$Lot->toString();
	echo "</div>";
}
else {
 header('Location: NW_connex.php');
}
?>
</body>
</html>


		




	

















