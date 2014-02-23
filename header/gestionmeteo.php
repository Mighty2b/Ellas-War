<?php

echo '<title>'._('Gestion de la météo').'</title>
<meta name="description" content="'._('Gestion de la météo').'" />';

if(!empty($_GET['var1'])) {
	if($_GET['var1'] == 1) {
		$paquet -> add_action('anti_meteo');
	}
	else {
		$paquet -> add_action('annuler_anti_meteo');
	}
}


?>