<fieldset>
<form method="post" action="../controleur/controlRecherche.php" id="formrecherche"> 
	<div class="submitdiv">
		<p>
			<label for="depart">Départ</label> :
			<input type="search" name="depart" id="depart" value="<?php if(isset($depart)) echo $depart;?>" />
			<label for="arrivee">Arrivée/Passe par</label> :
			<input type="search" name="arrivee" id="arrivee" value="<?php if(isset($arrivee)) echo $arrivee;?>" />
			<label for="date">Date</label> :
			<input type="search" name="date" id="date" value="<?php if(isset($date)) echo $date;?>" />
			<label for="heure">Heure</label> :
			<input type="search" name="heure" id="heure" value="<?php if(isset($heure)) echo $heure;?>" />
		</p>
		<input type=hidden name='typeTrajet' value="<?php echo $type;?>"/>
		<input type="submit" id="submit" value="Rechercher" />
	</div>
</form>
</fieldset>