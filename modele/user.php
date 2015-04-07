<?php
include("../config.php");

class User {
	

	//List of the variables
	private $idUs;
	private $email;
	private $password;
	private $nickname;


	//functions
	public function __construct ($email, $password, $nickname){
		$this->idUs = null;
		$this->email = $email;
		$this->nickname = $nickname;
		$this->password = $password;

	}

	public function setID($id) {
		$this->idUs = $id;
	}

	public static function createUser($nickname, $email, $pwd){
		global $mysqli;
		$req = $mysqli->query("INSERT INTO user (password, mail, pseudo) VALUES('$pwd', '$email', '$nickname')") or die ($mysqli->error);
		return $req;
	}

	public static function exist ($nickname, $password){
		global $mysqli;
		$req = $mysqli->query("SELECT * FROM user WHERE pseudo = '$nickname' AND password = '$password'") or die ($mysqli->error);
		$tuple = $req->fetch_array();
		if ($tuple != null){
			return True;
		}
		else {
			return False;
		}
	}

	public static function deleteUser ($idUser) {
		global $mysqli;
		$req = $mysqli->query("DELETE FROM user WHERE id = '$idUser'") or die ("ERROR");
		return $req;
	}	

	public static function modifyUser ($idUser, $pwd, $email){
		global $mysqli;
		$req = $mysqli->query("SELECT * FROM user WHERE id = '$idUser'") or die ("ERROR");
		$tuple = $req->fetch_array();

		if($tuple['password'] != $pwd ){
			$res = $mysqli->query("UPDATE user SET password = '$pwd' WHERE id = '$idUser'") or die ("Error");
		}
		if($tuple['email'] != $email){
			$res = $mysqli->query("UPDATE user SET mail = '$email' WHERE id = '$idUser'") or die ("Error");

		}
		return new User ($idUser, $tuple['password'], $tuple['nickname'], $tuple['mail']);

	}

	public static function modifyUserPwd($idUser, $pwd) {
		global $mysqli;
		$req = $mysqli->query("UPDATE user SET password = '$pwd' WHERE id = '$idUser'") or die ("Error");
		return $req;
	}

	public static function modifyUserEmail($idUser, $email) {
		global $mysqli;
		$req = $mysqli->query("UPDATE user SET mail = '$email' WHERE id = '$idUser'") or die ("Error");
		return $req;
	}

	public static function getUserByID($idUser){
		global $mysqli;
		$req = $mysqli->query("SELECT id, pseudo FROM user WHERE id ='$idUser'") or die ("ERROR");
		$tuple = $req->fetch_array();
		return $tuple;
	}

	public static function getIdUserByNick($nickname){
		global $mysqli;
		$req = $mysqli->query("SELECT id FROM user WHERE pseudo ='$nickname'") or die ("ERROR");
		$tuple = $req->fetch_array();
		return $tuple['id'];
	}

	public static function getUserByNick($nickname) {
		global $mysqli;
		$req = $mysqli->query("SELECT * FROM user WHERE pseudo ='$nickname'") or die ("ERROR");
		$tuple = $req->fetch_array();
		return new User($tuple['mail'], $tuple['password'], $tuple['pseudo']);
	}

	public function getNick() {
		return $this->nickname;
	}

	public function getID() {
		return $this->idUs;
	}

	public function getMail() {
		return $this->email;
	}

	public function getPwd() {
		return $this->password;
	}

	public static function getAllUser() {
		global $mysqli;
		$req = $mysqli->query("SELECT pseudo FROM user") or die ("ERROR");
		$i = 0;
		while($tuplePseudo = $req->fetch_array()){
			$tableauPseudo[$i] = $tuplePseudo['pseudo'];
			$i++;
		}
		return $tableauPseudo;
	}

	public static function accepter($iduser, $idtrajet) {
		global $mysqli;
		$req = $mysqli->query("UPDATE usertrajetpassager SET accepted = '1' WHERE idUser = '$iduser' AND idTrajet = '$idtrajet'") or die ("ERROR");
		return $req;
	}

	public static function refuser($iduser, $idtrajet) {
		global $mysqli;
		$req = $mysqli->query("DELETE FROM usertrajetpassager WHERE idUser = '$iduser' AND idTrajet = '$idtrajet' AND accepted = '0'") or die ("ERROR");
		return $req;
	}

	public static function retirer($iduser, $idtrajet) {
		global $mysqli;
		$req = $mysqli->query("UPDATE usertrajetpassager SET accepted = '0' WHERE idUser = '$iduser' AND idTrajet = '$idtrajet'") or die ("ERROR");
		return $req;
	}

	public static function annuler($iduser, $idtrajet) {
		global $mysqli;
		$req = $mysqli->query("DELETE FROM usertrajetpassager WHERE idUser = '$iduser' AND idTrajet = '$idtrajet'") or die ("ERROR");
		return $req;
	}

}
?>