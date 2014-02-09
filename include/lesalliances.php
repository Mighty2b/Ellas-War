<?php

$i = 0;

$liste_alliances = $paquet->get_answer('get_listealliances')->{1};
$nombreDePages   = ceil($paquet->get_answer('get_listealliances')->{2}/20);

$attente = $paquet->get_infoj('attente');

$paquet->error('possible_contrat');
$paquet->error('proposer_contrat');
$paquet->error('demander_pacte');
$paquet->error('declarer_guerre');
$paquet->error('proposer_blocus');
	
echo '
<div id="cadre_milieu_petit">
	<div id="cadre_haut_petit"><img src="images/attaques/cross.png"
	                                alt="'._('Fermer').'" 
	                                title="'._('Fermer').'" 
	                                class="cursor" 
	                                style="margin-top:10px;margin-right:10px;" 
	                                onclick="javascript:fermer_cadre();"/></div>
	<div id="cadre_centre_petit">
	
	</div>
	<div id="cadre_bas_petit"></div>
</div>';

if(!empty($attente)) {
	echo '<div id="cadre_candidature"
	           class="ligne erreur centrer">'._(
	     'En attente dans l\'alliance ').
	     '<b>'.$attente.'</b> (<a href="javascript:annuler_candidature();"
	                              class="centre_armee" >'._('Annuler').'</a>)<br/><br/></div>';
}

if(!empty($resultat)) {
	echo '<div class="centrer">';
	if($resultat == true) {
		echo _('La guerre est déclarée ! La bataille commencera dans <b>24</b> heures');
	}
	else {
		echo _('Erreur dans la déclaration de la guerre, vérifier la cible');
	}
	echo '</div>';
}

