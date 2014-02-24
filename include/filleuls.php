<?php

$liste = $paquet->get_answer('get_mes_filleuls')->{1};

if(sizeof($liste) > 0) {
	echo '<h1>Vos Filleuls</h1>
	<br/><table class="none">';
	foreach($liste as $do)	{
		if(!empty($do->timestamp)) {
			$image='<img src="images/utils/mb_connecter.png" 
			             alt="'._('Joueur Connecté').'" />';
		}
		else {
			$image='<img src="images/utils/mb_deconnecter.png" 
			             alt="'._('Joueur Déconnecté').'" />';
		}
		
		echo '<tr>
<td>&nbsp;'.$image.
    ' &nbsp;  <a href="'._('profilsjoueur').'-'.$do->id.'">'.
    $do->login.'</a>&nbsp;</td>
		<td>&nbsp;'.$do->lvl.'&nbsp;</t>
		<td>&nbsp;<a href="'._('nouveaumessage').'-'.$do->id.'">'.
		img('images/messagerie/ecrire_mp.png', _('Écrire')).'</a>';
		
		if($do->lvl < 6) {
			echo '<a href="'._('dons').'-'.$do->id.'"><img src="images/alliance/cotisations.png" 
			                                               alt="'._('Lui faire un don').'" /></a>';
		}
		
		echo '&nbsp;</td></tr>';
	}
	echo '</table><br/>';
}
else {
	echo '<h2 class="centrer">'._('Vous n\'avez pas de filleuls').'</h2>';
}

?>