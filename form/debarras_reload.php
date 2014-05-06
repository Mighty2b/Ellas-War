<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('liste_debarras');
$paquet -> send_actions();

$liste = $paquet->get_answer('liste_debarras')->{1};

if(!empty($liste) && sizeof($liste) > 0) {
	echo '<table><thead><tr class="centrer">
	<td></td>
	<td>Taux</td>
	<td>Quantité</td>
	<td class="none"></td>
	</tr></thead><tfoot></tfoot><tbody>';
	$i = 1;
	foreach($liste as $lot) {
		echo '<tr>
		      <td onclick="set_ress('.$i.', '.$lot->restant.')"
		          class="cursor">'.nbf($lot->restant).' '.imress($lot->ressource).'</td>
		      <td>'.nbf($lot->taux,6).'</td>
		      <td><input type="text"
		                 name="lot_'.$lot->ressource.'"
		                 placeholder="0"
		                 id="lot_'.$i.'" /></td>
		      <td><img alt="'._('Prendre').'"
		               title="'._('Prendre').'" 
		               src="images/com/cart_add.png"
		               class="cursor"
		               onclick="debarras_acheter(\''.$lot->ressource.'\',
		                                         '.$i.', '.$lot->taux.')"></td>
		      </tr>';
		$i++;
	}
	
	echo '</tbody></table>';
}
else {
	echo '<div class="centrer gras">'._('Le débarras est vide').'</div>';
}

?>
