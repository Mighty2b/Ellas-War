<?php

include('../header.php');

if(!empty($_GET['joueur']) && !empty($_GET['action'])) {
	
	$paquet = new EwPaquet();

	if($_GET['action'] == 'oui') {
		$paquet -> add_action('accepter_alliance', array($_GET['joueur']));
	}
	else {
		$paquet -> add_action('refuser_alliance', array($_GET['joueur']));
	}
	
	$paquet -> send_actions();
	
	$paquet->error('accepter_alliance', 1);
	$paquet->error('refuser_alliance', 1);
}

?>
