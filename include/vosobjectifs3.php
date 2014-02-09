<?php

echo '
<table class="none">
<tr>
	<td>
	<b>'._('Construction de 20 tours d\'observation').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[0].' '._('tours d\'observation').'</i>
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
	<b>'._('Recrutement de').' '.nbf(1000).' '._('frondeurs').'</b><br/>
	<i>'._('Actuellement').' : '.nbf($actu[3]).' '._('frondeurs').'</i>
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
	<b>100 victoires</b><br/>
	<i>'._('Actuellement').' : '.nbf($actu[2]).' '._('victoires').'
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
	<b>Toutes vos ressources en positif</b><br/>
	<i>'._('Actuellement').' : '.
	((!empty($obj[1]))?_('ressources en positif'):_('au moins une des ressources n\'est pas en positif')).'
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
</table>';

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input type="button"
	                                                value="'._('PASSER NIVEAU 4').'" 
	                                                onclick="javascript:passer_lvl(3);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 4').' :</h2>
<table class="none">
<tr>
	<td>'._(
	'Nouveaux bâtiments disponibles : <b>Ferme vinicole</b> et <b>Habitation</b>').
'</td>
</tr>
<tr><td>'._(
	'Nouvelle unité disponible : <b>Archer à arc court</b>').'</td></tr>
<tr><td>'._(
	'Plafond de votre trésor à').
	' <b>'.nbf(1000000).'</b> '.imress('drachme').'</td></tr>
</table>
</center>';

?>