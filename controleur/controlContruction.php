<?php
	include("./header.php");
	$_SESSION['page'] = "";
	include("./menu.php");
	//if(isset($_SESSION['user'])){
		include("../vue/vueConstruction.php");
	/*}
	else {
		header("Location:./controlIndex.php");
	}*/
	include("./footer.php");
?>