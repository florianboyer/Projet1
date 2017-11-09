<html lang=fr>
<head>
<meta charset="utf-8">
         <title>Script formulaire</title>
</head>
<body>
<br>
<div class="boite0 centre">
	<?php

	 if (isset($_GET['nom'])&&(isset($_GET['prenom'])&&(isset($_GET['email'])&&(isset($_GET['tel']))))) {
		$nom = $_GET['nom'] ;
		$prenom = $_GET['prenom'] ;
		$email = $_GET['email'] ;
		$tel = $_GET['tel'] ;
		echo "Bonjour $prenom $nom , votre site est : $tel et votre email est : $email  ";
 	}
 	?>

 <form action="formulaire1.html" method="get">
 	 <button class="alignD bgCyan" type="submit" value="Retour">Retour</button>
 </form>
</div>
</body>
</html>
