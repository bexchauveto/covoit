<?php
$nbEscale = $_GET['nb'];

?>
<script type="text/javascript">
$(function() {
	$('.ville').autocomplete({
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
});
</script>
<?php

	switch($nbEscale){
		case 0:
			echo "pas de ville intermédiaire.";
			break;
		case 1:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='ville' required></p>";
			break;
		case 2:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='ville' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='ville' required></p>";
			break;
		case 3:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='ville' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='ville' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='ville' required></p>";
			break;

		case 4:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='ville' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='ville' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='ville' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='ville' required></p>";
			break;
		case 5:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='ville' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='ville' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='ville' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='ville' required></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' name='arret5' class='ville' required></p>";
			break;
		case 6:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='ville' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='ville' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='ville' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='ville' required></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' name='arret5' class='ville' required></p>";
			echo "<p><label>Arret n°6<label>:";
			echo "<input type='text' name='arret6' class='ville' required></p>";
			break;
		case 7:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='ville' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='ville' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='ville' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='ville' required></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' name='arret5' class='ville' required></p>";
			echo "<p><label>Arret n°6<label>:";
			echo "<input type='text' name='arret6' class='ville' required></p>";
			echo "<p><label>Arret n°7<label>:";
			echo "<input type='text' name='arret7' class='ville' required></p>";
			break;
		case 8:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' name='arret1' class='ville' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' name='arret2' class='ville' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' name='arret3' class='ville' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' name='arret4' class='ville' required></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' name='arret5' class='ville' required></p>";
			echo "<p><label>Arret n°6<label>:";
			echo "<input type='text' name='arret6' class='ville' required></p>";
			echo "<p><label>Arret n°7<label>:";
			echo "<input type='text' name='arret7' class='ville' required></p>";
			echo "<p><label>Arret n°8<label>:";
			echo "<input type='text' name='arret8' class='ville' required></p>";
			break;	
	}
?>