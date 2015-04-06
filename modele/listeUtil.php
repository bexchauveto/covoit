<?php
	include("../config.php");
	include("../modele/user.php");
	$lieu = $_GET['term']."%";
	$tableauPseudo = User::getLieuByName($lieu);
	echo json_encode($tableauPseudo);
?>