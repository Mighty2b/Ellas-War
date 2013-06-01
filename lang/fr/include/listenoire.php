<?php

if(sizeof($liste_noire) > 0) {
	echo '<h1>Ma liste noire</h1>
<br/><table class="centrer_tableau">';
	foreach($liste_noire as $do) {
		if(!empty($do->timestamp))
			$image='<img src="images/joueurs/mb_connecter.png" alt="Joueur Connecté" />';
		else
			$image='<img src="images/joueurs/mb_deconnecter.png" alt="Joueur Déconnecté\" />';
		
		if($do->mode == 1)
			$statu = 'Ignoré';
		else
			$statu = 'Filtré';
			
			echo '<tr>
			<td>&nbsp;'.$image.
			'&nbsp;&nbsp;<a href=\'profilsjoueur-'.$do->id.'\' class="non_souligne">'.$do->login.'</a>&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;'.$statu.'&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;<a href="ListeNoire-'.$do->id.'-supprimerl">'.
			img('images/joueurs/supprimer_mp.png', 'Supprimer').'</a>&nbsp;&nbsp;</td>
			</tr>';
	}
		echo '</table>';
}
else {
	echo '<h2 class="centrer">Votre liste noire est vide</h2>';
}

?>