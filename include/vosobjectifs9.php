<?php

echo '
<table class="none">
<tr>
	<td>
	<b>'._(
	'Construction de 60 ateliers de battage de la monnaie').
	'</b><br/>
	<i>'._('Actuellement').' : '.$actu[0].
	' '._('ateliers de battage de la monnaie').'</i>
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
	<b>'._('Recrutement de 10 000 hoplites à cheval').'</b><br/>
	<i>'._('Actuellement').' : '.nbf($actu[1]).' '._('hoplites à cheval').'</i>
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
	<b>'._('Construction de 50 ateliers de pressage').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[2].' '._('ateliers de pressage').'</i>
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
	<b>'._('Construction de 20 mines d\'or').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[6].' '._('mines d\'or').'</i>
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
	<b>'._('1 000 victoires').'</b><br/>
	<i>'._('Actuellement').' : '.nbf($actu[4]).' '._('victoires').'
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
	<b>'.nbf(100000).' '._('XP').'</b><br/>
	<i>'._('Actuellement').' : '.nbf(round($actu[3])).' XP
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
	<i>'._('Actuellement').' : '.((!empty($obj[5]))?_('ressources en positif'):_('au moins une des ressources n\'est pas en positif')).'
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
</table>';

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input type="button"
	                                                value="'._('PASSER NIVEAU 10').'" 
	                                                onclick="javascript:passer_lvl(9);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 10').' :</h2>
<table class="none">
<tr>
	<td>'._('Nouveau bâtiment disponible : <b>Grotte maudite</b> et <b>Tour à miroir</b>').'</td>
</tr>
	<tr>
		<td>'._('Accés à l\'autel des dieux').'</td>
	</tr>
	<tr>
		<td>'._('Nouvelle unité disponible : <b>Hoplite d\'élite</b>').'</td>
	</tr>
	<tr>
		<td>'._('Possibilité de bâtir un nouveau temple').'</td>
	</tr>
</table>
</center>';

?>