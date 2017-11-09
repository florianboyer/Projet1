<?php
include("connectUser.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign-up</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="videoclub.css">	
</head>

<body>
	<h1>Inscription</h1>
<div class="inscription">
	<form action="inscription.php" method="post">
	<fieldset><legend>Sign up </legend>
		<label for="username">Entrer un identifiant :</label>
		<input type="text" name="username" id="username" required autofocus><br>
		<label for="password">Créer un mot de passe :</label>
		<input type="password" name="password" id="password" required><br><br>
		<!--<label for="password">Confirmer :</label>
		<input type="password" name="password" id="password" required><br><br><br>-->
		<label for="password">Votre E-mail :</label>
		<input type="email" name="email" id="email" required><br><br>
		
		<button type="submit" name="btn" value="Submit">Validez</button>
	</fieldset>
	</form>
</div>
<div class="swapage"><a href="index.php">> Retour a l'Acceuil <</a></div>

<?php
class user {
	private $username;
	private $password;
	private $email;
	
	public function user($nomUser=null, $password=null, $email=null) {
		$this->username = $nomUser;
		$this->password = $password;
		$this->email = $email;

	} 
	public function getNomUser() {
		return $this->username;
	}
	public function setNomUser($nomUser) {
		$this->username = $nomUser;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function toBase(){

		//require_once "connectBase.php";
		global $cnx;
		//if (($cnx = connectionBDD()) === false) exit;
		$req = "INSERT INTO `User`(`nomUser`, `password`, `email`,`signup_date`) 
		VALUES ('$this->username', '$this->password', '$this->email','".time()."');";

		$result = $cnx->query($req) or die("La requête \"$req\" a échoué : ".$cnx->error);	
		
		// on ferme la connexion
		mysqli_close($cnx);
	}
	
}
	
	if(!isset($_REQUEST['btn'])) exit;

	echo "<div class=\"requete\">";	

	// récupération des données du formulaire
	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];
	$email = $_REQUEST["email"];
	
	// création de l'objet
	$user = new user($username, $password, $email);

	
	$user->toBase();

	// enregistrement
	echo "Enregistrement de votre inscription.<br>Bienvenu ".$username."<br> votre mot de passe est : ".$password."<br>Il vous sera envoyé sur votre email : ".$email;
	echo "</div>";
?>
</body>
</html>
