<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	include("../modele/trajet.php");
	if(isset($_SESSION['user'])){
		$pseudo = $_SESSION['user'];
		$idUser = User::getIdUserByNick($pseudo);
		$user = User::getUserByNick($pseudo);
		$user->setID($idUser);

		$tupleTrajet = Trajet::getTrajetById($_GET['idTrajetAGerer']);
		$trajet = new Trajet($tupleTrajet['typeTrajet'], $tupleTrajet['villedep'], $tupleTrajet['villearr'], $tupleTrajet['prix'], $tupleTrajet['description'], $tupleTrajet['dateTrajet'], $tupleTrajet['heure'], $tupleTrajet['duree']);
		$trajet->setidTrajet($tupleTrajet['idTrajet']);

		if(isset($_GET['idUserAAccepter'])) {
			User::accepter($_GET['idUserAAccepter'],$trajet->getidTrajet());
		}
		if(isset($_GET['idUserARefuser'])) {
			User::refuser($_GET['idUserARefuser'],$trajet->getidTrajet());
		}
		if(isset($_GET['idUserARetirer'])) {
			User::retirer($_GET['idUserARetirer'],$trajet->getidTrajet());
		}

		include("../vue/vueGestionTrajet.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");
?>