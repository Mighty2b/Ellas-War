<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('messagerie_supprimer', array($_GET['id']));
	$paquet -> send_actions();
}

?>