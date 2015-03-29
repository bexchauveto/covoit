<?php

	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	$typechange = $_POST['typechange'];
	switch ($typechange) {
		case '1':
			$pwd = sha1($_POST['newpass']);
			$idUser = $_POST['idUser'];
			$ret = User::modifyUserPWD($idUser,$pwd);
			break;
		case '2':
			$mail = $_POST['email'];
			$idUser = $_POST['idUser'];
			$ret = User::modifyUserEmail($idUser, $email);
			break;
	}
	if($ret == True) {
		include("../vue/vueModifUserSucc.php");
	}
	else {
		include("../vue/vueModifUserFail.php");
	}
	header("refresh: 0.5;url=./controlProfil.php");
	include("./footer.php");

?>