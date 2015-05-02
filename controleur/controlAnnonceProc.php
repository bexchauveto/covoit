<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/trajet.php");

	if(isset($_SESSION['user'])){
		$idUser = htmlspecialchars($_POST['idUser']);
		$typeTrajet = htmlspecialchars($_POST['typetrajet']);
		if($typeTrajet == 1 || $typeTrajet == 2 || $typeTrajet == 6 || $typeTrajet == 7 || $typeTrajet == 8 || $typeTrajet ==9){
			$villeDep = mb_strtolower(addslashes(htmlspecialchars($_POST["villeDep"])));
			$villeArr = mb_strtolower(addslashes(htmlspecialchars($_POST["villeArr"])));
			$prix = htmlspecialchars($_POST['prix']);
			$nbpers = htmlspecialchars($_POST['nbpersonnes']);
			$duree = htmlspecialchars($_POST['duree']);
			$description = htmlspecialchars(addslashes($_POST['description']));
			$date = htmlspecialchars($_POST['date']);
			$tabdat = explode("/", $date);
			$newdate = $tabdat[2]."-".$tabdat[1]."-".$tabdat[0];
			$heure = htmlspecialchars($_POST['heure']);
			$nbEscale = htmlspecialchars($_POST['nbEscale']);
			if($nbEscale != 0) {
				$i = 1;
				while ($i < $nbEscale+1){
					$str = "arret".$i;
					$escaletab[$i] = mb_strtolower(addslashes(htmlspecialchars($_POST[$str])));
					$i++;
				}
			}
			else {
				$escaletab = null;
			}
			if(isset($_POST['flag'])) {
				$flag = $_POST['flag'];
			}
			else {
				$flag = null;
			}
			$lienGoogle = "lol";
			$createAnnonce = Trajet::createTrajet($typeTrajet, $villeDep, $villeArr, $prix, $nbpers, $duree, $description, $newdate, $heure, $escaletab, $flag, $idUser, $lienGoogle);
		}
		else {
			$lieuDep = mb_strtolower(addslashes(htmlspecialchars($_POST["lieuDep"])));
			$lieuArr = mb_strtolower(addslashes(htmlspecialchars($_POST["lieuArr"])));
			$nbpers = htmlspecialchars($_POST['nbpersonnes']);
			$description = mb_strtolower(addslashes(htmlspecialchars($_POST['description'])));
			$date = htmlspecialchars($_POST['date']);
			$tabdat = explode("/", $date);
			$newdate = $tabdat[2]."-".$tabdat[1]."-".$tabdat[0];
			$heure = htmlspecialchars($_POST['heure']);
			$nbEscale = htmlspecialchars($_POST['nbLieu']);
			if($nbEscale != 0) {
				$i = 1;
				while ($i < $nbEscale+1){
					$str = "arret".$i;
					$escaletab[$i] = mb_strtolower(addslashes(htmlspecialchars($_POST[$str])));
					//echo ($escaletab[$i]);
					$i++;
				}
			}
			else {
				$escaletab = null;
			}
			if(isset($_POST['flag'])) {
				$flag = $_POST['flag'];
			}
			else {
				$flag = null;
			}
			$lienGoogle = "lol";
			$createAnnonce = Trajet::createTrajet($typeTrajet, $lieuDep, $lieuArr, 0, $nbpers, 0, $description, $newdate, $heure, $escaletab, $flag, $idUser, $lienGoogle);
		}
		if($createAnnonce != null) {
			include("../vue/vueAnnoncePoste.php");
		}
		else {
			include("..vue/vueAnnoncePosteError.php");
		}
		header("refresh: 3;url=./controlIndex.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");
?>