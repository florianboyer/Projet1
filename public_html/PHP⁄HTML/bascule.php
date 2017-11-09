<?php
include('connectBase.php');

if (isset($_GET["listeDispo"]))
	{
		$choix=$_GET["listeDispo"];

		$userId=$_SESSION["idUser"];

		$request = "UPDATE users SET activite = '".$choix."' WHERE idUser = userId;";

		$result = $cnx->query($request);

		if ($result!=false) {

			echo "<div> Modification bien effectué </div>";
		}
			else {
			 echo "Une erreur est surevenue <br>".$result."</div>";
			}
	}
?>