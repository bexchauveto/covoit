<script type="text/javascript">
$(function() {
	$('#typeTrajet').change(function(){
		var type = $('#typeTrajet').val();
		if(type == 1 || type == 2 || type == 6 || type == 7 || type == 8 || type ==9){
			$.ajax({
		        type: 'GET',
		        url: '../vue/vueAjoutTrajetLong.php',
		        timeout: 3000,
		        success: function(data) {
		        	$('#trajetChoix').html(data);
		        },
		        error: function() {
		          console.log('The query doesn\'t work'); }
		  	});
		}
		else { if(type != 0) {
				$.ajax({
			        type: 'GET',
			        url: '../vue/vueAjoutTrajetCourt.php',
			        timeout: 3000,
			        success: function(data) {
			        	$('#trajetChoix').html(data);
			        },
			        error: function() {
			          console.log('The query doesn\'t work'); }
			  	});
			}
			else {
				$('#trajetChoix').html("Veuillez choisir un type de trajet.");
			}
			
		}

	});
});
</script>
<form method="post" action="../controleur/controlAnnonceProc.php">
	<fieldset>
		<input type="hidden" name="idUser" value="<?php echo $tuple['id']; ?>">
		<p><label>Type de trajet</label> :
			<select name="typetrajet" id="typeTrajet">
				<option value="0"> </option>
				<option value="1">Long Trajet vers l'INSA</option>
				<option value="2">Long Trajet au départ de l'INSA</option>
				<option value="3">Court trajet quotidiens</option>
				<option value="4">Court trajet pour les courses</option>
				<option value="5">Court trajet pour les soirées</option>
				<option value="6">Trajet loisir vers le ski</option>
				<option value="7">Trajet loisir vers la plage</option>
				<option value="8">Trajet loisir vers la randonnée</option>
				<option value="9">Trajet loisir vers l'Andorre</option>
			</select>
		</p>
		<div id="trajetChoix"></div>
		