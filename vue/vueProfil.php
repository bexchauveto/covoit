<fieldset>
<p>Identifiant : <?php echo $user->getNick(); ?></p>
<p>Adresse Email : <?php echo $user->getMail(); ?></p>
<p><a href="./controlModifPWD.php">Modifier votre mot de passe <a></p>
<p><a href="./controlModifMail.php">Modifier votre adresse email<a></p>
</fieldset>

<fieldset>
<legend>Mes trajets </legend>
<table  border='1'>
	<thead>
		<tr>
			<th>Type trajet</th><!-- TODO -->
			<th>Origine</th>
			<th>Destination</th>
			<th>Coût</th>
			<th>Description</th>
			<th>Date et heure</th>
			<th>Durée</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

<?php
	$mesTrajets = Trajet::getTrajetsByUser($user->getID());
	foreach ($mesTrajets as $trajet) {
	 	echo "<tr>";
 		echo "<td><p>";
 		switch ($trajet->gettypeTrajet()) {
		    case 1:
		        echo "Long Trajet vers l'INSA";
		        break;
		    case 2:
		        echo "Long Trajet au départ de l'INSA";
		        break;
		    case 3:
		        echo "Court trajet quotidiens";
		        break;
		    case 4:
		        echo "Court trajet pour les courses";
		        break;
		    case 5:
		        echo "Court trajet pour les soirées";
		        break;
		    case 6:
		        echo "Trajet loisir vers le ski";
		        break;
		    case 7:
		        echo "Trajet loisir vers la plage";
		        break;
		    case 8:
		        echo "Trajet loisir vers la randonnée";
		        break;
		    case 9:
		        echo "Trajet loisir vers l'Andorre";
		        break;
		}
 		echo "</p></td>";
 		echo "<td><p>";
 		echo ucfirst($trajet->getvilleDepart());
 		echo "</p></td>";
 		echo "<td><p>";
 		echo ucfirst($trajet->getvilleArrivee());
 		echo "</p></td>";
 		echo "<td><p>";
 		echo $trajet->getprix();
 		echo "</p></td>";
 		echo "<td><p>";
 		echo $trajet->getdescription();
 		echo "</p></td>";
 		echo "<td><p>";
 		echo $trajet->getdate();
 		echo "</p><p>".$trajet->getheure();
 		echo "</p></td>";
 		echo "<td><p>";
 		echo $trajet->getduree();
 		echo "</p>";
 		echo "<td><form method='get'>";
 		echo "<input type=hidden name='idTrajetASupprimer' value=".$trajet->getidTrajet().">";
 		echo "<button formaction='./controlProfil.php'>Supprimer</button>";
 		echo "</form></td>";
 		 echo "</tr>";
	}



?>
	</tbody>
</table>

</fieldset>