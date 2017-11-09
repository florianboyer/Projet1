<?php include './connectBase.php';  ?>
<!DOCTYPE html> 
<html lang=fr>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="videoclub.css">
	<title>Recherche d'un film</title>
</head>
<body>
	<div class="haut">
		<a href="connexion.php">| Déconnexion</a>
</div>

<div class="corps"><a href="videoclub.php"><h1>Vidéo club Spectacus</h1></a>

<div class="menu_2">
<form action="rechercheTitre.php" method="get">
			<fieldset><legend>Rechercher un Film</legend>
				<LABEL for="titre"><pre>Titre   :</pre></LABEL>
				<input type="text" name="titre" autofocus size="40"><br>
				<LABEL for="title"><pre>Title   :</pre></LABEL>
				<input type="text" name="title" size="40"><br>
				<LABEL for="an1"><pre>Année de   :</pre></LABEL>
				<input type="number" name="an1" min="1900" max="2017"><br>
				<LABEL for="an2"><pre>Année à    :</pre></LABEL>
				<input type="number" name="an2" min="1900" max="2017"><br><br>	
				<button class="bordure1 btn alignR" type="submit" name="btn" value="Submit">Rechercher le film</button>
			</fieldset>
</form>
</div>
<div class="swapage"><a href="creerTitres.php">> Ajouter un titre <</a></div>
<?php
function listerTitres($req) {
		global $cnx;
		//require_once "connectBase.php";
		
		//if (($cnx = connectionBDD()) === false) exit;
			
		$result = $cnx->query($req) or die("La requête \"$req\" a échoué : ".$cnx->error);	
		if($result->num_rows<1) die("La requête ne renvoie aucun résultat");
	
		// affichage en-tête
		echo "<table><tr>";
		$data = $result->fetch_array(MYSQLI_ASSOC);
		foreach ($data as $key => $value) 
			{  echo '<td><strong>'.$key.'</strong></td>';}
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
	$titre = $_REQUEST["titre"];
	if(isset($_REQUEST["title"]))
		$title = $_REQUEST["title"];
	else
		$title ="";
	if(isset($_REQUEST["an1"]))
		$an1 = $_REQUEST["an1"];
	else $an1="";
	if(isset($_REQUEST["an2"]))
		$an2 = $_REQUEST["an2"];		
	else $an2="";
	
	$req = "select * from titre where libTitre LIKE \"%$titre%\" "; 
	if (isset($title) && strlen($title)>0)
		$req .= " AND title LIKE \"%$title%\" "; 
	if (isset($an1,$an2) && strlen($an1)>0 && strlen($an2)>0)
		$req .= " AND anParution BETWEEN \"$an1\" AND \"$an2\" ";

	// lecture
	listerTitres($req);
	
	echo "</div>";
?>

</body>
</html>



