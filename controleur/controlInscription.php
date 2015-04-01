<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	$selsha1 = "coucou,ceciestleseldusha1lolololololololololookkk51";
	$pseudo = $_POST['pseudo'];
	$pwd = sha1($_POST['password'].$selsha1);
	$mail = $_POST['email'];
	$create = user::createUser($pseudo, $mail, $pwd);
	if($create){
		include("../vue/vueInscriptOK.php");
	}
	else {
		include("../vue/vueInscriptKO.php");
	}
	header("refresh: 0.5;url=./controlIndex.php");
	include("./footer.php");
?>