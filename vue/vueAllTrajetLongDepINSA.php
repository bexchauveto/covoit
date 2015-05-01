<script type="text/javascript"></script>
<?php include("vueRecherche.php"); ?>
<table  border='1'>
	<caption class='important'>Liste des trajets au départ de l'INSA:</caption>
	<thead>
		<tr>
			<th>Informations sur le trajets</th>
			<th>Voir la fiche</th>
		</tr>
	</thead>
	<tbody>

<?php
	foreach ($tableauTrajet as $trajet) {
		$idTrajet = $trajet['idTrajet'];
	 	echo "<tr>";
 		echo "<td><p>";
 		foreach($tableauListeFlag as $listeFlag) {
 			if ($listeFlag != null) {
 				foreach ($listeFlag as $flag) {
 					if($flag != null && $flag['idTrajet'] == $idTrajet) {
 						foreach ($listeAllFlag as $flags) {
							if($flag['idFlag'] == $flags['idFlag']) {
								echo "<img width='30' height='30'class='flag' src='".$flags['lienImage']."'> ";
							}
						}
 					}
 				}
		    }
		}
		echo "</p><p>";
 		echo ucfirst($trajet['villedep'])." vers ".ucfirst($trajet['villearr'])." en passant par : ";
 		$villesEscales = "";
 		if ($tableauEscale != null) {
	 		foreach ($tableauEscale as $trajetescale) {
	 			if ($trajetescale != null) {
		 			foreach ($trajetescale as $escale) {
		 				if ($ListeEscale != null) {
				 			foreach ($ListeEscale as $Ville) {
				 				if($escale['idVille'] == $Ville['idVille'] && $escale['idTrajet'] == $idTrajet){
				 					$villesEscales = $villesEscales.ucfirst($Ville['ville']).", ";
				 				}
				 			}
				 		}
		 			}
		 		}
	 		}
	 	}
	 	echo rtrim($villesEscales, ", "); //On suprime la dernière virgule et le derneir espace de la liste des escales à afficher
 		echo "</p>";
 		echo "<p>Le ".$trajet['dateTrajet']." à ".$trajet['heure']." et d'une durée de ".$trajet['duree'].".</p>";
 		echo "<p>Nombre de place restantes : ";
 		foreach ($tableauNbPassager as $key => $nbPassager) {
 			if($key == $idTrajet){
 				echo $trajet['nbpers']-$nbPassager." sur ".$trajet['nbpers']." places disponibles. </p>";
 			}
 		}
 		echo "</td>";
 		echo "<td><form method='get'>";
 		echo "<input type=hidden name='idTrajet' value=".$idTrajet.">";
 		echo "<button formaction='./controlTrajetLong.php'> Voir la fiche du trajet</button>";
 		echo "</form></td>";
 		echo "</tr>";
	}



?>
	</tbody>
</table>