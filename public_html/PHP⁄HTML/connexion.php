<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="connex_sql.css">
	<title>accès à la base de données</title>
	<style>
		label {
		    display: initial;
		    width: initial;
		    text-align: left;
		    box-sizing: border-box;
		}
		pre {display : inline;}
	</style>
</head>
<body class="">
	<div class="req"> 
		<h2>Simple accès à une base</h2>
	</div>
	<div class="form">
		<form action="" method="get">
			<fieldset>
				<LABEL for="salmin"><pre>Salaire minimum     :</pre></LABEL>
				<input type="number" name="salmin" min="900" max="2500" size="50" autofocus required><br>
				<LABEL for="salmax"><pre>Salaire maximum     :</pre></LABEL>
				<input type="number" name="salmax" min="900" max="2500" size="50" required><br>
				<LABEL for="sexe"><pre>Sexe   :</pre></LABEL>
				<input type="text" name="sexe" size="1" ><br>
				<button class="" type="submit" name="btn" value="Submit">Envoyez votre requête</button>
			</fieldset>
		</form>	
	</div>

<div class="req"> 
<?php
	if(!isset($_REQUEST['btn'])) exit;

	$cnx = connexion();
	if ($cnx === false) exit;

	$min = $_GET['salmin'];
	$max = $_GET['salmax'];
	if (isset($_GET['sexe']))
		$sexe = $_GET['sexe']; 
	
	$req = "select * from Technicien where salaire between $min and $max";

	if (isset($sexe)&&strlen($sexe)>0)
		$req .= " AND sexe = \"$sexe\"";

//echo "<b>",_LINE_,$req;
	$result = $cnx->query($req) or die("La requête \"$req\" a échoué : ".$cnx->error);	// msqli_query($cnx, $req);
	
	if($result->num_rows<1) die("La requête ne renvoie aucun résultat");
											
	while ($data = $result->fetch_array(MYSQLI_ASSOC)){
		echo "<br>";
		foreach($data as $valeur) {
			echo "$valeur<br>";
		}
	}
	// on ferme la connexion
	mysqli_close($cnx);

function connexion() {
	// on récupère des données de formulaires
	// on récupèration des données du formulaire
	$user = "remyb";
	$pwd = "ini01";
	$serveur = "172.17.10.20";	
	$base = "frankb";
		
	// connection à la base
	if (!($cnx = mysqli_connect($serveur, $user, $pwd, $base))) {
		echo("connection impossible ".$cnx->connect_error()); // msqli_connect_error($cnx);
		return false;
	}
		
	$cnx->query("SET NAMES utf8");
	return $cnx;
}
  ?>
	</div>

</body>
</html>


