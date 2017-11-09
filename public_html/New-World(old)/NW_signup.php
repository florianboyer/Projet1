<?php
include("connectNW.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign-up</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="NW_dist.css">	
</head>
<body>
<div class="haut">
		<strong><a href="">| France</a>
				<a href="NW_connex.php">| Connexion</a></strong>
</div>
<div class="menu">
		<strong><a href="New_World.php"><font size="+5">New World</font></a></strong> 
		 <input id="recherche" type="texte" value="Rechercher" onclick="this.value='';">
</div>
<?php
//On verifie que le formulaire a ete envoye
if(isset($_POST['username'], $_POST['password'], $_POST['passwordconfirm'], $_POST['email'])){
	
	// Vérification de l'identité des pwd
	if($_POST['password']==$_POST['passwordconfirm']) {
		// vérification de la longueur du mot de passe
		if(strlen($_POST['password'])>=6) {
				// echappement des variables pour pouvoir les mettre dans une requette SQL
				$username = $cnx->escape_string($_POST['username']);
				$password = $cnx->escape_string($_POST['password']);
				$password = password_hash($password, PASSWORD_DEFAULT);
				$email = $cnx->escape_string($_POST['email']);
				
				// vérification de l'absence d'utilisateur inscrit sous ce pseudo
				$result = $cnx->query('select idUser from User where username="'.$username.'"');
				if ($result === false OR $result->num_rows < 1) {

					$resultat = $cnx->query('select idUser from User where email="'.$email.'"');
				if ($resultat === false OR $resultat->num_rows < 1) {

						// enregistrement des informations
						$R = 'insert into User( username, password, email) values ( "'.$username.'", "'.$password.'", "'.$email.'")';
						//echo $R;
						if($cnx->query($R))
						{
							$form = true;
							echo '<div class="requete">Vous avez été inscrit.<br> Vous pouvez vous connecter.<br></div>';
							header('Location: NW_connex.php');
						}
						else {
							$form = true;
							$message = "Une erreur est survenue <br> lors de l'inscription.";
						}
					}	     
					else {
						$form = true;
						$message = 'Email déjà utilisé.<br>Veuillez en saisir une autre.';
					}
				}
				else {
					$form = true;
					$message = 'Identifiant déjà assigné.<br> Veuillez en saisir un autre.';
				}
		}
		else {
			$form = true;
			$message = 'Le mot de passe que vous avez entré <br> contient moins de 6 caractères.';
		}
	}
	else {
		$form = true;
		$message = 'Les mots de passe que vous avez entré <br> ne sont pas identiques.';
	}
}
else {
	$form = true;
}
if($form) {
	//On affiche un message sil y a lieu
	if(isset($message))
	{
			echo '<div class="requete">'.$message.'</div>';
	}
?>

<div class=corps background="/~remy/monde.png"><br>

	<div class="corps">
		<form action="NW_signup.php" method="post">
		<fieldset><legend><h2>Inscription</h2></legend>
			<label for="username">Entrer un identifiant :</label><br>
			<input type="text" name="username" id="username" value="identifiant" required autofocus onclick="this.value='';"><br><br>
			<label for="password">Créer un mot de passe :</label><br>
			<input type="password" name="password" id="password" required><br>
			<label for="password">Confirmer :</label><br>
			<input type="password" name="passwordconfirm" id="passwordconfirm" required><br><br><br>
			<label for="password">Votre E-mail :</label><br>
			<input type="email" name="email" id="email" value="example@mail.com" required onclick="this.value='';"><br><br>
		
			<button type="submit" name="btn" value="Submit">Validez</button>
		</fieldset>
		</form>
	</div>
</div>
<div class="bas"><a href="New_World.php">> Retour a l'Acceuil <</a></div>
	<div class="footer">
	<br><br><br><br>
			<a href="">copyright NW-2017 </a>
			<a href=""> | Nous contacter </a>
			<a href=""> | Mention légales </a>
	</div>

<?php
}
?>

</body>
</html>