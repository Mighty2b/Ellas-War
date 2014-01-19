<?php

echo '<title>'._('Gestion de la météo').'</title>
<meta name="description" content="'._('Gestion de la météo').'" />';

if(!empty($_GET['var1'])) {
	if($_GET['var1'] == 1) {
		$paquet = new EwPaquet('anti_meteo');
	}
	else {
		$paquet = new EwPaquet('annuler_anti_meteo');
	}
}


?>