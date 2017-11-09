<html lang=fr>
<head>
<meta charset="utf-8">
         <title>Tableau2</title>
</head>

<body>
<?php
	$tel=array(
		"Rémy"=>array("Marque"=>"Apple","Modèle"=>"5S","Prix"=>"500€","Capacité"=>"32Go"),
		"Olivier"=>array("Marque"=>"Samsung","Modèle"=>"Galaxy+","Prix"=>"350€","Capacité"=>"16Go")
		 );

	$monTel=$tel['Rémy'];
	echo "<table style='border:1px solid cyan'>";
	foreach ($tel as $indice => $valeur) {
		echo "<tr>";
		if (is_array($valeur)){
			foreach ($valeur as $i2 => $v2) {
				echo "<td>".$v2."</td>";
			}
		}
		echo "</tr>";
	}
	echo "</table>";
?>

</body>
</html>