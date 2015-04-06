<?php
	include("./header.php");
	include("./menu.php");
	$pseudo = $_SESSION['user'];
	$req = $mysqli->query("SELECT * FROM user WHERE pseudo = '$pseudo'") or die("ERROR");
	$tuple = $req->fetch_array();
	include("../vue/vueAjoutAnnonce.php");
	include("./footer.php");
?>