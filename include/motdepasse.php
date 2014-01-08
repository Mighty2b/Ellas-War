<?php

echo '<h1>'._('Changer de mot de passe').'</h1>
<br/>';

if(!empty($paquet->get_answer('changer_pwd'))) {
	if($paquet->get_answer('changer_pwd')->{1} != 0) {
		echo display_error($paquet->get_answer('changer_pwd')->{1});
	}
}

echo '
<br/>
<form method="post" action="">
	<table class="none">
		<tr>
			<td align="left" class="gras">'._('Ancien mot de passe').'</td>
			<td><input type="text" name="ancien" class="form_retirer" required="required"/></td>
		</tr>
		<tr>
			<td align="left" class="gras">'._('Nouveau mot de passe').'</td>
			<td><input type="text" name="nouveau" class="form_retirer" required="required"/></td>
		</tr>
		<tr>
			<td align="left" class="gras">'._('Confirmation du mot de passe').'&nbsp;</td>
			<td><input type="text" name="confirmation" class="form_retirer" required="required"/></td>
		</tr>
	</table>
	<br/>
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="changer" value="'._('Changer de mot de passe').'" /></div>
</form>';

?>