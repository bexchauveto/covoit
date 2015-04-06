<?php
	include("./header.php");
	$_SESSION['page'] = "profil";
	include("./menu.php");
	include("../modele/user.php");
	if(isset($_SESSION['user'])){
		$pseudo = $_SESSION['user'];
		$req = $mysqli->query("SELECT * FROM user WHERE pseudo = '$pseudo'");
		$tuple = $req->fetch_array();
		$idUser = $tuple['id'];
		$reqTrajet = $mysqli->query("SELECT * FROM userTrajetCreator WHERE idUser = '$idUser'") or die ("ERROR");
		include("../vue/vueProfil.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");

?>