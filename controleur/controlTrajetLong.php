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
		$nbpassager = 0;
		if($idUserPassager != 0) {
			foreach ($idUserPassager as $key => $value) {
				$listeUserPassager[$key] = User::getUserById($value);
				$nbpassager++;
			}
		}
		$tableauEscale = Trajet::getAllEscaleByTrajet($idTrajet);
		$ListeEscale = Trajet::getAllEscale();
		$listeFlag = Trajet::getFlagsByIdTrajet($idTrajet);
		$listeAllFlag = Trajet::getAllFlags();
		$thisUser = User::getIdUserByNick($_SESSION['user']);

		$tupleTrajet = Trajet::getTrajetById($idTrajet);
		$objTrajet = new Trajet($tupleTrajet['typeTrajet'], $tupleTrajet['villedep'], $tupleTrajet['villearr'], $tupleTrajet['prix'], $tupleTrajet['description'], $tupleTrajet['dateTrajet'], $tupleTrajet['heure'], $tupleTrajet['duree']);
		$objTrajet->setidTrajet($tupleTrajet['idTrajet']);
		include("../vue/vueTrajetLong.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");

?>