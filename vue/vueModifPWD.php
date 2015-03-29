<script type="text/javascript">
function verifmdp()
{
var val1   = document.getElementById("newpass").value,
    val2   = document.getElementById("newpasscheck").value,
    resultmdp = document.getElementById("newpassgood");
 
if(val1!=val2){
  resultmdp.innerHTML="Veillez rentrer deux mot de passes identiques!";
}
else {
  resultmdp.innerHTML="Valide !";
}
}

function verifoldmdp()
{
var val1   = document.getElementById("pwdbdd").value,
    val2   = CryptoJS.SHA1(document.getElementById("pwdold").value),
    resultmdp = document.getElementById("passold");
 
if(val1!=val2){
  resultmdp.innerHTML="Veillez rentrer l'ancien mot de passe.";
}
else {
  resultmdp.innerHTML="Valide !";
}
}
</script>
<form method="post" action="../controleur/controlModifUserProc.php">
	<fieldset>
		<input type="hidden" value="1" name="typechange">
		<input type="hidden" value="<?php echo $tuple['id']; ?>" name='idUser'/>
		<input type="hidden" id="pwdbdd" value="<?php echo $tuple['password'] ?>"/>
		<p><label>Ancien mot de passe</label> :
		<input type="password" id="pwdold" required onkeyup="verifoldmdp();">
		<div id="passold"></div></p>
		<p><label>Nouveau mot de passe</label> :
		<input type="password" id="newpass" name="newpass" required></p>
		<p><label>Vérification nouveau mot de passe</label> :
		<input type="password" id="newpasscheck" required onkeyup="verifmdp();">
		<div id="newpassgood"></div></p>
		<input type="submit" value="modifier">
	</fieldset>
</form>