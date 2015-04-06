<?php
	include("./header.php");
	$_SESSION['page'] = "ajoutAnnonce";
	include("./menu.php");
	if(isset($_SESSION['user'])){
		$pseudo = $_SESSION['user'];
		$req = $mysqli->query("SELECT * FROM user WHERE pseudo = '$pseudo'") or die("ERROR");
		$tuple = $req->fetch_array();
		include("../vue/vueAjoutAnnonce.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");
?>