<?php

	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	if(isset($_SESSION['user'])) {
		unset($_SESSION['user']);
	}
	header("Location:controlIndex.php");
	include("./footer.php");

?>