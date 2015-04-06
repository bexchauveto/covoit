<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/trajet.php");
	if(isset($_SESSION['user'])){
		$tableauTrajet = Trajet::getTrajetByType(1);
		foreach ($tableauTrajet as $key => $trajet) {
			$idTrajet = $trajet['idTrajet'];
			$tableauEscale[$key] = Trajet::getAllEscaleByTrajet($idTrajet);
			$tableauNbPassager[$idTrajet] = Trajet::getPassagersNb($idTrajet);
		}
		$ListeEscale = Trajet::getAllEscale();
		include("../vue/vueAllTrajetLongArrINSA.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");
?>