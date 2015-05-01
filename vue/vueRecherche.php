<fieldset>
<form method="post" action="../controleur/controlRecherche.php" id="formrecherche"> 
	<div class="submitdiv">
		<p>
			<label for="depart">Départ</label> :
			<input type="search" name="depart" id="depart" />
			<label for="arrivee">Arrivée</label> :
			<input type="search" name="arrivee" id="arrivee" />
			<label for="date">Date</label> :
			<input type="search" name="date" id="date" />
			<label for="heure">Heure</label> :
			<input type="search" name="heure" id="heure" />
		</p>
		<input type=hidden name='typeTrajet' value="<?php echo $type;?>"/>
		<input type="submit" id="submit" value="Rechercher" />
	</div>
</form>
</fieldset>