<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	$selsha1 = "coucou,ceciestleseldusha1lolololololololololookkk51";
	$pseudo = $_POST['pseudo'];
	$req = $mysqli->query("SELECT * FROM user WHERE pseudo='$pseudo'");
	$tuple = $req->fetch_array();
	if($tuple == null){
		$pwd = sha1($_POST['password'].$selsha1);
		$mail = $_POST['email'];
		$create = user::createUser($pseudo, $mail, $pwd);
		if($create){
			// Connexion automatique à l'inscription
			$user = User::exist($pseudo, $pwd);
			if ($user == True){
				$_SESSION['user']=$pseudo;
			}

			include("../vue/vueInscriptOK.php");
			header("refresh: 5;url=./controlProfil.php");
		}
		else {
			include("../vue/vueInscriptKO.php");
			header("refresh: 5;url=./controlIndex.php");
		}
	}
	else {
		include("../vue/vueInscriptKO.php");
		header("refresh: 5;url=./controlIndex.php");
	}
	include("./footer.php");
?>