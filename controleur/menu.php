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
					   	<li class='has-sub <?php if ($_SESSION['page'] == "trajetsLongs") echo "active" ; ?>'><a href='#'><span>Longs trajets</span></a>
						  <ul>
							 <li><a href='./controlTrajetLongarrINSA.php'><span>Vers l'INSA</span></a></li>
							 <li class='last'><a href='./controlTrajetLongdepINSA.php'><span>Au départ de l'INSA</span></a></li>
						  </ul>
					   	</li>
					   	<li class='has-sub'><a href='#'><span>Courts trajets</span></a>
						  <ul>
							 <li><a href='./controlContruction.php'><span>Trajets quotidiens</span></a></li>
							 <li><a href='./controlContruction.php'><span>Courses</span></a></li>
							 <li class='last'><a href='#'><span>Soirées</span></a></li>
						  </ul>
					   	</li>
					   	<li class='has-sub last'><a href='#'><span>Loisirs</span></a>
						  <ul>
							 <li><a href='./controlContruction.php'><span>Ski</span></a></li>
							 <li><a href='./controlContruction.php'><span>Plage</span></a></li>
							 <li><a href='./controlContruction.php'><span>Randonnée</span></a></li>
							 <li class='last'><a href='#'><span>Andorre</span></a></li>
						  </ul>
					   	</li>
					   	<li <?php if ($_SESSION['page'] == "ajoutAnnonce") {echo "class='active'";} ?>>
					   		<a href='./controlAjoutAnnonce.php'><span>Ajouter une annonce</span></a>
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
		