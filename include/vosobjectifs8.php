<?php

echo '
<table class="none">
<tr>
	<td>
	<b>'._('Construction de 50 ateliers de battage de la monnaie').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[0].' '.
	_('ateliers de battage de la monnaie').'</i>
	</td>
	<td class="centrer">';

	if(!empty($obj[0])) {
		echo '<b><font color=\'green\'>&nbsp;'._('Objectif accompli').'&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;'._('Objectif non accompli').'&nbsp;</font></b>';
	}
	
	echo '
	</td>
</tr>
<tr>
	<td>
	<b>'._('Recrutement de 5\'000 hoplites').'</b><br/>
	<i>'._('Actuellement').' : '.nbf($actu[1]).' '._('hoplites').'</i>
	</td>
	<td class="centrer">';

	if(!empty($obj[1])) {
		echo '<b><font color=\'green\'>&nbsp;'._('Objectif accompli').'&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;'._('Objectif non accompli').'&nbsp;</font></b>';
	}
	
	echo '
	</td>
</tr>
<tr>
	<td>
	<b>'._('750 victoires').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[4].' victoires
	</td>
	<td class="centrer">';

	if(!empty($obj[4])) {
		echo '<b><font color=\'green\'>&nbsp;'._('Objectif accompli').'&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;'._('Objectif non accompli').'&nbsp;</font></b>';
	}
	
	echo '
	</td>
</tr>
<tr>
	<td>
	<b>'.nbf(50000).' '._('XP').'</b><br/>
	<i>'._('Actuellement').' : '.nbf(round($actu[2])).' '._('XP').'
	</td>
	<td class="centrer">';

	if(!empty($obj[2])) {
		echo '<b><font color=\'green\'>&nbsp;'._('Objectif accompli').'&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;'._('Objectif non accompli').'&nbsp;</font></b>';
	}
	
	echo '
	</td>
</tr>
<tr>
	<td>
	<b>Construction de votre troisième temple</b><br/>
	<i>Actuellement :';
		if(!empty($obj[5])) {
			if($actu[5] == 'artemis') {
				echo _('Temple d\'Artémis');
			}
			elseif($actu[5] == 'hephaistos') {
				echo _('Temple d\'Héphaïstos');
			}
			else {
				echo _('Temple de Dionysos');
			}
		}
		else {
			echo _('Aucun temple');
		}
		
		echo '</i>
	</td>
	<td class="centrer">';

	if(!empty($obj[5])) {
		echo '<b><font color=\'green\'>&nbsp;'._('Objectif accompli').'&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;'._('Objectif non accompli').'&nbsp;</font></b>';
	}
	
	echo '
	</td>
</tr>
<tr>
	<td>
	<b>'._('Toutes vos ressources en positif').'</b><br/>
	<i>'._('Actuellement').' : '.((!empty($obj[3]))?_('ressources en positif'):_('au moins une des ressources n\'est pas en positif')).'
	</td>
	<td class="centrer">';

	if(!empty($obj[3])) {
		echo '<b><font color=\'green\'>&nbsp;'._('Objectif accompli').'&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;'._('Objectif non accompli').'&nbsp;</font></b>';
	}
	
	echo '
	</td>
</tr>
</table>';

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input type="button"
	                                                value="'._('PASSER NIVEAU 9').'" 
	                                                onclick="javascript:passer_lvl(8);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 9').' :</h2>
<table class="none">
<tr>
	<td>'._(
	'Nouveaux bâtiments disponibles : <b>Académie</b>, <b>Atelier de pressage</b>, <b>Mines d\'or</b> et <b>Palais').
'</b></td>
</tr>
	<tr>
		<td>'._('Nouvelle unité disponible').' : <b>'._('Hoplite à cheval').'</b></td>
	</tr>
</table>
</center>';

?>
