<?php
include("connectUser.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="videoclub.css">	
</head>

<body>
	<h1>Connexion / Déconnexion</h1>

<?php

	if (isset($_SESSION['username']))		
	{
		unset($_SESSION['username'],$_SESSION['userid'],$_SESSION['admin']);
		echo "Vous avez été déconnecté!";
	}
	else
	{
		$username = '';
	
		if (isset($_REQUEST['btn']))
		{
			
			$username = $cnx->escape_string($_REQUEST['username']);
			$password = $_REQUEST['password'];	

			$result = $cnx->query('select password, idUser, admin from User where nomUser="'.$username.'"');
			if ($result === false OR $result->num_rows<1)
			{
				$form = true;
				$message = 'Utilisateur inconnu';
			
			}
			else 
			{
			
				$ligne = $result->fetch_array();

				if($ligne['password']==$password)
				{

					$form=false;
					$_SESSION['username'] = $_REQUEST['username'];
					$_SESSION['userid']= $_ligne['idUser'];
					if ($ligne['admin'] == 1)
						$_SESSION['admin'] = true;
					echo "Vous êtes connecté.";
					header('Location: index.php');
			}
			else 
			{
				$form = true;
				$message = 'Identifiants non reconnus !';
		    }
		}
	}
	else
	{
		$form = true;
	}
	if ($form)
	{
		if (isset($message))
		{
			echo $message;
		}

?>

<div class="connexion">
	<form action="connexion.php" method="post">
	<fieldset><legend>Connexion </legend>
		<label for="username">Identifiant :</label>
		<input type="text" name="username" id="username" required autofocus><br>
		<label for="password">Mot de passe :</label>
		<input type="password" name="password" id="password" required><br><br>
		<button type="submit" name="btn" value="Submit">Connexion</button>
	</fieldset>
	</form>
</div>


<?php 
	}
}
?>
<div class="swapage"><a href="index.php">> Retour a l'Acceuil <</a></div>
</body>
</html>

