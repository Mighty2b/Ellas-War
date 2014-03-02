<?php
if($paquet->peut_commerce() == false) {
	$paquet->display(95);
}
else {
	
	$temps = $paquet->get_answer('licence')->{1};
	$prix_licences = $paquet->get_answer('licence')->{2};
	
	if(empty($temps)) {
		echo '<h1>'._('Acheter une licence').'</h1><br/>';
	}
	else {
		echo '<h1>'._('Prolonger une licence').'</h1>
				<br/>
				<div class="ligne centrer">
				<b>'._('Votre licence finie').'</b> '.display_date($temps, 4).'<br/><br/>
				</div>';
	}
	
	$paquet->error('achat_licence', 1);
	
	echo '<div class="ligne centrer">'._(
	     'La licence de grand commerçant vous permet d\'effectuer des ventes flash et de vendre au débarras.').'<br/>'._(
	     'Cette licence bien que payante est limitée dans le temps, vous devez donc la renouveler régulièrement.').
	     '<br/><br/></div>
	
	<table><thead>
	<tr class="titre_tab">
		<td>'._('Temps').'</td>
		<td>'._('Prix').'</td>
		<td>'._('Acheter').'</td>
	</tr></thead><tfoot></tfoot><tbody>';
	
		if(in_array('hermes', $paquet->get_infoj('temples')))
			$coef = 0.5;
		else
			$coef = 1;
	
		foreach($prix_licences as $valeur) {
			if(!empty($valeur->num)) {
				echo '<tr>
				<td align="left">&nbsp;'.$valeur->text.'&nbsp;</td>
				<td class="droite">&nbsp;'.nbf($valeur->prix*$coef).' '.imress('drachme').'&nbsp;</td>
				<td class="centrer">&nbsp;<a href="'._('licences').'-'.$valeur->num.'"><img src=\'images/com/newspaper_add.png\' alt=\''._('licences').'\' /></a>&nbsp;</td>' .
						'</tr>';
			}
		}
		
	echo '</tbody></table>';
	
}

?>