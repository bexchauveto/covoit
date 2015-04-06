<div id="trajet">
	<fieldset>
		<legend>Trajet de <?php echo ucfirst($trajet['villedep'])." à ".ucfirst($trajet['villearr']);?></legend>

<?php
	echo "<div id='villes'>";
	echo "<p>";
	echo ucfirst($trajet['villedep'])." <img class='fleche' src='../images/fleche.png'> ";
	foreach ($tableauEscale as $escale) {
		foreach ($ListeEscale as $Ville) {
			if($escale['idVille'] == $Ville['idVille'] && $escale['idTrajet'] == $idTrajet){
				echo ucfirst($Ville['ville'])." <img class='fleche' src='../images/fleche.png'> ";
			}
		}
	}
	echo ucfirst($trajet['villearr']);
	echo "</div>";

	echo "<p> Départ le ".$trajet['dateTrajet']." à ".$trajet['heure'].", ce trajet devrait durer ".$trajet['duree']." environ.</p>";
	echo "<p> Description du trajet : </p><p>".$trajet['description']."</p>";
	echo "<p>Information supplementaires sur le trajet :<p>";
	echo "<p>Prix : ".$trajet['prix']/$trajet['nbpers']."€ par personne.</p>";
	echo "<p> Conducteur du véhicule : ".$userCreator['pseudo']."</p>";
	foreach ($listeFlag as $flag) {
		foreach ($listeAllFlag as $flags) {
			if($flag == $flags['idFlag']) {
				echo "<p><img class='flag' src='".$flags['lienImage']."'> ".$flags['titre']."</p>";
			}
		}
	}
	$placeOK = $trajet['nbpers'] - $nbpassager;
	if($_SESSION['user'] != $userCreator['pseudo'] && $placeOK > 0) {
?>
	<form method="post" action="./controlSubTrajet.php">
		<input type="hidden" name="idUser" value="<?php echo $thisUser;?>">
		<input type="hidden" name="idTrajet" value="<?php echo $idTrajet;?>">
		<div class="submitdiv"><input type="submit" name="submit" class="submit" value="Faire une demande de transport"></div>
 	</form>
 	<?php }
 	?>
	</fieldset>
</div>

