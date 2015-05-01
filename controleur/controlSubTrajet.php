<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/trajet.php");
	include("../modele/user.php");
	if(isset($_SESSION['user'])){
		$idUser = $_POST['idUser'];
		$idTrajet = $_POST['idTrajet'];
		$subTrajet = Trajet::subscribeTrajet($idTrajet, $idUser);
		if($subTrajet != null){
			include("../vue/vueSubTrajetSucc.php");
		}
		else {
			include("../vue/vueSubTrajetFail.php");
		}
	}
	else {
		header("Location:./controlErreurDroitAffichage.php");
	}
	include("./footer.php");

?>