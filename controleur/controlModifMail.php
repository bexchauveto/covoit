<?php

	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	$pseudo = $_SESSION['user'];
	$req = $mysqli->query("SELECT * FROM user WHERE pseudo = '$pseudo'");
	$tuple = $req->fetch_array();
	include("../vue/vueModifuserMail.php");
	include("./footer.php");

?>