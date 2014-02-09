<?php

echo '
<table class="none">
<tr>
	<td>
	<b>'._(
	'Construction de 40 ateliers de battage de la monnaie').
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
	<b>'._('Recrutement de 6\'000 hippeis').'</b><br/>
	<i>'._('Actuellement').' : '.nbf($actu[1]).' '._('hippeis').'</i>
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
	<b>'._('350 victoires').'</b><br/>
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
	<b>'._('Construction de votre deuxième temple').'</b><br/>
	<i>'._('Actuellement :').' '; 
		if(!empty($obj[2])) {
			if($actu[2] == 'ares') {
				echo _('Temple d\'Arès');
			}
			else {
				echo _('Temple d\'Athéna');
			}
		}
		else {
			echo _('Aucun temple');
		}
		
		echo '</i>
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
	<b>'._('Toutes vos ressources en positif').'</b><br/>
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
</table>';

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input type="button"
	                                                value="'._('PASSER NIVEAU 7').'" 
	                                                onclick="javascript:passer_lvl(6);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 7').' :</h2>
<table class="none">
	<tr>
		<td>'._('Nouvelle unité disponible : <b>Archer à cheval</b>').'</td>
	</tr>
</table>
</center>';

?>