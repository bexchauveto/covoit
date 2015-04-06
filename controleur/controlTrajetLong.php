<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/trajet.php");
	include("../modele/user.php");
	if(isset($_SESSION['user'])){
		$idTrajet = $_GET['idTrajet'];
		$trajet = Trajet::getTrajetById($idTrajet);
		$idUserCreator = Trajet::getCreatorByIdTrajet($idTrajet);
		$userCreator = User::getUserById($idUserCreator);
		$idUserPassager = Trajet::getPassagerByIdTrajet($idTrajet);
		foreach ($idUserPassager as $key => $value) {
			$listeUserPassager[$key] = User::getUserById($value);
		}
		include("../vue/vueTrajetLong.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");

?>