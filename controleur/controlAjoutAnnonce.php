<?php
	include("./header.php");
	include("./menu.php");
	$pseudo = $_SESSION['user'];
	$req = $mysqli->query("SELECT * FROM user WHERE pseudo = '$pseudo'") or die("ERROR");
	$tuple = $req->fetch_array();
	$reqVille = $mysqli->query("SELECT * FROM escale") or die("ERROR");
	$tableauVille = new Array();
	$i = 0;
	while($tupleville = $reqVille->fetch_array()){
		$tableauVille['$i'] = $tupleville['nomVille'];
		$i++;
	}
	include("../vue/vueAjoutAnnonce.php");
	include("./footer.php");
?>