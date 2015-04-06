<script type="text/javascript">
$(function() {
	$('#LieuDep').autocomplete({
	    source : function() {
	    	$.ajax({
		       url: "../modele/listeLieu.php",
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
	$('#LieuArr').autocomplete({
	    source : function() {
	    	$.ajax({
		        url: "../modele/listeLieu.php",
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
	$('#nbpersonnes').keyup(function(){
		prix = $('#prix').val();
		nbpersonnes = $('#nbpersonnes').val();
		$('#ppp').html("Donc "+prix/nbpersonnes+" € par personnes.");

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
	$('#plusLieu').click(function(){
		nbLieuJS = $('#nbLieu').val();
		nbLieuJS++;
		if(nbLieuJS  <= 8){
			$.ajax({
	            type: 'GET',
	            url: '../vue/vueAjoutLieu.php?nb='+nbLieuJS,
	            timeout: 3000,
	            success: function(data) {
	              $('#LieuArret').html('Nombre de lieu intermédiaire : '.nbLieuJS);
	              $('#lieu').html(data);
	              $('#nbLieu').val(nbLieuJS); },
	            error: function() {
	              alert('The query doesn\'t work'); }
         	});
		}
		else {
			$('#LieuArret').html('Nombre de lieu intermédiaire maximum (8) atteint');
			nbLieuJS = 8;
		}
	});
	$('#moinsLieu').click(function(){
		nbLieuJS = $('#nbLieu').val();
		nbLieuJS--;
		if(nbLieuJS  >= 0){
			$.ajax({
	            type: 'GET',
	            url: '../vue/vueAjoutLieu.php?nb='+nbLieuJS,
	            timeout: 3000,
	            success: function(data) {
            	  $('#LieuArret').html('Nombre de lieu intermédiaire : '.nbLieuJS);
	              $('#lieu').html(data);
	              $('#nbLieu').val(nbLieuJS); },
	            error: function() {
	              alert('The query doesn\'t work'); }
         	});
		}
		else {
			$('#LieuArret').html('Nombre de lieu intermédiaire minimum (0) atteint');
			nbLieuJS = 0;
		}
	});
});
</script>
		<p><label>Lieu départ</label> :
			<input type="text" name="LieuDep" id="LieuDep" required>
		</p>
		<p><label>Lieu arrivée</label> :
			<input type="text" name="LieuArr" id="LieuArr" required>
		</p>
		<p><label>Nombre de personnes acceptés </label> :
			<input type="text" name="nbpersonnes" id="nbpersonnes" required>
			<div id="ppp"></div>
		</p>
		<p><label>Description</label> :</p>
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
			<input type="hidden" id="nbLieu" name="nbLieu">
			<p><button type="button" id="plusLieu"><span>+</span></button>
			<button type="button" id="moinsLieu"><span>-</span></button></p>
			<div id="LieuArret"></div>
			<div id="lieu"></div>
		</p>
		<p><label>Autres informations</label> :</p>
		<p>
			<input type="checkbox" name="flag[]" value="1">Non fumeur
		</p>
		<p><input type="checkbox" name="flag[]" value="2">Bagages volumineux
		</p>


		<input type="submit" name="submit" value="Ajouter l'annonce">
	</fieldset>
</form>