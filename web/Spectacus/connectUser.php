<?php 

/*
 * 		activation de la variable $_SESSION
 */
session_start();

/* 
 * 		connection à la base utilisateurs
 */
if (!($cnx = mysqli_connect("localhost", "remyb", "ini01", "user"))) {
	echo ("connexion impossible ".$cnx->connect_error);
	return false;
}
	
$cnx->query("SET NAMES utf8");

/*  
 * 	variables de configuration
 */
 
 $url_home = "index.php";

?>