<form method="post" action="../controleur/controlModifUserProc.php">
	<fieldset>
		<input type="hidden" value="2" name="typechange">
		<input type="hidden" value="<?php echo $tuple['id']; ?>" name='idUser'/>
		<p><label>Nouvelle adresse Emai</label> :
		<input type="email" id="newmail" name="newmail" required></p>
		<input type="submit" value="modifier">
	</fieldset>
</form>