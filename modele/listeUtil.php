<?php
	include("../config.php");
	include("../modele/user.php");
	$tableauPseudo = User::getAllUser();
	echo json_encode($tableauPseudo);
?>