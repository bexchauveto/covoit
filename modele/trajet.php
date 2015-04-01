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


	public function __construct ($typeTrajet, $villeDepart, $villeArrivee, $prix, $description, $date, $heure){
		$this->typeTrajet = $typeTrajet;
		$this->villeDepart = $villeDepart;
		$this->villeArrivee = $villeArrivee;
		$this->prix = $prix;
		$this->description = $description;
		$this->date = $date;
		$this->heure = $heure;
		$this->idTrajet = null;
	}

	public function createTrajet($typeTrajet, $villeDepart, $villeArrivee, $prix, $description, $date, $heure, $tabescale, $tabflag, $idUser, $lienGoogle){
		global $mysqli;
		$req = $mysqli->query("INSERT INTO trajet ('typeTrajet', 'villedep','villearr', 'prix', 'description', 'dateTrajet', 'heure') VALUES ('$typeTrajet','$villeDepart', '$villeArrivee', '$prix','$description','$date','$heure')") or die("ERROR");
		$req = $mysqli->query("SELECT id FROM trajet WHERE typeTrajet='$typeTrajet' AND villeDepart='$villeDepart' AND dateTrajet='$date' AND heure='$heure'") or die ("ERROR");
		$tupleTrajet = $req->fetche_array();
		$idTrajet = $tupleTrajet['id'];
		$req = $mysqli->query("INSERT INTO userTrajetCreator ('idUser','idTrajet') VALUES ('$idUser','$idTrajet')");
		foreach ($tabescale as $key => $value) {
			$req = $mysqli->query("SELECT id FROM trajetEscale WHERE ville='$value'") or die ("ERROR");
			$tuple = $req->fetch_array();
			if($tuple == null){
				$req = $mysqli->query("INSERT INTO escale('ville') VALUES('$value')") or die ("ERROR");
				$req = $mysqli->query("INSERT INTO trajetEscale('idTrajet','idVille','ordre') VALUES ('$idTrajet','$value', '$key')") or die ("ERROR");
			}
			else {
				$req = $mysqli->query("INSERT INTO trajetEscale('idTrajet','idVille','ordre') VALUES ('$idTrajet','$value', '$key')") or die ("ERROR");
			}
		}
		foreach ($tabflag as $key => $value) {
			$req = $mysqli->query("INSERT INTO trajetFlags ('idTrajet','idFlag') VALUES ('$idTrajet','$value')") or die ("ERROR");
		}
		$req = $mysqli->query("INSERT INTO trajetGoogle ('idTrajet', 'lienGoogle') VALUES ('$idTrajet','$lienGoogle')") or die ("ERROR");
		return $req;
	}

	public function modifyTrajet($idTrajet, $typeTrajet, $villeDepart, $villeArrivee, $prix, $description, $date, $heure, $tabescale, $tabflag, $idUser, $lienGoogle){
		global $mysqli;
		$req = $mysqli->query("SELECT * FROM trajet WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$tupleTrajet =  $req->fetche_array();
	}

	public function deleteTrajet($idTrajet){
		global $mysqli;
		$req = $mysqli->query("DELETE FROM trajet WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM userTrajetCreator WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM trajetEscale WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM trajetFlags WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM trajetGoogle WHERE idTrajet='$idTrajet'") or die ("ERROR");
		$req = $mysqli->query("DELETE FROM userTrajetPassager WHERE idTrajet='$idTrajet'") or die("ERROR");
		return $req;
	}

	public function sucribeTrajet($idTrajet, $pseudo) {
		global $mysqli;
		$boolfalse = False;
		$req = $mysqli->query("INSERT INTO userTrajetPassager ('idTrajet','pseudo','accepted') VALUES ('$idTrajet','$pseudo','$boolfalse')") or die("ERROR");
		return $req;
	}

	public function accepteSub($idTrajet, $pseudo) {
		global $mysqli;
		$booltrue = True;
		$req = $mysqli->query("UPDATE userTrajetPassager SET accepted='$booltrue' WHERE idTrajet='$idTrajet' AND pseudo='$pseudo'") or die("ERROR");
		return $req;
	}

	public function postMessage($idTrajet,$pseudo, $message, $date, $heure){
		global $mysqli;
		$req = $mysqli->query("INSERT INTO message ('auteur','message','datePost','heurePost') VALUES ('$pseudo','$message','$date','$heure')") or die("ERROR");
		$req = $mysqli->query("SELECT idMessage FROM message WHERE auteur='$pseudo' AND datePost='$date' AND heurePost='$heure' ") or die("ERROR");
		$tuple = $req->fetch_array();
		$idMessage = $tuple['idMessage'];
		$req = $mysqli->query("INSERT INTO trajetMessage ('idTrajet','idMessage') VALUES ('$idTrajet','$idMessage') ") or die("ERROR");
		return $req;
	}

}

?>