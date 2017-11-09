<!doctype html>
<html lang=fr>
<head>
<meta charset="utf-8">
         <title>Tableau</title>
</head>

<body>

	<?php
//Déclaration
		$anim = ["Mignon"=>"Chat","Obéissant"=>"Chien","Rapide"=>"Cheval","Inutile"=>"Tortue","Poilu"=>"Hamster","Bon"=>"Lapin"];
//Ajoût
		$anim["Féroce"]="Lion";
//Affiche
		foreach ($anim as $key => $value) {
		echo "Le plus $key des annimaux est le $value <br>" ;
 		}

	?>

</body>
</html>