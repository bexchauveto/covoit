<fieldset>
<p>Identifiant : <?php echo $user->getNick(); ?></p>
<p>Adresse Email : <?php echo $user->getMail(); ?></p>
<p><a href="./controlModifPWD.php">Modifier votre mot de passe <a></p>
<p><a href="./controlModifMail.php">Modifier votre adresse email<a></p>
</fieldset>

<fieldset>
<legend>Mes trajets </legend>
<?php $mesTrajets = Trajet::getTrajetsByUser($user->getID());
/*foreach ($mesTrajets as $trajet){
	
    echo ("<p>".$trajet->getidTrajet().
    "Départ : ".$trajet->gettypeTrajet().
	"Arrivée : "$trajet->getvilleDepart().
	$trajet->getvilleArrivee().
	$trajet->getprix().
	$trajet->getdescription().
	$trajet->getdate().
	$trajet->getheure().
	$trajet->getduree()."</p>");
}*/ ?>


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
	foreach ($mesTrajets as $trajet) {
	 	echo "<tr>";
 		echo "<td><p>";
 		echo $trajet->gettypeTrajet();
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