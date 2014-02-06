<?php

include('../header.php');

if(!empty($_GET['texte'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('ecrire_chat', array($_GET['texte']));
	$paquet -> send_actions();
}

?>