<?php
include("../config.php");


class Trajet {

	//List of the variables
	private $idTrajet;
	private $typeTrajet;
	private $villeDepart;
	private $villeArrivee;
	private $prix;
	private $description;
	private $date;
	private $heure;
	private $duree;


	public function __construct ($typeTrajet, $villeDepart, $villeArrivee, $prix, $description, $date, $heure, $duree){
		$this->typeTrajet = $typeTrajet;
		$this->villeDepart = $villeDepart;
		$this->villeArrivee = $villeArrivee;
		$this->prix = $prix;
		$this->description = $description;
		$this->date = $date;
		$this->heure = $heure;
		$this->duree = $duree;
		$this->idTrajet = null;
	}

	public static function createTrajet($typeTrajet, $villeDepart, $villeArrivee, $prix, $nbpers, $duree, $description, $date, $heure, $tabescale, $tabflag, $idUser, $lienGoogle){
		global $mysqli;
		$req = $mysqli->query("SELECT * FROM trajet") or die("ERROR0");
		$req = $mysqli->query("INSERT INTO trajet (typeTrajet, villedep, villearr, prix, nbpers, duree, description, dateTrajet, heure) VALUES ('$typeTrajet','$villeDepart', '$villeArrivee', '$prix', '$nbpers','$duree','$description','$date','$heure')") or die($mysqli->error);
		$req = $mysqli->query("SELECT idTrajet FROM trajet WHERE typeTrajet='$typeTrajet' AND villedep='$villeDepart' AND dateTrajet='$date' AND heure='$heure'") or die ("ERROR2");
		$tupleTrajet = $req->fetch_array();
		$idTrajet = $tupleTrajet['idTrajet'];
		$req = $mysqli->query("SELECT * FROM escale WHERE ville = '$villeDepart'") or die("ERROR2.5");
		$tuplevilleDep = $req->fetch_array();
		if($tuplevilleDep == null){
			$req = $mysqli->query("INSERT INTO escale (ville) VALUES ('$villeDepart')") or die ("ERROR2.5.2");
		}
		$req = $mysqli->query("SELECT * FROM escale WHERE ville = '$villeArrivee'") or die("ERROR2.5.3");
		$tuplevilleArr = $req->fetch_array();
		if($tuplevilleArr == null){
			$req = $mysqli->query("INSERT INTO escale (ville) VALUES ('$villeArrivee')") or die ("ERROR2.5.4");
		}
		$req = $mysqli->query("INSERT INTO userTrajetCreator (idUser,idTrajet) VALUES ('$idUser','$idTrajet')") or die ("ERROR3");
		if($typeTrajet == 1 || $typeTrajet == 2 || $typeTrajet == 6 || $typeTrajet == 7 || $typeTrajet == 8 || $typeTrajet == 9){
			foreach ($tabescale as $key => $value) {
				$req = $mysqli->query("SELECT idVille FROM escale WHERE ville='$value'") or die ("ERROR4");
				$tuple = $req->fetch_array();
				if($tuple == null){
					$req = $mysqli->query("INSERT INTO escale (ville) VALUES ('$value')") or die ("ERROR5");
					$req = $mysqli->query("SELECT * FROM escale WHERE ville='$value'") or die("ERROR6");
					$tupleNewVille = $req->fetch_array();
					$idVille=$tupleNewVille['idVille'];
					$req = $mysqli->query("INSERT INTO trajetEscale(idTrajet,idVille,ordre) VALUES ('$idTrajet','$idVille', '$key')") or die ("ERROR7");
				}
				else {
					$req = $mysqli->query("INSERT INTO trajetEscale(idTrajet,idVille,ordre) VALUES ('$idTrajet','$value', '$key')") or die ("ERROR8");
				}
			}
		}
		else {
			foreach ($tabescale as $key => $value) {
				$req = $mysqli->query("SELECT id FROM trajetLieu WHERE lieu='$value'") or die ("ERROR9");
				$tuple = $req->fetch_array();
				if($tuple == null){
					$req = $mysqli->query("INSERT INTO lieu (lieu) VALUES ('$value')") or die ("ERROR10");
					$req = $mysqli->query("SELECT * FROM lieu WHERE lieu='$value'") or die("ERROR11");
					$tupleNewLieu = $req->fetch_array();
					$idLieu=$tupleNewLieu['idLieu'];
					$req = $mysqli->query("INSERT INTO trajetLieu(idTrajet,idLieu,ordre) VALUES ('$idTrajet','$idLieu', '$key')") or die ("ERROR12");
				}
				else {
					$req = $mysqli->query("INSERT INTO trajetEscale(idTrajet,idLieu,ordre) VALUES ('$idTrajet','$value', '$key')") or die ("ERROR13");
				}
			}
		}
		foreach ($tabflag as $key => $value) {
			$req = $mysqli->query("INSERT INTO trajetFlag (idTrajet,idFlag) VALUES ('$idTrajet','$value')") or die ("ERROR14");
		}
		$req = $mysqli->query("INSERT INTO usertrajetGoogle (idTrajet, lienGoogle) VALUES ('$idTrajet','$lienGoogle')") or die ("ERROR15");
		return $req;
	}

