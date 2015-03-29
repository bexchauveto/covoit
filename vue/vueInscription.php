<script type="text/javascript">
function verifmdp()
{
var val1   = document.getElementById("password").value,
    val2   = document.getElementById("password2").value,
    resultmpd = document.getElementById("resultmdp");
 
if(val1!=val2){
  resultmdp.innerHTML="Veillez rentrer deux mot de passes identiques!";
}
else {
  resultmdp.innerHTML="Valide !";
}
}
</script>

<form method="post" action="../controleur/controlInscription.php">
	<fieldset> 
		<p><label>Identifiant</label> :
		<input type="pseudo" name="pseudo" required/></p>
		<p><label>Mot de passe</label> :
		<input type="password" name="password" id="password" required/></p>
		<p><label>Mot de passe de vérification</label> :
		<input type="password" name="password2" id="password2" required onkeyup="verifmdp();"/></p>
		<div id="resultmdp"></div>
		<p><label>Email</label> :
		<input type="email" name="email" id="email" required/></p>
		<div id="submit"><input type="submit" id="submit" value="S'inscrire" /></div>
	</fieldset>
</form>