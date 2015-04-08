<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/trajet.php");
	if(isset($_SESSION['user'])){
		$depart = $_POST['depart'];
		$arrivee = $_POST['arrivee'];
		if (isset($_POST['non-fumeur'])) {
			$nonfumeur = $_POST['non-fumeur'];
		}
		else $nonfumeur = null;
		if (isset($_POST['bagages'])) {
			$bagages = $_POST['bagages'];
		}
		else $bagages = null;
		$type = $_POST['typeTrajet'];
		$tableauTrajet = Trajet::getTrajetsByTypeDepartArriveeNonfumeurBagages($type, $depart, $arrivee, $nonfumeur, $bagages);
		foreach ($tableauTrajet as $key => $trajet) {
			$idTrajet = $trajet['idTrajet'];
			$tableauEscale[$key] = Trajet::getAllEscaleByTrajet($idTrajet);
			$tableauNbPassager[$idTrajet] = Trajet::getPassagersNb($idTrajet);
		}
		//$type = 2; //Afin dans les recherches de savoir dans quel type on est
		$ListeEscale = Trajet::getAllEscale();
		//include("../vue/vueAllTrajetLongDepINSA.php");
		switch ($type) {
			case '1':
				include("../vue/vueAllTrajetLongArrINSA.php");
				break;

			case '2':
				include("../vue/vueAllTrajetLongDepINSA.php");
				break;
		}
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");
?>