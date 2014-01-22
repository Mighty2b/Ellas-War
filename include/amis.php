<?php

$liste  = $paquet->get_answer('get_mes_amis')->{1};
$taille = sizeof($liste);

if($taille > 30) {
	$npl = 3;
}
elseif($taille > 15) {
	$npl = 2;
}
else {
	$npl = 1;
}

if($taille > 0) {
	echo '<h1>'._('Amis').'</h1>
			<br/><br/>
			<table class="none">';
	
	$i = 0;
	foreach($liste as $do) {
		
		if($i%$npl == 0) {
			echo '<tr>';
		}
		
		if(!empty($do->timestamp)) {
			$image='<img src="images/utils/mb_connecter.png"
			             alt="'._('Joueur Connecté').'" />';
		}
		else {
			$image='<img src="images/utils/mb_deconnecter.png
			             alt="'._('Joueur Déconnecté').'" />';
		}
		
		echo '
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$image.
' &nbsp;  <a href="'._('profilsjoueur').'-'.$do->id.'">'.$do->login.'</a>&nbsp;</td>
<td>&nbsp;<a href="'._('messagerie').'&action='._('Nouveaumessage').'-'.$do->id.'">'.
img('images/utils/ecrire_mp.png', _('Écrire')).'</a> 
<a href="'._('amis').'-'.$do->id.'-'._('supprimer').'">'.
img('images/utils/supprimer_mp.png', _('Supprimer')).'</a>&nbsp;</td>';

		$i++;
		if($i%$npl == 0) {
			echo '</tr>';
		}
	}
	
	if($i > 0 && $i < $npl) {
		for($i;$i<=$npl;$i++) {
			echo '<td></td>';
		}
		echo '</tr>';
	}
	
	echo '</table>';
}
else {
	echo '<h2 class="centrer">'._('Votre liste d\'amis est vide').'</h2>';
}

?>