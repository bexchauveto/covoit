<?php
	include("./header.php");
	include("./menu.php");
	if(isset($_SESSION['user'])){
		$idTrajet = $_GET['idTrajet'];
		include("../vue/vueTrajet.php");
	}
	else {
		header("Location:./controlIndex.php");
	}
	include("./footer.php");

?>