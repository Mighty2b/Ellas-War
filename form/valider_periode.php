<?php

include('../header.php');

if(!empty($_GET['joueur'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('valider_periode', array($_GET['joueur']));
	$paquet -> send_actions();
}

?>