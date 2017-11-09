<!doctype>
<html lang=fr>
<head>
<meta charset="utf-8">
         <title>Script Check-Box</title>
</head>
<body>
<br>
<div class="boite0 centre">
 <?php
     if (isset($_GET['marche'])) {
     	echo "Vous aimez la <strong>randonnée</strong><br>";
     }
     if (isset($_GET['foot'])) {
     	echo "Vous partiquez le <strong>foot</strong> ??<br>";
     }
     if (isset($_GET['rugby'])) {
     	echo "Vous regardez des matchs de <strong>rugby</strong> à la télé !<br>";
     }
     if (isset($_GET['varape'])) {
     	echo "Vous préférez <strong>grimpez</strong> sur des cailloux<br>";
     }
 ?>

 <form action="formulaire1.html" method="get">
 	<button class="alignD bgCyan" type="submit" value="Retour">Retour</button>
 </form>
</div>
</body>
</html>