<?php

echo '
<table class="none">
<tr>
	<td>
	<b>'._('Construction de 25 ateliers de battage de la monnaie').'</b><br/>
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
	<b>'._('Construction de 10 carrières').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[4].' '._('carrières').'</i>
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
	<b>'._('Construction de votre premier temple').'</b><br/>
	<i>'._('Actuellement').' :';
		if(!empty($obj[5])) {
			if($actu[5] == 'hermes') {
				echo 'Temple d\'Hermès';
			}
			elseif($actu[5] == 'apollon') {
				echo 'Temple d\'Apollon';
			}
			else {
				echo 'Temple de Déméter';
			}
		}
		else {
			echo 'Aucun temple';
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
	<b>'._('50 victoires').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[1].' '._('victoires').'
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
	<b>'._('Toutes vos ressources en positif').'</b><br/>
	<i>'._('Actuellement').' : '.
	((!empty($obj[2]))?_('ressources en positif'):_('au moins une des ressources n\'est pas en positif')).'
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
	<b>'.nbf(400000).' '.imress('drachme').' '._('dans votre trésor').'</b><br/>
	<i>'._('Actuellement').' : '.
	nbf(floor($actu[3])).' '.imress('drachme').' '._('dans votre trésor').'</i>
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
	                                                value="'._('PASSER NIVEAU 3').'" 
	                                                onclick="javascript:passer_lvl(2);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 3').' :</h2>
<table class="none">
<tr>
	<td>'._(
'Nouveaux bâtiments disponibles : <b>École d\'archers</b> et <b>Tour d\'observation').
'</b></td>
</tr>
<tr><td>'._(
'Nouvelle unité disponible : <b>Frondeur</b>').'</td></tr>
<tr><td>'._(
'Plafond de votre trésor à ').
'<b>'.nbf(800000).'</b> '.imress('drachme').'</td></tr>
<tr><td>'._(
'Bonus de').' <b>'.nbf(100000).'</b> '.imress('drachme').'</td></tr>
</table>
</center>';

?>