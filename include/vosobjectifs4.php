<?php

echo '
<table class="none">
<tr>
	<td>
	<b>'._(
	'Construction de 30 ateliers de battage de la monnaie').
	'</b><br/>
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
	<b>'._(
	'Construction de 50 tours d\'observation').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[5].' '._('tours d\'observation').'</i>
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
	<b>'._(
	'Recrutement de 2\'000 archers à arc court').'</b><br/>
	<i>'._('Actuellement').' : '.nbf($actu[1]).' '._('archers à arc court').
	'</i>
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
	<b>'._(
	'Construction de 25 fermes vinicoles').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[2].' '._(
	'fermes vinicoles').'</i>
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
	<b>'._('160 victoires').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[3].' '._('victoires').'
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
	                                                value="'._('PASSER NIVEAU 5').'" 
	                                                onclick="javascript:passer_lvl(4);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 5').' :</h2>
<table class="none">
<tr><td>'._(
	'Nouvelle unité disponible : <b>Archer à arc long</b>').
'</td></tr>
<tr><td>'._(
	'Plafond de votre trésor à').
	' <b>'.nbf(2000000).'</b> '.imress('drachme').'</td></tr>
</table>
</center>';

?>