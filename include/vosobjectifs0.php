<?php

echo '
<table class="none">
<tr>
	<td>
	<b>'._('Construction de 10 ateliers de battage de la monnaie').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[0].' '._('ateliers de battage de la monnaie').'</i>
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
	<b>'._('Construction de 3 mines d\'argent').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[1].' '._('mines d\'argent').'</i>
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
	<b>'._('Construction de 6 mines de fer').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[3].' '._('mines de fer').'</i>
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
	<b>'._('Construction de 10 puits').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[2].' '._('puits').'</i>
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
	<b>'._('Construction de 10 scieries').'</b><br/>
	<i>'._('Actuellement').' : '.$actu[4].' '._('scieries').'</i>
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
	<b>Construction de 10 tours de guet</b><br/>
	<i>'._('Actuellement').' : '.$actu[7].' '._('tours de guet').'</i>
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
	<b>Toutes vos ressources en positif</b><br/>
	<i>'._('Actuellement').' : '.((!empty($obj[5]))?'ressources en positif':'au moins une des ressources n\'est pas en positif').'</i>
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
	<b>'.nbf(50000).' '.imress('drachme').' '._('dans votre trésor').'</b><br/>
	<i>'._('Actuellement').' : '.nbf(floor($actu[6])).' '.imress('drachme').' '._('dans votre trésor').'</i>
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
	<b>Finir toutes les missions</b><br/>
	<i>'._('Actuellement').' : mission '.$actu[8].' '._('sur 15').'</i>
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
	echo '<br/>
	<div class="bouton_classique"><input type="button" 
	                                     value="'._('Passer niveau 1').'" 
	                                     onclick="javascript:passer_lvl(0);"/></div>';
}

echo '
<h2 class="centrer">'._('Après votre passage niveau 1').'</h2>
<table class="none">
<tr>
	<td>'._('Nouveaux bâtiments disponibles : <b>ferme</b> et <b>hutte</b>').'</td>
</tr>
<tr>
	<td>'._('Nouvelles unités disponibles : <b>volontaire</b> et <b>homme d\'argent</b>').'</td>
</tr>
<tr>
	<td>'._('Plafond de votre trésor à').' <b>'.nbf(400000).'</b> '.imress('drachme').'</td>
</tr>
<tr>
	<td>'._('Bonus de').' <b>'.nbf(10000).'</b> '.imress('nourriture').' '._('et').' <b>'.nbf(50000).'</b> '.imress('drachme').'</td>
</tr>
<tr>
	<td>'._('50 <b>Espions</b>').'</td>
</tr>
<tr>
	<td><b>'._('Nouvelles missions').'</b></td>
</tr>
<tr>
	<td>'._('Nouveau jeu : Le <b>loto</b>').'</td>
</tr>
</table>';

?>