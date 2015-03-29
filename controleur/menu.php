<?php /*<script>
// Attach a submit handler to the form
$( "#connectForm" ).submit(function( event ) {
// Stop form from submitting normally
$("#affichage").hide();
event.preventDefault();
// Get some values from elements on the page:
var $form = $( this ),
pse = $form.find( "input[name='pseudo']" ).val(),
mdp = $form.find( "input[name='password']" ).val(),
url = $form.attr( "action" );
// Send the data using post
var posting = $.post( url, { pseudo: pse, password: mdp } );
// Put the results in a div
posting.done(function( data ) {
var content = $( data ).find( "#content" );
$( "#affichage" ).empty().append( content );
$("#affichage").show();

});
});

<script>
	$("#affichage").hide();
	$('#submit').click(function() {
		var $form = $( this ),
		pse = $form.find( "input[name='pseudo']" ).val(),
		mdp = $form.find( "input[name='password']" ).val();
		$.ajax({
			type: 'POST',
			url: $form.attr( "action" ),
			timeout: 3000,
			data: $form,
			success: function(data) {
				$("#affichage").html(data);
				$("#affichage")toggle();},
			error: function() {
				alert('The query doesn\'t work'); }
      });	   
    });
</script>*/ ?>

<?php //session_unset() ?>

</head>
<body>
<script type="text/javascript">
	$(function() {
		$('div[id="inscript"]').hide();
		$('#inscription').click(function() {
      		$('div[id="inscript"]').load( "../vue/vueInscription.php");
      		$('div[id="inscript"]').toggle();
  		});
	});
</script>
<div id="page">
	<div id="menu">
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="#">Longs trajets</a></li>
			<li>
				<ul>
					<li><a href="#">Vers l'INSA</a></li>
					<li><a href="#">Au départ de l'INSA</a></li>
				</ul>
			</li>
			<li><a href="#">Courts trajets</a></li>
			<li>
				<ul>
					<li><a href="#">Trajets quotidiens</a></li>
					<li><a href="#">Courses</a></li>
					<li><a href="#">Soirées</a></li>
				</ul>
			</li>
			<li><a href="#">Loisirs</a></li>
			<li>
				<ul>
					<li><a href="#">Ski</a></li>
					<li><a href="#">Randonnée</a></li>
					<li><a href="#">Plage</a></li>
					<li><a href="#">Andorre</a></li>
				</ul>
			</li>
			<li>
				<?php
				if(isset($_SESSION['user'])){?>
					<a href="./controlProfil.php">Mon Profil</a>
			</li>
			<li>
					<a href="#">Deconnexion</a>
				<?php }
				else { ?>
				<div id="connexion">
				<form method="post" action="../controleur/controlConnexion.php">
					<fieldset> 
						<input type="pseudo" name="pseudo" placeholder="Identifiant"/>
						<input type="password" name="password" placeholder="Mot de passe" />
						<div id="submit"><input type="submit" id="submit" value="OK" /></div>
					</fieldset>
				</form>
				</div>
				</li>
				<li>					
					<a id="inscription" >Inscription</a>
				<?php } ?> 
			</li>
		</ul>
	</div>
	<div id='inscript'></div>