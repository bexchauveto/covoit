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
		<header>
			<img src="../images/banniere.png" alt="Banniere Covoit'INSA" id="banniere" />
			<nav>
				<div id='cssmenu'>
					<ul>
					   <li class='active'><a href='./controlIndex.php'><span>Accueil</span></a></li>
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
					   <li>
					   	<li>
						<?php
						if(isset($_SESSION['user'])){?>
							<a href="./controlProfil.php">Mon Profil</a>
					</li>
					<li>
							<a href="./controlDeconnexion.php">Deconnexion</a>
						<?php }
						else { ?>
						<div id="connexion">
						<form method="post" action="../controleur/controlConnexion.php" id="formconnexion"> 
							<input type="pseudo" name="pseudo" placeholder="Identifiant"/>
							<input type="password" name="password" placeholder="Mot de passe" />
							<input type="submit" id="submit" value="OK" />
						</form>
						</div>
						</li>
						<li>					
							<a id="inscription" >Inscription</a>
						<?php } ?> 
					</li>
					</ul>
				</div>
			</nav>
		</header>
		<div id='inscript'></div>