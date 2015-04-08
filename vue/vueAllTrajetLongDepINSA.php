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
 		echo ucfirst($trajet['villedep'])." vers ".ucfirst($trajet['villearr'])." en passant par : ";
 		if ($tableauEscale != null) {
	 		foreach ($tableauEscale as $trajetescale) {
	 			if ($trajetescale != null) {
		 			foreach ($trajetescale as $escale) {
		 				if ($ListeEscale != null) {
				 			foreach ($ListeEscale as $Ville) {
				 				if($escale['idVille'] == $Ville['idVille'] && $escale['idTrajet'] == $idTrajet){
				 					echo ucfirst($Ville['ville']).", ";
				 				}
				 			}
				 		}
		 			}
		 		}
	 		}
	 	}
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