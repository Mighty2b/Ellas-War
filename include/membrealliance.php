<?php

$all = $paquet -> get_answer('profils_alliance')->{1};

if(empty($all) or is_numeric($all)) {
	redirect('allianceexistepas');
}

echo '<h1>'.$all -> nom.'</h1>';

echo '<br/>
<table>
	<thead>
	<tr>
		<td class="centrer"></td>
		<td class="centrer">&nbsp;'._('Niveau').'&nbsp;</td>
		<td class="centrer">&nbsp;'._('XP').'&nbsp;</td>
		<td class="centrer">&nbsp;'._('Rang').'&nbsp;</td>
		<td class="centrer">&nbsp;'._('Terrain').'&nbsp;</td>
	</tr>
	</thead><tfoot></tfoot><tbody>';
$i=0;
$liste = $all->membres;
foreach ($liste as $do) {

	if(!empty($do->timestamp)) {
		$image='<img src="images/utils/mb_connecter.png"
		             alt="'._('Joueur Connecté').'" />';
	}
	else {
		$image='<img src="images/utils/mb_deconnecter.png" 
		             alt="'._('Joueur Déconnecté').'" />';
	}
	
	echo '<tr><td class="gauche">&nbsp;'.$image.'&nbsp;&nbsp;';
	if($do->statu == 1) {
		if(!empty($do->temps)) {
			echo '<a href="'._('profilsjoueur').'-'.$do->id.'" class="lien">'.
			     ucfirst($do->login).
			     '</a> <span class="sortie_urgence"  title="'.
			     date('d/m/y', $do->temps).'">*</span>';
		}
		else {
			echo '<a href="'._('profilsjoueur').'-'.$do->id.'" class="lien">'.
			ucfirst($do->login).'</a>';
		}
	}
	elseif($do->statu == 2) {
		echo '<a href="profilsjoueur-'.$do->id.'"
		         class="lien joueur_manque">'.ucfirst($do->login).'</a>';
	}
	elseif($do->statu == 4)	{
		if(!empty($do->temps)) {
			echo '<a href="profilsjoueur-'.$do->id.'"
			         class="lien joueur_pause">'.ucfirst($do->login).
			     '<span class="sortie_urgence"
			            title="'.date('d/m/y', $do->temps).'">*</span></a>';
		}
		else {
			echo '<a href="profilsjoueur-'.$do->id.'"
			         class="lien joueur_pause">'.ucfirst($do->login).'</a>';
		}
	}
	else {
		echo '<a href="profilsjoueur-'.$do->id.'"
		         class="lien joueur_bloque">'.ucfirst($do->login).'</a>';
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
	echo '&nbsp;</td>
	      <td class="droite">&nbsp;'.nbf($do->terrain).'&nbsp;</td></tr>';
$i++;
}

echo '</tbody></table><br/>
<div class="centrer">
	<a href="'._('profilsalliance').'-'.$all -> id.'"
	   class="lien_rouge">'._('Profil de l\'alliance').'</a>
</div>';

echo '
<script type="text/javascript">
    $(document).ready(function() {
        document.title = \''._('Membres de l\'alliance').' '.$all -> nom.'\';
    });
</script>';

?>