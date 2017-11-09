<!DOCTYPE html> 
<html lang=fr>
<head>
<meta charset="utf-8">
<title>Capitales d’Europe</title>
</head>
<body>
	<?php

			$EU = ["Italie"=>"Rome","Luxembourg"=>"Luxembourg","Belgique"=>"Bruxelles","Danemark"=>"Copenhague","Finlande"=>"Helsinki",
				"Fance"=>"Paris","Slovéquie"=>"Bratislava","Slovénie"=>"Ljubljana","Allemagne"=>"Berlin","Grèce"=>"Athènes",
				"Irlande"=>"Dublin","Pay-Bas"=>"Amsterdam","Portugal"=>"Lisbonne","Epagne"=>"Madrid","Suède"=>"Stockholm",
				"Royaume-Uni"=>"Londres","Chypre"=>"Nicosie","Lituanie"=>"Vilnius","Réoublique Tchèque"=>"Prague","Estonie"=>"Tallin",
				"Hongrie"=>"Budapest","Lettonie"=>"Riga","Malte"=>"Valette","Autriche"=>"Vienne","Pologne"=>"Varsovie"];

	asort($EU);
	echo "<table border='1'>";
	echo "<td>";
	foreach($EU as $pays => $ville) {
	 		echo "|$pays"."   -   "."$ville <br>";
			}
	echo "</td>";
	echo "</table>";

	/*<form methode="get" action="tableau3_pays.php">
	<fieldset>
					<option value="Amsterdam" checked></option>
					<option value="Rome" ></option>
					<option value="Luxembourg"></option></option>
				    <option value="Bruxelles" ></option>
					<option value="Copenhague" ></option>
					<option value="Finlande" ></option>
					<option value="Paris"></option>
				    <option value="Bratislava" ></option>
					<option value="Ljubljana" ></option>
					<option value="Berlin" ></option>
					<option value="Athènes"></option>
					<option value="Dublin"</option>
					<option value="Lisbonne"</option>
					<option value="Madrid"</option>
					<option value="Stockholm"</option>
					<option value="Londres"</option>
					<option value="Nicosie"</option>
					<option value="Vilnius"</option>
					<option value="Prague"</option>
					<option value="Tallin"</option>
					<option value="Budapest"</option>
					<option value="Riga"</option>
					<option value="Valette"</option>
					<option value="Vienne"</option>
					<option value="Varsovie"</option>
	 <input type="submit" value="Entrez"><br>
	</fieldset>
	</form>*/
	?>
</body>
</html>
