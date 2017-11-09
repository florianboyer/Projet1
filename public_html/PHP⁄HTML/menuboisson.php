<html lang=fr>
<head>
<meta charset="utf-8">
         <title>Script menu boissons</title>
</head>
<body>
<br> 
<div class="boite0 centre">
 	<?php
 	if (isset($_GET['thé'])) {
     	echo "Vous voulez un <strong>thé</strong> ";
     }
     if (isset($_GET['café'])) {
     	echo "Vous voulez un <strong>café</strong> ";
     }
     if (isset($_GET['jus'])) {
     	echo "Vous voulez un <strong>jus</strong> ";
     }
     if (isset($_GET['kéfir'])) {
     	echo "Vous voulez un <strong>kéfir</strong> ";
 	}
 	if (isset($_GET['chaud'])) {
 		echo "chaud ";
 	}
 	if (isset($_GET['sucre'])) {
 		echo "sucré ";
 	}
 	if (isset($_GET['pimente'])) {
 		echo "pimenté ";
 	}
 	if (isset($_GET['frappe'])) {
 		echo "frappé ";
 	}
 	?>
</div>
</body>
</html>
