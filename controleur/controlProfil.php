<?php
	include("./header.php");
	$_SESSION['page'] = "profil";
	include("./menu.php");
	include("../modele/user.php");
	include("../modele/trajet.php");
	if(isset($_SESSION['user'])){
		$pseudo = $_SESSION['user'];
		$idUser = User::getIdUserByNick($pseudo);
		if (isset($_GET['idTrajetASupprimer'])) {
			Trajet::deleteTrajet($_GET['idTrajetASupprimer']);
			echo ("Trajet supprimé avec succès");
		}
		if (isset($_GET['idTrajetAAnnuler'])) {
			User::annuler($idUser,$_GET['idTrajetAAnnuler']);
		}
		/*$reqTrajet = $mysqli->query("SELECT * FROM userTrajetCreator WHERE idUser = '$idUser'") or die ("ERROR");*/
		$user = User::getUserByNick($pseudo);
		$user->setID($idUser);
		include("../vue/vueProfil.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");

?>