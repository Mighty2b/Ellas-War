<?php

echo '<h1>Mes ventes</h1>';

$paquet->display();

$paquet->is_active_bonus_commerce();

if(empty($mesventes) or sizeof($mesventes) == 0) {
	echo '<div class="centrer">Vous n\'avez actuellement aucun lot en vente<br/></div>';
}
else {
	echo '<br/>
	<div class="ligne centrer">Taux de rachat des ressources : '.(100-$taux).'% (20.000 '.imress('drachme').' pour les '.imress('faveur').')</div><br/><br/>
	<table class="centrer_tableau"> <tr class=\'titre_tab centre\' >
	<td>&nbsp;Ressources&nbsp;</td>
		<td>&nbsp;Taux&nbsp;</td>
		<td>&nbsp;Prix&nbsp;</td>
		<td>&nbsp;Retour&nbsp;</td>
		<td>&nbsp;&nbsp;</td></tr>';
	foreach ($mesventes as $lot) {
		echo '<tr>
	<td>&nbsp; '.nbf($lot->nbvente).' '.imress($lot->typevente).' &nbsp;</td>
	<td>&nbsp;'.round($lot->tauxvente,6).'&nbsp;</td>
	<td>&nbsp;'.nbf($lot->nbvente*$lot->tauxvente).'&nbsp;</td>
	<td>&nbsp;'.date('d/m \à H\hi', $lot->temps).'&nbsp;</td>
	<td><a href=\'MesVentes-'.$lot->id.'\'>'.img('images/com/cart_delete.png','reprendre').'</a></td>' .
			'</tr>';
	}
	echo '</table>';
	}
	
  echo '<br/><br/>
<div class="ligne centrer"><a href="archivecommerce">Mes archives commerciales</a></div>';
 
?>