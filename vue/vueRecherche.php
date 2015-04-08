<fieldset>
<form method="post" action="../controleur/controlRecherche.php" id="formrecherche"> 
	<div class="submitdiv">
		<p>
			<label for="depart">Départ</label> :
			<input type="search" name="depart" id="depart" placeholder="Toulouse"/>
			<label for="arrivee">Arrivée</label> :
			<input type="search" name="arrivee" id="arrivee" placeholder="Montpellier" />
		</p>
		<p>
			<input type="checkbox" name="non-fumeur" id="non-fumeur" value="1"/>
			<label for="non-fumeur"><img src="../images/non-fumeur.png" width='50' height='50'class='flag'/></label>
			<input type="checkbox" name="bagages" id="bagages" value="1"/>
			<label for="bagages"><img src="../images/bagages.png" width='50' height='50'class='flag'/></label>
		</p>
		<input type=hidden name='typeTrajet' value="<?php echo $type;?>"/>
		<input type="submit" id="submit" value="Rechercher" />
	</div>
</form>
</fieldset>