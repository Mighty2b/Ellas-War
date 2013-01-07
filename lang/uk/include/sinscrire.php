<?php
echo '<h1>Register on Ellàs War</h1>';

$paquet->display();

echo '<p class="centrer">By registering, you accept the rules of the game. You should not use special characters in your nickname and also not use hotmail or msn address.<br/>Please remember that the use of multiple accounts is strictly prohibited.</p>';

echo '<form method="post" action="#">';

if(!empty($_SESSION['parrain'])) {
	echo '<div class="ligne erreur">'.$do_login_parrain['login'].' is sponsoring you on Ellàs War</div>';
}
echo '<div id="gauche_inscription">
			<div id="pseudo_inscription" class="text_large_deco"><span class="rouge_goco">L</span>ogin :</div>

			<div id="mail_inscription" class="text_large_deco"><span class="rouge_goco">M</span>ail adress :</div>

			<div id="pass_inscription" class="text_large_deco"><span class="rouge_goco">P</span>assword :</div>

			<div id="pass_inscription3" class="text_large_deco"><span class="rouge_goco">C</span>onfirm your password :</div>
		</div>
		<div id="droite_inscription">
			<div id="pseudo_inscription2"><input type="text" name="login" class="form_inscription" required="required" /></div>

			<div id="mail_inscription2"><input type="email" name="mail" class="form_inscription" required="required" /></div>

			<div id="pass_inscription2"><input type="password" name="pass" class="form_inscription" required="required" /></div>

			<div id="pass_inscription4"><input type="password" name="pass2" class="form_inscription" required="required" /></div>
		</div>
		<div id="contact_valider"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="CONFIRM" name="Inscription" /></div></div>
		</form>
	<div class="centrer"><img src="images/inscription.png" alt="Sign up" title="Sign up" /></div>';
?>