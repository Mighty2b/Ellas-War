<?php

include('donnees/unites.php');

$liste_vague = array();
$liste = '';
$tab = array();
$tableau = '<table width="100%" class="none"><tr>';
$i = 0;
$liste_unites = $paquet->get_infoj('liste_unites');
$vague = unserialize($paquet->get_answer('get_vagues2')->{1});
$largeur = 4;

foreach($liste_unites as $value) {
	if(($value -> attaque > 0) && ($value -> nb > 0)) {
		$liste .= $value -> nb.' '.$unites[$value->nom2]['nom'].'<br/>';
		$tab[] = $value->nom2;
	}
}

$nb_vague = sizeof($vague);
$nb_unite = sizeof($tab);
$total = 0;

foreach($tab as $unite) {
	$i++;
	$tableau .= '<td>
	<table width="100%" class="none">
		<tr>
			<td class="gras centrer">'.$unites[$unite]['nom'].'</td>
		</tr>';
	for($j=0;$j<$nb_vague;$j++) {
		$total += ($vague[$j][$unite]*$liste_unites->$unite->attaque);
		$tableau .= '<tr>
		<td class="centrer"><input type="text"
		                           value="'.$vague[$j][$unite].'"
		                           size="6"
		                           name="'.$unite.'[]"/></td>
		</tr>';
	}
	$tableau .= '</tbody></table>
	</td>';
	
	if($i%$largeur == 0) {
		$tableau .= '<td><table width="100%"
		                        class="none"><tr><td class="case_suppr_strat">&nbsp;</td></tr>';
		
		for($j=0;$j<$nb_vague;$j++) {
			$tableau .= '<tr>
			<td>
			&nbsp;'.nbf($total).' '.
			img('images/attaques/dague.png', _('attaque')).'&nbsp;</td>
			<td class="droite case_suppr_strat">&nbsp;
&nbsp;<a href="'._('strategieoffensive').'-'.($j+1).'">'.
img('images/utils/supprimer_mp.png', _('supprimer')).'</a>&nbsp;
			</td></tr>';
			$total = 0;
		}
		
		$tableau .= '</table></td>';
		if($i < $nb_unite) {
			$tableau .= '</tr><tr>';
		}
		else {
			$tableau .= '</tr>';
		}
	}
}

if($i%$largeur != 0) {
  while($i%$largeur != 0) {
	  $tableau .='<td></td>';
	  $i++;
  }

  $tableau .= '<td>
  		<table width="100%"
  		       class="none"><tr><td>&nbsp;</td><td class="case_suppr_strat">&nbsp;</td></tr>';

  for($j=0;$j<$nb_vague;$j++) {
	  $tableau .= '<tr>
	  <td>&nbsp;'.nbf($total).' '.
	  img('images/attaques/dague.png', _('attaque')).'&nbsp;</td>
	  <td class="case_suppr_strat droite">&nbsp;<a href="'._(
		'strategieoffensive').'-'.($j+1).'"><img src="images/utils/supprimer_mp.png" 
		                                         alt="'._('supprimer').'" /></a>&nbsp;</td></tr>';
  }

  $tableau .= '</table></td></tr>';
}

$paquet->error('maj_vagues2');

echo '<h1>'._('Stratégie offensive').'</h1><br/>';

if($nb_vague < 50) {
echo '<div style="text-align:right;"> <a href="'._(
		'strategieoffensive').'-0">'._('Ajouter une vague').'</a> </div>';
}

echo '<form method="post" action="#">
<table width="100%" class="none"><tr><td valign="top"><br/>'.$liste.'</td>
<td>
'.$tableau.'
<tr>
<td></td><td></td>
<td class="centrer">
	<div class="bouton_classique"><input type="submit"
	                                     name="Enregistrer" 
	                                     value="'._('Enregistrer').'"/>
</td>
<td></td><td></td>
</table>
</td></tr>
</table></form>';

if($nb_vague < 50) {
	echo '<div style="text-align:right;"> <a href="'._(
		'strategieoffensive').'-999999">'._('Ajouter une vague').'</a> </div>';
}

?>