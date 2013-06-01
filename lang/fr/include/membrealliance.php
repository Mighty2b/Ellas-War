<?php

echo '<br/>
<table class=\'tableau2 centrer_tableau\'>
	<tr class=\'tableau_header\'>
		<td class="centrer">&nbsp;Pseudo&nbsp;</td>
		<td class="centrer">&nbsp;Niveau&nbsp;</td>
		<td class="centrer">&nbsp;XP&nbsp;</td>
		<td class="centrer">&nbsp;Rang&nbsp;</td>
		<td class="centrer">&nbsp;Terrain&nbsp;</td>
	</tr>';
$i=0;
$liste = $all->membres;
foreach ($liste as $do) {
	echo '<tr class="tableau_fond2"><td colspan="5"></td></tr>';
	
	if(!empty($do->timestamp)) {
		$image='<img src="images/joueurs/mb_connecter.png" alt="Joueur Connecté" />';
	}
	else {
		$image='<img src="images/joueurs/mb_deconnecter.png" alt="Joueur Déconnecté\" />';
	}
	
	echo '<tr class="tableau_fond'.($i%2).'"><td class="gauche">&nbsp;'.$image.'&nbsp;&nbsp;';
	if($do->statu == 1) {
		if(!empty($do->temps)) {
			echo '<a href=\'profilsjoueur-'.$do->id.'\' class="lien">'.ucfirst($do->login).'</a> <span class="sortie_urgence"  title=\''.date('d/m/y', $do->temps).'\'>*</span>';
		}
		else {
			echo '<a href=\'profilsjoueur-'.$do->id.'\' class="lien">'.ucfirst($do->login).'</a>';
		}
	}
	elseif($do->statu == 2) {
		echo '<a href=\'profilsjoueur-'.$do->id.'\' class="lien joueur_manque">'.ucfirst($do->login).'</a>';
	}
	elseif($do->statu == 4)	{
		if(!empty($do->temps)) {
			echo '<a href=\'profilsjoueur-'.$do->id.'\' class="lien joueur_pause">'.ucfirst($do->login).'<span class="sortie_urgence"  title=\''.date('d/m/y', $do->temps).'\'>*</span></a>';
		}
		else {
			echo '<a href=\'profilsjoueur-'.$do->id.'\' class="lien joueur_pause">'.ucfirst($do->login).'</a>';
		}
	}
	else {
		echo '<a href=\'profilsjoueur-'.$do->id.'\' class="lien joueur_bloque">'.ucfirst($do->login).'</a>';
	}
	echo '&nbsp;&nbsp;&nbsp;</td>
	<td class="centrer">&nbsp;'.($do->lvl).'&nbsp;</td>
	<td class="droite">&nbsp;'.nbf($do->points).'&nbsp;</td>
	<td class="gauche">&nbsp;';
	if(empty($do->nom) && ($do->id == $do->chef)) {
		echo 'Grand chef';
	}
	else {
		echo stripslashes($do->nom);
	}
	echo '&nbsp;</td><td class="droite">&nbsp;'.nbf($do->terrain).'&nbsp;</td></tr>';
$i++;
}

echo '</table><br/>
<div class="centrer">
	<a href=\'profilsalliance-'.$all -> id.'\' class="lien_rouge">Profil de l\'alliance</a>
</div>';
?>