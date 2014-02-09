<?php

echo '
<table class="none">
<tr>
	<td>
	<b>Construction de 35 ateliers de battage de la monnaie</b><br/>
	<i>'._('Actuellement').' : '.$actu[0].' '._(
	'ateliers de battage de la monnaie').'</i>
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
	<b>'._('Recrutement de 5\'000 archers à arc long').'</b><br/>
	<i>'._('Actuellement').' : '.nbf($actu[1]).' '.
	_('archers à arc long').'</i>
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
	<b>'._('Construction de 250 habitations').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[2].' '._('habitations').'</i>
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
	<b>'._('250 victoires').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[3].' victoires
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
<tr>
	<td>
	<b>'._('Toutes vos ressources en positif').'</b><br/>
	<i>'._('Actuellement').' : '.
	((!empty($obj[4]))?_('ressources en positif'):_('au moins une des ressources n\'est pas en positif')).'
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
</table>';

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input type="button"
	                                                value="'._('PASSER NIVEAU 6').'" 
	                                                onclick="javascript:passer_lvl(5);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 6').' :</h2>
<table class="none">
<tr>
	<td>'._(
	'Nouveau bâtiment disponible : <b>École de cavalerie').
'</b></td>
</tr>
	<tr>
		<td>'._(
	'Nouvelle unité disponible : <b>Hippeis</b>').
'</td>
	</tr>
	<tr>
		<td>'._(
	'Possibilité de bâtir <b>un nouveau temple</b>').
'</td>
	</tr>
	<tr>
		<td>'._(
	'Suppression du plafond de votre <b>trésor</b>').
'</td>
	</tr>
	<tr>
	  <td>'._(
	'Appui d\'<b>Hébé</b>').
'</td>
	</tr>
</table>
</center>';

?>