if(sizeof($liste_alliances)) {
	$j = 7;
	echo '<table>
	<thead>
	<tr>
<td class="centrer">&nbsp;'.
img('images/alliance/membrealli.png', _('membre')).'&nbsp;</td>
<td class=\'centrer\'>&nbsp;'._('Nom').'&nbsp;</td>
<td class="centrer">&nbsp;'._('Chef').'&nbsp;</td>
<td class="centrer">&nbsp;'._('V').'&nbsp;</td>
<td class="centrer">&nbsp;'._('D').'&nbsp;</td>
<td class="centrer">&nbsp;'._('Effectifs').'&nbsp;</td>
<td class="centrer">&nbsp;'._('Profils').'&nbsp;</td>';

if($paquet->getalliance() == 0 && $paquet->get_infoj('lvl') >= $lvlminirejoindre) {
	echo '<td class="centrer">&nbsp;'._('Postuler').'&nbsp;</td>';
	$j++;
}
else {
	if($paquet->peut_pacte()) {
		echo'<td class="centrer">&nbsp;'._('Pacte').'&nbsp;</td>';
		$j++;
	}
	if($paquet->peut_guerre()) {
		echo '<td class="centrer">&nbsp;<font color=\'red\'><b>'._('Guerre').'</b></font>&nbsp;</td>';
		$j++;
	}
	if($paquet->peut_contrat()) {
		echo '<td class="centrer">&nbsp;<font color=\'red\'><b>'._('Contrats').'</b></font>&nbsp;</td>';
		$j++;
	}
	if($paquet->getid() == $paquet->getidchef()) {
		echo '<td class="centrer">&nbsp;<font color=\'red\'><b>'._('Blocus').'</b></font>&nbsp;</td>';
		$j++;
	}
}

echo '</tr></thead><tfoot></tfoot><tbody>';

	foreach($liste_alliances as $all) {
		$i++;

		echo '<td class="centrer">&nbsp;'.$all->nbmembre.'&nbsp;</td>
					<td>&nbsp;'.ucfirst(stripslashes($all->nom)).'&nbsp;</td>
					<td>&nbsp;<a href="'._('profilsjoueur').'-'.$all->idchef.'">'.ucfirst($all->login).'</a>&nbsp;</td>
					<td class="droite">&nbsp;'.$all->victoires.'&nbsp;</td>
					<td class="droite">&nbsp;'.$all->defaites.'&nbsp;</td>
	
		<td class="centrer">
		<a href="'._('membrealliance').'-'.$all->id.'">'.
		img('images/alliance/membrealli.png',_('effectifs')).'</a>
		</td>
		<td class="centrer">
		<a href=\''._('profilsalliance').'-'.$all->id.'\'>'.
		img('images/alliance/view_text.png',_('profils')).'</a>
		</td>';
		
		if($paquet->getalliance() == 0 && 
		   $paquet->get_infoj('lvl') >= $lvlminirejoindre) {
			echo '<td class="centrer">&nbsp;';
			
			if($all->peut_postuler) {
				echo '<a href=\''._('postuler').'-'.$all->id.'\'>'.
				img('images/alliance/flag_blue.png',_('postuler')).'</a>';
			}
			
			echo '&nbsp;</td>';
		}
		else {
			if($paquet->peut_pacte()) {
				echo '<td class="centrer">';
				if($all->peut_pacte) {
					echo '<img src="images/alliance/flag_green.png"
										 title="'._('Pacte').'"
										 alt="'._('Pacte').'" 
										 class="cursor" 
										 onclick="javascript:demande_pacte('.$all->id.');" />';
				}
				echo '</td>';
			}
			
			if($paquet->peut_guerre()) {
				echo '<td class="centrer">';
				if($all->peut_guerre) {
					echo '<img src="images/alliance/flag_red.png"
						 alt="'._('Déclarer').'" title="'._('Déclarer').'" 
						 class="cursor" 
						 onclick="javascript:declarer('.$all->id.');" />';
				}
				echo '</td>';
			}
			
			if($paquet->peut_contrat()) {
				echo '<td class="centrer">';
				if($all->peut_contrat) {
					echo '<img src="images/alliance/flag_pink.png"
						 alt="'._('Proposer un contrat').'"
						 title="'._('Proposer un contrat').'" 
						 class="cursor" 
						 onclick="javascript:declarer_contrat('.$all->id.');" />';
				}
				echo '</td>';
			}
			
			if($all->peut_blocus) {
				echo '<td class="centrer"><img src="images/alliance/flag_orange.png"
						 alt="'._('Poser un blocus"
						 title="'._('Poser un blocus').'" 
						 class="cursor').'" 
						 onclick="javascript:declarer_blocus('.$all->id.');" /></td>';
			}
		}
		echo '</tr>';
	}
	echo '</tbody></table>';
}
else {
	echo '<div class="erreur centrer">'.
	     _('Il n\'y a actuellement aucune alliance sur le jeu').
	     '<br/></div>';
}

if($nombreDePages > 1)
{
	echo '<div class="ligne centrer"><br/>';
	$pageread = $page;

	$num = $pageread - 3;
	$numl = $pageread + 2;

	if ($num < 1)
	{
	$num = 1;
	}

	if ($numl > $nombreDePages)
	{
		$numl = $nombreDePages;
	}

	if ($num > 1)
	{
		echo '<a href="'._('lesalliances').'-1">1</a>  ... ';
	}

	for ($i = $num ; $i <= $numl ; $i++)
	{
		if ($pageread == $i)
		{
		echo '<b>'.$i.'</b> ';
		}
		else
		{
				echo '<a href="'._('lesalliances').'-' . $i . '">' . $i . '</a> ';
		}
	}

	if ($numl < $nombreDePages)
	{
	echo '... <a href="'._('lesalliances').'-'.$nombreDePages.'">'.$nombreDePages.'</a> ';
	}
	echo '</div>';
}


if($paquet->get_infoj('alliance') == 0 && 
   $paquet->get_infoj('lvl') >= $paquet->get_answer('get_listealliances')->{3}) {
	echo '<div class="centrer erreur"><br/><a href="'._('creervotrealliance').'"
	                                     class="centre_armee" >'._('Creer votre alliance').'</a></div>';
}

echo '<script type="text/javascript">
function fermer_cadre() {
  $("#cadre_milieu_petit").hide("slow");
}
</script>';

?>