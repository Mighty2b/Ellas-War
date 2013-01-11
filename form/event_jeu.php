<?php

include('../header.php');

if(!empty($_GET['jeu'])) {
	$paquet = new EwPaquet('event_jeu', array($_GET['jeu']));
	$paquet -> display();
}

?>