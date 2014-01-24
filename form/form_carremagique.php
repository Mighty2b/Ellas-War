<?php

include('../header.php');

if(!empty($_GET['jeu'])) {
	
	$paquet = new EwPaquet();
	$paquet -> add_action('gain_drachme', array($_GET['jeu']));
	$paquet -> send_actions();
}

?>
