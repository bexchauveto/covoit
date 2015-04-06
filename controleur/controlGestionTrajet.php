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

		include("../vue/vueGestionTrajet.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");
?>