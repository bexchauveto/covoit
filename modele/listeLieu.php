<?php
	include("../config.php");
	include("../modele/trajet.php");
	$lieu = $_GET['term']."%";
	$tableauLieu = Trajet::getLieuByName($lieu);
	echo json_encode($tableauLieu);
?>