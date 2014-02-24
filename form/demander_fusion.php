<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('demander_fusion', array($_GET['id']));
	$paquet -> send_actions();
}

?>