<form method="post" action="../controleur/controlModifUserProc.php">
	<fieldset>
		<input type="hidden" value="2" name="typechange">
		<input type="hidden" value="<?php echo $tuple['id']; ?>" name='idUser'/>
		<p><label>Nouvelle adresse Email</label> :
		<input type="email" id="newmail" name="newmail" required></p>
		<div class="submitdiv"><input type="submit" value="modifier"></div>
	</fieldset>
</form>