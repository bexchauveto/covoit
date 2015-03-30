<?php
	include("./header.php");
	$_SESSION['page'] = "profil";
	include("./menu.php");
	include("../modele/user.php");
	$pseudo = $_SESSION['user'];
	$req = $mysqli->query("SELECT * FROM user WHERE pseudo = '$pseudo'");
	$tuple = $req->fetch_array();
	include("../vue/vueProfil.php");
	include("./footer.php");

?>