<?php

include('../header.php');

if(!empty($_GET['mission'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('valide_quetej', array($_GET['mission']));
	$paquet -> send_actions();
}

?>