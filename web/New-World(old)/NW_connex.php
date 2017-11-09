<?php
include("connectNW.php");
?>
<!DOCTYPE html> 
<html lang=fr>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="NW_dist.css">
<title>Connexion</title>
</head>
<body>

<div class="haut">
		<strong><a href="">| France</a>
				<a href="NW_connex.php">| Connexion</a>
				<a href="NW_signup.php">| Inscription</a></strong>
</div>

<div class="menu">
	<strong><a href="New_World.php"><font size="+5">New World</font></a></strong> 
		
	<input id="recherche" type="texte" value="Rechercher" onclick="this.value='';">
</div>

<?php
/* 			Utilisateur connecté
 *   déconnexion en supprimant les variables de session
 */
if(isset($_SESSION['username']))
{
	unset($_SESSION['username'], $_SESSION['userid'], $_SESSION['admin']);
	echo "<div class=\"requete\">Vous avez été déconnecté</div>";
}
else
{
	$username = '';

	// Traitement du formulaire 
	if(isset($_REQUEST['btn']))
	{
		$username = $cnx->escape_string($_POST['username']);
		$password = $_REQUEST['password'];
		// récupération du mot de passe utilisateur
		$result = $cnx->query('select password,idUser from User where username="'.$username.'"');
		if ($result=== false OR $result->num_rows<1) {
				$form = true;
				$message = 'Utilisateur inconnu';
		}
		else {
			$ligne = $result->fetch_array();
			
			// comparaison des mots de passe
			if (password_verify($password, $ligne['password']))
			{
				// utilisateur reconnu, pas de formulaire à afficher
				$form = true;
				// màj du username et identifiant dans la session
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['userid'] = $ligne['idUser'];
				
				echo "<div class=\"requete\">Vous êtes connecté.<br><br><a href=\"New_World.php\">> Retour a l'Acceuil <</a></div>";
				header('Location: New_World.php');
			}
			else
			{
				// combinaison fausse, message d'avertissement et formulaire
				$form = true;
				$message = 'Identifiants non reconnus !';
			}
		}
	}
	else
	{
		$form = true;
	}
	if($form)
	{
		// affichage éventuel d'un message sil y a lieu
		if(isset($message))	{
			echo "<div class=\"requete\">".$message."</div>";
		}
	}
}		// Affichage du formulaire
?>

<div class=corps background="/~remy/monde.png"><br>
<div class="corps">
    <form action="NW_connex.php" method="post">
        <fieldset><legend><h2>Connexion / Déconnexion</h2></legend>
            <label for="username"><pre>Identifiant </pre></label>
            <input type="text" name="username" id="username" required autofocus><br>
            <label for="password"><pre>Mot de passe</pre></label>
            <input type="password" name="password" id="password" required><br><br><br>
            <input type="submit" name="btn" value="Connexion">
		</fieldset>
    </form>
</div>

	</div>
	<div class="bas"><a href="NW_signup.php">-> Vous n'êtes pas inscrit? <-</a></div>
	<div class="footer">
	<br><br><br><br>
			<a href="">copyright NW-2017 </a>
			<a href=""> | Nous contacter </a>
			<a href=""> | Mention légales </a>
	</div>
</body>
</html>