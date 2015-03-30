<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	$pseudo = $_POST['pseudo'];
	$password = sha1($_POST['password']);
	$user = User::exist($pseudo, $password);
	if ($user == True){
		$_SESSION['user']=$pseudo;
	}
	header("Location:./controlIndex.php");
	include("./footer.php");

?>