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
			$('div[id^="form-"]').hide();
			$('#inscription').click(function() {
				var visibilite = $('div[id="form-conn"]').is(':visible');
				$('div[id="form-insc"]').load( "../vue/vueInscription.php");
				if(visibilite){
					$('div[id="form-insc"]').toggle();
					$('div[id="form-conn"]').hide();
				}
				else {
					$('div[id="form-insc"]').toggle();
				}
			});

			$('#connexion').click(function() {
				var visibilite = $('div[id="form-insc"]').is(':visible');
				$('div[id="form-conn"]').load( "../vue/vueConnexion.php");
				if(visibilite){
					$('div[id="form-conn"]').toggle();
					$('div[id="form-insc"]').hide();
				}
				else {
					$('div[id="form-conn"]').toggle();
				}
			});
		});
	</script>
	
	<div id="page">
		<header>
			<a href="./controlIndex.php"><img src="../images/banniere.png" alt="Banniere Covoit'INSA" id="banniere" /></a>
			<nav>
				<div id='cssmenu'>
					<ul>
						<li class='has-sub <?php if ($_SESSION['page'] == "index") echo "active" ; ?>'><a href='./controlIndex.php'><span>Accueil</span></a></li>
					   	<li class='has-sub'><a href='#'><span>Longs trajets</span></a>
						  <ul>
							 <li><a href='#'><span>Vers l'INSA</span></a></li>
							 <li class='last'><a href='#'><span>Au départ de l'INSA</span></a></li>
						  </ul>
					   	</li>
					   	<li class='has-sub'><a href='#'><span>Courts trajets</span></a>
						  <ul>
							 <li><a href='#'><span>Trajets quotidiens</span></a></li>
							 <li><a href='#'><span>Courses</span></a></li>
							 <li class='last'><a href='#'><span>Soirées</span></a></li>
						  </ul>
					   	</li>
					   	<li class='has-sub last'><a href='#'><span>Loisirs</span></a>
						  <ul>
							 <li><a href='#'><span>Ski</span></a></li>
							 <li><a href='#'><span>Randonnée</span></a></li>
							 <li><a href='#'><span>Plage</span></a></li>
							 <li class='last'><a href='#'><span>Andorre</span></a></li>
						  </ul>
					   	</li>
					   	<?php
						if(isset($_SESSION['user'])){
						?>
						<li <?php if ($_SESSION['page'] == "profil") {echo "class='active'";} ?>>
							<a href="./controlProfil.php">Mon Profil</a>
						</li>
						<li>
								<a href="./controlDeconnexion.php">Deconnexion</a>
						</li>
							<?php }
							else { ?>
						<li>
							<a id="connexion">Connexion</a>
						</li>
						<li>					
							<a id="inscription">Inscription</a>
						</li>
						<?php } ?> 
					</ul>
				</div>
			</nav>
		</header>
		<section>
		<div id='form-conn'></div>
		<div id='form-insc'></div>