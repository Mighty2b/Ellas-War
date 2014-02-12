<?php

if($paquet->peut_commerce() == false) {
	echo '<div class="erreur">';
	echo display_error(95);
	echo '</div>';
}
else {

	$mesventes = $paquet->get_answer('mes_ventes')->{1};
	$taux      = $paquet->get_taux_rachat();
	
	if($paquet->get_answer('mes_ventes')->{3} == true) {
		echo '<div class="erreur">';
		echo display_error(228);
		echo '</div>';
	}
	else {
		
		echo '<h1>'._('Mes ventes').'</h1>';
		
		$paquet->error('acheter_lot');
		
		$paquet->is_active_bonus_commerce();
		
		if(empty($mesventes) or sizeof($mesventes) == 0) {
			echo '<div class="centrer">'._('Vous n\'avez actuellement aucun lot en vente').
			     '<br/></div>';
		}
		else {
			echo '<br/>
			<div class="ligne centrer">';
			printf(_(
"Taux de rachat des ressources : %s%% (20.000 %s pour les %s)"), (100-$taux), imress('drachme'), imress('faveur'));

echo '</div><br/><br/>
			<table class="centrer_tableau">
			<tr class=\'titre_tab centre\' >
				<td>&nbsp;'._('Ressources').'&nbsp;</td>
				<td>&nbsp;'._('Taux').'&nbsp;</td>
				<td>&nbsp;'._('Prix').'&nbsp;</td>
				<td>&nbsp;'._('Retour').'&nbsp;</td>
				<td>&nbsp;&nbsp;</td>
			</tr>';
			
			foreach ($mesventes as $lot) {
				echo '<tr>
			<td>&nbsp; '.nbf($lot->nbvente).' '.imress($lot->typevente).' &nbsp;</td>
			<td>&nbsp;'.round($lot->tauxvente,6).'&nbsp;</td>
			<td>&nbsp;'.nbf($lot->nbvente*$lot->tauxvente).'&nbsp;</td>
			<td>&nbsp;'.display_date($lot->temps).'&nbsp;</td>
			<td><a href=\''._('mesventes').'-'.$lot->id.'\'>'.img('images/com/cart_delete.png',_('reprendre')).'</a></td>' .
					'</tr>';
			}
			echo '</table>';
			}
			
		  echo '<br/><br/>
		<div class="ligne centrer"><a href="'._('archivecommerce').'">'._('Mes archives commerciales').'</a></div>';
		 
	}
}

?>