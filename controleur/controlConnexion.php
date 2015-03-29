<?php
	include("./header.php");
	include("./menu.php");
	include("../modele/user.php");
	$pseudo = $_POST['pseudo'];
	$password = sha1($_POST['password']);
	$user = User::exist($pseudo, $password);
	if ($user == True){
		$_SESSION['user']=$pseudo;
	?>	<script>
		alert("Connexion réussi, vous serez redirigé sous peu.");
		</script>
	<?php
	}
	else {
	?>	<script>
		alert("Connexion échoué, veuillez réessayer.");
		</script>
	<?php
	}
	header("refresh: 0.5;url=./controlIndex.php");
	include("./footer.php");

?>