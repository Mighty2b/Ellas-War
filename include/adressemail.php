<?php

echo '<h1>'._('Changer d\'adresse mail').'</h1>
<br/>';

$paquet->error('changer_mail');

echo '
<br/>
<form method="post" action="">
	<table style="margin:auto;">
		<tr>
			<td align="left" class="gras">'._('Ancienne adresse mail').'</td>
			<td><input type="text" name="ancien" class="form_retirer" required="required"/></td>
		</tr>
		<tr>
			<td align="left" class="gras">'._('Nouvelle adresse mail').'</td>
			<td><input type="text" name="nouveau" class="form_retirer" required="required"/></td>
		</tr>
		<tr>
			<td align="left" class="gras">'._('Confirmation').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="text" name="confirmation" class="form_retirer" required="required"/></td>
		</tr>
	</table>
	<br/>
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="changer" value="'._('Changer d\'adresse mail').'" /></div>
</form>';

?>