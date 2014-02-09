<?php

echo '
<table class="none">
<tr>
	<td>
	<b>'._(
	'Construction de 45 ateliers de battage de la monnaie').'</b><br/>
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
	<b>'._('Recrutement de 6 000 archers à cheval').'</b><br/>
	<i>'._('Actuellement').' : '.nbf($actu[1]).' '.
	_('archers à cheval').'</i>
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
	<b>'._('500 victoires').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[2].' victoires
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
	<b>'.nbf(20000).' '._('XP').'</b><br/>
	<i>'._('Actuellement').' : '.nbf(round($actu[4])).' XP
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
	<b>'._('Toutes vos ressources en positif').'</b><br/>
	<i>'._('Actuellement').' : '.((!empty($obj[3]))?'ressources en positif':'au moins une des ressources n\'est pas en positif').'
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
	                                                value="'._('PASSER NIVEAU 8').'" 
	                                                onclick="javascript:passer_lvl(7);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 8').' :</h2>
<table class="none">
<tr>
	<td>'._('Nouveau bâtiment disponible : <b>Tour de garde</b>').'</td>
</tr>
	<tr>
		<td>'._('Nouvelle unité disponible : <b>Hoplite</b>').'</td>
	</tr>
	<tr>
		<td>'._('Possibilité de bâtir un nouveau temple').'</td>
	</tr>
</table>
</center>';

?>