<script type="text/javascript">
$(function() {
	var tableauVilleJS = <?php echo json_encode($tableauVille); ?>;
	$('#villeDep').autocomplete({
	    source : tableauVilleJS
	    minLength : 3
	});
	$('#villeArr').autocomplete({
	    source : tableauVilleJS
	    minLength : 3
	});
	$('#dureeTraj').keyup(function() {
	    dateTraj = $(this).value;
	    regexp = new RegExp("[012][0-9][h][0-5][0-9]");
	    if(regexp.test(dateTraj)){
			$("#valideHeure").html("Heure valide !");
	    }
	    else {
	    	$("#valideHeure").html("Heure non valide !");
	    }
	});
	$('#dateTraj').keyup(function() {
	    dateTraj = $(this).value;
	    regexp = new RegExp("[0123][0-9][/][01][0-9][/][2][0][12][0-9]");
	    if(regexp.test(dateTraj)){
			$("#valideDate").html("Date valide !");
	    }
	    else {
	    	$("#valideDate").html("Date non valide !");
	    }
	});
	$('#heureTraj').keyup(function() {
	    heureTraj = $(this).value;
	    regexp = new RegExp("[012][0-9][:][0-5][0-9]");
	    if(regexp.test(heureTraj)){
	    	$("#valideHeure").html("Heure valide !");
	    }
	    else {
	    	$("#valideHeure").html("Heure non valide !");
	    }
	});
});
</script>
<form method="post" action="../controleur/controlAnnonceProc.php">
	<fieldset>
		<input type="hidden" name="idUser" value="<?php echo $tuple['id']; ?>">
		<p><label>Type de trajet</label> :
			<select name="typetrajet">
				<option value="1" selected>Long Trajet vers l'INSA</option>
				<option value="2">Long Trajet au départ de l'INSA</option>
				<option value="3">Court trajet quotidiens</option>
				<option value="4">Court trajet pour les courses</option>
				<option value="5">Court trajet pour les soirées</option>
				<option value="6">Trajet loisir vers le ski</option>
				<option value="7">Trajet loisir vers la plage</option>
				<option value="8">Trajet loisir vers la randonnée</option>
				<option value="9">Trajet loisir vers l'Andorre'</option>
			</select>
		</p>
		<p><label>Ville départ</label> :
			<input type="text" name="villeDep" id="villeDep" required>
		</p>
		<p><label>Ville arrivée</label> :
			<input type="text" name="villeArr" id="villeArr" required>
		</p>
		<p><label>Prix</label> :
			<input type="text" name="prix" required>
		</p>
		<p><label>Durée</label> :
			<input type="text" name="duree" placeholder="2h30" id="dureeTraj" required>
			<div id="valideDuree"></div>
		</p>
		<p><label>Description</label> :
			<textarea rows="10" cols="100" name="description"></textarea>
		</p>
		<p><label>Date</label> :
			<input type="text" name="date" placeholder="JJ/MM/AAAA" id="dateTraj" required>
			<div id="valideDate"></div>
		</p>
		<p><label>Heure</label> :
			<input type="text" name="heure" placeholder="HH:MM" id="heureTraj" required>
			<div id="valideHeure"></div>
		</P>



	</fieldset>
</form>