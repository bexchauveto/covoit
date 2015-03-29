<?php

	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	$profil = User::getUserbyNick($_SESSION['user']);
	include("../vue/vueProfil.php");
	include("./footer.php");

?>