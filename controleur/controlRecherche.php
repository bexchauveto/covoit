<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/trajet.php");
	//if(isset($_SESSION['user'])){
		$depart = $_POST['depart'];
		$arrivee = $_POST['arrivee'];
		$type = $_POST['typeTrajet'];
		$date = htmlspecialchars($_POST['date']);
		$tabdat = explode("/", $date);
		$newdate = "";
		if (count($tabdat) == 3) {
			$newdate = $tabdat[2]."-".$tabdat[1]."-".$tabdat[0];
		}
		$heure = $_POST['heure'];
		$tableauTrajet = Trajet::getTrajetsByTypeDepartArriveeDateHeure($type, $depart, $arrivee, $newdate, $heure);
		foreach ($tableauTrajet as $key => $trajet) {
			$idTrajet = $trajet['idTrajet'];
			$tableauEscale[$key] = Trajet::getAllEscaleByTrajet($idTrajet);
			$tableauNbPassager[$idTrajet] = Trajet::getPassagersNb($idTrajet);
			$tableauListeFlag[$key] = Trajet::getFlagsByIdTrajet($idTrajet);
		}
		$listeAllFlag = Trajet::getAllFlags();
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
	/*}
	else {
		header("Location:./controlIndex.php");
	}*/
	include("./footer.php");
?>