<?php

include('include/menu_monalliance.php');

if($mon_alliance -> id_chef != $paquet->get_infoj('id')) {
	redirect(_('alliance'));
}

$liste_joueurs = $paquet->get_answer('possibles_chefs')->{1};

echo '﻿<h1>'._('Changer le Grand chef').'</h1><br/>';

if(sizeof($liste_joueurs) > 0) {
		echo '<center><form action=\'#\' method=\'post\' >
				<select name=\'chef\' class="form_retirer">';
		
		foreach($liste_joueurs as $id => $login)
			echo '<option value=\''.$id.'\'>'.$login.'</option>';
		
		echo '</select><br/><br/>
		<div class="bouton_classique"><input class="bouton_classique2" type="submit" name=\'Modifier\' value=\'Modifier\' /></div></form></center>';
}
else {
	echo '<div class="centrer gras rouge_goco">'.
	_('Personne ne peut prendre votre place de grand chef').
	'</div>';
}

?>