	public static function modifyTrajet($idTrajet, $typeTrajet, $villeDepart, $villeArrivee, $prix, $duree, $description, $date, $heure, $tabescale, $tabflag, $lienGoogle){
		global $mysqli;
		$req = $mysqli->query("SELECT * FROM trajet WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$tupleTrajet =  $req->fetche_array();
		if($tupleTrajet['typeTrajet'] != $typeTrajet){
			$req = $mysqli->query("UPDATE trajet SET typeTrajet='$typeTrajet' WHERE idTrajet = '$idTrajet'") or die("ERROR");
		}
		if($tupleTrajet['typeTrajet'] != $typeTrajet){
			$req = $mysqli->query("UPDATE trajet SET typeTrajet='$typeTrajet' WHERE idTrajet = '$idTrajet'") or die("ERROR");
		}
		if($tupleTrajet['villedep'] != $villeDepart){
			$req = $mysqli->query("UPDATE trajet SET villede='$villeDepart' WHERE idTrajet = '$idTrajet'") or die("ERROR");
		}
		if($tupleTrajet['villearr'] != $villeArrivee){
			$req = $mysqli->query("UPDATE trajet SET villearr='$villeArrivee' WHERE idTrajet = '$idTrajet'") or die("ERROR");
		}
		if($tupleTrajet['prix'] != $prix){
			$req = $mysqli->query("UPDATE trajet SET prix='$prix' WHERE idTrajet = '$idTrajet'") or die("ERROR");
		}
		if($tupleTrajet['duree'] != $duree){
			$req = $mysqli->query("UPDATE trajet SET duree='$duree' WHERE idTrajet = '$idTrajet'") or die("ERROR");
		}
		if($tupleTrajet['description'] != $description){
			$req = $mysqli->query("UPDATE trajet SET description='$description' WHERE idTrajet = '$idTrajet'") or die("ERROR");
		}
		if($tupleTrajet['dateTrajet'] != $date){
			$req = $mysqli->query("UPDATE trajet SET dateTrajet='$date' WHERE idTrajet = '$idTrajet'") or die("ERROR");
		}
		if($tupleTrajet['heure'] != $heure){
			$req = $mysqli->query("UPDATE trajet SET heure='$heure' WHERE idTrajet = '$idTrajet'") or die("ERROR");
		}
		$req = $mysqli->query("DELETE FROM trajetEscale WHERE idTrajet='$idTrajet'") or die("ERROR");
		foreach ($tabescale as $key => $value) {
			$req = $mysqli->query("SELECT id FROM trajetEscale WHERE ville='$value'") or die ("ERROR");
			$tuple = $req->fetch_array();
			if($tuple == null){
				$req = $mysqli->query("INSERT INTO escale (ville) VALUES('$value')") or die ("ERROR");
				$req = $mysqli->query("SELECT * FROM escale WHERE ville='$value'") or die("ERROR");
				$tupleNewVille = $req->fetch_array();
				$nomVille=$tupleNewVille['ville'];
				$req = $mysqli->query("INSERT INTO trajetEscale(idTrajet,idVille,ordre) VALUES ('$idTrajet','$nomVille', '$key')") or die ("ERROR");
			}
			else {
				$req = $mysqli->query("INSERT INTO trajetEscale(idTrajet,idVille,ordre) VALUES ('$idTrajet','$value', '$key')") or die ("ERROR");
			}
		}
		$req = $mysqli->query("DELETE FROM trajetFlag WHERE idTrajet='$idTrajet'") or die("ERROR");
		foreach ($tabflag as $key => $value) {
			$req = $mysqli->query("INSERT INTO trajetFlag (idTrajet,idFlag) VALUES ('$idTrajet','$value')") or die ("ERROR");
		}
		$req = $mysqli->query("INSERT INTO usertrajetGoogle (idTrajet, lienGoogle) VALUES ('$idTrajet','$lienGoogle')") or die ("ERROR");
		return $req;
	}

	public static function deleteTrajet($idTrajet){
		global $mysqli;
		$req = $mysqli->query("DELETE FROM trajet WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM userTrajetCreator WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM trajetEscale WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM trajetFlags WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM trajetGoogle WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM userTrajetPassager WHERE idTrajet='$idTrajet'") or die("ERROR");
		return $req;
	}

	public static function sucribeTrajet($idTrajet, $pseudo) {
		global $mysqli;
		$boolfalse = 0;
		$req = $mysqli->query("INSERT INTO userTrajetPassager (idTrajet,pseudo,accepted) VALUES ('$idTrajet','$pseudo','$boolfalse')") or die("ERROR");
		return $req;
	}

	public static function accepteSub($idTrajet, $pseudo) {
		global $mysqli;
		$booltrue = 1;
		$req = $mysqli->query("UPDATE userTrajetPassager SET accepted='$booltrue' WHERE idTrajet='$idTrajet' AND pseudo='$pseudo'") or die("ERROR");
		return $req;
	}

	public static function postMessage($idTrajet,$pseudo, $message, $date, $heure){
		global $mysqli;
		$req = $mysqli->query("INSERT INTO message (auteur,message,datePost,heurePost) VALUES ('$pseudo','$message','$date','$heure')") or die("ERROR");
		$req = $mysqli->query("SELECT idMessage FROM message WHERE auteur='$pseudo' AND datePost='$date' AND heurePost='$heure' ") or die("ERROR");
		$tuple = $req->fetch_array();
		$idMessage = $tuple['idMessage'];
		$req = $mysqli->query("INSERT INTO trajetMessage (idTrajet,idMessage) VALUES ('$idTrajet','$idMessage') ") or die("ERROR");
		return $req;
	}

	public static function getAllEscale() {
		global $mysqli;
		$reqVille = $mysqli->query("SELECT * FROM escale") or die("ERROR");
		$i = 0;
		while($tupleville = $reqVille->fetch_array()){
			$tableauVille[$i] = $tupleville;
			$i++;
		}
		if($i == 0) {
			return null;
		}
		else {
			return $tableauVille;
		}
	}

	public static function getVilleByName($name){
		global $mysqli;
		$reqVille = $mysqli->query("SELECT * FROM escale WHERE ville LIKE '$name'") or die("ERROR");
		$i = 0;
		while($tupleville = $reqVille->fetch_array()){
			$tableauVille[$i] = ucfirst($tupleville['ville']);
			$i++;
		}
		if($i == 0) {
			return null;
		}
		else {
			return $tableauVille;
		}
	}

	public static function getAllLieu() {
		global $mysqli;
		$reqLieu = $mysqli->query("SELECT * FROM lieu") or die("ERROR");
		$i = 0;
		while($tuplelieu = $reqLieu->fetch_array()){
			$tableauLieu[$i] = ucfirst($tuplelieu['lieu']);
			$i++;
		}
		if($i == 0) {
			return null;
		}
		else {
			return $tableauLieu;
		}
	}

	public static function getLieuByName($name){
		global $mysqli;
		$reqLieu = $mysqli->query("SELECT * FROM lieu WHERE lieu LIKE '$name'") or die("ERROR");
		while($tuplelieu = $reqLieu->fetch_array()){
			$tableauLieu[$i] = ucfirst($tuplelieu['lieu']);
			$i++;
		}
		if($i == 0) {
			return null;
		}
		else {
			return $tableauLieu;
		}
	}

	public static function getTrajetByUser($idUser){
		global $mysqli;
		$req = $mysqli->query("SELECT idTrajet FROM userTrajetCreator WHERE idUser = '$idUser'") or die("ERROR");
		$i=0;
		while ($tuple = $req->fetch_array()) {
			$idTrajet = $tuple['idTrajet'];
			$req2 = $mysqli->query("SELECT * FROM trajet WHERE idTrajet = '$idTrajet' ORDER BY dateTrajet ASC") or die("ERROR");
			$j = 0;
			while ($tupleTrajet = $req2->fetch_array()) {
				$listeTrajet[$j] = $tupleTrajet;
				$j++;
			}
			$i++;
		}
		return $listeTrajet;
	}

	public static function getTrajetByType($typeTrajet){
		global $mysqli;
		$req = $mysqli->query("SELECT * FROM trajet WHERE typeTrajet = '$typeTrajet' ORDER BY dateTrajet ASC") or die ("ERROR");
		$i = 0;
		while($tuple = $req->fetch_array()){
			$listeTrajet[$i]=$tuple;
			$i++;
		}
		return $listeTrajet;
	}

	public static function getTrajetByTypeAndVille($typeTrajet, $ville){
		global $mysqli;
		if($typeTrajet == 1){
			$req = $mysqli->query("SELECT * FROM trajet WHERE typeTrajet = '$typeTrajet' AND villearr='$ville'") or die ("ERROR");
			$i = 0;
			while($tuple = $req->fetch_array()){
				$listeTrajet[$i]=$tuple;
				$i++;
			}
		}
		else {
			$req = $mysqli->query("SELECT * FROM trajet WHERE typeTrajet = '$typeTrajet' AND villedep='$ville'") or die ("ERROR");
			$i = 0;
			while($tuple = $req->fetch_array()){
				$listeTrajet[$i]=$tuple;
				$i++;
			}
		}
		return $listeTrajet;
	}

	public static function getAllEscaleByTrajet($idTrajet){
		global $mysqli;
		$req = $mysqli->query("SELECT * FROM trajetEscale WHERE idTrajet='$idTrajet' ORDER BY ordre ASC") or die("ERROR");
		$i = 0;
		while ($tuple = $req->fetch_array()){
			$listeEscale[$i] = $tuple;
			$i++;
		}
		if($i == 0){
			return null;
		}
		else {
			return $listeEscale;
		}
	}

	public static function getPassagersNb($idTrajet){
		global $mysqli;
		$req = $mysqli->query("SELECT * FROM userTrajetPassager WHERE idTrajet = '$idTrajet'") or die ("ERROR");
		$i=0;
		while($tuple = $req->fetch_array()){
			$i++;
		}
		return $i;
	}

}

?>