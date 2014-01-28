<?php

$liste_noire = $paquet->get_answer('get_listenoire')->{1};

if(sizeof($liste_noire) > 0) {
	echo '<h1>Liste noire</h1>
<br/><table class="none">';
	foreach($liste_noire as $do) {
		if(!empty($do->timestamp)) {
			$image='<img src="images/utils/mb_connecter.png" 
			             alt="'._('Joueur Connecté').'" />';
		}
		else {
			$image='<img src="images/utils/mb_deconnecter.png" 
			             alt="'._('Joueur Déconnecté').'" />';
		}
		
		if($do->mode == 1) {
			$statu = _('Ignoré');
		}
		else {
			$statu = _('Filtré');
		}
			
		echo '<tr>
		<td>&nbsp;'.$image.
		'&nbsp;&nbsp;<a href="profilsjoueur-'.$do->id.'" 
		                class="non_souligne">'.$do->login.'</a>&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;'.$statu.'&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;<a href="'._('listenoire').'-'.$do->id.'-'._('supprimerl').'">'.
		img('images/utils/supprimer_mp.png', _('Supprimer')).'</a>&nbsp;&nbsp;</td>
		</tr>';
	}
		echo '</table>';
}
else {
	echo '<h2 class="centrer">'._('Votre liste noire est vide').'</h2>';
}

?>