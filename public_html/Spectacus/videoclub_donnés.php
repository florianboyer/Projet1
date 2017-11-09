  <?php
	$titre = [ ["nom" => "Spartacus", "annee" => 1961],
			   ["nom" => "Blade Runner", "annee" => 1989],
			   ["nom" => "Lolita", "annee" => 1980],
			   ["nom" => "Autant en emporte  le vent", "annee" => 1950] ];

			  //var_dump($titre);


//Phase de clotyre de l'appli, on transorme le tableau en objet json */

	$phase_init = true;
	if ($phase_init === true) {
		// phase d'initialisation			
		// on reçoit un fichier csv
		// on le transforme en tableau des films
		$csv = lire_csv("spectacus.csv");
	
	    $pos=0;
		while(($trouve = strpos($csv, ";", $pos)) !== false) {
			echo "<br>",substr($csv, $pos, $trouve-$pos);
			// insérer ici le code pour générer le tableau
			//$films = ...
			$pos = $trouve + 1;
		}
	}
	else {
		// lecture du json
	    $json = file_get_contents($jsonFile);
		$films= json_decode($json, true);
	}		
	
	
	// phase de traitement de nos données

	echo "<br>Notre premier titre : ",$titre[0]["nom"];	
	

	// phase de cloture de l'appli
	// on transforme le tableau en objet json

	$json = json_encode($titre);

	// et on l'écrit sur disque	
	$jsonFile = "films.json";
	ecrireJson($jsonFile, $json);

	

	// écrit le contenu d'un objet json
	// $N : nom du fichier en sortie
	// $J : objet json
	function ecrireJson($N, $J) {
		$handle = fopen($N, "w");
		fwrite($handle, $J);
		fclose($handle);
	}
	
	function lire_csv($N) {
		$J = file_get_contents($N);
		return $J;
	}	



	

?>



