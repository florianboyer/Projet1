<html lang=fr>
<head>
<meta charset="utf-8">
         <title>script menu deroulant</title>
</head>
<body>
<br>
<div class="boite0 centre">
 	<?php
 	if (isset($_GET['dpt'])) {
 		$dpt = $_GET['dpt'];
 	echo "Vous habitez $dpt !!";
 	}
 	
 	?>
</div>
</body>
</html>
