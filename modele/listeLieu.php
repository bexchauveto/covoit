<?php
	include("../config.php");
	include("../modele/trajet.php");
	$tableauLieu = Trajet::getAllLieu();
	echo json_encode($tableauLieu);
?>