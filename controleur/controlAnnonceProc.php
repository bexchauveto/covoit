<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/trajet.php");
	if(isset($_SESSION['user'])){
		$idUser = htmlspecialchars($_POST['idUser']);
		$typeTrajet = htmlspecialchars($_POST['typetrajet']);
		if($typeTrajet == 1 || $typeTrajet == 2 || $typeTrajet == 6 || $typeTrajet == 7 || $typeTrajet == 8 || $typeTrajet ==9){
			$villeDep = htmlspecialchars(addslashes(strtolower($_POST['villeDep'])));
			$villeArr = htmlspecialchars(addslashes(strtolower($_POST['villeArr'])));
			$prix = htmlspecialchars($_POST['prix']);
			$nbpers = htmlspecialchars($_POST['nbpersonnes']);
			$duree = htmlspecialchars($_POST['duree']);
			$description = htmlspecialchars(addslashes($_POST['description']));
			$date = htmlspecialchars($_POST['date']);
			$heure = htmlspecialchars($_POST['heure']);
			$nbEscale = htmlspecialchars($_POST['nbEscale']);
			if($nbEscale != 0) {
				$i = 1;
				while ($i < $nbEscale+1){
					$str = "arret".$i;
					$escaletab[$i] = htmlspecialchars(addslashes(strtolower($_POST[$str])));
					$i++;
				}
			}
			else {
				$escaletab = null;
			}
			$flag = $_POST['flag'];
			$lienGoogle = "lol";
			$createAnnonce = Trajet::createTrajet($typeTrajet, $villeDep, $villeArr, $prix, $nbpers, $duree, $description, $date, $heure, $escaletab, $flag, $idUser, $lienGoogle);
		}
		else {
			$lieuDep = htmlspecialchars(addslashes(strtolower($_POST['lieuDep'])));
			$lieuArr = htmlspecialchars(addslashes(strtolower($_POST['lieuArr'])));
			$nbpers = htmlspecialchars($_POST['nbpersonnes']);
			$description = htmlspecialchars(addslashes(strtolower($_POST['description'])));
			$date = htmlspecialchars($_POST['date']);
			$heure = htmlspecialchars($_POST['heure']);
			$nbEscale = htmlspecialchars($_POST['nbEscale']);
			if($nbEscale != 0) {
				$i = 1;
				while ($i < $nbEscale+1){
					$str = "arret".$i;
					$escaletab[$i] = htmlspecialchars(addslashes(strtolower($_POST[$str])));
					$i++;
				}
			}
			else {
				$escaletab = null;
			}
			$flag = $_POST['flag'];
			$lienGoogle = "lol";
			echo ($idUser);
			$createAnnonce = Trajet::createTrajet($typeTrajet, $lieuDep, $lieuArr, 0, $nbpers, 0, $description, $date, $heure, $escaletab, $flag, $idUser, $lienGoogle);
		}
		if($createAnnonce != null) {
			include("../vue/vueAnnoncePoste.php");
		}
		else {
			include("..vue/vueAnnoncePosteError.php");
		}
		header("refresh: 0.5;url=./controlIndex.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");
?>