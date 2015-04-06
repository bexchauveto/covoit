<?php

	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	if(isset($_SESSION['user'])){
		$pseudo = $_SESSION['user'];
		$req = $mysqli->query("SELECT * FROM user WHERE pseudo = '$pseudo'");
		$tuple = $req->fetch_array();
		include("../vue/vueModifuserMail.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");

?>