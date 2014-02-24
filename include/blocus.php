<?php

include('include/menu_monalliance.php');

$do = $paquet->get_answer('info_blocus')->{1};

if(!empty($do)) {
	echo '<div class="centrer">';
	if($do->attaquant == $info->id) {
		$ennemis = $do->defenseur_nom;
	}
	else {
		$ennemis = $do->attaquant_nom;
	}
	
	if($do->declaration < $paquet->get_infoj('timestamp')) {
		echo '<br/><font color="red">'.
		_('Blocus en cours avec l\'alliance').' '.stripslashes($ennemis).'</font><br/><br/>';
	}
	else {
		echo '<br/><font color="red">'._(
		'Blocus dans peu de temps avec l\'alliance').' '.stripslashes($ennemis).'</font><br/><br/>';
	}
	
	echo _('Si vous abdiquez, aucune défaite ne sera ajoutée pour votre '.
	       'alliance, mais vous perdrez 10% de votre XP et l\'enemis '.
	       'gagnera la moitier de ces 10%.').'<br/><br/>';
	
	if($paquet->get_infoj('id') == $mon_alliance->id_chef) {
		if(!empty($do->vainqueur) && $do->vainqueur != $do->alliance) {
			echo '<a href="'._('blocus').'-accepter">'._('Accepter la paix').'</a> | 
						<a href="'._('blocus').'-refuser">'._('Refuser la paix').'</a>';
		}
		elseif(!empty($do->vainqueur)) {
			echo '<a href="'._('blocus').'-abdiquer">'._('Abdiquer').'</a>';
		}
		else {
			echo '<a href="'._('blocus').'-demander">'._('Demander la paix').'</a> | 
						<a href="'._('blocus').'-abdiquer">'._('Abdiquer').'</a>';
		}
	}
	echo '</div>';
}
else {
	echo '<div class="centrer rouge_goco gras"><br/><br/>'._(
	     'Votre alliance n\'a pour l\'instant aucun blocus en cours').
	     '</div>';
}

?>