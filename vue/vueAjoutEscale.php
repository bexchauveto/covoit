<?php
$nbEscale = $_GET['nb'];
$listeEscale = explode(",", $_GET['listeEscale']);

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
			echo "<input type='text' id='arret1' name='arret1' class='ville' value='".$listeEscale[0]."' required></p>";
			break;
		case 2:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' id='arret1' name='arret1' class='ville' value='".$listeEscale[0]."' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' id='arret2' name='arret2' class='ville' value='".$listeEscale[1]."' required></p>";
			break;
		case 3:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' id='arret1' name='arret1' class='ville' value='".$listeEscale[0]."' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' id='arret2' name='arret2' class='ville' value='".$listeEscale[1]."' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' id='arret3' name='arret3' class='ville' value='".$listeEscale[2]."' required></p>";
			break;

		case 4:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' id='arret1' name='arret1' class='ville' value='".$listeEscale[0]."' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' id='arret2' name='arret2' class='ville' value='".$listeEscale[1]."' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' id='arret3' name='arret3' class='ville' value='".$listeEscale[2]."' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' id='arret4' name='arret4' class='ville' value='".$listeEscale[3]."' required></p>";
			break;
		case 5:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' id='arret1' name='arret1' class='ville' value='".$listeEscale[0]."' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' id='arret2' name='arret2' class='ville' value='".$listeEscale[1]."' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' id='arret3' name='arret3' class='ville' value='".$listeEscale[2]."' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' id='arret4' name='arret4' class='ville' value='".$listeEscale[3]."' required></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' id='arret5' name='arret5' class='ville' value='".$listeEscale[4]."' required></p>";
			break;
		case 6:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' id='arret1' name='arret1' class='ville' value='".$listeEscale[0]."' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' id='arret2' name='arret2' class='ville' value='".$listeEscale[1]."' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' id='arret3' name='arret3' class='ville' value='".$listeEscale[2]."' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' id='arret4' name='arret4' class='ville' value='".$listeEscale[3]."' required></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' id='arret5' name='arret5' class='ville' value='".$listeEscale[4]."' required></p>";
			echo "<p><label>Arret n°6<label>:";
			echo "<input type='text' id='arret6' name='arret6' class='ville' value='".$listeEscale[5]."' required></p>";
			break;
		case 7:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' id='arret1' name='arret1' class='ville' value='".$listeEscale[0]."' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' id='arret2' name='arret2' class='ville' value='".$listeEscale[1]."' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' id='arret3' name='arret3' class='ville' value='".$listeEscale[2]."' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' id='arret4' name='arret4' class='ville' value='".$listeEscale[3]."' required></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' id='arret5' name='arret5' class='ville' value='".$listeEscale[4]."' required></p>";
			echo "<p><label>Arret n°6<label>:";
			echo "<input type='text' id='arret6' name='arret6' class='ville' value='".$listeEscale[5]."' required></p>";
			echo "<p><label>Arret n°7<label>:";
			echo "<input type='text' id='arret7' name='arret7' class='ville' value='".$listeEscale[6]."' required></p>";
			break;
		case 8:
			echo "<p><label>Arret n°1<label>:";
			echo "<input type='text' id='arret1' name='arret1' class='ville' value='".$listeEscale[0]."' required></p>";
			echo "<p><label>Arret n°2<label>:";
			echo "<input type='text' id='arret2' name='arret2' class='ville' value='".$listeEscale[1]."' required></p>";
			echo "<p><label>Arret n°3<label>:";
			echo "<input type='text' id='arret3' name='arret3' class='ville' value='".$listeEscale[2]."' required></p>";
			echo "<p><label>Arret n°4<label>:";
			echo "<input type='text' id='arret4' name='arret4' class='ville' value='".$listeEscale[3]."' required></p>";
			echo "<p><label>Arret n°5<label>:";
			echo "<input type='text' id='arret5' name='arret5' class='ville' value='".$listeEscale[4]."' required></p>";
			echo "<p><label>Arret n°6<label>:";
			echo "<input type='text' id='arret6' name='arret6' class='ville' value='".$listeEscale[5]."' required></p>";
			echo "<p><label>Arret n°7<label>:";
			echo "<input type='text' id='arret7' name='arret7' class='ville' value='".$listeEscale[6]."' required></p>";
			echo "<p><label>Arret n°8<label>:";
			echo "<input type='text' id='arret8' name='arret8' class='ville' value='".$listeEscale[7]."' required></p>";
			break;	
	}
?>