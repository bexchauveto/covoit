<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/trajet.php");
	$tableauTrajet = Trajet::getTrajetByType(2);
	foreach ($tableauTrajet as $key => $trajet) {
		$idTrajet = $trajet['idTrajet'];
		$tableauEscale[$key] = Trajet::getAllEscaleByTrajet($idTrajet);
		$tableauNbPassager[$idTrajet] = Trajet::getPassagersNb($idTrajet);
	}
	$ListeEscale = Trajet::getAllEscale();
	include("../vue/vueAllTrajetLongDepINSA.php");
	include("./footer.php");
?>