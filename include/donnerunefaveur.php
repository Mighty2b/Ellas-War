<?php

if($paquet->peut_commerce() == false) {
	echo '<div class="erreur">';
	echo display_error(95);
	echo '</div>';
}
else {
	echo '<h1>'._('Donner une faveur').'</h1>
<br/>';

$paquet->error('dons_faveurs');

echo '<br/>
<div class="ligne erreur centrer">/!\ '._(
'Le don de faveur est soumis aux règles sur les multi-comptes').
' /!\</div>
<br/><br/>
<div class="ligne80 centrer">'._(
'Il ne vous est possible de donner une faveur qu\'à un joueur en manque de '.
'ressource.<br/>Celui-ci après avoir reçu la faveur pourra l\'utiliser '.
'pour remettre son compte en route.').'</div><br/>

<form action="#" method="post">
<div class="ligne centrer">
	<input type="text"
	       name="somme" 
	       placeholder="'._('Joueur').'" 
	       size="10" 
	       style="margin-bottom:10px;" 
	       required="required"/>
<br/>
	<div class="bouton_classique"><input type="submit" 
	                                     value="'._('Donner une Faveur').'" /></div>
</div>
</form>';
}

?>