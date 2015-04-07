<?php
	include("../config.php");
	include("../modele/user.php");
	$tableauPseudo = User::getAllUserNick();
	echo json_encode($tableauPseudo);
?>