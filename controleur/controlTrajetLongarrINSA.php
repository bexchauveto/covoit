<?php
	include("./header.php");
	$_SESSION['page'] = "trajetsLongs";
	include("./menu.php");
	include("../modele/trajet.php");
	//if(isset($_SESSION['user'])){
		$tableauTrajet = Trajet::getTrajetByType(1);
		foreach ($tableauTrajet as $key => $trajet) {
			$idTrajet = $trajet['idTrajet'];
			$tableauEscale[$key] = Trajet::getAllEscaleByTrajet($idTrajet);
			$tableauNbPassager[$idTrajet] = Trajet::getPassagersNb($idTrajet);
			$tableauListeFlag[$key] = Trajet::getFlagsByIdTrajet($idTrajet);
		}
		$listeAllFlag = Trajet::getAllFlags();
		$type = 1; //Afin dans les recherches de savoir dans quel type on est
		$ListeEscale = Trajet::getAllEscale();
		include("../vue/vueAllTrajetLongArrINSA.php");
	/*}
	else {
		header("Location:./controlIndex.php");
	}*/
	include("./footer.php");
?>