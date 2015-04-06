<?php
$nbLieu = $_GET['nb'];

?>
<script type="text/javascript">
$(function() {
	$('.lieu').autocomplete({
	    source : function(request, response) {
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
});
</script>
<?php

	switch($nbLieu){
		case 0:
			echo "pas de lieu intermédiaire.";
			break;
		case 1:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='lieu'></p>";
			break;
		case 2:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='lieu'></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='lieu'></p>";
			break;
		case 3:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='lieu'></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='lieu'></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='lieu'></p>";
			break;

		case 4:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='lieu'></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='lieu'></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='lieu'></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='lieu'></p>";
			break;
		case 5:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='lieu'></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='lieu'></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='lieu'></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='lieu'></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' name='arret5' class='lieu'></p>";
			break;
		case 6:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='lieu'></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='lieu'></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='lieu'></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='lieu'></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' name='arret5' class='lieu'></p>";
			echo "<p><label>Arret n°6<label>:";
			echo "<input type='text' name='arret6' class='lieu'></p>";
			break;
		case 7:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='lieu'></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='lieu'></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='lieu'></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='lieu'></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' name='arret5' class='lieu'></p>";
			echo "<p><label>Arret n°6<label>:";
			echo "<input type='text' name='arret6' class='lieu'></p>";
			echo "<p><label>Arret n°7<label>:";
			echo "<input type='text' name='arret7' class='lieu'></p>";
			break;
		case 8:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='lieu'></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='lieu'></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='lieu'></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='lieu'></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' name='arret5' class='lieu'></p>";
			echo "<p><label>Arret n°6<label>:";
			echo "<input type='text' name='arret6' class='lieu'></p>";
			echo "<p><label>Arret n°7<label>:";
			echo "<input type='text' name='arret7' class='lieu'></p>";
			echo "<p><label>Arret n°8<label>:";
			echo "<input type='text' name='arret8' class='lieu'></p>";
			break;	
	}
?>