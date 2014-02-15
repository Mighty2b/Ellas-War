<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('changer_recrutement');
$paquet -> send_actions();

$mon_alliance  = $paquet->get_infoj('alliance');

if(empty($mon_alliance->statu_rec)) {
	echo _('Fermer le recrutement');
}
else {
	echo _('Ouvrir le recrutement');
}

?>
