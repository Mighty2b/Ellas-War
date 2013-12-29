<?php

echo '<h1>'._('Nous contacter').'</h1>';

if($paquet->get_answer('nouscontacter') != '') {
	$answer = $paquet->get_answer('nouscontacter');
	if($answer->{1} != 0) {
		echo display_error($answer->{1});
	}
}

echo '<div class="ligne ligne80 justify"><br/>'._(
'Laissez nous un message et nous vous recontacterons par e-mail ou via la '.
'messagerie du jeu.<br/>Le temps de réponse est de 24h à une semaine mais nous '.
'faisons notre maximum pour traiter les demandes au plus vite.').
'<br/><br/></div>

<div id="nouscontacter" class="ligne80">
<form method="post" action="#">
<div id="nouscontacter_gauche">

	<span class="rouge_goco">'._('T</span>itre du message').' :<br/>
	<input type="text" name="titre" class="form_contact" required="required" />
	
	<br/><br/>
	<span class="rouge_goco">'._('I</span>dentifiant').' :<br/>
	<input type="text" name="login" class="form_contact" required="required" />
	
	<br/><br/>
	<span class="rouge_goco">'._('E</span>-mail').' :<br/>
	<input type="email" name="mail" class="form_contact" required="required" />

</div>
<div id="nouscontacter_droite">
	
	'._('Message').' :<br/>
	<textarea name="message" class="message_contact" required="required"></textarea>

</div>
<div class="ligne centrer"><br/>
	<div class="bouton_classique"><input type="submit" 
	                                     value="'._('Envoyer').'" 
	                                     name="contact"></div>
	<br/>
</form>
</div>';

?>