<?php

/*$b1=$_GET['b1'];
$b2=$_GET['b2'];
$rslt=0;
     	for ($i=$b1; $i<=$b2 ; $i++)
     	{
     		$rslt= $rslt+$i ;
     	}
echo "Le résultat est :".$rslt;*/


if(isset($_GET['tva']) && (isset($_GET['boisson'])))
{ 
	$entree=$_GET['Entrée'];
	$legume=$_GET['Légumes'];
	$fish=$_GET['Poisson'];
	$viande=$_GET['Viande'];
	$dessert=$_GET['Dessert'];
	$tva=$_GET['tva'];
	$boisson=$_GET['boisson'];

	$tarif = ['entree'=>1.50, 'legume'=>2, 'fish'=>3.50, 'Viande'=>3.50, 'dessert'=>2.50, 'coca'=>1.50, 'oasis'=>1.50, 'orangina'=>1.50, 'sprite'=>1.50, 'ice-tea'=>1.50, 'vin'=>4, 'rose'=>4, 'champagne'=>2.50, 'thé'=>2, 'café'=>1, 'milkshake'=>3, 'frappé'=>2.50];

	$repas = [ $entree , $legume , $fish , $viande , $dessert , $boisson];

	foreach ($tarif as $prod => $prix) {
		foreach ($repas as $plat){
			if ($prod==$plat)
			{
			echo $plat." +".$prix."€";
			}
		}
	
	}
}


?>
