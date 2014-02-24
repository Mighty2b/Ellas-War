<?php

$liste = $paquet->get_answer('get_mes_filleuls')->{1};
$possible = $paquet->get_answer('get_mes_filleuls')->{2};

if(sizeof($liste) == 0) {
	echo  '<b>'._(
  'Vous n\'avez aucun filleul à qui vous pouvez donner des ressources').
	'</b>';
}
else {

	echo '<div class="centrer">
	<b>';
	
	printf(_('Vous pouvez faire un don toutes les 23h à l\'un de vos filleuls, '.
	         'ce don ne peut pas excéder %s unités de ressources.'),nbf($possible));
	
	echo '</b>
	<br/><br/>';
	$paquet->error('dons_parain',1);
	
	echo '<form action="#" method="post">
	<select name="joueur">';

	foreach($liste as $joueur) {
		if(!empty($_GET['var1']) && ($_GET['var1'] == $joueur->id)) {
			echo ' <option value="'.$joueur->id.'"
			               selected="selected">'.$joueur->login.'</option> ';
		}
		else {
			echo ' <option value="'.$joueur->id.'">'.$joueur->login.'</option> ';
		}
	}
	
	echo '</select>
	<select name="ressource">
		<option value="drachme">'._('Drachmes').'</option>
		<option value="nourriture">'._('Nourriture').'</option>
		<option value="eau">'._('Eau').'</option>
		<option value="bois">'._('Bois').'</option>
		<option value="fer">'._('Fer').'</option>
		<option value="argent">'._('Argent').'</option>
	</select>
<input type="text"
       name="somme" 
       size="18" 
       maxlength="6" 
       required="required"
       placeholder="'._('Quantité de ressources').'" />
<br/><br/>
<div class="bouton_classique"><input type="submit" 
                                     name="envoyer" 
                                     value="'._('Envoyer').'" /></div>
</form></div>';
}
?>