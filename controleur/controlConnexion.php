<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	$selsha1 = "coucou,ceciestleseldusha1lolololololololololookkk51";
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$password = sha1($_POST['password'].$selsha1);
	$user = User::exist($pseudo, $password);
	if ($user == True){
		$_SESSION['user']=$pseudo;
	}
	header("Location:./controlIndex.php");
	include("./footer.php");

?>