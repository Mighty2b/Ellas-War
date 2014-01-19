<?php

include('../header.php');

if(!empty($_GET['id'])) {
	
	$paquet = new EwPaquet();
	$paquet -> add_action('biblio_maj',
	                      array($_GET['id'], $_GET['titre'], $_GET['contenu']));
	$paquet -> send_actions();
}

?>