<?php

include('../header.php');

if(!empty($_GET['id']) && !empty($_GET['action'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('gestion_pacte',
												array($_GET['action'],$_GET['id']));
	$paquet -> send_actions();
}

?>
