<?php
session_start(); 

	$user = "remyb";
	$pwd = "ini01";
	$serveur = "localhost";
	$base = "spectacus";


	// connection à la base
	if (!($cnx = mysqli_connect($serveur, $user, $pwd, $base))) 
	{
		echo ("connection impossible ".$cnx->connect_error);
		return false;
	}
		
	$cnx->query("SET NAMES utf8");

	//echo "Connexion réussie à la base $base<br><br>";
	

$url_home="index.php";
?>
</body>
</html>


