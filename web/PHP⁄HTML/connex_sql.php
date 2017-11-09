<!DOCTYPE html> 
<html lang=fr>
<head>
<link rel="stylesheet" type="text/css" href="connex_sql.css">
<meta charset="utf-8">
</head>
<body>
	<h1> Connexion a une database</h1><br>
<div class="form">
	<form action="connex_sql.php" method="get">
	<label for="serv"> Serveur   : </label>
    <input type="text" name="serv" id="serv" /><br>
    <label for="user"> Nom de compte : </label>
    <input type="username" name="user" id="user" /><br>
	<label for="mdp"> Mot de passe   : </label>
    <input type="password" name="mdp" id="mdp" /><br>
    <label for="base"> Base : </label>
    <input type="text" name="base" id="base" /><br>
	<label for="table"> Table : </label>
    <input type="text" name="table" id="table" /><br>
   	<br>
   	<input type="submit" value="Connexion" id="valid">
   	</form>
</div>

<div class="req"> 
	<?php
		if (isset($GET_['serv'])&&isset($GET_['user'])&&isset($GET_['mdp'])) 
			die("Ces champs sont obligatoire!");
			$user = $_GET['user'];
			$passwd = $_GET['mdp'];
			$serveur = $_GET['serv'];
			$base = $_GET['base'];
			$table = $_GET['table'];
			
			if (!($cnx = mysqli_connect($serveur, $user, $passwd, $base)))
				die("connexion impossible".mysqli_connect_error($cnx));
				
				if (!$cnx->query("SET NAMES utf8")) 
				echo "erreur d'exécution de la requête".$cnx->error;
			mysqli_query($cnx,"SET NAMES utf8"); mysqli_error;
			
			$req = "select nomVille, population, densite from ville";
			$result = $cnx->query($req)
			or die ("La requête \"$req\" a échoué : ".$cnx->error);
			
			while($ligne = $result->fetch_assoc()) {
				echo $ligne['nomVille']." :"."<br>	Population : ".$ligne['population']."	Densité : ".$ligne['densite']."<br><br />";
			}			
			
			
		
			
			
		
	?>
</div>

</body>

</html>
