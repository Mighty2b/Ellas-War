<?php

echo '
<table class="none">
<tr>
	<td>
	<b>'._('Construction de 20 ateliers de battage de la monnaie').'</b><br/>
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
	<b>'._('Construction de 10 fermes').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[1].' '._('fermes').'</i>
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
	<b>'._('Construction de 20 huttes').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[2].' '._('huttes').'</i>
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
	<b>Construction de 1 agora</b><br/>
	<i>'._('Actuellement').' : '.$actu[7].'  '._('agora').'</i>
	</td>
	<td class="centrer">';

	if(!empty($obj[7])) {
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
	<b>20 victoires</b><br/>
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
	<b>'.nbf(6000).' '._('de défense').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[6].' '._('de défense').'
	</td>
	<td class="centrer">';
	
	if(!empty($obj[6])) {
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
	<i>'._('Actuellement').' : '.((!empty($obj[4]))?_('ressources en positif'):_('au moins une des ressources n\'est pas en positif')).'
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
	<b>'.nbf(200000).' '.imress('drachme').' '._('dans votre trésor').'</b><br/>
	<i>'._('Actuellement').' : '.nbf(floor($actu[5])).' '.imress('drachme').' '._('dans votre trésor').'</i>
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
	<b>'._('Finir toutes les missions').'</b><br/>
	<i>'._('Actuellement').' : '._('mission').' '.$actu[8].' '._('sur 10').'</i>
	</td>
	<td class="centrer">';
	
	if(!empty($obj[8])) {
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
	                                                value="'._('PASSER NIVEAU 2').'" 
	                                                onclick="javascript:passer_lvl(1);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 2').' :</h2>
<table class="none">
<tr><td>'._(
'Nouveaux bâtiments disponibles : <b>antre des espions</b>, <b>camp militaire</b> et <b>carrière</b>').
'</td></tr>
<tr><td>'._(
'Nouvelles unités disponibles : <b>espion</b> et <b>peltaste</b>').
'</td></tr>
<tr><td>'._(
'Plafond de votre trésor à').
' <b>'.nbf(600000).'</b> '.imress('drachme').'</td></tr>
<tr><td>'._('Bonus de').
' <b>'.nbf(100000).'</b> '.imress('drachme').'</td></tr>
<tr><td>'.
_('Nouveaux jeux : <b>Javelot</b>, <b>Jeux de dés</b>, <b>Batailles navales</b>, <b>Biges</b>, <b>Quadriges</b>').
'</td></tr>
</table>
</center>';

?>