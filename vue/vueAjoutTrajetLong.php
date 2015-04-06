<script type="text/javascript">
$(function() {
	$('#villeDep').autocomplete({
	    source : function(request, response) {
	    	$.ajax({
		        url: "../modele/listeVille.php",
		        type: "GET",
		        dataType: "json",
		        data: {term: request.term},
		        success: function(data) {
		          response(data);
		        },
		        error: function() {
		          console.log('The query doesn\'t work'); }
		  	});
	    },
	    minLength : 3
	});
	$('#villeArr').autocomplete({
	    source : function(request, response) {
	    	$.ajax({
		        url: "../modele/listeVille.php",
		        type: "GET",
		        dataType: "json",
		        data: {term: request.term},
		        success: function(data) {
		          response(data);
		        },
		        error: function() {
		          console.log('The query doesn\'t work'); }
		  	});
	    },
	    minLength : 3
	});
	$('#dureeTraj').keyup(function() {
	    dureeTraj = $('#dureeTraj').val();
	    regexp =  new RegExp("[012]*[0-9][h][0-5]*[0-9]*");
	    if(regexp.test(dureeTraj)){
			$("#valideDuree").html("Duree valide !");
	    }
	    else {
	    	$("#valideDuree").html("Duree non valide !");
	    }
	});
	$('#dateTraj').keyup(function() {
	    dateTraj = $('#dateTraj').val();
	    regexp = new RegExp("[0123][0-9][\/][01][0-9][\/][2][0][12][0-9]");
	    if(regexp.test(dateTraj)){
			$("#valideDate").html("Date valide !");
	    }
	    else {
	    	$("#valideDate").html("Date non valide !");
	    }
	});
	$('#heureTraj').keyup(function() {
	    heureTraj = $('#heureTraj').val();
	    regexp = new RegExp("[012][0-9][h][0-5][0-9]");
	    if(regexp.test(heureTraj)){
	    	$("#valideHeure").html("Heure valide !");
	    }
	    else {
	    	$("#valideHeure").html("Heure non valide !");
	    }
	});
	$('#prix').keyup(function(){
		prix = $('#prix').val();
		regexp = new RegExp("[012]*[0-9]{2}");
		if(regexp.test(prix)){
	    	$("#validePrix").html("Prix valide !");
	    }
	    else {
	    	$("#validePrix").html("Prix non valide !");
	    }

	});
	$('#nbpersonnes').keyup(function(){
		prix = $('#prix').val();
		nbpersonnes = $('#nbpersonnes').val();
		$('#ppp').html("Donc "+prix/nbpersonnes+" € par personnes.");

	});
	$('#plusVille').click(function(){
		nbEscaleJS = $('#nbEscale').val();
		nbEscaleJS++;
		if(nbEscaleJS  <= 8){
			$.ajax({
	            type: 'GET',
	            url: '../vue/vueAjoutEscale.php?nb='+nbEscaleJS,
	            timeout: 3000,
	            success: function(data) {
	              $('#villeEscale').html('Nombre de ville intermédiaire : '+nbEscaleJS);
	              $('#escale').html(data);
	              $('#nbEscale').val(nbEscaleJS); },
	            error: function() {
	              alert('The query doesn\'t work'); }
         	});
		}
		else {
			$('#villeEscale').html('Nombre de ville intermédiaire maximum (8) atteint');
			nbEscaleJS = 8;
		}
	});
	$('#moinsVille').click(function(){
		nbEscaleJS = $('#nbEscale').val();
		nbEscaleJS--;
		console.log(nbEscaleJS);
		if(nbEscaleJS  >= 0){
			$.ajax({
	            type: 'GET',
	            url: '../vue/vueAjoutEscale.php?nb='+nbEscaleJS,
	            timeout: 3000,
	            success: function(data) {
            	  $('#villeEscale').html('Nombre de ville intermédiaire : '+nbEscaleJS);
	              $('#escale').html(data);
	              $('#nbEscale').val(nbEscaleJS); },
	            error: function() {
	              alert('The query doesn\'t work'); }
         	});
		}
		else {
			$('#villeEscale').html('Nombre de ville intermédiaire minimum (0) atteint');
			nbEscaleJS = 0;
		}
	});
});
</script>
		<p><label>Ville départ</label> :
			<input type="text" name="villeDep" id="villeDep" required>
		</p>
		<p><label>Ville arrivée</label> :
			<input type="text" name="villeArr" id="villeArr" required>
		</p>
		<p><label>Prix</label> :
			<input type="text" name="prix" id="prix" required>
			<label>€</label>
			<div id="validePrix"></div>
		</p>
		<p><label>Nombre de personnes acceptés </label> :
			<input type="text" name="nbpersonnes" id="nbpersonnes" required>
			<div id="ppp"></div>
		</p>
		<p><label>Durée</label> :
			<input type="text" name="duree" placeholder="2h30" id="dureeTraj" required>
			<div id="valideDuree"></div>
		</p>
		<p><label>Description</label> : </p>
		<p>	<textarea rows="10" cols="100" name="description"></textarea>
		</p>
		<p><label>Date</label> :
			<input type="text" name="date" placeholder="JJ/MM/AAAA" id="dateTraj" required>
			<div id="valideDate"></div>
		</p>
		<p><label>Heure</label> :
			<input type="text" name="heure" placeholder="HHhMM" id="heureTraj" required>
			<div id="valideHeure"></div>
		</P>
		<p><label>Listes des arrets intermédiaire</label> :
			<input type="hidden" id="nbEscale" name="nbEscale" value='0'></p>
		<p>	<button type="button" id="plusVille"><span>+</span></button>
			<button type="button" id="moinsVille"><span>-</span></button>
			<div id="villeEscale"></div>
			<div id="escale"></div>
		</p>
		<p><label>Autres informations</label> :</p>
		<p>
			<input type="checkbox" name="flag[]" value="1">Non fumeur
		</p>
		<p><input type="checkbox" name="flag[]" value="2">Bagages volumineux
		</p>


		<input type="submit" name="submit" class="submit" value="Ajouter l'annonce">
	</fieldset>
</form>