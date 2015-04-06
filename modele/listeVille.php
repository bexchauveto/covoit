<?php
	include("../config.php");
	include("../modele/trajet.php");
	$ville = $_GET['term']."%";
	$tableauVille = Trajet::getVilleByName($ville);
	echo json_encode($tableauVille);
?>