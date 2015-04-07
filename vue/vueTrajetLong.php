<div id="trajet">
	<fieldset>
		<legend>Trajet de <?php echo ucfirst($trajet['villedep'])." à ".ucfirst($trajet['villearr']);?></legend>

<?php
	echo "<div id='villes'>";
	echo "<p>";
	echo ucfirst($trajet['villedep'])." <img class='fleche' src='../images/fleche.png'> ";
	if ($tableauEscale != null) {
		foreach ($tableauEscale as $escale) {
			foreach ($ListeEscale as $Ville) {
				if($escale['idVille'] == $Ville['idVille'] && $escale['idTrajet'] == $idTrajet){
					echo ucfirst($Ville['ville'])." <img class='fleche' src='../images/fleche.png'> ";
				}
			}
		}
	}
	echo ucfirst($trajet['villearr']);
	echo "</div>";

	echo "<p> Départ le ".$trajet['dateTrajet']." à ".$trajet['heure'].", ce trajet devrait durer ".$trajet['duree']." environ.</p>";
	echo "<p class='important'> Description du trajet : </p><p>".$trajet['description']."</p>";
	echo "<p class='important'>Information supplementaires sur le trajet :<p>";
	echo "<p><span class='important'>Prix :</span> ".$trajet['prix']/$trajet['nbpers']."€ par personne.</p>";
	echo "<p> <span class='important'>Conducteur du véhicule :</span> ".$userCreator['pseudo']."</p>";
	if ($listeFlag != null) {
		foreach ($listeFlag as $flag) {
			foreach ($listeAllFlag as $flags) {
				if($flag == $flags['idFlag']) {
					echo "<p><img width='50' height='50'class='flag' src='".$flags['lienImage']."'> ".$flags['titre']."</p>";
				}
			}
		}
	}
	$placeOK = $trajet['nbpers'] - $nbpassager;

	$etat = $objTrajet->getEtatByUser($thisUser);
	if($_SESSION['user'] != $userCreator['pseudo'] && $placeOK > 0) {
		if(isset($etat) && $etat != null) {
			echo "<div class=centre><img src='";
	 		if ($etat == 0) {
	 			echo "../images/warning.png' alt='En attente de validation du conducteur' title='En attente de validation du conducteur";
	 		}
	 		else if ($etat == 1) {
				echo "../images/check.png' alt='Le conducteur vous a accepté à bord title='Le conducteur vous a accepté à bord";
	 		}
	 		echo "' width='48' height='48'><p>Vous avez déjà demandé à participer à ce voyage.</div>";
			}
		else {
?>
	<form method="post" action="./controlSubTrajet.php">
		<input type="hidden" name="idUser" value="<?php echo $thisUser;?>">
		<input type="hidden" name="idTrajet" value="<?php echo $idTrajet;?>">
		<div class="submitdiv"><input type="submit" name="submit" class="submit" value="Faire une demande de transport"></div>
 	</form>
 	<?php }}
 	?>
	</fieldset>
</div>

