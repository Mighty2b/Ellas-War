<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('forcer_depart_urgent', array($_GET['id']));
	$paquet -> send_actions();
}

?>
