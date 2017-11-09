<?php include './connectBase.php' ?>
<!DOCTYPE html> 
<html lang=fr>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="videoclub.css">
<title>Acceuil du site</title>
</head>
<body>

<h1>Acceuil du site</h1><br>

<div class="index">
Bonjour <?php if (isset($_SESSION['username']))
{echo $_SESSION['username'];} ?> <br>
Bienvenue sur notre site.<br><br>
</div>

<?php 

if (isset($_SESSION['username']))
{
?>
<div class="menu">
<a  href="">Modifier ses informations</a><br><br>
<a href="reservation.php">Réservez le film de votre choix</a><br><br>
<a href="connexion.php">Se deconnecter</a><br><br><br><br>
</div>
<?php 
	if (isset($_SESSION['admin']))
	{
?>
<div class="menu">
<a href="videoclub.php">Gestion du vidéo club</a><br><br>
<a href="">Listes des utilisateurs</a><br><br>
</div>
<?php
	}
}
else
{
?>
<div class="index">
<a href="inscription.php">Inscription</a>
/
<a href="connexion.php">Connexion</a>
</div>

<?php
}
?>
</body>
</html>