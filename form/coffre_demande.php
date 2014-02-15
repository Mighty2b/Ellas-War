<?php

include('../header.php');

if(!empty($_GET['action']) && !empty($_GET['demande'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('coffre_demande', 
	                      array($_GET['action'],$_GET['demande']));
	$paquet -> send_actions();
}

?>
